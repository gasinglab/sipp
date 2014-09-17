-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2014 at 09:23 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipp`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `kd_jurusan` varchar(225) NOT NULL,
  `nm_jurusan` varchar(225) NOT NULL,
  PRIMARY KEY (`kd_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kd_jurusan`, `nm_jurusan`) VALUES
('JR-00001', 'Akuntansi'),
('JR-00002', 'Administrasi Perkantoran'),
('JR-00003', 'Pemasaran'),
('JR-00004', 'Multimedia'),
('JR-00005', 'Teknik komputer jaringan'),
('JR-00006', 'Rekayasa perangkat lunak'),
('JR-00007', 'Farmasi'),
('JR-00008', 'Perbankan syariah');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE IF NOT EXISTS `pelanggaran` (
  `kd_pelanggaran` varchar(225) NOT NULL,
  `nama_pelanggaran` varchar(225) NOT NULL,
  `poin` int(3) NOT NULL,
  PRIMARY KEY (`kd_pelanggaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`kd_pelanggaran`, `nama_pelanggaran`, `poin`) VALUES
('PL-00001', 'Terlambat < 10menit', 5),
('PL-00002', 'Terlambat > 10menit', 10),
('PL-00003', 'Atribut tidak sesuai dengan aturan sekolah', 5),
('PL-00004', 'Melakukan tindak asusila & kriminal', 100),
('PL-00005', 'Pelanggaran lain', 5);

-- --------------------------------------------------------

--
-- Table structure for table `poin`
--

CREATE TABLE IF NOT EXISTS `poin` (
  `kd_poin` varchar(225) NOT NULL,
  `tgl_pelanggaran` varchar(30) NOT NULL,
  `nis` int(10) NOT NULL,
  `kd_pelanggaran` varchar(225) NOT NULL,
  PRIMARY KEY (`kd_poin`),
  KEY `nis` (`nis`,`kd_pelanggaran`),
  KEY `kd_pelanggaran` (`kd_pelanggaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poin`
--

INSERT INTO `poin` (`kd_poin`, `tgl_pelanggaran`, `nis`, `kd_pelanggaran`) VALUES
('PO-00001', '2014-03-19T06:41:16+01:00', 13720, 'PL-00002'),
('PO-00003', '2014-03-19T06:42:52+01:00', 13722, 'PL-00001'),
('PO-00004', '2014-03-19T08:55:43+01:00', 13721, 'PL-00001');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` int(10) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `kd_jurusan` varchar(225) NOT NULL,
  `gender` enum('Laki-laki','Perempuan','','') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp_wali` varchar(15) NOT NULL,
  `foto` varchar(225) NOT NULL,
  PRIMARY KEY (`nis`),
  KEY `kd_jurusan` (`kd_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `kd_jurusan`, `gender`, `alamat`, `no_telp_wali`, `foto`) VALUES
(13720, 'Dewi Pratiwi', 'JR-00005', 'Perempuan', 'Limpakuwus', '02164949', 'dewi.jpg'),
(13721, 'Dickliyla', 'JR-00003', 'Perempuan', 'Purwokerto', '021202565', 'dickliyla.jpg'),
(13722, 'Dicky Azhari', 'JR-00006', 'Laki-laki', 'Kombas', '021225', 'dicky1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `kd_user` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `hak` int(2) NOT NULL,
  PRIMARY KEY (`kd_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kd_user`, `username`, `password`, `hak`) VALUES
('USR-00001', 'raka', '261363aec0323bd187db709a6dc5fff4', 2),
('USR-00002', 'ulfan', '261363aec0323bd187db709a6dc5fff4', 1),
('USR-003', 'admin', '70173b73ea9fe7e45600e858965e2dd7', 1),
('USR-004', 'petugas', '017bce60a0b186118125e138b641470e', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_poin`
--
CREATE TABLE IF NOT EXISTS `view_poin` (
`kd_poin` varchar(225)
,`tgl_pelanggaran` varchar(30)
,`nis` int(10)
,`nama_pelanggaran` varchar(225)
,`poin` int(3)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_siswa`
--
CREATE TABLE IF NOT EXISTS `view_siswa` (
`nis` int(10)
,`nama` varchar(225)
,`nm_jurusan` varchar(225)
,`gender` enum('Laki-laki','Perempuan','','')
,`alamat` text
,`no_telp_wali` varchar(15)
,`foto` varchar(225)
);
-- --------------------------------------------------------

--
-- Structure for view `view_poin`
--
DROP TABLE IF EXISTS `view_poin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_poin` AS select `poin`.`kd_poin` AS `kd_poin`,`poin`.`tgl_pelanggaran` AS `tgl_pelanggaran`,`siswa`.`nis` AS `nis`,`pelanggaran`.`nama_pelanggaran` AS `nama_pelanggaran`,`pelanggaran`.`poin` AS `poin` from ((`poin` join `siswa`) join `pelanggaran`) where ((`siswa`.`nis` = `poin`.`nis`) and (`pelanggaran`.`kd_pelanggaran` = `poin`.`kd_pelanggaran`));

-- --------------------------------------------------------

--
-- Structure for view `view_siswa`
--
DROP TABLE IF EXISTS `view_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa` AS select `siswa`.`nis` AS `nis`,`siswa`.`nama` AS `nama`,`jurusan`.`nm_jurusan` AS `nm_jurusan`,`siswa`.`gender` AS `gender`,`siswa`.`alamat` AS `alamat`,`siswa`.`no_telp_wali` AS `no_telp_wali`,`siswa`.`foto` AS `foto` from (`siswa` join `jurusan`) where (`jurusan`.`kd_jurusan` = `siswa`.`kd_jurusan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `poin`
--
ALTER TABLE `poin`
  ADD CONSTRAINT `poin_ibfk_2` FOREIGN KEY (`kd_pelanggaran`) REFERENCES `pelanggaran` (`kd_pelanggaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `poin_ibfk_3` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`kd_jurusan`) REFERENCES `jurusan` (`kd_jurusan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
