<?php

include './routesClass.php';

/**Creating an object from the routesClass in ./classes/routesClass.php*/
$routesClass = new routesClass();

/**# Passengers Route Vice DATA */
 $barChartData = $routesClass->barchartData();

/**# Passengers Sep Vs Oct DATA */
$dataPoints = $routesClass->piechartData();

/**# Passengers Daily For OCT */
$vbarChartData = $routesClass->vbarchartData();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>TIXORA</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />


    <script>
        window.onload = function () {      
        
        var chart2 = new CanvasJS.Chart("barChart", {
            animationEnabled: true,
            axisX: {
                title: "Routes"

            },
            axisY: {
                title: "Number of Passengers"

            },
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($barChartData, JSON_NUMERIC_CHECK); ?>
            }]
        });


        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light1",
            animationEnabled: true,
         
            data: [{
                type: "doughnut",
                indexLabel: "{symbol} - {y}",
                yValueFormatString: "##",
                showInLegend: true,
                legendText: "{label} : {y}",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });


        var chart3 = new CanvasJS.Chart("vbarChart", {
            animationEnabled: true,
            axisY: {
                title: "Number of Passengers"

            },
            data: [{
                type: "bar",
                yValueFormatString: "##0",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontWeight: "bolder",
                indexLabelFontColor: "white",
                dataPoints: <?php echo json_encode($vbarChartData, JSON_NUMERIC_CHECK); ?>
            }]
        });

        chart2.render();
        chart.render();
        chart3.render();
        
        }
    </script>

    
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-4.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
			<div class="logo">
                <a href="#" class="simple-text">
                    TIXORA
                </a>
            </div>
                <ul class="nav">
                <li>
                    <a href="fares.php">
                        <i class="pe-7s-graph"></i>
                        <p>Fares Statistics</p>
                    </a>
                </li>
                <li  class="active">
                    <a href="routes.php">
                        <i class="pe-7s-graph"></i>
                        <p>Routes Statistics</p>
                    </a>
                </li>
                </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">             
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                   
                    <div class="col-md-12">
                        <div class="card">

                            <div class="header">
                                <h4 class="title"># Passengers Route Vice</h4>
                           </div>
                            <div class="content">
                                <div id="barChart" style="height: 370px; width: 100%;"></div>
                                <script src="./assets/js/canvasjs.min.js"></script>
                            </div>
                        </div>
                    </div>

                <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"># Passengers
                                    <?php
                                        echo date('M', strtotime('-1 month'))." VS ".date('M');
                                    ?>
                                </h4>
                            </div>
                            <div class="content">
                                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                <script src="./assets/js/canvasjs.min.js"></script>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">

                                <h4 class="title"># Passengers Daily For
                                    <?php
                                        echo date('M');
                                    ?>
                                </h4>
                            </div>
                            <div class="content">
                              <div id="vbarChart" style="height: 370px; width: 100%;"></div>
                              <script src="./assets/js/canvasjs.min.js"></script>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>


</body>

	<!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome"

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
