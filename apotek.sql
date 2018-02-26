-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Feb 2018 pada 08.53
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
-- Struktur dari tabel `apotik`
--

CREATE TABLE `apotik` (
  `IdApotik` int(11) NOT NULL,
  `NamaApotik` varchar(255) NOT NULL,
  `AlamatApotik` varchar(255) NOT NULL,
  `IdKota` int(11) NOT NULL,
  `NoRekening` varchar(20) NOT NULL,
  `NamaPemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `IdBank` int(11) NOT NULL,
  `NamaBank` varchar(255) NOT NULL,
  `JenisKartu` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayarpembelian`
--

CREATE TABLE `bayarpembelian` (
  `IdPembayaranPembelian` int(11) NOT NULL,
  `IdPembelian` int(11) NOT NULL,
  `TanggalPembayaran` date NOT NULL,
  `TotalBayar` int(11) NOT NULL,
  `JenisPembayaran` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailracik`
--

CREATE TABLE `detailracik` (
  `IdDetailRacik` int(11) NOT NULL,
  `IdRacik` int(11) NOT NULL,
  `IdObat` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `group`
--

CREATE TABLE `group` (
  `idGroup` int(11) NOT NULL,
  `NamaGroup` varchar(255) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Struktur dari tabel `jenisracikan`
--

CREATE TABLE `jenisracikan` (
  `IdJenisRacikan` int(11) NOT NULL,
  `NamaRacikan` varchar(255) NOT NULL,
  `Biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `idKaryawan` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `JenisKelamin` enum('0','1') NOT NULL,
  `NoTelepon` varchar(255) NOT NULL,
  `NoTeleponDarurat` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `IsApoteker` int(11) NOT NULL,
  `NoRegistrasiApoteker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `IdKategori` int(11) NOT NULL,
  `KodeKategori` char(4) NOT NULL,
  `NamaKategori` varchar(30) NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`IdKategori`, `KodeKategori`, `NamaKategori`, `Keterangan`) VALUES
(1, 'yad', 'agak waras', ''),
(2, '0w', 'Kb', ''),
(3, '3DS', 'sdsdds', ''),
(4, '3DG', 'sadsd', ''),
(5, 'SE3', 'Golongan', ''),
(6, 'SE2', 'Golongan', ''),
(7, 'SE2', 'Golongan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `IdKota` int(11) NOT NULL,
  `NamaKota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `IdObat` int(11) NOT NULL,
  `IdKategori` int(11) NOT NULL,
  `NamaObat` varchar(30) NOT NULL,
  `StokObat` int(11) NOT NULL,
  `HargaSatuan` int(11) NOT NULL,
  `TanggalKadaluarsa` date NOT NULL,
  `KodeObat` varchar(25) NOT NULL,
  `IdSatuan` int(11) NOT NULL,
  `StokMinimal` int(11) NOT NULL,
  `StokMaximal` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pajak`
--

CREATE TABLE `pajak` (
  `IdPajak` int(11) NOT NULL,
  `NamaPajak` varchar(255) NOT NULL,
  `BesarPajak` int(11) NOT NULL,
  `Status` enum('0','1') NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Status` int(11) NOT NULL,
  `Tanggalkadaluarsa` date NOT NULL,
  `HargaBeli` int(11) NOT NULL,
  `HargaPokok` int(11) NOT NULL,
  `HargaJualUmum` int(11) NOT NULL,
  `Laba` int(11) NOT NULL,
  `HargaJualDokter` int(11) NOT NULL,
  `HargaJualResep` int(11) NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `IdPenjualan` int(11) NOT NULL,
  `TanggalJual` date NOT NULL,
  `IdPegawai` int(11) NOT NULL,
  `TotalHargaJual` int(11) NOT NULL,
  `TotalJumlahObat` int(11) NOT NULL,
  `JenisPenjualan` enum('1','2','3') NOT NULL,
  `TotalPembayaran` int(11) NOT NULL,
  `IdPajak` int(11) NOT NULL,
  `JumlahPajak` int(11) NOT NULL,
  `Bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualandetail`
--

CREATE TABLE `penjualandetail` (
  `IdDetailJual` int(11) NOT NULL,
  `IdPenjualan` int(11) NOT NULL,
  `IdObat` int(11) NOT NULL,
  `JumlahObat` int(11) NOT NULL,
  `HargaSatuan` int(11) NOT NULL,
  `Diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Struktur dari tabel `priode`
--

CREATE TABLE `priode` (
  `IdPeriode` int(11) NOT NULL,
  `NamaPriode` varchar(255) NOT NULL,
  `TanggalMulai` date NOT NULL,
  `TanggalAkhir` date NOT NULL,
  `Status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `racik`
--

CREATE TABLE `racik` (
  `IdRacik` int(11) NOT NULL,
  `IdJenisRacikan` int(11) NOT NULL,
  `HargaRacik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `IdSatuan` int(11) NOT NULL,
  `NamaSatuan` varchar(255) NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokopname`
--

CREATE TABLE `stokopname` (
  `IdStokOpname` int(11) NOT NULL,
  `idObat` int(11) NOT NULL,
  `StokOpname` int(11) NOT NULL
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
  `Alamat` text NOT NULL,
  `NoHp` varchar(20) NOT NULL,
  `ContactPerson` varchar(25) NOT NULL,
  `IdBank` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `IdKota` int(11) NOT NULL,
  `Website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apotik`
--
ALTER TABLE `apotik`
  ADD PRIMARY KEY (`IdApotik`),
  ADD KEY `IdKota` (`IdKota`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`IdBank`);

--
-- Indexes for table `bayarpembelian`
--
ALTER TABLE `bayarpembelian`
  ADD PRIMARY KEY (`IdPembayaranPembelian`),
  ADD KEY `IdPembelian` (`IdPembelian`);

--
-- Indexes for table `detailracik`
--
ALTER TABLE `detailracik`
  ADD PRIMARY KEY (`IdDetailRacik`),
  ADD KEY `IdRacik` (`IdRacik`),
  ADD KEY `IdObat` (`IdObat`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`idGroup`);

--
-- Indexes for table `jenisracikan`
--
ALTER TABLE `jenisracikan`
  ADD PRIMARY KEY (`IdJenisRacikan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idKaryawan`),
  ADD KEY `idGroup` (`idGroup`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`IdKategori`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`IdKota`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`IdObat`),
  ADD KEY `obat_ibfk_1` (`IdKategori`),
  ADD KEY `IdSatuan` (`IdSatuan`);

--
-- Indexes for table `pajak`
--
ALTER TABLE `pajak`
  ADD PRIMARY KEY (`IdPajak`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`IdPembelian`);

--
-- Indexes for table `pembeliandetail`
--
ALTER TABLE `pembeliandetail`
  ADD PRIMARY KEY (`IdDetailPembelian`),
  ADD KEY `IdPembelian` (`IdPembelian`),
  ADD KEY `IdObat` (`IdObat`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`IdPenjualan`),
  ADD KEY `IdPajak` (`IdPajak`);

--
-- Indexes for table `penjualandetail`
--
ALTER TABLE `penjualandetail`
  ADD PRIMARY KEY (`IdDetailJual`),
  ADD KEY `IdPenjualan` (`IdPenjualan`),
  ADD KEY `IdObat` (`IdObat`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`IdPersediaan`);

--
-- Indexes for table `priode`
--
ALTER TABLE `priode`
  ADD PRIMARY KEY (`IdPeriode`);

--
-- Indexes for table `racik`
--
ALTER TABLE `racik`
  ADD PRIMARY KEY (`IdRacik`),
  ADD KEY `IdJenisRacikan` (`IdJenisRacikan`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`IdSatuan`);

--
-- Indexes for table `stokopname`
--
ALTER TABLE `stokopname`
  ADD PRIMARY KEY (`IdStokOpname`),
  ADD KEY `idObat` (`idObat`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`IdSupplier`),
  ADD KEY `IdBank` (`IdBank`),
  ADD KEY `IdKota` (`IdKota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apotik`
--
ALTER TABLE `apotik`
  MODIFY `IdApotik` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `IdBank` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bayarpembelian`
--
ALTER TABLE `bayarpembelian`
  MODIFY `IdPembayaranPembelian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detailracik`
--
ALTER TABLE `detailracik`
  MODIFY `IdDetailRacik` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `idGroup` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenisracikan`
--
ALTER TABLE `jenisracikan`
  MODIFY `IdJenisRacikan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idKaryawan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `IdKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `IdKota` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `IdObat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `pajak`
--
ALTER TABLE `pajak`
  MODIFY `IdPajak` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `IdPenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `penjualandetail`
--
ALTER TABLE `penjualandetail`
  MODIFY `IdDetailJual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `IdPersediaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `racik`
--
ALTER TABLE `racik`
  MODIFY `IdRacik` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `IdSatuan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stokopname`
--
ALTER TABLE `stokopname`
  MODIFY `IdStokOpname` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `IdSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `apotik`
--
ALTER TABLE `apotik`
  ADD CONSTRAINT `apotik_ibfk_1` FOREIGN KEY (`IdKota`) REFERENCES `kota` (`IdKota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bayarpembelian`
--
ALTER TABLE `bayarpembelian`
  ADD CONSTRAINT `bayarpembelian_ibfk_1` FOREIGN KEY (`IdPembelian`) REFERENCES `pembelian` (`IdPembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detailracik`
--
ALTER TABLE `detailracik`
  ADD CONSTRAINT `detailracik_ibfk_1` FOREIGN KEY (`IdRacik`) REFERENCES `racik` (`IdRacik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailracik_ibfk_2` FOREIGN KEY (`IdObat`) REFERENCES `obat` (`IdObat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`idGroup`) REFERENCES `group` (`idGroup`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`IdKategori`) REFERENCES `kategori` (`IdKategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obat_ibfk_2` FOREIGN KEY (`IdSatuan`) REFERENCES `satuan` (`IdSatuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembeliandetail`
--
ALTER TABLE `pembeliandetail`
  ADD CONSTRAINT `pembeliandetail_ibfk_1` FOREIGN KEY (`IdPembelian`) REFERENCES `pembelian` (`IdPembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembeliandetail_ibfk_2` FOREIGN KEY (`IdObat`) REFERENCES `obat` (`IdObat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`IdPajak`) REFERENCES `pajak` (`IdPajak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualandetail`
--
ALTER TABLE `penjualandetail`
  ADD CONSTRAINT `penjualandetail_ibfk_1` FOREIGN KEY (`IdObat`) REFERENCES `obat` (`IdObat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualandetail_ibfk_2` FOREIGN KEY (`IdPenjualan`) REFERENCES `penjualan` (`IdPenjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `racik`
--
ALTER TABLE `racik`
  ADD CONSTRAINT `racik_ibfk_1` FOREIGN KEY (`IdJenisRacikan`) REFERENCES `jenisracikan` (`IdJenisRacikan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stokopname`
--
ALTER TABLE `stokopname`
  ADD CONSTRAINT `stokopname_ibfk_1` FOREIGN KEY (`idObat`) REFERENCES `obat` (`IdObat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`IdKota`) REFERENCES `kota` (`IdKota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_ibfk_2` FOREIGN KEY (`IdBank`) REFERENCES `bank` (`IdBank`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
