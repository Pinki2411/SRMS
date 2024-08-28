-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 08:31 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `mark` varchar(50) NOT NULL,
  `credit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `std_id`, `subject_name`, `mark`, `credit`) VALUES
(86, 75, 'Bangla', '87', '5 '),
(87, 75, 'Programming', '75', '4 '),
(88, 75, 'GK', '65', '3.5 '),
(89, 75, 'Accounting', '33', '1 '),
(90, 81, 'Programming', '87', '5 '),
(91, 81, 'Accounting', '28', '0 ');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll` int(6) NOT NULL,
  `class` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `photo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES
(74, 'Jonayed', 123000, 'Four', 'Dhaka', '01139404188', '123000.jpg'),
(75, 'Mahi Nusrat', 124654, 'Three', 'Dhaka', '01832145678', '000124.png'),
(77, 'Jonayed Ahmed', 124560, 'Seven', 'dhaka', '01847895632', '012456.jpg'),
(79, 'Sahriar', 124000, 'Five', 'dhaka', '01839404121', '012400.jpg'),
(81, 'Jowel Hosen', 223366, 'Ten', 'Comilla', '01139404122', '223366.jpeg'),
(82, 'Mubarak Ahmed', 112233, 'Ten', 'Dhaka', '01839404121', '112233.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(80) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `datetime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`, `datetime`) VALUES
(52, 'Emon', 'imamhosen737@gmail.com', 'admin12345', 'admin12345', 'admin12345.jpg', 'active', '2021-09-11 14:39:20'),
(53, 'Rasel', 'foolemon36@gmail.com', 'admin123456', 'admin123456', 'admin123456.jpg', '', '2021-09-12 08:41:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
