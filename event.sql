-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 11:20 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(10) NOT NULL,
  `event_image` varchar(100) NOT NULL,
  `event_name` char(30) NOT NULL,
  `event_date` char(30) NOT NULL,
  `event_seat` int(11) NOT NULL,
  `current_seat` int(11) NOT NULL,
  `event_detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_image`, `event_name`, `event_date`, `event_seat`, `current_seat`, `event_detail`) VALUES
(102, '20210904-6133af5fc71da.png', 'Middle Distance', '2021-09-23 11:30:00', 8, 7, 'Races that range in distance from 800 metres (roughly one-half mile) to 3,000 metres (almost 2 miles) .'),
(103, '20210904-6133b836c9de5.png', 'Long Distance', '2021-09-24 9:30:00', 8, 5, 'Footraces ranging from 3,000 metres through 10,000, 20,000, and 30,000 metres and up to the marathon .'),
(104, '20210904-6133b8e7226c8.png', 'Hurdles', '2021-09-26 10:45:00', 16, 7, 'A track and field sport which involves running and jumping over obstacles at speed .'),
(105, '20210904-6133ded2ccfc3.png', 'Relays', '2021-09-24 12:00:00', 16, 9, 'Track-and-field sport consisting of a set number of stages (legs), usually four, each leg run by a different member of a team .'),
(106, '20210904-6133e5ebb9172.png', 'Jumping', '2021-09-25 8:30:00', 12, 5, 'The main disciplines of track and field jumping activities are high jump, long jump, triple jump, pole vault, and hurdling .'),
(107, '20210905-613463b026654.png', 'Throwing sports', '2021-09-24 10:45:00', 12, 6, 'Physical, human competitions where the outcome is measured by ability of players to throw an object .'),
(108, '20210905-61347a232ed6d.png', 'Marathon', '2021-09-27 8:30:00', 200, 17, 'Long-distance foot race with a distance of 42.195 kilometres (26 miles 385 yards), usually run as a road race, but the distance can be covered on trail routes .');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD UNIQUE KEY `event_id` (`event_id`),
  ADD UNIQUE KEY `event_name` (`event_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
