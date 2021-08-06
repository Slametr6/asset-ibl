-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 05:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset-ibl`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `no_eq` int(11) DEFAULT NULL,
  `no_asset` bigint(20) DEFAULT NULL,
  `sn` varchar(30) DEFAULT NULL,
  `descript` varchar(100) DEFAULT NULL,
  `location` int(11) NOT NULL,
  `conditions` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `updatedBy` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_id`, `category`, `no_eq`, `no_asset`, `sn`, `descript`, `location`, `conditions`, `status`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`) VALUES
(2, 200001, 6020013, 0, '5CG9118CHH', 'HP Laptop 14-cm0013AX PROC AMD DUAL CORE A9-9425 3.10 GHz, HDD 1TB, RAM 4GB', 300005, 'ok', 'in_use', '2021-01-29', 'admin', '2021-01-29', 'admin'),
(12, 200001, 6019006, 0, 'PF1KRLQC', 'LENOVO IP 330-14AST/81D5 HDD 1TB, RAM 4GB, PROC AMD A9-9425 3,1 GHZ, 14 INC', 300006, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-29', 'admin'),
(13, 200001, 6019005, 0, 'PF1KRFWZ', 'LENOVO IP 330-14AST/81D5 HDD 1TB, RAM 4GB, PROC AMD A9-9425 3,1 GHZ, 14 INC', 300001, 'ok', 'not_use', '2021-01-18', 'admin', '2021-01-29', 'admin'),
(14, 200001, 6019007, 0, 'PF1KRFWR', 'LENOVO IP 330-14AST/81D5 HDD 1TB, RAM 4GB, PROC AMD A9-9425 3,1 GHZ, 14 INC', 300001, 'ok', 'not_use', '2021-01-21', 'admin', '2021-01-29', 'admin'),
(15, 200001, 6019008, 0, 'PF1JX724', 'LENOVO IP 330-14AST/81D5 HDD 1TB, RAM 4GB, PROC AMD A9-9425 3,1 GHZ, 14 INC', 300001, 'ok', 'not_use', '2021-01-18', 'admin', '2021-01-29', 'admin'),
(16, 200001, 6019009, 150000000011, '5CG9365B44', 'HP 240 G7, HDD 1TB, RAM 8GB, PROC CORE I3-7020 2,30 GHz', 300001, 'ok', 'not_use', '2021-01-18', 'admin', '2021-01-29', 'admin'),
(17, 200001, 6019010, 150000000010, 'PF15CA8L', 'LENOVO IP 330-14AST/81G2, HDD 1 TB, RAM 8GB, PROC CORE I5-8250U 1,6 GHz, 14 INC', 300001, 'ok', 'not_use', '2021-01-18', 'admin', '2021-01-25', 'admin'),
(18, 200001, 6019011, 150000000010, 'PF159Z4Q', 'LENOVO IP 330-14AST/81G2, HDD 1 TB, RAM 8GB, PROC CORE I5-8250U 1,6 GHz, 14 INC', 300001, 'ok', 'not_use', '2021-01-18', 'admin', '2021-01-29', 'admin'),
(19, 200005, 6019012, 0, 'X5NZ024306', 'EPSON  L5190', 300001, 'ok', 'not_use', '2021-01-18', 'admin', '2021-01-25', 'admin'),
(20, 200005, 6019013, 150000000013, 'TP2K746020', 'EPSON L120', 300001, 'ok', 'not_use', '2021-01-18', 'admin', '2021-01-25', 'admin'),
(21, 200005, 6019014, 150000000013, 'TP2K757266', 'EPSON L120', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(22, 200001, 6019015, 500000000136, '8CG9334JWX', 'HP ENVY 13-AQ1018TX PROC CORE I7-10510U 4,9 GHZ, SSD 512GB, RAM 16GB', 300015, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-29', 'admin'),
(23, 200005, 6020001, 0, 'X5NZ034243', 'EPSON  L5190', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(24, 200005, 6020002, 0, 'X6NX348800', 'EPSON L3110', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(25, 200009, 6020003, 0, '219C796000295', 'TP-LINK 16 PORT GIGABIT\r\nTL-SG1016D(UN) VER:8.0', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(26, 200009, 6020004, 0, '2196053005084', 'TP-LINK 8 PORT GIGABIT\r\nTL-SG108E(UN) VER:4.0', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(27, 200009, 6020005, 0, '2194660006970', 'TP-LINK 8 PORT GIGABIT\r\nTL-SG108E(UN) VER:4.0', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(28, 200009, 6020006, 0, '2196053005082', 'TP-LINK 8 PORT GIGABIT\r\nTL-SG108E(UN) VER:4.0', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(29, 200009, 6020007, 0, '2194660006961', 'TP-LINK 8 PORT GIGABIT\r\nTL-SG108E(UN) VER:4.0', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(30, 200009, 6020008, 0, '2196053005088', 'TP-LINK 8 PORT GIGABIT\r\nTL-SG108E(UN) VER:4.0', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(31, 200009, 6020009, 0, '2196053005078', 'TP-LINK 8 PORT GIGABIT\r\nTL-SG108E(UN) VER:4.0', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(32, 200009, 6020010, 0, '2196053005065', 'TP-LINK 8 PORT GIGABIT\r\nTL-SG108E(UN) VER:4.0', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(33, 200008, 6020011, 0, '8B00B659D5A/933/R3', 'MIKROTIK HEX RB750Gr3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(34, 200001, 6020012, 0, '5CG9118BPC', 'HP Laptop 14-cm0013AX PROC AMD DUAL CORE A9-9425 3.10 GHz, HDD 1TB, RAM 4GB', 300005, 'ok', 'in_use', '2021-01-29', 'admin', '2021-01-29', 'admin'),
(35, 200007, 6020014, 0, 'X43E005943', 'Scanner Epson DS-410 A4 Duplex Sheet -fed Dcoument', 300015, 'ok', 'in_use', '2021-02-26', 'admin', NULL, NULL),
(36, 200005, 6020015, 0, 'TP2K850210', 'EPSON L120', 300001, 'ok', 'not_use', '2021-01-25', 'admin', NULL, NULL),
(37, 200001, 6020016, 510000000050, 'LR0DB26V', 'Lenovo Yoga C640-13iml PROC Intel i5-10210U 1,6 GHz, SSD 512GB, RAM 8GB', 300015, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-29', 'admin'),
(38, 200005, 6020017, 0, 'X6NX497786', 'EPSON L3110', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(39, 200011, 6011421, 0, '350141700038', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(40, 200011, 6010928, 0, '3508143400073', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(41, 200011, 600, 0, '6286171700547', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(42, 200011, 600, 0, '6286171700848', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(43, 200011, 6002670, 0, '1185609', 'HANDKEY', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(44, 200011, 600, 0, '1716851150202', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(45, 200011, 600, 0, '6350130100259', 'MUGEN MG-100', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(46, 200011, 600, 0, '6350130100228', 'MUGEN MG-100', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(47, 200012, 6007451, 0, 'B1470053', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(48, 200012, 6007450, 0, 'B1470052', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(49, 200002, 6002969, 0, '02Z0103I0440', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(50, 200002, 6002969, 0, '02Z0103I0440', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(51, 200002, 6003740, 0, 'L3ACN5M', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(52, 200002, 6003801, 0, 'L3ACM6W', 'HDD : 160 GB, RAM : 1GB, PROC : DUAL 1.80 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(53, 200002, 6003842, 0, 'L3ADF0X', 'HDD : 160 GB, RAM : 1GB, PROC : DUAL 2.20 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(54, 200002, 6003844, 0, 'L3ADE1L', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(55, 200002, 6003946, 0, '-', 'HDD : 160 GB, RAM : 1GB, PROC : DUAL 1.80 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(56, 200002, 6004460, 0, 'L3ACT6L', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(57, 200002, 6004543, 0, 'L3ACV0L', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(58, 200002, 6004935, 0, 'L3L7177', 'HDD : 160 GB, RAM : 1GB, PROC : DUAL 1.80 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(59, 200002, 6004937, 0, 'L3ACM2L', 'HDD : 80 GB, RAM : 2GB, PROC : DUAL 1.80 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(60, 200002, 6005206, 0, 'R840M2E', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(61, 200002, 6005418, 0, 'R8262FW', 'HDD : 160 GB, RAM : 1.5GB, PROC : DUAL 1.80 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(62, 200002, 6005436, 0, 'TAC06K0475', 'HDD : 250 GB, RAM : 1GB, PROC : DUAL 2.70 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(63, 200002, 6005603, 0, '-', 'HDD : 320 GB, RAM : 1GB, PROC : DUAL 2.70 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(64, 200002, 6005769, 0, 'R88W9LN', 'HDD : 320 GB, RAM : 1GB, PROC : DUAL 2.70 GHZ', 300014, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(65, 200002, 6005771, 0, 'R88W9ZD', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(66, 200002, 6006398, 0, 'R8D25VW', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(67, 200002, 6006749, 0, 'R8D9D7K', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(68, 200002, 6006751, 0, 'R8D9D8Y', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(69, 200002, 6006769, 0, 'R8B50HG', 'HDD : 320 GB, RAM : 2GB, PROC : DUAL 2.80 GHZ', 300014, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(70, 200002, 6006771, 0, 'R8B50EX', 'HDD : 320 GB, RAM : 2GB, PROC : DUAL 2.80 GHZ', 300006, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(71, 200002, 6006878, 0, 'R8D26DC', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(72, 200002, 6006880, 0, 'R8D25TG', 'HDD : 320 GB, RAM : 2GB, PROC : DUAL 2.80 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(73, 200002, 6006882, 0, 'R8B50DC', 'HDD : 320 GB, RAM : 2GB, PROC : DUAL 2.80 GHZ', 300006, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(74, 200002, 6007108, 0, 'R8B50WH', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(75, 200002, 6007110, 0, 'R8D26LE', 'HDD : 80 GB, RAM : 2GB, PROC : DUAL 1.80 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(76, 200002, 6007265, 0, 'R8D9N0Y', 'HDD : 80 GB DAN 250 GB, RAM : 2GB, PROC : DUAL 3.0 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(77, 200002, 6007287, 0, '99D1062', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(78, 200002, 6007433, 0, 'R8D9N9W', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(79, 200002, 6007435, 0, 'R8D9P0B', 'HDD : 320 GB, RAM : 2GB, PROC : DUAL 3.0 GHZ', 300015, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(80, 200002, 6007536, 0, 'R809N9F', 'HDD : 80 GB, RAM : 2GB, PROC : DUAL 2.80 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(81, 200002, 6008428, 0, 'V1MTZ22', 'HDD : 320 GB, RAM : 2GB, PROC : DUAL 3.0 GHZ', 300003, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(82, 200002, 6008430, 0, 'R8EV7FP', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(83, 200002, 6008735, 0, 'PBFXB86', 'HDD : 250 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(84, 200002, 6008737, 0, 'PBGWE55', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(85, 200002, 6008739, 0, 'PBFGL78', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(86, 200002, 6009943, 0, 'PB6LWV0', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(87, 200002, 6009945, 0, 'PB6LVT4', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(88, 200002, 6010051, 0, 'PB6LWZ3', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300005, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(89, 200002, 6010053, 0, 'PB6LWT5', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(90, 200002, 6010055, 0, 'PB6LWR7', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(91, 200002, 6010130, 0, 'PB9AHXX', 'HDD : 320 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(92, 200002, 6010132, 0, 'PB9AHZB', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300006, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(93, 200002, 6010134, 0, 'PB9AMAC', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(94, 200002, 6010138, 0, 'PB9ALVF', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(95, 200002, 6010142, 0, 'PB9AHZZ', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300006, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(96, 200002, 6010144, 0, 'PB9AHTF', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(97, 200002, 6010152, 0, 'PB9ALRT', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(98, 200002, 6010154, 0, 'PB9ALVE', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(99, 200002, 6010156, 0, 'PB9ALWA', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(100, 200002, 6010158, 0, 'V3KM233', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(101, 200002, 6010160, 0, 'PB9ALVK', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300015, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(102, 200002, 6010162, 0, 'PB9AHYZ', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300003, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(103, 200002, 6010540, 0, '133597CT0PBP2NLT/PBP2NLT', 'HDD : 320 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(104, 200002, 6010681, 0, 'PBP2NBA', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(105, 200002, 6010873, 0, 'PBP2MWE', 'HDD : 500 GB, RAM : 2GB + 2 GB, PROC : CORE I3', 300012, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(106, 200002, 6010875, 0, 'PBP2NGW', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(107, 200002, 6011339, 0, 'PB030A5C', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(108, 200002, 6011341, 0, 'PB030AB9', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(109, 200002, 6011343, 0, 'PB030AB5', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(110, 200002, 6011345, 0, 'PB030A0H', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(111, 200002, 6011347, 0, 'PB030A5K', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(112, 200002, 6011349, 0, 'PB0309ZT', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(113, 200002, 6011351, 0, 'PB030A0R', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300004, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(114, 200002, 6011353, 0, 'PB030AAX', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(115, 200002, 6011355, 0, 'PB030A0L', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(116, 200002, 6011357, 0, 'RFPB030AAZ', 'HDD : 500 GB, RAM : 2GB + 2 GB, PROC : CORE I3', 300009, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(117, 200002, 6011359, 0, 'PB030A0E', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300003, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(118, 200002, 6011361, 0, 'PB030A41', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(119, 200002, 6011363, 0, 'PB030AAW', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300014, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(120, 200002, 6014310, 0, 'PC07N22N', 'HDD : 500 GB, RAM : 4GB, PROC : CORE I3', 300001, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(121, 200002, 6014316, 0, 'PC07N29M', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300006, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(122, 200002, 6014318, 0, 'PC06Y0KZ', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(123, 200002, 6014320, 0, 'PC06Y0L9', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(124, 200002, 6014322, 0, 'PC06Y0JD', 'HDD : 500 GB, RAM : 2GB + 2 GB, PROC : CORE I3', 300009, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(125, 200002, 6014324, 0, 'PC06Y0HJ', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(126, 200002, 6014326, 0, 'PC07N232', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300003, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(127, 200002, 6014328, 0, 'PC06Y0HN', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(128, 200002, 6014330, 0, 'PC07N29U', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(129, 200002, 6014334, 0, 'PC06Y0JE', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(130, 200002, 6014336, 0, 'PC06Y0JL', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(131, 200002, 6014342, 0, 'PC07N216', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(132, 200002, 6015053, 0, '-', 'HDD : 80 GB, RAM : 2GB, PROC : DUAL 1.80 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(133, 200002, 6015055, 0, '-', 'HDD : 150 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(134, 200002, 6015094, 0, 'SGH614PMVB', 'HDD : 500 GB, RAM : 4GB, PROC : AMD A10 3.50 GHZ', 300006, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(135, 200002, 6015096, 0, 'SGH614PMWD', 'HDD : 500 GB, RAM : 4GB, PROC : AMD A10 3.50 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(136, 200002, 6015223, 0, 'PC0EP9LK', 'HDD : 1 TB, RAM : 4GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(137, 200002, 6015271, 0, 'PC0EP9JT', 'HDD : 1 TB, RAM : 4GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(138, 200002, 6015273, 0, 'PC0EVPZE', 'HDD : 1 TB, RAM : 4GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(139, 200002, 6015275, 0, 'PC0ENRG4', 'HDD : 1 TB, RAM : 4GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(140, 200002, 6015277, 0, 'PC0EP9RK', 'HDD : 1 TB, RAM : 4GB, PROC : CORE I3', 300006, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(141, 200002, 6015279, 0, 'PC0EP9R9', 'HDD : 1 TB, RAM : 4GB, PROC : CORE I3', 300012, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(142, 200002, 6015702, 0, '-', 'HDD : 1 TB, RAM : 4GB, PROC : CORE I3', 300014, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(143, 200002, 6015704, 0, '-', 'HDD : 1 TB, RAM : 4GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(144, 200002, 6014332, 0, 'PC07N237', '-', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(145, 200002, 6019001, 505500000106, 'PC119D5R', 'HDD : 1 TB, RAM : 4GB, PROC : CORE I3-7100 3,9 GHZ', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(146, 200002, 6019003, 505500000107, 'PC119D69', 'HDD : 1 TB, RAM : 4GB, PROC : CORE I3-7100 3,9 GHZ', 300006, 'ok', 'in_use', '2021-02-26', 'admin', '2021-01-25', 'admin'),
(147, 200005, 600, 0, 'RAEK302684', 'EPSON L360', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(148, 200005, 600, 0, 'VGVK096015', 'EPSON L360', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(149, 200003, 6019002, 505500000106, 'U1H7WMFR', 'LED LENOVO 21,5\"', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(150, 200003, 6019004, 505500000107, 'U1H8TVL7', 'LED LENOVO 21,5\"', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(151, 200008, 600, 0, '8AFF09DF0686/841/r3', 'MIKROTIK HEX RB750Gr3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(152, 200008, 600, 0, '8AFF0813FBB3/812/r3', 'MIKROTIK HEX RB750Gr3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(153, 200013, 600, 0, 'NA9V3F7N', 'HDD WD 1 TB', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(154, 200013, 600, 0, 'WCC6Y2XRJSDS', 'HDD WD 1 TB', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(155, 200005, 6015087, 0, 'TP2K295727', 'EPSON L SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(156, 200005, 6013580, 0, 'TP2K105338', 'EPSON L SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(157, 200005, 6013579, 0, 'TP2K104155', 'EPSON L SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(158, 200005, 6011761, 0, 'TNZK025713', 'EPSON L SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(159, 200005, 6011104, 0, 'TP2K029123', 'EPSON L SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(160, 200005, 6010244, 0, 'RBBK119290', 'EPSON L SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(161, 200005, 6009824, 0, 'RBBK078242', 'EPSON L SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(162, 200005, 600, 0, '-', 'EPSON L SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(163, 200013, 600, 0, '-', 'DONGEL TP LINK TLWN 725N', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(164, 200013, 600, 0, '-', 'DONGEL TP LINK TLWN 725N', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(165, 200013, 600, 0, '-', 'DONGEL TP LINK TLWN 725N', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(166, 200005, 6015266, 0, 'Q7FY305268', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(167, 200005, 6015265, 0, 'Q7FY305386', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(168, 200005, 6015264, 0, 'Q7FY306322', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(169, 200005, 6015263, 0, 'Q7FY306295', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(170, 200005, 6015160, 0, 'Q7FY291096', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(171, 200005, 6014885, 0, 'Q7FY262061', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(172, 200005, 6014757, 0, 'Q7FY252224', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(173, 200005, 6014756, 0, 'Q7FY252220', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(174, 200005, 6014755, 0, 'Q7FY252550', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(175, 200005, 6014754, 0, 'Q7FY252562', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(176, 200005, 6014753, 0, 'TP2K220785', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(177, 200005, 6014752, 0, 'TP2K221661', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(178, 200005, 6010691, 0, 'Q7FY081245', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(179, 200005, 6002170, 0, 'CBC381', 'EPSON LX/LQ SERIES', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(180, 200013, 600, 0, '2001800039000', 'HDD WD 320 GB', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(181, 200014, 600, 0, '549250946423', 'HP ASUS', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-26', 'admin'),
(182, 200009, 6014303, 0, 'CN53FQ6317', 'HUB  8 PORT', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(183, 200009, 6011266, 0, 'CN39DY01D1', 'HUB  8 PORT', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(184, 200009, 6007148, 0, 'SCN0BBT32H5', 'HUB  8 PORT', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(185, 200009, 6006104, 0, '9XSQD0008F890', 'HUB  8 PORT', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(186, 200009, 6006042, 0, 'SCN09BT300F', 'HUB  8 PORT', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(187, 200009, 6004952, 0, '9J9FC3PDA57B8', 'HUB  8 PORT', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(188, 200009, 6004920, 0, '9XSQCK0087806', 'HUB  8 PORT', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(189, 200009, 6004869, 0, '9XSQBT007961E', 'HUB  8 PORT', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(190, 200009, 6002192, 0, '02017G2FSCDCH5CE0', 'HUB  8 PORT', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(191, 200009, 6002190, 0, 'CAN 050-332-940', 'HUB  8 PORT', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(192, 200009, 6002189, 0, 'L3ZV6YH7B5E40', 'HUB  8 PORT', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(193, 200009, 600, 0, '217B610006728', 'HUB  8 PORT', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(194, 200009, 600, 0, '217B610001302', 'HUB  8 PORT', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(195, 200001, 6014875, 0, 'PF0E8PZW', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(196, 200001, 6011753, 0, 'SYB07167721', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(197, 200001, 6011752, 0, 'SYB07528150', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(198, 200001, 600, 0, 'CB27036517', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(199, 200001, 600, 0, '-', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(200, 200010, 600, 0, '861567038380354', 'ANDROMAX M3Z', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(201, 200010, 600, 0, '861567038301194', 'ANDROMAX M3Z', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(202, 200010, 600, 0, '861567038261752', 'ANDROMAX M3Z', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(203, 200010, 600, 0, '861458039658891', 'ANDROMAX M3Z', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(204, 200010, 600, 0, '861458039528243', 'ANDROMAX M3Z', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(205, 200010, 600, 0, '861458039502149', 'ANDROMAX M3Z', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(206, 200010, 600, 0, '89622821010002038132', 'ANDROMAX M3Z', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(207, 200010, 600, 0, '861458034913986', 'ANDROMAX M3Z', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(208, 200010, 600, 0, '81285425624', 'ANDROMAX M3Z', 300001, 'ok', 'not_use', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(209, 200005, 6020018, 0, 'Q7FY364181', 'EPSON L120', 300001, 'ok', 'not_use', '2021-01-29', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_code` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `createdAt` date NOT NULL,
  `createdBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_code`, `name`, `createdAt`, `createdBy`) VALUES
(1, 'IBL0001', 'JAKARTA', '2020-12-02', 'slamet'),
(2, 'IBL0002', 'SEMARANG', '2020-12-02', 'slamet'),
(3, 'IBL0003', 'SURABAYA', '2020-12-02', 'slamet'),
(4, 'IBL0004', 'CILEGON', '2020-12-02', 'slamet'),
(5, 'IBL0005', 'CIKARANG', '2020-12-02', 'slamet');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) NOT NULL,
  `createdAt` date NOT NULL,
  `createdBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `createdAt`, `createdBy`) VALUES
(200001, 'IT ASSET-NOTEBOOK', '2020-12-04', 'slamet'),
(200002, 'IT ASSET-CPU', '2020-12-04', 'slamet'),
(200003, 'IT ASSET-MONITOR', '2020-12-04', 'slamet'),
(200004, 'IT ASSET-PROJEKTOR', '2020-12-04', 'slamet'),
(200005, 'IT ASSET-PRINTER', '2020-12-04', 'slamet'),
(200006, 'IT ASSET-UPS', '2020-12-04', 'slamet'),
(200007, 'IT ASSET-SCANNER', '2020-12-04', 'slamet'),
(200008, 'IT ASSET-ROUTER', '2020-12-04', 'slamet'),
(200009, 'IT ASSET-HUB', '2021-01-25', 'admin'),
(200010, 'IT ASSET-MODEM', '2021-01-25', 'admin'),
(200011, 'IT ASSET-FINGER', '2021-01-25', 'admin'),
(200012, 'IT ASSET-BARCODE', '2021-01-25', 'admin'),
(200013, 'IT ASSET-PERIPERAL', '2021-01-25', 'admin'),
(200014, 'IT ASSET-HP', '2021-01-25', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createdAt` date NOT NULL,
  `CreatedBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_code`, `name`, `createdAt`, `CreatedBy`) VALUES
(37, 'DEPT0001', 'IT', '2021-01-06', 'admin'),
(38, 'DEPT0002', 'HRD', '2021-01-06', 'admin'),
(39, 'DEPT0003', 'HSE', '2021-01-19', 'admin'),
(40, 'DEPT0004', 'MKT', '2021-01-19', 'admin'),
(41, 'DEPT0005', 'OPS-FORW', '2021-01-19', 'admin'),
(42, 'DEPT0006', 'OPS-TRUC', '2021-01-19', 'admin'),
(43, 'DEPT0007', 'GA', '2021-01-19', 'admin'),
(44, 'DEPT0008', 'FINANCE', '2021-01-19', 'admin'),
(45, 'DEPT0009', 'DMS', '2021-01-19', 'admin'),
(46, 'DEPT0010', 'PURCASING', '2021-01-19', 'admin'),
(47, 'DEPT0011', 'SECURITY', '2021-01-25', 'admin'),
(48, 'DEPT0012', 'CS', '2021-01-25', 'admin'),
(49, 'DEPT0013', 'ADM-OPS', '2021-01-25', 'admin'),
(50, 'DEPT0014', 'BENGKEL', '2021-01-25', 'admin'),
(51, 'DEPT0015', 'ADM-MKT', '2021-01-25', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employe_id` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `dept_id` varchar(20) NOT NULL,
  `branch_id` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `createdAt` date NOT NULL,
  `createdBy` varchar(20) NOT NULL,
  `updatedAt` date NOT NULL,
  `updatedBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employe_id`, `nik`, `emp_name`, `gender`, `birthday`, `email`, `phone`, `address`, `dept_id`, `branch_id`, `image`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`) VALUES
(18000009, '9701', 'Hally Hanafiah', 'Male', '1969-08-09', '-', '081380604070', 'Jl Akalipa 4 BLK B5/9 RT 10 RW 13 Sepanjang Jaya Rawa Lumbu Bekasi\r\n', 'DEPT0006', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(18000010, '6758', 'Fajar Aulia', 'Male', '1982-05-05', '-', '081310450494', 'Kp. Gempol RT 011/001 Cakung Timur Cakung Jakarta Timur 13910', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000011, '11820', 'Haslinda', 'Female', '1986-07-21', '-', '081908275585', 'Jl. Jati Sabrang Kav.UI Sektor Barat Blok E 4 No 11 Tanah Baru Beji Depok \r\n', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000012, '701', 'Indah Sulistyawati', 'Female', '1967-10-28', '-', '081288180840', 'Jl. Angkasa I /14Komp MNA RT 001/010 Gunung Sahari Selatan Kemayoran  Jakarta Pusat / Jl. Cikijang V/ 13 Tanjung Priuk', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000013, '6506', 'Siti Khaizah', 'Female', '1979-05-28', '-', '087883582495', 'Perum AFI 2 Blok G3 No. 11 Kedung Pengawas Babelan Bekasi', 'DEPT0013', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000014, '4779', 'Maryono', 'Male', '1974-01-11', '-', '081316206938', 'Jl. H. Kamad Pondok Bambu RT 001/003 Duren Sawit Jakarta Timur ', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000015, '6512', 'Kelara Adi', 'Male', '1981-10-27', '-', '085774323778', 'Jl. Penerangan VI RT 009/009 No.37 Pesanggrahan Jakarta Selatan\r\n', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000016, '13144', 'Rosidin', 'Male', '1986-06-19', '-', '0895329451661', 'Kp. Ceger RT 001/002 Segara jaya Tarumajaya Bekasi\r\n', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000017, '2226', 'Suhadi', 'Male', '1962-10-12', '-', '081290240778', 'Jl. Buang No. 77 RT003/007 Ulujami Pesanggrahan Jakarta Selatan\r\n', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000018, '6187', 'Haryadi', 'Male', '1974-07-08', '-', '081906600774', 'Alamanda Regency Blok G16/8  RT 018/021 Karang Satria Tambun Utara Bekasi 17510\r\n', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000019, '12928', 'Yanto', 'Male', '1983-04-12', '-', '081311636349 ', 'Kp. Gempol Rt 011/001 Cakung Timur Cakung  Jakarta Timur\r\n', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(18000020, '14942', 'Putri Ayu Rahmadanti', 'Female', '1995-02-22', '-', '081297428003', 'Kp Kebon Kelapa RT 004/001 No 84 Segara Makmur Taruma Jaya Bekasi\r\n', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(18000021, '13696', 'Ardias Maulana', 'Male', '1986-03-07', '-', '08561935900', 'Kav.Semper Blok K/331 RT 005/001 Semper Barat Cilincing Jakarta Utara / Jl. S. Serayu II No. 331 Blok K RT 005/001 Semper Barat Cilincing\r\n', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000022, '17159', 'Ryan Achmad Kusuma zuliandra', 'Male', '1994-11-04', '-', '085860225021', 'Jl. Pembangunan No. 4 RT 008/009 Rawa Badak Utara Koja Jakarta Utara / Ds. Pusaka Rakyat RT 002/007 Taruma Jaya Bekasi\r\n', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000023, '18655', 'Devy Saputri', 'Female', '1990-12-28', '-', '081294498241 ', 'Jl Setia I.S No 35 RT 009/008 Jati Cempaka Pondok Gede Bekasi\r\n', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(18000024, '17090', 'Andi Agus', 'Male', '1989-08-04', '-', '082182097490', 'Jl. Raya Narogong GG Manggis 11 RT 006/004 Bojong Menteng Rawa Lumbu  Bekasi\r\n', 'DEPT0014', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(18000025, '17768', 'Syaful Amri', 'Male', '1990-02-06', '-', '085775956133', 'Jl. Cipinang Kebembem RT 009/010 Pisangan Timur Pulogadung Jakarta\r\n', 'DEPT0010', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000026, '3626', 'Moch Nafiz Qurtubi', 'Male', '1973-03-07', '-', '085697311418', 'Jl. Bintara 14 RT 003/004 No.91 Bintara Bekasi Barat 17134\r\n', 'DEPT0014', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(18000027, '6346', 'Slamet kawarudin', 'Male', '1966-10-12', '-', '085714200786', 'Jl. Nusa indah 1 blok DA2 RT 003/011 No.23 mangun Jaya Tambun Selatan 17510\r\n', 'DEPT0014', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000028, '6242', 'Rudi ID', 'Male', '1970-03-14', '-', '081382306930', 'Jl. Kebantenan II RT 003/002 No.35 Semper Timur Cilincing Jakarta Utara\r\n', 'DEPT0014', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000029, '6509', 'Agus Ramli', 'Male', '1977-04-01', '-', '08128400561', 'Jl. Tongkol Raya No.9 RT 001/009 Karawaci Baru Karawaci Tangerang 15116\r\n', 'DEPT0014', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000030, '6235', 'Sulaeman', 'Male', '1974-11-13', '-', '081311437574', 'Jl. Sukapura RT 004/003 No. 98 Sukapura Cilincing Jakarta Utara\r\n', 'DEPT0010', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000031, '6191', 'Sunaryo', 'Male', '1967-07-17', '-', '089664852889', 'KP . Sukasari RT 007 / 004 no 24 Harapan Mulya Kemayoran Jakarta Pusat\r\n', 'DEPT0014', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000032, '15823', 'Rizal Auliasyah', 'Male', '1989-10-28', '-', '089635912313', 'Jl Mawar RT 005/009 No 2 Kel Kebon Pala Kec Makassar Jakarta Timur\r\n', 'DEPT0014', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000033, '18725', 'Slamet Riyadi', 'Male', '1992-09-17', '-', '085726454359', 'Jl. Kalibaru Timur No 11 RT 01 RW 03 Kalibaru cilincing Jakarta Utara\r\n', 'DEPT0001', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000034, '12051', 'Achmad Rafmawan', 'Male', '1975-01-23', '-', '08562345418', 'Jl. Jagakarsa I No.25 C Rt 002/002 Jagakarsa Jakarta Selatan\r\n', 'DEPT0001', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000035, '6756', 'Albar Sayfitra', 'Male', '1986-07-13', '-', '081288248377', 'Jl. Menteng Jaya No. 9 RT 002/008 Menteng Jakarta Pusat / Perumahan Arkananta No A3 Wibawa Mukti Jatiasih Bekasi\r\n', 'DEPT0006', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000036, '9568', 'Wawan Setiadi', 'Male', '1981-12-01', '-', '087780820025 ', 'KP. Galumpit RT 002/002 Ds. Tarunajaya Sukaraja Tasikmalaya Jawa Barat \r\n', 'DEPT0009', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(18000037, '2329', 'Arief Fauzi', 'Male', '1970-09-17', '-', '085226501452', 'Jl Lagoa No 34 RT 011 RW 004 Kel Lagoa Kec Koja Jakarta Utara / Taman Harapan baru Blok V3 No. 23 RT 007/025 Pejuang Bekasi\r\n', 'DEPT0006', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000038, '8018', 'Suparno', 'Male', '2021-01-25', '-', '081513316387', 'Malaka II RT 003/005 Rorotan Cilincing Jakarta Utara\r\n', 'DEPT0006', 'IBL0005', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000039, '2517', 'Setianto', 'Male', '1973-09-09', '-', '087786584475', 'Jl. Kampung Sumur Selatan RT 010/010 No.82 Kel. Klender Kec.Duren Sawit Jakarta Timur\r\n', 'DEPT0006', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000040, '2147', 'Rejaman', 'Male', '1974-02-09', '-', '085719227110', 'Jl.Menteng – Sukabumi IX RT 009/003 No.16 Jakarta Pusat 10310\r\n', 'DEPT0006', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000041, '11851', 'Saiful Kahfi', 'Male', '1981-10-05', '-', '087873556902 ', 'KP. Selahuni RT 001/006 Ciomas Rahayu Ciomas Bogor\r\n', 'DEPT0006', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(18000042, '18052', 'Dudi Firmansyah', 'Male', '1988-12-23', '-', '082110388824', 'Jl E2 Raya No 5 Kel Cempaka Baru Kec Kemayoran Jakarta Pusat\r\n', 'DEPT0006', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000043, '14056', 'Debie Noor Pratama', 'Male', '1991-06-09', '-', '08996146479', 'Pos Kidul RT 001/017  Kertamulya Padalarang Bandung Barat No.57 Padalarang Bandung Barat\r\n', 'DEPT0006', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000044, '7924', 'Herkidis', 'Male', '1976-03-13', '-', '081212826032', 'Babakan Jl. Jeruk No.634 kel/kec Jagakarsa jaksel 14386\r\n', 'DEPT0004', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000045, '18935', 'Vegi Aidil Fitri', 'Male', '1993-03-27', '-', '082216384848 ', 'Jl. Mesjid Raya Al- Fatah no 17 RT 04 Rw 02 Tanjung Batu Ogan Ilir Sumatera Selatan . Jl. Kebantenan V no 19 Semper Timur Cilincing\r\n', 'DEPT0004', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(18000046, '13250', 'Netty Utami Hapsari', 'Female', '1987-05-19', '-', '08128648450', 'Jl. Rorotan IX RT 002/007 No.2 Rorotan Cilincing Jakarta Utara 14140\r\n', 'DEPT0015', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(18000047, '16499', 'Didit Setiawan', 'Male', '1986-06-06', '-', '081311096114', 'Cibubur I No. 41 RT 003/012 Cibubur Ciracas Jakarta Timur 13720\r\n', 'DEPT0004', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000048, '2319', 'Wiyanta', 'Male', '1975-08-14', '-', '081399288155', 'Perum Villa Mutiara Cikarang Blok G 18 No.18 RT 028/009 Ciantra Cikarang Selatan Bekasi\r\n', 'DEPT0004', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000049, '16497', 'Imam Daud', 'Male', '1993-09-04', '-', '081287144844 ', 'Jl Malaka II No. 29 Rt 004/005 Rorotan Cilincing\r\n', 'DEPT0004', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(18000050, '4249', 'Heru Santosa', 'Male', '1971-10-17', '-', '085959732599', 'Jl. Salemba Tengah IV RT 005/004 Paseban Senen Jakarta Pusat\r\n', 'DEPT0007', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000051, '17651', 'Akhmad Sutrisno', 'Male', '1985-04-21', '-', '087882801403', 'Perumahan Darmawangsa Residence Bekasi Cluster Kedaton Blok CK 2 No 29 Tambun Utara Bekasi\r\n', 'DEPT0003', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000052, '4286', 'Joko Yuhono', 'Male', '1975-04-25', '-', '081387011175', 'Jl. Bulak Perwira II RT 003/007 No.69 Perwira Bekasi Utara\r\n', 'DEPT0003', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000053, '2105', 'Anita', 'Female', '1974-04-02', '-', '0813-19717017', 'Jl Cipinang pulo maja RT 008 RW 011 Kel Cip besar Kec Jatinegara Jakarta Timur 13410\r\n', 'DEPT0002', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000054, '16358', 'Chandra Rani P', 'Female', '2020-12-29', '-', '-', '-', 'DEPT0002', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000055, '11626', 'Ari Sembogo', 'Male', '1987-01-20', '-', '021-8091274', 'Jl. Perindustrian IV RT 002/006 Kel. Kebon pala Kec.Makasar Cawang III Jaktim\r\n', 'DEPT0002', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '2021-01-25', 'admin'),
(18000056, '18236', 'Niken Astuti Asih', 'Female', '1994-11-04', '-', '087737670940', 'Cengkawakrejo RT 03 RW 01, Kec.Banyuurip, Kab. Purworejo, Jawa Tengah 54171 / Taman Wisma Asri Blok s 21 No 161 Teluk Pucung Bekasi Utara\r\n', 'DEPT0002', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000057, '15683', 'Denny Felani', 'Male', '1985-04-20', '-', '085281871568', 'Jl Rortan V Malaka I G 2 RT 001/012 No 18 Rorotan Cilincing Jakarta Utara\r\n', 'DEPT0007', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000058, '17451', 'Suwinarto', 'Male', '1989-07-20', '-', '08981169396', 'Jl Jengki GG Mawar RT 05 RW 09 No 37 Kebon Pala Makasar Jakarta Timur\r\n', 'DEPT0007', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000059, '2057', 'KM Sofi', 'Male', '1973-02-09', '-', '081905654323', 'Kp. Rawamalang RT 006/010 Semper Timur Cilincing Jakarta Utara 14130\r\n', 'DEPT0011', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000060, '13069', 'Sugeng Wahyudin', 'Male', '1983-08-23', '-', '081381811109 ', 'Jl. Ganggeng TTS No.136 B RT 011/007 Sungai Bambu Tanjung Priok Jakarta Utara\r\n', 'DEPT0011', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000061, '16813', 'Dedi Saputra', 'Male', '1991-08-25', '-', '081283462449', 'Jl Taruna RT 002/006 Sukapura Cilincing Jakarta Utara\r\n', 'DEPT0003', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000062, '11360', 'Reza Setya P', 'Male', '1989-11-20', '-', '085659521210', 'Jl. Safir 18 No. 256 Perum Baros Kencana RT 004/011 Baros Baros Sukabumi / Perum Puri Anggrek Serang Cluster 18 Blok D2D No. 5 Kaladram Walantaka Serang\r\n', 'DEPT0006', 'IBL0004', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000063, '7197', 'Sasongko Adi', 'Male', '1973-08-26', '-', '08568364223', 'Ling Tegal Wangi RT 002/002 Rawa Arum Grogol Kota Cilegon\r\n', 'DEPT0006', 'IBL0004', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000064, '16500', 'Fian Andriansyah', 'Male', '1995-03-18', '-', '085724581690', 'KP Ciburuy RT 001/002 Ciburuy Cigombong Bogor\r\n', 'DEPT0006', 'IBL0004', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000065, '8507', 'Martin Eka', 'Male', '1982-04-24', '-', '085695195959', 'Link Sumampir Timur No. 75 RT 003/004 No. 75, Kel. Kebon Dalem Cilegon\r\n', 'DEPT0010', 'IBL0004', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000066, '2055', 'Idi Carsidi', 'Male', '1967-01-10', '-', '087780120672', 'Jl. Malaka II RT 003/005 Rorotan Cilincing Jakut / Perum Rosma Indah I Blok I No. 14 Rt0025/017 Segara Makmur Taruma Jaya Bekasi\r\n', 'DEPT0007', 'IBL0005', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000067, '11891', 'Yuni Firmansyah', 'Male', '1982-06-26', '-', '081298306718', 'Jl. Kampung Baru I RT 008/005 Halim Perdana Kusuma Makasar Jakarta Timur\r\n', 'DEPT0006', 'IBL0001', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000068, '12049', 'Suryono', 'Male', '1980-05-16', '-', '085213751823', 'Kp. Tegal Wangi RT 006/007 Desa Dawuan Barat Kec. Cikampek  41373\r\n', 'DEPT0006', 'IBL0005', 'avatar.png', '2021-01-25', 'admin', '0000-00-00', ''),
(18000069, '18793', 'Deni Arfian', 'Male', '1994-12-08', '-', '081287357388', 'Jl Rawa Badak GG I RT 005/005 Koja Jakarta Utara\r\n', 'DEPT0006', 'IBL0001', 'avatar.png', '2021-02-26', 'admin', '0000-00-00', ''),
(18000070, '2099', 'Setyo Budi', 'Male', '1967-06-23', '-', '081318171283', 'Jl. Permata Kasih Raya Blok N-1/32 RT 006/013 Perum Regency 2 Cikampek Utara\r\n', 'DEPT0006', 'IBL0001', 'avatar.png', '2021-02-26', 'admin', '0000-00-00', ''),
(18000071, '18570', 'Mudhofir Subeki', 'Male', '1985-11-25', '-', '081234233009', 'Jl. Bronggalan Sawah 4 F / 67 RT 007/009 Pancar Kembang Tambak Sari Surabaya\r\n', 'DEPT0006', 'IBL0003', 'avatar.png', '2021-02-26', 'admin', '0000-00-00', ''),
(18000072, '18090', 'Ahmad Hadi', 'Male', '1987-02-01', '-', '-', 'Jl. Raya Narogong GG Manggis 11 RT 006/004 Bojong Menteng Rawa Lumbu  Bekasi\r\n', 'DEPT0008', 'IBL0001', 'avatar.png', '2021-02-26', 'admin', '0000-00-00', ''),
(18000073, '18689', 'Hendro Kurniawan', 'Male', '1989-10-26', '-', '081886206676', 'Jalan Gading Raya I Cipinang Kebembem  RT 011 RW 014 No 2 Pisangan Timur Pulogadung\r\n', 'DEPT0006', 'IBL0001', 'avatar.png', '2021-02-26', 'admin', '0000-00-00', ''),
(18000074, '16299', 'Agus Salim', 'Male', '1990-08-12', '-', '085775078161', 'Jl Kalibaru Barat 1 No 46 RT 011 / 006 Kalibaru Cilincing Jakarta Utara\r\n', 'DEPT0006', 'IBL0001', 'avatar.png', '2021-02-26', 'admin', '0000-00-00', ''),
(18000075, '12094', 'Ani  Rusmiati', 'Female', '1987-07-28', '-', '087771016648', 'Jl Tekukur kav Blok J Ds Bendungan Kec Cilegon 42417\r\n', 'DEPT0008', 'IBL0004', 'avatar.png', '2021-02-26', 'admin', '0000-00-00', ''),
(18000076, '18733', 'Albert', 'Male', '1994-03-04', '-', '-', 'Jl. Warakas Raya No.69 RT 001/008 Kel Warakas . Tanjung Priuk Jakarta Utara 14340 / Kp. Bojong Gang Tower RT 001/006 No.39 Pantai Makmur Taruma jaya Bekasi Utara\r\n', 'DEPT0009', 'IBL0001', 'avatar.png', '2021-02-26', 'admin', '0000-00-00', ''),
(18000077, '18979', 'Joko Ariyanto', 'Male', '1989-01-04', '-', '085891922475', 'Cawang III RT 011/008 No 26 Kelurahan Kebon Pala Kecamatan Makasar Jakarta Timur\r\n', 'DEPT0003', 'IBL0001', 'avatar.png', '2021-02-26', 'admin', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `form_request`
--

CREATE TABLE `form_request` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `material` varchar(20) NOT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `spec` text DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `allocation` varchar(20) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `is_approved` int(1) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `updatedAt` date NOT NULL,
  `updatedby` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_request`
--

INSERT INTO `form_request` (`id`, `name`, `dept`, `position`, `material`, `product_name`, `spec`, `brand`, `qty`, `allocation`, `note`, `is_approved`, `createdAt`, `createdBy`, `updatedAt`, `updatedby`) VALUES
(9, 'FAJAR AULIA', 'FINANCE', 'Spv FINANCE', 'Scanner', 'Lide 300', 'Scanner canon Lide 300	', 'CANON', 1, 'POOL IRONBIRD', 'New', 0, '2021-01-29', 'admin', '2021-02-26', 'admin'),
(10, 'ANGGIT', 'IT', 'IT STAFF', 'Wifi Router', 'TP-Link Archer C80 ', 'TP-Link Archer C80 AC1900 Wifi Router	', 'TP-Link ', 2, 'POOL IRONBIRD', 'New', 1, '2021-01-29', 'admin', '2021-01-29', 'admin'),
(11, 'SLAMET RIYADI', 'IT', 'IT STAFF', 'Wifi Router', 'Tenda O6', 'Tenda O6 5GHz 433Mbps Wireless Outdoor 06 Point to Point CPE', 'TENDA', 2, 'POOL IRONBIRD', 'New', 1, '2021-01-29', 'admin', '2021-01-29', 'admin'),
(12, 'SLAMET RIYADI', 'IT', 'IT STAFF', 'Wifi Router', 'TP-LINK TL-WR941HP', 'TP-LINK TL-WR941HP 450Mbps High Power Wireless N Router	', 'TP-LINK', 1, 'POOL IRONBIRD', 'New', 1, '2021-01-29', 'admin', '2021-01-29', 'admin'),
(13, 'AJI', 'OPERASI', 'LO ARGA', 'NOTEBOOK', 'LENOVO AMD A9 8GB DD', 'LENOVO AMD A9 8GB DDR4 256GB SSD 14\'\' RADEON R5 WINDOWS 10	', 'LENOVO', 1, 'POOL IRONBIRD', 'New', 1, '2021-01-29', 'admin', '2021-01-29', 'admin'),
(14, 'ANGGIT', 'IT', 'IT STAFF', 'NAS', 'TS-431P2 8GB RAM 4-B', 'QNAP TS-431P2 8GB RAM 4-Bay NAS Server External Storage TS431P2	', 'QNAP', 1, 'POOL IRONBIRD', 'New', 0, '2021-01-29', 'admin', '0000-00-00', ''),
(15, 'ANGGIT', 'IT', 'IT STAFF', 'HARDISK', 'WD Caviar Blue 3,5\'\'', 'WD Caviar Blue 3,5\'\' 2TB SATA3 / HDD PC / HDD Internal / HDD DEKSTOP	', 'WD', 1, 'POOL IRONBIRD', 'New', 0, '2021-01-29', 'admin', '0000-00-00', ''),
(16, 'DENI ARFIAN', 'OPERASI', 'STAFF MONITORING', 'Printer Epson', 'Epson LX 310', 'Printer EPSON LX 310	', 'EPSON', 1, 'POOL IRONBIRD', 'New', 1, '2021-02-26', 'admin', '2021-02-26', 'admin'),
(17, 'SENDI JULIANDIKA', 'OPERASI', 'STAFF LTL', 'Full Set PC Lenovo', 'Core i3, 500Gb, 2 Gb', 'M-PCSETLNOVOLOW	', 'LENOVO', 1, 'POOL IRONBIRD', 'New', 1, '2021-02-26', 'admin', '2021-02-26', 'admin'),
(18, 'RIZAL A', 'FINANCE', 'STAFF AP', 'Printer', 'Epson L120	', 'Printer Epson L120	', 'EPSON', 1, 'POOL IRONBIRD', 'New', 1, '2021-02-26', 'admin', '2021-02-26', 'admin'),
(19, 'ENO', 'OPERASI', 'LO JVC', 'Full Set PC Lenovo', 'Core i3, 1TB, 4 Gb', 'M-PCSETLNOVOLOW	', 'LENOVO', 1, 'LO JVC', 'New', 0, '2021-02-26', 'admin', '0000-00-00', ''),
(20, 'MARIA', 'OPERASI FORW', 'SPV OPS FORW', 'PRINTER', 'L 5190', 'PRINTER EPSON L 5190 3 IN 1	', 'EPSON', 1, 'POOL IRONBIRD', 'New', 0, '2021-02-26', 'admin', '0000-00-00', ''),
(21, 'MARIA', 'OPERASI FORW', 'SPV OPS FORW', 'PRINTER', 'LQ 2190', 'PRINTER EPSON LQ 20190	', 'EPSON', 1, 'POOL IRONBIRD', 'New', 0, '2021-02-26', 'admin', '0000-00-00', ''),
(22, 'Akhmad Sutrisno', 'HSE', 'SPV HSE', 'NOTEBOOK', 'HP Laptop 14-cm0013A', 'HP Laptop 14-cm0013AX PROC AMD DUAL CORE A9-9425 3.10 GHz, HDD 1TB, RAM 4GB', 'MHP', 2, 'POOL IRONBIRD', 'New', 1, '2021-02-26', 'admin', '2021-02-26', 'admin'),
(23, 'Ahmad Hadi', 'FINANCE', 'AP', 'NOTEBOOK', 'HP ENVY 13-AQ1018TX', 'HP ENVY 13-AQ1018TX PROC CORE I7-10510U 4,9 GHZ, SSD 512GB, RAM 16GB', 'HP', 1, 'POOL IRONBIRD', 'New', 1, '2021-02-26', 'admin', '2021-02-26', 'admin'),
(24, 'Albert', 'OPERASI', 'STAFF DMS', 'PC LENOVO', 'PC LENOVO', 'HDD : 500 GB, RAM : 2GB + 2 GB, PROC : CORE I3', 'LENOVO', 1, 'POOL IRONBIRD', 'New', 1, '2021-02-26', 'admin', '2021-02-26', 'admin'),
(25, 'Ani Rusmiati', 'FINANCE', 'STAFF AR', 'PC SET', 'PC LENOVO', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 'LENOVO', 1, 'POOL IRONBIRD', 'New', 1, '2021-02-26', 'admin', '2021-02-26', 'admin'),
(26, 'ANITA', 'HRD', 'STAFF HR', 'PC LENOVO', 'PC LENOVO', 'HDD : 320 GB, RAM : 2GB, PROC : DUAL 3.0 GHZ', 'LENOVO', 1, 'POOL IRONBIRD', 'New', 1, '2021-02-26', 'admin', '2021-02-26', 'admin'),
(27, 'Ardias Maulana', 'FINANCE', 'STAFF AR', 'PC LENOVO', 'PC LENOVO', 'HDD : 1 TB, RAM : 4GB, PROC : CORE I3', 'LENOVO', 1, 'POOL IRONBIRD', 'New', 1, '2021-02-26', 'admin', '2021-02-26', 'admin'),
(28, 'Ari Sembogo', 'HRD', 'STAFF HR', 'PC LENOVO', 'PC LENOVO', 'HDD : 500 GB, RAM : 2GB, PROC : CORE I3', 'LENOVO', 1, 'POOL IRONBIRD', 'New', 1, '2021-02-26', 'admin', '2021-02-26', 'admin'),
(29, 'Deni Arfian', 'OPERASI', 'STAFF OPS', 'NOTEBOOK', 'LENOVO IP 330', 'LENOVO IP 330-14AST/81D5 HDD 1TB, RAM 4GB, PROC AMD A9-9425 3,1 GHZ, 14 INC', 'LENOVO', 1, 'POOL IRONBIRD', 'New', 1, '2021-02-26', 'admin', '2021-02-26', 'admin'),
(30, 'Fajar Aulia', 'FINANCE', 'SPV AP', 'SCANNER', 'Scanner Epson DS-410', 'Scanner Epson DS-410 A4 Duplex Sheet -fed Dcoument', 'EPSON', 1, 'POOL IRONBIRD', 'New', 1, '2021-02-26', 'admin', '2021-02-26', 'admin'),
(31, 'Haslinda', 'FINANCE', 'STAFF AP', 'NOTEBOOK', 'Lenovo Yoga C640', 'Lenovo Yoga C640-13iml PROC Intel i5-10210U 1,6 GHz, SSD 512GB, RAM 8GB', 'LENOVO', 1, 'POOL IRONBIRD', 'New', 1, '2021-02-26', 'admin', '2021-02-26', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `form_return`
--

CREATE TABLE `form_return` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `material` varchar(20) NOT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `spec` text DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `allocation` varchar(20) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `receiver` varchar(20) DEFAULT NULL,
  `is_accepted` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `updatedAt` date NOT NULL,
  `updatedBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_return`
--

INSERT INTO `form_return` (`id`, `name`, `dept`, `position`, `material`, `product_name`, `spec`, `brand`, `qty`, `allocation`, `note`, `receiver`, `is_accepted`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`) VALUES
(52, 'SLAMET RIYADI', 'IT', 'IT STAFF', 'Wifi Router', 'TP-LINK TL-WR941HP', 'TP-LINK TL-WR941HP 450Mbps High Power Wireless N Router	', 'TP-LINK', 1, 'POOL IRONBIRD', 'Sudah tidak diperlukan lagi', 'ACHMAD RAFMAWAN', 0, '2021-01-29', 'admin', '2021-01-29', 'admin'),
(53, 'AJI', 'OPERASI', 'LO ARGA', 'NOTEBOOK', 'LENOVO AMD A9 8GB DD', 'LENOVO AMD A9 8GB DDR4 256GB SSD 14\'\' RADEON R5 WINDOWS 10	', 'LENOVO', 1, 'POOL IRONBIRD', 'Sudah tidak dipakai lagi', 'SLAMET RIYADI', 1, '2021-01-29', 'admin', '2021-01-29', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL,
  `createdAt` date NOT NULL,
  `createdBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `description`, `createdAt`, `createdBy`) VALUES
(300001, 'IT ROOM', '2020-12-04', 'slamet'),
(300002, 'SERVER ROOM', '2020-12-04', 'slamet'),
(300003, 'HRD ROOM', '2020-12-04', 'slamet'),
(300004, 'GA ROOM', '2020-12-04', 'slamet'),
(300005, 'HSE ROOM', '2020-12-04', 'slamet'),
(300006, 'OPERASI ROOM', '2020-12-04', 'slamet'),
(300007, 'MARKETING ROOM', '2020-12-04', 'slamet'),
(300008, 'TMS ROOM', '2020-12-04', 'slamet'),
(300009, 'DMS ROOM', '2020-12-04', 'slamet'),
(300010, 'PURCHASING ROOM', '2020-12-04', 'slamet'),
(300011, 'CRC ROOM', '2020-12-04', 'slamet'),
(300012, 'GUDANG ROOM', '2020-12-04', 'slamet'),
(300013, 'TA ROOM', '2020-12-04', 'slamet'),
(300014, 'AR ROOM', '2020-12-04', 'slamet'),
(300015, 'AP ROOM', '2020-12-04', 'slamet'),
(300016, 'KASIR ROOM', '2020-12-04', 'slamet'),
(300017, 'SECURITY ROOM', '2020-12-28', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `description` varchar(10) NOT NULL,
  `createdAt` date NOT NULL,
  `createdBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit`, `description`, `createdAt`, `createdBy`) VALUES
(1, 'UNIT', 'UNIT', '0000-00-00', ''),
(2, 'PCS', 'PIECES', '0000-00-00', ''),
(6, 'KG', 'KILOGRAM', '2021-01-06', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `updatedBy` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user`, `username`, `password`, `image`, `is_active`, `role_id`, `email`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`) VALUES
(15, 'User', 'user', '$2y$10$4PnU5bWGPfDFcvTnXraMmes.BkkIkW19Pq7NBOPbX/wRQ0ywF258W', 'avatar.png', 1, 2, NULL, '2020-12-05', 'slamet', NULL, NULL),
(18, 'Admin', 'admin', '$2y$10$oNn5QgWKB691pHsL1WxU6.NC9cEjy4VuhzxUCBJsEJ.st4T0O5Ht.', 'avatar.png', 1, 1, '', '2020-12-27', 'slamet', '2020-12-27', 'slamet'),
(22, 'Hally Hanafiah', 'hally', '$2y$10$OzUja0Y5ItN7MTwWKVRuZuVh774WnkGaqSWoSjkh1EUlF7o4bjSku', 'avatar.png', 1, 3, '', '2021-02-06', 'admin', '2021-02-25', 'admin'),
(23, 'Arif Fauzi', 'kabag', '$2y$10$L/BMn19O4H1Kg7nVRw6ZZu/sGXZGelmoJyJoD6Q1sUhTGQvlOBZJ6', 'avatar.png', 1, 3, '', '2021-02-06', 'admin', '2021-02-25', 'admin'),
(24, 'Slamet Riyadi', 'it', '$2y$10$b6g/HNSQiHyJjV8F2iypOureOZzJXrd/RZ2ucD7vX.N0Y8zN3GGZy', 'avatar.png', 1, 1, '', '2021-02-25', 'admin', '2021-02-25', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_asset`
--

CREATE TABLE `user_asset` (
  `userasset_id` int(11) NOT NULL,
  `no_eq` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `unitId` int(11) NOT NULL,
  `createdAt` date NOT NULL,
  `createdBy` varchar(20) NOT NULL,
  `updatedAt` date NOT NULL,
  `updatedBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_asset`
--

INSERT INTO `user_asset` (`userasset_id`, `no_eq`, `nik`, `qty`, `unitId`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`) VALUES
(18, 6020013, '17651', 1, 1, '2021-01-29', 'admin', '0000-00-00', ''),
(19, 6020012, '17651', 1, 1, '2021-01-29', 'admin', '0000-00-00', ''),
(20, 6019003, '2147', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(21, 6019006, '18793', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(22, 6020014, '6758', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(23, 6020016, '11820', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(24, 6019015, '18090', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(25, 6015702, '13696', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(26, 6015279, '6242', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(27, 6015277, '18689', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(28, 6015094, '12049', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(29, 6014326, '16358', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(30, 6014322, '9568', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(31, 6014316, '16299', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(32, 6014310, '12051', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(33, 6011363, '12094', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(34, 6011359, '11626', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(35, 6011357, '18733', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(36, 6011351, '17768', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(37, 6010873, '6346', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(38, 6010162, '18236', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(39, 6010160, '18655', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(40, 6010142, '16497', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(41, 6010132, '2329', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(42, 6010051, '18979', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(43, 6008428, '2105', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(44, 6007435, '6758', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(45, 6006882, '13250', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(46, 6006771, '8507', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(47, 6006769, '12928', 1, 1, '2021-02-26', 'admin', '0000-00-00', ''),
(48, 6005769, '14942', 1, 1, '2021-02-26', 'admin', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Mgr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_id`),
  ADD KEY `location` (`location`),
  ADD KEY `cat_id` (`category`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employe_id`),
  ADD KEY `dept` (`dept_id`),
  ADD KEY `branch` (`branch_id`);

--
-- Indexes for table `form_request`
--
ALTER TABLE `form_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_return`
--
ALTER TABLE `form_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_asset`
--
ALTER TABLE `user_asset`
  ADD PRIMARY KEY (`userasset_id`),
  ADD UNIQUE KEY `no_eq_2` (`no_eq`),
  ADD KEY `employe_id` (`unitId`),
  ADD KEY `no_eq` (`no_eq`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `form_request`
--
ALTER TABLE `form_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `form_return`
--
ALTER TABLE `form_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_asset`
--
ALTER TABLE `user_asset`
  MODIFY `userasset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
