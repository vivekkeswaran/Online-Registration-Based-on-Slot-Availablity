-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2017 at 01:39 AM
-- Server version: 10.1.25-MariaDB
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
-- Database: `my_database`
--
CREATE DATABASE IF NOT EXISTS `my_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `my_database`;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `SID` varchar(255) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `EMAIL_ADDRESS` varchar(255) NOT NULL,
  `TIMESLOT_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`SID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL_ADDRESS`, `TIMESLOT_ID`) VALUES
('vr2556', 'john', 'smith', 'john.smith@horizon.csueastbay', 1),
('uv6734', 'ricky', 'ponting', 'ricky.ponting@gmail.com', 2),
('xw4768', 'Vivek', 'Eswaran', 'vivekkeswaran@gmail.com', 2),
('xzsd78', 'sam', 'sam', 'sam@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `timeslot_details`
--

DROP TABLE IF EXISTS `timeslot_details`;
CREATE TABLE `timeslot_details` (
  `ID` int(10) NOT NULL,
  `TIMESLOT` varchar(255) NOT NULL,
  `SEATS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot_details`
--

INSERT INTO `timeslot_details` (`ID`, `TIMESLOT`, `SEATS`) VALUES
(1, 'Monday 15:00-17:00', '7'),
(2, 'Tuesday 14:00-16:00', '6'),
(3, 'Thursday 11:00-13:00', '8'),
(4, 'Friday 10:00-12:00', '7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `TIMESLOT_ID` (`TIMESLOT_ID`);

--
-- Indexes for table `timeslot_details`
--
ALTER TABLE `timeslot_details`
  ADD PRIMARY KEY (`ID`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timeslot_details`
--
ALTER TABLE `timeslot_details`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `Fk_TimeSlot` FOREIGN KEY (`TIMESLOT_ID`) REFERENCES `timeslot_details` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
