-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2017 at 07:25 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `statevocational`
--

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `Id` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `other_details` varchar(1000) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`Id`, `School_Id`, `Name`, `Type`, `Capacity`, `other_details`, `Status`) VALUES
(1, 1, 'Test Facility One', 'Hostels', 34, 'test facility other', 1),
(2, 2, 'Test Facility Two', 'LectureHalls', 56, '', 1),
(14, 1, 'Test Facility Three', 'LectureHalls', 67, '', 1),
(15, 1, 'Test Facility Test Four', 'Others', 100, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Other_Details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`Id`, `Name`, `Location`, `Capacity`, `Other_Details`) VALUES
(1, 'Test School One', 'Test Location One', 400, 'Other Details'),
(2, 'Test School Two', 'Test Location Two', 600, 'Other Details Two');

-- --------------------------------------------------------

--
-- Table structure for table `sch_alumni_records`
--

CREATE TABLE `sch_alumni_records` (
  `Id` int(11) NOT NULL,
  `FName` varchar(100) NOT NULL,
  `LName` varchar(100) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `Other_Info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sch_courses`
--

CREATE TABLE `sch_courses` (
  `Id` int(11) NOT NULL,
  `course_Name` varchar(100) NOT NULL,
  `school_Id` int(11) NOT NULL,
  `other_Info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_courses`
--

INSERT INTO `sch_courses` (`Id`, `course_Name`, `school_Id`, `other_Info`) VALUES
(2, 'Bsc. Computer Engineering', 1, ''),
(3, 'Bsc. Computer Engineering', 2, ''),
(4, 'Bsc. Computer Engineering', 2, ''),
(5, 'Bsc. Computer Science', 1, 'Test Other Details');

-- --------------------------------------------------------

--
-- Table structure for table `sch_extra_curriculum`
--

CREATE TABLE `sch_extra_curriculum` (
  `Id` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `other_details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sch_funds_disbursement`
--

CREATE TABLE `sch_funds_disbursement` (
  `Id` int(11) NOT NULL,
  `fund_name` varchar(100) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `OtherInfo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_funds_disbursement`
--

INSERT INTO `sch_funds_disbursement` (`Id`, `fund_name`, `School_Id`, `Amount`, `OtherInfo`) VALUES
(1, 'Fund One', 1, 100, ''),
(2, 'Fund One', 2, 4500, ''),
(3, 'Fund Two', 1, 560, ''),
(4, 'Fund Two', 2, 456, 'Test other details');

-- --------------------------------------------------------

--
-- Table structure for table `sch_funds_usage`
--

CREATE TABLE `sch_funds_usage` (
  `Id` int(11) NOT NULL,
  `Fund_Id` int(11) NOT NULL,
  `Usage_Reason` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `Other_Info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sch_training_equipment`
--

CREATE TABLE `sch_training_equipment` (
  `Id` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Cost` int(11) NOT NULL,
  `Other_Info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_training_equipment`
--

INSERT INTO `sch_training_equipment` (`Id`, `School_Id`, `Name`, `Cost`, `Other_Info`) VALUES
(1, 1, 'Training Equipment One', 546, ''),
(2, 2, 'Training Equipment One', 567, 'test other details');

-- --------------------------------------------------------

--
-- Table structure for table `sch_university_affiliations`
--

CREATE TABLE `sch_university_affiliations` (
  `Id` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `University_Name` varchar(100) NOT NULL,
  `Other_Info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `Id` int(11) NOT NULL,
  `student_Id` int(11) NOT NULL,
  `date` date NOT NULL,
  `attendance` tinyint(4) NOT NULL,
  `Other_Info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`Id`, `student_Id`, `date`, `attendance`, `Other_Info`) VALUES
(1, 1, '2017-09-10', 1, 'Present'),
(2, 1, '2017-09-11', 1, ''),
(3, 1, '2017-09-17', 1, ''),
(4, 1, '2017-09-16', 1, ''),
(5, 2, '2017-09-16', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `Id` int(11) NOT NULL,
  `student_no` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Personal_Id` int(11) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `course_Id` int(11) NOT NULL,
  `school_Id` int(11) NOT NULL,
  `other_Info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`Id`, `student_no`, `Name`, `Personal_Id`, `gender`, `course_Id`, `school_Id`, `other_Info`) VALUES
(1, 6812, 'Arnold Shangala Mwadwaa', 26686380, 'Male', 2, 1, 'Test Details'),
(2, 6813, 'Manasseh Mwadwaa Shangala', 49807650, 'Male', 5, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_discipline`
--

CREATE TABLE `student_discipline` (
  `Id` int(11) NOT NULL,
  `student_Id` int(11) NOT NULL,
  `discipline_Record` varchar(300) NOT NULL,
  `other_Info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `other_details` varchar(1000) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `userFor` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `username`, `password`, `other_details`, `schoolid`, `userFor`) VALUES
(3, 'admin', '202cb962ac59075b964b07152d234b70', '', 1, 1),
(4, 'admin', '202cb962ac59075b964b07152d234b70', '', 2, 1),
(5, 'admin', '202cb962ac59075b964b07152d234b70', 'board administrator', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `School_Id` (`School_Id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `sch_alumni_records`
--
ALTER TABLE `sch_alumni_records`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `StudentId` (`StudentId`);

--
-- Indexes for table `sch_courses`
--
ALTER TABLE `sch_courses`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `school_Id` (`school_Id`);

--
-- Indexes for table `sch_extra_curriculum`
--
ALTER TABLE `sch_extra_curriculum`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `School_Id` (`School_Id`);

--
-- Indexes for table `sch_funds_disbursement`
--
ALTER TABLE `sch_funds_disbursement`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `School_Id` (`School_Id`);

--
-- Indexes for table `sch_funds_usage`
--
ALTER TABLE `sch_funds_usage`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Fund_Id` (`Fund_Id`);

--
-- Indexes for table `sch_training_equipment`
--
ALTER TABLE `sch_training_equipment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `School_Id` (`School_Id`);

--
-- Indexes for table `sch_university_affiliations`
--
ALTER TABLE `sch_university_affiliations`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `School_Id` (`School_Id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `student_Id` (`student_Id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `student_no` (`student_no`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Personal_Id` (`Personal_Id`),
  ADD KEY `course_Id` (`course_Id`),
  ADD KEY `school_Id` (`school_Id`);

--
-- Indexes for table `student_discipline`
--
ALTER TABLE `student_discipline`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `student_Id` (`student_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `schoolid` (`schoolid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sch_alumni_records`
--
ALTER TABLE `sch_alumni_records`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sch_courses`
--
ALTER TABLE `sch_courses`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sch_extra_curriculum`
--
ALTER TABLE `sch_extra_curriculum`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sch_funds_disbursement`
--
ALTER TABLE `sch_funds_disbursement`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sch_funds_usage`
--
ALTER TABLE `sch_funds_usage`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sch_training_equipment`
--
ALTER TABLE `sch_training_equipment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sch_university_affiliations`
--
ALTER TABLE `sch_university_affiliations`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_discipline`
--
ALTER TABLE `student_discipline`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `facility`
--
ALTER TABLE `facility`
  ADD CONSTRAINT `facility_ibfk_2` FOREIGN KEY (`School_Id`) REFERENCES `school` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sch_alumni_records`
--
ALTER TABLE `sch_alumni_records`
  ADD CONSTRAINT `sch_alumni_records_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `student_details` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sch_courses`
--
ALTER TABLE `sch_courses`
  ADD CONSTRAINT `sch_courses_ibfk_1` FOREIGN KEY (`school_Id`) REFERENCES `school` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sch_extra_curriculum`
--
ALTER TABLE `sch_extra_curriculum`
  ADD CONSTRAINT `sch_extra_curriculum_ibfk_1` FOREIGN KEY (`School_Id`) REFERENCES `school` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sch_funds_disbursement`
--
ALTER TABLE `sch_funds_disbursement`
  ADD CONSTRAINT `sch_funds_disbursement_ibfk_1` FOREIGN KEY (`School_Id`) REFERENCES `school` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sch_funds_usage`
--
ALTER TABLE `sch_funds_usage`
  ADD CONSTRAINT `sch_funds_usage_ibfk_1` FOREIGN KEY (`Fund_Id`) REFERENCES `sch_funds_disbursement` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sch_training_equipment`
--
ALTER TABLE `sch_training_equipment`
  ADD CONSTRAINT `sch_training_equipment_ibfk_1` FOREIGN KEY (`School_Id`) REFERENCES `school` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sch_university_affiliations`
--
ALTER TABLE `sch_university_affiliations`
  ADD CONSTRAINT `sch_university_affiliations_ibfk_1` FOREIGN KEY (`School_Id`) REFERENCES `school` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_attendance_ibfk_1` FOREIGN KEY (`student_Id`) REFERENCES `student_details` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
  ADD CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`course_Id`) REFERENCES `sch_courses` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_details_ibfk_2` FOREIGN KEY (`school_Id`) REFERENCES `school` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_discipline`
--
ALTER TABLE `student_discipline`
  ADD CONSTRAINT `student_discipline_ibfk_1` FOREIGN KEY (`student_Id`) REFERENCES `student_details` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`schoolid`) REFERENCES `school` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
