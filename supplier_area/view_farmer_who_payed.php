<?php
include('../fucntions/for_info_functions.php');
session_start();
$thedata=$_SESSION['favcolor'];
$supplier_id=$_SESSION["supplier_id"];
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 20px;
    }
    
    .container {
      max-width: 1000px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 4px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    th {
      background-color: #f2f2f2;
      color: #333;
      font-weight: bold;
    }
    
    .user-image {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>
  <div class="container">
    <table>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>phone number</th>
        <th>product name</th>
        <th>ammount</th>
      </tr>
      <?php
      get_payed_farmer();
      ?>
    </table>
  </div>
</body>
</html>
