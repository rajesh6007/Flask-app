<header class="header_part" id="header_part">
    <!-- Left Side (Logo) -->
    <div class="logo">
        <a href="index.php">
        <img src="../../static/images/Images/PPF.png" alt="paddy_logo">
        </a>
    </div>

    <!-- Right Side (Navigation Links) -->
    <div class="nav-links1">
        <a href="forecast_page.php">
            <i class="fa-solid fa-chart-line"></i>
            Forecast
        </a>
        <a href="dataset_page.php">
            <i class="fa-solid fa-file-fragment"></i>
            Dataset
        </a>
        <a href="about_us_page.php">
            <i class="fa-solid fa-eject"></i>
            About Us
        </a>
    </div>

    <div class="nav-links2">
        <a href="useful_links_page.php">
            <img src="../../static/images/Images/link.png" alt="useful_link">
                <p>Useful Links</p>
        </a>
    </div>

</header>


<!---- script to handle change property of header on scroll ---->
<script>
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 50) {
            document.getElementById("header_part").style.boxShadow = ' 2px 2px 4px rgba(0, 0, 0, .3)';
            document.getElementById("header_part").style.borderRadius = '0px 0px 30px 30px';
            document.getElementById("header_part").style.backgroundColor = 'rgba(255,255,255,1)';
        } 
        else {
            document.getElementById("header_part").style.boxShadow = '';
            document.getElementById("header_part").style.borderRadius = '0px';
            document.getElementById("header_part").style.height = '55px';
            document.getElementById("header_part").style.backgroundColor = 'rgba(255,255,255,1)';
        }
    }
</script>
