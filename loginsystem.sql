-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 12:10 AM
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
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_name` varchar(155) DEFAULT NULL,
  `profile_age` int(11) DEFAULT NULL,
  `profile_gender` varchar(155) DEFAULT NULL,
  `profile_strong` varchar(155) DEFAULT NULL,
  `profile_weak` varchar(155) DEFAULT NULL,
  `profile_likes` varchar(155) DEFAULT NULL,
  `profile_dislikes` varchar(155) DEFAULT NULL,
  `profile_avatar` varchar(155) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`profile_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `profile_name`, `profile_age`, `profile_gender`, `profile_strong`, `profile_weak`, `profile_likes`, `profile_dislikes`, `profile_avatar`, `user_id`) VALUES
(3, 'Piscotica', 6, 'Male', 'StrongPoint1', 'WeakPoint2', 'Likes3', 'Dislikes4', '59c90032b2f6c2.52853099.JPG', 2),
(4, 'Titiloi', 2, 'Male', 'StrongPoint4', 'WeakPoint3', 'Likes2', 'Dislikes1', '59c9004b645490.57130361.JPG', 2),
(105, 'Piscot', 4, 'Male', 'StrongPoint1', 'WeakPoint1', 'Likes1', 'Dislikes1', '59f73573251513.49874665.png', 1),
(107, 'Titiloi', 5, 'Male', 'StrongPoint2', 'WeakPoint2', 'Likes2', 'Dislikes2', '59e02f4b94a7d6.42117510.png', 1),
(117, 'Andreea', 4, 'Female', 'StrongPoint3', 'WeakPoint3', 'Likes3', 'Dislikes3', '59e03097bffaf1.83200778.png', 1),
(118, 'Edward', 17, 'Male', 'StrongPoint4', 'WeakPoint4', 'Likes4', 'Dislikes4', '59e030b2880598.81209358.png', 1),
(121, 'Alin', 5, 'Male', 'StrongPoint1', 'WeakPoint2', 'Likes1', 'Dislikes1', '59f8b69e497893.47274243.png', 1),
(122, 'Alex', 0, 'Male', 'StrongPoint1', 'WeakPoint1', 'Likes1', 'Dislikes1', '59f61151b523f3.95598120.png', 1),
(126, 'fsaF', 0, 'Male', 'StrongPoint1', 'WeakPoint1', 'Likes1', 'Dislikes1', '59f8b7ac2fcc71.89835588.png', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `avatar`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES
(1, 'alex_elements-01.png', 'alin', 'dea', 'andrrea@gmail.com', 'Dacian', '$2y$10$6585Pg7d3ulsydWFytBoROsMiqqKPZQJc9qwkQ0PWOyJUmbkBMl/K'),
(2, 'avatar.png', 'dea', 'force', 'andreeaforce@gmail.com', 'andreeaforce', '$2y$10$6585Pg7d3ulsydWFytBoROsMiqqKPZQJc9qwkQ0PWOyJUmbkBMl/K'),
(3, '', 'Andreea', 'Marinescu', 'andrreagmail2@gmail.com', 'Andreea', '$2y$10$6585Pg7d3ulsydWFytBoROsMiqqKPZQJc9qwkQ0PWOyJUmbkBMl/K'),
(4, '', 'Andreea', 'Marinescu', 'andreea@gmaill.com', 'daciana', '$2y$10$6585Pg7d3ulsydWFytBoROsMiqqKPZQJc9qwkQ0PWOyJUmbkBMl/K'),
(5, '', 'Dea', 'Force', 'dea@gmail.com', 'Dea', '$2y$10$6585Pg7d3ulsydWFytBoROsMiqqKPZQJc9qwkQ0PWOyJUmbkBMl/K'),
(6, '', 'dea', 'ddd', 'dea@hhd.com', 'dacia', '$2y$10$6585Pg7d3ulsydWFytBoROsMiqqKPZQJc9qwkQ0PWOyJUmbkBMl/K'),
(7, '', 'dea', 'ddd', 'dea@hhd.com', 'dacia', '$2y$10$6585Pg7d3ulsydWFytBoROsMiqqKPZQJc9qwkQ0PWOyJUmbkBMl/K'),
(8, '', 'deee', 'fsafd', 'fasfd@fhdsakhf.com', 'daci', '$2y$10$6585Pg7d3ulsydWFytBoROsMiqqKPZQJc9qwkQ0PWOyJUmbkBMl/K'),
(9, '', 'Marius', 'Popescu', 'marius@gmail.com', '1234', '$2y$10$6585Pg7d3ulsydWFytBoROsMiqqKPZQJc9qwkQ0PWOyJUmbkBMl/K');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
