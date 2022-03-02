-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2022 at 05:29 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciet`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lb_blocks`
--

CREATE TABLE `lb_blocks` (
  `id` int UNSIGNED NOT NULL,
  `raw_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raw_content` text COLLATE utf8mb4_unicode_ci,
  `rendered_content` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'wp_block',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lb_contents`
--

CREATE TABLE `lb_contents` (
  `id` int UNSIGNED NOT NULL,
  `raw_content` text COLLATE utf8mb4_unicode_ci,
  `rendered_content` text COLLATE utf8mb4_unicode_ci,
  `contentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentable_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'page',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int UNSIGNED NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_23_051621_laratrust_setup_tables', 1),
(8, '2022_02_23_063103_create_languages_table', 2),
(9, '2022_02_25_061634_create_pages_table', 2),
(10, '2019_02_08_105647_create_blocks_contents_tables', 3),
(11, '2022_02_25_080532_add_description_to_pages', 4),
(12, '2022_02_25_192341_add_keywords_to_page', 5),
(14, '2022_03_02_045043_create_departments_table', 6),
(15, '2022_03_02_082803_create_metas_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(550) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `featured_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` decimal(8,2) NOT NULL,
  `status` decimal(8,2) NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_word` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `content`, `featured_icon`, `user_id`, `status`, `lang`, `key_word`, `created_at`, `updated_at`) VALUES
(1, 'Demo Page', 'demo-page', 'Bhasha Sangam by Central Institute of Educational Technology', '<!-- wp:image {\"align\":\"center\",\"width\":235,\"height\":197,\"sizeSlug\":\"large\",\"className\":\"is-style-default\"} -->\r\n<div class=\"wp-block-image is-style-default\"><figure class=\"aligncenter size-large is-resized\"><img src=\"http://localhost:8000/storage/photos/1/Bhasha Sangam-Social Media Banner (1).jpg\" alt=\"\" width=\"235\" height=\"197\"/></figure></div>\r\n<!-- /wp:image -->\r\n\r\n<!-- wp:heading {\"align\":\"center\"} -->\r\n<h2 class=\"has-text-align-center\"><strong>Demo Page</strong></h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:paragraph {\"align\":\"center\"} -->\r\n<p class=\"has-text-align-center\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lobortis, velit eget hendrerit ullamcorper, tortor lacus hendrerit lectus, vel pellentesque ipsum metus a ante. Morbi sapien tellus, facilisis in luctus sed, ultricies non nisi. In a dolor vulputate tortor tempus rutrum. Sed ut tempus massa. Maecenas at tristique libero. Ut venenatis arcu in feugiat elementum. Donec bibendum eleifend turpis quis auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique nulla turpis, sit amet accumsan elit semper ac.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:columns {\"align\":\"full\",\"backgroundColor\":\"light-green-cyan\"} -->\r\n<div class=\"wp-block-columns alignfull has-light-green-cyan-background-color has-background\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lobortis, velit eget hendrerit ullamcorper, tortor lacus hendrerit lectus, vel pellentesque ipsum metus a ante. Morbi sapien tellus, facilisis in luctus sed, ultricies non nisi. In a dolor vulputate tortor tempus rutrum. Sed ut tempus massa. Maecenas at tristique libero. Ut venenatis arcu in feugiat elementum. Donec bibendum eleifend turpis quis auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique nulla turpis, sit amet accumsan elit semper ac.</p>\r\n<!-- /wp:paragraph --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lobortis, velit eget hendrerit ullamcorper, tortor lacus hendrerit lectus, vel pellentesque ipsum metus a ante. Morbi sapien tellus, facilisis in luctus sed, ultricies non nisi. In a dolor vulputate tortor tempus rutrum. Sed ut tempus massa. Maecenas at tristique libero. Ut venenatis arcu in feugiat elementum. Donec bibendum eleifend turpis quis auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique nulla turpis, sit amet accumsan elit semper ac.</p>\r\n<!-- /wp:paragraph --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->\r\n\r\n<!-- wp:image {\"align\":\"full\",\"sizeSlug\":\"large\"} -->\r\n<figure class=\"wp-block-image alignfull size-large\"><img src=\"http://localhost:8000/storage/photos/1/Nishtha 3.0 Website banner (2)-03.jpg\" alt=\"\"/></figure>\r\n<!-- /wp:image -->\r\n\r\n<!-- wp:columns {\"align\":\"full\"} -->\r\n<div class=\"wp-block-columns alignfull\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:table -->\r\n<figure class=\"wp-block-table\"><table><tbody><tr><td>Name </td><td>Number</td></tr><tr><td></td><td></td></tr></tbody></table></figure>\r\n<!-- /wp:table --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:table -->\r\n<figure class=\"wp-block-table\"><table><tbody><tr><td>Name</td><td>Number</td></tr><tr><td></td><td></td></tr></tbody></table></figure>\r\n<!-- /wp:table --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->\r\n\r\n<!-- wp:paragraph -->\r\n<p></p>\r\n<!-- /wp:paragraph -->', 'http://localhost:8000/storage/photos/1/Sanketik-Sampreshan-Competition-Banner.png', '1.00', '1.00', 'en', '\"Bhasha sangam,CIET,NCERT\"', '2022-02-25 05:40:11', '2022-02-28 04:48:11'),
(3, 'Page Title', 'page-title', 'Hello', '<!-- wp:columns {\"align\":\"full\"} -->\r\n<div class=\"wp-block-columns alignfull\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:image {\"sizeSlug\":\"large\"} -->\r\n<figure class=\"wp-block-image size-large\"><img src=\"http://localhost:8000/storage/photos/1/Bhasha Sangam-Social Media Banner (1).jpg\" alt=\"\"/></figure>\r\n<!-- /wp:image --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:heading {\"style\":{\"color\":{\"text\":\"#23b1dc\"}}} -->\r\n<h2 class=\"has-text-color\" style=\"color:#23b1dc\">What is Lorem Ipsum?</h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:paragraph -->\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:heading -->\r\n<h2>Why do we use it?</h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<!-- /wp:paragraph --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->', 'http://localhost:8000/storage/photos/1/Nishtha 3.0 Website banner (2)-03.jpg', '1.00', '1.00', 'hi', '\"NCERT,CIET,NISHTHA,DIKSHA\"', '2022-02-28 04:54:14', '2022-02-28 04:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'CheckController@index', 'Index', 'Check', '2022-02-23 00:53:13', '2022-02-23 00:53:13'),
(2, 'CheckController@create', 'Create', 'Check', '2022-02-23 00:53:14', '2022-02-23 00:53:14'),
(3, 'HomeController@dashboard', 'Dashboard', 'Admin Dashboard view ', '2022-02-23 08:31:57', '2022-02-23 08:31:57'),
(4, 'PermissionController@index', 'Permissions list', 'List of all Permissions', '2022-02-23 11:13:00', '2022-02-23 11:13:00'),
(5, 'PermissionController@store', 'Permission Create', 'Create new Permission rule', '2022-02-23 11:50:25', '2022-02-23 11:50:25'),
(6, 'PermissionController@edit', 'Edit Permission', 'Edit or Update Permission rule', '2022-02-23 06:29:38', '2022-02-23 06:29:38'),
(7, 'PermissionController@update', 'Update Permission', 'Update Permission rule', '2022-02-23 23:01:17', '2022-02-23 23:01:17'),
(8, 'RoleController@index', 'Role List', 'List of Roles', '2022-02-23 23:46:13', '2022-02-23 23:46:13'),
(9, 'RoleController@store', 'Role Store', 'Store new Role', '2022-02-23 23:47:08', '2022-02-23 23:47:08'),
(10, 'UserController@index', 'User list', 'List of all Users', '2022-02-24 00:41:06', '2022-02-24 00:41:06'),
(11, 'UserController@edit', 'User Edit', 'Edit user details', '2022-02-24 00:41:35', '2022-02-24 00:41:35'),
(12, 'UserController@update', 'User Update', 'Update user details', '2022-02-24 00:42:14', '2022-02-24 00:42:14'),
(13, 'UserController@store', 'User Store', 'Create New user', '2022-02-24 01:55:03', '2022-02-24 01:55:03'),
(14, 'UserController@show', 'User Show', 'Show User details', '2022-02-24 03:10:57', '2022-02-24 03:10:57'),
(15, 'UserController@assignRole', 'Assign Role', 'Assign role to user', '2022-02-24 03:54:12', '2022-02-24 03:54:12'),
(16, 'UserController@updateRole', 'Update Role', 'Update role to user', '2022-02-24 06:13:43', '2022-02-24 06:13:43'),
(17, 'PermissionController@showRole', 'Permissions to Role', 'Show Permissions attach to Roles', '2022-02-24 22:17:07', '2022-02-24 22:17:07'),
(18, 'PermissionController@attachRole', 'Attach Permission', 'Attach Permissions to User roles', '2022-02-24 22:18:32', '2022-02-24 22:18:32'),
(19, 'PageController@index', 'Page List', 'List of all custom pages', '2022-02-25 01:28:49', '2022-02-25 01:28:49'),
(20, 'PageController@create', 'Page Create', 'Create new custom page', '2022-02-25 02:21:45', '2022-02-25 02:21:45'),
(21, 'PageController@store', 'Page Store', 'Store New custom page data.', '2022-02-25 02:42:20', '2022-02-25 02:42:20'),
(22, 'PageController@edit', 'Page Edit', 'Edit Custom Pages', '2022-02-25 06:21:48', '2022-02-25 06:21:48'),
(23, 'PageController@update', 'Page Update', 'Update custom Page', '2022-02-25 06:32:53', '2022-02-25 06:32:53'),
(24, 'PageController@media', 'Media', 'Media Management', '2022-02-26 02:17:31', '2022-02-26 02:17:31'),
(25, 'DepartmentController@index', 'Department List', 'List of all Departments', '2022-03-02 00:23:57', '2022-03-02 00:23:57'),
(26, 'DepartmentController@create', 'Department Create Form', 'Create Form for New Department', '2022-03-02 00:29:51', '2022-03-02 00:29:51'),
(27, 'DepartmentController@store', 'Department store', 'New Department Store', '2022-03-02 06:14:57', '2022-03-02 06:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(3, 2),
(20, 2),
(21, 2),
(1, 4),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 1, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'Can access all features!', '2022-02-23 00:53:14', '2022-02-23 00:53:14'),
(2, 'Editor', 'Editor', 'Can access limited features!', '2022-02-23 00:53:14', '2022-02-23 00:53:14'),
(3, 'Pagitor', 'Page Editor', 'Can only create and update custom pages', '2022-02-23 23:59:15', '2022-02-23 23:59:15'),
(4, 'Eventor', 'Event Editor', 'Can only create and update Events', '2022-02-24 23:31:43', '2022-02-24 23:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(1, 2, 'App\\Models\\User'),
(2, 1, 'App\\Models\\User'),
(3, 3, 'App\\Models\\User'),
(4, 4, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ramkrishna Pal', 'ramkrishna.ncert@gmail.com', '2022-02-23 00:53:13', 'Admin', '$2a$12$bayZJpM48D8a8OZAPam5oeKxy6UyDUfJW8wbrHudXB.2zbwpg8vCC', 'qOM3wT2Uu02WoOF5LtPHQGqUCX5zcMXwzaWQZ44NLvskmQbbH69x2pmUI8pf', '2022-02-23 00:53:13', '2022-02-23 00:53:13'),
(2, 'Rameez Alam', 'rameezalamciet@gmail.com', '2022-02-23 00:53:13', 'Admin', '$2a$12$bayZJpM48D8a8OZAPam5oeKxy6UyDUfJW8wbrHudXB.2zbwpg8vCC', 'HseS8SftJd', '2022-02-23 00:53:13', '2022-02-25 02:45:18'),
(3, 'Farman Ali', 'farman.ciet@gmail.com', NULL, 'Page Editor', '$2y$10$ryGCd3FarH.5CgzbRCImFe3DsMGxtnyM3.n9dyI4c8.fCA8Xl1DRe', NULL, '2022-02-24 03:07:50', '2022-02-24 06:26:38'),
(4, 'Saurabh Singh', 'saurabhsingh.ciet@gmail.com', NULL, 'Event Editor', '$2y$10$cv5Rh8gwXrHzZBJrbjm6/uQrdQm9HmMNcaWy6whDBXspKJxBwo5LC', NULL, '2022-02-24 23:30:29', '2022-02-24 23:32:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lb_blocks`
--
ALTER TABLE `lb_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lb_contents`
--
ALTER TABLE `lb_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lb_contents_contentable_type_contentable_id_index` (`contentable_type`,`contentable_id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lb_blocks`
--
ALTER TABLE `lb_blocks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lb_contents`
--
ALTER TABLE `lb_contents`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
