<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>
        <!-- Display success message if product was edited successfully -->
        <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
            <div class="success-message">
                Product edited successfully!
            </div>
        <?php endif; ?>
        <form action="editProduct.php" method="post">
            <div class="form-group">
                <label for="productId">Product ID</label>
                <input type="number" id="productId" name="productId" placeholder="Product ID" required>
            </div>
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
                <input type="submit" value="Edit Product">
            </div>
        </form>
    </div>
</body>
</html>
