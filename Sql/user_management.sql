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
-- Database: `user_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Operational Staff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `created_at`) VALUES
(2, 'lenin', '$2y$10$Vc1gX/cYnO6uzwF8n4Wg6.uyRXPNtfkUd8aXPFf2AKPG0rGS.9tfe', 3, 'lenin', 'lenin', 'lenin@gmail.com', '0711921592', 'kandy', '2024-10-05 17:51:53'),
(3, 'nimal', '$2y$10$7ShF.XOs1AiRdnx7D1Ue2ueJwIseFBn2yOT5soIGhLxrxc.mfk4b2', 2, 'nimal', 'nadashan', 'nimal@gmail.com', '0741922815', 'kandy', '2024-10-06 17:33:25'),
(5, 'user', '$2y$10$R/hzIs6m7rnKnNV12c9xVuhK82sfKiriZzf0.Cmg8nWUpKzB1lw9m', 2, 'satheesraj', 'sachin', 'user@gmail.com', '0767184947', 'kandy', '2024-10-08 18:29:16'),
(9, 'admin1', '$2y$10$WIt0UPXdJ.DRXNpxt4bg8ee9m2uWgBZcjLGReVJKfhKvl23YWVn/q', 3, 'satheesraj', 'sachin', 'satheesrajsachin11@gmail.com', '0711921591', '455/2/1 polgasdeniya katugustota', '2024-11-29 18:20:09'),
(10, 'sachin', '$2y$10$yy5Efwjo6TkzDZcRMWszo.RHQZfLpEZHuNWbBAJjfCr5j7n2S8ip6', 1, NULL, NULL, 'satheesrajsachin111@gmail.com', NULL, NULL, '2024-12-15 16:43:37'),
(11, 'admin2', '$2y$10$Cf2SgRwaTiccwqyHiLMTre8MV7uLk09yS/5U2PdBHXYvR/ZfoBuKa', 1, NULL, NULL, 'admin2@gmail.com', NULL, NULL, '2024-12-18 02:42:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
