-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2012 at 11:23 PM
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
  `avatar` binary(20) NOT NULL,
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
  `fitportal_id` varchar(255) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `post_unique_id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `last_version_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `author` bigint(20) NOT NULL,
  `tags` text NOT NULL,
  `vote_up_count` bigint(20) NOT NULL DEFAULT '0',
  `vote_down_count` bigint(20) NOT NULL DEFAULT '0',
  `view_count` bigint(20) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `is_best_answer` bit(1) DEFAULT NULL,
  `is_a_question` bit(1) DEFAULT NULL,
  `is_answered` bit(1) DEFAULT NULL,
  `is_a_comment` bit(1) DEFAULT NULL,
  `bounty` int(4) NOT NULL DEFAULT '0',
  `parent_unique_id` bigint(20) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_unique_id` (`post_unique_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` bigint(20) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `use_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
