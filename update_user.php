<?php
// update_user.php
include 'auth_session.php'; // Q8: Session protection 
include 'db_connect.php';

// Get the matric from URL parameter
$matric_to_update = $_GET['matric'];

// Fetch current user data to pre-fill the form
$stmt = $conn->prepare("SELECT name, role FROM users WHERE matric = ?");
$stmt->bind_param("s", $matric_to_update);
$stmt->execute();
$stmt->bind_result($name, $role);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form action="update_process.php" method="POST">
        <p>
            <label>Matric:</label>
            <input type="text" name="matric" value="<?php echo htmlspecialchars($matric_to_update); ?>" readonly>
        </p>
        <p>
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
        </p>
        <p>
            <label>Access Level:</label>
            <select name="role" required>
                <option value="student" <?php if($role == 'student') echo 'selected'; ?>>Student</option>
                <option value="lecturer" <?php if($role == 'lecturer') echo 'selected'; ?>>Lecturer</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Update">
            <a href="display_users.php">Cancel</a>
        </p>
    </form>
</body>
</html>
<?php $conn->close(); ?>