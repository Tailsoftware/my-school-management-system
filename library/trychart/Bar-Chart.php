<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

//Better to construct options first and then pass it as a parameter
var options = {
	animationEnabled: true,
	title: {
		text: "performance",   ///title of the chart             
		fontColor: "Peru"
	},	
	axisY: {
		tickThickness: 0,
		lineThickness: 0,
		valueFormatString: " ",
		gridThickness: 0                    
	},
	axisX: {
		tickThickness: 0,
		lineThickness: 0,
		labelFontSize: 18,
		labelFontColor: "Peru"				
	},
	data: [{
		indexLabelFontSize: 26,
		toolTipContent: "<span style=\"color:#62C9C3\">{indexLabel}:</span> <span style=\"color:#CD853F\"><strong>{y}</strong></span>",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
		indexLabelFontWeight: 600,
		indexLabelFontFamily: "Verdana",
		color: "#62C9C3",
		type: "bar",
		dataPoints: [
			{ y: 21, label: "21%", indexLabel: "Video" },
			{ y: 25, label: "25%", indexLabel: "Dining" },
			{ y: 33, label: "33%", indexLabel: "Entertainment" },
			{ y: 36, label: "36%", indexLabel: "News" },
			{ y: 42, label: "42%", indexLabel: "Music" },
			{ y: 49, label: "49%", indexLabel: "Social Networking" },
			{ y: 50, label: "50%", indexLabel: "Maps/ Search" },
			{ y: 55, label: "55%", indexLabel: "Weather" },
			{ y: 61, label: "61%", indexLabel: "Games" }
		]
	}]
};

$("#chartContainer").CanvasJSChart(options);
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="jquery.js"></script>
<script src="jquery.canvasjs.min.js"></script>
</body>
</html>