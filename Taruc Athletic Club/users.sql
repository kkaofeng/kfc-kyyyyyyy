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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usertype` varchar(50) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`, `date`, `usertype`, `image`) VALUES
('20ABC01234', 'zahir', 'qwerty', 'zahir@gmail.com', '2021-09-01 11:44:57', 'admin', '20210901-612f6796ccadb.jpeg'),
('20CBA04321', 'user', 'qwerty', 'user@gmail.com', '2021-09-02 15:14:55', 'user', ''),
('20QWE09876', 'kaofengUser', 'qwerty', 'kfuser@gmail.com', '2021-09-06 11:52:30', 'user', ''),
('20WMD03791', 'kinnhoe', 'qwerty', 'kinnhoe@gmail.com', '2021-09-09 10:13:41', 'user', ''),
('20WMD03808', 'admin', 'qwerty', 'admin@gmail.com', '2021-09-01 11:44:42', 'admin', '20210901-612f66683f88c.jpg'),
('20WMD03809', 'kaofeng', 'qwerty', 'kaofeng@gmail.com', '2021-09-01 11:44:47', 'admin', '20210901-612f66af35dc8.jpg'),
('20WMD03875', 'weisheng', 'qwerty', 'weisheng@gmail.com', '2021-09-09 10:00:45', 'user', ''),
('20WMD03879', 'jingseng', 'qwerty', 'jingseng@gmail.com', '2021-09-09 09:05:31', 'admin', '20210909-6139ce5b477ab.jpeg'),
('20WMD03887', 'jiahon', 'qwerty', 'jiahon@gmail.com', '2021-09-08 06:18:26', 'user', ''),
('20WMD03890', 'weikeong', 'qwerty', 'weikeong@gmail.com', '2021-09-09 10:03:01', 'user', ''),
('20WMD03989', 'Bryan Hee', 'qwerty', 'bryanhee@gmail.com', '2021-09-09 09:58:33', 'user', ''),
('20WMD03999', 'lingcong', 'qwerty', 'lingcong@gmail.com', '2021-09-09 09:38:25', 'user', ''),
('20WMD04021', 'yuhang', 'qwerty', 'yuhang@gmail.com', '2021-09-09 09:49:38', 'user', ''),
('20WMD04070', 'zhongliang', 'qwerty', 'zhongliang@gmail.com', '2021-09-09 10:15:17', 'user', ''),
('20WMD04072', 'malcus', 'qwerty', 'malcus@gmail.com', '2021-09-09 10:11:57', 'user', ''),
('20WMD04074', 'eugene', 'qwerty', 'eugene@gmail.com', '2021-09-09 10:05:01', 'user', ''),
('20WMD04089', 'shiket', 'qwerty', 'shiket@gmail.com', '2021-09-09 10:10:23', 'user', ''),
('20WMD04096', 'tengjie', 'qwerty', 'tengjie@gmail.com', '2021-09-09 10:06:50', 'user', ''),
('20WMD04149', 'joyce', 'qwerty', 'joyce@gmail.com', '2021-09-09 09:31:39', 'user', ''),
('20WMD04162', 'jiajun', 'qwerty', 'jiajun@gmail.com', '2021-09-09 09:14:59', 'user', ''),
('20WMD04168', 'hooiseng', 'qwerty', 'hooiseng', '2021-09-09 10:08:39', 'user', ''),
('20WMD04182', 'Zi Cheng ', 'qwerty', 'zicheng@gmail.com', '2021-09-09 08:46:06', 'user', ''),
('20WMD12345', 'mingyeu', 'qwerty', 'mingyeu@gmail.com', '2021-09-10 12:32:34', 'user', ''),
('20WMD76543', 'tan kao feng', '123', 'tankaofeng@gmail.com', '2021-09-11 08:04:58', 'user', ''),
('20WMD87654', 'tankaofeng', 'qwerty', 'tankaofeng@gmail.com', '2021-09-11 07:44:07', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
