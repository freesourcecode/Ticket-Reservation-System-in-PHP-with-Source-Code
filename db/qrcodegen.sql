-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 06:02 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qrcodegen`
--

-- --------------------------------------------------------

--
-- Table structure for table `pref_event`
--

CREATE TABLE IF NOT EXISTS `pref_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pref_event`
--

INSERT INTO `pref_event` (`event_id`, `event_title`, `event_date`, `event_venue`) VALUES
(1, 'DINAGYANG 2019', 'December 28, 2019', 'Iloilo City');

-- --------------------------------------------------------

--
-- Table structure for table `pref_seat`
--

CREATE TABLE IF NOT EXISTS `pref_seat` (
  `prefSeat_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `area_prefix` varchar(15) NOT NULL,
  `max_seat` varchar(11) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `ticket_price` varchar(11) NOT NULL,
  `currentNum` int(11) NOT NULL,
  PRIMARY KEY (`prefSeat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pref_seat`
--

INSERT INTO `pref_seat` (`prefSeat_id`, `event_id`, `area_prefix`, `max_seat`, `desc`, `ticket_price`, `currentNum`) VALUES
(1, 1, 'VP', '100', 'Very Important Person', '500', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sold_tickets`
--

CREATE TABLE IF NOT EXISTS `sold_tickets` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `qr_img` varchar(255) NOT NULL,
  `qr_code` varchar(55) NOT NULL,
  `clientLName` varchar(255) NOT NULL,
  `clientFName` varchar(255) NOT NULL,
  `clientContNum` varchar(13) NOT NULL,
  `event_id` int(11) NOT NULL,
  `prefSeat_id` int(11) NOT NULL,
  `trans_date` varchar(10) NOT NULL,
  `trans_time` varchar(15) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sold_tickets`
--

INSERT INTO `sold_tickets` (`trans_id`, `qr_img`, `qr_code`, `clientLName`, `clientFName`, `clientContNum`, `event_id`, `prefSeat_id`, `trans_date`, `trans_time`) VALUES
(1, 'temp/VP-1_3aad61fa90eff2c28d3e3c6462b0bd46.png', 'VP-1', 'Magtolis', 'Emilio', '09303546547', 1, 1, '11/27/2019', '09:32:17 AM'),
(2, 'temp/VP-2_28031f43c8becd213b473657a5c6e8ec.png', 'VP-2', 'Test', 'Test', '0930xxxxxxx', 1, 1, '09/03/2020', '10:59:19 PM'),
(3, 'temp/VP-3_33c0bb842560ca3d41175a2943ee5134.png', 'VP-3', 'John', 'Doe', '09091234567', 1, 1, '09/03/2020', '11:12:49 PM');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE IF NOT EXISTS `useraccounts` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `access` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`user_id`, `reg_id`, `lname`, `fname`, `username`, `password`, `access`, `status`) VALUES
(1, 0, 'Magtolis', 'Emiloi', 'emiloi', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
