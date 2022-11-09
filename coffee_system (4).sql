-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 02:57 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `current_rate`
--

CREATE TABLE `current_rate` (
  `id` int(11) NOT NULL,
  `rate` float NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(11) NOT NULL,
  `factory_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty_delivered` float NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `factory_id`, `farmer_id`, `item_id`, `qty_delivered`, `date`) VALUES
(4, 19, 10, 12, 25, '2022-11-07 12:19:20'),
(5, 19, 9, 13, 30, '2022-11-07 12:19:37'),
(6, 20, 9, 14, 101, '2022-11-07 12:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `factory_manager`
--

CREATE TABLE `factory_manager` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `society_id` int(11) NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factory_manager`
--

INSERT INTO `factory_manager` (`id`, `first_name`, `last_name`, `username`, `password`, `society_id`, `date_joined`) VALUES
(3, 'Johnnn', 'Doe', 'Manager1', 'df1b1df104abf071c1494bba8aee42b7', 19, '2022-11-07 14:34:09'),
(4, 'Jane', 'Doe', 'Manager2', 'df1b1df104abf071c1494bba8aee42b7', 20, '2022-11-07 14:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `member_number` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `bank_number` int(11) NOT NULL,
  `open_amount` float NOT NULL,
  `society_id` int(11) NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`id`, `first_name`, `last_name`, `phone_number`, `member_number`, `location`, `bank_number`, `open_amount`, `society_id`, `date_joined`) VALUES
(9, 'John', 'Doe', '0712345678', 234, 'Karatina', 437893, 546, 19, '2022-11-07 12:15:49'),
(10, 'Jane', 'Doe', '0712345678', 9000, 'Marwa', 458322, 546, 20, '2022-11-07 12:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `unit` int(11) NOT NULL,
  `unit_of_measurement` varchar(40) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `unit`, `unit_of_measurement`, `date`) VALUES
(12, 'Cherry Grade I', 34, 'Kgs', '2022-11-07 12:17:55'),
(13, 'Mbuni', 38, 'Kgs', '2022-11-07 12:18:07'),
(14, 'Cherry Grade II', 23, 'Kgs', '2022-11-07 12:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_repayment`
--

CREATE TABLE `loan_repayment` (
  `id` int(11) NOT NULL,
  `loan_transaction_id` int(11) NOT NULL,
  `amount_paid` float NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_transaction`
--

CREATE TABLE `loan_transaction` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `expected_payment_date` date NOT NULL,
  `loan_status` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `society`
--

CREATE TABLE `society` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `number` int(11) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `location` varchar(200) NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `society`
--

INSERT INTO `society` (`id`, `name`, `number`, `phone_number`, `location`, `date_joined`) VALUES
(19, 'Nyeri Society', 3743, '', '', '2022-11-07 12:14:36'),
(20, 'Scotter Society', 9008, '', '', '2022-11-07 12:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `date_joined`) VALUES
(3, 'User1', 'John', 'Doe', 'abc@gmail.com', 'df1b1df104abf071c1494bba8aee42b7', '2022-11-02 05:47:13'),
(4, 'User2', 'Jane', 'Doe', 'xyz@gmail.com', 'df1b1df104abf071c1494bba8aee42b7', '2022-11-02 06:30:25'),
(5, 'User3', 'Joe', 'Doe', 'abc@gmail.com', 'df1b1df104abf071c1494bba8aee42b7', '2022-11-02 19:51:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_rate`
--
ALTER TABLE `current_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factory_id` (`factory_id`),
  ADD KEY `deliveries_ibfk_2` (`farmer_id`),
  ADD KEY `deliveries_ibfk_3` (`item_id`);

--
-- Indexes for table `factory_manager`
--
ALTER TABLE `factory_manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `society_id` (`society_id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_number` (`member_number`),
  ADD KEY `society_id` (`society_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_repayment`
--
ALTER TABLE `loan_repayment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_repayment_ibfk_1` (`loan_transaction_id`);

--
-- Indexes for table `loan_transaction`
--
ALTER TABLE `loan_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_transaction_ibfk_1` (`farmer_id`),
  ADD KEY `loan_transaction_ibfk_2` (`loan_id`);

--
-- Indexes for table `society`
--
ALTER TABLE `society`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `current_rate`
--
ALTER TABLE `current_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `factory_manager`
--
ALTER TABLE `factory_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loan_repayment`
--
ALTER TABLE `loan_repayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loan_transaction`
--
ALTER TABLE `loan_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `society`
--
ALTER TABLE `society`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`factory_id`) REFERENCES `society` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deliveries_ibfk_2` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deliveries_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `factory_manager`
--
ALTER TABLE `factory_manager`
  ADD CONSTRAINT `factory_manager_ibfk_1` FOREIGN KEY (`society_id`) REFERENCES `society` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farmer`
--
ALTER TABLE `farmer`
  ADD CONSTRAINT `farmer_ibfk_1` FOREIGN KEY (`society_id`) REFERENCES `society` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_repayment`
--
ALTER TABLE `loan_repayment`
  ADD CONSTRAINT `loan_repayment_ibfk_1` FOREIGN KEY (`loan_transaction_id`) REFERENCES `loan_transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_transaction`
--
ALTER TABLE `loan_transaction`
  ADD CONSTRAINT `loan_transaction_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_transaction_ibfk_2` FOREIGN KEY (`loan_id`) REFERENCES `loan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
