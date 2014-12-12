
<?php


	$arrayOfChartObjects
?>

<h2>User Content Frequency</h2>
<canvas id="canvas" height="200" width="300"></canvas>
<script>


 //	var barChartData = {
<!--		labels : [--><?php
//		foreach($arrayOfChartObjects as $arr)
//		{  echo '"'.$arr["u_name"] .'", ';}?><!--"some"],-->
<!--		datasets : [-->
<!--			{-->
<!--				fillColor : "rgba(220,220,220,0.5)",-->
<!--				strokeColor : "rgba(220,220,220,0.8)",-->
<!--				highlightFill: "rgba(220,220,220,0.75)",-->
<!--				highlightStroke: "rgba(220,220,220,1)",-->
<!--				data : [--><?php
//		foreach($arrayOfChartObjects as $arr) {echo  $arr["a_count"] .', ';}?><!--1]-->
<!-- 			},-->
<!--			{-->
<!--				fillColor : "rgba(151,187,205,0.5)",-->
<!--				strokeColor : "rgba(151,187,205,0.8)",-->
<!--				highlightFill : "rgba(151,187,205,0.75)",-->
<!--				highlightStroke : "rgba(151,187,205,1)",-->
<!--				data : 2,3,4,5,6-->
<!-- 			}-->
<!--		]-->
<!---->
 //	}

        var doughnutData = [
            <?php foreach($arrayOfChartObjects as $arr):?>
            {
                value: <?php echo $arr["a_count"];?>,
                color:"#F7464A",
                highlight: "#FF5A5E",
                label:  "<?php echo strval($arr["u_name"]);?>"
            },
            <?php endforeach;?>

            {
                value: 0,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: ""
            }

        ];

        var ctx = document.getElementById("canvas").getContext("2d");
        window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});


</script>