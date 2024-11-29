<?php

$subscription_expiry_date = "2023-01-31";

if (time() > strtotime($subscription_expiry_date)) {
    include './suberpage.php';
} else {
    echo "Subscription is active.";
}




;

$new_expiry_date = strtotime("+1 year", strtotime($subscription_expiry_date));

echo "New expiry date: " . date("Y-m-d", $new_expiry_date);




?>
