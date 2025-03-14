import os
from flask import Flask, request, jsonify, render_template, g
import joblib
import pandas as pd
import numpy as np
from flask_cors import CORS

# Load the trained model
MODEL_PATH = "model.pkl"
best_model = joblib.load(MODEL_PATH)

app = Flask(__name__)
CORS(app)

# Function to load data only once
def get_data():
    if 'data' not in g:
        g.data = pd.read_csv("Data_read.csv")  
    return g.data

@app.route('/predict', methods=['POST'])
def predict():
    data = get_data()

    try:
        test_data = data.iloc[-11:].copy()
        num = request.get_json()
        num_years = int(num.get('years', 1))
        n_forecast = num_years - test_data['YEAR'].iloc[-1]
        
        if n_forecast < 1 or n_forecast > 5:
            return jsonify({'error': 'Years must be between 1 and 5'})

        future_forecast = []
        columns = ['sales_log','YEAR','BKT_A','BKT_Y','KTM_A','KTM_P','KTM_Y','LLT_A','LLT_P','LLT_Y','lag_1','lag_2', 'lag_3','rolling_mean_3','rolling_std_3']

        last_known_values = test_data[columns].iloc[-1]

        for _ in range(int(n_forecast)):
            next_pred = best_model.predict([last_known_values])
            if _ > 3:
                next_pred = next_pred + (next_pred * (_ + 0.2) / 100)
            elif _ == 1:
                next_pred = next_pred
            else:
                next_pred = next_pred - (next_pred * (_ + 0.5) / 100)

            last_known_values['YEAR'] += 1
            last_known_values['lag_1'] = last_known_values['lag_2']
            last_known_values['lag_2'] = last_known_values['lag_3']
            last_known_values['lag_3'] = next_pred

            for col in ['sales_log', 'KTM_A', 'KTM_Y', 'LLT_A', 'LLT_Y']:
                last_known_values[col] = test_data[col].rolling(8).mean().iloc[-1]
                last_known_values[col] -= (last_known_values[col] * _ / 10)

            for col in ['BKT_A', 'BKT_Y']:
                last_known_values[col] = test_data[col].rolling(8).mean().iloc[-1]
                if _ == 1:
                    last_known_values[col] = last_known_values[col]
                elif _ > 3:
                    last_known_values[col] += (last_known_values[col] * (_ + 0.2) / 100)
                else:
                    last_known_values[col] -= (last_known_values[col] * (_ + 0.5) / 100)

            for col in ['KTM_P', 'LLT_P']:
                last_known_values[col] = test_data[col].rolling(8).mean().iloc[-1]
                last_known_values[col] -= (last_known_values[col] * _ / 100)

            rolling_window = np.array([last_known_values['lag_1'], last_known_values['lag_2'], last_known_values['lag_3']])
            last_known_values['rolling_mean_3'] = rolling_window.mean()
            last_known_values['rolling_std_3'] = rolling_window.std()

            test_data = pd.concat([test_data, pd.DataFrame([last_known_values])], ignore_index=True)
            test_data['BKT_P'].iloc[-1] = next_pred[0]

            future_forecast.append({
                "YEAR": int(test_data['YEAR'].iloc[-1]),
                "BKT_A": float(test_data['BKT_A'].iloc[-1]),
                "BKT_Y": float(test_data['BKT_Y'].iloc[-1]),
                "BKT_P": float(test_data['BKT_P'].iloc[-1])
            })

        return jsonify({"Future Forecast": future_forecast})

    except Exception as e:
        return jsonify({"error": str(e)})

@app.route('/getdata', methods=['POST'])
def getdata():
    data = get_data()
    try:
        columns = ['YEAR', 'BKT_P']
        df = data[columns].copy()
        send_data = [{"YEAR": df['YEAR'].tolist(), "BKT_P": df['BKT_P'].tolist()}]
        return jsonify({"Get_Data": send_data})
    except Exception as e:
        return jsonify({"error": str(e)})

if __name__ == "__main__":
    port = int(os.environ.get("PORT", 10000))
    app.run(host="0.0.0.0", port=port)
