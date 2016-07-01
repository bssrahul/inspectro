-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2016 at 02:43 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inspectro_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL COMMENT 'the question_id for which this is an answer',
  `answers` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'text of the answer',
  `custom_answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL COMMENT 'defines in which order the anser is displayed at the form',
  `next_question_id` int(11) NOT NULL COMMENT 'question_id of the next question if this answer is selected',
  `option_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answers`, `custom_answer`, `sort`, `next_question_id`, `option_description`, `created_at`, `updated_at`) VALUES
(1, 2, 'dfgdgdg', '1', 0, 3, '', '2016-06-27 10:51:40', '2016-06-27 10:51:40'),
(2, 4, 'fgfdgdfg', '1', 33, 3, '', '2016-06-27 10:52:09', '2016-06-27 10:52:09'),
(30, 8, 'Outer Wall Painting', '0', 2, 3, '', '2016-06-27 12:57:56', '2016-06-27 12:59:37'),
(5, 3, 'fggdfgdfg', '1', 33, 3, '', '2016-06-27 12:04:38', '2016-06-27 12:04:38'),
(6, 1, 'dfgdfg', '1', 2, 1, '', '2016-06-27 12:15:15', '2016-06-27 12:15:15'),
(7, 1, 'dfgdfg', '1', 2, 1, '', '2016-06-27 12:16:00', '2016-06-27 12:16:00'),
(8, 1, 'dfgdfg', '1', 2, 1, '', '2016-06-27 12:16:41', '2016-06-27 12:16:41'),
(9, 1, 'dfgdfg', '1', 2, 1, '', '2016-06-27 12:17:27', '2016-06-27 12:17:27'),
(10, 1, 'dfgdfg', '1', 2, 1, '', '2016-06-27 12:17:52', '2016-06-27 12:17:52'),
(11, 1, 'dfgdfg', '1', 2, 1, '', '2016-06-27 12:17:57', '2016-06-27 12:17:57'),
(35, 10, 'dfgfdg', '1', 0, 2, '', '2016-06-28 08:43:21', '2016-06-28 08:43:21'),
(29, 8, 'Door Painting', '0', 1, 3, '', '2016-06-27 12:57:56', '2016-06-27 13:27:42'),
(36, 10, 'dfgfdgdf', '1', 4, 2, '', '2016-06-28 08:43:43', '2016-06-28 08:43:43'),
(37, 11, '123', '1', 0, 2, '', '2016-06-28 08:59:35', '2016-06-28 08:59:35'),
(38, 11, '2324', '0', 0, 11, '', '2016-06-28 08:59:35', '2016-06-28 08:59:35'),
(39, 11, '123', '1', 0, 2, '', '2016-06-28 08:59:50', '2016-06-28 08:59:50'),
(40, 11, '2324', '0', 0, 11, '', '2016-06-28 08:59:50', '2016-06-28 08:59:50'),
(41, 11, '787989089', '0', 0, 0, '', '2016-06-28 09:00:37', '2016-06-28 09:00:57'),
(42, 12, 'fdghdfh', '0', 0, 0, '', '2016-06-28 09:20:01', '2016-06-28 10:24:32'),
(43, 15, 'adsad', '1', 0, 1, '', '2016-06-28 09:31:05', '2016-06-28 09:31:05'),
(44, 15, 'fdsfsdf43532', '0', 0, 0, '', '2016-06-28 09:31:06', '2016-06-28 11:54:19'),
(52, 15, 'menu#1', '1', 0, 2, '', '2016-06-28 12:07:26', '2016-06-28 14:05:17'),
(51, 15, 'dsfgsdgsd', '1', 0, 4, '', '2016-06-28 11:52:34', '2016-06-28 14:05:30'),
(47, 13, '', '0', 0, 0, '', '2016-06-28 10:24:06', '2016-06-28 13:02:44'),
(48, 12, 'sdfgsdgd', '1', 0, 2, '', '2016-06-28 11:35:51', '2016-06-28 11:35:51'),
(49, 12, 'dsfsd1213', '0', 0, 0, '', '2016-06-28 11:36:03', '2016-06-28 11:41:16'),
(50, 12, 'vbmvbmbm', '0', 0, 0, '', '2016-06-28 11:41:21', '2016-06-28 13:32:58'),
(53, 15, 'menu#1', '0', 0, 0, '', '2016-06-28 12:07:26', '2016-06-28 14:05:01'),
(54, 12, 'cvcvc', '0', 0, 0, '', '2016-06-28 13:26:11', '2016-06-28 13:26:11'),
(55, 12, 'bcvbcvb', '0', 0, 0, '', '2016-06-28 13:26:27', '2016-06-28 13:26:27'),
(56, 20, '123435', '1', 1, 15, '', '2016-06-28 14:51:00', '2016-06-28 14:51:00'),
(57, 20, '78654434', '1', 0, 0, '', '2016-06-28 14:53:03', '2016-06-28 14:53:03'),
(58, 20, 'fdgdfg435345', '1', 0, 0, '', '2016-06-28 15:06:05', '2016-06-28 15:09:31'),
(59, 20, 'dfgd', '0', 0, 12, '', '2016-06-28 15:06:05', '2016-06-28 15:06:05'),
(60, 15, 'ddsfsd12343242', '1', 0, 2, '', '2016-06-28 15:15:34', '2016-06-28 15:15:44'),
(61, 15, 'edsrfwere23432', '1', 0, 19, '', '2016-06-28 15:15:34', '2016-06-28 15:15:49'),
(62, 15, 'dsffsd', 'date', 0, 0, '', '2016-06-28 15:32:19', '2016-06-28 15:32:19'),
(63, 15, '123', '0', 0, 0, '', '2016-06-28 15:32:44', '2016-06-28 15:32:44'),
(64, 15, 'sdfggg', 'text', 0, 0, '', '2016-06-28 15:33:02', '2016-06-28 15:33:02'),
(65, 22, 'abc', '0', 0, 0, '', '2016-06-28 15:45:28', '2016-06-28 15:45:28'),
(66, 22, 'mno', 'text', 0, 0, '', '2016-06-28 15:45:38', '2016-06-28 15:45:38'),
(67, 22, 'date', 'date', 0, 0, '', '2016-06-28 15:45:45', '2016-06-28 15:45:45'),
(68, 22, '1 none', '0', 1, 15, '', '2016-06-28 15:52:59', '2016-06-28 15:52:59'),
(69, 22, '2 text', 'text', 2, 0, '', '2016-06-28 15:52:59', '2016-06-28 16:00:30'),
(70, 22, '3 date', 'date', 0, 0, '', '2016-06-28 15:52:59', '2016-06-28 15:52:59'),
(71, 23, '123', 'text', 0, 22, '', '2016-06-29 08:46:11', '2016-06-29 08:46:11'),
(72, 15, 'sdsds', 'date', 0, 19, '', '2016-06-29 08:59:03', '2016-06-29 08:59:03'),
(73, 19, 'dfs', 'text', 0, 15, '', '2016-06-29 09:08:45', '2016-06-29 09:08:45'),
(74, 19, 'fdfd', 'date', 0, 0, '', '2016-06-29 09:08:45', '2016-06-29 09:08:45'),
(75, 15, 'fgdgdf', '0', 0, 19, '', '2016-06-29 09:10:45', '2016-06-29 09:10:45'),
(76, 15, 'fgdgdf', '0', 0, 19, '', '2016-06-29 09:14:35', '2016-06-29 09:14:35'),
(77, 25, 'fdsgsd', '0', 3, 15, '', '2016-06-29 09:31:51', '2016-06-29 09:31:51'),
(78, 24, 'sdsd', '0', 0, 0, '', '2016-06-29 09:33:17', '2016-06-29 09:33:17'),
(79, 24, 'sdsd', '0', 0, 0, '', '2016-06-29 09:36:20', '2016-06-29 09:36:20'),
(80, 24, 'sdsd', '0', 0, 23, '', '2016-06-29 09:36:46', '2016-06-29 09:41:29'),
(81, 24, 'sdsd', 'text', 1, 22, '', '2016-06-29 09:38:07', '2016-06-29 09:40:35'),
(82, 24, 'hgjgj', '0', 0, 22, '', '2016-06-29 11:35:33', '2016-06-29 11:35:33'),
(83, 15, 'dsgdfgfd', '0', 2, 19, '', '2016-06-29 12:16:10', '2016-06-29 12:16:10'),
(84, 15, 'sdfsd', '0', 1, 19, '', '2016-06-29 12:17:31', '2016-06-29 12:17:31'),
(85, 15, 'hdffd', '0', 2, 19, 'hello how r u? fdg dfg', '2016-06-29 12:19:45', '2016-06-29 12:20:01'),
(86, 15, '1', 'text', 1, 19, '1', '2016-06-29 12:23:46', '2016-06-29 12:23:46'),
(87, 15, '2', 'date', 2, 19, '2', '2016-06-29 12:23:46', '2016-06-29 12:23:46'),
(88, 19, 'dfdgfg', '0', 0, 0, '', '2016-06-30 12:32:05', '2016-06-30 12:32:05');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sorting_key` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`, `parent_id`, `type`, `sorting_key`) VALUES
(1, 'painting', 'painting', 1, '2016-06-18 09:46:09', '2016-06-18 09:46:09', 0, 'category', 0),
(2, 'polishing', 'polishing', 1, '2016-06-18 09:46:09', '2016-06-18 09:46:09', 0, 'category', 0),
(3, 'Door Painting', 'Door Painting', 1, '2016-06-18 09:48:16', '2016-06-18 09:48:16', 1, 'service', 0),
(4, 'floor polishing', 'floor polishing', 1, '2016-06-18 09:48:16', '2016-06-18 09:48:16', 2, 'service', 0),
(5, 'how many door you have?', 'how many door you have?', 1, '2016-06-18 09:49:38', '2016-06-18 09:49:38', 3, 'question', 1),
(6, 'how many room you have?', NULL, 1, '2016-06-18 09:49:38', '2016-06-18 09:49:38', 4, 'question', 0),
(7, 'fdssdf', 'sdffsdf', 1, '2016-06-22 09:38:26', '2016-06-22 09:38:26', 0, 'category', 0),
(8, 'sdfdf43253', 'sdfsdfd3245345', 1, '2016-06-22 09:38:33', '2016-06-22 09:39:24', 7, 'service', 0),
(9, 'sdfsdf3424', 'sdfsdfsdf2345235', 1, '2016-06-22 09:38:43', '2016-06-22 09:38:50', 8, 'question', 1),
(12, 'dfhdfh', 'dfhdfhd', 1, '2016-06-22 09:42:51', '2016-06-22 09:42:51', 8, 'question', 2),
(13, 'dfgfdg', 'gdfgdfgd', 1, '2016-06-23 09:06:16', '2016-06-23 09:06:16', 8, 'question', 3),
(14, 'fdgfgd4554', 'dfgdfg4545', 1, '2016-06-23 10:15:00', '2016-06-24 07:39:41', 0, 'category', 0),
(15, 'dfgdfg5454er', 'dfgdfgdfrereerer343', 1, '2016-06-23 10:15:22', '2016-06-24 07:40:30', 14, 'service', 0),
(16, 'dfgdfg4535er', 'dfgfdgdfg4545rerdfgdf4r', 1, '2016-06-23 10:15:37', '2016-06-24 08:05:10', 15, 'question', 3),
(17, 'wall painting', 'wall painting', 1, '2016-06-24 07:58:26', '2016-06-24 07:58:26', 1, 'service', 0);

-- --------------------------------------------------------

--
-- Table structure for table `form_types`
--

CREATE TABLE `form_types` (
  `form_type_id` int(11) NOT NULL,
  `op_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_types`
--

INSERT INTO `form_types` (`form_type_id`, `op_type`) VALUES
(1, 'multi Select'),
(2, 'single Select'),
(5, 'Drop Down');

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
-- Table structure for table `option_type`
--

CREATE TABLE `option_type` (
  `id` int(11) NOT NULL,
  `op_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option_type`
--

INSERT INTO `option_type` (`id`, `op_type`) VALUES
(1, 'Single  Select'),
(2, 'Multi Select'),
(3, 'Drop Down');

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL COMMENT 'id of the question',
  `service_id` int(11) NOT NULL COMMENT 'id of the service, related to the services-table',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'question title',
  `description_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'description field at the top',
  `description_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'description field at the bottom',
  `sort_question` int(11) NOT NULL,
  `form_type_id` int(11) NOT NULL COMMENT 'this is the id of form type -> table form_types',
  `other_custom_field` int(11) NOT NULL DEFAULT '0' COMMENT 'if this is 1 the user will be allowed to enter an individual answer text with other options -> the answer text will be stored in quote_requests_answers',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `service_id`, `title`, `description_1`, `description_2`, `sort_question`, `form_type_id`, `other_custom_field`, `created_at`, `updated_at`) VALUES
(1, 0, 'fdsgsdg', 'dfgdfgfg', 'fdgdfgdfg', 0, 1, 0, '2016-06-25 14:08:06', '2016-06-25 14:08:06'),
(10, 9, 'dfgdfgd', 'dfgdfgdfg', 'dfgdfgdfgdfg', 0, 1, 0, '2016-06-28 08:41:12', '2016-06-28 08:41:12'),
(2, 1, 'What is your budget?', 'What is your budget?', 'What is your budget?', 0, 1, 0, '2016-06-25 14:08:39', '2016-06-25 14:08:39'),
(3, 2, 'What kind of style you want?', 'What kind of style you want?', 'What kind of style you want?.', 0, 1, 0, '2016-06-25 14:10:30', '2016-06-27 10:29:00'),
(4, 2, 'Please Choose Budget', 'Please Choose Budget', 'Please Choose Budget', 0, 1, 0, '2016-06-25 14:10:58', '2016-06-25 14:12:11'),
(5, 3, 'fgdfgdf', 'gfdgfdg', 'dfgdfgdf', 0, 1, 0, '2016-06-27 11:44:15', '2016-06-27 11:44:15'),
(7, 3, 'dfhbdf', 'bcvbcvvcbc', 'bcvbcbcvbc', 0, 2, 0, '2016-06-27 12:20:57', '2016-06-27 12:21:04'),
(8, 5, 'What king of painting you want?', 'What king of painting you want?', 'What king of painting you want?', 0, 2, 0, '2016-06-27 12:51:43', '2016-06-27 12:54:48'),
(11, 9, 'fdgdfgdf', 'fgdgdfgf', 'fdgdfgdfg', 0, 2, 0, '2016-06-28 08:56:29', '2016-06-28 08:56:29'),
(12, 9, 'fdfdfdf', '123abc', '123', 0, 2, 0, '2016-06-28 08:59:10', '2016-06-28 10:18:35'),
(13, 9, '67876abc12345', '67867abc123454', '678678fdghgfds', 0, 3, 0, '2016-06-28 09:01:27', '2016-06-28 09:18:06'),
(15, 10, 'abc', 'abc', 'abc', 0, 1, 0, '2016-06-28 09:30:47', '2016-06-28 09:30:47'),
(19, 10, 'fdgfdg', 'gfdgfg', 'fdgdf', 0, 1, 0, '2016-06-28 11:47:53', '2016-06-28 11:47:53'),
(23, 12, 'abc', 'abc', 'abc', 0, 2, 0, '2016-06-29 08:24:56', '2016-06-29 08:24:56'),
(21, 9, 'ABCD', 'ABCD', 'ABCD', 0, 1, 1, '2016-06-28 15:16:53', '2016-06-28 15:21:27'),
(22, 12, 'new Question 1', 'new Question 1', 'new Question 1', 0, 1, 1, '2016-06-28 15:34:54', '2016-06-28 15:34:54'),
(24, 12, 'dfdfg', 'ffdg', 'dfgdfg', 0, 1, 1, '2016-06-29 08:43:00', '2016-06-29 08:43:00'),
(25, 10, 'fdgdf', 'fdgdf', 'dfgdfg', 0, 2, 0, '2016-06-29 09:22:13', '2016-06-29 09:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `quote_requests`
--

CREATE TABLE `quote_requests` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `contact_mode` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `selected_options` text NOT NULL,
  `service_request_date` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_requests`
--

INSERT INTO `quote_requests` (`id`, `full_name`, `contact_mode`, `zipcode`, `selected_options`, `service_request_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Rohit Kumar', 'rohitbss@mailinator.com', 136118, '[{"qid":"5","op1":"hello","op2":"jai"},{"qid":"6","op1":"hello","op2":"jai"},{"qid":"7","op1":"hello","op2":"jai"},{"qid":"8","op1":"hello","op2":"jai"}]', '2016-07-01 00:00:00', 0, '2016-07-01 07:28:42', '2016-07-01 07:28:42'),
(3, 'Sukant Sharma ', 'sukant@mobility.com', 136118, '[{"qid":"5","op1":"hello","op2":"jai"},{"qid":"6","op1":"hello","op2":"jai"},{"qid":"7","op1":"hello","op2":"jai"},{"qid":"8","op1":"hello","op2":"jai"}]', '2016-07-01 00:00:00', 0, '2016-07-01 07:28:54', '2016-07-01 07:28:54'),
(5, 'Vaibhav Bharti', 'Vaibhav@mobilyte.com', 136118, '[{"qid":"5","op1":"hello","op2":"jai"},{"qid":"6","op1":"hello","op2":"jai"},{"qid":"7","op1":"hello","op2":"jai"},{"qid":"8","op1":"hello","op2":"jai"}]', '2016-07-01 00:00:00', 0, '2016-07-01 07:29:02', '2016-07-01 07:29:02'),
(6, 'Rahul Jain', 'rahul@mobilyte.com', 136118, '[{"qid":"5","op1":"hello","op2":"jai"},{"qid":"6","op1":"hello","op2":"jai"},{"qid":"7","op1":"hello","op2":"jai"},{"qid":"8","op1":"hello","op2":"jai"}]', '2016-07-01 00:00:00', 0, '2016-07-01 07:29:09', '2016-07-01 07:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `quote_requests_answers`
--

CREATE TABLE `quote_requests_answers` (
  `quote_requests_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `custom_answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id of the service. this is the key identification for the service',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `sort` int(11) DEFAULT '0' COMMENT 'specifies how the services are ordered when displayed in a list (select etc.)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`, `parent_id`, `sort`) VALUES
(1, 'Car Repair', 'Car Repair', 1, '2016-06-25 14:07:01', '2016-06-25 14:07:01', 0, 0),
(2, 'Hair Saloon', 'Hair Saloon', 1, '2016-06-25 14:07:23', '2016-06-25 14:07:23', 0, 0),
(3, 'dfdfd', 'dfdfd', 1, '2016-06-27 11:43:16', '2016-06-27 11:43:16', 0, 0),
(9, '123456rddfg', '123456rdf', 1, '2016-06-28 08:23:43', '2016-06-28 10:18:12', 0, 0),
(10, 'polishing', 'polishing', 0, '2016-06-28 09:30:26', '2016-06-30 07:39:21', 0, 0),
(11, 'dfd', 'cvc', 1, '2016-06-28 13:10:54', '2016-06-29 13:40:06', 0, 0),
(12, 'new service', 'new service', 1, '2016-06-28 15:34:26', '2016-06-29 14:26:36', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sqoptions`
--

CREATE TABLE `sqoptions` (
  `id` int(11) NOT NULL,
  `service_question_id` int(11) NOT NULL,
  `option_type` varchar(255) NOT NULL,
  `inputbox` int(11) NOT NULL DEFAULT '0',
  `options` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sqoptions`
--

INSERT INTO `sqoptions` (`id`, `service_question_id`, `option_type`, `inputbox`, `options`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, '2', 1, '[{"status":"1","option":"4 door"},{"status":"1","option":"5 doorfrg"},{"status":0,"option":"6 door"},{"status":"1","option":"7 door"}]', 1, '2016-06-22 14:52:51', '2016-06-25 11:30:33'),
(2, 9, '1', 1, '[{"status":"1","option":"fdgdg"},{"status":"1","option":"dfgdfg"},{"status":"1","option":"dfgdxfg"},{"status":"1","option":"fdxgdfgd"}]', 1, '2016-06-22 14:58:58', '2016-06-24 08:14:41'),
(4, 6, '5', 0, '[{"status":0,"option":"dsfsddfgfddffdsdds"},{"status":"1","option":"sdfsdf43543dfdfdf"},{"status":0,"option":"3333333333333"},{"status":0,"option":"4444444444444444fsdds"},{"status":0,"option":"w432235rtrtrtrt"}]', 1, '2016-06-23 08:17:16', '2016-06-24 08:32:02');

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
(1, 'Sukant', 'Sharma', 'sukant@mobilyte.com', '$2y$10$BGs.S.7thTyyHviF2PbL7eOwNyJPXYO.uh2dEV25lg.RjjdzML9Q6', 'IByvo4J4aeQQoTBSSUS5Q5QvWOaSZlxix4vZbtmMKyXJZxAk1hRNtRd227NV', '2015-12-11 07:07:11', '2016-06-28 13:02:04', '2016-06-14 06:15:43'),
(2, 'Rahul', 'Jain', 'rahul.jain@mobilyte.com', '$2y$10$aRVWvTnMQJxjYnCV4fLAN.8O5ZpWK.glY296t5wpKUf0MLIIIdTEq', NULL, '2016-06-15 10:05:23', '2016-06-15 10:09:17', '0000-00-00 00:00:00'),
(3, 'fghj', 'fghj', '26may@mailinator.com', '$2y$10$7g9fbLacyhQvNXKTVkdCtOYIrDZXSY94aJMr6D/hlzqjoyr0OW2D6', NULL, '2016-06-16 08:28:52', '2016-06-16 08:28:52', '0000-00-00 00:00:00'),
(4, 'hjsdfgjfd', 'fdsff', 'rohitkumar.rd26@gmail.com', '$2y$10$1LLiaS1i4HuMva178gBtGOnIvxEovpIX9HN9o5/Smv/tkg6dLE4Ee', NULL, '2016-06-16 09:48:31', '2016-06-16 09:48:31', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `form_types`
--
ALTER TABLE `form_types`
  ADD PRIMARY KEY (`form_type_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `options_key_unique` (`key`);

--
-- Indexes for table `option_type`
--
ALTER TABLE `option_type`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote_requests`
--
ALTER TABLE `quote_requests`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `sqoptions`
--
ALTER TABLE `sqoptions`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `form_types`
--
ALTER TABLE `form_types`
  MODIFY `form_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `option_type`
--
ALTER TABLE `option_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of the question', AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `quote_requests`
--
ALTER TABLE `quote_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id of the service. this is the key identification for the service', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sqoptions`
--
ALTER TABLE `sqoptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
