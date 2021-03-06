-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 02:37 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koka`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(6) NOT NULL,
  `nama_produk` varchar(20) DEFAULT NULL,
  `jenis` enum('Kopi','Kakao','Bibit Lainnya') DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `satuan` enum('Butir','Batang','Kg','Entres') DEFAULT NULL,
  `harga` int(7) DEFAULT NULL,
  `exp` date DEFAULT NULL,
  `stock` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_produk`, `jenis`, `kategori`, `satuan`, `harga`, `exp`, `stock`) VALUES
('KK0001', 'Propelegitim BP 42 x', 'Kopi', 'Benih Robusta', 'Butir', 500, '2020-12-29', 10000),
('KK0002', 'Hibiro 1', 'Kopi', 'Benih Robusta', 'Butir', 500, '2020-12-29', 10000),
('KK0003', 'Hibiro 2', 'Kopi', 'Benih Robusta', 'Butir', 500, '2020-12-29', 10000),
('KK0004', 'Hibiro 3', 'Kopi', 'Benih Robusta', 'Butir', 500, '2020-12-29', 10000),
('KK0005', 'Lini S795', 'Kopi', 'Benih Kopi Arabika/L', 'Butir', 500, '2020-12-29', 10000),
('KK0006', 'Abisinia 3', 'Kopi', 'Benih Kopi Arabika/L', 'Butir', 500, '2020-12-29', 10000),
('KK0007', 'USDA 762', 'Kopi', 'Benih Kopi Arabika/L', 'Butir', 500, '2020-12-29', 10000),
('KK0008', 'Andungsari 1', 'Kopi', 'Benih Kopi Arabika/L', 'Butir', 500, '2020-12-29', 10000),
('KK0009', 'Sigararutang', 'Kopi', 'Benih Kopi Arabika/L', 'Butir', 500, '2020-12-29', 10000),
('KK0010', 'Gayo 1', 'Kopi', 'Benih Kopi Arabika/L', 'Butir', 500, '2020-12-29', 10000),
('KK0011', 'Gayo 2', 'Kopi', 'Benih Kopi Arabika/L', 'Butir', 500, '2020-12-29', 10000),
('KK0012', 'Komasti', 'Kopi', 'Benih Kopi Arabika/L', 'Butir', 500, '2020-12-29', 10000),
('KK0013', 'LIBTUKOM', 'Kopi', 'Benih Kopi Arabika/L', 'Butir', 500, '2020-12-29', 10000),
('KK0014', 'ICCRI 06H', 'Kakao', 'Benih Kakao', 'Butir', 800, '2020-12-29', 12000),
('KK0015', 'ICCRI 08H', 'Kakao', 'Benih Kakao', 'Butir', 500, '2020-12-29', 12000),
('KK0016', 'MCC 02', 'Kakao', 'Bibit Kakao PCC', 'Batang', 6000, '2020-12-29', 12000),
('KK0017', 'MCC 01', 'Kakao', 'Bibit Kakao PCC', 'Batang', 6000, '2020-12-29', 12000),
('KK0018', 'SULAWESI 1', 'Kakao', 'Bibit Kakao PCC', 'Batang', 6000, '2020-12-29', 12000),
('KK0019', 'SULAWESI 2', 'Kakao', 'Bibit Kakao PCC', 'Batang', 6000, '2020-12-29', 12000),
('KK0020', 'ICCRI 09', 'Kakao', 'Bibit Kakao PCC', 'Batang', 6000, '2020-12-29', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customers` varchar(6) NOT NULL,
  `nama_customers` varchar(30) NOT NULL,
  `nama_perusahaan` varchar(30) NOT NULL,
  `alamat` tinytext NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat_perusahaan` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customers`, `nama_customers`, `nama_perusahaan`, `alamat`, `no_telp`, `alamat_perusahaan`) VALUES
('CS0001', 'liu', 'koi', 'qwerty', '567890', 'asdfg'),
('CS0002', 'koko', 'koi', 'koikij', '124', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_det_pemesanan` int(11) NOT NULL,
  `id_pemesanan` varchar(14) DEFAULT NULL,
  `id_barang` varchar(6) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `exp` date DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_det_pemesanan`, `id_pemesanan`, `id_barang`, `qty`, `exp`, `harga`, `subtotal`) VALUES
(1, 'lop', 'KK0002', 145, '2020-11-06', 900, 130500),
(2, 'momon', 'KK0002', 145, '2020-11-06', 900, 130500),
(3, 'luda', 'KK0002', 145, '2020-11-06', 900, 130500),
(4, 'luda', 'KK0001', 245, '2020-11-06', 500, 122500),
(5, 'lo-01', 'KK0001', 20, '2020-11-06', 500, 10000),
(6, 'lo-01', 'KK0002', 9000, '2020-11-06', 900, 8100000),
(7, 'JL-01', 'KK0003', 200, '2020-11-06', 500, 100000),
(8, 'JL-01', 'KK0001', 9000, '2020-11-06', 500, 4500000),
(9, 'JL-01', 'KK0002', 1000, '2020-11-06', 900, 900000),
(10, 'po01', 'KK0003', 129, '2020-11-12', 500, 64500),
(11, 'lok', 'KK0003', 1200, '2020-11-13', 500, 600000),
(12, 'lok', 'KK0002', 2000, '2020-11-13', 900, 1800000),
(13, 'lokp', 'KK0002', 1200, '2020-11-20', 900, 1080000),
(14, 'lokp', 'KK0001', 1000, '2020-11-20', 500, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(14) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `potongan` int(11) DEFAULT NULL,
  `total_tagihan` int(11) DEFAULT NULL,
  `term_1` varchar(50) NOT NULL,
  `term_2` varchar(50) NOT NULL,
  `term_3` varchar(50) NOT NULL,
  `status` enum('Lunas','Belum Lunas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tanggal_pembayaran`, `potongan`, `total_tagihan`, `term_1`, `term_2`, `term_3`, `status`) VALUES
('kiku', '2020-12-15', 4, 5499996, 'Resep Mie Pangsit Khas Jember.jpg', '', '', NULL),
('kjh', '2020-12-14', 2000, 226000, 'pecel4.jpg', '', '', 'Lunas'),
('lk', '1970-01-01', 2000, 8109996, '', 'pecel4.jpg', '', NULL),
('ll', '1970-01-01', 0, 0, '', 'pecel4.jpg', '', NULL),
('niu', '2020-12-15', 20000, 208000, 'pecel4.jpg', 'pecel4.jpg', '', 'Lunas'),
('pp', '1970-01-01', 0, 0, '', 'pecel4.jpg', 'pecel4.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(14) NOT NULL,
  `id_customers` varchar(6) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_customers`, `tanggal`, `total_harga`) VALUES
('11', 'CS0002', '1970-01-01', 0),
('12', 'CS0001', '1970-01-01', 0),
('JL-01', 'CS0001', '2020-11-05', 5500000),
('lo-01', 'CS0001', '2020-11-06', 8110000),
('lok', 'CS0001', '2020-11-13', 2400000),
('lokp', 'CS0001', '2020-11-20', 1580000),
('loloko', 'CS0001', '1970-01-01', 0),
('lop', 'CS0001', '2020-11-06', 228000),
('luda', 'CS0001', '2020-11-06', 253000),
('momon', 'CS0001', '2020-11-06', 228000),
('po01', 'CS0002', '2020-11-12', 64500);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(4) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`) VALUES
('US01', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customers`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_det_pemesanan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_customers` (`id_customers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_det_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
