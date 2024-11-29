<?php
// Connect to the database
$con = mysqli_connect("localhost", "root", "", "afro_farming");

// Check if the product ID is provided in the request
if (isset($_GET['delete'])) {
    // Retrieve the product ID from the request
    $product_id = $_GET['delete'];

    // Perform the deletion process
    $sql = "DELETE FROM supplier_products WHERE P_id = '$product_id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Deletion successful
        echo "<script>alert('Product deleted successfully.')</script>";
    } else {
        // Deletion failed
        echo "<script>alert('Failed to delete product.')</script>";
    }

    // Redirect the user back to the display page
    header('Location: index.php?supplier_product');
    exit();
} else {
    // Redirect the user back to the display page if the product ID is not provided
    header('Location: display_page.php');
    exit();
}
?>
