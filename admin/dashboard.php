<?php include('../db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/table.css">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <a href="add_table.php" class="btn">Add New Table</a>
        <table border="1">
            <thead>
                <tr>
                    <th>Table Number</th>
                    <th>Capacity</th>
                    <th>Status</th>
                    <th>Reservation Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM tables";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                            <tr>
                                <td>{$row['table_number']}</td>
                                <td>{$row['capacity']}</td>
                                <td>{$row['status']}</td>
                                <td>" . ($row['reservation_time'] ?? 'N/A') . "</td>
                                <td>
                                    <a href='edit_table.php?id={$row['id']}' class='btn'>Edit</a>
                                    <a href='delete_table.php?id={$row['id']}' class='btn delete'>Delete</a>
                                </td>
                            </tr>
                        ";
                    }
                } else {
                    echo "<tr><td colspan='5'>No tables found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
