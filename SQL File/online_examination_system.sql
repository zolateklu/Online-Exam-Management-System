-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 07:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_examination_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `password`, `name`) VALUES
('tom', 'tom', 'Tom T.');

-- --------------------------------------------------------

--
-- Table structure for table `alreadyloggedin`
--

CREATE TABLE `alreadyloggedin` (
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `course` varchar(15) NOT NULL,
  `type` varchar(35) NOT NULL,
  `year` int(11) NOT NULL,
  `semister` int(11) NOT NULL,
  `phone` varchar(35) NOT NULL,
  `email` varchar(25) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alreadyloggedin`
--

INSERT INTO `alreadyloggedin` (`fname`, `lname`, `student_id`, `course`, `type`, `year`, `semister`, `phone`, `email`, `gender`, `datetime`) VALUES
('john', 'doe', '7592749812', 'Discrete Maths', 'quiz', 2, 1, '251900000000', 'john@gmail.co', 'Female', '2020-07-11 10:19:33'),
('zelalem', 'teklu', '2409592325', 'Discrete Maths', 'quiz', 2, 1, '251923000000', 'zolateklu@github.com', 'Male', '2020-07-10 19:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(3) NOT NULL,
  `c_c_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dep_id` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `semister` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `c_c_id`, `name`, `dep_id`, `year`, `semister`) VALUES
(11, 1, 'Discrete Maths', 'Computer Science', 2, 1),
(12, 1, 'Computer Networking', 'Computer Science', 2, 2),
(13, 1, 'Graphics Design', 'Computer Science', 3, 1),
(15, 1, 'Management', 'BUMA', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE `course_category` (
  `category_id` int(11) NOT NULL,
  `cname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`category_id`, `cname`) VALUES
(2, 'Post Graduation'),
(1, 'Under Graduation');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `name`, `password`) VALUES
(1, 'Computer Science', 'cse@01'),
(2, 'BUMA', '123456'),
(4, 'Financial Accounting', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `stuid` varchar(15) NOT NULL,
  `Ques_id` int(11) NOT NULL,
  `chooseoption` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `stuid`, `Ques_id`, `chooseoption`) VALUES
(72, '2409592325', 35, '1'),
(73, '2409592325', 41, '22'),
(74, '2409592325', 43, 'x=0, y=0'),
(87, '7592749812', 35, NULL),
(88, '7592749812', 35, NULL),
(89, '7592749812', 41, NULL),
(90, '7592749812', 41, NULL),
(91, '7592749812', 43, NULL),
(92, '7592749812', 43, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `examschedule`
--

CREATE TABLE `examschedule` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(100) NOT NULL,
  `course_name` varchar(15) NOT NULL,
  `type` varchar(35) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time NOT NULL,
  `exam_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examschedule`
--

INSERT INTO `examschedule` (`id`, `dep_name`, `course_name`, `type`, `year`, `semester`, `exam_date`, `exam_time`, `exam_duration`) VALUES
(4, 'Computer Science', 'Discrete Maths', 'quiz', 2, 1, '2020-07-11', '09:24:27', 45);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `ins_id` int(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(35) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `country` varchar(35) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `course_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `dep_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`ins_id`, `name`, `phone`, `password`, `email`, `country`, `gender`, `course_name`, `dep_name`) VALUES
(94972132, 'tom john', '0923400000', 'tom', 'tomjo@gmail.com', 'ethiopian', 'Female', 'Discrete Maths', 'Computer Science'),
(531927190, 'zelalem teklu', '251923401111', 'zola', 'zolateklu@github.com', 'ethiopian', 'Male', 'Management', 'BUMA'),
(2147483647, 'doe john', '0916999999', 'zola', 'doe@github.com', 'ethiopian', 'Male', 'Graphics Design', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(5) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `type` varchar(35) NOT NULL,
  `name` varchar(255) NOT NULL,
  `optionA` varchar(30) NOT NULL,
  `optionB` varchar(30) NOT NULL,
  `optionC` varchar(30) NOT NULL,
  `optionD` varchar(30) NOT NULL,
  `correct_option` varchar(30) NOT NULL,
  `datetime` datetime NOT NULL,
  `year` int(11) NOT NULL,
  `semister` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `course_id`, `type`, `name`, `optionA`, `optionB`, `optionC`, `optionD`, `correct_option`, `datetime`, `year`, `semister`) VALUES
(35, 'Discrete Maths', 'quiz', ' Find x,\r\n           x^x=x', '20', '2', '64', '1', '1', '2020-05-17 22:42:14', 2, 1),
(41, 'Discrete Maths', 'quiz', 'what is the value of x,\r\n x +y=20-y\r\nx-5y=5+x', '20', '4', '64', '22', '22', '2020-05-23 07:33:43', 2, 1),
(42, 'Management', 'mid-exam', 'What is OM?', 'Operation Management', 'Opponent Meeting', 'Open Meeting', 'Open Manufacturing', 'Operation Management', '2020-07-04 16:12:10', 2, 2),
(43, 'Discrete Maths', 'quiz', 'x+y=0\r\nx-4y=0,\r\nFind x and y.', 'x=0, y=0', 'x=1, y=2', 'x=0, y=1', 'none', 'x=0, y=0', '2020-07-10 19:27:34', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `student_id` varchar(15) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `course` varchar(100) NOT NULL,
  `type` varchar(35) NOT NULL,
  `year` int(11) NOT NULL,
  `semister` int(11) NOT NULL,
  `no_of_questions` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`student_id`, `fname`, `lname`, `phone`, `email`, `gender`, `course`, `type`, `year`, `semister`, `no_of_questions`, `marks`, `percentage`) VALUES
('7592749812', 'doe', 'didi', '251911111111', 'didi@github.io', 'Female', 'Discrete Maths', 'quiz', 2, 1, 3, 0, 0),
('2409592325', 'zelalem', 'doe', '251923333333', 'zola@github.io', 'Male', 'Discrete Maths', 'quiz', 2, 1, 3, 3, 100);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `stuid` varchar(15) NOT NULL,
  `phone` varchar(35) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `country` varchar(15) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `dep_name` varchar(100) NOT NULL,
  `c_c_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `semister` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`fname`, `lname`, `stuid`, `phone`, `password`, `email`, `country`, `gender`, `dep_name`, `c_c_id`, `year`, `semister`, `status`) VALUES
('zelalem', 'github', '2409592325', '251923090909', 'zola', 'zolateklu@github.io', 'ethiopian', 'Male', 'Computer Science', 1, 2, 1, 1),
('tom', 'doe', '4077428000', '0912090909', 'tom', 'tom@yahoo.com', 'ethiopian', 'Female', 'BUMA', 1, 2, 1, 1),
('john', 'negi', '4557174508', '251942090909', '1234', 'negi@gmail.com', 'ethiopian', 'Male', 'Computer Science', 2, 1, 2, 1),
('doe', 'alex', '5744498212', '251917090909', '1234', 'alex@gmail.com', 'ethiopian', 'Female', 'Computer Science', 1, 5, 2, 1),
('kiki', 'doe', '7592749812', '251912090909', '1234', 'kiki@gmail.com', 'ethiopian', 'Female', 'Computer Science', 1, 2, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alreadyloggedin`
--
ALTER TABLE `alreadyloggedin`
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `c_c_id` (`c_c_id`),
  ADD KEY `dep_id` (`dep_id`),
  ADD KEY `name_2` (`name`);

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `cname` (`cname`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `examschedule`
--
ALTER TABLE `examschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`ins_id`),
  ADD KEY `email` (`email`),
  ADD KEY `email_2` (`email`),
  ADD KEY `phone` (`phone`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stuid`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `stu-dep` (`dep_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `examschedule`
--
ALTER TABLE `examschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`c_c_id`) REFERENCES `course_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
