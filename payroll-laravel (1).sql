-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 09:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_details`
--

CREATE TABLE `additional_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_earn` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_spent` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_salaries` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additional_details`
--

INSERT INTO `additional_details` (`id`, `total_earn`, `total_spent`, `created_at`, `updated_at`, `total_salaries`) VALUES
(1, '3200000.00', '1400000.00', '2024-01-10 14:01:11', '2024-01-10 15:00:59', '60000.00');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_present` int(11) NOT NULL DEFAULT 0,
  `total_absent` int(11) NOT NULL DEFAULT 0,
  `total_days` int(11) NOT NULL DEFAULT 0,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `name`, `created_at`, `updated_at`, `total_present`, `total_absent`, `total_days`, `month`, `year`) VALUES
(22, 9, 'Ahmed', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 20, 4, 24, 'March', 2023),
(23, 11, 'Ahmed Shahid', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 22, 2, 24, 'March', 2023),
(24, 14, 'Ali', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 23, 1, 24, 'March', 2023),
(25, 2, 'Ali Ahmed', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 23, 1, 24, 'March', 2023),
(26, 4, 'Husnain', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 23, 1, 24, 'March', 2023),
(27, 6, 'Kamran', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 23, 1, 24, 'March', 2023),
(28, 8, 'Kamran', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 23, 1, 24, 'March', 2023),
(29, 5, 'Shahbaz', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 23, 1, 24, 'March', 2023),
(30, 13, 'Shahid Raz', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 23, 1, 24, 'March', 2023),
(31, 7, 'Shehzad', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 23, 1, 24, 'March', 2023),
(32, 15, 'Sufyan', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 23, 1, 24, 'March', 2023),
(33, 12, 'Talha', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 23, 1, 24, 'March', 2023),
(34, 10, 'Talha Rashee', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 23, 1, 24, 'March', 2023),
(35, 3, 'Umair', '2024-01-04 11:57:52', '2024-01-04 11:57:52', 23, 1, 24, 'March', 2023),
(36, 9, 'Ahmed', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 20, 4, 24, 'April', 2023),
(37, 11, 'Ahmed Shahid', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 22, 2, 24, 'April', 2023),
(38, 14, 'Ali', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 23, 1, 24, 'April', 2023),
(39, 2, 'Ali Ahmed', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 23, 1, 24, 'April', 2023),
(40, 4, 'Husnain', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 23, 1, 24, 'April', 2023),
(41, 6, 'Kamran', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 23, 1, 24, 'April', 2023),
(42, 8, 'Kamran', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 23, 1, 24, 'April', 2023),
(43, 5, 'Shahbaz', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 23, 1, 24, 'April', 2023),
(44, 13, 'Shahid Raz', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 23, 1, 24, 'April', 2023),
(45, 7, 'Shehzad', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 23, 1, 24, 'April', 2023),
(46, 15, 'Sufyan', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 23, 1, 24, 'April', 2023),
(47, 12, 'Talha', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 23, 1, 24, 'April', 2023),
(48, 10, 'Talha Rashee', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 23, 1, 24, 'April', 2023),
(49, 3, 'Umair', '2024-01-04 12:00:20', '2024-01-04 12:00:20', 23, 1, 24, 'April', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_id`, `name`, `start_date`, `end_date`, `reason`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, '', '2023-11-16', '2023-11-17', 'i am sick i cant come', '2023-11-15 05:11:03', '2023-11-15 05:11:03', 'pending'),
(2, 3, '', '2023-11-17', '2023-11-17', 'i cant come', '2023-11-15 05:11:57', '2023-11-15 05:11:57', 'pending'),
(3, 3, '', '2023-11-17', '2023-11-17', 'test', '2023-11-16 07:52:13', '2023-11-16 07:52:13', 'pending'),
(4, 3, '', '2023-11-17', '2023-11-17', 'test', '2023-11-16 07:54:25', '2023-11-16 07:54:25', 'pending'),
(5, 3, '', '2023-11-17', '2023-11-17', 'test', '2023-11-16 07:54:29', '2023-11-16 07:54:29', 'pending'),
(6, 3, '', '2023-11-17', '2023-11-17', 'test', '2023-11-16 07:57:22', '2023-11-16 07:57:22', 'pending'),
(7, 3, '', '2023-11-17', '2023-11-17', 'test', '2023-11-16 07:57:25', '2023-11-16 07:57:25', 'pending'),
(8, 3, '', '2023-11-17', '2023-11-17', 'test  ds', '2023-11-16 07:57:36', '2023-11-16 07:57:36', 'pending'),
(9, 3, '', '2023-11-17', '2023-11-17', 'test  ds', '2023-11-16 07:57:57', '2023-11-16 07:57:57', 'pending'),
(10, 3, '', '2023-11-17', '2023-11-17', 'test  ds', '2023-11-16 07:58:42', '2023-11-16 07:58:42', 'pending'),
(11, 3, '', '2023-11-17', '2023-11-17', 'test  ds', '2023-11-16 08:10:46', '2023-11-16 08:10:46', 'pending'),
(12, 3, 'test', '2023-11-17', '2023-11-17', 'test afteer name ading', '2023-11-16 08:42:49', '2023-11-16 08:42:49', 'pending');

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
(26, '2023_11_15_081657_create_leave', 3),
(27, '2023_11_15_081948_create_leave_table', 3),
(37, '2014_10_12_000000_create_users_table', 4),
(38, '2014_10_12_100000_create_password_resets_table', 4),
(39, '2019_08_19_000000_create_failed_jobs_table', 4),
(40, '2023_08_02_061433_create_roles_table', 4),
(41, '2023_08_02_171000_user', 4),
(42, '2023_08_04_212851_add_role_to_users_table', 4),
(43, '2023_10_03_082038_add_user_img_to_users', 4),
(44, '2023_10_11_073544_add_designation_to_users', 4),
(45, '2023_11_16_130358_add_status_to_leaves_table', 5),
(46, '2023_11_16_132058_add_name_to_leaves_table', 6),
(47, '2023_11_16_135633_create_attendances_table', 7),
(48, '2023_11_16_205347_modify_attendances_table', 8),
(49, '2023_11_17_200228_create_salaries_table', 9),
(50, '2023_11_17_204506_add_allowance_and_bonus_to_salaries', 10),
(51, '2024_01_04_163817_add_month_and_year_to_attendances_table', 11),
(52, '2024_01_04_164731_add_month_and_year_to_attendances_table', 12),
(53, '2024_01_10_184817_create_additional_details_table', 13),
(54, '2024_01_10_192238_add_total_salaries_to_additional_details', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_amount` decimal(10,2) NOT NULL,
  `allowance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `bonus` decimal(8,2) NOT NULL DEFAULT 0.00,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_id`, `name`, `salary_amount`, `allowance`, `bonus`, `month`, `year`, `created_at`, `updated_at`) VALUES
(3, 3, 'Shahzad', '50000.00', '1100.00', '1000.00', 'November', 2023, '2023-11-17 15:15:08', '2023-11-17 16:26:32'),
(4, 2, 'Ali', '1212.00', '1000.00', '1020.00', 'November', 2023, '2023-11-17 15:16:24', '2023-12-12 05:37:03'),
(5, 4, 'Husnain', '40000.00', '1000.00', '100.00', 'March', 2024, '2023-12-07 16:22:12', '2024-01-04 16:26:49'),
(6, 5, 'Muhammad', '50000.00', '1000.00', '0.00', 'November', 2023, '2023-12-12 04:29:28', '2023-12-12 04:29:28'),
(7, 6, 'Husnain', '50000.00', '1000.00', '0.00', 'November', 2023, '2023-12-12 05:29:47', '2023-12-12 05:29:47'),
(8, 7, 'Shehzad', '50000.00', '1000.00', '1000.00', 'January', 2024, '2024-01-05 09:38:17', '2024-01-05 09:38:17'),
(9, 8, 'Kamran', '50000.00', '0.00', '0.00', 'January', 2024, '2024-01-05 09:38:36', '2024-01-05 09:38:36'),
(10, 10, 'Talha Rashee', '50000.00', '0.00', '0.00', 'January', 2024, '2024-01-05 09:38:44', '2024-01-05 09:38:44'),
(11, 9, 'Ahmed', '50000.00', '0.00', '0.00', 'January', 2024, '2024-01-05 09:38:51', '2024-01-05 09:38:51'),
(12, 11, 'Ahmed Shahid', '50000.00', '0.00', '0.00', 'January', 2024, '2024-01-05 09:39:00', '2024-01-05 09:39:00'),
(13, 13, 'Shahid Raz', '50000.00', '0.00', '0.00', 'January', 2024, '2024-01-05 09:39:09', '2024-01-05 09:39:09'),
(14, 14, 'Ali', '50000.00', '0.00', '0.00', 'January', 2024, '2024-01-05 09:39:15', '2024-01-05 09:39:15'),
(15, 15, 'Sufyan', '50000.00', '0.00', '0.00', 'January', 2024, '2024-01-05 09:39:21', '2024-01-05 09:39:21'),
(16, 12, 'Talha', '50000.00', '0.00', '0.00', 'January', 2024, '2024-01-05 09:39:28', '2024-01-05 09:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `user_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `user_img`, `designation`) VALUES
(2, 'Ali Ahmed', 'malikali6900@gmail.com', NULL, '$2y$10$6u0jAy33u9cinC1npc0vR.QCBSYBjAqNFzm3FEJAikxhleaArrUrS', NULL, '2023-11-15 05:02:10', '2024-01-03 14:45:35', 'super_admin', 'user_images/3BB1jEvoF03RuKOqa5AgVeM52oiHjEC5Fb0meDMm.png', 'developer'),
(3, 'Umair', 'test1@test.com', NULL, '$2y$10$w1DYKKX7v2nI6ofPhDbNruOKi6RKDIx.wAjLJf/p2IbsuJnIfoegS', NULL, '2023-11-15 05:10:38', '2023-12-21 14:37:55', 'user', NULL, 'DESIGNER'),
(4, 'Husnain', 'rizwan@gmail.com', NULL, '$2y$10$T5KNnC8sn9LgzLR5wzvcH.0HhAp30ULFrVD4Bz6xpG1hAcCs.UKV2', NULL, '2023-11-28 01:37:22', '2023-12-21 14:37:55', 'user', NULL, 'developer'),
(5, 'Shahbaz', 'shahzad4@outlook.com', NULL, '$2y$10$8h3X3CiwvGrLF0vgT9P5QOhgDR7AJoUm.3/kFA8PZP8fx4hPgHNLe', NULL, '2023-11-28 01:38:39', '2023-12-21 14:37:55', 'user', NULL, 'senior dev'),
(6, 'Kamran', 'haroon1@gmail.com', NULL, '$2y$10$gBxMkVcah7ocsFiLv0Xp/ecegePLOIaKSr3/gU6SxUXkJpoUUnGiu', NULL, '2023-11-28 01:39:50', '2023-12-21 14:37:55', 'user', NULL, 'developer'),
(7, 'Shehzad', 'furqan44@outlook.com', NULL, '$2y$10$XFxRXS2mu2Ro3DXy013ME.Vz4urnlB3Rei4jx7ZXeV/LGw5tfbydC', NULL, '2023-11-28 01:41:54', '2023-12-21 14:37:55', 'user', NULL, 'developer'),
(8, 'Kamran', 'aliasghar8@yahoo.com', NULL, '$2y$10$6i92uGcptGdKXx.X9OO3MuYh60TT4oOm2g5x8XgDTaS8BptcoxOgO', NULL, '2023-11-28 01:43:15', '2023-12-21 14:37:55', 'user', NULL, 'dev'),
(9, 'Ahmed', 'saqlain@yahoo.com', NULL, '$2y$10$HDGuxg1mGBvsLSB0Omt5j.cK/W/jOxQdhwabh5BHaH8AeYwtzxr6y', NULL, '2023-11-28 01:44:49', '2023-12-21 14:37:55', 'user', NULL, 'developer'),
(10, 'Talha Rashee', 'ayan2@gmail.com', NULL, '$2y$10$iDzBdbJvQikkmXL0Pt3O4uTknybLeh2Izh5omknaLIIoA9fi0hjwW', NULL, '2023-11-28 01:50:45', '2023-12-21 14:45:22', 'user', NULL, 'developer'),
(11, 'Ahmed Shahid', 'umairabid@gmail.com', NULL, '$2y$10$MJuuqgFlQ2Kgejv5TajY8uq4LBOEx39Y9YbvPmZcWDcMdFV2B6cW.', NULL, '2023-11-28 01:52:05', '2023-12-21 14:37:55', 'user', NULL, 'developer'),
(12, 'Talha', 'hasnain@outlook.com', NULL, '$2y$10$oawecukFX6Jb4LWqmwjeM.marRE//8VCt9u87haU9mlVBfNYtJCSe', NULL, '2023-11-28 01:54:56', '2023-12-21 14:37:55', 'user', NULL, 'developer'),
(13, 'Shahid Raz', 'shahbaz6@gmail.com', NULL, '$2y$10$Ccajuezk7EaqFfYhLlLfLu.OPMgXF1LU.7Rl5Zr9D3PEkNimpboRG', NULL, '2023-11-28 01:57:10', '2023-12-21 14:37:55', 'user', NULL, 'developer'),
(14, 'Ali', 'kamran7@yahoo.com', NULL, '$2y$10$OKCnv.cJ4vMpmKanqRlMTeuKcXFplvVcDUvJoGmIjmVwchrxoyLPS', NULL, '2023-11-28 01:58:26', '2023-12-21 14:45:49', 'user', NULL, 'developer'),
(15, 'Sufyan', 'talha45@gmail.com', NULL, '$2y$10$RtpsZ8pCNluiy1.Enppy6ONTM1nFGMlak2Ke6Awwp22MnRNoR0J8C', NULL, '2023-11-28 02:00:57', '2023-12-21 14:45:49', 'user', NULL, 'developer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_details`
--
ALTER TABLE `additional_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_employee_id_foreign` (`employee_id`);

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
-- AUTO_INCREMENT for table `additional_details`
--
ALTER TABLE `additional_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
