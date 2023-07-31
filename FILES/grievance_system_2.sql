-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2021 at 10:54 AM
-- Server version: 8.0.21
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
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `message` text NOT NULL,
  `image` text,
  `show_identity` tinyint(1) NOT NULL DEFAULT '0',
  `officer_message` varchar(255) DEFAULT NULL,
  `return_message` varchar(255) DEFAULT NULL,
  `department` tinyint NOT NULL,
  `institute` tinyint NOT NULL,
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
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`) VALUES
(5, 'jessica rothe', 'jess@test.com', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.'),
(3, 'Jane Doe', 'jane@test.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(4, 'John Doe', 'john@test.com', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.'),
(6, 'max Caufield', 'max@test.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(7, 'Anna Fidorov', 'anna@test.com', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?'),
(8, 'Maxime Robertson', 'maxime@test.com', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `departments` varchar(50) NOT NULL,
  `department_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `department_id` (`department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `departments`, `department_id`) VALUES
(1, '	  AERONAUTICAL ENGINEERING', 1),
(2, '	  AUTOMOBILE ENGINEERING', 2),
(3, '	  BIO-MEDICAL ENGINEERING', 3),
(4, 'Information technolodgy', 16);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user-old`
--

DROP TABLE IF EXISTS `user-old`;
CREATE TABLE IF NOT EXISTS `user-old` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `enrollment` bigint DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `role` enum('0','1','2','3','4','5') NOT NULL,
  `profile_pic` varchar(80) NOT NULL,
  `department` int NOT NULL,
  `institute` int NOT NULL,
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
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrollment` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('0','1','2','3','4','5') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '4',
  `department` tinyint DEFAULT NULL,
  `institute` tinyint NOT NULL,
  `profile_pic` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_enrollment_unique` (`enrollment`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `enrollment`, `contact`, `role`, `department`, `institute`, `profile_pic`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Soham patel', 'sohampatel9403@gmail.com', '190280116118', '8320911631', '4', 16, 28, 'images/avtar1.jpg', NULL, '$2y$10$2cfghGrg40grqW2ntiMBq.NiMMaafXKX3SjZAQbnb8/HcJ3nrugk.', 'EyVuPSaoZ3BHtZuRcmrT7Hz9LpFE1T78TuPN3543TMuwyCEZkRP3sxQzCvNW', '2021-07-07 12:30:32', '2021-08-19 07:45:07'),
(2, 'student janvi thakkar', 'janvi@summachar.in', '190280116120', '8320911631', '4', 16, 28, 'images/avtar1.jpg', NULL, '$2y$10$Gxs9esdZsAhovyei6IeMbe6oFBtAVjuLNS4L536oNrU/Pt4Fc7Xim', NULL, '2021-07-23 07:25:44', '2021-07-23 07:25:44'),
(3, 'soham officer', 'soham@summachar.in', '190280116121', '8320911631', '3', NULL, 28, 'images/avtar1.jpg', NULL, '$2y$10$Gxs9esdZsAhovyei6IeMbe6oFBtAVjuLNS4L536oNrU/Pt4Fc7Xim', 'oxu2AntXGOLJmhNdP2gbkdjEsAFq67UhtXw2O2ZvOvo9zO14BfRrnTVXXIHh', '2021-07-07 13:00:47', '2021-07-15 13:00:47'),
(4, 'soham principal', 'sohamprincipal@summachar.in', NULL, '8320911631', '1', NULL, 28, 'images/avtar1.jpg', NULL, '$2y$10$Gxs9esdZsAhovyei6IeMbe6oFBtAVjuLNS4L536oNrU/Pt4Fc7Xim', NULL, '2021-07-07 13:00:47', '2021-07-15 13:00:47'),
(5, 'soham hod', 'sohamhod@gmail.com', NULL, '8320911631', '2', 16, 28, 'images/avtar1.jpg', NULL, '$2y$10$Gxs9esdZsAhovyei6IeMbe6oFBtAVjuLNS4L536oNrU/Pt4Fc7Xim', 'HriQVlezoOzKppWAHpnAwTYIyxTxYURcAQEG9R6xRaxtwX4c3QqvXYKjbdTp', '2021-07-15 13:00:47', '2021-07-15 13:00:47'),
(6, 'admin', 'admin@test.com', NULL, '1234567890', '0', 16, 28, 'images/avtar.jpg', NULL, '$2a$12$WTkMUqEpvIAN3xohuC2zlO0b2ZIA4WapIdUPiVu7aMoBID97ffZUm', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
