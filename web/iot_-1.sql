-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2022 at 01:11 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot`
--

-- --------------------------------------------------------

--
-- Table structure for table `iot_`
--

DROP TABLE IF EXISTS `iot_`;
CREATE TABLE IF NOT EXISTS `iot_` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `temperature` float NOT NULL,
  `pressure` float NOT NULL,
  `altitude` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `iot_`
--

INSERT INTO `iot_` (`id`, `temperature`, `pressure`, `altitude`, `time`) VALUES
(1, 23.92, 1008.12, 944, '2022-04-27 07:18:59'),
(2, 23.89, 1008.13, 944, '2022-04-27 07:18:59'),
(3, 23.89, 1008.09, 944, '2022-04-27 07:18:59'),
(4, 23.89, 1008.08, 944, '2022-04-27 07:18:59'),
(5, 23.89, 1008.13, 944, '2022-04-27 07:18:59'),
(6, 23.89, 1008.08, 944, '2022-04-27 07:18:59'),
(11, 14, 34, 50, '2022-05-26 12:40:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
