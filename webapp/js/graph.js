function updateChart(ecg_data){
    answer = ecg_data;
    var trace1 = {
        type: "scatter",
        mode: "line",
        name: 'FHR',
        y: answer[0],
        line: {color: '#17BECF'}
    }
    var trace2 = {
        type: "scatter",
        mode: "line",
        name: 'UC',
        y: answer[1],
        line: {color: '#FF0010'}
    }

    var data = [trace1, trace2];
    
    var layout = {
        title: 'ECG Report'
    };
    
    var configPlotly = {
        showSendToCloud: true,
        scrollZoom: true
    };  
    Plotly.newPlot('chart-holder', data, layout, configPlotly);
}

function updateReport(stats, data){
    updateChart(data);
    var progressbar = document.querySelector(".report .progress-bar");
    var situation = document.querySelector(".current-situation p");
    var steps = document.querySelector("#situation");
    var current = stats.Label;
    switch (current) {
        case 0:
            progressbar.style.width = "0%";
            situation.innerHTML = "Uninterpretable";
            steps.innerHTML = `
            <ul>
                <li><p>Nothing can be ascertained.</p></li>
            </ul>
            `;
            break;
        
        case 1:
            progressbar.style.width = "100%";
            progressbar.style.backgroundColor = "#19FF43";
            situation.innerHTML = "Normal - No Hypoxia";
            steps.innerHTML = `
            <ul>
                <li><p>All is normal but keep a check.</p></li>
            </ul>
            `;
            break;
    
        case 2:
            progressbar.style.width = "50%";
            progressbar.style.backgroundColor = "#FF8819";
            situation.innerHTML = "Suspicious - Mild Hypoxia";
            steps.innerHTML = `
            <ul>
                <li><p>Keep a check on oxygen level.</p></li>
                <li><p>An inhaler or asthma medicine by mouth may make breathing easier.</p></li>
            </ul>
            `;
            break;

        case 3:
            progressbar.style.width = "100%";
            progressbar.style.backgroundColor = "#FF1919";
            situation.innerHTML = "Suspicious - Severe Hypoxia";
            steps.innerHTML = `
            <ul>
                <li><p>Use medications to treat underlying conditions.</p></li>
                <li><p>Change the room temperature.</p></li>
                <li><p>Try a machine to make breathing easy.</p></li>
            </ul>
            `;
            break;

        default:
            progressbar.style.width = "0%";
            situation.innerHTML = "Nothing Available";
            steps.innerHTML = `
            <ul>
                <li><p>Nothing Available.</p></li>
            </ul>
            `;
            break;
    }
}
var answer = [
    {
      "Rec_id": 1001,
      "Label": 1
    }
];