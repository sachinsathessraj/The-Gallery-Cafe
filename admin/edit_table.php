<?php include('../db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Table</title>
    <link rel="stylesheet" href="../css/table.css">
</head>
<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM tables WHERE id = $id";
        $result = $conn->query($query);
        $table = $result->fetch_assoc();
    }
    ?>
    <div class="container">
        <h1>Edit Table</h1>
        <form action="" method="POST">
            <label for="table_number">Table Number:</label>
            <input type="number" name="table_number" value="<?php echo $table['table_number']; ?>" required>

            <label for="capacity">Capacity:</label>
            <input type="number" name="capacity" value="<?php echo $table['capacity']; ?>" required>

            <button type="submit" name="update_table">Update Table</button>
        </form>
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
</body>
</html>

<?php
if (isset($_POST['update_table'])) {
    $table_number = $_POST['table_number'];
    $capacity = $_POST['capacity'];

    $query = "UPDATE tables SET table_number = '$table_number', capacity = '$capacity' WHERE id = $id";
    if ($conn->query($query)) {
        echo "<script>alert('Table updated successfully!'); window.location.href = 'dashboard.php';</script>";
    } else {
        echo "<script>alert('Failed to update table.'); window.location.href = 'edit_table.php?id=$id';</script>";
    }
}
?>
