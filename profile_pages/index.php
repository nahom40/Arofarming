<?php
include('../include/connect.php');
session_start();
$n = $_SESSION['consumer_id'];
echo "<script>alert('$n')</script>";

// Check if the form is submitted
if (isset($_POST['update_customer'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $md5 = md5($password);
    // Perform any necessary sanitization and validation on the form inputs
    // ...

    // Update the customer information in the database
    $update_query = "UPDATE `consumer` SET `C_fname`='$firstName', `C_lname`='$lastName', `C_email`='$email', `C_phonenumber`='$phoneNumber', `C_password`='$md5' WHERE `C_id`='$n'";
    $update_result = mysqli_query($conn, $update_query);

    // Check if the update was successful
    if ($update_result) {
        // Information successfully updated
        // Redirect the user to a success page or display a success message
        header("Location: index.php");
        exit();
    } else {
        // Error occurred while updating the information
        // Display an error message or handle it accordingly
        echo "Error: Unable to update customer information.";
    }
}
if(isset($_POST['back'])){
	header("Location:../homepage.php");
       
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Account Settings </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <section class="py-5 my-5">
        <div class="container">
            <?php
            // Perform the database query to fetch consumer data
            $sql = "SELECT `C_id`, `C_fname`, `C_lname`, `C_phonenumber`, `C_email`, `C_profile_image`, `C_date`, `C_password` FROM `consumer` WHERE `C_id`='$n' ";
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result); // Fetch the first row
            ?>
                <h1 class="mb-5">Account Settings</h1>
                <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                    <div class="profile-tab-nav border-right">
                        <div class="p-4">
                            <div class="img-circle text-center mb-3">
                                <img src="../profileimages/<?php echo $row['C_profile_image']; ?>" alt="Image" class="shadow">
                            </div>
                            <h4 class="text-center"><?php echo $row['C_fname']; ?></h4>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                                <i class="fa fa-home text-center mr-1"></i>
                                Account
                            </a>
                          
                        </div>
                    </div>

                    <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                            <h3 class="mb-4">Account Settings</h3>
                            <form method="post" name="accountForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="firstName" value="<?php echo $row['C_fname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lastName" value="<?php echo $row['C_lname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="<?php echo $row['C_email']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="text" class="form-control" name="phoneNumber" value="<?php echo $row['C_phonenumber']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit" name="update_customer">Update</button>
                                </div>
                            </form>
                           <form action="" method="post">
						   <div>
                                    <button class="btn btn-primary" type="submit" name="back">Back</button>
                                </div>
						   </form>
                            <?php
                        } else {
                            echo "No consumer data found.";
                        }
                            ?>
                        </div>
                        
                    </div>
                </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
