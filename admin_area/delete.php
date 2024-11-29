<?php
include_once('../include/connect.php');
global $conn;
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $query = "DELETE FROM consumer_address WHERE C_id = $id;
            DELETE FROM consumer WHERE C_id = $id;";
  $result = mysqli_multi_query($conn, $query);
  if ($result === TRUE) {
      echo "<script>alert('Successfully deleted the data')</script>";
      header('location:homepage.php?v_customer');
  } else {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
      echo "<script>alert('Failed to delete the data')</script>";
      header('location:homepage.php?v_customer');
  }
}

?>
