-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2020 at 03:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poetry`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `username` varchar(50) NOT NULL,
  `poemid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`username`, `poemid`) VALUES
('admin', 30),
('admin', 30),
('test1', 30),
('test1', 30),
('test1', 29),
('aq', 37),
('test1', 37),
('test1', 43);

-- --------------------------------------------------------

--
-- Table structure for table `poems`
--

CREATE TABLE `poems` (
  `poemid` int(11) NOT NULL,
  `poem` longtext NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poems`
--

INSERT INTO `poems` (`poemid`, `poem`, `fname`, `lname`, `time`, `username`) VALUES
(29, '', 'Admin', '', '2020-01-20 23:17:42', 'admin'),
(30, 'bbbbbb', 'Admin', '', '2020-01-20 23:42:26', 'admin'),
(37, '', 'AbdulRahman', 'Qabbout', '2020-01-21 08:03:55', 'aq'),
(41, 'bla bla bla', 'Admin', '', '2020-01-22 22:23:47', 'admin'),
(43, '', 'test1', 'test1', '2020-01-22 23:08:57', 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `poets`
--

CREATE TABLE `poets` (
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poets`
--

INSERT INTO `poets` (`username`, `password`, `fname`, `lname`) VALUES
('admin', 'admin', 'Admin', ''),
('aq', 'aq', 'AbdulRahman', 'Qabbout'),
('test1', 'test1', 'test1', 'test1'),
('test2', 'test2', 'test2', 'test2'),
('test3', 'test3', 'test3', 'test3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD KEY `username` (`username`),
  ADD KEY `poemid` (`poemid`);

--
-- Indexes for table `poems`
--
ALTER TABLE `poems`
  ADD PRIMARY KEY (`poemid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `poets`
--
ALTER TABLE `poets`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poems`
--
ALTER TABLE `poems`
  MODIFY `poemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`poemid`) REFERENCES `poems` (`poemid`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`username`) REFERENCES `poets` (`username`);

--
-- Constraints for table `poems`
--
ALTER TABLE `poems`
  ADD CONSTRAINT `poems_ibfk_1` FOREIGN KEY (`username`) REFERENCES `poets` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
