<?php
// register_process.php
include 'db_connect.php';

// Get data from form
$matric = $_POST['matric'];
$name = $_POST['name'];
$password = $_POST['password'];
$role = $_POST['role'];

// Hash the password 
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO users (matric, name, password, role) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $matric, $name, $hashed_password, $role);

if ($stmt->execute()) {
    echo "New user registered successfully!";
    echo "<br><a href='login.php'>Click here to login</a>.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>