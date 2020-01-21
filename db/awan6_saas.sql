-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 12:27 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awan6_saas`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `role` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`role`) VALUES
('admin'),
('Kepala Dinas'),
('Ketua Bidang Pelayanan Dan Pendaftaran Penduduk'),
('Ketua Bidang Pelayanan Pencatatan Sipil'),
('Ketua Bidang Piak Dan Pemanfaatan Data'),
('Ketua Sub Bagian Perencanaan Dan Keuangan'),
('Ketua Sub Bagian Umum Dan Kepegawaian'),
('Sekretariat Dinas');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `no_agenda` varchar(5) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `jam_diterima` varchar(5) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `rincian_surat` text NOT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `disposisi1` varchar(50) NOT NULL,
  `instruksi` text NOT NULL,
  `disposisi2` varchar(50) NOT NULL,
  `instruksi2` text NOT NULL,
  `foto_lampiran` varchar(50) NOT NULL,
  `status` enum('Selesai','Belum Selesai') NOT NULL,
  `username_pengguna` varchar(100) NOT NULL,
  `hapus` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `no_agenda`, `tgl_diterima`, `jam_diterima`, `pengirim`, `perihal`, `rincian_surat`, `tgl_pelaksanaan`, `no_surat`, `tgl_surat`, `disposisi1`, `instruksi`, `disposisi2`, `instruksi2`, `foto_lampiran`, `status`, `username_pengguna`, `hapus`) VALUES
(2, '002', '2018-12-31', '00:30', 'Walikota Cimahi', 'Surat Edaran', '', '0000-00-00', '70 tahun 2018', '2018-12-31', 'Sekretariat Dinas', 'disusun', 'Ketua Sub Bagian Perencanaan Dan Keuangan', 'disusun', '002__2018-12-31__2.pdf', 'Selesai', 'ucok', 0),
(3, '002', '2018-12-31', '00:00', 'Sekda-Bappeda', 'Evaluasi', 'evaluasi program dan kegiatan triwulan', '0000-00-00', '906/6127/bappeda', '2018-03-12', '', 'dilaporkan blablabla', '', '', '003__2018-03-12__3.pdf', 'Selesai', 'admin', 0),
(4, '004', '2019-01-03', '00:00', 'BKPSDMD', 'Pemutakhiran data Diklatpim', '', '0000-00-00', '892.2/0019/BKPSDMP', '2019-01-03', 'Ketua Sub Bagian Umum Dan Kepegawaian', 'diumumkan sesuai dengan diklat yang belum', '-', '', '004__2019-01-03__4.pdf', 'Selesai', 'admin', 0),
(5, '005', '2019-04-01', '00:00', 'Bulan dana PMI kota cimahi', 'Rapat', 'rapat panitia bulan dana pmi kota cimahi 2018', '2019-01-11', '11/Pan.Bd-PMI/CM1/1/2019', '2019-01-04', 'Sekretariat Dinas', 'hadir sesuai undangan', '-', '', '005__2019-01-04__5.pdf', 'Selesai', 'admin', 0),
(6, '006', '2019-01-04', '00:00', 'Bulan dana PMI kota cimahi', 'Pemberitahuan', 'Pemberitahuan batas akhir penyetoran hasil pengumpulan data.', '0000-00-00', '10/pan.BD-PMI/Cim/1/2019', '2019-01-04', 'Sekretariat Dinas', 'batas akhir di satu termasuk. . . . ', '-', '', '006__2019-01-04__6.pdf', 'Selesai', 'admin', 0),
(7, '007', '2019-01-08', '00:00', 'Sekda-BKPSDMD', 'Usulan', 'Usulan calon penerimaan tanda kehormatan satyalancana karya satya presiden ri', '0000-00-00', '800/76/BKPDMD', '2019-01-08', 'Ketua Sub Bagian Umum Dan Kepegawaian', 'dicek kalau ada yang memenuhi syarat di usulkan segera', '-', '', '007__2019-01-08__7.pdf', 'Selesai', 'admin', 0),
(8, '008', '2019-01-08', '00:00', 'BPKAD', 'Laporan', 'percepatan penyusunan laporan kenangan tahun 2018', '0000-00-00', '900/25/BPKAD', '2019-01-08', 'Ketua Sub Bagian Perencanaan Dan Keuangan', 'blabalbal', '-', '', '008__2019-01-08__8.pdf', 'Selesai', 'admin', 0),
(9, '009', '2019-01-09', '00:00', 'PMI Kota Cimahi', 'Undangan', 'Dilaksanakan Pada Hari : Senin, Pada Jam : 09:00, Pada Tempat : Ruang Rapat Walikota Cimahi. Kegiatan penutupan gerakan bulan dana PMI kota cimahi tahun 2018', '2019-01-14', '14/Pan.BD-PMI/Cmi/1/2019', '2019-01-09', 'Sekretariat Dinas', 'hadir sesuai undangan', '-', '', '009__2019-01-09__9.pdf', 'Selesai', 'admin', 0),
(10, '010', '2019-01-07', '00:00', 'DPRD Kabupaten Belitung Timur', 'Pemberitahuan', 'pemberitahuan konsultasi dan koordinasi berkenaan dengan penertiban ktp untuk pemilik pemula yang berusia 17 tahun pada bulan april 2019', '0000-00-00', '170/014/DPRD-Belit/1/2019', '2019-10-07', '-', '', '-', '', '010__2019-10-07__10.pdf', 'Selesai', 'admin', 0),
(11, '011', '2019-08-28', '00:00', 'Lorem', 'Perihal Lorem Ipsum', 'Lorem ipsum dolor sit amhttp://localhost/Project_kp/Project_kp_v0.21/file/surat-masuk/011__2019-08-28__11.pdfet', '0000-00-00', '011/Lorem Ipsum', '2019-08-28', 'Ketua Bidang Piak Dan Pemanfaatan Data', 'ini instruksi saya ....', '-', '', '011__2019-08-28__11.pdf', 'Belum Selesai', 'admin', 1),
(12, '012', '2019-08-28', '00:00', 'Lorem', 'Ini Perihal Surat', 'Lorem ipsum', '0000-00-00', '012/Lorem Ipsum', '2019-08-28', 'Sekretariat Dinas', 'Ini instruksi dari kadis ...', '-', '', '012__2019-08-28__12.pdf', 'Belum Selesai', 'admin', 1),
(0, '001', '2018-12-26', '00:00', 'Sekda-BPKAD', 'Laporan Stock Opname', '', '0000-00-00', '032/6087/BPKAD', '2019-12-25', 'Ketua Sub Bagian Umum Dan Kepegawaian', 'dipenuhi', '-', '', '001__2019-12-25__0.pdf', 'Belum Selesai', 'admin', 0),
(14, '123', '0003-12-12', '12:03', '31231', '3123', '3123213', '0000-00-00', '132', '0003-03-12', 'aaa', 'asdad', 'bbbb', '13123123', '', 'Belum Selesai', 'ucok', 1),
(15, '001', '2020-01-21', '14:00', 'Kabur', 'apa saja', 'Si dobleh lagi kabur', '0000-00-00', '100/11/LoremIpsum', '2020-01-05', '', '', '', '', '001__2020-01-05__15.pdf', 'Selesai', 'dobleh', 0),
(13, '011', '2020-01-20', '20:25', 'syahril asidiq', 'apa saja', 'cuma test', '0000-00-00', '69696', '2020-01-05', 'bukan', '', '', '', '011__2020-01-05__13.pdf', 'Belum Selesai', 'ucok', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_pengguna`
--

CREATE TABLE `user_pengguna` (
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email_pengguna` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pengguna`
--

INSERT INTO `user_pengguna` (`username`, `nama_user`, `password`, `email_pengguna`, `role`) VALUES
('admin', 'sapnu puas', 'admin', 'syahrilasidiq@gmail.com', 'admin'),
('syahrilasidiq', 'syahril', 'syahril', '', 'admin'),
('ucok', 'ucok bambang', 'ucok', 'ucok@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`role`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `user_pengguna`
--
ALTER TABLE `user_pengguna`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
