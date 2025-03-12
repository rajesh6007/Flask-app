
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<script>
function startConfetti() {
    const trophy = document.querySelector('.mod_2nd_col_1r_head_img');
    const rect = trophy.getBoundingClientRect();

    // Calculate the center of the trophy relative to the viewport
    const x = (rect.left + rect.width / 2) / window.innerWidth;
    const y = (rect.top + rect.height / 2) / window.innerHeight;

    confetti({
        particleCount: 100,
        spread: 70,
        origin: { x: x, y: y } // Confetti originates from the trophy's center
    });
}

function stopConfetti() {
    // Optionally, stop confetti or clear the canvas here
}
</script>


<div class="index_model">
<!-- First Column -->
<div class="in_mod_1st_col">
    <div class="in_mod_1st_col_img1">
        <img src="../../static/images/Images/tractor.jpg" alt="col1_image">
    </div>
    <div class="in_mod_1st_col_img">
        <img src="../../static/images/Images/xgb.png" alt="xgb_image">
    </div>
    <div class="in_mod_1st_col_text">
        XGBoost (Extreme Gradient Boosting) is a powerful machine learning algorithm optimized for speed and performance. It uses gradient boosting, handles missing values, prevents overfitting, and supports parallel processing. Widely used in competitions, it excels in structured data tasks like classification and regression.
    </div>
    <div class="in_mod_1st_col_button">
        <a href="https://xgboost.readthedocs.io/en/latest/index.html">
            More Info
        </a>
    </div>
</div>

<!-- Second Column -->
<div class="in_mod_2nd_col">
    <div class="in_mod_2nd_col_1r" >
        <div class="in_mod_2nd_col_1r_img_text">
            <div class="mod_2nd_col_1r_head" >
                <div class="mod_2nd_col_1r_head_div1">
                    <img src="../../static/images/Images/trophy.png" alt="trophy_image" class="mod_2nd_col_1r_head_img" onclick="startConfetti()" onmouseout="stopConfetti()">
                    <div class="mod_2nd_col_1r_head_title">PaDdy Forecasting(PDF)</div>
                </div>
                <div class="mod_2nd_col_1r_head_div2">
                        <p>
                        We implemented a paddy forecasting project using XGBoost, analyzing its effectiveness for yearly time series data of Nepal's paddy production. Our goal was to assess XGBoost’s suitability for such predictions. The results help determine its accuracy and reliability. For more info download our final report by clicking document button. 
                    </p>
                </div>
                
                <div class="mod_2nd_col_1r_head_div3">
                    <a href="../file/PDF_final_report.pdf" download>Download</a>
                </div>
            </div>
        </div>
        <div class="in_mod_2nd_col_1r_img">
            <img src="../../static/images/Images/col3.jpg" alt="col2_row1_image">
        </div>
    </div>

    <div class="in_mod_2nd_col_2r">
        <div class="in_mod_2nd_col_2r_c">
            <div class="in_mod_2nd_col_2r_c_r1">
                <div class="in_mod_2nd_col_2r_c_icon">
                    <img src="../../static/images/Images/lightning.png" alt="icon_logo">
                </div>
                <div class="in_mod_2nd_col_2r_c_text">Gradient Boosting</div>
            </div>
            
            <div class="in_mod_2nd_col_2r_c_text2">
            Gradient Boosting is a machine learning technique that builds models sequentially, correcting previous errors. It combines weak learners, usually decision trees, to improve accuracy, reduce bias, and enhance predictive performance in regression and classification tasks.
            </div>

            <div class="in_mod_2nd_col_2r_c_button">
                <a href="https://www.datacamp.com/tutorial/guide-to-the-gradient-boosting-algorithm">More Info</a>
            </div>
        </div>

        <div class="in_mod_2nd_col_2r_c">
            <div class="in_mod_2nd_col_2r_c_r1">
                <div class="in_mod_2nd_col_2r_c_icon">
                    <img src="../../static/images/Images/3d.png" alt="icon_logo">
                </div>
                <div class="in_mod_2nd_col_2r_c_text">Dataset</div>
            </div>
            
            <div class="in_mod_2nd_col_2r_c_text2">
            We sourced paddy production data but faced gaps from 1988-1999 and other years, limiting traditional interpolation methods. To address this, we used Holt-Winters Exponential Smoothing and 3rd-degree polynomial fitting, with the latter achieving higher accuracy (R² = 71).            </div>

            <div class="in_mod_2nd_col_2r_c_button">
                <a href="dataset_page.php">More Info</a>
            </div>
        </div>
    </div>
</div>
</div>
