<template>
    <!-- Page content -->
    <div class="app-content content">
        <div class="content-wrapper">
          <div class="content-wrapper-before"></div>
          <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">{{ '' }}</h3>
            </div>
          </div>
          <div class="content-body">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-12">
                    <div class="card pull-up ecom-card-1 bg-white">
                        <div class="card-content ecom-card2 height-180">
                            <h5 class="text-muted danger position-absolute p-1">Temperature</h5>
                            <div>
                                <i class="ft-pie-chart danger font-large-1 float-right p-1"></i>
                            </div>
                            <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                                <div class="text-center">0</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12">
                    <div class="card pull-up ecom-card-1 bg-white">
                        <div class="card-content ecom-card2 height-180">
                            <h5 class="text-muted info position-absolute p-1">Humitidy</h5>
                            <div>
                                <i class="ft-activity info font-large-1 float-right p-1"></i>
                            </div>
                            <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                                <div class="text-center">0</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-lg-12">
                    <div class="card pull-up ecom-card-1 bg-white">
                        <div class="card-content ecom-card2 height-180">
                            <h5 class="text-muted success position-absolute p-1">Soil Moisture</h5>
                            <div>
                                <i class="ft-shopping-cart success font-large-1 float-right p-1"></i>
                            </div>
                            <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                                <div class="text-center">0</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-lg-12">
                    <div class="card pull-up ecom-card-1 bg-white">
                        <div class="card-content ecom-card2 height-180">
                            <h5 class="text-muted warning position-absolute p-1">Water Pump</h5>
                            <div>
                                <i class="la la-tint warning font-large-1 float-right p-1"></i>
                            </div>
                            <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                                <i class="text-center la la-toggle-on font-large-5 float-right p-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ecom-card-1 bg-white">
                        <div class="card-content ecom-card2 height-180">
                            <h5 class="text-bold position-absolute p-1">Weather Forcast</h5>
                            <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                                <div class="weatherToggle">
                                    <div id="weatherCity"></div>
                                    <div id="weatherAccordion"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    <!-- / Page content -->
</template>
<script>
    getWeather(6.610549840141285, 0.4781117178657292)
    function getWeather(lat, lng){
        //fetch("http://api.openweathermap.org/data/2.5/forecast?id=524901&appid=lat="+lat+"&lon="+lng+"&appid=5b2a55be2c10defb75c36a882a5b8a4e")
        fetch("https://api.openweathermap.org/data/3.0/forecast?lat="+lat+"&lon="+lng+"&appid=9ec7935d0eb30ec5478669634a551ea1")
        .then(response => response.json())
        .then(data => {
        // Handle the API response
        document.getElementById("weatherCity").innerHTML = data.city.name +', '+data.city.country;
        //console.log(data); // You can perform further processing here
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        let weatherInfo = "";
        let dayInfo = "";
            for(let i = 0; i <= data.list.length-1; i++){
                if(i%8==0){
                    // console.log(data.list[i].dt_txt)
                    const weatherDate = new Date(data.list[i].dt_txt) ;
                    if(i == 0){
                        dayInfo += `<div class='card accordion-item active'>
                                        <h2 class='accordion-header' id='heading${i}'>
                                            <button type='button' class='accordion-button' data-bs-toggle='collapse' data-bs-target='#accordion${i}' aria-expanded='false' aria-controls='accordion${i}'>
                                                <strong>${days[weatherDate.getDay()]}, ${months[weatherDate.getMonth()]} ${weatherDate.getDate()}</strong>
                                            </button>
                                        </h2>
                                        <div id='accordion${i}' class='accordion-collapse collapse show' data-bs-parent='#weatherAccordion' >
                                            <div class='accordion-body'>
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table table-striped">
                                                        <tbody class="table-border-bottom-0">`;
                        for(let j = 0; j <= 7; j++){
                            const weatherTime = new Date(data.list[j].dt_txt) ;
                            //console.log(data.list[j].dt_txt+' - '+data.list[j].weather.description)
                            dayInfo += `<tr>
                                            <td class="border-0 p-0 px-3"><strong><small>${weatherTime.getUTCHours()}:00</small></strong></td>
                                            <td class="border-0 p-0"><img src="http://openweathermap.org/img/wn/${data.list[j].weather.icon}@2x.png" width="50" height="50" alt=""></td>
                                            <td class="border-0 p-0 px-3"><small>${data.list[j].weather.description}</small></td>
                                        </tr>` ;
                        }
                        dayInfo += `</tbody>
                                </table>
                            </div>`;
                    }else{
                        dayInfo += `<div class='card accordion-item'>
                                        <h2 class='accordion-header' id='heading${i}'>
                                            <button type='button' class='accordion-button collapsed' data-bs-toggle='collapse' data-bs-target='#accordion${i}' aria-expanded='false' aria-controls='accordion${i}'>
                                                <strong>${days[weatherDate.getDay()]}, ${months[weatherDate.getMonth()]}, ${weatherDate.getDate()}</strong>
                                            </button>
                                        </h2>
                                        <div id='accordion${i}' class='accordion-collapse collapse ' data-bs-parent='#weatherAccordion' >
                                            <div class='accordion-body'>
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table table-striped">
                                                        <tbody class="table-border-bottom-0">`;
                        for(let j = i; j <= i + 7 ; j++){
                            const weatherTime = new Date(data.list[j].dt_txt) ;
                            //console.log(data.list[j].dt_txt+' - '+data.list[j].weather.description)
                            dayInfo += `<tr>
                                            <td class="border-0 p-0 px-3"><strong><small>${weatherTime.getUTCHours()}:00</small></strong></td>
                                            <td class="border-0 p-0"><img src="https://openweathermap.org/img/wn/10d@2x.png" width="50px" height="50px" alt=""></td>
                                            <td class="border-0 p-0"><img src="https://openweathermap.org/img/wn/${data.list[j].weather.icon}@2x.png" width="50px" height="50px" alt=""></td>
                                            <td class="border-0 p-0 px-3"><small>${data.list[j].weather.description}</small></td>` ;
                        }
                        dayInfo += `</tr>
                                    </tbody>
                                </table>
                            </div>`;
                    }
                    dayInfo += `</div>
                            </div>
                        </div>
                    </div>`;

                    weatherInfo += dayInfo;
                    dayInfo = '';
                }
            }
            document.getElementById("weatherAccordion").innerHTML = weatherInfo;
        })
        .catch(error => {
        // Handle any errors
        console.error('Error:', error);
        });
    }
</script>
