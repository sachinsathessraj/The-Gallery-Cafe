<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'user_management');
    $user_id = $_POST['user_id'];
    $username = htmlspecialchars($_POST['username']);
    $role = htmlspecialchars($_POST['role']);

    $sql = "UPDATE users SET username='$username', role='$role' WHERE user_id=$user_id";
    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
