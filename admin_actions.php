<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $menu_name = $_POST['menu_name'];
    $meal_type = $_POST['meal_type'];
    $cuisine_type = $_POST['cuisine_type'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $special = $_POST['special'];

    if ($_POST['action'] === 'add') {
        $query = "INSERT INTO meals (menu_name, meal_type, cuisine_type, description, price, special)
                  VALUES ('$menu_name', '$meal_type', '$cuisine_type', '$description', $price, $special)";
        $conn->query($query);
    } elseif ($_POST['action'] === 'update') {
        $id = $_POST['id'];
        $query = "UPDATE meals SET 
                  menu_name='$menu_name', meal_type='$meal_type', cuisine_type='$cuisine_type', 
                  description='$description', price=$price, special=$special
                  WHERE id=$id";
        $conn->query($query);
    }
    header("Location: addfood.php");
}

if ($_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM meals WHERE id=$id";
    $conn->query($query);
    header("Location: addfood.php");
}
?>
