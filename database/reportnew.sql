-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 09:51 AM
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
-- Database: `reportnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_reports`
--

CREATE TABLE `cancelled_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `violation` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_of_violation` date NOT NULL,
  `time_of_violation` time NOT NULL,
  `violator` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `violation`, `location`, `date_of_violation`, `time_of_violation`, `violator`, `sex`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Illegal fishing', 'Backiling', '2024-10-18', '16:17:00', 'Rica C.  Lombo', 'Male', 'Bisagu', '2024-10-18 00:30:58', '2024-10-18 00:30:58'),
(2, 'Illegal fishing', 'Backiling', '2024-10-18', '16:17:00', 'Trixia Dalafu', 'Female', 'Bisagu', '2024-10-18 00:30:58', '2024-10-18 00:30:58'),
(3, 'Illegal fishing', 'Backiling', '2024-10-09', '22:08:00', 'Rica Lombo', 'Female', 'Bisagu', '2024-10-18 00:58:33', '2024-10-18 00:58:33'),
(4, 'Illegal fishing', 'Backiling', '2024-10-19', '09:39:00', 'RICA', 'Male', 'Bisagu', '2024-10-18 17:43:16', '2024-10-18 17:43:16'),
(5, 'Illegal fishing', 'Bisagu', '2024-10-10', '09:43:00', 'lombo rica', 'Male', 'Bisagu', '2024-10-18 17:43:51', '2024-10-18 17:43:51');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_12_123519_create_roles_table', 1),
(6, '2023_12_12_123555_create_role_user_table', 1),
(7, '2024_02_20_082913_create_feedbacks_table', 1),
(8, '2024_02_21_034054_create_products_table', 1),
(9, '2024_03_27_070015_create_violation_table', 1),
(10, '2024_03_27_153801_create_fishermen_table', 1),
(11, '2024_05_07_081438_create_reports_table', 1),
(12, '2024_05_10_044938_create_logs_table', 1),
(13, '2024_05_15_022603_create_reports_table', 2),
(14, '2024_05_17_005558_create_reports_table', 3),
(15, '2024_05_29_041759_create_roles_table', 4),
(16, '2024_05_29_041926_create_role_user_table', 4),
(17, '2024_05_29_042015_create__users_table', 4),
(18, '2024_06_05_100908_create_violators_table', 5),
(19, '2024_06_29_112214_create_reports_table', 6),
(20, '2024_07_07_130713_create_referrals_table', 7),
(21, '2024_09_12_123227_create_record_violations_table', 8),
(22, '2024_09_28_020754_update_record_violations_table', 9),
(24, '2024_09_28_021038_create_violators_table', 10),
(26, '2024_10_03_110539_create_user_reports_table', 11),
(27, '2024_10_12_063845_add_status_to_user_reports_table', 12),
(33, '2024_10_18_080510_update_violators_table', 13),
(34, '2024_10_18_063021_create_histories_table', 14),
(35, '2024_10_17_113710_create_turnover_receipts_table', 15),
(36, '2024_10_19_045346_create_cancelled_reports_table', 16),
(37, '2024_10_19_045346_create_resolved_reports_table', 16);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record_violations`
--

CREATE TABLE `record_violations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `violation` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_of_violation` date NOT NULL,
  `time_of_violation` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `violation` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date_of_violation` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `complainant` varchar(255) NOT NULL,
  `violator` varchar(255) NOT NULL,
  `piece_of_evidence` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `report_id`, `date`, `violation`, `time`, `date_of_violation`, `location`, `complainant`, `violator`, `piece_of_evidence`, `created_at`, `updated_at`) VALUES
(14, 20, '2024-10-02', 'Section 33', '11:11:00', '2024-10-01', 'Bisagu', 'maritime', 'Jan Michael R. Palattao', '\"banca mateo\"', '2024-10-01 19:11:44', '2024-10-01 19:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nameofbanca` varchar(255) NOT NULL,
  `nameofskipper` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `educationalbackground` varchar(255) DEFAULT NULL,
  `resident` varchar(255) DEFAULT NULL,
  `violation` varchar(255) DEFAULT NULL,
  `engine` varchar(255) NOT NULL,
  `engineno` varchar(255) NOT NULL,
  `gridcoordinate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `nameofbanca`, `nameofskipper`, `age`, `birthdate`, `status`, `educationalbackground`, `resident`, `violation`, `engine`, `engineno`, `gridcoordinate`, `amount`, `created_at`, `updated_at`) VALUES
(20, 'mateo', 'Jan Michael R. Palattao', '25', '1999-10-04', 'Married', 'Collegegraduate', 'Backiling', 'Section 33 of Municipal Ordinance No. 2015-152', 'engine', '11', '111', '55000', '2024-10-01 19:10:55', '2024-10-01 19:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `resolved_reports`
--

CREATE TABLE `resolved_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-10-18 23:29:58', '2024-10-18 23:29:58'),
(2, 'user', '2024-10-18 23:29:58', '2024-10-18 23:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 4, NULL, NULL),
(2, 2, 5, NULL, NULL),
(3, 2, 6, NULL, NULL),
(4, 2, 7, NULL, NULL),
(5, 2, 8, NULL, NULL),
(6, 2, 9, NULL, NULL),
(7, 2, 10, NULL, NULL),
(8, 2, 11, NULL, NULL),
(9, 2, 12, NULL, NULL),
(10, 2, 13, NULL, NULL),
(11, 2, 14, NULL, NULL),
(12, 2, 15, NULL, NULL),
(13, 2, 16, NULL, NULL),
(14, 2, 17, NULL, NULL),
(15, 2, 18, NULL, NULL),
(16, 2, 19, NULL, NULL),
(17, 2, 20, NULL, NULL),
(18, 2, 21, NULL, NULL),
(19, 2, 22, NULL, NULL),
(20, 2, 23, NULL, NULL),
(21, 1, 1, NULL, NULL),
(22, 1, 2, NULL, NULL),
(23, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `turnover_receipts`
--

CREATE TABLE `turnover_receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `municipal_agriculturist` varchar(255) NOT NULL,
  `date_of_violation` date NOT NULL,
  `time_of_violation` time NOT NULL,
  `name_of_violation` varchar(255) NOT NULL,
  `name_of_skipper` varchar(255) NOT NULL,
  `name_of_banca` varchar(255) NOT NULL,
  `investigator_pnco` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `turnover_receipts`
--

INSERT INTO `turnover_receipts` (`id`, `municipal_agriculturist`, `date_of_violation`, `time_of_violation`, `name_of_violation`, `name_of_skipper`, `name_of_banca`, `investigator_pnco`, `created_at`, `updated_at`) VALUES
(1, 'MARITES', '2024-10-18', '21:10:00', 'Illegal Fishing', 'Jan Michael R. Palattao', 'mateo', 'RICA', '2024-10-18 05:10:23', '2024-10-18 05:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@mail.com', NULL, '$2y$12$MgJlCYT0aNSvZCZ33teekOA6yHlldfmDBJ.kPRX9JX.rVqR5gMhy6', NULL, '2024-10-18 23:29:59', '2024-10-18 23:29:59'),
(2, 'Administrator(Leo)', 'l30pmsit@gmail.com', NULL, '$2y$12$z/ocUDF3/VLyufqqD2XCkudntdZj/TDlxo4m9hj9wIgOtz8k9JG5G', NULL, '2024-10-18 23:29:59', '2024-10-18 23:29:59'),
(3, 'User', 'user@mail.com', NULL, '$2y$12$ramcuijcG8tIDkeUYZIh9OawtwMmhbf1Kw0g/ZYJcoZqyXT31np6O', NULL, '2024-10-18 23:30:00', '2024-10-18 23:30:00'),
(4, 'User1', 'user1@mail.com', NULL, '$2y$12$ezaAieqwQJLtTJKlJWCJZOp1b85T8fUsAS8f8aq9cgxhP0eWybZrq', NULL, '2024-10-18 23:30:00', '2024-10-18 23:30:00'),
(5, 'User2', 'user2@mail.com', NULL, '$2y$12$ZgIfWM/uYChVa5ShOqW6peuzmM6IyCs8A4leoTrBssIjszKVC0JLO', NULL, '2024-10-18 23:30:00', '2024-10-18 23:30:00'),
(6, 'User3', 'user3@mail.com', NULL, '$2y$12$ub9uNg4kOSrMrIDqHNdZbut1aR.tLgnTMsPx9mvRicP.EoquOtH/a', NULL, '2024-10-18 23:30:01', '2024-10-18 23:30:01'),
(7, 'User4', 'user4@mail.com', NULL, '$2y$12$XgyVrTB8.25CQdmFEgbo3OxduYpDhMal81892QOENDFnIz3NxLvi.', NULL, '2024-10-18 23:30:01', '2024-10-18 23:30:01'),
(8, 'User5', 'user5@mail.com', NULL, '$2y$12$yKG3HX6Yb79kkeVm4H4jlONc2cbHKmPyUQCRZEmhnQmjZ9Bgr2mbu', NULL, '2024-10-18 23:30:01', '2024-10-18 23:30:01'),
(9, 'User6', 'user6@mail.com', NULL, '$2y$12$emmdc5ub.wVBqmyMxzxhHuhjlTzAq3P.GHHh7RlCIZqX83/IBBXyW', NULL, '2024-10-18 23:30:02', '2024-10-18 23:30:02'),
(10, 'User7', 'user7@mail.com', NULL, '$2y$12$TCL2tXTvbrVa12Vk7wmWO.RyTYuG5gqBILGUzL4ZOy1oBgjII7wZK', NULL, '2024-10-18 23:30:02', '2024-10-18 23:30:02'),
(11, 'User8', 'user8@mail.com', NULL, '$2y$12$k3/hrSHdQpNYJHZrT/IUReJ9mlepbtcwpMMcORfkCGE/DDkXX/Zwq', NULL, '2024-10-18 23:30:02', '2024-10-18 23:30:02'),
(12, 'User9', 'user9@mail.com', NULL, '$2y$12$RJkS5iY5CTosKfbRmoXlRe5JSfVowKms/a76s9JE0KxIjh8L83a0W', NULL, '2024-10-18 23:30:03', '2024-10-18 23:30:03'),
(13, 'User10', 'user10@mail.com', NULL, '$2y$12$qASUY3OFzhGJijdrB7twMe2dSbcvVf1wWAwTyVr.dWX9IqHKTr4.e', NULL, '2024-10-18 23:30:03', '2024-10-18 23:30:03'),
(14, 'User11', 'user11@mail.com', NULL, '$2y$12$Am13kbTwI.cPSrxCsvTQP.Ke9ZlbYgAbWGDLQ.MHVSNO.OGlaxLX6', NULL, '2024-10-18 23:30:03', '2024-10-18 23:30:03'),
(15, 'User12', 'user12@mail.com', NULL, '$2y$12$yKovlwGFNzP4ZW/m2ookc.J2mtZte5TQmDQOA86PoeAPpRgIuKsH2', NULL, '2024-10-18 23:30:03', '2024-10-18 23:30:03'),
(16, 'User13', 'user13@mail.com', NULL, '$2y$12$tDRmHAu6HAaHETfc.Sx3kuMsCamtKeQAXYsJJB3kKQzDe68O.OndS', NULL, '2024-10-18 23:30:04', '2024-10-18 23:30:04'),
(17, 'User14', 'user14@mail.com', NULL, '$2y$12$Klf/EBdOev0AFNtBpAwypeF7OSxWBtkEApb0BeMXsA2aUWye9VY5u', NULL, '2024-10-18 23:30:04', '2024-10-18 23:30:04'),
(18, 'User15', 'user15@mail.com', NULL, '$2y$12$HFskuAovhYVHfbVvbkHmYeSjskAripmdy..xDHGpTwAoj1RBbwWlm', NULL, '2024-10-18 23:30:04', '2024-10-18 23:30:04'),
(19, 'User16', 'user16@mail.com', NULL, '$2y$12$VisqOVO0vYqWpzQ.0AOOteJ90gPfdDt6C3VkmUGch8oehynBvDjSy', NULL, '2024-10-18 23:30:05', '2024-10-18 23:30:05'),
(20, 'User17', 'user17@mail.com', NULL, '$2y$12$whNsp.0Ddk.XT1VtfpcfCOnC3RJ8C4trnP8V0AthJYtkFx0waI/PG', NULL, '2024-10-18 23:30:05', '2024-10-18 23:30:05'),
(21, 'User18', 'user18@mail.com', NULL, '$2y$12$TWNpqkng7LbuGHgdzl29yed5ZG.FgZAzhSoIJUjpwZ5v5UOdHI5oa', NULL, '2024-10-18 23:30:05', '2024-10-18 23:30:05'),
(22, 'User19', 'user19@mail.com', NULL, '$2y$12$4PySxCn5PhIKyoqzojtBte2573twb7UsA.qvR7wEK8XZyudNj3vsi', NULL, '2024-10-18 23:30:06', '2024-10-18 23:30:06'),
(23, 'User20', 'user20@mail.com', NULL, '$2y$12$TmazbpbExD8So/zBUgA1Ce0GJY8uqBpF.fVo3nSSx/tcieajJDfCC', NULL, '2024-10-18 23:30:06', '2024-10-18 23:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_reports`
--

CREATE TABLE `user_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_reports`
--

INSERT INTO `user_reports` (`id`, `name`, `address`, `contact_number`, `information`, `photo`, `created_at`, `updated_at`, `status`) VALUES
(9, NULL, NULL, '09269384277', 'rigkfxc,vndkc', NULL, '2024-10-18 20:10:52', '2024-10-18 20:24:41', 'resolved'),
(10, NULL, NULL, '09269384277', 'cx', NULL, '2024-10-18 20:11:05', '2024-10-18 20:11:05', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `violators`
--

CREATE TABLE `violators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `record_violations_id` bigint(20) UNSIGNED NOT NULL,
  `violator` varchar(255) DEFAULT NULL,
  `sex` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cancelled_reports`
--
ALTER TABLE `cancelled_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `record_violations`
--
ALTER TABLE `record_violations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referrals_report_id_foreign` (`report_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resolved_reports`
--
ALTER TABLE `resolved_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turnover_receipts`
--
ALTER TABLE `turnover_receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_reports`
--
ALTER TABLE `user_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `violators`
--
ALTER TABLE `violators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `violators_record_violations_id_foreign` (`record_violations_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cancelled_reports`
--
ALTER TABLE `cancelled_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `record_violations`
--
ALTER TABLE `record_violations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `resolved_reports`
--
ALTER TABLE `resolved_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `turnover_receipts`
--
ALTER TABLE `turnover_receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_reports`
--
ALTER TABLE `user_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `violators`
--
ALTER TABLE `violators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `referrals`
--
ALTER TABLE `referrals`
  ADD CONSTRAINT `referrals_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `violators`
--
ALTER TABLE `violators`
  ADD CONSTRAINT `violators_record_violations_id_foreign` FOREIGN KEY (`record_violations_id`) REFERENCES `record_violations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
