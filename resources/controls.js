$(document).ready(function() {

$('#menugraph').next().children().each(function(){
	$(this).on("click", function(){
		link=$($(this).children()[0]);
		graphid=$(this).children()[0].attributes['graphid'].value;
		if (graphid.indexOf(' ') >= 0) { //several items must be clicked, split the string and click them
			graphs = graphid.split(" ");
			for (i=0;i<graphs.length;i++) {
				$(this).parent().find("[graphid|='"+graphs[i]+"']").click()
			}
		} else { 
			if (link.hasClass("optionselected")) {
				chart.getGraphById(graphid).hidden=true;
			} else {
				chart.getGraphById(graphid).hidden=false;
			}
			link.toggleClass('optionselected');
			$('#menubutton').click();
			redrawChart();
		}
	});
});

$('#menuarea').next().children().each(function(){
	$(this).on("click", function(){
		link=$($(this).children()[0]);
		graphid=$(this).children()[0].attributes['graphid'].value;
		if (link.hasClass("optionselected")) {
			chart.getGraphById(graphid).fillAlphas=0;
		} else {
			chart.getGraphById(graphid).fillAlphas=0.2;
		}
		$('#menubutton').click();
		link.toggleClass('optionselected');
		redrawChart();
	});
});


$('#menunegativecolor').next().children().each(function(){
	$(this).on("click", function(){
		link=$($(this).children()[0]);
		graphid=$(this).children()[0].attributes['graphid'].value;
		if (link.hasClass("optionselected")) {
			chart.getGraphById(graphid).useNegativeColorIfDown=false;
		} else {
			chart.getGraphById(graphid).useNegativeColorIfDown=true;
		}
		$('#menubutton').click();
		link.toggleClass('optionselected');
		redrawChart();
	});
});

function toggleFullScreen() {
	var doc = window.document;
	var docEl = doc.documentElement;
	
	var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
	var cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;
	
	if(!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
		requestFullScreen.call(docEl);
	}
	else {
		cancelFullScreen.call(doc);
	}
}

$('#fullscreentoggle').on("click",function(){
	toggleFullScreen();
	redrawChart();
});

//scroll the adressbar away.
window.scrollTo(0,1);

//add the legend next to the graph names
$('#menugraph').next().children().each(function(){
	if ($(this).attr('legend')=='true') {
		link=$($(this).children()[0]);
		graphid=$(this).children()[0].attributes['graphid'].value;
		color=chart.getGraphById(graphid).lineColor;
		if (color == null){
			color=chart.getGraphById(graphid).lineColorR;
		}
		link.prepend('<span class="legendinmenu" style="background-color:'+color+';"></span>');
	}
});

});
