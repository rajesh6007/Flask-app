<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .outer_container_mychart {
            display: flex;
        }

        .mychart_section_2nd_col {
            flex: 1;
            height: fit-content;
            padding: 20px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 24px;
        }

        .mychart_section_2nd_col_title {
            align-items: center;
            font-family: poppins, sans-serif;
            font-size: 1.5rem;
            display: flex;
            margin-bottom: 50px;
        }

        .mychart_section_2nd_col_title img {
            height: 50px;
            aspect-ratio: 1/1;
            margin-right: 20px;
        }

        .stats {
            height: 150px;
            width: 100%;
            overflow: hidden;
            box-shadow: none;
        }

        .stat-value {
            font-size: 1.3rem;
            box-shadow: none;
        }

        .stats_accuracy {
            padding: 20px 0px 20px 0px;
            display: flex;
        }

        .stats_accuracy_error {
            flex: 1;
            padding: 20px;
        }

        .stats_accuracy_error_name {
            display: flex;
            justify-content: center;
            align-self: center;
        }

        .stats_accuracy_error_name div {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .stats_accuracy_error_name div img {
            height: 30px;
            aspect-ratio: 1/1;
        }

        .stats_accuracy_error_title {
            font-family: noto, sans-serif;
            font-size: 16px;
            color: var(--fallback-bc, oklch(var(--bc)/.6));
        }

        .stats_accuracy_error_name {
            font-family: poppins, sans-serif;
            font-size: 1rem;
            color: var(--fallback-bc, oklch(var(--bc)/var(--tw-text-opacity)));
            font-weight: bold;
        }

        .stats_accuracy_error_name img {
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
        This project forecasts paddy production for the next 5 years.
        The results are as follows:
    </div>

    <div class="outer_container_mychart">
        <div class="mychart_section">
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
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-title">Paddy Prod.</div>
                    <div class="stat-value" id="stat-BKT-P"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fetch forecast data
        function getForecast() {
            fetch("https://flask-app-ch4c.onrender.com/getdata",
                {
                    method: "POST",
                    body: JSON
                        .stringify
                        ({
                            // userId: 1,
                            // title: "Demo Todo Data",
                            // completed: false,
                        }),
                    headers: {
                        "Content-type": "application/json",
                    },
                })
                .then((response) => response.json())
                .then((json_response) => {
                    const ctx = document.getElementById('myChart');

                    // DAta for Year
                    document.getElementById("stat-year").innerHTML =  json_response.Get_Data[0].YEAR.slice(-1)[0];
                    // DAta for Production
                    document.getElementById("stat-BKT-P").innerHTML = json_response.Get_Data[0].BKT_P.slice(-1)[0];

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                            labels: json_response["Get_Data"][0]["YEAR"],
                            datasets: [{
                                label: 'Paddy Production in Ton',
                                data: json_response["Get_Data"][0]["BKT_P"],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });

        }

        // Run the function when the page loads
        window.onload = getForecast;
    </script>
</body>

</html>