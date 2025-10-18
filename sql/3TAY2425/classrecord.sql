CREATE TABLE `actdetails` (
  `sectionID` varchar(15) NOT NULL,
  `term` varchar(2) NOT NULL,
  `SW1_deets` varchar(20) NOT NULL,
  `SW2_deets` varchar(20) NOT NULL,
  `SW3_deets` varchar(20) NOT NULL,
  `SW4_deets` varchar(20) NOT NULL,
  `SW5_deets` varchar(20) NOT NULL,
  `SW6_deets` varchar(20) NOT NULL,
  `EX1_deets` varchar(20) NOT NULL,
  `EX2_deets` varchar(20) NOT NULL,
  `EX3_deets` varchar(20) NOT NULL,
  `EX4_deets` varchar(20) NOT NULL,
  `EX5_deets` varchar(20) NOT NULL,
  `EX6_deets` varchar(20) NOT NULL,
  `HW1_deets` varchar(20) NOT NULL,
  `HW2_deets` varchar(20) NOT NULL,
  `HW3_deets` varchar(20) NOT NULL,
  `HW4_deets` varchar(20) NOT NULL,
  `HW5_deets` varchar(20) NOT NULL,
  `HW6_deets` varchar(20) NOT NULL,
  `QZ1_deets` varchar(20) NOT NULL,
  `QZ2_deets` varchar(20) NOT NULL,
  `QZ3_deets` varchar(20) NOT NULL,
  `QZ4_deets` varchar(20) NOT NULL,
  `QZ5_deets` varchar(20) NOT NULL,
  `QZ6_deets` varchar(20) NOT NULL,
  `OTH1_deets` varchar(20) NOT NULL,
  `OTH2_deets` varchar(20) NOT NULL,
  `OTH3_deets` varchar(20) NOT NULL,
  `OTH4_deets` varchar(20) NOT NULL,
  `OTH5_deets` varchar(20) NOT NULL,
  `OTH6_deets` varchar(20) NOT NULL,
  `OTH7_deets` varchar(20) NOT NULL,
  `OTH8_deets` varchar(20) NOT NULL,
  `PT1_deets` varchar(20) NOT NULL,
  `PT2_deets` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actdetails`
--

INSERT INTO `actdetails` (`sectionID`, `term`, `SW1_deets`, `SW2_deets`, `SW3_deets`, `SW4_deets`, `SW5_deets`, `SW6_deets`, `EX1_deets`, `EX2_deets`, `EX3_deets`, `EX4_deets`, `EX5_deets`, `EX6_deets`, `HW1_deets`, `HW2_deets`, `HW3_deets`, `HW4_deets`, `HW5_deets`, `HW6_deets`, `QZ1_deets`, `QZ2_deets`, `QZ3_deets`, `QZ4_deets`, `QZ5_deets`, `QZ6_deets`, `OTH1_deets`, `OTH2_deets`, `OTH3_deets`, `OTH4_deets`, `OTH5_deets`, `OTH6_deets`, `OTH7_deets`, `OTH8_deets`, `PT1_deets`, `PT2_deets`) VALUES
('DASTRUC241', 'M', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Index Card', 'Long Quiz (Week1&2)', 'Attendance', 'Recitation', '', '', 'Sorting Numbers', '', '', '', '', '', '', '', '', ''),
('DASTRUC242', 'M', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Index Card', 'Long Quiz (Week1&2)', 'Attendance', 'Recitation', '', '', 'Sorting Numbers', '', '', '', '', '', '', '', '', ''),
('DNETCOM231', 'M', '', '', '', '', '', '', '', '', '', '', '', '', 'Index Card', 'Quiz about Week 1', '', '', '', '', 'Profile (2/4)', 'Attendance', 'Recitation', '', '', '', 'Profile (¼)', 'Week 1 Activity 1', 'Common Security Risk', 'Network in Cisco', '', '', '', '', '', ''),
('DNETCOM232', 'M', '', '', '', '', '', '', '', '', '', '', '', '', 'Index Card', 'Quiz about Week 1', '', '', '', '', 'Profile (2/4)', 'Attendance', 'Recitation', '', '', '', 'Profile (¼)', 'Week 1 Activity 1', 'Common Security Risk', 'Network in Cisco', '', '', '', '', '', ''),
('DNETCOM235', 'M', '', '', '', '', '', '', '', '', '', '', '', '', 'Index Card', 'Quiz about Week 1', '', '', '', '', 'Profile (2/4)', 'Attendance', 'Recitation', '', '', '', 'Profile (¼)', 'Week 1 Activity 1', 'Common Security Risk', 'Network in Cisco', '', '', '', '', '', ''),
('DNETCOM236', 'M', '', '', '', '', '', '', '', '', '', '', '', '', 'Index Card', 'Quiz about Week 1', '', '', '', '', 'Profile (2/4)', 'Attendance', 'Recitation', '', '', '', 'Profile (¼)', 'Week 1 Activity 1', 'Common Security Risk', 'Network in Cisco', '', '', '', '', '', '');

ALTER TABLE `actdetails`
  ADD KEY `sectionID` (`sectionID`);
  
ALTER TABLE `actdetails`
  ADD CONSTRAINT `actdetails_ibfk_1` FOREIGN KEY (`sectionID`) REFERENCES `courses` (`sectionID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

