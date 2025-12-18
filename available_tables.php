<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Tables</title>
    <link rel="stylesheet" href="css/tanle.css">
</head>
<body>
    <div class="container">
        <h1>Available Tables</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Table Number</th>
                    <th>Capacity</th>
                    <th>Status</th>
                    <th>Reservation Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM tables";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['table_number']}</td>
                                <td>{$row['capacity']}</td>
                                <td>{$row['status']}</td>
                                <td>" . ($row['reservation_time'] ?? 'N/A') . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No tables available.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add_table.php" class="btn">Add Table</a>
    </div>
</body>
</html>
