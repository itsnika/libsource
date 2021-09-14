-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2018 at 03:05 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libsource`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
-- Creation: Jul 02, 2018 at 08:39 AM
--
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(320) NOT NULL,
  `lastname` varchar(320) NOT NULL,
  `email` varchar(320) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `books`
--
-- Creation: Jul 08, 2018 at 12:09 PM
--
DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bookid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `isbn` varchar(35) NOT NULL,
  `year` bigint(4) NOT NULL,
  `edition` varchar(35) NOT NULL,
  `language` text NOT NULL,
  `category` text NOT NULL,
  `bookpicture` text NOT NULL,
  `shelf` varchar(255) NOT NULL,
  `copies` int(11) NOT NULL,
  `originalcopies` int(11) NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `details`
--
-- Creation: Jul 07, 2018 at 03:58 PM
--
DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `userid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `ordereddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `students`
--
-- Creation: Jul 01, 2018 at 08:31 AM
--
DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `userid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(320) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;