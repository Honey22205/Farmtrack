from flask import Flask, render_template, request

app = Flask(__name__)

def calculate_fts_score(data):
    try:
        if data['Farm_Size (acres)'] > 0:
            score = (data['Production_Level (kg)'] / data['Farm_Size (acres)']) * 10
        else:
            score = 0
    except ZeroDivisionError:
        score = 0
    return round(score)

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        # Collect data from the form
        crop_type = request.form['cropType']
        market_prices = request.form['marketPrices']
        location = request.form['location']
        excess_production = request.form['excessProduction']
        farm_size = request.form['farmSize']
        water_source = request.form['waterSource']
        sowing_time = request.form['sowingTime']
        fertilizer_type = request.form['fertilizerType']
        harvest_time = request.form['harvestTime']
        other_info = request.form['otherInfo']

        data = {
            "Farm_Size (acres)": float(farm_size),
            "Crop_Type": crop_type,
            "Production_Level (kg)": float(excess_production),
            "Fertilizer_Usage (kg)": 0,
            "Water_Usage (liters)": 0,
            "Yield (kg)": 0,
            "Previous_FTS_Score": 0,
        }

        fts_score = calculate_fts_score(data)
        suggestions = "Consider optimizing your fertilizer usage for better yields."
        
        return render_template('result.html', fts_score=fts_score, suggestions=suggestions)

    return render_template('index.html')

if __name__ == '__main__':
    app.run(debug=True)

