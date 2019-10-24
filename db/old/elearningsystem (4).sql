-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 12:53 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `views` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `user_id`, `title`, `description`, `age`, `lesson_type`, `lesson_category`, `file_path`, `rate`, `views`, `status`, `created_at`, `updated_at`) VALUES
(5, 4, 'sdsdsd', 'edsdfs0000000000000000000000000000 000000000000000000000000000000000000 000000000000000000000000000000000000 00000000000000002222222222222', 5, 'img', 'level_1', './uploads/edu-4/img/img-level_2-5c851eac21252.jpeg', '75', 0, 1, '2019-03-10 08:56:52', '2019-03-10 08:56:52'),
(6, 4, 'lession 01', 'fsdfsdf', 7, 'pdf', 'level_1', './uploads/edu-4/pdf/pdf-level_2-5c851ef707531.pdf', '25', 0, 1, '2019-03-10 08:58:07', '2019-03-10 08:58:07'),
(9, 4, 'sdsdsddsdsd', 'dsdsdsdsd', 8, 'doc', 'level_1', './uploads/edu-4/doc/doc-level_2-5c85372f12ec3.docx', '0', 7, 1, '2019-03-10 10:41:27', '2019-03-12 05:23:53'),
(10, 4, 'sdsdsdsdsd', 'sdsdsdsdsdsd', 8, 'video', 'level_1', './uploads/edu-4/video/video-level_3-5c853968385ba.mp4', '0', 0, 1, '2019-03-10 10:50:56', '2019-03-10 10:50:56'),
(11, 4, 'ssdd', 'dddddd', 8, 'audio', 'level_1', './uploads/edu-4/audio/audio-level_2-5c85399a843ca.mpga', '0', 0, 1, '2019-03-10 10:51:46', '2019-03-10 10:51:46'),
(12, 4, '1111111111111222', '1111111111', NULL, 'pdf', 'level_1', './uploads/edu-4/pdf/pdf-level_1-5c922ec754a5b.pdf', '0', 0, 1, '2019-03-20 06:45:03', '2019-03-20 06:45:03');

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
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_title`, `questions_description`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 'ෆ්ද්ෆ්ද්ෆ්ද්ෆ්ඩ්', 'ඩ්ස්ෆ්ද්ෆ්ස්ස්ද්ෆ්ඩ්ස්ෆ්', 'ඩ්ස්ෆ්ඩ්ස්ෆ්ඩ්ස්', 'ස්ද්ෆ්ස්දෆ්ස්ඩ්', 'ස්ද්ෆ්ස්ද්ෆ්ද්ෆ්', 'ස්ද්ෆ්ස්ග්ර්ග්', 'answer_1', './uploads/question/1.png', 1, '2019-03-16 04:22:29', NULL),
(5, 'ෆ්ද්ෆ්ද්ෆ්ද්ෆ්ඩ්', 'ඩ්ස්ෆ්ද්ෆ්ස්ස්ද්ෆ්ඩ්ස්ෆ්', 'ඩ්ස්ෆ්ඩ්ස්ෆ්ඩ්ස්', 'ස්ද්ෆ්ස්දෆ්ස්ඩ්', 'ස්ද්ෆ්ස්ද්ෆ්ද්ෆ්', 'ස්ද්ෆ්ස්ග්ර්ග්', 'answer_1', NULL, 1, '2019-03-16 04:22:29', NULL);

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
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_regster_type` enum('parent','educator','admin','child') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'parent',
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_qualifications` text COLLATE utf8mb4_unicode_ci,
  `score` int(11) NOT NULL DEFAULT '0',
  `dob` date DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `is_completed` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `user_regster_type`, `gender`, `education_qualifications`, `score`, `dob`, `parent_id`, `level`, `is_completed`, `status`, `created_at`, `updated_at`) VALUES
(2, 'salinda jayawardana', 'salinda@gmail.com', '$2y$10$q0sxwKDs..9rXu/B46tI/.ouwExcMlV73aSx5Mc3/FbmW6Q29.Xn2', 'h5wkRNL5aabntknyytcfKCItVFb69CisBDRXV99mx2E5dPCx6Gots4w1AlYQ', 'admin', NULL, NULL, 0, NULL, NULL, 0, 0, 0, '2019-01-05 12:20:27', '2019-01-05 12:20:27'),
(3, 'Dhanushka salinda', 'jayawardana@gmail.com', '$2y$10$q0sxwKDs..9rXu/B46tI/.ouwExcMlV73aSx5Mc3/FbmW6Q29.Xn2', 'W4uFlTD3qyuwGeyeydSt91CrS0upeKDRTcR8yNJm1FwlJMaHw9d91Qql7ucx', 'parent', NULL, NULL, 0, NULL, NULL, 0, 0, 0, '2019-01-05 12:21:21', '2019-01-05 12:21:21'),
(4, 'SALINDA', 'sss@gmail.com', '$2y$10$U37.OIZwnM765PoFv2GAR.nvqM3F6iAsrXTKtlY74iXSjNtW33sne', 'RvoNDBewvTicTe0TqrRKjvynMJBXM1ghjIyqNxyKmvViAV85fkP6Qg1X4pTh', 'educator', 'male', 'asasasas', 0, NULL, NULL, 0, 0, 0, '2019-01-05 12:25:08', '2019-01-13 01:34:46'),
(5, 'ජයවර්ධන', 'jayawardanasalinda@gmail.com', '$2y$10$U37.OIZwnM765PoFv2GAR.nvqM3F6iAsrXTKtlY74iXSjNtW33sne', '9dsuM2cyC6Ea3Bp9eeq0YUS56v7WQvWQd3uo8W2mXOeNd1IjZ3V3NEZq7Fj0', 'parent', 'male', 'asasasas', 0, NULL, NULL, 0, 0, 0, '2019-01-05 12:25:08', '2019-01-13 01:34:46'),
(11, 'sssss', 'sssssssssssssss@gmail.com', '$2y$10$V0ePHsV8ytP1Hm/lZFGtZuOOJGU0Kq50Ews1VlIYipUpFKU9hrU8C', NULL, 'child', NULL, NULL, 0, '2019-01-18', NULL, 0, 0, 0, '2019-01-20 07:42:12', '2019-01-20 07:42:12'),
(12, 'wwwwwww', 'wwwww@gmail.com', '$2y$10$q0sxwKDs..9rXu/B46tI/.ouwExcMlV73aSx5Mc3/FbmW6Q29.Xn2', 'NNpdXE5U6RXiWVD24NSnQ1mWZsUPsTCxUqx0C1OVMkR8a8tC4TrbdsnKf7Qr', 'child', NULL, NULL, 0, '2019-01-10', 5, 0, 0, 0, '2019-01-20 07:49:11', '2019-03-12 01:17:14');

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
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
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
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
