-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 01, 2021 at 05:28 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grievance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

DROP TABLE IF EXISTS `complains`;
CREATE TABLE IF NOT EXISTS `complains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `image` text,
  `show_identity` tinyint(1) NOT NULL DEFAULT '0',
  `officer_message` varchar(255) DEFAULT NULL,
  `return_message` varchar(255) DEFAULT NULL,
  `department` tinyint(4) NOT NULL,
  `institute` tinyint(4) NOT NULL,
  `status` enum('-1','0','1','2','3','4') NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `user_id`, `message`, `image`, `show_identity`, `officer_message`, `return_message`, `department`, `institute`, `status`, `updated_at`, `created_at`) VALUES
(1, 1, 'first request', 'grieavance_img11626622868.docx', 1, 'testing succesful', 'testing succesful', 16, 28, '-1', '2021-07-18 15:41:08', '2021-07-18 15:41:08'),
(2, 1, 'second request', 'grieavance_img11626622877.docx', 1, '<p>your request is being approved</p><p>&nbsp;</p>', '<p>sssss</p>', 16, 28, '-1', '2021-07-18 15:41:18', '2021-07-18 15:41:18'),
(3, 1, 'third request', 'grieavance_img11626622887.docx', 1, '<p>declained bcz of ur prblm</p>', NULL, 16, 28, '0', '2021-07-18 15:41:27', '2021-07-19 15:41:27'),
(4, 2, '4th request', 'grieavance_img11626622897.docx', 0, '<p>asdasd</p>', NULL, 16, 28, '0', '2021-07-18 15:41:37', '2021-07-20 15:41:37'),
(5, 1, 'hvj', NULL, 0, NULL, '<p>heello</p><ul><li>&nbsp;your mail is generated i will adding it in progress stay halth&nbsp;</li></ul><p><i><strong>by your HOD</strong></i></p>', 16, 28, '3', '2021-08-27 11:40:05', '2021-08-27 11:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL,
  `department_id` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `department_id` (`department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_id`) VALUES
(1, '	  AERONAUTICAL ENGINEERING', 1),
(2, '	  AUTOMOBILE ENGINEERING', 2),
(3, '	  BIO-MEDICAL ENGINEERING', 3),
(4, 'Information technolodgy', 16);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user-old`
--

DROP TABLE IF EXISTS `user-old`;
CREATE TABLE IF NOT EXISTS `user-old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `enrollment` bigint(12) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `role` enum('0','1','2','3','4','5') NOT NULL,
  `profile_pic` varchar(80) NOT NULL,
  `department` int(2) NOT NULL,
  `institute` int(3) NOT NULL,
  `password` text NOT NULL,
  `is_logged_in` tinyint(1) NOT NULL,
  `last_loggin` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `enrollment` (`enrollment`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrollment` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('0','1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '4',
  `department` tinyint(4) DEFAULT NULL,
  `institute` tinyint(4) NOT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_enrollment_unique` (`enrollment`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `enrollment`, `contact`, `role`, `department`, `institute`, `profile_pic`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Soham patel', 'sohampatel9403@gmail.com', '190280116118', '8320911631', '4', 16, 28, 'images/avtar1.jpg', NULL, '$2y$10$2cfghGrg40grqW2ntiMBq.NiMMaafXKX3SjZAQbnb8/HcJ3nrugk.', 'EyVuPSaoZ3BHtZuRcmrT7Hz9LpFE1T78TuPN3543TMuwyCEZkRP3sxQzCvNW', '2021-07-07 12:30:32', '2021-08-19 07:45:07'),
(2, 'student janvi thakkar', 'janvi@summachar.in', '190280116120', '8320911631', '4', 16, 28, 'images/avtar1.jpg', NULL, '$2y$10$Gxs9esdZsAhovyei6IeMbe6oFBtAVjuLNS4L536oNrU/Pt4Fc7Xim', NULL, '2021-07-23 07:25:44', '2021-07-23 07:25:44'),
(3, 'soham officer', 'soham@summachar.in', '190280116121', '8320911631', '3', NULL, 28, 'images/avtar1.jpg', NULL, '$2y$10$Gxs9esdZsAhovyei6IeMbe6oFBtAVjuLNS4L536oNrU/Pt4Fc7Xim', 'GQpxObG5VBamQ2QJloWIN4QPEyKPX3Hj9FLyixQkE517W6aMIaRx206WLJ07', '2021-07-07 13:00:47', '2021-07-15 13:00:47'),
(4, 'soham principal', 'sohamprincipal@summachar.in', NULL, '8320911631', '1', NULL, 28, 'images/avtar1.jpg', NULL, '$2y$10$Gxs9esdZsAhovyei6IeMbe6oFBtAVjuLNS4L536oNrU/Pt4Fc7Xim', NULL, '2021-07-07 13:00:47', '2021-07-15 13:00:47'),
(5, 'soham hod', 'sohamhod@gmail.com', NULL, '8320911631', '2', 16, 28, 'images/avtar1.jpg', NULL, '$2y$10$Gxs9esdZsAhovyei6IeMbe6oFBtAVjuLNS4L536oNrU/Pt4Fc7Xim', 'HriQVlezoOzKppWAHpnAwTYIyxTxYURcAQEG9R6xRaxtwX4c3QqvXYKjbdTp', '2021-07-15 13:00:47', '2021-07-15 13:00:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
