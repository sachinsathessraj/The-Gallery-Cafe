-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2024 at 05:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_menu`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `meal_type` varchar(255) NOT NULL,
  `cuisine_type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `special` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food_orders`
--

CREATE TABLE `food_orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `food_item` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_orders`
--

INSERT INTO `food_orders` (`id`, `customer_name`, `customer_email`, `customer_phone`, `food_item`, `quantity`, `total_price`, `order_date`) VALUES
(1, 'satheesraj sachin', 'satheesrajsachin111@gmail.com', '0767184947', 'Porridge', 1, 2.50, '2024-12-18 07:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `meal_type` varchar(50) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `cuisine_type` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `special` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `meal_type`, `menu_name`, `cuisine_type`, `description`, `price`, `special`) VALUES
(1, 'Breakfast', 'Kottu Roti', 'Sri Lankan', 'Chopped flatbread stir-fried with vegetables, eggs, and choice of meat.', 5.50, 1),
(2, 'Breakfast', 'Egg Roti', 'Sri Lankan', 'Soft flatbread stuffed with eggs and onions.', 3.00, 0),
(3, 'Lunch', 'Rice and Curry', 'Sri Lankan', 'Steamed rice with an assortment of vegetable, fish, or meat curries.', 6.99, 1),
(4, 'Dinner', 'Devilled Chicken', 'Sri Lankan', 'Spicy stir-fried chicken with onions and bell peppers.', 7.50, 1),
(5, 'Special', 'Lamprais', 'Sri Lankan', 'Dutch-inspired baked rice wrapped in banana leaves.', 8.99, 1),
(6, 'Lunch', 'Beef and Broccoli', 'Chinese', 'Savory beef stir-fried with fresh broccoli and oyster sauce.', 9.50, 0),
(7, 'Lunch', 'Dumplings', 'Chinese', 'Steamed or fried dumplings filled with meat or vegetables.', 6.99, 1),
(8, 'Dinner', 'General Tso’s Chicken', 'Chinese', 'Sweet and spicy crispy chicken with a tangy sauce.', 8.99, 0),
(9, 'Special', 'Peking Duck', 'Chinese', 'Crispy roasted duck served with pancakes and hoisin sauce.', 15.00, 1),
(10, 'Breakfast', 'Frittata', 'Italian', 'Egg-based dish with vegetables, cheese, and meats.', 5.50, 0),
(11, 'Lunch', 'Risotto', 'Italian', 'Creamy rice dish cooked with mushrooms or seafood.', 10.50, 1),
(12, 'Dinner', 'Lasagna', 'Italian', 'Layered pasta baked with meat sauce and cheese.', 12.99, 0),
(13, 'Special', 'Tiramisu', 'Italian', 'Classic coffee-flavored Italian dessert.', 7.00, 1),
(14, 'Breakfast', 'Masala Dosa', 'Indian', 'Crispy rice crepe stuffed with spicy mashed potatoes.', 4.99, 1),
(15, 'Lunch', 'Butter Chicken', 'Indian', 'Creamy tomato-based curry with tender chicken pieces.', 8.50, 0),
(16, 'Dinner', 'Biryani', 'Indian', 'Fragrant rice cooked with spices, meat, and herbs.', 9.50, 1),
(17, 'Special', 'Gulab Jamun', 'Indian', 'Sweet dumplings soaked in sugar syrup.', 4.50, 1),
(18, 'Breakfast', 'Pancakes', 'American', 'Fluffy pancakes served with syrup and butter.', 4.00, 0),
(19, 'Lunch', 'Cheeseburger', 'American', 'Grilled beef patty topped with cheese and served in a bun.', 7.99, 0),
(20, 'Dinner', 'Barbecue Ribs', 'American', 'Slow-cooked pork ribs with tangy barbecue sauce.', 12.50, 1),
(21, 'Special', 'Apple Pie', 'American', 'Classic dessert with spiced apple filling and flaky crust.', 5.99, 1),
(22, 'Breakfast', 'Chilaquiles', 'Mexican', 'Tortilla chips cooked with salsa and topped with eggs.', 6.00, 0),
(23, 'Lunch', 'Tacos', 'Mexican', 'Soft or hard-shell tortillas filled with meat and toppings.', 8.00, 1),
(24, 'Dinner', 'Enchiladas', 'Mexican', 'Tortillas rolled with filling and topped with sauce.', 9.50, 0),
(25, 'Special', 'Churros', 'Mexican', 'Deep-fried dough sticks rolled in cinnamon sugar.', 4.00, 1),
(26, 'Breakfast', 'Tamago Sando', 'Japanese', 'Egg salad sandwich made with soft bread.', 5.00, 0),
(27, 'Lunch', 'Sushi', 'Japanese', 'Rice rolls with fish, seaweed, and vegetables.', 10.00, 1),
(28, 'Dinner', 'Ramen', 'Japanese', 'Noodle soup with pork, eggs, and flavorful broth.', 9.50, 0),
(29, 'Special', 'Matcha Ice Cream', 'Japanese', 'Green tea-flavored ice cream.', 3.99, 1),
(30, 'Breakfast', 'Hoppers', 'Sri Lankan', 'Crispy bowl-shaped pancakes made from fermented rice batter.', 3.50, 1),
(31, 'Breakfast', 'Porridge', 'Sri Lankan', 'Rice-based porridge with coconut milk and spices.', 2.50, 0),
(32, 'Lunch', 'Sweet and Sour Chicken', 'Chinese', 'Tender chicken in a tangy sweet and sour sauce.', 8.99, 0),
(33, 'Lunch', 'Kung Pao Chicken', 'Chinese', 'Spicy stir-fried chicken with peanuts and vegetables.', 9.50, 1),
(34, 'Dinner', 'Spaghetti Carbonara', 'Italian', 'Classic Italian pasta with creamy egg-based sauce.', 12.50, 1),
(35, 'Dinner', 'Pizza Margherita', 'Italian', 'Traditional pizza with tomatoes, mozzarella, and basil.', 10.00, 0),
(36, 'Dinner', 'Fried Rice', 'Chinese', 'Fried rice with eggs, vegetables, and choice of meat.', 7.50, 0),
(37, 'Special', 'Seafood Platter', 'Italian', 'Mixed seafood platter with lemon butter sauce.', 25.00, 1),
(38, 'Special', 'String Hoppers', 'Sri Lankan', 'Steamed rice noodle cakes served with coconut sambal.', 5.00, 1),
(39, 'Lunch', 'rice and curry', 'Sri Lankan', 'Rice and curry is a popular dish in Sri Lanka, as well as in other parts of the Indian subcontinent. Rice and curry. A rice and curry dish from Sri Lanka.', 700.00, 0),
(40, 'Lunch', 'pittu', 'Sri Lankan', 'Pittu is a steamed dish of rice flour and coconut that originated in India and Sri Lanka: ', 145.00, 0),
(41, 'Breakfast', 'Dumplings', 'Japanese', 'Dumplings are most commonly formed from flour or meal bound with egg and then simmered in water or gravy stock until they take on a light cakey texture. ', 2300.00, 1),
(42, 'Breakfast', 'Dumplings', 'Japanese', 'Dumplings are most commonly formed from flour or meal bound with egg and then simmered in water or gravy stock until they take on a light cakey texture. ', 2300.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `table_number` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` enum('available','occupied') DEFAULT 'available',
  `reservation_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_number`, `capacity`, `status`, `reservation_time`) VALUES
(1, 1, 3, 'available', NULL),
(2, 1, 4, 'available', NULL),
(3, 3, 1, 'available', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_orders`
--
ALTER TABLE `food_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_orders`
--
ALTER TABLE `food_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
