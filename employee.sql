-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 06:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `check_in` varchar(255) NOT NULL,
  `check_out` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `check_in`, `check_out`, `date`, `employee_id`) VALUES
(12, '10:00', '19:18', '2022-03-01', 6),
(13, '10:15', '20:20', '2022-03-01', 9),
(14, '11:10', '20:32', '2022-03-01', 12),
(15, '13:09', '19:08', '2022-03-01', 15),
(16, '10:00', '19:05', '2022-03-02', 6),
(17, '14:48', '17:54', '2022-03-02', 12),
(18, '11:00', '19:50', '2022-03-02', 15),
(19, '11:30', '07:32', '2022-03-13', 6),
(20, '11:30', '08:34', '2022-03-13', 12);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designation_id` int(11) NOT NULL,
  `designation_name` varchar(128) NOT NULL,
  `department` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation_name`, `department`) VALUES
(1, 'Chief Executive Officer', ''),
(2, 'Chief Technology Officer (CTO)', 'Information Technology'),
(3, 'Chief Operating Officer;', ''),
(4, 'Chief Financial Officer;', 'Finance'),
(5, 'Software Developer', 'Information Technology'),
(6, 'Junior Software Developer', 'Information Technology'),
(7, 'Chief Marketing Officer', 'Marketing'),
(8, 'Digital Marketer', 'Marketing'),
(9, 'Technology Manager', 'Information Technology'),
(10, 'Finance Manager', 'Finance'),
(11, 'Marketing Managers', 'Marketing '),
(12, 'HR administrator', 'Human Resource'),
(13, 'Sales Manager', 'Sales'),
(14, 'Senior Software Developer', 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `employee_history`
--

CREATE TABLE `employee_history` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `department` varchar(128) NOT NULL,
  `joining_date` varchar(128) NOT NULL,
  `ending_date` varchar(128) NOT NULL,
  `gross_salary` varchar(128) NOT NULL,
  `basic_salary` varchar(128) NOT NULL,
  `house_rent` varchar(128) NOT NULL,
  `medical_allowence` varchar(128) NOT NULL,
  `conveyance` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_history`
--

INSERT INTO `employee_history` (`id`, `employee_id`, `designation_id`, `department`, `joining_date`, `ending_date`, `gross_salary`, `basic_salary`, `house_rent`, `medical_allowence`, `conveyance`) VALUES
(1, 15, 2, 'Information Technology', '2020-01-01', '0000-00-00', '100000', '60000', '20000', '12000', '8000'),
(2, 6, 12, 'Human Resource', '2021-01-01', '0000-00-00', '30000', '18000', '6000', '3600', '2400'),
(15, 9, 5, 'Information Technology', '2022-02-01', '0000-00-00', '32000', '19200', '6400', '3840', '2560'),
(16, 6, 12, 'Human Resource', '2020-01-01', '0000-00-00', '35000', '21000', '7000', '4200', '2800');

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`id`, `name`, `email`, `password`, `usertype`) VALUES
(6, 'Atik', 'hr@dorjie.com', '123', 'admin'),
(9, 'abc', 'abc@gmail.com', '123', 'user'),
(12, 'Zibran', 'zibran@gmail.com', '123', 'user'),
(15, 'Nooray yemon', 'admin@gmail.com', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `leave_application`
--

CREATE TABLE `leave_application` (
  `leave_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `leave_dt_from` varchar(255) NOT NULL,
  `leave_dt_to` varchar(255) NOT NULL,
  `leave_dt_from_fh` enum('Full','Half','','') NOT NULL,
  `leave_dt_to_fh` enum('Full','Half','','') NOT NULL,
  `reason` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_application`
--

INSERT INTO `leave_application` (`leave_id`, `employee_id`, `leave_dt_from`, `leave_dt_to`, `leave_dt_from_fh`, `leave_dt_to_fh`, `reason`, `notes`) VALUES
(9, 12, '2022-03-13', '', 'Full', '', 'Medical Leave', 'Corona leave');

-- --------------------------------------------------------

--
-- Table structure for table `leave_manage`
--

CREATE TABLE `leave_manage` (
  `leave_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `leave_dt_from` varchar(255) NOT NULL,
  `leave_dt_to` varchar(255) NOT NULL,
  `leave_dt_from_fh` enum('Full','Half','','') NOT NULL,
  `leave_dt_to_fh` enum('Full','Half','','') NOT NULL,
  `type` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_manage`
--

INSERT INTO `leave_manage` (`leave_id`, `employee_id`, `leave_dt_from`, `leave_dt_to`, `leave_dt_from_fh`, `leave_dt_to_fh`, `type`, `notes`) VALUES
(1, 12, '2022-03-07', '2022-03-07', 'Full', 'Full', 'Medical Leave', 'Taking a leave for vaccination'),
(2, 6, '2022-03-07', '2022-03-07', 'Half', 'Half', 'Medical Leave', 'vaccination leave'),
(5, 12, '2022-03-03', '2022-03-07', 'Full', 'Half', 'Casual Leave', 'Taking a leave for casual reason'),
(6, 9, '2022-03-09', '2022-03-09', 'Half', 'Half', 'Medical Leave', 'Urgent medical problems'),
(7, 12, '2022-03-09', '', 'Full', '', 'Medical Leave', 'corona vaccine '),
(9, 12, '2022-03-14', '2022-03-16', 'Full', 'Half', 'Medical Leave', 'vaccine'),
(10, 15, '2022-03-15', '', 'Full', '', 'Casual Leave', 'For working');

-- --------------------------------------------------------

--
-- Table structure for table `salary_info`
--

CREATE TABLE `salary_info` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `gross_salary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_info`
--

INSERT INTO `salary_info` (`id`, `employee_id`, `gross_salary`) VALUES
(1, 12, '30000'),
(3, 6, '30000'),
(4, 15, '50000'),
(5, 9, '10000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `employee_history`
--
ALTER TABLE `employee_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_application`
--
ALTER TABLE `leave_application`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `leave_manage`
--
ALTER TABLE `leave_manage`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `salary_info`
--
ALTER TABLE `salary_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee_history`
--
ALTER TABLE `employee_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `leave_application`
--
ALTER TABLE `leave_application`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `leave_manage`
--
ALTER TABLE `leave_manage`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salary_info`
--
ALTER TABLE `salary_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
