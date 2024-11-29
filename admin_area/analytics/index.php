
<?php

include('../../include/connect.php');



if($conn){
  $sql = "SELECT * FROM `farmer_products`  where `A_id`='1'";
  $result = mysqli_query($conn,$sql);
  $chart_data = "";
  while($row = mysqli_fetch_array($result)){
      $product_id = $row['catagory_id'];
      $productname_sql = "SELECT * FROM `catagory_for_dealers` WHERE `D_catagory_id`='$product_id'";
      $productname_result = mysqli_query($conn, $productname_sql);
      $productname_row = mysqli_fetch_array($productname_result);
      $productname[] = $productname_row['D_catagory_title'];
      $sales[] = $row['product_price'];
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bargraph in PHP and MYSQL</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .card {
            margin-top: 50px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
            padding: 20px;
            text-align: center;
        }

        .card-header h1 {
            font-size: 30px;
            font-weight: bold;
            color: #333;
            margin: 0;
        }

        .card-body {
            padding: 20px;
        }

        canvas {
            margin-bottom: 20px;
        }

        .chart-container {
            width: 100%;
            height: 400px;
            position: relative;
        }

        .card-body {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    canvas {
      max-width: 50%;
      margin: 10px;
    }

    </style>
</head>

<body>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
      <div class="card-header bg">
        <h1>ADD products price</h1>
      </div>
          <div class="card-body">
          <canvas id="chartjs_bar"></canvas>
          <canvas id="chartjs_pie"></canvas>
          <canvas id="chartjs_radar"></canvas>
          <canvas id="chartjs_horizontal_bar"></canvas>

          </div>
      </div>
    </div>
  </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
      var myChart = new Chart(ctx,{
          type: 'bar',
          data: {
            labels:<?php echo json_encode($productname); ?>,
            datasets: [{
                backgroundcolor: [
                    "#ffd322",
                    "#5945fd",
                    "#25d5f2",
                    "#2ec551",
                    "#ff344e",
                ],
                data: <?php echo json_encode($sales);?>
            }]
          },
          options:{
              legend: {
                  display:true,
                  position:'bottom',
                  labels: {
                      fontColor: '#71748d',
                      fontFamily: 'Circular Std Book',
                      fontSize: 14,
                  }
              },
          }
      });
     
      // Add the following code for the pie chart
var ctx2 = document.getElementById("chartjs_pie").getContext('2d');
var myPieChart = new Chart(ctx2, {
  type: 'pie',
  data: {
    labels: <?php echo json_encode($productname); ?>,
    datasets: [{
      backgroundColor: [
        "#ffd322",
        "#5945fd",
        "#25d5f2",
        "#2ec551",
        "#ff344e",
      ],
      data: <?php echo json_encode($sales);?>
    }]
  },
  options:{
    legend: {
      display:true,
      position:'bottom',
      labels: {
        fontColor: '#71748d',
        fontFamily: 'Circular Std Book',
        fontSize: 14,
      }
    },
  }
});
// this is the raadar chart.
var ctx3 = document.getElementById("chartjs_radar").getContext('2d');
var myRadarChart = new Chart(ctx3, {
  type: 'radar',
  data: {
    labels: <?php echo json_encode($productname); ?>,
    datasets: [{
      label: "Sales",
      backgroundColor: "rgba(179,181,198,0.2)",
      borderColor: "rgba(179,181,198,1)",
      pointBackgroundColor: "rgba(179,181,198,1)",
      pointBorderColor: "#fff",
      pointHoverBackgroundColor: "#fff",
      pointHoverBorderColor: "rgba(179,181,198,1)",
      data: <?php echo json_encode($sales);?>
    }]
  },
  options:{
    legend: {
      display:true,
      position:'bottom',
      labels: {
        fontColor: '#71748d',
        fontFamily: 'Circular Std Book',
        fontSize: 14,
      }
    },
    scale: {
      ticks: {
        beginAtZero: true
      }
    }
  }
});

// 4
var ctx4 = document.getElementById("chartjs_horizontal_bar").getContext('2d');
var myChart4 = new Chart(ctx4,{
    type: 'horizontalBar',
    data: {
        labels:<?php echo json_encode($productname); ?>,
        datasets: [{
            backgroundColor: [
                "#ffd322",
                "#5945fd",
                "#25d5f2",
                "#2ec551",
                "#ff344e",
            ],
            data: <?php echo json_encode($sales);?>
        }]
    },
    options:{
        legend: {
            display:true,
            position:'bottom',
            labels: {
                fontColor: '#71748d',
                fontFamily: 'Circular Std Book',
                fontSize: 14,
            }
        },
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

    </script>
</body>
</html>