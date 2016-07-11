-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2016 at 09:24 AM
-- Server version: 5.1.73-log
-- PHP Version: 5.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quotix_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL COMMENT 'the question_id for which this is an answer',
  `answers` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'text of the answer',
  `custom_answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL COMMENT 'defines in which order the anser is displayed at the form',
  `next_question_id` int(11) NOT NULL COMMENT 'question_id of the next question if this answer is selected',
  `option_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=99 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answers`, `custom_answer`, `sort`, `next_question_id`, `option_description`, `created_at`, `updated_at`) VALUES
(1, 2, 'dfgdgdg', '1', 0, 3, '', '2016-06-27 10:51:40', '2016-06-27 10:51:40'),
(2, 4, 'fgfdgdfg', '1', 33, 3, '', '2016-06-27 10:52:09', '2016-06-27 10:52:09'),
(30, 4, 'Outer Wall Painting', '0', 2, 3, '', '2016-06-27 12:57:56', '2016-06-27 12:59:37'),
(85, 34, 'please fill it', 'text', 1, 35, '', '2016-07-08 08:11:28', '2016-07-08 08:20:30'),
(6, 1, 'dfgdfg', '1', 2, 1, '', '2016-06-27 12:15:15', '2016-06-27 12:15:15'),
(7, 1, 'dfgdfg', '1', 2, 1, '', '2016-06-27 12:16:00', '2016-06-27 12:16:00'),
(8, 2, 'dfgdfg', '1', 2, 1, '', '2016-06-27 12:16:41', '2016-06-27 12:16:41'),
(9, 2, 'dfgdfg', '1', 2, 1, '', '2016-06-27 12:17:27', '2016-06-27 12:17:27'),
(10, 2, 'dfgdfg', '1', 2, 1, '', '2016-06-27 12:17:52', '2016-06-27 12:17:52'),
(35, 5, 'dfgfdg', '1', 0, 2, '', '2016-06-28 08:43:21', '2016-06-28 08:43:21'),
(29, 4, 'Door Painting', '0', 1, 3, '', '2016-06-27 12:57:56', '2016-06-27 13:27:42'),
(36, 5, 'dfgfdgdf', '1', 4, 2, '', '2016-06-28 08:43:43', '2016-06-28 08:43:43'),
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
(50, 2, 'vbmvbmbm', '0', 0, 0, '', '2016-06-28 11:41:21', '2016-06-28 13:32:58'),
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
(71, 4, 'info is processd data', 'dhfdhygfhg', 1, 0, '', '2016-06-29 07:44:23', '0000-00-00 00:00:00'),
(72, 23, 'its gud', 'text', 0, 0, '', '2016-06-30 07:55:09', '2016-06-30 07:55:09'),
(73, 23, 'gud one', 'date', 0, 0, '', '2016-06-30 07:55:09', '2016-06-30 07:55:09'),
(74, 23, 'none', '0', 0, 0, '', '2016-06-30 07:55:09', '2016-06-30 07:55:09'),
(75, 28, 'I want quotes by email ', 'text', 0, 0, '', '2016-06-30 08:06:12', '2016-06-30 08:06:12'),
(76, 28, 'I want quotes by text message', 'text', 0, 0, '', '2016-06-30 08:06:12', '2016-06-30 08:06:12'),
(77, 30, 'Oil Changes', '0', 0, 31, '', '2016-06-30 12:55:18', '2016-06-30 12:55:18'),
(78, 30, 'tyres', '0', 0, 32, '', '2016-06-30 12:55:18', '2016-06-30 12:55:18'),
(79, 31, 'yes', '0', 0, 33, '', '2016-06-30 12:56:51', '2016-06-30 12:56:51'),
(80, 31, 'No', '0', 0, 33, '', '2016-06-30 12:56:51', '2016-06-30 12:56:51'),
(81, 32, 'yes', '0', 0, 33, '', '2016-07-01 07:09:59', '2016-07-01 07:09:59'),
(82, 32, 'no', '0', 0, 33, '', '2016-07-01 07:09:59', '2016-07-01 07:09:59'),
(83, 33, 'yes', '0', 0, 0, '', '2016-07-01 09:56:21', '2016-07-01 09:56:21'),
(84, 33, 'no', '0', 0, 0, '', '2016-07-01 09:56:21', '2016-07-01 09:56:21'),
(86, 35, 'new', '0', 0, 36, '', '2016-07-08 08:12:16', '2016-07-08 08:12:16'),
(87, 35, 'old', '0', 0, 36, '', '2016-07-08 08:12:16', '2016-07-08 08:12:16'),
(88, 36, 'yes', '0', 0, 0, '', '2016-07-08 08:17:32', '2016-07-08 08:17:32'),
(89, 36, 'no', '0', 0, 0, '', '2016-07-08 08:17:32', '2016-07-08 08:17:32'),
(90, 37, 'Polishing1', '0', 0, 0, 'test', '2016-07-08 21:14:15', '2016-07-08 21:14:15'),
(91, 37, 'Polishing2', '0', 0, 0, '', '2016-07-08 21:14:15', '2016-07-08 21:14:15'),
(92, 38, '$200', '0', 0, 0, '', '2016-07-08 21:17:02', '2016-07-08 21:17:02'),
(93, 38, '$500', '0', 0, 0, '', '2016-07-08 21:17:02', '2016-07-08 21:17:02'),
(94, 39, 'Neubauvorhaben', '0', 1, 40, 'Beschreibung 1', '2016-07-09 14:46:57', '2016-07-09 14:50:32'),
(95, 39, 'Sonstiges', '0', 2, 40, '', '2016-07-09 14:46:57', '2016-07-09 14:50:36'),
(96, 40, 'Baugrundgutachten', '0', 1, 0, '', '2016-07-09 14:48:28', '2016-07-09 14:48:28'),
(97, 40, 'Feststellung der Versickerungsfähigkeit', '0', 2, 0, '', '2016-07-09 14:48:28', '2016-07-09 14:48:28'),
(98, 40, 'Untersuchung auf Schadstoffe', '0', 3, 0, '', '2016-07-09 14:48:28', '2016-07-09 14:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'post',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

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

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sorting_key` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

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

CREATE TABLE IF NOT EXISTS `form_types` (
  `form_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `op_type` varchar(255) NOT NULL,
  PRIMARY KEY (`form_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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

CREATE TABLE IF NOT EXISTS `localstorage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_temp_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `question_id` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
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

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `options_key_unique` (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

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

CREATE TABLE IF NOT EXISTS `option_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `op_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=78 ;

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

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

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

CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

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

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of the question',
  `service_id` int(11) NOT NULL COMMENT 'id of the service, related to the services-table',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'question title',
  `description_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'description field at the top',
  `description_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'description field at the bottom',
  `sort_que` int(11) NOT NULL,
  `form_type_id` int(11) NOT NULL COMMENT 'this is the id of form type -> table form_types',
  `other_custom_field` int(11) NOT NULL DEFAULT '0' COMMENT 'if this is 1 the user will be allowed to enter an individual answer text with other options -> the answer text will be stored in quote_requests_answers',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `service_id`, `title`, `description_1`, `description_2`, `sort_que`, `form_type_id`, `other_custom_field`, `created_at`, `updated_at`) VALUES
(1, 0, 'fdsgsdg', 'dfgdfgfg', 'fdgdfgdfg', 0, 1, 0, '2016-06-25 14:08:06', '2016-06-25 14:08:06'),
(31, 1, 'Do you bring your own oil?', 'car ', 'car', 0, 1, 0, '2016-06-30 12:25:22', '2016-06-30 12:25:22'),
(30, 1, 'What kind of car repair do you like?', 'car', 'car', 1, 2, 0, '2016-06-30 12:22:18', '2016-06-30 12:22:18'),
(34, 2, 'what is your budget?', 'for the youth of this era', 'for the youth of this era', 1, 1, 0, '2016-07-08 08:09:42', '2016-07-08 12:54:46'),
(35, 2, 'what is you required style?', 'for the youth of this era', 'for the youth of this era', 0, 1, 0, '2016-07-08 08:10:14', '2016-07-08 08:10:14'),
(5, 3, 'what is information?', 'gfdgfdg', 'dfgdfgdf', 0, 2, 0, '2016-06-27 11:44:15', '2016-06-27 11:44:15'),
(7, 3, 'dfhbdf', 'bcvbcvvcbc', 'bcvbcbcvbc', 0, 2, 0, '2016-06-27 12:20:57', '2016-06-27 12:21:04'),
(8, 5, 'What king of painting you want?', 'What king of painting you want?', 'What king of painting you want?', 0, 2, 0, '2016-06-27 12:51:43', '2016-06-27 12:54:48'),
(11, 9, 'fdgdfgdf', 'fgdgdfgf', 'fdgdfgdfg', 0, 2, 0, '2016-06-28 08:56:29', '2016-06-28 08:56:29'),
(12, 9, 'fdfdfdf', '123abc', '123', 0, 2, 0, '2016-06-28 08:59:10', '2016-06-28 10:18:35'),
(13, 9, '67876abc12345', '67867abc123454', '678678fdghgfds', 0, 3, 0, '2016-06-28 09:01:27', '2016-06-28 09:18:06'),
(32, 1, 'Do you bring your own tyres?', 'car', 'car', 0, 1, 0, '2016-06-30 12:25:55', '2016-06-30 12:25:55'),
(19, 10, 'fdgfdg', 'gfdgfg', 'fdgdf', 0, 1, 0, '2016-06-28 11:47:53', '2016-06-28 11:47:53'),
(20, 11, 'hffgh', 'hfghfgh', 'hfghfgh', 0, 1, 0, '2016-06-28 14:50:42', '2016-06-28 14:50:42'),
(22, 12, 'new Question 1', 'new Question 1', 'new Question 1', 0, 1, 1, '2016-06-28 15:34:54', '2016-06-28 15:34:54'),
(23, 12, 'gghghgh', 'hjgghghg', 'hghghhhg', 0, 1, 0, '2016-06-29 08:56:53', '2016-06-29 08:56:53'),
(27, 13, 'Please confirm where You need the Services?', 'Enter your ZipCode', 'Enter your ZipCode', 0, 1, 1, '2016-06-30 08:00:29', '2016-06-30 08:00:29'),
(28, 13, 'How Would You Like to Receive Quotes?', 'select the option to enter the details.', 'select the option to enter the details.', 0, 1, 0, '2016-06-30 08:02:06', '2016-06-30 08:02:06'),
(29, 13, 'Please Enter your Full Name?', 'For personal details', 'For personal details', 0, 1, 1, '2016-06-30 08:03:37', '2016-06-30 08:03:37'),
(33, 1, 'Do you have a service plan?', 'car', 'car', 0, 1, 0, '2016-06-30 12:26:30', '2016-06-30 12:26:30'),
(36, 2, 'Do you like home service?', 'for the youth of this era', 'for the youth of this era', 0, 3, 0, '2016-07-08 08:10:45', '2016-07-08 08:30:04'),
(37, 14, 'test1', 'test1', 'test1', 1, 2, 0, '2016-07-08 21:25:08', '2016-07-08 21:25:08'),
(38, 14, 'test2', 'test2', 'test2', 0, 1, 0, '2016-07-08 21:25:22', '2016-07-08 21:25:22'),
(39, 15, 'Wofür benötigen Sie den Bodengutachter?', '-', '-', 1, 1, 0, '2016-07-09 14:45:27', '2016-07-09 14:45:27'),
(40, 15, 'Welche Bereiche soll der Bodengutachter prüfen? ', '-', '-', 0, 2, 0, '2016-07-09 14:47:49', '2016-07-09 14:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `quote_requests`
--

CREATE TABLE IF NOT EXISTS `quote_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_temp_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `selected_options` text NOT NULL,
  `service_request_date` datetime NOT NULL COMMENT '''Date specified for Hardcoded question->When do you need service''',
  `anything_else_know` text COMMENT '''If anything else should know harcoded value is yes then we have added value to it''',
  `status` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `quote_requests`
--

INSERT INTO `quote_requests` (`id`, `user_temp_id`, `service_id`, `full_name`, `email`, `phone_no`, `zipcode`, `selected_options`, `service_request_date`, `anything_else_know`, `status`, `created_at`, `updated_at`) VALUES
(1, 88627, 1, 'Sukant Sharma', 'sukant@mobilyte.com', '9872749463', '12345', '', '0000-00-00 00:00:00', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quote_requests_answers`
--

CREATE TABLE IF NOT EXISTS `quote_requests_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_requests_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `custom_answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `quote_requests_answers`
--

INSERT INTO `quote_requests_answers` (`id`, `quote_requests_id`, `answer_id`, `custom_answer`, `question_id`) VALUES
(1, 1, 77, '', 30),
(2, 1, 78, '', 30),
(3, 1, 79, '', 31),
(4, 1, 83, '', 33);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

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

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id of the service. this is the key identification for the service',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `sort` int(11) DEFAULT '0' COMMENT 'specifies how the services are ordered when displayed in a list (select etc.)',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`, `parent_id`, `sort`) VALUES
(1, 'Car Repair', 'Car Repair', 1, '2016-06-25 14:07:01', '2016-06-25 14:07:01', 0, 0),
(2, 'Hair Saloon', 'Hair Saloon', 1, '2016-06-25 14:07:23', '2016-06-25 14:07:23', 0, 0),
(14, 'Polishing', 'Polishing', 1, '2016-07-08 21:13:30', '2016-07-08 21:13:30', 0, 0),
(15, 'Bodengutachten', 'Test Beschreibung ...Test Beschreibung ...Test Beschreibung ...', 1, '2016-07-09 14:43:42', '2016-07-09 14:43:42', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sqoptions`
--

CREATE TABLE IF NOT EXISTS `sqoptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_question_id` int(11) NOT NULL,
  `option_type` varchar(255) NOT NULL,
  `inputbox` int(11) NOT NULL DEFAULT '0',
  `options` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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

CREATE TABLE IF NOT EXISTS `static_blocks` (
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
(6, 'services', 'Home Inspection for real estate', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled when an unknown printer took it to make a type specimen book.</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled when an unknown printer took it to make a type specimen book.</p>\r\n', '998.service-3.png', '', '', 1, '2016-07-07 10:49:06', '2016-07-08 13:09:09'),
(7, 'features', 'Our Features 1', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '761.feature-1.png', '', '', 1, '2016-07-07 10:54:52', '2016-07-07 18:27:26'),
(8, 'features', 'Our Features 2', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '754.feature-2.png', '', '', 1, '2016-07-07 10:55:56', '2016-07-07 18:26:43'),
(9, 'features', 'Our Features 3', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '805.feature-3.png', '', '', 0, '2016-07-07 10:56:30', '2016-07-08 13:41:46'),
(10, 'features', 'Our Features 4', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '440.feature-4.png', '', '', 1, '2016-07-07 10:57:58', '2016-07-08 14:14:30'),
(11, 'features', 'Our Features 5', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '306.feature-5.png', '', '', 1, '2016-07-07 10:58:51', '2016-07-08 14:14:22'),
(12, 'features', 'Our Features 6', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '285.feature-6.png', '', '', 1, '2016-07-07 10:59:57', '2016-07-08 14:13:40'),
(13, 'features', 'Our Features 7', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '178.feature-7.png', '', '', 1, '2016-07-07 11:02:05', '2016-07-08 14:13:38'),
(14, 'features', 'Our Features 8', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer</p>\r\n', '633.feature-8.png', '', '', 1, '2016-07-07 11:02:32', '2016-07-07 18:32:32'),
(15, 'testimonial', 'Testimonial', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n', '593.despicable-me.jpg', 'Christine Joe', 'Dallas .USA', 1, '2016-07-07 11:30:31', '2016-07-07 19:00:31'),
(16, 'testimonial', 'Testimonial', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n', '151.acasfdsfds.jpg', 'Christine Robbat', 'Dallas .UK', 1, '2016-07-07 11:31:27', '2016-07-07 19:01:27'),
(17, 'testimonial', 'Testimonial 3', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n', '404.imagesasdas.jpg', 'Shen Watson ', 'Sydney, AUS', 1, '2016-07-07 11:32:44', '2016-07-07 19:02:44'),
(18, 'process', 'Receive Request', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an 1111</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an 1111</p>\r\n', '160.images.jpg', '', '', 1, '2016-07-09 10:02:55', '2016-07-09 17:32:55'),
(19, 'process', 'Receive Request', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an 2222</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an 2222</p>\r\n', '919.acasfdsfds.jpg', '', '', 1, '2016-07-09 10:03:45', '2016-07-09 17:33:45'),
(20, 'process', 'Receive Request', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an 3333</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an 3333</p>\r\n', '291.despicable-me.jpg', '', '', 1, '2016-07-09 10:04:07', '2016-07-09 17:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE IF NOT EXISTS `static_pages` (
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
(16, 'Who we are?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever but also the leap into electronic typesetting, remaining ', '<div class="ib-txt">\r\n<h2>We are a team of professional we like renovation house!</h2>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged t has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n</div>\r\n\r\n<div class="ib-txt">\r\n<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot; Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n1914 translation by H. Rackham\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n1914 translation by H. Rackham\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n</div>\r\n', 'about-us', '4917.about-us-bgr.png', 1, '2016-07-07 05:35:41', '2016-07-08 19:08:56'),
(17, 'Who we are?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever but also the leap into electronic typesetting, remaining ', '<p>&lt;!--Our Work--&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;section class=&quot;ow-wrap&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;container&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;row&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;ow-area&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;h6&gt;Our Work&lt;/h6&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged t has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&lt;/p&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-1.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-2.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-3.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-4.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-5.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-6.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-7.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-8.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-9.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-1.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-2.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class=&quot;col-lg-3 col-md-3 col-sm-6 col-xs-12&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;img-box&quot;&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;img src=&quot;img/work-3.png&quot;&nbsp; alt=&quot;&quot;/&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/section&gt;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;!--/Our Work--&gt;</p>\r\n', 'about-us', '343.about-us-bgr.png', 1, '2016-07-07 12:54:11', '2016-07-08 18:20:04'),
(18, 'Contact Us', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever but also the leap into electronic typesetting, remaining ', '<div class="howitwork">\r\n<div class="container">\r\n<div class="row">\r\n<div class="inhead-area">\r\n<h2>How does Inspectaro work?</h2>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n</div>\r\n\r\n<div class="step-area">\r\n<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">\r\n<div class="row">\r\n<div class="step-in">\r\n<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">&nbsp;</div>\r\n\r\n<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 mob">\r\n<div class="step-rgt">\r\n<div class="img-box"><img alt="" src="img/step-1.png" /></div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">\r\n<div class="step-lft">\r\n<p><strong>1</strong>Serach your requirement</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n</div>\r\n</div>\r\n\r\n<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">\r\n<div class="step-rgt">\r\n<div class="img-box"><img alt="" src="img/step-1.png" /></div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<div class="row">\r\n<div class="step-in">\r\n<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">&nbsp;</div>\r\n\r\n<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">\r\n<div class="step-rgt">\r\n<div class="img-box"><img alt="" src="img/step-2.png" /></div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">\r\n<div class="step-lft">\r\n<p><strong>2</strong>Serach your requirement</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n</div>\r\n</div>\r\n\r\n<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<div class="row">\r\n<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">&nbsp;</div>\r\n\r\n<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 mob">\r\n<div class="step-rgt">\r\n<div class="img-box"><img alt="" src="img/step-1.png" /></div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">\r\n<div class="step-lft">\r\n<p><strong>3</strong>Serach your requirement</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n</div>\r\n</div>\r\n\r\n<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">\r\n<div class="step-rgt">\r\n<div class="img-box"><img alt="" src="img/step-1.png" /></div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 'contact-us', '827.contact-us-bgr.png', 1, '2016-07-07 12:56:13', '2016-07-08 18:19:01'),
(19, 'Privacy Policy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever but also the leap into electronic typesetting, remaining ', '<div class="howitwork">\r\n                        <div class="container">\r\n                            <div class="row">\r\n                                            <div class="inhead-area">\r\n                                                        <h2>How does Inspectaro work?</h2>\r\n                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>                        \r\n\r\n                            </div>\r\n                                            <div class="step-area">\r\n                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">\r\n                                                <div class="row">\r\n                                                    <div class="step-in">    \r\n                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">\r\n                                                    </div>\r\n                                                     <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 mob">\r\n                                                         <div class="step-rgt">\r\n                                                            <div class="img-box">\r\n                                                                     <img src="img/step-1.png" alt=""/>\r\n                                                           </div>\r\n                                                      </div>\r\n                                                    </div>\r\n                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">\r\n                                                        <div class="step-lft">\r\n                                                            <p class="shead"><b>1</b>Serach your requirement</p>\r\n                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">\r\n                                                         <div class="step-rgt">\r\n                                                            <div class="img-box">\r\n                                                                     <img src="img/step-1.png" alt=""/>\r\n                                                           </div>\r\n                                                      </div>\r\n                                                    </div>\r\n                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">\r\n                                                    </div>\r\n                                                    </div>\r\n                                </div>\r\n                                \r\n                                \r\n                                \r\n                                \r\n                                                <div class="row">\r\n                                                    <div class="step-in">        \r\n                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">\r\n                                                    </div>\r\n                                                     <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">\r\n                                                         <div class="step-rgt">\r\n                                                            <div class="img-box">\r\n                                                                     <img src="img/step-2.png" alt=""/>\r\n                                                           </div>\r\n                                                      </div>\r\n                                                    </div>\r\n                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">\r\n                                                        <div class="step-lft">\r\n                                                            <p class="shead"><b>2</b>Serach your requirement</p>\r\n                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                   \r\n                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">\r\n                                                    </div>\r\n                                                    </div>\r\n                                </div>\r\n                                                <div class="row">    \r\n                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">\r\n                                                    </div>\r\n                                                     <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 mob">\r\n                                                         <div class="step-rgt">\r\n                                                            <div class="img-box">\r\n                                                                     <img src="img/step-1.png" alt=""/>\r\n                                                           </div>\r\n                                                      </div>\r\n                                                    </div>\r\n                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">\r\n                                                        <div class="step-lft">\r\n                                                            <p class="shead"><b>3</b>Serach your requirement</p>\r\n                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">\r\n                                                         <div class="step-rgt">\r\n                                                            <div class="img-box">\r\n                                                                     <img src="img/step-1.png" alt=""/>\r\n                                                           </div>\r\n                                                      </div>\r\n                                                    </div>\r\n                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">\r\n                                                    </div>\r\n                                </div>\r\n                                         </div>                                                                                               \r\n                            </div>\r\n                            </div>\r\n                        </div>\r\n                    </div>', 'privacy-policy', '395.ppolicy-bgr.png', 1, '2016-07-07 12:59:42', '2016-07-08 18:20:39'),
(20, 'Accomplish (almost) anything', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span> Lorem Ipsum has been the industry''s standard dummy text ever   but </span>also the leap into electronic typesetting, remaining ', '<div class="inhead-area">\r\n<h2>How does Inspectaro work?</h2>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n</div>\r\n', 'work', '383.inner-banner-1.png', 1, '2016-07-07 13:02:02', '2016-07-09 15:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscribers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_logged_in` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `last_logged_in`) VALUES
(1, 'Sukant', 'Sharma', 'sukant@mobilyte.com', '$2y$10$BGs.S.7thTyyHviF2PbL7eOwNyJPXYO.uh2dEV25lg.RjjdzML9Q6', 'rA4VhvD5hdimKC7ZqfEQqPgXxjm27QLnFkYcDu0yolWlrqvRz6uKu7gYtVRO', '2015-12-11 07:07:11', '2016-06-29 07:24:09', '2016-06-14 06:15:43'),
(2, 'Rahul', 'Jain', 'rahul.jain@mobilyte.com', '$2y$10$aRVWvTnMQJxjYnCV4fLAN.8O5ZpWK.glY296t5wpKUf0MLIIIdTEq', NULL, '2016-06-15 10:05:23', '2016-06-15 10:09:17', '0000-00-00 00:00:00'),
(3, 'fghj', 'fghj', '26may@mailinator.com', '$2y$10$7g9fbLacyhQvNXKTVkdCtOYIrDZXSY94aJMr6D/hlzqjoyr0OW2D6', NULL, '2016-06-16 08:28:52', '2016-06-16 08:28:52', '0000-00-00 00:00:00'),
(4, 'hjsdfgjfd', 'fdsff', 'rohitkumar.rd26@gmail.com', '$2y$10$1LLiaS1i4HuMva178gBtGOnIvxEovpIX9HN9o5/Smv/tkg6dLE4Ee', NULL, '2016-06-16 09:48:31', '2016-06-16 09:48:31', '0000-00-00 00:00:00');

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
