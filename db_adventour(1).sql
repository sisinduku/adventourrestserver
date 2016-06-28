-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2016 at 01:05 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_adventour`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activities`
--

CREATE TABLE IF NOT EXISTS `tbl_activities` (
  `id_activities` int(11) NOT NULL,
  `id_traveljournal` int(11) NOT NULL,
  `cat_activities` enum('Airline','Transportation','Attraction','Hostelry','Culinary') NOT NULL,
  `title_activities` varchar(128) NOT NULL,
  `budget` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_activities`
--

INSERT INTO `tbl_activities` (`id_activities`, `id_traveljournal`, `cat_activities`, `title_activities`, `budget`) VALUES
(1, 1, 'Airline', 'Garuda Indonesia', 500000),
(2, 1, 'Hostelry', 'H0001', 700000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hostelry`
--

CREATE TABLE IF NOT EXISTS `tbl_hostelry` (
  `id_hotel` varchar(32) NOT NULL,
  `name_hotel` varchar(128) NOT NULL,
  `location` point NOT NULL,
  `rating` decimal(10,0) unsigned NOT NULL,
  `popularity` decimal(10,0) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hostelry`
--

INSERT INTO `tbl_hostelry` (`id_hotel`, `name_hotel`, `location`, `rating`, `popularity`) VALUES
('H0001', 'Paragon Semarang', '\0\0\0\0\0\0\0\0\0\0\0\0\0Y@\0\0\0\0\0t@', '8', '7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_traveljournal`
--

CREATE TABLE IF NOT EXISTS `tbl_traveljournal` (
  `id_traveljournal` varchar(64) NOT NULL,
  `id_user` varchar(32) NOT NULL,
  `id_layout` int(11) NOT NULL,
  `orign` varchar(128) NOT NULL,
  `date_orign` date NOT NULL,
  `destination` varchar(128) NOT NULL,
  `date_return` date NOT NULL,
  `link_gambar` varchar(128) NOT NULL,
  `date_created` date NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_ip` varchar(16) NOT NULL,
  `last_location` point DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_traveljournal`
--

INSERT INTO `tbl_traveljournal` (`id_traveljournal`, `id_user`, `id_layout`, `orign`, `date_orign`, `destination`, `date_return`, `link_gambar`, `date_created`, `time_stamp`, `last_ip`, `last_location`) VALUES
('7e0e09d658bc4f63f793015dad600d80c921b2b7', '100', 88, 'Banten', '2016-06-01', 'Semarang', '2016-06-01', 'assets/uploads/traveljournal/cover/cdec0d40929b36c9713375e1270a53bdac624858.png', '2016-06-17', '2016-06-17 15:06:06', '127.0.0.1', '\0\0\0\0\0\0\0\0\0\0\0\0\0Y@\0\0\0\0\0€[@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  ADD PRIMARY KEY (`id_activities`);

--
-- Indexes for table `tbl_hostelry`
--
ALTER TABLE `tbl_hostelry`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indexes for table `tbl_traveljournal`
--
ALTER TABLE `tbl_traveljournal`
  ADD PRIMARY KEY (`id_traveljournal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  MODIFY `id_activities` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
