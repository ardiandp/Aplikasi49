-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2022 pada 05.05
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsipan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `kdmapel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nip`, `nis`, `nama_lengkap`, `username`, `password`, `hak_akses`, `kdmapel`) VALUES
(18, 3456, 768, 'gisela pati', 'admin', 'admin', 'admin', 'mengampu'),
(4324, 234, 123, 'james', 'jas', 'jas', 'admin', 'mengampu1'),
(4327, 123, 123, 'wer', 'tesjk', '11', 'anggota', 'sdf'),
(4328, 1234, 12, 'tester', '11', '11', 'kasat', '1'),
(4329, 123456, 1234, 'tefbana', 'hallo', '12345', 'kasat', 'gyhujn'),
(4330, 987, 0, 'kon', '123', '123', 'kasat', '123'),
(4331, 11111, 111111, 'giselas', 'pegawai', '22', 'anggota', 'wertu'),
(4332, 44444, 444, 'gisela putri', 'kasat', 'kasat', 'kasat', 'qwery');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nama_anggota` varchar(11) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_unit`, `nama_anggota`, `jenis_kelamin`, `alamat`, `nohp`, `jabatan`) VALUES
('12', 352, 'JEJE', 'P', 'KDJV', '083', 'JK'),
('8373', 0, 'DKFHJKS', 'L', 'KSHIO', '083', 'JHGDH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `id_detail_laporan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `id_terlapor` int(11) NOT NULL,
  `tindak_pidana` varchar(50) NOT NULL,
  `pasal` varchar(50) NOT NULL,
  `nama_tersangka` varchar(50) NOT NULL,
  `nama_penyidik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`id_detail_laporan`, `id_anggota`, `id_laporan`, `id_terlapor`, `tindak_pidana`, `pasal`, `nama_tersangka`, `nama_penyidik`) VALUES
(346, 6789, 245, 2466, 'dhj', '32', 'dht', 'gdjn'),
(64654, 336, 35346, 53464, 'gdfg', '12 pasal', 'tyrtyrty', 'fgfghf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` varchar(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nama_dokumen` varchar(50) NOT NULL,
  `tahun_dokumen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `id_unit`, `nama_dokumen`, `tahun_dokumen`) VALUES
('12', 352, 'fret', '2003'),
('554545', 0, '2001', ''),
('b 12', 0, '2022', ''),
('b12', 0, '2211', ''),
('b15', 0, '2022', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` varchar(11) NOT NULL,
  `id_unit` varchar(20) NOT NULL,
  `jumlah_kasus` varchar(20) NOT NULL,
  `yang_diselesaikan` varchar(40) NOT NULL,
  `putusan_sidang` varchar(50) NOT NULL,
  `tahun_laporan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_unit`, `jumlah_kasus`, `yang_diselesaikan`, `putusan_sidang`, `tahun_laporan`) VALUES
('35435', '6566', '14', 'kasus cabul', 'bunuh kasi mati', '2022'),
('53454', '352', '13 kasus', '10 kasus', 'sdf', '2020'),
('90', '7767', '3', '1', '2', '2002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `terlapor`
--

CREATE TABLE `terlapor` (
  `id_terlapor` int(11) NOT NULL,
  `nama_terlapor` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `terlapor`
--

INSERT INTO `terlapor` (`id_terlapor`, `nama_terlapor`, `jenis_kelamin`, `tempat`, `tanggal_lahir`, `usia`, `alamat`, `pekerjaan`, `agama`) VALUES
(4643, 'jessika', 'P', 'ende', '2022-11-16', '1', 'JLN. SIRSAK', 'wiraswasta', 'islam'),
(64654, 'vcxvc', 'P', 'fgfggfh', '2022-10-29', '12', 'fhgfh', 'hgf', 'gfdgf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(50) NOT NULL,
  `jumlah_anggota` varchar(20) NOT NULL,
  `kasubnit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`, `jumlah_anggota`, `kasubnit`) VALUES
(352, '', '12-14 orang', 'Hapsan'),
(7767, '', '767', 'dfgfgfgd'),
(5345345, '', '12-13', 'ggggjghgjh'),
(7676767, '', '33', 'vbvbb');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`,`nis`),
  ADD KEY `kdmapel` (`kdmapel`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail_laporan`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD UNIQUE KEY `kdkelas` (`id_unit`);

--
-- Indeks untuk tabel `terlapor`
--
ALTER TABLE `terlapor`
  ADD PRIMARY KEY (`id_terlapor`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4333;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
