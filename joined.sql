-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 11:19 AM
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
-- Table structure for table `joined`
--

CREATE TABLE `joined` (
  `eventj_id` varchar(10) NOT NULL,
  `eventj_name` char(30) NOT NULL,
  `eventj_date` char(30) NOT NULL,
  `userj_id` varchar(11) NOT NULL,
  `userj_name` varchar(50) NOT NULL,
  `userj_email` varchar(50) NOT NULL,
  `contact_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joined`
--

INSERT INTO `joined` (`eventj_id`, `eventj_name`, `eventj_date`, `userj_id`, `userj_name`, `userj_email`, `contact_no`) VALUES
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD04182', 'Zi Cheng ', 'zicheng@gmail.com', 123688337),
('106', 'Jumping', '2021-09-25 8:30:00', '20WMD04182', 'Zi Cheng ', 'zicheng@gmail.com', 123688337),
('107', 'Throwing sports', '2021-09-24 10:45:00', '20WMD04162', 'jiajun', 'jiajun@gmail.com', 103682885),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD04162', 'jiajun', 'jiajun@gmail.com', 103682885),
('102', 'Middle Distance', '2021-09-23 11:30:00', '20WMD04162', 'jiajun', 'jiajun@gmail.com', 103682885),
('105', 'Relays', '2021-09-24 12:00:00', '20QWE09876', 'kaofengUser', 'kfuser@gmail.com', 1126650286),
('104', 'Hurdles', '2021-09-26 10:45:00', '20QWE09876', 'kaofengUser', 'kfuser@gmail.com', 1126650286),
('108', 'Marathon', '2021-09-27 8:30:00', '20QWE09876', 'kaofengUser', 'kfuser@gmail.com', 1126650286),
('105', 'Relays', '2021-09-24 12:00:00', '20WMD03887', 'jiahon', 'jiahon@gmail.com', 146166273),
('104', 'Hurdles', '2021-09-26 10:45:00', '20WMD03887', 'jiahon', 'jiahon@gmail.com', 146166273),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD03887', 'jiahon', 'jiahon@gmail.com', 146166273),
('101', 'Sprints', '2021-09-23 10:45:00', '20WMD04149', 'joyce', 'joyce@gmail.com', 173812980),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD04149', 'joyce', 'joyce@gmail.com', 173812980),
('103', 'Long Distance', '2021-09-24 9:30:00', '20WMD04149', 'joyce', 'joyce@gmail.com', 173812980),
('101', 'Sprints', '2021-09-23 10:45:00', '20WMD03999', 'lingcong', 'lingcong@gmail.com', 1124216540),
('107', 'Throwing sports', '2021-09-24 10:45:00', '20WMD03999', 'lingcong', 'lingcong@gmail.com', 1124216540),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD03999', 'lingcong', 'lingcong@gmail.com', 1124216540),
('106', 'Jumping', '2021-09-25 8:30:00', '20WMD04021', 'yuhang', 'yuhang@gmail.com', 1119871342),
('101', 'Sprints', '2021-09-23 10:45:00', '20WMD04021', 'yuhang', 'yuhang@gmail.com', 1119871342),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD04021', 'yuhang', 'yuhang@gmail.com', 1119871342),
('107', 'Throwing sports', '2021-09-24 10:45:00', '20WMD04021', 'yuhang', 'yuhang@gmail.com', 1119871342),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD03989', 'Bryan Hee', 'bryanhee@gmail.com', 146339916),
('107', 'Throwing sports', '2021-09-24 10:45:00', '20WMD03989', 'Bryan Hee', 'bryanhee@gmail.com', 146339916),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD03875', 'weisheng', 'weisheng@gmail.com', 169147738),
('101', 'Sprints', '2021-09-23 10:45:00', '20WMD03875', 'weisheng', 'weisheng@gmail.com', 169147738),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD03890', 'weikeong', 'weikeong@gmail.com', 162570604),
('102', 'Middle Distance', '2021-09-23 11:30:00', '20WMD03890', 'weikeong', 'weikeong@gmail.com', 162570604),
('103', 'Long Distance', '2021-09-24 9:30:00', '20WMD03890', 'weikeong', 'weikeong@gmail.com', 162570604),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD04074', 'eugene', 'eugene@gmail.com', 183657736),
('104', 'Hurdles', '2021-09-26 10:45:00', '20WMD04074', 'eugene', 'eugene@gmail.com', 183657736),
('105', 'Relays', '2021-09-24 12:00:00', '20WMD04074', 'eugene', 'eugene@gmail.com', 183657736),
('106', 'Jumping', '2021-09-25 8:30:00', '20WMD04074', 'eugene', 'eugene@gmail.com', 183657736),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD04096', 'tengjie', 'tengjie@gmail.com', 105035646),
('105', 'Relays', '2021-09-24 12:00:00', '20WMD04096', 'tengjie', 'tengjie@gmail.com', 105035646),
('103', 'Long Distance', '2021-09-24 9:30:00', '20WMD04096', 'tengjie', 'tengjie@gmail.com', 105035646),
('102', 'Middle Distance', '2021-09-23 11:30:00', '20WMD04096', 'tengjie', 'tengjie@gmail.com', 105035646),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD04168', 'hooiseng', 'hooiseng@gmail.com', 1110789007),
('106', 'Jumping', '2021-09-25 8:30:00', '20WMD04168', 'hooiseng', 'hooiseng@gmail.com', 1110789007),
('107', 'Throwing sports', '2021-09-24 10:45:00', '20WMD04168', 'hooiseng', 'hooiseng@gmail.com', 1110789007),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD04089', 'shiket', 'shiket@gmail.com', 193898198),
('104', 'Hurdles', '2021-09-26 10:45:00', '20WMD04089', 'shiket', 'shiket@gmail.com', 193898198),
('105', 'Relays', '2021-09-24 12:00:00', '20WMD04089', 'shiket', 'shiket@gmail.com', 193898198),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD04072', 'malcus', 'malcus@gmail.com', 146544167),
('104', 'Hurdles', '2021-09-26 10:45:00', '20WMD04072', 'malcus', 'malcus@gmail.com', 146544167),
('105', 'Relays', '2021-09-24 12:00:00', '20WMD04072', 'malcus', 'malcus@gmail.com', 146544167),
('102', 'Middle Distance', '2021-09-23 11:30:00', '20WMD04072', 'malcus', 'malcus@gmail.com', 146544167),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD03791', 'kinnhoe', 'kinnhoe@gmail.com', 122290893),
('105', 'Relays', '2021-09-24 12:00:00', '20WMD03791', 'kinnhoe', 'kinnhoe@gmail.com', 122290893),
('104', 'Hurdles', '2021-09-26 10:45:00', '20WMD03791', 'kinnhoe', 'kinnhoe@gmail.com', 122290893),
('106', 'Jumping', '2021-09-25 8:30:00', '20WMD03791', 'kinnhoe', 'kinnhoe@gmail.com', 122290893),
('108', 'Marathon', '2021-09-27 8:30:00', '20WMD04070', 'zhongliang', 'zhongliang@gmail.com', 1123328156),
('103', 'Long Distance', '2021-09-24 9:30:00', '20WMD04070', 'zhongliang', 'zhongliang@gmail.com', 1123328156),
('102', 'Middle Distance', '2021-09-23 11:30:00', '20WMD04070', 'zhongliang', 'zhongliang@gmail.com', 1123328156),
('105', 'Relays', '2021-09-24 12:00:00', '20WMD04070', 'zhongliang', 'zhongliang@gmail.com', 1123328156),
('105', 'Relays', '2021-09-24 12:00:00', '20WMD04070', 'zhongliang', 'zhongliang@gmail.com', 1123328156),
('104', 'Hurdles', '2021-09-26 10:45:00', '20WMD04070', 'zhongliang', 'zhongliang@gmail.com', 1123328156),
('102', 'Middle Distance', '2021-09-23 11:30:00', '20WMD12345', 'mingyeu', 'mingyeu@gmail.com', 123456789),
('101', 'Sprints', '2021-09-23 10:45:00', '20CBA04321', 'user', 'user@gmail.com', 1126650286),
('101', 'Sprints', '2021-09-23 10:45:00', '20CBA04321', 'user', 'user@gmail.com', 1126650286),
('101', 'Sprints', '2021-09-23 10:45:00', '20CBA04321', 'user', 'user@gmail.com', 1126650286),
('101', 'Sprints', '2021-09-23 10:45:00', '20CBA04321', 'user', 'user@gmail.com', 1126650286);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
