-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 06:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_19190859`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_info`
--

CREATE TABLE `class_info` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(30) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day` varchar(10) NOT NULL,
  `venue_name` varchar(255) NOT NULL,
  `teacher_lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_info`
--

INSERT INTO `class_info` (`class_id`, `class_name`, `start_time`, `end_time`, `day`, `venue_name`, `teacher_lastname`) VALUES
(101, 'flute class', '18:00:00', '18:30:00', 'Friday', 'Music School Building 1', 'Reilly'),
(102, 'violin class', '18:30:00', '19:00:00', 'Friday', 'Music School Building 1', 'Casey'),
(103, 'guitar class', '18:00:00', '18:30:00', 'Saturday', 'Music School Building 2', 'Barrett'),
(104, 'tin whistle class', '18:30:00', '19:00:00', 'Saturday', 'Music School Building 2', 'Murphy');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `student_id` int(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`student_id`, `last_name`, `first_name`, `email`, `class_id`) VALUES
(1, 'Rowland', 'Ian', 'irow@gmail.com', 103),
(2, 'book', 'alex', 'abook@gmail.com', 104),
(3, 'O\'Connell', 'Garfield', 'goconnell@gmail.com', 101),
(4, '', '', '', 104),
(5, 'beef', 'kyle', 'kbeef@mail.com', 102);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_lastname` varchar(255) NOT NULL,
  `teacher_firstname` varchar(255) NOT NULL,
  `instrument` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_lastname`, `teacher_firstname`, `instrument`, `email`) VALUES
('Barrett', 'Yvonne', 'Guitar', 'ybarrett@gmail.com'),
('Casey', 'Barry', 'Violin', 'bcasey@gmail.com'),
('Murphy', 'Gary', 'Tin Whistle', 'gmurphy@gmail.com'),
('Reilly', 'Bill', 'Flute', 'breilly@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venue_name` varchar(255) NOT NULL,
  `venue_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_name`, `venue_address`) VALUES
('Music School Building 1', 'Number 3, Brook Street, Carlow City'),
('Music School Building 2', 'Number 4, Brook Street, Carlow City');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_info`
--
ALTER TABLE `class_info`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `venue_name` (`venue_name`),
  ADD KEY `teacher_lastname` (`teacher_lastname`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_lastname`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venue_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_info`
--
ALTER TABLE `class_info`
  ADD CONSTRAINT `class_info_ibfk_1` FOREIGN KEY (`venue_name`) REFERENCES `venues` (`venue_name`),
  ADD CONSTRAINT `class_info_ibfk_2` FOREIGN KEY (`teacher_lastname`) REFERENCES `teachers` (`teacher_lastname`);

--
-- Constraints for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD CONSTRAINT `studentinfo_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_info` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
