<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'restaurant');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get reservation ID
$reservation_id = intval($_GET['id']);

// Cancel reservation
$sql = "UPDATE reservations SET status = 'canceled' WHERE reservation_id = $reservation_id";
if ($conn->query($sql) === TRUE) {
    echo "Reservation canceled successfully.";
} else {
    echo "Error canceling reservation: " . $conn->error;
}

$conn->close();
?>
<a href="view_reservations.php">Back to Reservations</a>
