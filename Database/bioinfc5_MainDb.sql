-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2024 at 05:05 PM
-- Server version: 5.7.44-log
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioinfc5_MainDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `AdminPass`
--

CREATE TABLE `AdminPass` (
  `User` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AdminPass`
--

INSERT INTO `AdminPass` (`User`, `Pass`) VALUES
('Ali', '321'),
('Reza', '321');

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `Name` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `ISBN` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`Name`, `Author`, `ISBN`) VALUES
('The Little Prince', 'Antoine de Saint-Exupery', '0156012197'),
('Harry Potter', 'Joanne Rowling', '0545162076'),
('The Tale of Peter Rabbit', 'Beatrix Potter', '0723247708'),
('The Ginger Man', 'James Patrick Donleavy', '0802144667'),
('The Bridges of Madison County', 'Robert James Waller', '1455554287'),
('A Day of Fallen Night', 'Samantha Shannon', '1635577926'),
('The Catcher in the Rye', 'Jerome David Salinger', '7543321726');

-- --------------------------------------------------------

--
-- Table structure for table `Borrow`
--

CREATE TABLE `Borrow` (
  `id` int(255) NOT NULL,
  `User` varchar(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Borrow`
--

INSERT INTO `Borrow` (`id`, `User`, `ISBN`) VALUES
(27, 'Ali', '0545162076'),
(29, 'Ali', '7543321726'),
(30, 'Ali', '0723247708'),
(31, 'Salam', '1635577926'),
(32, 'Salam', '1455554287'),
(33, 'Man', '0156012197');

-- --------------------------------------------------------

--
-- Table structure for table `UserPass`
--

CREATE TABLE `UserPass` (
  `User` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserPass`
--

INSERT INTO `UserPass` (`User`, `Pass`) VALUES
('Ali', '123'),
('Hasan', '123'),
('Man', '123'),
('Maryam', '456'),
('Salam', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AdminPass`
--
ALTER TABLE `AdminPass`
  ADD PRIMARY KEY (`User`);

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `Borrow`
--
ALTER TABLE `Borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `UserPass`
--
ALTER TABLE `UserPass`
  ADD PRIMARY KEY (`User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Borrow`
--
ALTER TABLE `Borrow`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
