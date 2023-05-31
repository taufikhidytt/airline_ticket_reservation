/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : db_ariplane_ticket

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 08/04/2022 17:36:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `id_customers` int NOT NULL AUTO_INCREMENT,
  `id_pesawat` int NULL DEFAULT NULL,
  `nama_customers` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_customers` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_hp` int NULL DEFAULT NULL,
  `no_bangku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_customers`) USING BTREE,
  INDEX `id_pesawat`(`id_pesawat`) USING BTREE,
  CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`id_pesawat`) REFERENCES `pesawat` (`id_pesawat`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (5, 10, 'taufik', 'Tangerang', 21, '001', '2022-04-08 17:34:02', NULL, NULL);
INSERT INTO `customers` VALUES (6, 11, 'hidayat', 'Tangerang', 21, '002', '2022-04-08 17:34:33', NULL, NULL);

-- ----------------------------
-- Table structure for pesawat
-- ----------------------------
DROP TABLE IF EXISTS `pesawat`;
CREATE TABLE `pesawat`  (
  `id_pesawat` int NOT NULL AUTO_INCREMENT,
  `kode_pesawat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_pesawat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keberangkatan_pesawat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tujuan_pesawat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `waktu_berangkat` datetime(0) NULL DEFAULT NULL,
  `harga` int NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pesawat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pesawat
-- ----------------------------
INSERT INTO `pesawat` VALUES (8, 'ps001', 'Garuda', 'Manado', 'jakarta', '2022-04-08 00:00:00', 1000000, '2022-04-08 17:31:16', NULL, NULL);
INSERT INTO `pesawat` VALUES (9, 'ps002', 'Batik', 'Jakarta', 'Batam', '2022-04-08 00:00:00', 500000, '2022-04-08 17:31:47', NULL, NULL);
INSERT INTO `pesawat` VALUES (10, 'ps003', 'Air Asia', 'Jakarta', 'Bali', '2022-04-08 00:00:00', 900000, '2022-04-08 17:32:19', NULL, NULL);
INSERT INTO `pesawat` VALUES (11, 'ps004', 'Merpati', 'Bali', 'Lombok', '2022-04-08 00:00:00', 500000, '2022-04-08 17:32:47', NULL, NULL);
INSERT INTO `pesawat` VALUES (12, 'ps005', 'Garuda', 'Pontianak', 'Jakarta', '2022-04-08 00:00:00', 700000, '2022-04-08 17:33:20', '2022-04-08 17:33:30', NULL);

SET FOREIGN_KEY_CHECKS = 1;
