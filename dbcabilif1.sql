-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 04:36 PM
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
  `dueDate` date NOT NULL,
  `fk_courseID` bigint(20) NOT NULL COMMENT 'This refers to courseID',
  `fk_teacherID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblactivityrecord`
--

INSERT INTO `tblactivityrecord` (`activityID`, `activityName`, `activityDescription`, `dueDate`, `fk_courseID`, `fk_teacherID`) VALUES
(26, 'Create Hello World', 'Display hello world', '2024-05-08', 86, 6),
(32, 'Gauss Jordan', 'Learn Gauss Jordan trough yt video!', '2024-06-07', 91, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `courseID` bigint(20) NOT NULL,
  `courseName` varchar(100) NOT NULL COMMENT 'For Course Name',
  `courseDescription` varchar(250) NOT NULL COMMENT 'This is for Course Description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`courseID`, `courseName`, `courseDescription`) VALUES
(86, 'CSIT201', 'Learn basic web development'),
(91, 'CS234', 'Special Topics in Mathematics'),
(93, 'ES036B', 'Environmental Science'),
(95, 'CSIT226', 'Information Management 1'),
(110, 'CSIT228', 'Object Oriented Programming 2');

-- --------------------------------------------------------

--
-- Table structure for table `tblcoursestudent`
--
-- Error reading structure for table dbcabilif1.tblcoursestudent: #1932 - Table &#039;dbcabilif1.tblcoursestudent&#039; doesn&#039;t exist in engine
-- Error reading data for table dbcabilif1.tblcoursestudent: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `dbcabilif1`.`tblcoursestudent`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `tblcourseteacher`
--

CREATE TABLE `tblcourseteacher` (
  `courseTeacherID` bigint(20) NOT NULL,
  `fk_teacherID` bigint(20) NOT NULL,
  `fk_courseID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcourseteacher`
--

INSERT INTO `tblcourseteacher` (`courseTeacherID`, `fk_teacherID`, `fk_courseID`) VALUES
(31, 6, 86),
(32, 6, 86),
(33, 6, 86),
(34, 6, 91),
(35, 6, 91),
(36, 8, 110);

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
(8, 18, 'BSIT', 4),
(9, 19, 'BSIT', 4),
(10, 20, 'BSIT', 4);

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
(5, 14, 'BSCS'),
(6, 15, 'BSCS'),
(8, 21, 'BSCS');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `acctid` bigint(20) NOT NULL COMMENT 'primary key, foreignkey to tbluserprofile',
  `emailadd` text NOT NULL COMMENT 'email address of the user',
  `username` varchar(50) NOT NULL COMMENT 'username',
  `password` varchar(50) NOT NULL COMMENT 'password',
  `usertype` enum('student','teacher') NOT NULL COMMENT 'Must be Student or Teacher',
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`acctid`, `emailadd`, `username`, `password`, `usertype`, `isActive`) VALUES
(14, 'teacher', 'teacher_username', 'teacher', 'teacher', 1),
(15, 'teacher', 'teacher', 'teacher', 'teacher', 0),
(18, 'student@gmail.com', 'student', 'student', 'student', 0),
(19, 'keiru@gmail.com', 'keiru', '123456', 'student', 1),
(20, 'keiru277@gmail.com', 'kwiruu', '123', 'student', 1),
(21, 'kurtcabili@gmail.com', 'teacherz', '123', 'teacher', 1);

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
(33, 15, 'teacherFname', 'teacherLname', 'male', '2024-05-10'),
(36, 18, 'studentName', 'StudentLname', 'male', '2024-05-16'),
(37, 19, 'Keiru', 'Cabili', 'male', '2024-05-16'),
(38, 20, 'Keiru vent', 'Cabili', 'female', '2004-06-03'),
(39, 21, 'Kurt', 'Cabili', 'female', '1990-01-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblactivityrecord`
--
ALTER TABLE `tblactivityrecord`
  ADD PRIMARY KEY (`activityID`),
  ADD KEY `fk_courseID` (`fk_courseID`),
  ADD KEY `fk_teacherID` (`fk_teacherID`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `tblcourseteacher`
--
ALTER TABLE `tblcourseteacher`
  ADD PRIMARY KEY (`courseTeacherID`),
  ADD KEY `teacherID` (`fk_teacherID`),
  ADD KEY `fk_courseID` (`fk_courseID`);

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
  MODIFY `activityID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `courseID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tblcourseteacher`
--
ALTER TABLE `tblcourseteacher`
  MODIFY `courseTeacherID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblstudentrecord`
--
ALTER TABLE `tblstudentrecord`
  MODIFY `studentID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblteacherrecord`
--
ALTER TABLE `tblteacherrecord`
  MODIFY `teacherID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `acctid` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary key, foreignkey to tbluserprofile', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'UserID of the User', AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblactivityrecord`
--
ALTER TABLE `tblactivityrecord`
  ADD CONSTRAINT `fk_courseID` FOREIGN KEY (`fk_courseID`) REFERENCES `tblcourse` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teacherID` FOREIGN KEY (`fk_teacherID`) REFERENCES `tblteacherrecord` (`teacherID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblcourseteacher`
--
ALTER TABLE `tblcourseteacher`
  ADD CONSTRAINT `coursefk` FOREIGN KEY (`fk_courseID`) REFERENCES `tblcourse` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacherID` FOREIGN KEY (`fk_teacherID`) REFERENCES `tblteacherrecord` (`teacherID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
