<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Reservations.css">

    <title>Document</title>
</head>
<body>
    <h1>Reservations</h1>
</body>
</html><?php
$conn = new mysqli('localhost', 'root', '', 'restaurant');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Time</th>
                <th>Guests</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['reservation_id']}</td>
                <td>{$row['customer_name']}</td>
                <td>{$row['customer_email']}</td>
                <td>{$row['reservation_date']}</td>
                <td>{$row['reservation_time']}</td>
                <td>{$row['guests']}</td>
                <td>{$row['status']}</td>
                <td>
                    <a href='confirm.php?id={$row['reservation_id']}'>Confirm</a> |
                    <a href='modify.php?id={$row['reservation_id']}'>Modify</a> |
                    <a href='cancel.php?id={$row['reservation_id']}'>Cancel</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No reservations found.";
}

$conn->close();
?>
