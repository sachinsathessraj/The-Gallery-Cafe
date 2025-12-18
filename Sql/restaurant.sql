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
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `pre_orders`
--

CREATE TABLE `pre_orders` (
  `pre_order_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `cuisine_type` varchar(50) DEFAULT NULL,
  `food_item` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pre_orders`
--

INSERT INTO `pre_orders` (`pre_order_id`, `reservation_id`, `cuisine_type`, `food_item`, `quantity`) VALUES
(1, 1, 'Sri Lankan', 'hoops', 1),
(2, 2, 'Sri Lankan', 'rice', 2),
(3, 3, 'Sri Lankan', 'rice', 2),
(4, 4, 'Sri Lankan', 'rice', 2),
(5, 5, 'Sri Lankan', 'pitu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `reservation_date` date DEFAULT NULL,
  `reservation_time` time DEFAULT NULL,
  `guests` int(11) DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `customer_name`, `customer_email`, `reservation_date`, `reservation_time`, `guests`, `status`, `created_at`) VALUES
(1, 'sachin', 'satheesrajsachin111@gmail.com', '2024-12-29', '21:26:00', 2, 'confirmed', '2024-12-15 15:54:50'),
(2, 'shifran', 'shifran@gmail.com', '2024-12-21', '10:43:00', 2, 'pending', '2024-12-19 05:07:39'),
(3, 'shifran', 'shifran@gmail.com', '2024-12-21', '10:43:00', 2, 'pending', '2024-12-19 05:08:57'),
(4, 'shifran', 'shifran@gmail.com', '2024-12-17', '10:43:00', 2, 'pending', '2024-12-19 05:09:08'),
(5, 'aswer', 'satheesrajsachin111@gmail.com', '2024-12-21', '11:29:00', 4, 'pending', '2024-12-19 05:56:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pre_orders`
--
ALTER TABLE `pre_orders`
  ADD PRIMARY KEY (`pre_order_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pre_orders`
--
ALTER TABLE `pre_orders`
  MODIFY `pre_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pre_orders`
--
ALTER TABLE `pre_orders`
  ADD CONSTRAINT `pre_orders_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
