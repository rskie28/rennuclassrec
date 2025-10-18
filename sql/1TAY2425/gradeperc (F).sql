-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 12:42 PM
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
-- Database: `classrecord`
--

-- --------------------------------------------------------

--
-- Table structure for table `gradeperc`
--

--
-- Dumping data for table `gradeperc`
--

INSERT INTO `gradeperc` (`sectionID`, `term`, `SWPerc`, `SW1Total`, `SW2Total`, `SW3Total`, `SW4Total`, `SW5Total`, `SW6Total`, `EXPerc`, `EX1Total`, `EX2Total`, `EX3Total`, `EX4Total`, `EX5Total`, `EX6Total`, `HWPerc`, `HW1Total`, `HW2Total`, `HW3Total`, `HW4Total`, `HW5Total`, `HW6Total`, `QZPerc`, `QZ1Total`, `QZ2Total`, `QZ3Total`, `QZ4Total`, `QZ5Total`, `QZ6Total`, `OTHPerc`, `OTH1Total`, `OTH2Total`, `OTH3Total`, `OTH4Total`, `OTH5Total`, `OTH6Total`, `OTH7Total`, `OTH8Total`, `PTPerc`, `PT1Total`, `PT2Total`) VALUES
('APPROJ1237', 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, 100, 50, 25, 0, 0, 0, 0, 0, 70, 100, 0),
('INTCOMC241', 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 20, 50, 30, 40, 6, 0, 30, 100, 50, 0, 0, 0, 0, 0, 0, 50, 100, 0),
('INTCOMC244', 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 20, 50, 30, 40, 8, 0, 30, 100, 50, 0, 0, 0, 0, 0, 0, 50, 100, 0),
('INTCOMC245', 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 20, 50, 30, 40, 7, 0, 30, 100, 50, 0, 0, 0, 0, 0, 0, 50, 100, 0),
('INTCOMC246', 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 20, 50, 30, 40, 8, 0, 30, 100, 50, 0, 0, 0, 0, 0, 0, 50, 100, 0),
('USERDES233', 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, 20, 20, 15, 40, 7, 0, 40, 100, 50, 100, 100, 0, 0, 0, 0, 30, 100, 0),
('USERDES235', 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, 20, 20, 15, 45, 6, 0, 40, 50, 100, 100, 100, 0, 0, 0, 0, 30, 100, 0),
('USERDES236', 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, 20, 20, 15, 45, 8, 0, 40, 50, 100, 100, 100, 0, 0, 0, 0, 30, 100, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gradeperc`
--
ALTER TABLE `gradeperc`
  ADD KEY `sectionID` (`sectionID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gradeperc`
--
ALTER TABLE `gradeperc`
  ADD CONSTRAINT `gradeperc_ibfk_1` FOREIGN KEY (`sectionID`) REFERENCES `courses` (`sectionID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
