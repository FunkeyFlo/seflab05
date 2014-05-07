
<?php
session_start();
if (!(isset($_SESSION['count']) && $_SESSION['count'] !== '')) {
    header("location: ../index.php");
}
include '../layout/header.php';
include '../layout/sidebar.php';
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Charts</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Result Chart</title>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
	<script src="http://jquery-csv.googlecode.com/files/jquery.csv-0.71.js"></script>
		

<script>
    // load the visualization library from Google and set a listener
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    
    function drawChart() {
        // grab the CSV
        $.get("external/TI-sampledata.csv", function(csvString) {
            // transform the CSV string into a 2-dimensional array
            var arrayData = $.csv.toArrays(csvString, {onParseValue: $.csv.hooks.castToScalar});
            
            // use arrayData to load the select elements with the appropriate options
            for (var i = 0; i < arrayData[0].length; i++) {
                // this adds the given option to both select elements
                $("select").append("<option value='" + i + "'>" + arrayData[0][i] + "</option");
            }
            // set the default selection
            $("#domain option[value='0']").attr("selected","selected");
            $("#range option[value='1']").attr("selected","selected");
            
            // this new DataTable object holds all the data
            var data = new google.visualization.arrayToDataTable(arrayData);
            
            // this view can select a subset of the data at a time
            var view = new google.visualization.DataView(data);
            view.setColumns([0,4,5,6,7,8]);
            
            var options = {
                title: "Test Results",
                hAxis: {title: data.getColumnLabel(0), minValue: data.getColumnRange(0).min, maxValue: data.getColumnRange(0).max},
                vAxis: {title: data.getColumnLabel(1), minValue: data.getColumnRange(1).min, maxValue: data.getColumnRange(1).max},
                legend: 'none'
            };
            
            var chart = new google.visualization.LineChart(document.getElementById('chart'));
            chart.draw(view, options);
            
            // set listener for the update button
            $("select").change(function(){
                // determine selected domain and range
                var domain = +$("#domain option:selected").val();
                var range = +$("#range option:selected").val();
                
                
                
                // update the view
                view.setColumns([domain,range]);
                
                // update the options
                options.hAxis.title = data.getColumnLabel(domain);
                options.hAxis.minValue = data.getColumnRange(domain).min;
                options.hAxis.maxValue = data.getColumnRange(domain).max;
                options.vAxis.title = data.getColumnLabel(range);
                options.vAxis.minValue = data.getColumnRange(range).min;
                options.vAxis.maxValue = data.getColumnRange(range).max;
                
                // update the chart
                chart.draw(view, options);
            });
        });
    }
</script>
	</head>
	<body>
		<div id="chart" style="width: 900px; height: 500px;"></div>
		
		<a href="external/TI-sampledata.csv"><img src="external/csv.jpg" alt="Download Raw Data"></a>
		
		
	</body>