<?php
	session_start();

	$conn = mysqli_connect("localhost", "root", "", "afro_farming");

	if (isset($_SERVER['REQUEST_SCHEME'])) {
		$email = $_SESSION["supplier_id"];
		$A = $_SERVER['HTTP_HOST'];
		$B = $_SERVER['REQUEST_URI'];
		$C = $_SERVER['REQUEST_SCHEME'];
		$main = $A . $B . $C;
		$user_id = $email;
		$new_expire_date = date('Y-m-d', strtotime('+1 years'));
		$sql = "UPDATE `payment` SET `expire_date`='$new_expire_date' WHERE `PS_id`='$user_id'";
		$result = mysqli_query($conn, $sql);
   
		if ($result) {
		//	echo "<script>alert('$now')</script>";
			header("location:../supplier_area/index.php");
		} else {
			echo "Failed to update your payment. Error: " . mysqli_error($conn);
			// header('location:../chooseaccount.php');
		}
	} else {
		echo "Direct access";
	}
?>
