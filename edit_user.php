<?php
$conn = new mysqli('localhost', 'root', '', 'add_user');
$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE user_id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>
<form action="update_user.php" method="POST">
    <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
    
    <label>Username:</label>
    <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
    
    <label>Role:</label>
    <select name="role">
        <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
        <option value="staff" <?php if ($user['role'] == 'staff') echo 'selected'; ?>>Staff</option>
        <option value="user" <?php if ($user['role'] == 'user') echo 'selected'; ?>>User</option>
    </select>
    
    <button type="submit">Update User</button>
</form>
