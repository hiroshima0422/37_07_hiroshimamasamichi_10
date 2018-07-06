-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018 年 7 朁E07 日 01:11
-- サーバのバージョン： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `error_data`
--

CREATE TABLE `error_data` (
  `code` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `error_Code` int(11) NOT NULL,
  `error_Message` varchar(200) NOT NULL,
  `error_File` varchar(200) NOT NULL,
  `error_Line` int(11) NOT NULL,
  `error` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `error_data`
--

INSERT INTO `error_data` (`code`, `date`, `error_Code`, `error_Message`, `error_File`, `error_Line`, `error`) VALUES
(269, '2018-07-07 03:15:46', 2, 'strlen() expects parameter 1 to be string, array given', '/home/users/0/whitesnow.jp-hiroshima/web/tamapura/index.php', 19, 'ErrorException: strlen() expects parameter 1 to be string, array given in /home/users/0/whitesnow.jp-hiroshima/web/tamapura/index.php:19\nStack trace:\n#0 /home/users/0/whitesnow.jp-hiroshima/web/tamapura/index.php(19): {closure}(2, \'strlen() expect...\', \'/home/users/0/w...\', 19, Array)\n#1 {main}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `error_data`
--
ALTER TABLE `error_data`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `error_data`
--
ALTER TABLE `error_data`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
