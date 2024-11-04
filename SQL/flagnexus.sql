-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2024 at 04:03 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flagnexus`
--

-- --------------------------------------------------------

--
-- Table structure for table `leadboard`
--

DROP TABLE IF EXISTS `leadboard`;
CREATE TABLE IF NOT EXISTS `leadboard` (
  `lid` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `score` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `qid` int NOT NULL AUTO_INCREMENT,
  `question` varchar(600) NOT NULL,
  `answer` varchar(600) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`qid`, `question`, `answer`) VALUES
(1, 'Find the secret message....RkxBR05FWFVTe2hhc2hfZGVjb2RlZH0=', 'FLAGNEXUS{hash_decoded}'),
(3, 'What is the default port number for HTTP?', 'FLAGNEXUS{80}'),
(4, 'Name a type of attack that tricks people into sending money or sensitive information to hackers.', 'FLAGNEXUS{phishing}');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `uname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `usertyp` varchar(10) NOT NULL DEFAULT 'User',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`uid`, `uname`, `email`, `passwd`, `usertyp`) VALUES
(1, 'Admin', 'tansecure25@gmail.com', 'tanmay2510', 'Admin'),
(2, 'kalp18', 'pkalp1003@gmail.com', 'kalp1810', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

DROP TABLE IF EXISTS `user_answers`;
CREATE TABLE IF NOT EXISTS `user_answers` (
  `uid` int NOT NULL,
  `qid` int NOT NULL,
  PRIMARY KEY (`uid`,`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
