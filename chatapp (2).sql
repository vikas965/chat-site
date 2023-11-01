-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 12:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatusers`
--

CREATE TABLE `chatusers` (
  `cuserid` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `cusername` varchar(255) NOT NULL,
  `cemail` varchar(255) NOT NULL,
  `cpass` varchar(255) NOT NULL,
  `cphoto` varchar(255) NOT NULL,
  `cstatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatusers`
--

INSERT INTO `chatusers` (`cuserid`, `unique_id`, `cusername`, `cemail`, `cpass`, `cphoto`, `cstatus`) VALUES
(1, '1543710827', 'vikas', 'vikas@gmail.com', 'bebe68374a49cb41b7c9219e97250044', 'IMG_20220113_123336.jpg', 'Offline'),
(2, '643388124', 'vinod', 'vinod@gmail.com', 'd2c51c9cde1f15b718296c99ae362fb1', '1697458436243.jpg', 'Offline'),
(3, '158225893', 'User', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'Poster Trace the Code.jpg', ''),
(4, '508646808', 'Hello', 'hello@gmail.com', '5d41402abc4b2a76b9719d911017c592', 'Poster Trace the Code.jpg', ''),
(5, '533681257', 'user-sa', 'user1@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', 'istockphoto-1740973833-170667a.webp', ''),
(6, '1198667266', 'user-ba', 'user2@gmail.com', '7e58d63b60197ceb55a1c487989a3720', 'test.jpg', ''),
(7, '960991278', 'Hai', 'hai@gmail.com', '42810cb02db3bb2cbb428af0d8b0376e', 'vikas.jpg', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `in_msg_id` varchar(255) NOT NULL,
  `out_msg_id` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `in_msg_id`, `out_msg_id`, `msg`) VALUES
(1, '643388124', '1543710827', 'hello'),
(2, '508646808', '1543710827', 'hello'),
(3, '643388124', '1543710827', 'hai'),
(4, '960991278', '1543710827', 'hello'),
(5, '1543710827', '643388124', 'hello'),
(6, '643388124', '1543710827', 'hello'),
(7, '1543710827', '643388124', 'what are you doing...'),
(8, '643388124', '1543710827', 'hello'),
(9, '1543710827', '643388124', 'hello'),
(10, '1543710827', '643388124', 'this is real time chat application'),
(11, '643388124', '1543710827', 'ohh okk...'),
(12, '643388124', '1543710827', 'this is a real time chat application'),
(13, '1543710827', '643388124', 'ohh cool'),
(14, '643388124', '1543710827', 'yeah...');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatusers`
--
ALTER TABLE `chatusers`
  ADD PRIMARY KEY (`cuserid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatusers`
--
ALTER TABLE `chatusers`
  MODIFY `cuserid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
