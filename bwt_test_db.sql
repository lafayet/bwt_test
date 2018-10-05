-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 01:23 PM
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

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`Id`, `UserId`, `Message`) VALUES
(1, 2, 'Вместо погоды показывают  какую-то фигню...'),
(2, 2, 'А что, админы не отвечают?');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks2`
--

CREATE TABLE `feedbacks2` (
  `Id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedbacks2`
--

INSERT INTO `feedbacks2` (`Id`, `name`, `email`, `message`) VALUES
(1, 'Кот', 'ihavelapki@ds.com', ' У меня лапки'),
(2, 'Пес', 'pes@mail.gav', 'А я тебя съем! '),
(3, 'Лев', 'preria@africa.com', 'Поговорите мне тут! Всех в угол поставлю! ');

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
(2, 'Tester', '$2y$10$SFF8YCKHTet7klLKCtgPfe.YBucfp.CtDSFNnZCjHTVe6meL1S7MS', 'Тостер', 'Хлостер', 'biba@byak.com', 'm', '2018-07-11'),
(4, 'Krolik', '$2y$10$wmsf6DrQP4mW5ewcyDyesuX8c5sjmsLPycxosw.gZrR6l2B/MAq3S', 'Багс', 'Банни', 'bugs@rabbit.com', '', '0000-00-00'),
(5, 'Timoo', '$2y$10$9YLD3OywC9GgmBPQg8GgJO778ebUTta2pvDG5rholEcxPRHMIJlU2', 'Тимка', 'Лол', '', '', '0000-00-00'),
(6, 'Homyak', '$2y$10$dc5esxiTBEyYPidWPI30HugnkOBU/aHrFI4cr77J2pCOTaqgylAc6', 'Хома', 'Большиещеки', 'nomail@fig.vam', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FOREIGN` (`UserId`);

--
-- Indexes for table `feedbacks2`
--
ALTER TABLE `feedbacks2`
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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Feedback Id', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedbacks2`
--
ALTER TABLE `feedbacks2`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Account id', AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
