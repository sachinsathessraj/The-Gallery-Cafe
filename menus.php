<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu</title>
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
        .search-bar {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-bar input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .meal-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }
        .meal-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 30%;
            padding: 15px;
            box-sizing: border-box;
        }
        .meal-card h3 {
            margin: 0 0 10px;
        }
        .meal-card p {
            margin: 5px 0;
            color: #555;
        }
        .meal-card .price {
            font-weight: bold;
            color: #27ae60;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Explore Our Food Menu</h1>
        <div class="search-bar">
            <form method="GET" action="">
                <input type="text" name="search" placeholder="Search by cuisine type (e.g., Italian)">
                <button type="submit">Search</button>
                <button><a href="buy_food.php">Place Order</a></button>

            </form>
        </div>

        <div class="meal-list">
            <?php
            $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
            $query = "SELECT * FROM meals WHERE cuisine_type LIKE '%$searchQuery%' ORDER BY meal_type, menu_name";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <div class='meal-card'>
                            <h3>" . htmlspecialchars($row['menu_name']) . "</h3>
                            <p><strong>Type:</strong> " . htmlspecialchars($row['meal_type']) . "</p>
                            <p><strong>Cuisine:</strong> " . htmlspecialchars($row['cuisine_type']) . "</p>
                            <p><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>
                            <p class='price'>Price: $" . htmlspecialchars($row['price']) . "</p>
                            " . ($row['special'] ? "<p style='color: #e74c3c; font-weight: bold;'>Special Dish!</p>" : "") . "
                        </div>
                    ";
                }
            } else {
                echo "<p style='text-align:center; color:#999;'>No meals found matching your search.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
