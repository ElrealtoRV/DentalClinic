-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 06:20 AM
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
(19, 'edgar', 'edgar', 'edgar@edgar', 'edgar', '$2y$10$.s2BCIxtAwHc.Grl1LrlEOc0MyT7I7FqPlyD.67727kczBsLeuKlu', 'admin'),
(20, 'admin', 'admin', 'admin@v', 'admin', '$2y$10$j8To0XAflz1xH59qbb0ESuGB6QTnNhhFVu87sR6HBIkRmTqhhwJIm', 'admin'),
(21, 'admin', 'admin', 'admin@v', 'admin', '$2y$10$SjFzACa00QbWp/56Q5b6quf1QHddHrdJd5qvOx4soVtpCxNb./Lgy', 'admin');

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
  `user_id` int(11) NOT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `decline_message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `fullname`, `email`, `contact`, `services`, `doctor`, `datetime`, `user_id`, `status`, `decline_message`) VALUES
(4, 'james yap', 'Angeline@an', '55555555', 'Dental Cleaning, Tooth Extraction, Orthodontic Treatment', 'Dr. Brown', '2024-01-23 20:03:00', 0, 'Declined', 'Your appointment has been declined. Please contact us for more information.'),
(5, 'james yap', 'Angeline@an', '55555555', 'Dental Cleaning, Tooth Extraction, Orthodontic Treatment', 'Dr. Brown', '2024-01-23 20:03:00', 0, 'Declined', 'Your appointment has been declined. Please contact us for more information.'),
(6, 'james yap', 'Angeline@an', '55555555', 'Dental Cleaning, Tooth Extraction, Orthodontic Treatment', 'Dr. Brown', '2024-01-23 20:03:00', 0, 'Declined', 'Your appointment has been declined. Please contact us for more information.'),
(7, 'james yap', 'Angeline@an', '55555555', 'Dental Cleaning, Tooth Extraction, Orthodontic Treatment', 'Dr. Brown', '2024-01-23 20:03:00', 0, 'Declined', 'Your appointment has been declined. Please contact us for more information.'),
(8, 'james yap', 'Angeline@an', '55555555', 'Dental Cleaning, Tooth Extraction, Orthodontic Treatment', 'Dr. Brown', '2024-01-23 20:03:00', 0, 'Declined', 'Your appointment has been declined. Please contact us for more information.'),
(14, 'james yap', 'nathasha.pajunar@gmail.com', '55555555', 'Dental Cleaning, Tooth Extraction, Root Canal Therapy', 'Dr. Smith', '2024-01-22 13:19:00', 0, 'Approved', NULL),
(15, 'nit', 'Rex@rex', '55555555', 'Dental Cleaning', 'Dr. Smith', '2024-01-28 13:27:00', 0, 'Approved', NULL),
(16, 'james yap', 'nathasha.pajunar@gmail.com', '55555555', 'Dental Cleaning', 'Dr. Smith', '2024-01-22 16:59:00', 0, 'Approved', NULL),
(20, 'james yap', 'nathasha.pajunar@gmail.com', '12333', 'Dental Cleaning, Orthodontic Treatment, Dental Implants', '', '2024-01-24 15:15:00', 0, 'Declined', 'Your appointment has been declined. Please contact us for more information.'),
(21, 'James Carlos', 'James@James', '12333', 'Dental Cleaning, Dental Crowns, Orthodontic Treatment, Dental Implants', '', '2024-01-24 15:16:00', 0, 'Declined', 'Your appointment has been declined. Please contact us for more information.'),
(22, 'daniel', 'nath@nath', '12333', 'Dental Cleaning, Tooth Extraction', '', '2024-01-24 15:17:00', 0, 'Approved', NULL),
(23, 'edgar', 'edgar@edgar', '1233232323', 'Dental Cleaning, Tooth Extraction', '', '2024-01-24 18:06:00', 0, 'Approved', NULL),
(24, 'c', 'nathasha.pajunar@gmail.com', '232332', 'Dental Cleaning, Tooth Extraction, Root Canal Therapy', '', '2024-01-24 20:31:00', 0, 'Approved', NULL),
(25, 'yo', 'yo@v', '123456', 'Dental Cleaning, Tooth Extraction, Root Canal Therapy, Dental Fillings', '', '2024-01-24 20:33:00', 0, 'Declined', 'Your appointment has been declined. Please contact us for more information.');

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
(8, 'edgar', 'edgar', 'edgar', '2024-01-12', 'edgar', 'edgar@dd', '2024-01-17', 'edgar', 'edgar', 'hey', '$2y$10$W1YAH8ZNanrB9iDq2XKYhOxgu01zhEoSyjqOEhkvQF8fDtRuZqyLq'),
(9, 'wow', 'wow', 'wow', '2024-01-26', '09265666', 'a@a', '2024-01-26', 'dentist', 'candai', 'wow', '$2y$10$xBjGO14GM9XPCppG2DmK6OuzqSlcIZ5gcoE575DyZw.NRzGriieXO'),
(10, 'gwt', 'gwt', 'gwt', '2024-01-19', 'gwt', 'gwt@gwt', '2024-01-21', 'dentist', 'gwt', 'gwt', '$2y$10$s9lhvrnohbalkoaFX1kiZ.8oEuT/PzV8nqTHbC8n0DS2ZkY8bN/Ty'),
(11, 'gwyn', 'gwyn', 'm', '2024-01-21', '09265666', 'ffddf@ddf', '2024-01-21', 'hotdog', 'candai', 'gwyn', '$2y$10$.n047JbWCTClTsHc9mA1C.OTdhsblYFWcrSB546kahwxj3dcrSB1q'),
(12, 'dok', 'dok', 'm', '2024-01-21', '1211112112', 'ffddf@ddf', '2024-01-21', 'dentist', 'candai', 'dok', '$2y$10$OrZ3WVXlO5O4A04tw0upb.GW/t9kAZaQTwomvVXe/t24v58zzLGiG');

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
(22, NULL, '2024-01-23', '2024-02-22', '2700.00', 'completed', 'Medicines:\n- Mefenamic\n- amoxicillin\n- Antibiotics\n- Biogesic\n- paracetamol\nDosage: 1\nInstructions: gfgfg', 21, '17,20,23'),
(23, NULL, '2024-01-23', '2024-02-22', '1900.00', 'completed', 'Medicines:\n- amoxicillin\n- Biogesic\n- paracetamol\nDosage: 1\nInstructions: take daily', 23, '17,18,19'),
(24, NULL, '2024-01-23', '2024-02-22', '2000.00', 'Pending', 'Medicines:\n- amoxicillin\n- Antibiotics\n- Biogesic\n- paracetamol\nDosage: 1\nInstructions: 2', 19, '17,20');

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
(19, 'Angeline Quezon', 'nathasha.pajunar@gmail.com', '55555555', 'Dental Cleaning, Tooth Extraction, Root Canal Therapy', 'Dr. Smith', '2024-01-22 13:19:00'),
(20, 'Rex Patajo', 'Rex@rex', '55555555', 'Dental Cleaning', 'Dr. Smith', '2024-01-28 13:27:00'),
(21, 'Celester Saycon', 'nathasha.pajunar@gmail.com', '55555555', 'Dental Cleaning', 'Dr. Smith', '2024-01-22 16:59:00'),
(22, 'Nathaniel Pajunar', 'nath@nath', '12333', 'Dental Cleaning, Tooth Extraction', '', '2024-01-24 15:17:00'),
(23, 'edgar', 'edgar@edgar', '1233232323', 'Dental Cleaning, Tooth Extraction', '', '2024-01-24 18:06:00'),
(24, 'c', 'nathasha.pajunar@gmail.com', '232332', 'Dental Cleaning, Tooth Extraction, Root Canal Therapy', '', '2024-01-24 20:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `medicine_name` varchar(255) DEFAULT NULL,
  `dosage` varchar(255) DEFAULT NULL,
  `instructions` text,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `patient_id`, `medicine_name`, `dosage`, `instructions`, `date_added`) VALUES
(1, 20, 'Antibiotics', '2', 'hehe', '2024-01-21 05:42:12'),
(2, 20, 'Antibiotics', '2', 'hehe', '2024-01-21 05:42:42');

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
(17, 'Dental Cleaning', '500.00'),
(18, 'Tooth Extraction', '400.00'),
(19, 'Root Canal Therapy', '1000.00'),
(20, 'Dental Fillings', '1500.00'),
(21, 'Dental Crowns', '1500.00'),
(22, 'Orthodontic Treatment', '800.00'),
(23, 'Dental Implants', '700.00');

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
(7, 'ew', 'ew', 'm', '2024-01-08', 'doc@ddd', '2024-01-12', '21321.00', 'candai', 'ew', '$2y$10$YDAd3Zld5EinQzHG1vRQqO/4AYjfO5aqImwlHdznQD4gXUbTPkJjC'),
(8, 'Angelyn', 'Angelyn', 'F', '2024-01-11', 'doc@ddd', '2024-01-18', '5000.00', 'candai', 'Angelyn', '$2y$10$K1KP0CoLdS56.ON4ez2EM.aX3ljkf6kR4K4v1fuUumDjgv6hRBqHO'),
(9, 'staf', 'staf', 's', '2024-01-19', 'staf@staf', '2024-01-11', '5000.00', 'candai', 'staf', '$2y$10$greKpRuAwrW00YfNDyo.r.EYzM9tfiVJ2h3xG/NyV4j2mK/8OyMBW'),
(10, 'ange', 'ange', 'a', '2024-01-21', 'doc@ddd', '2024-01-21', '5000.00', 'candai', 'ange', '$2y$10$hSYa4PAi30iLWg7uyPqIWucgmdUcWDPXZOou1.TRBdLtQZrKkiryS'),
(11, 'stap', 'stap', 's', '2024-01-19', 'ffddf@ddf', '2024-01-19', '5000.00', 'candai', 'stap', '$2y$10$yGCMWgU7IAbCuKLcbK62Nu1GotnpY64iAho68jrhYBOCIE.lJDh9a');

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
  `Action` varchar(1000) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`ProductID`, `Products`, `Category`, `Stocks`, `Sold`, `Remaining`, `Action`, `Price`) VALUES
(19, 'Mefenamic', 'treatment using fluoride gels or varnishes to strengthen teeth.', '0', '0', 0, 'Add', '100.00'),
(20, 'amoxicillin', 'to prevent infection.', '0', '0', 0, 'Add', '50.00'),
(21, 'Antibiotics', 'Best fit', '0', '0', 0, 'Add', '30.00'),
(22, 'Biogesic', 'sometimes mild pain relievers post-procedure.', '0', '0', 0, 'Add', '200.00'),
(23, 'paracetamol', 'containing peroxide.', '0', '0', 0, 'Add', '150.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(1, 'wrex', 'pats', 'a@a', '$2y$10$Rnyl/ZcX.IQ9Dr910IJSuehMKnijkPr9n79abmict70f2Fj6zr0H.', 'user'),
(2, 'ge', 'ge', 'ge@ge', '$2y$10$pNaeqzCX5C8caHdnBIj6/u0bHoYpAo8WjbookDuSSlS1xyko7pPqK', 'user'),
(3, 'nath', 'nath', 'nath@nath', '$2y$10$Ehrg0vFoldqZydZlUDhCruWl54KFeMN4BgTMBtiGoA8MhuBD6GGE6', 'user'),
(4, 'rex', 'rex@rex', 'rex@rex', '$2y$10$W5QPooPrph6dVM39OSCIVu3pNxYahGbCNYlI5ekoMSLU19HjGlH/m', 'user'),
(5, 'ange', 'ange', 'ange@ange', '$2y$10$f/Eb/ihLOyoJyb5sdJ1fxucTZhztNMauiR5TTBFYZFcrd6hcrC9Z2', 'user'),
(6, 'yo', 'yo', 'yo@yo', '$2y$10$RSN8D6rtcKkI9h2dnqTBKuVWSIUY25/lLZPT/so1c.8Hk/.lF6TVm', 'user');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff_app`
--
ALTER TABLE `staff_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
