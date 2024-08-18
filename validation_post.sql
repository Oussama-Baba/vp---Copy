-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 11:13 AM
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
-- Database: `validation_post`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 4, 4, 'of sgdggdgd', '2024-07-27 23:05:26', '2024-07-26 23:30:27', '2024-07-27 23:05:26'),
(7, 4, 4, 'jh', '2024-07-27 23:05:23', '2024-07-27 22:14:34', '2024-07-27 23:05:23'),
(8, 4, 4, 'ggg', '2024-07-27 23:05:20', '2024-07-27 22:16:20', '2024-07-27 23:05:20'),
(9, 4, 4, 'gg', '2024-07-27 23:05:17', '2024-07-27 22:16:25', '2024-07-27 23:05:17'),
(10, 4, 4, 'hgg', '2024-07-27 23:05:14', '2024-07-27 22:52:15', '2024-07-27 23:05:14'),
(14, 4, 4, 'ff', '2024-07-27 23:05:01', '2024-07-27 22:54:39', '2024-07-27 23:05:01'),
(15, 4, 4, 'dff', '2024-07-27 23:04:57', '2024-07-27 22:54:42', '2024-07-27 23:04:57'),
(17, 4, 4, 'cgfgf', '2024-07-27 23:04:49', '2024-07-27 22:54:59', '2024-07-27 23:04:49'),
(18, 4, 4, 'nhh', '2024-07-27 23:04:24', '2024-07-27 23:03:08', '2024-07-27 23:04:24'),
(21, 4, 4, 'hi', '2024-07-27 23:22:08', '2024-07-27 23:06:27', '2024-07-27 23:22:08'),
(23, 4, 4, 'b', '2024-07-27 23:22:01', '2024-07-27 23:17:40', '2024-07-27 23:22:01'),
(24, 4, 4, 'b', '2024-07-27 23:21:50', '2024-07-27 23:17:43', '2024-07-27 23:21:50'),
(25, 4, 4, 'b', '2024-07-27 23:21:38', '2024-07-27 23:17:44', '2024-07-27 23:21:38'),
(26, 4, 4, 'b', '2024-07-27 23:21:42', '2024-07-27 23:17:45', '2024-07-27 23:21:42'),
(37, 4, 4, 'h', '2024-07-27 23:42:05', '2024-07-27 23:22:23', '2024-07-27 23:42:05'),
(38, 4, 4, 'n', '2024-07-27 23:36:45', '2024-07-27 23:26:15', '2024-07-27 23:36:45'),
(39, 4, 4, 'n', '2024-07-27 23:42:00', '2024-07-27 23:26:17', '2024-07-27 23:42:00'),
(40, 4, 4, 'n', '2024-07-27 23:36:35', '2024-07-27 23:26:17', '2024-07-27 23:36:35'),
(41, 4, 4, 'n', '2024-07-27 23:41:57', '2024-07-27 23:26:18', '2024-07-27 23:41:57'),
(43, 4, 4, 'nckjv', '2024-07-27 23:36:26', '2024-07-27 23:26:36', '2024-07-27 23:36:26'),
(46, 4, 4, 'bb', '2024-07-27 23:36:16', '2024-07-27 23:35:11', '2024-07-27 23:36:16'),
(48, 4, 4, 'bb', '2024-07-30 07:20:59', '2024-07-27 23:42:37', '2024-07-30 07:20:59'),
(57, 4, 4, 'bonjeur', '2024-07-30 07:20:15', '2024-07-29 17:40:17', '2024-07-30 07:20:15'),
(61, 4, 4, 'hhh', '2024-08-01 07:00:39', '2024-07-31 00:36:17', '2024-08-01 07:00:39'),
(62, 4, 4, 'hghgg', '2024-08-01 07:00:35', '2024-07-31 07:14:49', '2024-08-01 07:00:35'),
(72, 4, 4, 'titlevcomment test', NULL, '2024-08-01 07:01:03', '2024-08-01 07:01:03');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(15, '0001_01_01_000000_create_users_table', 1),
(16, '0001_01_01_000001_create_cache_table', 1),
(17, '0001_01_01_000002_create_jobs_table', 1),
(18, '2024_07_13_215757_add_role_to_users_table', 1),
(19, '2024_07_17_230528_add_telephone_to_users_table', 1),
(20, '2024_07_17_230905_add_soft_deletes_to_users_table', 1),
(21, '2024_07_20_205614_create_posts_table', 1),
(22, '2024_07_20_231221_add_publish_date_to_posts_table', 1),
(23, '2024_07_20_235325_add_page_name_to_posts_table', 2),
(24, '2024_07_23_222347_add_extra_columns_to_users_table', 3),
(25, '2024_07_23_231943_add_colon_hashtags_to_post_table', 4),
(26, '2024_07_23_232221_add_colon_hashtags_to_posts_table', 5),
(27, '2024_07_27_001743_create_comments_table', 6),
(31, '2024_07_31_210755_add_email_sent_to_posts_table', 7);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `media_path` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('processing','accepted','declined') NOT NULL DEFAULT 'processing',
  `page_name` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `colon_hashtags` varchar(255) DEFAULT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `media_path`, `user_id`, `status`, `page_name`, `deleted_at`, `created_at`, `updated_at`, `publish_date`, `colon_hashtags`, `email_sent`) VALUES
(4, 'Agence Web', 'Amanus une Agence  web marocaine specialiser dans l\'offshore web.propose une equipe talenteuse en creation siteweb', 'media/j206KqJCWNhWAvMRlT2Ey82zMSd6ZNqvJ1H4uYFS.jpg', 4, 'declined', 'Amanus', NULL, '2024-07-21 23:21:27', '2024-08-01 22:50:41', '2024-07-13', '#hashtag', 0),
(5, 'dubai travel', 'Dubai, located in the United Arab Emirates (UAE), is a city known for its ultramodern architecture, luxury shopping, vibrant nightlife, and a mix of traditional and contemporary experiences. This dynamic metropolis has transformed from a desert settlement to a global city and business hub.', 'media/QuKLwUH1WUhU1MkmWTN59a0oA8xFbttrzbKuC0eB.jpg', 4, 'accepted', 'allo baba12', NULL, '2024-07-21 23:35:56', '2024-07-31 21:29:57', '2024-07-11', 'mjjkkk', 0),
(68, 'test email', 'test emailtest emailtest email', 'media/sI8YDaLgKXVzxQ9kcNthGfrhyHFQayILR6sSNUdc.jpg', 4, 'processing', 'hhh', '2024-08-01 22:50:07', '2024-08-01 22:22:51', '2024-08-01 22:50:07', '2024-08-17', 'jhxhs', 1),
(70, 'h', 'h', 'media/RRw4SpUXC0PchyPFnFzRh54XREGfrolFNq0Mx50w.jpg', 4, 'processing', 'h', '2024-08-01 22:50:02', '2024-08-01 22:31:54', '2024-08-01 22:50:02', '2024-08-23', 'h', 1),
(71, 'oussama', 'adhghgdhgd', 'media/FCMLqaJK7ysNUw1P7wYlq3P5i2D8IYqGYNR6iigA.mp4', 4, 'processing', 'afaddd', NULL, '2024-08-01 23:05:57', '2024-08-01 23:06:21', '2024-08-24', 'ccfff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CLAPJZM0d7ZF0cm3mgH1HEsOfdPpv6YoyOrstvuP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicW01TUhNeGs5OTZ2eXI5d2JuZUNUdDJETzlqNERqdkoyMFo4NjcxTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1722557725);

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
  `role` varchar(255) NOT NULL DEFAULT 'client',
  `telephone` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nb_vedio` int(11) NOT NULL DEFAULT 0,
  `nbr_real` int(11) NOT NULL DEFAULT 0,
  `nbr_post` int(11) NOT NULL DEFAULT 0,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `telephone`, `deleted_at`, `nb_vedio`, `nbr_real`, `nbr_post`, `logo`) VALUES
(1, 'oussama', 'babaoussama549@gmail.com', NULL, '$2y$12$EMKGF0op/nKKddr4PLsGQurvP9ZWG721DcExZlJtq8nmZTIRBP4kC', 'Qg0YeKCSWMHlj0hS0aCQ5gz2ZZp45pVuQo7LnTdvw06iwSvjgIJWaXlLZOj0', '2024-07-20 22:15:12', '2024-07-20 22:15:12', 'admin', NULL, NULL, 0, 0, 0, NULL),
(2, 'oussama', 'babaoussama9@gmail.com', NULL, '$2y$12$7Khg4pGuMf2Rc8NOWMaM..alcPS44EIeoUxoms2C9DnrGgi6p9vyK', NULL, '2024-07-20 22:15:40', '2024-07-31 21:06:36', 'client', '23097654', '2024-07-31 21:06:36', 0, 0, 0, NULL),
(3, 'oussama1', 'babaoussama54449@gmail.com', NULL, '$2y$12$M2d5f3eve3Cj/1MfpwyPJeS/dCnYuRwMdOnhM3MxNSqPt/uqmoiP2', NULL, '2024-07-20 23:08:45', '2024-07-20 23:08:56', 'client', '213456', '2024-07-20 23:08:56', 0, 0, 0, NULL),
(4, 'anas bakassi', 'amasbakassi9@gmail.com', NULL, '$2y$12$ICR7Xa4MZ.R6HoXXmUc0p.EoYf87uFxs24C3W7VQ0dLCYp7VTDQ/K', NULL, '2024-07-21 23:17:13', '2024-07-21 23:17:13', 'client', '0654070479', NULL, 0, 0, 0, NULL),
(5, 'khalid', 'khalid9@gmail.com', NULL, '$2y$12$ZVEffZxdJorDLwc./b81OO5GG2uAhhS1ix1alGRKepTz0gLGSHkGq', NULL, '2024-07-23 21:42:12', '2024-07-31 18:52:35', 'client', '987654322', '2024-07-31 18:52:35', 1, 2, 1, 'logos/IOn0IlWxodR2ukAWzE4yqsuPWDiOyx7T8NKvJcX2.jpg'),
(6, 'oussama baba', 'babaoussama.info@gmail.com', NULL, '$2y$12$.esNi2HhKxApRFlnpgXMeen3yI/zCAP5ybUmbnfgFJP4lVAihKkbK', NULL, '2024-07-30 23:32:08', '2024-07-30 23:32:08', 'client', '0654070479', NULL, 1, 1, 1, 'logos/eWLOCguzjfbeTNSABjG2RfC0vadNQCF0NZnjJ2Db.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
