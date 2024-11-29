<?php

include('../include/connect.php');
include('../fucntions/for_info_functions.php');
session_start();
if (isset($_GET['remove'])) {
    // Retrieve the order ID from the URL parameter
    $order_id = $_GET['remove'];
    
    // Perform any necessary sanitization and validation on the order ID
    // ...

    // Remove the item from the order table based on the order ID
    $delete_query = "DELETE FROM `orders` WHERE `order_id` = '$order_id'";
    $delete_result = mysqli_query($conn, $delete_query);

    // Check if the deletion was successful
    if ($delete_result) {
        // Item successfully removed from the order table
        // Redirect the user back to the cart page
        header("Location: cart.php");
        exit();
    } else {
        // Error occurred while removing the item
        // Display an error message or handle it accordingly
        echo "Error: Unable to remove item from the cart.";
    }
}
if (isset($_POST['update'])) {
    // Retrieve the order ID from the form submission
    $order_id = $_POST['update'];
    $qt = $_POST['qt'];

    // Perform any necessary sanitization and validation on the order ID and quantity
    // ...

    // Update the quantity in the order table based on the order ID
    $update_query = "UPDATE `orders` SET `quaintly`='$qt' WHERE `order_id` = '$order_id'";
    $update_result = mysqli_query($conn, $update_query);

    // Check if the update was successful
    if ($update_result) {
        // Quantity successfully updated in the order table
        // Redirect the user back to the cart page
        header("Location: cart.php");
        exit();
    } else {
        // Error occurred while updating the quantity
        // Display an error message or handle it accordingly
        echo "Error: Unable to update quantity.";
    }
}

?>

<!DOCTYPE html>

<html>

	<head>

		<title>
            
            Shopping Cart
        
        </title>

		<link rel ="stylesheet" type="text/css" href="Shopping Cart CSS.css">

		<script src="https://kit.fontawesome.com/9088cc6401.js" crossorigin="anonymous"></script>

	</head>
	
	<link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>

    <body>

        <div class="container">

            <h1>
                
                Afro store Cart
            
            </h1>

            <div class="cart">

                <div class="products">
                      
                    <?php
                    get_cart();
                    
                    
                    ?>
                   
                </div>

                <div class="cart-total">

    <p>
        <span>Total Price</span>
        <span>
        <?php
      $consumerId = $_SESSION['farmer_id'];
      $totalAmount = calculateTotalAmount($consumerId);
      echo $totalAmount;
      ?>
        </span>
    </p>

    <p>
        <span>No. of Items</span>
        <span>
            <?php
            $itemCount = calculateItemCount($_SESSION['farmer_id']);
            echo $itemCount;
            ?>
        </span>
    </p>

   

    <a href="../payment/farmer_payCart.php">Proceed to Checkout</a>
    <br>
    <a href="homepage.php">back to home</a>
</div>

            </div>

        </div>


    </body>

</html>
