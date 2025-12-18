<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password, role_id FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $hashed_password, $role_id);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role_id'] = $role_id;

            $message = "Login successful!";
            if ($role_id == 1) {
                header("Location: admin_dashboard.php?message=" . urlencode($message));
            } elseif ($role_id == 2) {
                header("Location: user_dashboard.php?message=" . urlencode($message));
            } elseif ($role_id == 3) {
                header("Location: operational_staff_dashboard.php?message=" . urlencode($message));
            }
        } else {
            $message = "Invalid password.";
            header("Location: login.php?message=" . urlencode($message));
        }
    } else {
        $message = "No user found with that username.";
        header("Location: login.php?message=" . urlencode($message));
    }
    $stmt->close();
    $conn->close();
}
?>
