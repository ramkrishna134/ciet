-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 06:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `articals`
--

CREATE TABLE `articals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articals`
--

INSERT INTO `articals` (`id`, `title`, `category`, `icon`, `url`, `date`, `month`, `year`, `user_id`, `lang`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Volume V, Issue 4, 1 October - 31 December 2021', 'newsletter', 'http://localhost:8000/storage/photos/1/person-gray-photo-placeholder-man-shirt-white-background-150126077.jpg', 'https://ciet.nic.in/NewsletterOct21/', '2022-03-30', 'December', '2022', 1, 'en', 1, '2022-03-30 09:00:32', '2022-04-18 08:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery`)),
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `key_word` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `slug`, `icon`, `featured_image`, `gallery`, `description`, `head_image`, `head_message`, `lang`, `user_id`, `status`, `key_word`, `created_at`, `updated_at`) VALUES
(1, 'Dict', 'dict', 'http://localhost:8000/storage/photos/1/1NCERT.jpg', 'http://localhost:8000/storage/photos/1/Nishtha 3.0 Website banner (2)-03.jpg', NULL, '<p>Description<br></p>', 'http://localhost:8000/storage/photos/1/jd.jpeg', 'Hello', 'en', 1, 1, '', '2022-03-02 23:07:26', '2022-03-21 05:27:32'),
(2, 'DICT', 'department-slug', 'http://localhost:8000/storage/photos/1/Bhasha Sangam-Social Media Banner (1).jpg', 'http://localhost:8000/storage/photos/1/Nishtha 3.0 Website banner (2)-03.jpg', '[\"http://localhost:8000/storage/photos/1/Bhasha Sangam-Social Media Banner (1).jpg\", \"http://localhost:8000/storage/photos/1/Cover_page-0002.jpg\", \"http://localhost:8000/storage/photos/1/jd.jpeg\", \"http://localhost:8000/storage/photos/1/Nishtha 3.0 Website banner (2)-03.jpg\", \"http://localhost:8000/storage/photos/1/Sanketik-Sampreshan-Competition-Banner.png\"]', '<p>Descriptionsffdg</p>', 'http://localhost:8000/storage/photos/1/jd.jpeg', 'Hello Everyones', 'en', 1, 1, '', '2022-03-02 23:15:37', '2022-03-21 05:28:45'),
(3, 'fdsf', 'fdsf', 'http://localhost:8000/storage/photos/1/NCERT_300px.svg.png', 'http://localhost:8000/storage/photos/1/Cover_page-0002.jpg', NULL, '<p>dsfdsfdsf</p>', 'http://localhost:8000/storage/photos/1/jd.jpeg', 'dsfsdfdsfdsf', 'en', 1, 1, 'grg,rgrgr,grgreg,rere,fdjfds,dsfjdsf,fhdsjfgdsf,jdsgfdshfds,jdsgfhdsf\'gfdhdsf,dsfdsgf\'', '2022-03-28 06:11:56', '2022-04-18 08:47:58'),
(4, 'fdsf', 'fdsf', 'http://localhost:8000/storage/photos/1/NCERT_300px.svg.png', 'http://localhost:8000/storage/photos/1/Cover_page-0002.jpg', NULL, '<p>dsfdsfdsf</p>', 'http://localhost:8000/storage/photos/1/jd.jpeg', 'dsfsdfdsfdsf', 'en', 1, 0, 'grg,rgrgr,grgreg,rere,fdjfds,dsfjdsf,fhdsjfgdsf,jdsgfdshfds,jdsgfhdsf\'gfdhdsf,dsfdsgf\'', '2022-03-28 06:13:20', '2022-03-28 06:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_word` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `icon`, `featured_image`, `category`, `description`, `content`, `start_date`, `end_date`, `user_id`, `department_id`, `lang`, `key_word`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ICT Award', 'ict-award', 'http://localhost:8000/storage/photos/1/Bhasha Sangam-Social Media Banner (1).jpg', 'http://localhost:8000/storage/photos/1/Nishtha 3.0 Website banner (2)-03.jpg', 'Ongoing', 'Hello', '<!-- wp:paragraph -->\r\n<p>Hello</p>\r\n<!-- /wp:paragraph -->', '2022-03-08', '2022-03-17', 1, 2, 'en', 'Hello,', 1, '2022-03-07 03:00:40', '2022-03-08 01:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `image`, `post`, `subject`, `number`, `profile`, `category`, `department_id`, `status`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Amrendra Behera', 'http://localhost:8000/storage/photos/1/jd.jpeg', 'Joint Director', 'Education', '226', 'http://localhost:8000/storage/files/1/Video/file_example_MP4_480_1_5MG.mp4', 'Academic', 2, 1, 'en', '2022-03-08 23:08:23', '2022-03-09 04:30:19'),
(2, 'Dr. Rejaul Karim', 'http://localhost:8000/storage/photos/1/129213230-young-man-with-glasses-face-smiling-cartoon-vector-illustration-graphic-design.jpg', 'Assistant Professor', 'Computer Science', '236', 'http://localhost:8000/storage/files/1/Documentation_for_Tamanna_Aptitude_Online_Test.pdf', 'Academic', 2, 1, 'en', '2022-03-09 00:48:50', '2022-04-18 10:10:30'),
(3, 'Dr. AC Jha', 'http://localhost:8000/storage/photos/1/person-gray-photo-placeholder-man-shirt-white-background-150126077.jpg', 'JPF', 'Hindi', '201', 'http://localhost:8000/storage/files/1/Documentation_for_Tamanna_Aptitude_Online_Test.pdf', 'Academic', 2, 1, 'hi', '2022-03-09 03:40:57', '2022-03-09 04:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `phone`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Ram k Pal', '7001325284', 'ramkrishna.ncert@gmail.com', 'Very good emplye', 'Heloo, how r u', '2022-04-18 11:41:25', '2022-04-18 11:41:25'),
(2, 'Ram k Pal', '7001325284', 'ramkrishna.ncert@gmail.com', 'Very good emplye', 'Heloo, how r u', '2022-04-18 11:43:07', '2022-04-18 11:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Primary Menu', 'header', '2022-03-06 22:22:03', '2022-03-06 22:22:03'),
(2, 'Quick Links', 'footer', '2022-03-06 22:55:58', '2022-03-06 22:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `has_child` int(11) DEFAULT 0,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depth` int(11) NOT NULL,
  `target` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `label`, `link`, `menu_id`, `parent_id`, `has_child`, `class`, `depth`, `target`, `status`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', 1, NULL, 0, NULL, 0, 0, 1, 'en', '2022-03-06 22:22:32', '2022-03-06 22:22:52'),
(4, 'About', 'about', 1, NULL, 0, NULL, 0, 0, 1, 'en', '2022-04-21 09:55:04', '2022-04-21 14:11:10'),
(8, 'Department of ICT & Training', '/dict', 1, 7, 0, NULL, 1, 0, 1, 'en', '2022-04-21 11:19:44', '2022-04-21 11:19:44'),
(9, 'Initatives', '#', 1, NULL, 1, NULL, 0, 0, 1, 'en', '2022-04-21 11:50:50', '2022-04-21 11:50:50'),
(10, 'DIKSHA', 'https://diksha.gov.in/', 1, 9, 0, NULL, 1, 1, 1, 'en', '2022-04-21 11:51:46', '2022-04-21 11:52:12'),
(11, 'Constituents', '#', 1, NULL, 1, NULL, 0, 0, 1, 'en', '2022-04-21 11:53:42', '2022-04-21 11:53:42'),
(12, 'Department of ICT &amp; Training', '/dict', 1, 11, 0, NULL, 1, 0, 1, 'en', '2022-04-21 11:54:14', '2022-04-21 12:39:16'),
(13, 'Trainings', '#', 1, NULL, 1, NULL, 0, 0, 1, 'en', '2022-04-21 12:41:56', '2022-04-21 12:46:13'),
(14, 'Training Calendar', '/training-calender', 1, 13, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:46:54', '2022-04-21 12:46:54'),
(15, 'Events', '#', 1, NULL, 1, NULL, 0, 0, 1, 'en', '2022-04-21 12:47:45', '2022-04-21 12:48:40'),
(16, 'Event Calendar', '/event-calender', 1, 15, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:49:26', '2022-04-21 12:49:26'),
(17, 'More', '#', 1, NULL, 1, NULL, 0, 0, 1, 'en', '2022-04-21 12:50:16', '2022-04-21 12:50:16'),
(18, 'Contact us', '/contact', 1, 17, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:51:29', '2022-04-21 12:51:49'),
(19, 'People', '/people', 1, 17, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:52:29', '2022-04-21 12:52:45'),
(20, 'RTI', '#', 1, 17, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:53:20', '2022-04-21 12:53:20'),
(21, 'Media Production Division', '/mpd', 1, 11, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:54:23', '2022-04-21 12:54:23'),
(22, 'Planning & Research Division', '/prd', 1, 11, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:55:22', '2022-04-21 12:55:22'),
(23, 'Engineering Division', '/ed', 1, 11, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:56:40', '2022-04-21 12:56:40'),
(24, 'Administration & Accounts', '/aac', 1, 11, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:57:49', '2022-04-21 12:57:49'),
(25, 'NISHTHA', 'https://itpd.ncert.gov.in//', 1, 9, 0, NULL, 1, 1, 1, 'en', '2022-04-21 12:59:07', '2022-04-21 13:18:27'),
(26, 'ePathshala', 'https://epathshala.nic.in/', 1, 9, 0, NULL, 1, 1, 1, 'en', '2022-04-21 12:59:55', '2022-04-21 13:17:59'),
(27, 'PMeVidya', '/pmevidya', 1, 9, 0, NULL, 1, 0, 1, 'en', '2022-04-21 13:00:50', '2022-04-21 13:00:50'),
(28, 'Radio Broadcasting', '#', 1, 9, 0, NULL, 1, 0, 1, 'en', '2022-04-21 13:07:27', '2022-04-21 13:07:27'),
(29, 'ICT Curriculam', 'https://ictcurriculum.gov.in/', 1, 9, 0, NULL, 1, 1, 1, 'en', '2022-04-21 13:08:12', '2022-04-21 13:08:52'),
(30, 'NCF Tech Platform', 'https://ncf.ncert.gov.in/', 1, 9, 0, NULL, 1, 1, 1, 'en', '2022-04-21 13:09:44', '2022-04-21 13:09:44'),
(31, 'ICT@Schools', 'https://ictschools.ncert.gov.in/', 1, 9, 0, NULL, 1, 1, 1, 'en', '2022-04-21 13:13:27', '2022-04-21 13:15:37'),
(32, 'Webinar', '/webiners', 1, 13, 0, NULL, 1, 0, 1, 'en', '2022-04-21 13:51:49', '2022-04-21 13:51:49'),
(33, 'होम', '/', 1, NULL, 0, NULL, 0, 0, 1, 'hi', '2022-04-21 13:56:15', '2022-04-21 13:56:15'),
(34, 'हमारे बारे में', 'about', 1, NULL, 0, NULL, 0, 0, 1, 'hi', '2022-04-21 13:57:04', '2022-04-21 14:11:52'),
(35, 'Online Training', '#', 1, 13, 0, NULL, 1, 0, 1, 'en', '2022-04-21 14:13:53', '2022-04-21 14:13:53'),
(36, 'Offline Training', '#', 1, 13, 0, NULL, 1, 0, 1, 'en', '2022-04-21 14:14:47', '2022-04-21 14:14:47'),
(37, 'ICT Award', 'https://ictaward.ncert.gov.in/', 1, 15, 0, NULL, 1, 1, 1, 'en', '2022-04-21 14:16:31', '2022-04-21 14:16:31'),
(38, 'AICEAVF ICT Mela', '#', 1, 15, 0, NULL, 1, 0, 1, 'en', '2022-04-21 14:22:51', '2022-04-21 14:22:51'),
(39, 'Summer Camp', '#', 1, 15, 0, NULL, 1, 0, 1, 'en', '2022-04-21 14:23:16', '2022-04-21 14:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign_to` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `title`, `message`, `assign_to`, `status`, `created_at`, `updated_at`) VALUES
(15, 1, 'Request for adding new page on menu', '<p><span style=\"text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', 1, 1, '2022-03-12 07:23:00', '2022-03-14 10:53:59'),
(16, 3, 'Request to give me access of edit custom page', '<p><span style=\"font-family: Arial;\">﻿</span><span style=\"text-align: var(--bs-body-text-align);\">Request to give me access of edit custom page</span><br></p>', 1, 1, '2022-03-14 11:52:26', '2022-03-15 08:49:13'),
(17, 3, 'Hello', '<p>Demo request.</p>', 1, 0, '2022-04-08 04:46:47', '2022-04-08 04:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `key`, `value`, `model_type`, `model_id`, `lang`) VALUES
(10, 'Video', 'Description', 'App\\Models\\Department', 2, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
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
(15, '2022_03_02_082803_create_metas_table', 7),
(16, '2019_11_18_105032_create_pages_table', 8),
(17, '2019_11_18_105615_create_uploads_table', 8),
(18, '2020_04_18_064412_create_page_translations_table', 8),
(19, '2020_04_18_065546_create_settings_table', 8),
(22, '2022_03_04_034856_create_events_table', 9),
(23, '2022_03_06_063741_create_menus_table', 10),
(24, '2022_03_06_063754_create_menu_items_table', 10),
(25, '2022_03_07_095215_add_head_columns_in_departments_table', 11),
(31, '2022_03_07_101341_create_trainings_table', 12),
(32, '2022_03_08_094445_create_faculties_table', 12),
(33, '2022_03_10_063326_create_settings_table', 13),
(34, '2022_03_11_123039_create_messages_table', 14),
(35, '2022_03_22_120358_create_sliders_table', 15),
(36, '2022_03_28_113532_add_keyword_column_to_departemts', 16),
(39, '2022_03_29_114547_create_articals_table', 17),
(42, '2022_04_14_183746_create_feedback_table', 18),
(43, '2022_04_18_130050_add_columns_to_articals', 18);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(550) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` decimal(8,2) NOT NULL,
  `status` decimal(8,2) NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_word` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `type`, `description`, `content`, `featured_icon`, `user_id`, `status`, `lang`, `key_word`, `created_at`, `updated_at`) VALUES
(1, 'Demo Page', 'demo-page', 'custom', 'Bhasha Sangam by Central Institute of Educational Technology', '<!-- wp:image {\"align\":\"center\",\"width\":235,\"height\":197,\"sizeSlug\":\"large\",\"className\":\"is-style-default\"} -->\r\n<div class=\"wp-block-image is-style-default\"><figure class=\"aligncenter size-large is-resized\"><img src=\"http://localhost:8000/storage/photos/1/Bhasha Sangam-Social Media Banner (1).jpg\" alt=\"\" width=\"235\" height=\"197\"/></figure></div>\r\n<!-- /wp:image -->\r\n\r\n<!-- wp:heading {\"align\":\"center\"} -->\r\n<h2 class=\"has-text-align-center\"><strong>Demo Page</strong></h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:paragraph {\"align\":\"center\"} -->\r\n<p class=\"has-text-align-center\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lobortis, velit eget hendrerit ullamcorper, tortor lacus hendrerit lectus, vel pellentesque ipsum metus a ante. Morbi sapien tellus, facilisis in luctus sed, ultricies non nisi. In a dolor vulputate tortor tempus rutrum. Sed ut tempus massa. Maecenas at tristique libero. Ut venenatis arcu in feugiat elementum. Donec bibendum eleifend turpis quis auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique nulla turpis, sit amet accumsan elit semper ac.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:columns {\"align\":\"full\",\"backgroundColor\":\"light-green-cyan\"} -->\r\n<div class=\"wp-block-columns alignfull has-light-green-cyan-background-color has-background\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lobortis, velit eget hendrerit ullamcorper, tortor lacus hendrerit lectus, vel pellentesque ipsum metus a ante. Morbi sapien tellus, facilisis in luctus sed, ultricies non nisi. In a dolor vulputate tortor tempus rutrum. Sed ut tempus massa. Maecenas at tristique libero. Ut venenatis arcu in feugiat elementum. Donec bibendum eleifend turpis quis auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique nulla turpis, sit amet accumsan elit semper ac.</p>\r\n<!-- /wp:paragraph --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lobortis, velit eget hendrerit ullamcorper, tortor lacus hendrerit lectus, vel pellentesque ipsum metus a ante. Morbi sapien tellus, facilisis in luctus sed, ultricies non nisi. In a dolor vulputate tortor tempus rutrum. Sed ut tempus massa. Maecenas at tristique libero. Ut venenatis arcu in feugiat elementum. Donec bibendum eleifend turpis quis auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique nulla turpis, sit amet accumsan elit semper ac.</p>\r\n<!-- /wp:paragraph --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->\r\n\r\n<!-- wp:image {\"align\":\"full\",\"sizeSlug\":\"large\"} -->\r\n<figure class=\"wp-block-image alignfull size-large\"><img src=\"http://localhost:8000/storage/photos/1/Nishtha 3.0 Website banner (2)-03.jpg\" alt=\"\"/></figure>\r\n<!-- /wp:image -->\r\n\r\n<!-- wp:columns {\"align\":\"full\"} -->\r\n<div class=\"wp-block-columns alignfull\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:table -->\r\n<figure class=\"wp-block-table\"><table><tbody><tr><td>Name </td><td>Number</td></tr><tr><td></td><td></td></tr></tbody></table></figure>\r\n<!-- /wp:table --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:table -->\r\n<figure class=\"wp-block-table\"><table><tbody><tr><td>Name</td><td>Number</td></tr><tr><td></td><td></td></tr></tbody></table></figure>\r\n<!-- /wp:table --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->\r\n\r\n<!-- wp:paragraph -->\r\n<p></p>\r\n<!-- /wp:paragraph -->', 'http://localhost:8000/storage/photos/1/Sanketik-Sampreshan-Competition-Banner.png', '1.00', '1.00', 'en', 'Bhasha sangam,CIET,NCERT', '2022-02-25 05:40:11', '2022-02-28 04:48:11'),
(4, 'Orientation of State Resource Groups (SRGs)', 'srg', 'custom', 'Helloy', '<!-- wp:columns {\"align\":\"full\"} -->\r\n<div class=\"wp-block-columns alignfull\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"full\",\"sizeSlug\":\"large\"} -->\r\n<figure class=\"wp-block-image alignfull size-large\"><img src=\"http://localhost:8000/storage/photos/1/Bhasha Sangam-Social Media Banner (1).jpg\" alt=\"\"/></figure>\r\n<!-- /wp:image --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:image {\"sizeSlug\":\"large\"} -->\r\n<figure class=\"wp-block-image size-large\"><img src=\"http://localhost:8000/storage/photos/1/Cover_page-0002.jpg\" alt=\"\"/></figure>\r\n<!-- /wp:image --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>Government of India has brought in several initiatives for dissemination of eContent such as DIKSHA (One Nation One Platform), PMeVIDYA (One Class One Channel), MOOCs on SWAYAM, ePathshala, etc and DIKSHA has been sought as a one stop solution for School Education. The Ministry of Education has launched NIPUN Bharat Mission for Foundational Literacy and Numeracy (FLN) and Adult Education as special verticals on the DIKSHA platform. Besides, several other verticals i.e. DIVYANG/ CWSN, CPD for educating educators, administrators, vocational education etc are also being created on DIKSHA portal. These verticals aim to nurture skills, special abilities and help increase the quality of life of an individual by enabling them to pursue their livelihood, be aware of their rights and responsibilities. The National Education Policy - 2020 (NEP- 2020), unveiled by the Ministry of Education emphasises for the development of quality eContent in varied forms in all regional languages for a diverse group of learners including DIVYANG and to empower students and teacher communities across India. eContent augments the learning experience by deploying various resources for visualization and explanation of abstract ideas. Keeping in view the diverse needs of learners, now use of eContent has become an essential component of the teaching and learning processes. eContent is available in large numbers through various sources, but few of them are found to have the desired quality in terms of content, pedagogy as well as technical aspects. Copyright violations are rampant thereby restricting the scope of customising the eContent according to the local needs. Also with a plethora of smart and mobile devices, teacher and student driven eContents are available in abundance in the market. NEP -2020 further emphasises on development of eContent by NCERT-CIET, CBSE, NIOS, and other bodies/ institutions, which will be uploaded on to the DIKSHA platform and also use the platform for teacher professional development. eContents have to be created for DIKSHA and its other verticals based on the quality parameters and learning outcomes. NEP-2020 also puts emphasis that each teacher and school principals will be expected to participate in at least 50 hours per annum Continuous Professional Development (CPD) activities. Therefore, CIET- NCERT is organising a series of virtual training programmes to familiarise the SRGs on development of eContent, process of developing quality eContent and curation of eContent and its dissemination through multiple modes -online/ offline/ on air/ web portals /apps etc and contribute in bridging the digital divide.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:table {\"hasFixedLayout\":true,\"backgroundColor\":\"subtle-pale-green\"} -->\r\n<figure class=\"wp-block-table\"><table class=\"has-subtle-pale-green-background-color has-fixed-layout has-background\"><thead><tr><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>dfjhdfjds</td><td>gfhgfhf</td></tr><tr><td>gfhgfh</td><td>jhgjhgj</td></tr></tbody></table></figure>\r\n<!-- /wp:table -->\r\n\r\n<!-- wp:group -->\r\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:group -->\r\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:gallery {\"ids\":[null],\"className\":\"columns-1\"} -->\r\n<figure class=\"wp-block-gallery columns-1 is-cropped\"><ul class=\"blocks-gallery-grid\"><li class=\"blocks-gallery-item\"><figure><img src=\"http://localhost:8000/storage/photos/1/Nishtha 3.0 Website banner (2)-03.jpg\" data-id=\"\"/></figure></li>\r\n<li class=\"blocks-gallery-item\"><figure><img src=\"http://localhost:8000/storage/photos/1/Nishtha 3.0 Website banner (2)-03.jpg\" data-id=\"\"/></figure></li>\r\n</ul></figure>\r\n<!-- /wp:gallery --></div></div>\r\n<!-- /wp:group --></div></div>\r\n<!-- /wp:group -->', 'http://localhost:8000/storage/photos/1/Nishtha 3.0 Website banner (2)-03.jpg', '1.00', '1.00', 'en', 'SRg,Diksha,CIET', '2022-03-03 02:57:16', '2022-03-24 10:04:19'),
(6, 'About', 'about', 'general', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque auctor at ex vitae porttitor. Donec id enim sed massa malesuada placerat. Donec hendrerit ante eu congue dignissim.', '<h2 style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Heading1</h2><p style=\"text-align: justify; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque auctor at ex vitae porttitor. Donec id enim sed massa malesuada placerat. Donec hendrerit ante eu congue dignissim. Suspendisse potenti. <a href=\"https://kenwheeler.github.io/slick/\" target=\"_blank\">Quisque tempus interdum nibh sed ornare.</a> Pellentesque cursus faucibus nulla, at malesuada massa tristique ut. Pellentesque ut accumsan risus. Pellentesque et eros sapien. Vestibulum auctor mollis hendrerit. Donec ac tristique enim. Sed feugiat sapien ut sem imperdiet, vel laoreet odio consequat. Suspendisse ex enim, laoreet eu libero quis, blandit vulputate elit.</p><h3 style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Heading2</h3><p style=\"text-align: justify; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Ut imperdiet libero at elit luctus, quis fermentum ligula pretium. Donec sodales dui vitae sem euismod, in luctus erat imperdiet. Pellentesque mattis justo nec nisl tempor fermentum. Praesent purus nulla, ornare eu ultrices vel, congue quis diam. Fusce lacinia, tortor vel pretium efficitur, dolor est ultricies sapien, ut volutpat augue orci eget ante. Nulla libero dui, malesuada in molestie vitae, congue sit amet tellus. Suspendisse purus risus, scelerisque quis turpis dignissim, faucibus aliquet odio. Proin malesuada, metus sed egestas tempor, diam tellus elementum ex, vel sollicitudin quam nisi eget lorem. Integer volutpat nisl nec lectus ultrices pulvinar. Pellentesque gravida mi eget eros iaculis, quis mollis tellus accumsan. Duis non mi quis arcu aliquet elementum in varius leo. Vestibulum sit amet nunc accumsan, vehicula est vitae, ultrices mi. Curabitur consectetur dui vitae pellentesque aliquam. Phasellus id ipsum elit.</p><h4 style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Heading3</h4><p style=\"text-align: justify; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Maecenas sed tincidunt augue. Nullam vitae commodo quam, id tempor metus. Pellentesque a turpis ut tellus egestas lobortis ultrices ac magna. Aliquam quis tincidunt augue. Donec dictum euismod posuere. Integer eu vulputate mauris. Aliquam vel nunc diam. Maecenas ut consectetur ex, vel mattis eros. Proin ac bibendum risus. Morbi aliquet felis leo, faucibus faucibus nisi tristique quis. Duis consequat massa est, vel tempus ante sollicitudin facilisis.</p><p style=\"text-align: justify; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Cras venenatis ultricies est ac porta. Mauris faucibus justo eu mi mattis, sed laoreet elit sodales. Etiam faucibus rutrum ligula, sit amet condimentum massa. Ut vulputate est eu nisi dictum laoreet. Donec maximus bibendum odio id ullamcorper. Curabitur faucibus sem at magna lobortis tempus. Fusce cursus ex nec est finibus condimentum. Proin malesuada lacus sit amet magna maximus, et viverra dui molestie. Nam convallis tortor vel sapien venenatis, sed suscipit lectus eleifend. In auctor sapien id velit porttitor rhoncus. Aliquam vel lacinia tellus. Nullam vitae tortor lectus. Duis sit amet nibh ac nisi sagittis aliquam. Sed non tortor in sem iaculis sodales.</p><p style=\"text-align: justify; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Curabitur accumsan nulla dignissim viverra sollicitudin. Nulla rhoncus, odio vitae ullamcorper vestibulum, velit sapien elementum dolor, a porta mi ligula dictum lorem. Etiam aliquet metus sed suscipit pulvinar. Aliquam erat volutpat. Donec et est id mi semper rutrum. Morbi ipsum est, fermentum ac sagittis eget, fermentum ac magna. Nunc accumsan ex mattis erat condimentum, convallis varius augue eleifend. Integer aliquet convallis neque, et bibendum leo efficitur quis. Etiam nec nisi in quam molestie imperdiet a quis neque. Vestibulum vestibulum, lacus vitae fringilla rutrum, mi nisi interdum mi, vitae porta neque eros eu massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque a sem sollicitudin, commodo libero sit amet, commodo mi. Aliquam in gravida velit, quis faucibus risus. Sed quam quam, elementum semper facilisis et, tincidunt nec odio. Vestibulum eget orci sed orci dignissim pretium vel non erat.</p>', 'http://localhost:8000/storage/photos/1/hero.png', '1.00', '1.00', 'en', 'about,About Ciet,About CIET,CIET', '2022-04-06 03:59:55', '2022-04-13 07:14:28'),
(7, 'General', 'general', 'custom', 'Ut imperdiet libero at elit luctus, quis fermentum ligula pretium. Donec sodales dui vitae sem euismod, in luctus erat imperdiet. Pellentesque mattis justo nec nisl tempor fermentum. Praesent purus nulla,', '<!-- wp:columns {\"align\":\"full\"} -->\r\n<div class=\"wp-block-columns alignfull\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:heading -->\r\n<h2>Mission</h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>Ut imperdiet libero at elit luctus, quis fermentum ligula pretium. Donec sodales dui vitae sem euismod, in luctus erat imperdiet. Pellentesque mattis justo nec nisl tempor fermentum. Praesent purus nulla, ornare eu ultrices vel, congue quis diam. Fusce lacinia, tortor vel pretium efficitur, dolor est ultricies sapien, ut volutpat augue orci eget ante. Nulla libero dui, malesuada in molestie vitae, congue sit amet tellus. Suspendisse purus risus, scelerisque quis turpis dignissim, faucibus aliquet odio. Proin malesuada, metus sed egestas tempor, diam tellus elementum ex, vel sollicitudin quam nisi eget lorem. Integer volutpat nisl nec lectus ultrices pulvinar. Pellentesque gravida mi eget eros iaculis, quis mollis tellus accumsan. Duis non mi quis arcu aliquet elementum in varius leo. Vestibulum sit amet nunc accumsan, vehicula est vitae, ultrices mi. Curabitur consectetur dui vitae pellentesque aliquam. Phasellus id ipsum elit.</p>\r\n<!-- /wp:paragraph --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:heading -->\r\n<h2>Vision</h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>Ut imperdiet libero at elit luctus, quis fermentum ligula pretium. Donec sodales dui vitae sem euismod, in luctus erat imperdiet. Pellentesque mattis justo nec nisl tempor fermentum. Praesent purus nulla, ornare eu ultrices vel, congue quis diam. Fusce lacinia, tortor vel pretium efficitur, dolor est ultricies sapien, ut volutpat augue orci eget ante. Nulla libero dui, malesuada in molestie vitae, congue sit amet tellus. Suspendisse purus risus, scelerisque quis turpis dignissim, faucibus aliquet odio. Proin malesuada, metus sed egestas tempor, diam tellus elementum ex, vel sollicitudin quam nisi eget lorem. Integer volutpat nisl nec lectus ultrices pulvinar. Pellentesque gravida mi eget eros iaculis, quis mollis tellus accumsan. Duis non mi quis arcu aliquet elementum in varius leo. Vestibulum sit amet nunc accumsan, vehicula est vitae, ultrices mi. Curabitur consectetur dui vitae pellentesque aliquam. Phasellus id ipsum elit.</p>\r\n<!-- /wp:paragraph --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->\r\n\r\n<!-- wp:paragraph -->\r\n<p></p>\r\n<!-- /wp:paragraph -->', 'http://localhost:8000/storage/photos/1/hero.png', '1.00', '1.00', 'en', 'CIET,SRG', '2022-04-06 04:19:34', '2022-04-07 09:53:06'),
(8, 'Online Training on Social Media for Education', 'online-training-sme', 'custom', 'Social media in education states the drill of using social media platforms as an approach to augment the learning of students. Technology incorporation can be...', '<!-- wp:columns {\"align\":\"full\"} -->\r\n<div class=\"wp-block-columns alignfull\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"left\"} -->\r\n<p class=\"has-text-align-left\">Social media in education states the drill of using social media platforms as an approach to augment the learning of students. Technology incorporation can be defined as encompassing students’ needs rather than revolving around the needs of teachers. In a teaching space with a whiteboard and a computer, the education will spin around the instructor. With the use of technology, the learning environment can be expanded. This is another way that social media and the classroom can come together by shifting the approach to educating through social media to make it easier for both the teacher and the student to comprehend. As an effort to orient various stakeholders in the exploration and implementation of social media.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:heading {\"level\":3,\"textColor\":\"white\",\"style\":{\"color\":{\"background\":\"#d46142\"},\"typography\":{\"lineHeight\":\"0.5\"}}} -->\r\n<h3 class=\"has-white-color has-text-color has-background\" style=\"line-height:0.5;background-color:#d46142\">Overview</h3>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:paragraph {\"style\":{\"color\":{\"background\":\"#f5f5f5\"}}} -->\r\n<p class=\"has-background\" style=\"background-color:#f5f5f5\">teaching space with a whiteboard and a computer, the education will spin around the instructor. With the use of technology, the learning environment can be expanded. This is another way that social media and the classroom can come together by shifting the approach to educating through social media to make it easier for both the teacher and the student to comprehend. </p>\r\n<!-- /wp:paragraph --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:image {\"sizeSlug\":\"large\",\"className\":\"is-style-default\"} -->\r\n<figure class=\"wp-block-image size-large is-style-default\"><img src=\"http://localhost:8000/storage/photos/1/sme.jpg\" alt=\"\"/></figure>\r\n<!-- /wp:image --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->\r\n\r\n<!-- wp:columns {\"align\":\"full\"} -->\r\n<div class=\"wp-block-columns alignfull\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:heading {\"align\":\"center\",\"level\":3,\"textColor\":\"white\",\"style\":{\"color\":{\"background\":\"#d46142\"},\"typography\":{\"lineHeight\":\"0.5\"}}} -->\r\n<h3 class=\"has-text-align-center has-white-color has-text-color has-background\" style=\"line-height:0.5;background-color:#d46142\">अवकाश लेने का उद्देश्‍य</h3>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:table {\"className\":\"is-style-stripes\"} -->\r\n<figure class=\"wp-block-table is-style-stripes\"><table><thead><tr><th>Date</th><th>Topic</th><th><strong>Resource Persons</strong></th><th>Presentation</th><th><strong>Video Link</strong></th></tr></thead><tbody><tr><td>08/03/2022</td><td>Topic Title</td><td>Ramkrishna Pal</td><td><a rel=\"noreferrer noopener\" href=\"http://localhost:8000/training-calender\" target=\"_blank\"><strong>Click Here</strong></a></td><td><a rel=\"noreferrer noopener\" href=\"http://localhost:8000/training-calender\" target=\"_blank\"><strong>Click Here</strong></a></td></tr><tr><td>10/03/2022</td><td>Topic title</td><td>Ramkrishna Pal</td><td><a rel=\"noreferrer noopener\" href=\"http://localhost:8000/training-calender\" target=\"_blank\"><strong>Click Here</strong></a></td><td><a rel=\"noreferrer noopener\" href=\"http://localhost:8000/training-calender\" target=\"_blank\"><strong>Click Here</strong></a></td></tr><tr><td>11/03/2022</td><td>Topic Title</td><td>अवकाश लेने का उद्देश्‍य</td><td><a rel=\"noreferrer noopener\" href=\"http://localhost:8000/training-calender\" target=\"_blank\"><strong>Click Here</strong></a></td><td><a rel=\"noreferrer noopener\" href=\"http://localhost:8000/training-calender\" target=\"_blank\"><strong>Click Here</strong></a></td></tr></tbody></table></figure>\r\n<!-- /wp:table -->\r\n\r\n<!-- wp:paragraph -->\r\n<p></p>\r\n<!-- /wp:paragraph --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->', 'http://localhost:8000/storage/photos/1/hero.png', '1.00', '1.00', 'en', 'Online Training on Social Media for Education,अवकाश लेने का उद्देश्‍य', '2022-04-07 09:48:09', '2022-04-08 06:22:52'),
(9, 'हमारे बारे में', 'about', 'general', 'About', '<h2 style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Heading1</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; text-align: justify; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque auctor at ex vitae porttitor. Donec id enim sed massa malesuada placerat. Donec hendrerit ante eu congue dignissim. Suspendisse potenti.&nbsp;<a href=\"https://kenwheeler.github.io/slick/\" target=\"_blank\">Quisque tempus interdum nibh sed ornare.</a>&nbsp;Pellentesque cursus faucibus nulla, at malesuada massa tristique ut. Pellentesque ut accumsan risus. Pellentesque et eros sapien. Vestibulum auctor mollis hendrerit. Donec ac tristique enim. Sed feugiat sapien ut sem imperdiet, vel laoreet odio consequat. Suspendisse ex enim, laoreet eu libero quis, blandit vulputate elit.</p><h3 style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Heading2</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; text-align: justify; padding: 0px;\">Ut imperdiet libero at elit luctus, quis fermentum ligula pretium. Donec sodales dui vitae sem euismod, in luctus erat imperdiet. Pellentesque mattis justo nec nisl tempor fermentum. Praesent purus nulla, ornare eu ultrices vel, congue quis diam. Fusce lacinia, tortor vel pretium efficitur, dolor est ultricies sapien, ut volutpat augue orci eget ante. Nulla libero dui, malesuada in molestie vitae, congue sit amet tellus. Suspendisse purus risus, scelerisque quis turpis dignissim, faucibus aliquet odio. Proin malesuada, metus sed egestas tempor, diam tellus elementum ex, vel sollicitudin quam nisi eget lorem. Integer volutpat nisl nec lectus ultrices pulvinar. Pellentesque gravida mi eget eros iaculis, quis mollis tellus accumsan. Duis non mi quis arcu aliquet elementum in varius leo. Vestibulum sit amet nunc accumsan, vehicula est vitae, ultrices mi. Curabitur consectetur dui vitae pellentesque aliquam. Phasellus id ipsum elit.</p><h4 style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Heading3</h4><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; text-align: justify; padding: 0px;\">Maecenas sed tincidunt augue. Nullam vitae commodo quam, id tempor metus. Pellentesque a turpis ut tellus egestas lobortis ultrices ac magna. Aliquam quis tincidunt augue. Donec dictum euismod posuere. Integer eu vulputate mauris. Aliquam vel nunc diam. Maecenas ut consectetur ex, vel mattis eros. Proin ac bibendum risus. Morbi aliquet felis leo, faucibus faucibus nisi tristique quis. Duis consequat massa est, vel tempus ante sollicitudin facilisis.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; text-align: justify; padding: 0px;\">Cras venenatis ultricies est ac porta. Mauris faucibus justo eu mi mattis, sed laoreet elit sodales. Etiam faucibus rutrum ligula, sit amet condimentum massa. Ut vulputate est eu nisi dictum laoreet. Donec maximus bibendum odio id ullamcorper. Curabitur faucibus sem at magna lobortis tempus. Fusce cursus ex nec est finibus condimentum. Proin malesuada lacus sit amet magna maximus, et viverra dui molestie. Nam convallis tortor vel sapien venenatis, sed suscipit lectus eleifend. In auctor sapien id velit porttitor rhoncus. Aliquam vel lacinia tellus. Nullam vitae tortor lectus. Duis sit amet nibh ac nisi sagittis aliquam. Sed non tortor in sem iaculis sodales.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; text-align: justify; padding: 0px;\">Curabitur accumsan nulla dignissim viverra sollicitudin. Nulla rhoncus, odio vitae ullamcorper vestibulum, velit sapien elementum dolor, a porta mi ligula dictum lorem. Etiam aliquet metus sed suscipit pulvinar. Aliquam erat volutpat. Donec et est id mi semper rutrum. Morbi ipsum est, fermentum ac sagittis eget, fermentum ac magna. Nunc accumsan ex mattis erat condimentum, convallis varius augue eleifend. Integer aliquet convallis neque, et bibendum leo efficitur quis. Etiam nec nisi in quam molestie imperdiet a quis neque. Vestibulum vestibulum, lacus vitae fringilla rutrum, mi nisi interdum mi, vitae porta neque eros eu massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque a sem sollicitudin, commodo libero sit amet, commodo mi. Aliquam in gravida velit, quis faucibus risus. Sed quam quam, elementum semper facilisis et, tincidunt nec odio. Vestibulum eget orci sed orci dignissim pretium vel non erat.</p>', 'http://localhost:8000/storage/photos/1/hero.png', '1.00', '1.00', 'hi', NULL, '2022-04-21 13:58:57', '2022-04-21 13:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ramkrishna.ncert@gmail.com', '$2y$10$4M8k2yrjvZ8JNsQgRqMBG.xC/mkrgTLYUrLkHtjzNRNokEoQ.uY16', '2022-03-12 05:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(27, 'DepartmentController@store', 'Department store', 'New Department Store', '2022-03-02 06:14:57', '2022-03-02 06:14:57'),
(28, 'DepartmentController@edit', 'Department edit', 'Edit existing Department', '2022-03-02 23:17:57', '2022-03-02 23:17:57'),
(29, 'DepartmentController@update', 'Department update', 'Update existing Department', '2022-03-02 23:24:50', '2022-03-02 23:24:50'),
(30, 'MetaController@destroy', 'Meta Delete', 'Delete Meta Field', '2022-03-03 06:18:23', '2022-03-03 06:18:23'),
(31, 'EventController@index', 'Event List', 'List of all Events', '2022-03-04 00:47:56', '2022-03-04 00:47:56'),
(32, 'EventController@create', 'Event Create Form', 'Event Create Form', '2022-03-04 00:48:31', '2022-03-04 00:48:31'),
(33, 'EventController@store', 'Event Store', 'Store new Event data', '2022-03-04 00:49:05', '2022-03-04 00:49:05'),
(34, 'EventController@edit', 'Event Edit Form', 'Event Edit Form', '2022-03-04 00:49:40', '2022-03-04 00:49:40'),
(35, 'EventController@update', 'Event Update', 'Event Update', '2022-03-04 00:50:42', '2022-03-04 00:50:42'),
(36, 'PageController@css', 'Css Page', 'Display Custom CSS Page', '2022-03-04 04:57:15', '2022-03-04 04:57:15'),
(37, 'MenuController@index', 'Menu', 'Menu Manager', '2022-03-06 22:16:30', '2022-03-06 22:16:30'),
(38, 'MenuController@store', 'Menu Group Store', 'New Menu Group Store', '2022-03-06 22:17:01', '2022-03-06 22:17:01'),
(39, 'MenuItemController@store', 'Menu Item Store', 'New Menu Item Store', '2022-03-06 22:17:37', '2022-03-06 22:17:37'),
(40, 'MenuItemController@update', 'Menu Item Update', 'Update Menu Item', '2022-03-06 22:18:03', '2022-03-06 22:18:03'),
(41, 'TrainingController@index', 'Training List', 'List of Trainings', '2022-03-08 01:46:21', '2022-03-08 01:46:21'),
(42, 'TrainingController@create', 'Training create form', 'Training create form', '2022-03-08 01:46:54', '2022-03-08 01:46:54'),
(43, 'TrainingController@store', 'Training store', 'New Training store', '2022-03-08 01:47:43', '2022-03-08 01:47:43'),
(44, 'TrainingController@edit', 'Training edit form', 'Training edit form', '2022-03-08 01:48:07', '2022-03-08 01:48:07'),
(45, 'TrainingController@update', 'Training update', 'Existing Training update', '2022-03-08 01:48:33', '2022-03-08 01:48:33'),
(46, 'FacultyController@index', 'Faculty List', 'List of Faculty', '2022-03-08 05:07:18', '2022-03-08 05:07:18'),
(47, 'FacultyController@create', 'Faculty create', 'Faculty create', '2022-03-08 05:07:43', '2022-03-08 05:07:43'),
(48, 'FacultyController@store', 'Faculty store', 'Faculty store', '2022-03-08 05:08:04', '2022-03-08 05:08:04'),
(49, 'FacultyController@edit', 'Faculty edit', 'Faculty edit', '2022-03-08 05:08:16', '2022-03-08 05:08:16'),
(50, 'FacultyController@update', 'Faculty update', 'Faculty update', '2022-03-08 05:08:31', '2022-03-08 05:08:31'),
(51, 'SettingController@index', 'Settings show', 'Settings show', '2022-03-10 01:58:18', '2022-03-10 01:58:18'),
(52, 'SettingController@store', 'Setting store', 'Setting store', '2022-03-10 05:29:21', '2022-03-10 05:29:21'),
(53, 'MessageController@index', 'Message list', 'Message list', '2022-03-11 06:53:56', '2022-03-11 06:53:56'),
(54, 'MessageController@create', 'Message create', 'Message create', '2022-03-11 07:23:13', '2022-03-11 07:23:13'),
(55, 'MessageController@store', 'Message store', 'Message store', '2022-03-12 04:37:22', '2022-03-12 04:37:22'),
(56, 'MessageController@show', 'Show Message', 'Show Message', '2022-03-14 06:44:09', '2022-03-14 06:44:09'),
(57, 'MessageController@update', 'Message update', 'Message update', '2022-03-14 08:27:12', '2022-03-14 08:27:12'),
(58, 'SliderController@index', 'Slider index', 'Slider index', '2022-03-22 06:40:22', '2022-03-22 06:40:22'),
(59, 'SliderController@store', 'Slide store', 'Slide store', '2022-03-22 08:52:18', '2022-03-22 08:52:18'),
(60, 'SliderController@update', 'Slider update', 'Slider update', '2022-03-23 09:22:56', '2022-03-23 09:22:56'),
(61, 'SliderController@destroy', 'Slide destroy', 'Slide destroy', '2022-03-24 05:25:48', '2022-03-24 05:25:48'),
(62, 'PageController@general', 'General page create', 'General page create', '2022-03-24 06:00:13', '2022-03-24 06:00:13'),
(63, 'ArticalController@index', 'Artical List', 'Artical List', '2022-03-29 07:07:32', '2022-03-29 07:07:32'),
(64, 'ArticalController@create', 'Artical create form', 'Artical create form', '2022-03-29 07:19:28', '2022-03-29 07:19:28'),
(65, 'ArticalController@store', 'Artical store', 'Artical store', '2022-03-30 04:50:30', '2022-03-30 04:50:30'),
(66, 'ArticalController@edit', 'Artical edit', 'Artical edit', '2022-03-30 04:51:10', '2022-03-30 04:51:10'),
(67, 'ArticalController@update', 'Artical update', 'Artical update', '2022-03-30 04:51:25', '2022-03-30 04:51:25'),
(68, 'ArticalController@destroy', 'Artical destroy', 'Artical destroy', '2022-03-30 08:58:44', '2022-03-30 08:58:44'),
(69, 'PageController@destroy', 'Page destroy', 'Page destroy', '2022-03-31 07:07:22', '2022-03-31 07:07:22'),
(70, 'MenuItemController@destroy', 'MenuItem destroy', 'MenuItem destroy', '2022-03-31 10:00:02', '2022-03-31 10:00:02'),
(71, 'MenuController@destroy', 'Menu destroy', 'Menu destroy', '2022-03-31 10:20:43', '2022-03-31 10:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(3, 1),
(3, 2),
(3, 4),
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
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(63, 5),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(4, 'Eventor', 'Event Editor', 'Can only create and update Events', '2022-02-24 23:31:43', '2022-02-24 23:31:43'),
(5, 'Artical Editor', 'Artical Editor', 'Artical Editor', '2022-03-29 10:19:25', '2022-03-29 10:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 1, 'App\\Models\\User'),
(1, 2, 'App\\Models\\User'),
(2, 3, 'App\\Models\\User'),
(4, 4, 'App\\Models\\User'),
(5, 5, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'logo-english', 'http://localhost:8000/storage/photos/1/NCERT_300px.svg.png', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(2, 'logo-urdu', 'http://localhost:8000/storage/photos/1/NCERT_300px.svg.png', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(3, 'admin-email', 'dceta.ncert@nic.in', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(4, 'facebook', 'facebook.com', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(5, 'twitter', 'twitter.com', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(6, 'instagram', 'instagram.com', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(7, 'youtube', 'youtube.com', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(8, 'linkedin', 'linkedin.com', '2022-03-10 05:39:04', '2022-03-10 05:39:04'),
(9, 'logo-hindi', 'http://localhost:8000/storage/photos/1/1NCERT.jpg', NULL, NULL),
(10, 'contact-email', 'dceta.ncert@nic.in', NULL, NULL),
(11, 'contact-number1', '+91 11 2696 2580', NULL, NULL),
(12, 'contact-number2', '+91 11 2686 4141', NULL, NULL),
(13, 'tollfree', '1800 111 265, 1800 112 199', NULL, NULL),
(14, 'address', 'Central Institute Of Educational Technology(CIET)\r\nNational Council of Educational Research and Training (NCERT),\r\nSri Aurobindo Marg, New Delhi,\r\nDelhi 110016', NULL, NULL),
(15, 'popup-image', 'http://localhost:8000/storage/photos/1/Bhasha Sangam-Social Media Banner (1).jpg', NULL, NULL),
(16, 'popup-url', 'https://ciet.nic.in/contact-ministerial.php?&ln=en', NULL, NULL),
(17, 'popup-status', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `default` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `alt`, `image`, `url`, `lang`, `order`, `default`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ciet Banner', 'CIET', 'http://localhost:8000/storage/photos/1/pexels-pixabay-70741.jpg', 'https://tamanna.ncert.org.in/login', 'en', NULL, 1, 1, 1, '2022-03-22 09:03:30', '2022-03-24 05:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `key_word` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `title`, `slug`, `icon`, `featured_image`, `category`, `type`, `description`, `content`, `start_date`, `end_date`, `user_id`, `key_word`, `lang`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Online Training on “Open Educational Resources (OER) and Licenses”', 'oerl', 'http://localhost:8000/storage/photos/1/qrsocialmediaforeducationbanner.jpg', 'http://localhost:8000/storage/photos/1/qrsocialmediaforeducationbanner.jpg', 'Upcoming', 'online', 'Online Training on “Open Educational Resources (OER) and Licenses”', '<!-- wp:paragraph -->\r\n<p>Open Educational Resources (OER) offer opportunities for sustainable growth in improving the access and quality of education, by enabling the use of learning materials that are free, easily accessible and hold high quality. Keeping in view the diverse needs of learners, now use of eContent has become an essential component of the teaching and learning processes. Impact of COVID-19 in the education sector has shown a major shift to the development of digital content in teaching-learning procedures, wherein the platform of DIKSHA has played a crucial role. As an effort to orient various stakeholders in the exploration and implementation of Open Educational Resources and Licensing, CIET-NCERT in collaboration with CEMCA-COL, is organizing a five-day online training on “Open Educational Resources (OER) and Licenses” from April 25-29, 2022, as part of the online training series.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>CEMCA-COL focuses on assisting governments and institutions to expand the scale, efficiency and quality of learning by using multiple media in open, distance and technology-enhanced learning. The strategic objective of CEMCA is to promote cooperation and collaboration in the use of electronic media resources for distance education. CEMCA publishes all its new learning resources as Open Educational Resources (OER). OER performs vitally in the expansion of eContent, hence fostering the growth of the education sector.</p>\r\n<!-- /wp:paragraph -->', '2022-04-25', '2022-04-29', 1, '\"Online Training on \\u201cOpen Educational Resources (OER) and Licenses\\u201d,OER\"', 'en', 1, '2022-04-21 16:33:11', '2022-04-21 16:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, 'Ramkrishna Pal', 'ramkrishna.ncert@gmail.com', '2022-02-23 00:53:13', 'Admin', '$2a$12$bayZJpM48D8a8OZAPam5oeKxy6UyDUfJW8wbrHudXB.2zbwpg8vCC', '0CKMvnQuuWemwk1EJUd1qhKSghsMoQgcZZm9takw6feJt1b6tyG5KhXHKBdO', '2022-02-23 00:53:13', '2022-02-23 00:53:13'),
(2, 'Rameez Alam', 'rameezalamciet@gmail.com', '2022-02-23 00:53:13', 'Admin', '$2a$12$bayZJpM48D8a8OZAPam5oeKxy6UyDUfJW8wbrHudXB.2zbwpg8vCC', 'HseS8SftJd', '2022-02-23 00:53:13', '2022-02-25 02:45:18'),
(3, 'Farman Ali', 'farman.ciet@gmail.com', NULL, 'Editor', '$2y$10$ryGCd3FarH.5CgzbRCImFe3DsMGxtnyM3.n9dyI4c8.fCA8Xl1DRe', NULL, '2022-02-24 03:07:50', '2022-03-14 11:50:53'),
(4, 'Saurabh Singh', 'saurabhsingh.ciet@gmail.com', NULL, 'Event Editor', '$2y$10$cv5Rh8gwXrHzZBJrbjm6/uQrdQm9HmMNcaWy6whDBXspKJxBwo5LC', NULL, '2022-02-24 23:30:29', '2022-02-24 23:32:29'),
(5, 'Deepak', 'deepakCiet@gmail.com', NULL, 'Artical Editor', '$2y$10$nAjDPCjif/iDJkb09cB/DOEaShRoMG6WSb5XK2x2yT9Wv1ArFPhsG', NULL, '2022-03-29 10:20:01', '2022-03-29 10:20:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articals`
--
ALTER TABLE `articals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
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
-- AUTO_INCREMENT for table `articals`
--
ALTER TABLE `articals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
