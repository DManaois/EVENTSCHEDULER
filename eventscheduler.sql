-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 02:56 PM
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
-- Database: `eventscheduler`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `orgname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `orgname`, `email`, `contact`, `facebook`, `twitter`, `instagram`) VALUES
(1, 'Diomer', 'Manaois', 'INVICTUS', 'invictus@gmail.com', '69696969', 'invictusfb', 'invictustweet', 'invictusIG');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventid` int(11) NOT NULL,
  `orgname` varchar(255) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `borrowed_chairs` int(11) DEFAULT NULL,
  `borrowed_tables` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `orgname`, `activity`, `venue`, `borrowed_chairs`, `borrowed_tables`, `description`, `date`, `image`) VALUES
(4, 'INVICTUS', 'ML TOURNA', 'ADU', 25, 25, 'ddasdas', '2023-11-28', 'C:xampphtdocsPrototypedatabase/uploads/400519245_122145473702007946_8223945922064977646_n.jpg'),
(5, 'adug', 'ML TOURNA', 'ADU', 25, 25, '2', '2023-11-29', 'C:xampphtdocsPrototypedatabase/uploads/download.jpeg'),
(6, 'INVICTUS', 'ML TOURNA', 'ADU', 69, 96, '3rd', '2023-11-30', 'C:xampphtdocsPrototypedatabase/uploads/content_mobile-legends-battle-of-the-bands-2020-covid-19-lockdown-metro-manila.jpg'),
(7, 'adug', 'ML TOURNA', 'ADU', 63, 75, 'hatdog', '2023-11-30', 'C:xampphtdocsPrototypedatabase/uploads/mobile-legends-tournament-invitation-template-design-969fae4d7a15c90a7450a71e3791ca3e_screen.jpg'),
(8, 'adug', 'ML TOURNA', 'ADU', 45, 54, 'sdfesdf', '2023-11-26', 'C:xampphtdocsPrototypedatabase/uploads/5th.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `contact`, `facebook`) VALUES
(1, 'Ryan', 'pogi', 'ryanjarapa@gmail.com', '1436969', 'ryanfb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
