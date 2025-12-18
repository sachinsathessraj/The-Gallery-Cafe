<?php include('../db_connect.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tables WHERE id = $id";

    if ($conn->query($query)) {
        echo "<script>alert('Table deleted successfully!'); window.location.href = 'dashboard.php';</script>";
    } else {
        echo "<script>alert('Failed to delete table.'); window.location.href = 'dashboard.php';</script>";
    }
}
?>
