-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2020 at 12:10 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id12656078_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `CAR_MAINTENANCE`
--

CREATE TABLE `CAR_MAINTENANCE` (
  `CAR_MAINTENANCE_ID` int(4) NOT NULL,
  `CAR_MAINTENANCE_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CAR_MAINTENANCE_LAT` decimal(28,14) NOT NULL,
  `CAR_MAINTENANCE_LONG` decimal(28,14) NOT NULL,
  `CAR_MAINTENANCE_MOBILE` int(11) NOT NULL,
  `CAR_MAINTENANCE_EMAIL` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CAR_MAINTENANCE`
--

INSERT INTO `CAR_MAINTENANCE` (`CAR_MAINTENANCE_ID`, `CAR_MAINTENANCE_NAME`, `CAR_MAINTENANCE_LAT`, `CAR_MAINTENANCE_LONG`, `CAR_MAINTENANCE_MOBILE`, `CAR_MAINTENANCE_EMAIL`) VALUES
(1, 'Farag CM', 30.01126430000000, 31.30144270000000, 123456789, 'farag@gamil.com'),
(2, 'Enpi', 30.04293780000000, 31.34005710000000, 123456789, 'enpi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `RSU`
--

CREATE TABLE `RSU` (
  `RSU_ID` int(4) NOT NULL,
  `RSU_LONG` decimal(14,8) NOT NULL,
  `RSU_LAT` decimal(14,8) NOT NULL,
  `RSU_EMERG_NOTES` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RSU_STATE` int(1) NOT NULL COMMENT '0 : InActive\r\n1 : Active\r\n3 : Emergency\r\n '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `RSU`
--

INSERT INTO `RSU` (`RSU_ID`, `RSU_LONG`, `RSU_LAT`, `RSU_EMERG_NOTES`, `RSU_STATE`) VALUES
(1, 30.01506160, 1.28183020, 'el nafora Mokattam', 1),
(2, 30.04619260, 31.34195000, 'Pizza el sultan ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `RSU_HISTORY`
--

CREATE TABLE `RSU_HISTORY` (
  `RSU_HISTORY_ID` int(4) NOT NULL,
  `RSU_ID` int(4) NOT NULL,
  `CASE` int(1) DEFAULT NULL COMMENT '0 : Normal case\r\n1 : Emergency case',
  `CASE_NOTE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CASE_STATE` int(1) DEFAULT NULL COMMENT '0 : Inactive\r\n1 : Active',
  `Date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `RSU_HISTORY`
--

INSERT INTO `RSU_HISTORY` (`RSU_HISTORY_ID`, `RSU_ID`, `CASE`, `CASE_NOTE`, `CASE_STATE`, `Date`) VALUES
(1, 1, 1, 'Emergency', 1, NULL),
(2, 1, 1, '111', 1, '2020-2-20'),
(3, 1, 1, 'Emergency', 1, '2020-03-23'),
(4, 1, 3, '2', 4, '2020-04-04'),
(5, 1, 1, 'Emergency', 1, '2020-04-07'),
(6, 1, 1, 'Emergency', 1, '2020-04-07'),
(7, 1, 1, 'Emergency', 1, '2020-04-07'),
(8, 1, 1, 'Emergency', 1, '2020-04-07'),
(9, 1, 1, 'Emergency', 2, '2020-04-07'),
(10, 1, 1, 'Emergency', 2, '2020-04-07'),
(11, 1, 1, 'Emergency', 2, '2020-04-07'),
(12, 1, 1, 'Emergency', 2, '2020-04-07'),
(13, 1, 1, 'Emergency', 2, '2020-04-07'),
(14, 1, 1, 'sdsd', 0, '2020-04-07'),
(15, 1, 1, 'sdsd', 0, '2020-04-07'),
(16, 1, 1, 'sdsd', 0, '2020-04-07'),
(17, 1, 1, 'sdsd', 0, '2020-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLES`
--

CREATE TABLE `VEHICLES` (
  `VEHICLE_ID` int(4) NOT NULL,
  `VEHICLE_MODEL_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `VEHICLE_OWNER_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VEHICLE_OWNER_EMAIL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VEHICLE_MODEL_YEAR` int(4) NOT NULL,
  `VEHICLE_STATE_FLAG` int(1) NOT NULL COMMENT '0 : InActive\r\n1 : Active\r\n2 : Emergency',
  `VEHICLE_LAT` decimal(24,14) NOT NULL,
  `VEHICLE_LONG` decimal(28,14) NOT NULL,
  `VEHICLE_EMERG_NOTE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `VEHICLES`
--

INSERT INTO `VEHICLES` (`VEHICLE_ID`, `VEHICLE_MODEL_NAME`, `VEHICLE_OWNER_NAME`, `VEHICLE_OWNER_EMAIL`, `VEHICLE_MODEL_YEAR`, `VEHICLE_STATE_FLAG`, `VEHICLE_LAT`, `VEHICLE_LONG`, `VEHICLE_EMERG_NOTE`) VALUES
(1, 'Kia', 'Moataz', 'Motaz@gamil.com', 2020, 1, 29.81325900000000, 31.37686700000000, 'Moataz Car'),
(2, 'Mercedes-benz', 'Essam', 'essam@gmail.com', 2020, 1, 30.00682650000000, 31.28821210000000, 'Essam'),
(3, 'Ford', 'Raafat', 'raafat@gamil.com', 2019, 1, 30.04619260000000, 31.34195000000000, 'raafat');

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLES_HISTORY`
--

CREATE TABLE `VEHICLES_HISTORY` (
  `VEHICLE_HISTORY_ID` int(4) NOT NULL,
  `VEHICLE_ID` int(4) NOT NULL,
  `CASE` int(1) NOT NULL COMMENT '0 : Normal case\r\n1 : Emergency case',
  `CASE_NOTE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CASE_LAT` decimal(28,14) NOT NULL,
  `CASE_LONG` decimal(28,14) DEFAULT NULL,
  `CASE_STATE` int(1) NOT NULL DEFAULT 1 COMMENT '0 : Inactive\r\n1 : Active',
  `Date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `VEHICLES_HISTORY`
--

INSERT INTO `VEHICLES_HISTORY` (`VEHICLE_HISTORY_ID`, `VEHICLE_ID`, `CASE`, `CASE_NOTE`, `CASE_LAT`, `CASE_LONG`, `CASE_STATE`, `Date`) VALUES
(1, 1, 1, 'x', 30.12345600000000, 30.12345600000000, 1, '2020-03-23'),
(2, 1, 1, 'x', 30.12345600000000, 30.12345600000000, 1, '2020-04-02'),
(3, 1, 1, 'x', 30.12345600000000, 30.12345600000000, 1, '2020-04-02'),
(4, 1, 1, 'x', 30.12345600000000, 30.12345600000000, 1, '2020-04-02'),
(5, 1, 1, 'x', 30.12345600000000, 30.12345600000000, 1, '2020-04-02'),
(6, 1, 1, 'x', 30.12345600000000, 30.12345600000000, 1, '2020-04-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CAR_MAINTENANCE`
--
ALTER TABLE `CAR_MAINTENANCE`
  ADD PRIMARY KEY (`CAR_MAINTENANCE_ID`);

--
-- Indexes for table `RSU`
--
ALTER TABLE `RSU`
  ADD PRIMARY KEY (`RSU_ID`);

--
-- Indexes for table `RSU_HISTORY`
--
ALTER TABLE `RSU_HISTORY`
  ADD PRIMARY KEY (`RSU_HISTORY_ID`),
  ADD KEY `FKRSU_HISTOR344265` (`RSU_ID`);

--
-- Indexes for table `VEHICLES`
--
ALTER TABLE `VEHICLES`
  ADD PRIMARY KEY (`VEHICLE_ID`);

--
-- Indexes for table `VEHICLES_HISTORY`
--
ALTER TABLE `VEHICLES_HISTORY`
  ADD PRIMARY KEY (`VEHICLE_HISTORY_ID`),
  ADD KEY `FKVEHICLES_H651953` (`VEHICLE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CAR_MAINTENANCE`
--
ALTER TABLE `CAR_MAINTENANCE`
  MODIFY `CAR_MAINTENANCE_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `RSU_HISTORY`
--
ALTER TABLE `RSU_HISTORY`
  MODIFY `RSU_HISTORY_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `VEHICLES_HISTORY`
--
ALTER TABLE `VEHICLES_HISTORY`
  MODIFY `VEHICLE_HISTORY_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `RSU_HISTORY`
--
ALTER TABLE `RSU_HISTORY`
  ADD CONSTRAINT `FKRSU_HISTOR344265` FOREIGN KEY (`RSU_ID`) REFERENCES `RSU` (`RSU_ID`);

--
-- Constraints for table `VEHICLES_HISTORY`
--
ALTER TABLE `VEHICLES_HISTORY`
  ADD CONSTRAINT `FKVEHICLES_H651953` FOREIGN KEY (`VEHICLE_ID`) REFERENCES `VEHICLES` (`VEHICLE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
