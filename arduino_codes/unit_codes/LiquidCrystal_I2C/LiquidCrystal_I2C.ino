#include <Wire.h>               // Import wire library
#include <LiquidCrystal_I2C.h>  // Import LCD library

LiquidCrystal_I2C lcd(0x27, 16, 2);  // LCD configuration: 0x27 = LCD Address, 16 = number of columns, 2 = number of rows

void setup() {
  Serial.begin(9600);  // Initialize serial communication at 9600 baud rate
  lcd.init();          // Initialize the LCD
  lcd.backlight();     // Turn on the LCD backlight
  lcd.clear();         // Clear the LCD screen
  delay(1000);         // Delay for 1 second

  lcd.setCursor(0, 0);        // Set cursor to the beginning of the first line
  lcd.print("SYSTEM IS ON");  // Display message on the first line

  lcd.setCursor(0, 1);  // Set cursor to the beginning of the second line
  lcd.print("");        // Display message on the second line
}

void loop() {
  // Main code loop, currently empty
}
