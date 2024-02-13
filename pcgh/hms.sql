-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 12:12 PM
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
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `user_username` text NOT NULL,
  `patientno` text NOT NULL,
  `patientid` text NOT NULL,
  `roomtype` text NOT NULL,
  `servicetype` text NOT NULL,
  `obstetrics` text NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `suffix` text NOT NULL,
  `civilstatus` text NOT NULL,
  `gender` text NOT NULL,
  `nationality` text NOT NULL,
  `religion` text NOT NULL,
  `birthday` text NOT NULL,
  `age` text NOT NULL,
  `houseaddress` text NOT NULL,
  `barangay` text NOT NULL,
  `otherbarangay` text NOT NULL,
  `city` text NOT NULL,
  `occupation` text NOT NULL,
  `contactno` text NOT NULL,
  `email` text NOT NULL,
  `validid` text NOT NULL,
  `valididno` text NOT NULL,
  `philhealthno` text NOT NULL,
  `originofreferral` text NOT NULL,
  `reasonofvisitremarks` text NOT NULL,
  `wcpu` text NOT NULL,
  `typeofcaseabuse` text NOT NULL,
  `relationonperpetrator` text NOT NULL,
  `dateofadmission` text NOT NULL,
  `dateofdischarge` text NOT NULL,
  `guardianname` text NOT NULL,
  `address` text NOT NULL,
  `gcontactno` text NOT NULL,
  `relationshiponthepatient` text NOT NULL,
  `req_one` text NOT NULL COMMENT 'Birth Certificate of patient',
  `req_two` text NOT NULL COMMENT 'Valid Id if valid id not applicable == Barangay Clearance',
  `req_three` text NOT NULL COMMENT 'Marriage Certificate if married ',
  `req_four` text NOT NULL COMMENT 'Birth Certificate of Guardian',
  `completed` text NOT NULL,
  `fafp` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `type` text NOT NULL DEFAULT 'user' COMMENT '1=er 2=opd'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type`) VALUES
(9, 'Er', '222b57de868c251432f8cd2a3eb03fc6', 'Er'),
(10, 'Opd', '239eab0371f006e5e3fc35d9bfa96856', 'Opd'),
(11, 'Admission', '4326f0e36a8a8c6665a1e9cd1c41ce60', 'Admission'),
(12, 'Philhealth', '7a2ca9f44b39171bd5e4bdb7b0dde5a0', 'Philhealth'),
(13, 'GAD', '69aeb50d14c6625f7e874f90fb84393d', 'GAD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
