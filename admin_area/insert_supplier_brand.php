<?php
include('../include/connect.php');

$thedata=$_SESSION["admin_id"]; 
if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    // Select data from the database
    $select_query = "SELECT * FROM `supplier_brands` WHERE `B_name`='$brand_title'";
    $result_select = mysqli_query($conn, $select_query);

    if (!$result_select) {
        echo "<script>alert('Error selecting brand: " . mysqli_error($conn) . "')</script>";
    } else {
        $number = mysqli_num_rows($result_select);

        if ($number > 0) {
            echo "<script>alert('Brand has already been added.')</script>";
        } else {
            // Insert brand into the table
            $insert_query = "INSERT INTO `supplier_brands`( `AB_id`, `B_name`) VALUES ('$thedata','$brand_title')";
            $result = mysqli_query($conn, $insert_query);

            if ($result) {
                echo "<script>alert('Brand has been added successfully.')</script>";
            } else {
                echo "<script>alert('Error inserting brand: " . mysqli_error($conn) . "')</script>";
            }
        }
    }
}
?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="POST" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-dark" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert brand" aria-label="brand" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-dark text-light border-0 p-2 my-3" name="insert_brand" value="Insert Brand" aria-label="Submit" aria-describedby="basic-addon1" class="bg-dark">
    </div>
</form>
