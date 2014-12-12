
<?php


	$arrayOfChartObjects
?>

<h2>User Content Frequency</h2>
<canvas id="canvas" height="200" width="300"></canvas>
<script>


	var barChartData = {
		labels : [<?php
		foreach($arrayOfChartObjects['u_name'] as $arr) {echo '"'. $arr .'", ';}?>],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [<?php
		foreach($arrayOfChartObjects['a_count'] as $arr) {echo '"'. $arr .'", ';}?>]
//			},
//			{
//				fillColor : "rgba(151,187,205,0.5)",
//				strokeColor : "rgba(151,187,205,0.8)",
//				highlightFill : "rgba(151,187,205,0.75)",
//				highlightStroke : "rgba(151,187,205,1)",
//				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
//			}
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}

</script>