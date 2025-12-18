<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'cafe_parking');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle add, update, and delete actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_slot'])) {
        $slot_number = $_POST['slot_number'];
        $stmt = $conn->prepare("INSERT INTO parking_slots (slot_number, status) VALUES (?, 'available')");
        $stmt->bind_param("s", $slot_number);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['update_slot'])) {
        $slot_id = $_POST['slot_id'];
        $status = $_POST['status'];
        $vehicle_number = $status == 'occupied' ? $_POST['vehicle_number'] : NULL;

        $stmt = $conn->prepare("UPDATE parking_slots SET status = ?, vehicle_number = ? WHERE id = ?");
        $stmt->bind_param("ssi", $status, $vehicle_number, $slot_id);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['delete_slot'])) {
        $slot_id = $_POST['slot_id'];
        $stmt = $conn->prepare("DELETE FROM parking_slots WHERE id = ?");
        $stmt->bind_param("i", $slot_id);
        $stmt->execute();
        $stmt->close();
    }
}

// Fetch parking slots
$result = $conn->query("SELECT * FROM parking_slots");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            width: 90%;
            margin: auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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
        form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        input, select, button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Panel - Parking Management</h1>
        <table>
            <tr>
                <th>Slot Number</th>
                <th>Status</th>
                <th>Vehicle Number</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['slot_number']); ?></td>
                    <td><?php echo ucfirst($row['status']); ?></td>
                    <td><?php echo $row['vehicle_number'] ?: '-'; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="slot_id" value="<?php echo $row['id']; ?>">
                            <select name="status">
                                <option value="available" <?php echo $row['status'] == 'available' ? 'selected' : ''; ?>>Available</option>
                                <option value="occupied" <?php echo $row['status'] == 'occupied' ? 'selected' : ''; ?>>Occupied</option>
                            </select>
                            <input type="text" name="vehicle_number" placeholder="Vehicle Number" value="<?php echo htmlspecialchars($row['vehicle_number']); ?>">
                            <button type="submit" name="update_slot">Update</button>
                            <button type="submit" name="delete_slot">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <form method="POST">
            <input type="text" name="slot_number" placeholder="New Slot Number" required>
            <button type="submit" name="add_slot">Add Slot</button>
        </form>
    </div>
</body>
</html>
