<?php
	session_start();
    
$F_id = $_SESSION['farmer_id'];

include('../include/connect.php');

	if( isset( $_SERVER['REQUEST_SCHEME'] ) ){
        $email=$_SESSION['favcolor'];
        $A=$_SERVER['HTTP_HOST'];
        $B=$_SERVER['REQUEST_URI'];
		$C=$_SERVER['REQUEST_SCHEME'];
      
      $sql = "UPDATE `orders` SET `status`='payed' WHERE `payer_F`='$F_id'";
      $result = mysqli_query($conn, $sql);
      $result_query=mysqli_query($conn,$select_query);
      if ($result){
        header("location:../index.php");
       
      }
       else{
        echo "failed to update your payment.";
       } 
	}else{
		echo "direct access";
	}
?>