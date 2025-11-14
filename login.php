<?php session_start(); // Start session to handle error messages ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login_process.php" method="POST">
        <p>
            <label>Matric:</label>
            <input type="text" name="matric" required>
        </p>
        <p>
            <label>Password:</label>
            <input type="password" name="password" required>
        </p>
        <p>
            <input type="submit" value="Login">
        </p>
    </form>
    
    <p><a href="register.php">Register here if you have not.</a></p>

    <?php
    // Display error message if login fails 
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo '<p style="color:red;">Invalid username or password, try <a href="login.php">login again</a>.</p>';
    }
    ?>
</body>
</html>