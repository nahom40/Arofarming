<?php
include('../include/connect.php');

$thedata = $_SESSION["admin_id"]; 
if (isset($_POST['insert_brand'])) {
    $location_name = $_POST['location_name'];

    // Select data from the database
    $select_query = "SELECT * FROM `location` WHERE L_name='$location_name'";
    $result_select = mysqli_query($conn, $select_query);

    if (!$result_select) {
        echo "<script>alert('Error selecting location: " . mysqli_error($conn) . "')</script>";
    } else {
        $number = mysqli_num_rows($result_select);

        if ($number > 0) {
            echo "<script>alert('Location has already been added.')</script>";
        } else {
            // Insert location into the table
            $insert_query = "INSERT INTO `location` (`L_name`) VALUES ( '$location_name')";
            $result = mysqli_query($conn, $insert_query);

            if ($result) {
                echo "<script>alert('Location has been added successfully.')</script>";
            } else {
                echo "<script>alert('Error inserting location: " . mysqli_error($conn) . "')</script>";
            }
        }
    }
}
?>
<h2 class="text-center">Insert Locations</h2>
<form action="" method="POST" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-dark" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="location_name" placeholder="Insert location" aria-label="location" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-dark text-light border-0 p-2 my-3" name="insert_brand" value="Insert Location" aria-label="Submit" aria-describedby="basic-addon1" class="bg-dark">
    </div>
</form>
