<?php
// login_process.php
session_start(); // Start or resume the session
include 'db_connect.php';

$matric = $_POST['matric'];
$password = $_POST['password'];

// Prepare SQL to find the user
$stmt = $conn->prepare("SELECT password, name, role FROM users WHERE matric = ?");
$stmt->bind_param("s", $matric);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password, $name, $role);
    $stmt->fetch();
    
    // Verify the hashed password
    if (password_verify($password, $hashed_password)) {
        // Authentication successful 
        // Store user data in session
        $_SESSION["matric"] = $matric;
        $_SESSION["name"] = $name;
        $_SESSION["role"] = $role;
        
        // Redirect to the main display page 
        header("Location: display_users.php");
        exit();
    }
}

// Authentication failed 
// Redirect back to login page with an error flag 
header("Location: login.php?error=1");
exit();

$stmt->close();
$conn->close();
?>