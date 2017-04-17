-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2017 at 04:26 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paddleboatrace`
--

-- --------------------------------------------------------

--
-- Table structure for table `boat_class`
--

CREATE TABLE `boat_class` (
  `Class_ID` int(11) NOT NULL,
  `Class_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boat_class`
--

INSERT INTO `boat_class` (`Class_ID`, `Class_Name`) VALUES
(1, 'Kayak'),
(2, 'Canoes'),
(3, 'Raft'),
(4, 'The Dory'),
(5, 'Single'),
(6, 'Double'),
(7, 'Duck');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `ParticipantID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Hometown` varchar(100) NOT NULL,
  `ParticipantBIB` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`ParticipantID`, `First_Name`, `Last_Name`, `Age`, `Gender`, `Hometown`, `ParticipantBIB`) VALUES
(1, 'Vicktor', 'Von Doom', 42, 'Male', 'Latveria', '1001'),
(2, 'Luke', 'Skywalker', 20, 'Male', 'Tatooine', '1002'),
(3, 'Jak', 'Mar', 19, 'Male', 'Sandover Village', '1003'),
(4, 'Alkali', 'Bismuth', 32, 'Male', 'Chicago', '1004'),
(5, 'Monty', 'Python', 77, 'Male', 'Somerset', '1005'),
(6, 'Galen', 'Marek', 18, 'Male', 'Kashyyyk', '1006'),
(7, 'Tear', 'OfGrace', 24, 'Male', 'London', '1007');

-- --------------------------------------------------------

--
-- Table structure for table `participant_uses_class`
--

CREATE TABLE `participant_uses_class` (
  `ParticipantID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant_uses_class`
--

INSERT INTO `participant_uses_class` (`ParticipantID`, `ClassID`) VALUES
(1, 1),
(1, 2),
(1, 7),
(2, 4),
(2, 5),
(2, 3),
(3, 4),
(3, 2),
(3, 7),
(4, 4),
(4, 3),
(4, 6),
(5, 2),
(5, 3),
(6, 1),
(6, 7),
(6, 3),
(7, 1),
(7, 3),
(7, 2),
(7, 6),
(7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `race`
--

CREATE TABLE `race` (
  `RaceID` int(11) NOT NULL,
  `Description_Short` varchar(100) NOT NULL,
  `Description_Full` varchar(500) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Race_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `race`
--

INSERT INTO `race` (`RaceID`, `Description_Short`, `Description_Full`, `Location`, `Date`, `Race_Name`) VALUES
(1, '1.5 miles', '1.5 mile race around the circumference of lake kirby', 'Abilene', '1862-04-21', 'Pink Puff Paddle'),
(2, 'Race to Lake Hyrule', 'Race down the river to lake Hyrule. .8 miles', 'Hyrule', '4027-06-11', 'Twilight'),
(3, 'Bring all the paddles you can.', 'Race down shits creak.  winner gets to be the first person to the showers.', 'Shit Creak', '1269-04-01', 'Run from the smell');

-- --------------------------------------------------------

--
-- Table structure for table `race_has_class`
--

CREATE TABLE `race_has_class` (
  `RaceID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `race_has_class`
--

INSERT INTO `race_has_class` (`RaceID`, `ClassID`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 3),
(2, 7),
(2, 5),
(3, 3),
(3, 6),
(1, 6),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `race_has_participant`
--

CREATE TABLE `race_has_participant` (
  `RaceID` int(11) NOT NULL,
  `ParticipantID` int(11) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `race_has_participant`
--

INSERT INTO `race_has_participant` (`RaceID`, `ParticipantID`, `Time`) VALUES
(1, 1, '00:00:00'),
(1, 2, '00:00:00'),
(1, 3, '00:00:00'),
(1, 4, '00:00:00'),
(1, 5, '00:00:00'),
(1, 6, '00:00:00'),
(1, 7, '00:00:00'),
(2, 1, '00:00:00'),
(2, 2, '00:00:00'),
(2, 3, '00:00:00'),
(2, 6, '00:00:00'),
(3, 4, '00:00:00'),
(3, 5, '00:00:00'),
(3, 7, '00:00:00'),
(2, 7, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `TeamID` int(11) NOT NULL,
  `Team_Name` varchar(50) NOT NULL,
  `TeamBIB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TeamID`, `Team_Name`, `TeamBIB`) VALUES
(1, 'Horrible People', 1),
(2, 'Fantasy', 2);

-- --------------------------------------------------------

--
-- Table structure for table `team_has_participant`
--

CREATE TABLE `team_has_participant` (
  `TeamID` int(11) NOT NULL,
  `ParticipantID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_has_participant`
--

INSERT INTO `team_has_participant` (`TeamID`, `ParticipantID`) VALUES
(1, 4),
(1, 5),
(1, 7),
(2, 1),
(2, 2),
(2, 3),
(2, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boat_class`
--
ALTER TABLE `boat_class`
  ADD PRIMARY KEY (`Class_ID`),
  ADD UNIQUE KEY `Class_ID` (`Class_ID`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`ParticipantID`),
  ADD UNIQUE KEY `ParticipantID` (`ParticipantID`);

--
-- Indexes for table `participant_uses_class`
--
ALTER TABLE `participant_uses_class`
  ADD KEY `ParticipantID` (`ParticipantID`),
  ADD KEY `ClassID` (`ClassID`);

--
-- Indexes for table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`RaceID`),
  ADD UNIQUE KEY `RaceID` (`RaceID`);

--
-- Indexes for table `race_has_class`
--
ALTER TABLE `race_has_class`
  ADD KEY `RaceID` (`RaceID`),
  ADD KEY `ClassID` (`ClassID`);

--
-- Indexes for table `race_has_participant`
--
ALTER TABLE `race_has_participant`
  ADD KEY `ParticipantID` (`ParticipantID`),
  ADD KEY `RaceID` (`RaceID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`TeamID`),
  ADD UNIQUE KEY `TeamID` (`TeamID`);

--
-- Indexes for table `team_has_participant`
--
ALTER TABLE `team_has_participant`
  ADD KEY `TeamID` (`TeamID`),
  ADD KEY `ParticipantID` (`ParticipantID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `participant_uses_class`
--
ALTER TABLE `participant_uses_class`
  ADD CONSTRAINT `participant_uses_class_ibfk_1` FOREIGN KEY (`ParticipantID`) REFERENCES `participant` (`ParticipantID`) ON DELETE CASCADE,
  ADD CONSTRAINT `participant_uses_class_ibfk_2` FOREIGN KEY (`ClassID`) REFERENCES `boat_class` (`Class_ID`) ON DELETE CASCADE;

--
-- Constraints for table `race_has_class`
--
ALTER TABLE `race_has_class`
  ADD CONSTRAINT `race_has_class_ibfk_1` FOREIGN KEY (`RaceID`) REFERENCES `race` (`RaceID`) ON DELETE CASCADE,
  ADD CONSTRAINT `race_has_class_ibfk_2` FOREIGN KEY (`ClassID`) REFERENCES `boat_class` (`Class_ID`) ON DELETE CASCADE;

--
-- Constraints for table `race_has_participant`
--
ALTER TABLE `race_has_participant`
  ADD CONSTRAINT `race_has_participant_ibfk_1` FOREIGN KEY (`RaceID`) REFERENCES `race` (`RaceID`) ON DELETE CASCADE,
  ADD CONSTRAINT `race_has_participant_ibfk_2` FOREIGN KEY (`ParticipantID`) REFERENCES `participant` (`ParticipantID`) ON DELETE CASCADE;

--
-- Constraints for table `team_has_participant`
--
ALTER TABLE `team_has_participant`
  ADD CONSTRAINT `team_has_participant_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `team` (`TeamID`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_has_participant_ibfk_2` FOREIGN KEY (`ParticipantID`) REFERENCES `participant` (`ParticipantID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
