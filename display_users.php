<?php
// display_users.php
include 'auth_session.php'; //  Session protection 
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <style>
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #8d7373ff; }
    </style>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?>!</h2>
    <p><a href="logout.php">Logout</a></p>

    <h3>User List</h3>
    <table>
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Level</th>
            <th>Action</th> </tr>
        <?php
        //  Select data from users table 
        $sql = "SELECT matric, name, role FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["matric"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                // The lab doc uses 'accessLevel'/'Level'
                echo "<td>" . $row["role"] . "</td>"; 
                
                //  Add Update and Delete links 
                echo "<td>";
                echo "<a href='update_user.php?matric=" . $row["matric"] . "'>Update</a> | ";
                echo "<a href='delete_user.php?matric=" . $row["matric"] . "' 
                       onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>