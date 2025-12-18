<?php
$conn = new mysqli('localhost', 'root', '', 'cafe_parking');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all parking slots
$result = $conn->query("SELECT * FROM parking_slots");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Slots Availability</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #8b4513;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .status-available {
            color: green;
            font-weight: bold;
        }
        .status-occupied {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Parking Slots Availability</h1>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Slot Number</th>
                    <th>Status</th>
                    <th>Vehicle Number</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['slot_number']); ?></td>
                        <td class="<?php echo 'status-' . htmlspecialchars($row['status']); ?>">
                            <?php echo ucfirst($row['status']); ?>
                        </td>
                        <td><?php echo $row['vehicle_number'] ?: '-'; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No parking slots available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
