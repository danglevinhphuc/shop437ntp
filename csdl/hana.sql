-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2017 at 06:08 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hana`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `ten`, `tenkhongdau`, `created_at`, `updated_at`) VALUES
(1, 'Thú bông', 'thu-bong', '2017-08-09 08:33:03', '2017-08-09 08:33:03'),
(2, 'Quà lưu niệm', 'qua-luu-niem', '2017-08-09 08:33:14', '2017-08-09 08:33:14'),
(3, 'Phụ kiện', 'phu-kien', '2017-08-09 08:33:23', '2017-08-09 08:33:23'),
(4, 'Hoa sáp', 'hoa-sap', '2017-08-09 08:33:33', '2017-08-09 08:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `categorychild`
--

CREATE TABLE `categorychild` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorychild`
--

INSERT INTO `categorychild` (`id`, `ten`, `tenkhongdau`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Băng đô', 'bang-do', 3, '2017-08-09 08:38:34', '2017-08-09 08:38:34'),
(2, 'Kẹp tóc', 'kep-toc', 3, '2017-08-09 08:38:43', '2017-08-09 08:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `ten`, `tenkhongdau`, `created_at`, `updated_at`) VALUES
(1, 'Valentine1', 'valentine1', '2017-08-09 08:26:20', '2017-08-09 08:31:15'),
(2, 'Trung thu 2017', 'trung-thu-2017', '2017-08-09 08:31:36', '2017-08-09 08:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `hinhproduct`
--

CREATE TABLE `hinhproduct` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `hinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinhproduct`
--

INSERT INTO `hinhproduct` (`id`, `id_product`, `hinh`, `created_at`, `updated_at`) VALUES
(1, 1, 'slideshow_12310.jpg', '2017-08-09 08:48:32', '2017-08-09 08:48:32'),
(2, 1, 'slideshow_22310.jpg', '2017-08-09 08:48:32', '2017-08-09 08:48:32'),
(3, 1, 'slideshow_32310.jpg', '2017-08-09 08:48:33', '2017-08-09 08:48:33'),
(4, 2, 'slideshow_32310.jpg', '2017-08-09 08:51:16', '2017-08-09 08:51:16'),
(5, 3, 'slideshow_22310.jpg', '2017-08-09 08:52:22', '2017-08-09 08:52:22'),
(6, 4, 'slideshow_22310.jpg', '2017-08-09 08:54:00', '2017-08-09 08:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_04_005335_category', 1),
(4, '2017_08_04_010842_slide', 1),
(5, '2017_08_04_012439_customer', 1),
(6, '2017_08_09_150535_events', 1),
(7, '2017_08_08_114348_categorychild', 2),
(8, '2017_08_08_120109_products', 3),
(9, '2017_08_08_120141_hinhproduct', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `id_categorychild` int(10) UNSIGNED DEFAULT NULL,
  `id_event` int(10) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `unit_price` double(16,2) NOT NULL,
  `promotion_price` double(16,2) DEFAULT NULL,
  `new` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ten`, `id_category`, `id_categorychild`, `id_event`, `description`, `unit_price`, `promotion_price`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Sản phẩm 1', 3, 2, 1, '<p>Sản phẩm mô tả 1</p>', 5000.00, 0.00, 1, '2017-08-09 08:48:32', '2017-08-09 08:58:57'),
(2, 'Sản phẩm 2', 1, NULL, NULL, '<p>Mô tả sp 2</p>', 5000.00, 500.00, 1, '2017-08-09 08:51:16', '2017-08-09 08:51:16'),
(3, 'San pham 3', 3, 1, 2, '<p>mô tả 3</p>', 400000.00, 300000.00, 1, '2017-08-09 08:52:22', '2017-08-09 09:01:50'),
(4, 'San pham 4', 2, NULL, NULL, '<p>Mo tả sp 3</p>', 5.00, 4.00, 0, '2017-08-09 08:54:00', '2017-08-09 08:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `hinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `hinh`, `created_at`, `updated_at`) VALUES
(1, 'slideshow_22310.jpg', '2017-08-09 09:04:08', '2017-08-09 09:04:08'),
(2, 'slideshow_32310.jpg', '2017-08-09 09:04:08', '2017-08-09 09:04:08'),
(3, 'slideshow_12310.jpg', '2017-08-09 09:04:08', '2017-08-09 09:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorychild`
--
ALTER TABLE `categorychild`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorychild_id_category_foreign` (`id_category`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinhproduct`
--
ALTER TABLE `hinhproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinhproduct_id_product_foreign` (`id_product`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_category_foreign` (`id_category`),
  ADD KEY `products_id_categorychild_foreign` (`id_categorychild`),
  ADD KEY `products_id_event_foreign` (`id_event`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categorychild`
--
ALTER TABLE `categorychild`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hinhproduct`
--
ALTER TABLE `hinhproduct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categorychild`
--
ALTER TABLE `categorychild`
  ADD CONSTRAINT `categorychild_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hinhproduct`
--
ALTER TABLE `hinhproduct`
  ADD CONSTRAINT `hinhproduct_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_id_categorychild_foreign` FOREIGN KEY (`id_categorychild`) REFERENCES `categorychild` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_id_event_foreign` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
