-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2025 at 03:23 PM
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
-- Database: `appdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(250) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission_forms`
--

CREATE TABLE `admission_forms` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `class` varchar(250) NOT NULL,
  `parent_name` varchar(250) NOT NULL,
  `country_code` varchar(250) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `pincode` int(25) NOT NULL,
  `utm_source` varchar(250) NOT NULL,
  `utm_medium` varchar(250) NOT NULL,
  `utm_campaign` varchar(250) NOT NULL,
  `utm_term` text NOT NULL,
  `utm_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission_forms`
--

INSERT INTO `admission_forms` (`id`, `name`, `dob`, `class`, `parent_name`, `country_code`, `mobile`, `email`, `pincode`, `utm_source`, `utm_medium`, `utm_campaign`, `utm_term`, `utm_content`, `created_at`, `updated_at`) VALUES
(1, 'Alankrita Das', '2015-07-30', 'Class 5', 'Mrinmoy Das', '+91', '8436215498', 'mail@gmail.com', 700110, 'web', 'web', '219326514978', 'web', 'web', '2025-02-07 12:17:09', '2025-02-07 12:17:09'),
(2, 'Koushani Mondal', '2017-04-03', 'CLass 3', 'Priyanka Mondal', '+91', '8436215499', 'mail@yahoo.com', 741139, 'google', 'web', '213625498715', 'web', 'map', '2025-02-07 13:35:39', '2025-02-07 13:35:39'),
(3, 'Anish Ghoshal', '2019-01-05', 'Class 1', 'Anirban Ghoshal', '+91', '8436458412', 'anish@mail.com', 700010, 'google-search', 'cpc', '2168164879', 'boarding school', '1620003', '2025-02-07 14:04:17', '2025-02-07 14:04:17'),
(4, 'Jayeeta Barman', '2018-06-04', 'Class 2', 'Joydip Barman', '+91', '8436215794', 'jayee@gmail.com', 700111, 'google-search', 'cpc', '216816487994', 'boarding school', '1620003', '2025-02-09 09:09:24', '2025-02-09 09:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `extra_curriculars`
--

CREATE TABLE `extra_curriculars` (
  `id` int(20) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `extra_curriculars`
--

INSERT INTO `extra_curriculars` (`id`, `title`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Yoga', 'When young adults such as these become parents, they may transmit their tension to their children. In addition, children may internalize stress and hide distress from their parents to keep them from worrying.', 'uploads/faculty/173979099085945.jpg', '2025-02-17 05:46:30', '2025-02-17 05:46:30'),
(2, 'Swimming classes', 'Swimming also helps strengthen the part of their brain that is associated with learning & memory. So, as your children master the breaststroke, butterfly, freestyle & backstroke, think about all the good it is doing, not only for their bodies but their minds as well.', 'uploads/faculty/173979347939828.jpg', '2025-02-17 05:50:07', '2025-02-17 06:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `deleted_at` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `title`, `logo`, `image`, `desc`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'Travelling', 'uploads/facility/173977777210701.png', 'uploads/facility/173977777252190.png', 'Provide School bus', '1', '0', '2025-02-17 02:06:12', '2025-02-17 04:01:19'),
(4, 'Hostel Facilities', 'uploads/facility/173978482786138.png', 'uploads/facility/173978482759529.jpg', 'Hostel room for students', '1', '1', '2025-02-17 04:03:47', '2025-02-17 08:29:47'),
(5, 'Travelling', 'uploads/facility/173979409167881.jpg', 'uploads/facility/173979409170508.jpeg', 'jhjhl', '1', '0', '2025-02-17 06:38:11', '2025-02-17 06:38:18');

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
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int(20) NOT NULL DEFAULT 1,
  `deleted_at` int(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `title`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Full Time', 1, 1, '2025-02-11 07:40:45', '2025-02-11 08:53:10'),
(3, 'Part Time', 1, 1, '2025-02-11 07:43:40', '2025-02-12 00:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancy`
--

CREATE TABLE `job_vacancy` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `sub_title` varchar(500) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `experience` varchar(250) DEFAULT NULL,
  `no_of_vacancy` varchar(250) DEFAULT NULL,
  `school_name` varchar(500) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1',
  `deleted_at` int(11) NOT NULL DEFAULT 1 COMMENT '1: active, 0: deleted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`id`, `title`, `sub_title`, `gender`, `experience`, `no_of_vacancy`, `school_name`, `location`, `category_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Principal', 'Admin', 'Male', '5', '2', 'TIG Siliguri', 'Siliguri', 2, '1', 1, '2025-02-12 06:19:36', '2025-02-12 06:19:36'),
(3, 'Developer', 'Software', 'Mal/Female', '3', '1', 'TIGPS Kolkata', 'Kolkata', 3, '1', 1, '2025-02-13 00:44:52', '2025-02-13 00:44:52');

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
(5, '2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'Technician', 1, 1, '2025-02-10 06:23:50', '2025-02-10 06:23:50'),
(4, 'Teacher', 1, 1, '2025-02-10 08:08:44', '2025-02-11 01:07:32'),
(7, 'Lab Assistant', 0, 1, '2025-02-11 01:07:28', '2025-02-11 08:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `deleted_at` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Class 1', '1', '0', '2025-02-13 04:09:19', '2025-02-14 02:09:00'),
(2, 'Class 2', '1', '0', '2025-02-13 05:34:26', '2025-02-13 07:02:12'),
(3, 'Class 3', '1', '0', '2025-02-13 05:35:05', '2025-02-14 00:40:15'),
(4, 'Class 5', '1', '1', '2025-02-13 09:10:52', '2025-02-13 09:10:52'),
(5, 'Class 2', '1', '1', '2025-02-13 09:27:49', '2025-02-13 09:27:49'),
(6, 'Class 3', '1', '1', '2025-02-14 00:40:36', '2025-02-14 00:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(20) NOT NULL,
  `title` varchar(250) NOT NULL,
  `status` int(20) NOT NULL DEFAULT 1,
  `deleted_at` int(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `title`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Geography', 1, 1, '2025-02-11 05:35:40', '2025-02-11 06:36:51'),
(3, 'English', 1, 1, '2025-02-11 05:35:52', '2025-02-12 00:53:33'),
(4, 'Computer Science', 1, 1, '2025-02-11 06:37:18', '2025-02-11 06:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `sub_facilities`
--

CREATE TABLE `sub_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `deleted_at` varchar(255) NOT NULL DEFAULT '1',
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_facilities`
--

INSERT INTO `sub_facilities` (`id`, `title`, `desc`, `status`, `deleted_at`, `facility_id`, `created_at`, `updated_at`) VALUES
(1, 'erg', 'sdgsd', '1', '0', 3, '2025-02-17 03:29:56', '2025-02-17 04:10:12'),
(2, 'Mass Food', 'Two times food are provided by hostel authority', '1', '0', 4, '2025-02-17 04:11:35', '2025-02-17 04:12:07'),
(3, 'Food', 'Two times foods are povided by Hostel Authority', '1', '0', 4, '2025-02-17 04:12:39', '2025-02-17 04:19:20'),
(4, 'Food', 'Two times foods are povided by Hostel Authority', '1', '1', 4, '2025-02-17 04:13:07', '2025-02-17 04:13:07'),
(5, 'sss', 'ssss', '1', '0', 4, '2025-02-17 04:19:36', '2025-02-17 04:23:26'),
(6, 'Library', 'Hostel personal library for study', '1', '1', 4, '2025-02-17 04:20:21', '2025-02-17 08:49:27'),
(7, 'Room furniture', 'Bed, Study table, Almirah', '1', '1', 4, '2025-02-17 04:23:06', '2025-02-17 04:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(20) NOT NULL,
  `title` varchar(250) NOT NULL,
  `status` int(20) DEFAULT 1,
  `deleted_at` int(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `title`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'TIGPS Jalpaiguri', 1, 1, '2025-02-11 04:10:14', '2025-02-11 04:14:19'),
(3, 'TIGPS Siliguri', 1, 1, '2025-02-11 04:10:40', '2025-02-12 00:53:05'),
(4, 'TIGPS Kolkata', 1, 1, '2025-02-11 08:34:52', '2025-02-17 07:40:49');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` smallint(6) NOT NULL COMMENT '1=Master, 2=Staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Payel Majumder', 'majumderpayel4@gmail.com', NULL, '$2y$12$8dZO6bXfxqnDMMfGq005o.C0D8aaBjIRyG8Hzsi1ssazvBgLCNtta', NULL, '2025-02-06 08:00:47', '2025-02-06 08:00:47', 1),
(2, 'testname', 'test@gmail.com', NULL, '$2y$12$80nZstNwzNwGZ29pGEwUPOl.bP3PIEVqaI1LXg.QD1RN30SIf5LWC', NULL, '2025-02-07 01:03:16', '2025-02-07 01:03:16', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_forms`
--
ALTER TABLE `admission_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_curriculars`
--
ALTER TABLE `extra_curriculars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_facilities`
--
ALTER TABLE `sub_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facility_id` (`facility_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `admission_forms`
--
ALTER TABLE `admission_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `extra_curriculars`
--
ALTER TABLE `extra_curriculars`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_facilities`
--
ALTER TABLE `sub_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `job_categories` (`id`);

--
-- Constraints for table `sub_facilities`
--
ALTER TABLE `sub_facilities`
  ADD CONSTRAINT `sub_facilities_ibfk_1` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
