import os
from flask import Flask, request, jsonify, render_template
import joblib
import pandas as pd
import numpy as np

# Load the trained model
MODEL_PATH = "forecast_model.pkl"  # Path to your saved model
model = joblib.load(MODEL_PATH)

# Initialize the Flask app
app = Flask(__name__)

# Route for the home page
@app.route('/')
def home():
    return render_template('index.html')

# Route to handle predictions
@app.route('/predict', methods=['POST'])
def predict():
    try:
        # Parse input data
        data = request.json
        input_data = pd.DataFrame(data, index=[0])

        # Make predictions
        prediction = model.predict(input_data)

        # Return prediction as JSON
        return jsonify({"prediction": prediction.tolist()})
    except Exception as e:
        return jsonify({"error": str(e)})

# Main entry point
#if __name__ == '__main__':
#    app.run(debug=True)

if __name__ == '__main__':
    app.run(host = '0.0.0.0', port=int(os.environ.get('PORT', 10000)))


