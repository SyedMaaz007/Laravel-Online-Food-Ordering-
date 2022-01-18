-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 12:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$Xo8k8TTVsyRReemo9YA/zO16BxctWPFdlWQhYOSjZzuS.P4nvqafC', '2021-05-14 18:10:16', '2021-05-14 18:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dish_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_name`, `user_email`, `user_no`, `user_pass`, `first_name`, `last_name`, `user_img`, `created_at`, `updated_at`) VALUES
(1, 'Maaz', 'syed.maaz8050@gmail.com', '06363811044', 'eyJpdiI6Ikl5eTNTdGdubW5jY256Z1E0T3J1ZWc9PSIsInZhbHVlIjoibG5IVXc0SW40eEhSK3lITE9IRFIyUT09IiwibWFjIjoiZWIyZGZhNjA4ZTVjYzI4MjEyOGEzZGU2ZDU2NzU0Mjg4MWI3ZDA0Y2U4ZmQ4ZTU0ZDI0NWU4NzRmNjM1MjRhMyJ9', 'Syed', 'Shakhadri', '1622563497.png', '2021-05-31 15:39:46', '2021-06-01 10:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_man`
--

CREATE TABLE `delivery_man` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_man`
--

INSERT INTO `delivery_man` (`id`, `delivery_id`, `delivery_name`, `delivery_email`, `delivery_no`, `delivery_address`, `delivery_pass`, `delivery_img`, `created_at`, `updated_at`) VALUES
(1, 'D101', 'Hero', 'hero@gmail.com', '1234567890', 'umarbagh', 'eyJpdiI6Im9INDExOFM2QmU1TmtpMHpSdlp3SkE9PSIsInZhbHVlIjoiT3E0MDE2RTFiRncxY2k2dHMxc2JRUT09IiwibWFjIjoiZjNjM2UzMTdlZDA0ODMyNWJlNjEzMjhiMmEyMGZmMGE3MDdmOGQ1YzU3OGZlNDdhYjc4NWFkNjNiZmI0YTNkOCJ9', '1622748792.jpg', '2021-06-03 14:03:12', '2021-06-04 12:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `food__catagories`
--

CREATE TABLE `food__catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food__catagories`
--

INSERT INTO `food__catagories` (`id`, `catagory_name`, `catagory_slug`, `catagory_image`, `created_at`, `updated_at`) VALUES
(1, 'Pizza', 'Pizza', '1621348817.png', '2021-05-18 09:10:18', '2021-05-18 10:42:17'),
(2, 'Burger', 'Burger', '1621350273.png', '2021-05-18 09:34:33', '2021-05-18 09:34:33'),
(4, 'Drinks', 'Drinks', '1621619834.png', '2021-05-21 12:27:14', '2021-05-21 12:27:14'),
(5, 'Ice Cream', 'Ice Cream', '1622051038.png', '2021-05-26 12:13:58', '2021-05-26 12:13:58'),
(7, 'Steaks', 'Steaks', '1622052965.png', '2021-05-26 12:46:05', '2021-05-26 12:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dish_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_catagory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `large_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `dish_name`, `res_name`, `res_id`, `food_type`, `food_desc`, `menu_catagory`, `food_image`, `base_price`, `small_price`, `large_price`, `created_at`, `updated_at`) VALUES
(3, 'cafe latte', 'Cafe Coffee Day', 'R103', 'not_required', 'bjjjjjgbujbju', 'starters', NULL, '100', '80', '120', '2021-05-22 09:24:11', '2021-05-22 09:29:18'),
(5, 'lava cake', 'Cafe Coffee Day', 'R103', 'not_required', 'cake', 'main', NULL, '300', '0', '0', '2021-05-24 17:09:49', '2021-05-24 17:09:49'),
(6, 'cake', 'Cafe Coffee Day', 'R103', 'not_required', 'bbb', 'main', NULL, '500', '0', '0', '2021-05-24 17:18:03', '2021-05-24 17:18:03'),
(7, 'margaritta', 'Pizza Hut', 'R101', 'VEG', 'pizza', 'main', '1622044564.png', '500', '200', '400', '2021-05-25 10:21:08', '2021-05-26 10:26:04'),
(8, 'chicken pizza', 'Pizza Hut', 'R101', 'NON-VEG', 'pizza 2', 'main', NULL, '300', '200', '420', '2021-05-25 10:22:16', '2021-05-25 10:22:16'),
(9, 'Paneer Pizza', 'Pizza Hut', 'R101', 'VEG', 'pizza3 3', 'main', NULL, '150', '80', '220', '2021-05-25 10:39:21', '2021-05-25 10:39:21'),
(10, 'chicken burger', 'Burger House', 'R102', 'NON-VEG', 'burger', 'main', NULL, '150', '0', '0', '2021-05-25 10:40:23', '2021-05-26 12:07:28'),
(11, 'Coke', 'Pizza Hut', 'R101', 'not_required', 'coke bottle', 'starters', NULL, '100', '80', '120', '2021-05-26 10:39:42', '2021-05-26 10:39:42'),
(12, 'French Fires', 'Burger House', 'R102', 'VEG', 'fries', 'starters', NULL, '50', '0', '0', '2021-05-26 12:07:20', '2021-05-26 12:15:14'),
(13, 'vanilla ice cream', 'Burger House', 'R102', 'not_required', 'ice cream', 'dessert', NULL, '30', '0', '0', '2021-05-26 12:09:23', '2021-05-26 12:15:31'),
(14, 'combo burger', 'Burger House', 'R102', 'VEG', 'combo', 'main', NULL, '400', '0', '0', '2021-05-28 10:33:03', '2021-05-28 10:33:03'),
(15, 'Sizzler With Mashed Potato', 'Steak House', 'R104', 'NON-VEG', 'Sizzler With Mashed Potato  With Veggies And Beans', 'main', NULL, '750', '0', '0', '2021-06-01 17:17:34', '2021-06-01 17:17:34'),
(16, 'Gadbad', 'Joy Ice Cream', 'R105', 'not_required', 'Mixture Of Ice cream And Fruits', 'main', NULL, '150', '0', '0', '2021-06-01 17:22:50', '2021-06-01 17:22:50'),
(17, 'Chocobar', 'Joy Ice Cream', 'R105', 'not_required', 'Chocolate ice candy.', 'dessert', NULL, '15', '0', '0', '2021-06-04 13:24:41', '2021-06-04 13:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_02_183117_create_admins_table', 1),
(2, '2021_05_15_194626_create_food__catagories_table', 2),
(4, '2021_05_15_161719_create_restaurants_table', 3),
(5, '2021_05_19_142458_create_menus_table', 4),
(6, '2021_05_22_170035_create_menu_masters_table', 5),
(7, '2021_05_22_191244_create_carts_table', 6),
(8, '2021_05_31_201714_create_customers_table', 7),
(9, '2021_05_21_210657_create_orders_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dish_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `res_name`, `res_id`, `dish_name`, `quantity`, `size`, `price`, `food_type`) VALUES
(1, '2', 'Burger House', 'R102', 'French Fires', '1', 'Regular', '50', 'VEG'),
(2, '2', 'Burger House', 'R102', 'chicken burger', '4', 'Regular', '600', 'NON-VEG'),
(3, '3', 'Burger House', 'R102', 'chicken burger', '1', 'Regular', '150', 'NON-VEG'),
(4, '3', 'Burger House', 'R102', 'combo burger', '2', 'Regular', '800', 'VEG'),
(5, '4', 'Pizza Hut', 'R101', 'chicken pizza', '2', 'Regular', '600', 'NON-VEG'),
(6, '4', 'Pizza Hut', 'R101', 'margaritta', '2', 'Large', '800', 'VEG'),
(9, '7', 'Joy Ice Cream', 'R105', 'Gadbad', '2', 'Regular', '300', 'not_required'),
(10, '8', 'Cafe Coffee Day', 'R103', 'cafe latte', '1', 'Large', '120', 'not_required'),
(11, '8', 'Cafe Coffee Day', '', 'cafe latte', '1', 'Small', '80', 'not_required');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_name`, `number`, `email`, `address`, `instruction`, `total_price`, `order_status`, `payment_type`, `delivery_id`, `added_on`) VALUES
(2, 'maaz', '06363811044', 'oolala9262@gmail.com', 'umarbagh', NULL, '750', '4', 'COD', 'D101', '2021-05-27 09:31:19'),
(3, 'maaz', '06363811044', 'jhyas@gmail.com', 'umarbagh', 'kndjbdd', '1050', '1', 'COD', '', '2021-05-28 04:04:13'),
(4, 'maaz', '06363811044', 'syed@gmail.com', 'umarbagh layout bsk ward Banashakari', 'Bangalore', '1500', '2', 'COD', 'D101', '2021-05-29 10:42:05'),
(7, 'bjdkbei', '1234567800', 'oolala@gmail.com', 'umarbagh layout  bsk ward', 'Bangalore', '400', '4', 'COD', 'D101', '2021-06-04 05:35:49'),
(8, 'maaz', '1234567890', 'hero@gmail.com', 'umarbagh', 'kndjbdd', '300', '1', 'COD', NULL, '2021-06-04 06:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `order_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_status`) VALUES
(1, 'Order Placed'),
(2, 'Preparing Order'),
(3, 'On The Way'),
(4, 'Order Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `res_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_loc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_catagory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `res_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) NOT NULL,
  `trending` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `res_id`, `res_pass`, `restaurant_name`, `res_sign`, `restaurant_loc`, `food_catagory`, `res_address`, `image`, `status`, `trending`, `created_at`, `updated_at`) VALUES
(1, 'R101', 'eyJpdiI6IlBzVlZTSFdLMDVVM25JS2NHVHRubVE9PSIsInZhbHVlIjoiVEdwN0pUKzlTT2NCTE80OW8wUHFhZz09IiwibWFjIjoiNDY1MzM4Y2YyNWQyMGE5OTA0ZmJhYWM4ZGE2MTM4NGZkZjY5MjhkYzVhODU2ZjI3MDU0MDdhODk3ZjJkYjM3ZSJ9', 'Pizza Hut', 'Pizza • Indian • Italian • veg', 'Bangalore', 'Pizza', 'umarbagh\r\nlayout', '1621531184.png', 1, 0, '2021-05-18 13:16:15', '2021-06-04 16:49:22'),
(3, 'R102', 'eyJpdiI6IlNtRHBLUFJWUW5iWjJEUUtwMXZmUWc9PSIsInZhbHVlIjoieXFVNEtFNEpoK25pQ1pSajNwSnNSZz09IiwibWFjIjoiYTBhMGE0ZTIwZmZiMmUyOTFjMjBjYjUyMzMxMzU3MWM3YjM1N2JkYzIwZjk1NmMwMTIyYTVlNWQ0MzM0MWZlZCJ9', 'Burger House', 'Burgers • Indian • Americans • veg', 'Bangalore', 'Burger', 'JP Nagar', '1621612152.png', 1, 1, '2021-05-21 10:19:12', '2021-06-04 16:32:54'),
(4, 'R103', 'eyJpdiI6Ii9UK3JVYkJSeUs5dDFIdENFZzB0b3c9PSIsInZhbHVlIjoiUUtKY2s0ZWU3RVdyMEozakFQNXN4UT09IiwibWFjIjoiYjAzNTMxNzc3ZjhmYzM0ZTY5MWE3ZWMxMzAzNTAxYTNiNDJiZGQzYjBmYmIyNDc5NGY2NjM4NjAwMzIxNmE3YSJ9', 'Cafe Coffee Day', 'Hot Coffee Sandwiches and Snacks', 'Bangalore', 'Drinks', 'kormangala', '1621694183.png', 1, 1, '2021-05-22 09:06:23', '2021-06-01 16:49:53'),
(5, 'R104', 'eyJpdiI6IkNXWS9qRGlEbWZBTGdoanBSdHFwR3c9PSIsInZhbHVlIjoiTHcvSnEwcUhLOUN5Vm5Cdk5KU2YxUT09IiwibWFjIjoiMWVmMDBjYjk2MDFiM2Y2ZTJiYmRkZDAzZDJkOWJhMDc5NjRjZTQ3NmU4YWMzYjVlMWMxMjcwMmE2ZTg4ZmY1MCJ9', 'Steak House', 'Hot Sizzlers  * Sandwiches  *  Snacks', 'Bangalore', 'Steaks', 'Mg road', '1622565103.png', 1, 0, '2021-06-01 10:50:21', '2021-06-01 16:50:08'),
(6, 'R105', 'eyJpdiI6Ik1mdWc3S3Z5bVpOTWVnSzVJVjQwMmc9PSIsInZhbHVlIjoiazZtcWxzUnhHb0xaZWFsYmR5T0t5UT09IiwibWFjIjoiMDliODJlMzBmMjY3OGM5MTFjMjIwM2IxYmFlZjE0ZWZhMGUyNDg1YTA1NTZkMDNkN2M1ZTQ4OWMwNzM4MzE3ZCJ9', 'Joy Ice Cream', 'Ice  Cream * Brownies * Cake', 'Bangalore', 'Ice Cream', 'Hudsun Circle', '1622565726.png', 1, 0, '2021-06-01 11:08:20', '2021-06-01 16:50:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_man`
--
ALTER TABLE `delivery_man`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food__catagories`
--
ALTER TABLE `food__catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_man`
--
ALTER TABLE `delivery_man`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food__catagories`
--
ALTER TABLE `food__catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
