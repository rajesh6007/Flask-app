<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Useful Resources Collection</title>
    <style>
        :root {
            --primary: #2A9D8F;
            --secondary: #264653;
            --accent: #E9C46A;
            --light: #f8f9fa;
        }

        .container {
            padding: 5% 0% 5% 0%;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .page-header h1 {
            color: var(--secondary);
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .category-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        .category-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--primary);
        }

        .category-icon {
            width: 40px;
            height: 40px;
            background: var(--primary);
            border-radius: 8px;
            display: grid;
            place-items: center;
            color: white;
        }

        .links-list {
            list-style: none;
        }

        .link-item {
            margin-bottom: 1rem;
            padding: 0.8rem;
            border-radius: 6px;
            transition: background 0.2s ease;
        }

        .link-item:hover {
            background: #f1f1f1;
        }

        .link-item a {
            text-decoration: none;
            color: var(--secondary);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .link-item a:hover {
            color: var(--primary);
        }

        .link-icon {
            width: 24px;
            height: 24px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .page-header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="page-header">
            <h1>Developer Resources Hub</h1>
            <p>Curated collection of essential tools and references</p>
        </header>

        <div class="categories-grid">
            <!-- Development Tools -->
            <div class="category-card">
                <div class="category-header">
                    <div class="category-icon">🛠</div>
                    <h2>Development Tools</h2>
                </div>
                <ul class="links-list">
                    <li class="link-item">
                        <a href="https://github.com" target="_blank">
                            <img src="../../static/images/Images/github-icon.png" alt="GitHub" class="link-icon">
                            GitHub - Code Hosting
                        </a>
                    </li>
                    <li class="link-item">
                        <a href="https://codepen.io" target="_blank">
                            <img src="../../static/images/Images/colab-icon.png" alt="CodePen" class="link-icon">
                            Google Colab - Coding and Training Model
                        </a>
                    </li>
                    <li class="link-item">
                        <a href="https://render.com/?_gl=1*r6vtlf*_ga*MTMwOTc0NTk5OS4xNzQxNDMwMTM5*_ga_QK9L9QJC5N*MTc0MTY3NjcxNi4zLjAuMTc0MTY3NjcxNi42MC4wLjA." target="_blank">
                            <img src="../../static/images/Images/render_icon.png" alt="StackBlitz" class="link-icon">
                            Render - Deploy Website, Webservices & model
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Learning Resources -->
            <div class="category-card">
                <div class="category-header">
                    <div class="category-icon">📚</div>
                    <h2>Learning Resources</h2>
                </div>
                <ul class="links-list">
                    <li class="link-item">
                        <a href="https://xgboost.readthedocs.io/en/stable/" target="_blank">
                            XGBoost - Documents and tutorials
                        </a>
                    </li>
                    <li class="link-item">
                        <a href="https://www.geeksforgeeks.org/ml-gradient-boosting/" target="_blank">
                            Geeks for Geeks - Gradient Boosting
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Design Resources -->
            <div class="category-card">
                <div class="category-header">
                    <div class="category-icon">🎨</div>
                    <h2>Design Resources</h2>
                </div>
                <ul class="links-list">
                    <li class="link-item">
                        <a href="https://www.flaticon.com/" target="_blank">
                            <img src="../../static/images/Images/flat_icon.png" alt="Figma" class="link-icon">
                            Flaticon - Icons & Animated Icons
                        </a>
                    </li>
                    <li class="link-item">
                        <a href="https://www.canva.com/" target="_blank">
                            <img src="../../static/images/Images/canva_icon.png" alt="unDraw" class="link-icon">
                            Canva - Image Editing, Logo & Template
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>