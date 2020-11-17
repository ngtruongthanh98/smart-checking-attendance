-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2020 at 05:27 PM
-- Server version: 10.3.25-MariaDB-0+deb10u1
-- PHP Version: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_table`
--

CREATE TABLE `attendance_table` (
  `id_atd` int(255) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `student_number` int(7) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `clock_in` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_table`
--

INSERT INTO `attendance_table` (`id_atd`, `first_name`, `last_name`, `student_number`, `class`, `clock_in`) VALUES
(1, 'Thanh', 'Nguyen Truong', 1652557, NULL, '2020-11-17 08:21:30'),
(2, 'Thanh', 'Nguyen Truong', 1652557, NULL, '2020-11-17 08:28:10'),
(3, 'Thanh', 'Nguyen Truong', 1652557, NULL, '2020-11-17 08:47:12'),
(4, 'Thanh', 'Nguyen Truong', 1652557, NULL, '2020-11-17 16:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `class_table`
--

CREATE TABLE `class_table` (
  `id_class` int(255) NOT NULL,
  `subject_code` varchar(10) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `class_code` varchar(10) DEFAULT NULL,
  `day_in_week` varchar(3) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_table`
--

INSERT INTO `class_table` (`id_class`, `subject_code`, `subject_name`, `class_code`, `day_in_week`, `start_time`, `end_time`, `room`) VALUES
(1, 'MT1003', 'Calculus 1', 'CC01', 'MON', '9:00', '11:50', '401B4'),
(2, 'PH1003', 'Physics 1', 'CC01', 'MON', '12:00', '14:50', '203A4'),
(3, 'MT1005', 'Calculus 2', 'CC02', 'TUE', '7:00', '9:50', '502B4'),
(4, 'CH1003', 'General Chemistry', 'CC03', 'WED', '12:00', '14:50', '405B4'),
(5, 'CO2013', 'Operating System', 'CC01', 'THU', '7:00', '9:50', '504B4'),
(6, 'MT1007', 'Linear Algebra', 'CC02', 'FRI', '12:00', '14:50', '402A4'),
(7, 'CO3053', 'Embedded System', 'CC02', 'SAT', '7:00', '9:50', '504B4');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `id_stu` int(10) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `student_number` int(7) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rfid_uid` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `created` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`id_stu`, `first_name`, `last_name`, `student_number`, `email`, `rfid_uid`, `class`, `created`) VALUES
(1, 'Thanh', 'Nguyen Truong', 1652557, '1652557@hcmut.edu.vn', '482227026359', NULL, '2020-10-30 10:30:37'),
(2, 'Quan', 'Nguyen Anh', 1552310, '1552310@hcmut.edu.vn', '798152693871', NULL, '2020-11-03 09:27:27'),
(3, 'Long', 'Nguyen Thanh', 1655353, 'ngtruongthanh98@gmail.com', '1071090732781', NULL, '2020-11-01 21:42:22'),
(4, 'Hang', 'Nguyen Thi Thu', 1656868, 'ngtruongthanh98@gmail.com', '1001985576659', NULL, '2020-11-09 14:46:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_table`
--
ALTER TABLE `attendance_table`
  ADD PRIMARY KEY (`id_atd`);

--
-- Indexes for table `class_table`
--
ALTER TABLE `class_table`
  ADD PRIMARY KEY (`id_class`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`id_stu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_table`
--
ALTER TABLE `attendance_table`
  MODIFY `id_atd` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `class_table`
--
ALTER TABLE `class_table`
  MODIFY `id_class` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `id_stu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
