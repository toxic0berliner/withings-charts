<!--GRAPH BEGIN -->
   		<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>
		<script src="./resources/responsive.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
function resizeElementHeight(element) {
  var height = 0;
  var body = window.document.body;
  if (window.innerHeight) {
      height = window.innerHeight;
  } else if (body.parentElement.clientHeight) {
      height = body.parentElement.clientHeight;
  } else if (body && body.clientHeight) {
      height = body.clientHeight;
  }
  element.style.height = ((height - element.offsetTop) + "px");
}

window.onload = function () {
	resizeElementHeight(document.getElementById('chartdiv'));
};
$(window).resize(function(){
	resizeElementHeight(document.getElementById('chartdiv'));
});
/*	var balloonTextFontSize=15;
	var balloonFontSize=15;
	
	var valueAxisFontSize = 15;
	var valueAxisTitleFontSize=15;
	var categoryAxisFontSize=15;
	var legendFontSize = 15;*/
	var bulletSize=5;
	var lineThickness=2;
	var useNegativeColorIfDown=false;
	/*
	var scrollbarHeight=20;
*/	
	window.mobilecheck = function() {
		var check = false;
		(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
		return check;
	};
	if (window.mobilecheck()) {
		/*balloonTextFontSize=30;
		balloonFontSize=30;
		
		valueAxisFontSize = 30;
		valueAxisTitleFontSize=30;
		categoryAxisFontSize=30;
		legendFontSize = 30;
		bulletSize=20;
		lineThickness=8;
		scrollbarHeight=50;*/
		//alert("on mobile");
	} else {
		//alert("NOT mobile !!!");
	};
	
</script>
	
		<!-- amCharts javascript code -->
		<script type="text/javascript">
			var chart = AmCharts.makeChart("chartdiv",
				{
					"type": "serial",
					"categoryField": "TimeStamp",
					"dataDateFormat": "YYYY-MM-DD HH:NN:SS",
					"colors": [
						"#FF6600",
						"#FCD202",
						"#6074ea",
						"#67d642",
						"#2A0CD0",
						"#CD0D74",
						"#CC0000",
						"#00CC00",
						"#0000CC",
						"#DDDDDD",
						"#999999",
						"#333333",
						"#990000"
					],
					"theme": "default",
					"categoryAxis": {
						"minPeriod": "ss",
						"parseDates": true,
						//"fontSize": categoryAxisFontSize,
					},
					"responsive": {
						"enabled": true
					},
					"chartCursor": {
						"enabled": true,
						"animationDuration": 0,
						"categoryBalloonDateFormat": "YYYY-MM-DD EEEE HH:NN",
						"valueLineEnabled": true,
						"valueLineBalloonEnabled": true,
					},
					"chartScrollbar": {
						"enabled": true,
						//"scrollbarHeight": scrollbarHeight,
					},
					"trendLines": [],
					"graphs": [
						{
							"bullet": "round",
							"id": "weight",
							"title": "Weight",
							"valueField": "Weight",
							"bulletBorderAlpha": 1,
        					"bulletColor": "#FFFFFF",
							"bulletSize": bulletSize,
							"lineThickness": lineThickness,
							"useLineColorForBulletBorder": true,
							//"balloonText": "<span style='font-size:"+balloonTextFontSize+"px;'>[[value]] kg</span>",
							"useNegativeColorIfDown": false,
							"negativeLineColor": "#cc6600",
							"lineColor": "#ff6600",
							//"fillColorsField": "lineColor",
							"fillAlphas": 0.3,
							"negativeFillColors":"#2bc405",
							"fillColors": "#fc8a00",
						},
						{
							"bullet": "round",
							"hidden": true,
							"id": "fat",
							"tabIndex": -4,
							"title": "Fat",
							"valueAxis": "partialWeightPercent",
							"valueField": "Fat",
							"bulletBorderAlpha": 1,
        					"bulletColor": "#FFFFFF",
							"bulletSize": bulletSize,
							"lineThickness": lineThickness,
							"useLineColorForBulletBorder": true,
							//"balloonText": "<span style='font-size:18px;'>[[value]] kg</span>",
							"negativeLineColor": "#b09303",
							"lineColor": "#fcd202",
							//"fillColorsField": "lineColor",
							"fillAlphas": 0,
							"negativeFillColors":"#2bc405",
							"fillColors": "#fc8a00",
						},
						{
							"bullet": "round",
							"hidden": true,
							"fillColors": "#0000FF",
							"id": "water",
							"legendColor": "#0000FF",
							"title": "Water",
							"valueAxis": "partialWeightPercent",
							"valueField": "Water",
							"bulletBorderAlpha": 1,
        					"bulletColor": "#FFFFFF",
							"bulletSize": bulletSize,
							"lineThickness": lineThickness,
							"useLineColorForBulletBorder": true,
							//"balloonText": "<span style='font-size:18px;'>[[value]] kg</span>",
							"negativeLineColor": "#0f1d71",
							"lineColor": "#6074ea",
							//"fillColorsField": "lineColor",
							"fillAlphas": 0,
							"negativeFillColors":"#2bc405",
							"fillColors": "#fc8a00",
						},
						{
							"bullet": "round",
							"hidden": true,
							"id": "muscle",
							"title": "Muscle",
							"valueAxis": "partialWeightPercent",
							"valueField": "Muscle",
							"bulletBorderAlpha": 1,
        					"bulletColor": "#FFFFFF",
							"bulletSize": bulletSize,
							"lineThickness": lineThickness,
							"useLineColorForBulletBorder": true,
							//"balloonText": "<span style='font-size:18px;'>[[value]] kg</span>",
							"negativeLineColor": "#235412",
							"lineColor": "#67d642",
							//"fillColorsField": "lineColor",
							"fillAlphas": 0,
							"negativeFillColors":"#2bc405",
							"fillColors": "#fc8a00",
						},
						{
							"bullet": "round",
							"hidden": true,
							"id": "bmi",
							"title": "BMI",
							"valueAxis": "bmi",
							"valueField": "BMI",
							"bulletBorderAlpha": 1,
        					"bulletColor": "#FFFFFF",
							"bulletSize": bulletSize,
							"lineThickness": lineThickness,
							"useLineColorForBulletBorder": true,
							//"balloonText": "<span style='font-size:18px;'>[[value]] kg.m<sup>-2</sup></span>",
							"precision": 1,
							"negativeLineColor": "black",
							"lineColor": "#2a0cd0",
							//"fillColorsField": "lineColor",
							"fillAlphas": 0,
							"negativeFillColors":"#2bc405",
							"fillColors": "#fc8a00",
						},
						{
							"bullet": "round",
							"hidden": true,
							"id": "bone",
							"title": "Bone",
							"valueAxis": "partialWeightKg",
							"valueField": "Bone",
							"bulletBorderAlpha": 1,
        					"bulletColor": "#FFFFFF",
							"bulletSize": bulletSize,
							"lineThickness": lineThickness,
							"useLineColorForBulletBorder": true,
							//"balloonText": "<span style='font-size:18px;'>[[value]] kg</span>",
							"negativeLineColor": "#660080",
							"lineColor": "#cc00ff",
							//"fillColorsField": "lineColor",
							"fillAlphas": 0,
							"negativeFillColors":"grey",
							"fillColors": "grey",
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "weight",
							"title": "Weight (kg)",
							//"fontSize": valueAxisFontSize,
							//"titleFontSize": valueAxisTitleFontSize,
						},
						{
							"id": "partialWeightKg",
							"position": "right",
							"title": "Partial Weights (kg)",
							"offset": 65,
							//"fontSize": valueAxisFontSize,
							//"titleFontSize": valueAxisTitleFontSize,
						},
						{
							"id": "partialWeightPercent",
							"position": "right",
							"title": "Partial weight (% of weight)",
							//"fontSize": valueAxisFontSize,
							//"titleFontSize": valueAxisTitleFontSize,
						},
						{
							"id": "bmi",
							"position": "right",
							"title": "BMI (kg/m/m)",
							"offset": 65,
							//"fontSize": valueAxisFontSize,
							//"titleFontSize": valueAxisTitleFontSize,
						}
					],
					"allLabels": [],
					"balloon": {
						//"fontSize": balloonFontSize,
					},
					"legend": {
						"enabled": false,
						"useGraphSettings": true,
						//"fontSize": legendFontSize,
						//"spacing": 0,
					},
					"dataProvider": [  

