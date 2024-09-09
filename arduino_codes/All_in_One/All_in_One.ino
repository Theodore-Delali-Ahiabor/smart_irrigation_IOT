#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <DHT.h>
#include <SoftwareSerial.h>

// LCD address: 0x27 or 0x3F (check your module's address)
LiquidCrystal_I2C lcd(0x27, 16, 2);

// DHT sensor setup
#define DHTPIN 7       // Pin connected to the DHT sensor data pin
#define DHTTYPE DHT11  // DHT11 or DHT22
DHT dht(DHTPIN, DHTTYPE);

// Relay and Soil Moisture Sensor setup
#define RELAY_PIN 2
#define MOISTURE_SENSOR_PIN A0

// lED Indicators
#define PUMPLED 13
#define POWERPLED 12
#define GSMLED 8

// GSM module setup
#define GSM_RX 10
#define GSM_TX 11
SoftwareSerial gsmSerial(GSM_RX, GSM_TX);

// Phone numbers
const char* phoneNumber = "+233208507886";  // Your phone number for configuration
const char* alertNumber = "+233542354850";  // Number to receive alerts

// URL for the HTTP GET request
const char* serverUrl = "http://127.0.0.1:8000/setArduinoReadings?";

bool sendSMS(const char* number, const String& message) {
  // Send AT command to check connection
  gsmSerial.println("AT");
  delay(1000);
  if (!waitForResponse("OK")) return false;

  // Set SMS mode to text
  gsmSerial.println("AT+CMGF=1");
  delay(1000);
  if (!waitForResponse("OK")) return false;

  // Specify the recipient phone number
  gsmSerial.print("AT+CMGS=\"");
  gsmSerial.print(number);
  gsmSerial.println("\"");
  delay(1000);
  if (!waitForResponse(">")) return false; // Expecting ">" prompt for message input

  // Send the message
  gsmSerial.println(message);
  delay(1000);
  gsmSerial.write(26); // End of message character (CTRL+Z)
  delay(2000);

  // Wait for SMS send confirmation
  if (waitForResponse("OK")) {
    Serial.println("SMS sent successfully.");
    return true;
  } else {
    Serial.println("Failed to send SMS.");
    return false;
  }
}

// Helper function to wait for a specific response from the GSM module
bool waitForResponse(const char* expectedResponse) {
  unsigned long startTime = millis();
  while (millis() - startTime < 5000) { // Wait up to 5 seconds
    while (gsmSerial.available()) {
      String response = gsmSerial.readStringUntil('\n');
      response.trim();
      Serial.print("Response: ");
      Serial.println(response);  // Print the response for debugging
      if (response.equals(expectedResponse)) {
        return true;
      } else if (response.startsWith("ERROR")) {
        Serial.print("Error response: ");
        Serial.println(response);
        return false;
      }
    }
  }
  Serial.println("Timeout waiting for response.");
  return false;
}


// Function to initialize HTTP
void initializeHTTP() {
  gsmSerial.println("AT+HTTPINIT");  // Initialize HTTP
  delay(2000);
  gsmSerial.println("AT+CGATT=1");  // Attach to GPRS service
  delay(2000);
  gsmSerial.println("AT+CGDCONT=1,\"IP\",\"Telecel GH\"");  // Set APN
  delay(2000);
  gsmSerial.println("AT+CGACT=1,1");  // Activate GPRS context
  delay(2000);
}

// Function to send data to the website
void sendDataToWebsite(float humidity, float soilMoisture, bool pumpStatus) {
  String url = String(serverUrl) + "humidity=" + String(humidity) + "&moisture=" + String(soilMoisture) + "&pump=" + (pumpStatus ? "1" : "0");
  gsmSerial.println("AT+HTTPPARA=\"URL\",\"" + url + "\"");  // Set URL
  delay(2000);
  gsmSerial.println("AT+HTTPACTION=0");  // Start GET request
  delay(10000);  // Wait for the request to complete
  gsmSerial.println("AT+HTTPTERM");      // Terminate HTTP
  delay(2000);
}

void setup() {
  // Initialize LCD
  lcd.init();
  lcd.backlight();  // Turn on the backlight if available

  // Initialize DHT sensor
  dht.begin();

  // Display initialization message
  lcd.setCursor(0, 0);
  lcd.print("Initializing...");

  // Initialize Relay
  pinMode(RELAY_PIN, OUTPUT);
  digitalWrite(RELAY_PIN, HIGH);  // Ensure relay is off initially

  // Initialize LEDs
  pinMode(PUMPLED, OUTPUT);
  digitalWrite(PUMPLED, LOW);

  // Initialize GSM module
  gsmSerial.begin(9600);  // Set the baud rate for the GSM module
  Serial.begin(9600);     // Set the baud rate for serial monitor
  
  // Send a configuration message to your phone number
  sendSMS(phoneNumber, "GSM module initialized and ready");
  delay(2000);  // Wait for 2 seconds
}

void loop() {
  // Get humidity
  float humidity = dht.readHumidity();

  // Read soil moisture
  int moistureValue = analogRead(MOISTURE_SENSOR_PIN);
  float soilMoisture = map(moistureValue, 0, 1023, 100, 0);  // Map value to percentage

  // Control the water pump based on soil moisture level
  bool pumpStatus = 0;
  if (soilMoisture < 20) {         // Turn on the water pump if soil moisture is below 20%
    digitalWrite(RELAY_PIN, LOW);  // Turn on the water pump
    digitalWrite(PUMPLED, HIGH);
    sendSMS(alertNumber, "Water pump ON! Humidity: " + String(humidity) + "%, Moisture: " + String(soilMoisture) + "%");
    pumpStatus = 1;
  } else {
    digitalWrite(RELAY_PIN, HIGH);  // Turn off the water pump
    digitalWrite(PUMPLED, LOW);
    pumpStatus = 0;
  }

  // Initialize HTTP and send data to the website
  initializeHTTP();
  sendDataToWebsite(humidity, soilMoisture, pumpStatus);

  // Display data on LCD
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Moist:");
  lcd.print(soilMoisture);
  lcd.print("%");
  lcd.setCursor(0, 1);
  lcd.print("Hum:");
  lcd.print(humidity);
  lcd.print("%");

  // Wait for 2 seconds before next reading
  delay(2000);
}
