<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'restaurant');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reservation_id = intval($_POST['reservation_id']);
    $new_date = $_POST['reservation_date'];
    $new_time = $_POST['reservation_time'];
    $new_guests = intval($_POST['guests']);

    $sql = "UPDATE reservations SET reservation_date = '$new_date', reservation_time = '$new_time', guests = $new_guests WHERE reservation_id = $reservation_id";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation modified successfully.";
    } else {
        echo "Error modifying reservation: " . $conn->error;
    }
    echo "<a href='view_reservations.php'>Back to Reservations</a>";
} else {
    // Get reservation details
    $reservation_id = intval($_GET['id']);
    $sql = "SELECT * FROM reservations WHERE reservation_id = $reservation_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $reservation = $result->fetch_assoc();
    } else {
        die("Reservation not found.");
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modify Reservation</title>
    <link rel="stylesheet" href="css/Reservations.css">

</head>
<body>
    <h1>Modify Reservation</h1>
    <form method="post" action="modify.php">
        <input type="hidden" name="reservation_id" value="<?= $reservation['reservation_id']; ?>">
        <label for="reservation_date">New Date:</label>
        <input type="date" name="reservation_date" id="reservation_date" value="<?= $reservation['reservation_date']; ?>" required><br>
        <label for="reservation_time">New Time:</label>
        <input type="time" name="reservation_time" id="reservation_time" value="<?= $reservation['reservation_time']; ?>" required><br>
        <label for="guests">Number of Guests:</label>
        <input type="number" name="guests" id="guests" value="<?= $reservation['guests']; ?>" required><br>
        <button type="submit">Modify</button>
    </form>
</body>
</html>
