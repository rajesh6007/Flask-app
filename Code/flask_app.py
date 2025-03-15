import os
from flask import Flask, request, jsonify, render_template, g
import joblib
import pandas as pd
import numpy as np
from flask_cors import CORS
#from waitress import serve

# Load the trained model
MODEL_PATH = os.path.join(os.getcwd(), "model.pkl")
best_model = joblib.load(MODEL_PATH)

app = Flask(__name__)
CORS(app)

# Function to load data only once
def get_data():
    if 'data' not in g:
        g.data = pd.read_csv(os.path.join(os.getcwd(), "Data_read.csv"))  
    return g.data

@app.route('/predict', methods=['POST'])
def predict():
    data = get_data()

    try:
        request_data = request.get_json()
        num_years = int(request_data.get('years', 1))
        if num_years < 1 or num_years > 5:
            return jsonify({'error': 'Years must be between 1 and 5'})

        # Extract last 11 rows
        test_data = data.iloc[-11:].copy()
        columns = ['sales_log','YEAR','BKT_A','BKT_Y','KTM_A','KTM_P','KTM_Y','LLT_A','LLT_P','LLT_Y','lag_1','lag_2', 'lag_3','rolling_mean_3','rolling_std_3']
        last_known_values = test_data[columns].iloc[-1]

        # Generate future forecasts
        future_forecast = []
        for i in range(num_years):
            next_pred = best_model.predict([last_known_values])
            next_year = last_known_values['YEAR'] + 1

            # Adjusting future values based on the year
            if i > 3:
                next_pred = next_pred + (next_pred * (i + 0.2) / 100)
            elif i == 1:
                next_pred = next_pred
            else:
                next_pred = next_pred - (next_pred * (i + 0.5) / 100)

            # Update lags
            last_known_values['YEAR'] = next_year
            last_known_values['lag_1'] = last_known_values['lag_2']
            last_known_values['lag_2'] = last_known_values['lag_3']
            last_known_values['lag_3'] = next_pred

            # Calculate rolling mean and standard deviation
            rolling_window = np.array([last_known_values['lag_1'], last_known_values['lag_2'], last_known_values['lag_3']])
            last_known_values['rolling_mean_3'] = rolling_window.mean()
            last_known_values['rolling_std_3'] = rolling_window.std()

            # Add to forecast list
            future_forecast.append({
                "YEAR": int(next_year),
                "BKT_A": float(last_known_values['BKT_A']),
                "BKT_Y": float(last_known_values['BKT_Y']),
                "BKT_P": float(next_pred[0])
            })

        return jsonify({"Future Forecast": future_forecast})

    except Exception as e:
        return jsonify({"error": str(e)})

@app.route('/getdata', methods=['GET'])
def getdata():
    data = get_data()
    try:
        df = data[['YEAR', 'BKT_P']].copy()
        send_data = [{"YEAR": df['YEAR'].tolist(), "BKT_P": df['BKT_P'].tolist()}]
        return jsonify({"Get_Data": send_data})
    except Exception as e:
        return jsonify({"error": str(e)})

if __name__ == "__main__":
    port = int(os.environ.get('PORT', 10000))  # Render uses dynamic port
    serve(app, host="0.0.0.0", port=port)
