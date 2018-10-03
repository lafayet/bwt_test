-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2018 at 02:27 PM
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
  `Message` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Feedback message'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL COMMENT 'Account id',
  `Login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PasswordHash` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User name',
  `Soname` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User soname',
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User e-mail',
  `Gender` char(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User gender',
  `DateOfBirth` date DEFAULT NULL COMMENT 'User date of birth'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Login`, `PasswordHash`, `Name`, `Soname`, `Email`, `Gender`, `DateOfBirth`) VALUES
(1, 'Admin', '$2y$10$SkAqZWOse2RjfpYUBvrUOOOdQhn4VGMOLlk1koN.SHshjeMa21Cvu', 'Di', 'Metri', 'di.metri@gmail.com', 'm', '1993-02-08'),
(2, 'Tester', '$2y$10$SFF8YCKHTet7klLKCtgPfe.YBucfp.CtDSFNnZCjHTVe6meL1S7MS', 'Тостер', 'Хлостер', 'biba@byak.com', 'm', '2018-07-11');

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
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Login` (`Login`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Account id', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
