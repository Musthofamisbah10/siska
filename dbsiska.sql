-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2019 at 11:21 PM
-- Server version: 10.2.23-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smanmadi_siska`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `auth_login_attempts`
--

CREATE TABLE `auth_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users`
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
-- Dumping data for table `auth_users`
--

INSERT INTO `auth_users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$sMbx.TRi8yV/4U0oDXI9weuibWSLDyoJJrFpE59RGt0YZSGDbrYcC', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1556554720, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_groups`
--

CREATE TABLE `auth_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_users_groups`
--

INSERT INTO `auth_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_guru`
--

CREATE TABLE `ref_guru` (
  `nip` varchar(18) NOT NULL,
  `nmguru` varchar(100) NOT NULL,
  `kelasid` smallint(6) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_guru`
--

INSERT INTO `ref_guru` (`nip`, `nmguru`, `kelasid`, `userid`, `status`) VALUES
('', 'SUHARDJO, SP.d', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_kelas`
--

CREATE TABLE `ref_kelas` (
  `id` smallint(6) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `ruang` varchar(25) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_kelas`
--

INSERT INTO `ref_kelas` (`id`, `kelas`, `ruang`, `status`) VALUES
(1, 'X ', 'X MIPA 1', 1),
(2, 'X ', 'X MIPA 2', 1),
(3, 'X ', 'X MIPA 3', 1),
(4, 'X ', 'X MIPA 4', 1),
(5, 'X ', 'X MIPA 5', 1),
(6, 'X ', 'X MIPA 6', 1),
(7, 'X ', 'X IPS 1', 1),
(8, 'X ', 'X IPS 2', 1),
(9, 'X ', 'X IPS 3', 1),
(10, 'X ', 'X IPS 4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_map`
--

CREATE TABLE `ref_map` (
  `id` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `kelasid` smallint(6) NOT NULL,
  `mapelid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_map`
--

INSERT INTO `ref_map` (`id`, `nip`, `kelasid`, `mapelid`, `status`) VALUES
(2, '12345678997', 2, 1, 1),
(3, '12345678997', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_mapel`
--

CREATE TABLE `ref_mapel` (
  `id` smallint(6) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_mapel`
--

INSERT INTO `ref_mapel` (`id`, `mapel`, `status`) VALUES
(1, 'PENDIDIKAN AGAMA ISLAM', 1),
(2, 'PENDIDIKAN AGAMA KRISTEN', 1),
(3, 'PENDIDIKAN PANCASILA DAN KEWARGANEGARAAN', 1),
(4, 'BAHASA INDONESIA', 1),
(5, 'BAHASA INGGRIS', 1),
(6, 'MATEMATIKA ( UMUM )', 1),
(7, 'MATEMATIKA ( PEMINATAN )', 1),
(8, 'SEJARAH INDONESIA', 1),
(9, 'PENDIDIKAN JASMANI, OLAHRAGA DAN KESEHATAN', 1),
(10, 'PRAKARYA DAN KEWIRAUSAHAAN', 1),
(11, 'SENI BUDAYA', 1),
(12, 'BIOLOGI', 1),
(13, 'FISIKA', 1),
(14, 'KIMIA', 1),
(15, 'GEOGRAFI', 1),
(16, 'SOSIOLOGI', 1),
(17, 'EKONOMI', 1),
(18, 'SEJARAH ( PEMINATAN )', 1),
(19, 'BIMBINGAN KONSELING ( BK )', 1),
(20, 'BIMBINGAN KONSELING TIK ( BK TIK )', 1),
(21, 'BAHASA JAWA', 1),
(22, 'BAHASA JEPANG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_siswa`
--

CREATE TABLE `ref_siswa` (
  `nis` varchar(10) NOT NULL,
  `nmsiswa` varchar(100) NOT NULL,
  `tgllahir` date DEFAULT NULL,
  `kelasid` smallint(6) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_mnilai`
--

CREATE TABLE `t_mnilai` (
  `id` int(11) NOT NULL,
  `jenisid` tinyint(4) NOT NULL COMMENT '1=harian, 2tts, 3=tas',
  `kelasid` smallint(6) NOT NULL,
  `mapelid` smallint(6) NOT NULL,
  `tgl` date NOT NULL,
  `materi` varchar(200) NOT NULL,
  `avg` float DEFAULT NULL,
  `lastup` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_nilai`
--

CREATE TABLE `t_nilai` (
  `id` int(11) NOT NULL,
  `nilaiid` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nilai` float NOT NULL DEFAULT 0,
  `lastup` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `t_nilai`
--
DELIMITER $$
CREATE TRIGGER `getavg_after_update` AFTER UPDATE ON `t_nilai` FOR EACH ROW BEGIN
SET @avg = (SELECT AVG(nilai) AS avg FROM t_nilai);
update t_mnilai set t_mnilai.avg = @avg where t_mnilai.id = new.nilaiid;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_ntas`
--

CREATE TABLE `t_ntas` (
  `id` int(11) NOT NULL,
  `nilaiid` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `lastup` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_ntts`
--

CREATE TABLE `t_ntts` (
  `id` int(11) NOT NULL,
  `nilaiid` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `lastup` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_presensi`
--

CREATE TABLE `t_presensi` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `nis` smallint(6) NOT NULL,
  `status` int(11) NOT NULL,
  `ket` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_presensi`
--

INSERT INTO `t_presensi` (`id`, `tgl`, `nis`, `status`, `ket`) VALUES
(1, '2019-04-09', 1234, 2, '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_login_attempts`
--
ALTER TABLE `auth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `auth_users_groups`
--
ALTER TABLE `auth_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `ref_guru`
--
ALTER TABLE `ref_guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `cons_refkelas` (`kelasid`);

--
-- Indexes for table `ref_kelas`
--
ALTER TABLE `ref_kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kelas` (`kelas`,`ruang`);

--
-- Indexes for table `ref_map`
--
ALTER TABLE `ref_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_mapel`
--
ALTER TABLE `ref_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_siswa`
--
ALTER TABLE `ref_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `siswa_refkelas` (`kelasid`);

--
-- Indexes for table `t_mnilai`
--
ALTER TABLE `t_mnilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_nilai`
--
ALTER TABLE `t_nilai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nilaiid` (`nilaiid`,`nis`);

--
-- Indexes for table `t_ntas`
--
ALTER TABLE `t_ntas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_ntts`
--
ALTER TABLE `t_ntts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_presensi`
--
ALTER TABLE `t_presensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tgl` (`tgl`,`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_login_attempts`
--
ALTER TABLE `auth_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_users_groups`
--
ALTER TABLE `auth_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ref_kelas`
--
ALTER TABLE `ref_kelas`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ref_map`
--
ALTER TABLE `ref_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_mapel`
--
ALTER TABLE `ref_mapel`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `t_mnilai`
--
ALTER TABLE `t_mnilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_nilai`
--
ALTER TABLE `t_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_ntas`
--
ALTER TABLE `t_ntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_ntts`
--
ALTER TABLE `t_ntts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_presensi`
--
ALTER TABLE `t_presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_users_groups`
--
ALTER TABLE `auth_users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `auth_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ref_guru`
--
ALTER TABLE `ref_guru`
  ADD CONSTRAINT `cons_refkelas` FOREIGN KEY (`kelasid`) REFERENCES `ref_kelas` (`id`);

--
-- Constraints for table `ref_siswa`
--
ALTER TABLE `ref_siswa`
  ADD CONSTRAINT `siswa_refkelas` FOREIGN KEY (`kelasid`) REFERENCES `ref_kelas` (`id`);

--
-- Constraints for table `t_nilai`
--
ALTER TABLE `t_nilai`
  ADD CONSTRAINT `nilai_master` FOREIGN KEY (`nilaiid`) REFERENCES `t_mnilai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
