/*
 Navicat Premium Data Transfer

 Source Server         : localhost-3305
 Source Server Type    : MySQL
 Source Server Version : 100134
 Source Host           : localhost:3305
 Source Schema         : dms-ppdb

 Target Server Type    : MySQL
 Target Server Version : 100134
 File Encoding         : 65001

 Date: 10/02/2020 14:09:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_level` int(11) NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `active_at` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `web` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ppdb_status` tinyint(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES (1, 'SMP NEGERI 1 ALAS BARAT', 'Alamat', 'www.google.com', NULL, 'logo.jpg', 1);

-- ----------------------------
-- Table structure for document
-- ----------------------------
DROP TABLE IF EXISTS `document`;
CREATE TABLE `document`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_approval` tinyint(2) NULL DEFAULT NULL,
  `is_shared` tinyint(2) NULL DEFAULT NULL,
  `shared_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for document_approval
-- ----------------------------
DROP TABLE IF EXISTS `document_approval`;
CREATE TABLE `document_approval`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_document` int(11) NULL DEFAULT NULL,
  `id_admin` int(11) NULL DEFAULT NULL,
  `status` enum('BELUM','DITERIMA','DITOLAK') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'BELUM',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of document_approval
-- ----------------------------
INSERT INTO `document_approval` VALUES (1, 1, 1, '', NULL, NULL);
INSERT INTO `document_approval` VALUES (2, 1, 2, '', NULL, NULL);

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level`  (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `options` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu_forbidden` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_level`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES (1, 'Super Admin', '', '', '', NULL, NULL);
INSERT INTO `level` VALUES (2, 'Kepala Sekolah', '', '', '', NULL, NULL);
INSERT INTO `level` VALUES (3, 'Ketua', '', '', '', NULL, NULL);
INSERT INTO `level` VALUES (4, 'Wakil Ketua', '', '', '', NULL, NULL);
INSERT INTO `level` VALUES (5, 'Bendahara', '', '', '', NULL, NULL);
INSERT INTO `level` VALUES (6, 'Sekertaris', '', '', '', NULL, NULL);
INSERT INTO `level` VALUES (7, 'Anggota', '', '', '', NULL, NULL);

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nisn` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_siswa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tempat_lahir` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama_siswa` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_keluarga` enum('Anak kandung','Anak angkat') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat_siswa` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hp_siswa` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email_siswa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kewarganegaraan_siswa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_ayah` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pendidikan_ayah` enum('Tidak sekolah','SD/MI','SMP/MTs','SMA/SMK/MA','Diploma','S1','S2','S3') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan_ayah` enum('Buruh','Tani','Wiraswasta','PNS','Polri/TNI','Perangkat Desa','Nelayan','Lainnya') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `penghasilan_ayah` enum('-500rb','500-1jt','1jt-3jt','3jt-5jt','5jt-10jt','10jt+') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kewarganegaraan_ayah` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hp_ayah` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_ibu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pendidikan_ibu` enum('Tidak sekolah','SD/MI','SMP/MTs','SMA/SMK/MA','Diploma','S1','S2','S3') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan_ibu` enum('Ibu Rumah Tangga','Buruh','Tani','Wiraswasta','PNS','Polri/TNI','Perangkat Desa','Lainnya') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `penghasilan_ibu` enum('-500rb','500-1jt','1jt-3jt','3jt-5jt','5jt-10jt','10jt+') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kewarganegaraan_ibu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hp_ibu` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_wali` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pendidikan_wali` enum('Tidak sekolah','SD/MI','SMP/MTs','SMA/SMK/MA','Diploma','S1','S2','S3') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan_wali` enum('Ibu Rumah Tangga','Buruh','Tani','Wiraswasta','PNS','Polri/TNI','Perangkat Desa','Lainnya') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `penghasilan_wali` enum('-500rb','500-1jt','1jt-3jt','3jt-5jt','5jt-10jt','10jt+') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hp_wali` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kewarganegaraan_wali` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `npsn_sekolah` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_sekolah` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_sekolah` enum('Negeri','Swasta') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `model_ujian_nasional` enum('UNBK','UNKP') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat_sekolah` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tahun_lulus` year NULL DEFAULT NULL,
  `status_pendaftaran` enum('BELUM','DITERIMA','DITOLAK') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `waktu_pendaftaran` time(0) NULL DEFAULT NULL,
  `dusun` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rt` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rw` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `desa` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kecamatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kota` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `provinsi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_pos` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kk` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rekap_raport` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rekom_pribadi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tinggal_kelas_file` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_info` datetime(0) NULL DEFAULT NULL,
  `anak_ke` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `anak_bersaudara` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tinggi_cm` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `berat_kg` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pil_1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pil_2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pil_3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_pendaftaran` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (31, 'VDIQ8', '0050674855', '6408042107050004', 'Andreas Kristianto', '', 'Sangatta', '2005-07-21', 'Kristen Protestan', 'Anak kandung', 'Gg. Anggur No. 21, RT-014, Singa Gembara, Sangatta, Kutai Timur, Kalimantan Timur', '+6282358930045', 'adi.s.prawoto@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'Dri Nova Kristianto', '', 'Lainnya', '10jt+', '+62823576883', NULL, '', 'Jl. Dr. Soetomo - S-04', 'Negeri', 'UNBK', '', 0000, '', '2020-02-04', '00:00:10', 'Singa Gembara', '014', '0', 'Singa Gembara', 'Sangatta Utara', 'Kutai Timur', 'Kalimantan Timur', '75681', 'foto.jpg', 'kk.pdf', 'rekapitulasi_raport.pdf', 'rekomendasi_sekolah.pdf', 'pernyataan_tinggal_kelas.pdf', NULL, '2', '3', '168', '44', 'IPA', '', '', '5', NULL, NULL);
INSERT INTO `student` VALUES (32, 'C8IMW', '0045930098', '6408042512040004', 'Maha Putra Pandu Prasetia', '', 'Sangatta', '2004-12-25', 'Islam', 'Anak kandung', 'Jl. Bumi Ayu No. 158', '+6282196635967', 'adi.s.prawoto@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'Roni Pandu Prasetia', '', 'Lainnya', '10jt+', '+62821754482', NULL, '', 'SMP YPPSB Sangatta Utara', 'Negeri', 'UNBK', '', 0000, '', '2020-02-04', '00:00:11', 'Sangatta Utara', '003', '0', 'Sangatta Utara', 'Sangatta Utara', 'Kutai Timur', 'Kalimantan Timur', '75681', 'foto.jpg', 'kk.pdf', 'rekapitulasi_raport.pdf', 'rekomendasi_sekolah.pdf', 'pernyataan_tinggal_kelas.pdf', NULL, '1', '2', '166', '50', 'IPA', '', '', '6', NULL, NULL);
INSERT INTO `student` VALUES (33, '1N7JK', '0045119243', '3510055911040002', 'MELLYANA INDIRA HANDOKO', '', 'Banyuwangi', '2004-11-19', 'Kristen Protestan', 'Anak kandung', 'Dsn Krajan RT.003 / RW.003 Desa Blambangan, Kecamatan Muncar', '+6282228488077', 'ccaindira@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'HANDOKO', '', 'Wiraswasta', '3jt-5jt', '+62813581619', NULL, '', 'SMP Katolik Sint Yoseph Muncar', 'Negeri', 'UNBK', '', 0000, '', '2020-02-04', '00:00:12', 'Krajan', '003', '003', 'Blambangan', 'Muncar', 'Banyuwangi', 'Jawa Timur', '68472', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '1', '169', '56', 'IPS', '', '', '7', NULL, NULL);
INSERT INTO `student` VALUES (34, 'TMPN6', '0044827777', '3508110408040001', 'MOCHAMMAD AGUSTIO IRFAILLAH', '', 'LUMAJANG', '2004-08-04', 'Islam', 'Anak kandung', 'Dusun Karangmulyo Wetan ', '+6281259097229', 'hidayat090872@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'Jumadi', '', 'Wiraswasta', '', '+62857453995', NULL, '', 'SMP AL IKHLASH LUMAJANG', 'Negeri', 'UNBK', '', 0000, '', '2020-02-04', '00:00:13', 'Karangmulyo Wetan', '003', '003', 'Karanganom', 'Pasrujambe', 'Lumajang', 'Jawa Timur', '67361', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '2', '175', '52', 'IPS', '', '', '8', NULL, NULL);
INSERT INTO `student` VALUES (35, '026DP', '0045884837', '6166', 'AQSA MAHESA PUTRA', '', 'BANYUWANGI', '2005-02-12', 'Islam', 'Anak kandung', 'jl . pulau yoni Gg.2 no 5 pamogan Denpasar -Bali ', '+6289580023647', 'aqsamahesaputra78@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'HARTATIK ', '', 'Lainnya', '5jt-10jt', '+62812397661', NULL, '', 'SMP MUHAMADIYAH 1 DENPASAR', 'Negeri', 'UNBK', '', 0000, '', '2020-02-04', '00:00:16', 'PEDUNGAN', '000', '01', 'PEDUNGAN ', 'DENPASAR SELATAN ', 'BADUNG', 'BALI', '80021', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.', 'pernyataan_tinggal_kelas.', NULL, '2', '3', '167', '51', 'IPA', '', '', '9', NULL, NULL);
INSERT INTO `student` VALUES (36, 'W7AQ5', '0045494381', '3526012310040005', 'HANDIKA SAKTI RAMADHANI PUTRA', '', 'BANGKALAN', '2004-10-23', 'Islam', 'Anak kandung', 'Jl.trunojoyo bangkalan-madura', '+6287702104376', 'handikasakti@candid.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'Mohammad Basir', '', 'Wiraswasta', '10jt+', '+62823355580', NULL, '', 'UPTD SMPN 1BANGKALAN', 'Negeri', 'UNBK', '', 0000, '', '2020-02-04', '00:00:17', 'Sattowan', '02', '02', 'Pejagan', 'Bangkalan', 'Bangkalan', 'jawa timur', '69112', 'foto.pdf', 'kk.pdf', 'rekapitulasi_raport.pdf', 'rekomendasi_sekolah.pdf', 'pernyataan_tinggal_kelas.pdf', NULL, '1', '2', '170', '65', 'IPA', '', '', '10', NULL, NULL);
INSERT INTO `student` VALUES (37, 'XLMD2', '0045636460', '23521', 'Daffa Ditra Aqillah Fikri', '', 'Bojonegoro', '2004-11-13', 'Islam', 'Anak kandung', 'Perum Pacul Permai Blok B 09  Bojonegoro Jatim', '+6281234062399', 'daffaditra.emperor13@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'Welly Fitrama SSTP,MM', 'S2', 'PNS', '5jt-10jt', '+62819390464', NULL, '', 'SMPN 1 Bojonegoro Jatim', 'Negeri', 'UNBK', '', 0000, '', '2020-02-05', '00:00:07', 'Perum Pacul Permai Blok B 09', '018', '003', 'Pacul', 'Bojonegoro', 'Bojonegoro', 'Jawa Timur', '62114', 'foto.pdf', 'kk.pdf', 'rekapitulasi_raport.pdf', 'rekomendasi_sekolah.pdf', 'pernyataan_tinggal_kelas.pdf', NULL, '1', '1', '157', '60', 'IPA', '', '', '11', NULL, NULL);
INSERT INTO `student` VALUES (38, '6HAIG', '0057630495', '3272014507050001', 'VIRAHMAWATI', '', 'SUKABUMI', '2005-07-05', 'Islam', 'Anak kandung', 'Puri Cibeureum Permai 1 JL. KRAKATAU 20', '+6285720938381', 'mawativirah05@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'RUDIANTO', 'S1', 'PNS', '5jt-10jt', '+62857209601', NULL, '', 'SMP Islam Al Azhar 7 Sukabumi', 'Negeri', 'UNBK', '', 0000, '', '2020-02-05', '00:00:08', 'PURI CIBEUREM PERMAI 1', '001', '010', 'CIBEUREUMHILIR', 'CIBEUREUM', 'SUKABUMI', 'JAWA BARAT', '43164', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '2', '152', '48', 'IPS', '', '', '12', NULL, NULL);
INSERT INTO `student` VALUES (40, 'DHG91', '3041020891', '3525027012040001', 'SEPTIA PUTRI PERTAMI', '', 'GRESIK', '2004-12-30', 'Islam', 'Anak kandung', 'DSN MAMBUNG LOR RT.02 RW.01 DS BANJAR AGUNG,BALONG PANGGANG,GRESIK', '+6285857500049', 'septiapertami30@gmail.con', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'KUSMANTO', '', 'Wiraswasta', '3jt-5jt', '+62857921718', NULL, '', 'MTsN 2 JEMBRANA', 'Negeri', 'UNBK', '', 0000, '', '2020-02-05', '00:00:15', 'MAMBUNG LO4', '02', '01', 'BANJAR AGUNG', 'BALONG PANGGANG', 'GRESIK', 'JAWA TIMUR', '61173', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '2', '161', '53', 'IPS', '', '', '14', NULL, NULL);
INSERT INTO `student` VALUES (41, '3J1RC', '0046938278', '3525020911040002', 'NOVA DWI RAMDHAN', '', 'GRESIK', '2004-11-09', 'Islam', 'Anak kandung', 'DSN MAMBUNG LOR RT.02 RW.01 DS BANJAR AGUNG,BALONG PANGGANG,GRESIK,JAWA TIMUR', '+6281647602852', 'novaramadhan85808@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'MUADI', 'SD/MI', 'Wiraswasta', '3jt-5jt', '+62857372327', NULL, '', 'MTsN 2 JEMBRANA', 'Negeri', 'UNBK', '', 0000, '', '2020-02-05', '00:00:15', 'MAMBUNG LOR', '02', '01', 'BANJAR AGUNG', 'BALONG PANGGANG', 'GRESIK', 'JAWA TIMUR', '61173', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '2', '2', '155', '45', 'IPA', '', '', '15', NULL, NULL);
INSERT INTO `student` VALUES (42, 'K3I85', '0048817913', '3509275012040002', 'Dinar Citra Maharani', '', 'Jember', '2004-12-10', 'Islam', 'Anak kandung', 'Kab jember, kec kalisat, desa ajung, rt 5, rw 7', '+6285330163919', 'dinarcitra@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'Yuda irawan', '', 'Tani', '5jt-10jt', '+62812319454', NULL, '', 'SMP Negeri 1 Kalisat', 'Negeri', 'UNBK', '', 0000, '', '2020-02-05', '00:00:19', 'Ajung Oloh', '05', '07', 'Ajung', 'Kalisat', 'Jember', 'Jawa timur', '68913', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '2', '151', '43', 'IPS', '', '', '16', NULL, NULL);
INSERT INTO `student` VALUES (43, 'XT27F', '0046657124', '3510231508040001', 'AGSA AGUSTA WILDANA', '', 'BANYUWANGI', '2004-08-15', 'Islam', 'Anak kandung', 'DUSUN MOJOROTO RT.03/RW.03,DESA TEGALSARI,KECAMATAN TEGALSARI,KABUPATEN BANYUWANGI,JAWATIMUR', '+6282244477367', 'agustamulyadi@yahoo.co.id', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'AGUS MULYADI,S.H,M.Kn', 'S2', 'Wiraswasta', '10jt+', '+62813333343', NULL, '', 'SMP AL KAUTSAR-SRONO', 'Negeri', 'UNBK', '', 0000, '', '2020-02-05', '00:00:20', 'MOJOROTO', '03', '03', 'TEGALSARI', 'TEGALSARI', 'BANYUWANGI', 'JAWATIMUR', '68485', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '2', '172', '50', 'IPA', '', '', '17', NULL, NULL);
INSERT INTO `student` VALUES (44, 'J2EVF', '7084', '3510071210040004', 'YORDA BERLY IRFAN SUNAWAN', '', 'BANYUWANGI', '2004-10-12', 'Islam', 'Anak kandung', 'Dusun Bulusari, RT 04 RW 01 Desa Jajag, Kecamatan Gambiran, Kabupaten Banyuwangi', '+6281259917042', 'yordasunawan5@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'HERI SUNAWAN', 'SMP/MTs', 'Wiraswasta', '5jt-10jt', '+62823316528', NULL, '', 'SMP NEGERI 2 GAMBIRAN', 'Negeri', 'UNBK', '', 0000, '', '2020-02-06', '00:00:08', 'Bulusari', '4', '1', 'Jajag', 'Gambiran', 'Banyuwangi', 'Jawa Timur', '68486', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '2', '165', '45', 'Pilihan Jurusan', '', '', '18', NULL, NULL);
INSERT INTO `student` VALUES (45, '8YR7W', '0045945274', '3529023008040002', 'Diky Wahyu Irawan', '', 'Sumenep', '2004-08-30', 'Islam', 'Anak kandung', 'Jalan Adi Sucipto ', '+6285931307320', 'dikywahyuirawan015@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'Abdus Safi', 'SMP/MTs', 'Tani', '5jt-10jt', '+62878503189', NULL, '', 'SMPN 5 Sumenep', 'Negeri', 'UNBK', '', 0000, '', '2020-02-06', '00:00:08', 'Kauman', '006', '002', 'Pinggir Papas', 'Kalianget ', 'Sumenep', 'Jawa Timur', '69471', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '2', '3', '167', '75', 'IPS', '', '', '19', NULL, NULL);
INSERT INTO `student` VALUES (46, 'YXU8I', '0054530961', '1571072707050101', 'M. FADHLI HIDAYAT', '', 'JAMBI', '2005-07-27', 'Islam', 'Anak kandung', 'Villa Nusa Permata II Blok B.9 ', '+6285258830469', 'Hidayat2707hidayat@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'AHWANI', 'S2', 'Polri/TNI', '5jt-10jt', '+62821733120', NULL, '', 'SMPN 1 KOTA JAMBI', 'Negeri', 'UNBK', '', 0000, '', '2020-02-06', '00:00:08', 'Jl. ABDUL LAMAN', '09', '00', 'HANDIL JAYA', 'JELUTUNG', 'KOTA JAMBI', 'JAMBI', '36124', 'foto.jpg', 'kk.pdf', 'rekapitulasi_raport.pdf', 'rekomendasi_sekolah.pdf', 'pernyataan_tinggal_kelas.pdf', NULL, '1', '3', '168', '90', 'IPS', '', '', '20', NULL, NULL);
INSERT INTO `student` VALUES (47, 'ZASH7', '00', '350', 'FAKHRUR RIZA SAPUTRA', '', 'MALANG', '2004-08-06', 'Islam', 'Anak kandung', 'JL RAYA KEDUNGREJO DUSUN GENITRI NO 96 RT 002/001 KECAMATAN PAKIS KAB. MALANG', '+6285607016202', 'rizasaputra24.rs@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'MULYONO', 'S2', 'PNS', '5jt-10jt', '+62851006765', NULL, '', 'SMPN 22 MALANG', 'Negeri', 'UNBK', '', 0000, '', '2020-02-06', '00:00:12', 'GENITRI', '002', '001', 'KEDUNGREJO', 'PAKIS', 'MALANG', 'JAWA TIMUR', '65154', 'foto.pdf', 'kk.pdf', 'rekapitulasi_raport.pdf', 'rekomendasi_sekolah.pdf', 'pernyataan_tinggal_kelas.pdf', NULL, '3', '3', '168', '50', 'IPA', '', '', '21', NULL, NULL);
INSERT INTO `student` VALUES (48, 'EP1K2', '0045071499', '3507180608040006', 'FAKHRUR RIZA SAPUTRA', '', 'MALANG', '2004-08-06', 'Islam', 'Anak kandung', 'JL RAYA KEDUNGREJO DUSUN GENITRI NO 96 RT 002/001 KECAMATAN PAKIS KAB. MALANG', '+6285607016202', 'rizasaputra24.rs@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'MULYONO', 'S2', 'PNS', '5jt-10jt', '+62851006765', NULL, '', 'SMPN 22 MALANG', 'Negeri', 'UNBK', '', 0000, '', '2020-02-06', '00:00:13', 'GENITRI', '002', '001', 'KEDUNGREJO', 'PAKIS', 'MALANG', 'JAWA TIMUR', '65154', 'foto.pdf', 'kk.pdf', 'rekapitulasi_raport.pdf', 'rekomendasi_sekolah.pdf', 'pernyataan_tinggal_kelas.pdf', NULL, '3', '3', '168', '50', 'IPA', '', '', '22', NULL, NULL);
INSERT INTO `student` VALUES (49, 'LET36', '0055824232', '3510182303050007', 'MOCHAMMAD IVAN SYAIFULLAH', '', 'BANYUWANGI', '2005-03-23', 'Islam', 'Anak kandung', 'DUSUN CURAHSAWO RT 04 RW 01 DESA SIDODADI KECAMATAN WONGSORJO KABUPATEN BANYUWANGI', '+6287701777964', 'IVANHARI', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'HARIYONO', '', 'Wiraswasta', '3jt-5jt', '', NULL, '', 'SMP BUSTANUL MAKMUR', 'Negeri', 'UNBK', '', 0000, '', '2020-02-06', '00:00:19', 'CURAHSAWO', '04', '01', 'SIDODADI', 'WONGSORJO', 'BANYUWANGI', 'JAWA TIMUR', '68453', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '2', '', '', 'IPA', '', '', '23', NULL, NULL);
INSERT INTO `student` VALUES (50, '7ZRIY', '0000987654', '3509065908030002', 'BANDUNG BONDOWOSO', '', 'CARUBAN', '2020-02-07', 'Islam', 'Anak kandung', 'Jl. Kasunanan No. 15 Kecamatan Prambanan', '+6285790788990', 'bandungbondowoso@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'KARTO WAGIYO', 'S2', 'PNS', '10jt+', '+62812345432', NULL, '', 'SMPN 2 PRAMBANAN', 'Negeri', 'UNBK', '', 0000, '', '2020-02-07', '00:00:09', 'Kertonyono', '1', '3', 'Kertonyono', 'Prambanan', 'JAWA TENGAH6455', 'Jawa Tengah', '64154', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '2', '170', '58', 'IPS', '', '', '24', NULL, NULL);
INSERT INTO `student` VALUES (51, 'O1CRY', '0058476517', '3515081005050001', 'HANIEF FALAH ABRAR', '', 'SIDOARJO', '2005-05-10', 'Islam', 'Anak kandung', 'BHAYANGKARA PERMAI BLOK D/04 SIDOARJO', '+6281913561793', 'haniefabrar@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'SEMAN MUJIONO', '', 'Wiraswasta', '10jt+', '+62812313792', NULL, '', 'SMPN 2 SIDOARJO', 'Negeri', 'UNBK', '', 0000, '', '2020-02-07', '00:00:09', 'JEDONG', '23', '08', 'URANGAGUNG', 'SIDOARJO', 'SIDOARJO', 'JAWA TIMUR', '61221', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '2', '3', '168', '53', 'IPA', '', '', '25', NULL, NULL);
INSERT INTO `student` VALUES (52, '09L75', '0051896828', '3510120206780003', 'FIKRI AMMARDA TEGUH PUTRA P.', '', 'banyuwangi', '2005-10-19', 'Islam', 'Anak kandung', 'dusunkrajan, rt. 01/01, desa singolatren, kecamatan singojuruh, kabupaten banyuwangi', '+6282141025772', 'frnanang34@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'nanang fahrurrozi', '', 'Polri/TNI', '3jt-5jt', '+62821410257', NULL, '', 'SMPN 1 SINGOJURUH', 'Negeri', 'UNBK', '', 0000, '', '2020-02-07', '00:00:11', 'krajan', '1', '1', 'singolatren', 'singojuruh', 'banyuwangi', 'jawa timur', '68464', 'foto.png', 'kk.png', 'rekapitulasi_raport.png', 'rekomendasi_sekolah.png', 'pernyataan_tinggal_kelas.png', NULL, '1', '3', '166', '52', 'IPA', '', '', '26', NULL, NULL);
INSERT INTO `student` VALUES (53, 'TR0PV', '0056679882', '5171010402050007', 'Ilham Sanditya Wiratama', '', 'Malang', '2005-02-04', 'Islam', 'Anak kandung', 'Asrama Yonif 514/R Kostrad', '+6281332959441', 'amirahelga09@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'Farit Prasetyo, A.Md', 'Diploma', 'Polri/TNI', '3jt-5jt', '+62822348892', NULL, '', 'SMPN 1 Bondowoso', 'Negeri', 'UNBK', '', 0000, '', '2020-02-07', '00:00:11', 'Curahpoh', '015', '003', 'Curahpoh', 'Curahdami', 'Bondowoso', 'Jawa Timur', '68251', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '2', '170', '46', 'IPA', '', '', '27', NULL, NULL);
INSERT INTO `student` VALUES (54, 'ZV10Y', '0045968105', '3513224510040003', 'Azizah vadyani oktarika', '', 'Probolinggo ', '2004-10-05', 'Islam', 'Anak kandung', 'Jl bantaran kab probolinggo ', '+6282229374808', 'Oktarika04@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'Heni karyawati', 'S1', 'PNS', '1jt-3jt', '+62812333785', NULL, '', 'Smpn 10 probolinggo ', 'Negeri', 'UNBK', '', 0000, '', '2020-02-07', '00:00:12', 'Krajan', '002', '001', 'Patalan', 'Wonomerto', 'Kabupaten probolinggo ', 'Jawa Timur ', '67253', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '2', '157', '45', 'IPS', '', '', '28', NULL, NULL);
INSERT INTO `student` VALUES (55, 'PRW2V', '0045969105', '3513224510040003', 'Azizah vadyani oktarika', '', 'Probolinggo ', '2004-10-05', 'Islam', 'Anak kandung', 'Jl bantaran kab probolinggo ', '+6282229374808', 'oktarika04@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'Heni karyawati', 'S1', 'PNS', '1jt-3jt', '+62812333785', NULL, '', 'Smpn 10 probolinggo ', 'Negeri', 'UNBK', '', 0000, '', '2020-02-07', '00:00:12', 'Krajan', '002', '001', 'Desa patalan', 'Wonomerto', 'Kabupaten probolinggo ', 'Jawa timur', '67253', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '2', '157', '45', 'IPS', '', '', '29', NULL, NULL);
INSERT INTO `student` VALUES (56, 'T8CM3', '0041343145', '13737', 'Muchammad Rega Dzikrillah Rama', '', 'BONDOWOSO', '2004-10-24', 'Islam', 'Anak kandung', 'Jl. Brig Pol Sudarlan\r\nBONDOWOSO', '+6282264157775', 'regadzikrillah@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'Supriyadi', 'S1', 'PNS', '3jt-5jt', '+62852583000', NULL, '', 'SMP NEGERI 1 BONDOWOSO', 'Negeri', 'UNBK', '', 0000, '', '2020-02-07', '00:00:12', 'Nangkaan', '14', '04', 'Kelurahan Nangkaan', 'BONDOWOSO', 'BONDOWOSO', 'Jawa Timur', '68215', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '3', '173', '68', 'IPA', '', '', '30', NULL, NULL);
INSERT INTO `student` VALUES (57, '94BSO', '10817', '3513140104050002', 'RHEYHAN SAPUTRA', '', 'PROBOLINGGO', '2005-04-01', 'Islam', 'Anak kandung', 'JL. PATIMURA, dsn. asemkandang RT/RW. 004/001. DESA ASEMBAGUS KEC. KRAKSAAN KAB. PROBOLINGGO JATIM', '+6281339592092', 'reyhannoxmix@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'WIDODIT', '', 'Perangkat Desa', '500-1jt', '+62821312033', NULL, '', 'SMP NEGERI 1 KRAKSAAN', 'Negeri', 'UNBK', '', 0000, '', '2020-02-07', '00:00:19', 'ASEMKANDANG', '004', '001', 'ASEMBAGUS', 'KRAKSAAN', 'PROBOLINGGO', 'JAWA TIMUR', '67282', 'foto.pdf', 'kk.pdf', 'rekapitulasi_raport.pdf', 'rekomendasi_sekolah.pdf', 'pernyataan_tinggal_kelas.pdf', NULL, '1', '3', '170', '48', 'IPA', '', '', '31', NULL, NULL);
INSERT INTO `student` VALUES (58, '6OYPQ', '0057748425', '3404100901050002', 'SULTHAN FARID ZAIDAN A.S', '', 'SLEMAN', '2005-01-09', 'Islam', 'Anak kandung', 'JL. KARANGDORO - GENTENG', '+6282227700200', 'sulthanfarid4@gmail.com', '', '', 'Tidak sekolah', 'Buruh', '-500rb', NULL, '', '', 'Tidak sekolah', 'Ibu Rumah Tangga', '-500rb', '', '', 'SIGIT TEDISANTOSO', '', 'Wiraswasta', '5jt-10jt', '+62812600100', NULL, '', 'SMP NEGERI 1 GENTENG', 'Negeri', 'UNBK', '', 0000, '', '2020-02-07', '00:00:20', 'BALOKAN', '3', '1', 'DASRI', 'TEGALSARI', 'BANYUWANGI', 'JAWA TIMUR', '68491', 'foto.jpg', 'kk.jpg', 'rekapitulasi_raport.jpg', 'rekomendasi_sekolah.jpg', 'pernyataan_tinggal_kelas.jpg', NULL, '1', '3', '162', '60', 'IPA', '', '', '32', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
