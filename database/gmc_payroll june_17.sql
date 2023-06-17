-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 03:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gmc_payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `deductionID` int(11) NOT NULL,
  `deduction_name` varchar(30) NOT NULL,
  `deduction_amount` double(9,2) NOT NULL DEFAULT 0.00,
  `deduction_date` date NOT NULL,
  `deduction_status` char(1) NOT NULL DEFAULT '1',
  `userInfoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`deductionID`, `deduction_name`, `deduction_amount`, `deduction_date`, `deduction_status`, `userInfoID`) VALUES
(2, 'SSS', 200.00, '2022-06-15', '1', 53),
(3, 'SSS', 200.00, '2022-06-15', '1', 57),
(5, 'Philhealth', 150.00, '2022-06-16', '1', 57),
(8, 'Philhealth', 100.00, '2022-06-16', '1', 53),
(9, 'test', 300.00, '2022-06-16', '1', 53);

-- --------------------------------------------------------

--
-- Table structure for table `employeeattendance`
--

CREATE TABLE `employeeattendance` (
  `attendanceID` int(11) NOT NULL,
  `timeIn` time NOT NULL,
  `timedOut` time DEFAULT NULL,
  `workingHour` int(11) NOT NULL DEFAULT 0,
  `overTime` int(11) NOT NULL DEFAULT 0,
  `attendanceDate` date NOT NULL,
  `attendanceStatus` varchar(8) NOT NULL,
  `userInfoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeeattendance`
--

INSERT INTO `employeeattendance` (`attendanceID`, `timeIn`, `timedOut`, `workingHour`, `overTime`, `attendanceDate`, `attendanceStatus`, `userInfoID`) VALUES
(42, '08:00:00', '17:00:00', 9, 0, '2022-05-19', 'modified', 53),
(43, '08:00:00', '21:00:00', 13, 4, '2022-05-29', 'modified', 53),
(44, '08:00:00', '18:00:00', 12, 4, '2022-05-26', 'modified', 57);

-- --------------------------------------------------------

--
-- Table structure for table `employeeprojectrecords`
--

CREATE TABLE `employeeprojectrecords` (
  `employeeRecordID` int(11) NOT NULL,
  `employeeID` char(8) NOT NULL,
  `projectID` int(11) NOT NULL,
  `dateAssigned` date NOT NULL,
  `recordStatus` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `positionlist`
--

CREATE TABLE `positionlist` (
  `positionID` int(11) NOT NULL,
  `positionName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positionlist`
--

INSERT INTO `positionlist` (`positionID`, `positionName`) VALUES
(1, 'Not Assign '),
(2, 'Mechanical'),
(3, 'Safety Officer'),
(4, 'Electrical');

-- --------------------------------------------------------

--
-- Table structure for table `projectdetails`
--

CREATE TABLE `projectdetails` (
  `projectID` int(11) NOT NULL,
  `projectName` varchar(30) NOT NULL,
  `projectLocation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projectdetails`
--

INSERT INTO `projectdetails` (`projectID`, `projectName`, `projectLocation`) VALUES
(2, 'Man Power Supply', 'Cabuyao'),
(3, 'Construction', 'Cabuyao');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userInfoID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `contactNumber` char(11) NOT NULL,
  `userAddress` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bday` date NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `registrationDate` date NOT NULL,
  `position` int(11) DEFAULT 1,
  `basicSalary` double(11,2) DEFAULT 0.00,
  `employeeID` char(8) NOT NULL,
  `employeeStatus` varchar(20) NOT NULL,
  `userPhoto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userInfoID`, `firstname`, `middlename`, `lastname`, `contactNumber`, `userAddress`, `gender`, `bday`, `emailAddress`, `registrationDate`, `position`, `basicSalary`, `employeeID`, `employeeStatus`, `userPhoto`) VALUES
(50, 'test', 'a', 'Torres', '09151234567', '196 Osmeña Street', 'Male', '2022-05-05', 'test@gmail.com', '2022-05-13', 3, 20000.00, 'GMC-0002', 'active', 0x494d472d36323764623130353137616430302e38353635363832312e6a7067),
(53, 'Patrick Allen', 'A', 'Solla', '09151234567', 'obando', 'Male', '2022-05-14', 'uploadsqwe@gmail.com', '2022-05-13', 4, 20000.00, 'admin', 'active', 0x494d472d36323764623339653938613834372e34353435323337302e6a7067),
(57, 'Angelico Guiller', 'G', 'Talag', '09123123123', 'Paco, Obando, Bulacan', 'Male', '1999-09-19', 'guiller@gmail.com', '2022-05-28', 4, 20000.00, 'GMC-0001', 'active', 0x494d472d36323931653761666431633336382e31383631343737312e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `userLoginID` int(11) NOT NULL,
  `userID` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `userType` int(1) NOT NULL,
  `registrationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`userLoginID`, `userID`, `pwd`, `userType`, `registrationDate`) VALUES
(45, 'GMC-0002', '$2y$10$KPXZ3Df06/NtkroLjRKMP.SgcRSBoxE4eutHn6bjUNAzwtJTl9Oxy', 1, '2022-05-13'),
(48, 'admin   ', '$2y$10$gnO9MbEg2E9AQl5Xnkho4u6.MN9rrVC7.9SBcA9agknt9jjboE91y', 3, '2022-05-13'),
(52, 'GMC-0001', '$2y$10$tKkwvWh0SPMfwTbN9pdBl.jdMPcKlB54yLBToXeZht.maWvXKozD6', 1, '2022-05-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`deductionID`);

--
-- Indexes for table `employeeattendance`
--
ALTER TABLE `employeeattendance`
  ADD PRIMARY KEY (`attendanceID`);

--
-- Indexes for table `employeeprojectrecords`
--
ALTER TABLE `employeeprojectrecords`
  ADD PRIMARY KEY (`employeeRecordID`);

--
-- Indexes for table `positionlist`
--
ALTER TABLE `positionlist`
  ADD PRIMARY KEY (`positionID`);

--
-- Indexes for table `projectdetails`
--
ALTER TABLE `projectdetails`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userInfoID`),
  ADD UNIQUE KEY `employeeID` (`employeeID`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`userLoginID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `deductionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employeeattendance`
--
ALTER TABLE `employeeattendance`
  MODIFY `attendanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `employeeprojectrecords`
--
ALTER TABLE `employeeprojectrecords`
  MODIFY `employeeRecordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `positionlist`
--
ALTER TABLE `positionlist`
  MODIFY `positionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projectdetails`
--
ALTER TABLE `projectdetails`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userInfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `userLoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD CONSTRAINT `userlogin_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `userinfo` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
