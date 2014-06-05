<?php
session_start();
if (!(isset($_SESSION['count']) && $_SESSION['count'] !== '')) {
    header("location: ../index.php");
}
include '../layout/header.php';
include '../layout/sidebar.php';
echo $_POST["id"];
?>

<script>
    // load the visualization library from Google and set a listener
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    
    function drawChart() {
        // grab the CSV
		var path = "<?php 
				include '../config/database.php';
				$connection = new Database();
				$connection->openConnection(); // connected to the database
					$id = $_POST["id"];
					$jay = "../";
					//$result_id = 1;
					$a = mysql_query("SELECT `filepath_measurement` FROM `processed_uploads` WHERE `id` = '$id'") or die(mysql_error());
					$row = mysql_fetch_array($a);
					echo $jay.$row['filepath_measurement']; 
					?>";
        $.get(path, function(csvString) {
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
				explorer: {keepInBounds: true,zoomDelta:1.1, },
				rightClickToReset:{},
				backgroundColor: 'transparent',
						title: "Test Results",
						hAxis: {title: data.getColumnLabel(0), minValue: data.getColumnRange(0).min, maxValue: data.getColumnRange(0).max},
						vAxis: {title: data.getColumnLabel(1), minValue: data.getColumnRange(1).min, maxValue: data.getColumnRange(1).max},
						'legend':'right'
					};
            
            var chart = new google.visualization.LineChart(document.getElementById('chart'));
            chart.draw(view, options);
			// Wait for the chart to finish drawing before calling the getImageURI() method.
		  google.visualization.events.addListener(chart, 'ready', function () {
			chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
			console.log(chart_div.innerHTML);
		  });
		  document.getElementById('png').outerHTML = '<a href="' + chart.getImageURI() + '"><img src="external/png.jpg" alt="Download Raw Data"></a>';
            
            
            $("select").change(function(){
               
                var domain = +$("#domain option:selected").val();
                var range = +$("#range option:selected").val();
                
                
                view.setColumns([domain,range]);
                
               
                options.hAxis.title = data.getColumnLabel(domain);
                options.hAxis.minValue = data.getColumnRange(domain).min;
                options.hAxis.maxValue = data.getColumnRange(domain).max;
                options.vAxis.title = data.getColumnLabel(range);
                options.vAxis.minValue = data.getColumnRange(range).min;
                options.vAxis.maxValue = data.getColumnRange(range).max;
                
               
                chart.draw(view, options);
            });
        });
    }
</script>
		<div id="chart" style="width: 900px; height: 500px; border:2px solid ;"></div>
		<div id='png'></div>
		</body>

