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

 Date: 05/12/2023 16:20:43
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
  UNIQUE INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_agenda
-- ----------------------------
INSERT INTO `m_agenda` VALUES (1, 'Kegiatan MGMP SMN 1 MOJOWARNO', 'proses', '2023-12-05 13:21:00', '2023-12-06 15:00:00', 'SMPN MOJOWARNO', 'Jenis Acara 2 gfgfgf fgfghf', 'XX1/SJJ/SA/SASA');

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
INSERT INTO `m_pegawai` VALUES (161, '198610082019012001', 'HIDAYATURROBBY DIANTORO', 'Pangkat', 'asasaa', '081330743342', 'Jalan Pacar, Ketabang 60272, Indonesia', 'Jabatan', '2023-12-05', 'Jombang', '', 'user1', '202cb962ac59075b964b07152d234b70', 'P');

-- ----------------------------
-- Table structure for m_penugasan
-- ----------------------------
DROP TABLE IF EXISTS `m_penugasan`;
CREATE TABLE `m_penugasan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pegawai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_agenda` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_penugasan
-- ----------------------------
INSERT INTO `m_penugasan` VALUES (3, '161', 1);
INSERT INTO `m_penugasan` VALUES (5, '160', 1);

-- ----------------------------
-- Table structure for m_users
-- ----------------------------
DROP TABLE IF EXISTS `m_users`;
CREATE TABLE `m_users`  (
  `admin_id` int NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1'
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_users
-- ----------------------------
INSERT INTO `m_users` VALUES (4, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

SET FOREIGN_KEY_CHECKS = 1;
