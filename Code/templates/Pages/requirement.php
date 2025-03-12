<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Requirements</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
      color: #333;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }
    h1 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 30px;
    }
    .requirements-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }
    .requirement-card {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      text-align: center;
    }
    .requirement-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
    .requirement-card i {
      font-size: 40px;
      margin-bottom: 15px;
      color: #3498db;
    }
    .requirement-card h3 {
      margin: 0;
      font-size: 1.5em;
      color: #2c3e50;
    }
    .requirement-card p {
      margin: 10px 0 0;
      color: #777;
      font-size: 0.9em;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Project Requirements</h1>

    <!-- Requirements Section -->
    <div class="requirements-section">
      <!-- Python -->
      <div class="requirement-card">
        <i class="fab fa-python"></i>
        <h3>Python</h3>
        <p>A versatile programming language used for data analysis, machine learning, and automation.</p>
      </div>

      <!-- Google Colab -->
      <div class="requirement-card">
        <i class="fas fa-laptop-code"></i>
        <h3>Google Colab</h3>
        <p>A cloud-based Jupyter notebook environment for writing and executing Python code.</p>
      </div>

      <!-- XGBoost -->
      <div class="requirement-card">
        <i class="fas fa-chart-line"></i>
        <h3>XGBoost</h3>
        <p>An optimized gradient boosting library for machine learning, known for its speed and performance.</p>
      </div>

      <!-- Excel -->
      <div class="requirement-card">
        <i class="fas fa-file-excel"></i>
        <h3>Excel</h3>
        <p>A spreadsheet tool for data organization, analysis, and visualization.</p>
      </div>

      <!-- GitHub -->
      <div class="requirement-card">
        <i class="fab fa-github"></i>
        <h3>GitHub</h3>
        <p>A platform for version control and collaboration, used to manage and share code.</p>
      </div>

      <!-- Render -->
      <div class="requirement-card">
        <i class="fas fa-cloud"></i>
        <h3>Render</h3>
        <p>A cloud platform for deploying and hosting web applications and services.</p>
      </div>
    </div>
  </div>
</body>
</html>