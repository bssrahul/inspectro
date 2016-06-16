-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2016 at 12:08 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inspectro`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'post',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `type`, `user_id`, `category_id`, `title`, `slug`, `body`, `image`, `published_at`, `created_at`, `updated_at`) VALUES
(2, 'post', 1, 1, 'hghfghfghfgh', 'hghfghfghfgh', '<p>fghfgh</p>\r\n', '36b3e4994ed3448b7477cc55a1c1d2df8abbd642.png', NULL, '2015-12-11 05:13:59', '2015-12-11 05:13:59'),
(7, 'page', 1, 1, 'Privacy Policy', 'privacy-policy', '<p>test</p>\r\n', NULL, NULL, '2016-06-15 10:20:46', '2016-06-15 10:20:46'),
(8, 'page', 1, 0, 'klnkljlk', 'klnkljlk', '<p>bmmkjkjkj</p>\r\n', NULL, NULL, '2016-06-15 14:28:49', '2016-06-15 14:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'frgr', 'frtt', 1, '2016-06-16 10:12:11', '2016-06-16 10:12:11'),
(6, 'dsfsdff', 'fdfdffff', 1, '2016-06-16 10:21:15', '2016-06-16 10:21:15'),
(7, 'nnjjnjn', 'ujhjjjj', 1, '2016-06-16 10:23:27', '2016-06-16 10:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_12_11_095216_create_users_table', 1),
('2014_07_05_111905_create_visitors_table', 2),
('2014_07_05_144447_create_articles_table', 2),
('2014_07_05_152557_create_options_table', 2),
('2014_07_07_005653_create_categories_table', 2),
('2014_10_12_000000_create_users_table', 2),
('2014_11_02_051938_create_roles_table', 2),
('2014_11_02_052125_create_permissions_table', 2),
('2014_11_02_052410_create_role_user_table', 2),
('2014_11_02_092851_create_permission_role_table', 2),
('2015_12_16_091455_create_users_table', 3),
('2015_12_16_093636_update_users_table', 4),
('2015_12_16_125313_create_password_resets_table', 5),
('2015_12_16_125725_update_password_reset', 6);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site.name', 'Inspectro', '2015-12-11 04:27:18', '2016-06-15 08:45:41'),
(2, 'site.slogan', 'Inspectro', '2015-12-11 04:27:18', '2016-06-15 08:45:41'),
(3, 'site.description', '', '2015-12-11 04:27:18', '2016-06-15 08:45:41'),
(4, 'site.keywords', '', '2015-12-11 04:27:18', '2016-06-15 08:45:56'),
(5, 'tracking', '', '2015-12-11 04:27:18', '2016-06-15 08:46:02'),
(6, 'facebook.link', '', '2015-12-11 04:27:18', '2016-06-15 08:45:50'),
(7, 'twitter.link', '', '2015-12-11 04:27:18', '2016-06-15 08:45:50'),
(8, 'post.permalink', '{slug}', '2015-12-11 04:27:18', '2016-06-15 08:45:57'),
(9, 'ckfinder.prefix', 'public/packages/pingpong/admin', '2015-12-11 04:27:18', '2015-12-27 16:18:29'),
(10, 'admin.theme', 'default', '2015-12-11 04:27:18', '2015-12-27 16:18:29'),
(11, 'pagination.perpage', '10', '2015-12-11 04:27:18', '2015-12-23 19:44:13'),
(12, 'site.mission', '', '0000-00-00 00:00:00', '2016-06-15 08:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `created_at`, `updated_at`, `email`, `token`) VALUES
(17, '2015-12-23 18:49:37', '0000-00-00 00:00:00', 'monika.purohit@betasoftsystems.com', 'd1a439ba95b4af01dda2b61b06f788e488a0c4eb89c54a1ddcec10e5fd6ae4ab'),
(48, '2016-01-08 04:21:28', '0000-00-00 00:00:00', 'melvin.lee.2012@business.smu.edu.sg', 'f67d49f4eb3e6d12d9f1bd5f0ed4e2da73594bc0e9b35c6402f8bfd9ee22e8b1'),
(49, '2016-01-08 04:22:04', '0000-00-00 00:00:00', 'melvin@flyingchalks.com', 'c719ef34874654fdd54578ce9e19c5bed33975bd2e13b77eed61ddabb2028655'),
(50, '2016-01-08 04:22:19', '0000-00-00 00:00:00', 'jaguar_8888@hotmail.com', '03a7ea481d0fc33844e9203036d0262e5b8173897699d248c0c6736173ae49ab'),
(53, '2016-01-09 00:20:18', '0000-00-00 00:00:00', 'jhohansaputra@hotmail.com', '7a4770dc24005737207c82e52ca5cb531431f8633524cbff860fbf8c896a9371'),
(54, '2016-01-09 01:51:06', '0000-00-00 00:00:00', 'gaurav.kumar@betasoftsystems.com', 'c6b4ecfb9792822760bd33ec11f5348621b90f17527223572d6730ada6ba44b1'),
(55, '2016-01-09 01:51:15', '0000-00-00 00:00:00', 'yogesh@betasoftsystems.com', 'bd249a70df6ad4d581d46a038944ff818bf7965308f871ee88b7b4745fc2213f'),
(68, '2016-01-21 03:17:00', '0000-00-00 00:00:00', 'colin.chng.2013@smu.edu.sg', 'e9f258ccfb93d019c3f8d3c5700b23a36ca5a1c35badd91aea9a2e322ebf0c3d'),
(69, '2016-01-29 20:18:29', '0000-00-00 00:00:00', 'choochristabel@live.com.sg', '37ad98a9d64505e1a8fba9b913f55bdeb7e716212a8cc10786dd7d5448afaf04'),
(70, '2016-01-30 22:16:17', '0000-00-00 00:00:00', 'leonlimyy1993@gmail.com', '3bec742c5aa2e34069f5f4fdd72899c1a60b9241a93481b5a44e43847e6db6be'),
(73, '2016-05-29 19:29:15', '0000-00-00 00:00:00', 'btran.duong@gmail.com', 'b2f01f0ef40d35e1ec49788616dad17aa3d1b6a0c3932b94cefea0c8f28c695b'),
(77, '2016-06-10 20:05:02', '0000-00-00 00:00:00', 'fawijaya.2014@business.smu.edu.sg', '80117ee0b67b530628ca316df31d6acdfd27d7dadffe5e403e3e21b40a2d7117');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Manage Users', 'manage_users', 'Manage Users', '2015-12-11 04:27:19', '2015-12-11 04:27:19'),
(2, 'Manage Articles', 'manage_articles', 'Manage Articles', '2015-12-11 04:27:19', '2015-12-11 04:27:19'),
(3, 'Manage Pages', 'manage_pages', 'Manage Pages', '2015-12-11 04:27:19', '2015-12-11 04:27:19'),
(4, 'Manage Categories', 'manage_categories', 'Manage Categories', '2015-12-11 04:27:19', '2015-12-11 04:27:19'),
(5, 'Manage Settings', 'manage_settings', 'Manage Settings', '2015-12-11 04:27:19', '2015-12-11 04:27:19'),
(6, 'Manage Roles', 'manage_roles', 'Manage Roles', '2015-12-11 04:27:19', '2015-12-11 04:27:19'),
(7, 'Manage Permissions', 'manage_permissions', 'Manage Permissions', '2015-12-11 04:27:19', '2015-12-11 04:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2015-12-11 04:27:19', '2015-12-11 04:27:19'),
(2, 4, 1, '2015-12-11 04:27:19', '2015-12-11 04:27:19'),
(3, 3, 1, '2015-12-11 04:27:19', '2015-12-11 04:27:19'),
(4, 7, 1, '2015-12-11 04:27:19', '2015-12-11 04:27:19'),
(5, 6, 1, '2015-12-11 04:27:19', '2015-12-11 04:27:19'),
(6, 5, 1, '2015-12-11 04:27:19', '2015-12-11 04:27:19'),
(7, 1, 1, '2015-12-11 04:27:19', '2015-12-11 04:27:19'),
(8, 2, 3, '2015-12-18 14:53:21', '2015-12-18 14:53:21'),
(9, 3, 3, '2015-12-18 14:53:21', '2015-12-18 14:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', NULL, '2015-12-11 04:27:18', '2015-12-11 04:27:18'),
(2, 'User', 'user', NULL, '2015-12-11 04:27:18', '2015-12-11 04:27:18'),
(3, 'Sub Admin', 'sub_admin', 'Not able to delete records', '2015-12-18 14:53:09', '2015-12-18 14:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2016-06-14 19:34:07', '0000-00-00 00:00:00'),
(3, 2, 2, '2016-06-15 10:05:24', '2016-06-15 10:05:24'),
(4, 2, 3, '2016-06-16 08:28:52', '2016-06-16 08:28:52'),
(5, 2, 4, '2016-06-16 09:48:32', '2016-06-16 09:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services_questions`
--

CREATE TABLE `services_questions` (
  `id` int(11) NOT NULL,
  `services_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sorting_key` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services_question_options`
--

CREATE TABLE `services_question_options` (
  `id` int(11) NOT NULL,
  `service_question_id` int(11) NOT NULL,
  `option_type` varchar(255) NOT NULL,
  `end_pages` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_logged_in` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `last_logged_in`) VALUES
(1, 'Sukant', 'Sharma', 'sukant@mobilyte.com', '$2y$10$Eva3EAN0C98hPr46/6TZOu52VtThQWNXtqkThYmaTJFSWtXHeit3u', 'owEb8zsXnDcf0OvUYMl96emkmWLD6husb4UL7s4HRgqfHF5oTuym77yN1aA8', '2015-12-11 07:07:11', '2016-06-16 12:33:54', '2016-06-14 06:15:43'),
(2, 'Rahul', 'Jain', 'rahul.jain@mobilyte.com', '$2y$10$aRVWvTnMQJxjYnCV4fLAN.8O5ZpWK.glY296t5wpKUf0MLIIIdTEq', NULL, '2016-06-15 10:05:23', '2016-06-15 10:09:17', '0000-00-00 00:00:00'),
(3, 'fghj', 'fghj', '26may@mailinator.com', '$2y$10$7g9fbLacyhQvNXKTVkdCtOYIrDZXSY94aJMr6D/hlzqjoyr0OW2D6', NULL, '2016-06-16 08:28:52', '2016-06-16 08:28:52', '0000-00-00 00:00:00'),
(4, 'hjsdfgjfd', 'fdsff', 'rohitkumar.rd26@gmail.com', '$2y$10$1LLiaS1i4HuMva178gBtGOnIvxEovpIX9HN9o5/Smv/tkg6dLE4Ee', NULL, '2016-06-16 09:48:31', '2016-06-16 09:48:31', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `options_key_unique` (`key`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_questions`
--
ALTER TABLE `services_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_question_options`
--
ALTER TABLE `services_question_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services_question_options`
--
ALTER TABLE `services_question_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
