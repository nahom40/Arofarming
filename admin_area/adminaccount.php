<?php
include('../include/connect.php');
if(isset($_POST['login'])) {//this is the consumner login. 
    $email=$_POST['email'];
    $password=$_POST['password'];
    $md5=md5($password);
    $query = "SELECT * FROM `adminstrator` WHERE `A_email`='$email' AND `A_password`='$md5'";
    $result = mysqli_query($conn, $query);
   

    if (mysqli_num_rows($result) > 0) {
      echo "Login successful";
       session_start();
      $_SESSION["admin_email"] = $email;
     

      header("location:homepage.php");
    } else {
      echo "Login failed user.";
      echo" <script>alert('login falied try again !');</script> ";
      header("location:index.php");       
    }
}
?>