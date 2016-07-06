-- phpMyAdmin SQL Dump
-- version 5.5.42
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: June 17, 2016 at 06:09 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0
--
-- Database: `poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(4) NOT NULL auto_increment,
  `name` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` VALUES (1, 'How Old Are You?');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL auto_increment,
  `pid` int(4) NOT NULL,
  `question` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `poll_qst` (`qst_id`, `qst`, `opt1`, `opt2`, `opt3`, `opt4`) VALUES
(1, 'Sample Question One', 'Option one of Question one', 'Option two of Question one', 'Option three of Question one', 'Option four of Question one'),
(2, 'Sample question two', 'Option one of Question two', 'Option two of Question two', 'Option three of Question two', 'Option four of Question two'),
(3, 'Sample Question Three', 'Option one of Question three', 'Option two of Question three', 'Option three of Question three', 'Option four of Question four'),
(4, 'Sample question four', 'Option one of Question four', 'Option two of Question four', 'Option three of Question four', 'Option four of Question four'),
(5, 'Sample Question Five', 'Option one of Question Five', 'Option two of Question Five', 'Option three of Question Five', 'Option four of Question Five'),
(6, 'Sample question Six', 'Option one of Question Six', 'Option two of Question Six', 'Option three of Question Six', 'Option four of Question Six'),
(7, 'Sample Question Seven', 'Option one of Question Seven', 'Option two of Question Seven', 'Option three of Question Seven', 'Option four of Question Seven'),
(8, 'Sample question Eight', 'Option one of Question Eight', 'Option two of Question Eight', 'Option three of Question Eight', 'Option four of Question Eight'),
(9, 'Sample Question Nine', 'Option one of Question Nine', 'Option two of Question Nine', 'Option three of Question Nine', 'Option four of Question Nine'),
(10, 'Sample question Ten', 'Option one of Question Ten', 'Option two of Question Ten', 'Option three of Question Ten', 'Option four of Question Ten');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` int(11) NOT NULL auto_increment,
  `qid` int(11) NOT NULL,
  `correct` int(1) NOT NULL,
  `num_sel` int(11) NULL,
  `answer` varchar(255) collate latin1_general_ci
  `ip` varchar(16) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `responses`
--
