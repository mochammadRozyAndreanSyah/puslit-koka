-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 06:53 AM
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
('KK0001', 'hibiro 1', 'Kopi', 'arabika', 'Butir', 500, '2020-10-19', 10000),
('KK0002', 'hibiro 2', 'Kopi', 'liberika', 'Butir', 900, '2020-10-20', 120);

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
  MODIFY `id_det_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_customers`) REFERENCES `customers` (`id_customers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
