/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : sppd

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 05/01/2024 08:27:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_agenda
-- ----------------------------
DROP TABLE IF EXISTS `m_agenda`;
CREATE TABLE `m_agenda`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `agenda` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `tempat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `nomor_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_surat` date NULL DEFAULT NULL,
  `perihal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `file` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_surat` int NULL DEFAULT NULL,
  UNIQUE INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_agenda
-- ----------------------------
INSERT INTO `m_agenda` VALUES (1, 'Kegiatan MGMP SMN 1 MOJOWARNO', 'proses', '2023-12-05 13:21:00', '2023-12-06 15:00:00', 'Probolinggo', 'Tes Coba', '10/21010/01011', '2023-12-15', 'Undangan', 'Keterisian_Monev_November_Tanggal_07-12-2023_Jam_10_30_34.pdf', 2);
INSERT INTO `m_agenda` VALUES (3, 'Coba agenda', 'proses', '2023-12-15 09:21:00', '2023-12-15 09:21:00', 'Probolinggo', 'Deskripsi', '10/21010/01011', '2023-12-15', 'Undangan', NULL, 2);

-- ----------------------------
-- Table structure for m_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `m_pegawai`;
CREATE TABLE `m_pegawai`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nip` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pangkat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `golongan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_hp` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jabatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pendidikan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jk` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  UNIQUE INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 163 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_pegawai
-- ----------------------------
INSERT INTO `m_pegawai` VALUES (160, '198610082019012001', 'Hilmi', 'Pangkat', 'Golongan', '081330743342', 'Alamat', 'Jabatan', '2023-12-04', 'Jombang', '', 'user', '202cb962ac59075b964b07152d234b70', 'L');
INSERT INTO `m_pegawai` VALUES (161, '198610082019012001', 'Hidayaturrobi', 'Pangkat', 'asasaa', '081330743342', 'Jalan Pacar, Ketabang 60272, Indonesia', 'Jabatan', '2023-12-05', 'Jombang', '', 'user1', '202cb962ac59075b964b07152d234b70', 'P');

-- ----------------------------
-- Table structure for m_pencairan
-- ----------------------------
DROP TABLE IF EXISTS `m_pencairan`;
CREATE TABLE `m_pencairan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_agenda` int NULL DEFAULT NULL,
  `berangkat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jarak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dana` int NULL DEFAULT NULL,
  `lat_long1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lat_long2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_pencairan
-- ----------------------------
INSERT INTO `m_pencairan` VALUES (2, 1, 'SMPN 11 Cirebon, Karyamulya, Kota Cirebon, Jawa Barat, Indonesia', 'SMPN 29 BANDUNG, Jalan Geger Arum, Isola, Kota Bandung, Jawa Barat, Indonesia', '158 ', 632000, '-6.746659500000001,108.5285396', '-6.8608011,107.5863855');
INSERT INTO `m_pencairan` VALUES (3, 3, 'Surabaya, Jawa Timur, Indonesia', 'SMP NEGERI 1 JOMBANG, Jalan Pattimura, Sengon, Kabupaten Jombang, Jawa Timur, Indonesia', '81.3 ', 325200, '-7.2574719,112.7520883', '-7.553703400000001,112.2267919');

-- ----------------------------
-- Table structure for m_penugasan
-- ----------------------------
DROP TABLE IF EXISTS `m_penugasan`;
CREATE TABLE `m_penugasan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pegawai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_agenda` int NULL DEFAULT NULL,
  `deskripsi_laporan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status_laporan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `catatan_laporan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_penugasan
-- ----------------------------
INSERT INTO `m_penugasan` VALUES (7, '160', 1, '               Deskripsi Hasil Pertemuan :              ', 'setuju', 'setuju');
INSERT INTO `m_penugasan` VALUES (8, '161', 1, NULL, 'setuju', '');
INSERT INTO `m_penugasan` VALUES (9, '160', 3, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for m_surat_masuk
-- ----------------------------
DROP TABLE IF EXISTS `m_surat_masuk`;
CREATE TABLE `m_surat_masuk`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `file_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `perihal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi_surat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_surat_masuk
-- ----------------------------
INSERT INTO `m_surat_masuk` VALUES (2, '10/21010/01011', 'Nama Surat Masuk', '2023-12-15', 'MGMP_Bin_7_Nov_20233.pdf', 'Undangan', 'sasa', 'Probolinggo');

-- ----------------------------
-- Table structure for m_users
-- ----------------------------
DROP TABLE IF EXISTS `m_users`;
CREATE TABLE `m_users`  (
  `admin_id` int NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` enum('1','2','3') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1'
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_users
-- ----------------------------
INSERT INTO `m_users` VALUES (4, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');
INSERT INTO `m_users` VALUES (2, 'Operator', 'operator', '202cb962ac59075b964b07152d234b70', '2');
INSERT INTO `m_users` VALUES (3, 'bendahara', 'bendahara', '202cb962ac59075b964b07152d234b70', '3');

SET FOREIGN_KEY_CHECKS = 1;
