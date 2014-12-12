
<?php


	$arrayOfChartObjects;
?>

<h2>User Content Frequency</h2>
<canvas id="canvas" height="400" width="400"></canvas>
<!--<canvas id="canvas1" height="200" width="300"></canvas>-->
<script>


<!-- var barChartData = {-->
<!---->
<!--		labels : [--><?php //foreach($arrayOfChartObjects as $arr){ echo $arr["u_name"];}?><!--],-->
<!--		datasets : [-->
<!--			{-->
<!--				fillColor : "rgba(220,220,220,0.5)",-->
<!--				strokeColor : "rgba(220,220,220,0.8)",-->
<!--				highlightFill: "rgba(220,220,220,0.75)",-->
<!--				highlightStroke: "rgba(220,220,220,1)",-->
<!--				data : [--><?php //foreach($arrayOfChartObjects as $arr){ echo $arr["a_count"];}?><!--]-->
<!-- 			},-->
<!---->
<!--	 var ctx1 = document.getElementById("canvas1").getContext("2d");-->
<!-- window.myBar = new Chart(ctx1).Bar(barChartData, {-->
<!--	 responsive : true-->
<!-- });-->
<!--		]-->
<!---->
<!-- }-->
<?php

?>

        var doughnutData = [
            <?php foreach($arrayOfChartObjects as $arr):?>
            {
                value: <?php echo $arr["a_count"];?>,
                color:"#<?php $color = substr(md5(rand()), 0, 6);echo $color;?>",
                highlight: "#5AD3D1",
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
        window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : false});


</script>