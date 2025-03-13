<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>test api chart</title>
</head>

<body>
  <p id="data"></p>

  <div>
    <canvas id="myChart"></canvas>
  </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.getElementById("data").innerHTML = "lol";

  fetch("http://localhost:8000/getdata",
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

      new Chart(ctx, {
        type: 'line',
        data: {
          // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          labels: json_response["Get_Data"][0]["YEAR"],
          datasets: [{
            label: '# of Votes',
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




</script>

</html>