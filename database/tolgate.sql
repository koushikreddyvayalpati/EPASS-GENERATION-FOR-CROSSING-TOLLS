-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 02:39 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tolgate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(200) NOT NULL,
  `username` varchar(400) NOT NULL,
  `password` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tolgate_detail`
--

CREATE TABLE `tolgate_detail` (
  `id` int(200) NOT NULL,
  `tolgate_name` varchar(500) NOT NULL,
  `tolgate_address` varchar(500) NOT NULL,
  `bus_fare` varchar(500) NOT NULL,
  `truck` varchar(500) NOT NULL,
  `Upto_3_Axle_Vehicle` varchar(500) NOT NULL,
  `car` varchar(500) NOT NULL,
  `above_3_axle_vehile` varchar(500) NOT NULL,
  `tolgate_list_id` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tolgate_detail`
--

INSERT INTO `tolgate_detail` (`id`, `tolgate_name`, `tolgate_address`, `bus_fare`, `truck`, `Upto_3_Axle_Vehicle`, `car`, `above_3_axle_vehile`, `tolgate_list_id`) VALUES
(1, 'Chengalpattu Tolgate', 'Near paranur railway station', '100', '150', '200', '50', '200', '1'),
(2, 'Melmaruvathur', 'Near melmaruvathur Bus stand', '40', '50', '70', '20', '100', '1'),
(3, 'Vikravandi', 'Near suriya college', '30', '60', '90', '150', '200', '1'),
(4, 'Marakkanam', 'aunanthai', '50', '70', '90', '30', '150', '2'),
(5, 'Pims', 'Pondichrry', '100', '150', '200', '250', '300', '2'),
(6, 'chengalpattu', 'near kanchipuram', '40', '50', '60', '35', '45', '3'),
(7, 'ullundurpettai', 'ullundurpettai', '45', '67', '45', '77', '88', '3'),
(8, 'melmaruvathur', 'near temple', '34', '56', '56', '8', '98', '3'),
(9, 'villupuram', 'vilupuram', '12', '45', '66', '65', '67', '3'),
(10, 'trichy', 'trichy', '34', '45', '56', '67', '78', '3'),
(11, 'Bhd', 'Kaks', '50', '70', '30', '80', '50', '4'),
(12, 'Bhd', 'Kaks', '80', '50', '50', '20', '70', '4'),
(13, 'Hsh', 'Hdh', '10', '30', '20', '40', '60', '4'),
(14, 'Kdj', 'Hsj', '60', '30', '20', '10', '70', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tolgate_list`
--

CREATE TABLE `tolgate_list` (
  `id` int(200) NOT NULL,
  `sources` varchar(500) NOT NULL,
  `destination` varchar(500) NOT NULL,
  `no_of_tolgate` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tolgate_list`
--

INSERT INTO `tolgate_list` (`id`, `sources`, `destination`, `no_of_tolgate`) VALUES
(1, 'Chennai', 'Madurai', '3'),
(2, 'Chennai', 'Pondicherry', '1'),
(3, 'chennai', 'trichy', '5'),
(4, 'Chennai ', 'Salem', '4'),
(5, 'CHENNAI', 'TRICHY', '1');

-- --------------------------------------------------------

--
-- Table structure for table `travel_distances`
--

CREATE TABLE `travel_distances` (
  `id` int(200) NOT NULL,
  `tolgate_name` varchar(500) NOT NULL,
  `tolgate_id` varchar(500) NOT NULL,
  `payment_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_distances`
--

INSERT INTO `travel_distances` (`id`, `tolgate_name`, `tolgate_id`, `payment_id`) VALUES
(1, 'Chengalpattu Tolgate', '1', '10'),
(22, 'Bhd', '4', '10'),
(23, 'Hsh', '4', '10'),
(24, 'Kdj', '4', '10'),
(34, 'Chengalpattu Tolgate', '1', '4'),
(35, 'Chengalpattu Tolgate', '1', '1'),
(36, 'Melmaruvathur', '1', '1'),
(37, 'Vikravandi', '1', '1'),
(38, 'Marakkanam', '2', '11'),
(39, 'Chengalpattu Tolgate', '1', '13'),
(40, 'Melmaruvathur', '1', '13'),
(41, 'chengalpattu', '3', '14'),
(42, 'ullundurpettai', '3', '14'),
(43, 'Chengalpattu Tolgate', '1', '15'),
(44, 'Melmaruvathur', '1', '15'),
(45, 'Vikravandi', '1', '15'),
(46, 'chengalpattu', '3', '16'),
(47, 'ullundurpettai', '3', '16'),
(48, 'melmaruvathur', '3', '16'),
(49, 'villupuram', '3', '16'),
(50, 'trichy', '3', '16'),
(51, 'Chengalpattu Tolgate', '1', '18'),
(52, 'Melmaruvathur', '1', '18');

-- --------------------------------------------------------

--
-- Table structure for table `travel_history`
--

CREATE TABLE `travel_history` (
  `id` int(200) NOT NULL,
  `sources_location` varchar(500) NOT NULL,
  `destination_location` varchar(500) NOT NULL,
  `type_of_vechile` varchar(500) NOT NULL,
  `vehicle_number` varchar(500) NOT NULL,
  `journey_date` varchar(500) NOT NULL,
  `no_of_tolgate` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `paid_status` varchar(500) NOT NULL,
  `type_of_payment` varchar(500) NOT NULL,
  `user_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_history`
--

INSERT INTO `travel_history` (`id`, `sources_location`, `destination_location`, `type_of_vechile`, `vehicle_number`, `journey_date`, `no_of_tolgate`, `amount`, `paid_status`, `type_of_payment`, `user_id`) VALUES
(1, 'Chennai', 'Madurai', 'Car', '', '27-Dec-2018', '3', '220', 'Paid', 'freecharge', '1'),
(2, 'Chennai', 'Pondicherry', 'Car', '', '20-Dec-2018', '2', '280', 'Paid', 'Paytm', '2'),
(3, 'Chennai', 'Madurai', 'Truck', '', '24-Dec-2018', '', '', '', '', '2'),
(4, 'Chennai', 'Madurai', 'Bus', '', '10-Jan-2019', '3', '170', 'Paid', 'Airtel-Payment-Bank', '1'),
(5, 'Chennai', 'Pondicherry', 'Truck', '', '31-Dec-2018', '', '', '', '', '1'),
(6, 'Chennai', 'Madurai', 'Car', '', '30-Dec-2018', '', '', '', '', '1'),
(7, 'Chennai', 'trichy', 'Car', '', '10-Jan-2019', '', '', '', '', '1'),
(8, 'Chennai', 'trichy', 'Car', '', '18-Jan-2019', '', '', '', '', '1'),
(9, 'Chennai', 'Madurai', 'Bus', '', '30-Jan-2019', '3', '170', 'Paid', 'Credit-card', '3'),
(10, 'Chennai', 'Salem', 'Bus', 'TN78', '20-Feb-2019', '4', '200', 'Paid', 'Paytm', '1'),
(11, 'Chennai', 'Pondicherry', 'Upto 3 Axle Vehicle', 'TN88', '20-Feb-2019', '1', '90', 'Paid', 'freecharge', '1'),
(12, 'Chennai', 'Pondicherry', 'Car', '', '07-Feb-2019', '1', '30', 'Paid', 'Debit-card', '4'),
(13, 'Chennai', 'Madurai', 'Car', '7893', '13-Feb-2019', '3', '220', 'Paid', 'Debit-card', '4'),
(14, 'Chennai', 'trichy', 'Car', '7893', '07-Feb-2019', '5', '252', 'Paid', 'Debit-card', '4'),
(15, 'Chennai', 'Madurai', 'Bus', 'TN88', '20-Feb-2019', '3', '170', 'Paid', 'ola-money', '1'),
(16, 'Chennai', 'trichy', 'Car', '0023', '22-Feb-2019', '5', '252', 'Paid', 'Paytm', '5'),
(17, 'Chennai', 'Madurai', 'Car', 'TN88', '21-Feb-2019', '3', '', '', '', '1'),
(18, 'Chennai', 'Madurai', 'Car', '55', '19-Mar-2019', '3', '220', 'Paid', 'Paytm', '1'),
(19, 'Chennai', 'Madurai', 'Car', '55', '27-Mar-2019', '3', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `e_mail` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `e_mail`, `phone`, `password`) VALUES
(1, 'Mani', 'Kandan', 'mailtomani93@rediffmail.com', '8883141504', '123456'),
(4, 'jamema', 'begam', 'jam@gmail.com', '97342134120', 'password'),
(5, 'lokesh', 'rc', 'lokkeh001@gmail.com', '8056278529', 'lokkesh123'),
(6, 'Akon', 'sha', 'akon@mail.com', '888888888', '123');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details2`
--

CREATE TABLE `vehicle_details2` (
  `id` int(200) NOT NULL,
  `vehicle_name` varchar(500) NOT NULL,
  `vehicle_number` varchar(500) NOT NULL,
  `type-of-vechile` varchar(300) NOT NULL,
  `user_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_details2`
--

INSERT INTO `vehicle_details2` (`id`, `vehicle_name`, `vehicle_number`, `type-of-vechile`, `user_id`) VALUES
(1, 'maruthi', 'TN88', 'Truck', '1'),
(2, 'Maruthi', 'TN78', '', '1'),
(4, 'BMW', 'TN66', '', '2'),
(5, 'swift', '7893', '', '4'),
(6, 'tvs', '0023', '', '5'),
(7, 'TN05', '55', 'Car', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tolgate_detail`
--
ALTER TABLE `tolgate_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tolgate_list`
--
ALTER TABLE `tolgate_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_distances`
--
ALTER TABLE `travel_distances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_history`
--
ALTER TABLE `travel_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `e_mail` (`e_mail`);

--
-- Indexes for table `vehicle_details2`
--
ALTER TABLE `vehicle_details2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tolgate_detail`
--
ALTER TABLE `tolgate_detail`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tolgate_list`
--
ALTER TABLE `tolgate_list`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `travel_distances`
--
ALTER TABLE `travel_distances`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `travel_history`
--
ALTER TABLE `travel_history`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vehicle_details2`
--
ALTER TABLE `vehicle_details2`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
