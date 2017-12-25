-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Des 2017 pada 14.08
-- Versi Server: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `IdGolongan` int(11) NOT NULL,
  `KodeGolongan` char(4) NOT NULL,
  `Golongan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`IdGolongan`, `KodeGolongan`, `Golongan`) VALUES
(1, 'yad', 'agak waras'),
(2, '0w', 'Kb'),
(3, '3DS', 'sdsdds'),
(4, '3DG', 'sadsd'),
(5, 'SE3', 'Golongan'),
(6, 'SE2', 'Golongan'),
(7, 'SE2', 'Golongan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `kd_jbt` char(2) NOT NULL,
  `nama_jbt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`kd_jbt`, `nama_jbt`) VALUES
('01', 'Ketu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `IdObat` int(11) NOT NULL,
  `IdGolongan` int(11) NOT NULL,
  `NamaObat` varchar(30) NOT NULL,
  `StokObat` int(11) NOT NULL,
  `HargaSatuan` int(11) NOT NULL,
  `TanggalKadaluarsa` date NOT NULL,
  `KodeObat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`IdObat`, `IdGolongan`, `NamaObat`, `StokObat`, `HargaSatuan`, `TanggalKadaluarsa`, `KodeObat`) VALUES
(39, 2, 'xxxxxx1', 432, 2323, '2017-09-01', '2Da'),
(40, 1, 'aaaaaa', 32, 23, '2017-09-01', '2Da'),
(42, 1, 'Rizki', 23, 2323, '2017-09-01', 'y00041'),
(43, 2, 'Obat Kb', 20, 100, '2017-11-16', '0w00043');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pgw` varchar(30) NOT NULL,
  `jenis_kel` enum('L','P') NOT NULL,
  `kode_jbt` char(2) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pgw`, `jenis_kel`, `kode_jbt`, `alamat`) VALUES
(1, 'Joko', 'L', '01', 'Jogj');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `IdPembelian` int(11) NOT NULL,
  `TanggalPembelian` date NOT NULL,
  `IdSupplier` char(4) NOT NULL,
  `TotalHargaBeli` int(11) NOT NULL,
  `TotalJumlahObat` int(11) NOT NULL,
  `StatusPembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`IdPembelian`, `TanggalPembelian`, `IdSupplier`, `TotalHargaBeli`, `TotalJumlahObat`, `StatusPembelian`) VALUES
(117, '2017-12-15', '1', 404292, 9, 0),
(118, '2017-12-15', '1', 260000, 3, 0),
(119, '2017-12-15', '1', 260000, 3, 0),
(120, '2017-12-16', '1', 120000, 12, 0),
(121, '2017-12-23', '2', 110000, 9, 0),
(122, '2017-12-21', '2', 2090000, 70, 0),
(123, '2017-12-28', '2', 14735540, 35, 0),
(124, '2017-12-28', '2', 14735540, 35, 0),
(125, '2017-12-21', '1', 2444440, 8, 0),
(126, '2017-12-21', '1', 2444440, 8, 0),
(127, '2017-12-21', '1', 400000, 1, 0),
(128, '2017-12-15', '', 18000, 3, 0),
(129, '2017-12-22', '2', 30, 6, 0),
(130, '2017-12-22', '2', 15000, 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeliandetail`
--

CREATE TABLE `pembeliandetail` (
  `IdDetailPembelian` int(11) NOT NULL,
  `IdPembelian` int(11) NOT NULL,
  `IdObat` int(11) NOT NULL,
  `JumlahObat` int(11) NOT NULL,
  `HargaPembelian` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembeliandetail`
--

INSERT INTO `pembeliandetail` (`IdDetailPembelian`, `IdPembelian`, `IdObat`, `JumlahObat`, `HargaPembelian`, `Status`) VALUES
(6, 117, 39, 4, 32323, 0),
(7, 117, 42, 4, 55000, 0),
(8, 118, 39, 1, 200000, 0),
(9, 118, 42, 2, 30000, 0),
(10, 119, 39, 1, 200000, 0),
(11, 119, 42, 2, 30000, 0),
(12, 120, 39, 12, 10000, 0),
(13, 120, 42, 4, 20000, 0),
(16, 122, 42, 30, 3000, 0),
(17, 122, 43, 40, 50000, 0),
(18, 0, 40, 2, 3333, 0),
(19, 0, 42, 4, 55666, 0),
(22, 121, 42, 4, 20000, 0),
(24, 121, 43, 5, 6000, 0),
(25, 0, 40, 2, 3, 0),
(26, 0, 40, 4, 6, 0),
(27, 130, 40, 3, 5000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `IdPenjualan` int(11) NOT NULL,
  `TanggalJual` date NOT NULL,
  `IdPegawai` int(11) NOT NULL,
  `TotalHargaJual` int(11) NOT NULL,
  `TotalJumlahObat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`IdPenjualan`, `TanggalJual`, `IdPegawai`, `TotalHargaJual`, `TotalJumlahObat`) VALUES
(8, '0000-00-00', 0, 1000, 3),
(9, '0000-00-00', 0, 1000, 3),
(10, '0000-00-00', 0, 1000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualandetail`
--

CREATE TABLE `penjualandetail` (
  `IdDetailJual` int(11) NOT NULL,
  `IdPenjualan` int(11) NOT NULL,
  `IdObat` int(11) NOT NULL,
  `JumlahObat` int(11) NOT NULL,
  `HargaSatuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualandetail`
--

INSERT INTO `penjualandetail` (`IdDetailJual`, `IdPenjualan`, `IdObat`, `JumlahObat`, `HargaSatuan`) VALUES
(1, 10, 39, 3, 2323);

-- --------------------------------------------------------

--
-- Struktur dari tabel `persediaan`
--

CREATE TABLE `persediaan` (
  `IdPersediaan` int(11) NOT NULL,
  `TanggalTransaksi` date NOT NULL,
  `Transaksi` enum('keluar','masuk','saldo') NOT NULL,
  `Kualitas` int(11) NOT NULL,
  `HargaSatuan` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `NomorDetailPenjualan` int(11) NOT NULL,
  `NomorDetailPembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `IdSupplier` int(11) NOT NULL,
  `NamaSupplier` varchar(30) NOT NULL,
  `NomorTelepon` varchar(14) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`IdSupplier`, `NamaSupplier`, `NomorTelepon`, `Status`, `Alamat`) VALUES
(1, 'Joko', '+6281327206692', 1, 'Jalan R.A.Kartini No. 9, RT. 10 / RW. 4, Cilandak Barat, Cilandak, RT.10/RW.4, Cilandak Bar., Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12440'),
(2, 'Joko Supprapto', '+6281327206692', 0, 'Jalan R.A.Kartini No. 9, RT. 10 / RW. 4, Cilandak Barat, Cilandak, RT.10/RW.4, Cilandak Bar., Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12440'),
(3, 'Supplier Baru', '098888', 0, 'ok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`) VALUES
(1, 'ngadimin', '5449ccea16d1cc73990727cd835e45b5', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`IdGolongan`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`IdObat`),
  ADD KEY `obat_ibfk_1` (`IdGolongan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`IdPembelian`);

--
-- Indexes for table `pembeliandetail`
--
ALTER TABLE `pembeliandetail`
  ADD PRIMARY KEY (`IdDetailPembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`IdPenjualan`);

--
-- Indexes for table `penjualandetail`
--
ALTER TABLE `penjualandetail`
  ADD PRIMARY KEY (`IdDetailJual`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`IdPersediaan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`IdSupplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `IdGolongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `IdObat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `IdPembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `pembeliandetail`
--
ALTER TABLE `pembeliandetail`
  MODIFY `IdDetailPembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `IdPenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `penjualandetail`
--
ALTER TABLE `penjualandetail`
  MODIFY `IdDetailJual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `IdPersediaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `IdSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`IdGolongan`) REFERENCES `golongan` (`IdGolongan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
