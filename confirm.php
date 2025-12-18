<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'restaurant');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get reservation ID
$reservation_id = intval($_GET['id']);

// Confirm reservation
$sql = "UPDATE reservations SET status = 'confirmed' WHERE reservation_id = $reservation_id";
if ($conn->query($sql) === TRUE) {
    echo "Reservation confirmed successfully.";
} else {
    echo "Error confirming reservation: " . $conn->error;
}

$conn->close();
?>
<a href="view_reservations.php">Back to Reservations</a>
