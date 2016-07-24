<?php
/* RESUME HTML 1 */
?> ]
				}
			);
	chart.addListener("rendered", zoomChart);
	zoomChart();
	var firstzoom=true;
	var zoomstartTime=chart.categoryAxis.startTime;
	var zoomendTime=zoomstartTime + chart.categoryAxis.timeDifference;

	// this method is called when chart is first inited as we listen for "rendered" event
	function zoomChart() {
		if (firstzoom) {
			chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
			zoomstartTime=chart.categoryAxis.startTime;
			zoomendTime=zoomstartTime + chart.categoryAxis.timeDifference;
			firstzoom=false;
		} else {
			chart.timeZoom(zoomstartTime,zoomendTime);
		}

	}

	function redrawChart() {
		zoomstartTime=chart.categoryAxis.startTime;
		zoomendTime=zoomstartTime + chart.categoryAxis.timeDifference;
		chart.validateData();
		zoomChart();
	}
		</script>
	</head>
	<body>
		<div id="chartdiv" style="width: 100%; min-height:200px; height: 100%; background-color: #FFFFFF;font-size:18px;" ></div>

		<div id="controls" style="font-family:Arial;">
			Toogle negative colors for :
			<input type="button" value="Weight" onclick="if(chart.graphsById.weight.useNegativeColorIfDown){chart.graphsById.weight.useNegativeColorIfDown=false;redrawChart();} else {chart.graphsById.weight.useNegativeColorIfDown=true;redrawChart();}"/>
			<input type="button" value="Fat" onclick="if(chart.graphsById.fat.useNegativeColorIfDown){chart.graphsById.fat.useNegativeColorIfDown=false;redrawChart();} else {chart.graphsById.fat.useNegativeColorIfDown=true;redrawChart();}"/>
			<input type="button" value="Water" onclick="if(chart.graphsById.water.useNegativeColorIfDown){chart.graphsById.water.useNegativeColorIfDown=false;redrawChart();} else {chart.graphsById.water.useNegativeColorIfDown=true;redrawChart();}"/>
			<input type="button" value="Muscle" onclick="if(chart.graphsById.muscle.useNegativeColorIfDown){chart.graphsById.muscle.useNegativeColorIfDown=false;redrawChart();} else {chart.graphsById.muscle.useNegativeColorIfDown=true;redrawChart();}"/>
			<input type="button" value="BMI" onclick="if(chart.graphsById.bmi.useNegativeColorIfDown){chart.graphsById.bmi.useNegativeColorIfDown=false;redrawChart();} else {chart.graphsById.bmi.useNegativeColorIfDown=true;redrawChart();}"/>
			</br>
			Toogle fill colors for : <!--/**/-->
			<input type="button" value="Weight" onclick="if(chart.graphsById.weight.fillAlphas==0){chart.graphsById.weight.fillAlphas=0.2;redrawChart();} else {chart.graphsById.weight.fillAlphas=0;redrawChart();}"/>
			<input type="button" value="Fat" onclick="if(chart.graphsById.fat.fillAlphas==0){chart.graphsById.fat.fillAlphas=0.2;redrawChart();} else {chart.graphsById.fat.fillAlphas=0;redrawChart();}"/>
			<input type="button" value="Water" onclick="if(chart.graphsById.water.fillAlphas==0){chart.graphsById.water.fillAlphas=0.2;redrawChart();} else {chart.graphsById.water.fillAlphas=0;redrawChart();}"/>
			<input type="button" value="Muscle" onclick="if(chart.graphsById.muscle.fillAlphas==0){chart.graphsById.muscle.fillAlphas=0.2;redrawChart();} else {chart.graphsById.muscle.fillAlphas=0;redrawChart();}"/>
			<input type="button" value="BMI" onclick="if(chart.graphsById.bmi.fillAlphas==0){chart.graphsById.bmi.fillAlphas=0.2;redrawChart();} else {chart.graphsById.bmi.fillAlphas=0;redrawChart();}"/>
		</div>

		<?php
		if (!is_null($startdate)) {
			?><div class="info" style="font-family:Arial;">
				<p>All data before <?=$startdate?> is coming from another scale. The measures can reflect non-realistic values crossing this threshold.</p>
			</div><!-- div info changeOfScale -->
			<?php
		}
		?>

		<div class="info" style="font-family:Arial;">
			<p>The subject's size used to calculate BMI is <?=$usersize?>m.</p>
		</div><!-- div info usersize -->

		<div class="info" style="font-family:Arial;">
			<p><a href="./forcerefresh.php" style="font-size:24px;">Force resresh</a> (this data has been fetched on <?=$lastfetch?><?php
				if ($datarefreshed) {
					?>, the data HAS been refreshed for this page hit.<?
				} else {
					?>, the data has NOT been refreshed for this page hit.<?
				}
			?>)</p>
		</div><!-- div info forcerefresh -->


		<div class="debug" style="font-family:Arial;display:none;">
			<pre>
			<?php
			/*foreach($user->getMeasures() as $measure) {
				print_r($measure);
				echo "\n-----\n";
			}*/
			?>
			</pre>
		</div>
	</body>
</html>
