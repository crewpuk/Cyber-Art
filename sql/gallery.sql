-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jan 09, 2012 at 11:27 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `cyber-art`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `m_gallery`
-- 

CREATE TABLE `m_gallery` (
  `id_img` int(5) NOT NULL auto_increment,
  `nama_album` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `file` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY  (`id_img`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `m_gallery`
-- 

INSERT INTO `m_gallery` VALUES (1, 'album kenangan', 'album coba', 'arya.jpg', 'hahahahahahahahahahahahahhahaha', '2012-01-09');
INSERT INTO `m_gallery` VALUES (2, '1', '2', 'rian.jpg', 'Rian Nugraha', '2012-01-11');
INSERT INTO `m_gallery` VALUES (3, '1', '2', 'janwari.jpg', 'j4nwar1', '2012-01-20');
