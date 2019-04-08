-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 04:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hp-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `_auth_assignment`
--

CREATE TABLE `_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `_auth_assignment`
--

INSERT INTO `_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '2', 1552922965),
('admin', '3', 1552971389),
('administrator', '1', 1552922821);

-- --------------------------------------------------------

--
-- Table structure for table `_auth_item`
--

CREATE TABLE `_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `_auth_item`
--

INSERT INTO `_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1552899563, 1552899563),
('/backend/*', 2, NULL, NULL, NULL, 1553486139, 1553486139),
('/backend/error', 2, NULL, NULL, NULL, 1553486139, 1553486139),
('/debug/*', 2, NULL, NULL, NULL, 1553486139, 1553486139),
('/debug/default/*', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/debug/default/index', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/debug/default/view', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/debug/user/*', 2, NULL, NULL, NULL, 1553486139, 1553486139),
('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/debug/user/set-identity', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/demo/*', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/default/*', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/default/index', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/demo/*', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/demo/create', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/demo/delete', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/demo/index', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/demo/update', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/demo/view', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/gii/*', 2, NULL, NULL, NULL, 1553486139, 1553486139),
('/gii/default/*', 2, NULL, NULL, NULL, 1553486139, 1553486139),
('/gii/default/action', 2, NULL, NULL, NULL, 1553486139, 1553486139),
('/gii/default/diff', 2, NULL, NULL, NULL, 1553486139, 1553486139),
('/gii/default/index', 2, NULL, NULL, NULL, 1553486139, 1553486139),
('/gii/default/preview', 2, NULL, NULL, NULL, 1553486139, 1553486139),
('/gii/default/view', 2, NULL, NULL, NULL, 1553486139, 1553486139),
('/main/*', 2, NULL, NULL, NULL, 1553486133, 1553486133),
('/main/default/*', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/default/index', 2, NULL, NULL, NULL, 1553486131, 1553486131),
('/main/file/*', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/file/connector', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/file/index', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/image/*', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/image/images-get', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/language/*', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/language/create', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/language/delete', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/language/index', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/language/update', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/language/view', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/params/*', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/params/create', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/params/delete', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/params/index', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/params/update', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/params/view', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/translate/*', 2, NULL, NULL, NULL, 1553486133, 1553486133),
('/main/translate/create', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/translate/delete', 2, NULL, NULL, NULL, 1553486133, 1553486133),
('/main/translate/index', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/translate/update', 2, NULL, NULL, NULL, 1553486133, 1553486133),
('/main/translate/view', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/rbac/*', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/rbac/assignment/*', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/rbac/assignment/assign', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/rbac/assignment/index', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/rbac/assignment/revoke', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/rbac/assignment/view', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/rbac/default/*', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/rbac/default/index', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/rbac/menu/*', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/rbac/menu/create', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/rbac/menu/delete', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/rbac/menu/index', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/rbac/menu/update', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/rbac/menu/view', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/rbac/permission/*', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/permission/assign', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/permission/create', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/permission/delete', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/permission/index', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/permission/remove', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/permission/update', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/permission/view', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/role/*', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/role/assign', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/role/create', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/role/delete', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/role/index', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/role/remove', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/role/update', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/role/view', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/route/*', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/route/assign', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/route/create', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/route/index', 2, NULL, NULL, NULL, 1553486136, 1553486136),
('/rbac/route/refresh', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/route/remove', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/rule/*', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/rule/create', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/rule/delete', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/rule/index', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/rule/update', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/rule/view', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/user/*', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/rbac/user/activate', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/rbac/user/change-password', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/rbac/user/delete', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/user/index', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/user/login', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/rbac/user/logout', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/rbac/user/request-password-reset', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/rbac/user/reset-password', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/rbac/user/signup', 2, NULL, NULL, NULL, 1553486138, 1553486138),
('/rbac/user/view', 2, NULL, NULL, NULL, 1553486137, 1553486137),
('/system/*', 2, NULL, NULL, NULL, 1553316750, 1553316750),
('/system/cache/*', 2, NULL, NULL, NULL, 1553316749, 1553316749),
('/system/cache/flush-cache', 2, NULL, NULL, NULL, 1553316748, 1553316748),
('/system/cache/flush-cache-key', 2, NULL, NULL, NULL, 1553316748, 1553316748),
('/system/cache/flush-cache-tag', 2, NULL, NULL, NULL, 1553316749, 1553316749),
('/system/cache/index', 2, NULL, NULL, NULL, 1553316748, 1553316748),
('/system/information/*', 2, NULL, NULL, NULL, 1553316749, 1553316749),
('/system/information/index', 2, NULL, NULL, NULL, 1553316749, 1553316749),
('/system/key-storage/*', 2, NULL, NULL, NULL, 1553316749, 1553316749),
('/system/key-storage/delete', 2, NULL, NULL, NULL, 1553316749, 1553316749),
('/system/key-storage/index', 2, NULL, NULL, NULL, 1553316749, 1553316749),
('/system/key-storage/update', 2, NULL, NULL, NULL, 1553316749, 1553316749),
('/system/log/*', 2, NULL, NULL, NULL, 1553316750, 1553316750),
('/system/log/delete', 2, NULL, NULL, NULL, 1553316749, 1553316749),
('/system/log/index', 2, NULL, NULL, NULL, 1553316749, 1553316749),
('/system/log/view', 2, NULL, NULL, NULL, 1553316749, 1553316749),
('/system/settings/*', 2, NULL, NULL, NULL, 1553316750, 1553316750),
('/system/settings/index', 2, NULL, NULL, NULL, 1553316750, 1553316750),
('/users/*', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/users/default/*', 2, NULL, NULL, NULL, 1553486134, 1553486134),
('/users/default/create', 2, NULL, NULL, NULL, 1553486133, 1553486133),
('/users/default/delete', 2, NULL, NULL, NULL, 1553486134, 1553486134),
('/users/default/generate-auth-key', 2, NULL, NULL, NULL, 1553486134, 1553486134),
('/users/default/index', 2, NULL, NULL, NULL, 1553486133, 1553486133),
('/users/default/login', 2, NULL, NULL, NULL, 1553486133, 1553486133),
('/users/default/logout', 2, NULL, NULL, NULL, 1553486133, 1553486133),
('/users/default/send-confirm-email', 2, NULL, NULL, NULL, 1553486134, 1553486134),
('/users/default/set-status', 2, NULL, NULL, NULL, 1553486133, 1553486133),
('/users/default/update', 2, NULL, NULL, NULL, 1553486133, 1553486133),
('/users/default/view', 2, NULL, NULL, NULL, 1553486133, 1553486133),
('/users/profile/*', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/users/profile/ajax-validate-avatar-form', 2, NULL, NULL, NULL, 1553486134, 1553486134),
('/users/profile/ajax-validate-password-delete-form', 2, NULL, NULL, NULL, 1553486134, 1553486134),
('/users/profile/ajax-validate-password-form', 2, NULL, NULL, NULL, 1553486134, 1553486134),
('/users/profile/delete', 2, NULL, NULL, NULL, 1553486135, 1553486135),
('/users/profile/generate-auth-key', 2, NULL, NULL, NULL, 1553486134, 1553486134),
('/users/profile/index', 2, NULL, NULL, NULL, 1553486134, 1553486134),
('/users/profile/update', 2, NULL, NULL, NULL, 1553486134, 1553486134),
('/users/profile/update-avatar', 2, NULL, NULL, NULL, 1553486134, 1553486134),
('/users/profile/update-password', 2, NULL, NULL, NULL, 1553486134, 1553486134),
('admin', 1, 'Admin', NULL, NULL, 1552922892, 1552922892),
('administrator', 1, 'Administrator', NULL, NULL, 1552906087, 1553486373),
('AdminPermision', 2, 'Admin Permision', NULL, NULL, 1552899819, 1552899819),
('RBAC_Admin', 2, 'RBAC_Admin', NULL, NULL, 1552905754, 1552905848),
('RBAC_View', 2, 'RBAC View', NULL, NULL, 1552905819, 1552905819);

-- --------------------------------------------------------

--
-- Table structure for table `_auth_item_child`
--

CREATE TABLE `_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `_auth_item_child`
--

INSERT INTO `_auth_item_child` (`parent`, `child`) VALUES
('admin', '/*'),
('administrator', '/*'),
('AdminPermision', '/*');

-- --------------------------------------------------------

--
-- Table structure for table `_auth_menu`
--

CREATE TABLE `_auth_menu` (
  `id` int(10) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT '0',
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) DEFAULT '0',
  `icon` varchar(25) COLLATE utf8_unicode_ci DEFAULT '',
  `data` blob,
  `created_at` int(11) DEFAULT '0',
  `created_by` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  `updated_by` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `_auth_menu`
--

INSERT INTO `_auth_menu` (`id`, `name`, `parent`, `route`, `order`, `icon`, `data`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'RBAC Rules', NULL, '/rbac/default/index', 100000, 'fa fa-unlock', NULL, 1552904071, 1, 1553500483, 1),
(2, 'Auth Assignment', 1, '/rbac/assignment/index', 10, '', NULL, 1552904071, 1, 1554568273, 1),
(3, 'Auth Role', 1, '/rbac/role/index', 15, '', NULL, 1552904071, 1, 1553486238, 1),
(4, 'Auth Permission', 1, '/rbac/permission/index', 30, '', NULL, 1552904071, 1, 1553486450, 1),
(6, 'Auth Menu', 1, '/rbac/menu/index', 1, '', NULL, 1552904071, 1, 1553486321, 1),
(7, 'Auth Rule', 1, '/rbac/rule/index', 20, '', NULL, 1552904071, 1, 1553486250, 1),
(8, 'Auth Route', 1, '/rbac/route/index', 100, '', NULL, 1552907096, 1, 1553486245, 1),
(9, 'Demo', NULL, '/demo/default/index', 9999999, '', NULL, 1552923245, 1, 1554734957, 1),
(10, 'Translation', 14, '/main/translate/index', NULL, 'fa-language', NULL, 1552923964, 1, 1554560140, 1),
(11, 'User Management', NULL, '/users/default/index', 80, 'fa-users', NULL, 1552971653, 1, 1552976813, 1),
(12, 'Dashboard', NULL, '/main/default/index', 0, 'fa-dashboard', NULL, 1552976731, 1, 1552976744, 1),
(13, 'System Information', 14, '/system/information/index', 999, 'fa-info-circle', NULL, 1553316811, 1, 1554559840, 1),
(14, 'System', NULL, '/system/information/index', 9999, 'fa-cog', NULL, 1553316944, 1, 0, 0),
(16, 'Storage', 14, '/main/file/index', NULL, 'fa-database', NULL, 1553500133, 1, 1554560104, 1),
(17, 'Key-Value Storage', 14, '/main/params/index', NULL, 'fa-arrows-h', NULL, 1553503311, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `_auth_rule`
--

CREATE TABLE `_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `_setting`
--

CREATE TABLE `_setting` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('richtext','json') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'json',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `_setting`
--

INSERT INTO `_setting` (`id`, `name`, `value`, `type`, `created_at`, `updated_at`) VALUES
('about', 'About____________', '<p><strong>2.222.222</strong></p><p><strong>333.333</strong></p><p><strong>4.444.444 </strong></p><p><strong>555.555.555.555.555.555.555.555.555</strong><br>\r\n</p>', 'richtext', 1554478500, 1554647079),
('params', 'Params', '{\"test\":{\"type\":\"text\",\"range\":\"\",\"hint\":\"Hint\",\"value\":\"22222222\"}}', 'json', 1554472694, 1554473627);

-- --------------------------------------------------------

--
-- Table structure for table `_translate`
--

CREATE TABLE `_translate` (
  `id` int(10) NOT NULL,
  `message` varbinary(128) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language_code` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `translation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `_translate`
--

INSERT INTO `_translate` (`id`, `message`, `category`, `language_code`, `translation`, `created_at`, `updated_at`) VALUES
(1, 0x486f6d6570616765, 'menu', 'vn', 'Trang chủ', 1554453762, 1554454278);

-- --------------------------------------------------------

--
-- Table structure for table `_user`
--

CREATE TABLE `_user` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Username',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Email',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Authorization Key',
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Hash Password',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Password Token',
  `email_confirm_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Email Confirm Token',
  `created_at` int(11) NOT NULL COMMENT 'Created',
  `updated_at` int(11) NOT NULL COMMENT 'Updated',
  `status` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `_user`
--

INSERT INTO `_user` (`id`, `username`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `email_confirm_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', 'haolangvn@gmail.com', 'yiCzruyD5NEqc5VQFwh2dwNm9jWs4Lj3', '$2y$13$o2Z8GqvgbJ30E4aMjslr/uh7gh.TzJquXqPi6dYR1bL9VO5WvRBJ.', NULL, NULL, 1552899730, 1552899730, 1),
(2, 'hao', 'hao@thegioinuochoa.com.vn', 'yqCVUOp7le7VKMNTUCIqu3VYxcPfkJ1r', '$2y$13$6UFPYYAjrOZRLjrRj0IIhOaAwQhV.Md7u5KF3oqOBgYMRdW/rubR2', NULL, NULL, 1552905477, 1552905477, 1),
(3, 'Phong', 'admin@thegioinuochoa.com.vn', 'T9mnNTp1W0LyDyQtHzaDgtExS1H9bWjv', '$2y$13$wegiY2dOU5Nwtwq3y8cyHuySRaXa7ivmi90rXxmB8Lv7gLjTg73/u', NULL, NULL, 1552971356, 1554696136, 1);

-- --------------------------------------------------------

--
-- Table structure for table `_user_profile`
--

CREATE TABLE `_user_profile` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `user_id` int(11) NOT NULL COMMENT 'User',
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'First Name',
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Last Name',
  `email_gravatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Email Gravatar',
  `last_visit` int(11) DEFAULT NULL COMMENT 'Last Visit',
  `created_at` int(11) NOT NULL COMMENT 'Created',
  `updated_at` int(11) NOT NULL COMMENT 'Updated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `_user_profile`
--

INSERT INTO `_user_profile` (`id`, `user_id`, `first_name`, `last_name`, `email_gravatar`, `last_visit`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hao', 'Lang', 'haolangvn@gmail.com', 1554734974, 1552899730, 1552899730),
(2, 2, 'Hao', 'Lang', 'hao@thegioinuochoa.com.vn', 1552976529, 1552905477, 1552905477),
(3, 3, 'Phong', 'Tang', 'admin@thegioinuochoa.com.vn', NULL, 1552971356, 1554696136);

-- --------------------------------------------------------

--
-- Table structure for table `__demo`
--

CREATE TABLE `__demo` (
  `id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `deadline` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `__demo`
--

INSERT INTO `__demo` (`id`, `name`, `desc`, `deadline`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(5, 'English', 'English22222', 1554562800, 1554456917, 1554552671, 1, 1),
(6, '222222', '222222', 1554735600, 1554519735, 1554559149, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_auth_assignment`
--
ALTER TABLE `_auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-tbl_auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `_auth_item`
--
ALTER TABLE `_auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-tbl_auth_item-type` (`type`);

--
-- Indexes for table `_auth_item_child`
--
ALTER TABLE `_auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `_auth_menu`
--
ALTER TABLE `_auth_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `_auth_rule`
--
ALTER TABLE `_auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `_setting`
--
ALTER TABLE `_setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `_translate`
--
ALTER TABLE `_translate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `message` (`message`,`category`,`language_code`);

--
-- Indexes for table `_user`
--
ALTER TABLE `_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `_user_profile`
--
ALTER TABLE `_user_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_gravatar` (`email_gravatar`),
  ADD KEY `IDX_user_profile_user_id` (`user_id`);

--
-- Indexes for table `__demo`
--
ALTER TABLE `__demo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `_auth_menu`
--
ALTER TABLE `_auth_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `_translate`
--
ALTER TABLE `_translate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `_user`
--
ALTER TABLE `_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `_user_profile`
--
ALTER TABLE `_user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `__demo`
--
ALTER TABLE `__demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `_auth_assignment`
--
ALTER TABLE `_auth_assignment`
  ADD CONSTRAINT `_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `_auth_item`
--
ALTER TABLE `_auth_item`
  ADD CONSTRAINT `_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `_auth_item_child`
--
ALTER TABLE `_auth_item_child`
  ADD CONSTRAINT `_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `_auth_menu`
--
ALTER TABLE `_auth_menu`
  ADD CONSTRAINT `_auth_menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `_auth_menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
