-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 09:04 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `role`) VALUES
(10, '', '', '', 'james', '$2y$10$HnQ10jNo4KzmKi3k7/4wdOeOrwZnF2U0YTncYjknDhvjK6Z0Vbb7G', 'admin'),
(11, '', '', '', 'admin', '$2y$10$qxF.zwnvHvNxp55.BvUDGedDH7sHRt9znV.dej0L4bD7osq0Cega.', 'admin'),
(12, '', '', '', 'rex', '$2y$10$Kim5x1WjJi6DC.UJRBILleK.PouLnFJVa7uy3A6pw5Qlg2QMSjdvO', 'admin'),
(13, '', '', '', 'isda', '$2y$10$OFmfFfRWJIVF42OPeWWQDurEsYKQ85fpNTChinKlp3dFuwwq4t7Zq', 'user'),
(14, '', '', '', 'balo', '$2y$10$DTlpDQhrlv5GRidzHspEBOhoTSwMtVvOHysj7YsSpRi.5zApT76f2', 'admin'),
(15, '', '', '', 'kang', '$2y$10$su59ucwjZ2oFIxRJwucR/.FHu3AVrgtfqrWlLvQf08.28AkFxqy6u', 'admin'),
(16, '', '', '', 'jake', '$2y$10$d66Fl8lzjOeDUumxf2Azd.aXf.YVcPLBHNA/bAOYXEg0jpTCpMw7e', 'admin'),
(17, 'rex', 'clinasd', 'r@r', 'admin123', '$2y$10$HiRhgjEWVrrddJvzkDLMoeJ6j1bDP2h6DHPdhOCXqwkvG/PFpFUfa', 'admin'),
(18, 'shin', 'doe', 'a@a', 'shindo', '$2y$10$rUgQUDdMBio.nF3b/l3Zcu9sCbBKAuOGa4SxSUmrNd3VTFCIzO8dG', 'admin'),
(19, 'edgar', 'edgar', 'edgar@edgar', 'edgar', '$2y$10$.s2BCIxtAwHc.Grl1LrlEOc0MyT7I7FqPlyD.67727kczBsLeuKlu', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `services` varchar(100) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `decline_message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `fullname`, `email`, `contact`, `services`, `doctor`, `datetime`, `status`, `decline_message`) VALUES
(1, 'edgar', 'edgar@edgar', '122334', 'hotdogss, tantang', 'Dr. Johnson', '2024-01-20 09:43:00', 'Approved', NULL),
(2, 'sad sad!', 'nathasha.pajunar@gmail.com', '2323', 'hotdogss, tantang', 'Dr. Johnson', '2024-01-20 09:45:00', 'Declined', 'Your appointment has been declined. Please contact us for more information.'),
(3, 'rex', 'nathasha.pajunar@gmail.com', '55555555', 'hotdogss', 'Dr. Johnson', '2024-01-27 15:50:00', 'Declined', 'Your appointment has been declined. Please contact us for more information.'),
(4, 'rex', 'nathasha.pajunar@gmail.com', '55555555', 'hotdogss', 'Dr. Brown', '2024-01-27 15:50:00', 'Declined', 'Your appointment has been declined. Please contact us for more information.');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DoctorID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `ContactNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `HireDate` date NOT NULL,
  `Specialization` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DoctorID`, `FirstName`, `LastName`, `Gender`, `DateOfBirth`, `ContactNumber`, `Email`, `HireDate`, `Specialization`, `Address`, `username`, `password`) VALUES
(4, 'shin', 'doe', 'M', '2024-01-15', '092193r', 'r@r', '2024-01-15', 'dentist', 'candau', 'root', ''),
(5, 'shin11', 'doe', 'M', '2024-01-02', '092193r', 'r@r', '2024-01-15', 'dentist', 'candau', 'doc12', '$2y$10$hvPgAlCmfPGTuvYaKFAxT.D.Bx9FsCE0YXIXsmnDW/vHzPP0k3HUW'),
(6, 'tok', 'tok', 'tok', '2024-01-10', '1211112112', 'r@r', '2024-01-04', 'hotdog', 'siaton', 'tok', '$2y$10$Pha5iwmy8/IceVVDMlYi8.8/erjo2W1ngk2y6KuuBuuAYZDJnIGTi'),
(7, 'edgar', 'edgaredgar', 'edgar', '2024-01-04', '2122', 'edgar@edgar', '2024-01-24', 'dentist', 'edgar', 'edgar', '$2y$10$4LiAozP9VArJusTxHOfOsOwqmjia.eFJEFSzJjnWWhKsftu3juJfm'),
(8, 'edgar', 'edgar', 'edgar', '2024-01-12', 'edgar', 'edgar@dd', '2024-01-17', 'edgar', 'edgar', 'hey', '$2y$10$W1YAH8ZNanrB9iDq2XKYhOxgu01zhEoSyjqOEhkvQF8fDtRuZqyLq');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `prescription` varchar(255) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `fullname`, `date`, `due_date`, `total_amount`, `status`, `prescription`, `patient_id`, `service`) VALUES
(1, NULL, '2024-01-17', '2024-02-16', '2500.00', 'completed', 'Medicine: Mefenamic\nDosage: 2\nInstructions: adada', 9, '12'),
(2, NULL, '2024-01-18', '2024-02-17', '11000.00', 'completed', 'Medicine: Mefenamic\nDosage: 2\nInstructions: adada', 9, '15'),
(3, NULL, '2024-01-18', '2024-02-17', '11000.00', 'completed', 'Medicine: Mefenamic\nDosage: 2\nInstructions: adada', 9, '15'),
(4, NULL, '2024-01-18', '2024-02-17', '12000.00', 'completed', 'Medicine: Mefenamic\nDosage: 2\nInstructions: adada', 9, '15,16'),
(5, NULL, '2024-01-18', '2024-02-17', '12000.00', 'completed', 'Medicine: Shaboh\nDosage: 1\nInstructions: ipalaba ug foil', 11, '15,16'),
(6, NULL, '2024-01-19', '2024-02-18', '12000.00', 'completed', 'Medicine: Shaboh\nDosage: 1\nInstructions: ipalaba ug foil', 11, '15,16');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `services` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `fullname`, `email`, `contact`, `services`, `doctor`, `datetime`) VALUES
(9, 'james yap pogs', 'nathasha.pajunar@gmail.com', '12233', 'Bridges', 'Dr. Brown', '2024-01-18 22:54:00'),
(10, 'Rex', 'nathasha.pajunar@gmail.com', '55555555', 'Crowns', 'Dr. Brown', '2024-01-19 14:42:00'),
(11, 'Angelyn', 'nathasha.pajunar@gmail.com', '123456', 'Bridges', 'Dr. Brown', '2024-01-18 17:42:00'),
(12, 'edgar', 'edgar@edgar', '122334', 'hotdogss, tantang', 'Dr. Johnson', '2024-01-20 09:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`) VALUES
(15, 'hotdogss', '11000.00'),
(16, 'tantang', '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Gender` char(1) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `HireDate` date DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `FirstName`, `LastName`, `Gender`, `DateOfBirth`, `Email`, `HireDate`, `Salary`, `Address`, `username`, `password`) VALUES
(1, 'rex', 'clint', 'M', '2003-04-29', 'a@a', '2024-01-15', '5000.00', 'candai', 'wrex', '1'),
(2, 'ange', 'lsd', 'F', '2024-01-04', 'r@r', '2024-01-15', '2300.00', 'siq', 'ger', '1'),
(3, 'geyn', 'clint', 'M', '2024-01-05', 'a@a', '2024-01-15', '21321.00', 'candai', 'akai', '356a192b7913b04c54574d18c28d46e6395428ab'),
(4, 'clint', 'rex', 'm', '2024-01-04', 'q@q', '2024-01-15', '45000.00', 'candau', 'staff', '$2y$10$cbj90CUlrXD6ui0NTCmYyu5rMXQFYnReQIHMAvSupc1L6K/Q.rhJi'),
(5, 'john', 'doe', 'M', '2024-01-16', 'a@a', '2024-01-15', '42000.00', 'lo', '', '$2y$10$Qen26wTivq.LQXuf59zeL.d9ZMkCCUS8tq/muoXdSYGjGiza6JnJO'),
(6, 'john', 'doe', 'M', '2024-01-16', 'a@a', '2024-01-15', '42000.00', 'lo', 'agent', '$2y$10$.08hng7fPGAuvo0C5.nCROHh05WDIpNfT31jr5GlKfV9/kcYHHuzq'),
(7, 'ew', 'ew', 'm', '2024-01-08', 'doc@ddd', '2024-01-12', '21321.00', 'candai', 'ew', '$2y$10$YDAd3Zld5EinQzHG1vRQqO/4AYjfO5aqImwlHdznQD4gXUbTPkJjC');

-- --------------------------------------------------------

--
-- Table structure for table `staff_app`
--

CREATE TABLE `staff_app` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `services` varchar(255) DEFAULT NULL,
  `doctor` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_app`
--

INSERT INTO `staff_app` (`id`, `patient_id`, `email`, `contact`, `services`, `doctor`, `datetime`, `created_at`, `updated_at`) VALUES
(51, 6, 'Gwyn@gwyn', '', 'Bridges', 'Dr. Smith', '2024-01-19 10:33:00', '2024-01-16 14:15:56', '2024-01-16 14:15:56'),
(52, 7, 'Saycon@Saycon', '12345678', 'Fillings', 'Dr. Brown', '2024-01-18 00:08:00', '2024-01-17 11:47:05', '2024-01-17 11:47:05'),
(53, 5, 'Angeline@an', '', 'Dentures', 'Dr. Johnson', '2024-01-09 01:32:00', '2024-01-17 11:48:38', '2024-01-17 11:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `ProductID` int(11) NOT NULL,
  `Products` varchar(255) NOT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Stocks` varchar(1000) NOT NULL,
  `Sold` varchar(10000) NOT NULL,
  `Remaining` int(11) NOT NULL,
  `Action` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`ProductID`, `Products`, `Category`, `Stocks`, `Sold`, `Remaining`, `Action`) VALUES
(4, 'Biogesic', 'ub', '0', '0', 0, 'Add'),
(7, 'Mefenamic', 'ew', '0', '0', 0, 'Add');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `role`) VALUES
(1, 'dd', 'dd', 'w@w', 'admin', '$2y$10$mazPehRczjjpepvlTMfHRuyxe75Xwhz48Wp4X3zPJpDuktxTqJwwu', 'user'),
(2, 'rex', 'patajo', 'w@w', 'admin', '$2y$10$CuFVtJi7gx5KixvUgtGHrumnd8fhoY/EkGSvcEtr.8KuTL/Y2NGxS', 'user'),
(3, 'day', 'day', 'day@day', 'day', '$2y$10$STFpCVI9iav7oN0TkJDnxedaG5K3fPUrxkH8xBvdtUplhbg7E3Kqy', 'user'),
(4, 'nath', 'nath', 'nath@nath', 'nath', '$2y$10$JlwXGljNi1nGiZL0UPcsduseztKad9/r195S8gnsuh4tL5aiVJTf.', 'user'),
(5, 'sad', 'sad', 'sad@gmail.com', 'sad', '$2y$10$.q1acdlFlAdK3AfVmDpOQuSpmLF9v1Hd1XC7BkKQxWUWNkjPk8bQG', 'user'),
(6, 'tt', 'tt', 'tt@tt', 'tt', '$2y$10$0/r60gfZf3fYgX/BhWOj..1v33MZMWyjdDbf6CQ1rJ0WtUY9J9/QK', 'user'),
(7, 'tani', 'tani', 'tani@tani', 'tani', '$2y$10$VmYdGZw0uGopmlPnso6wNeK5PmcT616j5eI4qz5KARR7oXEYtS2Iq', 'user'),
(19, '', '', '', 'kang', '$2y$10$su59ucwjZ2oFIxRJwucR/.FHu3AVrgtfqrWlLvQf08.28AkFxqy6u', 'admin'),
(20, '', '', '', 'jake', '$2y$10$d66Fl8lzjOeDUumxf2Azd.aXf.YVcPLBHNA/bAOYXEg0jpTCpMw7e', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DoctorID`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_patient` (`patient_id`),
  ADD KEY `fullname` (`fullname`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `staff_app`
--
ALTER TABLE `staff_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff_app`
--
ALTER TABLE `staff_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
