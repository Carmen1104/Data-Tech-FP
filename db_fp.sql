-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 11:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db fp`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(11) NOT NULL,
  `cshort` varchar(10) NOT NULL,
  `cfull` varchar(50) NOT NULL,
  `hod` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cshort`, `cfull`, `hod`) VALUES
(7, 'BMM', 'Business Management Marketing', 'Luke Spencer'),
(8, 'FD', 'Fashion Design', 'Susi Susanti'),
(10, 'GDMN', 'Graphic Design & New Media', 'Serena Serenity'),
(11, 'ACC', 'Accounting', 'Chandra Setiawan'),
(13, 'CS', 'Computer Science', 'Kim Dokja'),
(14, 'JLit', 'Japanese Literature', 'Sakamoto Mizuki'),
(15, 'BCom', 'Business Communication', 'Morax Zhongli');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `loginid`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `course` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `gphonenum` bigint(12) NOT NULL,
  `income` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `mobno` bigint(12) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `regno` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`course`, `subject`, `fname`, `lname`, `gender`, `gname`, `gphonenum`, `income`, `nationality`, `mobno`, `emailid`, `address`, `regdate`, `status`, `regno`, `id`) VALUES
('11', 'Accouting', 'Ajax', 'Tartaglia', 'Male', 'Pulcinella', 234242, '20.000.000', 'russian', 81212811216, 'ajax@gmail.com', 'jln.Dr Semeru GG1 no 5', '2023-01-29 14:03:11', 'denied', '1892325167', 5),
('10', 'Graphic Design', 'rahul', 'roy', 'Male', 'Kumar', 54354, '20.000.000', 'India', 7827162410, 'rahul@gmail.com', 'lol', '2023-01-29 14:51:19', 'Pending', '1682472441', 6),
('7', 'Marketing', 'Yoo', 'Jonghyuk', 'Male', 'Namgung Minyoung', 324234, '70.000.000', 'khek', 81212811216, 'jonghyuk@binus.ac.id', 'jln.Dr Semeru GG1 no 5', '2023-01-29 16:49:47', 'approved', '1587297164', 7),
('7', 'Marketing', 'Carmen', 'Cleosa', 'female', 'Fam Ket Long', 213123123, '50.000.000', 'khek', 1212811216, 'carmen.cleosa@binus.ac.id', 'jln.Dr Semeru GG1 no 5', '2023-01-29 16:50:53', 'Pending', '1720897102', 8),
('13', 'Mathematics', 'Midge', 'Karpel', 'Male', 'MeganStallion', 66775543, '20.000.000', 'indo', 432342342, 'midge@gmail.com', 'Hahah', '2023-01-30 15:24:18', 'Pending', '1521766872', 9),
('10', 'Graphic Design', 'Raiden', 'Shohun', 'female', 'Ei', 543225, '50000000', 'japanese', 23231, 'raiden@gmail.com', 'wdqwdqd', '2023-01-30 15:35:20', 'denied', '102677698', 10);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(11) NOT NULL,
  `cshort` varchar(50) NOT NULL,
  `cfull` varchar(50) NOT NULL,
  `subname` varchar(50) NOT NULL,
  `lecturer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `cshort`, `cfull`, `subname`, `lecturer`) VALUES
(3, '8', 'Computer Science', 'Mathematics', 'John Lee'),
(6, '10', 'Fashion Design', 'Engineering Drawing', 'Kazuha'),
(7, '7', 'Accounting', 'Accounting', 'Sarah Jack'),
(9, '10', 'Graphic Design & New Media', 'Graphic Design', 'Suxrose'),
(10, '7', 'Business Management Marketing', 'Marketing', 'Ningguang'),
(11, '14', 'Japanese Literature', 'Haiku', 'Minami Suzui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
