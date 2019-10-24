-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2019 at 01:35 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

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

CREATE TABLE `all_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `UserType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `des` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_users`
--

CREATE TABLE `course_users` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_users`
--

INSERT INTO `course_users` (`id`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 13, 11, '2019-04-05 11:32:53', '2019-04-05 05:56:15'),
(2, 13, 12, '2019-04-05 11:32:53', '2019-04-05 05:56:15'),
(3, 6, 12, '2019-05-02 04:53:19', '2019-05-02 04:53:19'),
(4, 6, 12, '2019-05-02 05:02:08', '2019-05-02 05:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `url`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Monster truck', 'https://games.cdn.famobi.com/html5games/r/racing-monster-trucks/v250/?fg_domain=play.famobi.com&fg_aid=A1000-1&fg_uid=2eec72ea-c033-4368-a972-8e94d25ce407&fg_pid=4638e320-4444-4514-81c4-d80a8c662371&fg_beat=565&original_ref=https%3A%2F%2Fhtml5games.com%2FGame%2FRacing-Monster-Trucks%2F2eec72ea-c033-4368-a972-8e94d25ce407', 'game-5cadbaf89e85f.jpeg', '2019-04-10 04:14:24', '2019-04-10 04:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `user_id`, `title`, `description`, `age`, `lesson_type`, `lesson_category`, `file_path`, `rate`, `price`, `views`, `status`, `reject_reason`, `created_at`, `updated_at`) VALUES
(5, 4, 'L 3', 'dsfsd sfsdf sfsdf sf sdfdf', 5, 'img', 'level_3', './uploads/edu-4/img/img-level_2-5c851eac21252.jpeg', '75', 0, 3, 1, NULL, '2019-03-10 08:56:52', '2019-04-10 05:07:21'),
(6, 4, 'l2', 'fsdfsdf', 7, 'pdf', 'level_2', './uploads/edu-4/pdf/pdf-level_2-5c851ef707531.pdf', '69', 1000, 46, 1, NULL, '2019-03-10 08:58:07', '2019-06-13 05:00:16'),
(9, 4, 'sdsdsddsdsd', 'dsdsdsdsd', 8, 'doc', 'level_1', './uploads/edu-4/doc/doc-level_2-5c85372f12ec3.docx', '0', 0, 15, 1, NULL, '2019-03-10 10:41:27', '2019-03-12 06:12:26'),
(10, 4, 'sdsdsdsdsd', 'sdsdsdsdsdsd', 8, 'video', 'level_2', './uploads/edu-4/video/video-level_3-5c853968385ba.mp4', '0', 2000, 0, 1, NULL, '2019-03-10 10:50:56', '2019-03-10 10:50:56'),
(11, 4, 'L 2', 'dddddd', 8, 'audio', 'level_2', './uploads/edu-4/audio/audio-level_2-5c85399a843ca.mpga', '80', 0, 3, 1, NULL, '2019-03-10 10:51:46', '2019-06-12 05:22:59'),
(12, 4, 'asdads', 'dsadadasd', 8, 'img', 'level_1', './uploads/edu-4/img/img-level_1-5c879bccb3c51.png', '0', 0, 2, -1, 'sasasasasa', '2019-03-12 06:15:16', '2019-04-30 02:21:46'),
(13, 4, 'l3', 'assasa', NULL, 'img', 'level_3', './uploads/edu-4/img/img-level_1-5ca6de83c3d23.png', '0', 100, 6, 1, NULL, '2019-04-04 23:20:11', '2019-04-05 06:28:05'),
(14, 4, 'sasa', 'asasa', NULL, 'doc', 'level_1', './uploads/edu-4/doc/doc-level_1-5cc7e45e40dca.jpeg', '0', 0, 0, -1, NULL, '2019-04-30 00:29:58', '2019-04-30 00:55:26'),
(15, 6, 'less 01', 'scscass', NULL, 'img', 'level_2', './uploads/edu-6/img/img-level_1-5d00dbc4d9f9f.png', '80', 0, 32, 1, NULL, '2019-06-12 05:32:28', '2019-06-13 05:42:51'),
(16, 6, 'less 02', 'scscass', NULL, 'img', 'level_2', './uploads/edu-6/img/img-level_1-5d00dbc4d9f9f.png', '0', 0, 2, 1, NULL, '2019-06-12 05:32:28', '2019-06-13 05:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_questions`
--

CREATE TABLE `lesson_questions` (
  `id` int(11) NOT NULL,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson_questions`
--

INSERT INTO `lesson_questions` (`id`, `lesson_id`, `question_title`, `questions_description`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 15, 'saveLessionTest', 'saveLessionTest', '1111111111111', '222222222222222', '33333333333', '444444444444444', 'answer_1', 'test-5d00e05ca734a.png', 1, '2019-06-12 05:52:04', '2019-06-12 05:52:04');

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

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL COMMENT 'course ID',
  `customer_id` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `card_name` varchar(100) DEFAULT NULL,
  `card_last_digit` varchar(100) DEFAULT NULL,
  `total_amount` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `bill_id`, `customer_id`, `payment_method`, `card_name`, `card_last_digit`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(3, 13, 11, 'Visa', 'salinda', '4242', 100, 0, '2019-04-05 05:54:45', '2019-04-30 05:58:10'),
(4, 13, 11, 'Visa', 'salinda', '4242', 100, 0, '2019-04-05 05:55:24', '2019-04-30 05:58:10'),
(5, 13, 11, 'Visa', 'salinda', '4242', 100, 0, '2019-04-05 05:56:15', '2019-04-30 05:58:10'),
(6, 13, 12, 'Visa', 'salinda', '4242', 100, 1, '2019-04-05 05:56:15', '2019-04-05 05:56:15'),
(7, 6, 5, 'Visa', 'salinda', '4242', 1000, 1, '2019-05-02 04:53:19', '2019-05-02 04:53:19'),
(8, 6, 5, 'Visa', 'salinda', '4242', 1000, 1, '2019-05-02 05:02:08', '2019-05-02 05:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `payment_educators`
--

CREATE TABLE `payment_educators` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `paid_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_educators`
--

INSERT INTO `payment_educators` (`id`, `user_id`, `payment`, `paid_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 180, 2, 1, '2019-04-30 05:58:10', '2019-04-30 05:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_title`, `questions_description`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'The Maratha and The Kesri were the two main newspapers started by', 'The Maratha and The Kesri were the two main newspapers started by', 'Lala Lajpat Rai', 'Gopal Krishna Gokhale', 'Bal Gangadhar Tilak', 'Madan Mohan Malviya', 'answer_1', NULL, 1, '2019-03-11 04:22:00', '2019-04-05 03:18:07'),
(3, 'Which of the following personalities is considered to be the originator of Sankhya philosophy?', 'Which of the following personalities is considered to be the originator of Sankhya philosophy?', 'Bharat Muni', 'Kapil Muni', 'Adi Shankaracharya', 'Agastya Rishi', 'answer_3', NULL, 1, '2019-03-11 04:24:50', '0000-00-00 00:00:00'),
(4, 'qqqqqqqq', 'dddddddd', '111111111111', '122222222222222', '333333333333', '444444444444', 'answer_2', NULL, 1, '2019-04-05 00:22:18', '2019-04-05 00:22:18'),
(5, 'sss', 'qqqqqqqqqqqqq', '111111111111', '122222222222222', '333333333333', '444444444444', 'answer_1', NULL, 1, '2019-04-05 00:31:49', '2019-04-05 00:31:49'),
(6, 'sssss', 'sssssss', '111111111111', '122222222222222', '333333333333', '444444444444', 'answer_3', 'que-5ca6efca44ab3.png', 1, '2019-04-05 00:33:54', '2019-04-05 00:33:54'),
(7, 'assssssssssssasasasa', 'sasasasa', '1111111111111', '222222222222222', '33333333333', '444444444444444', 'answer_1', 'que-5d00dfdee994e.png', 1, '2019-06-12 05:49:58', '2019-06-12 05:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `rate_educators`
--

CREATE TABLE `rate_educators` (
  `id` int(11) NOT NULL,
  `educator_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_educators`
--

INSERT INTO `rate_educators` (`id`, `educator_id`, `user_id`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 16, 12, 60, 1, '2019-05-02 01:13:38', '2019-05-02 01:13:38'),
(2, 4, 12, 100, 1, '2019-05-02 01:51:54', '2019-05-02 01:51:54'),
(3, 4, 5, 40, 1, '2019-05-02 01:53:08', '2019-05-02 01:53:08'),
(4, 4, 5, 80, 1, '2019-05-02 01:54:21', '2019-05-02 01:54:21'),
(5, 6, 12, 60, 1, '2019-05-03 00:15:26', '2019-05-03 00:15:26'),
(6, 6, 12, 100, 1, '2019-05-03 00:18:14', '2019-05-03 00:18:14'),
(7, 6, 12, 80, 1, '2019-05-03 00:18:49', '2019-05-03 00:18:49'),
(8, 6, 12, 100, 1, '2019-05-03 00:57:45', '2019-05-03 00:57:45'),
(9, 6, 12, 80, 1, '2019-05-03 00:57:59', '2019-05-03 00:57:59'),
(10, 4, 12, 20, 1, '2019-05-03 01:10:07', '2019-05-03 01:10:07'),
(11, 4, 12, 100, 1, '2019-05-03 01:18:29', '2019-05-03 01:18:29'),
(12, 4, 12, 60, 1, '2019-06-12 05:22:56', '2019-06-12 05:22:56'),
(13, 6, 12, 100, 1, '2019-06-13 05:27:43', '2019-06-13 05:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `rate_lessons`
--

CREATE TABLE `rate_lessons` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_lessons`
--

INSERT INTO `rate_lessons` (`id`, `lesson_id`, `user_id`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 12, 80, 1, '2019-05-03 01:13:44', '2019-05-03 01:13:44'),
(2, 6, 12, 100, 1, '2019-05-03 01:15:10', '2019-05-03 01:15:10'),
(3, 6, 12, 60, 1, '2019-05-03 01:18:21', '2019-05-03 01:18:21'),
(4, 11, 12, 80, 1, '2019-06-12 05:22:43', '2019-06-12 05:22:43'),
(5, 15, 12, 80, 1, '2019-06-13 05:27:35', '2019-06-13 05:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `requested_lessions`
--

CREATE TABLE `requested_lessions` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `is_read` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requested_lessions`
--

INSERT INTO `requested_lessions` (`id`, `lesson_id`, `child_id`, `parent_id`, `amount`, `status`, `is_read`, `created_at`, `updated_at`) VALUES
(2, 6, 12, 5, 1000, 0, 1, '2019-05-02 04:13:37', '2019-06-13 05:51:30'),
(3, 10, 12, 3, 2000, 1, 0, '2019-06-12 04:52:58', '2019-06-12 04:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `suggested_lessons`
--

CREATE TABLE `suggested_lessons` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggested_lessons`
--

INSERT INTO `suggested_lessons` (`id`, `lesson_id`, `child_id`, `created_at`, `updated_at`) VALUES
(1, 5, 14, '2019-04-30 07:37:25', '2019-04-30 07:37:25'),
(2, 6, 12, '2019-05-02 00:59:48', '2019-05-02 00:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `des` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_regster_type` enum('parent','educator','admin','child') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'parent',
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_qualifications` text COLLATE utf8mb4_unicode_ci,
  `score` int(11) NOT NULL DEFAULT '0',
  `dob` date DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `rate` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `is_completed` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `remember_token`, `user_regster_type`, `gender`, `education_qualifications`, `score`, `dob`, `parent_id`, `rate`, `level`, `is_completed`, `status`, `created_at`, `updated_at`) VALUES
(2, 'salinda jayawardana', 'salinda@gmail.com', NULL, '$2y$10$q0sxwKDs..9rXu/B46tI/.ouwExcMlV73aSx5Mc3/FbmW6Q29.Xn2', 'L0H39KL7FybXRpJO4gXabbOdQuh8KfRLc2jeACW28921pUUhTJHsGTu5HPC1', 'admin', NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, '2019-01-05 12:20:27', '2019-01-05 12:20:27'),
(3, 'Dhanushka salinda', 'jayawardana@gmail.com', NULL, '$2y$10$q0sxwKDs..9rXu/B46tI/.ouwExcMlV73aSx5Mc3/FbmW6Q29.Xn2', 'W4uFlTD3qyuwGeyeydSt91CrS0upeKDRTcR8yNJm1FwlJMaHw9d91Qql7ucx', 'parent', NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, '2019-01-05 12:21:21', '2019-01-05 12:21:21'),
(4, 'SALINDA', 'sss@gmail.com', NULL, '$2y$10$U37.OIZwnM765PoFv2GAR.nvqM3F6iAsrXTKtlY74iXSjNtW33sne', 'KSGH9P3EI6UW9SCnXTjcg9IUNTq61UZd9sZiYHIAd0bMn8qCXqWuh3UzmZwC', 'educator', 'male', 'education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications ', 0, NULL, NULL, 67, 0, 0, 1, '2019-01-05 12:25:08', '2019-06-12 05:22:56'),
(5, 'ජයවර්ධන', 'jayawardanasalinda@gmail.com', NULL, '$2y$10$U37.OIZwnM765PoFv2GAR.nvqM3F6iAsrXTKtlY74iXSjNtW33sne', 'iCaO7Ytd3PXiqkQtX2SOLNfDVqgjdfPHL7qJOfaA5geaMGcvqHr1DjSV7q2h', 'parent', 'male', 'asasasas', 0, NULL, NULL, 40, 0, 0, 0, '2019-01-05 12:25:08', '2019-05-02 01:21:45'),
(6, 'SALINDA', 'sssw@gmail.com', NULL, '$2y$10$U37.OIZwnM765PoFv2GAR.nvqM3F6iAsrXTKtlY74iXSjNtW33sne', 'KSGH9P3EI6UW9SCnXTjcg9IUNTq61UZd9sZiYHIAd0bMn8qCXqWuh3UzmZwC', 'educator', 'male', 'education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications education_qualifications ', 0, NULL, NULL, 79, 0, 0, 1, '2019-01-05 12:25:08', '2019-06-13 05:27:43'),
(11, 'sssss', 'sssssssssssssss@gmail.com', NULL, '$2y$10$q0sxwKDs..9rXu/B46tI/.ouwExcMlV73aSx5Mc3/FbmW6Q29.Xn2', NULL, 'child', NULL, NULL, 2, '2019-01-18', NULL, 0, 1, 1, 1, '2019-01-20 07:42:12', '2019-04-05 04:12:48'),
(12, 'wwwwwww', 'wwwww@gmail.com', NULL, '$2y$10$q0sxwKDs..9rXu/B46tI/.ouwExcMlV73aSx5Mc3/FbmW6Q29.Xn2', 'bUYdCa4kUZr3ecQBdP2H1uWhFMSS7hoAxvyrOGjc4tZQtN5BsVCludKgfgfv', 'child', NULL, NULL, 1, '2019-01-10', 3, 0, 1, 1, 0, '2019-01-20 07:49:11', '2019-06-13 05:03:29'),
(13, 'salinda', 'jayawardanasalinda22@gmail.com', '0713881814', '$2y$10$at0FHTlUBq/WTqDa3oqR4e1mShJ7m20XRggjrRaWK8r63hFCHX.Ra', NULL, 'parent', 'male', NULL, 0, NULL, NULL, 0, 0, 0, 0, '2019-04-30 06:43:15', '2019-04-30 06:43:15'),
(14, 'salinda', 'asdasd', NULL, '$2y$10$p.9d.lUjuzrulDi8NhFAvOD6jAiUWrRnUzkH0.GLoam0Cr2YOqsei', NULL, 'child', NULL, NULL, 0, '2019-04-30', 13, 0, 2, 0, 0, '2019-04-30 06:45:00', '2019-04-30 06:45:00'),
(15, 'adadasdas', 'asdasdasdas', NULL, '$2y$10$48qtRoFXa1CF9NZU3sZ7LOFn3gS76KnqBRmkT2mH6if77l6/8aruK', NULL, 'child', NULL, NULL, 0, '2019-04-25', 13, 0, 1, 0, 0, '2019-04-30 07:08:30', '2019-04-30 07:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_lesson_mark`
--

CREATE TABLE `user_lesson_mark` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `mark` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_lesson_mark`
--

INSERT INTO `user_lesson_mark` (`id`, `user_id`, `lesson_id`, `mark`, `status`) VALUES
(2, 12, 15, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_users`
--
ALTER TABLE `all_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_users`
--
ALTER TABLE `course_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_questions`
--
ALTER TABLE `lesson_questions`
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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_educators`
--
ALTER TABLE `payment_educators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_educators`
--
ALTER TABLE `rate_educators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_lessons`
--
ALTER TABLE `rate_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requested_lessions`
--
ALTER TABLE `requested_lessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggested_lessons`
--
ALTER TABLE `suggested_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_lesson_mark`
--
ALTER TABLE `user_lesson_mark`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_users`
--
ALTER TABLE `all_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_users`
--
ALTER TABLE `course_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lesson_questions`
--
ALTER TABLE `lesson_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_educators`
--
ALTER TABLE `payment_educators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rate_educators`
--
ALTER TABLE `rate_educators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rate_lessons`
--
ALTER TABLE `rate_lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requested_lessions`
--
ALTER TABLE `requested_lessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suggested_lessons`
--
ALTER TABLE `suggested_lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_lesson_mark`
--
ALTER TABLE `user_lesson_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
