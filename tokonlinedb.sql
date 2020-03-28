-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 11, 2009 at 11:41 PM
-- Server version: 5.0.41
-- PHP Version: 5.2.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `tokonlinedb`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `id` int(3) NOT NULL auto_increment,
  `nama` varchar(255) collate latin1_general_ci NOT NULL,
  `email` varchar(255) collate latin1_general_ci NOT NULL,
  `kelamin` varchar(8) collate latin1_general_ci NOT NULL,
  `user` varchar(25) collate latin1_general_ci NOT NULL,
  `password` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` VALUES (1, 'Agus Sumarna', 'sumarna@yahoo.com', 'pria', 'agus', 'fdf169558242ee051cca1479770ebac3');
INSERT INTO `admin` VALUES (2, 'Siera Nevada', 'siera@yahoo.com', 'Wanita', 'siera', '47c0abc24dd9c450577173afdd173d64');
INSERT INTO `admin` VALUES (3, 'User Admin', 'user@yahoo.com', 'pria', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

-- 
-- Table structure for table `counter`
-- 

CREATE TABLE `counter` (
  `tgl` varchar(30) collate latin1_general_ci NOT NULL,
  `jml` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `counter`
-- 

INSERT INTO `counter` VALUES ('2008-11-16 13:03:54', 655);

-- --------------------------------------------------------

-- 
-- Table structure for table `daftar`
-- 

CREATE TABLE `daftar` (
  `id` int(5) NOT NULL auto_increment,
  `nama` varchar(50) collate latin1_general_ci NOT NULL,
  `user` varchar(20) collate latin1_general_ci NOT NULL,
  `email` varchar(50) collate latin1_general_ci NOT NULL,
  `pass` varchar(70) collate latin1_general_ci NOT NULL,
  `tanggal` varchar(30) collate latin1_general_ci NOT NULL,
  `alamat` text collate latin1_general_ci NOT NULL,
  `kota` varchar(50) collate latin1_general_ci NOT NULL,
  `kodepos` varchar(15) collate latin1_general_ci NOT NULL,
  `provinsi` varchar(50) collate latin1_general_ci NOT NULL,
  `telpon` varchar(15) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=43 ;

-- 
-- Dumping data for table `daftar`
-- 

INSERT INTO `daftar` VALUES (35, 'Agus Sumarna', 'agus', 'sumarna@yahoo.com', 'fdf169558242ee051cca1479770ebac3', 'Wed, 04-Nov-2009 07:44:59', 'Jl. Salak VII No.140', 'Depok Timur', '16417', 'Jawa Barat', '085687876');
INSERT INTO `daftar` VALUES (36, 'Dedi Ruswandi', 'dedi', 'dedi@yahoo.com', 'c5897fbcc14ddcf30dca31b2735c3d7e', 'Wed, 04-Nov-2009 07:50:20', 'Jl. Duren No.120 ', 'Bandung', '18765', 'Jawa Barat', '021948585');
INSERT INTO `daftar` VALUES (37, 'Kak Iman', 'iman', 'imanzagi@yahoo.com', '5be9a68073f66a56554e25614e9f1c9a', 'Fri, 11-Dec-2009 23:24:42', '', '', '', '', '');
INSERT INTO `daftar` VALUES (38, 'Ucup Jeje', 'ucup', 'ucup@yahoo.com', '1e17778d0d8217b035daffba02c06054', 'Fri, 11-Dec-2009 23:25:48', '', '', '', '', '');
INSERT INTO `daftar` VALUES (39, 'Asep Ruspayadi', 'asep', 'asep@yahoo.com', 'dc855efb0dc7476760afaa1b281665f1', 'Fri, 11-Dec-2009 23:26:02', '', '', '', '', '');
INSERT INTO `daftar` VALUES (40, 'Pathona Destri Yhana', 'yhana', 'yhana@yahoo.com', 'ce65f2276ffb6fdf41130c408724f6c2', 'Fri, 11-Dec-2009 23:26:22', '', '', '', '', '');
INSERT INTO `daftar` VALUES (41, 'Naila Resti Larasati', 'naila', 'naila@yahoo.com', 'eec1b906b0c314e617235f13f0e6468d', 'Fri, 11-Dec-2009 23:26:47', '', '', '', '', '');
INSERT INTO `daftar` VALUES (42, 'Nindya Siregar', 'nindya', 'nindya@yahoo.com', '9d0ec3c4d67960c8312f49c301a864b8', 'Fri, 11-Dec-2009 23:27:22', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `forum`
-- 

CREATE TABLE `forum` (
  `ID_topik` int(5) NOT NULL auto_increment,
  `nama` varchar(50) collate latin1_general_ci NOT NULL,
  `email` varchar(50) collate latin1_general_ci NOT NULL,
  `topik` varchar(255) collate latin1_general_ci NOT NULL,
  `isi` text collate latin1_general_ci NOT NULL,
  `ID_replay` int(5) NOT NULL,
  `tanggal` varchar(30) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ID_topik`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=287 ;

-- 
-- Dumping data for table `forum`
-- 

INSERT INTO `forum` VALUES (276, 'Agus Sumarna', 'sumarna@yahoo.com', 'Pesen Boneka', 'Bagi yang mau pesan boneka ', 0, 'Wed, 04-Nov-2009 07:48:24');
INSERT INTO `forum` VALUES (277, 'Agus Sumarna', 'sumarna@yahoo.com', 'Salam Kenal', 'Bagi yang mau ngobrol ', 0, 'Wed, 04-Nov-2009 07:49:01');
INSERT INTO `forum` VALUES (278, 'Dedi Ruswandi', 'dedi@yahoo.com', 'Salam Kenal', 'salam kenal buat semua member...', 277, 'Wed, 04-Nov-2009 07:51:23');
INSERT INTO `forum` VALUES (279, 'Dedi Ruswandi', 'dedi@yahoo.com', 'Jadi Agen', 'yang mau jadi agen penjualan boneka di kota anda', 0, 'Wed, 04-Nov-2009 07:52:46');
INSERT INTO `forum` VALUES (285, 'Pathona Destri Yhana', 'yhana@yahoo.com', 'Boneka Buat Pacar', 'emm...buat pacar cewek yang suka boneka...bagusnya di kasih boneka apa yach??\r\n\r\nkasih saran dunk...', 0, 'Fri, 11-Dec-2009 23:28:52');
INSERT INTO `forum` VALUES (286, 'Agus Sumarna', 'sumarna@yahoo.com', 'Boneka Buat Pacar', 'di kasih boneka kucing aja say... :)\r\n\r\nyang lucu kayak kamuu...', 285, 'Fri, 11-Dec-2009 23:29:40');

-- --------------------------------------------------------

-- 
-- Table structure for table `guestbook`
-- 

CREATE TABLE `guestbook` (
  `id_gb` int(3) NOT NULL auto_increment,
  `tgl` varchar(30) collate latin1_general_ci NOT NULL,
  `nama` varchar(255) collate latin1_general_ci NOT NULL,
  `email` varchar(255) collate latin1_general_ci NOT NULL,
  `pesan` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_gb`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=200 ;

-- 
-- Dumping data for table `guestbook`
-- 

INSERT INTO `guestbook` VALUES (198, 'Thu, 05-Nov-2009 16:47:15', 'asep ruspayadi', 'asep@yahoo.com', 'kumaha damang yeeuh?');
INSERT INTO `guestbook` VALUES (197, 'Thu, 05-Nov-2009 16:44:34', 'Dedi Ruswandi', 'dedi@yahoo.com', 'Sukses yach buat web nya,\r\nsemoga barang yang di jual\r\nlaku2... :)');
INSERT INTO `guestbook` VALUES (195, 'Thu, 05-Nov-2009 16:40:44', 'Agus Sumarna', 'sumarna_agus@yahoo.com', 'Assalamualaikum, salam kenal\r\nbuat semua member :)');
INSERT INTO `guestbook` VALUES (196, 'Thu, 05-Nov-2009 16:41:22', 'dinda', 'dinda@yahoo.com', 'haloo, eh bisa pesen boneka\r\npenikahan tradisional ndak?');

-- --------------------------------------------------------

-- 
-- Table structure for table `laporan`
-- 

CREATE TABLE `laporan` (
  `idlap` int(4) NOT NULL auto_increment,
  `iduser` varchar(4) collate latin1_general_ci NOT NULL,
  `tgl` varchar(30) collate latin1_general_ci NOT NULL,
  `status` varchar(20) collate latin1_general_ci NOT NULL,
  `kode` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`idlap`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=39 ;

-- 
-- Dumping data for table `laporan`
-- 

INSERT INTO `laporan` VALUES (35, '36', 'Thu, 05-Nov-2009', 'lunas', '051109-172902');
INSERT INTO `laporan` VALUES (37, '36', 'Thu, 05-Nov-2009', 'proses', '051109-174302');
INSERT INTO `laporan` VALUES (38, '35', 'Fri, 11-Dec-2009', 'proses', '111209-233855');

-- --------------------------------------------------------

-- 
-- Table structure for table `pemesanan`
-- 

CREATE TABLE `pemesanan` (
  `idpesan` int(4) NOT NULL auto_increment,
  `iduser` varchar(4) collate latin1_general_ci NOT NULL,
  `idbrg` varchar(4) collate latin1_general_ci NOT NULL,
  `idlap` varchar(4) collate latin1_general_ci NOT NULL,
  `status` varchar(10) collate latin1_general_ci NOT NULL,
  `tgl` varchar(30) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`idpesan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=96 ;

-- 
-- Dumping data for table `pemesanan`
-- 

INSERT INTO `pemesanan` VALUES (90, '36', '17', '35', 'lunas', 'Thu, 05-Nov-2009 17:28:57');
INSERT INTO `pemesanan` VALUES (91, '36', '17', '37', 'proses', 'Thu, 05-Nov-2009 17:36:06');
INSERT INTO `pemesanan` VALUES (89, '36', '21', '35', 'lunas', 'Thu, 05-Nov-2009 17:28:55');
INSERT INTO `pemesanan` VALUES (88, '36', '21', '35', 'lunas', 'Thu, 05-Nov-2009 17:14:42');
INSERT INTO `pemesanan` VALUES (92, '36', '21', '37', 'proses', 'Thu, 05-Nov-2009 17:38:08');
INSERT INTO `pemesanan` VALUES (93, '35', '17', '38', 'proses', 'Fri, 11-Dec-2009 23:34:21');
INSERT INTO `pemesanan` VALUES (94, '35', '12', '38', 'proses', 'Fri, 11-Dec-2009 23:34:24');
INSERT INTO `pemesanan` VALUES (95, '35', '14', '38', 'proses', 'Fri, 11-Dec-2009 23:34:32');

-- --------------------------------------------------------

-- 
-- Table structure for table `produk`
-- 

CREATE TABLE `produk` (
  `idbrg` int(3) NOT NULL auto_increment,
  `tgl` varchar(30) collate latin1_general_ci NOT NULL,
  `namabrg` varchar(50) collate latin1_general_ci NOT NULL,
  `spek` text collate latin1_general_ci NOT NULL,
  `hargabrg` int(7) NOT NULL,
  `stok` int(2) NOT NULL,
  `gambar` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`idbrg`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=23 ;

-- 
-- Dumping data for table `produk`
-- 

INSERT INTO `produk` VALUES (12, 'Wed, 04-Nov-2009 07:37:20', 'Boneka Pengantin', '<p>Boneka pengantin cocok untuk hadiah pernikahan teman, atau sanak saudara</p>\r\n<ol>\r\n<li>Tinggi : 30 cm</li>\r\n<li>Berat : 150 gram</li>\r\n<li>Warna : coklat, orange </li>\r\n</ol>', 30000, 4, './admin/gambar/satu.jpg');
INSERT INTO `produk` VALUES (13, 'Wed, 04-Nov-2009 07:38:06', 'Boneka Sapi', '<p>Boneka sapi cocok di simpan di kamar putra-putri anda.</p>\r\n<ol>\r\n<li>Warna : Kuning</li>\r\n<li>Tinggi : 20 cm</li>\r\n<li>Berat : 250 gram<br /></li>\r\n</ol>', 25000, 5, './admin/gambar/enam.jpg');
INSERT INTO `produk` VALUES (14, 'Wed, 04-Nov-2009 07:37:43', 'Boneka Kodok', '<p>Boneka kodok yang lucu cocok untuk hadia ulang tahun anak Anda.</p>\r\n<ol>\r\n<li>warna : hijau, kuning</li>\r\n<li>Tinggi : 20 cm</li>\r\n<li>Berat : 200 gram</li>\r\n</ol>', 35000, 10, './admin/gambar/tujuh.jpg');
INSERT INTO `produk` VALUES (17, 'Wed, 04-Nov-2009 07:35:55', 'Boneka Tazmania', '<p>Boneka yang galak, namun lucu. bisa anda simpan di kamar tidur anak Anda</p>\r\n<ol>\r\n<li>warna : coklat</li>\r\n<li>tinggi : 20 cm</li>\r\n<li>berat : 200 gram</li>\r\n</ol>', 27000, 10, './admin/gambar/sebelas.jpg');

-- --------------------------------------------------------

-- 
-- Table structure for table `shoping`
-- 

CREATE TABLE `shoping` (
  `idshop` int(4) NOT NULL auto_increment,
  `idbrg` int(4) NOT NULL,
  `iduser` int(4) NOT NULL,
  `tgl` varchar(30) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`idshop`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=119 ;

-- 
-- Dumping data for table `shoping`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `voting`
-- 

CREATE TABLE `voting` (
  `bagus` int(5) NOT NULL,
  `jelek` int(5) NOT NULL,
  `tidaktahu` int(5) NOT NULL,
  `waktu` varchar(30) collate latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `voting`
-- 

INSERT INTO `voting` VALUES (132, 38, 46, 'Thu, 05-Nov-2009 15:44:45');
