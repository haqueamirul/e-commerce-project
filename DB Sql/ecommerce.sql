-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 07:38 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

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
(3, '2018_12_05_090712_create_tbl_admin_table', 1),
(4, '2018_12_06_061410_create_tbl_category_table', 2),
(5, '2018_12_08_044639_create_tbl_menufacture_table', 3),
(6, '2018_12_08_060653_create_tbl_product_table', 4),
(7, '2018_12_23_061346_create_tbl_slider_table', 5);

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
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'Amirul Haque', 'haqueamirul@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01778539887', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_description`, `cat_status`, `created_at`, `updated_at`) VALUES
(4, 'Electronices', 'Good quality<br>', 1, NULL, NULL),
(5, 'Women', 'awesome<br>', 1, NULL, NULL),
(6, 'Men', 'Awesome Features<br>', 1, NULL, NULL),
(7, 'Kid\'s', 'good quality<br>', 1, NULL, NULL),
(8, 'Fashion', 'godd', 1, NULL, NULL),
(9, 'Households', 'helllllllllllll', 1, NULL, NULL),
(10, 'Clothing', 'good', 1, NULL, NULL),
(11, 'Bags', 'well', 1, NULL, NULL),
(12, 'Shoes', 'good', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menufacture`
--

CREATE TABLE `tbl_menufacture` (
  `menufacture_id` int(10) UNSIGNED NOT NULL,
  `menufacture_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menufacture_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menufacture_status` int(191) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menufacture`
--

INSERT INTO `tbl_menufacture` (`menufacture_id`, `menufacture_name`, `menufacture_description`, `menufacture_status`, `created_at`, `updated_at`) VALUES
(9, 'Laptop', 'good', 1, NULL, NULL),
(10, 'Mobile', 'welllldfffffffffffff', 1, NULL, NULL),
(11, 'Pant', 'good', 1, NULL, NULL),
(12, 'T-shirt', 'wel gooddddddddd<br>', 1, NULL, NULL),
(13, 'bag L', 'goofddddddddddd', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `menufacture_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `cat_id`, `menufacture_id`, `product_name`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_color`, `product_status`, `created_at`, `updated_at`) VALUES
(2, 1, 7, 'HP laptop', 'hello', 'goood', 250.00, 'image/T93TdPT1XBqf7hM3xyHA.jpg', 'M,L,XL', 'black,white', 1, NULL, NULL),
(3, 5, 6, 'Cloth', 'hello', 'dfffffffffffffffffffddddddddddddddddddddddd', 120.00, 'image/6oKAagYzzGbKpMXJD7Cj.jpg', 'M,L,XL', 'black,white', 1, NULL, NULL),
(4, 2, 6, 'Wow Tv', 'gooj', 'ghhhhhhhhhjjjjjjjjjjjjjjjjjjjhhhhhhhhhhhhhhhh', 250.00, 'image/LqY9wyARi2MeQIGa9TS8.jpg', 'M,L,XL', 'black,white', 1, NULL, NULL),
(5, 4, 9, 'Dell laptop', 'well good<br>', 'goodddddddddddddddddddddddd', 42500.00, 'image/fJwZ4QB0Rw2OCw0Jlsii.jpg', '15\'6\"', 'black,white', 1, NULL, NULL),
(6, 5, 12, 'Cloth', 'godd', 'goodddddddddddddddddddddd', 250.00, 'image/c3uzXCmEysoHzVrFS6Hg.jpg', 'M,L,XL', 'black,white', 1, NULL, NULL),
(7, 4, 10, 'samsung', 'goood', 'dooddddddddddddddddddddd', 21500.00, 'image/8snGgTy4Lc8NciDIPcTd.jpg', '5\'6\"', 'black,white', 1, NULL, NULL),
(8, 5, 13, 'Awesome bag', '<div>groo</div><div><br></div>', 'goood', 650.00, 'image/z2XmeR53dkgEdZ586jT2.jpg', 'M,L,XL', 'black,white', 1, NULL, NULL),
(9, 4, 9, 'Dell inspiron 15', 'good', 'gooodddddddddddd<br>', 52900.00, 'image/TA5c31fkQzRYKME2ENIE.jpg', '15\'6\"', 'black,white', 1, NULL, NULL),
(10, 5, 13, 'Mini bag', 'good', 'good', 720.00, 'image/A3L4QSForYo0uRF52BEb.jpg', 'M,L,XL', 'black,white', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `slider_title`, `slider_content`, `slider_status`, `created_at`, `updated_at`) VALUES
(1, 'image/9t9xGSehUo9eZscS95Ps.jpg', 'E-SHOPPER', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, NULL, NULL),
(3, 'image/xegXD5O1gVMk630aXqWJ.jpg', 'E-SHOPPER', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, NULL, NULL),
(4, 'image/IXMQcmNu5MBs5YRHOmh1.jpg', '100% Responsive Design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, NULL, NULL),
(5, 'image/2C9hq9ipxziqtIgzZhwx.jpg', '100% Responsive Design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_menufacture`
--
ALTER TABLE `tbl_menufacture`
  ADD PRIMARY KEY (`menufacture_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_menufacture`
--
ALTER TABLE `tbl_menufacture`
  MODIFY `menufacture_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
