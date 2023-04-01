-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 01:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `agency_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'agency'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`agency_id`, `name`, `email`, `password`, `phone`, `address`, `role`) VALUES
(5, 'Rohit agency', 'KRRAJRSR@GMAIL.COM', '$2y$10$CrppvBQXVkHvYjSAoDMXZ.1VgkRBgkJ6w1lav8JhFM.FJfv6qkr/u', '9999999999', 'test address', 'agency');

-- --------------------------------------------------------

--
-- Table structure for table `booked_cars`
--

CREATE TABLE `booked_cars` (
  `booking_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `num_days` int(11) NOT NULL,
  `booking_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked_cars`
--

INSERT INTO `booked_cars` (`booking_id`, `car_id`, `user_id`, `agency_id`, `start_date`, `num_days`, `booking_time`) VALUES
(28, 18, 17, 5, '2023-04-08', 10, '2023-03-30 07:52:08.046161'),
(29, 18, 17, 5, '2023-03-24', 8, '2023-03-30 08:10:31.048070'),
(30, 19, 17, 5, '2023-04-02', 2, '2023-03-30 08:14:32.194941'),
(31, 22, 17, 5, '2023-04-09', 1, '2023-03-30 08:15:09.475671'),
(32, 20, 17, 5, '2023-03-18', 1, '2023-03-30 09:23:34.252830');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `car_number` varchar(20) NOT NULL,
  `seating_capacity` int(11) NOT NULL,
  `rent_per_day` decimal(10,2) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `photo` varchar(255) NOT NULL DEFAULT 'C:\\xampp\\htdocs\\Car-Rental\\img\\'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `model`, `car_number`, `seating_capacity`, `rent_per_day`, `agency_id`, `status`, `photo`) VALUES
(18, 'Swift Dzire', 'DL 01 C 0001', 5, '9000.00', 5, 1, 'http://localhost/Car-Rental/img/swift.png'),
(19, 'Honda City', 'DL 01 C 1111', 4, '1200.00', 5, 1, 'http://localhost/Car-Rental/img/e.png'),
(20, 'Tata Zest', 'UP 16 1111', 4, '999.00', 5, 1, 'http://localhost/Car-Rental/img/a.png'),
(21, 'Honda Amaze', 'UP 16 L 5555', 4, '1297.00', 5, 1, 'http://localhost/Car-Rental/img/b.png'),
(22, 'Taza Nano', 'DL 01 C 0011', 4, '199.00', 5, 1, 'http://localhost/Car-Rental/img/d.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_submissions`
--

CREATE TABLE `contact_form_submissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form_submissions`
--

INSERT INTO `contact_form_submissions` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'hiii', 'Rohitrajrsr@gmail.com', 'test', '2023-03-30 10:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone`, `address`, `role`) VALUES
(17, 'Kumar Rohit Raj', 'KRRAJRSR@GMAIL.COM', '$2y$10$dicnrG/Z8inXFZAZXjNa5uAqmAmuybb9gpDKhDYQh..wQHHzydtKy', '9999999999', 'COLLECTORATE BUILDING', 'customer'),
(18, 'test5', 'test5@GMAIL.COM', '$2y$10$2TNOCgTEbx10nl1N98JitOrOmsaZ.wyd4WV07xw9.JoGxYYwXy..S', '9999999999', 'tugalpur', 'customer'),
(19, 'test5', 'test5@GMAIL.COM', '$2y$10$2TNOCgTEbx10nl1N98JitOrOmsaZ.wyd4WV07xw9.JoGxYYwXy..S', '9999999999', 'tugalpur', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`agency_id`);

--
-- Indexes for table `booked_cars`
--
ALTER TABLE `booked_cars`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `agency_id` (`agency_id`);

--
-- Indexes for table `contact_form_submissions`
--
ALTER TABLE `contact_form_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `agency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booked_cars`
--
ALTER TABLE `booked_cars`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contact_form_submissions`
--
ALTER TABLE `contact_form_submissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_cars`
--
ALTER TABLE `booked_cars`
  ADD CONSTRAINT `booked_cars_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `booked_cars_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`agency_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
