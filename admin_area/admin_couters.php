<?php 
function get_all_numbers_of_consumers(){// this is a function that we used for to get the number of requests where  for the farmer  and we use the farmmer id to get this farmmers all requests all the other are the same just getting diffrent data. 
    global $conn;
   $saler_counter_sql="SELECT COUNT(*) FROM `consumer`";
   $salers_results=mysqli_query($conn,$saler_counter_sql);
    $n=0; 
    while($row=mysqli_fetch_assoc($salers_results)){
            $n++;
   } 
   echo $n;
   

}

function get_all_numbers_of_suppliers($passed){
    global  $conn;
    $product_counter_sql="SELECT * FROM `farmer_products` WHERE `F_id`='$passed'";
    $product_result=mysqli_query($conn,$product_counter_sql);
    $n=0;
    while($row=mysqli_fetch_assoc($product_result)){
        $n++;
    }
    echo "$n";
  }
  function get_all_numbers_of_farmers($passed){
     

    global  $conn;
    $reject_counter_sql="SELECT o.order_id,o.Amount,o.`product_id`,o.`product_name`,o.`quaintly`
    FROM orders o
    JOIN consumer c ON o.`C_id` = c.`C_id`
    WHERE o.F_id = '$passed';
    ";
    $reject_result=mysqli_query($conn,$reject_counter_sql);
    $n=0;
    while($row=mysqli_fetch_assoc($reject_result)){
        $n++;
    }
    echo "$n";


  }
  
  function get_all_numbers_of_admins($passed){
     

    global  $conn;
    $acepted_counter_sql="SELECT o.order_id,o.Amount,o.`product_id`,o.`product_name`,o.`quaintly`
    FROM orders o
    JOIN consumer c ON o.`C_id` = c.`C_id`
    WHERE o.F_id = '$passed';
    ";
    $acepted_result=mysqli_query($conn,$acepted_counter_sql);
    $n=0;
    while($row=mysqli_fetch_assoc($acepted_result)){
        $n++;
    }
    echo "$n";


  }
?>