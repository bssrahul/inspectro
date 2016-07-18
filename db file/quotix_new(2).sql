-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2016 at 01:39 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quotix_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL COMMENT 'the question_id for which this is an answer',
  `answers` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'text of the answer',
  `short_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custom_answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL COMMENT 'defines in which order the anser is displayed at the form',
  `next_question_id` int(11) NOT NULL COMMENT 'question_id of the next question if this answer is selected',
  `option_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answers`, `short_name`, `custom_answer`, `sort`, `next_question_id`, `option_description`, `created_at`, `updated_at`) VALUES
(1, 1, '$0 - $100', '', '0', 0, 4, 'dasfsf', '2016-07-14 08:55:33', '2016-07-14 08:55:33'),
(2, 1, '$200-$300', '', '0', 0, 4, 'sdfsfsdf', '2016-07-14 08:55:33', '2016-07-14 08:55:33'),
(3, 2, '$200 - $500', '', '0', 0, 4, '', '2016-07-14 08:56:22', '2016-07-14 08:56:22'),
(4, 2, '$501 - $1000', '', '0', 0, 3, '', '2016-07-14 08:56:22', '2016-07-14 08:56:22'),
(5, 3, 'Tyre Changing', '', '0', 0, 1, '', '2016-07-14 08:57:41', '2016-07-14 08:57:41'),
(6, 3, 'Engine Service', '', '0', 0, 1, '', '2016-07-14 08:57:42', '2016-07-14 08:57:42'),
(7, 4, '4 hr', '', '0', 0, 0, '', '2016-07-14 08:58:13', '2016-07-14 08:58:13'),
(8, 4, '5 hr', '', '0', 0, 0, '', '2016-07-14 08:58:13', '2016-07-14 08:58:13'),
(11, 6, 'extra1', '', '0', 0, 0, '', '2016-07-14 09:15:00', '2016-07-14 12:31:14'),
(12, 6, 'extra2', '', '0', 0, 0, '', '2016-07-14 09:15:01', '2016-07-14 12:31:08'),
(13, 6, 'dfgdfgdf', '', '0', 0, 1, 'dfgdfgdf', '2016-07-18 11:59:40', '2016-07-18 11:59:40'),
(14, 6, 'dfgdfgdfg', '', '0', 1, 0, 'fghfghfgh', '2016-07-18 11:59:40', '2016-07-18 11:59:40'),
(15, 6, 'bcxvbcvb', '', '0', 0, 0, 'cbvbcvb', '2016-07-18 12:01:47', '2016-07-18 12:01:47'),
(16, 6, 'cvbcvb', '', '0', 0, 0, '', '2016-07-18 12:01:47', '2016-07-18 12:01:47'),
(17, 6, 'dfgdfg', 'Array', '0', 0, 0, '', '2016-07-18 12:04:58', '2016-07-18 12:04:58'),
(18, 6, 'dfgdfg', 'dfgdfgdf', '0', 0, 0, '', '2016-07-18 12:06:33', '2016-07-18 12:06:33'),
(19, 6, 'dfgdfgfg', 'dfgdfgdf', '0', 0, 0, 'dfgdfg', '2016-07-18 12:06:34', '2016-07-18 12:06:34'),
(20, 6, 'dfgdfg', 'dfgdfgdf', '0', 0, 0, '', '2016-07-18 12:06:45', '2016-07-18 12:06:45'),
(21, 6, 'dfgdfgfg', 'dfgdfgdf', '0', 0, 0, 'dfgdfg', '2016-07-18 12:06:45', '2016-07-18 12:06:45'),
(22, 6, '1sdfd', '1dsf', '0', 0, 1, '1', '2016-07-18 12:07:15', '2016-07-18 12:12:01'),
(23, 6, '2 text', '2', 'text', 0, 0, '2', '2016-07-18 12:07:15', '2016-07-18 13:31:02'),
(24, 6, '3', '3', '0', 0, 0, '3', '2016-07-18 12:07:15', '2016-07-18 12:07:15');

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
(5, 'Drop Down'),
(6, 'text');

-- --------------------------------------------------------

--
-- Table structure for table `localstorage`
--

CREATE TABLE `localstorage` (
  `id` int(11) NOT NULL,
  `user_temp_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `question_id` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `localstorage`
--

INSERT INTO `localstorage` (`id`, `user_temp_id`, `service_id`, `question_id`, `options`, `created_at`, `updated_at`) VALUES
(25, 2525, 14, '37', '[90]', '2016-07-11 09:02:05', '0000-00-00 00:00:00'),
(26, 2525, 14, '0', '[{"serviceDate":"flexible_time"}]', '2016-07-11 09:02:10', '0000-00-00 00:00:00'),
(27, 2525, 14, 'p2', '[null]', '2016-07-11 09:02:12', '0000-00-00 00:00:00'),
(28, 2525, 14, 'p3', '[{"zip":"46496"}]', '2016-07-11 09:02:26', '0000-00-00 00:00:00'),
(29, 2525, 14, 'p4', '[null,{"email":"gg@gmail.com"}]', '2016-07-11 09:02:54', '0000-00-00 00:00:00'),
(30, 11362, 1, '30', '[77,78]', '2016-07-11 13:18:08', '0000-00-00 00:00:00'),
(31, 11362, 1, '31', '[79]', '2016-07-11 13:18:11', '0000-00-00 00:00:00'),
(32, 11362, 1, '33', '[83]', '2016-07-11 13:18:12', '0000-00-00 00:00:00'),
(33, 11362, 1, '0', '[{"selected_date":"07\\/12\\/2016"}]', '2016-07-11 13:18:17', '0000-00-00 00:00:00'),
(34, 11362, 1, 'p2', '[null]', '2016-07-11 13:18:20', '0000-00-00 00:00:00'),
(35, 11362, 1, 'p3', '[{"zip":"17383"}]', '2016-07-11 13:18:24', '0000-00-00 00:00:00'),
(36, 11362, 1, 'p4', '[null,{"email":"rahul.jain@mobilyte.com"}]', '2016-07-11 13:18:45', '0000-00-00 00:00:00'),
(37, 11362, 1, 'p5', '[{"name":"Rahul Jain"}]', '2016-07-11 13:18:51', '0000-00-00 00:00:00'),
(78, 57399, 1, '1', '[1]', '2016-07-18 10:56:12', '0000-00-00 00:00:00'),
(79, 57399, 1, '4', '[8]', '2016-07-18 10:56:14', '0000-00-00 00:00:00'),
(80, 57399, 1, '0', '[{"selected_date":"20-07-2016","selected_time":"4:30 PM"}]', '2016-07-18 10:56:18', '0000-00-00 00:00:00'),
(81, 57399, 1, 'p2', '[{"TellusData":"ghxagfkjs"},null]', '2016-07-18 10:56:21', '0000-00-00 00:00:00'),
(82, 57399, 1, 'p3', '[{"zip":"87943"}]', '2016-07-18 10:56:24', '0000-00-00 00:00:00');

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
(1, 'site.name', 'Inspectro', '2015-12-11 04:27:18', '2016-07-13 10:19:45'),
(2, 'site.slogan', 'Inspectro', '2015-12-11 04:27:18', '2016-07-13 10:19:45'),
(3, 'site.description', '', '2015-12-11 04:27:18', '2016-07-13 10:19:45'),
(4, 'site.keywords', '', '2015-12-11 04:27:18', '2016-06-15 08:45:56'),
(5, 'tracking', '', '2015-12-11 04:27:18', '2016-06-15 08:46:02'),
(6, 'facebook.link', 'http://www.facebook.com', '2015-12-11 04:27:18', '2016-07-13 10:09:13'),
(7, 'twitter.link', 'http://www.instagram.com', '2015-12-11 04:27:18', '2016-07-13 10:09:13'),
(8, 'post.permalink', '{slug}', '2015-12-11 04:27:18', '2016-06-15 08:45:57'),
(9, 'ckfinder.prefix', 'inspectro/public/packages/pingpong/admin', '2015-12-11 04:27:18', '2016-07-13 10:16:08'),
(10, 'admin.theme', 'default', '2015-12-11 04:27:18', '2016-07-13 10:16:08'),
(11, 'pagination.perpage', '10', '2015-12-11 04:27:18', '2015-12-23 19:44:13'),
(12, 'site.mission', '', '0000-00-00 00:00:00', '2016-07-13 10:19:45');

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
  `short_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'description field at the top',
  `description_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'description field at the bottom',
  `sort_que` int(11) NOT NULL,
  `form_type_id` int(11) NOT NULL COMMENT 'this is the id of form type -> table form_types',
  `other_custom_field` int(11) NOT NULL DEFAULT '0' COMMENT 'if this is 1 the user will be allowed to enter an individual answer text with other options -> the answer text will be stored in quote_requests_answers',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `service_id`, `title`, `short_name`, `description_1`, `description_2`, `sort_que`, `form_type_id`, `other_custom_field`, `created_at`, `updated_at`) VALUES
(1, 1, 'What is your budget?', '', '', '', 1, 1, 0, '2016-07-14 08:20:22', '2016-07-14 08:20:22'),
(2, 1, 'Please Choose Budget', '', '', '', 2, 3, 0, '2016-07-14 08:20:47', '2016-07-14 08:20:47'),
(3, 1, 'Do you want to another services ?', '', '', '', 3, 1, 0, '2016-07-14 08:22:09', '2016-07-14 08:22:09'),
(4, 1, 'How much time you give to us?', '', '', '', 4, 1, 0, '2016-07-14 08:22:37', '2016-07-14 08:22:37'),
(6, 1, 'extra', '', '', '', 6, 2, 0, '2016-07-14 09:14:42', '2016-07-18 09:21:31'),
(7, 1, 'fdgdf', '', '', '', 7, 1, 0, '2016-07-18 10:13:14', '2016-07-18 10:13:14'),
(8, 1, 'fghfgh', '', 'gfhf', 'fghfgh', 8, 1, 0, '2016-07-18 11:51:23', '2016-07-18 11:51:23'),
(9, 1, 'dgfgdf', '', 'gdfgdfgd', 'dfgdfgfg', 9, 3, 0, '2016-07-18 11:55:14', '2016-07-18 11:55:14'),
(10, 1, 'dfgdfgdf', 'gfdgdfg', 'gdfgdfg', 'dfgdfgd', 10, 1, 0, '2016-07-18 11:59:01', '2016-07-18 11:59:01'),
(14, 1, 'dfgdfg', 'dfgdfg', 'dfgdfg', 'dfgdfg', 11, 2, 0, '2016-07-18 13:05:34', '2016-07-18 13:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `quote_requests`
--

CREATE TABLE `quote_requests` (
  `id` int(11) NOT NULL,
  `user_temp_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `selected_options` text NOT NULL,
  `service_request_date` varchar(255) DEFAULT NULL COMMENT '''Date specified for Hardcoded question->When do you need service''',
  `anything_else_know` text COMMENT '''If anything else should know harcoded value is yes then we have added value to it''',
  `status` int(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_requests`
--

INSERT INTO `quote_requests` (`id`, `user_temp_id`, `service_id`, `full_name`, `email`, `phone_no`, `zipcode`, `selected_options`, `service_request_date`, `anything_else_know`, `status`, `created_at`, `updated_at`) VALUES
(2, 57399, 1, 'Rohit', 'sukant@mobilyte.com', '', '56555', '', 'flexible_time', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 57399, 1, 'Rohit', 'sukant@mobilyte.com', '', '90823', '', '18-07-2016 , 4:45 PM', 'sadjkfhsdkajhfksadjlkfjsadlkjflksadjflkj', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 57399, 1, 'Rohit', 'rohit@gmail.com', '', '34534', '', '20-07-2016 , 4:15 AM', 'Anything else We should\nknow?', 0, '2016-07-18 16:23:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quote_requests_answers`
--

CREATE TABLE `quote_requests_answers` (
  `id` int(11) NOT NULL,
  `user_temp_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `cp_flag` int(11) NOT NULL,
  `quote_requests_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `custom_answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quote_requests_answers`
--

INSERT INTO `quote_requests_answers` (`id`, `user_temp_id`, `service_id`, `cp_flag`, `quote_requests_id`, `answer_id`, `custom_answer`, `question_id`) VALUES
(1, 0, 0, 0, 2, 1, '', 1),
(2, 0, 0, 0, 2, 8, '', 4),
(3, 0, 0, 0, 3, 1, '', 1),
(4, 0, 0, 0, 3, 7, '', 4),
(5, 0, 0, 0, 4, 1, '', 1),
(6, 0, 0, 0, 4, 7, '', 4);

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
  `id` int(11) NOT NULL COMMENT 'id of the service. this is the key identification for the service',
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
(1, 'Car repairing', 'Car repairing', 1, '2016-07-14 08:20:07', '2016-07-14 08:20:07', 0, 0);

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
-- Table structure for table `static_blocks`
--

CREATE TABLE `static_blocks` (
  `id` int(11) NOT NULL,
  `type` enum('process','services','features','testimonial','work') NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `long_description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static_blocks`
--

INSERT INTO `static_blocks` (`id`, `type`, `title`, `description`, `long_description`, `image`, `name`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'work', 'Serach your requirement', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 1111</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 1111</p>\r\n', '319.step-1.png', '', '', 1, '2016-07-07 10:27:33', '2016-07-09 17:52:24'),
(2, 'work', 'Serach your requirement', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 2222</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 2222</p>\r\n', '700.step-2.png', '', '', 1, '2016-07-07 10:35:49', '2016-07-09 17:52:41'),
(3, 'work', 'Serach your requirement', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.3333</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 3333</p>\r\n', '159.step-3.png', '', '', 1, '2016-07-07 10:36:28', '2016-07-09 17:52:04'),
(4, 'services', 'Home Inspection for real estate', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled when an unknown printer took it to make a type specimen book.</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled when an unknown printer took it to make a type specimen book.</p>\r\n', '797.service-1.png', '', '', 1, '2016-07-07 10:44:37', '2016-07-08 13:08:55'),
(5, 'services', 'Home Inspection for real estate', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled when an unknown printer took it to make a type specimen book.</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled when an unknown printer took it to make a type specimen book.</p>\r\n', '378.service-2.png', '', '', 1, '2016-07-07 10:46:26', '2016-07-08 13:09:01'),
(6, 'services', 'Home Inspection for real estate', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled when an unknown printer took it to make a type specimen book.</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled when an unknown printer took it to make a type specimen book.</p>\r\n', '998.service-3.png', '', '', 0, '2016-07-07 10:49:06', '2016-07-13 17:35:08'),
(7, 'features', 'Our Features 1', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '761.feature-1.png', '', '', 1, '2016-07-07 10:54:52', '2016-07-07 18:27:26'),
(8, 'features', 'Our Features 2', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '754.feature-2.png', '', '', 1, '2016-07-07 10:55:56', '2016-07-07 18:26:43'),
(9, 'features', 'Our Features 3', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '805.feature-3.png', '', '', 0, '2016-07-07 10:56:30', '2016-07-08 13:41:46'),
(10, 'features', 'Our Features 4', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '440.feature-4.png', '', '', 1, '2016-07-07 10:57:58', '2016-07-08 14:14:30'),
(11, 'features', 'Our Features 5', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '306.feature-5.png', '', '', 1, '2016-07-07 10:58:51', '2016-07-08 14:14:22'),
(12, 'features', 'Our Features 6', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '285.feature-6.png', '', '', 1, '2016-07-07 10:59:57', '2016-07-08 14:13:40'),
(13, 'features', 'Our Features 7', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '178.feature-7.png', '', '', 1, '2016-07-07 11:02:05', '2016-07-11 17:06:49'),
(14, 'features', 'Our Features 8', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '633.feature-8.png', '', '', 1, '2016-07-07 11:02:32', '2016-07-11 17:06:45'),
(15, 'testimonial', 'Testimonial', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n', '593.despicable-me.jpg', 'Christine Joe', 'Dallas .USA', 1, '2016-07-07 11:30:31', '2016-07-07 19:00:31'),
(16, 'testimonial', 'Testimonial', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n', '151.acasfdsfds.jpg', 'Christine Robbat', 'Dallas .UK', 1, '2016-07-07 11:31:27', '2016-07-07 19:01:27'),
(17, 'testimonial', 'Testimonial 3', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n', '404.imagesasdas.jpg', 'Shen Watson ', 'Sydney, AUS', 0, '2016-07-07 11:32:44', '2016-07-13 17:34:37'),
(18, 'process', 'Receive Request', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an 1111</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an 1111</p>\r\n', '160.images.jpg', '', '', 1, '2016-07-09 10:02:55', '2016-07-09 17:32:55'),
(19, 'process', 'Receive Request', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an 2222</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an 2222</p>\r\n', '919.acasfdsfds.jpg', '', '', 0, '2016-07-09 10:03:45', '2016-07-13 17:34:22'),
(20, 'process', 'Receive Request', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an 3333</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an 3333</p>\r\n', '291.despicable-me.jpg', '', '', 0, '2016-07-09 10:04:07', '2016-07-13 17:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE `static_pages` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_heading` text NOT NULL,
  `page_content` text NOT NULL,
  `page_link` varchar(255) NOT NULL,
  `bannar_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `page_title`, `page_heading`, `page_content`, `page_link`, `bannar_image`, `status`, `created_at`, `updated_at`) VALUES
(16, 'Who we are?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever but also the leap into electronic typesetting, remaining ', '  <div class="howitwork">\r\n                    	<div class="container">\r\n                        	<div class="row">\r\n                        					<div class="inhead-area">\r\n                            	                    	<h2>How does Inspectaro work?</h2>\r\n                        	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>                        \r\n\r\n                            </div>\r\n                            				<!--Privacy Content-->\r\n                                            <div class="privacy-content">\r\n                                            	<p class="pc-head">INFORMATION WE COLLECT</p>    \r\n                                                	<p>How we collect and store information depends on how you access and use the Platform. We collect information in multiple ways including when you provide information directly to us, when you permit third parties to provide information to us, and when we passively collect information from you, such as information collected from your browser or device.</p>                                        	\r\n                                                    <p class="pc-head2">Information You Provide Directly to Us</p>\r\n                                                    <p>We may collect information from you during your use or access of the Platform, such as:</p>\r\n                                                    \r\n\r\n                                                    	    When you register for an Account;\r\n                                                    <ul>\r\n                                                      <li>          When you participate in polls or surveys;</li>\r\n                                                          <li>      When you enroll for electronic newsletters;</li>\r\n                                                           <li>     When you request a quote or other information;</li>\r\n                                                            <li>    When you submit a quote;</li>\r\n                                                             <li>   When you make a purchase;</li>\r\n                                                              <li>  When you fill out any forms;</li>\r\n                                                               <li> When you enter a sweepstakes or contest, or register for a promotion;</li>\r\n                                                               <li> When you transmit User Content;</li>\r\n                                                                <li>When you download or use one of our mobile applications; or</li>\r\n                                                                <li>When you otherwise communicate with us or other users through the Platform.</li>\r\n                                                    </ul>\r\n                                                    \r\n                                                    <p>The information you provide directly to us may concern you or others and may include, but is not limited to: (a) name; (b) zip code; (c) email address; (d) home or business telephone number; (e) home, business or mailing address; (f) demographic information (e.g., gender, age, political preference, education, race or ethnic origin, and other information relevant to user surveys and/or offers); (g) date of birth; (h) insurance information; (i) photographs; (j) information about your project, request or need; (k) video or audio files; and/or (l) in certain circumstances, payment and/or identity verification information. It may also include information specific to services you are requesting or offering through the Platform, such as a business name, service description, qualifications and credentials. You are not required to provide us with such information, but certain features of the Platform may not be accessible or available, absent the provision of the requested information.</p>\r\n                                                    <p class="pc-head2">Information from Affiliates, Social Networking Sites, and other Non-affiliated Third Parties</p>\r\n                                                    <p>We may collect information about you or others through Thumbtack affiliates or through non-affiliated third parties. For example, you may be able to access the Platform through a social networking account, such as Facebook. If you access the Platform through your Facebook account, you may allow us to have access to certain information in your Facebook profile. This may include your name, profile picture, gender, networks, user IDs, list of friends, location, date of birth, email address, photos, videos, people you follow and/or who follow you, and/or your posts or "likes."<br><br>\r\n\r\n\r\n\r\nSocial networking sites, such as Facebook, have their own policies for handling your information. For a description of how these sites may use and disclose your information including any information you make public, please consult the sites'' privacy policies. We have no control over how any third-party site uses or discloses the personal information it collects about you.<br>\r\n<br>\r\n\r\n\r\nWe may also collect information about you or others through non-affiliated third parties. For example, to the extent permitted by law, we may, in our sole discretion, ask for and collect supplemental information from third parties, such as information about your credit from a credit bureau, or information to verify your identity or trustworthiness, or for other fraud or safety protection purposes. We may combine information that we collect from you through the Platform with information that we obtain from such third parties and information derived from any other products or services we provide.</p>\r\n\r\n<p class="pc-head">HOW THUMBTACK USES THE INFORMATION WE COLLECT</p>\r\n	<p>How we collect and store information depends on how you access and use the Platform. We collect information in multiple ways including when you provide information directly to us, when you permit third parties to provide information to us, and when we passively collect information from you, such as information collected from your browser or device.</p>                                        	\r\n                                                    <p class="pc-head2">Information You Provide Directly to Us</p>\r\n                                                    <p>We may collect information from you during your use or access of the Platform, such as:</p>\r\n                                                    \r\n\r\n                                                    	    When you register for an Account;\r\n                                                    <ul>\r\n                                                      <li>          When you participate in polls or surveys;</li>\r\n                                                          <li>      When you enroll for electronic newsletters;</li>\r\n                                                           <li>     When you request a quote or other information;</li>\r\n                                                            <li>    When you submit a quote;</li>\r\n                                                             <li>   When you make a purchase;</li>\r\n                                                              <li>  When you fill out any forms;</li>\r\n                                                               <li> When you enter a sweepstakes or contest, or register for a promotion;</li>\r\n                                                               <li> When you transmit User Content;</li>\r\n                                                                <li>When you download or use one of our mobile applications; or</li>\r\n                                                                <li>When you otherwise communicate with us or other users through the Platform.</li>\r\n                                                    </ul>\r\n                                                    \r\n                                                    <p>The information you provide directly to us may concern you or others and may include, but is not limited to: (a) name; (b) zip code; (c) email address; (d) home or business telephone number; (e) home, business or mailing address; (f) demographic information (e.g., gender, age, political preference, education, race or ethnic origin, and other information relevant to user surveys and/or offers); (g) date of birth; (h) insurance information; (i) photographs; (j) information about your project, request or need; (k) video or audio files; and/or (l) in certain circumstances, payment and/or identity verification information. It may also include information specific to services you are requesting or offering through the Platform, such as a business name, service description, qualifications and credentials. You are not required to provide us with such information, but certain features of the Platform may not be accessible or available, absent the provision of the requested information.</p>\r\n                                                    <p class="pc-head2">Information from Affiliates, Social Networking Sites, and other Non-affiliated Third Parties</p>\r\n                                                    <p>We may collect information about you or others through Thumbtack affiliates or through non-affiliated third parties. For example, you may be able to access the Platform through a social networking account, such as Facebook. If you access the Platform through your Facebook account, you may allow us to have access to certain information in your Facebook profile. This may include your name, profile picture, gender, networks, user IDs, list of friends, location, date of birth, email address, photos, videos, people you follow and/or who follow you, and/or your posts or "likes."<br><br>\r\n\r\n\r\n\r\nSocial networking sites, such as Facebook, have their own policies for handling your information. For a description of how these sites may use and disclose your information including any information you make public, please consult the sites'' privacy policies. We have no control over how any third-party site uses or discloses the personal information it collects about you.<br>\r\n<br>\r\n\r\n\r\nWe may also collect information about you or others through non-affiliated third parties. For example, to the extent permitted by law, we may, in our sole discretion, ask for and collect supplemental information from third parties, such as information about your credit from a credit bureau, or information to verify your identity or trustworthiness, or for other fraud or safety protection purposes. We may combine information that we collect from you through the Platform with information that we obtain from such third parties and information derived from any other products or services we provide.</p>\r\n\r\n\r\n\r\n                                                    \r\n                                            </div>\r\n                                            <!--/Privacy Content-->\r\n                            </div>\r\n                        </div>\r\n                    </div>', 'about-us', '4917.about-us-bgr.png', 1, '2016-07-07 05:35:41', '2016-07-12 17:00:08'),
(17, 'Who we are?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever but also the leap into electronic typesetting, remaining ', '<p>&lt;!--Our Work--&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;section class=&quot;ow-wrap&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;container&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;row&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;ow-area&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;h6&gt;Our Work&lt;/h6&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged t has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&lt;/p&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-1.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-2.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-3.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-4.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-5.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-6.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-7.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-8.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-9.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-1.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-2.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-3.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/section&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;!--/Our Work--&gt;</p>\r\n', 'about-us', '343.about-us-bgr.png', 1, '2016-07-07 12:54:11', '2016-07-08 18:20:04'),
(18, 'Contact Us', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever but also the leap into electronic typesetting, remaining ', '<section class="contact-us">                        	\r\n                        	<div class="container"> \r\n                            <div class="row">\r\n                            	<div class="cont-head">\r\n                                	<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">\r\n                                </div>\r\n                            	<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">\r\n                                	<h2>Contact Us</h2>                                	\r\n                                    	<p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. </p>\r\n                                </div>                                	\r\n                            	<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">\r\n                                </div>  \r\n                                	\r\n                                </div>\r\n                            </div> \r\n                            <div class="row">   \r\n                                <div class="cont-form-area">\r\n                                	<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">                                    	\r\n                                    </div>\r\n                                	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12"> \r\n                                    	<div class="cfa-lft">\r\n                                        <h4>Contact us for more details</h4>\r\n                                        	<p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, </p>\r\n                                            \r\n                                            <ul>\r\n                                            	<li><i class="fa fa-map-marker" aria-hidden="true"></i>\r\nStreet name , City name , provenance , \r\n<span>Germany. Pin code 253698</span></li>\r\n                                                <li><i class="fa fa-envelope" aria-hidden="true"></i>\r\n                                                supoort@inspectaro.com\r\n										<span>		info@inspectaro.com</span>\r\n</li>\r\n                                                <li><i class="fa fa-phone" aria-hidden="true"></i> +1 98756 32659, + 68956 23659</li>\r\n                                            </ul>\r\n                                        </div>\r\n                                    </div>', 'contact-us', '827.contact-us-bgr.png', 1, '2016-07-07 12:56:13', '2016-07-12 20:17:24'),
(19, 'Privacy Policy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever but also the leap into electronic typesetting, remaining ', '<div class="howitwork">\r\n<div class="container">\r\n<div class="row">\r\n<div class="inhead-area">\r\n<h2>How does Inspectaro work?</h2>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n</div>\r\n<!--Privacy Content-->\r\n\r\n<div class="privacy-content">\r\n<p><strong>INFORMATION WE COLLECT</strong></p>\r\n\r\n<p>How we collect and store information depends on how you access and use the Platform. We collect information in multiple ways including when you provide information directly to us, when you permit third parties to provide information to us, and when we passively collect information from you, such as information collected from your browser or device.</p>\r\n\r\n<p><strong><em>Information You Provide Directly to Us</em></strong></p>\r\n\r\n<p>We may collect information from you during your use or access of the Platform, such as:</p>\r\nWhen you register for an Account;\r\n\r\n<ul>\r\n	<li>When you participate in polls or surveys;</li>\r\n	<li>When you enroll for electronic newsletters;</li>\r\n	<li>When you request a quote or other information;</li>\r\n	<li>When you submit a quote;</li>\r\n	<li>When you make a purchase;</li>\r\n	<li>When you fill out any forms;</li>\r\n	<li>When you enter a sweepstakes or contest, or register for a promotion;</li>\r\n	<li>When you transmit User Content;</li>\r\n	<li>When you download or use one of our mobile applications; or</li>\r\n	<li>When you otherwise communicate with us or other users through the Platform.</li>\r\n</ul>\r\n\r\n<p>The information you provide directly to us may concern you or others and may include, but is not limited to: (a) name; (b) zip code; (c) email address; (d) home or business telephone number; (e) home, business or mailing address; (f) demographic information (e.g., gender, age, political preference, education, race or ethnic origin, and other information relevant to user surveys and/or offers); (g) date of birth; (h) insurance information; (i) photographs; (j) information about your project, request or need; (k) video or audio files; and/or (l) in certain circumstances, payment and/or identity verification information. It may also include information specific to services you are requesting or offering through the Platform, such as a business name, service description, qualifications and credentials. You are not required to provide us with such information, but certain features of the Platform may not be accessible or available, absent the provision of the requested information.</p>\r\n\r\n<p><strong>Information from Affiliates, Social Networking Sites, and other Non-affiliated Third Parties</strong></p>\r\n\r\n<p>We may collect information about you or others through Thumbtack affiliates or through non-affiliated third parties. For example, you may be able to access the Platform through a social networking account, such as Facebook. If you access the Platform through your Facebook account, you may allow us to have access to certain information in your Facebook profile. This may include your name, profile picture, gender, networks, user IDs, list of friends, location, date of birth, email address, photos, videos, people you follow and/or who follow you, and/or your posts or &quot;likes.&quot;<br />\r\n<br />\r\nSocial networking sites, such as Facebook, have their own policies for handling your information. For a description of how these sites may use and disclose your information including any information you make public, please consult the sites&#39; privacy policies. We have no control over how any third-party site uses or discloses the personal information it collects about you.<br />\r\n<br />\r\nWe may also collect information about you or others through non-affiliated third parties. For example, to the extent permitted by law, we may, in our sole discretion, ask for and collect supplemental information from third parties, such as information about your credit from a credit bureau, or information to verify your identity or trustworthiness, or for other fraud or safety protection purposes. We may combine information that we collect from you through the Platform with information that we obtain from such third parties and information derived from any other products or services we provide.</p>\r\n\r\n<p><strong>HOW THUMBTACK USES THE INFORMATION WE COLLECT</strong></p>\r\n\r\n<p>How we collect and store information depends on how you access and use the Platform. We collect information in multiple ways including when you provide information directly to us, when you permit third parties to provide information to us, and when we passively collect information from you, such as information collected from your browser or device.</p>\r\n\r\n<p><strong><em>Information You Provide Directly to Us</em></strong></p>\r\n\r\n<p>We may collect information from you during your use or access of the Platform, such as:</p>\r\nWhen you register for an Account;\r\n\r\n<ul>\r\n	<li>When you participate in polls or surveys;</li>\r\n	<li>When you enroll for electronic newsletters;</li>\r\n	<li>When you request a quote or other information;</li>\r\n	<li>When you submit a quote;</li>\r\n	<li>When you make a purchase;</li>\r\n	<li>When you fill out any forms;</li>\r\n	<li>When you enter a sweepstakes or contest, or register for a promotion;</li>\r\n	<li>When you transmit User Content;</li>\r\n	<li>When you download or use one of our mobile applications; or</li>\r\n	<li>When you otherwise communicate with us or other users through the Platform.</li>\r\n</ul>\r\n\r\n<p>The information you provide directly to us may concern you or others and may include, but is not limited to: (a) name; (b) zip code; (c) email address; (d) home or business telephone number; (e) home, business or mailing address; (f) demographic information (e.g., gender, age, political preference, education, race or ethnic origin, and other information relevant to user surveys and/or offers); (g) date of birth; (h) insurance information; (i) photographs; (j) information about your project, request or need; (k) video or audio files; and/or (l) in certain circumstances, payment and/or identity verification information. It may also include information specific to services you are requesting or offering through the Platform, such as a business name, service description, qualifications and credentials. You are not required to provide us with such information, but certain features of the Platform may not be accessible or available, absent the provision of the requested information.</p>\r\n\r\n<p><strong><em>Information from Affiliates, Social Networking Sites, and other Non-affiliated Third Parties</em></strong></p>\r\n\r\n<p>We may collect information about you or others through Thumbtack affiliates or through non-affiliated third parties. For example, you may be able to access the Platform through a social networking account, such as Facebook. If you access the Platform through your Facebook account, you may allow us to have access to certain information in your Facebook profile. This may include your name, profile picture, gender, networks, user IDs, list of friends, location, date of birth, email address, photos, videos, people you follow and/or who follow you, and/or your posts or &quot;likes.&quot;<br />\r\n<br />\r\nSocial networking sites, such as Facebook, have their own policies for handling your information. For a description of how these sites may use and disclose your information including any information you make public, please consult the sites&#39; privacy policies. We have no control over how any third-party site uses or discloses the personal information it collects about you.<br />\r\n<br />\r\nWe may also collect information about you or others through non-affiliated third parties. For example, to the extent permitted by law, we may, in our sole discretion, ask for and collect supplemental information from third parties, such as information about your credit from a credit bureau, or information to verify your identity or trustworthiness, or for other fraud or safety protection purposes. We may combine information that we collect from you through the Platform with information that we obtain from such third parties and information derived from any other products or services we provide.</p>\r\n</div>\r\n<!--/Privacy Content--></div>\r\n</div>\r\n</div>\r\n', 'privacy-policy', '395.ppolicy-bgr.png', 1, '2016-07-07 12:59:42', '2016-07-12 19:59:29'),
(20, 'Accomplish (almost) anything', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span> Lorem Ipsum has been the industry''s standard dummy text ever   but </span>also the leap into electronic typesetting, remaining ', '<div class="inhead-area">\r\n<h2>How does Inspectaro work?</h2>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n</div>\r\n', 'work', '383.inner-banner-1.png', 1, '2016-07-07 13:02:02', '2016-07-09 15:55:57');

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
(1, 'Sukant', 'Sharma', 'sukant@mobilyte.com', '$2y$10$BGs.S.7thTyyHviF2PbL7eOwNyJPXYO.uh2dEV25lg.RjjdzML9Q6', 'bjLCiUHFEZg2EXEP46jkps5TLzPDdQj9I1QnRZ2rdBnqjTrBPMizubA2FF6e', '2015-12-11 07:07:11', '2016-07-18 09:44:52', '2016-06-14 06:15:43'),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

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
-- Indexes for table `localstorage`
--
ALTER TABLE `localstorage`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `quote_requests`
--
ALTER TABLE `quote_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote_requests_answers`
--
ALTER TABLE `quote_requests_answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `question_id` (`question_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
  MODIFY `form_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `localstorage`
--
ALTER TABLE `localstorage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of the question', AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `quote_requests`
--
ALTER TABLE `quote_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quote_requests_answers`
--
ALTER TABLE `quote_requests_answers`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of the service. this is the key identification for the service', AUTO_INCREMENT=4;
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
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quote_requests_answers`
--
ALTER TABLE `quote_requests_answers`
  ADD CONSTRAINT `quote_requests_answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
