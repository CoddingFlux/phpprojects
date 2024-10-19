-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 07:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbooks`
--

CREATE TABLE `addbooks` (
  `Id` int(20) NOT NULL,
  `Bookid` varchar(20) NOT NULL,
  `Bookname` varchar(50) DEFAULT NULL,
  `Authorname` varchar(100) DEFAULT NULL,
  `Bookprice` varchar(10000) DEFAULT NULL,
  `Bookimg` varchar(100) DEFAULT NULL,
  `Isisued` varchar(10) DEFAULT NULL,
  `Regdate` timestamp NULL DEFAULT current_timestamp(),
  `Updationdate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addbooks`
--

INSERT INTO `addbooks` (`Id`, `Bookid`, `Bookname`, `Authorname`, `Bookprice`, `Bookimg`, `Isisued`, `Regdate`, `Updationdate`) VALUES
(21, '44', 'c++', 'ggg', '1100', 'bookimg/af2c87ab2511af8a631879ecca23f338.jpg', NULL, '2022-12-04 05:54:45', '2022-12-04 12:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(20) NOT NULL,
  `Fullname` varchar(100) DEFAULT NULL,
  `Emailid` varchar(100) DEFAULT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Fullname`, `Emailid`, `Username`, `Password`, `Updationdate`) VALUES
(1, 'Renish Limbasiya', 'R@gmail.com', 'admin', '4fdea5d5f6a88cf642d9f263bff21662', '2022-12-04 17:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `issuedbook`
--

CREATE TABLE `issuedbook` (
  `Id` int(100) NOT NULL,
  `Bookid` varchar(100) DEFAULT NULL,
  `Studentid` varchar(100) DEFAULT NULL,
  `Issueddate` timestamp NULL DEFAULT current_timestamp(),
  `Returndate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studetail`
--

CREATE TABLE `studetail` (
  `Id` int(20) NOT NULL,
  `Stuid` varchar(20) DEFAULT NULL,
  `Fullname` varchar(100) DEFAULT NULL,
  `Monumber` char(10) DEFAULT NULL,
  `Emailid` varchar(50) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Regdate` timestamp NULL DEFAULT current_timestamp(),
  `Updationdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studetail`
--

INSERT INTO `studetail` (`Id`, `Stuid`, `Fullname`, `Monumber`, `Emailid`, `Password`, `Regdate`, `Updationdate`) VALUES
(6, 'SID004', 'Renish', '44', 'r@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd', '2022-12-04 17:55:59', '2022-12-04 18:20:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbooks`
--
ALTER TABLE `addbooks`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`,`Bookid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `issuedbook`
--
ALTER TABLE `issuedbook`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Bookid` (`Bookid`);

--
-- Indexes for table `studetail`
--
ALTER TABLE `studetail`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Stuid` (`Stuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbooks`
--
ALTER TABLE `addbooks`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issuedbook`
--
ALTER TABLE `issuedbook`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `studetail`
--
ALTER TABLE `studetail`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
