-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 03:25 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sibela`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_pindahan`
--

CREATE TABLE IF NOT EXISTS `barang_pindahan` (
`id_pindah` int(5) NOT NULL,
  `no_agendapindah` varchar(100) NOT NULL,
  `tgl_agendapindah` varchar(500) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `kepala_kan` varchar(500) NOT NULL,
  `peneliti_pindah` varchar(500) NOT NULL,
  `ket_pindah` longtext NOT NULL,
  `pengajuan` varchar(500) NOT NULL,
  `kasi` varchar(500) NOT NULL,
  `persetujuan_pindah` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_pindahan`
--

INSERT INTO `barang_pindahan` (`id_pindah`, `no_agendapindah`, `tgl_agendapindah`, `nama_perusahaan`, `npwp`, `kepala_kan`, `peneliti_pindah`, `ket_pindah`, `pengajuan`, `kasi`, `persetujuan_pindah`) VALUES
(9, 'SP-123', '2020-02-24', 'pt kurus', '123.57884.976.eaaa', '2020-02-27', '2020-02-29', 'sah', '2020-02-29', '2020-03-04', '2020-03-02'),
(10, '234', '2020-04-07', 'pt gendut', '134', '2020-02-25', '2020-02-25', 'lunas', '2020-02-27', '2020-02-28', ''),
(11, '265', '2020-02-26', 'pt langsing', '321.347.56', '2020-02-27', '2020-02-28', 'dilanjutkan', '2020-02-29', '2020-03-02', '2020-03-04'),
(12, '265', '2020-02-28', 'pt semampai', '12345', '2020-02-29', '2020-03-03', 'sah', '2020-03-04', '2020-03-06', '2020-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE IF NOT EXISTS `detail_pesanan` (
`id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info_pembayaran`
--

CREATE TABLE IF NOT EXISTS `info_pembayaran` (
`id` int(11) NOT NULL,
  `info` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_pembayaran`
--

INSERT INTO `info_pembayaran` (`id`, `info`) VALUES
(1, 'Transaksi pembayaran bisa di bayar DP 50% dulu sebelum hari H.\r\njika tidak maka transaksi akan di batalkan .\r\n\r\nPembayaran Transaksi Bisa Melalui Rekening Di Bawah Ini\r\nBCA =  atas nama Fatin Batrisyia\r\n\r\nkemudian konfirmasi pembayaran bisa di menu pembayaran.Terima Kasih.');

-- --------------------------------------------------------

--
-- Table structure for table `jaminan`
--

CREATE TABLE IF NOT EXISTS `jaminan` (
`id` int(5) NOT NULL,
  `no_agenda` varchar(100) NOT NULL,
  `tanggal_agenda` varchar(500) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `npwp` varchar(500) NOT NULL,
  `kepala_kantor` varchar(500) NOT NULL,
  `seksi` varchar(500) NOT NULL,
  `surety` longtext NOT NULL,
  `konfirjam` varchar(500) NOT NULL,
  `sttj` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jaminan`
--

INSERT INTO `jaminan` (`id`, `no_agenda`, `tanggal_agenda`, `nama`, `npwp`, `kepala_kantor`, `seksi`, `surety`, `konfirjam`, `sttj`) VALUES
(36, '99', '2020-02-22', 'pt.deci', '12345', '2020-02-29', '2020-02-29', 'lunas', '2020-03-10', '2020-02-14'),
(37, '130', '2020-02-13', 'pt fatin', '12345', '2020-02-25', '2020-02-25', 'lunas', '2020-03-02', '2020-03-04'),
(38, '74', '2020-02-26', 'pt sonya', '12345', '2020-02-27', '2020-02-29', 'bank sumut', '2020-03-02', '2020-03-04'),
(39, '65', '2020-02-24', 'pt kami', '134', '2020-02-26', '2020-02-28', 'bank mandiri', '2020-02-29', '2020-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE IF NOT EXISTS `kategori_produk` (
`id` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama`, `deskripsi`) VALUES
(6, 'Sayuran', ''),
(7, 'Bahan Dapur', ''),
(8, 'Buah-Buahan', ''),
(9, 'Bahan Pokok', '');

-- --------------------------------------------------------

--
-- Table structure for table `keberatan`
--

CREATE TABLE IF NOT EXISTS `keberatan` (
`id_berat` int(5) NOT NULL,
  `no_agendaberat` varchar(100) NOT NULL,
  `tgl_agendaberat` varchar(500) NOT NULL,
  `nama_pt` varchar(100) NOT NULL,
  `npwp_berat` varchar(500) NOT NULL,
  `kepala_kantor1` varchar(500) NOT NULL,
  `peneliti_berat` varchar(500) NOT NULL,
  `seksi_berat` varchar(500) NOT NULL,
  `kepala_kantor2` varchar(500) NOT NULL,
  `kanwil` varchar(500) NOT NULL,
  `keputusan_berat` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keberatan`
--

INSERT INTO `keberatan` (`id_berat`, `no_agendaberat`, `tgl_agendaberat`, `nama_pt`, `npwp_berat`, `kepala_kantor1`, `peneliti_berat`, `seksi_berat`, `kepala_kantor2`, `kanwil`, `keputusan_berat`) VALUES
(9, '1008201', '2020-02-25', 'pt mata', '7544.9808.142', '2020-02-26', '2020-02-27', '2020-02-28', '2020-02-29', 'lengkap', '2020-03-01'),
(10, '1458', '2020-03-04', 'PT.Cahaya', '135.797.5', '2020-03-05', '2020-03-21', '2020-03-27', '2020-03-27', 'dilanjutkan', '2020-03-31'),
(11, '1458', '2019-12-31', 'pt angkasa', '7544.9808.142', '2020-01-14', '2020-01-09', '2020-01-23', '2020-01-14', 'dilanjutkan', '2020-01-29'),
(12, '00998', '2020-03-02', 'PT.BUMI', '114.257.956', '2020-03-04', '2020-03-06', '2020-03-09', '2020-03-18', 'lengkap', '2020-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(200) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `subjek`, `pesan`) VALUES
(22, '', 'aku@gmail.com', '', ''),
(24, '', 'fatin.batrisya@yahoo.com', '', ''),
(25, '', 'fatin.batrisya@yahoo.com', '', ''),
(26, '', 'fatin.batrisya@yahoo.com', '', ''),
(27, '', 'fatinimut@gmail.com', '', ''),
(28, 'fatinimut', 'fatinimut@gmail.com', 'Pembatalan', 'tolong batalin pesanan saya.'),
(29, 'fatinimut', 'fatinimut@gmail.com', 'kds', 'jhcsk'),
(30, '', 'fatin.batrisya@yahoo.com', '', ''),
(31, '', 'fatin.batrisya@yahoo.com', '', ''),
(32, '', 'ftnbat@gmail.com', '', ''),
(33, '', 'fatinimut@gmail.com', '', ''),
(34, '', 'fatinimut@gmail.com', '', ''),
(35, 'fatinimut', 'fatinimut@gmail.com', 'apaya', 'banyakin sayurnya dong'),
(36, '', 'fatin.batrisya@yahoo.com', '', ''),
(37, '', 'fatin.batrisya@yahoo.com', '', ''),
(38, '', 'fatinimut@gmail.com', '', ''),
(39, '', 'fatinimut@gmail.com', '', ''),
(40, '', 'fatinimut@gmail.com', '', ''),
(41, '', 'fatinimut@gmail.com', '', ''),
(42, '', 'fatinimut@gmail.com', '', ''),
(43, '', 'fatinimut@gmail.com', '', ''),
(44, '', 'fatinimut@gmail.com', '', ''),
(45, '', 'fatinimut@gmail.com', '', ''),
(46, '', 'fatinimut@gmail.com', '', ''),
(47, '', 'fatinimut@gmail.com', '', ''),
(48, '', 'fatinimut@gmail.com', '', ''),
(49, '', 'fatin.batrisya@yahoo.com', '', ''),
(50, '', 'fatin.batrisya@yahoo.com', '', ''),
(51, '', 'sonyaprasetyaa@gmail.com', '', ''),
(52, '', 'sonyaprasetyaa@gmail.com', '', ''),
(53, '', 'fatin.batrisya@yahoo.com', '', ''),
(54, '', 'fatin.batrisya@yahoo.com', '', ''),
(55, '', 'fatin.batrisya@yahoo.com', '', ''),
(56, '', 'fatin.batrisya@yahoo.com', '', ''),
(57, '', 'fatin.batrisya@yahoo.com', '', ''),
(58, '', 'fatin.batrisya@yahoo.com', '', ''),
(59, '', 'fatin.batrisya@yahoo.com', '', ''),
(60, '', 'fatin.batrisya@yahoo.com', '', ''),
(61, '', 'fatin.batrisya@yahoo.com', '', ''),
(62, '', 'fatin.batrisya@yahoo.com', '', ''),
(63, '', 'fatin.batrisya@yahoo.com', '', ''),
(64, '', 'fatin.batrisya@yahoo.com', '', ''),
(65, '', 'fatin.batrisya@yahoo.com', '', ''),
(66, '', 'fatin.batrisya@yahoo.com', '', ''),
(67, '', 'fatin.batrisya@yahoo.com', '', ''),
(68, '', 'fatin.batrisya@yahoo.com', '', ''),
(69, '', 'fatin.batrisya@yahoo.com', '', ''),
(70, '', 'fatin.batrisya@yahoo.com', '', ''),
(71, '', 'fatin.batrisya@yahoo.com', '', ''),
(72, '', 'fatin.batrisya@yahoo.com', '', ''),
(73, '', 'fatin.batrisya@yahoo.com', '', ''),
(74, '', 'fatin.batrisya@yahoo.com', '', ''),
(75, '', 'fatin.batrisya@yahoo.com', '', ''),
(76, '', 'fatin.batrisya@yahoo.com', '', ''),
(77, '', 'fatin.batrisya@yahoo.com', '', ''),
(78, '', 'fatin.batrisya@yahoo.com', '', ''),
(79, '', 'fatin.batrisya@yahoo.com', '', ''),
(80, '', 'fatin.batrisya@yahoo.com', '', ''),
(81, '', 'fatin.batrisya@yahoo.com', '', ''),
(82, '', 'fatin.batrisya@yahoo.com', '', ''),
(83, '', 'fatin.batrisya@yahoo.com', '', ''),
(84, '', 'fatin.batrisya@yahoo.com', '', ''),
(85, '', 'fatin.batrisya@yahoo.com', '', ''),
(86, '', 'fatin.batrisya@yahoo.com', '', ''),
(87, '', 'fatin.batrisya@yahoo.com', '', ''),
(88, '', 'fatin.batrisya@yahoo.com', '', ''),
(89, '', 'dnddecii@gmail.com', '', ''),
(90, '', 'dnddecii@gmail.com', '', ''),
(91, '', 'dnddecii@gmail.com', '', ''),
(92, '', 'dnddecii@gmail.com', '', ''),
(93, '', 'dnddecii@gmail.com', '', ''),
(94, '', 'fatin.batrisya@yahoo.com', '', ''),
(95, '', 'fatin.batrisya@yahoo.com', '', ''),
(96, '', 'fatin.batrisya@yahoo.com', '', ''),
(97, '', 'fatin.batrisya@yahoo.com', '', ''),
(98, '', 'fatin.batrisya@yahoo.com', '', ''),
(99, '', 'papa123@yahoo.com', '', ''),
(100, '', 'fatin.batrisya@yahoo.com', '', ''),
(101, '', 'fatinimut@gmail.com', '', ''),
(102, '', 'fatinimut@yahoo.com', '', ''),
(103, '', 'fatinimut@yahoo.com', '', ''),
(104, '', 'fatinimut@yahoo.com', '', ''),
(105, '', 'fatinimut@yahoo.com', '', ''),
(106, '', 'fatinimut@gmail.com', '', ''),
(107, '', 'fatinimut@yahoo.com', '', ''),
(108, '', 'fatinimut@yahoo.com', '', ''),
(109, '', 'fatinimut@yahoo.com', '', ''),
(110, '', 'fatin.batrisya@yahoo.com', '', ''),
(111, '', 'fatinimut@yahoo.com', '', ''),
(112, '', 'fatinimut@yahoo.com', '', ''),
(113, '', 'fatinimut@yahoo.com', '', ''),
(114, '', 'fatinimut@yahoo.com', '', ''),
(115, '', 'fatinimut@yahoo.com', '', ''),
(116, '', 'fatinimut@yahoo.com', '', ''),
(117, '', 'fatinimut@yahoo.com', '', ''),
(118, '', 'fatinimut@gmail.com', '', ''),
(119, '', 'fatin.batrisya@yahoo.com', '', ''),
(120, '', 'fatinimut@gmail.com', '', ''),
(121, '', 'fatinimut@gmail.com', '', ''),
(122, '', 'fatin.batrisya@yahoo.com', '', ''),
(123, '', 'deci@gmail.com', '', ''),
(124, '', 'fatin.batrisya@yahoo.com', '', ''),
(125, '', 'fatin.batrisya@yahoo.com', '', ''),
(126, '', 'fatin.batrisya@yahoo.com', '', ''),
(127, '', 'fatin.batrisya@yahoo.com', '', ''),
(128, '', 'fatinimut@gmail.com', '', ''),
(129, '', 'fatinimut@gmail.com', '', ''),
(130, '', 'fatin.batrisya@yahoo.com', '', ''),
(131, '', 'fatinimut@gmail.com', '', ''),
(132, '', 'fatin.batrisya@yahoo.com', '', ''),
(133, '', 'fatinimut@gmail.com', '', ''),
(134, '', 'fatin.batrisya@yahoo.com', '', ''),
(135, '', 'fatin.imut@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`, `ongkir`) VALUES
(2, 'Medan', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
`id_pengeluaran` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `Tanggal_pengeluaran` date NOT NULL,
  `harga` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_pengeluaran`, `nama_barang`, `Tanggal_pengeluaran`, `harga`, `jumlah`, `total`) VALUES
(44, 'Beras', '2019-07-25', '100000', 2, 200000),
(45, 'Sawi Hijau', '2019-07-25', '3000', 1, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
`id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('pending','verified','','') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pesanan`, `id_user`, `file`, `total`, `status`, `keterangan`, `created_at`) VALUES
(3, 17, 4, '49eb6a44db57cba8d66b3404fa9f0ad45.jpg', 200000, 'verified', 'Contoh Pembayaran', '0000-00-00 00:00:00'),
(4, 17, 4, '49eb6a44db57cba8d66b3404fa9f0ad46.jpg', 200000, 'verified', 'Pembayaran Ke Dua', '2016-09-30 15:58:35'),
(5, 17, 4, '49eb6a44db57cba8d66b3404fa9f0ad46.jpg', 107500, 'verified', 'Terakhir', '2016-09-30 16:10:33'),
(6, 18, 4, '49eb6a44db57cba8d66b3404fa9f0ad46.jpg', 300000, 'verified', 'Bukti Pembayaran', '2016-09-30 16:16:32'),
(7, 18, 4, '49eb6a44db57cba8d66b3404fa9f0ad44.jpg', 40000, 'verified', 'Pembayaran Terakhir', '2016-09-30 16:24:01'),
(8, 19, 4, '49eb6a44db57cba8d66b3404fa9f0ad4buttons.png', 520000, 'verified', 'Bukti Pembayaran', '2016-09-30 16:34:54'),
(9, 25, 6, '49eb6a44db57cba8d66b3404fa9f0ad4urmain.exe', 740000, 'verified', 'ngaceng', '2017-12-04 09:14:10'),
(10, 26, 3, '49eb6a44db57cba8d66b3404fa9f0ad4IMG_7045.JPG', 210000, 'verified', 'sudah lunas', '2019-07-25 01:28:45'),
(11, 26, 3, '49eb6a44db57cba8d66b3404fa9f0ad411.JPG', 210000, 'verified', 'LUNAS', '2019-07-25 01:31:29'),
(12, 27, 3, '49eb6a44db57cba8d66b3404fa9f0ad4XMDA5687.JPEG', 245, 'pending', 'lunas', '2019-07-30 18:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE IF NOT EXISTS `pengembalian` (
`idkembali` int(5) NOT NULL,
  `no_agendakem` varchar(100) NOT NULL,
  `tgl_agendakem` varchar(500) NOT NULL,
  `namapt` varchar(100) NOT NULL,
  `npwp_kembali` varchar(500) NOT NULL,
  `kep_kantor` varchar(500) NOT NULL,
  `seksikem` varchar(500) NOT NULL,
  `kppn` varchar(500) NOT NULL,
  `peneliti_kem` varchar(500) NOT NULL,
  `ket_kem` longtext NOT NULL,
  `skep` varchar(500) NOT NULL,
  `spm` varchar(500) NOT NULL,
  `sp2d` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`idkembali`, `no_agendakem`, `tgl_agendakem`, `namapt`, `npwp_kembali`, `kep_kantor`, `seksikem`, `kppn`, `peneliti_kem`, `ket_kem`, `skep`, `spm`, `sp2d`) VALUES
(4, 'DF-12345', '2020-02-05', 'pt jelek', '123', '2020-02-14', '2020-02-13', '2020-02-19', '2020-02-17', 'mon', '2020-02-19', '2020-02-10', '2020-02-01'),
(5, 'EP-10', '2020-03-11', 'pt buruk', '315', '2020-02-26', '2020-02-26', '2020-02-28', '2020-02-28', 'LENGKAP', '2020-02-26', '2020-02-29', '2020-03-02'),
(6, 'DP-787', '2020-02-25', 'pt tjakep', '534.3465.75', '2020-02-26', '2020-02-28', '2020-02-29', '2020-03-02', 'dilanjutkan', '2020-03-04', '2020-03-07', '2020-03-08'),
(7, '10e', '2020-02-27', 'pt cantik', '123', '2020-02-28', '2020-02-29', '2020-03-02', '2020-03-04', 'dilanjutkan', '2020-03-06', '2020-03-06', '2020-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `kategori_produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('user','admin') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `telephone`, `alamat`, `password`, `status`) VALUES
(20, 'Eryanto', 'eryanto.s@customs.go.id', '081314910753', 'Jl.Anggada II', '01cfcd4f6b8770febfb40cb906715822', 'admin'),
(26, 'admin', 'admin@gmail.com', '23456', 'Jl.Anggada II', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(27, 'user', 'user@gmail.com', '09876', 'jl. kunti', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(30, 'bea cukai belawan', 'bcbelawan@gmail.com', '061-4567890', 'Jl.Anggada II', '2e176c4d6ea6098643f4c1bd757f7c17', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_pindahan`
--
ALTER TABLE `barang_pindahan`
 ADD PRIMARY KEY (`id_pindah`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
 ADD PRIMARY KEY (`id`,`produk_id`,`pesanan_id`), ADD KEY `pesanan_id` (`pesanan_id`), ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `info_pembayaran`
--
ALTER TABLE `info_pembayaran`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jaminan`
--
ALTER TABLE `jaminan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keberatan`
--
ALTER TABLE `keberatan`
 ADD PRIMARY KEY (`id_berat`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
 ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
 ADD PRIMARY KEY (`idkembali`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id`,`kategori_produk_id`), ADD KEY `kategori_produk_id` (`kategori_produk_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_pindahan`
--
ALTER TABLE `barang_pindahan`
MODIFY `id_pindah` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `info_pembayaran`
--
ALTER TABLE `info_pembayaran`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jaminan`
--
ALTER TABLE `jaminan`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `keberatan`
--
ALTER TABLE `keberatan`
MODIFY `id_berat` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
MODIFY `idkembali` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`pesanan_id`) REFERENCES `jaminan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `detail_pesanan_ibfk_3` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_produk_id`) REFERENCES `kategori_produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
