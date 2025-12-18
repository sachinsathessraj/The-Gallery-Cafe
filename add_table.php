<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Table</title>
    <link rel="stylesheet" href="css/tanle.css">
</head>
<body>
    <div class="container">
        <h1>Add a New Table</h1>
        <form action="add_table.php" method="POST">
            <label for="table_number">Table Number:</label>
            <input type="number" name="table_number" required>
            
            <label for="capacity">Capacity:</label>
            <input type="number" name="capacity" required>
            
            <button type="submit" name="add_table">Add Table</button>
        </form>
        <a href="available_tables.php" class="btn">Back to Table List</a>
    </div>
</body>
</html>

<?php
if (isset($_POST['add_table'])) {
    $table_number = $_POST['table_number'];
    $capacity = $_POST['capacity'];

    $query = "INSERT INTO tables (table_number, capacity) VALUES ('$table_number', '$capacity')";
    if ($conn->query($query)) {
        echo "<script>alert('Table added successfully!'); window.location.href = 'available_tables.php';</script>";
    } else {
        echo "<script>alert('Failed to add table.'); window.location.href = 'add_table.php';</script>";
    }
}
?>
