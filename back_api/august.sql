-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 01:29 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `august`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` enum('0','1','13') DEFAULT '1',
  `description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quote` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `title_ge` varchar(255) NOT NULL,
  `description_ge` text NOT NULL,
  `metakeyword_ge` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `status`, `description`, `created`, `quote`, `keywords`, `title_ge`, `description_ge`, `metakeyword_ge`) VALUES
(1, 'ABOUT US', '1', 'The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC, baking was introduced as an occupation and respectable profession for Romans.\r\nThe art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC, baking was introduced as an occupation and respectable profession for Romans.', '2021-03-02 08:06:12', 'Baked goods have been around for thousands of years', 'baked, goods, have, been, around, for, thousand, of years,', '', 'The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC, baking was introduced as an occupation and respectable profession for Romans. The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC, baking was introduced as an occupation and respectable profession for Romans.', '');

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
('admin', '1', 1612871442),
('manager', '2', 1612871415),
('user', '3', 1612871408),
('user', '4', 1612878055);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/admin/*', 2, NULL, NULL, NULL, 1612869225, 1612869225),
('/api/*', 2, NULL, NULL, NULL, 1613389017, 1613389017),
('/gii/*', 2, NULL, NULL, NULL, 1612940007, 1612940007),
('/post/*', 2, NULL, NULL, NULL, 1612869251, 1612869251),
('/rbac/*', 2, NULL, NULL, NULL, 1612869263, 1612869263),
('admin', 1, 'mainAdmin', NULL, NULL, 1612871359, 1612871359),
('adminAccess', 2, 'Default admin access', NULL, NULL, 1612869406, 1612871166),
('manager', 1, 'Content manager \r\nCan create/edit/delete posts', NULL, NULL, 1612871331, 1612871331),
('postAccsess', 2, 'Can read posts', NULL, NULL, 1612869322, 1612871148),
('user', 1, 'default registeres user (can read posts)', NULL, NULL, 1612871271, 1612871271),
('userAccess', 2, 'permission RBAC module \r\nOnley for admins', NULL, NULL, 1612869473, 1612871200);

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
('admin', 'manager'),
('admin', 'userAccess'),
('adminAccess', '/admin/*'),
('adminAccess', '/api/*'),
('adminAccess', '/gii/*'),
('manager', 'adminAccess'),
('manager', 'user'),
('postAccsess', '/api/*'),
('postAccsess', '/post/*'),
('user', 'postAccsess'),
('userAccess', '/rbac/*');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `name_ge` varchar(255) NOT NULL,
  `mine` tinyint(1) NOT NULL,
  `visible` enum('0','1') NOT NULL DEFAULT '1',
  `comm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `name_ge`, `mine`, `visible`, `comm`) VALUES
(56, 'Breads', 'პური', 1, '1', 'საას'),
(57, 'Pastry', 'საკონდიტრო ნაწარმი', 1, '1', 'სდ'),
(58, 'Food', 'Food', 1, '1', 'ასდდ'),
(59, 'Desserts', 'დესერტები', 1, '1', 'სადფსდფ'),
(60, 'Drinks', 'სასმელები', 1, '1', 'ასდ'),
(61, 'Our Production', 'ჩვენი პროდუქცია', 1, '1', 'დსსდ'),
(62, 'Benjy’s', 'Benjy’s', 1, '1', 'ასდ');

-- --------------------------------------------------------

--
-- Table structure for table `contact_title`
--

CREATE TABLE `contact_title` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` enum('0','1','13') DEFAULT '1',
  `description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quote` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `title_ge` varchar(255) NOT NULL,
  `description_ge` text NOT NULL,
  `keyword_ge` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_title`
--

INSERT INTO `contact_title` (`id`, `title`, `status`, `description`, `created`, `quote`, `keywords`, `title_ge`, `description_ge`, `keyword_ge`) VALUES
(2, 'Contact Us', '1', '<ul class=\"contact-list\">\r\n<li>E-mail:&nbsp;<a href=\"http://august.webertela.online/Info@augustbakery.com\">Info@augustbakery.com</a></li>\r\n<li>Phone:&nbsp;<a href=\"http://august.webertela.online/contact\">032 202 03 04</a></li>\r\n</ul>', '2021-02-28 13:21:53', '', 'Contact Us', 'დაგვიკავშირდით', '<ul class=\"contact-list\">\r\n<li>E-mail:&nbsp;<a href=\"http://august.webertela.online/Info@augustbakery.com\">Info@augustbakery.com</a></li>\r\n<li>Phone:&nbsp;<a href=\"http://august.webertela.online/contact\">032 202 03 04</a></li>\r\n</ul>', 'დაგვიკავშირდით'),
(3, 'OUR SOCIALS', '1', '<p>OUR SOCIALS</p>', '2021-02-28 13:23:23', '', '', 'ჩვენი სოციალური ბლა ბლა', '<p>ჩვენი სოციალური ბლა ბლა</p>', ''),
(4, 'OUR LOCATIONS', '1', '', '2021-02-28 13:24:09', '', '', 'ჩვენი ლოკაციებია', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` enum('0','1','13') DEFAULT '1',
  `description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `title_ge` varchar(255) NOT NULL,
  `description_ge` text NOT NULL,
  `metakeyword` text NOT NULL,
  `metakeyword_ge` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `status`, `description`, `created`, `user_id`, `title_ge`, `description_ge`, `metakeyword`, `metakeyword_ge`) VALUES
(1, 'Through solution-based therapy, I learned about a pair of questions that can help you?', '1', 'Through solution-based therapy, I learned about a pair of questions that can help you?Through solution-based therapy, I learned about a pair of questions that can help you?Through solution-based therapy, I learned about a pair of questions that can help you?Through solution-based therapy, I learned about a pair of questions that can help you?', '2021-02-24 14:33:19', 0, '', '', '', ''),
(2, 'New one', '1', 'New oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew one', '2021-03-01 06:12:50', 0, 'New one', 'New oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew one', 'New oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew one', 'New oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew one');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `name_ge` varchar(255) NOT NULL,
  `description_ge` text NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `offer` tinyint(1) DEFAULT NULL,
  `offerPrice` varchar(255) DEFAULT NULL,
  `latest` tinyint(1) DEFAULT NULL,
  `bestSellers` tinyint(1) DEFAULT NULL,
  `trending` tinyint(1) DEFAULT NULL,
  `visible` enum('0','1','13') DEFAULT '1',
  `img` varchar(255) DEFAULT NULL,
  `imgHover` varchar(255) DEFAULT NULL,
  `timePeriod` tinyint(1) DEFAULT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `metakeyword` text NOT NULL,
  `metakeyword_ge` text NOT NULL,
  `catId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `name`, `description`, `name_ge`, `description_ge`, `price`, `offer`, `offerPrice`, `latest`, `bestSellers`, `trending`, `visible`, `img`, `imgHover`, `timePeriod`, `dateTime`, `metakeyword`, `metakeyword_ge`, `catId`) VALUES
(2, 'Septial Baggets', '<p>Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets Septial Baggets</p>', 'ბაგეტები', '<p>ბაგეტები ბაგეტები ბაგეტები ბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტები</p>\r\n<p>&nbsp;</p>', '150', 2, '100', 0, 0, 0, '1', 'product12.jpg', '', NULL, '2021-02-16 07:16:30', '<p>ბაგეტები</p>', '<p>ბაგეტები ბაგეტები ბაგეტები ბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტებიბაგეტები ბაგეტები ბაგეტები</p>\r\n<p>&nbsp;</p>', 58),
(3, 'test 3', 'test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3 test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3test 3', '', '', '250', 1, '', 1, 1, 2, '1', NULL, '', NULL, '2021-02-16 07:16:30', '', '', 58),
(4, 're twertwer t', 'wert wertwert wertwert', '', '', '150', 2, '130', 2, 1, 1, '1', NULL, '', NULL, '2021-02-16 07:16:30', '', '', 56),
(5, 'test flash ', 'test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash test flash ', '', '', '350', 2, '200', 1, 2, 2, '13', NULL, '', NULL, '2021-02-16 07:16:30', '', '', 57),
(11, 'Tets', 'Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets Tets ', '', '', '150', 2, '100', 2, 0, 0, '', NULL, '', NULL, '2021-02-16 07:33:31', 'Tets, Tets, Tets, Tets, Tet,s, Tets, Tets ,Tets, Tet,', 'Tets Tets Tets Tets Tets Tets Tets Tets TetTets Tets Tets Tets Tets Tets Tets Tets TetTets Tets Tets Tets Tets Tets Tets Tets TetTets Tets Tets Tets Tets Tets Tets Tets TetTets Tets Tets Tets Tets Tets Tets Tets TetTets Tets Tets Tets Tets Tets Tets Tets TetTets Tets Tets Tets Tets Tets Tets Tets TetTets Tets Tets Tets Tets Tets Tets Tets Tet', 62),
(12, 'New one', '<p>New oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew oneNew one</p>', 'ახალი', '<p>ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი ახალი&nbsp;</p>', '150', 1, '85', 0, 0, 1, '1', NULL, NULL, 0, '2021-02-25 17:09:47', '<p>New, one</p>', '<p>ახალი, ახალი&nbsp;</p>', 56),
(13, 'One More', '<p>One MoreOne MoreOne MoreOne MoreOne MoreOne More</p>', 'კიდე ერთი', '<p>კიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთიკიდე ერთი</p>', '250', 0, '', 0, 0, 0, '1', NULL, NULL, NULL, '2021-02-25 17:11:16', '<p>One, More</p>', '<p>კიდე, ერთი</p>', 58),
(15, 'Yesaaa', '<p>Yesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa Yesaaa</p>', 'Yesaaa', '<p>Yesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa Yesaaa</p>', '250', NULL, '', NULL, NULL, NULL, '1', NULL, NULL, NULL, '2021-02-28 06:45:11', '<p>Yesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa Yesaaa</p>', '<p>Yesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa YesaaaYesaaa Yesaaa Yesaaa Yesaaa</p>', 61);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(2, 'Products/Products12/90a2e2.jpg', 2, 1, 'Products', 'd417d9caa5-1', ''),
(28, 'Products/Products4/ab239c.jpg', 4, 1, 'Products', '959e342e33-1', ''),
(32, 'Products/Products3/787ef7.jpg', 3, 1, 'Products', 'd3d72004aa-1', ''),
(34, 'Products/Products5/cb3996.jpg', 5, 1, 'Products', '2cd9ca2c11-1', ''),
(35, 'Products/Products1/42551b.png', 1, 1, 'Products', '918ed8bd47-1', ''),
(36, 'Products/Products6/1f3402.jpg', 6, 1, 'Products', 'b5c82af154-1', ''),
(38, 'Products/Products8/eb8791.jpg', 8, 1, 'Products', '85f5b560b6-1', ''),
(39, 'Products/Products9/a38087.jpg', 9, 1, 'Products', '013ced6e19-1', ''),
(40, 'Products/Products10/3b1961.jpg', 10, 1, 'Products', 'd88eb040a0-1', ''),
(41, 'Products/Products11/a64e37.jpg', 11, 1, 'Products', '5dccf2c955-1', ''),
(42, 'Products/Products12/90a2e2.jpg', 12, 1, 'Products', 'd417d9caa5-1', ''),
(44, 'Goods/Goods2/903160.jpg', 2, 1, 'Goods', '469efbe663-1', ''),
(45, 'Goods/Goods12/9216e6.jpg', 12, 1, 'Goods', '418f87862f-1', ''),
(46, 'Goods/Goods13/fb0c20.jpg', 13, 1, 'Goods', 'f32e03596c-1', ''),
(48, 'Goods/Goods15/f54b41.jpg', 15, 1, 'Goods', 'a75dc0d327-1', ''),
(55, 'News/News4/3fb545.jpg', 4, 1, 'News', 'dae641a854-1', '');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` enum('0','1','13') DEFAULT '1',
  `description` text NOT NULL,
  `number` varchar(2) NOT NULL,
  `quote` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `title_ge` varchar(255) NOT NULL,
  `description_ge` text NOT NULL,
  `keyword_ge` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`, `status`, `description`, `number`, `quote`, `keywords`, `title_ge`, `description_ge`, `keyword_ge`) VALUES
(2, 'TSERETELI AVENUE N 55', '1', '', '01', '', 'TSERETELI AVENUE N 55', 'წერეთლის გამზ. 55', '', 'TSERETELI AVENUE N 55'),
(3, 'ALEXANDRE KAZBEGI ST. 6', '1', '', '02', '', 'ALEXANDRE KAZBEGI ST. 6', 'ალექსანდრე ყაზბეგის ქ. 6', '', 'ALEXANDRE KAZBEGI ST. 6'),
(4, 'TCHAVCHAVADZE AV. 16', '1', '', '03', '', 'TCHAVCHAVADZE AV. 16', 'ჭავჭავაძის გამზ. 16', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m130524_201442_init', 1613982409),
('m140506_102106_rbac_init', 1612867670),
('m140602_111327_create_menu_table', 1612867618),
('m140622_111540_create_image_table', 1613289174),
('m140622_111545_add_name_to_image_table', 1613289174),
('m160312_050000_create_user', 1612867618),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1612867670),
('m180523_151638_rbac_updates_indexes_without_prefix', 1612867670),
('m190124_110200_add_verification_token_column_to_user_table', 1613982410),
('m200409_110543_rbac_update_mssql_trigger', 1612867670),
('m210209_084102_create_post', 1612860079),
('m210209_084726_create_post', 1612860712),
('m210214_071644_create_products_table', 1613287202);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` enum('0','1','13') DEFAULT '1',
  `description` text NOT NULL,
  `title_ge` varchar(255) NOT NULL,
  `description_ge` text NOT NULL,
  `metakeyword` text NOT NULL,
  `metakeyword_ge` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `status`, `description`, `title_ge`, `description_ge`, `metakeyword`, `metakeyword_ge`) VALUES
(4, 'gssdgsdfgs', '1', '<p>dfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sg</p>', 'dfgsdfgsdfg sg', '<p>dfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sg</p>\r\n<p>dfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sg</p>\r\n<p>dfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sg</p>\r\n<p>dfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sg</p>\r\n<p>dfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sg</p>\r\n<p>dfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sg</p>\r\n<p>dfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sg</p>\r\n<p>dfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sg</p>', '<p>dfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sg</p>', '<p>dfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sgdfgsdfgsdfg sg</p>');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) UNSIGNED NOT NULL,
  `orderData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_520_ci DEFAULT '1',
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `user_id`) VALUES
(1, 'Post one', 'SOme description', NULL),
(2, 'Post 2', 'Some description', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `access_token`, `is_admin`) VALUES
(1, 'webertela', 'RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS', '$2y$13$F1GjlLifcM0WpOhJH47gB.UFLQq8KU85iaxBcuD.fi4Db/A0Jm1Ae', NULL, 'webertela@example.com', 10, 1612868972, 1612868972, 'RiG7zh-dadLHoih5AeXXzmEbaXvWbHPS', '0'),
(2, 'manager', 'ploINsBhZqLMLvsfZh0bzKs3v6d1QKS0', '$2y$13$6BPtF/laqyPk181bF.0Sju72gU172av4gVMeHeNL7N0i23PFB/d1O', NULL, 'manager@manager.ge', 10, 1612869033, 1612869033, '', '0'),
(3, 'user', 'MPdN1426R_MfLJt3fuvrY0xjCyZGOrEg', '$2y$13$MWM1qA4Czg1KltELl6pyIeHkCjv/JofvPhHIRlhLpjJDxZVIGCmUC', NULL, 'user@example.com', 10, 1612869108, 1612869108, '', '0'),
(4, 'guruli', 'nCBA7AaAUiDa4KIWzAYo7XU3BegAyiaf', '$2y$13$Vwlf.kFdUQU4xcwbhioQ2OyPWZNzJgGOxk.PJWKeACpQ9llbxROou', NULL, 'guruli@guruli.com', 10, 1612877891, 1612877891, '', '0'),
(6, 'admin', 'CRCN-jL-sH8ExLZIUNEM-Hid2GRW_-Mh', '$2y$13$chWmtDmj6okDQTT0gWyTz.h.yBV/z788rQv2KH0S6C7Mb6mL/Fq6C', NULL, 'admin@admin.com', 10, 1614163951, 1614163951, '', '0'),
(12, 'New one', '', '123123', NULL, 'newOne@gmail.com', 10, 0, 0, '', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_title`
--
ALTER TABLE `contact_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `contact_title`
--
ALTER TABLE `contact_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
