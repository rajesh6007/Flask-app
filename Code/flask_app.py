import os
from flask import Flask, request, jsonify, render_template
import joblib
import pandas as pd
import numpy as np
from flask_cors import CORS  # Import CORS

# Load the trained model
MODEL_PATH = "model.pkl"  # Path to your saved model
best_model = joblib.load(MODEL_PATH)



# Initialize the Flask app
app = Flask(__name__)
CORS(app)               # Enables cross-origin requests
#CORS(app)  # Enable CORS to allow requests from different origins

# Route for the home page
#@app.route('/')
#def home():
#    return render_template('Pages/index.php')

#templates/Pages/index.php


# Route to handle predictions
@app.route('/predict', methods=['POST'])

 #model = best_model()

def predict():
    try:

   
        data = pd.read_csv("Data_read.csv")
        # Parse input data
        test_data = data.iloc[-11:].copy()  # Use the last 3 rows for initialization

        #num_years = int(request.form["years"])  # Get forecast years

        num = request.get_json()
        num_years = int(num.get('years',1))

        n_forecast = num_years - test_data['YEAR'].iloc[-1]
        
        if n_forecast < 1 or n_forecast > 5:
            return jsonify({'error': 'Years must be between 1 and 5'})

        # Initialize the forecast
        future_forecast = []

        columns = ['sales_log','YEAR','BKT_A','BKT_Y','KTM_A','KTM_P','KTM_Y','LLT_A','LLT_P','LLT_Y','lag_1','lag_2', 'lag_3','rolling_mean_3','rolling_std_3']
        #'lag_1','lag_2','lag_3'

        last_known_values = test_data[columns].iloc[-1]
        #last_known_values_not_used = test_data[columns].iloc[-1]

        

        #print(last_known_values)
        print(n_forecast)
        for _ in range(int(n_forecast)):
            # Predict the next value
        
            next_pred = best_model.predict([last_known_values])
            #future_forecast.append(next_pred[0])
            if _ >= 3 :
                next_pred = next_pred - (next_pred*(_+0.2)/10)
            else:
                next_pred = next_pred - (next_pred*(_+1)/10)


            print(next_pred)
            # Update lag features
            last_known_values['YEAR'] = last_known_values["YEAR"] + 1
            last_known_values['lag_1'] = last_known_values['lag_2']  # Shift lag_2 to lag_1
            last_known_values['lag_2'] = last_known_values['lag_3']  # Shift lag_3 to lag_2
            last_known_values['lag_3'] = next_pred  # Update lag_3 with the predicted value


            #test_data['sales_log'].iloc[+1] = next_pred[0]  # Update lag_3 with the predicted value
                # Update rolling mean and std for exogenous features
            for col in ['sales_log', 'KTM_A', 'KTM_Y', 'LLT_A', 'LLT_Y']:
                last_known_values[col] = test_data[col].rolling(8).mean().iloc[-1]
                last_known_values[col] = last_known_values[col] - (last_known_values[col]*_/10)
            
            for col in ['BKT_A', 'BKT_Y']:
                last_known_values[col] = test_data[col].rolling(8).mean().iloc[-1]
                if _==1:
                    last_known_values[col] = last_known_values[col] - (last_known_values[col]*(_+1.5)/10)
                elif _ >= 3:
                    last_known_values[col] = last_known_values[col] - (last_known_values[col]*(_+0.2)/10)
                else :
                    last_known_values[col] = last_known_values[col] - (last_known_values[col]*(_)/10)

            for col in ['KTM_P', 'LLT_P']:
                last_known_values[col] = test_data[col].rolling(8).mean().iloc[-1]
                last_known_values[col] = last_known_values[col] - (last_known_values[col]*_/100)

            # Update rolling mean and std
            rolling_window = np.array([last_known_values['lag_1'], last_known_values['lag_2'], last_known_values['lag_3']])
            last_known_values['rolling_mean_3'] = rolling_window.mean()  # Update rolling_mean_3
            last_known_values['rolling_std_3'] = rolling_window.std()   # Update rolling_std_3

            print(last_known_values)
            test_data = pd.concat([test_data, pd.DataFrame([last_known_values])], ignore_index=True)
            test_data['BKT_P'].iloc[-1] = next_pred[0] 
            data = pd.concat([data, pd.DataFrame([last_known_values])], ignore_index=True)
           # test_data['is_forecasted'].iloc[-1] = True

                        # Store forecast
        future_forecast.append({
                "YEAR": int(test_data['YEAR'].iloc[-1]),
                "BKT_A": float(test_data['BKT_A'].iloc[-1]), 
                "BKT_Y": float(test_data['BKT_Y'].iloc[-1]), 
                "BKT_P": float(test_data['BKT_P'].iloc[-1])
        })
        
        #print(f'future forecast',future_forecast)
        #  Make predictions

        response_data = {"Future Forecast": future_forecast}
       # print(response_data)  # Debugging print
        return jsonify(response_data)

    except Exception as e:
        print("Error:", str(e))
        return jsonify({"error": str(e)})

# Main entry point
#if __name__ == '__main__':
#    app.run(debug=True)

@app.route('/getdata', methods=['POST'])


def getdata() :
    try:
        
        data = pd.read_csv("Data_read.csv")
       
        columns = ['YEAR', 'BKT_P']
        df = data[columns].copy()
       # df = pd.DataFrame([df])
    
        send_data = []
        send_data.append({
            "YEAR": df['YEAR'].tolist(),
            "BKT_P": df['BKT_P'].tolist()
        })

      
        # response_data = {"Get Data": send_data} # original by rajesh
        response_data = {"Get_Data": send_data} # Edited by sushan third party
        return jsonify(response_data)
        
    except Exception as e:
        print("Error:", str(e))
        return jsonify({"error": str(e)})
    

if __name__ == '__main__':
    #app.run(host = '0.0.0.0', port=int(os.environ.get('PORT', 8000)))
    
    app.run(host='0.0.0.0', port=8000, debug=True)

