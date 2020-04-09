-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2019 at 09:29 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitalfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `docter_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `blood_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood_id`, `hospital_id`, `blood_group`, `stock`) VALUES
(3, 31, 'A+', '30'),
(4, 31, 'B+', '50'),
(5, 31, 'O+', '10');

-- --------------------------------------------------------

--
-- Table structure for table `docter`
--

CREATE TABLE `docter` (
  `docter_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `docter_image` varchar(10000) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docter`
--

INSERT INTO `docter` (`docter_id`, `login_id`, `hospital_id`, `email_id`, `docter_image`, `first_name`, `middle_name`, `last_name`, `qualification`, `mobile_number`, `category`) VALUES
(66, 82, 31, 'cgpbmd550@gmail.com', '06-02-2019-07-58-39.jpg', 'rutvik', 'pravinbhai', 'dudhat', 'MD', '12345679', 'kidney');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `profile` varchar(10000) NOT NULL,
  `hospital_image` varchar(10000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `building_no` varchar(100) NOT NULL,
  `colony` varchar(100) NOT NULL,
  `land_mark` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `medical_facilities` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `certificate` varchar(10000) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `login_id`, `email_id`, `profile`, `hospital_image`, `name`, `owner_name`, `mobile_number`, `category`, `type`, `time`, `building_no`, `colony`, `land_mark`, `area`, `pincode`, `city`, `state`, `latitude`, `longitude`, `medical_facilities`, `about`, `certificate`, `status`) VALUES
(15, 13, 'kiran@gmail.com', '', '03-01-2019-05-10-47.jpg', 'kiran', 'kiran', '123456789', 'multispecialist', 'private', '12:00am to 12:00pm', '20', 'naginavadi', 'naginavadi', 'katargam', '395006', 'Surat', 'Gujarat', '21.2195471', '72.8354162', 'we have mir machine ,x-ray machine', 'we are kind', '', '1'),
(19, 14, 'ppsavani@gmail.com', '06-01-2019-12-07-03profile.jpg', '06-01-2019-12-07-03.jpg', 'ppsavnii', 'vallabhbhai', '123456789', 'multispecialist', 'private', '12:00am to 12:00pm', '20', 'chikuvadi', 'babmbagate', 'kapodra', '395006', 'Surat', 'Gujarat', '21.220854', '72.8716053', 'medical facilites updated', 'about updated', '06-01-2019-12-07-03file.pdf', '1'),
(20, 38, 'mahavir@gmail.com', '06-01-2019-02-34-14profile.jpg', '06-01-2019-02-34-14.jpg', 'Mahavir', 'Mahavie', '123456789', 'Orthodopedic', 'Private', '9:00 am to8:00am', '12', 'Vanita', 'Vishram', 'Majura', '395006', 'Surat', 'Gujarat', '22.34', '34.555', 'Medical facilities are available', 'Since 2000', '06-01-2019-02-34-14file.pdf', '1'),
(22, 41, 'abci', '07-01-2019-07-55-26profile.jpg', '07-01-2019-07-55-26.jpg', 'Ghevariya', 'rajesh', '123456789', 'Dental', 'Private', '12 hours', '12', 'rushal arcade', 'hirabag', 'varacha', '395002', 'Surat', 'Gujarat', '49.55', '45.8888', 'Gahshshsh', 'Ghjdjjh', '07-01-2019-07-55-26file.pdf', '0'),
(27, 54, 'jdgabami@gmail.com', '09-01-2019-07-00-15profile.JPG', '09-01-2019-07-00-15.JPG', 'Jdgabani', 'Jdgabani', '123456789', 'MultiSpecialist', 'Private', '24 hours', '12', 'Sliver stone', 'Near royal arcade', 'Hirabag', '395006', 'Surat', 'Gujarat', '22.34', '22.334', 'X-ray avialble', 'Since 2000', '09-01-2019-07-00-15file.pdf', '1'),
(28, 57, 'anb@gmail.com', '10-01-2019-10-14-28profile.jpg', '10-01-2019-10-14-28.jpg', 'a', 'a', '123456789', 'Orthodopedic', 'Goverment', '24', 'a', 'a', 'a', 'a', '39500', 'Surat', 'Gujarat', '2', '44', 'Aja', 'Hhs', '10-01-2019-10-14-28file.pdf', '0'),
(31, 63, 'cvmadmissionprocess@gmail.com', '12-01-2019-12-07-17profile.jpg', '13-01-2019-11-18-17.jpg', 'Ghevariya', 'rajo', '1234567890', 'Dental', 'Private', '12 hours', '12', 'rushal arcade', 'hirabag', 'varacha', '395002', 'Morbi', 'Gujarat', '39.75566', '45.98666', 'There is no emphasis on the core values.\nHI hello h r u.\nBye.\nHi\nAs\n1234567890 \n\n\nHsheusuujd.', 'Our hospital since 2000.\nShare joy.\n123\n\nOhk\nHI every two.\n\nFir.\n\n\nLion', '12-01-2019-12-07-17file.pdf', '0'),
(33, 69, 'xyza@gmail.com', '17-01-2019-10-23-19profile.jpg', '17-01-2019-10-23-19.jpg', 'kiran', 'kiran', '1234567890', 'Dental', 'Private', '24 hours', '1', 'royal', 'hirabag', 'varacha', '123456', 'Surat', 'Gujarat', '221.1911', '464949.44', 'Abc', 'Bca', '17-01-2019-10-23-19file.pdf', '0'),
(37, 80, 'Ll@gmail.com', '01-02-2019-05-31-19profile.jpg', '01-02-2019-05-31-19.jpg', 'l', 'l', '1234567890', 'Dental', 'Goverment', '1', 'l', 'l', 'l', 'l', '2', 'Surat', 'Gujarat', '1', '1', 'A', 'A', '01-02-2019-05-31-19file.pdf', '1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `signup_date` date NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `email_id`, `password`, `signup_date`, `category`) VALUES
(12, 'denish1700@gmail.com', 'c5f76d57a724b5ea755c2074e1c80910', '2019-01-01', 'patient'),
(13, 'kiran@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2019-01-01', 'hospital'),
(14, 'ppsavani@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2019-04-01', 'hospital'),
(15, 'mitul@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2019-01-05', 'pateint'),
(38, 'mahavir@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-01-06', 'hospital'),
(41, 'abci', 'e2fc714c4727ee9395f324cd2e7f331f', '2019-01-07', 'hospital'),
(54, 'jdgabami@gmail.com', 'a092b936c9758f50a502f3563a13cfe7', '2019-01-09', 'hospital'),
(55, 'maheswari@gmail.com', 'ca830ff620c55e89bdb23092564513d5', '2019-01-10', 'hospital'),
(57, 'anb@gmail.com', '63a8f8e62719de2f1d228b68b256f019', '2019-01-10', 'hospital'),
(58, 'mitulgchovatiya@gmail.com', 'cfa82f9b9e16a5eb2d617885d19a2f9f', '2019-01-12', 'patient'),
(63, 'cvmadmissionprocess@gmail.com', '4ddeeddafe0cefb015b0d3d50b7c60c8', '2019-01-12', 'hospital'),
(69, 'xyza@gmail.com', '7c5c39f5ae44fe0246522a4be9a9b9e0', '2019-01-17', 'hospital'),
(70, 'maheta@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2019-01-29', 'docter'),
(80, 'Ll@gmail.com', 'baece1b85a42b52b98f078dbeb304f3b', '2019-02-01', 'hospital'),
(82, 'cgpbmd550@gmail.com', 'cfa82f9b9e16a5eb2d617885d19a2f9f', '2019-02-06', 'docter');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `hospital_id`, `name`, `stock`) VALUES
(1, 31, 'Aspirine', '14'),
(3, 31, 'Despirin', '13'),
(4, 31, 'trex', '10'),
(5, 31, 'tenpose', '20'),
(6, 31, 'Nepro', '10'),
(7, 31, 'Nepro1', '10'),
(8, 31, 'Nepro2', '15'),
(9, 31, 'Nepro3', '10'),
(10, 31, 'Nepro4', '10'),
(11, 31, 'Nepro5', '8');

-- --------------------------------------------------------

--
-- Table structure for table `order_blood`
--

CREATE TABLE `order_blood` (
  `order_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `blood_id` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `reason` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_blood`
--

INSERT INTO `order_blood` (`order_id`, `patient_id`, `hospital_id`, `blood_id`, `quantity`, `date`, `status`, `reason`) VALUES
(8, 12, 31, 4, '10', '2019-02-08', '1', NULL),
(9, 12, 31, 5, '5', '2019-02-08', '2', 'nae male');

-- --------------------------------------------------------

--
-- Table structure for table `order_medicine`
--

CREATE TABLE `order_medicine` (
  `order_medicine_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `reason` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_medicine`
--

INSERT INTO `order_medicine` (`order_medicine_id`, `patient_id`, `hospital_id`, `medicine_id`, `quantity`, `date`, `status`, `reason`) VALUES
(7, 12, 31, 3, '15', '2019-02-08', '2', 'nathi'),
(8, 12, 31, 4, '15', '2019-02-08', '1', NULL),
(10, 12, 31, 4, '15', '2019-02-08', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `mobile_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `login_id`, `email_id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `mobile_number`) VALUES
(2, 12, 'denish1700@gmailcom', 'denish', 'girdharbhai', 'chovatiya', '2000-08-05', '123456789'),
(12, 58, 'mitulgchovatiya@gmail.com', 'Mitul', 'Chovatiya', 'Girdharbhai', '1997-09-29', '9909402550');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `foreign_key_appointment1` (`patient_id`),
  ADD KEY `foreign_key_appointment2` (`hospital_id`),
  ADD KEY `foreign_key_appointment3` (`docter_id`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`blood_id`),
  ADD KEY `foreign_key_blood1` (`hospital_id`);

--
-- Indexes for table `docter`
--
ALTER TABLE `docter`
  ADD PRIMARY KEY (`docter_id`),
  ADD KEY `foreign_key_docter1` (`login_id`),
  ADD KEY `foreign_key_docter2` (`email_id`),
  ADD KEY `foreign_key_docter` (`hospital_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`),
  ADD KEY `foreign_key_hospital1` (`login_id`),
  ADD KEY `foreign_key_hospital2` (`email_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `emai_id` (`email_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`),
  ADD KEY `foreign_key_medicine` (`hospital_id`);

--
-- Indexes for table `order_blood`
--
ALTER TABLE `order_blood`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `foreign_key_orderblood1` (`blood_id`),
  ADD KEY `foreign_key_orderblood2` (`hospital_id`),
  ADD KEY `foreign_key_orderblood3` (`patient_id`);

--
-- Indexes for table `order_medicine`
--
ALTER TABLE `order_medicine`
  ADD PRIMARY KEY (`order_medicine_id`),
  ADD KEY `foreign_key_order_medicine1` (`hospital_id`),
  ADD KEY `foreign_key_order_medicine` (`patient_id`),
  ADD KEY `foreign_key_order_medicine2` (`medicine_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `foreign_key` (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `blood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `docter`
--
ALTER TABLE `docter`
  MODIFY `docter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_blood`
--
ALTER TABLE `order_blood`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_medicine`
--
ALTER TABLE `order_medicine`
  MODIFY `order_medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `foreign_key_appointment1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `foreign_key_appointment2` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`),
  ADD CONSTRAINT `foreign_key_appointment3` FOREIGN KEY (`docter_id`) REFERENCES `docter` (`docter_id`);

--
-- Constraints for table `blood`
--
ALTER TABLE `blood`
  ADD CONSTRAINT `foreign_key_blood1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`);

--
-- Constraints for table `docter`
--
ALTER TABLE `docter`
  ADD CONSTRAINT `foreign_key_docter` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`),
  ADD CONSTRAINT `foreign_key_docter1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`),
  ADD CONSTRAINT `foreign_key_docter2` FOREIGN KEY (`email_id`) REFERENCES `login` (`email_id`);

--
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `foreign_key_hospital1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`),
  ADD CONSTRAINT `foreign_key_hospital2` FOREIGN KEY (`email_id`) REFERENCES `login` (`email_id`);

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `foreign_key_medicine` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`);

--
-- Constraints for table `order_blood`
--
ALTER TABLE `order_blood`
  ADD CONSTRAINT `foreign_key_orderblood1` FOREIGN KEY (`blood_id`) REFERENCES `blood` (`blood_id`),
  ADD CONSTRAINT `foreign_key_orderblood2` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`),
  ADD CONSTRAINT `foreign_key_orderblood3` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `order_medicine`
--
ALTER TABLE `order_medicine`
  ADD CONSTRAINT `foreign_key_order_medicine` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `foreign_key_order_medicine1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`),
  ADD CONSTRAINT `foreign_key_order_medicine2` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
