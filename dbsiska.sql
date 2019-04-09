-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2019 pada 20.21
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsiska`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_login_attempts`
--

CREATE TABLE `auth_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users`
--

CREATE TABLE `auth_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL DEFAULT '127.0.0.1',
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_users`
--

INSERT INTO `auth_users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$sMbx.TRi8yV/4U0oDXI9weuibWSLDyoJJrFpE59RGt0YZSGDbrYcC', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1554827640, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_groups`
--

CREATE TABLE `auth_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_users_groups`
--

INSERT INTO `auth_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_guru`
--

CREATE TABLE `ref_guru` (
  `nip` varchar(18) NOT NULL,
  `nmguru` varchar(100) NOT NULL,
  `kelasid` smallint(6) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_guru`
--

INSERT INTO `ref_guru` (`nip`, `nmguru`, `kelasid`, `userid`, `status`) VALUES
('12345678997', 'Budi Irawan, S.Kom', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_kelas`
--

CREATE TABLE `ref_kelas` (
  `id` smallint(6) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_kelas`
--

INSERT INTO `ref_kelas` (`id`, `kelas`, `status`) VALUES
(1, 'I IPA 3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_map`
--

CREATE TABLE `ref_map` (
  `id` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `kelasid` smallint(6) NOT NULL,
  `mapelid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_map`
--

INSERT INTO `ref_map` (`id`, `nip`, `kelasid`, `mapelid`, `status`) VALUES
(1, '12345678997', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_mapel`
--

CREATE TABLE `ref_mapel` (
  `id` smallint(6) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_mapel`
--

INSERT INTO `ref_mapel` (`id`, `mapel`, `status`) VALUES
(1, 'IPA', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_siswa`
--

CREATE TABLE `ref_siswa` (
  `nis` varchar(10) NOT NULL,
  `nmsiswa` varchar(100) NOT NULL,
  `tgllahir` date DEFAULT NULL,
  `kelasid` smallint(6) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_siswa`
--

INSERT INTO `ref_siswa` (`nis`, `nmsiswa`, `tgllahir`, `kelasid`, `status`) VALUES
('1234', 'pijo', '2019-04-24', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_presensi`
--

CREATE TABLE `t_presensi` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `nis` smallint(6) NOT NULL,
  `status` int(11) NOT NULL,
  `ket` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_presensi`
--

INSERT INTO `t_presensi` (`id`, `tgl`, `nis`, `status`, `ket`) VALUES
(1, '2019-04-09', 1234, 1, '-');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_login_attempts`
--
ALTER TABLE `auth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `auth_users_groups`
--
ALTER TABLE `auth_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indeks untuk tabel `ref_guru`
--
ALTER TABLE `ref_guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `cons_refkelas` (`kelasid`);

--
-- Indeks untuk tabel `ref_kelas`
--
ALTER TABLE `ref_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ref_map`
--
ALTER TABLE `ref_map`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ref_mapel`
--
ALTER TABLE `ref_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ref_siswa`
--
ALTER TABLE `ref_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `siswa_refkelas` (`kelasid`);

--
-- Indeks untuk tabel `t_presensi`
--
ALTER TABLE `t_presensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tgl` (`tgl`,`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_login_attempts`
--
ALTER TABLE `auth_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_users_groups`
--
ALTER TABLE `auth_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ref_kelas`
--
ALTER TABLE `ref_kelas`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ref_map`
--
ALTER TABLE `ref_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ref_mapel`
--
ALTER TABLE `ref_mapel`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_presensi`
--
ALTER TABLE `t_presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_users_groups`
--
ALTER TABLE `auth_users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `auth_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `ref_guru`
--
ALTER TABLE `ref_guru`
  ADD CONSTRAINT `cons_refkelas` FOREIGN KEY (`kelasid`) REFERENCES `ref_kelas` (`id`);

--
-- Ketidakleluasaan untuk tabel `ref_siswa`
--
ALTER TABLE `ref_siswa`
  ADD CONSTRAINT `siswa_refkelas` FOREIGN KEY (`kelasid`) REFERENCES `ref_kelas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
