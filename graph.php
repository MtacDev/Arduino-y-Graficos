<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
<body style="padding-top: 0px;">
    <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Site Traffic Overview
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
                                                    <canvas class="main-chart" id="line-chart" style="height: 600; width: 100%" ></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
        <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <?php
            
            $data = file_get_contents( "php://input" ); //$data is now the string '[1,2,3]';
            $data = json_decode( $data ); //$data is now a php array array(1,2,3)    
            echo 'we'.$data[0];
        ?>
         
	<script>     
           (function ($, Drupal, drupalSettings) {
           Drupal.behaviors.my_library = {
             attach: function (context, settings) {

               alert(drupalSettings.my_library.some_variable); //alerts the value of PHP's $value

             }
           };
         })(jQuery, Drupal, drupalSettings);
        function getRandomIntInclusive(min, max) {
          min = Math.ceil(min);
          max = Math.floor(max);
          return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        // create initial empty chart
        var ctx_live = document.getElementById("line-chart");
        var myChart = new Chart(ctx_live, {
          type: 'line',
          data: {
            labels: [],
            datasets: [{
              data: [],
              borderWidth: 1,
              borderColor:'#ff0000',
              label: 'Temperatura',
            },{                     
              data: [],
              borderWidth: 1,
              borderColor:'#00c0ef',
              label: 'Humedad'
          }]
          },
          options: {
            responsive: true,
            legend: {
              display: true
            },
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                }
              }]
            }
          }
        });

        // this post id drives the example data
        var postId = 1;

        // logic to get new data
        var getData = function() {
          $.ajax({
            success: function(data) {
              // process your data to pull out what you plan to use to update the chart
              // e.g. new label and a new data point

              // add new label and data point to chart's underlying data structures
              myChart.data.labels.push(<?php echo $data[3]; ?>); // ponne la hora el el label x
              myChart.data.datasets[0].data.push(<?php echo $data[1]; ?>); // dato de la temperatura
              myChart.data.datasets[1].data.push(<?php echo $data[2]; ?>); // dato de la humedad

              // re-render the chart
              myChart.update();
            }
          });
        };

        // get new data every 3 seconds
        setInterval(getData, 3000);
	</script>
	

</body>
</html>

