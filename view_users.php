<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/User Table.css">
</head>
<body>
    
</body>
</html><?php
$conn = new mysqli('localhost', 'root', '', 'add_user');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

echo "<table border='1'>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['user_id']}</td>
                <td>{$row['username']}</td>
                <td>{$row['role']}</td>
                <td>
                    <a href='edit_user.php?id={$row['user_id']}'>Edit</a> |
                    <a href='delete_user.php?id={$row['user_id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
              </tr>";
    }
}
echo "</table>";

$conn->close();
?>
