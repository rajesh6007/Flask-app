<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .outer_container_mychart{
            display: flex;
        }

        .mychart_section_2nd_col{
            flex: 1;
            height: fit-content;
            padding: 20px;
            box-shadow: 0px 10px 20px rgba(0,0,0,0.1);
            border-radius: 24px;

        }

        .mychart_section_2nd_col_title{
            align-items: center;
            font-family: poppins, sans-serif;
            font-size: 1.5rem;
            display: flex;
            margin-bottom: 50px;
        }

        .mychart_section_2nd_col_title img{
            height: 50px;
            aspect-ratio: 1/1;
            margin-right: 20px;
        }


        .stats{
            height: 150px;
            width: 100%;
            overflow: hidden;
            box-shadow: none;
        }


        .stat-value{
            font-size: 1.3rem;
            box-shadow: none;
        }

        .stats_accuracy{
            padding: 20px 0px 20px 0px ;
            display: flex;
        }

        .stats_accuracy_error{
            flex:1;
            padding: 20px;
        }

        .stats_accuracy_error_name {
            display: flex;
            justify-content: center;
            align-self: center;
        }

        .stats_accuracy_error_name div{
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .stats_accuracy_error_name div img{
            height: 30px;
            aspect-ratio: 1/1;
        }

        .stats_accuracy_error_title{
            font-family: noto,sans-serif;
            font-size: 16px;
            color: var(--fallback-bc,oklch(var(--bc)/.6));
        }

        .stats_accuracy_error_name{
            font-family: poppins,sans-serif;
            font-size: 1rem;
            color: var(--fallback-bc,oklch(var(--bc)/var(--tw-text-opacity)));
            font-weight: bold;
        }

        .stats_accuracy_error_name img{
            margin-right: 10px;
        }

    </style>
</head>
<body>

<div class="forecast_title">
    <img src="../../static/images/Images/forecasting.png" alt="forecasting_image">
    <h1> Forecasting:</h1>

</div>

<div class="forecast_title_text">
This project forecasts paddy production for the next 6 years.
The results are as follows:
</div>

<div class="outer_container_mychart">
    <div class="mychart_section" >
        <div class="mychart_section_title">Projected Forecast:</div>
        <div class="mychart_section_chart">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <div class="mychart_section_2nd_col">
        <div class="mychart_section_2nd_col_title">
            <img src="../../static/images/Images/report.png" alt="result_image">
            Report:
        </div>
        <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block h-8 w-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-title">Region</div>
                    <div class="stat-value">Bhaktapur</div>
                    <!-- <div class="stat-desc">Jan 1st - Feb 1st</div> -->
                </div>

                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block h-8 w-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-title">Year</div>
                    <div class="stat-value" id="stat-year"></div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block h-8 w-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                        </svg>
                    </div>
                    <div class="stat-title">Paddy Prod.</div>
                    <div class="stat-value" id="stat-BKT-P"></div>
                </div>
        </div>

        <div class="stats_accuracy">
        <div class="stats_accuracy_error">
                <div class="stats_accuracy_error_title">
                    Error 1
                </div>
                <div class="stats_accuracy_error_name">
                    <div><img src="../../static/images/Images/accuracy.png" alt="error_icon_1"></div>
                    <div>Error_value1</div>
                </div>
            </div>

            <div class="stats_accuracy_error">
                <div class="stats_accuracy_error_title">
                    Error 1
                </div>
                <div class="stats_accuracy_error_name">
                    <div><img src="../../static/images/Images/statistics.png" alt="error_icon_1"></div>
                    <div>Error_value1</div>
                </div>
            </div>

            <div class="stats_accuracy_error">
                <div class="stats_accuracy_error_title">
                    Error 1
                </div>
                <div class="stats_accuracy_error_name">
                    <div><img src="../../static/images/Images/report.png" alt="error_icon_1"></div>
                    <div>Error_value1</div>
                </div>
            </div>
    
        </div>
    </div>
</div>

        

<!-- script to handle mychart -->
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['2001', '2002', '2003', '2004','2001','2001', '2002', '2003', '2004','2001','2001', '2002', '2003', '2004','2001','2001', '2002', '2003', '2004','2001', '2002', '2003', '2004','2001', '2002', '2003', '2004', '2005', '2006','2001', '2002', '2003', '2004', '2005', '2006','2001', '2002', '2003', '2004', '2005', '2006','2001', '2002', '2003', '2004', '2005', '2006','2001', '2002', '2003', '2004', '2005', '2006','2001', '2002', '2003', '2004', '2005', '2006','2001', '2002', '2003', '2004', '2005', '2006','2001', '2002', '2003', '2004', '2005', '2006'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: "Paddy"
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Year'
                    },
                }
            }
        }
    });

/*_________________________________________________________________________*/

     
    function getForecast() {
        const years = document.getElementById('years').value;

        fetch('http://localhost:8000/getdata', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ years: years })
        })
        .then(response => response.json())
        .then(data => {

            
            if (!data || !data["Get Data"]) { // Check if key exists
                    throw new Error("Invalid response from server No data send ");
                }
                
            const result1 = document.getElementById('stat-BKT-P');
            result1.innerHTML = '';
  
            const result2 = document.getElementById('stat-year');
            result2.innerHTML = '';


            if (data.error) {
                result1.innerHTML = `<p style="color: red;">Error: ${data.error}</p>`;
                return;
            }

            if (data["Get Data"]) {

                data["Get Data"].forEach(item => {
                    
                });
                
                result1.innerHTML = html;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('forecast-results').innerHTML = `<p style="color: red;">An error occurred. Please try again.</p>`;
        });
    }



</script>
</body>
</html>