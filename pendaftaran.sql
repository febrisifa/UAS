-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2016 at 12:19 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nama_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_nama_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_nama_admin`
--

INSERT INTO `tbl_nama_admin` (`id_admin`, `nama_admin`) VALUES
(1, 'Rio Saputra');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_siswa` (
  `no_pendaftaran` int(11) NOT NULL AUTO_INCREMENT,
  `nm_siswa` varchar(50) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `danem` varchar(50) NOT NULL,
  `sekolah_asal` varchar(100) NOT NULL,
  `almt_rumah` varchar(200) NOT NULL,
  `hobi` varchar(100) NOT NULL,
  `nm_ayah` varchar(50) NOT NULL,
  `nm_ibu` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `almt_ortu` varchar(200) NOT NULL,
  `penghasilan_ortu` varchar(50) NOT NULL,
  `tgl_daftar` varchar(20) NOT NULL,
  PRIMARY KEY (`no_pendaftaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`no_pendaftaran`, `nm_siswa`, `tgl_lahir`, `nisn`, `danem`, `sekolah_asal`, `almt_rumah`, `hobi`, `nm_ayah`, `nm_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `almt_ortu`, `penghasilan_ortu`, `tgl_daftar`) VALUES
(16, 'kirom', '10 agustus 2016', '291381928391', '9999', 'sempu', 'genteng', 'bola', 'paijo', 'painem', 'PNS', 'IRT', 'banyuwangi', '999999', '18 11 1777'),
(19, '', '', '', '', '', '', '', '', '', '', '', '', '', '');
