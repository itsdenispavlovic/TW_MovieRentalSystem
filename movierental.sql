-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2020 at 05:57 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movierental`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `image`, `content`, `price`, `date_created`) VALUES
(1, 'I am Legend', 'movie1.jpeg', 'I Am Legend is a 2007 American post-apocalyptic film based on the 1954 novel of the same name by Richard Matheson, directed by Francis Lawrence and starring Will Smith, who plays US Army virologist Robert Neville.', 39.99, '2019-11-16 21:33:49'),
(4, 'Minions', '8987_255w_360h.jpg', 'Po ka po ka!', 45.95, '2020-01-10 19:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `rentetMovies`
--

CREATE TABLE IF NOT EXISTS `rentetMovies` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `generatedCode` text,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rentetMovies`
--

INSERT INTO `rentetMovies` (`id`, `uid`, `mid`, `generatedCode`, `start`, `end`, `date_created`) VALUES
(2, 1, 2, 'n7dn86ezwbxp46iz', '2019-11-20', '2019-11-21', '2019-11-17 11:17:52'),
(4, 1, 1, 'qhsnma6srvkick3u', '2019-11-18', '2019-11-27', '2019-11-17 13:23:18'),
(10, 4, 4, '40i70cwky00zicyj', '2020-01-07', '2020-01-14', '2020-01-10 19:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `isadmin` tinyint(4) NOT NULL DEFAULT '0',
  `fullname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `isadmin`, `fullname`, `username`, `email`, `password`, `date_created`) VALUES
(1, 1, 'Denis Pavlovic', 'itsdenispavlovic', 'pavlovicdenis@icloud.com', '$2y$10$FPKTtvLZrivEqYra2oheMOKA5.FmkJR0P07lQ0X8GEDNEQfFfk5FC', '2019-11-16 23:01:32'),
(2, 0, 'Adrian Miculescu', 'adimiculescu', 'adimiculescu@gmail.com', '$2y$10$zHuvRi7pIPukrduDlTX8se8LVsYgXALlHe36XVYN.dFR3BNSvNCPm', '2019-11-16 23:04:17'),
(3, 1, 'Corha Gratiela-Andreea', 'andreeatheboss', 'corha.gratiela@gmail.com', '$2y$10$igYP/AT.Scg1fwvTII3O...kBZPQRyeEI1LZGV0oZxbtSzSreR9PK', '2019-11-16 23:04:56'),
(4, 1, 'Gratzi Gr', 'andreeagratzi', 'deeagratzi@yahoo.com', '$2y$10$11fSFvogzHxIf/weD8CKMOBWEWiSz79GhaLYa3jGg5c2IIWvzr0HS', '2020-01-06 23:04:00'),
(5, 0, 'Stefan Despot', 'stefandespot', 'stefandespot@gmail.com', '$2y$10$0db9eJccOrvMvTdJVXtQvupUzVp4aWcpd6qti.1L9PSq0aaZgGFkW', '2020-01-10 17:52:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentetMovies`
--
ALTER TABLE `rentetMovies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rentetMovies`
--
ALTER TABLE `rentetMovies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
