-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 07:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigma`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `generated_cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `generated_cart_id`, `product_id`, `product_quantity`, `created_at`, `updated_at`) VALUES
(8, '999991675064446', 9, 8, '2023-01-30 07:56:23', '2023-01-30 07:57:05'),
(9, '999991675064446', 4, 4, '2023-01-30 07:56:35', '2023-01-30 07:57:56'),
(10, '999991675064446', 8, 4, '2023-01-30 08:04:52', '2023-01-30 08:05:07'),
(12, '1000001675071694', 8, 1, '2023-01-30 09:41:54', '2023-01-30 13:28:11'),
(14, '1000001675071694', 1, 3, '2023-01-30 09:43:10', '2023-01-30 13:27:51'),
(15, '1000001675102728', 1, 15, '2023-01-30 18:18:48', '2023-01-30 18:19:38'),
(18, '1000001675102728', 7, 3, '2023-01-30 18:53:17', NULL),
(19, '1000001675144845', 1, 2, '2023-01-31 06:00:45', NULL),
(20, '1000001675144845', 6, 4, '2023-01-31 06:02:17', '2023-01-31 13:46:33'),
(25, '1000001675175295', 2, 2, '2023-01-31 20:16:32', NULL),
(27, '1000001675175295', 1, 2, '2023-01-31 21:13:04', NULL),
(28, '1000001675175295', 4, 1, '2023-01-31 21:13:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `category_image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `added_by`, `category_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 'TV', 9, '19.jpg', '2023-01-31 11:54:31', '2023-01-31 11:54:31', NULL),
(20, 'Fridge', 9, '20.jpg', '2023-01-31 12:22:10', '2023-01-31 12:22:10', NULL),
(21, 'Mobile', 9, '21.jpg', '2023-01-31 12:35:10', '2023-01-31 12:35:11', NULL),
(22, 'Camera', 9, '22.jpg', '2023-01-31 12:49:54', '2023-01-31 12:49:54', NULL),
(23, 'Watch', 9, '23.jpg', '2023-01-31 13:04:45', '2023-01-31 13:04:45', NULL),
(24, 'Fan', 9, '24.webp', '2023-01-31 13:16:19', '2023-01-31 13:16:19', NULL),
(25, 'Headphone', 9, '25.webp', '2023-01-31 13:28:11', '2023-01-31 13:28:11', NULL),
(26, 'Rice Cooker', 9, '26.jpg', '2023-01-31 13:35:00', '2023-01-31 13:35:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_25_143016_create_categories_table', 1),
(6, '2021_10_01_171505_create_subcategories_table', 1),
(10, '2022_09_18_114818_create_products_table', 2),
(12, '2023_01_30_130659_create_carts_table', 3),
(13, '2023_02_01_001952_create_orders_table', 4),
(14, '2023_02_01_002327_create_order_details_table', 5),
(15, '2023_02_01_004308_create_order_product_details_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `subtotal`, `discount`, `payment_method`, `created_at`, `updated_at`) VALUES
(8, 10, 182000, 182000, 0, 1, '2023-02-01 03:13:25', NULL),
(9, 10, 100000, 100000, 0, 1, '2023-02-01 06:32:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `name`, `email`, `mobile`, `address`, `notes`, `created_at`, `updated_at`) VALUES
(8, 8, 'Buyer', 'buyer@gmail.com', '01521122542', 'Trishal, Mymensingh', 'Please delivery fast', '2023-02-01 03:13:25', NULL),
(9, 9, 'Buyer', 'buyer@gmail.com', '01521122542', 'Trishal, Mymensingh', 'Deliver fast', '2023-02-01 06:32:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_product_details`
--

CREATE TABLE `order_product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product_details`
--

INSERT INTO `order_product_details` (`id`, `order_id`, `product_name`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(17, 8, 'Sony fridge', 16000, 2, '2023-02-01 03:13:25', NULL),
(18, 8, 'Canon Camera', 50000, 3, '2023-02-01 03:13:25', NULL),
(19, 9, 'Samsung Dekstop TV', 10000, 10, '2023-02-01 06:32:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$pfENLH9EJebD73vwVvyOxejcA3WGnhsoyltQrTZ6w86HYBSXOtGMu', '2022-12-05 07:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `product_name`, `product_price`, `product_desc`, `product_quantity`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 19, 12, 'Samsung Dekstop TV', '10000', 'A beautiful dekstop TV for home', 10, '1.jpg', '2023-01-31 12:02:57', '2023-01-31 12:02:57'),
(2, 19, 13, 'Walton TV', '9000', 'A color television', 7, '2.jpg', '2023-01-31 12:07:49', '2023-01-31 12:07:49'),
(3, 19, 15, 'A Sony Smart TV', '20000', 'A smart Sony TV for Home and office', 2, '3.jpg', '2023-01-31 12:13:08', '2023-01-31 12:13:08'),
(4, 19, 14, 'LG Television', '8999', 'Smart LG TV', 7, '4.webp', '2023-01-31 12:13:58', '2023-01-31 12:13:59'),
(5, 20, 12, 'A Samsung Fridge', '18000', 'A smart fridge', 10, '5.jpg', '2023-01-31 12:24:49', '2023-01-31 12:24:49'),
(6, 20, 13, 'Walton Fridge', '20000', 'Smart Walton Fridge', 3, '6.png', '2023-01-31 12:26:23', '2023-01-31 12:26:23'),
(7, 20, 15, 'Sony fridge', '16000', 'Smart Sony Fridge', 2, '7.jpg', '2023-01-31 12:28:50', '2023-01-31 12:28:50'),
(8, 20, 14, 'LG Fridge', '8999', 'Lg fridge for home', 7, '8.jpg', '2023-01-31 12:30:21', '2023-01-31 12:30:21'),
(9, 19, 17, 'Apple Phone', '79999', 'Apple new phone', 10, '9.jpg', '2023-01-31 12:36:52', '2023-01-31 12:36:52'),
(10, 21, 14, 'LG Phone', '9000', 'LG Android Phone', 3, '10.png', '2023-01-31 12:39:06', '2023-01-31 12:39:06'),
(11, 21, 18, 'Symphony Android Phone', '20000', 'Su/ymphony smart phone', 7, '11.jpg', '2023-01-31 12:42:02', '2023-01-31 12:42:03'),
(12, 21, 19, 'Nokia Android Phone', '10000', 'Nokia Smart Phone', 2, '12.jpg', '2023-01-31 12:43:33', '2023-01-31 12:43:33'),
(13, 22, 20, 'Canon Camera', '50000', 'Canon Camera', 3, '13.jpg', '2023-01-31 12:52:24', '2023-01-31 12:52:24'),
(14, 22, 21, 'Sony Camera', '70000', 'Smart Sony Camera', 7, '14.png', '2023-01-31 12:54:07', '2023-01-31 12:54:07'),
(15, 22, 23, 'Instax Camer', '100000', 'Instax Camera For professional', 7, '15.png', '2023-01-31 12:56:31', '2023-01-31 12:56:32'),
(16, 22, 24, 'Argos camera', '200000', 'Argos Camera', 3, '16.jpg', '2023-01-31 12:59:47', '2023-01-31 12:59:47'),
(17, 23, 27, 'Apple Watch', '19999', 'Apple Watch Smart', 10, '17.jpg', '2023-01-31 13:08:14', '2023-01-31 13:08:14'),
(18, 23, 28, 'Samsung watch', '20000', 'Samsung Watch', 3, '18.jpg', '2023-01-31 13:12:07', '2023-01-31 13:12:08'),
(19, 24, 30, 'SQ Fan', '1500', 'SQ Fan for Home', 7, '19.jpg', '2023-01-31 13:18:29', '2023-01-31 13:18:30'),
(20, 24, 29, 'Walton Fan', '2000', 'Walton Fan For home and office', 3, '20.jpg', '2023-01-31 13:19:23', '2023-01-31 13:19:24'),
(21, 24, 15, 'Sony Fan', '9000', 'Sony Fan For office', 10, '21.jpg', '2023-01-31 13:20:36', '2023-01-31 13:20:36'),
(22, 24, 31, 'Table Fan', '1800', 'Table fan For Home', 2, '22.webp', '2023-01-31 13:22:06', '2023-01-31 13:22:07'),
(23, 25, 28, 'Samsung Headphone', '10000', 'Smart Headphone', 10, '23.jpg', '2023-01-31 13:29:23', '2023-01-31 13:29:24'),
(24, 25, 29, 'Walton Headphone', '9000', 'Smart Headphone', 7, '24.webp', '2023-01-31 13:30:13', '2023-01-31 13:30:14'),
(25, 25, 27, 'Apple Headphone', '20000', 'Smart Headphone', 50, '25.jpg', '2023-01-31 13:31:30', '2023-01-31 13:31:30'),
(26, 26, 29, 'Walton Rice Cooker', '3500', 'Walton Rice Cooker for home.Provide your family the balanced nutrition they need every day with healthy & tasty foods. From soups and curries to rice or khichuri, Walton Rice Cooker & Pressure Cookers are designed to cook with perfection and less effort.', 10, '26.jpg', '2023-01-31 13:37:38', '2023-01-31 13:37:38'),
(27, 26, 30, 'SQ Rice Cooker', '9000', 'Provide your family the balanced nutrition they need every day with healthy & tasty foods. From soups and curries to rice or khichuri, Walton Rice Cooker & Pressure Cookers are designed to cook with perfection and less effort.', 10, '27.jpg', '2023-01-31 13:38:49', '2023-01-31 13:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `sslorders`
--

CREATE TABLE `sslorders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sslorders`
--

INSERT INTO `sslorders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`) VALUES
(1, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 46999, 'Customer Address', 'Processing', '63d984949b3aa', 'BDT'),
(2, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 46999, 'Customer Address', 'Processing', '63d988b3ac767', 'BDT'),
(3, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 182000, 'Customer Address', 'Processing', '63d9d8dd69950', 'BDT'),
(4, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 100000, 'Customer Address', 'Processing', '63da078c6630a', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 19, 'Samsung', '2023-01-31 11:55:14', NULL, NULL),
(13, 19, 'Walton', '2023-01-31 12:03:46', NULL, NULL),
(14, 19, 'LG', '2023-01-31 12:04:00', NULL, NULL),
(15, 19, 'Sony', '2023-01-31 12:04:44', NULL, NULL),
(16, 20, 'Samsung', '2023-01-31 12:22:56', NULL, NULL),
(17, 21, 'Apple', '2023-01-31 12:35:47', NULL, NULL),
(18, 21, 'Symphony', '2023-01-31 12:40:12', NULL, NULL),
(19, 21, 'Nokia', '2023-01-31 12:42:30', NULL, NULL),
(20, 22, 'Canon', '2023-01-31 12:51:02', NULL, NULL),
(21, 22, 'Sony', '2023-01-31 12:52:40', NULL, NULL),
(22, 22, 'Nikhon', '2023-01-31 12:54:32', NULL, NULL),
(23, 22, 'instax', '2023-01-31 12:55:14', NULL, NULL),
(24, 22, 'argos', '2023-01-31 12:56:52', NULL, NULL),
(25, 23, 'Johson Watch', '2023-01-31 13:05:39', NULL, NULL),
(26, 23, 'WMB10', '2023-01-31 13:06:02', NULL, NULL),
(27, 23, 'Apple', '2023-01-31 13:06:13', NULL, NULL),
(28, 23, 'Samsung', '2023-01-31 13:06:28', NULL, NULL),
(29, 24, 'Walton', '2023-01-31 13:17:03', NULL, NULL),
(30, 24, 'SQ', '2023-01-31 13:17:22', NULL, NULL),
(31, 24, 'National', '2023-01-31 13:17:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Zahid Hasan', 'jhasan576@gmail.com', 1, NULL, '$2y$10$w/ETM3AxFmYEr6ubl0KK7eOL3.K7oc29XQ/e75g0gfGSgfvOM8gQK', NULL, '2023-01-24 14:38:21', '2023-01-24 14:38:21'),
(9, 'Zahid Hasan', 'admin@gmail.com', 2, NULL, '$2y$10$KKx5iKRsRUfvKmVHvfZuwuVgTlHjIj4Pvfw9PqacsqvcrGbDLyMJq', NULL, '2023-01-29 18:01:32', '2023-01-29 18:01:32'),
(10, 'Buyer', 'buyer@gmail.com', 1, NULL, '$2y$10$uvCrv93sLGR5CoVynIXy5.Olk4HFDgQQDjBzmb9bEFi85aasEodFm', NULL, '2023-01-31 17:16:29', '2023-01-31 17:16:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `order_product_details`
--
ALTER TABLE `order_product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sslorders`
--
ALTER TABLE `sslorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_product_details`
--
ALTER TABLE `order_product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sslorders`
--
ALTER TABLE `sslorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
