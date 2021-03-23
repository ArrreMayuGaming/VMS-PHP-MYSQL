-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 07:26 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `ausername` varchar(100) NOT NULL,
  `aname` varchar(250) NOT NULL,
  `apassword` varchar(100) NOT NULL,
  `arole` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `ausername`, `aname`, `apassword`, `arole`) VALUES
(1, 'admin', 'admin', 'admin', 'superadmin'),
(2, 'gunjanshah', 'Gunjan Shah', 'gunjan123', 'admin'),
(3, 'piyushvibhakar', 'Piyush Vibhakar', 'piyush123', 'admin'),
(4, 'neelshah', 'Neel Shah', 'neel123', 'admin'),
(5, 'hrinsight', 'HR', 'hr123', 'hr'),
(6, 'mayuresh', 'mayuresh', 'mayuresh123', 'superadmin'),
(7, 'reception', 'Insight Reception', 'reception123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE `emp_attendance` (
  `id` int(11) NOT NULL,
  `empname` varchar(45) NOT NULL,
  `temp` int(35) NOT NULL,
  `oxygen` int(35) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_attendance`
--

INSERT INTO `emp_attendance` (`id`, `empname`, `temp`, `oxygen`, `date`, `time`) VALUES
(1, 'mayuresh', 35, 95, '2021-03-22', '18:44:14.000000'),
(2, 'yash', 35, 95, '2021-03-22', '02:17:37.000000'),
(3, 'mayuresh', 36, 95, '2021-03-22', '02:21:58.000000'),
(4, 'mayuresh', 36, 95, '2021-03-22', '18:52:47.000000'),
(5, 'mayuresh', 36, 95, '2021-03-22', '18:54:40.000000'),
(6, 'jayesh', 36, 97, '2021-03-22', '18:57:01.000000'),
(7, 'jayesh', 36, 97, '2021-03-22', '18:58:11.000000'),
(8, 'jayesh', 36, 97, '2021-03-22', '18:58:48.000000'),
(9, 'yogesh', 37, 97, '2021-03-22', '18:59:11.000000'),
(10, 'yogesh', 37, 97, '2021-03-22', '18:59:17.000000');

-- --------------------------------------------------------

--
-- Table structure for table `visitorsinfo`
--

CREATE TABLE `visitorsinfo` (
  `id` int(250) NOT NULL,
  `vname` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `passdate` date NOT NULL,
  `whoomtomeet` varchar(250) NOT NULL,
  `purpose` varchar(250) NOT NULL,
  `vstatus` varchar(250) NOT NULL,
  `temp` varchar(10) NOT NULL,
  `oxygen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitorsinfo`
--

INSERT INTO `visitorsinfo` (`id`, `vname`, `phone`, `email`, `passdate`, `whoomtomeet`, `purpose`, `vstatus`, `temp`, `oxygen`) VALUES
(1, 'Mayuresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2021-02-28', 'gunjan', 'interview', 'pending', '36', '97'),
(2, 'Jayesh', '9890548465', 'jayeshrokade@gmail.com', '2021-03-01', 'neel', 'Meeting', 'pending', '37', '99'),
(3, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2020-08-20', 'neel', 'meeting', 'pending', '35', '98'),
(4, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2020-07-15', 'hr', 'meeting', 'pending', '35', '98'),
(5, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2020-10-13', 'Piyush Vibhakar', 'meeting', 'pending', '35', '98'),
(6, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2020-08-25', 'Piyush Vibhakar', 'meeting', 'pending', '35', '98'),
(7, 'Jayesh', '9082939164', 'mayureshshitole@gmail.com', '2020-09-01', 'hr', 'meeting', 'pending', '35', '98'),
(8, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2020-03-04', 'Piyush Vibhakar', 'meeting', 'pending', '35', '98'),
(9, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2020-11-11', 'Piyush Vibhakar', 'meeting', 'pending', '35', '98'),
(10, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2021-03-03', 'Piyush Vibhakar', 'meeting', 'pending', '35', '98'),
(11, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2020-12-23', 'Piyush Vibhakar', 'meeting', 'pending', '35', '98'),
(12, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2020-10-21', 'Piyush Vibhakar', 'meeting', 'pending', '35', '98'),
(13, 'Sagar Parmar', '9789584665', 'sagarparmar@sagar.com', '2020-11-10', 'Piyush Vibhakar', 'meeting', 'pending', '34', '97'),
(14, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2020-12-23', 'Neel Shah', 'meeting', 'pending', '35', '97'),
(15, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2021-02-12', 'Piyush Vibhakar', 'meeting', 'pending', '35', '98'),
(16, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2021-02-16', 'Piyush Vibhakar', 'meeting', 'pending', '35', '97'),
(17, 'Jayesh Rokade', '9890548465', 'jayesh@gmail.com', '2021-03-02', 'Gunjan Shah', 'Interview', 'pending', '35', '98'),
(18, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2020-06-27', 'Piyush Vibhakar', 'Interview', 'Approved', '35', '98'),
(19, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2020-06-09', 'Neel Shah', 'meeting', 'pending', '35', '97'),
(20, 'Yash P', '9167159511', 'yash@yash.com', '2020-07-07', 'Gunjan Shah', 'Personal Reason', 'pending', '36', '98'),
(21, 'Mayuresh Suresh Shitole', '9082939164', 'mayureshshitole@gmail.com', '2021-03-18', 'Piyush Vibhakar', 'Personal Reason', 'pending', '36', '98'),
(22, 'John', '1234569875', 'john@j.com', '2021-02-15', 'Piyush Vibhakar', 'Meeting', 'pending', '34', '98'),
(23, 'Mark', '35795124862', 'Mark@m.com', '2021-01-06', 'Gunjan Shah', 'Personal Reason', 'pending', '36', '97'),
(24, 'Robert', '1593578426', 'rob@r.com', '2021-03-19', 'Neel Shah', 'Personal Reason', 'pending', '36', '97'),
(25, 'Sameer Ambilpure', '9082939164', 'sam@ambipure.com', '2021-03-19', 'Neel Shah', 'Interview', 'pending', '33', '99'),
(26, 'yash', '9167159511', 'yash@yash.com', '2021-03-19', 'Gunjan Shah', 'Interview', 'pending', '34', '96');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitorsinfo`
--
ALTER TABLE `visitorsinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visitorsinfo`
--
ALTER TABLE `visitorsinfo`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
