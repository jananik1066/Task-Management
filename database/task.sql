-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2019 at 03:49 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `sno` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` int(10) NOT NULL,
  `target_date` datetime DEFAULT NULL,
  `completed_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`sno`, `name`, `description`, `status`, `target_date`, `completed_date`) VALUES
(17, 'go to office', 'via train', 0, '2019-04-01 11:00:00', NULL),
(24, 'Pay bike loan', '10,000 rs', 0, '2019-03-30 14:00:00', NULL),
(22, 'Have tea', 'With 2 tea spoon of sugar', 1, '2019-04-04 09:01:00', '2019-03-28 21:18:07'),
(23, 'Call Manager', 'Talk about the web project', 0, '2019-03-31 00:00:00', NULL),
(19, 'Go out for dinner', 'to saravana bhavan', 1, '2019-03-31 08:59:00', '2019-03-28 21:03:14'),
(21, 'Sleep', 'in the 2nd room', 0, '2019-04-01 22:03:00', NULL),
(25, 'Outing with buddies', 'To ECR', 0, '2019-04-07 10:00:00', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
