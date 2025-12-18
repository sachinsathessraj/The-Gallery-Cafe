<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'add_user');

    // Check Connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize Input
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $role = htmlspecialchars($_POST['role']);

    // Insert User
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
        echo "User created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
