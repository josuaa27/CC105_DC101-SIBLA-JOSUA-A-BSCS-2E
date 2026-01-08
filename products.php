<?php
include "db.php";
$customer_id = $_GET['customer_id'];

$category_query = "SELECT DISTINCT category FROM products ORDER BY category";
$categories = mysqli_query($conn, $category_query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Products</title>
    <link rel="stylesheet" href="order.css">
</head>
<body>

<div class="container">
    <h2>Order Products</h2>

    <?php while($cat = mysqli_fetch_assoc($categories)) {
        $category_name = $cat['category']; ?>

        <button class="collapsible"><?php echo $category_name; ?></button>

        <div class="content">
            <?php
            $product_query = "SELECT * FROM products WHERE category='$category_name'";
            $products = mysqli_query($conn, $product_query);

            while($p = mysqli_fetch_assoc($products)) { ?>
                <form action="save_order.php" method="post" class="form-box">
                    <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                    <input type="hidden" name="product_id" value="<?php echo $p['id']; ?>">

                    <div class="product-item">
                        <span><?php echo $p['name']; ?> - ₱<?php echo $p['price']; ?></span>
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit">Add</button>
                    </div>
                </form>
            <?php } ?>
        </div>
    <?php } ?>

    <div class="buttons">
        <a href="order_list.php?customer_id=<?php echo $customer_id; ?>"><button>View Order</button></a>
    </div>
</div>

<script>
var coll = document.getElementsByClassName("collapsible");
for(var i = 0; i < coll.length; i++){
    coll[i].addEventListener("click", function(){
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if(content.style.display === "block"){
            content.style.display = "none";
        }else{
            content.style.display = "block";
        }
    });
}
</script>

</body>
</html>

