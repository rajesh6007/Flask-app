<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Useful Links</title>
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
    .links-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }
    .link-card {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .link-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
    .link-card a {
      text-decoration: none;
      color: inherit;
      display: flex;
      align-items: center;
    }
    .link-card i {
      font-size: 24px;
      margin-right: 15px;
      color: #3498db;
    }
    .link-card h3 {
      margin: 0;
      font-size: 1.2em;
      color: #2c3e50;
    }
    .link-card p {
      margin: 10px 0 0;
      color: #777;
      font-size: 0.9em;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Useful Links</h1>

    <!-- Links Section -->
    <div class="links-section">
      <!-- Link Card 1 -->
      <div class="link-card">
        <a href="https://github.com" target="_blank">
          <i class="fab fa-github"></i>
          <div>
            <h3>GitHub</h3>
            <p>Explore open-source projects and collaborate with developers worldwide.</p>
          </div>
        </a>
      </div>

      <!-- Link Card 2 -->
      <div class="link-card">
        <a href="https://stackoverflow.com" target="_blank">
          <i class="fab fa-stack-overflow"></i>
          <div>
            <h3>Stack Overflow</h3>
            <p>Get answers to your programming questions from a community of experts.</p>
          </div>
        </a>
      </div>

      <!-- Link Card 3 -->
      <div class="link-card">
        <a href="https://codepen.io" target="_blank">
          <i class="fab fa-codepen"></i>
          <div>
            <h3>CodePen</h3>
            <p>Experiment with front-end code snippets and share your creations.</p>
          </div>
        </a>
      </div>

      <!-- Link Card 4 -->
      <div class="link-card">
        <a href="https://developer.mozilla.org" target="_blank">
          <i class="fas fa-code"></i>
          <div>
            <h3>MDN Web Docs</h3>
            <p>Comprehensive documentation for web technologies like HTML, CSS, and JavaScript.</p>
          </div>
        </a>
      </div>

      <!-- Link Card 5 -->
      <div class="link-card">
        <a href="https://css-tricks.com" target="_blank">
          <i class="fab fa-css3-alt"></i>
          <div>
            <h3>CSS-Tricks</h3>
            <p>Learn tips, tricks, and best practices for modern CSS development.</p>
          </div>
        </a>
      </div>

      <!-- Link Card 6 -->
      <div class="link-card">
        <a href="https://fonts.google.com" target="_blank">
          <i class="fas fa-font"></i>
          <div>
            <h3>Google Fonts</h3>
            <p>Discover and use free, open-source fonts for your projects.</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</body>
</html>