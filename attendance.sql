-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 09:58 AM
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

DROP TABLE IF EXISTS `attendance_table`;
CREATE TABLE `attendance_table` (
  `id_atd` int(255) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `student_number` int(7) DEFAULT NULL,
  `class_number` varchar(255) DEFAULT NULL,
  `clock_in` varchar(255) NOT NULL DEFAULT 'current_timestamp(6)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_table`
--

INSERT INTO `attendance_table` (`id_atd`, `first_name`, `last_name`, `student_number`, `class_number`, `clock_in`) VALUES
(1, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-02 09:46:00'),
(2, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-09 09:30:49'),
(3, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-16 09:43:58'),
(4, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-23 09:43:58'),
(5, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-11-30 09:43:58'),
(6, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-12-07 09:43:58'),
(7, 'Thanh', 'Nguyen Truong', 1652557, '8', '2020-12-14 09:43:58'),
(175, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-11-02 09:46:00'),
(176, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-11-09 09:46:00'),
(177, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-11-16 09:46:00'),
(178, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-11-23 09:46:00'),
(179, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-11-30 09:46:00'),
(180, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-12-07 09:46:00'),
(181, 'Quan', 'Nguyen Anh', 1552310, '8', '2020-12-14 09:46:00'),
(182, 'Long', 'Nguyen Thanh', 1655353, '8', '2020-11-02 09:46:00'),
(183, 'Long', 'Nguyen Thanh', 1655353, '8', '2020-11-16 09:46:00'),
(184, 'Long', 'Nguyen Thanh', 1655353, '8', '2020-11-23 09:46:00'),
(185, 'Long', 'Nguyen Thanh', 1655353, '8', '2020-11-30 09:46:00'),
(186, 'Long', 'Nguyen Thanh', 1655353, '8', '2020-12-07 09:46:00'),
(187, 'Long', 'Nguyen Thanh', 1655353, '8', '2020-12-14 09:46:00'),
(188, 'Hang', 'Nguyen Thi Thu', 1656868, '8', '2020-11-02 09:46:00'),
(189, 'Hang', 'Nguyen Thi Thu', 1656868, '8', '2020-11-16 09:46:00'),
(190, 'Hang', 'Nguyen Thi Thu', 1656868, '8', '2020-11-23 09:46:00'),
(191, 'Hang', 'Nguyen Thi Thu', 1656868, '8', '2020-11-30 09:46:00'),
(192, 'Hang', 'Nguyen Thi Thu', 1656868, '8', '2020-12-07 09:46:00'),
(193, 'Hang', 'Nguyen Thi Thu', 1656868, '8', '2020-12-14 09:46:00'),
(194, 'Anh', 'Le Thi Dieu', 1651000, '8', '2020-11-02 09:46:00'),
(195, 'Anh', 'Le Thi Dieu', 1651000, '8', '2020-11-09 09:46:00'),
(196, 'Anh', 'Le Thi Dieu', 1651000, '8', '2020-11-16 09:46:00'),
(197, 'Anh', 'Le Thi Dieu', 1651000, '8', '2020-11-23 09:46:00'),
(198, 'Anh', 'Le Thi Dieu', 1651000, '8', '2020-11-30 09:46:00'),
(199, 'An', 'Tran Thien', 1651001, '8', '2020-11-02 09:46:00'),
(200, 'An', 'Tran Thien', 1651001, '8', '2020-11-09 09:46:00'),
(201, 'An', 'Tran Thien', 1651001, '8', '2020-11-16 09:46:00'),
(202, 'An', 'Tran Thien', 1651001, '8', '2020-11-30 09:46:00'),
(203, 'An', 'Tran Thien', 1651001, '8', '2020-12-07 09:46:00'),
(204, 'An', 'Tran Thien', 1651001, '8', '2020-12-14 09:46:00'),
(205, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-11-02 09:46:00'),
(206, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-11-09 09:46:00'),
(207, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-11-16 09:46:00'),
(208, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-11-23 09:46:00'),
(209, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-11-30 09:46:00'),
(210, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-12-07 09:46:00'),
(211, 'Dang', 'Nguyen Hai', 1651002, '8', '2020-12-14 09:46:00'),
(212, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-11-02 09:46:00'),
(213, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-11-09 09:46:00'),
(214, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-11-16 09:46:00'),
(215, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-11-23 09:46:00'),
(216, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-11-30 09:46:00'),
(217, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-12-07 09:46:00'),
(218, 'Dat', 'Nguyen Thanh', 1651003, '8', '2020-12-14 09:46:00'),
(219, 'Hung', 'Nguyen Manh', 1651004, '8', '2020-11-02 09:46:00'),
(220, 'Hung', 'Nguyen Manh', 1651004, '8', '2020-11-09 09:46:00'),
(221, 'Hung', 'Nguyen Manh', 1651004, '8', '2020-11-16 09:46:00'),
(222, 'Hung', 'Nguyen Manh', 1651004, '8', '2020-11-23 09:46:00'),
(223, 'Hung', 'Nguyen Manh', 1651004, '8', '2020-12-07 09:46:00'),
(224, 'Hung', 'Nguyen Manh', 1651004, '8', '2020-12-14 09:46:00'),
(225, 'Khoa', 'Nguyen Dang', 1651005, '8', '2020-11-02 09:46:00'),
(226, 'Khoa', 'Nguyen Dang', 1651005, '8', '2020-11-09 09:46:00'),
(227, 'Khoa', 'Nguyen Dang', 1651005, '8', '2020-11-23 09:46:00'),
(228, 'Khoa', 'Nguyen Dang', 1651005, '8', '2020-11-30 09:46:00'),
(229, 'Khoa', 'Nguyen Dang', 1651005, '8', '2020-12-07 09:46:00'),
(230, 'Khoa', 'Nguyen Dang', 1651005, '8', '2020-12-14 09:46:00'),
(231, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-11-02 09:46:00'),
(232, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-11-09 09:46:00'),
(233, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-11-16 09:46:00'),
(234, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-11-23 09:46:00'),
(235, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-11-30 09:46:00'),
(236, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-12-07 09:46:00'),
(237, 'Kiet', 'Nguyen Tuan', 1651006, '8', '2020-12-14 09:46:00'),
(238, 'Dan', 'Nguyen Ngoc Linh', 1651007, '8', '2020-11-02 09:46:00'),
(239, 'Dan', 'Nguyen Ngoc Linh', 1651007, '8', '2020-11-16 09:46:00'),
(240, 'Dan', 'Nguyen Ngoc Linh', 1651007, '8', '2020-11-23 09:46:00'),
(241, 'Dan', 'Nguyen Ngoc Linh', 1651007, '8', '2020-11-30 09:46:00'),
(242, 'Dan', 'Nguyen Ngoc Linh', 1651007, '8', '2020-12-07 09:46:00'),
(243, 'Dan', 'Nguyen Ngoc Linh', 1651007, '8', '2020-12-14 09:46:00'),
(244, 'Diep', 'Le Ngoc', 1651008, '8', '2020-11-02 09:46:00'),
(245, 'Diep', 'Le Ngoc', 1651008, '8', '2020-11-09 09:46:00'),
(246, 'Diep', 'Le Ngoc', 1651008, '8', '2020-11-16 09:46:00'),
(247, 'Diep', 'Le Ngoc', 1651008, '8', '2020-11-23 09:46:00'),
(248, 'Diep', 'Le Ngoc', 1651008, '8', '2020-11-30 09:46:00'),
(249, 'Diep', 'Le Ngoc', 1651008, '8', '2020-12-07 09:46:00'),
(250, 'Diep', 'Le Ngoc', 1651008, '8', '2020-12-14 09:46:00'),
(251, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-11-02 09:46:00'),
(252, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-11-09 09:46:00'),
(253, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-11-16 09:46:00'),
(254, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-11-23 09:46:00'),
(255, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-11-30 09:46:00'),
(256, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-12-07 09:46:00'),
(257, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '8', '2020-12-14 09:46:00'),
(258, 'Nhat', 'Nguyen An', 1651010, '8', '2020-11-02 09:46:00'),
(259, 'Nhat', 'Nguyen An', 1651010, '8', '2020-11-09 09:46:00'),
(260, 'Nhat', 'Nguyen An', 1651010, '8', '2020-11-16 09:46:00'),
(261, 'Nhat', 'Nguyen An', 1651010, '8', '2020-11-23 09:46:00'),
(262, 'Nhat', 'Nguyen An', 1651010, '8', '2020-11-30 09:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `chart_table`
--

DROP TABLE IF EXISTS `chart_table`;
CREATE TABLE `chart_table` (
  `id_chart` int(255) NOT NULL,
  `total_student` int(7) NOT NULL,
  `present_student` int(7) NOT NULL,
  `absent_student` int(7) NOT NULL,
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
(7, 24, 13, 11, '2020-12-14'),
(16, 24, 13, 11, '2020-12-14'),
(17, 24, 13, 11, '2020-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `class_table`
--

DROP TABLE IF EXISTS `class_table`;
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
(8, 'CO3009', 'Microprocessors-microcontrollers', 'Monday', '09:00', '11:50', '303B4'),
(9, 'CO3007', 'System Performance Evaluation', 'Thursday', '15:00', '17:30', '206B1'),
(10, 'CO2035', 'Digital Signal Processing', 'Wednesday', '8:00', '10:50', '202C5'),
(11, 'CO3065', 'Advanced Software Engineering', 'Friday', '9:00', '11:50', '504B4'),
(12, 'CO3003', 'Computer Network', 'Tuesday', '13:00', '15:50', '406B4'),
(13, 'CO2009', 'Logic Design with Verilog HDL', 'Wednesday', '8:00', '11:50', '405A4'),
(14, 'CO1011', 'Programming Fundamentals', 'Friday', '8:00', '11:50', '406A4'),
(15, 'CO2003', 'Data Structures and Algorithms', 'Monday', '15:00', '17:50', '208B1'),
(16, 'CO2007', 'Computer Architecture', 'Thursday', '13:00', '15:50', '207B1');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

DROP TABLE IF EXISTS `login_table`;
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

DROP TABLE IF EXISTS `student_table`;
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
(1, 'Thanh', 'Nguyen Truong', 1652557, '1652557@hcmut.edu.vn', '482227026359', '8, 2, 4', '2020-10-30 10:30:37'),
(2, 'Quan', 'Nguyen Anh', 1552310, '1552310@hcmut.edu.vn', '798152693871', '2, 4, 8', '2020-11-03 09:27:27'),
(3, 'Long', 'Nguyen Thanh', 1655353, '1655353@hcmut.edu.vn', '1071090732781', '2, 5, 8', '2020-11-01 21:42:22'),
(4, 'Hang', 'Nguyen Thi Thu', 1656868, '1656868@hcmut.edu.vn', '1001985576659', '6, 8', '2020-11-09 14:46:44'),
(5, 'Anh', 'Le Thi Dieu', 1651000, '1651000@hcmut.edu.vn', '456321587539', '5, 7, 8, 9', '2020-11-09 14:46:44'),
(6, 'An', 'Tran Thien', 1651001, '1651001@hcmut.edu.vn', '456325875632', '3, 6, 9, 14', '2020-11-09 14:46:44'),
(7, 'Dang', 'Nguyen Hai', 1651002, '1651002@hcmut.edu.vn', '587563214598', '1, 8, 16', '2020-11-09 14:46:44'),
(8, 'Dat', 'Nguyen Thanh', 1651003, '1651003@hcmut.edu.vn', '632587496586', '2, 7, 14', '2020-11-09 14:46:44'),
(9, 'Hung', 'Nguyen Manh', 1651004, '1651004@hcmut.edu.vn', '856321458726', '3, 8, 11, 12', '2020-11-09 14:46:44'),
(10, 'Khoa', 'Nguyen Dang', 1651005, '1651005@hcmut.edu.vn', '5326523698547', '4, 8, 9, 10', '2020-11-09 14:46:44'),
(11, 'Kiet', 'Nguyen Tuan ', 1651006, '1651006@hcmut.edu.vn', '7894569874589', '1, 2, 3, 8, 11', '2020-11-09 14:46:44'),
(12, 'Dan', 'Nguyen Ngoc Linh', 1651007, '1651007@hcmut.edu.vn', '3698663258752', '5, 8, 9, 15', '2020-11-09 14:46:44'),
(13, 'Diep', 'Le Ngoc', 1651008, '1651008@hcmut.edu.vn', '6646461318544', '10, 11, 13', '2020-11-09 14:46:44'),
(14, 'Dung', 'Nguyen Ngoc Nghi', 1651009, '1651009@hcmut.edu.vn', '585301242841', '1, 8, 10, 12', '2020-11-09 14:46:44'),
(15, 'Nhat', 'Nguyen An', 1651010, '1651010@hcmut.edu.vn', '54546131254541', '6, 7, 9, 11', '2020-11-09 14:46:44'),
(16, 'Nhat', 'Nguyen Tran Bao', 1651011, '1651011@hcmut.edu.vn', '454646321131316', '3, 8, 13, 16', '2020-11-09 14:46:44'),
(17, 'Thanh', 'Le An', 1651012, '1651012@hcmut.edu.vn', '776631913749421', '2, 3, 6, 8', '2020-11-09 14:46:44'),
(18, 'Nguyen', 'Do Cao', 1651013, '1651013@hcmut.edu.vn', '9173913794214', '7, 8, 15', '2020-11-09 14:46:44'),
(19, 'Sang', 'Nguyen Quang', 1651014, '1651014@hhcmut.edu.vn', '686382140149174', '1, 8, 12, 13', '2020-11-09 14:46:44'),
(20, 'Minh', 'Nguyen Ngoc', 1651016, '1651016@hcmut.edu.vn', '8683197359735', '6, 8, 15', '2020-11-09 14:46:44'),
(21, 'Chau', 'Nguyen Ngoc', 1651017, '1651017@hcmut.edu.vn', '8997993113752', '2, 5, 9, 11', '2020-11-09 14:46:44'),
(22, 'Hoang', 'Le Huy', 1651025, '1651025@hcmut.edu.vn', '87197497249454', '7, 10, 15', '2020-11-09 14:46:44'),
(23, 'Cat', 'Nguyen Ngoc Gia', 1651018, '1651018@hcmut.edu.vn', '8082474279147', '8, 13', '2020-11-09 14:46:44'),
(24, 'Cuong', 'Nguyen Duy', 1651019, '1651019@hcmut.edu.vn', '97359752759725', '8, 12, 16', '2020-11-09 14:46:44'),
(25, 'Thuan', 'Ngo Nguyen', 1752525, '1752525@hcmut.edu.vn', '3468461684651', '6, 10, 11', '2020-11-10 07:25:21'),
(26, 'Toan', 'Phan Minh', 1852798, '1852798@hcmut.edu.vn', '66616413168464', '7, 9', '2020-11-10 07:58:51'),
(27, 'Minh', 'Doan Xuan', 1852168, '1852168@hcmut.edu.vn', '981317460354931', '4, 8', '2020-11-10 07:58:59'),
(28, 'Long', 'Dinh Hoang', 1852517, '1852517@hcmut.edu.vn', '236524892963', '1, 9, 10', '2020-11-10 07:59:06'),
(29, 'Phuc', 'Nguyen Minh', 1852666, '1852666@hcmut.edu.vn', '68461684616184', '1, 3, 9', '2020-11-10 07:58:59'),
(30, 'Hung', 'Pham Viet', 1752262, '1752262@hcmut.edu.vn', '498451651138', '2, 5, 7', '2020-11-10 08:00:09'),
(31, 'Hieu', 'Nguyen Huu Anh', 1652741, '1652741@hcmut.edu.vn', '99461864616546', '3, 6, 9', '2020-11-10 08:01:02'),
(32, 'Duc', 'Le Tran Minh', 1852136, '1852136@hcmut.edu.vn', '64612168462654', '1, 4, 7, 10', '2020-11-10 08:01:57'),
(33, 'Dat', 'Vu Thanh', 1752169, '1752169@hcmut.edu.vn', '4912311516161', '2, 4, 7', '2020-11-10 08:02:45'),
(34, 'Dai', 'Tran Quang', 1552089, '1552089@hcmut.edu.vn', '684612164616702', '3, 5, 8, 9', '2020-11-10 08:04:45'),
(35, 'Khoa', 'Tran Nguyen Dang', 1552448, '1552448@hcmut.edu.vn', '005461640491', '1, 5, 8', '2020-11-10 08:08:04'),
(36, 'Binh', 'Le Duc', 1852272, '1852272@hcmut.edu.vn', '064606498604', '2, 3, 5', '2020-11-10 08:09:35'),
(37, 'Danh', 'Pham Thanh', 1852110, '1852110@hcmut.edu.vn', '461206489061', '1, 5, 9, 10', '2020-11-10 08:10:10'),
(38, 'Duy', 'Ngo Tu', 1752133, '1752133@hcmut.edu.vn', '2012512689412', '3, 5, 8, 9', '2020-11-10 08:11:12'),
(39, 'An', 'Nguyen Thien', 1810824, '1810824@hcmut.edu.vn', '54981305491313', '2, 5, 8', '2020-11-10 08:12:15'),
(40, 'Huy', 'Nguyen Manh', 1652747, '1652747@hcmut.edu.vn', '9871600864610', '1, 7, 10', '2020-11-10 08:19:11'),
(41, 'Nguyen', 'Nguyen Thanh', 1852618, '1852618@hcmut.edu.vn', '7915610646163', '8, 9, 10', '2020-11-10 08:20:02'),
(42, 'Quang', 'Tran Nhut', 1852073, '1852073@hcmut.edu.vn', '9745105461005', '2, 4, 5', '2020-11-10 08:21:56'),
(43, 'Toan', 'Nguyen Van', 1552004, '1552004@hcmut.edu.vn', '9846161051065', '1, 5, 8', '2020-11-10 08:30:45'),
(44, 'Vuong', 'Tran Minh', 1654848, '1654848@hcmut.edu.vn', '1684161600184', '2, 3, 6', '2020-11-10 08:32:15'),
(45, 'Phuong', 'Nguyen Cong', 1552045, '1552045@hcmut.edu.vn', '1545616005461', '9, 10', '2020-11-10 08:45:10'),
(46, 'Anh', 'Nguyen Huy Hoang', 1552775, '1552775@hcmut.edu.vn', '8461640051318', '7, 9, 10', '2020-11-10 08:52:30'),
(47, 'Van', 'Nguyen Xuan', 1657894, '1657894@hcmut.edu.vn', '3325145408426', '3, 5, 6', '2020-11-10 09:10:10'),
(48, 'Khai', 'Vo Quoc', 1552589, '1552589@hcmut.edu.vn', '3326524002489', '1, 4, 9', '2020-11-10 09:15:15'),
(49, 'Tuong', 'Tran Duy', 1754848, '1754848@hcmut.edu.vn', '26316500549120', '1, 2, 5, 7', '2020-11-10 10:10:15'),
(50, 'Duy', 'Le', 1557854, '1557854@hcmut.edu.vn', '26314518549120', '1, 2, 6, 7', '2020-11-10 10:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_table`
--

DROP TABLE IF EXISTS `teacher_table`;
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
(2, 'Anh', 'Pham Hoang', 1001, 'anhphamhoang@gmail.com', '5, 7'),
(3, 'Cuong', 'Pham Quoc', 1002, 'cuongpham@hcmut.edu.vn', '1, 2'),
(4, 'Duy', 'Phan Dinh The', 1003, 'duypdt@hcmut.edu.vn', '3, 16'),
(5, 'Thien', 'Vu Trong', 1004, 'vuthien@hcmut.edu.vn', '4'),
(6, 'Thinh', 'Tran Ngoc', 1005, 'tnthinh@hcmut.edu.vn', '10, 12'),
(7, 'Binh', 'Nguyen Thanh', 1006, 'ntbinh@hcmut.edu.vn', '9'),
(8, 'Hoai', 'Tran Van', 1007, 'hoai@hcmut.edu.vn', '13, 14'),
(9, 'Vu', 'Pham Tran', 1008, 'ptvu@hcmut.edu.vn', '15'),
(10, 'Tri', 'Nguyen Cao', 1009, 'caotri@hcmut.edu.vn', '11');

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
  MODIFY `id_chart` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `class_table`
--
ALTER TABLE `class_table`
  MODIFY `id_class` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
