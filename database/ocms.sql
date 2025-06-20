-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 05:03 AM
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
-- Database: `ocms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(1, 'admin', '2025-06-11 14:29:01', 'Add Subject DCIT 55'),
(2, 'admin', '2025-06-11 14:37:09', 'Add Subject UTS'),
(3, 'admin', '2025-06-12 15:04:14', 'Add User jie'),
(4, 'admin', '2025-06-12 15:04:44', 'Add User jie'),
(5, 'admin', '2025-06-12 15:06:02', 'Add User jie'),
(6, 'admin', '2025-06-12 17:34:27', 'Add School Year 9999-9999'),
(7, 'admin', '2025-06-17 15:25:26', 'Add Subject ITEC 65'),
(8, 'admin', '2025-06-17 15:26:55', 'Add Subject ITEC 50A'),
(9, 'admin', '2025-06-17 15:49:20', 'Add User Tangkad');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(1, 'BSIT 1A'),
(2, 'BSIT 2A'),
(3, 'BSE 2B'),
(4, 'BSIT 2B'),
(5, 'BSIT 2C'),
(6, 'BSIT 2D'),
(7, 'BSIT 2E'),
(8, 'BSBA 2A'),
(9, 'BSBA 2B');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_overview`
--

CREATE TABLE `class_subject_overview` (
  `class_subject_overview_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `dean` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `dean`) VALUES
(1, 'Information and Technology', 'Al'),
(2, 'Department Mobile Legends', 'John Paul Yap'),
(3, 'Department of Computer Studies', 'Eyyan'),
(4, 'Department of Physical Education', 'KentBryan Maglian');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL,
  `school_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`school_year_id`, `school_year`) VALUES
(1, '2023-2024'),
(2, '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `class_id`, `username`, `password`, `location`, `status`) VALUES
(202310112, 'Johari', 'Mamantar', 2, '202310097', '123', 'images/NO-IMAGE-AVAILABLE.jpg', 'Registered'),
(202310113, 'Al', 'Kristian', 2, '202310100', 'alkristian', 'images/NO-IMAGE-AVAILABLE.jpg', 'Registered'),
(202310114, 'Shaina', 'Yusores', 8, '234', '', 'images/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(202310115, 'Nathaniel', 'bautista', 2, '202310093', '12345678', 'images/NO-IMAGE-AVAILABLE.jpg', 'Registered'),
(202310116, 'Aat', 'b', 2, '2020100', '123', 'images/NO-IMAGE-AVAILABLE.jpg', 'Registered'),
(202310117, 'j', 'm', 8, '4555', '', 'images/NO-IMAGE-AVAILABLE.jpg', 'Unregistered');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `subject_title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `unit` int(11) NOT NULL,
  `pre_req` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `category`, `description`, `unit`, `pre_req`, `semester`) VALUES
(1, 'ITEC 68', 'sheesh', '', 'type shift', 69, '', '1st'),
(2, 'DCIT 55', 'Advance Database System', '', 'mmm', 89, '', '1st'),
(3, 'UTS', 'Understanding the self', '', 'bs', 69, '', '1st'),
(4, 'ITEC 65', 'Open Source Technology', '', 'N/A', 6, '', '2nd'),
(5, 'ITEC 50A', 'Web System', '', 'N/A', 6, '', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `teacher_status` varchar(255) NOT NULL,
  `teacher_stat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `firstname`, `lastname`, `department_id`, `location`, `about`, `teacher_status`, `teacher_stat`) VALUES
(4, 'joi', '123', 'juswa', 'joi', 1, 'images/NO-IMAGE-AVAILABLE.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE `teacher_class` (
  `teacher_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `thumbnails` varchar(255) NOT NULL,
  `school_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`, `subject_id`, `thumbnails`, `school_year`) VALUES
(197, 4, 2, 2, 'admin/images/room.jpg', '2024-2025'),
(203, 9, 2, 4, 'admin/images/room.jpg', '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_announcements`
--

CREATE TABLE `teacher_class_announcements` (
  `teacher_class_announcements_id` int(11) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `teacher_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_student`
--

CREATE TABLE `teacher_class_student` (
  `teacher_class_student_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_class_student`
--

INSERT INTO `teacher_class_student` (`teacher_class_student_id`, `teacher_class_id`, `student_id`, `teacher_id`) VALUES
(2, 197, 202310112, 4),
(4, 197, 202310113, 4),
(5, 197, 202310114, 4),
(6, 203, 202310112, 9),
(7, 203, 202310113, 9),
(8, 203, 202310115, 9),
(9, 203, 202310116, 9),
(10, 197, 202310116, 4),
(11, 197, 202310117, 4);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_notification`
--

CREATE TABLE `teacher_notification` (
  `teacher_notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_notification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_shared`
--

CREATE TABLE `teacher_shared` (
  `teacher_shared_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `shared_teacher_id` int(11) NOT NULL,
  `floc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fdatein` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fdesc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'admin', 'admin', 'Johari', 'Mamantar'),
(6, 'jie', '123', 'Harijie', 'Mabilin');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `login_date` varchar(255) NOT NULL,
  `logout_date` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(1, 'admin', '2025-06-03 17:28:42', '2025-06-17 15:42:06', 1),
(2, 'admin', '2025-06-03 17:32:11', '2025-06-17 15:42:06', 1),
(3, 'admin', '2025-06-03 17:32:20', '2025-06-17 15:42:06', 1),
(4, 'admin', '2025-06-03 17:40:56', '2025-06-17 15:42:06', 1),
(5, 'admin', '2025-06-03 17:41:59', '2025-06-17 15:42:06', 1),
(6, 'admin', '2025-06-03 17:43:20', '2025-06-17 15:42:06', 1),
(7, 'admin', '2025-06-03 17:43:26', '2025-06-17 15:42:06', 1),
(8, 'admin', '2025-06-03 17:45:50', '2025-06-17 15:42:06', 1),
(9, 'admin', '2025-06-03 17:47:18', '2025-06-17 15:42:06', 1),
(10, 'admin', '2025-06-03 17:47:20', '2025-06-17 15:42:06', 1),
(11, 'admin', '2025-06-03 17:47:22', '2025-06-17 15:42:06', 1),
(12, 'admin', '2025-06-03 17:47:23', '2025-06-17 15:42:06', 1),
(13, 'admin', '2025-06-03 17:47:23', '2025-06-17 15:42:06', 1),
(14, 'admin', '2025-06-03 17:47:54', '2025-06-17 15:42:06', 1),
(15, 'admin', '2025-06-03 17:47:55', '2025-06-17 15:42:06', 1),
(16, 'admin', '2025-06-03 17:47:55', '2025-06-17 15:42:06', 1),
(17, 'admin', '2025-06-03 17:47:56', '2025-06-17 15:42:06', 1),
(18, 'admin', '2025-06-03 17:49:10', '2025-06-17 15:42:06', 1),
(19, 'admin', '2025-06-03 17:49:12', '2025-06-17 15:42:06', 1),
(20, 'admin', '2025-06-03 17:49:12', '2025-06-17 15:42:06', 1),
(21, 'admin', '2025-06-03 17:49:13', '2025-06-17 15:42:06', 1),
(22, 'admin', '2025-06-03 17:49:14', '2025-06-17 15:42:06', 1),
(23, 'admin', '2025-06-03 17:49:15', '2025-06-17 15:42:06', 1),
(24, 'admin', '2025-06-03 17:49:15', '2025-06-17 15:42:06', 1),
(25, 'admin', '2025-06-03 17:50:24', '2025-06-17 15:42:06', 1),
(26, 'admin', '2025-06-03 17:50:25', '2025-06-17 15:42:06', 1),
(27, 'admin', '2025-06-03 17:50:26', '2025-06-17 15:42:06', 1),
(28, 'admin', '2025-06-03 17:51:36', '2025-06-17 15:42:06', 1),
(29, 'admin', '2025-06-03 17:51:36', '2025-06-17 15:42:06', 1),
(30, 'admin', '2025-06-03 17:51:36', '2025-06-17 15:42:06', 1),
(31, 'admin', '2025-06-03 17:51:37', '2025-06-17 15:42:06', 1),
(32, 'admin', '2025-06-03 17:51:48', '2025-06-17 15:42:06', 1),
(33, 'admin', '2025-06-03 17:52:00', '2025-06-17 15:42:06', 1),
(34, 'admin', '2025-06-03 17:52:01', '2025-06-17 15:42:06', 1),
(35, 'admin', '2025-06-03 17:52:02', '2025-06-17 15:42:06', 1),
(36, 'admin', '2025-06-03 17:52:02', '2025-06-17 15:42:06', 1),
(37, 'admin', '2025-06-03 17:52:03', '2025-06-17 15:42:06', 1),
(38, 'admin', '2025-06-03 17:52:03', '2025-06-17 15:42:06', 1),
(39, 'admin', '2025-06-03 17:52:03', '2025-06-17 15:42:06', 1),
(40, 'admin', '2025-06-03 17:52:04', '2025-06-17 15:42:06', 1),
(41, 'admin', '2025-06-03 17:53:19', '2025-06-17 15:42:06', 1),
(42, 'admin', '2025-06-03 17:53:51', '2025-06-17 15:42:06', 1),
(43, 'admin', '2025-06-03 17:54:08', '2025-06-17 15:42:06', 1),
(44, 'admin', '2025-06-03 17:59:19', '2025-06-17 15:42:06', 1),
(45, 'admin', '2025-06-03 18:27:20', '2025-06-17 15:42:06', 1),
(46, 'admin', '2025-06-03 18:27:57', '2025-06-17 15:42:06', 1),
(47, 'admin', '2025-06-03 18:29:04', '2025-06-17 15:42:06', 1),
(48, 'admin', '2025-06-05 12:50:21', '2025-06-17 15:42:06', 1),
(49, 'admin', '2025-06-05 12:56:43', '2025-06-17 15:42:06', 1),
(50, 'natnat', '2025-06-05 12:58:27', '2025-06-06 14:21:07', 2),
(51, 'admin', '2025-06-05 13:08:43', '2025-06-17 15:42:06', 1),
(52, 'admin', '2025-06-05 13:32:43', '2025-06-17 15:42:06', 1),
(53, 'admin', '2025-06-05 13:36:25', '2025-06-17 15:42:06', 1),
(54, 'admin', '2025-06-05 13:40:56', '2025-06-17 15:42:06', 1),
(55, 'admin', '2025-06-05 13:43:11', '2025-06-17 15:42:06', 1),
(56, 'admin', '2025-06-05 13:59:47', '2025-06-17 15:42:06', 1),
(57, 'admin', '2025-06-05 15:30:10', '2025-06-17 15:42:06', 1),
(58, 'admin', '2025-06-05 15:59:20', '2025-06-17 15:42:06', 1),
(59, 'admin', '2025-06-05 16:02:07', '2025-06-17 15:42:06', 1),
(60, 'admin', '2025-06-05 16:07:37', '2025-06-17 15:42:06', 1),
(61, 'admin', '2025-06-05 16:21:47', '2025-06-17 15:42:06', 1),
(62, 'admin', '2025-06-05 16:23:08', '2025-06-17 15:42:06', 1),
(63, 'admin', '2025-06-05 16:23:10', '2025-06-17 15:42:06', 1),
(64, 'admin', '2025-06-05 16:24:44', '2025-06-17 15:42:06', 1),
(65, 'admin', '2025-06-05 16:41:36', '2025-06-17 15:42:06', 1),
(66, 'admin', '2025-06-05 16:49:45', '2025-06-17 15:42:06', 1),
(67, 'admin', '2025-06-05 17:35:44', '2025-06-17 15:42:06', 1),
(68, 'admin', '2025-06-05 17:50:21', '2025-06-17 15:42:06', 1),
(69, 'admin', '2025-06-06 10:06:31', '2025-06-17 15:42:06', 1),
(70, 'admin', '2025-06-06 10:20:43', '2025-06-17 15:42:06', 1),
(71, 'admin', '2025-06-06 11:11:56', '2025-06-17 15:42:06', 1),
(72, 'natnat', '2025-06-06 11:28:31', '2025-06-06 14:21:07', 2),
(73, 'admin', '2025-06-06 11:35:52', '2025-06-17 15:42:06', 1),
(74, 'admin', '2025-06-06 12:56:02', '2025-06-17 15:42:06', 1),
(75, 'admin', '2025-06-06 13:02:37', '2025-06-17 15:42:06', 1),
(76, 'admin', '2025-06-06 13:31:58', '2025-06-17 15:42:06', 1),
(77, 'admin', '2025-06-06 14:02:14', '2025-06-17 15:42:06', 1),
(78, 'admin', '2025-06-06 14:18:26', '2025-06-17 15:42:06', 1),
(79, 'admin', '2025-06-06 14:20:21', '2025-06-17 15:42:06', 1),
(80, 'natnat', '2025-06-06 14:21:01', '2025-06-06 14:21:07', 2),
(81, 'admin', '2025-06-06 14:31:17', '2025-06-17 15:42:06', 1),
(82, 'admin', '2025-06-10 13:34:11', '2025-06-17 15:42:06', 1),
(83, 'admin', '2025-06-10 15:42:37', '2025-06-17 15:42:06', 1),
(84, 'admin', '2025-06-10 15:42:39', '2025-06-17 15:42:06', 1),
(85, 'admin', '2025-06-10 15:42:40', '2025-06-17 15:42:06', 1),
(86, 'admin', '2025-06-10 15:42:40', '2025-06-17 15:42:06', 1),
(87, 'admin', '2025-06-10 15:42:40', '2025-06-17 15:42:06', 1),
(88, 'admin', '2025-06-10 15:42:40', '2025-06-17 15:42:06', 1),
(89, 'admin', '2025-06-10 15:42:40', '2025-06-17 15:42:06', 1),
(90, 'admin', '2025-06-10 15:42:41', '2025-06-17 15:42:06', 1),
(91, 'admin', '2025-06-10 15:42:42', '2025-06-17 15:42:06', 1),
(92, 'admin', '2025-06-10 15:42:42', '2025-06-17 15:42:06', 1),
(93, 'admin', '2025-06-10 15:42:42', '2025-06-17 15:42:06', 1),
(94, 'admin', '2025-06-10 15:42:42', '2025-06-17 15:42:06', 1),
(95, 'admin', '2025-06-10 15:42:42', '2025-06-17 15:42:06', 1),
(96, 'admin', '2025-06-10 15:42:43', '2025-06-17 15:42:06', 1),
(97, 'admin', '2025-06-10 15:42:43', '2025-06-17 15:42:06', 1),
(98, 'admin', '2025-06-10 15:42:44', '2025-06-17 15:42:06', 1),
(99, 'admin', '2025-06-10 15:42:45', '2025-06-17 15:42:06', 1),
(100, 'admin', '2025-06-10 15:42:45', '2025-06-17 15:42:06', 1),
(101, 'admin', '2025-06-10 15:42:45', '2025-06-17 15:42:06', 1),
(102, 'admin', '2025-06-10 15:42:45', '2025-06-17 15:42:06', 1),
(103, 'admin', '2025-06-10 15:42:45', '2025-06-17 15:42:06', 1),
(104, 'admin', '2025-06-10 15:42:46', '2025-06-17 15:42:06', 1),
(105, 'admin', '2025-06-10 15:42:46', '2025-06-17 15:42:06', 1),
(106, 'admin', '2025-06-10 15:42:47', '2025-06-17 15:42:06', 1),
(107, 'admin', '2025-06-10 15:42:52', '2025-06-17 15:42:06', 1),
(108, 'admin', '2025-06-10 15:42:52', '2025-06-17 15:42:06', 1),
(109, 'admin', '2025-06-10 15:42:52', '2025-06-17 15:42:06', 1),
(110, 'admin', '2025-06-10 15:42:52', '2025-06-17 15:42:06', 1),
(111, 'admin', '2025-06-10 15:42:52', '2025-06-17 15:42:06', 1),
(112, 'admin', '2025-06-10 15:42:53', '2025-06-17 15:42:06', 1),
(113, 'admin', '2025-06-10 15:42:54', '2025-06-17 15:42:06', 1),
(114, 'admin', '2025-06-10 15:42:54', '2025-06-17 15:42:06', 1),
(115, 'admin', '2025-06-10 15:42:54', '2025-06-17 15:42:06', 1),
(116, 'admin', '2025-06-10 15:43:51', '2025-06-17 15:42:06', 1),
(117, 'admin', '2025-06-10 15:43:52', '2025-06-17 15:42:06', 1),
(118, 'admin', '2025-06-10 15:43:52', '2025-06-17 15:42:06', 1),
(119, 'admin', '2025-06-10 16:11:10', '2025-06-17 15:42:06', 1),
(120, 'admin', '2025-06-10 16:13:46', '2025-06-17 15:42:06', 1),
(121, 'admin', '2025-06-10 16:14:03', '2025-06-17 15:42:06', 1),
(122, 'admin', '2025-06-10 16:20:19', '2025-06-17 15:42:06', 1),
(123, 'admin', '2025-06-10 16:25:48', '2025-06-17 15:42:06', 1),
(124, 'admin', '2025-06-10 17:00:49', '2025-06-17 15:42:06', 1),
(125, 'admin', '2025-06-10 17:06:10', '2025-06-17 15:42:06', 1),
(126, 'admin', '2025-06-10 17:08:24', '2025-06-17 15:42:06', 1),
(127, 'admin', '2025-06-11 13:33:25', '2025-06-17 15:42:06', 1),
(128, 'admin', '2025-06-11 13:50:10', '2025-06-17 15:42:06', 1),
(129, 'admin', '2025-06-11 14:14:04', '2025-06-17 15:42:06', 1),
(130, 'admin', '2025-06-11 14:35:22', '2025-06-17 15:42:06', 1),
(131, 'admin', '2025-06-11 14:36:22', '2025-06-17 15:42:06', 1),
(132, 'admin', '2025-06-12 14:14:57', '2025-06-17 15:42:06', 1),
(133, 'admin', '2025-06-12 14:36:32', '2025-06-17 15:42:06', 1),
(134, 'admin', '2025-06-12 17:14:29', '2025-06-17 15:42:06', 1),
(135, 'admin', '2025-06-14 15:24:39', '2025-06-17 15:42:06', 1),
(136, 'admin', '2025-06-14 15:51:11', '2025-06-17 15:42:06', 1),
(137, 'admin', '2025-06-14 16:34:43', '2025-06-17 15:42:06', 1),
(138, 'admin', '2025-06-15 12:28:05', '2025-06-17 15:42:06', 1),
(139, 'admin', '2025-06-15 12:48:05', '2025-06-17 15:42:06', 1),
(140, 'admin', '2025-06-15 12:55:55', '2025-06-17 15:42:06', 1),
(141, 'admin', '2025-06-15 13:18:54', '2025-06-17 15:42:06', 1),
(142, 'admin', '2025-06-15 13:37:35', '2025-06-17 15:42:06', 1),
(143, 'admin', '2025-06-15 13:48:28', '2025-06-17 15:42:06', 1),
(144, 'admin', '2025-06-17 15:18:49', '2025-06-17 15:42:06', 1),
(145, 'admin', '2025-06-17 15:41:31', '2025-06-17 15:42:06', 1),
(146, 'admin', '2025-06-17 15:42:58', '', 1),
(147, 'admin', '2025-06-17 16:43:20', '', 1),
(148, 'admin', '2025-06-17 16:48:12', '', 1),
(149, 'admin', '2025-06-17 16:49:11', '', 1),
(150, 'admin', '2025-06-17 16:51:40', '', 1),
(151, 'admin', '2025-06-17 16:53:15', '', 1),
(152, 'admin', '2025-06-17 16:57:16', '', 1),
(153, 'admin', '2025-06-17 16:59:46', '', 1),
(154, 'admin', '2025-06-17 17:01:17', '', 1),
(155, 'admin', '2025-06-19 10:53:39', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  ADD PRIMARY KEY (`class_subject_overview_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`);

--
-- Indexes for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  ADD PRIMARY KEY (`teacher_class_announcements_id`);

--
-- Indexes for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  ADD PRIMARY KEY (`teacher_class_student_id`);

--
-- Indexes for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  ADD PRIMARY KEY (`teacher_notification_id`);

--
-- Indexes for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  ADD PRIMARY KEY (`teacher_shared_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  MODIFY `class_subject_overview_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202310118;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  MODIFY `teacher_class_announcements_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  MODIFY `teacher_shared_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
