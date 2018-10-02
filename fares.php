<?php
 
$pieChartData= array(
	array("label"=> "1/3 (Colomobo-Kandy)", "y"=> 590),
	array("label"=> "22 (Anduradhpura-Kandy)", "y"=> 261),
	array("label"=> "1/44 (Jaffna-Colombo)", "y"=> 158),
	array("label"=> "77 (Galle-Kalutara)", "y"=> 72),
	array("label"=> "88 (Kandy-Galle)", "y"=> 191),
	array("label"=> "103 (Kaduwela-Malabe)", "y"=> 573)
);

$barChartData = array(
	array("label"=> "Jan", "y"=> 284935),
	array("label"=> "Feb", "y"=> 256548),
	array("label"=> "Mar", "y"=> 245214),
	array("label"=> "Apr", "y"=> 233464),
	array("label"=> "May", "y"=> 200285),
	array("label"=> "Jun", "y"=> 194422),
	array("label"=> "Jul", "y"=> 180337),
	array("label"=> "Aug", "y"=> 172340),
	array("label"=> "Sep", "y"=> 118187),
	array("label"=> "Oct", "y"=> 107530)
);
    
$vbarChartData = array( 
	array("y" => 7,"label" => "Mon" ),
	array("y" => 12,"label" => "Tue" ),
	array("y" => 28,"label" => "Wed" ),
	array("y" => 18,"label" => "THU" ),
    array("y" => 41,"label" => "FRI" ),
    array("y" => 15,"label" => "SAT" ),
    array("y" => 1,"label" => "SUN" )
);

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

        var chart2 = new CanvasJS.Chart("barChart", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($barChartData, JSON_NUMERIC_CHECK); ?>
            }]
        });

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
