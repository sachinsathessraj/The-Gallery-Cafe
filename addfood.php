<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Food Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .form-container {
            margin-bottom: 30px;
        }
        .form-container form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .form-container input, .form-container select, .form-container button {
            padding: 10px;
            width: 48%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container button {
            background-color: #27ae60;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #219150;
        }
        .action-buttons a {
            text-decoration: none;
            padding: 5px 10px;
            background: #3498db;
            color: white;
            border-radius: 4px;
            margin-right: 5px;
        }
        .action-buttons a.delete {
            background: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Panel - Manage Food Menu</h1>

        <!-- Form for Adding Meals -->
        <div class="form-container">
            <h2>Add New Meal</h2>
            <form method="POST" action="admin_actions.php">
                <input type="text" name="menu_name" placeholder="Meal Name" required>
                <input type="text" name="meal_type" placeholder="Meal Type (e.g., Appetizer)" required>
                <input type="text" name="cuisine_type" placeholder="Cuisine Type (e.g., Italian)" required>
                <input type="text" name="description" placeholder="Description" required>
                <input type="number" step="0.01" name="price" placeholder="Price" required>
                <select name="special">
                    <option value="0">Not Special</option>
                    <option value="1">Special</option>
                </select>
                <button type="submit" name="action" value="add">Add Meal</button>
            </form>
        </div>

        <!-- List Existing Meals -->
        <h2>Existing Meals</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Cuisine</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Special</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM meals";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>" . htmlspecialchars($row['menu_name']) . "</td>
                            <td>" . htmlspecialchars($row['meal_type']) . "</td>
                            <td>" . htmlspecialchars($row['cuisine_type']) . "</td>
                            <td>" . htmlspecialchars($row['description']) . "</td>
                            <td>\${$row['price']}</td>
                            <td>" . ($row['special'] ? 'Yes' : 'No') . "</td>
                            <td class='action-buttons'>
                                <a href='edit_meal.php?id={$row['id']}'>Edit</a>
                                <a href='admin_actions.php?id={$row['id']}&action=delete' class='delete'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' style='text-align:center;'>No meals available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
