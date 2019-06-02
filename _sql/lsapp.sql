-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2019 at 08:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsapp`
--

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
(3, '2019_05_28_181412_create_posts_table', 1),
(4, '2019_05_30_194820_add_user_id_to_posts', 2),
(5, '2019_05_31_013959_add_cover_image_to_posts', 3);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `cover_image`) VALUES
(14, 'What is Goal Setting?', '<p>Experts define <strong>Goal Setting</strong> as the act of selecting a target or objective you wish to achieve. Fair enough. That definition makes sense, but I think there is a much more useful way to think about setting goals.</p>', '2019-05-31 17:56:17', '2019-05-31 17:56:17', 4, 'systems-vs-goals-700x467_1559336177.jpg'),
(15, 'Life Definition', '<p>Life isn&#39;t about finding yourself. Life is about creating yourself.</p>', '2019-05-31 17:58:20', '2019-05-31 17:58:20', 4, '0_nk9nP4O2uX7kFVYN_1559336300.jpg'),
(16, 'Love life to get love back', '<p><strong>I have found that if you love life, life will love you back.</strong></p>', '2019-05-31 18:00:25', '2019-05-31 18:00:25', 5, 'how-life-began-artist_1559336424.jpg'),
(17, 'Don\'t give fast thoughts', '<p><strong>People have different reasons for the way they live their lives. You cannot put everyone&#39;s reasons in the same box.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></p>', '2019-05-31 18:07:11', '2019-05-31 18:07:11', 6, '1_gKpefHYzF-lJB7wk58WTjg_1559336831.jpeg'),
(18, 'new title', '<p>new</p>', '2019-05-31 20:31:23', '2019-05-31 20:31:23', 2, 'withoutImage.jpg'),
(19, 'ahmed', '<p>123</p>', '2019-05-31 20:34:50', '2019-05-31 20:34:50', 2, 'withoutImage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 'ahmed@gmail.com', NULL, '$2y$10$RHP5hvNerwuoAgJW1VwidePuEJHZyggOU4EXDvZl0/cuz0sd88e7O', NULL, '2019-05-30 16:37:10', '2019-05-30 16:37:10'),
(2, 'moh', 'moh@gmail.com', NULL, '$2y$10$k/XJq0GgNlbbXiQ996SwN.JrQIpT13yy76hM5C58sQVTajV4gq6Qy', NULL, '2019-05-30 16:42:21', '2019-05-30 16:42:21'),
(3, 'aoh', 'aoh@gmail.com', NULL, '$2y$10$zAR.1a8eOINN4gm6WpIBNuV/nNciw2gVCNADeiMyTx4dFO5/fWzBW', NULL, '2019-05-30 18:56:26', '2019-05-30 18:56:26'),
(4, 'james', 'james@gmail.com', NULL, '$2y$10$NCTUFeyEb/8lb2mXA72SxOoOS0uX.XLeAs6tZds0Iw/rd252EdGua', NULL, '2019-05-31 17:55:13', '2019-05-31 17:55:13'),
(5, 'Arthur Rubinstein', 'Arthur@gmail.com', NULL, '$2y$10$Putu.RYYW95HjuiAc22tJ.LsLL.2VV4qcnyZMb8JwvLBSRgkuuK1K', NULL, '2019-05-31 17:58:56', '2019-05-31 17:58:56'),
(6, 'Kevin Spacey', 'Kevin@gmail.com', NULL, '$2y$10$C4C5JAjwcb.6ygdt2Iri8ekCuzSnvAVIwDFFYIw5MOepcpakyr4TC', NULL, '2019-05-31 18:05:29', '2019-05-31 18:05:29');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
