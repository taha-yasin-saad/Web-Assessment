-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2021 at 11:10 AM
-- Server version: 10.2.36-MariaDB-log
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malexs5_assessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor_specialists`
--

CREATE TABLE `doctor_specialists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pain_type_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_specialists`
--

INSERT INTO `doctor_specialists` (`id`, `pain_type_id`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 5, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 3, 4, NULL, NULL),
(6, 3, 2, NULL, NULL),
(7, 4, 3, NULL, NULL),
(8, 4, 5, NULL, NULL),
(9, 5, 2, NULL, NULL),
(10, 5, 5, NULL, NULL),
(11, 6, 4, NULL, NULL),
(12, 6, 3, NULL, NULL);

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
(3, '2019_11_12_150941_create_pain_types_table', 1),
(4, '2019_11_12_151118_create_doctor_specialists_table', 1),
(5, '2019_11_12_162612_create_reservations_table', 1),
(6, '2019_11_12_164335_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `reservation_id`, `user_id`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 2, 6, 'We reserve to Doctor Doctor3  in day 2019-11-13', 0, '2019-11-12 22:22:59', '2019-11-12 22:22:59'),
(2, 2, 4, 'you have case in 2019-11-13', 0, '2019-11-12 22:22:59', '2019-11-12 22:22:59'),
(3, 1, 6, 'We reserve to Doctor Doctor1  in day 2019-11-15', 0, '2019-11-12 22:23:42', '2019-11-12 22:23:42'),
(4, 1, 2, 'you have case in 2019-11-15', 1, '2019-11-12 22:23:42', '2019-11-17 18:33:40'),
(11, 3, 7, 'We reserve to Doctor Doctor2  in day 2019-11-14', 0, '2019-11-13 08:00:36', '2019-11-13 08:00:36'),
(12, 3, 3, 'you have case in 2019-11-14', 0, '2019-11-13 08:00:36', '2019-11-13 08:00:36'),
(13, 3, 7, 'We reserve to Doctor Doctor2  in day 2019-11-15', 0, '2019-11-13 08:03:44', '2019-11-13 08:03:44'),
(14, 3, 3, 'you have case in 2019-11-15', 0, '2019-11-13 08:03:44', '2019-11-13 08:03:44'),
(15, 1, 6, 'We reserve to Doctor Doctor3  in day 2019-11-15', 0, '2019-11-13 08:03:52', '2019-11-13 08:03:52'),
(16, 1, 4, 'you have case in 2019-11-15', 0, '2019-11-13 08:03:52', '2019-11-13 08:03:52'),
(17, 3, 7, 'We reserve to Doctor Doctor4  in day 2019-11-15', 0, '2019-11-13 08:10:21', '2019-11-13 08:10:21'),
(18, 3, 5, 'you have case in 2019-11-15', 0, '2019-11-13 08:10:21', '2019-11-13 08:10:21'),
(19, 4, 9, 'We reserve to Doctor Doctor4  in day 2019-11-14', 0, '2019-11-13 19:15:12', '2019-11-13 19:15:12'),
(20, 4, 5, 'you have case in 2019-11-14', 0, '2019-11-13 19:15:12', '2019-11-13 19:15:12'),
(21, 5, 8, 'We reserve to Doctor Doctor3  in day 2019-11-13', 0, '2019-11-13 20:06:49', '2019-11-13 20:06:49'),
(22, 5, 4, 'you have case in 2019-11-13', 0, '2019-11-13 20:06:49', '2019-11-13 20:06:49'),
(23, 6, 8, 'We reserve to Doctor Doctor3  in day 2019-11-13', 0, '2019-11-13 20:07:41', '2019-11-13 20:07:41'),
(24, 6, 4, 'you have case in 2019-11-13', 0, '2019-11-13 20:07:41', '2019-11-13 20:07:41'),
(25, 7, 8, 'We reserve to Doctor Doctor2  in day 2019-11-14', 0, '2019-11-13 20:08:28', '2019-11-13 20:08:28'),
(26, 7, 3, 'you have case in 2019-11-14', 0, '2019-11-13 20:08:28', '2019-11-13 20:08:28'),
(27, 8, 11, 'We reserve to Doctor Doctor2  in day 2019-11-14', 1, '2019-11-13 20:08:57', '2019-11-13 22:14:21'),
(28, 8, 3, 'you have case in 2019-11-14', 0, '2019-11-13 20:08:57', '2019-11-13 20:08:57'),
(29, 2, 6, 'We reserve to Doctor Doctor3  in day 2019-11-13', 0, '2019-11-14 00:45:48', '2019-11-14 00:45:48'),
(30, 2, 4, 'you have case in 2019-11-13', 0, '2019-11-14 00:45:48', '2019-11-14 00:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `pain_types`
--

CREATE TABLE `pain_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pain_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pain_types`
--

INSERT INTO `pain_types` (`id`, `pain_type`, `created_at`, `updated_at`) VALUES
(1, 'broken bones', '2019-11-12 18:38:14', '2019-11-12 18:38:14'),
(2, 'surgery', '2019-11-12 18:38:15', '2019-11-12 18:38:15'),
(3, 'dental work', '2019-11-12 18:38:15', '2019-11-12 18:38:15'),
(4, 'labor and childbirth', '2019-11-12 18:38:15', '2019-11-12 18:38:15'),
(5, 'cuts', '2019-11-12 18:38:15', '2019-11-12 18:38:15'),
(6, 'burns', '2019-11-12 18:38:15', '2019-11-12 18:38:15');

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
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `pain_type_id` int(10) UNSIGNED NOT NULL,
  `appointment` date DEFAULT NULL,
  `doctor_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:pending , 1:done , 2:refused_from_patient , 3:refused_from_doctor',
  `refuse_reason_doctor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refuse_reason` int(11) DEFAULT NULL COMMENT '1:change the doctor  , 2:reschedule ',
  `suitable_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `patient_id`, `pain_type_id`, `appointment`, `doctor_id`, `status`, `refuse_reason_doctor`, `refuse_reason`, `suitable_date`, `created_at`, `updated_at`) VALUES
(1, 6, 3, '2019-11-15', 4, 1, NULL, NULL, NULL, '2019-11-12 19:12:15', '2019-11-13 08:03:52'),
(2, 6, 6, '2019-11-13', 4, 1, NULL, NULL, NULL, '2019-11-12 21:05:15', '2019-11-14 00:45:48'),
(3, 7, 4, '2019-11-15', 5, 1, 'gfujhtyui', 2, '2019-11-15', '2019-11-13 07:59:20', '2019-11-13 08:10:21'),
(4, 9, 1, '2019-11-14', 5, 2, NULL, 2, '2019-11-22', '2019-11-13 19:14:17', '2019-11-13 19:16:22'),
(5, 8, 6, '2019-11-13', 4, 1, NULL, NULL, NULL, '2019-11-13 19:23:11', '2019-11-13 20:06:49'),
(6, 8, 3, '2019-11-13', 4, 1, NULL, NULL, NULL, '2019-11-13 19:29:29', '2019-11-13 20:07:41'),
(7, 8, 4, '2019-11-14', 3, 1, NULL, NULL, NULL, '2019-11-13 19:31:15', '2019-11-13 20:08:28'),
(8, 11, 2, '2019-11-14', 3, 2, NULL, NULL, '2019-11-14', '2019-11-13 19:43:58', '2019-11-13 20:10:24'),
(9, 1, 2, NULL, NULL, 0, NULL, NULL, NULL, '2019-11-13 19:59:27', '2019-11-13 19:59:27'),
(10, 11, 2, NULL, NULL, 0, NULL, NULL, NULL, '2019-11-13 20:42:39', '2019-11-13 20:42:39'),
(11, 12, 3, NULL, NULL, 0, NULL, NULL, NULL, '2019-11-14 00:50:03', '2019-11-14 00:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL COMMENT '1:male , 2:female',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 2 COMMENT '0:admin , 1:doctor , 2:patient',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `f_name`, `l_name`, `email`, `email_verified_at`, `mobile`, `birth_date`, `gender`, `country`, `occupation`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$6Prh7.59SRZiCGYijLXd/edrctnSZMCtqLLehqUrPyR5qRAZMJyZG', 'admin', 'i', 'u@gmail.com', NULL, '7867867868686', '2019-11-15', 1, '45456453', '45345345353', 0, '9HNstRQQkC2cv5UbWd3NglHZYhPii894iw9S1X5dgEUcdPQQCCMMPWdsp8kY', '2019-11-12 17:31:02', '2019-11-13 20:03:44'),
(2, 'Doctor1', '$2y$10$6Prh7.59SRZiCGYijLXd/edrctnSZMCtqLLehqUrPyR5qRAZMJyZG', 'Doctor1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'aECTYeSia08s9iLeM41oV4TuVHEyQedfgSpst0wso9LvyEq50AF0td5dkmMN', NULL, NULL),
(3, 'Doctor2', '$2y$10$6Prh7.59SRZiCGYijLXd/edrctnSZMCtqLLehqUrPyR5qRAZMJyZG', 'Doctor2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'djFGOGbzZKUkQC1MfCKNclsiRI17vq4g0TYxAcmJn1ysjb3jd4jGhQhRdvr6', NULL, NULL),
(4, 'Doctor3', '$2y$10$6Prh7.59SRZiCGYijLXd/edrctnSZMCtqLLehqUrPyR5qRAZMJyZG', 'Doctor3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(5, 'Doctor4', '$2y$10$6Prh7.59SRZiCGYijLXd/edrctnSZMCtqLLehqUrPyR5qRAZMJyZG', 'Doctor4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(6, 'Patient1', '$2y$10$5QxGDzD9ocZDp2Jfzfw4nORLSTtbHDUWYev9nkKUiWT9evb01vWTy', 'mohamed', 'ismaiel', 'mm@yahoo.com', NULL, '0000000', '1998-01-15', 1, 'Egypt', 'test', 2, 'HNhbRvqkZKD7w10qASGFd9R6hxsdfzAFJrksTFBK2B3IQBHJN3P3hPfFMsA2', '2019-11-12 21:04:24', '2019-11-12 21:05:06'),
(7, 'Patient2', '$2y$10$/ZHXrGZ8Nndcp0bi42pFp.1STpbf6DN4Dr738ZjMSqTrI6.pq1Fru', 'mm', 'mm', 'mm@mm.com', NULL, '123454576', '1999-12-12', 1, 'egypt', 'test', 2, NULL, '2019-11-13 07:54:03', '2019-11-13 07:59:08'),
(8, 'test', '$2y$10$0pRkaQT8NuM61SPEXQeiAeyw0FR34qsO/l9VXNudrshmlyFLP6UX6', 'aaaa', 'nbmnbm', 'test@gmail', NULL, '1111', '2019-10-29', 2, 'tyuy', 'utyty', 2, NULL, '2019-11-13 19:10:23', '2019-11-13 19:36:21'),
(9, 'basma', '$2y$10$IHKo.ztkWUTpMheNXbr8u.IwQyjtltGZPqWDInRF4RNM0ay5gp682', 'dfgdfggddf', 'dfgdg', 'm@m.com', NULL, '5345345', '2124-05-05', 2, 'United States', 'hgfjjhjhjhjkhjkjhkjhk', 2, 'tSqFWlWQALKj8V96PjNF4KYMxlkGOm2ArArb8rVQcBRfeBGEia7RcJesdNrp', '2019-11-13 19:10:50', '2019-11-13 19:14:10'),
(10, 'tt', '$2y$10$UEcWDoyYeU5UdzYv2qnrxuXQRDpt.bwvNtuISGxSbzrm.nlLIL7Ni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2019-11-13 19:38:37', '2019-11-13 19:38:37'),
(11, 'te', '$2y$10$yeR/7gjtdHVK4Ro7/UN3tuoljRZfqv6ZDeJvjHSXuTUj3GXQ3cUmC', 'rt', 'gh', 'test1@gmail.com', NULL, '45455', '2019-11-12', 2, 'tfh', 'jhjh', 2, '0viyuWtGi1XN623I5a0WRnduuppIRhvwFdU2R6bIGpbP9bpYUmAKvfKTlIVI', '2019-11-13 19:41:32', '2019-11-13 22:14:42'),
(12, 'mki', '$2y$10$dxRe9V1WiMef56UTmfzX1.xVbyoIfmz8XnDqGcNZQw79eGktnNXKK', 'mohamed', 'khalil', 'mki1361980@gmail.com', NULL, '01229620372', '1980-06-13', 1, 'Egypt', 'Developer', 2, NULL, '2019-11-14 00:47:05', '2019-11-14 00:49:53'),
(13, 'memo@gmail.com', '$2y$10$Fc/dGzvr6G7U.mEV2zisR.YXRq11jb5FMA7VP4Is4Vp6Oa5z7WP0u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2020-06-25 18:13:39', '2020-06-25 18:13:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor_specialists`
--
ALTER TABLE `doctor_specialists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pain_types`
--
ALTER TABLE `pain_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor_specialists`
--
ALTER TABLE `doctor_specialists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pain_types`
--
ALTER TABLE `pain_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
