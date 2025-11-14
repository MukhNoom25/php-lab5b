<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration Form</h2>
    <form action="register_process.php" method="POST">
        <p>
            <label>Matric:</label>
            <input type="text" name="matric" required>
        </p>
        <p>
            <label>Name:</label>
            <input type="text" name="name" required>
        </p>
        <p>
            <label>Password:</label>
            <input type="password" name="password" required>
        </p>
        <p>
            <label>Role:</label>
            <select name="role" required>
                <option value="">Please select</option>
                <option value="student">Student</option>
                <option value="lecturer">Lecturer</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
</body>
</html>