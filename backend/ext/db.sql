-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 12:12 PM
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
-- Database: `minus417_201902`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth_assignment`
--

CREATE TABLE `tbl_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_auth_assignment`
--

INSERT INTO `tbl_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '2', 1552922965),
('admin', '3', 1552971389),
('administrator', '1', 1552922821);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth_item`
--

CREATE TABLE `tbl_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_auth_item`
--

INSERT INTO `tbl_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
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
-- Table structure for table `tbl_auth_item_child`
--

CREATE TABLE `tbl_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_auth_item_child`
--

INSERT INTO `tbl_auth_item_child` (`parent`, `child`) VALUES
('admin', '/*'),
('administrator', '/*'),
('AdminPermision', '/*');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth_menu`
--

CREATE TABLE `tbl_auth_menu` (
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
-- Dumping data for table `tbl_auth_menu`
--

INSERT INTO `tbl_auth_menu` (`id`, `name`, `parent`, `route`, `order`, `icon`, `data`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'RBAC Rules', NULL, '/rbac/default/index', 100000, 'fa fa-unlock', NULL, 1552904071, 1, 1553500483, 1),
(2, 'Auth Assignment', 1, '/rbac/assignment/index', 10, '', NULL, 1552904071, 1, 1553486149, 1),
(3, 'Auth Role', 1, '/rbac/role/index', 15, '', NULL, 1552904071, 1, 1553486238, 1),
(4, 'Auth Permission', 1, '/rbac/permission/index', 30, '', NULL, 1552904071, 1, 1553486450, 1),
(5, 'Setting', NULL, '/main/language/index', 100, 'fa-cog', NULL, 1552904071, 1, 1552971673, 1),
(6, 'Auth Menu', 1, '/rbac/menu/index', 1, '', NULL, 1552904071, 1, 1553486321, 1),
(7, 'Auth Rule', 1, '/rbac/rule/index', 20, '', NULL, 1552904071, 1, 1553486250, 1),
(8, 'Auth Route', 1, '/rbac/route/index', 100, '', NULL, 1552907096, 1, 1553486245, 1),
(9, 'Language', 5, '/main/language/index', NULL, '', NULL, 1552923245, 1, 1552968987, 1),
(10, 'Translate', 5, '/main/translate/index', NULL, '', NULL, 1552923964, 1, 1552968992, 1),
(11, 'User Management', NULL, '/users/default/index', 80, 'fa-users', NULL, 1552971653, 1, 1552976813, 1),
(12, 'Dashboard', NULL, '/main/default/index', 0, 'fa-dashboard', NULL, 1552976731, 1, 1552976744, 1),
(13, 'System Information', 14, '/system/information/index', NULL, 'fa-info-circle', NULL, 1553316811, 1, 1553504234, 1),
(14, 'System', NULL, '/system/information/index', 9999, 'fa-cog', NULL, 1553316944, 1, 0, 0),
(15, 'File', 14, '/main/file/index', NULL, 'fa-file', NULL, 1553500052, 1, 0, 0),
(16, 'Storage', 15, '/main/file/index', NULL, 'fa-database', NULL, 1553500133, 1, 0, 0),
(17, 'Key-Value Storage', 14, '/main/params/index', NULL, 'fa-arrows-h', NULL, 1553503311, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth_rule`
--

CREATE TABLE `tbl_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_setting`
--

CREATE TABLE `tbl_main_setting` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('richtext','json') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'json',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_translate`
--

CREATE TABLE `tbl_main_translate` (
  `id` int(10) NOT NULL,
  `message` varbinary(128) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language_code` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `translation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('richtext','json') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'json',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `name`, `value`, `type`, `created_at`, `updated_at`) VALUES
('Test', 'fhadlfhlad', '{\"fadlfhlad\":{\"value\":\"\",\"type\":\"text\",\"range\":\"\",\"hint\":\"ffffffffff\"}}', 'json', 1553503559, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
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
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `email_confirm_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', 'haolangvn@gmail.com', 'yiCzruyD5NEqc5VQFwh2dwNm9jWs4Lj3', '$2y$13$o2Z8GqvgbJ30E4aMjslr/uh7gh.TzJquXqPi6dYR1bL9VO5WvRBJ.', NULL, NULL, 1552899730, 1552899730, 1),
(2, 'hao', 'hao@thegioinuochoa.com.vn', 'yqCVUOp7le7VKMNTUCIqu3VYxcPfkJ1r', '$2y$13$6UFPYYAjrOZRLjrRj0IIhOaAwQhV.Md7u5KF3oqOBgYMRdW/rubR2', NULL, NULL, 1552905477, 1552905477, 1),
(3, 'phong', 'phong@thegioinuochoa.com.vn', 'T9mnNTp1W0LyDyQtHzaDgtExS1H9bWjv', '$2y$13$Zg2B.6jDkmV73005wGyq3O.ruCAYwttsmumOnwTw9H.vG80YXaq5m', NULL, NULL, 1552971356, 1552971356, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_profile`
--

CREATE TABLE `tbl_user_profile` (
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
-- Dumping data for table `tbl_user_profile`
--

INSERT INTO `tbl_user_profile` (`id`, `user_id`, `first_name`, `last_name`, `email_gravatar`, `last_visit`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hao', 'Lang', 'haolangvn@gmail.com', 1554372128, 1552899730, 1552899730),
(2, 2, 'Hao', 'Lang', 'hao@thegioinuochoa.com.vn', 1552976529, 1552905477, 1552905477),
(3, 3, 'Phong', 'Tang', 'phong@thegioinuochoa.com.vn', NULL, 1552971356, 1552971356);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_auth_assignment`
--
ALTER TABLE `tbl_auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-tbl_auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `tbl_auth_item`
--
ALTER TABLE `tbl_auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-tbl_auth_item-type` (`type`);

--
-- Indexes for table `tbl_auth_item_child`
--
ALTER TABLE `tbl_auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `tbl_auth_menu`
--
ALTER TABLE `tbl_auth_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `tbl_auth_rule`
--
ALTER TABLE `tbl_auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `tbl_main_setting`
--
ALTER TABLE `tbl_main_setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `tbl_main_translate`
--
ALTER TABLE `tbl_main_translate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `message` (`message`,`category`,`language_code`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_gravatar` (`email_gravatar`),
  ADD KEY `IDX_user_profile_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_auth_menu`
--
ALTER TABLE `tbl_auth_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_main_translate`
--
ALTER TABLE `tbl_main_translate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_auth_assignment`
--
ALTER TABLE `tbl_auth_assignment`
  ADD CONSTRAINT `tbl_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_auth_item`
--
ALTER TABLE `tbl_auth_item`
  ADD CONSTRAINT `tbl_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `tbl_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_auth_item_child`
--
ALTER TABLE `tbl_auth_item_child`
  ADD CONSTRAINT `tbl_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_auth_menu`
--
ALTER TABLE `tbl_auth_menu`
  ADD CONSTRAINT `tbl_auth_menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_auth_menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
