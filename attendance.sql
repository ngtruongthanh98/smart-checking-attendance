-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2020 at 09:23 PM
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
  `class_number` varchar(255) DEFAULT NULL,
  `clock_in` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_table`
--

INSERT INTO `attendance_table` (`id_atd`, `first_name`, `last_name`, `student_number`, `class_number`, `clock_in`) VALUES
(1, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-19 08:19:54'),
(2, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-19 08:30:49'),
(3, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-19 08:43:58'),
(4, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 17:34:58'),
(5, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 17:36:17'),
(6, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 17:36:23'),
(7, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 17:36:29'),
(8, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 17:36:35'),
(9, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 17:38:13'),
(10, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 17:53:57'),
(11, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 18:00:57'),
(12, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 18:01:02'),
(13, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 18:01:07'),
(14, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 18:03:25'),
(15, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 18:03:31'),
(16, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 18:03:36'),
(17, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 18:03:41'),
(18, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-20 18:05:49'),
(19, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-23 10:35:22'),
(20, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-23 10:45:33'),
(21, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-23 10:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `class_table`
--

CREATE TABLE `class_table` (
  `id_class` int(255) NOT NULL,
  `subject_code` varchar(10) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `day_in_week` varchar(10) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_table`
--

INSERT INTO `class_table` (`id_class`, `subject_code`, `subject_name`, `day_in_week`, `start_time`, `end_time`, `room`) VALUES
(1, 'MT1003', 'Calculus 1', 'Monday', '9:00', '11:50', '401B4'),
(2, 'PH1003', 'Physics 1', 'Monday', '12:00', '14:50', '203A4'),
(3, 'MT1005', 'Calculus 2', 'Tuesday', '7:00', '9:50', '502B4'),
(4, 'CH1003', 'General Chemistry', 'Wednesday', '12:00', '14:50', '405B4'),
(5, 'CO2013', 'Operating System', 'Thursday', '7:00', '9:50', '504B4'),
(6, 'MT1007', 'Linear Algebra', 'Friday', '12:00', '14:50', '402A4'),
(7, 'CO3053', 'Embedded Systems', 'Saturday', '7:00', '9:50', '504B4'),
(8, 'CO3009', 'Microprocessors-microcontrollers', 'Monday', '09:00', '11:50', '303B4');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `id_login` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `userlevel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`id_login`, `fname`, `lname`, `email`, `username`, `password`, `userlevel`) VALUES
(1, 'Thanh', 'Nguyen Truong', '1652557@hcmut.edu.vn', '1652557', '9549f81a279cabcf0bbd17fe336da413', 'student'),
(2, 'Quan', 'Nguyen Anh', '1552310@hcmut.edu.vn', '1552310', 'f542dcdb51886b138479a9ab32889125', 'student'),
(3, 'Long', 'Nguyen Thanh', 'ngtruongthanh98@gmail.com', '1653535', '9cb572753126be71a594b12bc24e4904', 'student'),
(4, 'Hang', 'Nguyen Thi Thu', 'ngtruongthanh98@gmail.com', '1656868', '1b7ccfd51671f7414c4ea918f26ea402', 'student'),
(5, 'admin', 'system', 'ngtruongthanh98@gmail.com', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin'),
(6, 'teacher', 'system', 'ngtruongthanh98@gmail.com', 'teacher', '5f4dcc3b5aa765d61d8327deb882cf99', 'teacher'),
(7, 'Anh', 'Pham Hoang', 'ngtruongthanh98@gmail.com', 'anhphamhoang', '25f9e794323b453885f5181f1b624d0b', 'teacher');

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
  `class_list` varchar(255) DEFAULT NULL,
  `created` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`id_stu`, `first_name`, `last_name`, `student_number`, `email`, `rfid_uid`, `class_list`, `created`) VALUES
(1, 'Thanh', 'Nguyen Truong', 1652557, '1652557@hcmut.edu.vn', '482227026359', '2, 8, 4', '2020-10-30 10:30:37'),
(2, 'Quan', 'Nguyen Anh', 1552310, '1552310@hcmut.edu.vn', '798152693871', '2, 4', '2020-11-03 09:27:27'),
(3, 'Long', 'Nguyen Thanh', 1655353, 'ngtruongthanh98@gmail.com', '1071090732781', '2, 5', '2020-11-01 21:42:22'),
(4, 'Hang', 'Nguyen Thi Thu', 1656868, 'ngtruongthanh98@gmail.com', '1001985576659', '6', '2020-11-09 14:46:44');

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
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`id_login`);

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
  MODIFY `id_class` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `id_stu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
