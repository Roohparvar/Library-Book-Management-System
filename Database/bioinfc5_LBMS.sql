-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2024 at 06:24 PM
-- Server version: 5.7.44-log
-- PHP Version: 8.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioinfc5_LBMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `User` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`User`, `Pass`) VALUES
('MainAdmin', '123456');

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
('El Alquimista', 'Paulo Coelho', '0062511408'),
('The Little Prince', 'Antoine de Saint-Exupery', '0156012197'),
('The Da Vinci Code', 'Dan Brown', '0307277674'),
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
  `ISBN` varchar(255) NOT NULL,
  `BorrowDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Borrow`
--

INSERT INTO `Borrow` (`id`, `User`, `ISBN`, `BorrowDate`) VALUES
(61, 'Ali', '0802144667', '2024-10-27 18:22:37'),
(62, 'Ali', '0156012197', '2024-10-27 18:22:38'),
(63, 'Esmaeil', '0723247708', '2024-10-27 18:22:54'),
(64, 'Esmaeil', '0307277674', '2024-10-27 18:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `User` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`User`, `Pass`) VALUES
('Ali', '123'),
('Esmaeil', '888'),
('Maryam', '456'),
('Reza', '999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
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
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Borrow`
--
ALTER TABLE `Borrow`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
