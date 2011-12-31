-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 30, 2011 at 03:12 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `cyberart`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `m_agenda`
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
-- Dumping data for table `m_agenda`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `m_contact_us`
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
-- Dumping data for table `m_contact_us`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `m_download`
-- 

CREATE TABLE `m_download` (
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `doc` varchar(50) NOT NULL,
  `view` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `m_download`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `m_komentar`
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
-- Dumping data for table `m_komentar`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `m_posting`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `m_posting`
-- 

INSERT INTO `m_posting` VALUES (1, 0, '2011-12-29', 'Advance Blogging', 'Pada Postingan kali ini, saya mau sedikit share tentang advanced blog yang pernah saya sharing juga melalui talkshow di Radio Trijaya FM beberapa waktu yang lalu. Semoga berguna. \r\nA. Sekilas tentang blog\r\nBlog adalah kependekan dari Weblog, istilah yang pertama kali digunakan oleh Jorn Barger pada bulan Desember 1997. menggunakan istilah Weblog untuk menyebut kelompok website pribadi yang selalu diupdate secara kontinyu dan berisi link-link ke website lain yang mereka anggap menarik disertai dengan komentar-komentar mereka sendiri. Secara garis besar, Weblog dapat dirangkum sebagai mini website pribadi yang memungkinkan para pembuatnya menampilkan berbagai jenis isi pada web dengan mudah, seperti karya tulis, kumpulan link internet, dokumen-dokumen (file-file Word,PDF,dll), gambar ataupun multimedia.\r\nB. Jenis-Jenis Blog\r\nSama seperti media pada umumnya, informasi yang dimuat dalam sebuah blog biasanya mengambil topik tertentu sebagai pokok bahasan, ada beberapa jenis blog menurut isi/konten yang terdapat didalamnya, antara lain: Blog politik, Blog pribadi, Blog kesehatan, Blog sastra, Blog perjalanan, Blog riset, Blog hukum, Blog media, Blog pendidikan, Blog bisnis dan sebagainya.\r\nC. Manfaat Blog secara umum\r\nKnowledge Sharing. Blog bisa menjadi sangat bermanfaat jika diisi dengan knowledge-knowledge yang bermanfaat buat orang banyak. Dengan blog, semua orang bisa dengan mudah mengeksternalisasikan knowledge yang dimilikinya ke publik. Sehingga dengan begitu knowledge yang dimilikinya itu bisa dishare ke orang lain dan menjadi bermanfaat buat orang yang membutuhkannya.\r\nBridge Blogging. Blog dapat dimanfaatkan sebagai jembatan informasi untuk menggambarkan kondisi suatu negara dalam bahasa global (seperti Inggris), sehingga dapat menjembatani orang lain untuk mendapat informasi dengan lebih akurat.\r\nGround Voice, Suara Akar Rumput. Dengan blog, orang dapat dengan leluasa menuliskan pendapatnya tentang suatu hal. Opini-opini yang muncul kemudian bisa menjadi sebuah opini yang kuat yang mampu menunjukkan bagaimana sebenarnya pendapat masyarakat tentang suatu hal.\r\nIdea Incubation. Biasanya jika seseorang mempunyai suatu ide, ide tersebut tidak langsung direalisasikan. biasanya ide yang muncul dalam otaknya terpendam sekian lama untuk proses pematangan ide. seiring berjalannya waktu, dia akan menambahkan konsep-konsep pelengkap dari idenya itu dalam tulisan/blog.\r\nMedia Bisnis. Selain digunakan untuk kepentingan personal, blog juga dapat digunakan sebagai media untuk menjembatani suatu kegiatan bisnis (blog bisnis) atau mendapatkan penghasilan tambahan.\r\nD. Advance Blog\r\nAdvance Blog sendiri tidak lain merupakan suatu upaya untuk menjadikan sebuah blog memiliki fungsi yang lebih komplit dibanding blog standard baik dalam fungsi kolaborasi seperti fitur komentar, shoutbox maupun dalam hal tampilan. Advance Blog biasa juga dikenal dengan istilah Profesional Blog.\r\nE. Aspek Penting dari Advance Blog\r\nUntuk membuat Blog menjadi lebih advance/profesional, beberapa aspek yang perlu diperhatikan adalah:\r\n1. Tampilan, sebuah blog akan terlihat tidak biasa/lebih advance terutama dipengaruhi oleh tampilannya yang tidak biasa/standard.\r\n2. Tema, menentukan tema tertentu untuk dibahas dalam blog akan membuat blog lebih spesifik dalam menyampaikan informasi.\r\n3. Isi Blog, selain tampilan, kualitas isi tulisan maupun informasi dalam sebuah blog sangat mempengaruhi tingkat kunjungan blog yang bersangkutan.\r\n4. Fitur, sebuah blog akan terlihat lebih advance jika didalamnya terdapat fitur-fitur pendukung yang dapat membuat blog menjadi lebih menarik dan interaktif.\r\n5. SEO(Search Engine Optimation), populer tidaknya suatu blog juga dipengaruhi oleh cara kita mengenalkan blog pada mesin pencari(seperti google, yahoo atau bing).\r\nF. Langkah-langkah membuat Advance Blog\r\nUntuk menjadikan sebuah blog menjadi lebih advance, beberapa langkahnya antara lain:\r\n1. Kualitas Tampilan. Untuk membuat blog menjadi lebih advance kita dapat mulai dengan memperbaharui/update tampilan/template/themes yang menarik untuk blog kita, hal ini dapat dilakukan dengan mencari template gratis melalui internet atau dengan memperbaiki/menambahkan template yang sudah ada (dibutuhkan pemahaman HTML/PHP). Usahakan sedapat mungkin mensinkronkan tampilan dengan tema utama dari blog.\r\n\r\n2. Tema. Langkah berikutnya adalah dengan menentukan suatu tema untuk blog anda. Tema layaknya seperti sebuah identitas, dengan menjadikan blog menjadi spesifik membahas tema tertentu maka akan menjadikan blog anda semakin mudah menjadi bahan referensi untuk tema tertentu bagi para pembaca. Terlalu banyak tema inti yang dibahas justru akan membuat blog anda kehilangan identitas utama.\r\n3. Isi Blog. Memperhatikan isi blog yang kita tulis juga dapat menjadikan blog menjadi lebih menarik untuk dibaca, perhatikan tata cara penulisan, sumber tulisan dan informasi lain seperti gambar ataupun link terkait yang dapat membuat blog anda lebih menarik. Jangan sembarang mencopas(copy paste) tulisan orang lain tanpa menyebutkan sumber yang jelas, karena selain melanggar hak cipta tulisan, juga justru akan membingungkan pembaca jika tulisan tidak sesuai dengan identitas asli blog anda. Selain itu kontinuitas anda dalam memperbaharui isi blog juga dapat menjadikan blog anda semakin populer.\r\n4. Fitur. Melengkapi blog dengan fitur menarik seperti komentar, galeri foto, animasi dan kotak saran/buku tamu dapat menjadikan blog anda terlihat lebih profesional. Anda dapat lakukan dengan menambahkan Gadget/Widget tambahan yang terintegrasi dengan blog anda atau mencari widget tambahan yang dapat anda peroleh dari Internet.\r\n5. SEO. Poin terakhir yang juga sangat menentukan popularitas blog anda adalah bagaimana cara anda mengenalkan blog anda pada mesin pencari populer seperti Google atau Yahoo, karena hampir 80% pengguna internet menggunakan mesin pencari sebagai fasilitas awal untuk mencari informasi. Beberapa trik untuk SEO dapat dengan mudah anda pelajari dari buku atau Internet untuk dikembangkan dan diterapkan dalam blog anda.\r\n\r\nSumber : http://bangdanu.wordpress.com/2011/09/16/advanced-blog/', 'Artikel', 'seo.png', 0);
INSERT INTO `m_posting` VALUES (2, 0, '2011-12-29', 'Membasmi Virus Sality', 'Tulisan kali ini judulnya mungkin agak sadis ya, tapi pemilihan judul kali ini didasari karena kejengkelan dengan penemuan virus di komputer kantor yang saya gunakan sehari-hari. Virus apakah itu? Yap sesuai judul tulisan diatas, virus yang saya temukan dan dideteksi anti virus Smadav dan AVG yg terpasang di komputer saya adalah Sality, tepatnya Sality.101.\r\nNah yang membuat jengkel lagi adalah ternyata kedua antivirus yg saya gunakan hanya dapat menghapus ketika virus terdeteksi dan tidak memperbaiki registry dan autorun.inf yang diinfeksi virus ini, akibatnya saya harus mengutak-atik registry secara manual. Oleh karena itu saya mencari alternatif penyembuhan alternatif lain, tapi yang jelas bukan dukun ya. \r\nSetelah browsing sana-sini, akhirnya saya mendapati sebuah alternatif penyembuhan yang sudah saya buktikan efektif mengatasi Sality.101, nama aplikasi tersebut adalah Salitykiller (cocok kan namanya sebagai pembunuh gratisan?)  . Aplikasi keluaran Kaspersky Lab ini mencari dan memperbaiki file yang terinfeksi dengan lebih baik.\r\nCara penggunaannya juga sangat mudah, tinggal di ekstrak, kemudian jalankan Salitykiller.exe yang terdapat didalamnya, selanjutnya biarkan aplikasi ini bekerja hingga semua komponen registry dan file di-scan dengan sempurna dan secara otomatis akan diperbaiki oleh antivirus ini.\r\n\r\nSumber : http://bangdanu.wordpress.com', 'Artikel', 'salitykiller.jpg', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `m_testimoni`
-- 

CREATE TABLE `m_testimoni` (
  `id` int(5) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `m_testimoni`
-- 

INSERT INTO `m_testimoni` VALUES (1, 'Rian Nugraha', 'Guru', 'Dengan saya mengajar di Cyber Art Revolution, semakin menambah pengalaman saya...', 'rian.jpg', '2011-12-30');
INSERT INTO `m_testimoni` VALUES (2, 'Feldy Yusuf', 'Programmer Artivisi', 'Sebuah CV yang cukup bagus dalam bidang TI...', 'feldy.jpg', '2011-12-30');
INSERT INTO `m_testimoni` VALUES (3, 'Janwari Farqi S.', 'Programmer Gandsoft', 'Sistem pengajaran yang unik...', 'janwari.jpg', '2011-12-30');
INSERT INTO `m_testimoni` VALUES (4, 'Arya Kusuma', 'Pelajar SMK 1 Depok', 'Dengan belajar disini, saya jadi semakin percaya diri...', 'arya.jpg', '2011-12-30');
INSERT INTO `m_testimoni` VALUES (5, 'Rangga Eka P.', 'Programmer Artivisi', 'Seru juga belajar disini !', 'rangga.jpg', '2011-12-30');
