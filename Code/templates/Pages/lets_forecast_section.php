<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forecast</title>
    <style>
        .hero {
            padding: 0;
            background: transparent;
        }

        #lets_forecast_section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../../static/images//Images/bg2.png'); 
            background-size: cover;
            background-repeat: no-repeat;
        }

        .hero-content {
            padding: 0;
            margin: 0;
        }

        .card {
            margin-right: 50px;
        }

        .text-5xl {
            font-family: poppins, sans-serif;
            font-size: 3rem;
            font-weight: 500;
            color: white;
        }

        .text-center {
            font-family: poppins, sans-serif;
            font-size: 2rem;
            color: white;
        }
    </style>
</head>
<body id="lets_forecast_section">
    
<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content flex-col lg:flex-row-reverse">
        <div class="text-center lg:text-left">
            <h1 class="text-5xl font-bold" id="forecast-results">Enter the year(s) to forecast</h1>
        </div>
        <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
            <form class="card-body" id="forecast-form" action="forecast_page.php">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Number of Years</span>
                    </label>
                    <input type="number" id="years" name="years" min="1" max="10" placeholder="Enter years to forecast" class="input input-bordered" required />
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary" type="button" onclick="getForecast()">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="forecast-results" class="container">
    <!-- Forecast results will be displayed here -->
</div>

<script>
    function getForecast() {
        const years = document.getElementById('years').value;

        if (!years) {
            alert("Please enter the number of years to forecast.");
            return;
        }

        fetch('https://flask-app-ch4c.onrender.com/predict', {
            method: 'POST',
            headers: {
                        "Content-type": "application/json",
                    },
            body: JSON.stringify({ years: years }),
        })
        .then(response => response.json())
        .then(data => {

            
            if (!data || !data["Future Forecast"]) { // Check if key exists
                    throw new Error("Invalid response from server No data send ");
                }
                
            const forecastResults = document.getElementById('forecast-results');
            forecastResults.innerHTML = '';

            if (data.error) {
                forecastResults.innerHTML = `<p style="color: red;">Error: ${data.error}</p>`;
                return;
            }

            if (data["Future Forecast"]) {
                let html = '<h3>Forecasted Data:</h3><table border="1"><tr><th><p style="color: black;">Year</p></th><th><p style="color: black;">BKT_A</p></th><th><p style="color: black;">BKT_Y</p></th><th><p style="color: black;">BKT_P</p></th></tr>';
                data["Future Forecast"].forEach(item => {
                    html += `<tr>
                                <td>${item.YEAR}</td>
                                <td>${item.BKT_A}</td>
                                <td>${item.BKT_Y}</td>
                                <td>${item.BKT_P}</td>
                            </tr>`;
                });
                html += '</table>';
                forecastResults.innerHTML = html;
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
