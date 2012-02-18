-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Waktu pembuatan: 18. Februari 2012 jam 22:33
-- Versi Server: 5.0.45
-- Versi PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `cyberart`
-- 

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_admin`
-- 

CREATE TABLE `m_admin` (
  `id` int(5) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hit` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL default '1',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data untuk tabel `m_admin`
-- 

INSERT INTO `m_admin` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1');

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
  `status` enum('1','0') NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data untuk tabel `m_agenda`
-- 

INSERT INTO `m_agenda` VALUES (1, 'Sunatan', 'test123', '2012-02-02', 'Jakarta', '08.00', 'Admin', '2012-01-12', '1');
INSERT INTO `m_agenda` VALUES (2, 'Nikahan', 'test123123123', '2012-02-08', 'Bogor', '09.00', 'User', '2012-01-11', '1');

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
  `status` enum('1','0') NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data untuk tabel `m_contact_us`
-- 


-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_counter`
-- 

CREATE TABLE `m_counter` (
  `tgl` date NOT NULL,
  `ip` longtext NOT NULL,
  `hits` bigint(15) NOT NULL,
  PRIMARY KEY  (`tgl`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data untuk tabel `m_counter`
-- 

INSERT INTO `m_counter` VALUES ('2012-01-12', '127.0.0.1', 62);
INSERT INTO `m_counter` VALUES ('2012-01-13', '127.0.0.1', 4);
INSERT INTO `m_counter` VALUES ('2012-01-14', '127.0.0.1', 73);
INSERT INTO `m_counter` VALUES ('2012-01-15', '127.0.0.1', 62);
INSERT INTO `m_counter` VALUES ('2012-01-16', '127.0.0.1', 6);
INSERT INTO `m_counter` VALUES ('2012-01-19', '127.0.0.1', 4);
INSERT INTO `m_counter` VALUES ('2012-01-27', '127.0.0.1', 1);
INSERT INTO `m_counter` VALUES ('2012-01-28', '127.0.0.1', 0);
INSERT INTO `m_counter` VALUES ('2012-01-30', '127.0.0.1', 1);
INSERT INTO `m_counter` VALUES ('2012-02-09', '127.0.0.1|0.0.0.0', 120);
INSERT INTO `m_counter` VALUES ('2012-02-12', '0.0.0.0', 4);
INSERT INTO `m_counter` VALUES ('2012-02-14', '0.0.0.0', 7);
INSERT INTO `m_counter` VALUES ('2012-02-16', '0.0.0.0', 26);
INSERT INTO `m_counter` VALUES ('2012-02-17', '0.0.0.0', 14);
INSERT INTO `m_counter` VALUES ('2012-02-18', '0.0.0.0', 1);

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_download`
-- 

CREATE TABLE `m_download` (
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `doc` varchar(50) NOT NULL,
  `view` int(5) NOT NULL,
  `status` enum('1','0') NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Dumping data untuk tabel `m_download`
-- 

INSERT INTO `m_download` VALUES (1, 'Modul Pascal', 'Modul Pascal.pdf', 0, '1');
INSERT INTO `m_download` VALUES (2, 'Latihan', '1.doc', 1, '1');
INSERT INTO `m_download` VALUES (5, 'Proses Enkripsi', 'proses.odt', 1, '1');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_gallery`
-- 

CREATE TABLE `m_gallery` (
  `id_img` int(5) NOT NULL auto_increment,
  `nama_album` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `file` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('1','0') NOT NULL default '1',
  PRIMARY KEY  (`id_img`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Dumping data untuk tabel `m_gallery`
-- 

INSERT INTO `m_gallery` VALUES (1, 'album kenangan', 'album coba', 'feldy.jpg', 'hahahahahahahahahahahahahhahaha', '2012-01-09', '1');
INSERT INTO `m_gallery` VALUES (2, 'album kenangan', '2', 'rian.jpg', 'Rian Nugraha', '2012-01-11', '1');
INSERT INTO `m_gallery` VALUES (4, 'crewpuk', 'feldy', 'feldy.jpg', 'Feldy Yusuf', '2012-02-09', '1');
INSERT INTO `m_gallery` VALUES (5, 'crewpuk', 'rangga', 'rangga.jpg', 'Rangga Eka Putra', '2012-02-09', '1');
INSERT INTO `m_gallery` VALUES (6, 'janwari', 'janwari', 'janwari.jpg', 'Janwari Farqi Saptio', '2012-02-09', '1');
INSERT INTO `m_gallery` VALUES (7, 'a', 'sdasda', 'arya.jpg', 'sdasdasdsad', '2012-02-16', '1');
INSERT INTO `m_gallery` VALUES (8, 'a', 'rian.jpg', 'rian.jpg', 'rian.jpg', '2012-02-16', '1');
INSERT INTO `m_gallery` VALUES (9, 'a', 'rian.jpg', 'rian.jpg', 'rian.jpg', '2012-02-16', '1');
INSERT INTO `m_gallery` VALUES (10, 'rian.jpg', 'rian.jpg', 'rian.jpg', 'rian.jpg', '2012-02-23', '1');
INSERT INTO `m_gallery` VALUES (11, 'feldy.jpg', 'feldy.jpg', 'feldy.jpg', 'feldy.jpg', '2012-02-16', '1');
INSERT INTO `m_gallery` VALUES (12, 'rangga.jpg', 'rangga.jpg', 'rangga.jpg', 'rangga.jpg', '2012-02-16', '1');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_his`
-- 

CREATE TABLE `m_his` (
  `id` bigint(20) NOT NULL auto_increment,
  `ip` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time_u` bigint(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

-- 
-- Dumping data untuk tabel `m_his`
-- 

INSERT INTO `m_his` VALUES (1, '127.0.0.1', '2012-01-12', '21:09:28', 1326377367);
INSERT INTO `m_his` VALUES (2, '127.0.0.1', '2012-01-12', '21:26:55', 1326378415);
INSERT INTO `m_his` VALUES (3, '127.0.0.1', '2012-01-12', '21:34:11', 1326378851);
INSERT INTO `m_his` VALUES (4, '127.0.0.1', '2012-01-12', '21:40:26', 1326379226);
INSERT INTO `m_his` VALUES (5, '127.0.0.1', '2012-01-12', '21:59:55', 1326380395);
INSERT INTO `m_his` VALUES (6, '127.0.0.1', '2012-01-12', '22:05:45', 1326380745);
INSERT INTO `m_his` VALUES (7, '127.0.0.1', '2012-01-12', '22:13:22', 1326381202);
INSERT INTO `m_his` VALUES (8, '127.0.0.1', '2012-01-12', '22:19:56', 1326381596);
INSERT INTO `m_his` VALUES (9, '127.0.0.1', '2012-01-12', '22:28:11', 1326382091);
INSERT INTO `m_his` VALUES (10, '127.0.0.1', '2012-01-12', '23:23:06', 1326385386);
INSERT INTO `m_his` VALUES (11, '127.0.0.1', '2012-01-12', '23:28:18', 1326385698);
INSERT INTO `m_his` VALUES (12, '127.0.0.1', '2012-01-12', '23:43:06', 1326386586);
INSERT INTO `m_his` VALUES (13, '127.0.0.1', '2012-01-12', '23:51:12', 1326387072);
INSERT INTO `m_his` VALUES (14, '127.0.0.1', '2012-01-13', '00:17:58', 1326388678);
INSERT INTO `m_his` VALUES (15, '127.0.0.1', '2012-01-13', '00:23:19', 1326388999);
INSERT INTO `m_his` VALUES (16, '127.0.0.1', '2012-01-14', '06:40:57', 1326498057);
INSERT INTO `m_his` VALUES (17, '127.0.0.1', '2012-01-14', '08:56:33', 1326506193);
INSERT INTO `m_his` VALUES (18, '127.0.0.1', '2012-01-14', '09:02:11', 1326506531);
INSERT INTO `m_his` VALUES (19, '127.0.0.1', '2012-01-14', '09:08:11', 1326506891);
INSERT INTO `m_his` VALUES (20, '127.0.0.1', '2012-01-14', '09:16:25', 1326507385);
INSERT INTO `m_his` VALUES (21, '127.0.0.1', '2012-01-14', '09:22:48', 1326507768);
INSERT INTO `m_his` VALUES (22, '127.0.0.1', '2012-01-14', '09:48:31', 1326509311);
INSERT INTO `m_his` VALUES (23, '127.0.0.1', '2012-01-14', '09:53:49', 1326509629);
INSERT INTO `m_his` VALUES (24, '127.0.0.1', '2012-01-14', '10:01:19', 1326510079);
INSERT INTO `m_his` VALUES (25, '127.0.0.1', '2012-01-14', '10:07:02', 1326510422);
INSERT INTO `m_his` VALUES (26, '127.0.0.1', '2012-01-14', '10:19:01', 1326511141);
INSERT INTO `m_his` VALUES (27, '127.0.0.1', '2012-01-14', '10:25:14', 1326511514);
INSERT INTO `m_his` VALUES (28, '127.0.0.1', '2012-01-14', '10:32:21', 1326511941);
INSERT INTO `m_his` VALUES (29, '127.0.0.1', '2012-01-14', '10:38:20', 1326512300);
INSERT INTO `m_his` VALUES (30, '127.0.0.1', '2012-01-14', '22:52:56', 1326556376);
INSERT INTO `m_his` VALUES (31, '127.0.0.1', '2012-01-14', '23:35:25', 1326558925);
INSERT INTO `m_his` VALUES (32, '127.0.0.1', '2012-01-15', '00:21:02', 1326561661);
INSERT INTO `m_his` VALUES (33, '127.0.0.1', '2012-01-15', '00:27:00', 1326562020);
INSERT INTO `m_his` VALUES (34, '127.0.0.1', '2012-01-15', '00:34:03', 1326562443);
INSERT INTO `m_his` VALUES (35, '127.0.0.1', '2012-01-15', '00:43:10', 1326562990);
INSERT INTO `m_his` VALUES (36, '127.0.0.1', '2012-01-15', '05:41:39', 1326580899);
INSERT INTO `m_his` VALUES (37, '127.0.0.1', '2012-01-15', '05:48:31', 1326581311);
INSERT INTO `m_his` VALUES (38, '127.0.0.1', '2012-01-15', '06:08:45', 1326582525);
INSERT INTO `m_his` VALUES (39, '127.0.0.1', '2012-01-15', '06:15:59', 1326582959);
INSERT INTO `m_his` VALUES (40, '127.0.0.1', '2012-01-15', '06:21:31', 1326583291);
INSERT INTO `m_his` VALUES (41, '127.0.0.1', '2012-01-15', '06:37:40', 1326584260);
INSERT INTO `m_his` VALUES (42, '127.0.0.1', '2012-01-15', '06:48:57', 1326584937);
INSERT INTO `m_his` VALUES (43, '127.0.0.1', '2012-01-15', '06:54:28', 1326585268);
INSERT INTO `m_his` VALUES (44, '127.0.0.1', '2012-01-15', '07:00:32', 1326585632);
INSERT INTO `m_his` VALUES (45, '127.0.0.1', '2012-01-15', '07:05:40', 1326585940);
INSERT INTO `m_his` VALUES (46, '127.0.0.1', '2012-01-15', '07:11:19', 1326586279);
INSERT INTO `m_his` VALUES (47, '127.0.0.1', '2012-01-15', '08:50:10', 1326592210);
INSERT INTO `m_his` VALUES (48, '127.0.0.1', '2012-01-15', '09:54:32', 1326596072);
INSERT INTO `m_his` VALUES (49, '127.0.0.1', '2012-01-15', '14:40:02', 1326613202);
INSERT INTO `m_his` VALUES (50, '127.0.0.1', '2012-01-16', '09:38:18', 1326681498);
INSERT INTO `m_his` VALUES (51, '127.0.0.1', '2012-01-16', '09:43:23', 1326681803);
INSERT INTO `m_his` VALUES (52, '127.0.0.1', '2012-01-19', '09:17:01', 1326939421);
INSERT INTO `m_his` VALUES (53, '127.0.0.1', '2012-01-19', '13:26:46', 1326954406);
INSERT INTO `m_his` VALUES (54, '127.0.0.1', '2012-01-27', '16:15:29', 1327655729);
INSERT INTO `m_his` VALUES (55, '127.0.0.1', '2012-01-30', '07:58:09', 1327885089);
INSERT INTO `m_his` VALUES (56, '127.0.0.1', '2012-02-09', '09:31:10', 1328754670);
INSERT INTO `m_his` VALUES (57, '127.0.0.1', '2012-02-09', '09:36:28', 1328754988);
INSERT INTO `m_his` VALUES (58, '127.0.0.1', '2012-02-09', '10:09:46', 1328756986);
INSERT INTO `m_his` VALUES (59, '127.0.0.1', '2012-02-09', '10:14:56', 1328757296);
INSERT INTO `m_his` VALUES (60, '127.0.0.1', '2012-02-09', '10:31:51', 1328758311);
INSERT INTO `m_his` VALUES (61, '127.0.0.1', '2012-02-09', '10:55:31', 1328759731);
INSERT INTO `m_his` VALUES (62, '127.0.0.1', '2012-02-09', '11:00:42', 1328760042);
INSERT INTO `m_his` VALUES (63, '127.0.0.1', '2012-02-09', '11:08:45', 1328760525);
INSERT INTO `m_his` VALUES (64, '127.0.0.1', '2012-02-09', '11:14:03', 1328760843);
INSERT INTO `m_his` VALUES (65, '127.0.0.1', '2012-02-09', '11:28:32', 1328761712);
INSERT INTO `m_his` VALUES (66, '127.0.0.1', '2012-02-09', '11:34:57', 1328762097);
INSERT INTO `m_his` VALUES (67, '127.0.0.1', '2012-02-09', '11:44:07', 1328762647);
INSERT INTO `m_his` VALUES (68, '127.0.0.1', '2012-02-09', '12:06:57', 1328764017);
INSERT INTO `m_his` VALUES (69, '127.0.0.1', '2012-02-09', '12:13:35', 1328764415);
INSERT INTO `m_his` VALUES (70, '127.0.0.1', '2012-02-09', '12:18:47', 1328764727);
INSERT INTO `m_his` VALUES (71, '127.0.0.1', '2012-02-09', '14:24:06', 1328772246);
INSERT INTO `m_his` VALUES (72, '127.0.0.1', '2012-02-09', '14:31:01', 1328772661);
INSERT INTO `m_his` VALUES (73, '127.0.0.1', '2012-02-09', '14:48:25', 1328773705);
INSERT INTO `m_his` VALUES (74, '127.0.0.1', '2012-02-09', '15:03:30', 1328774610);
INSERT INTO `m_his` VALUES (75, '127.0.0.1', '2012-02-09', '15:50:33', 1328777433);
INSERT INTO `m_his` VALUES (76, '127.0.0.1', '2012-02-09', '16:36:29', 1328780189);
INSERT INTO `m_his` VALUES (77, '127.0.0.1', '2012-02-09', '16:41:50', 1328780510);
INSERT INTO `m_his` VALUES (78, '127.0.0.1', '2012-02-09', '17:06:08', 1328781968);
INSERT INTO `m_his` VALUES (79, '0.0.0.0', '2012-02-09', '19:54:54', 1328792094);
INSERT INTO `m_his` VALUES (80, '0.0.0.0', '2012-02-09', '20:15:28', 1328793328);
INSERT INTO `m_his` VALUES (81, '0.0.0.0', '2012-02-09', '20:33:47', 1328794427);
INSERT INTO `m_his` VALUES (82, '0.0.0.0', '2012-02-09', '20:48:04', 1328795284);
INSERT INTO `m_his` VALUES (83, '0.0.0.0', '2012-02-09', '20:57:15', 1328795835);
INSERT INTO `m_his` VALUES (84, '0.0.0.0', '2012-02-09', '21:04:19', 1328796259);
INSERT INTO `m_his` VALUES (85, '0.0.0.0', '2012-02-09', '21:09:29', 1328796569);
INSERT INTO `m_his` VALUES (86, '0.0.0.0', '2012-02-09', '21:15:44', 1328796944);
INSERT INTO `m_his` VALUES (87, '0.0.0.0', '2012-02-09', '21:23:17', 1328797397);
INSERT INTO `m_his` VALUES (88, '0.0.0.0', '2012-02-12', '05:50:32', 1329000632);
INSERT INTO `m_his` VALUES (89, '0.0.0.0', '2012-02-12', '06:17:49', 1329002269);
INSERT INTO `m_his` VALUES (90, '0.0.0.0', '2012-02-14', '20:14:27', 1329225267);
INSERT INTO `m_his` VALUES (91, '0.0.0.0', '2012-02-16', '20:36:46', 1329399406);
INSERT INTO `m_his` VALUES (92, '0.0.0.0', '2012-02-16', '21:11:23', 1329401483);
INSERT INTO `m_his` VALUES (93, '0.0.0.0', '2012-02-16', '21:17:12', 1329401832);
INSERT INTO `m_his` VALUES (94, '0.0.0.0', '2012-02-16', '21:22:20', 1329402140);
INSERT INTO `m_his` VALUES (95, '0.0.0.0', '2012-02-16', '21:29:10', 1329402550);
INSERT INTO `m_his` VALUES (96, '0.0.0.0', '2012-02-16', '21:34:13', 1329402853);
INSERT INTO `m_his` VALUES (97, '0.0.0.0', '2012-02-16', '21:57:30', 1329404250);
INSERT INTO `m_his` VALUES (98, '0.0.0.0', '2012-02-16', '22:07:08', 1329404828);
INSERT INTO `m_his` VALUES (99, '0.0.0.0', '2012-02-17', '07:45:50', 1329439550);
INSERT INTO `m_his` VALUES (100, '0.0.0.0', '2012-02-17', '08:58:28', 1329443908);
INSERT INTO `m_his` VALUES (101, '0.0.0.0', '2012-02-17', '09:04:42', 1329444282);
INSERT INTO `m_his` VALUES (102, '0.0.0.0', '2012-02-17', '10:27:32', 1329449252);
INSERT INTO `m_his` VALUES (103, '0.0.0.0', '2012-02-17', '19:22:16', 1329481336);
INSERT INTO `m_his` VALUES (104, '0.0.0.0', '2012-02-17', '21:04:27', 1329487467);
INSERT INTO `m_his` VALUES (105, '0.0.0.0', '2012-02-18', '06:57:46', 1329523066);

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
  `status` enum('1','0') NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data untuk tabel `m_komentar`
-- 

INSERT INTO `m_komentar` VALUES (1, 1, 'Arya', 'http://aryakusuma.co.cc/', 'Kalo SEO di co.cc apa masih berlaku ya..?', '2012-01-12', '1');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_navigation_menu`
-- 

CREATE TABLE `m_navigation_menu` (
  `id` int(5) NOT NULL auto_increment,
  `id_parent` int(5) NOT NULL default '0',
  `title` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Dumping data untuk tabel `m_navigation_menu`
-- 

INSERT INTO `m_navigation_menu` VALUES (1, 0, 'Beranda', '[main]', '1');
INSERT INTO `m_navigation_menu` VALUES (2, 0, 'Galeri', '[home]gallery', '1');
INSERT INTO `m_navigation_menu` VALUES (3, 0, 'Profil', '#', '1');
INSERT INTO `m_navigation_menu` VALUES (4, 0, 'Program Studi', '#', '1');
INSERT INTO `m_navigation_menu` VALUES (5, 0, 'Pendaftaran Online', '#', '1');
INSERT INTO `m_navigation_menu` VALUES (6, 3, 'Cyber-Art', '#', '1');
INSERT INTO `m_navigation_menu` VALUES (7, 4, 'Web Design', '#', '1');
INSERT INTO `m_navigation_menu` VALUES (8, 4, 'Jaringan', '#', '1');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_posting`
-- 

CREATE TABLE `m_posting` (
  `id` int(10) NOT NULL auto_increment,
  `tanggal` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `image` varchar(150) default NULL,
  `view` int(5) NOT NULL,
  `status` enum('1','0') NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- 
-- Dumping data untuk tabel `m_posting`
-- 

INSERT INTO `m_posting` VALUES (2, '2011-12-29', 'Membasmi Virus Sality', 'Tulisan kali ini judulnya mungkin agak sadis ya, tapi pemilihan judul kali ini didasari karena kejengkelan dengan penemuan virus di komputer kantor yang saya gunakan sehari-hari. Virus apakah itu? Yap sesuai judul tulisan diatas, virus yang saya temukan dan dideteksi anti virus Smadav dan AVG yg terpasang di komputer saya adalah Sality, tepatnya Sality.101.\r\nNah yang membuat jengkel lagi adalah ternyata kedua antivirus yg saya gunakan hanya dapat menghapus ketika virus terdeteksi dan tidak memperbaiki registry dan autorun.inf yang diinfeksi virus ini, akibatnya saya harus mengutak-atik registry secara manual. Oleh karena itu saya mencari alternatif penyembuhan alternatif lain, tapi yang jelas bukan dukun ya. \r\nSetelah browsing sana-sini, akhirnya saya mendapati sebuah alternatif penyembuhan yang sudah saya buktikan efektif mengatasi Sality.101, nama aplikasi tersebut adalah Salitykiller (cocok kan namanya sebagai pembunuh gratisan?)  . Aplikasi keluaran Kaspersky Lab ini mencari dan memperbaiki file yang terinfeksi dengan lebih baik.\r\nCara penggunaannya juga sangat mudah, tinggal di ekstrak, kemudian jalankan Salitykiller.exe yang terdapat didalamnya, selanjutnya biarkan aplikasi ini bekerja hingga semua komponen registry dan file di-scan dengan sempurna dan secara otomatis akan diperbaiki oleh antivirus ini.\r\n\r\nSumber : http://bangdanu.wordpress.com', 'Artikel', 'salitykiller.jpg', 4, '1');
INSERT INTO `m_posting` VALUES (3, '2012-02-18', 'Arya Kusuma', 'au dah tuh si Arya yg buat.wwkwkwkwk', 'Artkel', '43303527_55554827_9399.jpg', 0, '0');
INSERT INTO `m_posting` VALUES (4, '2012-02-14', 'Arya Kusuma', 'au dah tuh si Arya yg buat.wwkwkwkwk', 'Artkel', 'crewpukLogoJadi.png', 1, '1');
INSERT INTO `m_posting` VALUES (5, '2012-02-14', 'rian', 'ee', 'rian', 'gambar.jpg', 0, '0');
INSERT INTO `m_posting` VALUES (6, '2012-02-14', 'judul', 'isi', 'artikel', NULL, 0, '1');
INSERT INTO `m_posting` VALUES (7, '2012-02-14', 'sdjaskdj', 'dsajkdas', 'dsjkadlas', NULL, 0, '1');
INSERT INTO `m_posting` VALUES (8, '2012-02-17', 'jsdjksjd', 'djslkjdlaj', 'dsjkadjalskj', NULL, 0, '1');
INSERT INTO `m_posting` VALUES (9, '2012-02-14', 'rianr', 'rianr', 'rianr', NULL, 0, '1');
INSERT INTO `m_posting` VALUES (10, '2012-02-14', 'a', 'a', 'a', NULL, 0, '0');
INSERT INTO `m_posting` VALUES (11, '2012-02-14', 'sas', 'sdasd', 'dsad', NULL, 0, '0');
INSERT INTO `m_posting` VALUES (12, '2012-02-14', 'knknknknknknknknknk', 'kknkknkknkkn', 'kknkknkknkknkkn', '406258_341142615896311_100000017276307_1410053_173', 0, '1');
INSERT INTO `m_posting` VALUES (13, '2012-02-14', 'knknknknknknknknknk', 'kknkknkknkkn', 'kknkknkknkknkkn', '406258_341142615896311_100000017276307_1410053_173', 0, '1');
INSERT INTO `m_posting` VALUES (14, '2012-02-14', 'knknknknknknknknknk', 'kknkknkknkkn', 'kknkknkknkknkkn', '406258_341142615896311_100000017276307_1410053_173', 0, '1');
INSERT INTO `m_posting` VALUES (15, '2012-02-14', 'knknknknknknknknknk', 'kknkknkknkkn', 'kknkknkknkknkkn', '406258_341142615896311_100000017276307_1410053_173', 0, '1');
INSERT INTO `m_posting` VALUES (16, '2012-02-14', 'Arya Kusuma', 'bau', 'apek', '406258_341142615896311_100000017276307_1410053_173', 0, '0');
INSERT INTO `m_posting` VALUES (17, '2012-02-14', 'jiijijijijij', 'ng', 'krak', 'Koala.jpg', 0, '1');
INSERT INTO `m_posting` VALUES (18, '2012-02-14', 'jiijijijijij', 'ng', 'krak', 'Koala.jpg', 0, '1');
INSERT INTO `m_posting` VALUES (19, '2012-02-14', 'jiijijijijij', 'ng', 'krak', 'Koala.jpg', 0, '1');
INSERT INTO `m_posting` VALUES (20, '2012-02-14', 'jiijijijijij', 'ng', 'krak', 'Koala.jpg', 0, '1');
INSERT INTO `m_posting` VALUES (21, '2012-02-14', 'jiijijijijij', 'ng', 'krak', 'Koala.jpg', 0, '1');
INSERT INTO `m_posting` VALUES (22, '2012-02-14', 'jiijijijijij', 'ng', 'krak', 'Koala.jpg', 0, '1');
INSERT INTO `m_posting` VALUES (23, '2012-02-14', 'jiijijijijij', 'ng', 'krak', 'Koala.jpg', 0, '1');
INSERT INTO `m_posting` VALUES (24, '2012-02-14', 'jiijijijijij', 'ng', 'krak', 'Koala.jpg', 0, '1');
INSERT INTO `m_posting` VALUES (25, '2012-02-17', 'ghjkjhjk', 'dgfdfgdgfdgfd', 'Artikel', '406258_341142615896311_100000017276307_1410053_173', 0, '0');
INSERT INTO `m_posting` VALUES (26, '2012-02-17', 'Rian coba', 'haiiii', 'Artikel', NULL, 0, '1');
INSERT INTO `m_posting` VALUES (28, '2012-02-17', 'Rian', 'rian', 'Artikel', '35423736_85898663_8187.jpg', 0, '1');
INSERT INTO `m_posting` VALUES (27, '2012-02-17', 'Rian', 'haii', 'Artikel', '86652765_58571354_0212.jpg', 0, '1');
INSERT INTO `m_posting` VALUES (29, '2012-02-17', 'jiijijijijijs', 'ngs', 'kraks', '40142381_91465170_4393.jpg', 0, '1');
INSERT INTO `m_posting` VALUES (30, '2012-02-17', 'jiijijijijijs', 'ngs', 'kraks', '79753450_44434667_8444.', 0, '1');
INSERT INTO `m_posting` VALUES (31, '2012-02-17', 'jiijijijijijs', 'ngs', 'kraks', '10148606_60496502_4839.', 0, '1');
INSERT INTO `m_posting` VALUES (32, '2012-02-17', 'jiijijijijijsss', 'ngsss', 'kraksss', '89933594_12404350_5218.jpg', 0, '1');
INSERT INTO `m_posting` VALUES (33, '2012-02-17', 'jiijijijijijsi', 'ngsi', 'kraksi', '44013364_47230556_6014.jpg', 0, '1');
INSERT INTO `m_posting` VALUES (34, '2012-02-17', 'jiijijijijijsiao', 'ngsiao', 'kraksiao', '59726162_03249949_8541.jpg', 0, '1');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_shoutbox`
-- 

CREATE TABLE `m_shoutbox` (
  `id` int(10) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `url` varchar(150) NOT NULL,
  `pesan` varchar(500) NOT NULL,
  `time_stamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `status` enum('1','0') NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data untuk tabel `m_shoutbox`
-- 

INSERT INTO `m_shoutbox` VALUES (1, 'rian', 'rian.com', 'hai', '2012-01-14 07:18:19', '1');
INSERT INTO `m_shoutbox` VALUES (2, 'aaa', 'eee', 'hello:):(:]:D;)', '2012-01-14 09:25:47', '1');
INSERT INTO `m_shoutbox` VALUES (3, 'rian', 'rianrian', 'rian', '2012-01-14 10:09:22', '1');
INSERT INTO `m_shoutbox` VALUES (4, 'a', 'http://www.a.a', 'a', '2012-01-14 10:11:28', '1');

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
  `status` enum('1','0') NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Dumping data untuk tabel `m_testimoni`
-- 

INSERT INTO `m_testimoni` VALUES (1, 'Rian Nugraha', 'Guru', 'Dengan saya mengajar di Cyber Art Revolution, semakin menambah pengalaman saya...', 'rian.jpg', '2011-12-30', '1');
INSERT INTO `m_testimoni` VALUES (2, 'Feldy Yusuf', 'Programmer Artivisi', 'Sebuah CV yang cukup bagus dalam bidang TI...', 'feldy.jpg', '2011-12-30', '1');
INSERT INTO `m_testimoni` VALUES (3, 'Janwari Farqi S.', 'Programmer Gandsoft', 'Sistem pengajaran yang unik...', 'janwari.jpg', '2011-12-30', '1');
INSERT INTO `m_testimoni` VALUES (4, 'Arya Kusuma', 'Pelajar SMK 1 Depok', 'Dengan belajar disini, saya jadi semakin percaya diri...', 'arya.jpg', '2011-12-30', '1');
INSERT INTO `m_testimoni` VALUES (5, 'Rangga Eka P.', 'Programmer Artivisi', 'Seru juga belajar disini !', 'rangga.jpg', '2011-12-30', '1');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `m_votting`
-- 

CREATE TABLE `m_votting` (
  `id` int(10) NOT NULL auto_increment,
  `nama` varchar(100) NOT NULL,
  `jml` bigint(15) NOT NULL,
  `status` enum('1','0') NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data untuk tabel `m_votting`
-- 

INSERT INTO `m_votting` VALUES (1, 'Kuliah + Kerja', 3, '1');
INSERT INTO `m_votting` VALUES (2, 'Kerja', 7, '1');
INSERT INTO `m_votting` VALUES (3, 'Kuliah di PTN', 30, '1');
INSERT INTO `m_votting` VALUES (4, 'Lain - lain', 5, '1');
