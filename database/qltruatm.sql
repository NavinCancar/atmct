-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 03, 2024 lúc 09:00 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qltruatm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chap_nhan_the`
--

CREATE TABLE `chap_nhan_the` (
  `TA_SOHIEU` varchar(8) NOT NULL,
  `NH_MA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chap_nhan_the`
--

INSERT INTO `chap_nhan_the` (`TA_SOHIEU`, `NH_MA`) VALUES
('0924777', 1),
('1543878', 1),
('1543878', 3),
('1765423', 2),
('1765423', 4),
('2176883', 2),
('2176883', 3),
('5824633', 1),
('5824633', 2),
('6675942', 2),
('6675942', 3),
('6675942', 4),
('6724987', 1),
('8267599', 2),
('8267599', 4),
('9876245', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dich_vu`
--

CREATE TABLE `dich_vu` (
  `DV_MA` int(11) NOT NULL,
  `DV_TEN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dich_vu`
--

INSERT INTO `dich_vu` (`DV_MA`, `DV_TEN`) VALUES
(2, 'Gửi tiết kiệm'),
(3, 'Chuyển tiền'),
(4, 'Rút tiền');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muc_phi`
--

CREATE TABLE `muc_phi` (
  `NH_THE` int(11) NOT NULL,
  `NH_TRU_ATM` int(11) NOT NULL,
  `DV_MA` int(11) NOT NULL,
  `MP_DONGIA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `muc_phi`
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
-- Cấu trúc bảng cho bảng `ngan_hang`
--

CREATE TABLE `ngan_hang` (
  `NH_MA` int(11) NOT NULL,
  `XP_MA` int(11) NOT NULL,
  `NH_TEN` varchar(30) NOT NULL,
  `NH_DIACHI` varchar(90) NOT NULL,
  `NH_SDT` char(11) NOT NULL,
  `NH_VIDOX` double NOT NULL,
  `NH_KINHDOY` double NOT NULL,
  `NH_TT` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ngan_hang`
--

INSERT INTO `ngan_hang` (`NH_MA`, `XP_MA`, `NH_TEN`, `NH_DIACHI`, `NH_SDT`, `NH_VIDOX`, `NH_KINHDOY`, `NH_TT`) VALUES
(1, 4, 'Agribank', '280 Phạm Hùng', '0190055999', 9.99246, 105.74882, 1),
(2, 3, 'Vietcombank', '3-5-7 Hòa Bình', '02923820445', 10.0336715, 105.7847596, 1),
(3, 3, 'Sacombank', '95 Nam Kỳ Khởi Nghĩa', '02923843295', 10.0323723, 105.7841215, 1),
(4, 9, 'HD Bank', '162-162B Trần Hưng Đạo', '02923734250', 10.0365398, 105.7758005, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_giao_dich`
--

CREATE TABLE `phong_giao_dich` (
  `PGD_MA` int(11) NOT NULL,
  `XP_MA` int(11) NOT NULL,
  `NH_MA` int(11) NOT NULL,
  `PGD_TEN` varchar(30) NOT NULL,
  `PGD_DIACHI` varchar(90) NOT NULL,
  `PGD_SDT` char(11) NOT NULL,
  `PGD_VIDOX` double NOT NULL,
  `PGD_KINHDOY` double NOT NULL,
  `PGD_TT` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_giao_dich`
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
-- Cấu trúc bảng cho bảng `quan_huyen`
--

CREATE TABLE `quan_huyen` (
  `QH_MA` int(11) NOT NULL,
  `QH_TEN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quan_huyen`
--

INSERT INTO `quan_huyen` (`QH_MA`, `QH_TEN`) VALUES
(1, 'Ninh Kiều'),
(2, 'Cái Răng'),
(3, 'Ôn Môn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tru_atm`
--

CREATE TABLE `tru_atm` (
  `TA_SOHIEU` varchar(8) NOT NULL,
  `NH_MA` int(11) NOT NULL,
  `XP_MA` int(11) NOT NULL,
  `TA_DIACHI` varchar(90) NOT NULL,
  `TA_VIDOX` double NOT NULL,
  `TA_KINHDOY` double NOT NULL,
  `TA_TT` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tru_atm`
--

INSERT INTO `tru_atm` (`TA_SOHIEU`, `NH_MA`, `XP_MA`, `TA_DIACHI`, `TA_VIDOX`, `TA_KINHDOY`, `TA_TT`) VALUES
('0924777', 1, 3, 'Ngô Hữu Hạnh', 10.035795, 105.7873137, 1),
('1543878', 3, 13, '363AA Nguyễn Văn Cừ Nối Dài', 10.0215533, 105.7430452, 1),
('1765423', 2, 6, 'Lô 20 Phú An', 10.0053592, 105.798532, 1),
('2176883', 3, 4, '415 Quốc Lộ 1A', 10.0001982, 105.7503835, 1),
('5824633', 2, 3, 'Số 1 Đại lộ Hoà Bình', 10.0336715, 105.7847596, 1),
('6675942', 4, 9, '162 - 162B Trần Hưng Đạo', 10.0365398, 105.7758005, 1),
('6724987', 1, 3, 'Số 8-10 Nam Kỳ Khởi Nghĩa', 10.0317593, 105.7865143, 1),
('8267599', 2, 12, '179 Nguyễn Văn Cừ', 10.0354, 105.757, 1),
('9876245', 1, 11, 'Cổng B Khu II Trường Đại Học Cần Thơ 3/2', 10.0290338, 105.7711959, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xa_phuong`
--

CREATE TABLE `xa_phuong` (
  `XP_MA` int(11) NOT NULL,
  `QH_MA` int(11) NOT NULL,
  `XP_TEN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xa_phuong`
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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chap_nhan_the`
--
ALTER TABLE `chap_nhan_the`
  ADD PRIMARY KEY (`TA_SOHIEU`,`NH_MA`),
  ADD KEY `FK_CHAP_NHAN_THE2` (`NH_MA`);

--
-- Chỉ mục cho bảng `dich_vu`
--
ALTER TABLE `dich_vu`
  ADD PRIMARY KEY (`DV_MA`);

--
-- Chỉ mục cho bảng `muc_phi`
--
ALTER TABLE `muc_phi`
  ADD PRIMARY KEY (`NH_THE`,`DV_MA`,`NH_TRU_ATM`),
  ADD KEY `FK_DV_MP` (`DV_MA`),
  ADD KEY `FK_NH_TRU_ATM` (`NH_TRU_ATM`);

--
-- Chỉ mục cho bảng `ngan_hang`
--
ALTER TABLE `ngan_hang`
  ADD PRIMARY KEY (`NH_MA`),
  ADD KEY `FK_CO_NGAN_HANG` (`XP_MA`);

--
-- Chỉ mục cho bảng `phong_giao_dich`
--
ALTER TABLE `phong_giao_dich`
  ADD PRIMARY KEY (`PGD_MA`),
  ADD KEY `FK_CO` (`NH_MA`),
  ADD KEY `FK_CO_PHONG_GIAO_DICH` (`XP_MA`);

--
-- Chỉ mục cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD PRIMARY KEY (`QH_MA`);

--
-- Chỉ mục cho bảng `tru_atm`
--
ALTER TABLE `tru_atm`
  ADD PRIMARY KEY (`TA_SOHIEU`),
  ADD KEY `FK_CO_TRU_ATM` (`XP_MA`),
  ADD KEY `FK_CUNG_CAP` (`NH_MA`);

--
-- Chỉ mục cho bảng `xa_phuong`
--
ALTER TABLE `xa_phuong`
  ADD PRIMARY KEY (`XP_MA`),
  ADD KEY `FK_THUOC_QUAN_HUYEN` (`QH_MA`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ngan_hang`
--
ALTER TABLE `ngan_hang`
  MODIFY `NH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phong_giao_dich`
--
ALTER TABLE `phong_giao_dich`
  MODIFY `PGD_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chap_nhan_the`
--
ALTER TABLE `chap_nhan_the`
  ADD CONSTRAINT `FK_CHAP_NHAN_THE` FOREIGN KEY (`TA_SOHIEU`) REFERENCES `tru_atm` (`TA_SOHIEU`),
  ADD CONSTRAINT `FK_CHAP_NHAN_THE2` FOREIGN KEY (`NH_MA`) REFERENCES `ngan_hang` (`NH_MA`);

--
-- Các ràng buộc cho bảng `muc_phi`
--
ALTER TABLE `muc_phi`
  ADD CONSTRAINT `FK_DV_MP` FOREIGN KEY (`DV_MA`) REFERENCES `dich_vu` (`DV_MA`),
  ADD CONSTRAINT `FK_NH_THE` FOREIGN KEY (`NH_THE`) REFERENCES `ngan_hang` (`NH_MA`),
  ADD CONSTRAINT `FK_NH_TRU_ATM` FOREIGN KEY (`NH_TRU_ATM`) REFERENCES `ngan_hang` (`NH_MA`);

--
-- Các ràng buộc cho bảng `ngan_hang`
--
ALTER TABLE `ngan_hang`
  ADD CONSTRAINT `FK_CO_NGAN_HANG` FOREIGN KEY (`XP_MA`) REFERENCES `xa_phuong` (`XP_MA`);

--
-- Các ràng buộc cho bảng `phong_giao_dich`
--
ALTER TABLE `phong_giao_dich`
  ADD CONSTRAINT `FK_CO` FOREIGN KEY (`NH_MA`) REFERENCES `phong_giao_dich` (`PGD_MA`),
  ADD CONSTRAINT `FK_CO_pgd` FOREIGN KEY (`XP_MA`) REFERENCES `xa_phuong` (`XP_MA`);

--
-- Các ràng buộc cho bảng `tru_atm`
--
ALTER TABLE `tru_atm`
  ADD CONSTRAINT `FK_CO_TRU_ATM` FOREIGN KEY (`XP_MA`) REFERENCES `xa_phuong` (`XP_MA`),
  ADD CONSTRAINT `FK_CUNG_CAP` FOREIGN KEY (`NH_MA`) REFERENCES `ngan_hang` (`NH_MA`);

--
-- Các ràng buộc cho bảng `xa_phuong`
--
ALTER TABLE `xa_phuong`
  ADD CONSTRAINT `FK_THUOC_QUAN_HUYEN` FOREIGN KEY (`QH_MA`) REFERENCES `quan_huyen` (`QH_MA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
