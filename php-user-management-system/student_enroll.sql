-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2016 at 05:55 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

CREATE DATABASE student_enroll;
USE student_enroll;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student_enroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_type` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_name`, `admin_email`, `admin_pass`, `admin_type`) VALUES
(10, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`stud_id` int(11) NOT NULL,
  `stud_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stud_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stud_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stud_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stud_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stud_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stud_type` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `stud_status` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_username`, `stud_name`, `stud_email`, `stud_pass`, `stud_address`, `stud_phone`, `course_name`, `stud_type`, `stud_status`) VALUES
(23, 'ron', 'ronaldo', 'ron@gmail.com', '45798f269709550d6f6e1d2cf4b7d485', 'leicester', '5647', '0', 'Student', 'active'),
(32, 'student', '', 'student@gmail.com', 'cd73502828457d15655bbd7a63fb0bc8', '', '', 'B.Sc', 'Student', 'active'),
(34, 'khan', '', 'khan@gmail.com', '9e95f6d797987b7da0fb293a760fe57e', '', '', 'B.Sc', 'Student', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `student_admin`
--

CREATE TABLE IF NOT EXISTS `student_admin` (
`stud_admin_id` int(11) NOT NULL,
  `stud_admin_uname` varchar(255) NOT NULL,
  `stud_admin_name` varchar(255) NOT NULL,
  `stud_admin_email` varchar(255) NOT NULL,
  `stud_admin_pass` varchar(255) NOT NULL,
  `stud_admin_address` varchar(255) NOT NULL,
  `stud_admin_phone` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `stud_admin_type` varchar(40) NOT NULL,
  `stud_admin_status` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student_admin`
--

INSERT INTO `student_admin` (`stud_admin_id`, `stud_admin_uname`, `stud_admin_name`, `stud_admin_email`, `stud_admin_pass`, `stud_admin_address`, `stud_admin_phone`, `course_name`, `stud_admin_type`, `stud_admin_status`) VALUES
(6, 'studadmin', 'student Admin', 'studadmin@gmail.com', '322ce8dceba71eec6f3e251cc48cbe9b', 'Las Vegas', '123345', 'B.Sc', 'Student Admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_status` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_type`, `user_status`) VALUES
(10, 'ron', 'ron@gmail.com', '45798f269709550d6f6e1d2cf4b7d485', 'Student', 'active'),
(28, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', ''),
(29, 'student', 'student@gmail.com', 'cd73502828457d15655bbd7a63fb0bc8', 'Student', 'active'),
(30, 'studadmin', 'studadmin@gmail.com', '322ce8dceba71eec6f3e251cc48cbe9b', 'Student Admin', 'active'),
(32, 'khan', 'khan@gmail.com', '9e95f6d797987b7da0fb293a760fe57e', 'Student', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `student_admin`
--
ALTER TABLE `student_admin`
 ADD PRIMARY KEY (`stud_admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `student_admin`
--
ALTER TABLE `student_admin`
MODIFY `stud_admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
