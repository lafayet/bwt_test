-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2018 at 07:59 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bwt_test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `Id` int(11) NOT NULL COMMENT 'Feedback Id',
  `UserId` int(11) NOT NULL COMMENT 'Id of user which this feedback is',
  `Message` varchar(500) COLLATE cp1251_general_cs NOT NULL COMMENT 'Feedback message'
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL COMMENT 'Account id',
  `Name` varchar(30) COLLATE cp1251_general_cs NOT NULL COMMENT 'User name',
  `Soname` varchar(30) COLLATE cp1251_general_cs NOT NULL COMMENT 'User soname',
  `PasswordHash` varchar(250) COLLATE cp1251_general_cs NOT NULL,
  `Email` varchar(50) COLLATE cp1251_general_cs NOT NULL COMMENT 'User e-mail',
  `Gender` char(1) COLLATE cp1251_general_cs DEFAULT NULL COMMENT 'User gender',
  `DateOfBirth` date DEFAULT NULL COMMENT 'User date of birth'
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_cs;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Feedback Id';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Account id';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
