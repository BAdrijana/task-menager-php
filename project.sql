-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2018 at 01:58 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator` varchar(100) NOT NULL,
  `worker` varchar(100) NOT NULL,
  `tasktitle` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `done` enum('n','y') NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `creator`, `worker`, `tasktitle`, `description`, `date`, `done`) VALUES
(7, 'ane_nce@hotmail.com', 'admin@admin.mk', 'new', 'jdadpowk', '2018-08-02', 'n'),
(10, 'admin@admin.mk', 'ane_nce@hotmail.com', 'new', 'jdadpowk', '2018-08-02', 'n'),
(26, 'some@some.com', 'admin@admin.mk', 'svdhs', 'nsdns s cmdnfkjd', '2018-08-02', 'n'),
(27, 'new@new.com', 'admin@admin.mk', 'something', 'something to do', '2018-08-02', 'n'),
(28, 'new@new.com', 'new@new.com', 'new', 'job', '2018-08-02', 'n'),
(31, 'john@doe.com', ' admin@admin.mk  ', '  job;ewwr', '  job to do ;', '2018-08-02', 'n'),
(36, 'john@doe.com', ' admin@admin.mk', 'update', ' job to do ', '2018-08-02', 'n'),
(39, 'john@doe.com', ' ane_nce@hotmail.com ', 'ghjoliojiolkiiutre ', 'ghjoliojiolkiiutre ', '2018-08-02', 'n'),
(40, 'john@doe.com', 'some@some.mk', '   as', '   as', '2018-08-02', 'n'),
(41, 'john@doe.com', '  john@doe.com', ' Job for John', ' description', '2018-08-02', 'n'),
(42, 'john@doe.com', 'john@doe.com', ' Job for John', ' job to do ', '2018-08-02', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(17, 'Adrijana', 'Batevska', 'ane_nce@hotmail.com', '$2y$10$ARJyYnmnkxF4Fj7aDxQN9uG7CVybA6m/LDsy4SA8xkzeFwo23YNT6'),
(18, 'Mickey', 'Mouse', 'admin@admin.mk', '$2y$10$BOJjNEWW267Z.U1MCVe2JeJlJBbWmkCzQ.qgLf5X5KX6rVSEjjquS'),
(21, 'some', 'some', 'some@some.com', '$2y$10$YZ8QrdGpf16qIexFGkgrLOoMAncKAFKVoFNih4mtJ.qBHULOkgjye'),
(24, 'new', 'new', 'new@new.com', 'new'),
(25, 'John', 'Doe', 'john@doe.com', '441356');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
