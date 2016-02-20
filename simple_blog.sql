-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2016 at 09:22 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simple_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `komentar` text NOT NULL,
  KEY `id` (`id`)
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

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `konten` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `konten`, `tanggal`) VALUES
(2, 'The odd thing that happens when injustice benefits you', 'Frans de Waal, a professor of primate behaviour at Emory University, is the unlikely star of a viral video. His academic''s physique, grey jumper and glasses aren''t the usual stuff of a YouTube sensation. But de Waal''s research with monkeys, and its implications for human nature, caught the imagination of millions of people.\nIt began with a TED talk in which de Waal showed the results of one experiment that involved paying two monkeys unequally (see video, below). Capuchin monkeys that lived together were taken to neighbouring cages and trained to hand over small stones in return for food rewards. The researchers found that a typical monkey would happily hand over stone after stone when it was rewarded for each exchange with a slice of cucumber.', '2014-11-11'),
(5, 'Mediterranean migrant crisis', 'Its Frontex border surveillance service will be strengthened and a military mandate sought to destroy people-smugglers'' boats. An emergency summit of EU leaders will be held on Thursday.\nAs the EU ministers met, fresh distress calls from migrant boats were received.\nThe crisis worsened at the weekend when hundreds of migrants were feared drowned as a boat capsized off Libya. The EU''s foreign policy chief, Federica Mogherini, said the 10-point package set out at talks in Luxembourg was a "strong reaction from the EU to the tragedies" and "shows a new sense of urgency and political will".\n"We are developing a truly European sense of solidarity in fighting human trafficking - finally so."', '2010-03-31'),
(26, 'Percobaan Kedua', 'Smoga', '2014-10-14');

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