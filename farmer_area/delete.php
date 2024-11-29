<?php
include_once('../include/connect.php');
global $conn;
if(isset($_GET['delete_farmer_product'])){
  $id = $_GET['delete_farmer_product'];
  $query = "DELETE FROM farmer_products WHERE P_id = $id";
  $result = mysqli_query($conn, $query);
  if ($result === TRUE) {
      echo "<script>alert('Successfully deleted the data')</script>";
      header('location:index.php?v_p');
  } else {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
      echo "<script>alert('Failed to delete the data')</script>";
      header('location:index.php?v_p');
  }
}

?>