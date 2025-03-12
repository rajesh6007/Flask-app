<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Objectives</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">

    <style>
        /* General Styles */

.objective_title {
    text-align: center;
    margin-top: 100px;
    margin-bottom: 100px;
    font-family: noto, sans-serif;
    font-size: 2.5rem;
    color: #333;
}

/* Objectives Section */
.project-objectives {
    width: 100%;
    padding: 0% 0% 10% 0%;
    background-color: #fff;
}

.objectives-container {
    display: flex;
    flex-direction: column;
    gap: 30px;
    margin-top: 20px;
}

.objective-row {
    display: flex;
    justify-content: space-around;
    gap: 30px;
    padding: 0% 15% 0% 15%;
}

.objective-item {
    width: 45%;
    background-color: transparent;
    padding: 20px;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.objective-item .icon {
    font-size: 40px;
    color: #00796b;
    margin-bottom: 15px;
}

.objective-item h3 {
    font-size: 1.2rem;
    color: #333;
    margin-bottom: 10px;
}

.objective-item p {
    font-size: 1rem;
    color: #555;
}

/* Hover Effect */
.objective-item:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

    </style>
</head>
<body>

    <!-- Objectives Section -->
    <section class="project-objectives">
        <h2 class="objective_title">Our Project Objectives</h2>
        
        <div class="objectives-container">
            <!-- Row 1 -->
            <div class="objective-row">
                <div class="objective-item">
                    <div class="icon">
                        <!-- Replace with your FlatIcon icons or use Font Awesome -->
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="objective-text">
                        <h3>Optional Tool</h3>
                        <p>We aim to develop another tool to analyze paddy agriculture data more effectively.</p>
                    </div>
                </div>
                
                <div class="objective-item">
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="objective-text">
                        <h3>Upcoming Talents & Experts </h3>
                        <p>We want to contribute to building a stage for experts and upcoming talents to develop robust agricultural tools.</p>
                    </div>
                </div>
            </div>
            
            <!-- Row 2 -->
            <div class="objective-row">
                <div class="objective-item">
                    <div class="icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="objective-text">
                        <h3>Securing Agriculture</h3>
                        <p>Securing the future of agriculture with modern technologfriendly.                   </div>
                </div>
                
                <div class="objective-item">
                    <div class="icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="objective-text">
                        <h3>Scalable Architecture</h3>
                        <p>Design the system to scale easily as the new database adds.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
