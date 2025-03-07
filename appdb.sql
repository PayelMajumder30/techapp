-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 03:31 PM
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
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(20) NOT NULL,
  `registration_id` varchar(200) DEFAULT NULL,
  `job_id` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `father_name` varchar(500) DEFAULT NULL,
  `date_of_birth` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `landmark` text DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `dist` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `x_school_name` varchar(500) DEFAULT NULL,
  `x_board_name` varchar(500) DEFAULT NULL,
  `x_percentage` varchar(50) DEFAULT NULL,
  `x_passing_year` varchar(500) DEFAULT NULL,
  `xii_school_name` varchar(500) DEFAULT NULL,
  `xii_board_name` varchar(500) DEFAULT NULL,
  `xii_percentage` varchar(50) DEFAULT NULL,
  `xii_passing_year` varchar(50) DEFAULT NULL,
  `after_xii_qualification` varchar(500) DEFAULT NULL,
  `after_xii_institute_name` varchar(500) DEFAULT NULL,
  `after_xii_institute_board` varchar(500) DEFAULT NULL,
  `after_xii_institute_stream` varchar(500) DEFAULT NULL,
  `after_xii_institute_percentage` varchar(200) DEFAULT NULL,
  `after_xii_institute_passing_year` varchar(200) DEFAULT NULL,
  `present_salary` varchar(200) DEFAULT NULL,
  `expected_salary` varchar(200) DEFAULT NULL,
  `join_time` varchar(200) DEFAULT NULL,
  `know_anyone_at_tigs` varchar(20) DEFAULT NULL,
  `referrence_details` varchar(500) DEFAULT NULL,
  `applied_post` varchar(200) DEFAULT NULL,
  `unit_name` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `aadhar_card_file` varchar(250) DEFAULT NULL,
  `pan_card_file` varchar(250) DEFAULT NULL,
  `resume_file` varchar(250) DEFAULT NULL,
  `signature` varchar(220) DEFAULT NULL,
  `x_admit_card` varchar(250) DEFAULT NULL,
  `image_file` varchar(250) DEFAULT NULL,
  `deleted_at` varchar(100) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `registration_id`, `job_id`, `name`, `email`, `phone`, `father_name`, `date_of_birth`, `gender`, `marital_status`, `address`, `landmark`, `pincode`, `city`, `dist`, `state`, `country`, `x_school_name`, `x_board_name`, `x_percentage`, `x_passing_year`, `xii_school_name`, `xii_board_name`, `xii_percentage`, `xii_passing_year`, `after_xii_qualification`, `after_xii_institute_name`, `after_xii_institute_board`, `after_xii_institute_stream`, `after_xii_institute_percentage`, `after_xii_institute_passing_year`, `present_salary`, `expected_salary`, `join_time`, `know_anyone_at_tigs`, `referrence_details`, `applied_post`, `unit_name`, `subject`, `aadhar_card_file`, `pan_card_file`, `resume_file`, `signature`, `x_admit_card`, `image_file`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'TIGWS-00001', '4', 'testname', 'admin@gmail.com', '9436512584', 'testFname', '1996-04-28', 'Female', 'married', 'Sodepur', 'Road no.6', '741139', 'Kolkata', 'North 24 Paragana', 'West Bengal', 'India', 'Sodepur High School', 'wbbse', '70', '2010', 'Sodepur High School', 'WBBSE', '75', '2012', NULL, NULL, NULL, NULL, NULL, NULL, '25000', '35000', '15', 'No', '', 'Teacher', 'TIGPS Siliguri', 'Computer Science', 'uploads/form\\2025022807493679945015.jpg', 'uploads/form\\2025022807493676450123.jpg', 'uploads/form\\2025022807493657930777.pdf', 'uploads/form\\2025022807493614999385.png', 'uploads/form\\2025022807493696044347.png', 'uploads/form\\2025022807493628413711.jpg', '1', '2025-02-28 02:19:36', '2025-02-28 02:19:36'),
(2, 'TIGWS-00002', '3', 'Test2', 'admin@gmail.com', '9436512584', 'Test2name', '1995-03-28', 'Male', 'married', 'Dhubulia', '23/16 No. group Dhubulia', '741139', 'Krishnagar', 'Nadia', 'West Bengal', 'India', 'Dhubulia Shyamaprasad High School', 'WBBSE', '70', '2011', 'Dhubulia Shyamaprasad High School', 'WBBSE', '72', '2013', NULL, NULL, NULL, NULL, NULL, NULL, '12000', '17000', '15', 'Yes', 'Techmantra, IT', 'Teacher', 'TIGPS Kolkata', 'Computer Science', 'uploads/form\\2025022810393689144921.png', 'uploads/form\\2025022810393656340456.jpeg', 'uploads/form\\2025022810393645137877.pdf', 'uploads/form\\2025022810393626472150.png', 'uploads/form\\2025022810393679626216.png', 'uploads/form\\2025022810393676651012.jpg', '1', '2025-02-28 05:09:36', '2025-02-28 05:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `career_experiences`
--

CREATE TABLE `career_experiences` (
  `id` int(11) NOT NULL,
  `career_id` varchar(200) DEFAULT NULL,
  `experience_type` varchar(500) DEFAULT NULL,
  `experience_duration` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career_experiences`
--

INSERT INTO `career_experiences` (`id`, `career_id`, `experience_type`, `experience_duration`, `created_at`, `updated_at`) VALUES
(1, '1', 'Career Counsellor', '5', '2025-02-28 02:19:36', '2025-02-28 02:19:36'),
(2, '2', 'TEACHER', '2', '2025-02-28 05:09:36', '2025-02-28 05:09:36'),
(3, '2', 'Application Support', '2', '2025-02-28 05:09:36', '2025-02-28 05:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `career_higher_studies`
--

CREATE TABLE `career_higher_studies` (
  `id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `after_xii_qualification` varchar(255) DEFAULT NULL,
  `after_xii_institute_name` varchar(255) DEFAULT NULL,
  `after_xii_institute_board` varchar(255) DEFAULT NULL,
  `after_xii_institute_stream` varchar(255) DEFAULT NULL,
  `after_xii_institute_percentage` int(11) DEFAULT NULL,
  `after_xii_institute_passing_year` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career_higher_studies`
--

INSERT INTO `career_higher_studies` (`id`, `career_id`, `after_xii_qualification`, `after_xii_institute_name`, `after_xii_institute_board`, `after_xii_institute_stream`, `after_xii_institute_percentage`, `after_xii_institute_passing_year`, `created_at`, `updated_at`) VALUES
(1, 1, 'UG', 'WBUT', 'CIEM', 'IT', 63, 2015, '2025-02-28 02:19:36', '2025-02-28 02:19:36'),
(2, 2, 'Dilpoma', 'BPCIT', 'WBSCTE', 'CST', 76, 2014, '2025-02-28 05:09:36', '2025-02-28 05:09:36'),
(3, 2, 'UG', 'Kalyani University', 'Autonomous', 'IT', 62, 2017, '2025-02-28 05:09:36', '2025-02-28 05:09:36');

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
  `slug` varchar(250) DEFAULT NULL,
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

INSERT INTO `facilities` (`id`, `title`, `slug`, `logo`, `image`, `desc`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'Travelling', NULL, 'uploads/facility/173977777210701.png', 'uploads/facility/173977777252190.png', 'Provide School bus', '1', '0', '2025-02-17 02:06:12', '2025-02-17 04:01:19'),
(4, 'Hostel Facilities', NULL, 'uploads/facility/173978482786138.png', 'uploads/facility/173978482759529.jpg', 'Hostel room for students', '0', '1', '2025-02-17 04:03:47', '2025-03-03 00:26:37'),
(5, 'Travelling', NULL, 'uploads/facility/173979409167881.jpg', 'uploads/facility/173979409170508.jpeg', 'jhjhl', '0', '0', '2025-02-17 06:38:11', '2025-03-03 00:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `class_name` varchar(250) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `page_title` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(500) DEFAULT NULL,
  `twitter_link` varchar(500) DEFAULT NULL,
  `linkedin_link` varchar(500) DEFAULT NULL,
  `deleted_at` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `designation`, `description`, `image`, `class_name`, `status`, `page_title`, `meta_title`, `meta_desc`, `meta_keyword`, `facebook_link`, `twitter_link`, `linkedin_link`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'John Doe', 'Class Teacher', 'Good Teacher', 'uploads/faculty/174127051383905.jpg', 'Class 5', '1', NULL, NULL, NULL, NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', '1', '2025-03-06 08:45:13', '2025-03-06 08:45:13'),
(3, 'Sam Doe', 'Teacher', 'Good Teacher', 'uploads/faculty/174127080762756.jpg', 'Class 2', '1', NULL, NULL, NULL, NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', '1', '2025-03-06 08:50:07', '2025-03-06 08:55:37'),
(4, 'Diana Dsouza', 'English Teacher', 'Good Teacher', 'uploads/faculty/174127166175721.jpg', 'Class 2', '1', NULL, NULL, NULL, NULL, 'Facebook link', 'Twitter link', 'Linkedin link', '1', '2025-03-06 09:04:21', '2025-03-07 02:00:27');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `video` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `video`, `created_at`, `updated_at`) VALUES
(2, NULL, 'https://www.youtube.com/watch?v=E8Sif-kydPw', '2025-03-06 02:36:00', '2025-03-06 02:36:00'),
(4, 'uploads/faculty/174125280611135.png', NULL, '2025-03-06 03:11:02', '2025-03-06 03:50:06'),
(5, 'uploads/faculty/174125281885762.png', NULL, '2025-03-06 03:50:18', '2025-03-06 03:50:18'),
(6, 'uploads/faculty/174125282923830.jpg', NULL, '2025-03-06 03:50:29', '2025-03-06 03:50:29'),
(7, 'uploads/faculty/174125285576611.png', NULL, '2025-03-06 03:50:55', '2025-03-06 03:50:55');

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
  `slug` varchar(255) DEFAULT NULL,
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

INSERT INTO `job_vacancy` (`id`, `title`, `slug`, `sub_title`, `gender`, `experience`, `no_of_vacancy`, `school_name`, `location`, `category_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Principal', '1-principal', 'Admin section', 'Male', '5', '2', 'TIG Siliguri', 'Siliguri', 2, '1', 1, '2025-02-12 06:19:36', '2025-02-19 04:32:22'),
(3, 'Developer', '3-developer', 'Software', 'Male', '3', '1', 'TIGPS Kolkata', 'Kolkata', 3, '1', 1, '2025-02-13 00:44:52', '2025-02-19 04:34:33'),
(4, 'Counsellor', '4-counsellor', 'Counselling', 'Female', '4', '1', 'TIG Siliguri', 'Siliguri', 3, '1', 1, '2025-02-18 06:32:02', '2025-02-19 04:32:48'),
(5, 'Administrator', '5-administrator', 'Admin section', 'Male', '10', '1', 'TIG Siliguri', 'Siliguri', 2, '1', 1, '2025-02-18 07:21:07', '2025-02-19 04:36:04'),
(11, 'English Teacher', '11-english-teacher', 'Teaching', 'Mal/Female', '3', '1', 'TIGPS Kolkata', 'Kolkata', 2, '1', 1, '2025-02-19 02:48:00', '2025-03-03 00:26:01');

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
-- Table structure for table `page_content`
--

CREATE TABLE `page_content` (
  `id` int(11) NOT NULL,
  `page` varchar(250) DEFAULT NULL,
  `tilte` varchar(500) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `custom_field` int(11) DEFAULT NULL,
  `curriculum_image` varchar(250) DEFAULT NULL,
  `curriculum_desc` text DEFAULT NULL,
  `beyond_image` varchar(250) DEFAULT NULL,
  `beyond_desc` text DEFAULT NULL,
  `admission_image` varchar(250) DEFAULT NULL,
  `admission_desc` text DEFAULT NULL,
  `walkthrough_desc` text DEFAULT NULL,
  `walkthrough_video` text DEFAULT NULL,
  `core_value_desc` text NOT NULL,
  `core_value_image_1` varchar(250) DEFAULT NULL,
  `core_value_title_1` varchar(250) DEFAULT NULL,
  `core_value_image_2` varchar(250) DEFAULT NULL,
  `core_value_title_2` varchar(250) DEFAULT NULL,
  `core_value_image_3` varchar(250) DEFAULT NULL,
  `core_value_title_3` varchar(250) DEFAULT NULL,
  `founder_perspective` text DEFAULT NULL,
  `extra_curricular_activities` text DEFAULT NULL,
  `medical_assistance` text DEFAULT NULL,
  `pickup_drop_facility` text DEFAULT NULL,
  `teacher_student_relationship` text DEFAULT NULL,
  `about_videos` varchar(255) NOT NULL,
  `about_founder_msg` text NOT NULL,
  `about_principal_msg` text NOT NULL,
  `teacher_student_mentorship` varchar(255) DEFAULT NULL,
  `staff_only` varchar(250) DEFAULT NULL,
  `board_curriculum` varchar(250) DEFAULT NULL,
  `a_pioneer_in_eastern_india` varchar(255) DEFAULT NULL,
  `area_of_school` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(7, 'Lab Assistant', 0, 1, '2025-02-11 01:07:28', '2025-02-11 08:40:26'),
(10, 'Principal', 1, 1, '2025-02-28 05:14:11', '2025-02-28 05:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `seo_pages`
--

CREATE TABLE `seo_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) NOT NULL,
  `page_title` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seo_pages`
--

INSERT INTO `seo_pages` (`id`, `page`, `page_title`, `meta_title`, `meta_desc`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'CLasses', 'classes', 'Master module|classes', 'meta descriptions', 'class12', '2025-03-03 12:41:50', '2025-03-03 08:48:17'),
(2, 'test1', 'test page', 'test meta title', 'test meta description', 'test keyword', '2025-03-03 14:20:01', '2025-03-03 14:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'official_phone1', '9733018000', '2023-03-11 13:47:00', '2024-04-05 08:57:14'),
(2, 'official_phone2', '9733018000', '2023-03-11 13:47:00', '2024-04-05 08:57:14'),
(3, 'official_email', 'info@technoindia.com', '2023-03-11 13:47:00', '2024-04-05 08:57:14'),
(4, 'full_company_name', 'Techno India Group', '2023-03-11 13:53:50', '2024-04-05 08:57:14'),
(5, 'pretty_company_name', 'Techno India', '2023-03-11 13:53:50', '2024-04-05 08:57:14'),
(6, 'company_short_desc', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam minus adipisci ullam quaerat maxime doloribus ad eum enim facilis optio?\r\n\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Magni consequuntur expedita doloribus!', '2023-03-12 00:37:14', '2024-04-05 08:57:14'),
(7, 'company_full_address', 'Techno India Group World School Himachal Vihar, Near SJDA, Matigara, Siliguri West Bengal- 734010', '2023-03-12 01:53:21', '2024-04-05 08:57:14'),
(8, 'google_map_address_link', 'https://maps.app.goo.gl/xsXSALL6mmY4YiFJ6', '2023-03-12 01:58:31', '2024-04-05 08:57:14'),
(9, 'website_link', 'technoindiagroupworldschool.com', '2024-03-19 02:02:29', '2024-04-05 08:57:14');

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
-- Table structure for table `teaching_process`
--

CREATE TABLE `teaching_process` (
  `id` bigint(50) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teaching_process`
--

INSERT INTO `teaching_process` (`id`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Teaching', 'uploads/teaching/174075296042453.jpg', 'teaching process', '1', '2025-02-28 08:59:20', '2025-02-28 08:59:20'),
(3, 'Sports School', 'uploads/teaching/174098561636889.webp', 'Where children are playing enthusiastically', '1', '2025-02-28 09:01:30', '2025-03-05 02:16:45'),
(5, 'Teaching swimming', 'uploads/teaching/174075345993889.jpg', 'Where children can learn swimming', '1', '2025-02-28 09:07:39', '2025-03-03 01:37:59');

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
(4, 'TIGPS Kolkata', 1, 1, '2025-02-11 08:34:52', '2025-03-03 00:26:29');

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
(1, 'Master Admin', 'majumderpayel4@gmail.com', NULL, '$2y$12$8dZO6bXfxqnDMMfGq005o.C0D8aaBjIRyG8Hzsi1ssazvBgLCNtta', NULL, '2025-02-06 08:00:47', '2025-02-06 08:00:47', 1),
(2, 'testname', 'test@gmail.com', NULL, '$2y$12$80nZstNwzNwGZ29pGEwUPOl.bP3PIEVqaI1LXg.QD1RN30SIf5LWC', NULL, '2025-02-07 01:03:16', '2025-02-07 01:03:16', 0),
(3, 'Super Admin', 'admin@gmail.com', NULL, '$2y$12$MEtO1c3k76FUqBiGjkIPb.Vi.W9IHmzvw.xrC/W/6hYpyxUgUviSa', NULL, '2025-02-19 02:20:56', '2025-02-19 02:20:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'SPORTS', 'uploads/chooseus/174118173349786.jpg', 'You can find out about the type of a variable using gettype(). It\'ll tell you that which variable does not contains an array. You can than change it to array.', '1', '2025-03-05 08:05:33', '2025-03-06 08:53:46'),
(4, 'Parent Teacher meeting', 'uploads/chooseus/174118192318970.jpg', 'A parent-teacher conference is a great opportunity to.\r\n\r\nshare academic progress and growth based on classroom observations, testing data, assessments, portfolios, and assignments \r\nlearn from parents or guardians so you can be better informed about students\' strengths, needs, behaviors, and learning styles\r\ndiscuss enrichment or intervention strategies to support students\' learning\r\ndiscuss issues that may be interfering with students\' learning and growth \r\nParent-teacher conferences are usually once or twice a year at progress reporting periods. They are brief meetings, lasting about 10-30 minutes. Conferences are typically scheduled 1 to 2 months in advance. Some middle and high schools only request parent conferences to discuss problems. Most schools set aside specific dates and times for conferences, but if school schedules conflict with family schedules, it\'s worth the effort to find a mutually convenient time, or even schedule a phone or video conference. Be mindful of special situations, such as divorced parents, single parents, or guardianships. Some divorced parents, for example, may prefer separate conferences.', '1', '2025-03-05 08:08:43', '2025-03-05 08:36:11'),
(5, 'Safety and Security', 'uploads/chooseus/174125322336612.png', 'West Bengal has made significant progress in education and achieving near universal enrolment among children atthe primary\r\nlevel. To sustain this success, we need\r\ninterventions to ensure safetyand overall\r\nwell-being of students. Schoolsneed to have\r\nan enabling environment to face the challenges of natural disasters, health hazards,abuse, violence, exploitation and\r\naccidents.', '1', '2025-03-06 03:57:03', '2025-03-06 06:43:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_forms`
--
ALTER TABLE `admission_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_experiences`
--
ALTER TABLE `career_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_higher_studies`
--
ALTER TABLE `career_higher_studies`
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
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `page_content`
--
ALTER TABLE `page_content`
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
-- Indexes for table `seo_pages`
--
ALTER TABLE `seo_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- Indexes for table `teaching_process`
--
ALTER TABLE `teaching_process`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_forms`
--
ALTER TABLE `admission_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `career_experiences`
--
ALTER TABLE `career_experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `career_higher_studies`
--
ALTER TABLE `career_higher_studies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page_content`
--
ALTER TABLE `page_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seo_pages`
--
ALTER TABLE `seo_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `teaching_process`
--
ALTER TABLE `teaching_process`
  MODIFY `id` bigint(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
