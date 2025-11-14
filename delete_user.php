<?php
// delete_user.php
include 'auth_session.php'; // Q8: Session protection 
include 'db_connect.php';

// Get the matric from URL parameter
$matric_to_delete = $_GET['matric'];

// Prepare SQL query to delete data 
$stmt = $conn->prepare("DELETE FROM users WHERE matric = ?");
$stmt->bind_param("s", $matric_to_delete);

if ($stmt->execute()) {
    // Redirect back to the main display page
    header("Location: display_users.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>