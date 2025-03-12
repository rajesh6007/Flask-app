    <div class="container">
        <header class="dataset-header">
            <h1>Crop Yield Prediction Dataset</h1>
            <p>Gradient Boosting model for time series data for agricultural forecasting</p>
        </header>

        <div class="dataset-grid">
            <div class="image-card">
                <div class="image_card_title">Dataset View</div>
                <div class="table_div"><table id="csvTable"></table></div>
            </div>

            <div class="info-panel">
                <h2>Dataset Overview</h2>
                <div class="stats-grid">
                    <div class="stat-item">
                        <h3>📊 Total Samples</h3>
                        <p>3619 Rows & 3 Columns</p>
                    </div>
                    <div class="stat-item">
                        <h3>🌱 Features</h3>
                        <p>3 Variables</p>
                    </div>
                    <div class="stat-item">
                        <h3>⏳ Time Span</h3>
                        <p>1975-2022</p>
                    </div>
                    <div class="stat-item">
                        <h3>🌍 Regions</h3>
                        <p>6 Countries</p>
                    </div>
                </div>

                <h3>Key Features</h3>
                <ul style="padding-left: 1.5rem; margin: 1rem 0;">
                    <li>Area</li>
                    <li>Production</li>
                    <li>Yield</li>

                </ul>
            </div>
        </div>

        <section class="download-section">
            <h2>Get the Dataset</h2>
            <p style="margin: 1rem 0;">Available in CSV formats only</p>
            <a href="../file/data.csv" class="download-btn" download>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
                Download Dataset
            </a>
            <p style="margin-top: 1rem; color: #666; font-size: 0.9rem;">
                Open Source License | Updated: 10 March 2025
            </p>
        </section>
    </div>

    <!----- script to handle csvtable ----->
    <script>
        fetch("../file/data.csv") // Adjust path if needed
            .then(response => response.text())
            .then(data => {
                const rows = data.split("\n").map(row => row.split(","));
                const table = document.getElementById('csvTable');
                
                rows.forEach((row, index) => {
                    const tr = document.createElement("tr");
                    row.forEach(cell => {
                        const td = document.createElement(index === 0 ? "th" : "td");
                        td.textContent = cell.trim();
                        tr.appendChild(td);
                    });
                    table.appendChild(tr);
                });
            })
            .catch(error => console.error("Error loading CSV:", error));
    </script>
