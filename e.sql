-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2016 at 06:53 
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `harga` bigint(11) NOT NULL,
  `gambar` varchar(250) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `ket` text NOT NULL,
  `publish` enum('Y','N') NOT NULL DEFAULT 'Y',
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `kategori`, `harga`, `gambar`, `stok`, `berat`, `ket`, `publish`, `tanggal`) VALUES
(1, 'Eagle Emblem', 'Fashion', 1000000, 'Eagle_Emblem.jpg', 10, 0, 'Eagle Emblem', 'Y', '2016-06-11'),
(2, 'Bhaonx', 'Fashion', 500000, 'BhaonX_Skull.jpg', 98, 1000, 'Bhaonx', 'Y', '2016-06-13'),
(3, 'Circle', 'Fashion', 1000000, 'Circle_Floral_Wing.jpg', 6, 1000, 'Circle', 'Y', '2016-06-13'),
(4, 'Eagle Mania', 'Fashion', 1000000, 'Eagle_Mania.jpg', 10, 0, 'Eagle Mania', 'Y', '2016-06-13'),
(5, 'Medival', 'Fashion', 1000000, 'Medieval_Dingbats.jpg', 6, 0, 'Medival', 'Y', '2016-06-13'),
(6, 'Dotcom', 'Fashion', 1000000, 'dotCOM.jpg', 10, 0, 'Dotcom', 'Y', '2016-06-13'),
(7, 'King of Guitar', 'Fashion', 500000, 'King_of_Guitar.jpg', 10, 0, 'King of Guitar', 'Y', '2016-06-13'),
(8, 'Creative Wing', 'Fashion', 500000, 'Creative_Wing.jpg', 10, 0, 'Creative Wing', 'Y', '2016-06-13'),
(9, 'Hard Sample Design', 'Fashion', 1000000, 'Hard_Sample_Design.jpg', 10, 0, 'Hard Sample Design', 'Y', '2016-06-13'),
(10, 'Travel Italy', 'Jasa', 50000000, 'pisa-lina-1.jpg', 10, 0, 'Travel Italy', 'Y', '2016-06-13'),
(11, 'Travel Singapore', 'Jasa', 1000000, 'singapore.jpg', 0, 0, 'Singapore', 'Y', '2016-06-13'),
(12, 'Travel Prancis', 'Jasa', 50000000, 'eiffel-tower.jpg', 10, 0, 'Travel Prancis', 'Y', '2016-06-13'),
(13, 'Travel USA', 'Jasa', 1000000, 'liberty.jpg', 10, 0, 'Travel USA', 'Y', '2016-06-13'),
(14, 'Travel India', 'Jasa', 50000000, 'taj-mahal.jpg', 10, 0, 'Travel India', 'Y', '2016-06-13'),
(15, 'Mie Aceh', 'Kuliner', 10000, 'resep-mie-aceh.jpg', 10, 100, 'Mie Aceh', 'Y', '2016-06-15'),
(16, 'Nasi Goreng Seafood', 'Kuliner', 70000, 'Nasi-goreng-seafood-resep_7_6.2_.5_326X580_7_6_.2_.5_326X580_.jpg', 10, 0, 'Nasi Goreng Seafood', 'Y', '2016-06-15'),
(17, 'Lontong Sayur', 'Kuliner', 50000, 'Lontong-Sayur-khas-lebaran.jpg', 9, 0, 'Lontong Sayur', 'Y', '2016-06-15'),
(18, 'Bubur Ayam', 'Kuliner', 10000, 'cara-membuat-bubur-ayam-kampung.jpg', 0, 0, 'Bubur Ayam', 'Y', '2016-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `cara_pembelian`
--

CREATE TABLE IF NOT EXISTS `cara_pembelian` (
`id` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cara_pembelian`
--

INSERT INTO `cara_pembelian` (`id`, `isi`) VALUES
(1, '<table class="table table-bordered" style="text-align: justify; line-height: 1.42857; background-color: rgb(255, 255, 255);"><tbody><tr><td style="text-align: left;">1.</td><td style="text-align: left;"><span style="font-family: Helvetica;">Pilih &nbsp;lalu dan masukan jumlah item yang diinginkan, lalu klik tombol Tambah ke Keranjang</span><br></td></tr><tr><td style="text-align: left;">2.</td><td style="text-align: left;"><span style="font-family: Helvetica;">Jika sudah memilih item, lalu masuk pada tab&nbsp;</span><span style="font-weight: 700; font-family: Helvetica;">Keranjang</span><br></td></tr><tr><td style="text-align: left;">3.</td><td style="text-align: left;"><span style="font-family: Helvetica;">Pada tab&nbsp;</span><span style="font-family: Helvetica; font-weight: 700;">Keranjang</span><span style="font-family: Helvetica;">&nbsp; anda bisa edit jumlah item yang diinginkan atau menghapus, jika sudah klik&nbsp;</span><span style="font-weight: 700; font-family: Helvetica;">Checkout</span><br></td></tr><tr><td style="text-align: left;">4.</td><td style="text-align: left;"><span style="font-family: Helvetica;">Pada halaman&nbsp;</span><span style="font-weight: 700; font-family: Helvetica;">Checkout&nbsp;</span><span style="font-family: Helvetica;">anda wajib mengisi form untuk pemesanan</span><br></td></tr><tr><td style="text-align: left;">5.</td><td style="text-align: left;"><font face="Helvetica">Jika sudah mengisi form maka anda akan mendapatkan notifikasi berupa&nbsp;<span style="font-weight: 700;">No. Pesanan</span>&nbsp;dll,&nbsp;</font><span style="font-family: Helvetica; line-height: 1.42857;">contoh:</span><span style="font-weight: 700; font-family: Helvetica; line-height: 1.42857;">15</span><span style="font-family: Helvetica; line-height: 1.42857;">, lalu&nbsp;</span><span style="font-weight: 700; font-family: Helvetica; line-height: 1.42857;">Simpan No. pesanan</span><span style="font-family: Helvetica; line-height: 1.42857;">&nbsp;untuk melihat kembali melalui tab&nbsp;</span><span style="font-weight: 700; font-family: Helvetica; line-height: 1.42857;">Cek Pesanan&nbsp;</span><span style="font-family: Helvetica; line-height: 1.42857;">dengan mengisi</span><span style="font-weight: 700; font-family: Helvetica; line-height: 1.42857;">&nbsp;No.Pesanan&nbsp;</span><span style="font-family: Helvetica; line-height: 1.42857;">pada form pencarian yang disediakan</span><br></td></tr><tr><td style="text-align: left;">6.</td><td style="text-align: left;">Selesai.<br></td></tr></tbody></table><p></p><p></p><p style="text-align: justify;"><br></p><p></p><p></p>');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
`id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `tampilkan` enum('Y','N') NOT NULL DEFAULT 'N',
  `tanggal` date DEFAULT NULL,
  `dari` varchar(50) NOT NULL,
  `balas` text NOT NULL,
  `tanggal_balas` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_barang`, `nama`, `email`, `website`, `komentar`, `tampilkan`, `tanggal`, `dari`, `balas`, `tanggal_balas`) VALUES
(1, 2, 'Aditya Radika', 'aditya.radika@gmail.com', 'larfess.com', 'Bagus', 'Y', '2016-06-16', '', '', '2016-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
`id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(75) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `berat` int(11) NOT NULL,
  `total` bigint(11) NOT NULL,
  `totalongkir` bigint(30) NOT NULL,
  `service` varchar(25) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `email`, `hp`, `tanggal`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `alamat`, `berat`, `total`, `totalongkir`, `service`, `status`) VALUES
(1, 'Aditya Radika', 'arrasuli15@gmail.com', '08989898998', '2016-06-24', 'DKI Jakarta', 'Kepulauan Seribu', 'Sukarejo', 'Rawalumbu', '9', 1000, 500000, 515000, 'pos', 'N'),
(2, 'Aditya Radika', 'arrasuli15@gmail.com', '08989898998', '2016-06-24', 'DKI Jakarta', 'Kepulauan Seribu', 'Sukarejo', 'Rawalumbu', 'Test', 1000, 500000, 515000, 'pos', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE IF NOT EXISTS `pesanan_detail` (
`id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `qty` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` bigint(11) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id`, `id_pesanan`, `gambar`, `id_barang`, `nama_barang`, `qty`, `berat`, `harga`, `kategori`) VALUES
(1, 1, 'BhaonX_Skull.jpg', 2, 'Bhaonx', 1, 1000, 500000, 'Fashion'),
(2, 2, 'BhaonX_Skull.jpg', 2, 'Bhaonx', 1, 1000, 500000, 'Fashion');

--
-- Triggers `pesanan_detail`
--
DELIMITER //
CREATE TRIGGER `DEL_PESANAN_DETAIL` AFTER DELETE ON `pesanan_detail`
 FOR EACH ROW BEGIN
 UPDATE barang SET stok=stok+OLD.qty
 WHERE id=OLD.id_barang;
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `STR_PESANAN_DETAIL` AFTER INSERT ON `pesanan_detail`
 FOR EACH ROW BEGIN
 UPDATE barang SET stok=stok-NEW.qty
 WHERE id=NEW.id_barang;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `request_barang`
--

CREATE TABLE IF NOT EXISTS `request_barang` (
`id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(75) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_barang`
--

INSERT INTO `request_barang` (`id`, `nama`, `email`, `gambar`, `kategori`, `keterangan`, `tanggal`, `status`) VALUES
(1, 'Akk', 'aditya.radika@gmail.com', 'js.jpg', 'Kuliner', 'Baju', '2016-06-24', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `resi`
--

CREATE TABLE IF NOT EXISTS `resi` (
`id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id` int(11) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `gambar`) VALUES
(1, '11.jpg'),
(2, '21.jpg'),
(3, '31.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cara_pembelian`
--
ALTER TABLE `cara_pembelian`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
 ADD PRIMARY KEY (`id`), ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id`), ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
 ADD PRIMARY KEY (`id`), ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `request_barang`
--
ALTER TABLE `request_barang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resi`
--
ALTER TABLE `resi`
 ADD PRIMARY KEY (`id`), ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `cara_pembelian`
--
ALTER TABLE `cara_pembelian`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `request_barang`
--
ALTER TABLE `request_barang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `resi`
--
ALTER TABLE `resi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`);

--
-- Constraints for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
ADD CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`);

--
-- Constraints for table `resi`
--
ALTER TABLE `resi`
ADD CONSTRAINT `resi_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
