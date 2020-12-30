-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2020 at 03:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
  `clock_in` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_table`
--

INSERT INTO `attendance_table` (`id_atd`, `first_name`, `last_name`, `student_number`, `class_number`, `clock_in`) VALUES
(1, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-02 02:46:00.000000'),
(2, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-09 02:30:49.000000'),
(3, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-16 02:43:58.000000'),
(4, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-23 02:43:58.000000'),
(5, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-30 02:43:58.000000'),
(6, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-12-07 02:43:58.000000'),
(7, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-12-14 02:43:58.000000'),
(175, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-11-02 02:46:00.000000'),
(176, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-11-09 02:46:00.000000'),
(177, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-11-16 02:46:00.000000'),
(178, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-11-23 02:46:00.000000'),
(179, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-11-30 02:46:00.000000'),
(180, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-12-07 02:46:00.000000'),
(181, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-12-14 02:46:00.000000'),
(182, 'Long', 'Nguyen Thanh', 1655353, '8', '2020-11-02 02:46:00.000000'),
(183, 'Long', 'Nguyen Thanh', 1655353, '8', '2020-11-16 02:46:00.000000'),
(184, 'Long', 'Nguyen Thanh', 1655353, '8', '2020-11-23 02:46:00.000000'),
(185, 'Long', 'Nguyen Thanh', 1655353, '8', '2020-11-30 02:46:00.000000'),
(186, 'Long', 'Nguyen Thanh', 1655353, '8', '2020-12-07 02:46:00.000000'),
(187, 'Long', 'Nguyen Thanh', 1655353, '8', '2020-12-14 02:46:00.000000'),
(188, 'Hang', 'Nguyen Thi Thu', 1656868, '8', '2020-11-02 02:46:00.000000'),
(189, 'Hang', 'Nguyen Thi Thu', 1656868, '8', '2020-11-16 02:46:00.000000'),
(190, 'Hang', 'Nguyen Thi Thu', 1656868, '8', '2020-11-23 02:46:00.000000'),
(191, 'Hang', 'Nguyen Thi Thu', 1656868, '8', '2020-11-30 02:46:00.000000'),
(192, 'Hang', 'Nguyen Thi Thu', 1656868, '8', '2020-12-07 02:46:00.000000'),
(193, 'Hang', 'Nguyen Thi Thu', 1656868, '8', '2020-12-14 02:46:00.000000'),
(194, 'Anh', 'Le Thi Dieu', 1651000, '8', '2020-11-02 02:46:00.000000'),
(195, 'Anh', 'Le Thi Dieu', 1651000, '8', '2020-11-09 02:46:00.000000'),
(196, 'Anh', 'Le Thi Dieu', 1651000, '8', '2020-11-16 02:46:00.000000'),
(197, 'Anh', 'Le Thi Dieu', 1651000, '8', '2020-11-23 02:46:00.000000'),
(198, 'Anh', 'Le Thi Dieu', 1651000, '8', '2020-11-30 02:46:00.000000'),
(199, 'An', 'Tran Thien', 1651001, '8', '2020-11-02 02:46:00.000000'),
(200, 'An', 'Tran Thien', 1651001, '8', '2020-11-09 02:46:00.000000'),
(201, 'An', 'Tran Thien', 1651001, '8', '2020-11-16 02:46:00.000000'),
(202, 'An', 'Tran Thien', 1651001, '8', '2020-11-30 02:46:00.000000'),
(203, 'An', 'Tran Thien', 1651001, '8', '2020-12-07 02:46:00.000000'),
(204, 'An', 'Tran Thien', 1651001, '8', '2020-12-14 02:46:00.000000'),
(205, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-11-02 02:46:00.000000'),
(206, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-11-09 02:46:00.000000'),
(207, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-11-16 02:46:00.000000'),
(208, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-11-23 02:46:00.000000'),
(209, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-11-30 02:46:00.000000'),
(210, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-12-07 02:46:00.000000'),
(211, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-12-14 02:46:00.000000'),
(212, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-11-02 02:46:00.000000'),
(213, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-11-09 02:46:00.000000'),
(214, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-11-16 02:46:00.000000'),
(215, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-11-23 02:46:00.000000'),
(216, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-11-30 02:46:00.000000'),
(217, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-12-07 02:46:00.000000'),
(218, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-12-14 02:46:00.000000'),
(219, 'Hung', 'Nguyen Manh', 1651004, '8', '2020-11-02 02:46:00.000000'),
(220, 'Hung', 'Nguyen Manh', 1651004, '8', '2020-11-09 02:46:00.000000'),
(221, 'Hung', 'Nguyen Manh', 1651004, '8', '2020-11-16 02:46:00.000000'),
(222, 'Hung', 'Nguyen Manh', 1651004, '8', '2020-11-23 02:46:00.000000'),
(223, 'Hung', 'Nguyen Manh', 1651004, '8', '2020-12-07 02:46:00.000000'),
(224, 'Hung', 'Nguyen Manh', 1651004, '8', '2020-12-14 02:46:00.000000'),
(225, 'Khoa', 'Nguyen Dang', 1651005, '8', '2020-11-02 02:46:00.000000'),
(226, 'Khoa', 'Nguyen Dang', 1651005, '8', '2020-11-09 02:46:00.000000'),
(227, 'Khoa', 'Nguyen Dang', 1651005, '8', '2020-11-23 02:46:00.000000'),
(228, 'Khoa', 'Nguyen Dang', 1651005, '8', '2020-11-30 02:46:00.000000'),
(229, 'Khoa', 'Nguyen Dang', 1651005, '8', '2020-12-07 02:46:00.000000'),
(230, 'Khoa', 'Nguyen Dang', 1651005, '8', '2020-12-14 02:46:00.000000'),
(231, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-11-02 02:46:00.000000'),
(232, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-11-09 02:46:00.000000'),
(233, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-11-16 02:46:00.000000'),
(234, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-11-23 02:46:00.000000'),
(235, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-11-30 02:46:00.000000'),
(236, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-12-07 02:46:00.000000'),
(237, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-12-14 02:46:00.000000'),
(238, 'Dan', 'Nguyen Ngoc Linh', 1651007, '8', '2020-11-02 02:46:00.000000'),
(239, 'Dan', 'Nguyen Ngoc Linh', 1651007, '8', '2020-11-16 02:46:00.000000'),
(240, 'Dan', 'Nguyen Ngoc Linh', 1651007, '8', '2020-11-23 02:46:00.000000'),
(241, 'Dan', 'Nguyen Ngoc Linh', 1651007, '8', '2020-11-30 02:46:00.000000'),
(242, 'Dan', 'Nguyen Ngoc Linh', 1651007, '8', '2020-12-07 02:46:00.000000'),
(243, 'Dan', 'Nguyen Ngoc Linh', 1651007, '8', '2020-12-14 02:46:00.000000'),
(244, 'Diep', 'Le Ngoc', 1651008, '8', '2020-11-02 02:46:00.000000'),
(245, 'Diep', 'Le Ngoc', 1651008, '8', '2020-11-09 02:46:00.000000'),
(246, 'Diep', 'Le Ngoc', 1651008, '8', '2020-11-16 02:46:00.000000'),
(247, 'Diep', 'Le Ngoc', 1651008, '8', '2020-11-23 02:46:00.000000'),
(248, 'Diep', 'Le Ngoc', 1651008, '8', '2020-11-30 02:46:00.000000'),
(249, 'Diep', 'Le Ngoc', 1651008, '8', '2020-12-07 02:46:00.000000'),
(250, 'Diep', 'Le Ngoc', 1651008, '8', '2020-12-14 02:46:00.000000'),
(251, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-11-02 02:46:00.000000'),
(252, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-11-09 02:46:00.000000'),
(253, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-11-16 02:46:00.000000'),
(254, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-11-23 02:46:00.000000'),
(255, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-11-30 02:46:00.000000'),
(256, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-12-07 02:46:00.000000'),
(257, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-12-14 02:46:00.000000'),
(258, 'Nhat', 'Nguyen An', 1651010, '8', '2020-11-02 02:46:00.000000'),
(259, 'Nhat', 'Nguyen An', 1651010, '8', '2020-11-09 02:46:00.000000'),
(260, 'Nhat', 'Nguyen An', 1651010, '8', '2020-11-16 02:46:00.000000'),
(261, 'Nhat', 'Nguyen An', 1651010, '8', '2020-11-23 02:46:00.000000'),
(262, 'Nhat', 'Nguyen An', 1651010, '8', '2020-11-30 02:46:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `chart_table`
--

CREATE TABLE `chart_table` (
  `id_chart` int(11) NOT NULL,
  `total_student` int(100) NOT NULL,
  `present_student` int(100) NOT NULL,
  `absent_student` int(100) NOT NULL,
  `present_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart_table`
--

INSERT INTO `chart_table` (`id_chart`, `total_student`, `present_student`, `absent_student`, `present_date`) VALUES
(1, 24, 15, 9, '2020-11-02'),
(2, 24, 12, 12, '2020-11-09'),
(3, 24, 14, 10, '2020-11-16'),
(4, 24, 14, 10, '2020-11-23'),
(5, 24, 14, 10, '2020-11-30'),
(6, 24, 13, 11, '2020-12-07'),
(7, 24, 13, 11, '2020-12-14');

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
  `userlevel` varchar(45) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`id_login`, `fname`, `lname`, `email`, `username`, `password`, `userlevel`, `reset_token`) VALUES
(1, 'Thanh', 'Nguyen Truong', '1652557@hcmut.edu.vn', '1652557', '9549f81a279cabcf0bbd17fe336da413', 'student', ''),
(2, 'Quan', 'Nguyen Anh', '1552310@hcmut.edu.vn', '1552310', 'f542dcdb51886b138479a9ab32889125', 'student', NULL),
(3, 'Long', 'Nguyen Thanh', '1655353@hcmut.edu.vn', '1653535', '9cb572753126be71a594b12bc24e4904', 'student', NULL),
(4, 'Hang', 'Nguyen Thi Thu', '1656868@hcmut.edu.vn', '1656868', '1b7ccfd51671f7414c4ea918f26ea402', 'student', NULL),
(5, 'admin', 'system', 'admin@gmail.com', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', NULL),
(6, 'teacher', 'system', 'teacher@gmail.com', 'teacher', '5f4dcc3b5aa765d61d8327deb882cf99', 'teacher', NULL),
(7, 'Anh', 'Pham Hoang', 'anhphamhoang@gmail.com', 'anhphamhoang', '25f9e794323b453885f5181f1b624d0b', 'teacher', NULL);

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
(1, 'Thanh', 'Nguyen Truong', 1652557, '1652557@hcmut.edu.vn', '482227026359', '8', '2020-10-30 10:30:37'),
(2, 'Quan', 'Nguyen Anh', 1552310, '1552310@hcmut.edu.vn', '798152693871', '8', '2020-11-03 09:27:27'),
(3, 'Long', 'Nguyen Thanh', 1655353, '1655353@hcmut.edu.vn', '1071090732781', '8', '2020-11-01 21:42:22'),
(4, 'Hang', 'Nguyen Thi Thu', 1656868, '1656868@hcmut.edu.vn', '1001985576659', '8', '2020-11-09 14:46:44'),
(5, 'Anh', 'Le Thi Dieu', 1651000, '1651000@hcmut.edu.vn', '456321587539', '8', '2020-11-09 14:46:44'),
(6, 'An', 'Tran Thien', 1651001, '1651001@hcmut.edu.vn', '456325875632', '8', '2020-11-09 14:46:44'),
(7, 'Dang', 'Nguyen Hai', 1651002, '1651002@hcmut.edu.vn', '587563214598', '8', '2020-11-09 14:46:44'),
(8, 'Dat', 'Nguyen Thanh', 1651003, '1651003@hcmut.edu.vn', '632587496586', '8', '2020-11-09 14:46:44'),
(9, 'Hung', 'Nguyen Manh', 1651004, '1651004@hcmut.edu.vn', '856321458726', '8', '2020-11-09 14:46:44'),
(10, 'Khoa', 'Nguyen Dang', 1651005, '1651005@hcmut.edu.vn', '5326523698547', '8', '2020-11-09 14:46:44'),
(11, 'Kiet', 'Nguyen Tuan ', 1651006, '1651006@hcmut.edu.vn', '7894569874589', '8', '2020-11-09 14:46:44'),
(12, 'Dan', 'Nguyen Ngoc Linh', 1651007, '1651007@hcmut.edu.vn', '3698663258752', '8', '2020-11-09 14:46:44'),
(13, 'Diep', 'Le Ngoc', 1651008, '1651008@hcmut.edu.vn', '6646461318544', '8', '2020-11-09 14:46:44'),
(14, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '1651009@hcmut.edu.vn', '585301242841', '8', '2020-11-09 14:46:44'),
(15, 'Nhat', 'Nguyen An', 1651010, '1651010@hcmut.edu.vn', '54546131254541', '8', '2020-11-09 14:46:44'),
(16, 'Nhat', 'Nguyen Tran Bao', 1651011, '1651011@hcmut.edu.vn', '454646321131316', '8', '2020-11-09 14:46:44'),
(17, 'Thanh', 'Le An', 1651012, '1651012@hcmut.edu.vn', '776631913749421', '8', '2020-11-09 14:46:44'),
(18, 'Nguyen', 'Do Cao', 1651013, '1651013@hcmut.edu.vn', '9173913794214', '8', '2020-11-09 14:46:44'),
(19, 'Sang', 'Nguyen Quang', 1651014, '1651014@hhcmut.edu.vn', '686382140149174', '8', '2020-11-09 14:46:44'),
(20, 'Minh', 'Nguyen Ngoc', 1651016, '1651016@hcmut.edu.vn', '8683197359735', '8', '2020-11-09 14:46:44'),
(21, 'Chau', 'Nguyen Ngoc', 1651017, '1651017@hcmut.edu.vn', '8997993113752', '8', '2020-11-09 14:46:44'),
(22, 'Hoang', 'Le Huy', 1651018, '1651018@hcmut.edu.vn', '87197497249454', '8', '2020-11-09 14:46:44'),
(23, 'Cat', 'Nguyen Ngoc Gia', 1651018, '1651018@hcmut.edu.vn', '8082474279147', '8', '2020-11-09 14:46:44'),
(24, 'Cuong', 'Nguyen Duy', 1651019, '1651019@hcmut.edu.vn', '97359752759725', '8', '2020-11-09 14:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_table`
--

CREATE TABLE `teacher_table` (
  `id_teacher` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `teacher_number` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `class_list` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_table`
--

INSERT INTO `teacher_table` (`id_teacher`, `first_name`, `last_name`, `teacher_number`, `email`, `class_list`) VALUES
(1, 'teacher', 'system', 1000, 'teacher@gmail.com', '6, 8'),
(2, 'Anh', 'Pham Hoang', 1001, 'anhphamhoang@gmail.com', '5, 7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_table`
--
ALTER TABLE `attendance_table`
  ADD PRIMARY KEY (`id_atd`);

--
-- Indexes for table `chart_table`
--
ALTER TABLE `chart_table`
  ADD PRIMARY KEY (`id_chart`);

--
-- Indexes for table `class_table`
--
ALTER TABLE `class_table`
  ADD PRIMARY KEY (`id_class`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`id_stu`);

--
-- Indexes for table `teacher_table`
--
ALTER TABLE `teacher_table`
  ADD PRIMARY KEY (`id_teacher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_table`
--
ALTER TABLE `attendance_table`
  MODIFY `id_atd` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `chart_table`
--
ALTER TABLE `chart_table`
  MODIFY `id_chart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class_table`
--
ALTER TABLE `class_table`
  MODIFY `id_class` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `id_stu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `teacher_table`
--
ALTER TABLE `teacher_table`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
