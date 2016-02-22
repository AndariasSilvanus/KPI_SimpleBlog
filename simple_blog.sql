-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2016 at 03:07 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `nama`, `email`, `tanggal`, `komentar`) VALUES
(5, 'Andarias Silvanus', 'asilvanus5@gmail.com', '0000-00-00', 'In my opinion, Mediterranian is one of boder surveillance service which is one of the top of the world. ');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(250) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `konten` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `konten`, `tanggal`) VALUES
(2, 'The odd thing that happens when injustice benefits you', 'Frans de Waal, a professor of primate behaviour at Emory University, is the unlikely star of a viral video. His academic''s physique, grey jumper and glasses aren''t the usual stuff of a YouTube sensation. But de Waal''s research with monkeys, and its implications for human nature, caught the imagination of millions of people.\nIt began with a TED talk in which de Waal showed the results of one experiment that involved paying two monkeys unequally (see video, below). Capuchin monkeys that lived together were taken to neighbouring cages and trained to hand over small stones in return for food rewards. The researchers found that a typical monkey would happily hand over stone after stone when it was rewarded for each exchange with a slice of cucumber.', '2014-11-11'),
(5, 'Mediterranean migrant crisis', 'Its Frontex border surveillance service will be strengthened and a military mandate sought to destroy people-smugglers'' boats. An emergency summit of EU leaders will be held on Thursday.\nAs the EU ministers met, fresh distress calls from migrant boats were received.\nThe crisis worsened at the weekend when hundreds of migrants were feared drowned as a boat capsized off Libya. The EU''s foreign policy chief, Federica Mogherini, said the 10-point package set out at talks in Luxembourg was a "strong reaction from the EU to the tragedies" and "shows a new sense of urgency and political will".\n"We are developing a truly European sense of solidarity in fighting human trafficking - finally so."', '2010-03-31'),
(26, 'Percobaan Kedua', 'Smoga', '2014-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`) VALUES
('andarias', '4fd006026e86abea4bc064454e935f220f27f9bf191c0e640c1cabd18098a181', 'anda@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD KEY `id` (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id`) REFERENCES `post` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
