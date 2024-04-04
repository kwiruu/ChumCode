-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 04:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
-- Table structure for table `tblstudentrecord`
--

CREATE TABLE `tblstudentrecord` (
  `studentID` int(6) NOT NULL,
  `course` enum('BSIT','BSCS','ETC') NOT NULL,
  `gradelvl` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudentrecord`
--

INSERT INTO `tblstudentrecord` (`studentID`, `course`, `gradelvl`) VALUES
(1, 'BSIT', 14),
(2, 'BSIT', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblteacherrecord`
--

CREATE TABLE `tblteacherrecord` (
  `teacherID` int(6) NOT NULL,
  `course` enum('BSIT','BSCS','ETC') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblteacherrecord`
--

INSERT INTO `tblteacherrecord` (`teacherID`, `course`) VALUES
(1, 'BSIT'),
(2, 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `acctid` bigint(20) UNSIGNED NOT NULL COMMENT 'Account Id of the user',
  `emailadd` text NOT NULL COMMENT 'email address of the user',
  `username` varchar(50) NOT NULL COMMENT 'username',
  `password` varchar(50) NOT NULL COMMENT 'password',
  `usertype` enum('student','teacher') NOT NULL COMMENT 'Must be Student or Teacher'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`acctid`, `emailadd`, `username`, `password`, `usertype`) VALUES
(13, 'keiruvent.cabili@cit.edu', 'keiru277', '01230321', 'student'),
(14, 'kurtcabili@gmail.com', 'kurt277', '01230321', 'student'),
(15, 'alecgiuseppe.so@cit.edu', 'alec212', '01230321', 'student'),
(16, 'asdasdsadasd', 'asdasdad', 'asdadasd', 'student'),
(18, 'asdasd', 'valasdadaaaotenbilatolokoten', 'asdasda', 'student'),
(19, 'asdasd', 'valasdadaaaotenbilatolokotenasda', 'asdasd', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE `tbluserprofile` (
  `userid` bigint(20) UNSIGNED NOT NULL COMMENT 'UserID of the User',
  `firstname` varchar(50) NOT NULL COMMENT 'First name of the user',
  `lastname` varchar(50) NOT NULL COMMENT 'Last name of the user',
  `gender` varchar(25) NOT NULL COMMENT 'Gender of the user',
  `birthdate` date NOT NULL COMMENT 'Birthdate of the user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Profile of the user';

--
-- Dumping data for table `tbluserprofile`
--

INSERT INTO `tbluserprofile` (`userid`, `firstname`, `lastname`, `gender`, `birthdate`) VALUES
(15, 'Keiru', 'Cabili', 'male', '2004-06-03'),
(16, 'Kurt', 'Cabili', 'male', '2006-01-12'),
(17, 'Alec Giuseppe', 'So', 'male', '2000-07-06'),
(21, 'asdasdasd', 'asdasd', 'female', '2024-04-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblstudentrecord`
--
ALTER TABLE `tblstudentrecord`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `tblteacherrecord`
--
ALTER TABLE `tblteacherrecord`
  ADD PRIMARY KEY (`teacherID`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`acctid`),
  ADD UNIQUE KEY `acctid` (`acctid`);

--
-- Indexes for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblstudentrecord`
--
ALTER TABLE `tblstudentrecord`
  MODIFY `studentID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblteacherrecord`
--
ALTER TABLE `tblteacherrecord`
  MODIFY `teacherID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `acctid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Account Id of the user', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'UserID of the User', AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
