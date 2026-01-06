-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2025 pada 12.51
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kode_customer` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`kode_customer`, `nama`, `alamat`, `no_hp`) VALUES
('C101', 'Ahmad Fauzi', 'Jl. Melati No. 12, Bekasi', '081234567890'),
('C102', 'Siti Aisyah', 'Perum Griya Indah Blok B3, Karawang', '082145678901'),
('C103', 'Budi Santoso', 'Jl. Kenanga No. 7, Cikarang', '085267890123'),
('C104', 'Rina Marlina', 'Jl. Anggrek No. 21, Tambun', '083812345678'),
('C105', 'Dedi Kurniawan', 'Komplek Permata Biru Blok C5, Cibitung', '081398765432'),
('C106', 'Zidan', 'Tangerang', '089876');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `kode_paket` varchar(10) DEFAULT NULL,
  `qty` decimal(6,2) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `kode_paket`, `qty`, `subtotal`) VALUES
(9, 1, 'P001', 3.50, 24500),
(10, 1, 'P004', 1.00, 25000),
(11, 2, 'P002', 5.00, 50000),
(12, 2, 'P006', 2.00, 40000),
(13, 2, 'P007', 1.00, 35000),
(15, 3, 'P005', 1.00, 30000),
(16, 3, 'P008', 2.00, 80000),
(17, 2, 'P005', 5.00, 150000),
(19, 3, 'P012', 10.00, 150000),
(21, 2, 'P001', 1.00, 7000),
(22, 3, 'P001', 13.00, 91000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `kode_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(100) DEFAULT NULL,
  `jenis` enum('kiloan','satuan') DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`kode_paket`, `nama_paket`, `jenis`, `harga`) VALUES
('P001', 'Cuci Kering Kiloan', 'kiloan', 7000),
('P002', 'Cuci Setrika Kiloan', 'kiloan', 10000),
('P003', 'Setrika Kiloan', 'kiloan', 5000),
('P004', 'Cuci Jas', 'satuan', 25000),
('P005', 'Cuci Bed Cover', 'satuan', 30000),
('P006', 'Cuci Selimut', 'satuan', 20000),
('P007', 'Cuci Sepatu', 'satuan', 35000),
('P008', 'Cuci Karpet', 'satuan', 40000),
('P012', 'Cucian Kotor', 'kiloan', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_customer` varchar(10) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status_cucian` enum('Masuk','Proses','Selesai','Diambil') DEFAULT NULL,
  `status_bayar` enum('Belum Lunas','Lunas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `kode_customer`, `total`, `status_cucian`, `status_bayar`) VALUES
(1, '2025-12-20', 'C101', 49500, 'Masuk', 'Lunas'),
(2, '2025-12-21', 'C102', 282000, 'Proses', 'Belum Lunas'),
(3, '2025-12-22', 'C103', 351000, 'Selesai', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','kasir') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `level`) VALUES
(1, 'Super Admin', 'admin@laundry.com', '$2y$10$N0kA2fXcLhUo0uJ9E9fDruoG5a4LqYkS0bkkCm1cW0wwOxQp6sZ7S', 'admin'),
(2, 'ZIdan', 'zidan@gmail.com', '123456', 'admin'),
(3, 'wayan', 'wayang@gmail.com', '$2y$10$ZDI3a0DPU.U/bizpeDg1be6sAWCu.ljxLQYJFw5Ju7UizOv/LZ2ci', 'admin'),
(4, 'kiki', 'ripqi@gmail.com', '$2y$10$FluGSoREy5kd3IpPg1c8xOJy0F.CL8.wJ5cmUTVwZCJ0eMx31Hzey', 'admin');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vtransaksi_laundry`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vtransaksi_laundry` (
`id_transaksi` int(11)
,`tanggal` date
,`nama_customer` varchar(100)
,`nama_paket` varchar(100)
,`jenis` enum('kiloan','satuan')
,`qty` decimal(6,2)
,`harga` int(11)
,`subtotal` int(11)
,`status_cucian` enum('Masuk','Proses','Selesai','Diambil')
,`status_bayar` enum('Belum Lunas','Lunas')
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vtransaksi_laundry`
--
DROP TABLE IF EXISTS `vtransaksi_laundry`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtransaksi_laundry`  AS SELECT `t`.`id_transaksi` AS `id_transaksi`, `t`.`tanggal` AS `tanggal`, `c`.`nama` AS `nama_customer`, `p`.`nama_paket` AS `nama_paket`, `p`.`jenis` AS `jenis`, `d`.`qty` AS `qty`, `p`.`harga` AS `harga`, `d`.`subtotal` AS `subtotal`, `t`.`status_cucian` AS `status_cucian`, `t`.`status_bayar` AS `status_bayar` FROM (((`transaksi` `t` join `customer` `c` on(`t`.`kode_customer` = `c`.`kode_customer`)) join `detail_transaksi` `d` on(`t`.`id_transaksi` = `d`.`id_transaksi`)) join `paket` `p` on(`d`.`kode_paket` = `p`.`kode_paket`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode_customer`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `kode_paket` (`kode_paket`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`kode_paket`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `kode_customer` (`kode_customer`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`kode_paket`) REFERENCES `paket` (`kode_paket`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_customer`) REFERENCES `customer` (`kode_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
