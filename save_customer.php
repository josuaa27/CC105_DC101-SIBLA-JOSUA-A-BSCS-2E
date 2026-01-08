<?php
include "db.php";

$name = $_POST['name'];
$address = $_POST['address'];
$contact = $_POST['contact'];

$sql = "INSERT INTO customers (name, address, contact)
        VALUES ('$name', '$address', '$contact')";

if (mysqli_query($conn, $sql)) {
    $id = mysqli_insert_id($conn);
    header("Location: products.php?customer_id=$id");
} else {
    echo "Error saving customer";
}
?>

