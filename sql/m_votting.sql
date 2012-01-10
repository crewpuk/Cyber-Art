-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jan 10, 2012 at 05:48 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `cyberart`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `m_votting`
-- 

CREATE TABLE `m_votting` (
  `id` int(10) NOT NULL auto_increment,
  `nama` varchar(100) NOT NULL,
  `jml` bigint(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `m_votting`
-- 

INSERT INTO `m_votting` VALUES (1, 'Kuliah + Kerja', 3);
INSERT INTO `m_votting` VALUES (2, 'Kerja', 7);
INSERT INTO `m_votting` VALUES (3, 'Kuliah di PTN', 30);
INSERT INTO `m_votting` VALUES (4, 'Lain - lain', 5);
