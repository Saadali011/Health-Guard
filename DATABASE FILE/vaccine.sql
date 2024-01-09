-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 11:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_fname` varchar(50) NOT NULL,
  `ad_lname` varchar(50) NOT NULL,
  `ad_email` varchar(100) NOT NULL,
  `ad_password` varchar(20) NOT NULL,
  `profile_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_fname`, `ad_lname`, `ad_email`, `ad_password`, `profile_img`) VALUES
(1, 'ibad', 'ullah', 'admin@gmail.com', 'admin', ''),
(8, 'saad', 'bhatti', 'zohair@gmail.com', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_shecduled`
--

CREATE TABLE `appointment_shecduled` (
  `c_id` int(11) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `Place of Birth` varchar(255) NOT NULL,
  `Already vaccinated` varchar(255) NOT NULL,
  `vaccine_type` varchar(255) NOT NULL,
  `select_v` varchar(255) NOT NULL,
  `h_id` int(11) NOT NULL,
  `Appointment Date` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `vaccined_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_shecduled`
--

INSERT INTO `appointment_shecduled` (`c_id`, `parent_email`, `c_name`, `gender`, `DOB`, `Place of Birth`, `Already vaccinated`, `vaccine_type`, `select_v`, `h_id`, `Appointment Date`, `Status`, `vaccined_date`) VALUES
(108, 'ali@gmail.com', 'saad', '-- Select --', '2023-02-05', 'china', 'poilo', 'covid', 'sinopharm', 3, '2023-03-04', 'pending', ''),
(115, 'Arif@gmail.com', 'sohail', 'Male', '2021-01-05', 'Karachi', 'Sinopharm', 'Covid 19', 'Pfizer', 4, '2023-03-06', 'Approved', '');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(255) NOT NULL,
  `h_email` varchar(255) NOT NULL,
  `h_address` varchar(255) NOT NULL,
  `h_password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`h_id`, `h_name`, `h_email`, `h_address`, `h_password`) VALUES
(3, 'OMI', 'omi@gmail.com', '89/1, M.A.Jinnah road, Depot Lines, Karachi, 74400', '1234'),
(4, 'AgaKhan', 'agakhan@gmail.com', ' Aga Khan Hospital Building, P. O. Box 30270 Third Parklands Avenue, Nairobi (Aga Khan University)', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `parent_info`
--

CREATE TABLE `parent_info` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_lname` varchar(255) NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `p_password` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_info`
--

INSERT INTO `parent_info` (`p_id`, `p_name`, `p_lname`, `p_email`, `p_password`, `p_img`) VALUES
(1, 'ali', 'abbas', 'abbas@gmail.com', 'password', '20211104_232224.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_list`
--

CREATE TABLE `vaccine_list` (
  `vaccine_id` int(11) NOT NULL,
  `date-created` timestamp NOT NULL DEFAULT current_timestamp(),
  `vaccine_name` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `approved-ages` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccine_list`
--

INSERT INTO `vaccine_list` (`vaccine_id`, `date-created`, `vaccine_name`, `manufacturer`, `approved-ages`) VALUES
(1, '2023-02-08 02:08:00', 'DTaP, Polio', '007', '4-6 years'),
(8, '2023-02-08 02:02:48', 'Flu', 'MKI', '7-15'),
(10, '2023-02-08 02:08:00', 'Corona', 'gfk', '4-9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `appointment_shecduled`
--
ALTER TABLE `appointment_shecduled`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `parent_info`
--
ALTER TABLE `parent_info`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `vaccine_list`
--
ALTER TABLE `vaccine_list`
  ADD PRIMARY KEY (`vaccine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appointment_shecduled`
--
ALTER TABLE `appointment_shecduled`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parent_info`
--
ALTER TABLE `parent_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vaccine_list`
--
ALTER TABLE `vaccine_list`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
