<?php
$servername = "localhost";
$username = "root";
$password = ""; // Change this to your MySQL root password
$dbname = "user_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
