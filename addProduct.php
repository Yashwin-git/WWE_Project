<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];

    $sql = "INSERT INTO products (name, description, price) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssd", $productName, $productDescription, $productPrice);
    
    if (mysqli_stmt_execute($stmt)) {
        $message = "Product added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="addproduct.css">
</head>
<body>
    <div class="container">
        <h2>Add Product</h2>
        <?php if (isset($message)): ?>
            <div class="alert"><?php echo $message; ?></div>
        <?php endif; ?>
        <form action="addProduct.php" method="post">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" id="productName" name="productName" placeholder="Product Name" required>
            </div>
            <div class="form-group">
                <label for="productDescription">Product Description</label>
                <input type="text" id="productDescription" name="productDescription" placeholder="Product Description" required>
            </div>
            <div class="form-group">
                <label for="productPrice">Product Price</label>
                <input type="number" id="productPrice" name="productPrice" placeholder="Product Price" required>
            </div>
            <div class="form-btn">
                <input type="submit" value="Add Product">
            </div>
        </form>
    </div>
</body>
</html>
