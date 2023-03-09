-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 04:42 AM
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
-- Database: `testelearning_emp`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `dept_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `dept_name`, `dept_code`) VALUES
(1, 'Admin', 'Admin'),
(2, 'Library', 'Lib'),
(3, 'Information and Communication Technology', 'ICT'),
(4, 'English', 'English'),
(5, 'Mathematics', 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `grade` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id`, `subject_id`, `student_id`, `teacher_id`, `grade`) VALUES
(1, 1, 1, 1, NULL),
(3, 1, 3, 2, NULL),
(4, 2, 1, 2, NULL),
(7, 4, 3, 1, NULL),
(8, 5, 1, 2, NULL),
(14, 3, 9, 1, NULL),
(31, 1, 26, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `ID` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`ID`, `name`, `email`, `username`, `password`, `department`, `role`, `pic`) VALUES
('A000000002', 'admin 2', 'admin2@gmail.com', 'admin2', 'admin2', 'Admin', 'Admin', ''),
('A000000003', 'admin 3', 'admin3@gmail.com', 'admin3', 'admin3', 'Admin', 'Admin', ''),
('E0000000007', 'admin 1', 'admin1@gmail.com', 'admin1', 'admin1', 'Information and Communication Technology', 'Teacher', 0x6e6f2d757365722d696d6167652e6a7067),
('E000000001', 'employee 1', 'emp1@gmail.com', 'emp1', 'emp1', 'Math', 'Teacher', ''),
('E000000002', 'employee 2', 'emp2@gmail.com', 'emp2', 'emp2', 'ICT', 'Teacher', ''),
('E000000003', 'employee 3', 'emp3@gmail.com', 'emp3', 'emp3', 'ICT', 'Teacher', ''),
('E000000004', 'employee 4', 'emp4@gmail.com', 'emp4', 'emp4', 'Math', 'Teacher', ''),
('E000000005', 'employee 5', 'emp5@gmail.com', 'emp5', 'emp5', 'ICT', 'Teacher', ''),
('E000000006', 'employee 6', 'emp6@gmail.com', 'emp6', 'emp6', 'ICT', 'Teacher', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `email`, `username`, `password`, `role`, `picture`) VALUES
(1, 'Alice Adams', 'aliceadams@example.com', NULL, NULL, NULL, NULL),
(3, 'Charlie Chen', 'charliechen@example.com', NULL, NULL, NULL, NULL),
(9, 'Sherwyne', 'sherwyne.costiniano@gmail.com', NULL, NULL, NULL, NULL),
(26, 'Rose Ann Mae', 'ramnsantos00@gmail.com', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `units` decimal(10,1) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `teacher_id`, `units`, `department_id`) VALUES
(1, 'Math', 1, '3.0', NULL),
(2, 'Science', 2, '3.0', NULL),
(3, 'English', 3, '3.0', NULL),
(4, 'History', 1, '3.0', NULL),
(5, 'Art', 2, '3.0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(60) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `name`, `username`, `picture`, `password`, `role`, `email`) VALUES
(1, 'John Doe', 'teacher1', '/E-Learning/assets/imgs/dick.png', 'admin123', 'Teacher', 'teacher1@gmail.com'),
(2, 'Jane Smith', 'teacher2', '/E-Learning/assets/imgs/dick.png', 'admin123', 'Teacher', 'teacher2@gmail.com'),
(3, 'Bob Johnson', 'teacher3', '/E-Learning/assets/imgs/dick.png', 'admin123', 'Teacher', 'teacher3@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `dept_code` (`dept_code`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `department` (`department`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
