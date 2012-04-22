-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2012 at 01:11 PM
-- Server version: 5.5.19
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fitprogrammers`
--

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE IF NOT EXISTS `badges` (
  `badge_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `badge_name` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL,
  PRIMARY KEY (`badge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_posts`
--

CREATE TABLE IF NOT EXISTS `favorite_posts` (
  `post_unique_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `member_id` bigint(20) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`post_unique_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `helpful_posts`
--

CREATE TABLE IF NOT EXISTS `helpful_posts` (
  `post_unique_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `member_id` bigint(20) NOT NULL,
  `status` bit(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`post_unique_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `avatar` bigint(20) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `real_name` varchar(255) NOT NULL,
  `age` tinyint(2) DEFAULT NULL,
  `profile_views` bigint(20) NOT NULL DEFAULT '0',
  `reputation` bigint(20) NOT NULL DEFAULT '0',
  `about_me` text,
  `join_date` datetime DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `last_login_ip` varchar(32) DEFAULT NULL,
  `fitportal_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `email`, `password`, `avatar`, `website`, `location`, `real_name`, `age`, `profile_views`, `reputation`, `about_me`, `join_date`, `last_login_date`, `last_login_ip`, `fitportal_id`) VALUES
(1, 'minhhq_fit@hanu.edu.vn', '3c59dc048e8850243be8079a5c74d079', 0, NULL, NULL, 'Ha Quang Minh', NULL, 0, 0, NULL, '2012-04-12 00:00:00', '2012-04-12 00:00:00', NULL, 'minhhq');

-- --------------------------------------------------------

--
-- Table structure for table `member_achievements`
--

CREATE TABLE IF NOT EXISTS `member_achievements` (
  `member_id` bigint(20) NOT NULL,
  `posted_questions` bigint(20) NOT NULL DEFAULT '0',
  `posted_answers` bigint(20) NOT NULL DEFAULT '0',
  `voted_posts` bigint(20) NOT NULL DEFAULT '0',
  `favorited_posts` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_unique_id` varchar(255) NOT NULL,
  `post_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `last_version_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `author` bigint(20) NOT NULL,
  `tags` text NOT NULL,
  `vote_up_count` bigint(20) DEFAULT '0',
  `vote_down_count` bigint(20) DEFAULT '0',
  `view_count` bigint(20) DEFAULT '0',
  `answer_count` bigint(20) DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `is_best_answer` bit(1) DEFAULT NULL,
  `is_a_question` bit(1) DEFAULT NULL,
  `is_answered` bit(1) DEFAULT NULL,
  `is_a_comment` bit(1) DEFAULT NULL,
  `bounty` int(4) DEFAULT '0',
  `parent_unique_id` bigint(20) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_unique_id` (`post_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_unique_id`, `post_id`, `last_version_id`, `title`, `body`, `author`, `tags`, `vote_up_count`, `vote_down_count`, `view_count`, `answer_count`, `created_date`, `is_best_answer`, `is_a_question`, `is_answered`, `is_a_comment`, `bounty`, `parent_unique_id`) VALUES
('ABD6C6E4-13CF-51D4-6439-4F66141542ED', 15, -1, 'What should we do?', 'Nooooo12<br>', 1, 'hello', 0, 0, 21, 0, '2012-04-13 11:12:17', NULL, '1', '0', NULL, 0, 0),
('3C00D065-7848-B0D6-4A7E-A119E0A7F5D9', 16, -1, 'What should we do?', 'sdfsfdsf<br>', 1, 'question, ait, .net, framework', 0, 0, 1, 0, '2012-04-13 10:57:58', NULL, '1', '0', NULL, 0, 0),
('7BC4D66E-0A9A-9E92-293C-D2B09CE7289A', 17, -1, 'Question number 1', 'Who are you?<br>', 1, 'question, ait, .net, framework', 0, 0, 0, 0, '2012-04-18 23:08:44', NULL, '1', '0', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) NOT NULL,
  `use_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `voted_posts`
--

CREATE TABLE IF NOT EXISTS `voted_posts` (
  `post_unique_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `member_id` bigint(20) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`post_unique_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
