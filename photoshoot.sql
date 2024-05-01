-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 05:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photoshoot`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `UserType` int(1) NOT NULL DEFAULT 1,
  `Status` int(1) NOT NULL DEFAULT 1,
  `Token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `FirstName`, `LastName`, `Email`, `Password`, `UserType`, `Status`, `Token`) VALUES
(1, 'admin', '', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, 1, 'asd'),
(2, 'asd', 'asd', 'asd@gmail.com', '7815696ecbf1c96e6894b779456d330e', 2, 1, 'aa37054cf656a32c31434d2a7b42b169'),
(6, 'sample', 'sample', 'sample@gmail.com', '5e8ff9bf55ba3508199d22e984129be6', 1, 1, ''),
(28, 'Johndenver', 'Cunanan', 'cunananjohndenver.bsit@gmail.com', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `AddonsID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Created_at` int(11) NOT NULL DEFAULT current_timestamp(),
  `Created_by` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`AddonsID`, `Name`, `Price`, `Description`, `Created_at`, `Created_by`, `Status`) VALUES
(1, 'sample', 122, 'descriptions', 2147483647, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `PackageID` bigint(20) UNSIGNED NOT NULL,
  `RoomID` int(11) NOT NULL,
  `PackageName` varchar(100) NOT NULL,
  `Pax` int(11) NOT NULL,
  `Price` float NOT NULL,
  `TimeLimit` int(11) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Created_by` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`PackageID`, `RoomID`, `PackageName`, `Pax`, `Price`, `TimeLimit`, `Description`, `Created_at`, `Created_by`, `Status`) VALUES
(1, 1, 'Example Packages', 7, 1000, 15, 'Example Description', '0000-00-00 00:00:00', 0, 0),
(2, 1, 'sample', 15, 100, 15, 'asds', '2024-04-09 00:13:55', 1, 1),
(3, 1, 'asda', 1, 21, 12, 'adwsa', '2024-04-09 00:15:13', 2, 0),
(4, 1, 'asdas', 12, 1233, 22, 'aswdsa', '2024-04-09 00:15:44', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` bigint(20) UNSIGNED NOT NULL,
  `ReservationID` int(11) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `TransactionID` int(11) NOT NULL,
  `PaymentDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ReservationID` bigint(20) UNSIGNED NOT NULL,
  `Reserved_by` int(11) NOT NULL,
  `PackageID` int(11) NOT NULL,
  `DateTime` datetime NOT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_addons`
--

CREATE TABLE `reservation_addons` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `ReservationID` int(11) NOT NULL,
  `AddonsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ReviewID` bigint(20) UNSIGNED NOT NULL,
  `PackageID` int(11) NOT NULL,
  `Rate` int(11) NOT NULL,
  `Review` varchar(500) NOT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Created_by` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ReviewID`, `PackageID`, `Rate`, `Review`, `Created_at`, `Created_by`, `Status`) VALUES
(1, 1, 3, 'asdasd', '2024-03-26 19:07:05', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `RoomID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`RoomID`, `Name`, `Capacity`, `Status`) VALUES
(1, 'ROOM 1', 3, 1),
(2, 'ROOM 2', 5, 1),
(3, 'sample', 3, 1),
(4, 'wew', 10, 1),
(5, 'qwe', 12, 1),
(6, 'zxc', 4, 1),
(7, 'ASDSA', 1212, 1),
(8, 'QWESAD', 12, 0),
(9, 'asds', 12, 0),
(10, 'qweqq', 12, 0),
(11, 'asdsa', 23, 0),
(12, 'asdsa', 1, 0),
(13, 'sample', 1, 0),
(14, 'sadsa', 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD UNIQUE KEY `AddonsID` (`AddonsID`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD UNIQUE KEY `PackageID` (`PackageID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD UNIQUE KEY `PaymentID` (`PaymentID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD UNIQUE KEY `ReservationID` (`ReservationID`);

--
-- Indexes for table `reservation_addons`
--
ALTER TABLE `reservation_addons`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD UNIQUE KEY `ReviewID` (`ReviewID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD UNIQUE KEY `RoomID` (`RoomID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `AddonsID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `PackageID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation_addons`
--
ALTER TABLE `reservation_addons`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ReviewID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `RoomID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
