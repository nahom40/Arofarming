<?php

include('../include/connect.php');
function get_all_the_products(){
    global $conn;
    $labels = array(); // initialize an empty array to store the labels
    $all_the_products="SELECT `product_title` FROM `dealer_products` WHERE `dealer_id`=3";
    $result=mysqli_query($conn,$all_the_products);
    while($row=mysqli_fetch_assoc($result)){
        $product_title=$row['product_title'];
        $labels[] = $product_title; // add the label to the array
    }
    return $labels; // return the array of labels
}
function get_number_of_products(){
    global $conn;
    session_start();
    $phone_number=$_SESSION['phone_number'];
    
    // get all the product titles
    $labels = get_all_the_products();
    
    // initialize an array to store the number of requests for each product title
    $num_requests_by_label = array();
    
    // loop through the results of the SQL query
    $sql = "SELECT product_id, COUNT(*) AS num_requests FROM `requests` WHERE `requester`='$phone_number' GROUP BY product_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $num_requests = $row['num_requests'];
        
        // get the product title for the current product ID
        $product_title = mysqli_query($conn, "SELECT `product_title` FROM `dealer_products` WHERE `product_id`='$product_id'");
        $row2 = mysqli_fetch_assoc($product_title);
        $label = $row2['product_title'];
        
        // store the number of requests for the current product title
        $num_requests_by_label[$label] = $num_requests;
    }
    
    // loop through the product titles and output the number of requests for each one
    foreach ($labels as $label) {
        $num_requests = isset($num_requests_by_label[$label]) ? $num_requests_by_label[$label] : 0;
     //   echo "Product title $label has $num_requests requests.<br>";
      // echo "$num_requests";
       $out_num_lable[]=$num_requests;
    }
    return $out_num_lable;
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Analysis Page</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<!-- Chart.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Sales Analysis</h1>
		<div class="row mt-5">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-primary text-white">Sales by Month</div>
					<div class="card-body">
						<canvas id="chart1"></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-success text-white">Sales by Product</div>
					<div class="card-body">
						<canvas id="chart2"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-danger text-white">Sales by Region</div>
					<div class="card-body">
						<canvas id="chart3"></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-warning text-white">Sales by Day of the Week</div>
					<div class="card-body">
						<canvas id="chart4"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		var ctx1 = document.getElementById('chart1').getContext('2d');
		var chart1 = new Chart(ctx1, {
			type: 'line',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
				datasets: [{
					label: 'Sales',
					data: [500, 700, 900, 1000, 1200, 1500, 1800],
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255, 99, 132, 1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});

        var ctx2 = document.getElementById('chart2').getContext('2d');
var chart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode(get_all_the_products()); ?>,
        datasets: [{
            label: 'Sales',
            data: <?php echo json_encode(get_number_of_products()); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var dataset = data.datasets[tooltipItem.datasetIndex];
                    var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                        return previousValue + currentValue;
                    });
                    var currentValue = dataset.data[tooltipItem.index];
                    var percentage = Math.floor(((currentValue/total) * 100)+0.5);         
                    return percentage + "%";
                }
            }
        }
    }
});

        var ctx3 = document.getElementById('chart3').getContext('2d');
	var chart3 = new Chart(ctx3, {
		type: 'bar',
		data: {
			labels: ['East', 'West', 'North', 'South'],
			datasets: [{
				label: 'Sales',
				data: [500, 800, 1000, 1200],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			title: {
				display: true,
				text: 'Sales by Region',
				fontSize: 18
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});

	var ctx4 = document.getElementById('chart4').getContext('2d');
	var chart4 = new Chart(ctx4, {
		type: 'bar',
		data: {
			labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
			datasets: [{
				label: 'Sales',
				data: [100, 150, 200, 250, 300, 350, 400],
				backgroundColor: 'rgba(255, 206, 86, 0.2)',
				borderColor: 'rgba(255, 206, 86, 1)',
				borderWidth: 1
			}]
		},
		options: {
			title: {
				display: true,
				text: 'Sales by Day of the Week',
				fontSize: 18
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>
</body>
</html>
