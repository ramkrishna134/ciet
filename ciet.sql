-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2022 at 05:17 PM
-- Server version: 8.0.29-0ubuntu0.20.04.3
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
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `category`, `sub_category`, `url`, `lang`, `expiry_date`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore facere placeat vitae', 'vacancy', 'contractual', '/storage/files/1/53286200122-report.pdf', 'en', '2022-05-11', 1, 1, '2022-05-07 06:40:25', '2022-05-11 10:00:11'),
(2, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.  vitae', 'notice', NULL, 'http://localhost:8000/storage/files/1/53286200122-report.pdf', 'en', '2022-05-13', 1, 1, '2022-05-07 06:43:17', '2022-05-07 06:43:17'),
(3, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore facere placeat vitae', 'mislen', NULL, 'http://localhost:8000/storage/files/1/53286200122-report.pdf', 'en', '2022-05-15', 1, 1, '2022-05-07 07:07:21', '2022-05-07 07:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `android` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ios` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `window` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articals`
--

CREATE TABLE `articals` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `latest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articals`
--

INSERT INTO `articals` (`id`, `title`, `category`, `icon`, `url`, `date`, `month`, `year`, `user_id`, `lang`, `status`, `latest`, `created_at`, `updated_at`) VALUES
(3, 'Volume V, Issue 4, 1 October - 31 December 2021', 'newsletter', '/storage/photos/1/newsletter.png', 'https://ciet.nic.in/NewsletterOct21/', '2021-12-31', 'December', '2021', 1, 'en', 1, '1', '2022-05-09 11:28:27', '2022-05-12 10:14:52'),
(4, 'Volume V, Issue 3, 1 July - 30 September 2021', 'newsletter', '/storage/photos/1/newsletter.png', 'https://ciet.nic.in/NewsletterJuly-sep2021/', '2021-09-30', 'September', '2021', 1, 'en', 1, NULL, '2022-05-12 09:54:27', '2022-05-12 09:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL,
  `key_word` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `slug`, `icon`, `featured_image`, `gallery`, `description`, `head_image`, `head_message`, `lang`, `user_id`, `status`, `key_word`, `created_at`, `updated_at`) VALUES
(5, 'Department of ICT & Training', 'dict', '/storage/photos/1/dict.png', '/storage/photos/1/depart-hero.jpg', '[\"http:\\/\\/localhost:8000\\/storage\\/photos\\/1\\/DICT\\/2017-10-13.jpg\",\"http:\\/\\/localhost:8000\\/storage\\/photos\\/1\\/DICT\\/2019-08-06.jpg\",\"http:\\/\\/localhost:8000\\/storage\\/photos\\/1\\/DICT\\/CIET-g2.jpg\",\"http:\\/\\/localhost:8000\\/storage\\/photos\\/1\\/DICT\\/ciet-g3.jpg\",\"http:\\/\\/localhost:8000\\/storage\\/photos\\/1\\/DICT\\/DIxZAm7XgAA45Qt.jpg\",\"http:\\/\\/localhost:8000\\/storage\\/photos\\/1\\/DICT\\/newsletter.png\",\"http:\\/\\/localhost:8000\\/storage\\/photos\\/1\\/DICT\\/images.jpg\",\"http:\\/\\/localhost:8000\\/storage\\/photos\\/1\\/DICT\\/download.jpeg\",\"http:\\/\\/localhost:8000\\/storage\\/photos\\/1\\/DICT\\/download (1).jpeg\",\"http:\\/\\/localhost:8000\\/storage\\/photos\\/1\\/DICT\\/event-1.jpg\",\"http:\\/\\/localhost:8000\\/storage\\/photos\\/1\\/DICT\\/sme.jpg\",\"http:\\/\\/localhost:8000\\/storage\\/photos\\/1\\/DICT\\/Sanketik-Sampreshan-Competition-Banner.png\"]', '<p><span style=\"text-align: justify;\">Ut imperdiet libero at elit luctus, quis fermentum ligula pretium. Donec sodales dui vitae sem euismod, in luctus erat imperdiet. Pellentesque mattis justo nec nisl tempor fermentum. Praesent purus nulla, ornare eu ultrices vel, congue quis diam. Fusce lacinia, tortor vel pretium efficitur, dolor est ultricies sapien, ut volutpat augue orci eget ante. Nulla libero dui, malesuada in molestie vitae, congue sit amet tellus. Suspendisse purus risus, scelerisque quis turpis dignissim, faucibus aliquet odio. Proin malesuada, metus sed egestas tempor, diam tellus elementum ex, vel sollicitudin quam nisi eget lorem. Integer volutpat nisl nec lectus ultrices pulvinar. Pellentesque gravida mi eget eros iaculis, quis mollis tellus accumsan. Duis non mi quis arcu aliquet elementum in varius leo. Vestibulum sit amet nunc accumsan, vehicula est vitae, ultrices mi. Curabitur consectetur dui vitae pellentesque aliquam. Phasellus id ipsum elit.</span><br></p>', '/storage/photos/1/head-dict.png', 'LOREM IPSUM, DOLOR SIT AMET CONSECTETUR ADIPISICING ELIT. TOTAM AMET AD OMNIS DEBITIS SUNT VELIT TOTAM AMET AD OMNIS DEBITIS', 'en', 1, 1, 'DICT,Department of ICT & Training', '2022-05-04 07:29:50', '2022-05-09 11:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date NOT NULL,
  `user_id` int NOT NULL,
  `department_id` int NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_word` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `icon`, `featured_image`, `category`, `description`, `content`, `start_date`, `end_date`, `user_id`, `department_id`, `lang`, `key_word`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ICT Award', 'ict-award', '/storage/photos/1/Bhasha Sangam-Social Media Banner (1).jpg', '/storage/photos/1/Nishtha 3.0 Website banner (2)-03.jpg', 'Ongoing', 'Hello', '<!-- wp:paragraph -->\r\n<p>Hello</p>\r\n<!-- /wp:paragraph -->', '2022-05-06', '2022-05-08', 1, 5, 'en', '\"ICT Award\"', 1, '2022-03-07 03:00:40', '2022-05-09 11:09:16'),
(2, 'Cyber Jaagrookta Diwas Series Theme for May, 2022 : Social Engineering Attacks', 'sea', 'http://localhost:8000/storage/photos/1/Cover_page-0002.jpg', 'http://localhost:8000/storage/photos/1/hero.png', 'Ongoing', 'The Ministry of Home Affairs is implementing a scheme called the”Indian Cyber Crime Coordination Centre (I4C)” to deal with cyber crimes in a coordinated and comprehensive manner. In order to create awareness amongst students of schools & colleges, teachers and parents it is proposed to observe “Cyber Jaagrookta (Awareness) Diwas\'\' on the first wednesday of every month in all Schools/Colleges/Universities /Panchayati Raj Institutions(PRI) and Municipalities by involving District Magistrates Police Authorities, Officers of Education Department etc.', '<!-- wp:columns {\"align\":\"full\"} -->\r\n<div class=\"wp-block-columns alignfull\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:html -->\r\n<p style=\"text-align: justify;\"><strong>What is Cyber Jaagrookta Diwas?</strong><br>The Ministry of Home Affairs is implementing a scheme called the”Indian Cyber Crime Coordination Centre (I4C)” to deal with cyber crimes in a coordinated and comprehensive manner. In order to create awareness amongst students of schools &amp; colleges, teachers and parents it is proposed to observe “Cyber Jaagrookta (Awareness) Diwas\'\' on the first wednesday of every month in all Schools/Colleges/Universities /Panchayati Raj Institutions(PRI) and Municipalities by involving District Magistrates Police Authorities, Officers of Education Department etc.</p>\r\n<!-- /wp:html -->\r\n\r\n<!-- wp:paragraph -->\r\n<p><strong>About the Theme:</strong><br>Social engineering is the term used for a broad range of malicious activities accomplished through human interactions. It uses psychological manipulation to trick users into making security mistakes or giving away sensitive information.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>Social engineering attacks happen in one or more steps. A perpetrator first investigates the intended victim to gather necessary background information, such as potential points of entry and weak security protocols, needed to proceed with the attack. Then, the attacker moves to gain the victim’s trust and provide stimuli for subsequent actions that break security practices, such as revealing sensitive information or granting access to critical resources.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>For the month of May, 2022 CIET-NCERT has planned sessions on the theme “Social Engineering Attacks\'\' in collaboration with Information Security Education and Awareness (ISEA), CDAC, Hyderabad. A panel discussion will be conducted on the “Cyber Jaagrookta (Awareness) Diwas\'\' on 4 May, 2022 followed by 3 technical session on the given theme on the subsequent friday’s (i.e. 6/05/2022, 13/05/2022 &amp; 20/05/2022). At the end of the session series, a comprehensive quiz will be launched based on all the sessions conducted in the month of May, 2022 on cyber safety and security.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:heading {\"level\":4,\"style\":{\"typography\":{\"lineHeight\":\"1.5\"}}} -->\r\n<h4 style=\"line-height:1.5\">Objectives:</h4>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:list -->\r\n<ul><li>Understanding the term ‘Social Engineering Attacks’</li><li>Understand the impact of Social Engineering Attacks on Education.</li><li>Understanding the impact of Social Engineering Attacks on the development of students.</li><li>Learning about combating Social Engineering Attacks.</li></ul>\r\n<!-- /wp:list -->\r\n\r\n<!-- wp:heading {\"level\":4} -->\r\n<h4>Who can participate?</h4>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>Students, Teachers, Teacher Educators, Parents, Administrators, General Public, etc.</p>\r\n<!-- /wp:paragraph --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:image {\"sizeSlug\":\"large\"} -->\r\n<figure class=\"wp-block-image size-large\"><img src=\"https://ciet.nic.in/media/upload/program-banner/sea-banner.jpg\" alt=\"\"/></figure>\r\n<!-- /wp:image --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->\r\n\r\n<!-- wp:heading {\"align\":\"center\",\"level\":4,\"textColor\":\"white\",\"style\":{\"color\":{\"background\":\"#28a745\"},\"typography\":{\"lineHeight\":\"1\"}}} -->\r\n<h4 class=\"has-text-align-center has-white-color has-text-color has-background\" style=\"line-height:1;background-color:#28a745\">Program Schedule</h4>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:table {\"align\":\"full\",\"className\":\"is-style-stripes\"} -->\r\n<figure class=\"wp-block-table alignfull is-style-stripes\"><table><thead><tr><th>Day &amp; Date</th><th><strong>Topic</strong></th><th>Resource Persons</th><th><strong>Video Link</strong></th></tr></thead><tbody><tr><td>Wednesday<br>04/05/22</td><td>Panel discussion on “Social Engineering Attacks”</td><td>Dr. Mohammed Misbahuddin, Associate Director, C-DAC Bangalore<br>Prof. Krishnashree Achuthan, Dean, Amrita Vishwa Vidyapeetham<br>Dr. Rejaul Karim Barbhuiya, Assistant Professor, CIET-NCERT<br>Mod erator: Dr. Angel Rathnabai, Assistant Professor, CIET-NCERT</td><td></td></tr><tr><td>Friday<br>06/04/22</td><td>Will be updated Soon</td><td></td><td></td></tr><tr><td>Friday<br>13/05/22</td><td>Will be updated Soon</td><td></td><td></td></tr><tr><td>Friday<br>20/05/22</td><td>Will be updated Soon</td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr></tbody></table></figure>\r\n<!-- /wp:table -->', '2022-05-04', '2022-05-08', 1, 5, 'en', '\"Cyber Jaagrookta Diwas Series Theme for May, 2022 : Social Engineering Attacks\"', 1, '2022-05-06 04:42:30', '2022-05-07 09:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int DEFAULT NULL,
  `status` int NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `image`, `post`, `subject`, `number`, `profile`, `category`, `department_id`, `status`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Amrendra Behera', '/storage/photos/1/jd.jpeg', 'Joint Director', 'Education', '226', '/storage/files/1/Video/file_example_MP4_480_1_5MG.mp4', 'Academic', NULL, 1, 'en', '2022-03-08 23:08:23', '2022-05-09 11:11:45'),
(2, 'Dr. Rejaul Karim', '/storage/photos/1/DrRejaulKarimBarbhuiya.jpg', 'Assistant Professor', 'Computer Science', '236', '/storage/files/1/Documentation_for_Tamanna_Aptitude_Online_Test.pdf', 'Academic', 5, 1, 'en', '2022-03-09 00:48:50', '2022-05-09 11:11:54'),
(4, 'Dr. Indu Kumar', '/storage/photos/1/DrInduKumar.jpg', 'Professor', 'Education', '231', '/storage/files/1/53286200122-report.pdf', 'Academic', 5, 1, 'en', '2022-05-07 03:53:37', '2022-05-09 11:11:59'),
(5, 'Dr. Bharti', '/storage/photos/1/head-dict.png', 'Associate Professor', 'Education', '217', '/storage/files/1/53286200122-report.pdf', 'Academic', 5, 1, 'en', '2022-05-07 03:54:52', '2022-05-09 11:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `phone`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Ram k Pal', '7001325284', 'ramkrishna.ncert@gmail.com', 'Very good emplye', 'Heloo, how r u', '2022-04-18 11:41:25', '2022-04-18 11:41:25'),
(2, 'Ram k Pal', '7001325284', 'ramkrishna.ncert@gmail.com', 'Very good emplye', 'Heloo, how r u', '2022-04-18 11:43:07', '2022-04-18 11:43:07'),
(3, 'Ram k Pal', '7001325284', 'ramkrishna.ncert@gmail.com', 'Hello', 'Hello', '2022-04-22 07:14:18', '2022-04-22 07:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `infrastructures`
--

CREATE TABLE `infrastructures` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infrastructures`
--

INSERT INTO `infrastructures` (`id`, `title`, `icon`, `url`, `lang`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Resources', '/storage/photos/1/resourse.png', 'https://hello.com', 'en', 1, 1, '2022-05-10 04:27:04', '2022-05-10 08:21:05'),
(2, 'Library', '/storage/photos/1/books.png', 'https://hello.com', 'en', 1, 1, '2022-05-10 04:28:24', '2022-05-10 08:21:33'),
(3, 'Studio', '/storage/photos/1/studio_1.png', '#', 'en', 1, 1, '2022-05-10 08:00:37', '2022-05-10 08:21:51'),
(4, 'Diksha CCC', '/storage/photos/1/diksha.png', '#', 'en', 1, 1, '2022-05-10 08:18:27', '2022-05-10 08:22:14'),
(5, 'Transmission', '/storage/photos/1/transmission.png', '#', 'en', 1, 1, '2022-05-10 08:18:59', '2022-05-10 08:22:28'),
(6, 'Journal', '/storage/photos/1/oer.png', '#', 'en', 1, 1, '2022-05-10 08:19:38', '2022-05-10 08:22:41'),
(7, 'Newsletter', '/storage/photos/1/journal.png', '#', 'en', 1, 1, '2022-05-10 08:24:56', '2022-05-10 08:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `initiatives`
--

CREATE TABLE `initiatives` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `web_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `play_store` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_store` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `window_store` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `key_word` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `initiatives`
--

INSERT INTO `initiatives` (`id`, `name`, `slug`, `icon`, `description`, `content`, `web_link`, `play_store`, `apple_store`, `window_store`, `user_id`, `key_word`, `status`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'DIKSHA', NULL, '/storage/photos/1/diksha-removebg-preview.png', 'The National Council of Educational Research and Training (NCERT) is an autonomous organization set up in 1961 by the Government of India to assist and advise the Central and State Governments on policies and programs for qualitative improvement in school education.', NULL, 'diksha.gov.in', NULL, NULL, NULL, 1, NULL, 1, 'en', '2022-05-07 11:10:11', '2022-05-10 03:52:30'),
(2, 'NISHTHA', NULL, 'http://localhost:8000/storage/photos/1/1-02.png', 'The National Council of Educational Research and Training (NCERT) is an autonomous organization set up in 1961 by the Government of India to assist and advise the Central and State Governments on policies and programs for qualitative improvement in school education.', NULL, 'http://itpd.ncert.gov.in/', NULL, NULL, NULL, 1, NULL, 1, 'en', '2022-05-07 11:15:51', '2022-05-07 11:15:51'),
(3, 'ePathshala', 'epathshala', '/storage/photos/1/1-03.png', 'The National Council of Educational Research and Training (NCERT) is an autonomous organization set up in 1961 by the Government of India to assist and advise the Central and State Governments on policies and programs for qualitative improvement in school education.', '<!-- wp:paragraph -->\r\n<p>The National Council of Educational Research and Training (NCERT) is an autonomous organization set up in 1961 by the Government of India to assist and advise the Central and State Governments on policies and programmes for qualitative improvement in school education. The major objectives of NCERT and its constituent units are to: undertake, promote and coordinate research in areas related to school education; prepare and publish model textbooks, supplementary material, newsletters, journals and develops educational kits, multimedia digital materials, etc. organise pre-service and in-service training of teachers; develop and disseminate innovative educational techniques and practices;collaborate and network with state educational departments, universities, NGOs and other educational institutions; act as a clearing house for ideas and information in matters related to school education; and act as a nodal agency for achieving the goals of Universalisation of Elementary Education. In addition to research, development, training, extension, publication and dissemination activities, NCERT is an implementation agency for bilateral cultural exchange programmes with other countries in the field of school education. The NCERT also interacts and works in collaboration with the international organizations, visiting foreign delegations and offers various training facilities to educational personnel from developing countries. The major constituent units of NCERT which are located in different regions of the country are:</p>\r\n<!-- /wp:paragraph -->', 'https://epathshala.nic.in/', NULL, NULL, NULL, 1, 'ePathshala,EPATHSHALA', 1, 'en', '2022-05-08 09:58:26', '2022-05-12 09:51:56'),
(4, 'NCF Tech Platform', NULL, 'http://localhost:8000/storage/photos/1/ncf.png', 'The National Council of Educational Research and Training (NCERT) is an autonomous organization set up in 1961 by the Government of India to assist and advise the Central and State Governments on policies and programs for qualitative improvement in school education.', NULL, 'https://ncf.ncert.gov.in/', NULL, NULL, NULL, 1, NULL, 1, 'en', '2022-05-08 09:59:59', '2022-05-08 09:59:59'),
(5, 'ICT Curriculum', NULL, 'http://localhost:8000/storage/photos/1/1-24.png', 'The National Council of Educational Research and Training (NCERT) is an autonomous organization set up in 1961 by the Government of India to assist and advise the Central and State Governments on policies and programs for qualitative improvement in school education.', NULL, 'https://ictcurriculum.gov.in/', NULL, NULL, NULL, 1, NULL, 1, 'en', '2022-05-09 10:09:36', '2022-05-09 10:09:36'),
(6, 'ICT@Schools', NULL, 'http://localhost:8000/storage/photos/1/1-06.png', 'The National Council of Educational Research and Training (NCERT) is an autonomous organization set up in 1961 by the Government of India to assist and advise the Central and State Governments on policies and programs for qualitative improvement in school education.', NULL, 'https://ictschools.ncert.gov.in/', NULL, NULL, NULL, 1, NULL, 1, 'en', '2022-05-09 10:10:30', '2022-05-09 10:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` bigint UNSIGNED NOT NULL,
  `key_word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Primary Menu', 'header', '2022-03-06 22:22:03', '2022-03-06 22:22:03'),
(2, 'Links', 'footer', '2022-03-06 22:55:58', '2022-03-06 22:55:58'),
(3, 'Other Links', 'footer', '2022-05-11 10:15:17', '2022-05-11 10:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint UNSIGNED NOT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `has_child` int DEFAULT '0',
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depth` int NOT NULL,
  `target` int NOT NULL DEFAULT '0',
  `status` int NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `label`, `link`, `menu_id`, `parent_id`, `has_child`, `class`, `depth`, `target`, `status`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', 1, NULL, 0, NULL, 0, 0, 1, 'en', '2022-03-06 22:22:32', '2022-03-06 22:22:52'),
(4, 'About', 'about', 1, NULL, 1, NULL, 0, 0, 1, 'en', '2022-04-21 09:55:04', '2022-05-04 06:33:39'),
(11, 'Departments', 'Departments', 1, NULL, 1, NULL, 0, 0, 1, 'en', '2022-04-21 11:53:42', '2022-05-07 06:57:21'),
(12, 'Department of ICT &amp; Training', '/department/dict', 1, 11, 0, NULL, 1, 0, 1, 'en', '2022-04-21 11:54:14', '2022-05-07 06:09:45'),
(18, 'Contact us', '/contact', 1, 17, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:51:29', '2022-04-21 12:51:49'),
(19, 'People', '/people', 1, 4, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:52:29', '2022-05-04 06:36:16'),
(20, 'RTI', '#', 1, 17, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:53:20', '2022-04-21 12:53:20'),
(21, 'Media Production Division', '/mpd', 1, 11, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:54:23', '2022-04-21 12:54:23'),
(22, 'Planning & Research Division', '/prd', 1, 11, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:55:22', '2022-04-21 12:55:22'),
(23, 'Engineering Division', '/ed', 1, 11, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:56:40', '2022-04-21 12:56:40'),
(24, 'Administration & Accounts', '/aac', 1, 11, 0, NULL, 1, 0, 1, 'en', '2022-04-21 12:57:49', '2022-04-21 12:57:49'),
(28, 'Radio Broadcasting', '#', 1, 9, 0, NULL, 1, 0, 1, 'en', '2022-04-21 13:07:27', '2022-04-21 13:07:27'),
(33, 'होम', '/', 1, NULL, 0, NULL, 0, 0, 1, 'hi', '2022-04-21 13:56:15', '2022-04-21 13:56:15'),
(34, 'हमारे बारे में', 'about', 1, NULL, 0, NULL, 0, 0, 1, 'hi', '2022-04-21 13:57:04', '2022-04-21 14:11:52'),
(37, 'ICT Award', 'https://ictaward.ncert.gov.in/', 1, 15, 0, NULL, 1, 1, 1, 'en', '2022-04-21 14:16:31', '2022-04-21 14:16:31'),
(38, 'AICEAVF ICT Mela', '#', 1, 15, 0, NULL, 1, 0, 1, 'en', '2022-04-21 14:22:51', '2022-04-21 14:22:51'),
(39, 'Summer Camp', '#', 1, 15, 0, NULL, 1, 0, 1, 'en', '2022-04-21 14:23:16', '2022-04-21 14:23:16'),
(41, 'Announcements', 'announcement', 1, 51, 0, NULL, 1, 0, 1, 'en', '2022-04-22 06:29:13', '2022-05-07 06:24:06'),
(42, 'About us', '/about', 1, 4, 0, NULL, 1, 0, 1, 'en', '2022-05-04 06:35:38', '2022-05-04 06:35:38'),
(43, 'Advisory Board', 'advisory-board', 1, 4, 0, NULL, 1, 0, 1, 'en', '2022-05-04 06:37:23', '2022-05-04 06:37:23'),
(44, 'Initiatives', 'Initiatives', 1, NULL, 1, NULL, 0, 0, 1, 'en', '2022-05-04 06:42:29', '2022-05-07 06:57:44'),
(45, 'Major Projects', '/initiatives', 1, 44, 0, NULL, 1, 0, 1, 'en', '2022-05-04 06:44:09', '2022-05-07 06:08:48'),
(46, 'PAC Projects', '#', 1, 44, 0, NULL, 1, 0, 1, 'en', '2022-05-04 06:44:46', '2022-05-04 06:44:46'),
(47, 'PAB Projects', '#', 1, 44, 0, NULL, 1, 0, 1, 'en', '2022-05-04 06:45:50', '2022-05-04 06:45:50'),
(48, 'Activites', 'Activites', 1, NULL, 1, NULL, 0, 0, 1, 'en', '2022-05-04 06:46:33', '2022-05-07 06:58:12'),
(49, 'Calender', '/calender', 1, 48, 0, NULL, 1, 0, 1, 'en', '2022-05-04 06:47:09', '2022-05-07 08:52:16'),
(50, 'Documents', 'Documents', 1, NULL, 1, NULL, 0, 0, 1, 'en', '2022-05-04 06:47:41', '2022-05-07 06:58:35'),
(51, 'More', 'More', 1, NULL, 1, NULL, 0, 0, 1, 'en', '2022-05-04 06:48:14', '2022-05-07 06:59:05'),
(52, 'Webinar On ICT Tools', 'webinar', 1, 48, 0, NULL, 1, 0, 1, 'en', '2022-05-04 08:17:58', '2022-05-06 06:40:49'),
(53, 'ICT Award', 'https://ictaward.ncert.gov.in/', 1, 48, 0, NULL, 1, 1, 1, 'en', '2022-05-06 11:24:26', '2022-05-06 11:25:37'),
(54, 'NCERT', 'https://ncert.nic.in/', 2, NULL, 0, NULL, 0, 0, 1, 'en', '2022-05-11 10:15:53', '2022-05-11 10:15:53'),
(55, 'DIKSHA', '#', 2, NULL, 0, NULL, 0, 0, 1, 'en', '2022-05-11 10:17:29', '2022-05-11 10:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign_to` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `title`, `message`, `assign_to`, `status`, `created_at`, `updated_at`) VALUES
(15, 1, 'Request for adding new page on menu', '<p><span style=\"text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', 1, 1, '2022-03-12 07:23:00', '2022-03-14 10:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int UNSIGNED NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `key`, `value`, `model_type`, `model_id`, `lang`) VALUES
(15, 'Training', '<p style=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget pulvinar neque, ac commodo sapien. Phasellus libero est, vestibulum eu congue in, tristique quis nunc. Vivamus felis ipsum, accumsan at tempus in, elementum sed sapien. Nullam eget pharetra metus. Morbi tempus turpis at turpis venenatis gravida. Maecenas ut dui a sem molestie euismod. Praesent a nunc nunc. Morbi dui justo, auctor venenatis ex eu, blandit condimentum metus. Pellentesque laoreet nulla tellus, consequat aliquam orci viverra vitae. Phasellus viverra imperdiet interdum. Integer cursus velit ac ligula euismod ornare.</p><p style=\"\">Proin vel arcu suscipit, facilisis nibh vel, aliquet tortor. Nunc id dictum ante. Integer ullamcorper nec risus in luctus. Pellentesque ultrices quam sed leo laoreet facilisis. Nunc tempus nisi eget mattis elementum. Maecenas fringilla facilisis iaculis. Duis ut lorem ac dui porta euismod. Fusce aliquet quam sed ipsum tristique, at rhoncus lacus faucibus. Curabitur ut sagittis velit.</p>', 'App\\Models\\Department', 5, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(43, '2022_04_18_130050_add_columns_to_articals', 18),
(44, '2022_02_25_090930_create_infrastructures_table', 19),
(45, '2022_03_03_062455_create_announcements_table', 19),
(46, '2022_03_07_045842_create_apps_table', 19),
(47, '2022_03_08_045235_add_android_and_ios_and_window_to_apps', 19),
(48, '2022_03_09_051221_create_webinars_table', 19),
(49, '2022_05_06_122530_add_category_to_webinars', 20),
(50, '2022_05_07_150435_create_initiatives_table', 21),
(51, '2022_05_08_140741_create_partners_table', 22),
(52, '2022_05_09_171757_create_visitors_table', 23),
(53, '2022_05_12_101033_create_keywords_table', 24),
(54, '2022_05_12_101203_create_redirections_table', 24),
(56, '2022_05_12_144311_add_columns_to_initiative', 25);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(550) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `featured_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` decimal(8,2) NOT NULL,
  `status` decimal(8,2) NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_word` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `type`, `description`, `content`, `featured_icon`, `user_id`, `status`, `lang`, `key_word`, `created_at`, `updated_at`) VALUES
(9, 'हमारे बारे में', 'about', 'general', 'About', '<h2 style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Heading1</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; text-align: justify; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque auctor at ex vitae porttitor. Donec id enim sed massa malesuada placerat. Donec hendrerit ante eu congue dignissim. Suspendisse potenti.&nbsp;<a href=\"https://kenwheeler.github.io/slick/\" target=\"_blank\">Quisque tempus interdum nibh sed ornare.</a>&nbsp;Pellentesque cursus faucibus nulla, at malesuada massa tristique ut. Pellentesque ut accumsan risus. Pellentesque et eros sapien. Vestibulum auctor mollis hendrerit. Donec ac tristique enim. Sed feugiat sapien ut sem imperdiet, vel laoreet odio consequat. Suspendisse ex enim, laoreet eu libero quis, blandit vulputate elit.</p><h3 style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Heading2</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; text-align: justify; padding: 0px;\">Ut imperdiet libero at elit luctus, quis fermentum ligula pretium. Donec sodales dui vitae sem euismod, in luctus erat imperdiet. Pellentesque mattis justo nec nisl tempor fermentum. Praesent purus nulla, ornare eu ultrices vel, congue quis diam. Fusce lacinia, tortor vel pretium efficitur, dolor est ultricies sapien, ut volutpat augue orci eget ante. Nulla libero dui, malesuada in molestie vitae, congue sit amet tellus. Suspendisse purus risus, scelerisque quis turpis dignissim, faucibus aliquet odio. Proin malesuada, metus sed egestas tempor, diam tellus elementum ex, vel sollicitudin quam nisi eget lorem. Integer volutpat nisl nec lectus ultrices pulvinar. Pellentesque gravida mi eget eros iaculis, quis mollis tellus accumsan. Duis non mi quis arcu aliquet elementum in varius leo. Vestibulum sit amet nunc accumsan, vehicula est vitae, ultrices mi. Curabitur consectetur dui vitae pellentesque aliquam. Phasellus id ipsum elit.</p><h4 style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Heading3</h4><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; text-align: justify; padding: 0px;\">Maecenas sed tincidunt augue. Nullam vitae commodo quam, id tempor metus. Pellentesque a turpis ut tellus egestas lobortis ultrices ac magna. Aliquam quis tincidunt augue. Donec dictum euismod posuere. Integer eu vulputate mauris. Aliquam vel nunc diam. Maecenas ut consectetur ex, vel mattis eros. Proin ac bibendum risus. Morbi aliquet felis leo, faucibus faucibus nisi tristique quis. Duis consequat massa est, vel tempus ante sollicitudin facilisis.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; text-align: justify; padding: 0px;\">Cras venenatis ultricies est ac porta. Mauris faucibus justo eu mi mattis, sed laoreet elit sodales. Etiam faucibus rutrum ligula, sit amet condimentum massa. Ut vulputate est eu nisi dictum laoreet. Donec maximus bibendum odio id ullamcorper. Curabitur faucibus sem at magna lobortis tempus. Fusce cursus ex nec est finibus condimentum. Proin malesuada lacus sit amet magna maximus, et viverra dui molestie. Nam convallis tortor vel sapien venenatis, sed suscipit lectus eleifend. In auctor sapien id velit porttitor rhoncus. Aliquam vel lacinia tellus. Nullam vitae tortor lectus. Duis sit amet nibh ac nisi sagittis aliquam. Sed non tortor in sem iaculis sodales.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; text-align: justify; padding: 0px;\">Curabitur accumsan nulla dignissim viverra sollicitudin. Nulla rhoncus, odio vitae ullamcorper vestibulum, velit sapien elementum dolor, a porta mi ligula dictum lorem. Etiam aliquet metus sed suscipit pulvinar. Aliquam erat volutpat. Donec et est id mi semper rutrum. Morbi ipsum est, fermentum ac sagittis eget, fermentum ac magna. Nunc accumsan ex mattis erat condimentum, convallis varius augue eleifend. Integer aliquet convallis neque, et bibendum leo efficitur quis. Etiam nec nisi in quam molestie imperdiet a quis neque. Vestibulum vestibulum, lacus vitae fringilla rutrum, mi nisi interdum mi, vitae porta neque eros eu massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque a sem sollicitudin, commodo libero sit amet, commodo mi. Aliquam in gravida velit, quis faucibus risus. Sed quam quam, elementum semper facilisis et, tincidunt nec odio. Vestibulum eget orci sed orci dignissim pretium vel non erat.</p>', 'http://localhost:8000/storage/photos/1/hero.png', '1.00', '1.00', 'hi', NULL, '2022-04-21 13:58:57', '2022-04-21 13:58:57'),
(10, 'Screen Reader Access', 'screen-reader-access', 'general', 'ICT Schools website complies with Guidelines for Indian Government Websites. This will enable people with visual impairments to access the website using technologies, such as screen readers. The information on the website is accessible to different screen readers, such as JAWS, NVDA, SAFA, Supernova and Window-Eyes', '<p>ICT Schools website complies with Guidelines for Indian Government Websites. This will enable people with visual impairments to access the website using technologies, such as screen readers. The information on the website is accessible to different screen readers, such as JAWS, NVDA, SAFA, Supernova and Window-Eyes.</p><p>The following table lists the information about different screen readers:<br>Information related to the various screen readers</p><p><br></p><table class=\"table table-bordered\">  <thead>    <tr>    <th><span style=\"box-sizing: inherit;\">Screen Reader</span><br></th>    <th><span style=\"box-sizing: inherit;\">Website</span><br></th>    <th><span style=\"box-sizing: inherit;\">Free / Commercial</span><br></th>    </tr>  </thead><tbody><tr><td>Non-Visual Desktop Access (NVDA)<br></td><td><a href=\"http://www.nvda-project.org/\" target=\"_blank\" style=\"box-sizing: inherit; touch-action: manipulation;\">http://www.nvda-project.org/</a><br></td><td>Free<br></td></tr><tr><td>System Access To Go</td><td><a href=\"http://www.satogo.com/\" target=\"_blank\" style=\"box-sizing: inherit; touch-action: manipulation; outline: 0px;\">http://www.satogo.com/</a></td><td>Free</td></tr><tr><td>Web Anywhere</td><td><a href=\"http://webanywhere.cs.washington.edu/wa.php\" target=\"_blank\" style=\"box-sizing: inherit; touch-action: manipulation;\">http://webanywhere.cs.washington.edu/wa.php</a></td><td>Free</td></tr><tr><td>Hal</td><td><a href=\"http://www.yourdolphin.co.uk/productdetail.asp?id=5\" target=\"_blank\" style=\"box-sizing: inherit; touch-action: manipulation; outline: 0px;\">http://www.yourdolphin.co.uk/productdetail.asp?id=5</a></td><td>Commercial</td></tr><tr><td>JAWS</td><td><a href=\"http://www.freedomscientific.com/jaws-hq.asp\" target=\"_blank\" style=\"box-sizing: inherit; touch-action: manipulation;\">http://www.freedomscientific.com/jaws-hq.asp</a></td><td>Commercial</td></tr><tr><td>Supernova</td><td><a href=\"http://www.yourdolphin.co.uk/productdetail.asp?id=1\" target=\"_blank\" style=\"box-sizing: inherit; touch-action: manipulation;\">http://www.yourdolphin.co.uk/productdetail.asp?id=1</a></td><td>Commercial</td></tr><tr><td>Window-Eyes</td><td><a href=\"http://www.gwmicro.com/Window-Eyes/\" target=\"_blank\" style=\"box-sizing: inherit; touch-action: manipulation;\">http://www.gwmicro.com/Window-Eyes/</a></td><td>Commercial</td></tr></tbody></table><p><br></p>', 'http://localhost:8000/storage/photos/1/hero.png', '1.00', '1.00', 'en', 'Screen Reader Access,TTS', '2022-05-05 05:25:36', '2022-05-05 07:24:17'),
(11, 'About us', 'about', 'custom', 'Central Institute of Educational Technology (CIET) is a constituent unit of the National Council of Educational Research and Training (NCERT), an autonomous organization under the Ministry of Education (MoE), Government of India. Established in 1984 with the merger of the Center of Educational Technology (1973) and Department of Teaching Aids (1959), its chief aim is to promote Educational Technology especially mass media singly or in combinations (multimedia packages) to extend educational opportunities and improve quality of educational processes at the school level.', '<!-- wp:heading -->\r\n<h2>Genesis</h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>Central Institute of Educational Technology (CIET) is a constituent unit of the National Council of Educational Research and Training&nbsp;<a rel=\"noreferrer noopener\" href=\"https://ncert.nic.in/\" target=\"_blank\">(NCERT)</a>, an autonomous organization under the Ministry of Education (MoE), Government of India. Established in 1984 with the merger of the Center of Educational Technology (1973) and the Department of Teaching Aids (1959), its chief aim is to promote Educational Technology especially mass media singly or in combinations (multimedia packages) to extend educational opportunities and improve quality of educational processes at the school level.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>As a premier institute of Educational Technology at the National level, major functions of the CIET-NCERT are based on Research and Development, Training, Extension and Dissemination functions are as given below: &nbsp;&nbsp;</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>a. To design, develop, try out and disseminate alternative learning systems to achieve the&nbsp;national goal of universalisation of elementary and secondary education.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>b. To address various educational problems at micro, meso and macro levels.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>The areas of activities of the CIET based on Research and Development, Training, Extension and Dissemination functions are as given below:</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:list -->\r\n<ul><li>To design and produce media software materials viz., television/ radio (for both&nbsp;broadcast as well as non-broadcast use) graphics and other programmes for strengthening the transaction of curricular and co-curricular activities at the school level.</li><li>To create competencies in development and use of educational software materials mentioned above through training in areas such as script development, media production, media communication, media research, technical operations, setting up studios, repair&nbsp;and maintenance of equipment.</li><li>To develop plans for the use of&nbsp;<a rel=\"noreferrer noopener\" href=\"http://ictcurriculum.gov.in/\" target=\"_blank\">Information and Communication Technologies&nbsp;(ICTs)</a>&nbsp;in education.</li><li>To train the faculty of Institutes of Advanced Study in Education/Colleges of Teacher &nbsp;Education and District Institutes of Education and Training in the use of Educational&nbsp;Technology in their teacher education programmes.</li><li>To undertake research, evaluation and monitoring of the systems, programmes and materials with a view to improving the materials and increasing their effectiveness.</li><li>To document and disseminate information, materials and media programmes for better utilization and to function as a clearinghouse/agency in the field of Educational &nbsp;Technology.</li><li>To advise and coordinate the academic and technical programmes and activities of the&nbsp;State Institutes of Educational Technology (SIETs) set up by the MoE in states of&nbsp;India.</li></ul>\r\n<!-- /wp:list -->\r\n\r\n<!-- wp:separator -->\r\n<hr class=\"wp-block-separator\"/>\r\n<!-- /wp:separator -->\r\n\r\n<!-- wp:columns -->\r\n<div class=\"wp-block-columns\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:heading -->\r\n<h2>Major Functions of CIET</h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:list -->\r\n<ul><li>Design, develop and disseminate alternative learning systems</li><li>Promote Educational Technology</li><li>Train Personnel in Educational Technology</li><li>Advise &amp; Co-ordinate activities of SIETs</li><li>Provide Consultancy and media support to other constituents of NCERT</li></ul>\r\n<!-- /wp:list -->\r\n\r\n<!-- wp:heading -->\r\n<h2>Vision</h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>Vision of our institute is to be the national pioneer and leader in various aspects of the professional improvement and advancement in educational communication and technology, grounded in theory, in research, in practice and in code of ethics, providing solutions by utilizing the innovations, research combined with design, building and managing the resource centre of quality educational media software and integration of technology and pedagogy.</p>\r\n<!-- /wp:paragraph --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:heading -->\r\n<h2>Mission</h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>The mission of Central Institute of Educational Technology (CIET) is to:</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:list -->\r\n<ul><li>act as a nodal resource centre for school education media software acquired through national, regional and international sources for reference and research.</li><li>achieve excellence in design, research and production of educational software for children and teachers, including parents.</li><li>contribute to teacher education through the convergence of appropriate technologies.</li><li>build capacities of teachers/educators for quality improvement roles in school education.</li><li>constructively inform educational policy makers and to critically appraise educational technology (ICT related) policy in India.</li></ul>\r\n<!-- /wp:list --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->', 'http://localhost:8000/storage/photos/1/hero.png', '1.00', '1.00', 'en', 'About,CIET', '2022-05-05 08:01:14', '2022-05-08 09:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `logo`, `link`, `lang`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'NCERT', '/storage/photos/1/ncert.png', 'https://ncert.nic.in', 'en', 1, 1, '2022-05-08 09:31:20', '2022-05-09 11:23:43'),
(3, 'MoE', 'http://localhost:8000/storage/photos/1/moe.png', 'https://www.education.gov.in/en', 'en', 1, 1, '2022-05-08 09:36:59', '2022-05-08 09:36:59'),
(4, 'Digital India', 'http://localhost:8000/storage/photos/1/dic.png', 'https://www.education.gov.in/en', 'en', 1, 1, '2022-05-08 09:38:34', '2022-05-08 09:38:34'),
(5, 'Azadi Ka Amrat Mahotsab', 'http://localhost:8000/storage/photos/1/akam.png', '#', 'en', 1, 1, '2022-05-08 09:41:11', '2022-05-08 09:41:11'),
(6, 'UNESCO', 'http://localhost:8000/storage/photos/1/unesco.png', '#', 'en', 1, 1, '2022-05-08 09:41:40', '2022-05-08 09:41:40'),
(7, 'Data gov', 'http://localhost:8000/storage/photos/1/data.png', '#', 'en', 1, 1, '2022-05-08 09:46:58', '2022-05-08 09:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'HomeController@dashboard', 'Dashboard', 'Admin Dashboard view ', '2022-02-23 08:31:57', '2022-02-23 08:31:57'),
(4, 'PermissionController@index', 'Permissions', 'List of all Permissions', '2022-02-23 11:13:00', '2022-02-23 11:13:00'),
(5, 'PermissionController@store', 'Permission Create', 'Create new Permission rule', '2022-02-23 11:50:25', '2022-02-23 11:50:25'),
(6, 'PermissionController@edit', 'Edit Permission', 'Edit or Update Permission rule', '2022-02-23 06:29:38', '2022-02-23 06:29:38'),
(7, 'PermissionController@update', 'Update Permission', 'Update Permission rule', '2022-02-23 23:01:17', '2022-02-23 23:01:17'),
(8, 'RoleController@index', 'Role List', 'List of Roles', '2022-02-23 23:46:13', '2022-02-23 23:46:13'),
(9, 'RoleController@store', 'Role Store', 'Store new Role', '2022-02-23 23:47:08', '2022-02-23 23:47:08'),
(10, 'UserController@index', 'Users', 'List of all Users', '2022-02-24 00:41:06', '2022-02-24 00:41:06'),
(11, 'UserController@edit', 'User Edit', 'Edit user details', '2022-02-24 00:41:35', '2022-02-24 00:41:35'),
(12, 'UserController@update', 'User Update', 'Update user details', '2022-02-24 00:42:14', '2022-02-24 00:42:14'),
(13, 'UserController@store', 'User Store', 'Create New user', '2022-02-24 01:55:03', '2022-02-24 01:55:03'),
(14, 'UserController@show', 'User Show', 'Show User details', '2022-02-24 03:10:57', '2022-02-24 03:10:57'),
(15, 'UserController@assignRole', 'Assign Role', 'Assign role to user', '2022-02-24 03:54:12', '2022-02-24 03:54:12'),
(16, 'UserController@updateRole', 'Update Role', 'Update role to user', '2022-02-24 06:13:43', '2022-02-24 06:13:43'),
(17, 'PermissionController@showRole', 'Permissions to Role', 'Show Permissions attach to Roles', '2022-02-24 22:17:07', '2022-02-24 22:17:07'),
(18, 'PermissionController@attachRole', 'Attach Permission', 'Attach Permissions to User roles', '2022-02-24 22:18:32', '2022-02-24 22:18:32'),
(19, 'PageController@index', 'Pages', 'List of all custom pages', '2022-02-25 01:28:49', '2022-02-25 01:28:49'),
(20, 'PageController@create', 'Page Create', 'Create new custom page', '2022-02-25 02:21:45', '2022-02-25 02:21:45'),
(21, 'PageController@store', 'Page Store', 'Store New custom page data.', '2022-02-25 02:42:20', '2022-02-25 02:42:20'),
(22, 'PageController@edit', 'Page Edit', 'Edit Custom Pages', '2022-02-25 06:21:48', '2022-02-25 06:21:48'),
(23, 'PageController@update', 'Page Update', 'Update custom Page', '2022-02-25 06:32:53', '2022-02-25 06:32:53'),
(24, 'PageController@media', 'Media', 'Media Management', '2022-02-26 02:17:31', '2022-02-26 02:17:31'),
(25, 'DepartmentController@index', 'Departments', 'List of all Departments', '2022-03-02 00:23:57', '2022-03-02 00:23:57'),
(26, 'DepartmentController@create', 'Department Create Form', 'Create Form for New Department', '2022-03-02 00:29:51', '2022-03-02 00:29:51'),
(27, 'DepartmentController@store', 'Department store', 'New Department Store', '2022-03-02 06:14:57', '2022-03-02 06:14:57'),
(28, 'DepartmentController@edit', 'Department edit', 'Edit existing Department', '2022-03-02 23:17:57', '2022-03-02 23:17:57'),
(29, 'DepartmentController@update', 'Department update', 'Update existing Department', '2022-03-02 23:24:50', '2022-03-02 23:24:50'),
(30, 'MetaController@destroy', 'Meta Delete', 'Delete Meta Field', '2022-03-03 06:18:23', '2022-03-03 06:18:23'),
(31, 'EventController@index', 'Events', 'List of all Events', '2022-03-04 00:47:56', '2022-03-04 00:47:56'),
(32, 'EventController@create', 'Event Create Form', 'Event Create Form', '2022-03-04 00:48:31', '2022-03-04 00:48:31'),
(33, 'EventController@store', 'Event Store', 'Store new Event data', '2022-03-04 00:49:05', '2022-03-04 00:49:05'),
(34, 'EventController@edit', 'Event Edit Form', 'Event Edit Form', '2022-03-04 00:49:40', '2022-03-04 00:49:40'),
(35, 'EventController@update', 'Event Update', 'Event Update', '2022-03-04 00:50:42', '2022-03-04 00:50:42'),
(36, 'PageController@css', 'Css', 'Display Custom CSS Page', '2022-03-04 04:57:15', '2022-03-04 04:57:15'),
(37, 'MenuController@index', 'Menus', 'Menu Manager', '2022-03-06 22:16:30', '2022-03-06 22:16:30'),
(38, 'MenuController@store', 'Menu Group Store', 'New Menu Group Store', '2022-03-06 22:17:01', '2022-03-06 22:17:01'),
(39, 'MenuItemController@store', 'Menu Item Store', 'New Menu Item Store', '2022-03-06 22:17:37', '2022-03-06 22:17:37'),
(40, 'MenuItemController@update', 'Menu Item Update', 'Update Menu Item', '2022-03-06 22:18:03', '2022-03-06 22:18:03'),
(41, 'TrainingController@index', 'Training List', 'List of Trainings', '2022-03-08 01:46:21', '2022-03-08 01:46:21'),
(42, 'TrainingController@create', 'Training create form', 'Training create form', '2022-03-08 01:46:54', '2022-03-08 01:46:54'),
(43, 'TrainingController@store', 'Training store', 'New Training store', '2022-03-08 01:47:43', '2022-03-08 01:47:43'),
(44, 'TrainingController@edit', 'Training edit form', 'Training edit form', '2022-03-08 01:48:07', '2022-03-08 01:48:07'),
(45, 'TrainingController@update', 'Training update', 'Existing Training update', '2022-03-08 01:48:33', '2022-03-08 01:48:33'),
(46, 'FacultyController@index', 'Faculties', 'Faculty List', '2022-03-08 05:07:18', '2022-03-08 05:07:18'),
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
(58, 'SliderController@index', 'Sliders', 'Sliders', '2022-03-22 06:40:22', '2022-03-22 06:40:22'),
(59, 'SliderController@store', 'Slide store', 'Slide store', '2022-03-22 08:52:18', '2022-03-22 08:52:18'),
(60, 'SliderController@update', 'Slider update', 'Slider update', '2022-03-23 09:22:56', '2022-03-23 09:22:56'),
(61, 'SliderController@destroy', 'Slide destroy', 'Slide destroy', '2022-03-24 05:25:48', '2022-03-24 05:25:48'),
(62, 'PageController@general', 'General page create', 'General page create', '2022-03-24 06:00:13', '2022-03-24 06:00:13'),
(63, 'ArticalController@index', 'Articals', 'Artical List', '2022-03-29 07:07:32', '2022-03-29 07:07:32'),
(64, 'ArticalController@create', 'Artical create form', 'Artical create form', '2022-03-29 07:19:28', '2022-03-29 07:19:28'),
(65, 'ArticalController@store', 'Artical store', 'Artical store', '2022-03-30 04:50:30', '2022-03-30 04:50:30'),
(66, 'ArticalController@edit', 'Artical edit', 'Artical edit', '2022-03-30 04:51:10', '2022-03-30 04:51:10'),
(67, 'ArticalController@update', 'Artical update', 'Artical update', '2022-03-30 04:51:25', '2022-03-30 04:51:25'),
(68, 'ArticalController@destroy', 'Artical destroy', 'Artical destroy', '2022-03-30 08:58:44', '2022-03-30 08:58:44'),
(69, 'PageController@destroy', 'Page destroy', 'Page destroy', '2022-03-31 07:07:22', '2022-03-31 07:07:22'),
(70, 'MenuItemController@destroy', 'MenuItem destroy', 'MenuItem destroy', '2022-03-31 10:00:02', '2022-03-31 10:00:02'),
(71, 'MenuController@destroy', 'Menu destroy', 'Menu destroy', '2022-03-31 10:20:43', '2022-03-31 10:20:43'),
(72, 'DepartmentController@destroy', 'Department Delete', 'Department Delete', '2022-05-04 07:24:23', '2022-05-04 07:24:23'),
(73, 'WebinarController@index', 'Webinars', 'Webinar List', '2022-05-04 08:20:09', '2022-05-04 08:20:09'),
(74, 'WebinarController@create', 'Webinar Create', 'Webinar Create', '2022-05-04 08:20:58', '2022-05-04 08:20:58'),
(75, 'WebinarController@store', 'Webinar Store', 'Webinar Store', '2022-05-04 08:21:20', '2022-05-04 08:21:20'),
(76, 'WebinarController@edit', 'Webinar Edit', 'Webinar Edit', '2022-05-04 08:21:41', '2022-05-04 08:21:41'),
(77, 'WebinarController@destroy', 'Webinar Destroy', 'Webinar Destroy', '2022-05-04 08:22:08', '2022-05-04 08:22:08'),
(78, 'WebinarController@update', 'Webinar update', 'Webinar update', '2022-05-06 07:17:36', '2022-05-06 07:17:36'),
(79, 'FacultyController@destroy', 'Faculty destroy', 'Faculty destroy', '2022-05-07 03:45:13', '2022-05-07 03:45:13'),
(80, 'AnnouncementsController@index', 'Announcements', 'Announcement index', '2022-05-07 06:25:08', '2022-05-07 06:25:08'),
(81, 'AnnouncementsController@create', 'Announcements Create', 'Announcements Create', '2022-05-07 06:25:31', '2022-05-07 06:25:31'),
(82, 'AnnouncementsController@store', 'Announcements store', 'Announcements store', '2022-05-07 06:25:50', '2022-05-07 06:25:50'),
(83, 'AnnouncementsController@edit', 'Announcements edit', 'Announcements edit', '2022-05-07 06:26:09', '2022-05-07 06:26:09'),
(84, 'AnnouncementsController@update', 'Announcements update', 'Announcements update', '2022-05-07 06:26:22', '2022-05-07 06:26:22'),
(85, 'AnnouncementsController@destroy', 'Announcements destroy', 'Announcements destroy', '2022-05-07 06:26:37', '2022-05-07 06:26:37'),
(86, 'InitiativeController@index', 'Initiatives', 'Initiative index', '2022-05-07 10:00:06', '2022-05-07 10:00:06'),
(87, 'InitiativeController@create', 'Initiative create', 'Initiative create', '2022-05-07 10:00:27', '2022-05-07 10:00:27'),
(88, 'InitiativeController@store', 'Initiative store', 'Initiative store', '2022-05-07 10:00:43', '2022-05-07 10:00:43'),
(89, 'InitiativeController@update', 'Initiative update', 'InitiativeController@update', '2022-05-07 10:00:57', '2022-05-07 10:00:57'),
(90, 'InitiativeController@edit', 'Initiative edit', 'Initiative edit', '2022-05-07 10:01:11', '2022-05-07 10:01:11'),
(91, 'InitiativeController@destroy', 'Initiative destroy', 'Initiative destroy', '2022-05-07 10:01:27', '2022-05-07 10:01:27'),
(92, 'UserController@destroy', 'User destroy', 'User destroy', '2022-05-08 08:02:17', '2022-05-08 08:02:17'),
(93, 'MessageController@destroy', 'Message destroy', 'Message destroy', '2022-05-08 08:19:54', '2022-05-08 08:19:54'),
(94, 'PartnerController@index', 'Partners', 'Partner index', '2022-05-08 08:52:55', '2022-05-08 08:52:55'),
(95, 'PartnerController@create', 'Partner create', 'Partner create', '2022-05-08 09:06:14', '2022-05-08 09:06:14'),
(96, 'PartnerController@store', 'Partner store', 'Partner store', '2022-05-08 09:06:35', '2022-05-08 09:06:35'),
(97, 'PartnerController@update', 'Partner update', 'Partner update', '2022-05-08 09:06:53', '2022-05-08 09:06:53'),
(98, 'PartnerController@edit', 'Partner edit', 'Partner edit', '2022-05-08 09:07:07', '2022-05-08 09:07:07'),
(99, 'PartnerController@destroy', 'Partner destroy', 'Partner destroy', '2022-05-08 09:07:23', '2022-05-08 09:07:23'),
(100, 'FeedbackController@index', 'Feedbacks', 'Feedbacks', '2022-05-08 10:21:03', '2022-05-08 10:21:03'),
(101, 'FeedbackController@show', 'Feedback show', 'Feedback show', '2022-05-08 11:09:54', '2022-05-08 11:09:54'),
(102, 'InfrastructureController@index', 'Infrastructures', 'Infrastructures', '2022-05-10 04:14:05', '2022-05-10 04:14:05'),
(103, 'InfrastructureController@create', 'Infrastructure create', 'Infrastructure create', '2022-05-10 04:16:23', '2022-05-10 04:16:23'),
(104, 'InfrastructureController@edit', 'Infrastructure edit', 'Infrastructure edit', '2022-05-10 04:16:39', '2022-05-10 04:16:39'),
(105, 'InfrastructureController@update', 'Infrastructure update', 'Infrastructure update', '2022-05-10 04:16:53', '2022-05-10 04:16:53'),
(106, 'InfrastructureController@store', 'Infrastructure store', 'Infrastructure store', '2022-05-10 04:17:18', '2022-05-10 04:17:18'),
(107, 'InfrastructureController@destroy', 'Infrastructure destroy', 'Infrastructure destroy', '2022-05-10 04:17:34', '2022-05-10 04:17:34'),
(108, 'RedirectionController@index', 'Redirection', 'Redirection', '2022-05-12 05:09:11', '2022-05-12 05:09:11'),
(109, 'RedirectionController@store', 'Redirection store', 'Redirection store', '2022-05-12 05:25:27', '2022-05-12 05:25:27'),
(110, 'RedirectionController@destroy', 'Redirection destroy', 'Redirection destroy', '2022-05-12 05:25:54', '2022-05-12 05:25:54');

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
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(3, 2),
(19, 2),
(20, 2),
(21, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(3, 4),
(63, 5);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redirections`
--

CREATE TABLE `redirections` (
  `id` bigint UNSIGNED NOT NULL,
  `from_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `role_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(1, 2, 'App\\Models\\User'),
(2, 1, 'App\\Models\\User'),
(2, 3, 'App\\Models\\User'),
(4, 4, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'logo-english', 'http://localhost:8000/storage/photos/1/logo-english.png', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(2, 'logo-urdu', 'http://localhost:8000/storage/photos/1/NCERT_300px.svg.png', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(3, 'admin-email', 'dceta.ncert@nic.in', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(4, 'facebook', 'facebook.com', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(5, 'twitter', 'twitter.com', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(6, 'instagram', 'instagram.com', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(7, 'youtube', 'youtube.com', '2022-03-10 05:39:03', '2022-03-10 05:39:03'),
(8, 'linkedin', 'linkedin.com', '2022-03-10 05:39:04', '2022-03-10 05:39:04'),
(9, 'logo-hindi', 'http://localhost:8000/storage/photos/1/1NCERT.jpg', NULL, NULL),
(10, 'contact-email', 'jdciet.ncert.nic.in <br> dceta.ncert@nic.in', NULL, NULL),
(11, 'contact-number1', '+91 8800440559', NULL, NULL),
(12, 'contact-number2', '+91 8448440632', NULL, NULL),
(13, 'tollfree', '1800 111 265, 1800 112 199', NULL, NULL),
(14, 'address', 'Join Director <br>\r\nCentral Institute Of Educational Technology(CIET)<br>\r\nNational Council of Educational Research and Training (NCERT),<br>\r\nSri Aurobindo Marg, New Delhi, 110016', NULL, NULL),
(15, 'popup-image', 'http://localhost:8000/storage/photos/1/Bhasha Sangam-Social Media Banner (1).jpg', NULL, NULL),
(16, 'popup-url', 'https://ciet.nic.in/contact-ministerial.php?&ln=en', NULL, NULL),
(17, 'popup-status', '0', NULL, NULL),
(18, 'contact-fax', '+91 11 2686 4141', NULL, NULL),
(19, 'custom_css', 'N;', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int DEFAULT NULL,
  `default` int NOT NULL,
  `status` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `alt`, `image`, `url`, `lang`, `order`, `default`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'CIET Initiatives', 'CIET Initiatives Image', '/storage/photos/1/ncert-collage.png', '#', 'en', NULL, 1, 1, 1, '2022-05-04 07:16:04', '2022-05-09 11:22:11'),
(4, 'DIKSHA Banner', 'DIKSHA Banner Image', 'http://localhost:8000/storage/photos/1/Diksha_Web_Banner.jpg', '#', 'en', 2, 0, 1, 1, '2022-05-04 07:18:01', '2022-05-04 07:18:01'),
(5, 'Basha Sangam', 'Basha Sangam Banner Image', 'http://localhost:8000/storage/photos/1/BhashaSangambanner.jpg', '#', 'en', NULL, 0, 1, 1, '2022-05-04 07:19:32', '2022-05-04 07:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int NOT NULL,
  `key_word` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ramkrishna Pal', 'ramkrishna.ncert@gmail.com', '2022-02-23 00:53:13', 'Admin', '$2a$12$bayZJpM48D8a8OZAPam5oeKxy6UyDUfJW8wbrHudXB.2zbwpg8vCC', 'YP0RFilRwOI5OwvEker4XoFJhHDCLnaB1RZ697mco3iAfmRcLWEMw6Yipjpe', '2022-02-23 00:53:13', '2022-02-23 00:53:13'),
(2, 'Rameez Alam', 'rameezalamciet@gmail.com', '2022-02-23 00:53:13', 'Admin', '$2a$12$bayZJpM48D8a8OZAPam5oeKxy6UyDUfJW8wbrHudXB.2zbwpg8vCC', 'HseS8SftJd', '2022-02-23 00:53:13', '2022-02-25 02:45:18'),
(3, 'Farman Ali', 'farman.ciet@gmail.com', NULL, 'Editor', '$2y$10$ryGCd3FarH.5CgzbRCImFe3DsMGxtnyM3.n9dyI4c8.fCA8Xl1DRe', NULL, '2022-02-24 03:07:50', '2022-03-14 11:50:53'),
(4, 'Saurabh Singh', 'saurabhsingh.ciet@gmail.com', NULL, 'Event Editor', '$2y$10$cv5Rh8gwXrHzZBJrbjm6/uQrdQm9HmMNcaWy6whDBXspKJxBwo5LC', NULL, '2022-02-24 23:30:29', '2022-02-24 23:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `date`, `url`, `ip`, `created_at`, `updated_at`) VALUES
(3, '2022-05-10 00:00:00', '/', '127.0.0.1', NULL, NULL),
(4, '2022-05-10 00:00:00', '/about', '127.0.0.1', NULL, NULL),
(5, '2022-05-10 00:00:00', '/webinar', '127.0.0.1', NULL, NULL),
(6, '2022-05-10 00:00:00', '/about?lang=hi', '127.0.0.1', NULL, NULL),
(7, '2022-05-10 00:00:00', '/screen-reader-access', '127.0.0.1', NULL, NULL),
(8, '2022-05-10 00:00:00', '/people', '127.0.0.1', NULL, NULL),
(9, '2022-05-10 00:00:00', '/initiatives', '127.0.0.1', NULL, NULL),
(10, '2022-05-10 00:00:00', '/contact', '127.0.0.1', NULL, NULL),
(11, '2022-05-10 00:00:00', '/announcement', '127.0.0.1', NULL, NULL),
(12, '2022-05-11 00:00:00', '/', '127.0.0.1', NULL, NULL),
(13, '2022-05-11 00:00:00', '/department/dict', '127.0.0.1', NULL, NULL),
(14, '2022-05-12 00:00:00', '/initiative/2', '127.0.0.1', NULL, NULL),
(15, '2022-05-12 00:00:00', '/initiative/epathshala', '127.0.0.1', NULL, NULL),
(16, '2022-05-12 00:00:00', '/mewsletter', '127.0.0.1', NULL, NULL),
(17, '2022-05-12 00:00:00', '/newsletter', '127.0.0.1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `webinars`
--

CREATE TABLE `webinars` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webinars`
--

INSERT INTO `webinars` (`id`, `title`, `category`, `res_person`, `ppt`, `video`, `lang`, `web_date`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Digital Initiatives in Education by States/ UTs and Autonomous Organisations - Meghalaya', 'ict-tool', 'Shri. Ashim Dey, Assistant Teacher, Shillong Jail Road Boy\'s Higher Secondary School, Meghalaya <hr>\r\nSmt. Alienor Michelle Lyngwa, Assistant Lecturer, Mairang Presbyterian Higher Secondary School, Meghalaya', '/storage/files/1/53286200122-report.pdf', 'https://hello.com', 'en', '2022-05-05', 1, 1, '2022-05-06 07:12:48', '2022-05-09 11:17:46'),
(2, 'Journey of National ICT Awardee Teacher', 'ict-tool', 'Mr. Santosh Kumar Bisen, PGT (Biology), Jawahar Navodaya Vidyalaya Kabirdham, Chhattisgarh', 'http://localhost:8000/storage/files/1/53286200122-report.pdf', 'https://hello.com', 'en', '2022-05-08', 1, 1, '2022-05-06 07:16:25', '2022-05-06 07:16:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `infrastructures`
--
ALTER TABLE `infrastructures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `initiatives`
--
ALTER TABLE `initiatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
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
-- Indexes for table `partners`
--
ALTER TABLE `partners`
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
-- Indexes for table `redirections`
--
ALTER TABLE `redirections`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webinars`
--
ALTER TABLE `webinars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articals`
--
ALTER TABLE `articals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `infrastructures`
--
ALTER TABLE `infrastructures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `initiatives`
--
ALTER TABLE `initiatives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redirections`
--
ALTER TABLE `redirections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `webinars`
--
ALTER TABLE `webinars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
