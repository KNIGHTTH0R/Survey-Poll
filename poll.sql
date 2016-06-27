-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 11, 2008 at 06:09 PM
-- Server version: 5.0.33
-- PHP Version: 5.2.1
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
  `id` int(8) NOT NULL auto_increment,
  `pid` int(4) NOT NULL,
  `question` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `questions`
-- 

INSERT INTO `questions` VALUES (1, 1, '0 - 10');
INSERT INTO `questions` VALUES (2, 1, '11 - 20');
INSERT INTO `questions` VALUES (3, 1, '21 - 30');
INSERT INTO `questions` VALUES (4, 1, '31 - 40');
INSERT INTO `questions` VALUES (5, 1, '41 - 50');
INSERT INTO `questions` VALUES (6, 1, '51 - 60');
INSERT INTO `questions` VALUES (7, 1, 'Too Old!');

-- --------------------------------------------------------

-- 
-- Table structure for table `responses`
-- 

CREATE TABLE `responses` (
  `id` int(16) NOT NULL auto_increment,
  `qid` int(8) NOT NULL,
  `ip` varchar(16) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `responses`
-- 

