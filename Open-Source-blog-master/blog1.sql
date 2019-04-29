-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 07:27 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `email`, `admin_pass`) VALUES
(123456, 'Ezaz Raihan Saif', 'ezazraihansaif@gmail.com', 'saif'),
(654321, 'oyan', 'oyan@gmail.com', 'oyan');

-- --------------------------------------------------------

--
-- Table structure for table `choice_tag`
--

CREATE TABLE `choice_tag` (
  `post_id` int(11) NOT NULL,
  `choice_id` int(11) NOT NULL,
  `choice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `username` varchar(50) NOT NULL,
  `comment_deleted` timestamp NULL DEFAULT NULL,
  `Comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`post_id`, `comment_id`, `comment`, `username`, `comment_deleted`, `Comment_time`) VALUES
(13, 1, 'dsadas', 'aa', NULL, '2018-04-20 02:26:12'),
(13, 2, 'gfdgdf', 'aa', NULL, '2018-04-20 02:39:13'),
(13, 3, 'dasdasd', 'aaa', NULL, '2018-04-20 04:20:49'),
(13, 4, 'sdfsdfsf', 'aaa', NULL, '2018-04-20 04:24:20'),
(13, 5, 'hgfhgf', 'ee9', NULL, '2018-04-20 04:26:49'),
(13, 6, 'fgaskv.ldnalfvn', 'aa', NULL, '2018-04-20 11:01:36'),
(8, 7, 'fdassdasd', 'aa', NULL, '2018-04-20 14:09:53'),
(13, 8, 'jhgfjfgh', 'aa', NULL, '2018-04-20 14:16:29'),
(5, 9, 'jhkhjk', 'aa', NULL, '2018-04-20 15:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `post_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`post_id`, `content_id`, `link`) VALUES
(1, 1, 'post_contents/349380393.jpg'),
(1, 2, 'post_contents/768056860.png'),
(2, 3, 'post_contents/986358405.png'),
(3, 4, 'post_contents/1069899437.jpg'),
(4, 5, 'post_contents/1793180492.jpg'),
(5, 6, 'post_contents/1773608285.png'),
(6, 7, 'post_contents/1063604165.jpg'),
(7, 8, 'post_contents/1853841441.jpg'),
(8, 9, 'post_contents/935990733.jpg'),
(9, 10, 'post_contents/75572541.jpg'),
(10, 11, 'post_contents/1617358525.jpg'),
(11, 12, 'post_contents/46650673.jpg'),
(12, 13, 'post_contents/1321815531.jpg'),
(13, 14, 'post_contents/743075415.jpg'),
(13, 15, 'post_contents/1212464681.png'),
(14, 16, 'post_contents/102921292.jpg'),
(16, 17, 'post_contents/563256930.gif'),
(17, 18, 'post_contents/1360304818.jpg'),
(18, 19, 'post_contents/787968078.png');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `comment_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `comment_reply` varchar(500) NOT NULL,
  `usename` varchar(50) NOT NULL,
  `reply_deleted` timestamp NULL DEFAULT NULL,
  `reply_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_blog`
--

CREATE TABLE `user_blog` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `post` varchar(2600) NOT NULL,
  `likes_count` int(11) NOT NULL,
  `report_count` int(11) NOT NULL,
  `report_comment` varchar(500) DEFAULT NULL,
  `time_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `blog_deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_blog`
--

INSERT INTO `user_blog` (`user_id`, `user_name`, `post_id`, `title`, `post`, `likes_count`, `report_count`, `report_comment`, `time_date`, `blog_deleted`) VALUES
(2, 'aa', 1, 'aa', 'aa', 2, 11, NULL, '2018-04-23 08:29:16', NULL),
(2, 'aa', 2, 'ee', 'adasdas', 0, 5, NULL, '2018-04-20 18:39:18', NULL),
(2, 'aa', 3, 'tret', 'fasfsdafasdfas', 4, 6, NULL, '2018-04-20 18:39:24', NULL),
(2, 'aa', 4, 'dfgfdhdfh', 'jghfjkghfjfg', 0, 0, NULL, '2018-04-03 12:11:42', NULL),
(2, 'aa', 5, 'bgv', 'kjhkvhg', 1, 0, NULL, '2018-04-20 15:54:40', NULL),
(2, 'aa', 6, 'jgkhgh', 'kghhjkgh', 0, 5, NULL, '2018-04-20 18:39:54', NULL),
(2, 'aa', 7, 'sdfgdfghdf', 'ghjf', 0, 2, NULL, '2018-04-20 18:39:29', NULL),
(2, 'aa', 8, 'sdfgdfghdffd', 'ghjfsfds', 1, 0, NULL, '2018-04-20 14:09:55', NULL),
(2, 'aa', 9, 'ghjyu', 'ytutyutyuty', 0, 4, NULL, '2018-04-20 18:39:59', NULL),
(2, 'aa', 10, 'gdfgdfgdf', 'ghfjjfhjf', 0, 10, NULL, '2018-04-20 18:40:04', NULL),
(2, 'aa', 11, 'dasfsdfgsdfg', 'ghfdhghdfhdf', 2, 17, NULL, '2018-04-20 19:27:00', NULL),
(2, 'aa', 12, 'dsadsa', 'dsasdasdsgsdfgsdg', 0, 0, NULL, '2018-04-03 12:25:16', NULL),
(2, 'aa', 13, 'Hello', 'wahs up', 7, 3, NULL, '2018-04-21 01:14:07', NULL),
(7, 'ee9', 14, 'dasdas', 'dasdasd', 0, 7, NULL, '2018-04-20 19:39:28', NULL),
(7, 'ee9', 15, 'dasdfggs', 'shfghfg', 0, 11, NULL, '2018-04-20 20:01:15', NULL),
(2, 'aa', 16, 'bvxgfdg', 'halu', 0, 0, NULL, '2018-04-21 02:20:40', NULL),
(2, 'aa', 17, 'cchgfhgfv', 'asdfghjkl;', 6, 4, NULL, '2018-04-23 08:48:05', NULL),
(2, 'Darksider', 18, 'title 1', 'Simply download a CSS file and replace the one in Bootstrap. No messing \r\naround with hex values. Simply download a CSS file and replace the one in \r\nBootstrap. No messing around with hex values.', 0, 0, NULL, '2018-04-23 03:20:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_choise`
--

CREATE TABLE `user_choise` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `choice_id` int(11) NOT NULL,
  `choice` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_choise`
--

INSERT INTO `user_choise` (`user_id`, `user_name`, `choice_id`, `choice`) VALUES
(4, 'aaa', 1, 'Raw_Science'),
(4, 'aaa', 3, 'EEE'),
(6, 'ee40', 2, 'Computer_Science'),
(6, 'ee40', 3, 'EEE'),
(7, 'ee9', 1, 'Raw_Science'),
(9, 'asdasd39106', 2, 'Computer_Science');

-- --------------------------------------------------------

--
-- Table structure for table `user_suggestion`
--

CREATE TABLE `user_suggestion` (
  `user_id` int(11) NOT NULL,
  `suggestion` varchar(1000) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_suggestion`
--

INSERT INTO `user_suggestion` (`user_id`, `suggestion`, `date`) VALUES
(2, 'ddasdasdasdasdsadsadsadsa', '2018-04-21 02:26:02'),
(7, 'asddasdddsf', '2018-04-21 02:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `user_deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `full_name`, `email`, `password`, `gender`, `profile_pic`, `occupation`, `phone_number`, `dob`, `user_deleted`) VALUES
(2, 'Darksider', 'Ezaz Raihan', 'ezaz@gmail.com', 'a', 'male', 'propics/288797042.jpg', 'Student', '01936911899', '2018-03-20', NULL),
(4, 'aaa', 'ssa', 'ezaf@gmail.com', 'ww', 'male', 'propics/300986761.jpg', 'Student', '01936911699', '2018-03-20', NULL),
(6, 'ee40', 'ee', 'ezaf@gmail.com', '111', 'female', 'propics/1790062975.jpg', 'vanda vaga', '01936911609', '2018-03-20', NULL),
(7, 'ee9', 'asdfa', 'ddffarriaga@gmail.com', 'Asdf1234', 'female', 'propics/126520763.png', 'kkkaa', '01936911698', '2018-03-14', NULL),
(9, 'asdasd39106', 'asdasd', 'ez222f@gmail.com', 'Asdf1234', 'male', 'propics/989601421.jpg', 'kdhbaskjd', '01936911654', '2018-04-18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `user_blog`
--
ALTER TABLE `user_blog`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_blog`
--
ALTER TABLE `user_blog`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
