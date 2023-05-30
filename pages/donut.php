﻿<!DOCTYPE html>
<html>
<head>
<title>NOCKANDA EXAMPLE</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
</head>
<body>


<div style="position:relative;width:300px; height:300px; padding-top:55px;">
	<canvas id="myChart"></canvas>
	<div id="cap" style="position:absolute;top:170px;left:0px;text-align:center;width:100%;font-size:55px;font-family:Arial, sans-serif; color:white; ">
	<?php echo $humi_val; ?>'C
	</div>
</div>


<script>
var input_value = <?php echo $humi_val; ?>;
var max_value = 100;
var num = input_value/max_value;
var color = '#FF96FF';
var data = { labels: [input_value ], datasets: [ { data: [num, 1-num], backgroundColor: [color], hoverBackgroundColor: [ color ] }] }; 
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
type: 'doughnut',
data: data,
options: { 
   responsive: true, 
   legend: { display: false }, 
   elements: { center: { text: Math.round(num*100), fontStyle: 'Helvetica', sidePadding: 15 } }, 
   maintainAspectRatio : false, 
   cutoutPercentage:70 } 
});
function nockanda_forever(){
var recv  = window.AppInventor.getWebViewString();
//var recv  = 90;
newval   = recv/max_value;
chart.data.datasets[0].data[0] = newval;
chart.data.datasets[0].data[1] = 1-newval;
chart.data.labels[0] = recv;
document.getElementById("cap").innerHTML = recv + "'C";
chart.update();
}

</script>
</body>
</html>