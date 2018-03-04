-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2018 at 09:00 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Telestroke`
--

-- --------------------------------------------------------

--
-- Table structure for table `Balance`
--

CREATE TABLE `Balance` (
  `balance_id` int(10) NOT NULL,
  `standingscore` int(11) NOT NULL,
  `settingscore` int(11) NOT NULL,
  `turning` int(11) NOT NULL,
  `standing` int(11) NOT NULL,
  `footonstool` int(11) NOT NULL,
  `pickup` int(11) NOT NULL,
  `b_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MR_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Communication`
--

CREATE TABLE `Communication` (
  `communication_id` int(10) NOT NULL,
  `comprehension` int(11) NOT NULL,
  `expression` int(11) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MR_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Communication`
--

INSERT INTO `Communication` (`communication_id`, `comprehension`, `expression`, `c_date`, `MR_id`) VALUES
(4, 0, 5, '0000-00-00 00:00:00', '123'),
(9, 0, 2, '2018-02-26 12:02:40', '123');

-- --------------------------------------------------------

--
-- Table structure for table `Hospital`
--

CREATE TABLE `Hospital` (
  `hospital_id` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `phone_no` char(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `addressline1` varchar(50) NOT NULL,
  `addressline2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Hospital`
--

INSERT INTO `Hospital` (`hospital_id`, `name`, `type`, `phone_no`, `city`, `addressline1`, `addressline2`) VALUES
('111111', 'Addwadmi', 'spoke', '0505776980', 'Addwadmi', '', ''),
('12345', 'Riyadh', 'hub', '0539339444', 'Riyadh', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `Hub_staff`
--

CREATE TABLE `Hub_staff` (
  `staff_id` varchar(10) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `role` varchar(50) NOT NULL,
  `sgender` varchar(10) NOT NULL,
  `sphone_no` char(10) NOT NULL,
  `hospital_id` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Hub_staff`
--

INSERT INTO `Hub_staff` (`staff_id`, `first_name`, `last_name`, `role`, `sgender`, `sphone_no`, `hospital_id`, `email`) VALUES
('10892834', 'Ibtisam', '', 'Neurologist', 'Female', '050226798', '111111', 'ebtisam.o.96@gmail.com '),
('1090353416', 'Nora Khaled', '', 'IT', 'Female', '0539339555', '111111', 'nora.k.alghanmi@gmail.com'),
('109653416', 'test1', 'test2', 'Nurse', 'Male', '053865', '12345', 'dfghjkl@fghjk.com'),
('1100545431', 'Reema', '', 'IT', 'Female', '0530516282', '111111', 'Reema.alharbi1@hotmail.com'),
('434003571', 'Malak', '', 'IT', 'Female', '0503237062', '111111', 'angel-csb-@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Logindetails`
--

CREATE TABLE `Logindetails` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Logindetails`
--

INSERT INTO `Logindetails` (`username`, `password`, `staff_id`, `role`) VALUES
('Nora', '1234', '1090353416', 'Admin'),
('Reema', '123123', '1100545431', 'Spoke');

-- --------------------------------------------------------

--
-- Table structure for table `Medical_record`
--

CREATE TABLE `Medical_record` (
  `MR_id` varchar(10) NOT NULL,
  `admissiondate` date NOT NULL,
  `chronic_disease` varchar(100) NOT NULL,
  `brain_imaging` varchar(300) NOT NULL,
  `pulse` int(11) NOT NULL,
  `bloodpressure` varchar(20) NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `Notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Medical_record`
--

INSERT INTO `Medical_record` (`MR_id`, `admissiondate`, `chronic_disease`, `brain_imaging`, `pulse`, `bloodpressure`, `weight`, `height`, `patient_id`, `Notes`) VALUES
('123', '2018-02-13', 'jtyujt', 'u76i56e', 1342, 'grinder', 424, 435, '1022843211', '');

-- --------------------------------------------------------

--
-- Table structure for table `Medicine`
--

CREATE TABLE `Medicine` (
  `medicine_id` varchar(10) NOT NULL,
  `medicinename` varchar(50) NOT NULL,
  `dose` varchar(50) NOT NULL,
  `MR_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Musclestrength`
--

CREATE TABLE `Musclestrength` (
  `muscle_s_id` int(10) NOT NULL,
  `upperbody` int(11) NOT NULL,
  `lowerbody` int(11) NOT NULL,
  `bladdermng` int(11) NOT NULL,
  `bowelmng` int(11) NOT NULL,
  `m_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MR_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `patient_id` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `pphone_no1` char(10) NOT NULL,
  `pphone_no2` char(10) DEFAULT NULL,
  `pemail` varchar(50) DEFAULT NULL,
  `pgender` varchar(10) NOT NULL,
  `pbirthdate` date NOT NULL,
  `pcity` varchar(50) DEFAULT NULL,
  `paddressline1` varchar(50) DEFAULT NULL,
  `paddressline2` varchar(50) NOT NULL,
  `hospital_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`patient_id`, `first_name`, `last_name`, `pphone_no1`, `pphone_no2`, `pemail`, `pgender`, `pbirthdate`, `pcity`, `paddressline1`, `paddressline2`, `hospital_id`) VALUES
('1022843211', 'Ahmad', '', '0505666643', '', NULL, 'Male', '1964-04-04', NULL, NULL, '', '111111'),
('1022843634', 'Salem Ahamad', '', '0113285478', '050329846', 'salemaadil@gmail.com', 'Male', '1980-11-21', 'Riyadh', 'Alolia', 'Street', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `problem_report`
--

CREATE TABLE `problem_report` (
  `problem_id` int(11) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` blob NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Relative`
--

CREATE TABLE `Relative` (
  `relative_id` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `rphone_no1` char(10) NOT NULL,
  `rphone_no2` char(10) DEFAULT NULL,
  `remail` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `raddressline1` varchar(50) DEFAULT NULL,
  `raddressline2` varchar(50) DEFAULT NULL,
  `patient_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Selfcare`
--

CREATE TABLE `Selfcare` (
  `selfcare_id` int(10) NOT NULL,
  `eating` int(11) NOT NULL,
  `grooming` int(11) NOT NULL,
  `bathing` int(11) NOT NULL,
  `toileting` int(11) NOT NULL,
  `dressing` int(11) NOT NULL,
  `s_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MR_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Session`
--

CREATE TABLE `Session` (
  `session_id` int(10) NOT NULL,
  `session_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL,
  `progress_notes` text,
  `hub_id` varchar(10) NOT NULL,
  `spoke_id` varchar(10) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `room_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Spoke_staff`
--

CREATE TABLE `Spoke_staff` (
  `staff_id` varchar(10) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `role` varchar(50) NOT NULL,
  `sgender` varchar(10) NOT NULL,
  `sphone_no` char(10) NOT NULL,
  `hospital_id` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Spoke_staff`
--

INSERT INTO `Spoke_staff` (`staff_id`, `first_name`, `last_name`, `role`, `sgender`, `sphone_no`, `hospital_id`, `email`) VALUES
('10892834', 'Ibtisam', '', 'Neurologist', 'Female', '050226798', '111111', 'ebtisam.o.96@gmail.com '),
('1090353416', 'Nora Khaled', '', 'IT', 'Female', '0539339555', '111111', 'nora.k.alghanmi@gmail.com'),
('109653416', 'test1', 'test2', 'Nurse', 'Male', '053865', '12345', 'dfghjkl@fghjk.com'),
('1100545431', 'Reema', '', 'IT', 'Female', '0530516282', '111111', 'Reema.alharbi1@hotmail.com'),
('434003571', 'Malak', '', 'IT', 'Female', '0503237062', '111111', 'angel-csb-@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Balance`
--
ALTER TABLE `Balance`
  ADD PRIMARY KEY (`balance_id`),
  ADD KEY `MR_id` (`MR_id`);

--
-- Indexes for table `Communication`
--
ALTER TABLE `Communication`
  ADD PRIMARY KEY (`communication_id`),
  ADD KEY `MR_id` (`MR_id`);

--
-- Indexes for table `Hospital`
--
ALTER TABLE `Hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `Hub_staff`
--
ALTER TABLE `Hub_staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `hospital_id_2` (`hospital_id`);

--
-- Indexes for table `Logindetails`
--
ALTER TABLE `Logindetails`
  ADD PRIMARY KEY (`username`),
  ADD KEY `admi_staff_id` (`staff_id`);

--
-- Indexes for table `Medical_record`
--
ALTER TABLE `Medical_record`
  ADD PRIMARY KEY (`MR_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `Medicine`
--
ALTER TABLE `Medicine`
  ADD PRIMARY KEY (`medicine_id`),
  ADD KEY `MR_id` (`MR_id`);

--
-- Indexes for table `Musclestrength`
--
ALTER TABLE `Musclestrength`
  ADD PRIMARY KEY (`muscle_s_id`),
  ADD KEY `MR_id` (`MR_id`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `hospital` (`hospital_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `problem_report`
--
ALTER TABLE `problem_report`
  ADD PRIMARY KEY (`problem_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `Relative`
--
ALTER TABLE `Relative`
  ADD PRIMARY KEY (`relative_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `Selfcare`
--
ALTER TABLE `Selfcare`
  ADD PRIMARY KEY (`selfcare_id`),
  ADD KEY `MR_id` (`MR_id`);

--
-- Indexes for table `Session`
--
ALTER TABLE `Session`
  ADD PRIMARY KEY (`session_id`),
  ADD UNIQUE KEY `patient_id` (`patient_id`),
  ADD KEY `hub_id` (`hub_id`),
  ADD KEY `spoke_id` (`spoke_id`);

--
-- Indexes for table `Spoke_staff`
--
ALTER TABLE `Spoke_staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `hospital_id_2` (`hospital_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Balance`
--
ALTER TABLE `Balance`
  MODIFY `balance_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Communication`
--
ALTER TABLE `Communication`
  MODIFY `communication_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Musclestrength`
--
ALTER TABLE `Musclestrength`
  MODIFY `muscle_s_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `problem_report`
--
ALTER TABLE `problem_report`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Selfcare`
--
ALTER TABLE `Selfcare`
  MODIFY `selfcare_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Session`
--
ALTER TABLE `Session`
  MODIFY `session_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Balance`
--
ALTER TABLE `Balance`
  ADD CONSTRAINT `balance_mr` FOREIGN KEY (`MR_id`) REFERENCES `Medical_record` (`MR_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Communication`
--
ALTER TABLE `Communication`
  ADD CONSTRAINT `communication_mr` FOREIGN KEY (`MR_id`) REFERENCES `Medical_record` (`MR_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Logindetails`
--
ALTER TABLE `Logindetails`
  ADD CONSTRAINT `account_hubsID` FOREIGN KEY (`staff_id`) REFERENCES `Hub_staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_spokesID` FOREIGN KEY (`staff_id`) REFERENCES `Spoke_staff` (`staff_id`);

--
-- Constraints for table `Medical_record`
--
ALTER TABLE `Medical_record`
  ADD CONSTRAINT `mr_patient` FOREIGN KEY (`patient_id`) REFERENCES `Patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Medicine`
--
ALTER TABLE `Medicine`
  ADD CONSTRAINT `medicine` FOREIGN KEY (`MR_id`) REFERENCES `Medical_record` (`MR_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Musclestrength`
--
ALTER TABLE `Musclestrength`
  ADD CONSTRAINT `muscle_mr` FOREIGN KEY (`MR_id`) REFERENCES `Medical_record` (`MR_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Patient`
--
ALTER TABLE `Patient`
  ADD CONSTRAINT `patient_hospital` FOREIGN KEY (`hospital_id`) REFERENCES `Hospital` (`hospital_id`);

--
-- Constraints for table `problem_report`
--
ALTER TABLE `problem_report`
  ADD CONSTRAINT `reportstaff_staff` FOREIGN KEY (`staff_id`) REFERENCES `hub_staff` (`staff_id`);

--
-- Constraints for table `Relative`
--
ALTER TABLE `Relative`
  ADD CONSTRAINT `relative_patient` FOREIGN KEY (`patient_id`) REFERENCES `Patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Selfcare`
--
ALTER TABLE `Selfcare`
  ADD CONSTRAINT `selfcare_mr` FOREIGN KEY (`MR_id`) REFERENCES `Medical_record` (`MR_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Session`
--
ALTER TABLE `Session`
  ADD CONSTRAINT `participanthub_staff` FOREIGN KEY (`hub_id`) REFERENCES `hub_staff` (`staff_id`),
  ADD CONSTRAINT `participantpatient_patient` FOREIGN KEY (`patient_id`) REFERENCES `Patient` (`patient_id`),
  ADD CONSTRAINT `participantspoke_staff` FOREIGN KEY (`spoke_id`) REFERENCES `hub_staff` (`staff_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
