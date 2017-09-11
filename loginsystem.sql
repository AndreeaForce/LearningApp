-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2017 at 05:50 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE IF NOT EXISTS `profileimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(255) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `avatar`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES
(1, '', 'andreea', 'force', 'andreeaforce@gmail.com', 'andreea', '1234'),
(5, 'instagram-text.png', 'alin', 'dacian', 'dacian@gmail.com', 'Dacian', '$2y$10$lqs.ggVeW/7XaD.IRBgQVOdL.ksOzgmTTitpehR7f1ST6bLw2tBVi'),
(12, 'success.png', 'de', 'e', 'andrrea@gmail.com', 'daciansieu', '$2y$10$sdE3awTO/UrMheap8RrCFO8VnIdqcF0dcRV27eisUny1hL78OIJh6'),
(13, 'success.png', 'de', 'e', 'andrrea@gmail.com', 'daciansieuu', '$2y$10$inqndzp3G.uhCzOAh4KY5uZBj7PN7POXBkMKdi3FbTIl3caS88Gcm'),
(17, 'profiledefault.jpg', 'dea', 'force', 'andreeaforce@gmail.com', 'DeaForce', '$2y$10$Pt2tPvzdF8Ngu/f5HkPqaOcZ7bMyCRR8UxQqQDJjJEnRrbJ9Nusi2'),
(18, 'success.jpg', '', '', '', '', ''),
(19, '', 'de', 'e', 'andrrea@gmail.com', 'dacianssss', '$2y$10$p6pYESqdQ/K9UXg7xqqxge0ABD6TnRFUjIIvvlDKTeWD/L7GF7nAa'),
(37, '', 'de', 'e', 'andrrea@gmail.com', 'dacianaaaaa', '$2y$10$1XzNerbFjli5lzGqe3cQk..BE0l5cTXMBEcjRNbCIrGCA25oG/AjO'),
(38, '', 'de', 'e', 'andrrea@gmail.com', 'dacianaaaaaaa', '$2y$10$W9xLZQoM2qRZWJSXTOFt..6bOc.QyQrT005wIJkUqPpIPjbTdzysy'),
(39, '', 'dea', 'de', 'andreeaforceeeeeeeee@gmail.com', 'daciandddeee', '$2y$10$L7r2HeoL232OYxAlgwhTCu7erj6TLljRW2VRpuT3ASRWZ2G/KxsLe'),
(40, '', 'deaaaa', 'aaaaa', 'andrrea@gmail.com', 'aadacian', '$2y$10$g.SnCQPGp0upD3Bvx0.EoeZJ.dD46gE/15.FIrA/KT3J6kaqtJCwe'),
(41, '', 'de', 'e', 'deeaandrrea@gmail.com', 'dacianssssss', '$2y$10$rPS0FZ0jtgHLf40ovGU/1ObeSGQ063osmWweVYVroAo1kUd7mICNy'),
(42, '', 'dea', 'ee', 'deeaandrrea@gmail.com', 'dacianiiiiiiiii', '$2y$10$F/ivn8nPL4V430/Zgedx0eUa0MWH6wNVaygXlRsZfMHSg1brd0Zzu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
