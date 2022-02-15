-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 05:39 AM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_name`, `contact_mobile`, `contact_email`, `contact_msg`) VALUES
(5, 'sakib', '01629914988', 'sakib@gamil.com', 'new msg'),
(6, 'sakib', '01629914988', 'sakib@gamil.com', 'new msg'),
(7, 'sakib', '01629914988', 'sakib@gamil.com', 'new msg'),
(8, 'sakib', '01629914988', 'sakib@gamil.com', 'new msg');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalenroll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalclass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_des`, `course_fee`, `course_totalenroll`, `course_totalclass`, `course_link`, `course_img`) VALUES
(1, 'Laravel', 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony.', 'Course fee: 1000/-', 'Total enroll: 5000', 'Total Class: 300', 'https://laravel.com/', 'images/laravel.jpg'),
(2, 'php', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group', 'Course fee: 1050/-', 'Total enroll: 40', 'Total class: 150', 'https://www.php.net/', 'images/php.jpg'),
(3, 'JS', 'JavaScript, often abbreviated JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. Over 97% of websites use JavaScript on the client side for web page behavior, often incorporating third-party l', 'Course fee: 1500/-', 'Total enroll: 100', 'Total Class: 150', 'https://www.w3schools.com/js/', 'images/js.jpg'),
(5, 'CSS', 'Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language such as HTML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.', 'Course fee: 600/-', 'Total enroll: 500', 'Total Class: 100', 'https://www.w3schools.com/css/', 'images/css.jpg'),
(6, 'HTML', 'The HyperText Markup Language, or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.', 'Course fee: 600/-', 'Total enroll: 400', 'Total Class: 50', 'https://www.w3schools.com/html/', 'images/html.jpg'),
(16, 'Laravel', 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony.', 'Course fee: 1000/-', 'Total enroll: 50', 'Total Class: 300', 'https://laravel.com/', 'images/laravel.jpg'),
(17, 'php', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group', 'Course fee: 1000/-', 'Total enroll: 40', 'Total class: 150', 'https://www.php.net/', 'images/php.jpg'),
(20, 'CSS', 'Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language such as HTML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.', 'Course fee: 600/-', 'Total enroll: 500', 'Total Class: 100', 'https://www.w3schools.com/css/', 'images/css.jpg'),
(21, 'HTML', 'The HyperText Markup Language, or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.', 'Course fee: 600/-', 'Total enroll: 400', 'Total Class: 50', 'https://www.w3schools.com/html/', 'images/html.jpg'),
(22, 'JS', 'JavaScript, often abbreviated JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. Over 97% of websites use JavaScript on the client side for web page behavior, often incorporating third-party l', 'Course fee: 1500/-', 'Total enroll: 130', 'Total Class: 150', 'https://www.w3schools.com/js/', 'images/js.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `location`) VALUES
(1, 'Http://127.0.0.1:4000/storage/y3nxlTPcdzs2JWn41Zmhal79g8vVQxrZiLkz4hpU.png'),
(2, 'Http://127.0.0.1:4000/storage/bg9SjZETfpk11TRZjBY8HpUPwd1WO61Nw5ygWqlM.jpg'),
(3, 'Http://127.0.0.1:4000/storage/KU6dTjjlf9Y4g8WXOnUdFmDPlVgrFpoAZEEWDJEK.png'),
(4, 'Http://127.0.0.1:4000/storage/2d43SgDXGnGK1JZvnaMfoDx2VFAuns9zG6K1FKZ6.png'),
(5, 'Http://127.0.0.1:4000/storage/WKmJGVTESbm6wt4P2IpjDHZVimBwcH2TnxZoAdze.jpg'),
(6, 'Http://127.0.0.1:4000/storage/lyK3PCp14f2Z7uUzi1t5lJ7AijJn2o0mqRDtpEtF.jpg'),
(7, 'Http://127.0.0.1:4000/storage/5vHJHYu96xToXM7fPVZM3XtmTInMWQc6HePQHiRd.png'),
(8, 'Http://127.0.0.1:4000/storage/jcCUl5OO2blXpBw4YA4BqFnsa3KMOCflj3OWBQL4.jpg');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_02_03_190640_visitor_table', 1),
(4, '2022_02_04_011948_services_table', 2),
(5, '2022_02_07_223029_courses_table', 3),
(6, '2022_02_09_040409_projects_table', 4),
(7, '2022_02_10_065822_contact_table', 5),
(8, '2022_02_10_175920_review_table', 6),
(9, '2022_02_11_055015_adminTable', 7),
(10, '2022_02_12_011906_gallery', 8);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_des`, `project_link`, `project_img`) VALUES
(1, 'TMS1', 'Transport Management System', 'https://www.google.com/', 'images/poject.jpg'),
(2, 'TMS2', 'personal portfolio', 'https://www.google.com/', 'images/poject.jpg'),
(6, 'TMS4', 'Transport Management System', 'https://www.google.com/', 'images/poject.jpg'),
(9, 'TMS7', 'Transport Management System', 'https://www.google.com/', 'images/poject.jpg'),
(11, 'portfolio11', 'personal portfolio', 'https://www.google.com/', 'images/poject.jpg'),
(14, 'portfolio2', 'personal portfolio', 'www.google.com', 'images/poject.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `des`, `img`) VALUES
(1, 'Bill Gates1', 'William Henry Gates III is an American business magnate, software developer, investor, author, and philanthropist. He is a co-founder of Microsoft, along with his late childhood friend Paul Allen.', 'images/bill.jpg'),
(2, 'Bill Gates2', 'William Henry Gates III is an American business magnate, software developer, investor, author, and philanthropist. He is a co-founder of Microsoft, along with his late childhood friend Paul Allen.', 'images/bill.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_des`, `service_img`) VALUES
(72, 'ICT Courses DB11', 'Web Application Development', 'images/knowledge.svg'),
(73, 'ICT Courses DB12', 'Web Application Development', 'images/knowledge.svg'),
(74, 'ICT Courses DB13', 'Web Application Development', 'images/knowledge.svg'),
(102, 'ICT Courses DB13', 'Web Application Development', 'images/knowledge.svg');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip_address`, `visit_time`) VALUES
(1, '127.0.0.1', '2022-02-04 06:18:26am'),
(2, '127.0.0.1', '2022-02-04 06:18:29am'),
(3, '127.0.0.1', '2022-02-04 06:18:29am'),
(4, '127.0.0.1', '2022-02-04 06:18:29am'),
(5, '127.0.0.1', '2022-02-04 06:18:30am'),
(6, '127.0.0.1', '2022-02-04 06:18:30am'),
(7, '127.0.0.1', '2022-02-04 06:18:31am'),
(8, '127.0.0.1', '2022-02-04 06:18:31am'),
(9, '127.0.0.1', '2022-02-04 06:18:31am'),
(10, '127.0.0.1', '2022-02-04 06:18:32am'),
(11, '127.0.0.1', '2022-02-04 06:20:13am'),
(12, '127.0.0.1', '2022-02-04 06:20:38am'),
(13, '127.0.0.1', '2022-02-04 06:20:39am'),
(14, '127.0.0.1', '2022-02-04 06:25:58am'),
(15, '127.0.0.1', '2022-02-04 06:38:18am'),
(16, '127.0.0.1', '2022-02-04 06:39:04am'),
(17, '127.0.0.1', '2022-02-04 06:44:02am'),
(18, '127.0.0.1', '2022-02-04 06:44:27am'),
(19, '127.0.0.1', '2022-02-04 06:53:49am'),
(20, '127.0.0.1', '2022-02-04 06:54:06am'),
(21, '127.0.0.1', '2022-02-04 06:54:35am'),
(22, '127.0.0.1', '2022-02-04 06:57:08am'),
(23, '127.0.0.1', '2022-02-04 06:57:19am'),
(24, '127.0.0.1', '2022-02-04 07:01:30am'),
(25, '127.0.0.1', '2022-02-04 07:01:43am'),
(26, '127.0.0.1', '2022-02-04 07:01:54am'),
(27, '127.0.0.1', '2022-02-04 07:04:25am'),
(28, '127.0.0.1', '2022-02-04 07:04:40am'),
(29, '127.0.0.1', '2022-02-04 07:05:12am'),
(30, '127.0.0.1', '2022-02-04 07:05:41am'),
(31, '127.0.0.1', '2022-02-04 07:10:01am'),
(32, '127.0.0.1', '2022-02-04 07:13:41am'),
(33, '127.0.0.1', '2022-02-04 07:15:46am'),
(34, '127.0.0.1', '2022-02-04 07:27:59am'),
(35, '127.0.0.1', '2022-02-04 07:31:32am'),
(36, '127.0.0.1', '2022-02-04 07:42:28am'),
(37, '127.0.0.1', '2022-02-04 07:42:50am'),
(38, '127.0.0.1', '2022-02-04 07:43:26am'),
(39, '127.0.0.1', '2022-02-04 07:47:07am'),
(40, '127.0.0.1', '2022-02-04 07:50:24am'),
(41, '127.0.0.1', '2022-02-04 07:59:55am'),
(42, '127.0.0.1', '2022-02-04 08:00:04am'),
(43, '127.0.0.1', '2022-02-05 12:05:06am'),
(44, '127.0.0.1', '2022-02-05 12:05:29am'),
(45, '127.0.0.1', '2022-02-05 03:22:48am'),
(46, '127.0.0.1', '2022-02-05 09:14:43pm'),
(47, '127.0.0.1', '2022-02-05 09:35:42pm'),
(48, '127.0.0.1', '2022-02-06 02:49:14am'),
(49, '127.0.0.1', '2022-02-06 03:11:37am'),
(50, '127.0.0.1', '2022-02-06 03:12:13am'),
(51, '127.0.0.1', '2022-02-06 01:26:10pm'),
(52, '127.0.0.1', '2022-02-06 01:30:56pm'),
(53, '127.0.0.1', '2022-02-06 03:04:20pm'),
(54, '127.0.0.1', '2022-02-06 03:31:07pm'),
(55, '127.0.0.1', '2022-02-06 04:27:18pm'),
(56, '127.0.0.1', '2022-02-06 09:19:03pm'),
(57, '127.0.0.1', '2022-02-06 09:19:19pm'),
(58, '127.0.0.1', '2022-02-06 10:39:15pm'),
(59, '127.0.0.1', '2022-02-06 11:18:11pm'),
(60, '127.0.0.1', '2022-02-07 03:46:50am'),
(61, '127.0.0.1', '2022-02-07 07:41:07am'),
(62, '127.0.0.1', '2022-02-08 02:23:50am'),
(63, '127.0.0.1', '2022-02-08 02:30:12am'),
(64, '127.0.0.1', '2022-02-08 02:30:17am'),
(65, '127.0.0.1', '2022-02-08 04:26:54am'),
(66, '127.0.0.1', '2022-02-08 04:27:11am'),
(67, '127.0.0.1', '2022-02-08 04:41:25am'),
(68, '127.0.0.1', '2022-02-08 04:58:43am'),
(69, '127.0.0.1', '2022-02-08 05:16:45am'),
(70, '127.0.0.1', '2022-02-08 05:20:07am'),
(71, '127.0.0.1', '2022-02-08 05:21:21am'),
(72, '127.0.0.1', '2022-02-08 05:22:33am'),
(73, '127.0.0.1', '2022-02-08 05:25:24am'),
(74, '127.0.0.1', '2022-02-08 05:27:12am'),
(75, '127.0.0.1', '2022-02-08 05:31:31am'),
(76, '127.0.0.1', '2022-02-08 05:32:12am'),
(77, '127.0.0.1', '2022-02-08 05:37:16am'),
(78, '127.0.0.1', '2022-02-08 05:37:36am'),
(79, '127.0.0.1', '2022-02-08 05:40:39am'),
(80, '127.0.0.1', '2022-02-08 05:44:33am'),
(81, '127.0.0.1', '2022-02-08 05:47:42am'),
(82, '127.0.0.1', '2022-02-08 05:48:10am'),
(83, '127.0.0.1', '2022-02-08 05:48:30am'),
(84, '127.0.0.1', '2022-02-08 05:50:27am'),
(85, '127.0.0.1', '2022-02-08 05:51:17am'),
(86, '127.0.0.1', '2022-02-08 05:53:56am'),
(87, '127.0.0.1', '2022-02-08 05:54:29am'),
(88, '127.0.0.1', '2022-02-08 08:58:41am'),
(89, '127.0.0.1', '2022-02-08 11:03:15pm'),
(90, '127.0.0.1', '2022-02-09 01:07:09am'),
(91, '127.0.0.1', '2022-02-09 01:07:53am'),
(92, '127.0.0.1', '2022-02-09 01:11:41am'),
(93, '127.0.0.1', '2022-02-09 01:19:45am'),
(94, '127.0.0.1', '2022-02-09 01:21:26am'),
(95, '127.0.0.1', '2022-02-09 02:45:59am'),
(96, '127.0.0.1', '2022-02-09 02:46:38am'),
(97, '127.0.0.1', '2022-02-09 02:48:07am'),
(98, '127.0.0.1', '2022-02-09 02:49:03am'),
(99, '127.0.0.1', '2022-02-09 03:56:36am'),
(100, '127.0.0.1', '2022-02-09 04:28:16am'),
(101, '127.0.0.1', '2022-02-09 04:41:38am'),
(102, '127.0.0.1', '2022-02-09 05:28:29am'),
(103, '127.0.0.1', '2022-02-09 05:40:41am'),
(104, '127.0.0.1', '2022-02-09 05:50:58am'),
(105, '127.0.0.1', '2022-02-09 09:47:27am'),
(106, '127.0.0.1', '2022-02-09 09:49:06am'),
(107, '127.0.0.1', '2022-02-09 09:49:10am'),
(108, '127.0.0.1', '2022-02-09 09:49:22am'),
(109, '127.0.0.1', '2022-02-09 09:51:21am'),
(110, '127.0.0.1', '2022-02-09 09:51:57am'),
(111, '127.0.0.1', '2022-02-09 09:52:53am'),
(112, '127.0.0.1', '2022-02-09 09:56:31am'),
(113, '127.0.0.1', '2022-02-09 09:58:01am'),
(114, '127.0.0.1', '2022-02-09 09:59:12am'),
(115, '127.0.0.1', '2022-02-09 09:59:41am'),
(116, '127.0.0.1', '2022-02-09 10:00:38am'),
(117, '127.0.0.1', '2022-02-09 10:02:05am'),
(118, '127.0.0.1', '2022-02-09 10:02:40am'),
(119, '127.0.0.1', '2022-02-09 10:03:09am'),
(120, '127.0.0.1', '2022-02-09 10:28:38am'),
(121, '127.0.0.1', '2022-02-09 10:29:36am'),
(122, '127.0.0.1', '2022-02-09 10:31:08am'),
(123, '127.0.0.1', '2022-02-09 10:31:47am'),
(124, '127.0.0.1', '2022-02-09 10:32:16am'),
(125, '127.0.0.1', '2022-02-09 10:37:24am'),
(126, '127.0.0.1', '2022-02-09 10:38:14am'),
(127, '127.0.0.1', '2022-02-09 10:40:35am'),
(128, '127.0.0.1', '2022-02-09 10:41:24am'),
(129, '127.0.0.1', '2022-02-09 10:41:57am'),
(130, '127.0.0.1', '2022-02-09 10:42:59am'),
(131, '127.0.0.1', '2022-02-09 10:43:31am'),
(132, '127.0.0.1', '2022-02-09 10:43:47am'),
(133, '127.0.0.1', '2022-02-09 10:44:24am'),
(134, '127.0.0.1', '2022-02-09 10:45:00am'),
(135, '127.0.0.1', '2022-02-09 11:20:47pm'),
(136, '127.0.0.1', '2022-02-10 01:16:45am'),
(137, '127.0.0.1', '2022-02-10 01:17:37am'),
(138, '127.0.0.1', '2022-02-10 01:17:45am'),
(139, '127.0.0.1', '2022-02-10 01:18:43am'),
(140, '127.0.0.1', '2022-02-10 01:19:00am'),
(141, '127.0.0.1', '2022-02-10 05:12:34am'),
(142, '127.0.0.1', '2022-02-10 05:18:47am'),
(143, '127.0.0.1', '2022-02-10 11:59:48am'),
(144, '127.0.0.1', '2022-02-10 12:04:31pm'),
(145, '127.0.0.1', '2022-02-10 12:20:37pm'),
(146, '127.0.0.1', '2022-02-10 12:26:31pm'),
(147, '127.0.0.1', '2022-02-10 12:35:32pm'),
(148, '127.0.0.1', '2022-02-10 12:36:24pm'),
(149, '127.0.0.1', '2022-02-10 12:36:32pm'),
(150, '127.0.0.1', '2022-02-10 12:36:49pm'),
(151, '127.0.0.1', '2022-02-10 12:37:20pm'),
(152, '127.0.0.1', '2022-02-10 12:37:29pm'),
(153, '127.0.0.1', '2022-02-10 12:38:00pm'),
(154, '127.0.0.1', '2022-02-10 12:47:17pm'),
(155, '127.0.0.1', '2022-02-10 12:47:26pm'),
(156, '127.0.0.1', '2022-02-10 12:47:50pm'),
(157, '127.0.0.1', '2022-02-10 01:35:43pm'),
(158, '127.0.0.1', '2022-02-10 01:37:07pm'),
(159, '127.0.0.1', '2022-02-10 01:42:55pm'),
(160, '127.0.0.1', '2022-02-10 01:45:03pm'),
(161, '127.0.0.1', '2022-02-10 01:46:30pm'),
(162, '127.0.0.1', '2022-02-10 01:53:03pm'),
(163, '127.0.0.1', '2022-02-10 01:55:54pm'),
(164, '127.0.0.1', '2022-02-10 02:01:43pm'),
(165, '127.0.0.1', '2022-02-10 10:45:24pm'),
(166, '127.0.0.1', '2022-02-10 11:10:56pm'),
(167, '127.0.0.1', '2022-02-10 11:11:01pm'),
(168, '127.0.0.1', '2022-02-10 11:56:05pm'),
(169, '127.0.0.1', '2022-02-11 12:07:04am'),
(170, '127.0.0.1', '2022-02-11 12:15:24am'),
(171, '127.0.0.1', '2022-02-11 12:17:32am'),
(172, '127.0.0.1', '2022-02-11 12:22:20am'),
(173, '127.0.0.1', '2022-02-11 12:23:20am'),
(174, '127.0.0.1', '2022-02-11 02:22:54am'),
(175, '127.0.0.1', '2022-02-11 05:04:48am'),
(176, '127.0.0.1', '2022-02-11 05:04:59am'),
(177, '127.0.0.1', '2022-02-11 05:40:52am'),
(178, '127.0.0.1', '2022-02-11 05:42:57am'),
(179, '127.0.0.1', '2022-02-11 05:43:13am'),
(180, '127.0.0.1', '2022-02-11 05:47:14am'),
(181, '127.0.0.1', '2022-02-11 05:47:43am'),
(182, '127.0.0.1', '2022-02-11 05:48:09am'),
(183, '127.0.0.1', '2022-02-11 05:53:05am'),
(184, '127.0.0.1', '2022-02-11 05:53:16am'),
(185, '127.0.0.1', '2022-02-11 05:53:19am'),
(186, '127.0.0.1', '2022-02-11 05:54:04am'),
(187, '127.0.0.1', '2022-02-11 05:54:45am'),
(188, '127.0.0.1', '2022-02-11 05:54:50am'),
(189, '127.0.0.1', '2022-02-11 05:56:20am'),
(190, '127.0.0.1', '2022-02-11 06:08:42am'),
(191, '127.0.0.1', '2022-02-11 06:10:06am'),
(192, '127.0.0.1', '2022-02-11 06:10:28am'),
(193, '127.0.0.1', '2022-02-11 06:14:17am'),
(194, '127.0.0.1', '2022-02-11 06:14:23am'),
(195, '127.0.0.1', '2022-02-11 06:15:56am'),
(196, '127.0.0.1', '2022-02-11 06:16:11am'),
(197, '127.0.0.1', '2022-02-11 06:17:46am'),
(198, '127.0.0.1', '2022-02-11 06:17:48am'),
(199, '127.0.0.1', '2022-02-11 06:17:50am'),
(200, '127.0.0.1', '2022-02-11 06:17:51am'),
(201, '127.0.0.1', '2022-02-11 06:17:55am'),
(202, '127.0.0.1', '2022-02-11 07:22:57am'),
(203, '127.0.0.1', '2022-02-11 07:30:55am'),
(204, '127.0.0.1', '2022-02-11 07:32:08am'),
(205, '127.0.0.1', '2022-02-11 07:32:18am'),
(206, '127.0.0.1', '2022-02-11 07:40:55am'),
(207, '127.0.0.1', '2022-02-11 08:12:30am'),
(208, '127.0.0.1', '2022-02-11 08:12:56am'),
(209, '127.0.0.1', '2022-02-11 08:13:02am'),
(210, '127.0.0.1', '2022-02-11 08:15:39am'),
(211, '127.0.0.1', '2022-02-11 08:15:40am'),
(212, '127.0.0.1', '2022-02-11 08:15:42am'),
(213, '127.0.0.1', '2022-02-11 08:16:26am'),
(214, '127.0.0.1', '2022-02-11 08:19:06am'),
(215, '127.0.0.1', '2022-02-11 08:22:05am'),
(216, '127.0.0.1', '2022-02-11 08:22:58am'),
(217, '127.0.0.1', '2022-02-11 08:23:19am'),
(218, '127.0.0.1', '2022-02-11 08:24:35am'),
(219, '127.0.0.1', '2022-02-11 08:24:41am'),
(220, '127.0.0.1', '2022-02-11 08:24:45am'),
(221, '127.0.0.1', '2022-02-11 08:24:56am'),
(222, '127.0.0.1', '2022-02-11 08:30:14am'),
(223, '127.0.0.1', '2022-02-13 12:59:00am'),
(224, '127.0.0.1', '2022-02-13 01:00:00am'),
(225, '127.0.0.1', '2022-02-13 01:01:23am'),
(226, '127.0.0.1', '2022-02-13 01:02:53am'),
(227, '127.0.0.1', '2022-02-13 04:41:21am'),
(228, '127.0.0.1', '2022-02-13 05:03:17am'),
(229, '127.0.0.1', '2022-02-13 05:03:19am'),
(230, '127.0.0.1', '2022-02-13 05:03:30am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
