<?php
// update_process.php
include 'auth_session.php'; //  Session protection 
include 'db_connect.php';

// Get data from update form
$matric = $_POST['matric'];
$name = $_POST['name'];
$role = $_POST['role'];

// Prepare SQL query to update data 
$stmt = $conn->prepare("UPDATE users SET name = ?, role = ? WHERE matric = ?");
$stmt->bind_param("sss", $name, $role, $matric);

if ($stmt->execute()) {
    // Redirect back to the main display page
    header("Location: display_users.php");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>