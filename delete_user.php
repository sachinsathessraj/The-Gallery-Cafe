<?php
$conn = new mysqli('localhost', 'root', '', 'add_user');
$id = $_GET['id'];

$sql = "DELETE FROM users WHERE user_id=$id";
if ($conn->query($sql) === TRUE) {
    echo "User deleted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
