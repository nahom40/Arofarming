<?php
include('../include/connect.php');

$thedata = $_SESSION['supplier_id']; 
echo "<script>alert('$thedata')</script>";
if (isset($_POST['insert_brand'])) {
    $supplier_title = $_POST['brand_title'];

    // Select data from the database
    $select_query = "SELECT * FROM `merchant_ids` WHERE `Merchant_Id`='$supplier_title' and `F_id`='$thedata' ";
    $result_select = mysqli_query($conn, $select_query);

    if (!$result_select) {
        echo "<script>alert('Error selecting supplier category: " . mysqli_error($conn) . "')</script>";
    } else {
        $number = mysqli_num_rows($result_select);

        if ($number > 0) {
            echo "<script>alert('merchant id  has already been added.')</script>";
        } else {
            // Insert supplier category into the table
            $insert_query = "INSERT INTO `merchant_ids`( `S_id`,`Merchant_Id`) VALUES ('$thedata', '$supplier_title')";
            $result = mysqli_query($conn, $insert_query);

            if ($result) {
                echo "<script>alert('merchant id   has been added successfully.')</script>";
            } else {
                echo "<script>alert('Error inserting merchant id  : " . mysqli_error($conn) . "')</script>";
            }
        }
    }
}
?>
<h2 class="text-center">Insert Merchant Id</h2>
<form action="" method="POST" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-dark" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert merchant id" aria-label="brand" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-dark text-light border-0 p-2 my-3" name="insert_brand" value="Insert merchant id" aria-label="Submit" aria-describedby="basic-addon1" class="bg-dark">
    </div>
</form>
