-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2016 at 07:17 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE IF NOT EXISTS `adminlogin` (
`ssn` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `contest_tips`
--

CREATE TABLE IF NOT EXISTS `contest_tips` (
  `ctip_id` varchar(10) NOT NULL,
  `cdt_entry` date NOT NULL,
  `cimage1` blob NOT NULL,
  `cimage2` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
  `photo_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `votetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lensqueen_tips`
--

CREATE TABLE IF NOT EXISTS `lensqueen_tips` (
  `ltip_id` varchar(2000) NOT NULL,
  `ldt_entry` date NOT NULL,
  `image1` blob NOT NULL,
  `image2` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lotest`
--

CREATE TABLE IF NOT EXISTS `lotest` (
  `phn` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
`photo_id` bigint(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `status` varchar(30) NOT NULL,
  `image` blob NOT NULL,
  `no_votes` bigint(10) NOT NULL,
  `desc` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
`ssn` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `midname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `pin_no` int(6) NOT NULL,
  `state` varchar(30) NOT NULL,
  `exp` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `suc_stories`
--

CREATE TABLE IF NOT EXISTS `suc_stories` (
  `suc_id` int(10) NOT NULL,
  `win_name` varchar(50) NOT NULL,
  `win_dt` date NOT NULL,
  `theme` varchar(50) NOT NULL,
  `event` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suc_story`
--

CREATE TABLE IF NOT EXISTS `suc_story` (
  `suc_id` varchar(20) NOT NULL,
  `win_name` varchar(60) NOT NULL,
  `win_dt` date NOT NULL,
  `event` varchar(100) NOT NULL,
  `theme` varchar(200) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `start_dt` date NOT NULL,
  `th_title` varchar(100) NOT NULL,
  `t_desc` varchar(100) NOT NULL,
  `th_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
 ADD PRIMARY KEY (`ssn`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
 ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
 ADD PRIMARY KEY (`ssn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
MODIFY `ssn` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
MODIFY `photo_id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
MODIFY `ssn` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `upload_user_photo` (
`user_id` int(11) NOT NULL,
`photo_id` int(11) NOT NULL);

CREATE TABLE `vote_user_photo` (
`user_id` int(11) NOT NULL,
`photo_id` int(11) NOT NULL);
