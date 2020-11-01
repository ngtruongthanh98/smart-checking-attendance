-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2020 at 10:03 PM
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
(1, 'Thanh', 'Nguyen Truong', 1652557, NULL, '2020-10-30 11:17:07'),
(2, 'Thanh', 'Nguyen Truong', 1652557, NULL, '2020-10-30 11:17:11'),
(3, 'Quan', 'Nguyen Anh', 1552310, NULL, '2020-10-30 11:17:17'),
(7, 'Thanh', 'Nguyen Truong', 1652557, NULL, '2020-10-30 11:46:04'),
(8, 'Quan', 'Nguyen Anh', 1552310, NULL, '2020-10-31 18:35:45'),
(9, 'Thanh', 'Nguyen Truong', 1652557, NULL, '2020-11-01 08:16:15'),
(10, 'Quan', 'Nguyen Anh', 1552310, NULL, '2020-11-01 08:17:19'),
(11, 'Thanh', 'Nguyen Truong', 1652557, NULL, '2020-11-01 11:30:21'),
(20, 'Long', 'Nguyen Thanh', 1655353, NULL, '2020-11-01 21:46:05');

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
(2, 'Quan', 'Nguyen Anh', 1552310, '1552310@hcmut.edu.vn', '798152693871', NULL, '2020-10-30 10:28:47'),
(3, 'Long', 'Nguyen Thanh', 1655353, 'ngtruongthanh98@gmail.com', '1071090732781', NULL, '2020-11-01 21:42:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_table`
--
ALTER TABLE `attendance_table`
  ADD PRIMARY KEY (`id_atd`);

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
  MODIFY `id_atd` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `id_stu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
