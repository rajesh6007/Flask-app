import os
from flask import Flask, request, jsonify, render_template
import joblib
import pandas as pd
import numpy as np

# Load the trained model
MODEL_PATH = "model.pkl"  # Path to your saved model
best_model = joblib.load(MODEL_PATH)

data = pd.read_csv("Data_read.csv")

# Initialize the Flask app
app = Flask(__name__)

# Route for the home page
@app.route('/')
def home():
    return render_template('website.html')

# Route to handle predictions
@app.route('/predict', methods=['POST'])
def predict():
    try:
        # Parse input data

        num_years = int(request.form["years"])  # Get forecast years


        test_data = data.iloc[-6:].copy()  # Use the last 3 rows for initialization
        #model = best_model()

        # Initialize the forecast
        future_forecast = []

        columns = ['sales_log','YEAR','BKT_A','BKT_Y','KTM_A','KTM_P','KTM_Y','LLT_A','LLT_P','LLT_Y','rolling_mean_3','rolling_std_3']
        #'lag_1','lag_2','lag_3'

        last_known_values = test_data[columns].iloc[-1]
        #last_known_values_not_used = test_data[columns].iloc[-1]

        n_forecast = num_years - test_data['YEAR'].iloc[-1]

        for _ in range(n_forecast):
            # Predict the next value
        
            next_pred = best_model.predict([last_known_values])
            future_forecast.append(next_pred[0])

            # Update lag features
            last_known_values['YEAR'] = last_known_values["YEAR"] + 1
            last_known_values['lag_1'] = last_known_values['lag_2']  # Shift lag_2 to lag_1
            last_known_values['lag_2'] = last_known_values['lag_3']  # Shift lag_3 to lag_2
            last_known_values['lag_3'] = next_pred  # Update lag_3 with the predicted value


            #test_data['sales_log'].iloc[+1] = next_pred[0]  # Update lag_3 with the predicted value
                # Update rolling mean and std for exogenous features
            for col in ['sales_log','BKT_A', 'BKT_Y', 'KTM_A', 'KTM_P', 'KTM_Y', 'LLT_A', 'LLT_P', 'LLT_Y']:
                last_known_values[col] = test_data[col].rolling(6).median().iloc[-1]


            # Update rolling mean and std
            rolling_window = np.array([last_known_values['lag_1'], last_known_values['lag_2'], last_known_values['lag_3']])
            last_known_values['rolling_mean_3'] = rolling_window.mean()  # Update rolling_mean_3
            last_known_values['rolling_mean_3'] = rolling_window.std()   # Update rolling_std_3

            print(last_known_values)
            test_data = pd.concat([test_data, pd.DataFrame([last_known_values])], ignore_index=True)
            test_data['BKT_P'].iloc[-1] = next_pred[0] 
            test_data['is_forecasted'].iloc[-1] = True
            print(test_data)


        
        #  Make predictions
        #prediction = model.predict(input_data)

        # Return prediction as JSON
        return jsonify({"prediction": prediction.tolist()})
    except Exception as e:
        return jsonify({"error": str(e)})

# Main entry point
#if __name__ == '__main__':
#    app.run(debug=True)

if __name__ == '__main__':
    app.run(host = '0.0.0.0', port=int(os.environ.get('PORT', 5000)))


