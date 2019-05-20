-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2019 at 03:32 AM
-- Server version: 5.7.26
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1905_minus417`
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
(27, 'Change Log', 'mainadmin', 1, '0', 'api-main-ngrestlog'),
(28, 'Demo', 'demoadmin', 1, '0', 'api-demo-demo'),
(29, 'Test', 'demoadmin', 1, '0', 'api-demo-test'),
(30, 'Finder', 'demoadmin', 0, 'demoadmin/finder/index', '0');

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
('last_import_timestamp', '1558237982', 1, 2),
('installer_vendor_timestamp', '1558237297', 1, 3),
('setup_command_timestamp', '1558238053', 1, 4);

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
(1, 13, 1, 1, 1),
(1, 14, 1, 1, 1),
(1, 15, 1, 1, 1),
(1, 16, 1, 1, 1),
(1, 17, 1, 1, 1),
(1, 18, 1, 1, 1),
(1, 19, 1, 1, 1),
(1, 27, 1, 1, 1),
(1, 28, 1, 1, 1),
(1, 29, 1, 1, 1),
(1, 12, 1, 1, 1),
(1, 24, 1, 1, 1),
(1, 25, 1, 1, 1),
(1, 20, 1, 1, 1),
(1, 22, 1, 1, 1),
(1, 23, 1, 1, 1),
(1, 21, 1, 1, 1),
(1, 26, 1, 1, 1),
(1, 30, 1, 1, 1);

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
(2, 'Việt nam', 'vi', 1, 0);

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
(1, 1, 1558247897, '', 'api-admin-lang', 0, 1, '{\"id\":2,\"name\":\"Việt nam\",\"short_code\":\"vn\",\"is_default\":1,\"is_deleted\":null}', NULL, '2', 'admin_lang', 0),
(2, 1, 1558248067, '', 'api-cms-navcontainer', 1, 0, '{\"id\":1,\"name\":\"Navigation\",\"alias\":\"navigation\",\"is_deleted\":0}', '{\"name\":\"Default Container\",\"alias\":\"default\"}', '1', 'cms_nav_container', 0),
(3, 1, 1558248172, '', 'api-admin-lang', 1, 0, '{\"id\":1,\"name\":\"English\",\"short_code\":\"en\",\"is_default\":1,\"is_deleted\":0}', '{\"is_default\":null}', '1', 'admin_lang', 0),
(4, 1, 1558248324, '', 'api-admin-lang', 1, 0, '{\"id\":2,\"name\":\"Việt nam\",\"short_code\":\"vn\",\"is_default\":1,\"is_deleted\":0}', '{\"is_default\":null}', '2', 'admin_lang', 0),
(5, 1, 1558266137, '', 'api-admin-lang', 1, 0, '{\"id\":2,\"name\":\"Việt nam\",\"short_code\":\"vi\",\"is_default\":1,\"is_deleted\":0}', '{\"short_code\":\"vn\",\"is_default\":null}', '2', 'admin_lang', 0),
(6, 1, 1558266649, '', 'api-admin-lang', 1, 0, '{\"id\":2,\"name\":\"Việt nam\",\"short_code\":\"vi-vn\",\"is_default\":1,\"is_deleted\":0}', '{\"short_code\":\"vi\",\"is_default\":null}', '2', 'admin_lang', 0),
(7, 1, 1558266718, '', 'api-admin-lang', 1, 0, '{\"id\":2,\"name\":\"Việt nam\",\"short_code\":\"vi\",\"is_default\":1,\"is_deleted\":0}', '{\"short_code\":\"vi-vn\",\"is_default\":null}', '2', 'admin_lang', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `admin_tag`
--

CREATE TABLE `admin_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_tag_relation`
--

CREATE TABLE `admin_tag_relation` (
  `tag_id` int(11) NOT NULL,
  `table_name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `pk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'Hao', 'Lang', 1, 'haolangvn@gmail.com', '$2y$13$YSjuEOzv6jRIdpitACokz.DPJ12V5572wqKzXMJfLiRTkNE0TJpMS', 'ZaUd0ffUgvy1rXs1QSW6LbLLqr-4jSiB', '3cb273d074860cdb528529443b89f747b90d414377145978ab3cf269161f72a9je7tTlJdtAm0EfCw2rX0BhmtG9wROZP0', 0, NULL, 0, 0, '{\"togglecat\":{\"1\":0}}', NULL, 0, NULL, NULL, 1558322951, NULL, NULL, 0, NULL),
(2, 'TG', 'NH', 1, 'admin@thegioinuochoa.com.vn', '$2y$13$qUmR2Vg9PjNBzYXLTchBEOqzVa4BkP78POuaMHwco4h3fZgbA0Q1O', 'dhWf0lNI47FOnIeYfn60UiOTerri9yUo', NULL, 0, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 1, 1),
(2, 2, 1);

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
(1, 1, 1558238185, 'fd74493e2d5d8a0c03fe1d7cb7ad33d7374303978cf072ca6d2e6435619ac95bKUm4u6Nf6ld4P1cnzCnX7lmI5z4n8b80', '::1', 1),
(2, 1, 1558247829, '5e18d9ed653d289570da0ae3d21363280d7dc0b0ed788180effdb6ce01267b2azqxCsxONCeJ-F3qq-nBnwg5WJbbD1ZWn', '::1', 1),
(3, 1, 1558264548, '76070e9542dbedee95e7dd3c3812fcb56db59a846b643735fe362dd32812a3acD85dcvVbKHCyZCImcEedIjZr-ZJ8-gIi', '::1', 1),
(4, 1, 1558281424, '4fbe5f977a289765c5b2b71bd71bb8eb70e8587140d28b6d640d831b89925799MzrtjVtOfzOlrKI7ruBTF0GW7lpa2dNS', '::1', 1),
(5, 1, 1558322874, '3cb273d074860cdb528529443b89f747b90d414377145978ab3cf269161f72a9je7tTlJdtAm0EfCw2rX0BhmtG9wROZP0', '::1', 0);

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
(6, 1, 1558322889, 'login', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '2', 1552922965),
('admin', '3', 1552971389),
('administrator', '1', 1552922821);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1552899563, 1552899563),
('/backend/*', 2, NULL, NULL, NULL, 1553486139, 1553486139),
('/backend/error', 2, NULL, NULL, NULL, 1553486139, 1553486139),
('/demo/*', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/default/*', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/default/index', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/demo/*', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/demo/create', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/demo/delete', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/demo/index', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/demo/update', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/demo/view', 2, NULL, NULL, NULL, 1554560318, 1554560318),
('/demo/elfinder/*', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/demo/elfinder/index', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/*', 2, NULL, NULL, NULL, 1553486133, 1553486133),
('/main/article/*', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/article/create', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/article/delete', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/article/index', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/article/update', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/article/view', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/default/*', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/default/index', 2, NULL, NULL, NULL, 1553486131, 1553486131),
('/main/error/*', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/error/error', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/file/*', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/file/connector', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/file/file-delete', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/file/file-upload', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/file/files-get', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/file/image-upload', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/file/index', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/file/input', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/image/*', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/image/images-get', 2, NULL, NULL, NULL, 1553499938, 1553499938),
('/main/language/*', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/language/create', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/language/delete', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/language/index', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/language/update', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/language/view', 2, NULL, NULL, NULL, 1553486132, 1553486132),
('/main/nav/*', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/nav/create', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/nav/delete', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/nav/index', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/nav/update', 2, NULL, NULL, NULL, 1558189526, 1558189526),
('/main/nav/view', 2, NULL, NULL, NULL, 1558189526, 1558189526),
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
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', '/*'),
('administrator', '/*'),
('AdminPermision', '/*');

-- --------------------------------------------------------

--
-- Table structure for table `auth_menu`
--

CREATE TABLE `auth_menu` (
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
-- Dumping data for table `auth_menu`
--

INSERT INTO `auth_menu` (`id`, `name`, `parent`, `route`, `order`, `icon`, `data`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'RBAC Rules', NULL, '/rbac/default/index', 100000, 'fa fa-unlock', NULL, 1552904071, 1, 1553500483, 1),
(2, 'Auth Assignment', 1, '/rbac/assignment/index', 10, '', NULL, 1552904071, 1, 1554568273, 1),
(3, 'Auth Role', 1, '/rbac/role/index', 15, '', NULL, 1552904071, 1, 1553486238, 1),
(4, 'Auth Permission', 1, '/rbac/permission/index', 30, '', NULL, 1552904071, 1, 1553486450, 1),
(6, 'Auth Menu', 1, '/rbac/menu/index', 1, '', NULL, 1552904071, 1, 1553486321, 1),
(7, 'Auth Rule', 1, '/rbac/rule/index', 20, '', NULL, 1552904071, 1, 1553486250, 1),
(8, 'Auth Route', 1, '/rbac/route/index', 50, '', NULL, 1552907096, 1, 1558190814, 1),
(9, 'Demo', NULL, '/demo/default/index', 9999999, '', NULL, 1552923245, 1, 1554734957, 1),
(10, 'Translation', 14, '/main/translate/index', 10, 'fa-language', NULL, 1552923964, 1, 1558190742, 1),
(11, 'User Management', 1, '/users/default/index', 0, 'fa-users', NULL, 1552971653, 1, 1558190844, 1),
(12, 'Dashboard', NULL, '/main/default/index', 0, 'fa-dashboard', NULL, 1552976731, 1, 1552976744, 1),
(13, 'System Information', 14, '/system/information/index', 999, 'fa-info-circle', NULL, 1553316811, 1, 1554559840, 1),
(14, 'System', NULL, '/system/information/index', 9999, 'fa-cog', NULL, 1553316944, 1, 0, 0),
(16, 'Storage', 14, '/main/file/index', 16, 'fa-database', NULL, 1553500133, 1, 1558190747, 1),
(17, 'Key-Value Storage', 14, '/main/params/index', NULL, 'fa-arrows-h', NULL, 1553503311, 1, 0, 0),
(18, 'Pages', NULL, '/main/article/index', 18, 'fa-file', NULL, 1558189949, 1, 1558190704, 1),
(19, 'Page List', 18, '/main/nav/index', 19, 'fa-circle-thin', NULL, 1558190174, 1, 1558190725, 1),
(20, 'Article Content', 18, '/main/article/index', 20, 'fa-circle-thin', NULL, 1558190225, 1, 1558190738, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE `auth_user` (
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
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`id`, `username`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `email_confirm_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', 'haolangvn@gmail.com', 'yiCzruyD5NEqc5VQFwh2dwNm9jWs4Lj3', '$2y$13$o2Z8GqvgbJ30E4aMjslr/uh7gh.TzJquXqPi6dYR1bL9VO5WvRBJ.', NULL, NULL, 1552899730, 1552899730, 1),
(2, 'hao', 'hao@thegioinuochoa.com.vn', 'yqCVUOp7le7VKMNTUCIqu3VYxcPfkJ1r', '$2y$13$6UFPYYAjrOZRLjrRj0IIhOaAwQhV.Md7u5KF3oqOBgYMRdW/rubR2', NULL, NULL, 1552905477, 1552905477, 1),
(3, 'Phong', 'admin@thegioinuochoa.com.vn', 'T9mnNTp1W0LyDyQtHzaDgtExS1H9bWjv', '$2y$13$wegiY2dOU5Nwtwq3y8cyHuySRaXa7ivmi90rXxmB8Lv7gLjTg73/u', NULL, NULL, 1552971356, 1554696136, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_user_profile`
--

CREATE TABLE `auth_user_profile` (
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
-- Dumping data for table `auth_user_profile`
--

INSERT INTO `auth_user_profile` (`id`, `user_id`, `first_name`, `last_name`, `email_gravatar`, `last_visit`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hao', 'Lang', 'haolangvn@gmail.com', 1558322833, 1552899730, 1552899730),
(2, 2, 'Hao', 'Lang', 'hao@thegioinuochoa.com.vn', 1552976529, 1552905477, 1552905477),
(3, 3, 'Phong', 'Tang', 'admin@thegioinuochoa.com.vn', NULL, 1552971356, 1554696136);

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
(3, 2, '\\hp\\frontend\\blocks\\HelperArticleBlock', 0);

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
(1, 'block_group_dev_elements', 0, 'development-group', 1558237982, '\\luya\\cms\\frontend\\blockgroups\\DevelopmentGroup'),
(2, 'block_group_project_elements', 0, 'project-group', 1558237982, '\\luya\\cms\\frontend\\blockgroups\\ProjectGroup');

-- --------------------------------------------------------

--
-- Table structure for table `cms_config`
--

CREATE TABLE `cms_config` (
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(2, 'Article 6 6', '{\"placeholders\":[[{\"cols\":6,\"var\":\"left\",\"label\":\"Left Content\"},{\"cols\":6,\"var\":\"right\",\"label\":\"Right Content\"}]]}', '@app/views/cmslayouts\\article_6-6.php'),
(3, 'Product 12', '{\"placeholders\":[[{\"cols\":12,\"var\":\"content\",\"label\":\"Main Container\"}]]}', '@app/views/cmslayouts\\product_12.php');

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
(1, 1, 1, 0, 0, 1558248377, '{\"tableName\":\"cms_nav_item\",\"action\":\"insert\",\"row\":2}', '{\"nav_id\":1,\"lang_id\":\"2\",\"nav_item_type\":1,\"nav_item_type_id\":1,\"timestamp_create\":1558248377,\"timestamp_update\":0,\"title\":\"Homepage\",\"alias\":\"homepage\",\"description\":null,\"keywords\":null,\"title_tag\":null,\"create_user_id\":1,\"update_user_id\":1,\"id\":2}', 'cms_nav_item', 2),
(2, 1, 0, 1, 0, 1558248377, '{\"tableName\":\"cms_nav_item\",\"action\":\"update\",\"row\":2}', '{\"nav_id\":1,\"lang_id\":\"2\",\"nav_item_type\":1,\"nav_item_type_id\":2,\"timestamp_create\":1558248377,\"timestamp_update\":1558248377,\"title\":\"Homepage\",\"alias\":\"homepage\",\"description\":null,\"keywords\":null,\"title_tag\":null,\"create_user_id\":1,\"update_user_id\":1,\"id\":2}', 'cms_nav_item', 2),
(3, 1, 0, 1, 0, 1558261533, '{\"tableName\":\"cms_nav_item\",\"action\":\"update\",\"row\":2}', '{\"id\":2,\"nav_id\":1,\"lang_id\":2,\"nav_item_type\":1,\"nav_item_type_id\":\"2\",\"create_user_id\":1,\"update_user_id\":1,\"timestamp_create\":\"1558248377\",\"timestamp_update\":1558261533,\"title\":\"Trang ch\\u1ee7\",\"alias\":\"homepage\",\"description\":\"\",\"keywords\":\"\",\"title_tag\":\"\"}', 'cms_nav_item', 2);

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
(1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL);

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
(1, 'Navigation', 'navigation', 0);

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
(1, 1, 1, 1, 1, 1, 1, 1558238053, 0, 'Homepage', 'homepage', NULL, NULL, NULL),
(2, 1, 2, 1, 2, 1, 1, 1558248377, 1558261533, 'Trang chủ', 'homepage', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_nav_item_module`
--

CREATE TABLE `cms_nav_item_module` (
  `id` int(11) NOT NULL,
  `module_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 1, 1, 1558238053, 1, 'Initial'),
(2, 1, 2, 1558238053, 1, 'First version');

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
-- Table structure for table `hp_article`
--

CREATE TABLE `hp_article` (
  `id` int(11) NOT NULL,
  `group` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hp_contact`
--

CREATE TABLE `hp_contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `ip` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` int(11) DEFAULT '0',
  `update_at` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hp_setting`
--

CREATE TABLE `hp_setting` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `type` enum('richtext','json') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hp_translate`
--

CREATE TABLE `hp_translate` (
  `id` int(11) NOT NULL,
  `category` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `language_code` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `message` varbinary(255) NOT NULL,
  `translation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hp_translate`
--

INSERT INTO `hp_translate` (`id`, `category`, `language_code`, `message`, `translation`, `created_at`, `updated_at`) VALUES
(1, 'label', 'vi', 0x436f6e74616374205553, 'Liên Hệ', 1558248617, 1558248617),
(2, 'button', 'vi', 0x53656e64, 'Gửi', 1558248880, 1558248880),
(3, 'model', 'vi', 0x46756c6c6e616d65, 'Họ và Tên', 1558248988, 1558249132),
(4, 'model', 'vi', 0x50686f6e65, 'Điện thoại', 1558249058, 1558249065),
(5, 'model', 'vi', 0x41646472657373, 'Địa chỉ', 1558249090, 1558249121),
(6, 'model', 'vi', 0x4d657373616765, 'Nội dung', 1558249105, 1558249105),
(7, 'label', 'vi', 0x5265717569726564204669656c6473, 'Trường bắt buộc', 1558249299, 1558261167),
(8, 'label', 'vi', 0x506c656173652066696c6c206f75742074686520666f726d2062656c6f773a, 'Vui lòng điền đủ thông tin theo form mẫu', 1558249338, 1558261083);

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
('m000000_000000_base', 1558237942),
('m141104_104622_admin_group', 1558237950),
('m141104_104631_admin_user_group', 1558237951),
('m141104_114809_admin_user', 1558237951),
('m141203_121042_admin_lang', 1558237951),
('m141203_143052_cms_cat', 1558237951),
('m141203_143059_cms_nav', 1558237951),
('m141203_143111_cms_nav_item', 1558237951),
('m141208_134038_cms_nav_item_page', 1558237951),
('m150106_095003_cms_layout', 1558237951),
('m150108_154017_cms_block', 1558237951),
('m150108_155009_cms_nav_item_page_block_item', 1558237951),
('m150122_125429_cms_nav_item_module', 1558237951),
('m150205_141350_block_group', 1558237951),
('m150304_152220_admin_storage_folder', 1558237951),
('m150304_152238_admin_storage_file', 1558237951),
('m150304_152244_admin_storage_filter', 1558237951),
('m150304_152250_admin_storage_effect', 1558237951),
('m150304_152256_admin_storage_image', 1558237951),
('m150309_142652_admin_storage_filter_chain', 1558237952),
('m150323_125407_admin_auth', 1558237952),
('m150323_132625_admin_group_auth', 1558237952),
('m150331_125022_admin_ngrest_log', 1558237952),
('m150615_094744_admin_user_login', 1558237952),
('m150617_200836_admin_user_online', 1558237952),
('m150626_084948_admin_search_data', 1558237952),
('m150915_081559_admin_config', 1558237952),
('m150924_112309_cms_nav_prop', 1558237952),
('m150924_120914_admin_prop', 1558237952),
('m151012_072207_cms_log', 1558237952),
('m151022_143429_cms_nav_item_redirect', 1558237952),
('m151026_161841_admin_tag', 1558237952),
('m160629_092417_cmspermissiontable', 1558237952),
('m160915_081618_create_admin_logger_table', 1558237952),
('m161219_150240_admin_lang_soft_delete', 1558237952),
('m161220_183300_lcp_base_tables', 1558237952),
('m170116_120553_cms_block_variation_field', 1558237953),
('m170131_104109_user_model_updates', 1558237953),
('m170218_215610_cms_nav_layout_file', 1558237953),
('m170301_084325_cms_config', 1558237953),
('m170619_103728_cms_blocksettings', 1558237953),
('m170926_144137_add_admin_user_session_id_column', 1558237953),
('m170926_164913_add_ngrest_log_diff_data', 1558237953),
('m171003_065811_add_class_column_to_block_group_table', 1558237953),
('m171009_083835_add_admin_user_login_destroy_info', 1558237953),
('m171121_170909_add_publish_at_date', 1558237953),
('m171129_104706_config_add_system_type', 1558237954),
('m171206_113949_cms_redirection_table', 1558237954),
('m180214_134657_system_user_ngrest_deletion', 1558237954),
('m180326_170839_file_disposition', 1558237954),
('m180412_092824_user_security_columns_v12', 1558237954),
('m180527_225613_user_login_ipv6', 1558237954),
('m180619_134519_indexes', 1558237954),
('m180723_120432_indexes', 1558237955),
('m180723_123237_indexes', 1558237956),
('m181113_120432_user_index', 1558237956),
('m190405_094933_main', 1558238598);

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
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-tbl_auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-tbl_auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_menu`
--
ALTER TABLE `auth_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `auth_user_profile`
--
ALTER TABLE `auth_user_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_gravatar` (`email_gravatar`),
  ADD KEY `IDX_user_profile_user_id` (`user_id`);

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
-- Indexes for table `hp_article`
--
ALTER TABLE `hp_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_group` (`group`);

--
-- Indexes for table `hp_contact`
--
ALTER TABLE `hp_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_fullname` (`fullname`),
  ADD KEY `index_phone` (`phone`);

--
-- Indexes for table `hp_setting`
--
ALTER TABLE `hp_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hp_translate`
--
ALTER TABLE `hp_translate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_key` (`message`,`language_code`,`category`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_auth`
--
ALTER TABLE `admin_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_logger`
--
ALTER TABLE `admin_logger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_ngrest_log`
--
ALTER TABLE `admin_ngrest_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_storage_image`
--
ALTER TABLE `admin_storage_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_tag`
--
ALTER TABLE `admin_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_user_group`
--
ALTER TABLE `admin_user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_user_login`
--
ALTER TABLE `admin_user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_user_online`
--
ALTER TABLE `admin_user_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `auth_menu`
--
ALTER TABLE `auth_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_user_profile`
--
ALTER TABLE `auth_user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_log`
--
ALTER TABLE `cms_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_nav`
--
ALTER TABLE `cms_nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_nav_container`
--
ALTER TABLE `cms_nav_container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_nav_item`
--
ALTER TABLE `cms_nav_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_nav_item_module`
--
ALTER TABLE `cms_nav_item_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_nav_item_page`
--
ALTER TABLE `cms_nav_item_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_nav_item_page_block_item`
--
ALTER TABLE `cms_nav_item_page_block_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `hp_article`
--
ALTER TABLE `hp_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hp_contact`
--
ALTER TABLE `hp_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hp_translate`
--
ALTER TABLE `hp_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_menu`
--
ALTER TABLE `auth_menu`
  ADD CONSTRAINT `auth_menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
