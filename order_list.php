<?php
include "db.php";

$customer_id = $_GET['customer_id'];

$sql = "SELECT * FROM orders WHERE customer_id = $customer_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order List</title>
    <link rel="stylesheet" href="order.css">
</head>
<body>

<div class="container">
    <h2>Order Summary</h2>

    <table border="1" width="100%" cellpadding="5">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>

        <?php
        $total = 0;   

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['product_name']."</td>";
            echo "<td>₱".$row['price']."</td>";
            echo "<td>".$row['quantity']."</td>";
            echo "<td>₱".$row['subtotal']."</td>";
            echo "</tr>";

            $total = $total + $row['subtotal'];
        }
        ?>
    </table>

    <h3>Total Amount: ₱<?php echo $total; ?></h3>

    <div class="buttons">
        <a href="products.php?customer_id=<?php echo $customer_id; ?>">
            <button>Add More Items</button>
        </a>

        <a href="finish_order.php?customer_id=<?php echo $customer_id; ?>">
            <button>Finish Order</button>
        </a>
    </div>
</div>

</body>
</html>
