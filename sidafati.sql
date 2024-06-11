-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2024 pada 16.00
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidafati`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aknalu`
--

CREATE TABLE `aknalu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aknalu`
--

INSERT INTO `aknalu` (`id`, `prodi_id`, `tahun`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, '2022', 10, NULL, NULL),
(2, 1, '2023', 20, NULL, NULL),
(3, 1, '2024', 30, NULL, NULL),
(4, 2, '2022', 40, NULL, NULL),
(5, 2, '2023', 50, NULL, NULL),
(6, 2, '2024', 60, NULL, NULL),
(7, 3, '2022', 70, NULL, NULL),
(8, 3, '2023', 80, NULL, NULL),
(9, 3, '2024', 90, NULL, NULL),
(10, 4, '2022', 40, NULL, NULL),
(11, 4, '2023', 20, NULL, NULL),
(12, 4, '2024', 30, NULL, NULL),
(13, 5, '2022', 10, NULL, NULL),
(14, 5, '2023', 20, NULL, NULL),
(15, 5, '2024', 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `allrekap`
--

CREATE TABLE `allrekap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_semester_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_mhs_aktif_ts` int(11) DEFAULT NULL,
  `jumlah_mhs_aktif_th` int(11) DEFAULT NULL,
  `mhs_undur_diri_genap` int(11) DEFAULT NULL,
  `mhs_undur_diri_ganjil` int(11) DEFAULT NULL,
  `mhs_keluar_genap` int(11) DEFAULT NULL,
  `mhs_keluar_ganjil` int(11) DEFAULT NULL,
  `mhs_wafat_genap` int(11) DEFAULT NULL,
  `mhs_wafat_ganjil` int(11) DEFAULT NULL,
  `mhs_lulus_januari` int(11) DEFAULT NULL,
  `mhs_lulus_februari` int(11) DEFAULT NULL,
  `mhs_lulus_maret` int(11) DEFAULT NULL,
  `mhs_lulus_april` int(11) DEFAULT NULL,
  `mhs_lulus_mei` int(11) DEFAULT NULL,
  `mhs_lulus_juni` int(11) DEFAULT NULL,
  `mhs_lulus_juli` int(11) DEFAULT NULL,
  `mhs_lulus_agustus` int(11) DEFAULT NULL,
  `mhs_lulus_september` int(11) DEFAULT NULL,
  `mhs_lulus_oktober` int(11) DEFAULT NULL,
  `mhs_lulus_november` int(11) DEFAULT NULL,
  `mhs_lulus_desember` int(11) DEFAULT NULL,
  `mhs_lulus_ta` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `allrekap`
--

INSERT INTO `allrekap` (`id`, `prodi_id`, `tahun_semester_id`, `tahun_id`, `jumlah_mhs_aktif_ts`, `jumlah_mhs_aktif_th`, `mhs_undur_diri_genap`, `mhs_undur_diri_ganjil`, `mhs_keluar_genap`, `mhs_keluar_ganjil`, `mhs_wafat_genap`, `mhs_wafat_ganjil`, `mhs_lulus_januari`, `mhs_lulus_februari`, `mhs_lulus_maret`, `mhs_lulus_april`, `mhs_lulus_mei`, `mhs_lulus_juni`, `mhs_lulus_juli`, `mhs_lulus_agustus`, `mhs_lulus_september`, `mhs_lulus_oktober`, `mhs_lulus_november`, `mhs_lulus_desember`, `mhs_lulus_ta`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 107, 83, 8, 1, 2, 2, 1, 0, 0, 16, 19, 8, 4, 18, 16, 10, 9, 6, 12, 19, 19, NULL, NULL),
(2, 2, 1, 1, 84, 94, 10, 3, 5, 4, 1, 2, 9, 0, 8, 19, 19, 7, 16, 15, 15, 17, 10, 3, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `asmikbel`
--

CREATE TABLE `asmikbel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip_nrk` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `studi_lanjut` varchar(255) NOT NULL,
  `beasiswa` varchar(255) NOT NULL,
  `mulai_tubel` date NOT NULL,
  `selesai_tubel` date NOT NULL,
  `sk_tubel` varchar(255) NOT NULL DEFAULT 'Ada',
  `status_asmik` varchar(255) NOT NULL DEFAULT 'Lulus',
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `asmikbel`
--

INSERT INTO `asmikbel` (`id`, `prodi_id`, `nama`, `nip_nrk`, `status`, `studi_lanjut`, `beasiswa`, `mulai_tubel`, `selesai_tubel`, `sk_tubel`, `status_asmik`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Khansa Salsabila Suhaimi, S.T.', '1997 1011 2020 4133', 'Non PNS', 'Teknik Elektro Bidang Studi Teknik Kendali dan Sistem Cerdas di Institut Teknologi Bandung.', 'Beasiswa ITERA', '2021-04-01', '2023-04-01', 'Ada', 'Lulus', 'Dummy', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(2, 2, 'Leslie Anggraini, S.Kom.', '1997 0817 2020 4189', 'Non PNS', 'Fakultas MIPA, Program Studi Magister Ilmu Komputer pada Universitas Gadjah Mada', 'Beasiswa Pendidikan', '2021-04-01', '2023-04-01', 'Ada', 'Lulus', 'Dummy', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(3, 3, 'Rifzieh S.Kom., M.Cs. Ph.D', '1985 0910 2019 31011', 'PNS', 'Faculty of Computer Science, Universitas Indonesia', 'Beasiswa LPDP', '2021-04-01', '2023-04-01', 'Ada', 'Lulus', 'Dummy', '2024-05-28 10:06:46', '2024-05-28 10:06:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosbel`
--

CREATE TABLE `dosbel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip_nrk` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tempat_studi` varchar(255) NOT NULL,
  `jenis_beasiswa` varchar(255) NOT NULL,
  `mulai_tubel` date NOT NULL,
  `selesai_tubel` date NOT NULL,
  `sk_tubel` varchar(255) NOT NULL DEFAULT 'Ada',
  `perpanjangan_tubel` varchar(255) NOT NULL DEFAULT 'Ada',
  `mulai_perpanjangan` date DEFAULT NULL,
  `selesai_perpanjangan` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosbel`
--

INSERT INTO `dosbel` (`id`, `prodi_id`, `nama`, `nip_nrk`, `status`, `tempat_studi`, `jenis_beasiswa`, `mulai_tubel`, `selesai_tubel`, `sk_tubel`, `perpanjangan_tubel`, `mulai_perpanjangan`, `selesai_perpanjangan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dr. Eng. M. Fauzi M.Z., S.T., M.T.', '198509102019031011', 'Non PNS', 'Institut Teknologi Bandung', 'Beasiswa Pendidikan', '2021-04-01', '2023-04-01', 'Ada', 'Ada', '2023-04-01', '2025-04-01', 'Dosen Belum Tetap', NULL, NULL),
(2, 2, 'Dr. Eng. M. Fauzi M.Z., S.T., M.T.', '198509102019031011', 'Non PNS', 'Universitas Gadjah Mada', 'Beasiswa Pendidikan', '2021-04-01', '2023-04-01', 'Ada', 'Ada', '2023-04-01', '2025-04-01', 'Dosen Belum Tetap', NULL, NULL),
(3, 3, 'Dr. Eng. M. Fauzi M.Z., S.T., M.T.', '198509102019031011', 'Non PNS', 'Universitas Gadjah Mada', 'Beasiswa Pendidikan', '2021-04-01', '2023-04-01', 'Ada', 'Ada', '2023-04-01', '2025-04-01', 'Dosen Belum Tetap', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip_nrk` varchar(255) NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(11) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `masa_kerja` varchar(255) DEFAULT NULL,
  `status_nidn_nidk` varchar(255) NOT NULL,
  `status_pegawai` varchar(255) NOT NULL,
  `jabfung` varchar(255) NOT NULL,
  `tmt_jabfung_terakhir` date DEFAULT NULL,
  `target_kenaikan_jabfung` date DEFAULT NULL,
  `tmt_masuk_itera` date DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `pekerti` varchar(255) NOT NULL DEFAULT 'Sudah',
  `serdos` varchar(255) NOT NULL DEFAULT 'Ada',
  `status_dosen` varchar(255) NOT NULL,
  `sk_pns` varchar(255) DEFAULT NULL,
  `sk_cpns` varchar(255) DEFAULT NULL,
  `sk_tubel` varchar(255) DEFAULT NULL,
  `sk_perpanjangan_tubel` varchar(255) DEFAULT NULL,
  `sk_jabfung` varchar(255) DEFAULT NULL,
  `sk_pengaktifan` varchar(255) DEFAULT NULL,
  `sk_pengaktifan_kembali` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nip_nrk`, `prodi_id`, `tgl_lahir`, `umur`, `pendidikan`, `masa_kerja`, `status_nidn_nidk`, `status_pegawai`, `jabfung`, `tmt_jabfung_terakhir`, `target_kenaikan_jabfung`, `tmt_masuk_itera`, `tmt`, `pekerti`, `serdos`, `status_dosen`, `sk_pns`, `sk_cpns`, `sk_tubel`, `sk_perpanjangan_tubel`, `sk_jabfung`, `sk_pengaktifan`, `sk_pengaktifan_kembali`, `created_at`, `updated_at`) VALUES
(1, 'Bilal Al Farishi, B.Sc(Hons)., M.Sc.', '199208212019031023', 1, '1992-08-21', 31, 'S2', NULL, 'NIDN', 'PNS', 'Asisten Ahli 150', '2021-03-01', '2023-03-01', NULL, NULL, 'Sudah', 'Ada', 'Dosen Tetap', 'https://www.contoh.com/sk_pns', 'https://www.contoh.com/sk_cpns', 'https://www.contoh.com/sk_tubel', 'https://www.contoh.com/sk_perpanjangan_tubel', 'https://www.contoh.com/sk_jabfung', 'https://www.contoh.com/sk_pengaktifan', 'https://www.contoh.com/sk_pengaktifan_kembali', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(2, 'Achmad Darul Rochman, S.Pd., M.T', '198512252019031007', 2, '1985-12-25', 38, 'S2/Sedang S3 DN', NULL, 'NIDN', 'PNS', 'Asisten Ahli 150', '2021-03-01', '2023-03-01', NULL, NULL, 'Sudah', 'Ada', 'Dosen Aktif', 'https://www.contoh.com/sk_pns', 'https://www.contoh.com/sk_cpns', 'https://www.contoh.com/sk_tubel', 'https://www.contoh.com/sk_perpanjangan_tubel', 'https://www.contoh.com/sk_jabfung', 'https://www.contoh.com/sk_pengaktifan', 'https://www.contoh.com/sk_pengaktifan_kembali', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(3, 'Mochamad Iqbal, S.T., M.T.', '199208192019031013', 3, '1992-08-19', 31, 'S2/Sedang S3 DN', NULL, 'NIDN', 'PNS', 'Lektor 200', '2023-04-01', '2025-04-01', NULL, NULL, 'Sudah', 'Ada', 'Dosen Aktif', 'https://www.contoh.com/sk_pns', 'https://www.contoh.com/sk_cpns', 'https://www.contoh.com/sk_tubel', 'https://www.contoh.com/sk_perpanjangan_tubel', 'https://www.contoh.com/sk_jabfung', 'https://www.contoh.com/sk_pengaktifan', 'https://www.contoh.com/sk_pengaktifan_kembali', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(4, 'Meya, S.T., M.T.', '199208192019031021', 4, '1992-08-19', 31, 'S2/Sedang S3 DN', NULL, 'NIDN', 'PNS', 'Lektor 200', '2023-04-01', '2025-04-01', NULL, NULL, 'Sudah', 'Ada', 'Dosen Aktif', 'https://www.contoh.com/sk_pns', 'https://www.contoh.com/sk_cpns', 'https://www.contoh.com/sk_tubel', 'https://www.contoh.com/sk_perpanjangan_tubel', 'https://www.contoh.com/sk_jabfung', 'https://www.contoh.com/sk_pengaktifan', 'https://www.contoh.com/sk_pengaktifan_kembali', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(5, 'Moch Iaz, S.T., M.T.', '199208192019031022', 5, '1992-08-19', 31, 'S2/Sedang S3 DN', NULL, 'NIDN', 'PNS', 'Lektor 200', '2023-04-01', '2025-04-01', NULL, NULL, 'Sudah', 'Ada', 'Dosen Aktif', 'https://www.contoh.com/sk_pns', 'https://www.contoh.com/sk_cpns', 'https://www.contoh.com/sk_tubel', 'https://www.contoh.com/sk_perpanjangan_tubel', 'https://www.contoh.com/sk_jabfung', 'https://www.contoh.com/sk_pengaktifan', 'https://www.contoh.com/sk_pengaktifan_kembali', '2024-05-28 10:06:46', '2024-05-28 10:06:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `doslubi`
--

CREATE TABLE `doslubi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nup_nidk` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Purna Tugas atau pensiunan',
  `tgl_lahir` date NOT NULL,
  `jabatan_terakhir` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `doslubi`
--

INSERT INTO `doslubi` (`id`, `prodi_id`, `nama`, `nup_nidk`, `jurusan`, `status`, `tgl_lahir`, `jabatan_terakhir`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ir. Hira Laksmiwati Soemitro, M.Sc.', '9990093939', 'Fakultas Teknologi dan Industri', 'Purnabakti NUP', '1952-01-09', 'Bandung', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(2, 2, 'Rifzieh S.Kom., M.Cs. Ph.D', '999 1011 2019 31011', 'Fakultas Teknologo Industri', 'Purna Tugas atau pensiunan', '1965-10-11', 'Kepala Departemen Teknik Informatika ITERA', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(3, 3, 'Dr. Eng. Ir. H. M. Syaifullah, M.T.', '1965 1011 2019 31011', 'Fakultas Teknologo Industri', 'Purna Tugas atau pensiunan', '1965-10-11', 'Kepala Departemen Teknik Perairan ITERA', '2024-05-28 10:06:46', '2024-05-28 10:06:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `mulai_kegiatan` time NOT NULL,
  `akhir_kegiatan` time NOT NULL,
  `tempat_pelaksanaan` varchar(255) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Diproses',
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `prodi_id`, `email`, `nama_kegiatan`, `tgl_kegiatan`, `mulai_kegiatan`, `akhir_kegiatan`, `tempat_pelaksanaan`, `jumlah_peserta`, `penanggung_jawab`, `nama_pemohon`, `no_hp`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 21, 'mahasiswa1@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 1', '2021-11-14', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 1', 352, 'Temen nya Mahasiswa 1', 'Si Mahasiswa Syahlan, Bin Cokcok1', '08123456789', 'Diproses', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(2, 18, 'mahasiswa2@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 2', '2016-05-10', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 2', 256, 'Temen nya Mahasiswa 2', 'Si Mahasiswa Syahlan, Bin Cokcok2', '08123456789', 'Ditolak', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(3, 2, 'mahasiswa3@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 3', '2022-03-30', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 3', 433, 'Temen nya Mahasiswa 3', 'Si Mahasiswa Syahlan, Bin Cokcok3', '08123456789', 'Ditolak', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(4, 3, 'mahasiswa4@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 4', '2013-08-08', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 4', 468, 'Temen nya Mahasiswa 4', 'Si Mahasiswa Syahlan, Bin Cokcok4', '08123456789', 'Ditolak', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(5, 6, 'mahasiswa5@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 5', '2013-09-24', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 5', 215, 'Temen nya Mahasiswa 5', 'Si Mahasiswa Syahlan, Bin Cokcok5', '08123456789', 'Disetujui', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(6, 9, 'mahasiswa6@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 6', '2014-08-28', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 6', 135, 'Temen nya Mahasiswa 6', 'Si Mahasiswa Syahlan, Bin Cokcok6', '08123456789', 'Diproses', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(7, 2, 'mahasiswa7@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 7', '2019-07-05', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 7', 329, 'Temen nya Mahasiswa 7', 'Si Mahasiswa Syahlan, Bin Cokcok7', '08123456789', 'Ditolak', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(8, 17, 'mahasiswa8@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 8', '2018-09-14', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 8', 395, 'Temen nya Mahasiswa 8', 'Si Mahasiswa Syahlan, Bin Cokcok8', '08123456789', 'Disetujui', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(9, 22, 'mahasiswa9@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 9', '2017-06-08', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 9', 474, 'Temen nya Mahasiswa 9', 'Si Mahasiswa Syahlan, Bin Cokcok9', '08123456789', 'Diproses', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(10, 21, 'mahasiswa10@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 10', '2015-06-14', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 10', 144, 'Temen nya Mahasiswa 10', 'Si Mahasiswa Syahlan, Bin Cokcok10', '08123456789', 'Disetujui', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(11, 18, 'mahasiswa11@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 11', '2019-07-02', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 11', 488, 'Temen nya Mahasiswa 11', 'Si Mahasiswa Syahlan, Bin Cokcok11', '08123456789', 'Ditolak', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(12, 20, 'mahasiswa12@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 12', '2017-11-26', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 12', 233, 'Temen nya Mahasiswa 12', 'Si Mahasiswa Syahlan, Bin Cokcok12', '08123456789', 'Disetujui', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(13, 18, 'mahasiswa13@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 13', '2018-08-17', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 13', 233, 'Temen nya Mahasiswa 13', 'Si Mahasiswa Syahlan, Bin Cokcok13', '08123456789', 'Ditolak', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(14, 1, 'mahasiswa14@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 14', '2019-02-18', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 14', 214, 'Temen nya Mahasiswa 14', 'Si Mahasiswa Syahlan, Bin Cokcok14', '08123456789', 'Ditolak', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(15, 22, 'mahasiswa15@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 15', '2020-04-24', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 15', 476, 'Temen nya Mahasiswa 15', 'Si Mahasiswa Syahlan, Bin Cokcok15', '08123456789', 'Ditolak', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(16, 2, 'mahasiswa16@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 16', '2023-05-05', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 16', 413, 'Temen nya Mahasiswa 16', 'Si Mahasiswa Syahlan, Bin Cokcok16', '08123456789', 'Disetujui', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(17, 21, 'mahasiswa17@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 17', '2022-03-27', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 17', 227, 'Temen nya Mahasiswa 17', 'Si Mahasiswa Syahlan, Bin Cokcok17', '08123456789', 'Disetujui', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(18, 8, 'mahasiswa18@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 18', '2018-01-27', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 18', 390, 'Temen nya Mahasiswa 18', 'Si Mahasiswa Syahlan, Bin Cokcok18', '08123456789', 'Disetujui', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(19, 7, 'mahasiswa19@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 19', '2015-03-02', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 19', 490, 'Temen nya Mahasiswa 19', 'Si Mahasiswa Syahlan, Bin Cokcok19', '08123456789', 'Diproses', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(20, 12, 'mahasiswa20@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 20', '2015-08-18', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 20', 181, 'Temen nya Mahasiswa 20', 'Si Mahasiswa Syahlan, Bin Cokcok20', '08123456789', 'Diproses', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(21, 4, 'mahasiswa21@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 21', '2013-07-28', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 21', 404, 'Temen nya Mahasiswa 21', 'Si Mahasiswa Syahlan, Bin Cokcok21', '08123456789', 'Ditolak', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(22, 10, 'mahasiswa22@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 22', '2018-01-16', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 22', 251, 'Temen nya Mahasiswa 22', 'Si Mahasiswa Syahlan, Bin Cokcok22', '08123456789', 'Disetujui', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(23, 7, 'mahasiswa23@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 23', '2013-08-19', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 23', 79, 'Temen nya Mahasiswa 23', 'Si Mahasiswa Syahlan, Bin Cokcok23', '08123456789', 'Diproses', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(24, 17, 'mahasiswa24@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 24', '2015-10-22', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 24', 486, 'Temen nya Mahasiswa 24', 'Si Mahasiswa Syahlan, Bin Cokcok24', '08123456789', 'Diproses', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(25, 19, 'mahasiswa25@student.itera.ac.id', 'TTC (Telkomsel Telecommunication Center Lampung) 25', '2022-05-20', '17:06:46', '17:06:46', 'TTC (Telkomsel Telecommunication Center Lampung) 25', 472, 'Temen nya Mahasiswa 25', 'Si Mahasiswa Syahlan, Bin Cokcok25', '08123456789', 'Diproses', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(26, 10, 'admin@admin.com', 'Syukuran', '2024-05-31', '10:30:00', '20:30:00', 'GKU Lt 03', 120, 'Leo', 'Farzia', '0895324445998', 'Disetujui', 'Berkas Lengkap, Tidak ada masalah.', '2024-05-29 04:02:38', '2024-05-29 04:04:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar`
--

CREATE TABLE `keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_semester_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `mhs_keluar_genap` int(11) NOT NULL,
  `mhs_keluar_ganjil` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keluar`
--

INSERT INTO `keluar` (`id`, `prodi_id`, `tahun_semester_id`, `tahun_id`, `mhs_keluar_genap`, `mhs_keluar_ganjil`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 10, 10, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(2, 2, 2, 2, 20, 20, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(3, 3, 3, 3, 30, 30, '2024-05-28 10:06:46', '2024-05-28 10:06:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lulus`
--

CREATE TABLE `lulus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_semester_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `september` varchar(255) DEFAULT NULL,
  `november` varchar(255) DEFAULT NULL,
  `maret` varchar(255) DEFAULT NULL,
  `mei` varchar(255) DEFAULT NULL,
  `juli` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lulus`
--

INSERT INTO `lulus` (`id`, `prodi_id`, `tahun_semester_id`, `tahun_id`, `september`, `november`, `maret`, `mei`, `juli`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '10', '20', '30', NULL, NULL, '2024-05-28 10:06:46', '2024-05-29 03:17:50'),
(2, 2, 1, 1, '10', '20', '30', NULL, NULL, '2024-05-28 10:12:15', '2024-05-29 03:17:27'),
(3, 1, 2, 2, '10', '10', '10', NULL, NULL, '2024-05-29 01:02:27', '2024-05-29 06:00:23'),
(4, 2, 2, 2, '120', '120', '120', NULL, NULL, '2024-05-29 03:09:48', '2024-05-29 03:17:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_04_20_075623_create_prodi_table', 1),
(7, '2024_04_22_093543_create_resign_table', 1),
(8, '2024_04_25_064056_create_taslab_table', 1),
(9, '2024_04_27_094056_create_pejabat_table', 1),
(10, '2024_04_28_163553_create_asmikbel_table', 1),
(11, '2024_04_29_043210_create_dosbel_table', 1),
(12, '2024_04_29_044707_create_doslubi_table', 1),
(13, '2024_05_04_051449_create_kegiatan_table', 1),
(14, '2024_05_04_104935_create_dosen_table', 1),
(15, '2024_05_05_120711_create_prestasi_table', 1),
(16, '2024_05_07_081757_create_aknalu_table', 1),
(17, '2024_05_10_024653_create_tahun_table', 1),
(18, '2024_05_20_122902_create_allrekap_table', 1),
(19, '2024_05_20_125053_create_rekap-mhs_table', 1),
(20, '2024_05_24_133344_create_undur-diri_table', 1),
(21, '2024_05_26_091412_create_keluar_table', 1),
(22, '2024_05_26_161429_create_wafat_table', 1),
(23, '2024_05_27_070218_create_lulus_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pejabat`
--

CREATE TABLE `pejabat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `pangkat_golongan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pejabat`
--

INSERT INTO `pejabat` (`id`, `nama`, `nip`, `pangkat_golongan`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Hadi Teguh Yudistira, S.T., Ph.D.', '198709122019031012', 'Penata, III/c', 'Ketua Fakultas Teknologi dan Industri', NULL, NULL),
(2, 'Amrina Mustaqim, S.Si., M.T.', '199208152019031011', 'Penata Muda Tk. I, III/b', 'Sekretaris Bidang 1 (Satu) Fakultas Teknologi dan Industri', NULL, NULL),
(3, 'Rifziehh, S.Kom., M.Cs.', '199001012017071012', 'Penata Muda Tk. I, III/a', 'Sekretaris Bidang 3 (Satu) Fakultas Teknologi dan Industri', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `nama_tim` varchar(255) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `jenis_prestasi` varchar(255) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `kategori_olahraga` varchar(255) NOT NULL,
  `tahun_kegiatan` varchar(255) NOT NULL,
  `url_penyelenggara` varchar(255) NOT NULL,
  `nama_penyelenggara` varchar(255) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `tingkat_kejuaraan` varchar(255) NOT NULL,
  `judul_karya` varchar(255) NOT NULL,
  `anggota_karya` text NOT NULL,
  `foto` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`foto`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id`, `prodi_id`, `nama_tim`, `nama_mahasiswa`, `nim`, `kontak`, `jenis_prestasi`, `jumlah_peserta`, `kategori_olahraga`, `tahun_kegiatan`, `url_penyelenggara`, `nama_penyelenggara`, `tgl_kegiatan`, `tingkat_kejuaraan`, `judul_karya`, `anggota_karya`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'Timnas ITERA 1', 'Mahasiswa Fulan bin Fulan 1', '1209900101', '08123456789', 'Juara 1', 221, 'Olahraga 1', '2021-07-15 17:06:46', 'https://www.itera.ac.id', 'ITERA', '2016-09-04', 'Nasional', 'Judul Karya Ini panjang tak terkira yaa. 1', 'Anggota Karya,  Anggota Karya, Anggota Karya, Anggota Karya,1', '[\"foto1.jpg\",\"foto2.jpg\",\"foto3.jpg\"]', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(2, 2, 'Timnas ITERA 2', 'Mahasiswa Fulan bin Fulan 2', '1209900102', '08123456789', 'Juara 2', 307, 'Olahraga 2', '2023-01-05 17:06:46', 'https://www.itera.ac.id', 'ITERA', '2020-04-09', 'Nasional', 'Judul Karya Ini panjang tak terkira yaa. 2', 'Anggota Karya,  Anggota Karya, Anggota Karya, Anggota Karya,2', '[\"foto1.jpg\",\"foto2.jpg\",\"foto3.jpg\"]', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(3, 3, 'Timnas ITERA 3', 'Mahasiswa Fulan bin Fulan 3', '1209900103', '08123456789', 'Juara 3', 185, 'Olahraga 3', '2017-11-08 17:06:46', 'https://www.itera.ac.id', 'ITERA', '2016-10-14', 'Nasional', 'Judul Karya Ini panjang tak terkira yaa. 3', 'Anggota Karya,  Anggota Karya, Anggota Karya, Anggota Karya,3', '[\"foto1.jpg\",\"foto2.jpg\",\"foto3.jpg\"]', '2024-05-28 10:06:46', '2024-05-28 10:06:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `kapro` varchar(255) DEFAULT NULL,
  `fakultas` varchar(255) NOT NULL,
  `akreditasi` varchar(255) DEFAULT NULL,
  `prodik` varchar(255) NOT NULL,
  `jumlah_mahasiswa` int(11) DEFAULT NULL,
  `tgl_pendirian` date DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `jumlah_dosen` text DEFAULT NULL,
  `sk_prodi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `prodi`, `foto`, `email`, `kapro`, `fakultas`, `akreditasi`, `prodik`, `jumlah_mahasiswa`, `tgl_pendirian`, `deskripsi`, `jumlah_dosen`, `sk_prodi`, `created_at`, `updated_at`) VALUES
(1, 'Rekayasa Instrumentasi dan Automasi 1', '/vendors/images/user-profile.png', 'prodi1@fti.itera.ac.id', 'Fulan Bin Fulansyah 1', 'Fakultas Teknologi Industri2', 'A', 'Strata (S1)', 291, '2017-06-17', 'Ini Deskripsi Prodi 1', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(2, 'Rekayasa Instrumentasi dan Automasi 2', '/vendors/images/user-profile.png', 'prodi2@fti.itera.ac.id', 'Fulan Bin Fulansyah 2', 'Fakultas Teknologi Industri3', 'A', 'Strata (S1)', 139, '2013-10-09', 'Ini Deskripsi Prodi 2', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(3, 'Rekayasa Instrumentasi dan Automasi 3', '/vendors/images/user-profile.png', 'prodi3@fti.itera.ac.id', 'Fulan Bin Fulansyah 3', 'Fakultas Teknologi Industri1', 'A', 'Strata (S1)', 286, '2016-01-29', 'Ini Deskripsi Prodi 3', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(4, 'Rekayasa Instrumentasi dan Automasi 4', '/vendors/images/user-profile.png', 'prodi4@fti.itera.ac.id', 'Fulan Bin Fulansyah 4', 'Fakultas Teknologi Industri2', 'A', 'Strata (S1)', 177, '2022-07-28', 'Ini Deskripsi Prodi 4', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(5, 'Rekayasa Instrumentasi dan Automasi 5', '/vendors/images/user-profile.png', 'prodi5@fti.itera.ac.id', 'Fulan Bin Fulansyah 5', 'Fakultas Teknologi Industri3', 'A', 'Strata (S1)', 349, '2015-01-15', 'Ini Deskripsi Prodi 5', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(6, 'Rekayasa Instrumentasi dan Automasi 6', '/vendors/images/user-profile.png', 'prodi6@fti.itera.ac.id', 'Fulan Bin Fulansyah 6', 'Fakultas Teknologi Industri1', 'A', 'Strata (S1)', 233, '2014-06-15', 'Ini Deskripsi Prodi 6', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(7, 'Rekayasa Instrumentasi dan Automasi 7', '/vendors/images/user-profile.png', 'prodi7@fti.itera.ac.id', 'Fulan Bin Fulansyah 7', 'Fakultas Teknologi Industri2', 'A', 'Strata (S1)', 368, '2022-09-18', 'Ini Deskripsi Prodi 7', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(8, 'Rekayasa Instrumentasi dan Automasi 8', '/vendors/images/user-profile.png', 'prodi8@fti.itera.ac.id', 'Fulan Bin Fulansyah 8', 'Fakultas Teknologi Industri3', 'A', 'Strata (S1)', 296, '2018-09-16', 'Ini Deskripsi Prodi 8', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(9, 'Rekayasa Instrumentasi dan Automasi 9', '/vendors/images/user-profile.png', 'prodi9@fti.itera.ac.id', 'Fulan Bin Fulansyah 9', 'Fakultas Teknologi Industri1', 'A', 'Strata (S1)', 391, '2018-08-23', 'Ini Deskripsi Prodi 9', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(10, 'Rekayasa Instrumentasi dan Automasi 10', '/vendors/images/user-profile.png', 'prodi10@fti.itera.ac.id', 'Fulan Bin Fulansyah 10', 'Fakultas Teknologi Industri2', 'A', 'Strata (S1)', 150, '2014-02-04', 'Ini Deskripsi Prodi 10', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(11, 'Rekayasa Instrumentasi dan Automasi 11', '/vendors/images/user-profile.png', 'prodi11@fti.itera.ac.id', 'Fulan Bin Fulansyah 11', 'Fakultas Teknologi Industri3', 'A', 'Strata (S1)', 337, '2016-04-09', 'Ini Deskripsi Prodi 11', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(12, 'Rekayasa Instrumentasi dan Automasi 12', '/vendors/images/user-profile.png', 'prodi12@fti.itera.ac.id', 'Fulan Bin Fulansyah 12', 'Fakultas Teknologi Industri1', 'A', 'Strata (S1)', 207, '2019-11-27', 'Ini Deskripsi Prodi 12', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(13, 'Rekayasa Instrumentasi dan Automasi 13', '/vendors/images/user-profile.png', 'prodi13@fti.itera.ac.id', 'Fulan Bin Fulansyah 13', 'Fakultas Teknologi Industri2', 'A', 'Strata (S1)', 224, '2020-12-18', 'Ini Deskripsi Prodi 13', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(14, 'Rekayasa Instrumentasi dan Automasi 14', '/vendors/images/user-profile.png', 'prodi14@fti.itera.ac.id', 'Fulan Bin Fulansyah 14', 'Fakultas Teknologi Industri3', 'A', 'Strata (S1)', 365, '2021-12-11', 'Ini Deskripsi Prodi 14', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(15, 'Rekayasa Instrumentasi dan Automasi 15', '/vendors/images/user-profile.png', 'prodi15@fti.itera.ac.id', 'Fulan Bin Fulansyah 15', 'Fakultas Teknologi Industri1', 'A', 'Strata (S1)', 160, '2018-10-31', 'Ini Deskripsi Prodi 15', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(16, 'Rekayasa Instrumentasi dan Automasi 16', '/vendors/images/user-profile.png', 'prodi16@fti.itera.ac.id', 'Fulan Bin Fulansyah 16', 'Fakultas Teknologi Industri2', 'A', 'Strata (S1)', 348, '2022-01-21', 'Ini Deskripsi Prodi 16', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(17, 'Rekayasa Instrumentasi dan Automasi 17', '/vendors/images/user-profile.png', 'prodi17@fti.itera.ac.id', 'Fulan Bin Fulansyah 17', 'Fakultas Teknologi Industri3', 'A', 'Strata (S1)', 103, '2017-10-03', 'Ini Deskripsi Prodi 17', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(18, 'Rekayasa Instrumentasi dan Automasi 18', '/vendors/images/user-profile.png', 'prodi18@fti.itera.ac.id', 'Fulan Bin Fulansyah 18', 'Fakultas Teknologi Industri1', 'A', 'Strata (S1)', 118, '2022-05-31', 'Ini Deskripsi Prodi 18', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(19, 'Rekayasa Instrumentasi dan Automasi 19', '/vendors/images/user-profile.png', 'prodi19@fti.itera.ac.id', 'Fulan Bin Fulansyah 19', 'Fakultas Teknologi Industri2', 'A', 'Strata (S1)', 113, '2019-07-10', 'Ini Deskripsi Prodi 19', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(20, 'Rekayasa Instrumentasi dan Automasi 20', '/vendors/images/user-profile.png', 'prodi20@fti.itera.ac.id', 'Fulan Bin Fulansyah 20', 'Fakultas Teknologi Industri3', 'A', 'Strata (S1)', 221, '2022-06-03', 'Ini Deskripsi Prodi 20', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(21, 'Rekayasa Instrumentasi dan Automasi 21', '/vendors/images/user-profile.png', 'prodi21@fti.itera.ac.id', 'Fulan Bin Fulansyah 21', 'Fakultas Teknologi Industri1', 'A', 'Strata (S1)', 460, '2018-12-26', 'Ini Deskripsi Prodi 21', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(22, 'Rekayasa Instrumentasi dan Automasi 22', '/vendors/images/user-profile.png', 'prodi22@fti.itera.ac.id', 'Fulan Bin Fulansyah 22', 'Fakultas Teknologi Industri2', 'A', 'Strata (S1)', 150, '2020-12-26', 'Ini Deskripsi Prodi 22', NULL, NULL, '2024-05-28 10:06:46', '2024-05-28 10:06:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap-mhs`
--

CREATE TABLE `rekap-mhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_semester_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_mhs_aktif_ts` int(11) NOT NULL,
  `jumlah_mhs_aktif_th` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekap-mhs`
--

INSERT INTO `rekap-mhs` (`id`, `prodi_id`, `tahun_semester_id`, `tahun_id`, `jumlah_mhs_aktif_ts`, `jumlah_mhs_aktif_th`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 100, 200, NULL, NULL),
(2, 2, 1, 1, 100, 200, NULL, NULL),
(3, 3, 1, 1, 70, 30, NULL, NULL),
(4, 4, 1, 1, 10, 50, NULL, NULL),
(5, 5, 1, 1, 100, 200, NULL, NULL),
(6, 6, 1, 1, 100, 200, NULL, NULL),
(7, 7, 1, 1, 100, 200, NULL, NULL),
(8, 8, 1, 1, 100, 200, NULL, NULL),
(9, 9, 1, 1, 100, 200, NULL, NULL),
(10, 10, 1, 1, 1987, 1201, NULL, '2024-05-29 03:14:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resign`
--

CREATE TABLE `resign` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nrk` varchar(255) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tmt_masuk` varchar(255) NOT NULL,
  `tmt_keluar` varchar(255) NOT NULL,
  `alasan` text NOT NULL,
  `surat_keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `resign`
--

INSERT INTO `resign` (`id`, `prodi_id`, `nama`, `nrk`, `nidn`, `jenis_kelamin`, `tmt_masuk`, `tmt_keluar`, `alasan`, `surat_keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super Admin', '1234567890', '1234567890', 'Laki-laki', '2022-04-20', '2024-04-20', 'Pindah', 'ada', NULL, NULL),
(2, 2, 'Pegawai', '1234567890', '1234567890', 'Laki-laki', '2022-04-20', '2024-04-20', 'Pindah', 'ada', NULL, NULL),
(3, 3, 'Akademik', '1234567890', '1234567890', 'Laki-laki', '2022-04-20', '2024-04-20', 'Pindah', 'ada', NULL, NULL),
(4, 4, 'Kemahasiswaan', '1234567890', '1234567890', 'Laki-laki', '2022-04-20', '2024-04-20', 'Pindah', 'ada', NULL, NULL),
(5, 5, 'Keuangan', '1234567890', '1234567890', 'Laki-laki', '2022-04-20', '2024-04-20', 'Pindah', 'ada', NULL, NULL),
(6, 6, 'Prodi', '1234567890', '1234567890', 'Laki-laki', '2022-04-20', '2024-04-20', 'Pindah', 'ada', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_semester` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`id`, `tahun_semester`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '2011/2012', '2012', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(2, '2012/2013', '2013', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(3, '2013/2014', '2014', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(4, '2014/2015', '2015', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(5, '2015/2016', '2016', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(6, '2016/2017', '2017', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(7, '2017/2018', '2018', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(8, '2018/2019', '2019', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(9, '2019/2020', '2020', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(10, '2020/2021', '2021', '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(11, '2020/2021', '2021', '2024-05-28 10:06:46', '2024-05-28 10:06:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `taslab`
--

CREATE TABLE `taslab` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `tmt` date NOT NULL,
  `masa_kerja` varchar(255) NOT NULL,
  `status_pegawai` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `bagian_tugas` varchar(255) DEFAULT NULL,
  `nitk` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `umur` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `taslab`
--

INSERT INTO `taslab` (`id`, `nama`, `unit_kerja`, `pendidikan`, `tmt`, `masa_kerja`, `status_pegawai`, `jabatan`, `bagian_tugas`, `nitk`, `tgl_lahir`, `no_hp`, `umur`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Abdul Aziz, S.T', 'MS', 'Strata S1', '2019-10-01', '4 Tahun 6 Bulan 24 Hari', 'Non ASN', 'Laboran', 'Pranata Laboratorium Pendidikan Teknik Mesin', '770023126', '1994-04-04', '081234567890', '32 Tahun 0 Bulan 20 Hari', 'abdul.aziz@staff.itera.ac.id', NULL, NULL),
(2, 'Achmad Samudra Dewantara, S.T.', 'TI', 'Magister S2', '2020-11-02', '3 Tahun 5 Bulan 23 Hari', 'Non ASN', 'Laboran', 'Pranata Laboratorium Pendidikan Teknik Industri', '1234567890', '1996-03-14', '081234567890', '28 Tahun 1 Bulan 11 Hari', 'achmad.dewantara@staff.itera.ac.id', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `undur-diri`
--

CREATE TABLE `undur-diri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_semester_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `mhs_undur_diri_genap` int(11) NOT NULL,
  `mhs_undur_diri_ganjil` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `undur-diri`
--

INSERT INTO `undur-diri` (`id`, `prodi_id`, `tahun_semester_id`, `tahun_id`, `mhs_undur_diri_genap`, `mhs_undur_diri_ganjil`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 10, 20, NULL, NULL),
(2, 2, 1, 1, 10, 20, NULL, NULL),
(3, 3, 1, 1, 7, 3, NULL, NULL),
(4, 4, 1, 1, 1, 5, NULL, NULL),
(5, 5, 1, 1, 10, 20, NULL, NULL),
(6, 6, 1, 1, 10, 20, NULL, NULL),
(7, 7, 1, 1, 10, 20, NULL, NULL),
(8, 8, 1, 1, 10, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'aktif',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super@fti.com', 'superadmin', 'aktif', '$2y$12$0Bdz.AWOsCKvdnRKUH/c2eHmqDIpY4BMkNYGuOCT75zZl0nMlnawa', NULL, NULL, NULL),
(2, 'Pegawai', 'pegawai@fti.com', 'pegawai', 'aktif', '$2y$12$emqmFuoMhuCUPKiySnLoJOZ5JlMmBv6zLIYpHIGfQBlJpUMfcRpSS', NULL, NULL, NULL),
(3, 'Akademik', 'akademik@fti.com', 'akademik', 'aktif', '$2y$12$jjIF8ILSDp0Iuwmy13X4ceeHSGXTD8sZAa9yDGK4QGi6SmU4zhFV2', NULL, NULL, NULL),
(4, 'Kemahasiswaan', 'kemahasiswaan@fti.com', 'kemahasiswaan', 'aktif', '$2y$12$YrCsh7GFzHlZiA0H478hUekrc97VcFacWh8KzpklXdHiM7stnl1Wa', NULL, NULL, NULL),
(5, 'Keuangan', 'keuangan@fti.com', 'keuangan', 'aktif', '$2y$12$22PqPqc8Pa2QVW2HGuSORuTxkr4/QEfQkoyDtzNbVThMRkQwYpHri', NULL, NULL, NULL),
(6, 'Prodi', 'prodi@fti.com', 'prodi', 'aktif', '$2y$12$nKEV70VJY7iSUFhsklDFkuI13x8l5SfUcUeVIS5obFZd0/niz4tNG', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wafat`
--

CREATE TABLE `wafat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_semester_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `mhs_wafat_genap` int(11) NOT NULL,
  `mhs_wafat_ganjil` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wafat`
--

INSERT INTO `wafat` (`id`, `prodi_id`, `tahun_semester_id`, `tahun_id`, `mhs_wafat_genap`, `mhs_wafat_ganjil`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 2, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(2, 2, 1, 1, 3, 4, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(3, 3, 1, 1, 5, 6, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(4, 1, 2, 2, 1, 2, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(5, 2, 2, 2, 3, 4, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(6, 3, 2, 2, 5, 6, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(7, 1, 3, 3, 1, 2, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(8, 2, 3, 3, 3, 4, '2024-05-28 10:06:46', '2024-05-28 10:06:46'),
(9, 3, 3, 3, 5, 6, '2024-05-28 10:06:46', '2024-05-28 10:06:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aknalu`
--
ALTER TABLE `aknalu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `allrekap`
--
ALTER TABLE `allrekap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `asmikbel`
--
ALTER TABLE `asmikbel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosbel`
--
ALTER TABLE `dosbel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `doslubi`
--
ALTER TABLE `doslubi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doslubi_nup_nidk_unique` (`nup_nidk`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lulus`
--
ALTER TABLE `lulus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pejabat_nip_unique` (`nip`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekap-mhs`
--
ALTER TABLE `rekap-mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resign`
--
ALTER TABLE `resign`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `taslab`
--
ALTER TABLE `taslab`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `undur-diri`
--
ALTER TABLE `undur-diri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wafat`
--
ALTER TABLE `wafat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aknalu`
--
ALTER TABLE `aknalu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `allrekap`
--
ALTER TABLE `allrekap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `asmikbel`
--
ALTER TABLE `asmikbel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `dosbel`
--
ALTER TABLE `dosbel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `doslubi`
--
ALTER TABLE `doslubi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lulus`
--
ALTER TABLE `lulus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `rekap-mhs`
--
ALTER TABLE `rekap-mhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `resign`
--
ALTER TABLE `resign`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `taslab`
--
ALTER TABLE `taslab`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `undur-diri`
--
ALTER TABLE `undur-diri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `wafat`
--
ALTER TABLE `wafat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
