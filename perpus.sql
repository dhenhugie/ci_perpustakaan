/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : perpus

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 15/12/2020 20:26:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Ade Nugraha', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for anggota
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota`  (
  `id_anggota` int NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gender` enum('Laki-laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` int NULL DEFAULT 0,
  PRIMARY KEY (`id_anggota`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of anggota
-- ----------------------------
INSERT INTO `anggota` VALUES (13, 'Ira Herawati', 'Perempuan', '089999', 'CIgaru 1', 'Alfathunnisaazz@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 1);
INSERT INTO `anggota` VALUES (15, 'Ade Nugraha', NULL, '09876545678', 'jl. percetakan negara 2', 'dhenhugie@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 1);
INSERT INTO `anggota` VALUES (16, 'Kila', NULL, '0779823434', 'jl. percetakan negara 2', 'myaccpc@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 1);

-- ----------------------------
-- Table structure for buku
-- ----------------------------
DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku`  (
  `id_buku` int NOT NULL AUTO_INCREMENT,
  `id_kategori` int NULL DEFAULT NULL,
  `judul_buku` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pengarang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_terbit` date NULL DEFAULT NULL,
  `penerbit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isbn` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_buku` int NULL DEFAULT NULL,
  `lokasi` enum('Rak 1','Rak 2','Rak 3') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_input` date NULL DEFAULT NULL,
  `status_buku` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `denda` double(10, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_buku`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of buku
-- ----------------------------
INSERT INTO `buku` VALUES (5, 1, 'Pengantar Teknologi', 'Haru Zain', '2020-09-30', 'Penerang Cahaya', 'JK-97.2020.SM-08', 8, 'Rak 2', 'gambar1603000010.jpg', '2020-10-18', '1', NULL);
INSERT INTO `buku` VALUES (6, 9, 'Finding Nemo', 'Haru Zain', '2020-09-30', 'Otaku Weebu', 'JK-97.2020.SM-08', 8, 'Rak 2', 'gambar1603194977.png', '2020-10-18', '1', NULL);
INSERT INTO `buku` VALUES (7, 9, 'One Piece Volume 24', 'Haru Zain', '2020-09-30', 'Penerang Cahaya', 'JK-97.2020.SM-08', 8, 'Rak 2', 'gambar1603194923.png', '2020-10-18', '1', NULL);
INSERT INTO `buku` VALUES (9, 1, 'Pengantar Teck', 'Haru Zain', '2020-09-30', 'Penerang Cahaya', 'JK-97.2020.SM-08', 9, 'Rak 2', 'gambar1603000010.jpg', '2020-10-18', '1', NULL);

-- ----------------------------
-- Table structure for detail_pinjam
-- ----------------------------
DROP TABLE IF EXISTS `detail_pinjam`;
CREATE TABLE `detail_pinjam`  (
  `id_pinjam` int NOT NULL,
  `id_buku` int NOT NULL,
  `tanggal_pengembalian` date NULL DEFAULT NULL,
  `denda` double NULL DEFAULT NULL,
  `status_kembali` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_pinjam`, `id_buku`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_pinjam
-- ----------------------------

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Komputer');
INSERT INTO `kategori` VALUES (2, 'Bahasa');
INSERT INTO `kategori` VALUES (3, 'Sains');
INSERT INTO `kategori` VALUES (4, 'Hobby');
INSERT INTO `kategori` VALUES (5, 'Komunikasi');
INSERT INTO `kategori` VALUES (6, 'Hukum');
INSERT INTO `kategori` VALUES (7, 'Agama');
INSERT INTO `kategori` VALUES (8, 'Populer');
INSERT INTO `kategori` VALUES (9, 'Komik');

-- ----------------------------
-- Table structure for peminjaman
-- ----------------------------
DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE `peminjaman`  (
  `id_pinjam` int NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `tanggal_pinjam` date NULL DEFAULT NULL,
  `tanggal_kembali` date NULL DEFAULT NULL,
  `total_denda` double NULL DEFAULT NULL,
  `status_pinjam` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_pinjam`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of peminjaman
-- ----------------------------

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id_pinjam` int NOT NULL AUTO_INCREMENT,
  `tanggal_pencatatan` datetime(0) NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `id_buku` int NULL DEFAULT NULL,
  `tanggal_pinjam` date NULL DEFAULT NULL,
  `tanggal_kembali` date NULL DEFAULT NULL,
  `tanggal_pengembalian` date NULL DEFAULT NULL,
  `total_denda` double(10, 0) NULL DEFAULT NULL,
  `status_pengembalian` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_peminjaman` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `batal` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_pinjam`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES (4, '2020-11-30 00:00:00', 13, 8, '2020-12-01', '2020-12-07', '2020-12-07', NULL, '1', '1', NULL);
INSERT INTO `transaksi` VALUES (6, '2020-12-01 00:00:00', 13, 5, '2020-12-01', '2020-12-08', '2020-12-10', NULL, '1', '1', NULL);
INSERT INTO `transaksi` VALUES (7, '2020-12-01 00:00:00', 13, 5, '2020-12-02', '2020-12-03', '2020-12-12', 9000, '1', '1', NULL);
INSERT INTO `transaksi` VALUES (8, '2020-12-01 00:00:00', 13, 5, '2020-12-01', '2020-12-04', '2020-12-11', 0, '1', '1', NULL);
INSERT INTO `transaksi` VALUES (10, '2020-12-01 00:00:00', 13, 5, '2020-12-01', '2020-12-05', NULL, NULL, NULL, '2', 1);
INSERT INTO `transaksi` VALUES (11, '2020-12-03 00:00:00', 13, 7, '2020-12-03', '2020-12-05', NULL, NULL, NULL, '1', NULL);
INSERT INTO `transaksi` VALUES (12, '2020-12-03 00:00:00', 13, 6, '2020-12-03', '2020-12-10', NULL, NULL, NULL, '1', NULL);
INSERT INTO `transaksi` VALUES (13, '2020-12-03 00:00:00', 13, 9, '2020-12-03', '2020-12-08', NULL, NULL, NULL, '1', NULL);
INSERT INTO `transaksi` VALUES (14, '2020-12-03 00:00:00', 13, 6, '2020-12-03', '2020-12-25', NULL, NULL, NULL, '2', 1);
INSERT INTO `transaksi` VALUES (17, '2020-12-03 00:00:00', 13, 9, '2020-12-03', '2020-12-10', NULL, NULL, NULL, '2', 1);
INSERT INTO `transaksi` VALUES (18, '2020-12-06 00:00:00', 14, 5, '2020-12-05', '2020-12-12', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `transaksi` VALUES (19, '2020-12-08 00:00:00', 15, 7, '2020-12-08', '2020-12-15', NULL, NULL, NULL, '2', 1);
INSERT INTO `transaksi` VALUES (20, '2020-12-08 00:00:00', 15, 6, '2020-12-14', '2020-12-21', NULL, NULL, NULL, '2', 1);
INSERT INTO `transaksi` VALUES (21, '2020-12-08 00:00:00', 16, 6, '2020-12-14', '2020-12-26', NULL, NULL, NULL, '1', NULL);

SET FOREIGN_KEY_CHECKS = 1;
