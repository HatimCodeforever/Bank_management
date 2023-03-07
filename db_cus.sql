-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2022 at 04:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cus`
--

-- --------------------------------------------------------

--
-- Table structure for table `accinfo`
--

CREATE TABLE `accinfo` (
  `ACCOUNT_NO` int(5) NOT NULL,
  `PASSWORD` text NOT NULL,
  `BRANCH` text NOT NULL,
  `BALANCE` double NOT NULL,
  `ACC_TYPE` text NOT NULL,
  `MINOR/ADULT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accinfo`
--

INSERT INTO `accinfo` (`ACCOUNT_NO`, `PASSWORD`, `BRANCH`, `BALANCE`, `ACC_TYPE`, `MINOR/ADULT`) VALUES
(12030, 'Hatim5253', 'MUMBAI', 51000, 'SAVINGS', 'ADULT'),
(12033, 'Glen786', 'BYCULLA', 57000, 'SAVINGS', 'ADULT'),
(12039, 'Zaid786', 'Byculla', 44000, 'SAVINGS', 'ADULT');

-- --------------------------------------------------------

--
-- Table structure for table `addben`
--

CREATE TABLE `addben` (
  `B_NAME` text NOT NULL,
  `ACCOUNT_NO` int(5) NOT NULL,
  `B_ACCOUNT_NO` int(5) NOT NULL,
  `BANK_IFSC` text NOT NULL,
  `BANK_NAME` text NOT NULL,
  `EMAIL` text NOT NULL,
  `PHONE` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addben`
--

INSERT INTO `addben` (`B_NAME`, `ACCOUNT_NO`, `B_ACCOUNT_NO`, `BANK_IFSC`, `BANK_NAME`, `EMAIL`, `PHONE`) VALUES
('Glen', 12030, 12033, 'BHS78', 'BANK OF BARODA', 'dsouzaglen@gmail.com', 2147483647),
('Junaid', 12031, 12035, 'IASD12', 'BOI', 'junaid@gmail.com', 8898123454),
('Hatim', 12033, 12030, 'BHS78', 'ICICI', 'hatmsb11@gmail.com', 8898413413),
('John', 12039, 12045, 'HDFC5', 'HDFC', 'John@gmail.com', 9869340509),
('ALI', 12039, 12040, 'BBAS87', 'BOI', 'alisir@gmail.com', 9969282009);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `LOAN_ID` int(10) UNSIGNED NOT NULL,
  `ACCOUNT_NO` int(11) NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  `DURATION` int(11) NOT NULL,
  `RATE` int(11) NOT NULL,
  `TYPE` text NOT NULL,
  `OCC` text NOT NULL,
  `STATUS` text NOT NULL,
  `DATE_BEG` date NOT NULL,
  `DATE_END` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`LOAN_ID`, `ACCOUNT_NO`, `AMOUNT`, `DURATION`, `RATE`, `TYPE`, `OCC`, `STATUS`, `DATE_BEG`, `DATE_END`) VALUES
(32, 20202, 99999, 48, 10, 'Vehicle Loan', 'Self-Employed', 'ONGOING', '2022-05-20', '2026-05-20'),
(33, 90909, 99999, 120, 7, 'Home Loan', 'Salaried', 'ONGOING', '2022-05-20', '2032-05-20'),
(34, 12039, 999990, 180, 10, 'Vehicle Loan', 'Salaried', 'ONGOING', '2022-05-23', '2037-05-23'),
(35, 12039, 99999, 24, 7, 'Home Loan', 'Salaried', 'ONGOING', '2022-05-23', '2024-05-23'),
(36, 12039, 100000, 240, 7, 'Home Loan', 'Salaried', 'ONGOING', '2022-05-23', '2042-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `netbanking`
--

CREATE TABLE `netbanking` (
  `TRANS_ID` int(11) NOT NULL,
  `ACCOUNT_NO` int(5) NOT NULL,
  `TRANS_DATE` date NOT NULL,
  `AMOUNT` double NOT NULL,
  `BENEFICIARY_ACC` int(5) NOT NULL,
  `BENEFICIARY_NAME` text NOT NULL,
  `IFSC` text NOT NULL,
  `BENEFICIARY_BANK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `netbanking`
--

INSERT INTO `netbanking` (`TRANS_ID`, `ACCOUNT_NO`, `TRANS_DATE`, `AMOUNT`, `BENEFICIARY_ACC`, `BENEFICIARY_NAME`, `IFSC`, `BENEFICIARY_BANK`) VALUES
(1, 12030, '2022-05-20', 1000, 12033, 'Glen', 'HAGU78', 'hdfc'),
(3, 12030, '2022-05-20', 1000, 12033, 'Glen', 'HAGU78', 'BOI'),
(5, 12030, '2022-05-20', 1000, 12033, 'Glen', 'HAGU78', 'CENT'),
(7, 12030, '2022-05-20', 2000, 12033, 'Glen', 'HAGU78', 'hdfc'),
(9, 12030, '2022-05-20', 1000, 12033, 'Glen', 'HAGU78', 'hdfc'),
(11, 12030, '2022-05-20', 1000, 12033, 'Glen', 'HAGU78', 'hdfcc'),
(13, 12030, '2022-05-20', 3000, 12030, 'Glen', 'BHS78', 'ICICI'),
(15, 12030, '2022-05-20', 4000, 12030, 'Glen', 'BHS78', 'HDFC'),
(17, 12030, '2022-05-21', 1000, 12030, 'Glen', 'BHS78', 'BOI'),
(19, 12030, '2022-05-21', 2000, 12033, 'Glen', 'BHS78', 'BOI'),
(21, 12039, '2022-05-23', 7000, 12040, 'ALI', 'BBAS87', 'BOI'),
(23, 12039, '2022-05-23', 5000, 12040, 'ALI', 'BBAS87', 'BOI'),
(25, 12039, '2022-05-23', 2000, 12045, 'John', 'HDFC5', 'HDFC'),
(27, 12039, '2022-05-23', 2000, 12040, 'ALI', 'BBAS87', 'BOI');

-- --------------------------------------------------------

--
-- Table structure for table `personaldetails`
--

CREATE TABLE `personaldetails` (
  `ACCOUNT_NO` int(5) NOT NULL,
  `FIRST_NAME` text NOT NULL,
  `LAST_NAME` text NOT NULL,
  `GMAIL` text NOT NULL,
  `PHONENO` bigint(10) NOT NULL,
  `CITY` text NOT NULL,
  `AREA` text NOT NULL,
  `GENDER` text NOT NULL,
  `PANCARD` text NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personaldetails`
--

INSERT INTO `personaldetails` (`ACCOUNT_NO`, `FIRST_NAME`, `LAST_NAME`, `GMAIL`, `PHONENO`, `CITY`, `AREA`, `GENDER`, `PANCARD`, `DOB`) VALUES
(12030, 'Hatim', 'Mullajiwala', 'hatmb11@gmail.com', 8898413414, 'Mumbai', 'Mazgoan', 'Male', 'GH78HU', '2012-05-16'),
(12033, 'Glen', 'Dsouza', 'dsouzaglen@gmail.com', 9969282009, 'Mumbai', 'Byculla', 'Female', 'HGAS56', '2017-10-08'),
(12039, 'MOHAMMED', 'ZAID', 'mzaid@gmail.com', 7895463589, 'Mumbai', 'Mazgoan', 'Male', 'HGAJN675', '2009-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `statement`
--

CREATE TABLE `statement` (
  `TRANS_ID` int(11) NOT NULL,
  `ACCOUNT_NO` int(5) NOT NULL,
  `AMOUNT` double NOT NULL,
  `TRANS_DATE` date NOT NULL,
  `DESCC` text NOT NULL,
  `B_ACC` int(5) NOT NULL,
  `TYPE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statement`
--

INSERT INTO `statement` (`TRANS_ID`, `ACCOUNT_NO`, `AMOUNT`, `TRANS_DATE`, `DESCC`, `B_ACC`, `TYPE`) VALUES
(1, 12030, 1000, '2022-05-20', 'NETBANKING', 12033, 'SEND'),
(2, 12033, 1000, '2022-05-20', 'NETBANKING', 12030, 'RECEIVE'),
(3, 12030, 1000, '2022-05-20', 'NETBANKING', 12033, 'SEND'),
(4, 12033, 1000, '2022-05-20', 'NETBANKING', 12030, 'RECEIVE'),
(5, 12030, 1000, '2022-05-20', 'NETBANKING', 12033, 'SEND'),
(6, 12033, 1000, '2022-05-20', 'NETBANKING', 12030, 'RECEIVE'),
(7, 12030, 2000, '2022-05-20', 'NETBANKING', 12033, 'SEND'),
(8, 12033, 2000, '2022-05-20', 'NETBANKING', 12030, 'RECEIVE'),
(9, 12030, 1000, '2022-05-20', 'NETBANKING', 12033, 'SEND'),
(10, 12033, 1000, '2022-05-20', 'NETBANKING', 12030, 'RECEIVE'),
(11, 12030, 1000, '2022-05-20', 'NETBANKING', 12033, 'SEND'),
(12, 12033, 1000, '2022-05-20', 'NETBANKING', 12030, 'RECEIVE'),
(13, 12030, 3000, '2022-05-20', 'NETBANKING', 12030, 'SEND'),
(14, 12030, 3000, '2022-05-20', 'NETBANKING', 12030, 'RECEIVE'),
(15, 12030, 4000, '2022-05-20', 'NETBANKING', 12030, 'SEND'),
(16, 12030, 4000, '2022-05-20', 'NETBANKING', 12030, 'RECEIVE'),
(17, 12030, 1000, '2022-05-21', 'NETBANKING', 12030, 'SEND'),
(18, 12030, 1000, '2022-05-21', 'NETBANKING', 12030, 'RECEIVE'),
(19, 12030, 2000, '2022-05-21', 'NETBANKING', 12033, 'SEND'),
(20, 12033, 2000, '2022-05-21', 'NETBANKING', 12030, 'RECEIVE'),
(21, 12030, 7000, '2022-05-23', 'NETBANKING', 12040, 'SEND'),
(22, 12040, 7000, '2022-05-23', 'NETBANKING', 12030, 'RECEIVE'),
(23, 12039, 5000, '2022-05-23', 'NETBANKING', 12040, 'SEND'),
(24, 12040, 5000, '2022-05-23', 'NETBANKING', 12030, 'RECEIVE'),
(25, 12039, 2000, '2022-05-23', 'NETBANKING', 12045, 'SEND'),
(26, 12045, 2000, '2022-05-23', 'NETBANKING', 12030, 'RECEIVE'),
(27, 12039, 2000, '2022-05-23', 'NETBANKING', 12040, 'SEND'),
(28, 12040, 2000, '2022-05-23', 'NETBANKING', 12030, 'RECEIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addben`
--
ALTER TABLE `addben`
  ADD PRIMARY KEY (`PHONE`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`LOAN_ID`);

--
-- Indexes for table `netbanking`
--
ALTER TABLE `netbanking`
  ADD PRIMARY KEY (`TRANS_ID`);

--
-- Indexes for table `personaldetails`
--
ALTER TABLE `personaldetails`
  ADD PRIMARY KEY (`ACCOUNT_NO`);

--
-- Indexes for table `statement`
--
ALTER TABLE `statement`
  ADD PRIMARY KEY (`TRANS_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `LOAN_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
