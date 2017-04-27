-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 09:54 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(5) NOT NULL,
  `students_num` int(3) NOT NULL,
  `max_student_num` int(3) NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `students_num`, `max_student_num`, `level_id`) VALUES
(2, 12, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_to_teacher`
--

CREATE TABLE `class_to_teacher` (
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Ccomment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_content`, `post_id`, `user_id`, `Ccomment_date`) VALUES
(4, 'kjfklshfklhsdfkjbsdfkjsd', 3, 2, '2017-04-26 21:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `general_user`
--

CREATE TABLE `general_user` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `mid_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_user`
--

INSERT INTO `general_user` (`id`, `group_id`, `username`, `password`, `first_name`, `mid_name`, `last_name`, `gender`, `email`, `city`, `country`, `street`, `birth_date`) VALUES
(1, 1, '1', '1', '1', '1', '1', 1, '1', '1', '1', '1', '2017-04-18'),
(2, 2, '2', '2', '2', '2', '2', 2, '2', '2', '2', '2', '2017-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `hw`
--

CREATE TABLE `hw` (
  `hw_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hw_answer`
--

CREATE TABLE `hw_answer` (
  `answer_id` int(11) NOT NULL,
  `hw_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `iq_test`
--

CREATE TABLE `iq_test` (
  `question` text NOT NULL,
  `right_answer` text NOT NULL,
  `wrong_first` text NOT NULL,
  `wrong_second` text NOT NULL,
  `wrong_third` text NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(5) NOT NULL,
  `value` int(5) NOT NULL,
  `stage` int(3) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `value`, `stage`, `name`) VALUES
(1, 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `level_to_sub`
--

CREATE TABLE `level_to_sub` (
  `level_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `med_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `food_sensitivices` text NOT NULL,
  `illness_detail` text NOT NULL,
  `speachal_needs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `type` int(2) NOT NULL,
  `company_name` varchar(40) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `home_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parent_to_student`
--

CREATE TABLE `parent_to_student` (
  `parent_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `class_id` int(5) NOT NULL,
  `post_content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_report` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `class_id`, `post_content`, `user_id`, `post_date`, `post_report`) VALUES
(2, 2, 'ghghgf', 1, '2017-04-26 20:50:37', 0),
(3, 2, 'fgfdgfdgdfhfgjhjh', 1, '2017-04-26 20:56:10', 1),
(4, 2, 'gfgfhfghhhhhhhhhhhhhhhhhhhhhhhhh', 2, '2017-04-26 21:41:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sibling`
--

CREATE TABLE `sibling` (
  `name` varchar(30) NOT NULL,
  `school` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sibling_to_student`
--

CREATE TABLE `sibling_to_student` (
  `sibling_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `stage` int(3) NOT NULL,
  `emrg_persone_name` varchar(30) DEFAULT NULL,
  `emrg_persone_relation` varchar(30) DEFAULT NULL,
  `emrg_persone_phone` varchar(15) DEFAULT NULL,
  `class_id` int(5) NOT NULL,
  `level_id` int(11) NOT NULL,
  `iq_grade` float DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `level_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin`
--

CREATE TABLE `sub_admin` (
  `sub_admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `class_id` int(5) NOT NULL,
  `sub_id` int(5) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vaccinations`
--

CREATE TABLE `vaccinations` (
  `vaccinations_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `med_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `class_to_teacher`
--
ALTER TABLE `class_to_teacher`
  ADD PRIMARY KEY (`teacher_id`,`class_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD UNIQUE KEY `comment_id` (`comment_id`),
  ADD KEY `comment_ibfk_1` (`post_id`),
  ADD KEY `comment_ibfk_2` (`user_id`);

--
-- Indexes for table `general_user`
--
ALTER TABLE `general_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hw`
--
ALTER TABLE `hw`
  ADD PRIMARY KEY (`hw_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `hw_answer`
--
ALTER TABLE `hw_answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `hw_id` (`hw_id`),
  ADD KEY `stu_id` (`stu_id`);

--
-- Indexes for table `iq_test`
--
ALTER TABLE `iq_test`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_to_sub`
--
ALTER TABLE `level_to_sub`
  ADD PRIMARY KEY (`level_id`,`sub_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `stu_id` (`stu_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `parent_to_student`
--
ALTER TABLE `parent_to_student`
  ADD PRIMARY KEY (`parent_id`,`stu_id`),
  ADD KEY `stu_id` (`stu_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_ibfk_1` (`user_id`),
  ADD KEY `post_ibfk_2` (`class_id`);

--
-- Indexes for table `sibling`
--
ALTER TABLE `sibling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sibling_to_student`
--
ALTER TABLE `sibling_to_student`
  ADD PRIMARY KEY (`sibling_id`,`stu_id`),
  ADD KEY `stu_id` (`stu_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_admin`
--
ALTER TABLE `sub_admin`
  ADD PRIMARY KEY (`sub_admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD PRIMARY KEY (`vaccinations_id`),
  ADD KEY `med_id` (`med_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `general_user`
--
ALTER TABLE `general_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hw`
--
ALTER TABLE `hw`
  MODIFY `hw_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hw_answer`
--
ALTER TABLE `hw_answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iq_test`
--
ALTER TABLE `iq_test`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sibling`
--
ALTER TABLE `sibling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_admin`
--
ALTER TABLE `sub_admin`
  MODIFY `sub_admin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vaccinations`
--
ALTER TABLE `vaccinations`
  MODIFY `vaccinations_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `general_user` (`id`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`);

--
-- Constraints for table `class_to_teacher`
--
ALTER TABLE `class_to_teacher`
  ADD CONSTRAINT `class_to_teacher_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `class_to_teacher_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `general_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hw`
--
ALTER TABLE `hw`
  ADD CONSTRAINT `hw_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `hw_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`id`);

--
-- Constraints for table `hw_answer`
--
ALTER TABLE `hw_answer`
  ADD CONSTRAINT `hw_answer_ibfk_1` FOREIGN KEY (`hw_id`) REFERENCES `hw` (`hw_id`),
  ADD CONSTRAINT `hw_answer_ibfk_2` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`);

--
-- Constraints for table `level_to_sub`
--
ALTER TABLE `level_to_sub`
  ADD CONSTRAINT `level_to_sub_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`),
  ADD CONSTRAINT `level_to_sub_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`id`);

--
-- Constraints for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD CONSTRAINT `medical_history_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `general_user` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `general_user` (`id`);

--
-- Constraints for table `parent_to_student`
--
ALTER TABLE `parent_to_student`
  ADD CONSTRAINT `parent_to_student_ibfk_2` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`),
  ADD CONSTRAINT `parent_to_student_ibfk_3` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `general_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sibling_to_student`
--
ALTER TABLE `sibling_to_student`
  ADD CONSTRAINT `sibling_to_student_ibfk_1` FOREIGN KEY (`sibling_id`) REFERENCES `sibling` (`id`),
  ADD CONSTRAINT `sibling_to_student_ibfk_2` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `general_user` (`id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `sub_admin`
--
ALTER TABLE `sub_admin`
  ADD CONSTRAINT `sub_admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `general_user` (`id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `general_user` (`id`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`id`);

--
-- Constraints for table `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD CONSTRAINT `vaccinations_ibfk_1` FOREIGN KEY (`med_id`) REFERENCES `medical_history` (`med_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
