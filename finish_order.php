<?php
include "db.php";
$customer_id = $_GET['customer_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Finished</title>
    <link rel="stylesheet" href="order.css">
</head>
<body>
<div class="container">
    <h2>Thank you!</h2>
    <p>Your order has been saved.</p>
    <a href="index.php"><button>Back to Home</button></a>
</div>
</body>
</html>

