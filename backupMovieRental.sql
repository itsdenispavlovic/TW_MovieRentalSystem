-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 12:34 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

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
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `image`, `content`, `date_created`) VALUES
(1, 'I am Legend', 'movie1.jpeg', 'I Am Legend is a 2007 American post-apocalyptic film based on the 1954 novel of the same name by Richard Matheson, directed by Francis Lawrence and starring Will Smith, who plays US Army virologist Robert Neville.', '2019-11-16 21:33:49'),
(2, 'Joker', 'movie2.jpeg', 'Joker is a 2019 American psychological thriller film directed and produced by Todd Phillips, who co-wrote the screenplay with Scott Silver. The film, based on DC Comics characters, stars Joaquin Phoenix as the Joker.', '2019-11-16 21:40:22'),
(3, 'Fifty Shades Of Grey', 'movie3.jpg', 'The worldwide phenomenon comes to life in Fifty Shades of Grey, starring Dakota Johnson and Jamie Dornan in the iconic roles of Anastasia Steele and Christian Grey.', '2019-11-16 21:40:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rentetMovies`
--

INSERT INTO `rentetMovies` (`id`, `uid`, `mid`, `generatedCode`, `start`, `end`, `date_created`) VALUES
(2, 1, 2, 'n7dn86ezwbxp46iz', '2019-11-20', '2019-11-21', '2019-11-17 11:17:52'),
(4, 1, 1, 'qhsnma6srvkick3u', '2019-11-18', '2019-11-27', '2019-11-17 13:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `date_created`) VALUES
(1, 'Denis Pavlovic', 'itsdenispavlovic', 'pavlovicdenis@icloud.com', '$2y$10$FPKTtvLZrivEqYra2oheMOKA5.FmkJR0P07lQ0X8GEDNEQfFfk5FC', '2019-11-16 23:01:32'),
(2, 'Adrian Miculescu', 'adimiculescu', 'adimiculescu@gmail.com', '$2y$10$zHuvRi7pIPukrduDlTX8se8LVsYgXALlHe36XVYN.dFR3BNSvNCPm', '2019-11-16 23:04:17'),
(3, 'Corha Gratiela-Andreea', 'andreeatheboss', 'corha.gratiela@gmail.com', '$2y$10$igYP/AT.Scg1fwvTII3O...kBZPQRyeEI1LZGV0oZxbtSzSreR9PK', '2019-11-16 23:04:56');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rentetMovies`
--
ALTER TABLE `rentetMovies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
