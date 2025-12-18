<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add_user_style.css">


    <title>Document</title>
</head>
<body>
<form action="create_user.php" method="POST">
    <label>Username:</label>
    <input type="text" name="username" required>
    
    <label>Password:</label>
    <input type="password" name="password" required>
    
    <label>Role:</label>
    <select name="role">
        <option value="admin">Admin</option>
        <option value="staff">Staff</option>
        <option value="user">User</option>
    </select>
    
    <button type="submit">Create User</button>
</form>
</body>
</html>
