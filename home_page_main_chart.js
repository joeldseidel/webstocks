$(document).ready(init());

function init(){
    var startup_graph_data = {function_type : 'TIME_SERIES_INTRADAY', symbol : 'DJI', output_size : 'full', intraday_interval : '1min'};
    $.ajax({
        type: "POST",
        url: './php/api_interaction.php',
        data: JSON.stringify(startup_graph_data),
        success: function(query_return){
            console.log(query_return);
            //parseRecordsData(queryData);
        },
        failure: function(errorMessage){
            console.log(errorMessage);
        }
    });
}

function parseRecordsData(recordsData){
    var dataPoints = [];
    var allRecords = JSON.parse(recordsData);
    for(var i in allRecords){
        dataPoints.push({x: new Date(i.toString()), y: parseFloat((allRecords[i])['4. close'])});
    }
    return dataPoints;
}

function drawGraph(dataPoints){
    var chart = new CanvasJS.Chart('chartContainer', {
        theme: "theme1",
        zoomEnabled: true,
        animationEnabled: true,
        title: {
            text: "Dow Jones Industrial Average"
        },
        subtitles: [
            {text: "By minute on current trading day"}
        ],
        data: [{
            type: "line",
            dataPoints: dataPoints
        }]
    });
    //Send the data points off to the external server to build the chart
    chart.render();
}