<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'restaurant');

    // Check Connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize Input
    $customer_name = htmlspecialchars($_POST['customer_name']);
    $customer_email = htmlspecialchars($_POST['customer_email']);
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $guests = (int) $_POST['guests'];
    $cuisine_type = htmlspecialchars($_POST['cuisine_type']);
    $food_item = htmlspecialchars($_POST['food_item']);
    $quantity = (int) $_POST['quantity'];

    // Insert into Reservations
    $sql_reservation = "INSERT INTO reservations (customer_name, customer_email, reservation_date, reservation_time, guests) 
                        VALUES ('$customer_name', '$customer_email', '$reservation_date', '$reservation_time', $guests)";

    if ($conn->query($sql_reservation) === TRUE) {
        $reservation_id = $conn->insert_id;

        // Insert into Pre-orders
        $sql_preorder = "INSERT INTO pre_orders (reservation_id, cuisine_type, food_item, quantity) 
                         VALUES ($reservation_id, '$cuisine_type', '$food_item', $quantity)";
        if ($conn->query($sql_preorder) === TRUE) {
            echo "Reservation and pre-order placed successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
