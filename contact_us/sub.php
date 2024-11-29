<?php
// Assuming you have established a database connection
include('../include/connect.php');
// Retrieve the form input values
if(isset($_POST['send'])){
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$message = $_POST['message'];

// Prepare the INSERT statement
$query = "INSERT INTO contact_us (Full_name, email, phone_number, message) VALUES ('$fullName', '$email', '$phoneNumber', '$message')";

// Execute the statement
if (mysqli_query($conn, $query)) {
  // Insert successful
  echo "Message sent successfully!";
  header('location:index.php');
} else {
  // Insert failed
  echo "Error: " . mysqli_error($conn);
}
}
if(isset($_POST['back'])){
    header('location:../index.php');
}
// Close the database connection
mysqli_close($conn);

?>