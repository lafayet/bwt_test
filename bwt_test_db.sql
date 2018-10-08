-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2018 at 01:44 PM
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
  `Id` int(11) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Message` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`Id`, `Name`, `Email`, `Message`, `UserId`) VALUES
(1, 'Di', 'di.metri@gmail.com', 'Test', 1),
(3, 'Тостер', 'biba@byak.com', 'Абырвалг', 2),
(4, 'Di', 'di.metri@gmail.com', 'А мне не нужно вводить мыло', 1),
(5, 'Лось', 'los@forest.com', 'Если туго вам пришлось...', 3);

--
-- Triggers `feedbacks`
--
DELIMITER $$
CREATE TRIGGER `newFeedback` BEFORE INSERT ON `feedbacks` FOR EACH ROW BEGIN
If new.UserId != '2' THEN 
	SET new.Name = (SELECT users.Name FROM users WHERE Id = new.UserId);
    SET new.Email = (SELECT users.Email FROM users WHERE Id = new.UserId);
END if;
END
$$
DELIMITER ;

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
  `Id` int(11) NOT NULL,
  `Login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `PasswordHash` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Soname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Login`, `PasswordHash`, `Name`, `Soname`, `Email`, `Gender`, `DateOfBirth`) VALUES

(1, 'Admin', '$2y$10$SkAqZWOse2RjfpYUBvrUOOOdQhn4VGMOLlk1koN.SHshjeMa21Cvu', 'Di', 'Metri', 'di.metri@gmail.com', 'm', '1991-10-09'),
(2, 'Guest', '-', 'Guest', '-', '-', NULL, NULL),
(3, 'Superlos', '$2y$10$zsFlF9HCjZCfF/u7Wbr01.wKf4//Jte5L6MeU39y1.urb9ZDqD.hK', 'Лось', 'Излесу', 'los@forest.com', NULL, '0000-00-00');

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
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedbacks2`
--
ALTER TABLE `feedbacks2`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`

  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
