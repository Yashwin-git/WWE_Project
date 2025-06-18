<?php
session_start();

// Dummy credentials for example
$valid_username = 'admin';
$valid_password = '12345678';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    if ($username === $valid_username && $password === $valid_password) {
        // Set session variable
        $_SESSION['loggedin'] = true;

        // Redirect to admin page
        header('Location: admin.html');
        exit();
    } else {
        // Invalid credentials
        $error_message = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin-login.css">
</head>
<body>
    <div class="admin-login-container">
        <h2>Admin Login</h2>
        <?php
        if (isset($error_message)) {
            echo '<p style="color:red;">' . $error_message . '</p>';
        }
        ?>
        <form action="admin-login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
