-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2019 at 04:43 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearningsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_users`
--

DROP TABLE IF EXISTS `all_users`;
CREATE TABLE IF NOT EXISTS `all_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `UserType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `des` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_lesson_view`
--

DROP TABLE IF EXISTS `child_lesson_view`;
CREATE TABLE IF NOT EXISTS `child_lesson_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_lesson_view`
--

INSERT INTO `child_lesson_view` (`id`, `user_id`, `lesson_id`, `views`, `status`, `created_at`, `updated_at`) VALUES
(1, 24, 23, 11, 1, '2019-06-20 04:59:13', '2019-07-01 11:45:30'),
(2, 24, 19, 3, 1, '2019-06-21 00:06:41', '2019-06-21 00:07:02'),
(3, 26, 19, 5, 1, '2019-06-29 23:52:01', '2019-07-04 10:09:11'),
(4, 24, 25, 3, 1, '2019-06-30 02:00:33', '2019-07-01 11:46:13'),
(5, 26, 24, 1, 1, '2019-07-02 02:53:42', '2019-07-02 04:08:48'),
(6, 26, 24, 0, 1, '2019-07-02 03:52:52', '2019-07-02 03:52:52'),
(7, 28, 24, 3, 1, '2019-07-02 04:51:10', '2019-07-04 09:33:01'),
(8, 28, 19, 7, 1, '2019-07-04 09:32:35', '2019-07-04 10:01:31'),
(9, 26, 23, 2, 1, '2019-07-04 10:09:53', '2019-07-04 10:10:38'),
(10, 24, 24, 1, 1, '2019-07-04 10:18:21', '2019-07-04 10:18:21'),
(11, 26, 26, 0, 1, '2019-07-04 10:32:47', '2019-07-04 10:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `course_users`
--

DROP TABLE IF EXISTS `course_users`;
CREATE TABLE IF NOT EXISTS `course_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_users`
--

INSERT INTO `course_users` (`id`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 23, 24, '2019-06-20 04:50:02', '2019-06-20 04:50:02'),
(2, 25, 24, '2019-06-29 11:08:35', '2019-06-29 11:08:35'),
(3, 23, 26, '2019-07-01 23:28:43', '2019-07-01 23:28:43'),
(4, 24, 26, '2019-07-02 04:08:33', '2019-07-02 04:08:33'),
(5, 24, 28, '2019-07-02 04:50:44', '2019-07-02 04:50:44'),
(6, 24, 24, '2019-07-04 10:17:22', '2019-07-04 10:17:22'),
(7, 26, 26, '2019-07-04 10:32:26', '2019-07-04 10:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

DROP TABLE IF EXISTS `forums`;
CREATE TABLE IF NOT EXISTS `forums` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `url`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Monster truck', 'https://games.cdn.famobi.com/html5games/r/racing-monster-trucks/v250/?fg_domain=play.famobi.com&fg_aid=A1000-1&fg_uid=2eec72ea-c033-4368-a972-8e94d25ce407&fg_pid=4638e320-4444-4514-81c4-d80a8c662371&fg_beat=565&original_ref=https%3A%2F%2Fhtml5games.com%2FGame%2FRacing-Monster-Trucks%2F2eec72ea-c033-4368-a972-8e94d25ce407', 'game-5cadbaf89e85f.jpeg', '2019-04-10 04:14:24', '2019-04-10 04:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) DEFAULT NULL,
  `lesson_type` enum('img','doc','ppt','excel','audio','video','other','pdf') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_category` enum('level_1','level_2','level_3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `reject_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `user_id`, `title`, `description`, `age`, `lesson_type`, `lesson_category`, `file_path`, `rate`, `price`, `views`, `status`, `reject_reason`, `created_at`, `updated_at`) VALUES
(19, 21, 'අ අකුර ලියමු', 'අ අකුර ලියමු. How to write letter \"අ\"', NULL, 'img', 'level_1', './uploads/edu-21/img/img-level_1-5d08734057abd.jpeg', '40', 0, 15, 1, NULL, '2019-06-17 23:44:40', '2019-07-04 10:09:11'),
(20, 21, 'ආ අකුර ලියමු', 'ආ අකුර ලියමු. how to write letter \"ආ\"', NULL, 'img', 'level_1', './uploads/edu-21/img/img-level_1-5d087382c5901.jpeg', '0', 100, 0, 1, NULL, '2019-06-17 23:45:46', '2019-06-18 00:24:13'),
(21, 21, 'මව්බසවිශය නිර්දේශය', 'පළමුවන ශ්‍රේණිය', NULL, 'pdf', 'level_1', './uploads/edu-21/pdf/pdf-level_1-5d087530eeca2.pdf', '0', 1500, 0, 1, NULL, '2019-06-17 23:52:56', '2019-06-18 00:24:18'),
(22, 21, 'සිංහල පාඨමාලාව', 'FSI - Sinhala Basic Course - Module 1 - Student Text', NULL, 'pdf', 'level_3', './uploads/edu-21/pdf/pdf-level_3-5d0877087bb6c.pdf', '0', 2000, 0, 1, NULL, '2019-06-18 00:00:48', '2019-06-18 00:24:21'),
(23, 22, 'සිංහල හෝඩිය 1', 'සිංහල හෝඩිය හඳුනා ගනිමු lesson 1', NULL, 'img', 'level_1', './uploads/edu-22/img/img-level_1-5d087bdca64d4.jpeg', '80', 500, 13, 1, NULL, '2019-06-18 00:21:24', '2019-07-04 10:10:38'),
(24, 22, 'සිංහල හෝඩිය 2', 'සිංහල හෝඩිය හඳුනා ගනිමු lesson 2', NULL, 'img', 'level_1', './uploads/edu-22/img/img-level_1-5d087bf1dfaa9.jpeg', '0', 500, 7, 1, NULL, '2019-06-18 00:21:45', '2019-07-04 10:18:21'),
(25, 22, 'සිංහල හෝඩිය 3', 'සිංහල හෝඩිය හඳුනා ගනිමු lesson 3', NULL, 'img', 'level_1', './uploads/edu-22/img/img-level_1-5d087c0724d7a.jpeg', '0', 500, 3, 1, NULL, '2019-06-18 00:22:07', '2019-07-01 11:46:13'),
(26, 22, 'සිංහල හෝඩිය 4', 'සිංහල හෝඩිය හඳුනා ගනිමු lesson 4', NULL, 'img', 'level_1', './uploads/edu-22/img/img-level_1-5d087c1c88c84.jpeg', '0', 500, 1, 1, NULL, '2019-06-18 00:22:28', '2019-07-04 10:32:47'),
(27, 22, 'සිංහල හෝඩිය 5', 'සිංහල හෝඩිය හඳුනා ගනිමු lesson 5', NULL, 'img', 'level_1', './uploads/edu-22/img/img-level_1-5d087c2fd5025.jpeg', '0', 500, 0, 1, NULL, '2019-06-18 00:22:47', '2019-06-18 00:24:50'),
(30, 21, 'අකුරු මිතුරු 01', 'අකුරු මිතුරු 01', NULL, 'audio', 'level_2', './uploads/edu-21/audio/audio-level_2-5d1c181f8a01a.mpga', '0', 1500, 0, 0, NULL, '2019-07-02 21:21:11', '2019-07-02 21:21:11'),
(31, 21, 'අපේ සිංහල පන්තිය', 'Our Sinhala Class', NULL, 'audio', 'level_3', './uploads/edu-21/audio/audio-level_3-5d1c185fc2989.mp4', '0', 2500, 0, 0, NULL, '2019-07-02 21:22:15', '2019-07-02 21:22:15'),
(32, 22, 'අපේ සිංහල පන්තිය 2', 'අපේ සිංහල පන්තිය 2', NULL, 'video', 'level_1', './uploads/edu-22/video/video-level_1-5d1c1919c2ce6.mp4', '0', 800, 0, 1, NULL, '2019-07-02 21:25:21', '2019-07-02 22:17:45'),
(33, 22, 'අපි සිංහල අකුරු ලියමු', 'How to Write Sinhala Alphabet', NULL, 'video', 'level_2', './uploads/edu-22/video/video-level_2-5d1c196a44a22.mp4', '0', 1100, 0, 0, NULL, '2019-07-02 21:26:42', '2019-07-02 21:26:42'),
(34, 22, 'සිංහල කථා කරමු', 'Learn to speak Sinhala-Video Tutorials-Ep 1', NULL, 'video', 'level_3', './uploads/edu-22/video/video-level_3-5d1c1a4120973.mp4', '0', 1200, 0, 0, NULL, '2019-07-02 21:30:17', '2019-07-02 21:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_questions`
--

DROP TABLE IF EXISTS `lesson_questions`;
CREATE TABLE IF NOT EXISTS `lesson_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) DEFAULT NULL,
  `question_title` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `questions_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer_1` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer_2` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer_3` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer_4` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson_questions`
--

INSERT INTO `lesson_questions` (`id`, `lesson_id`, `question_title`, `questions_description`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 23, '\"අ\" අකුරින් ආරම්භ වන වචනය තෝරන්න.', '\"අ\" අකුරින් ආරම්භ වන වචනය තෝරන්න. select the word, starting form letter \"අ\"', 'මගේ', 'ගස්', 'අම්මා', 'රට', 'answer_3', 'test-5d087ddd1825e.jpeg', 1, '2019-06-18 00:29:57', '2019-06-18 00:29:57'),
(8, 19, '\"අ\" අකුරින් ආරම්භ වන වචනය තෝරන්න.', '\"අ\" අකුරින් ආරම්භ වන වචනය තෝරන්න.', 'අම්මා ', 'පෑන', 'හඳ', 'පොත', 'answer_1', NULL, 1, '2019-07-01 08:36:46', '2019-07-01 08:36:46'),
(9, 24, '\"ආ \" අකුරින් පටන් ගන්නා වචනය කුමක්ද?', '\"ආ \" අකුරින් පටන් ගන්නා වචනය කුමක්ද?', 'වතුර', 'අම්මා', 'ආච්චි', 'මට', 'answer_3', NULL, 1, '2019-07-02 02:46:58', '2019-07-02 02:46:58'),
(10, 24, '\"ආ \" අකුරින් පටන් ගන්නා වචනය කුමක්ද?', '\"ආ \" අකුරින් පටන් ගන්නා වචනය කුමක්ද?', 'ඇබිලිය', 'මුදල්', 'පන්සල', 'ආතා', 'answer_4', NULL, 1, '2019-07-02 02:49:14', '2019-07-02 02:49:14'),
(11, 24, '\"ආ \" අකුරින් පටන් ගන්නා වචනය කුමක්ද?', '\"ආ \" අකුරින් පටන් ගන්නා වචනය කුමක්ද?', 'මාලය', 'ආහාර', 'වළල්ල', 'කඩල', 'answer_2', NULL, 1, '2019-07-02 02:49:56', '2019-07-02 02:49:56'),
(12, 24, '\"ආ \" අකුරින් පටන් ගන්නා වචනය කුමක්ද?', '\"ආ \" අකුරින් පටන් ගන්නා වචනය කුමක්ද?', 'සමනළයා', 'ආදරය', 'මල', 'හාවා', 'answer_2', NULL, 1, '2019-07-02 02:51:05', '2019-07-02 02:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_08_025406_create_all_users_table', 1),
(4, '2018_12_12_162344_create_lessons_table', 2),
(5, '2018_12_12_162555_create_tests_table', 2),
(6, '2018_12_12_162612_create_forums_table', 2),
(7, '2018_12_12_162655_create_questions_table', 2),
(8, '2018_12_12_162832_create_answers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL COMMENT 'course ID',
  `customer_id` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `card_name` varchar(100) DEFAULT NULL,
  `card_last_digit` varchar(100) DEFAULT NULL,
  `total_amount` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `bill_id`, `customer_id`, `payment_method`, `card_name`, `card_last_digit`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 23, 23, 'Visa', 'Buddika', '4242', 500, 1, '2019-06-20 04:50:02', '2019-06-20 04:50:02'),
(2, 25, 23, 'Visa', 'buddika', '4242', 500, 1, '2019-06-20 11:08:35', '2019-06-29 11:08:35'),
(3, 23, 23, 'Visa', 'buddika', '4242', 500, 1, '2019-07-01 23:28:43', '2019-07-01 23:28:43'),
(4, 24, 23, 'Visa', 'buddika', '4242', 500, 1, '2019-07-02 04:08:33', '2019-07-02 04:08:33'),
(5, 24, 27, 'Visa', 'kasun', '4242', 500, 1, '2019-07-02 04:50:44', '2019-07-02 04:50:44'),
(6, 24, 23, 'Visa', 'buddika', '4242', 500, 1, '2019-07-04 10:17:21', '2019-07-04 10:17:21'),
(7, 26, 23, 'Visa', 'buddika', '4242', 500, 1, '2019-07-04 10:32:26', '2019-07-04 10:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `payment_educators`
--

DROP TABLE IF EXISTS `payment_educators`;
CREATE TABLE IF NOT EXISTS `payment_educators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `paid_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_title` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `questions_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer_1` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer_2` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer_3` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer_4` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_title`, `questions_description`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `image`, `status`, `created_at`, `updated_at`) VALUES
(9, 'රූපයට  අදාළ  වචනය තෝරන්න', '(Select the word for the image)', 'මාලය', 'කරබුව', 'වළල්ල', 'මුදුව', 'answer_1', 'que-5ce25e3b39c9e.jpeg', 1, '2019-05-20 02:28:51', '2019-05-20 02:28:51'),
(10, 'රූපයට  අදාළ  වචනය තෝරන්න', '(Select the word for the image)', 'කන', 'අත', 'ඇස', 'නහය', 'answer_4', 'que-5ce25e8fc2026.jpeg', 1, '2019-05-20 02:30:15', '2019-05-20 02:30:15'),
(11, 'රූපයට  අදාළ  වචනය තෝරන්න', '(Select the word for the image)', 'අලියා', 'තාරාවා', 'කොටියා', 'සමනලයා', 'answer_2', 'que-5ce25ed45cc10.jpeg', 1, '2019-05-20 02:31:24', '2019-05-20 02:31:24'),
(12, 'රූපයට  අදාළ  වචනය තෝරන්න', '(Select the word for the image)', 'රට', 'ගඟ', 'කන්ද', 'මුහුද', 'answer_3', 'que-5ce25f0cf1820.jpeg', 1, '2019-05-20 02:32:21', '2019-05-20 02:32:21'),
(13, 'රූපයට  අදාළ  වචනය තෝරන්න', '(Select the word for the image)', 'ගස්', 'ගල්', 'මුවා', 'පලතුරු', 'answer_1', 'que-5ce25fc5cf22f.jpeg', 1, '2019-05-20 02:35:25', '2019-05-20 02:35:25'),
(14, 'හිස් තැනට සුදුසු අකුර තෝරන්න. (Select the appropriate letter to the blanks)', 'ද …', 'ද', 'ය', 'න්', 'ත්', 'answer_4', 'que-5ce260a191700.jpeg', 1, '2019-05-20 02:39:05', '2019-05-20 02:39:05'),
(15, 'හිස් තැනට සුදුසු අකුර තෝරන්න. (Select the appropriate letter to the blanks)', 'ඉ … ල', 'ද', 'ය', 'න්', 'ප', 'answer_1', 'que-5ce2615e9b055.jpeg', 1, '2019-05-20 02:42:14', '2019-05-20 02:42:14'),
(16, 'හිස් තැනට සුදුසු අකුර තෝරන්න. (Select the appropriate letter to the blanks)', 'ක…', 'ද', 'ය', 'න්', 'ප', 'answer_3', 'que-5ce26f750ae8a.jpeg', 1, '2019-05-20 03:42:21', '2019-05-20 03:42:21'),
(17, 'හිස් තැනට සුදුසු අකුර තෝරන්න. (Select the appropriate letter to the blanks)', 'ආ….ප', 'ද', 'ය', 'න්', 'ප්', 'answer_4', 'que-5ce26fb147bb6.jpeg', 1, '2019-05-20 03:43:21', '2019-05-20 03:43:21'),
(18, 'හිස් තැනට සුදුසු අකුර තෝරන්න. (Select the appropriate letter to the blanks)', 'කළ…', 'ද', 'ය', 'න්', 'ර', 'answer_2', 'que-5ce26fd994413.jpeg', 1, '2019-05-20 03:44:01', '2019-05-20 03:44:01'),
(19, 'දී  ඇති වචනයට සමාන වචනය තෝරන්න .', 'දහය', 'දහය', 'වම', 'තාත්තා', 'ටකය', 'answer_1', 'que-5ce2707477c70.jpeg', 1, '2019-05-20 03:46:36', '2019-05-20 03:46:36'),
(20, 'හිස් තැනට සුදුසු අකුර තෝරන්න. (Select the appropriate letter to the blanks)', 'වම', 'දහය', 'වම', 'තාත්තා', 'ටකය', 'answer_2', 'que-5ce270f0bc6e8.png', 1, '2019-05-20 03:48:40', '2019-05-20 03:48:40'),
(21, 'දී  ඇති වචනයට සමාන වචනය තෝරන්න .', 'පාලම', 'වම', 'තාත්තා', 'පාලම', 'ටකය', 'answer_3', 'que-5ce27186d999e.jpeg', 1, '2019-05-20 03:51:10', '2019-05-20 03:51:10'),
(22, 'දී  ඇති වචනයට සමාන වචනය තෝරන්න .', 'තාත්තා', 'ටකය', 'වම', 'පාලම', 'තාත්තා', 'answer_4', 'que-5ce27af71e67c.png', 1, '2019-05-20 04:31:27', '2019-05-20 04:31:27'),
(23, 'දී  ඇති වචනයට සමාන වචනය තෝරන්න .', 'ටකය', 'තාත්තා', 'වම', 'ටකය', 'දහය', 'answer_3', 'que-5ce27b66a306e.jpeg', 1, '2019-05-20 04:33:18', '2019-05-20 04:33:18'),
(24, 'උස්පිල්ලම  හා  උදුපිල්ලම ඇති වචනය  (හල් කිරීම ) තෝරන්න.', 'උස්පිල්ලම  හා  උදුපිල්ලම ඇති වචනය  (හල් කිරීම ) තෝරන්න .', 'පාසල', 'වට්ටක්කා', 'ඉබ්බා', 'තාරාවා', 'answer_2', NULL, 1, '2019-07-01 23:01:11', '2019-07-01 23:01:11'),
(25, 'උස්පිල්ලම හා උදුපිල්ලම ඇති වචනය (හල් කිරීම ) තෝරන්න.', 'උස්පිල්ලම හා උදුපිල්ලම ඇති වචනය (හල් කිරීම ) තෝරන්න.', 'පන්සල', 'පාලම', 'අම්මා', 'බසය', 'answer_1', NULL, 1, '2019-07-01 23:02:31', '2019-07-01 23:02:31'),
(27, 'රූපයට ගැලපෙන වැකිය තෝරන්න', 'රූපයට ගැලපෙන වැකිය තෝරන්න', 'නංගී අතුගානවා', 'නංගී මල් කඩනවා', 'නංගී වතුර ගේනවා', 'නංගී පාඩම් කරනවා', 'answer_2', 'que-5d1adf0c12642.jpeg', 1, '2019-07-01 23:05:24', '2019-07-01 23:05:24'),
(28, 'රූපයට ගැලපෙන වැකිය තෝරන්න', 'රූපයට ගැලපෙන වැකිය තෝරන්න', 'හරකා ගස උඩ', 'හරකා ගස යට', 'හරකා කෑ ගසනවා', 'හරකා ගසට නගිනවා', 'answer_2', 'que-5d1adf70d5e82.jpeg', 1, '2019-07-01 23:07:04', '2019-07-01 23:07:04'),
(29, 'රූපයට ගැලපෙන වැකිය තෝරන්න', 'රූපයට ගැලපෙන වැකිය තෝරන්න', 'හඳ පායලා', 'ඉර පායලා', 'තරු දිලිසෙනවා', 'වලාකුළු පායලා', 'answer_1', 'que-5d1adfa37a076.png', 1, '2019-07-01 23:07:55', '2019-07-01 23:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `rate_educators`
--

DROP TABLE IF EXISTS `rate_educators`;
CREATE TABLE IF NOT EXISTS `rate_educators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `educator_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_educators`
--

INSERT INTO `rate_educators` (`id`, `educator_id`, `user_id`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 22, 24, 100, 1, '2019-06-20 05:04:54', '2019-06-20 05:04:54'),
(2, 22, 23, 40, 1, '2019-06-20 23:33:36', '2019-06-20 23:33:36'),
(3, 21, 24, 60, 1, '2019-06-21 00:06:58', '2019-06-21 00:06:58'),
(4, 21, 23, 60, 1, '2019-07-02 04:11:49', '2019-07-02 04:11:49'),
(5, 22, 28, 80, 1, '2019-07-02 04:51:14', '2019-07-02 04:51:14'),
(6, 21, 28, 80, 1, '2019-07-04 09:57:54', '2019-07-04 09:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `rate_lessons`
--

DROP TABLE IF EXISTS `rate_lessons`;
CREATE TABLE IF NOT EXISTS `rate_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_lessons`
--

INSERT INTO `rate_lessons` (`id`, `lesson_id`, `user_id`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 23, 24, 80, 1, '2019-06-20 05:05:03', '2019-06-20 05:05:03'),
(2, 19, 24, 40, 1, '2019-06-21 00:06:48', '2019-06-21 00:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `requested_lessions`
--

DROP TABLE IF EXISTS `requested_lessions`;
CREATE TABLE IF NOT EXISTS `requested_lessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `is_read` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requested_lessions`
--

INSERT INTO `requested_lessions` (`id`, `lesson_id`, `child_id`, `parent_id`, `amount`, `status`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 23, 24, 23, 500, 0, 1, '2019-06-20 04:43:38', '2019-07-04 10:18:12'),
(2, 25, 24, 23, 500, 0, 1, '2019-06-29 11:06:12', '2019-07-04 10:18:12'),
(3, 23, 26, 23, 500, 0, 1, '2019-06-29 23:57:37', '2019-07-04 10:10:29'),
(5, 24, 26, 23, 500, 0, 1, '2019-07-02 04:05:59', '2019-07-04 10:10:29'),
(6, 24, 28, 27, 500, 0, 1, '2019-07-02 04:49:46', '2019-07-04 09:58:19'),
(7, 27, 26, 23, 500, 1, 0, '2019-07-04 10:10:29', '2019-07-04 10:10:29'),
(8, 24, 24, 23, 500, 0, 1, '2019-07-04 10:16:40', '2019-07-04 10:18:12'),
(9, 26, 26, 23, 500, 0, 0, '2019-07-04 10:31:35', '2019-07-04 10:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `suggested_lessons`
--

DROP TABLE IF EXISTS `suggested_lessons`;
CREATE TABLE IF NOT EXISTS `suggested_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggested_lessons`
--

INSERT INTO `suggested_lessons` (`id`, `lesson_id`, `child_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 24, 26, 1, '2019-07-02 02:53:19', '2019-07-04 10:18:21'),
(2, 26, 26, 1, '2019-07-04 10:31:35', '2019-07-04 10:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `des` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_regster_type` enum('parent','educator','admin','child') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'parent',
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_qualifications` text COLLATE utf8mb4_unicode_ci,
  `certificates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` double NOT NULL DEFAULT '0',
  `dob` date DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `rate` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `is_completed` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `name`, `email`, `phone`, `password`, `remember_token`, `user_regster_type`, `gender`, `occupation`, `education_qualifications`, `certificates`, `score`, `dob`, `parent_id`, `rate`, `level`, `is_completed`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Admin', 'admin@gmail.com', NULL, '$2y$10$q0sxwKDs..9rXu/B46tI/.ouwExcMlV73aSx5Mc3/FbmW6Q29.Xn2', 'jiv7Cg5tiZSCeyc2gEp5BowbmeSQ1q93MGR7XxBZ8bdOZfymJ4BkdeG65KZZ', 'admin', NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, '2019-01-05 12:20:27', '2019-01-05 12:20:27'),
(21, NULL, 'Lakmali_educator', 'Lakmali@gmail.com', '0718463494', '$2y$10$6bqp2DeVpmwh9Le/nlgtae6SbNRdKN5mr/I9Gs5W3.Li/NPmdndEG', 'I9C7jXpaTtDFYodxoGpZ7YKYNqhB1n2ap930FtBo2i9YGr8nVXgWiu8fPa5K', 'educator', 'male', NULL, 'M.Sc in IT.', NULL, 0, NULL, NULL, 70, 0, 0, 1, '2019-06-17 23:11:47', '2019-07-04 09:57:54'),
(22, NULL, 'Hasani_educator', 'hasani@gmail.com', '0718463494', '$2y$10$H97ymd46nfjM6RRJQMEyAOv6kG7CX7y99si2jTbsxc5kHSEdcHpni', 'ns1zxo9zo7FdQK0Q5iuCX4gAJBEwPEIngkvjnR0EYht8ENOx2NOX0vBjNbl9', 'educator', 'male', NULL, 'B.Sc (IT)', NULL, 0, NULL, NULL, 75, 0, 0, 1, '2019-06-18 00:18:11', '2019-07-02 04:51:14'),
(23, NULL, 'Buddika_Parent', 'Buddika@gmail.com', '0718463494', '$2y$10$dhVSbaPz84ntlFXjRXct9OMM1nhWXzFrUl8IXCrVPpX.TeNGFu8Vq', 'atsjEaYtKWoAnFZcBaf8D6D1D3oBlaYdJx98wfwMx8SlIqesZ5Xcoeay0mAB', 'parent', 'male', NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, '2019-06-20 03:00:21', '2019-06-20 03:00:21'),
(24, NULL, 'Danushi_child', 'danushi@gmail.com', NULL, '$2y$10$rurSSlJAMH0UVg2PUG96Kuj91njO2kmPiqCLF3V6m3zwcIRXMNcym', 'mNq9j0vSFgGgRKZCw18OJZDzpFaxW1KsK6Adh5Awvc1F97OMkRCiNfS1N9Fe', 'child', NULL, NULL, NULL, NULL, 3.4000000000000004, '1998-04-25', 23, 0, 1, 1, 0, '2019-06-20 03:17:54', '2019-07-04 10:18:39'),
(25, NULL, 'Viduka_child', 'viduka@gmail.com', NULL, '$2y$10$7sB/H9owA3DM0Gl0vsesb.f5QX7q74wzikiiUd1EnxSgLLo3BFmRe', 'ndVsNLv4p0gwRKTfqCCKEoYVYWLRcKGpt8HAkh64hB2hvaDu04Uc8iAEGJjO', 'child', NULL, NULL, NULL, NULL, 6, '2001-07-10', 23, 0, 2, 1, 0, '2019-06-20 03:19:58', '2019-06-21 00:33:03'),
(26, NULL, 'Kalani_child', 'kalani@gmail.com', NULL, '$2y$10$eRakMaUOgbWt4uXqd54oUeqsbEVzBsqx1CokUcIpoYQjtIULG.Y96', 'YQJsD03V0o2187HqsnWY5PVtkLnlKS9FexvpGI3u5SBsj2uWvNz1GJHd1ztG', 'child', NULL, NULL, NULL, NULL, 14.5, '2003-05-05', 23, 0, 3, 1, 0, '2019-06-20 03:20:49', '2019-07-04 10:10:54'),
(27, 'Mr.', 'Kasun_parent', 'Kasun@gmail.com', '0773320820', '$2y$10$aqYgc6mmr/u.Ck6wwcIIHOfeP1b9WroqwosVGp7UW9ovbNlV1mV2O', 'x3aO9Cf8VYU7ESp8ajU5OAfq8mVQfXXl2O173HPwgIX2wYKXE75O8wZpdrIz', 'parent', 'male', 'Doctor', NULL, '', 0, NULL, NULL, 0, 0, 0, 0, '2019-07-02 04:38:10', '2019-07-02 04:38:10'),
(28, NULL, 'Ayesh_Child', 'ayesh@gmail.com', NULL, '$2y$10$Nu2HWre29MIz3GwIcdTW1.yDnsoJddQdAwDlDk7cA4g8HH6KfyoU6', 'w2eRQIUA3ab85mSdE3vton7akbCZQ7vc26sbVA6WGDiafJkdWXSPGXaCTTI6', 'child', NULL, NULL, NULL, NULL, 1.9, '2012-01-31', 27, 0, 1, 1, 0, '2019-07-02 04:45:47', '2019-07-04 10:01:38'),
(29, NULL, 'nipuna_child', 'nipuna@gmail.com', NULL, '$2y$10$xfaViYy1RQtXDkDZExKnJOtRyQUothwN6yTWpv5MkbADqecYS9VNq', 'iRLzScJzpwCPw3RyA3MSGum20KiwNLZKG58FOtskXTUtGV9smhNNYOYogW0J', 'child', NULL, NULL, NULL, NULL, 0, '2001-10-04', 27, 0, 0, 0, 0, '2019-07-04 10:35:55', '2019-07-04 10:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_lesson_mark`
--

DROP TABLE IF EXISTS `user_lesson_mark`;
CREATE TABLE IF NOT EXISTS `user_lesson_mark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `mark` int(11) DEFAULT NULL,
  `lesson_paper` varchar(1000) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_lesson_mark`
--

INSERT INTO `user_lesson_mark` (`id`, `user_id`, `lesson_id`, `mark`, `lesson_paper`, `status`) VALUES
(1, 24, 23, 0, '[{\"question_id\":\"7\",\"answer\":\"answer_1\",\"is_correct\":\"wrong\"}]', 1),
(2, 26, 24, 3, '[{\"question_id\":\"9\",\"answer\":\"answer_3\",\"is_correct\":\"correct\"},{\"question_id\":\"12\",\"answer\":\"answer_3\",\"is_correct\":\"wrong\"},{\"question_id\":\"11\",\"answer\":\"answer_2\",\"is_correct\":\"correct\"},{\"question_id\":\"10\",\"answer\":\"answer_4\",\"is_correct\":\"correct\"}]', 1),
(3, 28, 24, 4, '[{\"question_id\":\"9\",\"answer\":\"answer_3\",\"is_correct\":\"correct\"},{\"question_id\":\"10\",\"answer\":\"answer_4\",\"is_correct\":\"correct\"},{\"question_id\":\"11\",\"answer\":\"answer_2\",\"is_correct\":\"correct\"},{\"question_id\":\"12\",\"answer\":\"answer_2\",\"is_correct\":\"correct\"}]', 1),
(4, 28, 19, 1, '[{\"question_id\":\"8\",\"answer\":\"answer_1\",\"is_correct\":\"correct\"}]', 1),
(5, 26, 19, 1, '[{\"question_id\":\"8\",\"answer\":\"answer_1\",\"is_correct\":\"correct\"}]', 1),
(6, 26, 23, 1, '[{\"question_id\":\"7\",\"answer\":\"answer_3\",\"is_correct\":\"correct\"}]', 1),
(7, 24, 24, 2, '[{\"question_id\":\"10\",\"answer\":\"answer_3\",\"is_correct\":\"wrong\"},{\"question_id\":\"9\",\"answer\":\"answer_3\",\"is_correct\":\"correct\"},{\"question_id\":\"12\",\"answer\":\"answer_2\",\"is_correct\":\"correct\"},{\"question_id\":\"11\",\"answer\":\"answer_3\",\"is_correct\":\"wrong\"}]', 1),
(8, 24, 24, 2, '[{\"question_id\":\"10\",\"answer\":\"answer_3\",\"is_correct\":\"wrong\"},{\"question_id\":\"9\",\"answer\":\"answer_3\",\"is_correct\":\"correct\"},{\"question_id\":\"12\",\"answer\":\"answer_2\",\"is_correct\":\"correct\"},{\"question_id\":\"11\",\"answer\":\"answer_3\",\"is_correct\":\"wrong\"}]', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
