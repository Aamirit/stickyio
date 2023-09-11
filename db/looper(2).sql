-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 09:10 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `looper`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `paid_amount` varchar(255) DEFAULT NULL,
  `shipping_address_1` varchar(255) DEFAULT NULL,
  `shipping_address_2` varchar(555) DEFAULT NULL,
  `country_code` varchar(55) DEFAULT NULL,
  `admin_area_1` varchar(555) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL DEFAULT 'Paypal',
  `payment_status` varchar(50) DEFAULT NULL,
  `aff` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `customer_name`, `product_name`, `customer_id`, `email`, `paid_amount`, `shipping_address_1`, `shipping_address_2`, `country_code`, `admin_area_1`, `postal_code`, `payment_id`, `payment_method`, `payment_status`, `aff`, `created_at`, `updated_at`) VALUES
(10260, 1, 'ghf', 'keto offer', NULL, 'mfarhanriaz14@gmail.com', '124.95', 'fghgf', NULL, 'AR', NULL, '6000', NULL, 'credits', NULL, '', '2023-06-12 18:51:15', '2023-06-12 18:51:15'),
(10261, 1, 'ghf', 'keto offer', NULL, 'mfarhanriaz14@gmail.com', '27.47', 'fghgf', NULL, 'AR', NULL, '6000', NULL, 'credits', NULL, '', '2023-06-12 19:05:55', '2023-06-12 19:05:55'),
(10262, 0, '', '', NULL, '', '', '', NULL, '', NULL, '', NULL, 'paypal', NULL, '', '2023-06-12 22:29:23', '2023-06-12 22:29:23'),
(10268, 85, 'Paypal', 'keto offer', NULL, 'paypal6487560ee4fce@sticky.io', '124.95', 'Paypal', NULL, 'US', NULL, '12345', NULL, 'paypal', NULL, '', '2023-06-12 22:29:53', '2023-06-12 22:29:53'),
(10271, 1, 'John', 'keto offer', NULL, 'mfarhanriaz14@gmail.com', '124.95', 'Barbara Strozzilaan 201', NULL, 'NL', NULL, '1083 HN', NULL, 'paypal', NULL, '', '2023-06-14 14:12:03', '2023-06-14 14:12:03'),
(10272, 1, 'John', 'keto offer', NULL, 'mfarhanriaz14@gmail.com', '69.90', 'Barbara Strozzilaan 201', NULL, 'NL', NULL, '1083 HN', NULL, 'paypal', NULL, '', '2023-06-14 15:01:25', '2023-06-14 15:01:25'),
(10273, 88, 'John', 'keto offer', NULL, 'mfarhanriazz13@gmail.com', '69.90', 'Badensche Stra&#223;e 24', NULL, 'DE', NULL, '10715', NULL, 'paypal', NULL, '', '2023-06-14 15:09:25', '2023-06-14 15:09:25'),
(10274, 1, 'John', 'keto offer', NULL, 'mfarhanriaz14@gmail.com', '69.90', 'Badensche Stra&#223;e 24', NULL, 'DE', NULL, '10715', NULL, 'paypal', NULL, '', '2023-06-14 15:18:12', '2023-06-14 15:18:12'),
(10275, 1, 'John', 'keto offer', NULL, 'mfarhanriaz14@gmail.com', '124.95', '123 rue du commerce', NULL, 'BE', NULL, '1040', NULL, 'paypal', NULL, '', '2023-06-14 18:38:40', '2023-06-14 18:38:40'),
(10276, 1, 'dsfds', 'keto offer', NULL, 'mfarhanriaz14@gmail.com', '124.95', 'msdfsd', NULL, 'EE', NULL, '60000', NULL, 'credits', NULL, '', '2023-06-14 18:40:34', '2023-06-14 18:40:34'),
(10277, 1, 'dsfds', 'keto offer', NULL, 'mfarhanriaz14@gmail.com', '69.90', 'msdfsd', NULL, 'EE', NULL, '60000', NULL, 'credits', NULL, '', '2023-06-14 18:41:05', '2023-06-14 18:41:05'),
(10278, 1, 'dsfds', 'keto offer', NULL, 'mfarhanriaz14@gmail.com', '69.90', 'msdfsd', NULL, 'EE', NULL, '60000', NULL, 'credits', NULL, '', '2023-06-14 18:41:16', '2023-06-14 18:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_quantity` int(5) DEFAULT NULL,
  `product_price` varchar(50) DEFAULT NULL,
  `shipping_amount` varchar(50) DEFAULT NULL,
  `is_upsell` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = upsell , 2 = downsell',
  `type` tinyint(1) DEFAULT 1 COMMENT '1 = product , 2 = deal',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_quantity`, `product_price`, `shipping_amount`, `is_upsell`, `type`, `created_at`, `updated_at`) VALUES
(1, 10260, 3, 'keto offer', NULL, '124.95', NULL, 0, 1, '2023-06-12 18:51:15', '2023-06-12 18:51:15'),
(2, 10261, 6, 'keto offer', NULL, '27.47', NULL, 0, 1, '2023-06-12 19:05:55', '2023-06-12 19:05:55'),
(3, 10268, 3, 'keto offer', NULL, '124.95', NULL, 0, 1, '2023-06-12 22:29:54', '2023-06-12 22:29:54'),
(4, 10271, 3, 'keto offer', NULL, '124.95', NULL, 0, 1, '2023-06-14 14:12:04', '2023-06-14 14:12:04'),
(5, 10272, 5, 'keto offer', NULL, '69.90', NULL, 0, 1, '2023-06-14 15:01:26', '2023-06-14 15:01:26'),
(6, 10273, 5, 'keto offer', NULL, '69.90', NULL, 0, 1, '2023-06-14 15:09:25', '2023-06-14 15:09:25'),
(7, 10274, 6, 'keto offer', NULL, '69.90', NULL, 0, 1, '2023-06-14 15:18:13', '2023-06-14 15:18:13'),
(8, 10275, 3, 'keto offer', NULL, '124.95', NULL, 0, 1, '2023-06-14 18:38:40', '2023-06-14 18:38:40'),
(9, 10276, 3, 'keto offer', NULL, '124.95', NULL, 0, 1, '2023-06-14 18:40:34', '2023-06-14 18:40:34'),
(10, 10277, 5, 'keto offer', NULL, '69.90', NULL, 0, 1, '2023-06-14 18:41:05', '2023-06-14 18:41:05'),
(11, 10278, 6, 'keto offer', NULL, '69.90', NULL, 0, 1, '2023-06-14 18:41:16', '2023-06-14 18:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `shipping_rate` decimal(5,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_upsell` tinyint(1) NOT NULL DEFAULT 0,
  `upsell_on` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vistor`
--

CREATE TABLE `vistor` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `vistor_type` varchar(255) NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vistor`
--

INSERT INTO `vistor` (`id`, `ip`, `vistor_type`, `page`, `created_at`) VALUES
(2, '127.0.0.1', 'page_view', 'landing', '2023-06-09 16:11:18'),
(3, '127.0.0.1', 'page_click', 'landing', '2023-06-09 16:11:23'),
(4, '127.0.0.1', 'page_view', 'rf394_page', '2023-06-09 16:16:17'),
(5, '127.0.0.1', 'page_click', 'rf394_page', '2023-06-09 16:16:17'),
(6, '127.0.0.1', 'page_view', 'u1_page', '2023-06-12 18:51:16'),
(7, '127.0.0.1', 'page_click', 'u1_page', '2023-06-12 18:52:40'),
(8, '127.0.0.1', 'page_view', 'u2_page', '2023-06-12 18:52:40'),
(9, '127.0.0.1', 'page_click', 'u2_page', '2023-06-12 19:05:42'),
(10, '127.0.0.1', 'page_view', 'thankyou_page', '2023-06-12 19:05:56'),
(11, '127.0.0.1', 'page_click', 'thankyou_page', '2023-06-12 19:10:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vistor`
--
ALTER TABLE `vistor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10279;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vistor`
--
ALTER TABLE `vistor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
