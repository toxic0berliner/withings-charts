 ]
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
<!--GRAPH END-->
