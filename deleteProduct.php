<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link rel="stylesheet" href="deleteprod.css">
</head>
<body>
    <div class="container">
        <h1>Delete Product</h1>
        <form method="POST" action="delete_product.php">
            <label for="productId">Product ID:</label>
            <input type="number" id="productId" name="productId" required>
            <button type="submit">Delete</button>
        </form>
        <div class="message">
            <?php
            require 'database.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $productId = $_POST['productId'];

                $sql = "DELETE FROM products WHERE id = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "i", $productId);

                if (mysqli_stmt_execute($stmt)) {
                    echo "Product deleted successfully!";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            }
            ?>
        </div>
    </div>
</body>
</html>
