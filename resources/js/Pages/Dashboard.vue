<script setup>
    import Nav from './Shared/Nav.vue';
    import Footer from './Shared/Footer.vue';
    import Sidebar from './Shared/Sidebar.vue';

    if($("#weatherCity")){
        getWeather(6.610549840141285, 0.4781117178657292);
    }
    function getWeather(lat, lng){
        fetch("https://api.openweathermap.org/data/2.5/forecast?lat="+lat+"&lon="+lng+"&appid=5b2a55be2c10defb75c36a882a5b8a4e")
        .then(response => response.json())
        .then(data => {
            // Handle the API response
            $("#weatherCity").html(data.city.name +', '+data.city.country);

            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            let weatherInfo = "";
            let dayInfo = "";
            for(let i = 0; i < 16/* data.list.length */; i++){
                if(i%8==0){
                    /* console.log(data.list[i].dt_txt) */
                    const weatherDate = new Date(data.list[i].dt_txt) ;
                    if(i == 0){
                        dayInfo += `<div class='weather-accordion-item active mb-2'>
                                        <h2 class='accordion-header mb-0' id='heading${i}'>
                                            <button type='button' class='accordion-button w-100 border-0 btn btn-info btn-min-width' data-bs-toggle='collapse' data-bs-target='#accordion${i}' aria-expanded='false' aria-controls='accordion${i}'>
                                                <strong>${days[weatherDate.getDay()]}, ${months[weatherDate.getMonth()]} ${weatherDate.getDate()}</strong>
                                            </button>
                                        </h2>
                                        <div id='accordion${i}' class='weather-accordion-collapse collapse show' data-bs-parent='#weatherAccordion' >
                                            <div class='accordion-body'>
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table table-striped">
                                                        <tbody class="table-border-bottom-0">`;
                        for(let j = 0; j <= 7; j++){
                            const weatherTime = new Date(data.list[j].dt_txt) ;
                            //console.log(data.list[j].dt_txt+' - '+data.list[j].weather.description)
                            dayInfo += `<tr>
                                            <td class="border-0 p-0 px-3">${weatherTime.getUTCHours()}:00</td>
                                            <td class="border-0 p-0"><img src="http://openweathermap.org/img/wn/${data.list[j].weather[0].icon}@2x.png" width="50" height="50" alt=""></td>
                                            <td class="border-0 p-0 px-3">${data.list[j].weather[0].description}</td>
                                        </tr>` ;
                        }
                        dayInfo += `</tbody>
                                </table>
                            </div>`;
                    }else{
                        dayInfo += `<div class='weather-accordion-item mb-2'>
                                        <h2 class='accordion-header mb-0' id='heading${i}'>
                                            <button type='button' class='accordion-button collapsed w-100 border-0 btn btn-info btn-min-width' data-bs-toggle='collapse' data-bs-target='#accordion${i}' aria-expanded='false' aria-controls='accordion${i}'>
                                                <strong>${days[weatherDate.getDay()]}, ${months[weatherDate.getMonth()]} ${weatherDate.getDate()}, ${weatherDate.getFullYear()} </strong>
                                            </button>
                                        </h2>
                                        <div id='accordion${i}' class='weather-accordion-collapse collapse ' data-bs-parent='#weatherAccordion' >
                                            <div class='accordion-body'>
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table table-striped">
                                                        <tbody class="table-border-bottom-0">`;
                        for(let j = i; j <= i + 7 ; j++){
                            const weatherTime = new Date(data.list[j].dt_txt) ;
                            dayInfo += `<tr>
                                            <td class="border-0 p-0 px-3">${weatherTime.getUTCHours()}:00</td>
                                            <td class="border-0 p-0"><img src="https://openweathermap.org/img/wn/${data.list[j].weather[0].icon}@2x.png" width="50px" height="50px" alt=""></td>
                                            <td class="border-0 p-0 px-3">${data.list[j].weather[0].description}</td>` ;
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
            $("#weatherAccordion").html(weatherInfo);
        })
        .catch(error => {
            // Handle any errors
            console.error('Error:', error);
        });
    }

    /* toggle weather accordian */
    $(function(){
        $("body").on('click', ".weather-accordion-item", function(){
            var $this = $(this); // Current clicked header
            var $accordionItem = $this.closest('.weather-accordion-item'); // Closest accordion-item
            var $collapse = $accordionItem.find('.weather-accordion-collapse'); // Find .accordion-collapse within the item

            // Check if the clicked item is already active
            if (!$accordionItem.hasClass('active')) {
                // Remove 'active' and 'show' classes from all items
                $('.weather-accordion-item').removeClass('active');
                $('.weather-accordion-collapse').removeClass('show');

                // Add 'active' and 'show' class to the clicked item
                $accordionItem.addClass('active');
                $collapse.addClass('show');
            }
        })
    })

</script>
<template>
    <Nav></Nav>
    <Sidebar></Sidebar>
    <div class="app-content content">
        <div class="content-wrapper">
          <div class="content-wrapper-before"></div>
          <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title"></h3>
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
                            <div class="progress-stats-container ct-golden-section height-75 position-relative p-3 d-flex align-items-center justify-content-center w-100 position-relative bottom-0">
                                <div class="text-center display-4">0</div>
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
                            <div class="progress-stats-container ct-golden-section height-75 position-relative p-3 d-flex align-items-center justify-content-center w-100 position-relative bottom-0">
                                <div class="text-center display-4">0</div>
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
                            <div class="progress-stats-container ct-golden-section height-75 position-relative p-3 d-flex align-items-center justify-content-center w-100 position-relative bottom-0">
                                <div class="text-center display-4">0</div>
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
                            <div class="progress-stats-container ct-golden-section height-75 position-relative p-3 d-flex align-items-center justify-content-center w-100 position-relative bottom-0">
                                <span>OFF</span>
                                <i class="text-center la la-toggle-on font-large-5 p-1"></i>
                                <span>ON</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6 col-lg-12">
                    <div class="card pull-up ecom-card-1 bg-white">
                        <div class="card-content ecom-card2 h-auto">
                            <h5 class="text-bold position-absolute p-1">Irrigation Chart</h5>
                            <div class=" position-relative pt-3">
                                <div class="weatherToggle">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-lg-12">
                    <div class="card pull-up ecom-card-1 bg-white">
                        <div class="card-content ecom-card2 h-auto">
                            <h3 class="text-bold px-2 pt-2 d-flex justify-content-between">
                                <div>2 Days Weather Forcast</div>
                                <div id="weatherCity"></div>
                            </h3>
                            <div class=" position-relative p-2">
                                <div class="weatherToggle">
                                    <div id="weatherAccordion" class="accordian"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <Footer></Footer>
</template>
