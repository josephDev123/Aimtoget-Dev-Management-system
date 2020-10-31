-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2020 at 09:13 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `id` int(4) NOT NULL,
  `cart_id` int(4) NOT NULL,
  `cart_title` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`id`, `cart_id`, `cart_title`) VALUES
(12, 0, 'HTML'),
(13, 0, 'CSS'),
(14, 0, 'Vanilla JavaScript'),
(15, 0, 'PHP '),
(21, 0, 'MySQL'),
(22, 0, 'API'),
(23, 0, 'Git');

-- --------------------------------------------------------

--
-- Table structure for table `cms_image`
--

CREATE TABLE `cms_image` (
  `id` int(11) NOT NULL,
  `gallery_img` varchar(100) NOT NULL,
  `gallery_img_name` varchar(100) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_image`
--

INSERT INTO `cms_image` (`id`, `gallery_img`, `gallery_img_name`, `created_at`) VALUES
(1, 'image 1', 'joseph 1', '2020-10-30'),
(2, 'image 2', ' joseph 2', '2020-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `comments_table`
--

CREATE TABLE `comments_table` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(200) NOT NULL,
  `comment_email` varchar(100) NOT NULL,
  `comment_status` varchar(100) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_table`
--

INSERT INTO `comments_table` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_status`, `comment_date`, `comment_content`) VALUES
(3, 10, 'Sade', 'Sade@gmail.com', 'approved', '2020-08-29', 'hey, Nice coding'),
(4, 10, 'joe', 'joe@gmail.com', 'approved', '2020-08-29', 'Joe, u did a great job here'),
(5, 13, 'lagbaja', 'lagbaja@gmail.com', 'approved', '2020-08-30', 'hello Joe, U are a good Programmer'),
(9, 11, 'Junadu', 'Junadu@gmail.com', 'approved', '2020-08-30', ' I love the CMS Development'),
(10, 14, 'php Guru', 'php@gmail.com', 'approved', '2020-08-30', 'Joe your are the best PHP Dev'),
(11, 10, 'Junadu', 'Junadu@gmail.com', 'approved', '2020-10-25', 'nice job Joe for the CMS development');

-- --------------------------------------------------------

--
-- Table structure for table `online_users_table`
--

CREATE TABLE `online_users_table` (
  `online_id` int(200) NOT NULL,
  `online_time` int(200) NOT NULL,
  `session` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_users_table`
--

INSERT INTO `online_users_table` (`online_id`, `online_time`, `session`) VALUES
(1, 20000, 1),
(2, 1603399997, 42),
(3, 1604083193, 0),
(4, 1603427424, 4),
(5, 1603418064, 56),
(6, 1604003515, 5),
(7, 1604029090, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE `post_table` (
  `post_id` int(4) NOT NULL,
  `post_title` varchar(300) NOT NULL,
  `post_author` varchar(200) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` varchar(200) NOT NULL,
  `post_content` text NOT NULL,
  `post_tag` varchar(500) NOT NULL,
  `post_status` varchar(200) NOT NULL,
  `post_category_id` int(4) NOT NULL,
  `post_comment_count` int(4) NOT NULL,
  `post_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`post_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tag`, `post_status`, `post_category_id`, `post_comment_count`, `post_view`) VALUES
(10, '               CMS Development', 'Joseph', '2020-08-22', 'image_1.jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32', 'javascript, joseph, ', 'Publish', 12, 1, 6),
(11, ' React', 'Samuel', '2020-08-22', 'image_5.jpg', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions', 'javascript, joseph, jaquer', 'Publish', 14, 2, 1),
(12, 'React', 'Ada', '2020-08-22', 'image_2.jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32', 'javascript, joseph, ', 'Publish', 12, 3, 0),
(13, ' CSS', 'Ada', '2020-08-23', 'bmw.png', 'Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language like HTML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript', 'javascript, joseph, ', 'Publish', 13, 4, 0),
(14, '   PHP Development', 'Joseph', '2020-08-23', 'image_1.jpg', 'PHP is a general-purpose scripting language that is especially suited to web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994; the PHP reference implementation is now produced by The PHP Group', 'javascript, joseph, ', 'Publish', 15, 5, 2),
(15, 'MySQl Development', 'Joseph', '2020-08-23', 'lambo_1.jpg', 'MySQL is a relational database management system based on SQL â€“ Structured Query Language. The application is used for a wide range of purposes, including data warehousing, e-commerce, and logging applications. The most common use for mySQL however, is for the purpose of a web database.', 'javascript, joseph, ', 'Publish', 21, 7, 2),
(16, 'API Development', 'Joseph', '2020-08-23', 'image_1.jpg', 'An application programming interface is a computing interface which defines interactions between multiple software intermediaries. It defines the kinds of calls or requests that can be made, how to make them, the data formats that should be used, the conventions to follow', 'javascript, joseph, ', 'Publish', 22, 8, 3),
(22, 'laravel', 'Joseph', '2020-09-22', 'UC-RMEX2U71.jpg', 'Strict typing is only defined for scalar type declarations, and as such, requires PHP 7.0.0 or later, as scalar type declarations were added in that version.', 'laravel', 'Publish', 15, 8, 2),
(23, 'Git Introduction', 'Joseph', '2020-09-30', 'image_5.jpg', '<p><strong>Git</strong></p><p>Git is a distributed version control system for tracking changes in source code during software development. It is designed for coordinating work among programmers, but it can be used to track changes in any set of files. Its goals include speed, data integrity, and support for distributed, non-linear workflows.</p>', 'javascript, joseph, ', 'Publish', 23, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `users_id` int(4) NOT NULL,
  `users_firstname` varchar(300) NOT NULL,
  `users_lastname` varchar(300) NOT NULL,
  `users_username` varchar(300) NOT NULL,
  `users_role` varchar(100) NOT NULL,
  `users_password` varchar(200) NOT NULL,
  `users_email` varchar(200) NOT NULL,
  `users_image` varchar(300) NOT NULL,
  `users_rand` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`users_id`, `users_firstname`, `users_lastname`, `users_username`, `users_role`, `users_password`, `users_email`, `users_image`, `users_rand`) VALUES
(1, 'Uzuegbu', 'Joseph chukwujekwu', 'joeblow', 'admin', '1234', 'Joseph@gmail.com', 'image', 'wes32'),
(11, '', '', 'ada', '', '1111', 'ada@gmail.com', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_image`
--
ALTER TABLE `cms_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_table`
--
ALTER TABLE `comments_table`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `online_users_table`
--
ALTER TABLE `online_users_table`
  ADD PRIMARY KEY (`online_id`);

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cms_image`
--
ALTER TABLE `cms_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments_table`
--
ALTER TABLE `comments_table`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `online_users_table`
--
ALTER TABLE `online_users_table`
  MODIFY `online_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `post_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `users_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
