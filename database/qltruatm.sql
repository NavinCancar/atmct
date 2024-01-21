-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2024 at 01:24 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qltruatm`
--

-- --------------------------------------------------------

--
-- Table structure for table `chap_nhan_the`
--

CREATE TABLE `chap_nhan_the` (
  `TA_SOHIEU` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `NH_MA` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chap_nhan_the`
--

INSERT INTO `chap_nhan_the` (`TA_SOHIEU`, `NH_MA`) VALUES
('0924777', 1),
('1543878', 1),
('5824633', 1),
('6724987', 1),
('9876245', 1),
('1765423', 2),
('2176883', 2),
('5824633', 2),
('6675942', 2),
('8267599', 2),
('1543878', 3),
('2176883', 3),
('5632975', 3),
('6675942', 3),
('1765423', 4),
('6675942', 4),
('8267599', 4);

-- --------------------------------------------------------

--
-- Table structure for table `dich_vu`
--

CREATE TABLE `dich_vu` (
  `DV_MA` int NOT NULL,
  `DV_TEN` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dich_vu`
--

INSERT INTO `dich_vu` (`DV_MA`, `DV_TEN`) VALUES
(2, 'Gửi tiết kiệm'),
(3, 'Chuyển tiền'),
(4, 'Rút tiền');

-- --------------------------------------------------------

--
-- Table structure for table `muc_phi`
--

CREATE TABLE `muc_phi` (
  `NH_THE` int NOT NULL,
  `NH_TRU_ATM` int NOT NULL,
  `DV_MA` int NOT NULL,
  `MP_DONGIA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `muc_phi`
--

INSERT INTO `muc_phi` (`NH_THE`, `NH_TRU_ATM`, `DV_MA`, `MP_DONGIA`) VALUES
(1, 2, 4, 3000),
(1, 3, 4, 3000),
(2, 3, 3, 9000),
(2, 4, 3, 90000),
(3, 4, 3, 3000),
(4, 2, 3, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `ngan_hang`
--

CREATE TABLE `ngan_hang` (
  `NH_MA` int NOT NULL,
  `XP_MA` int NOT NULL,
  `NH_TEN` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `NH_DIACHI` varchar(90) COLLATE utf8mb4_general_ci NOT NULL,
  `NH_SDT` char(11) COLLATE utf8mb4_general_ci NOT NULL,
  `NH_VIDOX` double NOT NULL,
  `NH_KINHDOY` double NOT NULL,
  `NH_TT` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ngan_hang`
--

INSERT INTO `ngan_hang` (`NH_MA`, `XP_MA`, `NH_TEN`, `NH_DIACHI`, `NH_SDT`, `NH_VIDOX`, `NH_KINHDOY`, `NH_TT`) VALUES
(1, 4, 'Agribank', '280 Phạm Hùng', '0190055999', 9.9924618, 105.7488206, 1),
(2, 3, 'Vietcombank', '3-5-7 Hòa Bình', '02923820445', 10.0336715, 105.7847596, 1),
(3, 3, 'Sacombank', '95 Nam Kỳ Khởi Nghĩa', '02923843295', 10.0323723, 105.7841215, 1),
(4, 9, 'HD Bank', '162-162B Trần Hưng Đạo', '02923734250', 10.0365398, 105.7758005, 1),
(5, 1, 'abbsj', '122 Trần Quang Khải', '0909222222', 12344332, 12344422, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phong_giao_dich`
--

CREATE TABLE `phong_giao_dich` (
  `PGD_MA` int NOT NULL,
  `XP_MA` int NOT NULL,
  `NH_MA` int NOT NULL,
  `PGD_TEN` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `PGD_DIACHI` varchar(90) COLLATE utf8mb4_general_ci NOT NULL,
  `PGD_SDT` char(11) COLLATE utf8mb4_general_ci NOT NULL,
  `PGD_VIDOX` double NOT NULL,
  `PGD_KINHDOY` double NOT NULL,
  `PGD_TT` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phong_giao_dich`
--

INSERT INTO `phong_giao_dich` (`PGD_MA`, `XP_MA`, `NH_MA`, `PGD_TEN`, `PGD_DIACHI`, `PGD_SDT`, `PGD_VIDOX`, `PGD_KINHDOY`, `PGD_TT`) VALUES
(1, 3, 1, 'PGD ARB số 02', '15 Đại lộ Hòa Bình', '02923852125', 10.0324317, 105.7833691, 1),
(2, 10, 1, 'PGD ARB số 03', '155 Lý Tự Trọng', '01900558818', 10.0356814, 105.7785983, 1),
(3, 2, 1, 'PGD VCB An Hòa', '57 Võ Văn Kiệt', '02923898179', 10.04504, 105.7631777, 1),
(4, 8, 2, 'PDG VCB 3/2', '70 3 tháng 2', '02923680086', 10.0210231, 105.7647906, 1),
(5, 1, 2, 'PGD VCB Ninh Kiều', '49-51 Trần Văn Khéo', '02923764849', 10.0439696, 105.7831773, 1),
(6, 2, 3, 'PGD SCB An Hòa', '51 Cách mạng tháng 8', '02923765423', 10.0483141, 105.7769444, 1),
(7, 9, 3, 'PGD SCB An Phú', '228G Trần Hưng Đạo', '02923730003', 10.0342843, 105.7749627, 1),
(8, 1, 3, 'PGD SCB Cái Khế', '81-83 Trần Văn Khéo', '02923761687', 10.0448143, 105.7843475, 1),
(9, 11, 4, 'PGD HDB Xuân Khánh', '209A-209B 30 tháng 4', '02923783041', 10.0241846, 105.7738967, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quan_huyen`
--

CREATE TABLE `quan_huyen` (
  `QH_MA` int NOT NULL,
  `QH_TEN` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quan_huyen`
--

INSERT INTO `quan_huyen` (`QH_MA`, `QH_TEN`) VALUES
(1, 'Ninh Kiều'),
(2, 'Cái Răng'),
(3, 'Ôn Môn');

-- --------------------------------------------------------

--
-- Table structure for table `tru_atm`
--

CREATE TABLE `tru_atm` (
  `TA_SOHIEU` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `NH_MA` int NOT NULL,
  `XP_MA` int NOT NULL,
  `TA_DIACHI` varchar(90) COLLATE utf8mb4_general_ci NOT NULL,
  `TA_VIDOX` double NOT NULL,
  `TA_KINHDOY` double NOT NULL,
  `TA_TT` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tru_atm`
--

INSERT INTO `tru_atm` (`TA_SOHIEU`, `NH_MA`, `XP_MA`, `TA_DIACHI`, `TA_VIDOX`, `TA_KINHDOY`, `TA_TT`) VALUES
('0924777', 1, 3, 'Ngô Hữu Hạnh', 10.035795, 105.7873137, 1),
('1543878', 3, 13, '363AA Nguyễn Văn Cừ Nối Dài', 10.0215533, 105.7430452, 1),
('1765423', 2, 6, 'Lô 20 Phú An', 10.0053592, 105.798532, 1),
('2176883', 3, 4, '415 Quốc Lộ 1A', 10.0001982, 105.7503835, 1),
('5632975', 3, 7, '953/6 đường 26/03', 10.1113288, 105.6213519, 1),
('5824633', 2, 3, 'Số 1 Đại lộ Hoà Bình', 10.0336715, 105.7847596, 1),
('6675942', 4, 9, '162 - 162B Trần Hưng Đạo', 10.0365398, 105.7758005, 1),
('6724987', 1, 3, 'Số 8-10 Nam Kỳ Khởi Nghĩa', 10.0317593, 105.7865143, 1),
('8267599', 2, 12, '179 Nguyễn Văn Cừ', 10.0354, 105.757, 1),
('9876245', 1, 11, 'Cổng B Khu II Trường Đại Học Cần Thơ 3/2', 10.0290338, 105.7711959, 1);

-- --------------------------------------------------------

--
-- Table structure for table `xa_phuong`
--

CREATE TABLE `xa_phuong` (
  `XP_MA` int NOT NULL,
  `QH_MA` int NOT NULL,
  `XP_TEN` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xa_phuong`
--

INSERT INTO `xa_phuong` (`XP_MA`, `QH_MA`, `XP_TEN`) VALUES
(1, 1, 'Cái Khế'),
(2, 1, 'An Hoà'),
(3, 1, 'Tân An'),
(4, 2, 'Lê Bình'),
(5, 2, 'Thường Thạnh'),
(6, 2, 'Phú Thứ'),
(7, 3, 'Châu Văn Liêm'),
(8, 1, 'Hưng Lợi'),
(9, 1, 'An Nghiệp'),
(10, 1, 'An Cư'),
(11, 1, 'Xuân Khánh'),
(12, 1, 'An Khánh'),
(13, 1, 'An Bình');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chap_nhan_the`
--
ALTER TABLE `chap_nhan_the`
  ADD PRIMARY KEY (`TA_SOHIEU`,`NH_MA`),
  ADD KEY `FK_CHAP_NHAN_THE2` (`NH_MA`);

--
-- Indexes for table `dich_vu`
--
ALTER TABLE `dich_vu`
  ADD PRIMARY KEY (`DV_MA`);

--
-- Indexes for table `muc_phi`
--
ALTER TABLE `muc_phi`
  ADD PRIMARY KEY (`NH_THE`,`DV_MA`,`NH_TRU_ATM`),
  ADD KEY `FK_DV_MP` (`DV_MA`),
  ADD KEY `FK_NH_TRU_ATM` (`NH_TRU_ATM`);

--
-- Indexes for table `ngan_hang`
--
ALTER TABLE `ngan_hang`
  ADD PRIMARY KEY (`NH_MA`),
  ADD KEY `FK_CO_NGAN_HANG` (`XP_MA`);

--
-- Indexes for table `phong_giao_dich`
--
ALTER TABLE `phong_giao_dich`
  ADD PRIMARY KEY (`PGD_MA`),
  ADD KEY `FK_CO` (`NH_MA`),
  ADD KEY `FK_CO_PHONG_GIAO_DICH` (`XP_MA`);

--
-- Indexes for table `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD PRIMARY KEY (`QH_MA`);

--
-- Indexes for table `tru_atm`
--
ALTER TABLE `tru_atm`
  ADD PRIMARY KEY (`TA_SOHIEU`),
  ADD KEY `FK_CO_TRU_ATM` (`XP_MA`),
  ADD KEY `FK_CUNG_CAP` (`NH_MA`);

--
-- Indexes for table `xa_phuong`
--
ALTER TABLE `xa_phuong`
  ADD PRIMARY KEY (`XP_MA`),
  ADD KEY `FK_THUOC_QUAN_HUYEN` (`QH_MA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ngan_hang`
--
ALTER TABLE `ngan_hang`
  MODIFY `NH_MA` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phong_giao_dich`
--
ALTER TABLE `phong_giao_dich`
  MODIFY `PGD_MA` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chap_nhan_the`
--
ALTER TABLE `chap_nhan_the`
  ADD CONSTRAINT `FK_CHAP_NHAN_THE` FOREIGN KEY (`TA_SOHIEU`) REFERENCES `tru_atm` (`TA_SOHIEU`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_CHAP_NHAN_THE2` FOREIGN KEY (`NH_MA`) REFERENCES `ngan_hang` (`NH_MA`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `muc_phi`
--
ALTER TABLE `muc_phi`
  ADD CONSTRAINT `FK_DV_MP` FOREIGN KEY (`DV_MA`) REFERENCES `dich_vu` (`DV_MA`),
  ADD CONSTRAINT `FK_NH_THE` FOREIGN KEY (`NH_THE`) REFERENCES `ngan_hang` (`NH_MA`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_NH_TRU_ATM` FOREIGN KEY (`NH_TRU_ATM`) REFERENCES `ngan_hang` (`NH_MA`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ngan_hang`
--
ALTER TABLE `ngan_hang`
  ADD CONSTRAINT `FK_CO_NGAN_HANG` FOREIGN KEY (`XP_MA`) REFERENCES `xa_phuong` (`XP_MA`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `phong_giao_dich`
--
ALTER TABLE `phong_giao_dich`
  ADD CONSTRAINT `FK_CO` FOREIGN KEY (`NH_MA`) REFERENCES `phong_giao_dich` (`PGD_MA`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_CO_pgd` FOREIGN KEY (`XP_MA`) REFERENCES `xa_phuong` (`XP_MA`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tru_atm`
--
ALTER TABLE `tru_atm`
  ADD CONSTRAINT `FK_CO_TRU_ATM` FOREIGN KEY (`XP_MA`) REFERENCES `xa_phuong` (`XP_MA`),
  ADD CONSTRAINT `FK_CUNG_CAP` FOREIGN KEY (`NH_MA`) REFERENCES `ngan_hang` (`NH_MA`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `xa_phuong`
--
ALTER TABLE `xa_phuong`
  ADD CONSTRAINT `FK_THUOC_QUAN_HUYEN` FOREIGN KEY (`QH_MA`) REFERENCES `quan_huyen` (`QH_MA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
