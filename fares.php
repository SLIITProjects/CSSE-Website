<?php

include './classes/faresClass.php';

/**Creating an object from the faresClass in ./classes/faresClass.php*/
$faresClass = new faresClass();

/**Gets pie chart data */
$pieChartData = $faresClass->piechartData();

/**Gets bar chart data */
$barChartData = $faresClass->barchartData();

/**Gets vertical bar chart data */
$vbarChartData = $faresClass->vbarchartData();

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
        
        /**Pie chart load */
        var chart1 = new CanvasJS.Chart("pieChart", {
            animationEnabled: true,
            exportEnabled: true,
            data: [{
                type: "pie",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - #percent%",
                yValueFormatString: "Rs #,##0",
                dataPoints: <?php echo json_encode($pieChartData, JSON_NUMERIC_CHECK); ?>
            }]
        });

        /**Bar chart load */
        var chart2 = new CanvasJS.Chart("barChart", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($barChartData, JSON_NUMERIC_CHECK); ?>
            }]
        });

        /**Vertical bar chart load */
        var chart3 = new CanvasJS.Chart("vbarChart", {
            animationEnabled: true,
            axisY: {
                title: "Income (in Rs)",
                suffix:  "k"
            },
            data: [{
                type: "bar",
                yValueFormatString: "Rs#,##0K",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontWeight: "bolder",
                indexLabelFontColor: "white",
                dataPoints: <?php echo json_encode($vbarChartData, JSON_NUMERIC_CHECK); ?>
            }]
        });
        
        chart1.render();
        chart2.render();
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
                <li class="active">
                    <a href="fares.php">
                        <i class="pe-7s-graph"></i>
                        <p>Fares Statistics</p>
                    </a>
                </li>
                <li>
                    <a href="routes.php">
                        <i class="pe-7s-graph"></i>
                        <p>Routes Statistics</p>
                    </a>
                </li>
                <li>
                    <a href="addManager.php">
                        <i class="pe-7s-user"></i>
                        <p>Add Manager</p>
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
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <!--Route Vice Income Percentage Section-->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                   
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Route Vice Income Percentage</h4>
                           </div>
                            <div class="content">
                                <div id="pieChart" style="height: 370px; width: 100%;"></div>
                                <script src="./assets/js/canvasjs.min.js"></script>
                            </div>
                        </div>
                    </div>

                    <!--Monthly income section-->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Monthly Income</h4>
                            </div>
                            <div class="content">
                                <div id="barChart" style="height: 370px; width: 100%;"></div>
                                <script src="./assets/js/canvasjs.min.js"></script>
                            </div>
                        </div>
                    </div>

                    <!--Average Daily Income For Oct section-->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Average Daily Income For OCT</h4>
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
