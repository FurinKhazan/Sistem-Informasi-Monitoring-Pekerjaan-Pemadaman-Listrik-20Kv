-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 11:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pekerjaan_terencana`
--

-- --------------------------------------------------------

--
-- Table structure for table `gardu_induk`
--

CREATE TABLE `gardu_induk` (
  `id_gi` int(11) NOT NULL,
  `nama_gardu` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jml_trafo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gardu_induk`
--

INSERT INTO `gardu_induk` (`id_gi`, `nama_gardu`, `alamat`, `jml_trafo`) VALUES
(2, 'GI WONOSARIs', 'Jl. Wonosari - Pakis No.11, Babadan, Teloyo, Kec. Wonosari, Kabupaten Klaten, Jawa Tengah 57473', 3),
(3, 'GI WONOGIRI', 'Kedung Sono, Bulusulur, Kec. Wonogiri, Kabupaten Wonogiri, Jawa Tengah 57615', 3),
(4, 'GI NGUNTORONADI', 'Tukluk, Kulurejo, Nguntoronadi, Kabupaten Wonogiri, Jawa Tengah 57671', 1),
(6, 'GI JAJAR', 'Jajar', 3),
(7, 'GI MANGKUNEGARAN', 'jl.mangkunegaran', 2),
(10, 'GI SOLOBARU', 'Solobaru grogol skh', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `ulp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `email`, `jabatan`, `posisi`, `ulp`) VALUES
(9, '1129102', 'Antoni Martial ', 'martial@gmail.com', 'Staff', 'Staff Ugensi Publik', 'UP3 SUKOHARJO'),
(23, '1112', 'Erwin Dwi Astono', 'erwin@gmail.com', 'Staff', 'Staff Pengadaan Barang', 'ULP PALUR'),
(24, '2222', 'Dicky Kurniawan', 'ishigami@gmail.com', 'Staff', 'Staff Jaringan Distribusi', 'ULP SUKOJARHJO'),
(30, '92992', 'wahyu', 'sdsd@c.com', 'Pimpinan', 'Manajer Bidang Jaringan UP3', 'UP3 SUKOHARJO'),
(31, '1109', 'Kazuto Kirigaya', 'kirito@gmail.com', 'Dispatcher', 'Dispatcher', 'UP3 SUKOHARJO'),
(33, '1111', 'budi', 'HASAN@BAKSO.COM', 'Staff', 'Staff Transaksi Energi ULP Grogol', 'ULP GROGOL'),
(34, '11341', 'Markus Raspot', 'raspot@pln.co.id', 'Staff', 'Staff PDKB', 'UP3 SUKOHARJO'),
(35, '110190', 'Bruno Fernandes', 'bruno@pln.co.id', 'Staff', 'Staff K2K3 PLN', 'UP3 SUKOHARJO'),
(36, '1011921', 'Muhammad Ali', 'ali@pln.co.id', 'Staff', 'staff teknik up3', 'UP3 SUKOHARJO'),
(37, '101198', ' MUHAMMAD SALAH', 'muh.salah@pln.co.id', 'Staff', 'Staff Jaringan', 'ULP KARANGANYAR');

-- --------------------------------------------------------

--
-- Table structure for table `penyulang`
--

CREATE TABLE `penyulang` (
  `id_penyulang` int(11) NOT NULL,
  `nama_penyulang` varchar(50) NOT NULL,
  `id_gi` int(11) NOT NULL,
  `kms` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyulang`
--

INSERT INTO `penyulang` (`id_penyulang`, `nama_penyulang`, `id_gi`, `kms`) VALUES
(18, 'WSI.11', 2, 20),
(22, 'WNI.2', 3, 15),
(29, 'WNI.10', 3, 41),
(34, 'WSI.2', 2, 35),
(36, 'JJR.6', 6, 15),
(38, 'JJR.5', 6, 10),
(40, 'MKN.9', 7, 6),
(41, 'MKN.2', 7, 18),
(42, 'NTI.3', 4, 42),
(43, 'PLR.16', 7, 30);

-- --------------------------------------------------------

--
-- Table structure for table `status_pekerjaan`
--

CREATE TABLE `status_pekerjaan` (
  `id_status` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `status_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pekerjaan`
--

INSERT INTO `status_pekerjaan` (`id_status`, `status`, `status_id`) VALUES
(1, 'Disetujui', 1),
(2, 'Ditolak', 3),
(3, 'Ditunda', 2),
(4, 'Selesai', 4),
(5, 'Dicek', 5),
(6, 'Belum Dicek', 6),
(7, 'Akan Dikerjakan', 7),
(8, 'Dalam Proses', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pekerjaanselesai`
--

CREATE TABLE `tb_pekerjaanselesai` (
  `id_selesai` int(11) NOT NULL,
  `id_ijin` int(11) NOT NULL,
  `id_penyulang` int(11) NOT NULL,
  `id_ulp` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_mohon` int(11) NOT NULL,
  `jam_padam` time NOT NULL,
  `jam_nyala` time NOT NULL,
  `progres` int(11) NOT NULL,
  `id_progres1` int(1) NOT NULL,
  `id_progres2` int(1) NOT NULL,
  `id_progres3` int(1) NOT NULL,
  `id_progres4` int(1) NOT NULL,
  `id_progres5` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pekerjaanselesai`
--

INSERT INTO `tb_pekerjaanselesai` (`id_selesai`, `id_ijin`, `id_penyulang`, `id_ulp`, `id_vendor`, `id_pegawai`, `id_status`, `id_mohon`, `jam_padam`, `jam_nyala`, `progres`, `id_progres1`, `id_progres2`, `id_progres3`, `id_progres4`, `id_progres5`) VALUES
(20, 58, 29, 3, 1, 35, 4, 48, '08:00:00', '13:00:00', 100, 0, 0, 0, 0, 0),
(23, 66, 18, 5, 8, 31, 4, 50, '09:00:00', '12:00:00', 100, 5, 35, 25, 10, 25),
(24, 67, 29, 2, 1, 24, 4, 52, '09:00:00', '13:00:00', 100, 5, 35, 25, 10, 25),
(25, 71, 22, 2, 1, 34, 4, 55, '00:00:00', '01:00:00', 100, 5, 35, 25, 10, 25),
(26, 73, 18, 1, 1, 24, 4, 54, '00:00:00', '00:00:00', 100, 5, 35, 25, 10, 25),
(27, 74, 34, 3, 2, 24, 4, 56, '09:00:00', '15:00:00', 100, 5, 35, 25, 10, 25),
(28, 72, 43, 5, 1, 35, 8, 53, '09:00:00', '00:00:00', 5, 5, 0, 0, 0, 0),
(29, 75, 43, 5, 5, 36, 8, 57, '09:00:00', '00:00:00', 40, 5, 35, 0, 0, 0),
(30, 76, 22, 5, 1, 9, 7, 58, '00:00:00', '00:00:00', 0, 0, 0, 0, 0, 0),
(31, 78, 29, 4, 2, 37, 4, 61, '09:00:00', '13:00:00', 100, 5, 35, 25, 10, 25),
(32, 80, 18, 2, 9, 34, 4, 62, '09:00:00', '13:00:00', 100, 5, 35, 25, 10, 25);

-- --------------------------------------------------------

--
-- Table structure for table `tb_perijinan`
--

CREATE TABLE `tb_perijinan` (
  `id_ijin` int(11) NOT NULL,
  `id_mohon` int(11) NOT NULL,
  `id_penyulang` int(11) NOT NULL,
  `id_ulp` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_perijinan`
--

INSERT INTO `tb_perijinan` (`id_ijin`, `id_mohon`, `id_penyulang`, `id_ulp`, `id_vendor`, `id_pegawai`, `id_status`) VALUES
(46, 39, 22, 3, 2, 34, 7),
(52, 44, 42, 4, 4, 9, 7),
(54, 45, 38, 1, 1, 31, 2),
(58, 48, 29, 3, 1, 35, 7),
(61, 49, 34, 3, 1, 23, 2),
(62, 49, 34, 3, 1, 23, 7),
(66, 50, 18, 5, 8, 31, 7),
(67, 52, 29, 2, 1, 24, 7),
(71, 55, 22, 2, 1, 34, 7),
(72, 53, 43, 5, 1, 35, 7),
(73, 54, 18, 1, 1, 24, 7),
(74, 56, 34, 3, 2, 24, 7),
(75, 57, 43, 5, 5, 36, 7),
(76, 58, 22, 5, 1, 9, 7),
(78, 61, 29, 4, 2, 37, 7),
(79, 60, 18, 1, 1, 23, 1),
(80, 62, 18, 2, 9, 34, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_permohonan`
--

CREATE TABLE `tb_permohonan` (
  `id_mohon` int(11) NOT NULL,
  `id_ulp` int(11) NOT NULL,
  `id_penyulang` int(11) NOT NULL,
  `tanggal_pekerjaan` date NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `pekerjaan` varchar(256) NOT NULL,
  `daerah_padam` varchar(500) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_permohonan`
--

INSERT INTO `tb_permohonan` (`id_mohon`, `id_ulp`, `id_penyulang`, `tanggal_pekerjaan`, `id_vendor`, `id_pegawai`, `pekerjaan`, `daerah_padam`, `id_status`) VALUES
(39, 3, 22, '2020-07-27', 2, 34, 'PERBAIKAN TIANG ROBOH', '', 5),
(44, 4, 42, '2020-07-29', 4, 9, 'PENGUATAN JARINGAN BARU DI PT.NESIA', '', 5),
(45, 1, 38, '2020-07-02', 1, 35, 'POTONG POHON', '', 5),
(48, 3, 29, '2020-07-30', 1, 35, 'PERBAIKAN JARINGAN PUTUS DI PT.SRITEX', '', 5),
(49, 3, 40, '2020-07-03', 8, 23, 'cek isi pekerjaan', '', 5),
(50, 2, 18, '2020-08-27', 8, 31, 'UPGRADE TRAFO 1 GI WONOSARI', '', 5),
(52, 2, 29, '2020-08-24', 1, 31, 'wewewewewewe', '', 5),
(53, 5, 43, '2020-08-31', 1, 35, 'PEMAASANGAN RECLOSER LAMA', '', 5),
(54, 1, 18, '2020-08-20', 1, 24, 'PBSD', '', 5),
(55, 2, 22, '2020-08-31', 1, 34, 'PB', '', 5),
(56, 3, 34, '2020-09-01', 2, 24, 'PERBAIKAN TRAFO TERBAKAR API CEMBURU', '', 5),
(57, 5, 43, '2020-09-10', 5, 36, 'PERBAIKAN TIANG ROBOH DI POLE T3-113/2 ', '', 5),
(58, 5, 22, '2020-08-25', 1, 9, 'PFK', '', 5),
(59, 3, 42, '2020-08-30', 3, 24, 'PFK 2', '', 6),
(60, 1, 18, '2020-08-31', 1, 23, 'PEKERJAAN PERBAIKAN TIANG ROBOH', '', 5),
(61, 4, 29, '2020-08-31', 2, 37, 'PERBAIKAN TIANG ROBOH DI POLE WNI.10-45', '', 5),
(62, 2, 18, '2020-09-30', 9, 34, 'PEKERJAAN PENGGESERAN TIANG DAN PENGUATAN JARINGAN ', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ulp`
--

CREATE TABLE `ulp` (
  `id` int(11) NOT NULL,
  `nama_ulp` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `wilker` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulp`
--

INSERT INTO `ulp` (`id`, `nama_ulp`, `alamat`, `telepon`, `wilker`) VALUES
(1, 'ULP GROGOL', 'Jl. Langenharjo No 42 Grogol Sukoharjo jl89', '0271622265', 'KETONGGO, SIDOKRIYO, KERJO LOR, KERJO KIDUL, KEDUNGGUPIT, JARUM, KAYULOKO, SIDOHARJO, BAKALAN WETAN, BAKALAN KULON, MOJORENO, KEBONAGUNG, TEMPURSARI, SEMBUKAN, SEMPUKEREP, WIDORO, TREMES, JATINOM, SUDIMORO, PANDEYAN, WATANGSONO, JATISARI, KOPEN, JENDI'),
(2, 'ULP SUKOHARJO', 'Jl. Jaksa Agung R Suprapto No.5, Kec. Sukoharjo Kab. Sukoharjo.', '0271593038', 'BULAKREJO, PANDEYAN, TRAJUKUNING, NGENTAK, KOMPLEK PABRIK SSI, SIDOREJO, GENTAN, SUGIHAN, TORIYO, GAYAM, JOMBOR, '),
(3, 'ULP WONOGIRI', 'Jl Ir Sutami no 5 kecamatan wonogiri kabupaten wonogiri', '0273321613', 'DSN BULUSARI  DS BULUSULUR KEC WONOGIRI , DSN POKOH DS WONOBOYO KEC WONOGIRI, DSN SANGGRAHAN, SEBAGIAN SALAK, DS GIRIPURWO WONOGIRI'),
(4, 'ULP JATISRONO', 'Jl. Wonogiri-Ponorogo KM.25 Pandeyan, Jatisrono, Wonogiri', '0273411431', 'PANDEYAN, WATANGSONO, JATISARI, GUNUNGSARI, GONDANGSARI, TANJUNGSARI, TANGGULANGIN, KORIPAN, WARU, SOCO'),
(5, 'ULP KARANGAYAR', 'Jl. Kapten Mulyadi No.17, Badran Asri, Cangakan, Kec. Karanganyar', '02716491459', 'KARANGANYAR, SEBAGIAN MATESIH, SEBAGIAN KARANGPANDAN'),
(7, 'ULP PALUR', 'jl.solo-karanganyar', '0271121342', 'KEPRABON, TASIKMADU, SURUH, KALIJIRAK, DELINGAN'),
(9, 'FaktuerKKK', 'wonogri sebelah jalan ', '081781677511', 'buanyak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role_id`, `is_active`, `date_create`, `id_pegawai`) VALUES
(3, 'sdkjks@gmail.com', '$2y$10$/ORNXnQI2pcpSJJNHCyyaeT7VQhBF0Gb..r2AvhlyM5oay5ZSeDlm', 2, 1, 1593933560, 23),
(4, 'dicky@y.com', '$2y$10$pJVkdULX4ysjpqvmXzbUhuYCSsXd8EJLjLo5tmA7ndQ5mfdaViDAi', 1, 1, 1593935957, 24),
(5, 'asuna@gmail.com', '$2y$10$igYUEg9vLvhBkp0XRp5vMeWmiWMaRzQarQXhWTltjy0NxKVov68EG', 2, 1, 1593962386, 30),
(6, 'aya@mia.om', '$2y$10$Wi5IdCzPdem1QgnKB9lTx./yRhGlEkvcjDi0I6PX9R5rJVqFMClqe', 3, 1, 1594626666, 31),
(7, 'erwin@gmail.com', '$2y$10$MHP6GkoHGANyvuK0Z6kU1OvLtr1fB35KHbN6ra0pnCwffxhBFxFoO', 2, 1, 1595659216, 23),
(9, 'sdsd@c.com', '$2y$10$ow9lwDOKU2N7pSCdFzf9iej7/5MDOMfUyUZ06mBKpMA4/n6lzBZ8m', 3, 1, 1595659475, 30),
(10, 'raspot@pln.co.id', '$2y$10$B.PkxhgO6XdfkEzgQqZXbOFZMB40oJ8W5SxiUFODNcCadGLcKVQQu', 3, 1, 1595741470, 34),
(11, 'martial@gmail.com', '$2y$10$SOH7VHPcmWuxnzYmBJ7PmOrfc54MA.RgKehuWprkcnc5VJncX8j9a', 2, 1, 1597975754, 33),
(12, 'ali@pln.co.id', '$2y$10$kn/cyP/WbWS9IRpe6hNStez1RmiH9zjOuYDjLGVTqUQLzZPhRW8ge', 3, 1, 1598017418, 36);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'staff'),
(3, 'pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `nama_vendor` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `nama_vendor`, `alamat`, `email`, `telepon`, `keterangan`) VALUES
(1, 'PT.SINAR ABADI SUKOHARJO ', 'Jl. Desa Bandingan RT 013/ RW 06 Bandingan, Kejobong, Purbalingga', 'sinarkamalniaga@gmail.com ', '085227176946', 'Mitra Kerja PBPD'),
(2, 'PT CAHAYA WAHANA MANDIRI (SUKOHARJO)', 'Jl. Ring Road Palur RT. 01 RW. 02 Sroyo Jaten Karanganyar', 'cahayawahana_mandiri@yahoo.co.id	', '085728092971', 'Vendor Preventif Korektif ULP Sukoharjo dan PBPD ULP Wonogiri, ULP Sukoharjo, ULP Jatisrono'),
(3, 'PT. MULYO AGUNG SOLO (SUKOHARJO)', 'Kadipiro, Banjarsari.', 'mulyoagungsolo@yahoo.co.id	', '081390330117', 'Pekerjaan PBPD	'),
(4, 'PT. FAJARINDO WAHYU UTAMA (SUKOHARJO)', 'Ngadiluwih, Matesih, Kabupaten Karanganyar', 'fajarindo_wahyu_utama@yahoo.co.id	', '081329221481', 'Vendor Preventif Korektif ULP Grogol dan ULP Karanganyar'),
(5, 'PT. CAHAYA ALAM KUSUMA (SUKOHARJO)', 'Tegalan, RT.02/RW.04, Dusun II, Kateguhan, Kec. Tawangsari, Kabupaten Sukoharjo	', 'pt.cahayaalamkusuma@gmail.com	', '081229858772', 'Vendor Preventif Korektif ULP Wonogiri dan ULP Jatisrono'),
(8, 'PT.WAHANA CAHAYA CINTA', 'Jl.Pakel', 'wahana@gmail.com', '121331', 'VENDOR PASANG BARU'),
(9, 'PT.HALEYORA POWERINDO', 'JL.WORA WARI 12', 'haleyora@hp.co.id', '119820', 'VENDOR PELAKSANA KEGIATAN TEKNIK JARINGAN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gardu_induk`
--
ALTER TABLE `gardu_induk`
  ADD PRIMARY KEY (`id_gi`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyulang`
--
ALTER TABLE `penyulang`
  ADD PRIMARY KEY (`id_penyulang`),
  ADD KEY `id_gi` (`id_gi`);

--
-- Indexes for table `status_pekerjaan`
--
ALTER TABLE `status_pekerjaan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_pekerjaanselesai`
--
ALTER TABLE `tb_pekerjaanselesai`
  ADD PRIMARY KEY (`id_selesai`),
  ADD KEY `id_ijin` (`id_ijin`),
  ADD KEY `id_penyulang` (`id_penyulang`),
  ADD KEY `id_ulp` (`id_ulp`),
  ADD KEY `id_vendor` (`id_vendor`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_mohon` (`id_mohon`);

--
-- Indexes for table `tb_perijinan`
--
ALTER TABLE `tb_perijinan`
  ADD PRIMARY KEY (`id_ijin`),
  ADD KEY `id_mohon` (`id_mohon`),
  ADD KEY `id_penyulang` (`id_penyulang`),
  ADD KEY `id_ulp` (`id_ulp`),
  ADD KEY `id_vendor` (`id_vendor`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD PRIMARY KEY (`id_mohon`),
  ADD KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  ADD KEY `id_penyulang` (`id_penyulang`) USING BTREE,
  ADD KEY `id_ulp` (`id_ulp`) USING BTREE,
  ADD KEY `id_vendor` (`id_vendor`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `ulp`
--
ALTER TABLE `ulp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gardu_induk`
--
ALTER TABLE `gardu_induk`
  MODIFY `id_gi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `penyulang`
--
ALTER TABLE `penyulang`
  MODIFY `id_penyulang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_pekerjaanselesai`
--
ALTER TABLE `tb_pekerjaanselesai`
  MODIFY `id_selesai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_perijinan`
--
ALTER TABLE `tb_perijinan`
  MODIFY `id_ijin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  MODIFY `id_mohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `ulp`
--
ALTER TABLE `ulp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penyulang`
--
ALTER TABLE `penyulang`
  ADD CONSTRAINT `penyulang_ibfk_1` FOREIGN KEY (`id_gi`) REFERENCES `gardu_induk` (`id_gi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pekerjaanselesai`
--
ALTER TABLE `tb_pekerjaanselesai`
  ADD CONSTRAINT `tb_pekerjaanselesai_ibfk_1` FOREIGN KEY (`id_ijin`) REFERENCES `tb_perijinan` (`id_ijin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pekerjaanselesai_ibfk_2` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pekerjaanselesai_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pekerjaanselesai_ibfk_4` FOREIGN KEY (`id_ulp`) REFERENCES `ulp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pekerjaanselesai_ibfk_5` FOREIGN KEY (`id_penyulang`) REFERENCES `penyulang` (`id_penyulang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pekerjaanselesai_ibfk_6` FOREIGN KEY (`id_status`) REFERENCES `status_pekerjaan` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pekerjaanselesai_ibfk_7` FOREIGN KEY (`id_mohon`) REFERENCES `tb_permohonan` (`id_mohon`);

--
-- Constraints for table `tb_perijinan`
--
ALTER TABLE `tb_perijinan`
  ADD CONSTRAINT `tb_perijinan_ibfk_2` FOREIGN KEY (`id_ulp`) REFERENCES `ulp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_perijinan_ibfk_3` FOREIGN KEY (`id_penyulang`) REFERENCES `penyulang` (`id_penyulang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_perijinan_ibfk_4` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_perijinan_ibfk_5` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_perijinan_ibfk_6` FOREIGN KEY (`id_status`) REFERENCES `status_pekerjaan` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_perijinan_ibfk_7` FOREIGN KEY (`id_mohon`) REFERENCES `tb_permohonan` (`id_mohon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD CONSTRAINT `tb_permohonan_ibfk_1` FOREIGN KEY (`id_penyulang`) REFERENCES `penyulang` (`id_penyulang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_permohonan_ibfk_2` FOREIGN KEY (`id_ulp`) REFERENCES `ulp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_permohonan_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_permohonan_ibfk_4` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_permohonan_ibfk_5` FOREIGN KEY (`id_status`) REFERENCES `status_pekerjaan` (`id_status`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
