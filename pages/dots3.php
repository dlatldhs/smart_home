<?php
    include "db.php";
    ?>
<!DOCTYPE html>
<html>
<head>
<title>NOCKANDA EXAMPLE</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() { // 
            setInterval(function() {
                $.ajax({
                    url: "./download3.php?room_num="+<?php echo $using_room_id; ?>,
                    method: "GET",
                    dataType: "text",
                    success: function(data) {
                        // $("#result").html(data);
                        let mydata = JSON.parse(data);
                        // console.log(mydata);
                        console.log(mydata);
                        chart.data.labels = mydata.label;
                        chart.data.datasets[0].data = mydata.air_status;
                        chart.data.datasets[1].data = mydata.humi;
                        chart.update();
                    }
                })
            },1000);
        });
        function update_did(myroom_num) {
            room_num = myroom_num;
        }
</script>

</head>
<body>
<div style="width:1480px;">
<canvas id="line1"></canvas>
</div>


<script>
var ctx = document.getElementById('line1').getContext('2d');
var chart = new Chart(ctx, {
	type: 'line',
	data: {
		labels: ['N-6', 'N-5', 'N-4', 'N-3', 'N-2', 'N-1', 'N'],
        // labels: label: mydata['label'],
		datasets: [ 
                {
                    // label: mydata['label'],
					label: 'air',
					backgroundColor: 'transparent',
					borderColor: "#36E0C6",
					data: [0, 0, 0, 0, 0, 0, 0]
                    // data: mydata['humi']
				},
                {
                    // label: mydata['label'],
					label: 'humidity',
					backgroundColor: 'transparent',
					borderColor: "#FF96FF",
					data: [0, 0, 0, 0, 0, 0, 0]
                    // data: mydata['humi']
				}
		]
	},
	options: {}
});

function nockanda_forever(){
	var recv  = window.AppInventor.getWebViewString();
	chart.data.datasets[0].data.shift();
	chart.data.datasets[0].data.push(recv);
	//chart.data.labels.shift();
	chart.update();
}
</script>
</body>
</html>