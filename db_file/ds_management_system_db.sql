-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 01:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_multi_auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Efat khan', 'efatkhan.duet.cse@gmail.com', '01718470578', NULL, '$2y$12$oMlVQVo/.fJKUxCQMBCTqe55q4IF7Fiyc9QSwCDml0HKBcBV4lkhi', NULL, '2025-03-14 23:44:42', '2025-03-14 23:44:42'),
(2, 'admin', 'admin@gmail.com', '01782713260', NULL, '$2y$12$8AZ3BVr8RCbF3txbpRbdIegr7CWEwnbDapFwCTOyLwif6laX4sMEO', NULL, '2025-03-15 00:15:50', '2025-03-15 00:15:50'),
(3, 'Efat khan', 'efat@gmail.com', '01718470578', NULL, '$2y$12$5ykjMQriBbNQ9HwLAP1hsOIT9lzwp8Zoh4rV5ur7IHiwe0fyUCNgS', NULL, '2025-03-21 00:45:02', '2025-03-21 00:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_efatkhan@gmail.com|127.0.0.1', 'i:1;', 1742544321),
('laravel_cache_efatkhan@gmail.com|127.0.0.1:timer', 'i:1742544321;', 1742544321),
('laravel_cache_user@gmail.ocm|127.0.0.1', 'i:1;', 1742194186),
('laravel_cache_user@gmail.ocm|127.0.0.1:timer', 'i:1742194186;', 1742194186);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_summaries`
--

CREATE TABLE `daily_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total_estimated_time` int(11) NOT NULL DEFAULT 0 COMMENT 'Time in minutes',
  `total_spent_time` int(11) NOT NULL DEFAULT 0 COMMENT 'Time in minutes',
  `total_learning_time` int(11) DEFAULT NULL,
  `is_physical_office` tinyint(1) NOT NULL DEFAULT 0,
  `office_start_time` time DEFAULT NULL,
  `office_end_time` time DEFAULT NULL,
  `office_break_time` int(11) DEFAULT NULL COMMENT 'Time in minutes',
  `description` text DEFAULT NULL,
  `git_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_summaries`
--

INSERT INTO `daily_summaries` (`id`, `user_id`, `date`, `total_estimated_time`, `total_spent_time`, `total_learning_time`, `is_physical_office`, `office_start_time`, `office_end_time`, `office_break_time`, `description`, `git_url`, `created_at`, `updated_at`) VALUES
(1, 9, '2025-03-17', 0, 0, NULL, 0, '18:52:00', '22:52:00', NULL, NULL, 'https://chat.deepseek.com/a/chat/s/7c90ae73-0b30-4cd9-81e3-e4110d767d76', '2025-03-17 04:36:43', '2025-03-17 06:52:45'),
(3, 9, '2025-03-18', 0, 0, NULL, 1, '00:00:00', '20:00:00', NULL, NULL, 'https://chat.deepseek.com/a/chat/s/7c90ae73-0b30-4cd9-81e3-e4110d767update', '2025-03-17 23:41:42', '2025-03-17 23:50:21'),
(4, 10, '2025-03-18', 0, 0, NULL, 1, '02:00:00', '21:00:00', NULL, NULL, 'https://github.com/Efat-khan/efat-khan.github.io', '2025-03-18 05:05:33', '2025-03-18 05:05:33'),
(5, 9, '2025-03-19', 180, 180, NULL, 0, '00:00:00', '20:00:00', NULL, NULL, 'https://chat.deepseek.com/a/chat/s/7c90ae73-0b30-4cd9-81e3-e4110d767efat', '2025-03-19 00:40:47', '2025-03-19 00:40:47'),
(6, 10, '2025-03-19', 180, 0, NULL, 1, '09:00:00', '21:00:00', NULL, NULL, 'https://github.com/Tanvir', '2025-03-19 01:39:37', '2025-03-19 01:39:37'),
(7, 11, '2025-03-19', 300, 0, NULL, 0, '03:33:00', '21:09:00', NULL, NULL, 'https://github.com/rofiq', '2025-03-19 02:03:12', '2025-03-19 02:03:12'),
(8, 9, '2025-03-20', 480, 0, 0, 1, '11:00:00', '19:30:00', NULL, NULL, 'https://github.com/Efat-khan/', '2025-03-19 23:35:32', '2025-03-20 02:57:14'),
(9, 9, '2025-03-21', 0, 0, NULL, 1, '11:00:00', '19:30:00', NULL, NULL, 'https://github.com/Efat-khan/', '2025-03-21 00:13:49', '2025-03-21 00:13:49'),
(10, 10, '2025-03-21', 300, 0, 0, 1, '09:00:00', '21:00:00', NULL, NULL, 'https://github.com/Tanvir', '2025-03-21 05:11:27', '2025-03-21 05:12:03'),
(11, 9, '2025-03-23', 360, 0, 0, 1, '11:00:00', '19:30:00', NULL, NULL, 'https://github.com/Efat-khan/', '2025-03-22 23:43:14', '2025-03-23 00:45:04'),
(12, 12, '2025-03-23', 720, 0, 0, 0, '11:53:00', '21:53:00', NULL, NULL, 'https://www.github.com/tanjir', '2025-03-22 23:55:02', '2025-03-22 23:57:32'),
(13, 13, '2025-03-23', 420, 0, 0, 0, '11:00:00', '17:00:00', NULL, NULL, 'https://www.upwork.com/rimon', '2025-03-23 00:01:59', '2025-03-23 00:05:07'),
(14, 14, '2025-03-23', 0, 0, NULL, 0, '12:00:00', '23:00:00', NULL, NULL, 'https://www.upwork.com/piash', '2025-03-23 00:03:45', '2025-03-23 00:03:45'),
(15, 9, '2025-03-24', 480, 0, 0, 1, '11:00:00', '19:30:00', NULL, NULL, 'https://github.com/Efat-khan/2025-03-24', '2025-03-24 02:45:14', '2025-03-24 02:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `daily_summary_details`
--

CREATE TABLE `daily_summary_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `daily_summary_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `estimated_time` int(11) NOT NULL COMMENT 'Time in minutes',
  `spent_time` int(11) DEFAULT NULL COMMENT 'Time in minutes',
  `learning_time` int(11) DEFAULT NULL COMMENT 'Time in minutes',
  `task_status` enum('in_progress','to_do','complete','not_done') NOT NULL DEFAULT 'to_do',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_summary_details`
--

INSERT INTO `daily_summary_details` (`id`, `daily_summary_id`, `name`, `estimated_time`, `spent_time`, `learning_time`, `task_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'UI setup of DS management', 7, 0, 0, 'to_do', '2025-03-17 07:20:46', '2025-03-17 07:20:46'),
(2, 3, 'Today i am planing to creating fully working user panel , and work on admin panel interfaces', 2, 0, 0, 'complete', '2025-03-17 23:55:22', '2025-03-18 03:46:13'),
(3, 3, 'Working on Admin panel Ui', 3, 0, 0, 'complete', '2025-03-18 01:36:59', '2025-03-18 04:01:45'),
(4, 3, 'Planing to Add previous day DS in', 2, 0, 0, 'in_progress', '2025-03-18 02:10:40', '2025-03-18 03:57:07'),
(5, 3, 'test', 1, 0, 0, 'complete', '2025-03-18 02:27:03', '2025-03-18 03:29:17'),
(6, 4, 'write content', 3, 0, 0, 'to_do', '2025-03-18 05:30:29', '2025-03-18 05:30:29'),
(7, 4, 'Deploy my Project', 2, 0, 0, 'in_progress', '2025-03-18 05:30:52', '2025-03-18 05:30:52'),
(8, 5, 'Planing to Add previous day DS in', 2, 2, 1, 'complete', '2025-03-19 00:50:11', '2025-03-19 01:20:54'),
(9, 6, 'write content', 3, 0, 0, 'to_do', '2025-03-19 01:39:50', '2025-03-19 01:39:50'),
(10, 6, 'Deploy my Project', 4, 0, 0, 'to_do', '2025-03-19 01:40:04', '2025-03-19 01:40:04'),
(11, 5, 'Planing to Add previous day DS in Update', 5, 0, 0, 'complete', '2025-03-19 01:55:24', '2025-03-19 03:08:30'),
(12, 5, 'Deploy my Project', 180, 0, 0, 'in_progress', '2025-03-19 02:32:44', '2025-03-19 03:29:19'),
(13, 5, 'write content', 180, 180, 0, 'to_do', '2025-03-19 02:33:49', '2025-03-19 04:12:57'),
(36, 8, 'UI setup', 300, 0, 0, 'in_progress', NULL, '2025-03-20 03:41:50'),
(37, 8, 'doing CRUD ', 180, 0, 0, 'complete', NULL, NULL),
(38, 10, 'write content anout IUPC', 300, 0, 0, 'to_do', '2025-03-21 05:12:03', '2025-03-21 05:12:03'),
(39, 11, 'working on amdin panel report generation', 60, 0, 0, 'to_do', '2025-03-22 23:44:03', '2025-03-22 23:44:03'),
(40, 11, 'working on admin panel print csv file', 120, 0, 0, 'to_do', '2025-03-22 23:49:10', '2025-03-22 23:49:10'),
(41, 12, 'content writing for page', 180, 0, 0, 'to_do', '2025-03-22 23:55:50', '2025-03-22 23:55:50'),
(42, 12, 'Study SOLID principle', 120, 0, 0, 'in_progress', '2025-03-22 23:56:20', '2025-03-22 23:56:20'),
(43, 12, 'working on caching', 180, 0, 0, 'to_do', '2025-03-22 23:56:59', '2025-03-22 23:56:59'),
(44, 12, 'working on caching principle', 120, 0, 0, 'to_do', '2025-03-22 23:57:10', '2025-03-22 23:57:10'),
(45, 12, 'working on daily stundup', 120, 0, 0, 'to_do', '2025-03-22 23:57:32', '2025-03-22 23:57:32'),
(46, 13, 'Working on ML content writing', 120, 0, 0, 'in_progress', '2025-03-23 00:04:40', '2025-03-23 00:44:08'),
(47, 13, 'building chatbotwith the hepl of open AI API', 300, 0, 0, 'to_do', '2025-03-23 00:05:07', '2025-03-23 00:05:07'),
(48, 11, 'Study SOLID principle', 180, 0, 0, 'to_do', '2025-03-23 00:45:04', '2025-03-23 00:45:04'),
(49, 15, 'working on amdin panel dashboard', 240, 0, 0, 'to_do', '2025-03-24 02:45:53', '2025-03-24 02:45:53'),
(50, 15, 'Create Documentation in README File', 240, 0, 0, 'to_do', '2025-03-24 02:46:28', '2025-03-24 02:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_15_021946_create_admins_table', 2),
(5, '2025_03_17_051255_create_dailly_summaries_table', 3),
(6, '2025_03_17_052339_create_dailly_summary_details_table', 3),
(7, '2025_03_20_081646_alter_daily_summaries_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LTfIX629BGeO4o3X6fyywxwvwwdhdSyOtFuvUIkE', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ1FjVkdQQjhPYzVBYmVQMkpNSEs1SUowanNwb1JScUFaSk1TZTF2UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llZS9yZXBvcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo5O30=', 1742806151),
('xRrKHUNS7zAvPjp9020KzQab4qINlNGESpcxRl7M', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicXlJalJORmxuODNrUTZxTEdUS2N4YlNXc1BIRWxQeGNNa0RUWHdOUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1742817268);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Maxwell Tyson', 'lovotyl@mailinator.com', '01404571271', NULL, '$2y$12$yXr1nSqmD1vGXcskbqD6X.NssCSwIlC9byq6frKGik6LJj.b6nCBu', NULL, '2025-03-14 20:02:16', '2025-03-14 20:02:16'),
(8, 'admin1', 'admin@gmail.com', '01866770249', NULL, '$2y$12$C8Wp5pOf8YN/Uougy5MIPexjqroMBGB7i.FcNtCA4IF3tnNHDak7y', NULL, '2025-03-15 00:10:25', '2025-03-15 00:16:35'),
(9, 'Efat khan', 'efatkhan.duet.cse@gmail.com', '01718470578', NULL, '$2y$12$uG3G7bTVcvg8ihrnxTps7uKoeKFVpehqNMl75v/ZeLSEfuU8cMSz6', NULL, '2025-03-17 01:05:16', '2025-03-17 01:05:16'),
(10, 'Tanvir', 'tanvir@gmail.com', '01928374876', NULL, '$2y$12$qj2bVJA3xSdiFauDmhNBGO51sBZdPuHSQ5QNGPkblowIiajpU38NO', NULL, '2025-03-18 04:45:58', '2025-03-18 04:45:58'),
(11, 'rofiq', 'rofiq@gmail.com', '01718470579', NULL, '$2y$12$5iQA6sU67MV4oo24RpxAPuaGg8U8q6UAbasL0hxDGEP9r8N3J..Zm', NULL, '2025-03-19 02:01:04', '2025-03-19 02:01:04'),
(12, 'tanjir', 'tanjir@gmail.com', '01718470571', NULL, '$2y$12$7A9/HIWTJWq4i8eoF.fyzeY1cKX25/z3HGsskIcv1kqhefVAjl5DC', NULL, '2025-03-22 23:50:50', '2025-03-22 23:50:50'),
(13, 'Rimon', 'rimon@gmail.com', '01404715341', NULL, '$2y$12$T2jx6i5NID8e4aBTEDuePO/SPrL78vjgcVLJK9t.IyXeNg54OblQC', NULL, '2025-03-22 23:59:26', '2025-03-22 23:59:26'),
(14, 'Piash', 'piash@gmail.com', '01404715714', NULL, '$2y$12$aXE8tlrs4TAtNWbXVH9/5.g35Y1GxSv3sMi.9dV.Or9C4nfMN/vCK', NULL, '2025-03-23 00:02:53', '2025-03-23 00:02:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `daily_summaries`
--
ALTER TABLE `daily_summaries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `daily_summaries_user_id_date_unique` (`user_id`,`date`);

--
-- Indexes for table `daily_summary_details`
--
ALTER TABLE `daily_summary_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_summary_details_daily_summary_id_foreign` (`daily_summary_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daily_summaries`
--
ALTER TABLE `daily_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `daily_summary_details`
--
ALTER TABLE `daily_summary_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_summaries`
--
ALTER TABLE `daily_summaries`
  ADD CONSTRAINT `daily_summaries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `daily_summary_details`
--
ALTER TABLE `daily_summary_details`
  ADD CONSTRAINT `daily_summary_details_daily_summary_id_foreign` FOREIGN KEY (`daily_summary_id`) REFERENCES `daily_summaries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
