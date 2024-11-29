<?php
include('../include/connect.php');

if (isset($_POST['insert_admin'])) {
    $A_fname = $_POST['A_fname'];
    $A_lname = $_POST['A_lname'];
    $A_phone_number = $_POST['A_phone_number'];
    $A_profile_image = $_FILES['A_profile_image']['name'];
    $A_email = $_POST['A_email'];
    $A_password = $_POST['A_password'];

    // Validate and sanitize the form inputs
    // ...

    // Move uploaded image file to a desired location
    $target_dir = "../profileimages/";
    $target_file = $target_dir . basename($_FILES["A_profile_image"]["name"]);
    move_uploaded_file($_FILES["A_profile_image"]["tmp_name"], $target_file);

    // Hash the password using MD5 (not recommended for security)
    $hashed_password = md5($A_password);

    // Insert data into the administrator table
    $insert_admin = "INSERT INTO `adminstrator` (`A_fname`, `A_lname`, `A_phone_number`, `A_profile_image`, `A_email`, `A_password`) 
                     VALUES ('$A_fname', '$A_lname', '$A_phone_number', '$A_profile_image', '$A_email', '$hashed_password')";

    if (mysqli_query($conn, $insert_admin)) {
        echo "<script>alert('Successfully entered the data');</script>";
    } else {
        echo "<script>alert('Error inserting data: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IEte=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert Products-admin Dashboard</title>
     <!-- boot strap  css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
     crossorigin="anonymous">
    
     <!-- boot strap  css link end -->
    
    
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
    <!-- css link end-->

    <!--fontawsome area-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
     crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <!--fontawsome area end-->
    <style>
        body{
           background-color: #EAE7AF;
         
        }
    </style>
</head>
<body class="" >
    <div class="container">
        <h1 class="text-center">insert_products</h1>
    <!-- form -->
   <!-- First Name -->
   <form method="post" enctype="multipart/form-data">
<div class="form-outline mb-4 w-50 m-auto">
    <label for="A_fname" class="form-label">First Name</label>
    <input type="text" name="A_fname" id="A_fname" class="form-control" placeholder="Enter first name" autocomplete="off" required="required">
</div>

<!-- Last Name -->
<div class="form-outline mb-4 w-50 m-auto">
    <label for="A_lname" class="form-label">Last Name</label>
    <input type="text" name="A_lname" id="A_lname" class="form-control" placeholder="Enter last name" autocomplete="off" required="required">
</div>

<!-- Phone Number -->
<div class="form-outline mb-4 w-50 m-auto">
    <label for="A_phone_number" class="form-label">Phone Number</label>
    <input type="text" name="A_phone_number" id="A_phone_number" class="form-control" placeholder="Enter phone number" autocomplete="off" required="required">
</div>

<!-- Profile Image -->
<div class="form-outline mb-4 w-50 m-auto">
    <label for="A_profile_image" class="form-label">Profile Image</label>
    <input type="file" name="A_profile_image" id="A_profile_image" class="form-control" required="required">
</div>

<!-- Email -->
<div class="form-outline mb-4 w-50 m-auto">
    <label for="A_email" class="form-label">Email</label>
    <input type="email" name="A_email" id="A_email" class="form-control" placeholder="Enter email" autocomplete="off" required="required">
</div>

<!-- Password -->
<div class="form-outline mb-4 w-50 m-auto">
    <label for="A_password" class="form-label">Password</label>
    <input type="password" name="A_password" id="A_password" class="form-control" placeholder="Enter password" required="required">
</div>

       <!--insert product-->
       <div class="form-outline mb-4 w-50 m-auto" >
           <input type="submit" name="insert_admin" class="btn btn-primary mb-3 px-3" value="insert_admin">
         </div>
       <!--insert product end-->
    </form>
    </div>
</body>
</html> 