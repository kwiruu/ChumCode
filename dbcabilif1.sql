-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 04:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcabilif1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblactivityrecord`
--

CREATE TABLE `tblactivityrecord` (
  `activityID` bigint(20) NOT NULL,
  `activityName` varchar(32) NOT NULL,
  `activityDescription` varchar(300) NOT NULL,
  `dueDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblactivityrecord`
--

INSERT INTO `tblactivityrecord` (`activityID`, `activityName`, `activityDescription`, `dueDate`) VALUES
(1, 'asdasd', 'asdasdad', '2024-05-01'),
(2, 'Create HTML Prof', 'create a portfolio', '2024-05-18'),
(3, 'React JS', 'make a hook folder page for you portfolio', '2024-05-11'),
(4, 'React JS', 'make a hook folder page for you portfolio', '2024-05-11'),
(5, 'Create Index Pag', 'index page for you profile is essential and crucial for you portfolio', '2024-05-11'),
(6, 'Learn Java', 'asdasd', '2024-05-02'),
(7, 'Learn Python 3', 'Learn the basics of Python 3, one of the most powerful, versatile, and in-demand programming languages today.', '2024-06-12'),
(8, 'Learn Python 5', 'Learn the basics of Python 5, one of the most powerful, versatile, and in-demand programming languages today.', '2024-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentrecord`
--

CREATE TABLE `tblstudentrecord` (
  `studentID` bigint(20) NOT NULL,
  `acctid_fk_studentrecord` bigint(20) NOT NULL,
  `course` enum('BSIT','BSCS','ETC') NOT NULL,
  `gradelvl` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudentrecord`
--

INSERT INTO `tblstudentrecord` (`studentID`, `acctid_fk_studentrecord`, `course`, `gradelvl`) VALUES
(4, 9, 'BSIT', 2),
(5, 10, 'BSIT', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblteacherrecord`
--

CREATE TABLE `tblteacherrecord` (
  `teacherID` bigint(20) NOT NULL,
  `acctid_fk_teacherrecord` bigint(20) NOT NULL,
  `course` enum('BSIT','BSCS','ETC') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblteacherrecord`
--

INSERT INTO `tblteacherrecord` (`teacherID`, `acctid_fk_teacherrecord`, `course`) VALUES
(3, 11, 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `acctid` bigint(20) NOT NULL COMMENT 'primary key, foreignkey to tbluserprofile',
  `emailadd` text NOT NULL COMMENT 'email address of the user',
  `username` varchar(50) NOT NULL COMMENT 'username',
  `password` varchar(50) NOT NULL COMMENT 'password',
  `usertype` enum('student','teacher') NOT NULL COMMENT 'Must be Student or Teacher'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`acctid`, `emailadd`, `username`, `password`, `usertype`) VALUES
(9, 'keiru277@gmail.com', 'keiru277', '01230321', 'student'),
(10, 'kurtcabili@gmail.com', 'kurt277', '01230321', 'student'),
(11, 'keiru277@gmail.com', 'keiru277377', '01230321', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE `tbluserprofile` (
  `userid` bigint(20) UNSIGNED NOT NULL COMMENT 'UserID of the User',
  `acctid_fk_userprofile` bigint(20) NOT NULL,
  `firstname` varchar(50) NOT NULL COMMENT 'First name of the user',
  `lastname` varchar(50) NOT NULL COMMENT 'Last name of the user',
  `gender` varchar(25) NOT NULL COMMENT 'Gender of the user',
  `birthdate` date NOT NULL COMMENT 'Birthdate of the user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Profile of the user';

--
-- Dumping data for table `tbluserprofile`
--

INSERT INTO `tbluserprofile` (`userid`, `acctid_fk_userprofile`, `firstname`, `lastname`, `gender`, `birthdate`) VALUES
(27, 9, 'Keiru Vent', 'Cabili', 'male', '2004-06-03'),
(28, 10, 'Kurt', 'Cabili', 'male', '2024-03-31'),
(29, 11, 'Keiru Vent', 'Cabili', 'female', '2024-04-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblactivityrecord`
--
ALTER TABLE `tblactivityrecord`
  ADD PRIMARY KEY (`activityID`);

--
-- Indexes for table `tblstudentrecord`
--
ALTER TABLE `tblstudentrecord`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `acctid_fk_studentrecord` (`acctid_fk_studentrecord`);

--
-- Indexes for table `tblteacherrecord`
--
ALTER TABLE `tblteacherrecord`
  ADD PRIMARY KEY (`teacherID`),
  ADD KEY `acctid_fk_teacherrecord` (`acctid_fk_teacherrecord`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`acctid`),
  ADD KEY `acctid_fk` (`acctid`);

--
-- Indexes for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD KEY `acctid_fk` (`acctid_fk_userprofile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblactivityrecord`
--
ALTER TABLE `tblactivityrecord`
  MODIFY `activityID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblstudentrecord`
--
ALTER TABLE `tblstudentrecord`
  MODIFY `studentID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblteacherrecord`
--
ALTER TABLE `tblteacherrecord`
  MODIFY `teacherID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `acctid` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary key, foreignkey to tbluserprofile', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'UserID of the User', AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblstudentrecord`
--
ALTER TABLE `tblstudentrecord`
  ADD CONSTRAINT `acctid_fk_studentrecord` FOREIGN KEY (`acctid_fk_studentrecord`) REFERENCES `tbluseraccount` (`acctid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblteacherrecord`
--
ALTER TABLE `tblteacherrecord`
  ADD CONSTRAINT `acctid_fk_teacherrecord` FOREIGN KEY (`acctid_fk_teacherrecord`) REFERENCES `tbluseraccount` (`acctid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD CONSTRAINT `acctid_fk` FOREIGN KEY (`acctid_fk_userprofile`) REFERENCES `tbluseraccount` (`acctid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
