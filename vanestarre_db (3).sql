-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 28, 2021 at 02:54 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vanestarre_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `picture` text,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `love` int(11) DEFAULT '0',
  `cute` int(11) DEFAULT '0',
  `trop_stylé` int(11) DEFAULT '0',
  `swag` int(11) DEFAULT '0',
  `tag` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbr` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `picture`, `body`, `date`, `love`, `cute`, `trop_stylé`, `swag`, `tag`, `nbr`) VALUES
(25, 15, 'g', '1200px-Fnatic-Logo-2020.png', 'g', '2021-01-28 10:08:18', 1, 0, 0, 0, '', 1),
(31, 15, 'gg', '', 'gg', '2021-01-28 12:08:41', 1, 0, 0, 0, 'βz', 1),
(32, 15, 'f', '', 'f', '2021-01-28 12:19:03', 1, 0, 0, 0, 'β', 1),
(33, 15, 'ggggg', '', 'ggggg', '2021-01-28 12:24:00', 1, 0, 0, 0, 'β', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

DROP TABLE IF EXISTS `reaction`;
CREATE TABLE IF NOT EXISTS `reaction` (
  `typeR` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reaction`
--

INSERT INTO `reaction` (`typeR`, `id_user`, `id_post`) VALUES
('15', 0, 13),
('15', 0, 13),
('15', 0, 13),
('15', 0, 13),
('love', 13, 15),
('16', 0, 13),
('love', 13, 16),
('cute', 13, 17),
('cute', 13, 18),
('trop_stylé', 13, 19),
('cute', 13, 20),
('cute', 13, 23),
('cute', 17, 27),
('cute', 17, 26),
('love', 17, 25),
('love', 17, 31);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(10) NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `role` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Pseudo`, `Email`, `Password`, `role`) VALUES
(15, 'theo', 'theo.moumdjian@gmail.com', '$2y$10$LpsV.mdXIPGoAF2jc7I3AeX0ou7jYLeEpuhpXieRFACIx31loElvW', 2),
(17, 'theo2', 'theo.moumdjian2@gmail.com', '$2y$10$AZLpnnkIs8nXvsY16hj7I.VQRAWJNyMVGOgjEIMI0QX9OJBljW4Uq', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
