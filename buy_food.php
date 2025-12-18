<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Food</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input, select, button {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #27ae60;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #219150;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Buy Food</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['customer_name'];
            $email = $_POST['customer_email'];
            $phone = $_POST['customer_phone'];
            $food_item = $_POST['food_item'];
            $quantity = $_POST['quantity'];
            $price_per_item = $_POST['price_per_item']; // Hidden field
            $total_price = $quantity * $price_per_item;

            $sql = "INSERT INTO food_orders (customer_name, customer_email, customer_phone, food_item, quantity, total_price) 
                    VALUES ('$name', '$email', '$phone', '$food_item', $quantity, $total_price)";
            
            if ($conn->query($sql) === TRUE) {
                echo "<p style='color: green;'>Order placed successfully!</p>";
            } else {
                echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
            }
        }
        ?>

        <form method="POST" action="">
            <label for="customer_name">Name:</label>
            <input type="text" name="customer_name" id="customer_name" required>

            <label for="customer_email">Email:</label>
            <input type="email" name="customer_email" id="customer_email" required>

            <label for="customer_phone">Phone:</label>
            <input type="text" name="customer_phone" id="customer_phone" required>

            <label for="food_item">Food Item:</label>
            <select name="food_item" id="food_item" required>
                <?php
                $query = "SELECT menu_name, price FROM meals";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['menu_name'] . "' data-price='" . $row['price'] . "'>" 
                             . $row['menu_name'] . " - $" . $row['price'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No items available</option>";
                }
                ?>
            </select>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" min="1" required>

            <input type="hidden" name="price_per_item" id="price_per_item">

            <button type="submit">Place Order</button>
        </form>
    </div>

    <script>
        // Automatically update the hidden price field based on selected food item
        const foodItemSelect = document.getElementById('food_item');
        const priceInput = document.getElementById('price_per_item');

        foodItemSelect.addEventListener('change', function () {
            const selectedOption = foodItemSelect.options[foodItemSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            priceInput.value = price;
        });

        // Set initial price on page load
        document.addEventListener('DOMContentLoaded', function () {
            foodItemSelect.dispatchEvent(new Event('change'));
        });
    </script>
</body>
</html>
