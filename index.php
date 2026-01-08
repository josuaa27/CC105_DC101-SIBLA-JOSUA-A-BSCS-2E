<!DOCTYPE html>
<html>
<head>
    <title>UWA's Super Convenience Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Welcome to</h1>
    <h2>UWA's Super Convenience Store</h2>

    <form action="save_customer.php" method="post" class="form-box">
        <input type="text" name="name" placeholder="Customer Name" required>

        <input type="text" name="address" placeholder="Address">

        <input type="text" name="contact" placeholder="Contact Number">

        <button type="submit">Proceed</button>
    </form>
</div>

</body>
</html>
