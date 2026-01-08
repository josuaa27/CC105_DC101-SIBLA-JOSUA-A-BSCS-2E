<?php
include "db.php";

$customer_id = $_POST['customer_id'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

$product_query = "SELECT * FROM products WHERE id = $product_id";
$product_result = mysqli_query($conn, $product_query);
$product = mysqli_fetch_assoc($product_result);

$product_name = $product['name'];
$price = $product['price'];
$subtotal = $price * $quantity;

$sql = "INSERT INTO orders (customer_id, product_name, price, quantity, subtotal)
        VALUES ('$customer_id', '$product_name', '$price', '$quantity', '$subtotal')";

if(mysqli_query($conn, $sql)){
    header("Location: products.php?customer_id=$customer_id");
    exit();
}else{
    echo "Error: " . mysqli_error($conn);
}
?>


