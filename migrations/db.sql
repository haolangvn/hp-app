-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 05:20 PM
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
-- Table structure for table `admin_auth`
--

CREATE TABLE `admin_auth` (
  `id` int(11) NOT NULL,
  `alias_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `module_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_crud` tinyint(1) DEFAULT '0',
  `route` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_auth`
--

INSERT INTO `admin_auth` (`id`, `alias_name`, `module_name`, `is_crud`, `route`, `api`) VALUES
(1, 'menu_access_item_user', 'admin', 1, '0', 'api-admin-user'),
(2, 'menu_access_item_apiuser', 'admin', 1, '0', 'api-admin-apiuser'),
(3, 'menu_access_item_group', 'admin', 1, '0', 'api-admin-group'),
(4, 'menu_system_item_config', 'admin', 1, '0', 'api-admin-config'),
(5, 'menu_system_item_language', 'admin', 1, '0', 'api-admin-lang'),
(6, 'menu_system_item_tags', 'admin', 1, '0', 'api-admin-tag'),
(7, 'menu_system_logger', 'admin', 1, '0', 'api-admin-logger'),
(8, 'menu_images_item_effects', 'admin', 1, '0', 'api-admin-effect'),
(9, 'menu_images_item_filters', 'admin', 1, '0', 'api-admin-filter'),
(10, 'menu_group_contentproxy_machines', 'admin', 1, '0', 'api-admin-proxymachine'),
(11, 'menu_group_contentproxy_builds', 'admin', 1, '0', 'api-admin-proxybuild'),
(12, 'menu_node_filemanager', 'admin', 0, 'admin/storage/index', '0'),
(13, 'module_permission_page_blocks', 'cmsadmin', 1, '0', 'api-cms-navitempageblockitem'),
(14, 'module_permission_page', 'cmsadmin', 1, '0', 'api-cms-navitempage'),
(15, 'menu_group_item_env_container', 'cmsadmin', 1, '0', 'api-cms-navcontainer'),
(16, 'menu_group_item_env_layouts', 'cmsadmin', 1, '0', 'api-cms-layout'),
(17, 'menu_group_item_env_redirections', 'cmsadmin', 1, '0', 'api-cms-redirect'),
(18, 'menu_group_item_elements_group', 'cmsadmin', 1, '0', 'api-cms-blockgroup'),
(19, 'menu_group_item_elements_blocks', 'cmsadmin', 1, '0', 'api-cms-block'),
(20, 'module_permission_add_new_page', 'cmsadmin', 0, 'cmsadmin/page/create', '0'),
(21, 'module_permission_update_pages', 'cmsadmin', 0, 'cmsadmin/page/update', '0'),
(22, 'module_permission_delete_pages', 'cmsadmin', 0, 'cmsadmin/page/delete', '0'),
(23, 'module_permission_edit_drafts', 'cmsadmin', 0, 'cmsadmin/page/drafts', '0'),
(24, 'menu_group_item_env_config', 'cmsadmin', 0, 'cmsadmin/config/index', '0'),
(25, 'menu_node_cms', 'cmsadmin', 0, 'cmsadmin/default/index', '0'),
(26, 'menu_group_item_env_permission', 'cmsadmin', 0, 'cmsadmin/permission/index', '0'),
(27, 'Demo', 'demoadmin', 1, '0', 'api-demo-demo'),
(28, 'article', 'newsadmin', 1, '0', 'api-news-article'),
(29, 'cat', 'newsadmin', 1, '0', 'api-news-cat');

-- --------------------------------------------------------

--
-- Table structure for table `admin_config`
--

CREATE TABLE `admin_config` (
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_system` tinyint(1) DEFAULT '1',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_config`
--

INSERT INTO `admin_config` (`name`, `value`, `is_system`, `id`) VALUES
('100genericBlockUpdate', '1', 1, 1),
('last_import_timestamp', '1554651782', 1, 2),
('installer_vendor_timestamp', '1554651568', 1, 3),
('setup_command_timestamp', '1554392103', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `admin_group`
--

CREATE TABLE `admin_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_group`
--

INSERT INTO `admin_group` (`id`, `name`, `text`, `is_deleted`) VALUES
(1, 'Administrator', 'Administrator Accounts have full access to all Areas and can create, update and delete all data records.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_group_auth`
--

CREATE TABLE `admin_group_auth` (
  `group_id` int(11) DEFAULT NULL,
  `auth_id` int(11) DEFAULT NULL,
  `crud_create` smallint(4) DEFAULT NULL,
  `crud_update` smallint(4) DEFAULT NULL,
  `crud_delete` smallint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_group_auth`
--

INSERT INTO `admin_group_auth` (`group_id`, `auth_id`, `crud_create`, `crud_update`, `crud_delete`) VALUES
(1, 1, 1, 1, 1),
(1, 2, 1, 1, 1),
(1, 3, 1, 1, 1),
(1, 4, 1, 1, 1),
(1, 5, 1, 1, 1),
(1, 6, 1, 1, 1),
(1, 7, 1, 1, 1),
(1, 8, 1, 1, 1),
(1, 9, 1, 1, 1),
(1, 10, 1, 1, 1),
(1, 11, 1, 1, 1),
(1, 12, 1, 1, 1),
(1, 13, 1, 1, 1),
(1, 14, 1, 1, 1),
(1, 15, 1, 1, 1),
(1, 16, 1, 1, 1),
(1, 17, 1, 1, 1),
(1, 18, 1, 1, 1),
(1, 19, 1, 1, 1),
(1, 20, 1, 1, 1),
(1, 21, 1, 1, 1),
(1, 22, 1, 1, 1),
(1, 23, 1, 1, 1),
(1, 24, 1, 1, 1),
(1, 25, 1, 1, 1),
(1, 26, 1, 1, 1),
(1, 27, 1, 1, 1),
(1, 28, 1, 1, 1),
(1, 29, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_lang`
--

CREATE TABLE `admin_lang` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_code` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_lang`
--

INSERT INTO `admin_lang` (`id`, `name`, `short_code`, `is_default`, `is_deleted`) VALUES
(1, 'English', 'en', 0, 0),
(2, 'Tiếng Việt', 'vn', 1, 0),
(3, 'Ru', 'ru', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_logger`
--

CREATE TABLE `admin_logger` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `trace_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trace_line` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trace_function` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trace_function_args` text COLLATE utf8_unicode_ci,
  `group_identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_identifier_index` int(11) DEFAULT NULL,
  `get` text COLLATE utf8_unicode_ci,
  `post` text COLLATE utf8_unicode_ci,
  `session` text COLLATE utf8_unicode_ci,
  `server` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_ngrest_log`
--

CREATE TABLE `admin_ngrest_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp_create` int(11) NOT NULL,
  `route` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `api` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `is_update` tinyint(1) DEFAULT '0',
  `is_insert` tinyint(1) DEFAULT '0',
  `attributes_json` text COLLATE utf8_unicode_ci NOT NULL,
  `attributes_diff_json` text COLLATE utf8_unicode_ci,
  `pk_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_ngrest_log`
--

INSERT INTO `admin_ngrest_log` (`id`, `user_id`, `timestamp_create`, `route`, `api`, `is_update`, `is_insert`, `attributes_json`, `attributes_diff_json`, `pk_value`, `table_name`, `is_delete`) VALUES
(1, 1, 1554432774, '', 'api-demo-demo', 1, 0, '{\"id\":1,\"name\":\"Ten_______\",\"desc\":\"MOta\",\"created_at\":1554357600}', '{\"name\":\"Ten\"}', '1', '1_demo', 0),
(2, 1, 1554448403, '', 'api-admin-lang', 0, 1, '{\"id\":2,\"name\":\"Tiếng Việt\",\"short_code\":\"vi\",\"is_default\":\"0\",\"is_deleted\":null}', NULL, '2', 'admin_lang', 0),
(3, 1, 1554449125, '', 'api-demo-demo', 0, 1, '{\"id\":4,\"name\":\"{\\\"en\\\":\\\"eee\\\"}\",\"desc\":\"{\\\"en\\\":\\\"eeeeee\\\"}\",\"created_at\":null,\"updated_at\":null,\"created_by\":null,\"updated_by\":null}', NULL, '4', '1_demo', 0),
(4, 1, 1554449313, '', 'api-demo-demo', 1, 0, '{\"id\":4,\"name\":\"{\\\"en\\\":\\\"eee\\\",\\\"vi\\\":\\\"\\\"}\",\"desc\":\"{\\\"en\\\":\\\"eeeeee222222\\\",\\\"vi\\\":\\\"\\\"}\",\"created_at\":0,\"updated_at\":0,\"created_by\":0,\"updated_by\":0}', '{\"name\":\"{\\\"en\\\":\\\"eee\\\"}\",\"desc\":\"{\\\"en\\\":\\\"eeeeee\\\"}\"}', '4', '1_demo', 0),
(5, 1, 1554449451, '', 'api-demo-demo', 1, 0, '{\"id\":4,\"name\":\"{\\\"en\\\":\\\"English\\\",\\\"vi\\\":\\\"Tiếng Việt\\\"}\",\"desc\":\"{\\\"en\\\":\\\"EnglishEnglishEnglishEnglishEnglish\\\",\\\"vi\\\":\\\"Tiếng ViệtTiếng Việt\\\"}\",\"created_at\":0,\"updated_at\":0,\"created_by\":0,\"updated_by\":0}', '{\"name\":\"{\\\"en\\\":\\\"eee\\\",\\\"vi\\\":\\\"\\\"}\",\"desc\":\"{\\\"en\\\":\\\"eeeeee222222\\\",\\\"vi\\\":\\\"\\\"}\"}', '4', '1_demo', 0),
(6, 1, 1554450485, '', 'api-admin-lang', 1, 0, '{\"id\":2,\"name\":\"Tiếng Việt\",\"short_code\":\"vi\",\"is_default\":1,\"is_deleted\":0}', '{\"is_default\":null}', '2', 'admin_lang', 0),
(7, 1, 1554451024, '', 'api-admin-lang', 1, 0, '{\"id\":2,\"name\":\"Tiếng Việt\",\"short_code\":\"vn\",\"is_default\":1,\"is_deleted\":0}', '{\"short_code\":\"vi\",\"is_default\":null}', '2', 'admin_lang', 0),
(8, 1, 1554451069, '', 'api-admin-lang', 1, 0, '{\"id\":2,\"name\":\"Tiếng Việt\",\"short_code\":\"vi\",\"is_default\":1,\"is_deleted\":0}', '{\"short_code\":\"vn\",\"is_default\":null}', '2', 'admin_lang', 0),
(9, 1, 1554451080, '', 'api-admin-lang', 1, 0, '{\"id\":2,\"name\":\"Tiếng Việt\",\"short_code\":\"vn\",\"is_default\":1,\"is_deleted\":0}', '{\"short_code\":\"vi\",\"is_default\":null}', '2', 'admin_lang', 0),
(10, 1, 1554451535, '', 'api-admin-lang', 1, 0, '{\"id\":1,\"name\":\"English\",\"short_code\":\"en\",\"is_default\":1,\"is_deleted\":0}', '{\"is_default\":null}', '1', 'admin_lang', 0),
(11, 1, 1554451672, '', 'api-admin-lang', 0, 1, '{\"id\":3,\"name\":\"Ru\",\"short_code\":\"ru\",\"is_default\":\"0\",\"is_deleted\":null}', NULL, '3', 'admin_lang', 0),
(12, 1, 1554452148, '', 'api-admin-lang', 0, 0, '{\"id\":3,\"name\":\"Ru\",\"short_code\":\"ru\",\"is_default\":0,\"is_deleted\":true}', NULL, '3', 'admin_lang', 1),
(13, 1, 1554452561, '', 'api-demo-demo', 1, 0, '{\"id\":4,\"name\":\"{\\\"en\\\":\\\"English\\\",\\\"vi\\\":\\\"Tiếng Việt\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"desc\":\"{\\\"en\\\":\\\"EnglishEnglishEnglishEnglishEnglish\\\",\\\"vi\\\":\\\"Tiếng ViệtTiếng Việt\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"created_at\":0,\"updated_at\":1554452560,\"created_by\":0,\"updated_by\":null}', '{\"name\":\"{\\\"en\\\":\\\"English\\\",\\\"vi\\\":\\\"Tiếng Việt\\\"}\",\"desc\":\"{\\\"en\\\":\\\"EnglishEnglishEnglishEnglishEnglish\\\",\\\"vi\\\":\\\"Tiếng ViệtTiếng Việt\\\"}\",\"updated_at\":0,\"updated_by\":0}', '4', '1_demo', 0),
(14, 1, 1554452590, '', 'api-demo-demo', 1, 0, '{\"id\":4,\"name\":\"{\\\"en\\\":\\\"English\\\",\\\"vi\\\":\\\"Tiếng Việt\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"desc\":\"{\\\"en\\\":\\\"EnglishEnglishEnglishEnglishEnglish\\\",\\\"vi\\\":\\\"Tiếng ViệtTiếng Việt\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"created_at\":0,\"updated_at\":1554452590,\"created_by\":0,\"updated_by\":1}', '{\"updated_at\":1554452560,\"updated_by\":0}', '4', '1_demo', 0),
(15, 1, 1554455754, '', 'api-demo-demo', 1, 0, '{\"id\":4,\"name\":\"{\\\"en\\\":\\\"English\\\",\\\"vi\\\":\\\"Tiếng Việt\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"desc\":\"{\\\"en\\\":\\\"EnglishEnglishEnglishEnglishEnglish\\\",\\\"vi\\\":\\\"Tiếng ViệtTiếng Việt\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"created_at\":0,\"updated_at\":1554452590,\"created_by\":0,\"updated_by\":1}', '[]', '4', '1_demo', 0),
(16, 1, 1554456833, '', 'api-demo-demo', 1, 0, '{\"id\":4,\"name\":\"{\\\"en\\\":\\\"English\\\",\\\"vi\\\":\\\"Tiếng Việt\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"desc\":\"{\\\"en\\\":\\\"EnglishEnglishEnglishEnglishEnglish\\\",\\\"vi\\\":\\\"Tiếng ViệtTiếng Việt\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"created_at\":0,\"updated_at\":1554456833,\"created_by\":0,\"updated_by\":1}', '{\"updated_at\":1554452590}', '4', '1_demo', 0),
(17, 1, 1554456878, '', 'api-demo-demo', 1, 0, '{\"id\":4,\"name\":\"{\\\"en\\\":\\\"English\\\",\\\"vi\\\":\\\"Tiếng Việt\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"desc\":\"{\\\"en\\\":\\\"EnglishEnglishEnglishEnglishEnglish\\\",\\\"vi\\\":\\\"Tiếng ViệtTiếng Việt\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"created_at\":0,\"updated_at\":1554456878,\"created_by\":0,\"updated_by\":1}', '{\"updated_at\":1554456833}', '4', '1_demo', 0),
(18, 1, 1554456917, '', 'api-demo-demo', 0, 1, '{\"id\":5,\"name\":\"{\\\"en\\\":\\\"Item\\\"}\",\"desc\":\"{\\\"en\\\":\\\"Item\\\"}\",\"created_at\":1554456917,\"updated_at\":1554456917,\"created_by\":1,\"updated_by\":null}', NULL, '5', '1_demo', 0),
(19, 1, 1554457530, '', 'api-demo-demo', 1, 0, '{\"id\":5,\"name\":\"{\\\"en\\\":\\\"English\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"desc\":\"{\\\"en\\\":\\\"English\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"created_at\":1554456917,\"updated_at\":1554457530,\"created_by\":1,\"updated_by\":1}', '{\"name\":\"{\\\"en\\\":\\\"Item\\\"}\",\"desc\":\"{\\\"en\\\":\\\"Item\\\"}\",\"updated_at\":1554456917,\"updated_by\":0}', '5', '1_demo', 0),
(20, 1, 1554457556, '', 'api-admin-lang', 1, 0, '{\"id\":2,\"name\":\"Tiếng Việt\",\"short_code\":\"vn\",\"is_default\":1,\"is_deleted\":0}', '{\"is_default\":null}', '2', 'admin_lang', 0),
(21, 1, 1554457799, '', 'api-demo-demo', 1, 0, '{\"id\":5,\"name\":\"{\\\"en\\\":\\\"English\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"desc\":\"{\\\"en\\\":\\\"English\\\",\\\"vn\\\":\\\"Tiếng Việt\\\"}\",\"created_at\":1554456917,\"updated_at\":1554457799,\"created_by\":1,\"updated_by\":1}', '{\"name\":\"English\",\"desc\":\"English 2\",\"updated_at\":1554457577,\"updated_by\":0}', '5', '1_demo', 0),
(22, 1, 1554471719, '', '', 0, 1, '{\"id\":1,\"name\":\"products\",\"parent_id\":0,\"timestamp_create\":1554471719,\"is_deleted\":null}', NULL, '1', 'admin_storage_folder', 0),
(23, 1, 1554471815, '', '', 0, 1, '{\"id\":1,\"is_hidden\":false,\"folder_id\":1,\"name_original\":\"5.png\",\"name_new\":\"5\",\"name_new_compound\":\"5_03b15e7b.png\",\"mime_type\":\"image/png\",\"extension\":\"png\",\"hash_file\":\"4cffdb2ac7dc60265c228a0205e2acdd\",\"hash_name\":\"03b15e7b\",\"upload_timestamp\":1554471815,\"file_size\":143914,\"upload_user_id\":1,\"is_deleted\":false,\"passthrough_file\":null,\"passthrough_file_password\":null,\"passthrough_file_stats\":null,\"caption\":null,\"inline_disposition\":null}', NULL, '1', 'admin_storage_file', 0),
(24, 1, 1554471892, '', '', 0, 1, '{\"id\":2,\"is_hidden\":false,\"folder_id\":1,\"name_original\":\"1.jpg\",\"name_new\":\"1\",\"name_new_compound\":\"1_2d81ae5c.jpg\",\"mime_type\":\"image/jpeg\",\"extension\":\"jpg\",\"hash_file\":\"c18fcebeabb347c07ccb9c586f6c70b1\",\"hash_name\":\"2d81ae5c\",\"upload_timestamp\":1554471892,\"file_size\":105960,\"upload_user_id\":1,\"is_deleted\":false,\"passthrough_file\":null,\"passthrough_file_password\":null,\"passthrough_file_stats\":null,\"caption\":null,\"inline_disposition\":null}', NULL, '2', 'admin_storage_file', 0),
(25, 1, 1554471901, '', '', 0, 1, '{\"id\":3,\"is_hidden\":false,\"folder_id\":1,\"name_original\":\"1.png\",\"name_new\":\"1\",\"name_new_compound\":\"1_a2f3ed50.png\",\"mime_type\":\"image/png\",\"extension\":\"png\",\"hash_file\":\"e57684a8e54ced41a6177c37b23ae844\",\"hash_name\":\"a2f3ed50\",\"upload_timestamp\":1554471901,\"file_size\":132439,\"upload_user_id\":1,\"is_deleted\":false,\"passthrough_file\":null,\"passthrough_file_password\":null,\"passthrough_file_stats\":null,\"caption\":null,\"inline_disposition\":null}', NULL, '3', 'admin_storage_file', 0),
(26, 1, 1554471901, '', '', 0, 1, '{\"id\":4,\"is_hidden\":false,\"folder_id\":1,\"name_original\":\"2.png\",\"name_new\":\"2\",\"name_new_compound\":\"2_6087696b.png\",\"mime_type\":\"image/png\",\"extension\":\"png\",\"hash_file\":\"25628c5a249cf0eccf75cb995998b9e5\",\"hash_name\":\"6087696b\",\"upload_timestamp\":1554471901,\"file_size\":158582,\"upload_user_id\":1,\"is_deleted\":false,\"passthrough_file\":null,\"passthrough_file_password\":null,\"passthrough_file_stats\":null,\"caption\":null,\"inline_disposition\":null}', NULL, '4', 'admin_storage_file', 0),
(27, 1, 1554471943, '', '', 0, 1, '{\"id\":5,\"is_hidden\":false,\"folder_id\":0,\"name_original\":\"tbl_promotion_product.xlsx\",\"name_new\":\"tbl-promotion-product\",\"name_new_compound\":\"tbl-promotion-product_c539eea8.xlsx\",\"mime_type\":\"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"extension\":\"xlsx\",\"hash_file\":\"02a8e6b1e5b1b8e62362029fc2bddf7d\",\"hash_name\":\"c539eea8\",\"upload_timestamp\":1554471943,\"file_size\":14392,\"upload_user_id\":1,\"is_deleted\":false,\"passthrough_file\":null,\"passthrough_file_password\":null,\"passthrough_file_stats\":null,\"caption\":null,\"inline_disposition\":null}', NULL, '5', 'admin_storage_file', 0),
(28, 1, 1554472079, '', '', 0, 0, '{\"id\":5,\"is_hidden\":0,\"folder_id\":0,\"name_original\":\"tbl_promotion_product.xlsx\",\"name_new\":\"tbl-promotion-product\",\"name_new_compound\":\"tbl-promotion-product_c539eea8.xlsx\",\"mime_type\":\"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"extension\":\"xlsx\",\"hash_file\":\"02a8e6b1e5b1b8e62362029fc2bddf7d\",\"hash_name\":\"c539eea8\",\"upload_timestamp\":1554471943,\"file_size\":14392,\"upload_user_id\":1,\"is_deleted\":true,\"passthrough_file\":0,\"passthrough_file_password\":null,\"passthrough_file_stats\":0,\"caption\":null,\"inline_disposition\":0}', NULL, '5', 'admin_storage_file', 1),
(29, 1, 1554651868, '', 'api-news-cat', 0, 1, '{\"id\":1,\"title\":\"{\\\"vn\\\":\\\"Thời sự\\\"}\"}', NULL, '1', 'news_cat', 0),
(30, 1, 1554651878, '', 'api-news-cat', 0, 1, '{\"id\":2,\"title\":\"{\\\"vn\\\":\\\"Đời sống\\\"}\"}', NULL, '2', 'news_cat', 0),
(31, 1, 1554652000, '', 'api-news-cat', 1, 0, '{\"id\":2,\"title\":\"{\\\"vn\\\":\\\"Đời sống\\\",\\\"en\\\":\\\"Life\\\"}\"}', '{\"title\":\"{\\\"vn\\\":\\\"Đời sống\\\"}\"}', '2', 'news_cat', 0),
(32, 1, 1554652006, '', 'api-news-cat', 1, 0, '{\"id\":1,\"title\":\"{\\\"vn\\\":\\\"Thời sự\\\",\\\"en\\\":\\\"News\\\"}\"}', '{\"title\":\"{\\\"vn\\\":\\\"Thời sự\\\"}\"}', '1', 'news_cat', 0),
(33, 1, 1554652112, '', 'api-news-article', 0, 1, '{\"id\":1,\"title\":\"{\\\"en\\\":\\\"2222222222\\\",\\\"vn\\\":\\\"333333333\\\"}\",\"text\":\"{\\\"en\\\":\\\"222222222222222\\\",\\\"vn\\\":\\\"3333333333333333333333\\\"}\",\"cat_id\":1,\"image_id\":9,\"image_list\":\"{\\\"en\\\":[{\\\"imageId\\\":10,\\\"caption\\\":\\\"\\\"}],\\\"vn\\\":[]}\",\"file_list\":\"[{\\\"fileId\\\":0,\\\"caption\\\":\\\"\\\"}]\",\"create_user_id\":1,\"update_user_id\":1,\"timestamp_create\":1554652112,\"timestamp_update\":1554652112,\"timestamp_display_from\":1554652112,\"timestamp_display_until\":null,\"is_deleted\":null,\"is_display_limit\":0,\"teaser_text\":\"{\\\"en\\\":\\\"222222222222222222222\\\",\\\"vn\\\":\\\"3333333333333\\\"}\"}', NULL, '1', 'news_article', 0),
(34, 1, 1554652291, '', 'api-admin-tag', 0, 1, '{\"id\":1,\"name\":\"chanel\"}', NULL, '1', 'admin_tag', 0),
(35, 1, 1554652297, '', 'api-admin-tag', 0, 1, '{\"id\":2,\"name\":\"news\"}', NULL, '2', 'admin_tag', 0),
(36, 1, 1554652699, '', 'api-news-article', 1, 0, '{\"id\":1,\"title\":\"{\\\"en\\\":\\\"2222222222\\\",\\\"vn\\\":\\\"\\\"}\",\"text\":\"{\\\"en\\\":\\\"222222222222222\\\",\\\"vn\\\":\\\"\\\"}\",\"cat_id\":1,\"image_id\":9,\"image_list\":\"{\\\"en\\\":[{\\\"imageId\\\":10,\\\"caption\\\":\\\"\\\"}],\\\"vn\\\":[]}\",\"file_list\":\"[{\\\"fileId\\\":0,\\\"caption\\\":\\\"\\\"}]\",\"create_user_id\":1,\"update_user_id\":1,\"timestamp_create\":1554652112,\"timestamp_update\":1554652699,\"timestamp_display_from\":1554652112,\"timestamp_display_until\":null,\"is_deleted\":0,\"is_display_limit\":0,\"teaser_text\":\"{\\\"en\\\":\\\"222222222222222222222\\\",\\\"vn\\\":\\\"\\\"}\"}', '{\"title\":\"{\\\"en\\\":\\\"2222222222\\\",\\\"vn\\\":\\\"333333333\\\"}\",\"text\":\"{\\\"en\\\":\\\"222222222222222\\\",\\\"vn\\\":\\\"3333333333333333333333\\\"}\",\"timestamp_update\":1554652112,\"teaser_text\":\"{\\\"en\\\":\\\"222222222222222222222\\\",\\\"vn\\\":\\\"3333333333333\\\"}\"}', '1', 'news_article', 0),
(37, 1, 1554693287, '', '', 0, 1, '{\"id\":6,\"is_hidden\":false,\"folder_id\":1,\"name_original\":\"tbl_promotion_product.xlsx\",\"name_new\":\"tbl-promotion-product\",\"name_new_compound\":\"tbl-promotion-product_0f8dc846.xlsx\",\"mime_type\":\"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"extension\":\"xlsx\",\"hash_file\":\"02a8e6b1e5b1b8e62362029fc2bddf7d\",\"hash_name\":\"0f8dc846\",\"upload_timestamp\":1554693287,\"file_size\":14392,\"upload_user_id\":1,\"is_deleted\":false,\"passthrough_file\":null,\"passthrough_file_password\":null,\"passthrough_file_stats\":null,\"caption\":null,\"inline_disposition\":null}', NULL, '6', 'admin_storage_file', 0),
(38, 1, 1554693305, '', '', 0, 0, '{\"id\":6,\"is_hidden\":0,\"folder_id\":1,\"name_original\":\"tbl_promotion_product.xlsx\",\"name_new\":\"tbl-promotion-product\",\"name_new_compound\":\"tbl-promotion-product_0f8dc846.xlsx\",\"mime_type\":\"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"extension\":\"xlsx\",\"hash_file\":\"02a8e6b1e5b1b8e62362029fc2bddf7d\",\"hash_name\":\"0f8dc846\",\"upload_timestamp\":1554693287,\"file_size\":14392,\"upload_user_id\":1,\"is_deleted\":true,\"passthrough_file\":0,\"passthrough_file_password\":null,\"passthrough_file_stats\":0,\"caption\":null,\"inline_disposition\":0}', NULL, '6', 'admin_storage_file', 1),
(39, 1, 1554696049, '', 'api-admin-user', 0, 1, '{\"id\":2,\"firstname\":\"TGNH\",\"lastname\":\"Mr\",\"title\":1,\"email\":\"admin@thegioinuochoa.com.vn\",\"password\":\"$2y$13$MRNR0BFksdt5PWVwx03UD.Wj/Y4RhfQ3/0cbdtGnjwDaEDXIpGom.\",\"password_salt\":\"rx2i3URKC1XTP4lZ-tNX2jWXN7n-ecOG\",\"auth_token\":\"558b22203f6c7d9834342acf9d48ab8ff1bac269b401b1fdeec1366d137572cdi4STsbCyxsz_F5TWvH9wYpSIinJIMBAJ\",\"is_deleted\":false,\"secure_token\":null,\"secure_token_timestamp\":null,\"force_reload\":null,\"settings\":null,\"cookie_token\":null,\"is_api_user\":null,\"api_rate_limit\":null,\"api_allowed_ips\":null,\"api_last_activity\":null,\"email_verification_token\":null,\"email_verification_token_timestamp\":null,\"login_attempt\":null,\"login_attempt_lock_expiration\":null}', NULL, '2', 'admin_user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_property`
--

CREATE TABLE `admin_property` (
  `id` int(11) NOT NULL,
  `module_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `var_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_property`
--

INSERT INTO `admin_property` (`id`, `module_name`, `var_name`, `class_name`) VALUES
(1, '@app', 'foobar', 'app\\properties\\TestProperty');

-- --------------------------------------------------------

--
-- Table structure for table `admin_proxy_build`
--

CREATE TABLE `admin_proxy_build` (
  `id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `build_token` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `config` text COLLATE utf8_unicode_ci NOT NULL,
  `is_complet` tinyint(1) DEFAULT '0',
  `expiration_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_proxy_machine`
--

CREATE TABLE `admin_proxy_machine` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifier` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_disabled` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_search_data`
--

CREATE TABLE `admin_search_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp_create` int(11) NOT NULL,
  `query` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_rows` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_storage_effect`
--

CREATE TABLE `admin_storage_effect` (
  `id` int(11) NOT NULL,
  `identifier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagine_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagine_json_params` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_storage_effect`
--

INSERT INTO `admin_storage_effect` (`id`, `identifier`, `name`, `imagine_name`, `imagine_json_params`) VALUES
(1, 'thumbnail', 'Thumbnail', 'thumbnail', '{\"vars\":[{\"var\":\"width\",\"label\":\"Breit in Pixel\"},{\"var\":\"height\",\"label\":\"Hoehe in Pixel\"},{\"var\":\"mode\",\"label\":\"outbound or inset\"},{\"var\":\"saveOptions\",\"label\":\"save options\"}]}'),
(2, 'crop', 'Crop', 'crop', '{\"vars\":[{\"var\":\"width\",\"label\":\"Breit in Pixel\"},{\"var\":\"height\",\"label\":\"Hoehe in Pixel\"},{\"var\":\"saveOptions\",\"label\":\"save options\"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `admin_storage_file`
--

CREATE TABLE `admin_storage_file` (
  `id` int(11) NOT NULL,
  `is_hidden` tinyint(1) DEFAULT '0',
  `folder_id` int(11) DEFAULT '0',
  `name_original` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_new` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_new_compound` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mime_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hash_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hash_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upload_timestamp` int(11) DEFAULT NULL,
  `file_size` int(11) DEFAULT '0',
  `upload_user_id` int(11) DEFAULT '0',
  `is_deleted` tinyint(1) DEFAULT '0',
  `passthrough_file` tinyint(1) DEFAULT '0',
  `passthrough_file_password` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passthrough_file_stats` int(11) DEFAULT '0',
  `caption` text COLLATE utf8_unicode_ci,
  `inline_disposition` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_storage_file`
--

INSERT INTO `admin_storage_file` (`id`, `is_hidden`, `folder_id`, `name_original`, `name_new`, `name_new_compound`, `mime_type`, `extension`, `hash_file`, `hash_name`, `upload_timestamp`, `file_size`, `upload_user_id`, `is_deleted`, `passthrough_file`, `passthrough_file_password`, `passthrough_file_stats`, `caption`, `inline_disposition`) VALUES
(1, 0, 1, '5.png', '5', '5_03b15e7b.png', 'image/png', 'png', '4cffdb2ac7dc60265c228a0205e2acdd', '03b15e7b', 1554471815, 143914, 1, 0, 0, NULL, 0, NULL, 0),
(2, 0, 1, '1.jpg', '1', '1_2d81ae5c.jpg', 'image/jpeg', 'jpg', 'c18fcebeabb347c07ccb9c586f6c70b1', '2d81ae5c', 1554471892, 105960, 1, 0, 0, NULL, 0, NULL, 0),
(3, 0, 1, '1.png', '1', '1_a2f3ed50.png', 'image/png', 'png', 'e57684a8e54ced41a6177c37b23ae844', 'a2f3ed50', 1554471901, 132439, 1, 0, 0, NULL, 0, NULL, 0),
(4, 0, 1, '2.png', '2', '2_6087696b.png', 'image/png', 'png', '25628c5a249cf0eccf75cb995998b9e5', '6087696b', 1554471901, 158582, 1, 0, 0, NULL, 0, NULL, 0),
(5, 0, 0, 'tbl_promotion_product.xlsx', 'tbl-promotion-product', 'tbl-promotion-product_c539eea8.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'xlsx', '02a8e6b1e5b1b8e62362029fc2bddf7d', 'c539eea8', 1554471943, 14392, 1, 1, 0, NULL, 0, NULL, 0),
(6, 0, 1, 'tbl_promotion_product.xlsx', 'tbl-promotion-product', 'tbl-promotion-product_0f8dc846.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'xlsx', '02a8e6b1e5b1b8e62362029fc2bddf7d', '0f8dc846', 1554693287, 14392, 1, 1, 0, NULL, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_storage_filter`
--

CREATE TABLE `admin_storage_filter` (
  `id` int(11) NOT NULL,
  `identifier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_storage_filter`
--

INSERT INTO `admin_storage_filter` (`id`, `identifier`, `name`) VALUES
(1, 'large-crop', 'Crop large (800x800)'),
(2, 'large-thumbnail', 'Thumbnail large (800xnull)'),
(3, 'medium-crop', 'Crop medium (300x300)'),
(4, 'medium-thumbnail', 'Thumbnail medium (300xnull)'),
(5, 'small-crop', 'Crop small (100x100)'),
(6, 'small-landscape', 'Landscape small (150x50)'),
(7, 'small-thumbnail', 'Thumbnail small (100xnull)'),
(8, 'tiny-crop', 'Crop tiny (40x40)'),
(9, 'tiny-thumbnail', 'Thumbnail tiny (40xnull)');

-- --------------------------------------------------------

--
-- Table structure for table `admin_storage_filter_chain`
--

CREATE TABLE `admin_storage_filter_chain` (
  `id` int(11) NOT NULL,
  `sort_index` int(11) DEFAULT NULL,
  `filter_id` int(11) DEFAULT NULL,
  `effect_id` int(11) DEFAULT NULL,
  `effect_json_values` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_storage_filter_chain`
--

INSERT INTO `admin_storage_filter_chain` (`id`, `sort_index`, `filter_id`, `effect_id`, `effect_json_values`) VALUES
(1, NULL, 1, 1, '{\"width\":800,\"height\":800}'),
(2, NULL, 2, 1, '{\"width\":800,\"height\":null}'),
(3, NULL, 3, 1, '{\"width\":300,\"height\":300}'),
(4, NULL, 4, 1, '{\"width\":300,\"height\":null}'),
(5, NULL, 5, 1, '{\"width\":100,\"height\":100}'),
(6, NULL, 6, 1, '{\"width\":150,\"height\":50}'),
(7, NULL, 7, 1, '{\"width\":100,\"height\":null}'),
(8, NULL, 8, 1, '{\"width\":40,\"height\":40}'),
(9, NULL, 9, 1, '{\"width\":40,\"height\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `admin_storage_folder`
--

CREATE TABLE `admin_storage_folder` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `timestamp_create` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_storage_folder`
--

INSERT INTO `admin_storage_folder` (`id`, `name`, `parent_id`, `timestamp_create`, `is_deleted`) VALUES
(1, 'products', 0, 1554471719, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_storage_image`
--

CREATE TABLE `admin_storage_image` (
  `id` int(11) NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `filter_id` int(11) DEFAULT NULL,
  `resolution_width` int(11) DEFAULT NULL,
  `resolution_height` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_storage_image`
--

INSERT INTO `admin_storage_image` (`id`, `file_id`, `filter_id`, `resolution_width`, `resolution_height`) VALUES
(1, 1, 8, 40, 40),
(2, 1, 4, 300, 300),
(3, 2, 8, 40, 40),
(4, 2, 4, 300, 300),
(5, 3, 8, 40, 40),
(6, 3, 4, 300, 300),
(7, 4, 8, 40, 40),
(8, 4, 4, 300, 300),
(9, 2, 0, 1200, 1200),
(10, 4, 0, 360, 360),
(11, 2, 3, 300, 300),
(12, 3, 0, 360, 360);

-- --------------------------------------------------------

--
-- Table structure for table `admin_tag`
--

CREATE TABLE `admin_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_tag`
--

INSERT INTO `admin_tag` (`id`, `name`) VALUES
(1, 'chanel'),
(2, 'news');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tag_relation`
--

CREATE TABLE `admin_tag_relation` (
  `tag_id` int(11) NOT NULL,
  `table_name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `pk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_tag_relation`
--

INSERT INTO `admin_tag_relation` (`tag_id`, `table_name`, `pk_id`) VALUES
(1, 'news_article', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` smallint(1) DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_token` varchar(190) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `secure_token` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `secure_token_timestamp` int(11) DEFAULT '0',
  `force_reload` tinyint(1) DEFAULT '0',
  `settings` text COLLATE utf8_unicode_ci,
  `cookie_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_api_user` tinyint(1) DEFAULT '0',
  `api_rate_limit` int(11) DEFAULT NULL,
  `api_allowed_ips` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_last_activity` int(11) DEFAULT NULL,
  `email_verification_token` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verification_token_timestamp` int(11) DEFAULT NULL,
  `login_attempt` int(11) DEFAULT NULL,
  `login_attempt_lock_expiration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `firstname`, `lastname`, `title`, `email`, `password`, `password_salt`, `auth_token`, `is_deleted`, `secure_token`, `secure_token_timestamp`, `force_reload`, `settings`, `cookie_token`, `is_api_user`, `api_rate_limit`, `api_allowed_ips`, `api_last_activity`, `email_verification_token`, `email_verification_token_timestamp`, `login_attempt`, `login_attempt_lock_expiration`) VALUES
(1, 'Hao', 'Lang', 1, 'haolangvn@gmail.com', '$2y$13$gQkIjQ/gJ2fRAvt9AnA2oeAsVx9/V573aabAVbUzPAM4zIj34arAO', '-XxkbqHE6MtMBtgL2Zk3j_TAqjpz8nNg', 'd06a05ef8ad62e346e3e37ddd40826dcf30fbe180813ce84a2be02403f5c151fXA659Ae3XYvxCZ9LKA5COtOsYSeVTw6D', 0, NULL, 0, 0, '{\"ngrestorder\":{\"admin/api-demo-demo\":{\"sort\":3,\"field\":\"id\"}},\"togglecat\":{\"1\":0},\"filemanagerFolderId\":1}', NULL, 0, NULL, NULL, 1554696156, NULL, NULL, 0, NULL),
(2, 'TGNH', 'Mr', 1, 'admin@thegioinuochoa.com.vn', '$2y$13$MRNR0BFksdt5PWVwx03UD.Wj/Y4RhfQ3/0cbdtGnjwDaEDXIpGom.', 'rx2i3URKC1XTP4lZ-tNX2jWXN7n-ecOG', '558b22203f6c7d9834342acf9d48ab8ff1bac269b401b1fdeec1366d137572cdi4STsbCyxsz_F5TWvH9wYpSIinJIMBAJ', 0, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_group`
--

CREATE TABLE `admin_user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_user_group`
--

INSERT INTO `admin_user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_login`
--

CREATE TABLE `admin_user_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp_create` int(11) NOT NULL,
  `auth_token` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `is_destroyed` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_user_login`
--

INSERT INTO `admin_user_login` (`id`, `user_id`, `timestamp_create`, `auth_token`, `ip`, `is_destroyed`) VALUES
(1, 1, 1554392161, '755a85aeb232b0cf1235efebf32e5806c77b7056baa7e8c28ed7cd7e9fa937a6Deg-_JPY2wJYXN0g473FOMti8OTneX1T', '::1', 1),
(2, 1, 1554432254, 'f80ddde1a2d1c8235c4846ae8b768ff560469064df2865c3b09675dac241434bFCZZq57j06JQOoKn_Y8ryofram3Tdf-C', '::1', 1),
(3, 1, 1554446811, '4fd7f8716fdedc88e1afb4dbdf5ea2024f8c18c14b10299053f0158f5638a87f4n5eSQBF-C5xA8v-8mFliiOkSjRYvlMI', '::1', 1),
(4, 1, 1554454990, '9b22b1144b127935909ccad4d7625a02159e1e1b54546d5c88f16adb0c4daa783tKgPyiY_3lpqrswBOT7YTObxgV2mJLq', '::1', 1),
(5, 1, 1554455057, 'a23e79a09262cf00d9c9df860e1ae874bd927d0bcb46012de885ae0a313f85b9uUPgUr4kFhvisqBPcZEaHQrYOdj45xIE', '::1', 1),
(6, 1, 1554456082, '32989325b63e25d1a00cde967dfbb8efab9d7ccc87738aba85e3d886d05e4c60kqzVthjhdMXUPkozeGwaqgk0IzU-KBkG', '::1', 1),
(7, 1, 1554461478, 'eef0d315e6fb67dfc99165257f346dddb7e2eb9a81f4cc4b4764bc11f955d568SEIC_fp1P8JJIW_XnyY5vK1DQPAWRW1K', '::1', 1),
(8, 1, 1554474599, '3f6cb5f95d2d4050d9a87290dc167a85778efcb7d901b17730a8fc7310b20003-vC05QJzhc9jWNnjkbPnhGmXNVYLiK7B', '::1', 1),
(9, 1, 1554517569, '1fe018a92e7eb66e73b0486da9e8784214ce0efc5eab4b58b52d4f80b26645e0zOpdOXOtrNBvEstR-ZxQ9LXlDfGSzTNr', '::1', 1),
(10, 1, 1554569230, '296def0ae932eadf01c5224348076bb4b38cff1ceeff6d700c7c10757dc10cf5DlyBvqXoKGwntT_hv9c3HeQ2xMqox85k', '::1', 1),
(11, 1, 1554612393, '8e7371ac9fb163fbad0b3b447a6afca85fbc0ec30d87b361335dd3b883167444994BIqRCZ4gMUa89jlrsmU2dv7ZJDTiU', '::1', 1),
(12, 1, 1554616434, '817858fd5258c4103997bfb14dc5a96b216ff40910b80db706ac587cc1636723diC-5Ae8DHW5m3S1YaAQpGpetQ-lAewt', '::1', 1),
(13, 1, 1554644548, '509b911d700aa42a06da83772042eb50805e7b09d11d626bb879a733776b0c4emmN96Rl-vcAtbsnfCKwlqao7bSSC0MtH', '::1', 1),
(14, 1, 1554651737, '2b9b5ea8693013c878be37fc484a5909c8deb1613072087df7a7adfac2822e3ffBuywkAL8PKJkU5qBaIf_TcXjIyHcPZS', '::1', 1),
(15, 1, 1554693131, '6531a1026295f4ef29719ffd34d6f8a9312713cfb5977b836a2bed587e1053171Ta0Cwo6J-QzgP014jPFy2sUtaYgNxAz', '::1', 1),
(16, 1, 1554695953, 'd06a05ef8ad62e346e3e37ddd40826dcf30fbe180813ce84a2be02403f5c151fXA659Ae3XYvxCZ9LKA5COtOsYSeVTw6D', '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_online`
--

CREATE TABLE `admin_user_online` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_timestamp` int(11) NOT NULL,
  `invoken_route` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `lock_pk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lock_table` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lock_translation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lock_translation_args` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_user_online`
--

INSERT INTO `admin_user_online` (`id`, `user_id`, `last_timestamp`, `invoken_route`, `lock_pk`, `lock_table`, `lock_translation`, `lock_translation_args`) VALUES
(5, 1, 1554696093, 'api-admin-user', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_block`
--

CREATE TABLE `cms_block` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_disabled` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_block`
--

INSERT INTO `cms_block` (`id`, `group_id`, `class`, `is_disabled`) VALUES
(1, 1, '\\luya\\cms\\frontend\\blocks\\HtmlBlock', 0),
(2, 1, '\\luya\\cms\\frontend\\blocks\\ModuleBlock', 0),
(3, 2, '\\luya\\news\\frontend\\blocks\\LatestNews', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_block_group`
--

CREATE TABLE `cms_block_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `identifier` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `created_timestamp` int(11) DEFAULT '0',
  `class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_block_group`
--

INSERT INTO `cms_block_group` (`id`, `name`, `is_deleted`, `identifier`, `created_timestamp`, `class`) VALUES
(1, 'block_group_dev_elements', 0, 'development-group', 1554391981, '\\luya\\cms\\frontend\\blockgroups\\DevelopmentGroup'),
(2, 'block_group_basic_elements', 0, 'main-group', 1554651598, '\\luya\\cms\\frontend\\blockgroups\\MainGroup');

-- --------------------------------------------------------

--
-- Table structure for table `cms_config`
--

CREATE TABLE `cms_config` (
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_config`
--

INSERT INTO `cms_config` (`name`, `value`) VALUES
('httpExceptionNavId', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cms_layout`
--

CREATE TABLE `cms_layout` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `json_config` text COLLATE utf8_unicode_ci,
  `view_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_layout`
--

INSERT INTO `cms_layout` (`id`, `name`, `json_config`, `view_file`) VALUES
(1, 'Main', '{\"placeholders\":[[{\"cols\":12,\"var\":\"content\",\"label\":\"Main Container\"}]]}', '@app/views/cmslayouts\\main.php'),
(2, '2column', '{\"placeholders\":[[{\"cols\":8,\"var\":\"left\",\"label\":\"Main content Left\"},{\"cols\":4,\"var\":\"right\",\"label\":\"Sidebar Right\"}]]}', '@app/views/cmslayouts\\2column.php');

-- --------------------------------------------------------

--
-- Table structure for table `cms_log`
--

CREATE TABLE `cms_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `is_insertion` tinyint(1) DEFAULT '0',
  `is_update` tinyint(1) DEFAULT '0',
  `is_deletion` tinyint(1) DEFAULT '0',
  `timestamp` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_json` text COLLATE utf8_unicode_ci,
  `table_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `row_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_log`
--

INSERT INTO `cms_log` (`id`, `user_id`, `is_insertion`, `is_update`, `is_deletion`, `timestamp`, `message`, `data_json`, `table_name`, `row_id`) VALUES
(1, 1, 1, 0, 0, 1554392433, '{\"tableName\":\"cms_nav\",\"action\":\"insert\",\"row\":2}', '{\"parent_nav_id\":\"0\",\"nav_container_id\":\"1\",\"is_hidden\":true,\"is_offline\":true,\"sort_index\":1,\"id\":2}', 'cms_nav', 2),
(2, 1, 1, 0, 0, 1554392433, '{\"tableName\":\"cms_nav_item\",\"action\":\"insert\",\"row\":2}', '{\"lang_id\":\"1\",\"title\":\"Demo\",\"alias\":\"demo2\",\"description\":\"Demo Content\",\"nav_item_type\":2,\"nav_item_type_id\":1,\"nav_id\":2,\"timestamp_create\":1554392433,\"timestamp_update\":0,\"create_user_id\":1,\"update_user_id\":1,\"id\":2}', 'cms_nav_item', 2),
(3, 1, 0, 1, 0, 1554392440, '{\"tableName\":\"cms_nav\",\"action\":\"update\",\"row\":2}', '{\"id\":2,\"nav_container_id\":1,\"parent_nav_id\":0,\"sort_index\":2,\"is_deleted\":0,\"is_hidden\":\"0\",\"is_home\":0,\"is_offline\":1,\"is_draft\":0,\"layout_file\":null,\"publish_from\":null,\"publish_till\":null}', 'cms_nav', 2),
(4, 1, 0, 1, 0, 1554392441, '{\"tableName\":\"cms_nav\",\"action\":\"update\",\"row\":2}', '{\"id\":2,\"nav_container_id\":1,\"parent_nav_id\":0,\"sort_index\":2,\"is_deleted\":0,\"is_hidden\":0,\"is_home\":0,\"is_offline\":\"0\",\"is_draft\":0,\"layout_file\":null,\"publish_from\":null,\"publish_till\":null}', 'cms_nav', 2),
(5, 1, 1, 0, 0, 1554432988, '{\"tableName\":\"cms_nav\",\"action\":\"insert\",\"row\":3}', '{\"parent_nav_id\":\"0\",\"nav_container_id\":\"1\",\"is_hidden\":true,\"is_offline\":true,\"is_draft\":\"0\",\"sort_index\":3,\"id\":3}', 'cms_nav', 3),
(6, 1, 1, 0, 0, 1554432989, '{\"tableName\":\"cms_nav_item\",\"action\":\"insert\",\"row\":3}', '{\"lang_id\":\"1\",\"title\":\"Test\",\"alias\":\"test\",\"description\":null,\"nav_item_type\":1,\"nav_item_type_id\":2,\"nav_id\":3,\"timestamp_create\":1554432988,\"timestamp_update\":0,\"create_user_id\":1,\"update_user_id\":1,\"id\":3}', 'cms_nav_item', 3),
(7, 1, 0, 1, 0, 1554432999, '{\"tableName\":\"cms_nav\",\"action\":\"update\",\"row\":3}', '{\"id\":3,\"nav_container_id\":1,\"parent_nav_id\":0,\"sort_index\":3,\"is_deleted\":0,\"is_hidden\":\"0\",\"is_home\":0,\"is_offline\":1,\"is_draft\":0,\"layout_file\":null,\"publish_from\":null,\"publish_till\":null}', 'cms_nav', 3),
(8, 1, 0, 1, 0, 1554433000, '{\"tableName\":\"cms_nav\",\"action\":\"update\",\"row\":3}', '{\"id\":3,\"nav_container_id\":1,\"parent_nav_id\":0,\"sort_index\":3,\"is_deleted\":0,\"is_hidden\":0,\"is_home\":0,\"is_offline\":\"0\",\"is_draft\":0,\"layout_file\":null,\"publish_from\":null,\"publish_till\":null}', 'cms_nav', 3),
(9, 1, 1, 0, 0, 1554433009, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"insert\",\"row\":1,\"pageTitle\":\"Test\",\"blockName\":\"Module\"}', '[]', 'cms_nav_item_page_block_item', 1),
(10, 1, 1, 0, 0, 1554433014, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"insert\",\"row\":2,\"pageTitle\":\"Test\",\"blockName\":\"Module\"}', '[]', 'cms_nav_item_page_block_item', 2),
(11, 1, 0, 1, 0, 1554433020, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"update\",\"row\":2,\"pageTitle\":\"Test\",\"blockName\":\"Module\"}', '[]', 'cms_nav_item_page_block_item', 2),
(12, 1, 0, 1, 0, 1554433025, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"update\",\"row\":1,\"pageTitle\":\"Test\",\"blockName\":\"Module\"}', '[]', 'cms_nav_item_page_block_item', 1),
(13, 1, 0, 0, 1, 1554433100, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"delete\",\"row\":2,\"pageTitle\":\"Test\",\"blockName\":\"Module\"}', '[]', 'cms_nav_item_page_block_item', 2),
(14, 1, 1, 0, 0, 1554433156, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"insert\",\"row\":3,\"pageTitle\":\"Test\",\"blockName\":\"Module\"}', '[]', 'cms_nav_item_page_block_item', 3),
(15, 1, 0, 1, 0, 1554433169, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"update\",\"row\":3,\"pageTitle\":\"Test\",\"blockName\":\"Module\"}', '[]', 'cms_nav_item_page_block_item', 3),
(16, 1, 0, 1, 0, 1554433213, '{\"tableName\":\"cms_nav_item\",\"action\":\"update\",\"row\":3}', '{\"id\":3,\"nav_id\":3,\"lang_id\":1,\"nav_item_type\":1,\"nav_item_type_id\":\"3\",\"create_user_id\":1,\"update_user_id\":1,\"timestamp_create\":\"1554432988\",\"timestamp_update\":1554433212,\"title\":\"Test\",\"alias\":\"test\",\"description\":\"\",\"keywords\":\"\",\"title_tag\":\"\"}', 'cms_nav_item', 3),
(17, 1, 1, 0, 0, 1554451957, '{\"tableName\":\"cms_nav_item\",\"action\":\"insert\",\"row\":4}', '{\"nav_id\":1,\"lang_id\":\"2\",\"nav_item_type\":1,\"nav_item_type_id\":1,\"timestamp_create\":1554451957,\"timestamp_update\":0,\"title\":\"Homepage\",\"alias\":\"homepage\",\"description\":null,\"keywords\":null,\"title_tag\":null,\"create_user_id\":1,\"update_user_id\":1,\"id\":4}', 'cms_nav_item', 4),
(18, 1, 0, 1, 0, 1554451957, '{\"tableName\":\"cms_nav_item\",\"action\":\"update\",\"row\":4}', '{\"nav_id\":1,\"lang_id\":\"2\",\"nav_item_type\":1,\"nav_item_type_id\":4,\"timestamp_create\":1554451957,\"timestamp_update\":1554451957,\"title\":\"Homepage\",\"alias\":\"homepage\",\"description\":null,\"keywords\":null,\"title_tag\":null,\"create_user_id\":1,\"update_user_id\":1,\"id\":4}', 'cms_nav_item', 4),
(19, 1, 1, 0, 0, 1554452352, '{\"tableName\":\"cms_nav_item\",\"action\":\"insert\",\"row\":5}', '{\"nav_id\":2,\"lang_id\":\"2\",\"nav_item_type\":2,\"nav_item_type_id\":1,\"timestamp_create\":1554452352,\"timestamp_update\":0,\"title\":\"Demo\",\"alias\":\"demo2\",\"description\":\"Demo Content\",\"keywords\":null,\"title_tag\":null,\"create_user_id\":1,\"update_user_id\":1,\"id\":5}', 'cms_nav_item', 5),
(20, 1, 0, 1, 0, 1554452353, '{\"tableName\":\"cms_nav_item\",\"action\":\"update\",\"row\":5}', '{\"nav_id\":2,\"lang_id\":\"2\",\"nav_item_type\":2,\"nav_item_type_id\":2,\"timestamp_create\":1554452352,\"timestamp_update\":1554452353,\"title\":\"Demo\",\"alias\":\"demo2\",\"description\":\"Demo Content\",\"keywords\":null,\"title_tag\":null,\"create_user_id\":1,\"update_user_id\":1,\"id\":5}', 'cms_nav_item', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cms_nav`
--

CREATE TABLE `cms_nav` (
  `id` int(11) NOT NULL,
  `nav_container_id` int(11) NOT NULL,
  `parent_nav_id` int(11) NOT NULL,
  `sort_index` int(11) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_hidden` tinyint(1) DEFAULT '0',
  `is_home` tinyint(1) DEFAULT '0',
  `is_offline` tinyint(1) DEFAULT '0',
  `is_draft` tinyint(1) DEFAULT '0',
  `layout_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_from` int(11) DEFAULT NULL,
  `publish_till` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_nav`
--

INSERT INTO `cms_nav` (`id`, `nav_container_id`, `parent_nav_id`, `sort_index`, `is_deleted`, `is_hidden`, `is_home`, `is_offline`, `is_draft`, `layout_file`, `publish_from`, `publish_till`) VALUES
(1, 1, 0, 1, 0, 0, 1, 0, 0, NULL, NULL, NULL),
(2, 1, 0, 2, 0, 0, 0, 0, 0, NULL, NULL, NULL),
(3, 1, 0, 3, 0, 0, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_nav_container`
--

CREATE TABLE `cms_nav_container` (
  `id` int(11) NOT NULL,
  `name` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_nav_container`
--

INSERT INTO `cms_nav_container` (`id`, `name`, `alias`, `is_deleted`) VALUES
(1, 'Default Container', 'default', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_nav_item`
--

CREATE TABLE `cms_nav_item` (
  `id` int(11) NOT NULL,
  `nav_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `nav_item_type` int(11) NOT NULL,
  `nav_item_type_id` int(11) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `timestamp_create` int(11) DEFAULT '0',
  `timestamp_update` int(11) DEFAULT '0',
  `title` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `keywords` text COLLATE utf8_unicode_ci,
  `title_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_nav_item`
--

INSERT INTO `cms_nav_item` (`id`, `nav_id`, `lang_id`, `nav_item_type`, `nav_item_type_id`, `create_user_id`, `update_user_id`, `timestamp_create`, `timestamp_update`, `title`, `alias`, `description`, `keywords`, `title_tag`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1554392103, 0, 'Homepage', 'homepage', NULL, NULL, NULL),
(2, 2, 1, 2, 1, 1, 1, 1554392433, 0, 'Demo', 'demo2', 'Demo Content', NULL, NULL),
(3, 3, 1, 1, 3, 1, 1, 1554432988, 1554433212, 'Test', 'test', '', '', ''),
(4, 1, 2, 1, 4, 1, 1, 1554451957, 1554451957, 'Homepage', 'homepage', NULL, NULL, NULL),
(5, 2, 2, 2, 2, 1, 1, 1554452352, 1554452353, 'Demo', 'demo2', 'Demo Content', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_nav_item_module`
--

CREATE TABLE `cms_nav_item_module` (
  `id` int(11) NOT NULL,
  `module_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_nav_item_module`
--

INSERT INTO `cms_nav_item_module` (`id`, `module_name`) VALUES
(1, 'demo'),
(2, 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `cms_nav_item_page`
--

CREATE TABLE `cms_nav_item_page` (
  `id` int(11) NOT NULL,
  `layout_id` int(11) NOT NULL,
  `nav_item_id` int(11) NOT NULL,
  `timestamp_create` int(11) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `version_alias` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_nav_item_page`
--

INSERT INTO `cms_nav_item_page` (`id`, `layout_id`, `nav_item_id`, `timestamp_create`, `create_user_id`, `version_alias`) VALUES
(1, 1, 1, 1554392103, 1, 'Initial'),
(2, 2, 3, 1554432988, 1, 'Initial'),
(3, 1, 3, 1554433116, 1, 'test2'),
(4, 1, 4, 1554392103, 1, 'First version');

-- --------------------------------------------------------

--
-- Table structure for table `cms_nav_item_page_block_item`
--

CREATE TABLE `cms_nav_item_page_block_item` (
  `id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `placeholder_var` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `nav_item_page_id` int(11) DEFAULT NULL,
  `prev_id` int(11) DEFAULT NULL,
  `json_config_values` text COLLATE utf8_unicode_ci,
  `json_config_cfg_values` text COLLATE utf8_unicode_ci,
  `is_dirty` tinyint(1) DEFAULT '0',
  `create_user_id` int(11) DEFAULT '0',
  `update_user_id` int(11) DEFAULT '0',
  `timestamp_create` int(11) DEFAULT '0',
  `timestamp_update` int(11) DEFAULT '0',
  `sort_index` int(11) DEFAULT '0',
  `is_hidden` tinyint(1) DEFAULT '0',
  `variation` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_nav_item_page_block_item`
--

INSERT INTO `cms_nav_item_page_block_item` (`id`, `block_id`, `placeholder_var`, `nav_item_page_id`, `prev_id`, `json_config_values`, `json_config_cfg_values`, `is_dirty`, `create_user_id`, `update_user_id`, `timestamp_create`, `timestamp_update`, `sort_index`, `is_hidden`, `variation`) VALUES
(1, 2, 'left', 2, 0, '{\"moduleName\":\"demo\"}', '{\"__e\":\"__o\"}', 1, 1, 1, 1554433009, 1554433025, 0, 0, '0'),
(3, 2, 'content', 3, 0, '{\"moduleName\":\"demo\"}', '{\"__e\":\"__o\"}', 1, 1, 1, 1554433155, 1554433169, 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `cms_nav_item_redirect`
--

CREATE TABLE `cms_nav_item_redirect` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_nav_permission`
--

CREATE TABLE `cms_nav_permission` (
  `group_id` int(11) NOT NULL,
  `nav_id` int(11) NOT NULL,
  `inheritance` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_nav_property`
--

CREATE TABLE `cms_nav_property` (
  `id` int(11) NOT NULL,
  `nav_id` int(11) NOT NULL,
  `admin_prop_id` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_redirect`
--

CREATE TABLE `cms_redirect` (
  `id` int(11) NOT NULL,
  `timestamp_create` int(11) DEFAULT NULL,
  `catch_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_status_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1554391835),
('m141104_104622_admin_group', 1554391838),
('m141104_104631_admin_user_group', 1554391841),
('m141104_114809_admin_user', 1554391841),
('m141203_121042_admin_lang', 1554391842),
('m141203_143052_cms_cat', 1554391843),
('m141203_143059_cms_nav', 1554391844),
('m141203_143111_cms_nav_item', 1554391844),
('m141208_134038_cms_nav_item_page', 1554391845),
('m150106_095003_cms_layout', 1554391846),
('m150108_154017_cms_block', 1554391846),
('m150108_155009_cms_nav_item_page_block_item', 1554391847),
('m150122_125429_cms_nav_item_module', 1554391848),
('m150204_144806_news_article', 1554651767),
('m150205_141350_block_group', 1554391848),
('m150304_152220_admin_storage_folder', 1554391849),
('m150304_152238_admin_storage_file', 1554391850),
('m150304_152244_admin_storage_filter', 1554391851),
('m150304_152250_admin_storage_effect', 1554391852),
('m150304_152256_admin_storage_image', 1554391853),
('m150309_142652_admin_storage_filter_chain', 1554391853),
('m150323_125407_admin_auth', 1554391854),
('m150323_132625_admin_group_auth', 1554391854),
('m150331_125022_admin_ngrest_log', 1554391855),
('m150428_095829_news_cat', 1554651768),
('m150615_094744_admin_user_login', 1554391856),
('m150617_200836_admin_user_online', 1554391856),
('m150626_084948_admin_search_data', 1554391857),
('m150915_081559_admin_config', 1554391858),
('m150924_112309_cms_nav_prop', 1554391859),
('m150924_120914_admin_prop', 1554391861),
('m151012_072207_cms_log', 1554391862),
('m151022_143429_cms_nav_item_redirect', 1554391863),
('m151026_161841_admin_tag', 1554391865),
('m160629_092417_cmspermissiontable', 1554391866),
('m160915_081618_create_admin_logger_table', 1554391867),
('m161212_084323_add_teaser_field', 1554651770),
('m161219_150240_admin_lang_soft_delete', 1554391868),
('m161220_183300_lcp_base_tables', 1554391870),
('m170116_120553_cms_block_variation_field', 1554391871),
('m170131_104109_user_model_updates', 1554391877),
('m170218_215610_cms_nav_layout_file', 1554391877),
('m170301_084325_cms_config', 1554391878),
('m170619_103728_cms_blocksettings', 1554391879),
('m170926_144137_add_admin_user_session_id_column', 1554391880),
('m170926_164913_add_ngrest_log_diff_data', 1554391886),
('m171003_065811_add_class_column_to_block_group_table', 1554391888),
('m171009_083835_add_admin_user_login_destroy_info', 1554391890),
('m171121_170909_add_publish_at_date', 1554391891),
('m171129_104706_config_add_system_type', 1554391895),
('m171206_113949_cms_redirection_table', 1554391896),
('m180214_134657_system_user_ngrest_deletion', 1554391905),
('m180326_170839_file_disposition', 1554391906),
('m180412_092824_user_security_columns_v12', 1554391911),
('m180527_225613_user_login_ipv6', 1554391912),
('m180619_134519_indexes', 1554391913),
('m180723_120432_indexes', 1554391943),
('m180723_123237_indexes', 1554391961),
('m181113_120432_user_index', 1554391962);

-- --------------------------------------------------------

--
-- Table structure for table `news_article`
--

CREATE TABLE `news_article` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `text` text COLLATE utf8_unicode_ci,
  `cat_id` int(11) DEFAULT '0',
  `image_id` int(11) DEFAULT '0',
  `image_list` text COLLATE utf8_unicode_ci,
  `file_list` text COLLATE utf8_unicode_ci,
  `create_user_id` int(11) DEFAULT '0',
  `update_user_id` int(11) DEFAULT '0',
  `timestamp_create` int(11) DEFAULT '0',
  `timestamp_update` int(11) DEFAULT '0',
  `timestamp_display_from` int(11) DEFAULT '0',
  `timestamp_display_until` int(11) DEFAULT '0',
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_display_limit` tinyint(1) DEFAULT '0',
  `teaser_text` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_article`
--

INSERT INTO `news_article` (`id`, `title`, `text`, `cat_id`, `image_id`, `image_list`, `file_list`, `create_user_id`, `update_user_id`, `timestamp_create`, `timestamp_update`, `timestamp_display_from`, `timestamp_display_until`, `is_deleted`, `is_display_limit`, `teaser_text`) VALUES
(1, '{\"en\":\"2222222222\",\"vn\":\"\"}', '{\"en\":\"222222222222222\",\"vn\":\"\"}', 1, 9, '{\"en\":[{\"imageId\":10,\"caption\":\"\"}],\"vn\":[]}', '[{\"fileId\":0,\"caption\":\"\"}]', 1, 1, 1554652112, 1554652699, 1554652112, NULL, 0, 0, '{\"en\":\"222222222222222222222\",\"vn\":\"\"}');

-- --------------------------------------------------------

--
-- Table structure for table `news_cat`
--

CREATE TABLE `news_cat` (
  `id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_cat`
--

INSERT INTO `news_cat` (`id`, `title`) VALUES
(1, '{\"vn\":\"Thời sự\",\"en\":\"News\"}'),
(2, '{\"vn\":\"Đời sống\",\"en\":\"Life\"}');

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
(1, 1, 'Hao', 'Lang', 'haolangvn@gmail.com', 1554736776, 1552899730, 1552899730),
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
-- Indexes for table `admin_auth`
--
ALTER TABLE `admin_auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_route` (`route`),
  ADD KEY `index_api` (`api`);

--
-- Indexes for table `admin_config`
--
ALTER TABLE `admin_config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_name` (`name`);

--
-- Indexes for table `admin_group`
--
ALTER TABLE `admin_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_group_auth`
--
ALTER TABLE `admin_group_auth`
  ADD KEY `index_group_id` (`group_id`),
  ADD KEY `index_auth_id` (`auth_id`),
  ADD KEY `index_group_id_auth_id` (`group_id`,`auth_id`);

--
-- Indexes for table `admin_lang`
--
ALTER TABLE `admin_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_short_code` (`short_code`);

--
-- Indexes for table `admin_logger`
--
ALTER TABLE `admin_logger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_ngrest_log`
--
ALTER TABLE `admin_ngrest_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_user_id` (`user_id`);

--
-- Indexes for table `admin_property`
--
ALTER TABLE `admin_property`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `var_name` (`var_name`),
  ADD KEY `index_var_name` (`var_name`),
  ADD KEY `index_class_name` (`class_name`);

--
-- Indexes for table `admin_proxy_build`
--
ALTER TABLE `admin_proxy_build`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `build_token` (`build_token`),
  ADD KEY `index_machine_id` (`machine_id`),
  ADD KEY `index_build_token` (`build_token`);

--
-- Indexes for table `admin_proxy_machine`
--
ALTER TABLE `admin_proxy_machine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identifier` (`identifier`),
  ADD KEY `index_access_token` (`access_token`),
  ADD KEY `index_identifier` (`identifier`),
  ADD KEY `index_is_deleted` (`is_deleted`),
  ADD KEY `index_identifier_is_deleted` (`identifier`,`is_deleted`);

--
-- Indexes for table `admin_search_data`
--
ALTER TABLE `admin_search_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_storage_effect`
--
ALTER TABLE `admin_storage_effect`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identifier` (`identifier`),
  ADD KEY `index_identifier` (`identifier`);

--
-- Indexes for table `admin_storage_file`
--
ALTER TABLE `admin_storage_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_storage_file_index1` (`folder_id`,`is_hidden`,`is_deleted`,`name_original`),
  ADD KEY `admin_storage_file_index2` (`is_deleted`,`id`),
  ADD KEY `index_upload_user_id` (`upload_user_id`),
  ADD KEY `index_id_hash_name_is_deleted` (`id`,`hash_name`,`is_deleted`),
  ADD KEY `index_name_new_compound` (`name_new_compound`);

--
-- Indexes for table `admin_storage_filter`
--
ALTER TABLE `admin_storage_filter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identifier` (`identifier`),
  ADD KEY `index_identifier` (`identifier`);

--
-- Indexes for table `admin_storage_filter_chain`
--
ALTER TABLE `admin_storage_filter_chain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_filter_id` (`filter_id`),
  ADD KEY `index_effect_id` (`effect_id`);

--
-- Indexes for table `admin_storage_folder`
--
ALTER TABLE `admin_storage_folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_storage_image`
--
ALTER TABLE `admin_storage_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_storage_image_index1` (`file_id`),
  ADD KEY `index_filter_id` (`filter_id`),
  ADD KEY `index_file_id_filter_id` (`file_id`,`filter_id`);

--
-- Indexes for table `admin_tag`
--
ALTER TABLE `admin_tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `admin_tag_relation`
--
ALTER TABLE `admin_tag_relation`
  ADD KEY `index_tag_id` (`tag_id`),
  ADD KEY `index_table_name` (`table_name`),
  ADD KEY `index_pk_id` (`pk_id`),
  ADD KEY `index_table_name_pk_id` (`table_name`,`pk_id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `auth_token` (`auth_token`),
  ADD KEY `index_email` (`email`),
  ADD KEY `index_auth_token` (`auth_token`),
  ADD KEY `index_is_deleted_auth_token` (`is_deleted`,`auth_token`),
  ADD KEY `index_is_deleted_id` (`is_deleted`,`id`),
  ADD KEY `index_api_last_activity_id` (`api_last_activity`,`id`);

--
-- Indexes for table `admin_user_group`
--
ALTER TABLE `admin_user_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_user_id` (`user_id`),
  ADD KEY `index_group_id` (`group_id`),
  ADD KEY `index_user_id_group_id` (`user_id`,`group_id`);

--
-- Indexes for table `admin_user_login`
--
ALTER TABLE `admin_user_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_user_id` (`user_id`),
  ADD KEY `index_ip` (`ip`),
  ADD KEY `index_auth_token` (`auth_token`),
  ADD KEY `index_is_destroyed` (`is_destroyed`),
  ADD KEY `index_user_id_timestamp_create` (`user_id`,`timestamp_create`);

--
-- Indexes for table `admin_user_online`
--
ALTER TABLE `admin_user_online`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_user_id` (`user_id`);

--
-- Indexes for table `cms_block`
--
ALTER TABLE `cms_block`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_group_id` (`group_id`),
  ADD KEY `index_class` (`class`);

--
-- Indexes for table `cms_block_group`
--
ALTER TABLE `cms_block_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_config`
--
ALTER TABLE `cms_config`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `cms_layout`
--
ALTER TABLE `cms_layout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_log`
--
ALTER TABLE `cms_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_user_id` (`user_id`);

--
-- Indexes for table `cms_nav`
--
ALTER TABLE `cms_nav`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_nav_container` (`nav_container_id`),
  ADD KEY `index_parent_nav_id` (`parent_nav_id`);

--
-- Indexes for table `cms_nav_container`
--
ALTER TABLE `cms_nav_container`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_nav_item`
--
ALTER TABLE `cms_nav_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_alias` (`alias`),
  ADD KEY `index_nav_id` (`nav_id`),
  ADD KEY `index_lang_id` (`lang_id`),
  ADD KEY `index_nav_item_type_id` (`nav_item_type_id`),
  ADD KEY `index_create_user_id` (`create_user_id`),
  ADD KEY `index_update_user_id` (`update_user_id`);

--
-- Indexes for table `cms_nav_item_module`
--
ALTER TABLE `cms_nav_item_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_nav_item_page`
--
ALTER TABLE `cms_nav_item_page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_layout_id` (`layout_id`),
  ADD KEY `index_nav_item_id` (`nav_item_id`),
  ADD KEY `index_create_user_id` (`create_user_id`);

--
-- Indexes for table `cms_nav_item_page_block_item`
--
ALTER TABLE `cms_nav_item_page_block_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_block_id` (`block_id`),
  ADD KEY `index_placeholder_var` (`placeholder_var`),
  ADD KEY `index_nav_item_page_id` (`nav_item_page_id`),
  ADD KEY `index_prev_id` (`prev_id`),
  ADD KEY `index_create_user_id` (`create_user_id`),
  ADD KEY `index_update_user_id` (`update_user_id`),
  ADD KEY `index_nipi_pv_pi_ih_si` (`nav_item_page_id`,`placeholder_var`,`prev_id`,`is_hidden`,`sort_index`);

--
-- Indexes for table `cms_nav_item_redirect`
--
ALTER TABLE `cms_nav_item_redirect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_nav_permission`
--
ALTER TABLE `cms_nav_permission`
  ADD KEY `index_group_id` (`group_id`),
  ADD KEY `index_nav_id` (`nav_id`),
  ADD KEY `index_group_id_nav_id` (`group_id`,`nav_id`);

--
-- Indexes for table `cms_nav_property`
--
ALTER TABLE `cms_nav_property`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_nav_id` (`nav_id`),
  ADD KEY `index_admin_prop_id` (`admin_prop_id`);

--
-- Indexes for table `cms_redirect`
--
ALTER TABLE `cms_redirect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `news_article`
--
ALTER TABLE `news_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_cat`
--
ALTER TABLE `news_cat`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin_auth`
--
ALTER TABLE `admin_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `admin_config`
--
ALTER TABLE `admin_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_group`
--
ALTER TABLE `admin_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_lang`
--
ALTER TABLE `admin_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_logger`
--
ALTER TABLE `admin_logger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_ngrest_log`
--
ALTER TABLE `admin_ngrest_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `admin_property`
--
ALTER TABLE `admin_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_proxy_build`
--
ALTER TABLE `admin_proxy_build`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_proxy_machine`
--
ALTER TABLE `admin_proxy_machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_search_data`
--
ALTER TABLE `admin_search_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_storage_effect`
--
ALTER TABLE `admin_storage_effect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_storage_file`
--
ALTER TABLE `admin_storage_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_storage_filter`
--
ALTER TABLE `admin_storage_filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_storage_filter_chain`
--
ALTER TABLE `admin_storage_filter_chain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_storage_folder`
--
ALTER TABLE `admin_storage_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_storage_image`
--
ALTER TABLE `admin_storage_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin_tag`
--
ALTER TABLE `admin_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_user_group`
--
ALTER TABLE `admin_user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_user_login`
--
ALTER TABLE `admin_user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin_user_online`
--
ALTER TABLE `admin_user_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cms_block`
--
ALTER TABLE `cms_block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_block_group`
--
ALTER TABLE `cms_block_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_layout`
--
ALTER TABLE `cms_layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_log`
--
ALTER TABLE `cms_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cms_nav`
--
ALTER TABLE `cms_nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_nav_container`
--
ALTER TABLE `cms_nav_container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_nav_item`
--
ALTER TABLE `cms_nav_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cms_nav_item_module`
--
ALTER TABLE `cms_nav_item_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_nav_item_page`
--
ALTER TABLE `cms_nav_item_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_nav_item_page_block_item`
--
ALTER TABLE `cms_nav_item_page_block_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_nav_item_redirect`
--
ALTER TABLE `cms_nav_item_redirect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_nav_property`
--
ALTER TABLE `cms_nav_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_redirect`
--
ALTER TABLE `cms_redirect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_article`
--
ALTER TABLE `news_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news_cat`
--
ALTER TABLE `news_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
