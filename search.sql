-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 07:01 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `search`
--

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE `available` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `hotel_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `available`
--

INSERT INTO `available` (`id`, `from`, `to`, `hotel_id`, `created_at`, `updated_at`) VALUES
(1, '2020-10-10', '2020-10-15', 1, '2019-09-01 12:28:04', '2019-09-01 12:28:04'),
(2, '2020-10-25', '2020-11-15', 1, '2019-09-01 12:28:04', '2019-09-01 12:28:04'),
(3, '2020-12-10', '2020-12-15', 1, '2019-09-01 12:28:04', '2019-09-01 12:28:04'),
(4, '2020-10-10', '2020-10-12', 2, '2019-09-01 12:28:04', '2019-09-01 12:28:04'),
(5, '2020-10-25', '2020-11-10', 2, '2019-09-01 12:28:04', '2019-09-01 12:28:04'),
(6, '2020-12-05', '2020-12-18', 2, '2019-09-01 12:28:04', '2019-09-01 12:28:04'),
(7, '2020-10-01', '2020-10-12', 3, '2019-09-01 12:28:04', '2019-09-01 12:28:04'),
(8, '2020-10-05', '2020-11-10', 3, '2019-09-01 12:28:04', '2019-09-01 12:28:04'),
(9, '2020-12-05', '2020-12-28', 3, '2019-09-01 12:28:04', '2019-09-01 12:28:04'),
(10, '2020-10-04', '2020-10-17', 4, '2019-09-01 12:28:05', '2019-09-01 12:28:05'),
(11, '2020-10-16', '2020-11-11', 4, '2019-09-01 12:28:05', '2019-09-01 12:28:05'),
(12, '2020-12-01', '2020-12-09', 4, '2019-09-01 12:28:05', '2019-09-01 12:28:05'),
(13, '2020-10-20', '2020-10-28', 5, '2019-09-01 12:28:05', '2019-09-01 12:28:05'),
(14, '2020-11-04', '2020-11-20', 5, '2019-09-01 12:28:05', '2019-09-01 12:28:05'),
(15, '2020-12-08', '2020-12-24', 5, '2019-09-01 12:28:05', '2019-09-01 12:28:05'),
(16, '2020-10-10', '2020-10-19', 6, '2019-09-01 12:28:05', '2019-09-01 12:28:05'),
(17, '2020-10-22', '2020-11-22', 6, '2019-09-01 12:28:05', '2019-09-01 12:28:05'),
(18, '2020-12-03', '2020-12-20', 6, '2019-09-01 12:28:05', '2019-09-01 12:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `city` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `price`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Media One Hotel', 102.20, 'dubai', '2019-09-01 12:28:04', '2019-09-01 12:28:04'),
(2, 'Rotana Hotel', 80.60, 'cairo', '2019-09-01 12:28:04', '2019-09-01 12:28:04'),
(3, 'Le Meridien', 89.60, 'london', '2019-09-01 12:28:04', '2019-09-01 12:28:04'),
(4, 'Golden Tulip', 109.60, 'paris', '2019-09-01 12:28:05', '2019-09-01 12:28:05'),
(5, 'Novotel Hotel', 111.00, 'Vienna', '2019-09-01 12:28:05', '2019-09-01 12:28:05'),
(6, 'Concorde Hotel', 79.40, 'Manila', '2019-09-01 12:28:05', '2019-09-01 12:28:05');

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
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_09_01_084133_create_hotel', 1),
(24, '2019_09_01_084807_create_available', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`id`),
  ADD KEY `available_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available`
--
ALTER TABLE `available`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available`
--
ALTER TABLE `available`
  ADD CONSTRAINT `available_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
