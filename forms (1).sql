-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 07:48 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forms`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cname` varchar(255) DEFAULT NULL,
  `sid` int(255) NOT NULL,
  `semail` varchar(255) DEFAULT NULL,
  `cnumber` int(255) NOT NULL,
  `coid` int(255) NOT NULL,
  `formnumber` int(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cemail` varchar(255) NOT NULL,
  `caddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cname`, `sid`, `semail`, `cnumber`, `coid`, `formnumber`, `time`, `cemail`, `caddress`) VALUES
('dwqd', 1, 'cdeepak@gmail', 321312, 1, 1, '2020-11-13 05:30:53', 'qdwd', 'wedwd'),
('ewfsc', 1, 'cdeepak@gmail', 2112, 2, 1, '2020-11-13 05:37:46', 'qwd', 'sadsa');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `primary1` varchar(255) DEFAULT NULL,
  `higherprimary1` varchar(255) DEFAULT NULL,
  `puc` varchar(255) DEFAULT NULL,
  `undergraduation` varchar(255) DEFAULT NULL,
  `ssid` int(255) NOT NULL,
  `ssemail` varchar(255) NOT NULL,
  `formno` int(255) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`primary1`, `higherprimary1`, `puc`, `undergraduation`, `ssid`, `ssemail`, `formno`, `time`) VALUES
('ss', 'ss', 'ss', 'ss', 1, 'cdeepak@gmail', 2, '2020-11-30 05:38:38.000000');

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `uid` int(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `fnumber` int(255) NOT NULL,
  `upassword` int(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`uid`, `uemail`, `fnumber`, `upassword`, `id`) VALUES
(1, 'cdeepak@gmail', 1, 1234, 8),
(6, 'cdeepak@gmail1', 1, 11, 9),
(1, 'cdeepak@gmail', 2, 123, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'deepak', 'cdeepak@gmail', 12),
(2, '2ewd', 'cd@qwd', 12),
(3, 'wdc', 'cde@ewfdwe', 12),
(4, '12dwq', 'cd@2wdwq', 12),
(5, '4ewfc', 'cdfdewd@wcw', 12),
(6, 'deepu', 'cdeepak@gmail1', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`coid`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `coid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `password`
--
ALTER TABLE `password`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
