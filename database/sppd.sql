-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2024 pada 14.37
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_agenda`
--

CREATE TABLE `m_agenda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agenda` text NOT NULL,
  `status` text NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `tempat` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `id_surat` int(11) DEFAULT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `m_agenda`
--

INSERT INTO `m_agenda` (`id`, `agenda`, `status`, `tanggal_mulai`, `tanggal_selesai`, `tempat`, `deskripsi`, `nomor_surat`, `tanggal_surat`, `perihal`, `file`, `id_surat`, `catatan`) VALUES
(1, 'Kegiatan MGMP SMN 1 MOJOWARNO', 'tolak', '2023-12-05 13:21:00', '2023-12-06 15:00:00', 'Probolinggo', 'Tes Coba', '10/21010/01011', '2023-12-15', 'Undangan', 'Keterisian_Monev_November_Tanggal_07-12-2023_Jam_10_30_34.pdf', 2, 'Ok'),
(3, 'Coba agenda', 'proses', '2023-12-15 09:21:00', '2023-12-15 09:21:00', 'Probolinggo', 'Deskripsi', '10/21010/01011', '2023-12-15', 'Undangan', NULL, 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pegawai`
--

CREATE TABLE `m_pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pangkat` text NOT NULL,
  `golongan` text NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `m_pegawai`
--

INSERT INTO `m_pegawai` (`id`, `nip`, `nama`, `pangkat`, `golongan`, `no_hp`, `alamat`, `jabatan`, `tanggal_lahir`, `tempat_lahir`, `pendidikan`, `username`, `password`, `jk`) VALUES
(160, '198610082019012001', 'Hilmi', 'Pangkat', 'Golongan', '081330743342', 'Alamat', 'Jabatan', '2023-12-04', 'Jombang', '', 'user', '202cb962ac59075b964b07152d234b70', 'L'),
(161, '198610082019012001', 'Hidayaturrobi', 'Pangkat', 'asasaa', '081330743342', 'Jalan Pacar, Ketabang 60272, Indonesia', 'Jabatan', '2023-12-05', 'Jombang', '', 'user1', '202cb962ac59075b964b07152d234b70', 'P');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pencairan`
--

CREATE TABLE `m_pencairan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_agenda` int(11) DEFAULT NULL,
  `berangkat` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `jarak` varchar(255) DEFAULT NULL,
  `dana` int(11) DEFAULT NULL,
  `lat_long1` varchar(255) DEFAULT NULL,
  `lat_long2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `m_pencairan`
--

INSERT INTO `m_pencairan` (`id`, `id_agenda`, `berangkat`, `lokasi`, `jarak`, `dana`, `lat_long1`, `lat_long2`) VALUES
(2, 1, 'SMPN 11 Cirebon, Karyamulya, Kota Cirebon, Jawa Barat, Indonesia', 'SMPN 29 BANDUNG, Jalan Geger Arum, Isola, Kota Bandung, Jawa Barat, Indonesia', '158 ', 632000, '-6.746659500000001,108.5285396', '-6.8608011,107.5863855'),
(3, 3, 'Surabaya, Jawa Timur, Indonesia', 'SMP NEGERI 1 JOMBANG, Jalan Pattimura, Sengon, Kabupaten Jombang, Jawa Timur, Indonesia', '81.3 ', 325200, '-7.2574719,112.7520883', '-7.553703400000001,112.2267919');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_penugasan`
--

CREATE TABLE `m_penugasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pegawai` varchar(255) DEFAULT NULL,
  `id_agenda` int(11) DEFAULT NULL,
  `deskripsi_laporan` text DEFAULT NULL,
  `status_laporan` varchar(255) DEFAULT NULL,
  `catatan_laporan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `m_penugasan`
--

INSERT INTO `m_penugasan` (`id`, `id_pegawai`, `id_agenda`, `deskripsi_laporan`, `status_laporan`, `catatan_laporan`) VALUES
(7, '160', 1, '               Deskripsi Hasil Pertemuan :              ', 'setuju', 'setuju'),
(8, '161', 1, NULL, 'setuju', ''),
(9, '160', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_surat_masuk`
--

CREATE TABLE `m_surat_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_surat` varchar(255) DEFAULT NULL,
  `nama_surat` varchar(255) DEFAULT NULL,
  `tgl_surat` varchar(255) DEFAULT NULL,
  `file_surat` varchar(255) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `deskripsi_surat` text DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `m_surat_masuk`
--

INSERT INTO `m_surat_masuk` (`id`, `no_surat`, `nama_surat`, `tgl_surat`, `file_surat`, `perihal`, `deskripsi_surat`, `tempat`) VALUES
(2, '10/21010/01011', 'Nama Surat Masuk', '2023-12-15', 'MGMP_Bin_7_Nov_20233.pdf', 'Undangan', 'sasa', 'Probolinggo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_users`
--

CREATE TABLE `m_users` (
  `admin_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('1','2','3') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `m_users`
--

INSERT INTO `m_users` (`admin_id`, `nama`, `username`, `password`, `level`) VALUES
(4, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'Operator', 'operator', '202cb962ac59075b964b07152d234b70', '2'),
(3, 'bendahara', 'bendahara', '202cb962ac59075b964b07152d234b70', '3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_agenda`
--
ALTER TABLE `m_agenda`
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indeks untuk tabel `m_pegawai`
--
ALTER TABLE `m_pegawai`
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indeks untuk tabel `m_pencairan`
--
ALTER TABLE `m_pencairan`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indeks untuk tabel `m_penugasan`
--
ALTER TABLE `m_penugasan`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indeks untuk tabel `m_surat_masuk`
--
ALTER TABLE `m_surat_masuk`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_agenda`
--
ALTER TABLE `m_agenda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `m_pegawai`
--
ALTER TABLE `m_pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT untuk tabel `m_pencairan`
--
ALTER TABLE `m_pencairan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `m_penugasan`
--
ALTER TABLE `m_penugasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `m_surat_masuk`
--
ALTER TABLE `m_surat_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
