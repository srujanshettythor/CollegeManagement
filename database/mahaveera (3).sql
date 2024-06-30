-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 04:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahaveera`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(300) NOT NULL,
  `a_email` varchar(500) NOT NULL,
  `a_profilepic` varchar(1000) NOT NULL,
  `a_password` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_profilepic`, `a_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'upload/testimonial-3.jpg', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `an_id` int(11) NOT NULL,
  `an_title` varchar(300) NOT NULL,
  `an_description` varchar(800) NOT NULL,
  `an_starting_date` varchar(1000) NOT NULL,
  `an_expiry_date` varchar(800) NOT NULL,
  `an_poster` varchar(1000) NOT NULL,
  `an_posted_date` date NOT NULL,
  `an_updated_date` date NOT NULL,
  `an_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`an_id`, `an_title`, `an_description`, `an_starting_date`, `an_expiry_date`, `an_poster`, `an_posted_date`, `an_updated_date`, `an_status`) VALUES
(1, 'Announcement title', 'Announcement descrption', '2023-06-07', '2023-06-14', 'upload/testimonials-3.jpg', '2023-06-12', '2023-06-12', 'active'),
(2, 'Announcement title', 'Announcement descrption', '2023-06-07', '2023-06-14', 'upload/testimonials-3.jpg', '2023-06-12', '2023-06-12', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `at_id` int(11) NOT NULL,
  `at_date` date NOT NULL,
  `s_id` int(11) NOT NULL,
  `tr_id` int(11) NOT NULL,
  `sb_id` int(11) NOT NULL,
  `at_day` varchar(300) NOT NULL,
  `at_class` varchar(300) NOT NULL,
  `at_class_start` varchar(300) NOT NULL,
  `at_class_end` varchar(300) NOT NULL,
  `at_posted_date` date NOT NULL,
  `at_updated_date` varchar(500) NOT NULL,
  `at_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`at_id`, `at_date`, `s_id`, `tr_id`, `sb_id`, `at_day`, `at_class`, `at_class_start`, `at_class_end`, `at_posted_date`, `at_updated_date`, `at_status`) VALUES
(1, '2023-07-01', 1, 1, 1, 'Monday', 'I class', '9:25 AM', '10:25 AM', '2023-07-01', '2023-07-01', 'Absent'),
(2, '2023-07-01', 1, 1, 5, 'Monday', 'I class', '9:25 AM', '10:25 AM', '2023-07-01', '2023-07-01', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `cl_id` int(11) NOT NULL,
  `cs_id` int(11) NOT NULL,
  `cl_name` varchar(300) NOT NULL,
  `cl_posted_date` date NOT NULL,
  `cl_updated_date` date NOT NULL,
  `cl_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`cl_id`, `cs_id`, `cl_name`, `cl_posted_date`, `cl_updated_date`, `cl_status`) VALUES
(1, 1, 'I year', '2023-06-24', '0000-00-00', 'active'),
(2, 1, 'II year', '2023-06-24', '2023-06-24', 'active'),
(3, 1, 'III year', '2023-06-24', '2023-06-24', 'active'),
(4, 2, 'I year', '2023-06-24', '2023-06-25', 'active'),
(5, 2, 'II year', '2023-06-24', '2023-06-25', 'active'),
(6, 2, 'III year', '2023-06-24', '2023-06-25', 'active'),
(7, 3, 'I year', '2023-06-24', '2023-06-25', 'active'),
(8, 3, 'II year', '2023-06-24', '2023-06-25', 'active'),
(9, 3, 'III year', '2023-06-24', '2023-06-25', 'active'),
(10, 4, 'I year', '2023-06-24', '2023-06-25', 'active'),
(11, 4, 'II year', '2023-06-24', '2023-06-25', 'active'),
(12, 4, 'III year', '2023-06-24', '2023-06-25', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cs_id` int(11) NOT NULL,
  `cs_name` varchar(500) NOT NULL,
  `cs_posted_date` date NOT NULL,
  `cs_updated_date` date NOT NULL,
  `cs_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cs_id`, `cs_name`, `cs_posted_date`, `cs_updated_date`, `cs_status`) VALUES
(1, 'Bcom', '0000-00-00', '2023-06-24', 'active'),
(2, 'BCA', '2023-06-24', '0000-00-00', 'active'),
(3, 'BSC', '2023-06-24', '0000-00-00', 'active'),
(4, 'BA', '2023-06-24', '0000-00-00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `m_id` int(11) NOT NULL,
  `m_exam` varchar(500) NOT NULL,
  `tr_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `sb_id` int(11) NOT NULL,
  `m_total_marks` int(11) NOT NULL,
  `m_marks_obtained` int(11) NOT NULL,
  `m_grade` varchar(500) NOT NULL,
  `m_percentage` varchar(400) NOT NULL,
  `m_posted_date` date NOT NULL,
  `m_updated_date` date NOT NULL,
  `m_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`m_id`, `m_exam`, `tr_id`, `s_id`, `sb_id`, `m_total_marks`, `m_marks_obtained`, `m_grade`, `m_percentage`, `m_posted_date`, `m_updated_date`, `m_status`) VALUES
(1, 'First Internal', 1, 1, 5, 40, 30, 'A', '75', '2023-07-01', '0000-00-00', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `q_id` int(11) NOT NULL,
  `q_title` varchar(500) NOT NULL,
  `q_description` varchar(800) NOT NULL,
  `s_id` int(11) NOT NULL,
  `q_posted_date` date NOT NULL,
  `q_updated_date` date NOT NULL,
  `q_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`q_id`, `q_title`, `q_description`, `s_id`, `q_posted_date`, `q_updated_date`, `q_status`) VALUES
(1, 'title', 'message', 1, '2023-07-01', '2023-07-01', 'responded');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `r_id` int(11) NOT NULL,
  `r_date` date NOT NULL,
  `q_id` int(11) NOT NULL,
  `r_description` varchar(800) NOT NULL,
  `r_updated_date` varchar(500) NOT NULL,
  `r_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`r_id`, `r_date`, `q_id`, `r_description`, `r_updated_date`, `r_status`) VALUES
(1, '2023-07-01', 1, 'okay', '', 'responded');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `sm_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `sm_name` varchar(300) NOT NULL,
  `sm_posted_date` date NOT NULL,
  `sm_updated_date` date NOT NULL,
  `sm_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`sm_id`, `cl_id`, `sm_name`, `sm_posted_date`, `sm_updated_date`, `sm_status`) VALUES
(1, 1, 'I semester', '2023-06-24', '0000-00-00', 'active'),
(2, 1, 'II semester', '2023-06-24', '0000-00-00', 'active'),
(3, 2, 'III semester', '2023-06-24', '2023-06-24', 'active'),
(4, 2, 'IV Semester', '2023-06-24', '2023-06-24', 'active'),
(5, 3, 'V semester', '2023-06-24', '2023-06-24', 'active'),
(6, 3, 'VI semester', '2023-06-24', '0000-00-00', 'active'),
(7, 4, 'I semester', '2023-06-24', '0000-00-00', 'active'),
(8, 4, 'II semester', '2023-06-24', '2023-06-24', 'active'),
(9, 5, '3 semester', '2023-06-24', '0000-00-00', 'active'),
(10, 5, 'IV semester', '2023-06-24', '0000-00-00', 'active'),
(11, 6, 'V semester', '2023-06-24', '0000-00-00', 'active'),
(12, 6, 'VI semester', '2023-06-24', '0000-00-00', 'active'),
(13, 7, 'I semester', '2023-06-24', '0000-00-00', 'active'),
(14, 7, 'II semester', '2023-06-24', '0000-00-00', 'active'),
(15, 8, 'III semester', '2023-06-24', '0000-00-00', 'active'),
(16, 8, 'IV semester', '2023-06-24', '0000-00-00', 'active'),
(17, 9, 'V semester', '2023-06-24', '0000-00-00', 'active'),
(18, 9, 'VI semester', '2023-06-24', '0000-00-00', 'active'),
(19, 10, 'I semester', '2023-06-24', '0000-00-00', 'active'),
(20, 10, 'II semester', '2023-06-24', '0000-00-00', 'active'),
(21, 11, 'III semester', '2023-06-24', '0000-00-00', 'active'),
(22, 11, 'IV semester', '2023-06-24', '0000-00-00', 'active'),
(23, 12, 'V semester', '2023-06-24', '0000-00-00', 'active'),
(24, 12, 'VI semester', '2023-06-24', '0000-00-00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `st_id` int(11) NOT NULL,
  `st_name` varchar(250) NOT NULL,
  `st_dept` varchar(300) NOT NULL,
  `st_desig` varchar(500) NOT NULL,
  `st_gender` varchar(300) NOT NULL,
  `st_phone` bigint(25) NOT NULL,
  `st_email` varchar(800) NOT NULL,
  `st_password` varchar(500) NOT NULL,
  `st_quali` varchar(600) NOT NULL,
  `st_address` varchar(800) NOT NULL,
  `st_city` varchar(500) NOT NULL,
  `st_state` varchar(400) NOT NULL,
  `st_pincode` varchar(500) NOT NULL,
  `st_profilepic` varchar(600) NOT NULL,
  `st_created_date` date NOT NULL,
  `st_updated_date` date NOT NULL,
  `st_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`st_id`, `st_name`, `st_dept`, `st_desig`, `st_gender`, `st_phone`, `st_email`, `st_password`, `st_quali`, `st_address`, `st_city`, `st_state`, `st_pincode`, `st_profilepic`, `st_created_date`, `st_updated_date`, `st_status`) VALUES
(1, 'Staff', '1', 'guest lecturer', 'Male', 9876543210, 'staff@gmail.com', '12345', '', 'Address', 'City', 'State', '123456', 'upload/team-1.jpg', '2023-07-01', '0000-00-00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(300) NOT NULL,
  `s_register` varchar(500) NOT NULL,
  `s_email` varchar(1000) NOT NULL,
  `s_phone` varchar(800) NOT NULL,
  `s_fathername` varchar(500) NOT NULL,
  `s_mothername` varchar(500) NOT NULL,
  `s_gender` varchar(250) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `s_address` varchar(500) NOT NULL,
  `s_city` varchar(4004) NOT NULL,
  `s_state` varchar(400) NOT NULL,
  `s_pincode` int(20) NOT NULL,
  `s_profilepic` varchar(1000) NOT NULL,
  `s_password` varchar(1000) NOT NULL,
  `s_created_date` date NOT NULL,
  `s_updated_date` date NOT NULL,
  `s_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_register`, `s_email`, `s_phone`, `s_fathername`, `s_mothername`, `s_gender`, `cl_id`, `s_address`, `s_city`, `s_state`, `s_pincode`, `s_profilepic`, `s_password`, `s_created_date`, `s_updated_date`, `s_status`) VALUES
(1, 'Student', 'MC2023101', 'student@gmail.com', '9876543210', 'Father', 'Mother', 'male', 1, 'Address', 'City', 'State', 123456, 'upload/avatar.jpg', '12345', '2023-07-01', '0000-00-00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `study_material`
--

CREATE TABLE `study_material` (
  `sm_id` int(11) NOT NULL,
  `sm_date` varchar(500) NOT NULL,
  `sb_id` int(11) NOT NULL,
  `sm_file` varchar(500) NOT NULL,
  `sm_title` varchar(500) NOT NULL,
  `sm_description` varchar(1500) NOT NULL,
  `st_id` int(11) NOT NULL,
  `sm_updated_date` varchar(500) NOT NULL,
  `sm_posted_date` date NOT NULL,
  `sm_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `study_material`
--

INSERT INTO `study_material` (`sm_id`, `sm_date`, `sb_id`, `sm_file`, `sm_title`, `sm_description`, `st_id`, `sm_updated_date`, `sm_posted_date`, `sm_status`) VALUES
(3, '2023-07-01', 5, 'files/KMN-103-12-Jun-2023-9-54-51.pdf', 'notes', 'descri[tion', 1, '', '2023-07-01', 'posted');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sb_id` int(11) NOT NULL,
  `sm_id` int(11) NOT NULL,
  `sb_name` varchar(300) NOT NULL,
  `sb_posted_date` date NOT NULL,
  `sb_updated_date` date NOT NULL,
  `sb_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sb_id`, `sm_id`, `sb_name`, `sb_posted_date`, `sb_updated_date`, `sb_status`) VALUES
(2, 1, 'Hindi', '2023-06-24', '0000-00-00', 'active'),
(3, 1, 'English', '2023-06-24', '0000-00-00', 'active'),
(4, 1, 'Kannada', '2023-06-24', '0000-00-00', 'active'),
(5, 1, 'Financial accounting', '2023-06-24', '0000-00-00', 'active'),
(6, 1, 'Management principle and application', '2023-06-24', '0000-00-00', 'active'),
(7, 1, 'Principle of marketing', '2023-06-24', '0000-00-00', 'active'),
(8, 1, 'Digital fluency for business', '2023-06-24', '0000-00-00', 'active'),
(9, 1, 'Open elective', '2023-06-24', '0000-00-00', 'active'),
(10, 1, 'Yoga', '2023-06-24', '0000-00-00', 'active'),
(11, 1, 'Health and wellness', '2023-06-24', '0000-00-00', 'active'),
(12, 2, 'Hindi', '2023-06-24', '2023-06-24', 'active'),
(13, 2, 'Kannada', '2023-06-24', '0000-00-00', 'active'),
(14, 2, 'English', '2023-06-24', '0000-00-00', 'active'),
(15, 2, 'Advance financial accounting', '2023-06-24', '0000-00-00', 'active'),
(16, 2, 'Business mathematics / Corporate administration ', '2023-06-24', '0000-00-00', 'active'),
(17, 2, 'Law and practice of banking', '2023-06-24', '2023-06-24', 'active'),
(18, 2, 'Environmental studies', '2023-06-24', '0000-00-00', 'active'),
(19, 2, 'Open elective', '2023-06-24', '0000-00-00', 'active'),
(20, 2, 'Sports', '2023-06-24', '0000-00-00', 'active'),
(21, 2, 'NSS/NCC/Red cross/Rovers and rangers', '2023-06-24', '2023-06-24', 'active'),
(22, 3, 'Hindi', '2023-06-24', '0000-00-00', 'active'),
(23, 3, 'English', '2023-06-24', '0000-00-00', 'active'),
(24, 3, 'Kannada', '2023-06-24', '0000-00-00', 'active'),
(25, 3, 'Corporate Accounting', '2023-06-24', '0000-00-00', 'active'),
(26, 3, 'Business Statistics', '2023-06-24', '0000-00-00', 'active'),
(27, 3, 'Cost Accounting', '2023-06-24', '0000-00-00', 'active'),
(28, 3, 'Artificial Intelligence ', '2023-06-24', '0000-00-00', 'active'),
(29, 3, 'Sports', '2023-06-24', '0000-00-00', 'active'),
(30, 3, 'NCC/NSS/R&R(S&G)/Cul tural', '2023-06-24', '0000-00-00', 'active'),
(31, 3, 'Open elective', '2023-06-24', '0000-00-00', 'active'),
(32, 4, 'Hindi', '2023-06-24', '0000-00-00', 'active'),
(33, 4, 'English', '2023-06-24', '0000-00-00', 'active'),
(34, 4, 'Kannada', '2023-06-24', '0000-00-00', 'active'),
(35, 4, 'Advanced Corporate Accounting ', '2023-06-24', '0000-00-00', 'active'),
(36, 4, 'Costing Methods & Techniques', '2023-06-24', '0000-00-00', 'active'),
(37, 4, 'Business Regulatory Framework ', '2023-06-24', '0000-00-00', 'active'),
(38, 4, 'Constitution of India', '2023-06-24', '0000-00-00', 'active'),
(39, 4, 'Sports', '2023-06-24', '0000-00-00', 'active'),
(40, 4, 'NCC/NSS/R&R(S&G)/Cu ltural ', '2023-06-24', '0000-00-00', 'active'),
(41, 4, 'Open elective', '2023-06-24', '0000-00-00', 'active'),
(42, 5, 'Financial Management', '2023-06-25', '0000-00-00', 'active'),
(43, 5, 'Income Tax Law and Practice', '2023-06-25', '0000-00-00', 'active'),
(44, 5, 'Auditing and Assurance', '2023-06-25', '0000-00-00', 'active'),
(45, 5, 'One Course from the Selected Elective Group', '2023-06-25', '0000-00-00', 'active'),
(46, 5, 'GST- Law & Practice', '2023-06-25', '0000-00-00', 'active'),
(47, 5, 'Cyber Security/Ethics & Self Awareness', '2023-06-25', '0000-00-00', 'active'),
(48, 6, 'Management Accounting', '2023-06-25', '0000-00-00', 'active'),
(49, 6, 'Income Tax Law and Practice-II', '2023-06-25', '0000-00-00', 'active'),
(50, 6, 'Three courses from the Selected Elective Group', '2023-06-25', '0000-00-00', 'active'),
(51, 6, 'Basics of Spread Sheet Modelling OR Report on Study of Startups and Innovative Business Ideas', '2023-06-25', '0000-00-00', 'active'),
(52, 6, 'Professional Communication', '2023-06-25', '0000-00-00', 'active'),
(53, 7, 'Fundamentals of Computers ', '2023-06-25', '0000-00-00', 'active'),
(54, 7, 'Programming in C ', '2023-06-25', '0000-00-00', 'active'),
(55, 7, 'Mathematical Foundation/ Accountancy ', '2023-06-25', '0000-00-00', 'active'),
(56, 7, 'LAB: Information Technology', '2023-06-25', '0000-00-00', 'active'),
(57, 7, 'LAB: C Programming', '2023-06-25', '0000-00-00', 'active'),
(58, 7, 'Hindi', '2023-06-25', '0000-00-00', 'active'),
(59, 7, 'Kannada', '2023-06-25', '0000-00-00', 'active'),
(60, 7, 'English', '2023-06-25', '0000-00-00', 'active'),
(61, 7, 'Yoga', '2023-06-25', '0000-00-00', 'active'),
(62, 7, 'Health and wellness', '2023-06-25', '0000-00-00', 'active'),
(63, 8, 'Hindi', '2023-06-25', '0000-00-00', 'active'),
(64, 8, 'Kannada', '2023-06-25', '0000-00-00', 'active'),
(65, 8, 'English', '2023-06-25', '0000-00-00', 'active'),
(66, 8, 'Data Structures using C', '2023-06-25', '0000-00-00', 'active'),
(67, 8, 'Object Oriented Concepts using JAVA', '2023-06-25', '0000-00-00', 'active'),
(68, 8, 'Discrete Mathematical Structures', '2023-06-25', '0000-00-00', 'active'),
(69, 8, 'LAB: Data Structure ', '2023-06-25', '0000-00-00', 'active'),
(70, 8, 'LAB: JAVA', '2023-06-25', '0000-00-00', 'active'),
(71, 9, 'Kannada', '2023-06-25', '2023-06-25', 'active'),
(72, 9, 'Hindi', '2023-06-25', '0000-00-00', 'active'),
(73, 9, 'English', '2023-06-25', '0000-00-00', 'active'),
(74, 9, 'Data Base Management Systems', '2023-06-25', '0000-00-00', 'active'),
(75, 9, 'C# and DOT NET Framework', '2023-06-25', '0000-00-00', 'active'),
(76, 9, 'Computer Communication and Networks', '2023-06-25', '0000-00-00', 'active'),
(77, 9, 'LAB: DBMS ', '2023-06-25', '0000-00-00', 'active'),
(78, 9, 'LAB: C# and DOT NET Framework', '2023-06-25', '0000-00-00', 'active'),
(79, 10, 'Kannada', '2023-06-25', '0000-00-00', 'active'),
(80, 10, 'English', '2023-06-25', '0000-00-00', 'active'),
(81, 10, 'Hindi', '2023-06-25', '2023-06-25', 'active'),
(82, 10, 'Python Programming', '2023-06-25', '0000-00-00', 'active'),
(83, 10, 'Computer Multimedia and Animation', '2023-06-25', '0000-00-00', 'active'),
(84, 10, 'Operating System Concepts ', '2023-06-25', '0000-00-00', 'active'),
(85, 10, 'LAB: Python programming', '2023-06-25', '2023-06-25', 'active'),
(86, 10, 'LAB: Multimedia and Animation', '2023-06-25', '0000-00-00', 'active'),
(87, 11, 'Internet Technologies ', '2023-06-25', '0000-00-00', 'active'),
(88, 11, 'Statistical Computing and R Programming', '2023-06-25', '0000-00-00', 'active'),
(90, 11, 'Software Engineering', '2023-06-25', '0000-00-00', 'active'),
(91, 11, 'LAB: JAVA Script, HTML and CSS', '2023-06-25', '0000-00-00', 'active'),
(92, 11, 'LAB: R Programming', '2023-06-25', '0000-00-00', 'active'),
(93, 12, 'PHP and MySQL', '2023-06-25', '0000-00-00', 'active'),
(94, 12, 'Artificial Intelligence and Applications', '2023-06-25', '0000-00-00', 'active'),
(95, 12, 'LAB: PHP and MySQL ', '2023-06-25', '0000-00-00', 'active'),
(96, 12, 'Project Work', '2023-06-25', '0000-00-00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tr_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `sb_id` int(11) NOT NULL,
  `tr_assigned_date` date NOT NULL,
  `tr_updated_date` date NOT NULL,
  `tr_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tr_id`, `st_id`, `sb_id`, `tr_assigned_date`, `tr_updated_date`, `tr_status`) VALUES
(1, 1, 5, '2023-07-01', '0000-00-00', 'assigned');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `tt_id` int(11) NOT NULL,
  `tt_date` date NOT NULL,
  `tt_day` varchar(500) NOT NULL,
  `sm_id` int(11) NOT NULL,
  `tt_first` varchar(500) NOT NULL,
  `tt_second` varchar(500) NOT NULL,
  `tt_third` varchar(500) NOT NULL,
  `tt_fourth` varchar(500) NOT NULL,
  `tt_fifth` varchar(500) NOT NULL,
  `tt_updated_date` varchar(500) NOT NULL,
  `tt_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`tt_id`, `tt_date`, `tt_day`, `sm_id`, `tt_first`, `tt_second`, `tt_third`, `tt_fourth`, `tt_fifth`, `tt_updated_date`, `tt_status`) VALUES
(3, '2023-07-01', 'Monday', 1, '2', '3', '4', '5', '6', '', 'alloted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`an_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`at_id`),
  ADD KEY `studentattendance` (`s_id`),
  ADD KEY `staffattendance` (`tr_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `studmark` (`s_id`),
  ADD KEY `staffdept` (`tr_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `studentid` (`s_id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `queryid` (`q_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `classid` (`cl_id`);

--
-- Indexes for table `study_material`
--
ALTER TABLE `study_material`
  ADD PRIMARY KEY (`sm_id`),
  ADD KEY `staffname` (`st_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sb_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`tt_id`),
  ADD KEY `classname` (`sm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `an_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `study_material`
--
ALTER TABLE `study_material`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `tt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `queryid` FOREIGN KEY (`q_id`) REFERENCES `query` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
