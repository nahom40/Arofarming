<?php
session_start();
$C_id = $_SESSION['consumer_id'];

include ('../include/connect.php');

$cartItems = [];
$userPayments = []; // Array to store user-specific payment details

$sql1 = "SELECT `order_id`, `payer_C`, `payer_F`, `Amount`, `product_id`, `product_name`, `quaintly`, `Pay_to`, `status`, `merch_id` FROM `orders` WHERE `payer_C`='$C_id' and `status`='not_payed'";
$result = mysqli_query($conn, $sql1);
if ($result === false) {
    echo "Error executing query: " . mysqli_error($conn);
}
while ($row = mysqli_fetch_assoc($result)) {
    $item_id = $row['product_id'];
    $itemName = $row['product_name'];
    $unitPrice = $row['Amount'];
    $quantity = $row['quaintly'];
    $murch_id = $row['merch_id'];
    $payerC = $row['payer_C'];
    $payerF = $row['payer_F'];

    $newItem = [
        "itemId" => $item_id,
        "itemName" => $itemName,
        "unitPrice" => $unitPrice,
        "quantity" => $quantity
    ];

    // Check if payment details exist for the user
    if (isset($userPayments[$payerC])) {
        // Add the item to the existing payment details
        $userPayments[$payerC]['items'][] = $newItem;
    } else {
        // Create new payment details for the user
        $userPayments[$payerC] = [
            "payerC" => $payerC,
            "payerF" => $payerF,
            "merchantId" => $murch_id,
            "items" => [$newItem]
        ];
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
</head>
<body>
    <h2>Pay with Yenepay</h2>

    <?php foreach ($userPayments as $userPayment) { ?>
        <form method="post" action="https://test.yenepay.com/">
            <input type="hidden" name="process" value="Cart">
            <input type="hidden" name="successUrl" value="http://localhost/n7/Afro_farming/payment/cart_check.php">
            <input type="hidden" name="ipnUrl" value="http://localhost/Payment-with-Yenepay-Php/ipn.php">
            <input type="hidden" name="cancelUrl" value="http://localhost/n7/Afro_farming/homepage.php">
            <input type="hidden" name="merchantOrderId" value="moi2">
            <input type="hidden" name="expiresAfter" value="24">
            <?php foreach ($userPayment['items'] as $key => $value) { ?>
                <input type="hidden" name="Items[<?php echo $key; ?>][itemId]" value="<?php echo $value['itemId']; ?>">
                <input type="hidden" name="Items[<?php echo $key; ?>][itemName]" value="<?php echo $value['itemName']; ?>">
                <input type="hidden" name="Items[<?php echo $key; ?>][unitPrice]" value="<?php echo $value['unitPrice']; ?>">
                <input type="hidden" name="Items[<?php echo $key; ?>][quantity]" value="<?php echo $value['quantity']; ?>">
            <?php } ?>

            <input type="hidden" name="merchantId" value="<?php echo $userPayment['merchantId']; ?>">
            <input type="hidden" name="payerC" value="<?php echo $userPayment['payerC']; ?>">
            <input type="hidden" name="payerF" value="<?php echo $userPayment['payerF']; ?>">

            <button type="submit">Pay with cart for User <?php echo $userPayment['payerC']; ?></button>
        </form>
        <br>
    <?php } ?>
</body>
</html>
