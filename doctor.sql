-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2019 at 12:01 PM
-- Server version: 5.5.61-cll
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lamassui_doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE `examinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examinations`
--

INSERT INTO `examinations` (`id`, `title`, `desc`, `session_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'blood test', 'Test', '1', 1, '2018-04-25 19:44:33', '2018-04-26 03:26:37'),
(2, 'سسسس', 'لبيسش', '3', 1, '2018-04-26 04:57:35', '2018-04-26 04:57:35'),
(5, 'ahmed', 'exam 1', '5', 3, '2018-04-27 09:33:20', '2018-04-27 09:33:20'),
(6, 'دواء', 'دواء باندول ٢ حبة يوميا صباحا ومساءا', '6', 3, '2018-04-27 09:57:14', '2018-04-27 09:57:14'),
(7, '1', 't2', '7', 3, '2018-04-28 12:52:10', '2018-04-28 12:52:10'),
(8, 'title', 'descriptions', '4', 3, '2018-05-03 08:46:31', '2018-05-03 08:46:31'),
(9, 'exam 2', 'descriptions', '4', 3, '2018-05-03 08:47:04', '2018-05-03 08:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `julphar_medical`
--

CREATE TABLE `julphar_medical` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `julphar_medical`
--

INSERT INTO `julphar_medical` (`id`, `title`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'A Hemophilia (Hemophilia)', 'A, Hemophilia (Hemophilia)', '2018-04-25 22:17:42', '2018-04-25 22:17:42'),
(2, 'Abdominal Hernia (Hernia Overview)', 'Abdominal Hernia (Hernia Overview)', '2018-04-25 22:17:42', '2018-04-25 22:17:42'),
(3, 'Abscesses Skin (Boils)', 'Abscesses, Skin (Boils)', '2018-04-25 22:17:42', '2018-04-25 22:17:42'),
(4, 'Acne Cystic (Boils)', 'Acne Cystic (Boils)', '2018-04-25 22:17:42', '2018-04-25 22:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_20_174207_create_patient', 1),
(4, '2018_04_20_175056_create_session', 1),
(5, '2018_04_20_185709_create_prescription', 1),
(6, '2018_04_20_205910_create_examinations', 1),
(7, '2018_04_20_210018_create_jupar', 1),
(8, '2018_04_22_194455_create_user_type', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `age`, `mobile`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'نور احمد سعد', 25, '07709253416', 1, '2018-04-25 19:10:54', '2018-04-25 19:10:54'),
(2, 'سارة خالد محمد', 28, '07809353276', 1, '2018-04-25 19:12:07', '2018-04-25 19:12:33'),
(11, 'عبدالله باسم خضير', 26, '07826212508', 3, '2018-04-26 07:32:10', '2018-04-27 09:41:05'),
(15, 'Hussein Qasim', 35, '009647901464762', 3, '2018-04-28 12:49:59', '2018-04-28 12:49:59'),
(16, 'ali', 25, '07729426315', 1, '2018-05-02 17:49:22', '2018-05-02 17:49:22'),
(17, 'Zaid', 33, '07826212508', 3, '2018-06-10 05:42:16', '2019-01-08 07:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` int(11) NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `session_id`, `desc`, `created_at`, `updated_at`) VALUES
(9, 1, 'Acne Cystic (Boils)', '2018-04-25 19:42:29', '2018-04-25 19:42:29'),
(8, 1, 'Abscesses Skin (Boils)', '2018-04-25 19:42:29', '2018-04-25 19:42:29'),
(7, 1, 'Abdominal Hernia (Hernia Overview).', '2018-04-25 19:42:29', '2018-04-25 19:42:29'),
(11, 4, 'Acne Cystic (Boils)', '2018-04-26 07:33:18', '2018-04-26 07:33:18'),
(12, 4, 'keflx', '2018-04-26 07:33:18', '2018-04-26 07:33:18'),
(13, 4, 'A Hemophilia (Hemophilia)', '2018-04-26 07:33:18', '2018-04-26 07:33:18'),
(14, 5, 'pandol', '2018-04-27 09:32:10', '2018-04-27 09:32:10'),
(15, 7, 'A Hemophilia (Hemophilia)', '2018-04-28 12:51:01', '2018-04-28 12:51:01'),
(16, 7, 'doxycycline ', '2018-04-28 12:51:01', '2018-04-28 12:51:01'),
(17, 7, 'Omepreazole', '2018-04-28 12:51:01', '2018-04-28 12:51:01'),
(18, 8, 'Abscesses Skin (Boils)', '2018-05-03 08:45:59', '2018-05-03 08:45:59'),
(19, 8, 'Abdominal Hernia (Hernia Overview)', '2018-05-03 08:45:59', '2018-05-03 08:45:59'),
(20, 8, 'A Hemophilia (Hemophilia)', '2018-05-03 08:45:59', '2018-05-03 08:45:59'),
(21, 8, 'padol', '2018-05-03 08:45:59', '2018-05-03 08:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(11) NOT NULL,
  `diagnosis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `patient_id`, `diagnosis`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hypochondriasis or hypochondria is a condition in which a person is inordinately worried about having a serious illness. An old concept, its meaning has repeatedly changed due to redefinitions in its source metaphors.[1] It has been claimed that this debilitating condition results from an inaccurate perception of the condition of body or mind despite the absence of an actual medical diagnosis.[2] An individual with hypochondriasis is known as a hypochondriac. Hypochondriacs become unduly alarmed about any physical or psychological symptoms they detect, no matter how minor the symptom may be, and are convinced that they have, or are about to be diagnosed with, a serious illness.', 1, '2018-04-25 19:24:41', '2018-04-25 19:42:29'),
(3, 5, 'vvv', 1, '2018-04-26 04:56:57', '2018-04-26 04:56:57'),
(4, 11, 'test test', 3, '2018-04-26 07:33:18', '2018-04-26 07:33:18'),
(5, 12, 'test 32', 3, '2018-04-27 09:32:10', '2018-04-27 09:32:10'),
(6, 14, 'test', 3, '2018-04-27 09:56:29', '2018-04-27 09:56:29'),
(7, 15, 'ESD', 3, '2018-04-28 12:51:01', '2018-04-28 12:51:01'),
(8, 11, 'diagnosis', 3, '2018-05-03 08:45:59', '2018-05-03 08:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type_id`, `start_date`, `end_date`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abdullah khudhair', 'abdullabasim91@gmail.com', '$2y$10$E.tNRt22Wda4Til2K1aIBeJh7JHoa2a5BUXmY/YSQQWFM.3.zYO1.', '2', '2018-04-01', '2018-04-30', 1, 'fsnotAoBQn3ZeLpYRFLx9hJ0TvF0jXTLGKA3NWykPOXKYs9WS9bgsvH0QMX4', '2018-04-22 17:56:45', '2018-04-22 17:56:45'),
(2, 'Tamara AL-sammarraie', 'tamarazead91@gmail.com', '$2y$10$vBIUTuNPvzS3KwMRfqr6nO0zDBLi4uchmcFsgcMMSV1U.XgqUVvVS', '1', NULL, NULL, 1, 'CqCtHfWxivSRmHwnrEbPeQMj5cS26Vtv78hgQHr5aRrbMTYtQej15oPPDkxa', '2018-04-22 17:58:02', '2018-04-22 17:58:02'),
(3, 'Admin', 'admin@lamassu.com', '$2y$10$E.tNRt22Wda4Til2K1aIBeJh7JHoa2a5BUXmY/YSQQWFM.3.zYO1.', '2', '2018-04-01', '2018-04-30', 1, '5AFWOCP5CcRErvawPziRZr1dfLjqEAfO1HNFRrlnuQS3pM5GQB4Ag9dP6SkB', '2018-04-22 17:56:45', '2018-04-22 17:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `julphar_medical`
--
ALTER TABLE `julphar_medical`
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
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `julphar_medical`
--
ALTER TABLE `julphar_medical`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
