-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Waktu pembuatan: 28. Desember 2011 jam 22:17
-- Versi Server: 5.0.45
-- Versi PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `cyberart`
-- 

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_agenda`
-- 

CREATE TABLE `m_agenda` (
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `agenda` text NOT NULL,
  `tgl_agenda` varchar(55) NOT NULL,
  `tempat_agenda` varchar(55) NOT NULL,
  `waktu_agenda` varchar(55) NOT NULL,
  `pengirim` varchar(55) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data untuk tabel `m_agenda`
-- 


-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_contact_us`
-- 

CREATE TABLE `m_contact_us` (
  `id` int(5) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data untuk tabel `m_contact_us`
-- 


-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_download`
-- 

CREATE TABLE `m_download` (
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `doc` varchar(50) NOT NULL,
  `view` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data untuk tabel `m_download`
-- 


-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_komentar`
-- 

CREATE TABLE `m_komentar` (
  `id` int(5) NOT NULL auto_increment,
  `id_komentar` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data untuk tabel `m_komentar`
-- 


-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_posting`
-- 

CREATE TABLE `m_posting` (
  `id` int(10) NOT NULL auto_increment,
  `id_komentar` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `image` varchar(50) NOT NULL,
  `view` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data untuk tabel `m_posting`
-- 


-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_testimoni`
-- 

CREATE TABLE `m_testimoni` (
  `id` int(5) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data untuk tabel `m_testimoni`
-- 

