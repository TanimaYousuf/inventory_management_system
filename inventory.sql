-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 06:07 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Watch', '2022-04-27 02:44:02', '2022-04-27 02:44:02'),
(2, 'Shirt', '2022-04-27 02:44:02', '2022-04-27 02:44:02'),
(3, 'Jewelry', '2022-04-27 02:44:02', '2022-04-27 02:44:02'),
(4, 'Book', '2022-04-27 02:44:02', '2022-04-27 02:44:02'),
(5, 'Mobile', '2022-04-27 02:44:02', '2022-04-27 02:44:02'),
(6, 'Laptop', '2022-04-27 02:44:02', '2022-04-27 02:44:02'),
(7, 'TV', '2022-04-27 02:44:02', '2022-04-27 02:44:02'),
(8, 'Bucket', '2022-04-27 02:44:02', '2022-04-27 02:44:02'),
(9, 'Saree', '2022-04-27 02:44:02', '2022-04-27 02:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `shoppings`
--

CREATE TABLE `shoppings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `buyer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_ip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_at` date NOT NULL,
  `entry_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_items`
--

CREATE TABLE `shopping_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopping_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppings`
--
ALTER TABLE `shoppings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_items`
--
ALTER TABLE `shopping_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shoppings`
--
ALTER TABLE `shoppings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `shopping_items`
--
ALTER TABLE `shopping_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
