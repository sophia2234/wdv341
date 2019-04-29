-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2018 at 06:43 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdv341`
--

-- --------------------------------------------------------

--
-- Table structure for table `formatEvents_table`
--

CREATE TABLE `formatEvents_table` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_description` varchar(300) NOT NULL,
  `event_presenter` varchar(200) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formatEvents_table`
--

INSERT INTO `wdv341_events2` (`event_id`, `event_name`, `event_description`, `event_presenter`, `event_date`, `event_time`) VALUES
(1, 'Cocktail Party', 'party with cocktails ahlskdjflaskfd', 'Steve', '2018-10-25', '00:00:00'),
(2, 'Birthday Party for Nancy', 'Party with the gang for nancy. Food will provided and goes to 7', 'Dale', '2019-01-20', '00:00:00'),
(3, 'Fareway Grand Opening', 'Ribbon cutting for new fareway! Samples and coupons upon arrival!', 'Fareway Grocery', '2018-09-20', '00:00:00'),
(4, 'End of Finals Party', 'Finals is finally over! Come celebrate!', 'Every Student Ever', '2018-09-20', '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formatEvents_table`
--
ALTER TABLE `wdv341_events2`
  ADD PRIMARY KEY (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formatEvents_table`
--
ALTER TABLE `wdv341_events2`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
