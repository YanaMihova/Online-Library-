-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2014 at 06:07 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `birth_date` date NOT NULL,
  `country` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `first_name` (`first_name`),
  KEY `last_name` (`last_name`),
  KEY `birth_date` (`birth_date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `first_name`, `last_name`, `birth_date`, `country`) VALUES
(1, 'Douglas', 'Adams', '1952-03-11', 'United Kingdom'),
(2, 'Terry', 'Pratchett', '1948-04-28', 'United Kingdom'),
(3, 'Elizabeth ', 'Gilbert', '1969-12-12', 'U.S.');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `author_id` bigint(20) unsigned NOT NULL,
  `categories` set('Drama','Comedy','Action','Adventure','Horror') NOT NULL,
  `print_year` int(10) unsigned NOT NULL,
  `rating` int(10) unsigned NOT NULL DEFAULT '0',
  `votes` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `author_id` (`author_id`),
  KEY `categories` (`categories`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author_id`, `categories`, `print_year`, `rating`, `votes`) VALUES
(1, 'The Hitchhiker''s Guide to the Galaxy', 1, 'Comedy', 1977, 13, 3),
(2, 'Good Omens', 2, 'Comedy,Action', 1990, 60, 9),
(3, 'The Carpet People', 2, 'Comedy,Action', 1971, 49, 4),
(5, 'The Dark Side of the Sun', 2, 'Comedy,Action,Adventure', 1976, 2305, 17),
(7, 'Eat, Pray, Love', 3, 'Drama', 2007, 5, 1),
(8, 'Strata', 2, '', 2000, 15, 3),
(9, 'Love', 3, 'Drama', 2012, 13, 3),
(10, 'Mistery', 3, 'Drama,Comedy', 2014, 8, 2),
(11, 'Over the Sky', 3, 'Drama,Comedy', 2014, 5, 1),
(12, 'Raising Steam', 2, 'Comedy', 2004, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(500) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `address` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `admin`, `address`, `email`) VALUES
(1, 'sandman7920', 'e4d3956f2a4ba47ed221bd8dfbd5bb6a', 'Nikolay ZLZLZ', 0, '', ''),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 1, '', ''),
(3, 'yana', '3af422b6808d6ad32be68edae8d2b34d', 'Yana Mihova', 0, '', ''),
(20, 'Ivanka', 'a01610228fe998f515a72dd730294d87', 'Ivanka Kostova', 0, 'Ivanka', 'ivanka@abv.bg'),
(17, 'margarita', '95d352564e50d93668e2ed662d3e6aa1', 'Margarita Mihova', 0, 'margarita', 'magi@abv.bg'),
(24, 'Jeca', '4a7d1ed414474e4033ac29ccb8653d9b', 'Jivko Jechev', 0, 'Jeca', 'jivko@abv.bg'),
(25, 'testove', '670da91be64127c92faac35c8300e814', 'testa testa', 0, '15 test', 'test@abv'),
(27, 'mmmm', '698d51a19d8a121ce581499d7b701668', '11 11', 0, '11', '11');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
