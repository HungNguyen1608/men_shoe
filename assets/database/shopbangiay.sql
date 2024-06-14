-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2023 lúc 01:25 AM
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
-- Cơ sở dữ liệu: `shopbangiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongiao`
--

CREATE TABLE `dongiao` (
  `Madonnhan` int(11) NOT NULL,
  `Mataikhoan` int(11) NOT NULL,
  `Makhach` int(11) NOT NULL,
  `Magiay` varchar(10) NOT NULL,
  `Soluong` int(5) NOT NULL,
  `Size` varchar(8) DEFAULT NULL,
  `Tinhtrang` varchar(100) NOT NULL,
  `Madon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dongiao`
--

INSERT INTO `dongiao` (`Madonnhan`, `Mataikhoan`, `Makhach`, `Magiay`, `Soluong`, `Size`, `Tinhtrang`, `Madon`) VALUES
(75, 2, 2, 'gtt8', 1, '23', 'Đã Xác nhận đơn hàng', 105),
(76, 2, 2, 'gtt8', 1, '23', 'Đã Xác nhận đơn hàng', 106),
(77, 2, 2, 'gtt8', 1, '23', 'Đã Xác nhận đơn hàng', 107),
(78, 2, 2, 'gtt8', 1, '23', 'Đã Xác nhận đơn hàng', 108),
(79, 3, 3, 'gtt8', 1, '31', 'Đã Xác nhận đơn hàng', 109),
(80, 3, 3, 'gs9', 1, '30', 'Đã Xác nhận đơn hàng', 110),
(81, 3, 3, 'Pk9', 3, NULL, 'Đã Xác nhận đơn hàng', 112),
(82, 3, 3, 'gtt5', 1, '38', 'Đã Xác nhận đơn hàng', 111),
(83, 3, 3, 'gtt5', 1, '30', 'Đã Xác nhận đơn hàng', 114);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giay`
--

CREATE TABLE `giay` (
  `Magiay` varchar(10) NOT NULL,
  `Maloaigiay` varchar(10) NOT NULL,
  `Tengiay` varchar(100) NOT NULL,
  `Soluong` int(10) NOT NULL,
  `Dongia` varchar(20) NOT NULL,
  `Mau` varchar(60) DEFAULT NULL,
  `Hanggiay` varchar(20) NOT NULL,
  `Thongtin` varchar(399) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Ngaynhap` date DEFAULT NULL,
  `hinh` varchar(200) DEFAULT NULL,
  `giamgia` int(20) NOT NULL,
  `Mancc` int(11) DEFAULT NULL,
  `daban` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giay`
--

INSERT INTO `giay` (`Magiay`, `Maloaigiay`, `Tengiay`, `Soluong`, `Dongia`, `Mau`, `Hanggiay`, `Thongtin`, `Size`, `Ngaynhap`, `hinh`, `giamgia`, `Mancc`, `daban`) VALUES
('gd03', '01da', 'Giày Oxford đế cao', 90, '1489000', 'Đen', 'LaForce', 'Giày da sang trọng lịch lãm ,tăng chiều cao phù với tất cả mọi người.', '30 > 39', '0000-00-00', 'img/anhgiayda/Giay_Oxford_decao_GCLAS997-8-D.jpg', 10, 1, 50),
('gd05', '01da', 'Giày da nam cao câp phối chuôn hai bên sang trọng lịch lãm', 21, '1389000 ', 'Đen', 'LaForce', 'Giày da cao cấp sang trọng lịch lãm sản xuất tại \r\nLaForce', '32 > 43', '2023-11-01', 'img/anhgiayda/giay-da-nam-cao-cap-_phoi-chuon_haiben_GNLA79201-80-D.jpg', 20, NULL, 90),
('gd10', '01da', 'Giày lười da nam mặt cá đuối GNLAJD6611 1028 D', 14, '1569000 ', 'Đen', 'LaForce', 'Giầy với thiết kế sang trọng quý phái ,da giày đẹp sang trọng', '31 > 39', '2023-11-01', 'img/anhgiayda/giay-luoi-da-nam-mat-ca-duoi-GNLAJD6611-1028-D.jpg', 20, NULL, 60),
('gd11', '01da', 'Giày lười da  họa tiết caro sang trọng ', 34, '1989999 ', 'Đen nâu', 'LaForce', 'Giày da nam họa tiết caro sang trọng', '30 > 42', '2023-10-11', 'img/anhgiayda/giay-luoi-da-nam-thiet-ke-ke-karo-GNLA12996-D.jpg', 19, NULL, 89),
('gd12', '01da', 'Giày lười công sở Penny Loafer GNLA8246 D', 4, '2459000', 'Đen', 'LaForce', 'Chất liệu Da bò cao cấp , kiểu dáng đẹp phù hợp với môi trường sang trọng hoặc công sở.', '29 > 42', '2023-09-12', 'img/anhgiayda/giay-luoi-nam-Penny-Loafer-congso-GNLA8246-D.jpg', 10, NULL, 100),
('gd13', '01da', 'Giày lười tăng chiều cao nam Penny Loafer GCLA0128 D', 35, '2389000', 'Đen ', 'LaForce', 'Chất liệu Da bò cao cấp , kiểu dáng đẹp phù hợp với môi trường công sở.', '34 > 39', '2023-09-12', 'img/anhgiayda/giay-luoi-tang-chieu-cao-nam-Penny-Loafer_GCLA0128-D.jpg', 20, NULL, 10),
('gd14', '01da', 'Giày lười tăng chiều cao Penny Loafer GCLA926 6 N', 34, '1234000', 'Nâu Vàng ', 'LaForce', 'Chất liệu Da bò cao cấp , kiểu dáng đẹp phù hợp với môi trường công sở và dự tiệc.', '34 > 39', '2023-09-12', 'img/anhgiayda/giay-luoi-tang-chieu-cao-nam-Penny-Loafer-GCLA926-6-N.jpg', 12, NULL, 20),
('gd15', '01da', 'Giày nam cao cổ Derby Brogues tăng chiều cao GCLA0130 D', 23, '1789000', 'Đen', 'LaForce', 'Chất liệu Da bò cao cấp 100% chính hãng , kiểu dáng đẹp phù hợp với môi trường công sở và các buổi tiệc trang trọng.', '29 > 42', '2023-09-12', 'img/anhgiayda/giay-nam-cao-cap-Derby-Brogues-tangchieucao-GCLA0130-D.jpg', 11, NULL, 46),
('gd16', '01da', 'Giày da Oxford lịch lãm', 24, '2378000 ', 'Đen', 'LaForce', 'Chất liệu Da bò cao cấp 100% chính hãng , kiểu dáng đẹp phù hợp với môi trường công sở và các buổi tiệc trang trọng.', '31 > 42', '2023-09-12', 'img/anhgiayda/giayda_Oxford_lichlam.jpg', 16, NULL, 9),
('gd17', '01da', 'Giày da Oxford Brogues mũi vuông GNLA08 8 D', 34, '1234000 ', 'Den ', 'LaForce', 'Chất liệu Da bò cao cấp 100% chính hãng , kiểu dáng đẹp phù hợp với môi trường công sở và các buổi tiệc trang trọng.', '32 > 40', '2023-09-02', 'img/anhgiayda/giayda_Oxford-Brogues_muivuog_GNLA08-8-D.jpg', 10, NULL, 18),
('gd18', '01da', 'GIày lười da Penny Loafer demem GNLA19 5 D', 22, '1333000 ', 'Đen, Nâu', 'LaForce', 'Chất liệu Da bò cao cấp 100% chính hãng , kiểu dáng đẹp phù hợp với môi trường công sở và các buổi tiệc trang trọng.', '32 > 40', '2023-05-12', 'img/anhgiayda/giayda_Penny-Loafer_demem_GNLA19-5-D.jpg', 15, NULL, 16),
('gd19', '01da', 'GIày da Penny Loafer', 32, '2459000 ', 'Đen', 'LaForce', 'Chất liệu Da bò cao cấp 100% chính hãng , kiểu dáng đẹp phù hợp với môi trường công sở và các buổi tiệc trang trọng.', '32 > 40', '2023-03-12', 'img/anhgiayda/giayda_Penny-Loafer.jpg', 19, NULL, 22),
('gd20', '01da', 'Giày da nam Cap Toe Oxford da bong GNLAJD6537-157-D', 20, '1290000', 'Đen', 'LaForce', 'Thiết kế Cổ điển, lịch lãm.Chất liệu Da bò thật nhập khẩu.Màu sắc Đen.', '31 > 42', '2023-11-05', 'img/anhgiayda/giaydanam_Cap-Toe-Oxford_dabong_GNLAJD6537-157-D.jpg', 20, NULL, 30),
('gd21', '01da', 'Giày da nam Oxford Brogue GNLA9632-1301-D', 23, '2300000', 'Đen', 'LaForce', 'Thiết kế cổ điển, lịch lãm.Chất liệu da bò thật nhập khẩu.Màu sắc đen.', '34 > 41', '2023-11-02', 'img/anhgiayda/giaydanam_Oxford-Brogue_GNLA9632-1301-D.jpg', 20, NULL, 6),
('gd22', '01da', 'Giày lười công sở Penny Loafer', 23, '1600000', 'Xanh đen bóng', 'LaForce', 'Thiết kế cổ điển, lịch lãm.Chất liệu da bò thật nhập khẩu.Màu sắc xanh đen bóng.', '34 > 42', '2023-11-01', 'img/anhgiayda/giayluoi_Penny_Loafer-congso_GNLA2H06-15-D.jpg', 22, NULL, 33),
('gd23', '01da', 'Giày lười Penny Loafer Xanh đen', 34, '2600000 ', 'Xanh đen', 'LaForce', 'Thiết kế cổ điển, lịch lãm.Chất liệu da bò thật nhập khẩu.Màu sắc xanh đen.', '31 > 42', '2023-11-05', 'img/anhgiayda/Giayluoi-Penny-Loafer_xanhden_GNLAAM2031-5-XD.jpg', 20, NULL, 89),
('gd24', '01da', 'Giày lười tăng chiều cao GCLA798-R1-D', 12, '2300000 ', 'Nâu đen', 'LaForce', 'Thiết kế cổ điển, lịch lãm.Chất liệu da bò thật nhập khẩu.Màu sắc nâu đen.', '31 > 41', '2023-11-01', 'img/anhgiayda/giayluoitangchieucao_GCLA798-R1-D.jpg', 19, NULL, 39),
('gd25', '01da', 'Giày da tăng chiều cao Apron Toe Derby GCLAXL911 ', 23, '2100000 ', 'Nâu', 'LaForce', 'Thiết kế cổ điển, lịch lãm.Chất liệu da bò thật nhập khẩu.Màu sắc nâu.', '', '2023-09-12', 'img/anhgiayda/giaytangchieucaonam_Apron-Toe-Derby_GCLAXL911-A6-N.jpg', 12, NULL, 55),
('gd26', '01da', 'Giày tây buộc dây Plain Toe Derby codien', 23, '3456000 ', 'Nâu', 'LaForce', 'Thiết kế cổ điển, lịch lãm.Chất liệu da bò thật nhập khẩu.Màu sắc nâu.', '34 > 41', '2023-11-01', 'img/anhgiayda/giaytay-buocday-Plain-Toe-Derby-codien-GNLA0205-N.jpg', 10, NULL, 32),
('gd27', '01da', 'Giày tây Spectator Oxford da bò', 33, '23000000 ', 'Nâu', 'LaForce', 'Thiết kế cổ điển, lịch lãm.Chất liệu da bò thật nhập khẩu.Màu sắc nâu.', '32 > 39', '2023-11-02', 'img/anhgiayda/giaytaynam_Spectator-Oxford_dabo-GNLAA176-R8-V.jpg', 12, NULL, 46),
('gd28', '01da', 'Mẫu giầy da nam cao cấp Derby Plain-Toe 6 lomuitron GNLA663 D', 12, '1200000 ', 'Đen', 'LaForce', 'Thiết kế cổ điển, lịch lãm.Chất liệu da bò thật nhập khẩu.Màu sắc đen.', '34 > 41', '2023-11-06', 'img/anhgiayda/mau-giay-da-nam-cao-cap-Derby-Plain-Toe-6-lomuitron-GNLA663-D.jpg', 16, NULL, 12),
('gd4', '01da', 'Giày da bò Oxfor công sở', 24, '1789999 ', 'Nâu đen', 'LaForce', 'Giày da đẹp,phù hợp với môi trường công sở ,sang trọng thanh lịch đươc sản xuất tại LaForce ', '31 > 39', '2023-09-11', 'img/anhgiayda/giay-da-bo-Oxfor-congso_GNLA135-5-N.jpg', 10, NULL, 86),
('gd6', '01da', 'Giày da Nam cao cổ hàng hiệu Boots da bò cao cấp GNLA36700-R58-XN', 34, '2450000 ', 'Nâu cổ Xanh', 'LaForce', 'Giày da cao cấp sang trọng lịch lãm sản xuất tại \r\nLaForce', '32 > 39', '2023-08-02', 'img/anhgiayda/giay-da-nam-hang-hieu-Boots-dabocaoco_GNLA36700-R58-XN.jpg', 16, NULL, 28),
('gd7', '01da', 'Giày da nam Derby Brogues GNLA9636-119-D', 23, '1345000', 'Đen', 'LaForce', 'Giày da cao cấp sang trọng lịch lãm sản xuất tại \r\nLaForce', '32 > 38', '2023-09-11', 'img/anhgiayda/giay-da-that-nam-Derby-Brogues_GNLA9636-119-D.jpg', 18, NULL, 30),
('gd8', '01da', 'Giày lười da bò cao cấp Horsebit Loafer GNLABL8070-3-D', 43, '1789000', 'Đen', 'LaForce', 'Giày da cao cấp sang trọng lịch lãm sản xuất tại \r\nLaForce', '32 > 39', '2023-08-08', 'img/anhgiayda/giay-luoi-da-bo-cao-cap-Horsebit-Loafer_GNLABL8070-3-D.jpg', 20, NULL, 61),
('gd9', '01da', 'Giày lười da bò cao cấp họa tiết caro GNLA2122-N', 24, '1789800 ', 'Đen', 'LaForce', 'Giày lười Da đẹp sang trọng họa tiết caro đẹp mắt', '32 > 41', '2023-11-02', 'img/anhgiayda/giay-luoi-da-nam-luoi-hoatietcaro-GNLA2122-N.jpg', 18, NULL, 3),
('giay1', '01da', 'Giày da Derby tăng chiều cao GCLA851-20', 20, '1290000', 'Da bò(nâu)', 'LaForce', 'Kiểu dáng: Giày Oxford mũi nhọn.\r\nChất liệu: Da bò thật cao cấp.\r\nMàu sắc: Vàng nâu phối đen.\r\nThiết', '29 > 42', '2023-11-01', 'img/anhgiayda/giay_Derby_tangchieucao_GCLA851-20-XA.jpg', 20, NULL, 2),
('giay2', '01da', 'Giày Derby tăng chiều cao GCLA851-20-XA', 30, '1590000 ', 'Nâu đỏ', 'LaForce', 'Giày da sang trọng lịch lãm ,tăng chiều cao phù với tất cả mọi người.', '29 > 42', '2023-11-03', 'img/anhgiayda/giay_Derby_tangchieucao_GCLA851-20-XA.jpg', 16, NULL, 6),
('gs1', '03sneaker', 'Converse unisex chuck 70 plus', 20, '2000000 ', 'trắng', 'Converse', 'Giầy với thiết kế vô cùng phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '29 > 42', '2023-11-06', 'img/anhgiaysneaker/converse-unisex-chuck-70-plus.jpg', 23, NULL, 19),
('gs10', '03sneaker', 'Converse chuck taylor all star 1970s white high trang', 100, '1450000', 'Trắng sữa', 'Converse', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '32 > 42', NULL, 'img/anhgiaysneaker/giay-converse-chuck-taylor-all-star-1970s-white-high-trang-co-cao-1.jpg', 20, NULL, 17),
('gs11', '03sneaker', 'Converse run star hike high white trang', 200, '2500000 ', 'Trắng', 'Converse', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '32 > 42', '2023-11-03', 'img/anhgiaysneaker/giay-converse-run-star-hike-high-white-trang-co-cao-4.jpg', 10, NULL, 33),
('gs12', '03sneaker', 'Converse run star hike low white trang', 200, '1000000 ', 'Trắng', 'Converse', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '32 > 42', '2023-11-02', 'img/anhgiaysneaker/giay-giay-converse-run-star-hike-low-white-trang-co-thap-12-1.jpg', 16, NULL, 68),
('gs13', '03sneaker', 'Jordan 1 retro high og palomino mens', 200, '2999000 ', 'Nâu đen', 'Jordan', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc Nâu đen.', '32 > 42', '2023-11-07', 'img/anhgiaysneaker/giay-jordan-1-retro-high-og-palomino-mens-dz5485-020.jpg', 10, NULL, 70),
('gs14', '03sneaker', 'Giầy jordan 1 paris', 25, '2500000 ', 'Trắng', 'Jordan', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '32 > 42', '2023-11-04', 'img/anhgiaysneaker/giay-jd1-paris.jpg', 20, NULL, 55),
('gs15', '03sneaker', 'Jordan 1 retro low og zion williamson voodoo', 10, '3500000 ', 'Nâu,xanh', 'Jordan', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc Nâu,xanh.', '32 > 42', '2023-11-02', 'img/anhgiaysneaker/giay-jordan-1-retro-low-og-zion-williamson-voodoo.jpg', 9, NULL, 30),
('gs16', '03sneaker', 'Louis vuitton lv trainer maxi trang', 10, '3500000 ', 'Trắng', 'Louis vuitton', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '32 > 42', '2023-10-03', 'img/anhgiaysneaker/giay-louis-vuitton-lv-trainer-maxi-trang.jpg', 16, NULL, 29),
('gs19', '03sneaker', 'Louis vuitton trainer 54 white red', 7, '4500000', 'Trắng đỏ', 'Louis vuitton', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng đỏ.', '32 > 42', '2023-11-01', 'img/anhgiaysneaker/giay-lv-trainer-54-white-red.jpg', 19, NULL, 10),
('gs2', '03sneaker', 'Adidas ultra boost 6 0 blue white', 120, '1299000 ', 'Xanh trắng', 'Adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '31 > 42', '2023-11-02', 'img/anhgiaysneaker/giay-adidas-ultra-boost-6-0-blue-white-rep-11-dep-chat-5.jpg', 11, NULL, 6),
('gs20', '03sneaker', 'Nike air jordan 1 high zoom racer blue like auth', 100, '3000000 ', 'Trắng xanh', 'Nike', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '32 > 42', '2023-11-01', 'img/anhgiaysneaker/giay-nike-air-jordan-1-high-zoom-racer-blue-like-auth.jpg', 15, NULL, 8),
('gs21', '03sneaker', 'Nike air jordan 1 low aluminum ice blue like auth', 20, '2000000', 'Xanh', 'Nike', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc xanh.', '32 > 42', '2023-11-01', 'img/anhgiaysneaker/giay-nike-air-jordan-1-low-aluminum-ice-blue-like-auth.jpg', 18, NULL, 38),
('gs22', '03sneaker', 'Nike air jordan 1 low gs shattered backboard like auth', 20, '1290000', 'Cam', 'Nike', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp,màu sắc cam.', '29 > 42', '2023-11-07', 'img/anhgiaysneaker/giay-nike-air-jordan-1-low-gs-shattered-backboard-like-auth.jpg', 16, NULL, 100),
('gs23', '03sneaker', 'Nike air jordan 1 low se reverse ice blue w like auth', 22, '2990000 ', 'xanh', 'Nike', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp,màu sắc xanh.', '31 > 42', '2023-11-03', 'img/anhgiaysneaker/giay-nike-air-jordan-1-low-se-reverse-ice-blue-w-like-auth.jpg', 10, NULL, 99),
('gs24', '03sneaker', 'Nike air jordan 1 low unity', 22, '2899000 ', 'Tím hồng', 'Nike', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp,màu sắc tím hồng.', '32 > 40', '2023-11-02', 'img/anhgiaysneaker/giay-nike-air-jordan-1-low-unity-dr8057-500-like-auth.jpg', 6, NULL, 6),
('gs25', '03sneaker', 'Nike air jordan 1 low white metallic gold cz4776 100 like auth', 4, '3990000', 'Trắng vàng', 'Nike', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp,màu sắc trắng.', '32 > 40', '0000-00-00', 'img/anhgiaysneaker/giay-nike-air-jordan-1-low-white-metallic-gold-cz4776-100-like-auth.jpg', 11, NULL, 33),
('gs26', '03sneaker', 'Nike air jordan 1 retro high bred toe like auth', 4, '2500000 ', 'Đỏ đen', 'Nike', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp,màu sắc dỏ đen.', '32 > 40', '2023-11-01', 'img/anhgiaysneaker/giay-nike-air-jordan-1-retro-high-bred-toe-like-auth.jpg', 12, NULL, 10),
('gs27', '03sneaker', 'Nike air jordan 1 retro high og dark mocha like auth', 5, '1200000 ', 'Xám đen', 'Nike', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp,màu sắc xám đen.', '32 > 40', '2023-11-03', 'img/anhgiaysneaker/giay-nike-air-jordan-1-retro-high-og-dark-mocha-like-auth.jpg', 13, NULL, 38),
('gs28', '03sneaker', 'Nike air jordan 1 retro low dior cn8608 002 like auth', 4, '1500000 ', 'Trắng xám', 'Nike', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp,màu sắc trắng xám.', '32 > 40', '2023-11-01', 'img/anhgiaysneaker/giay-nike-air-jordan-1-retro-low-dior-cn8608-002-like-auth.jpg', 16, NULL, 46),
('gs29', '03sneaker', 'Nike air jordan 1 x union retro high black toelike auth', 3, '3500000 ', 'Đỏ đen trắng', 'Nike', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp,màu sắc đỏ đen.', '32 > 40', '2023-11-07', 'img/anhgiaysneaker/giay-nike-air-jordan-1-x-union-retro-high-black-toe-like-auth.jpg', 20, NULL, 9),
('gs3', '03sneaker', 'Adidas ultra boost 20 dash grey', 200, '590000 ', 'Trắng', 'Adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '29 > 42', '2023-11-01', 'img/anhgiaysneaker/giay-adidas-ultra-boost-20-dash-grey-rep-11-dep-chat-1.jpg', 16, NULL, 32),
('gs30', '03sneaker', 'Nike air jordan 1 low cardinal red like auth', 5, '2300000 ', 'Đỏ', 'Nike', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp,màu sắc đỏ.', '31 > 39', '2023-11-02', 'img/anhgiaysneaker/giay-nike-jordan-1-low-cardinal-red-like-auth.jpg', 18, NULL, 13),
('gs31', '03sneaker', 'Giầy adidas ultra boost 6 0 blue white rep 11', 69, '966000', 'xanh', 'adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp,màu sắc đỏ.', '31-42', '2023-11-09', 'img/anhgiaysneaker/giay-adidas-ultra-boost-6-0-blue-white-rep-11-dep-chat-5.jpg', 50, 1, 16),
('gs32', '03sneaker', 'Giầy louis vuitton lv trainer maxi trang', 69, '1200000', 'trắng', 'adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '28-41', '2023-11-04', 'img/anhgiaysneaker/giay-louis-vuitton-lv-trainer-maxi-trang.jpg', 50, 2, 10),
('gs33', '03sneaker', 'Giầy lv trainer 54 damier ebene multi auth tuong.jpg', 200, '390000', 'nâu đen', 'adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .', '32-41', '2023-11-12', 'img/anhgiaysneaker/giay-lv-trainer-54-damier-ebene-multi-auth-tuong.jpg', 50, 2, 169),
('gs34', '03sneaker', 'Giầy lv trainer 54 signature white black 2023 ', 78, '890000', 'trắng đen', 'adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng đen.', '28-41', '2023-11-04', 'img/anhgiaysneaker/giay-lv-trainer-54-signature-white-black-2023-chuan-auth-9999.jpg', 20, 4, 36),
('gs35', '03sneaker', 'Giầy lv trainer 54 white red', 200, '390000', 'trắng đỏ', 'adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '32-41', '2023-11-12', 'img/anhgiaysneaker/giay-lv-trainer-54-white-red.jpg', 50, 2, 69),
('gs36', '03sneaker', 'Giầy mlb chunky liner mid monogram boston', 69, '890000', 'xanh', 'adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .', '28-41', '2023-11-08', 'img/anhgiaysneaker/giay-mlb-chunky-liner-mid-monogram-boston.jpg', 19, 2, 12),
('gs38', '03sneaker', 'Giầy lv trainer 54 trắng đen', 68, '890000', 'đen', 'adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng đen.', '31-42', '2023-11-02', 'img/anhgiaysneaker/lv-trainer-54-trang-den.jpg', 20, 2, 16),
('gs39', '03sneaker', 'Giầy lv trainer 54 signature green', 200, '390000', 'xanh lá', 'adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .', '32-41', '2023-11-12', 'img/anhgiaysneaker/lv-trainer-54-signature-green.jpg', 50, 4, 69),
('gs4', '03sneaker', 'Adidas ultra boost 60 triple black den full', 200, '1999000 ', 'Đen', 'Adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc đen.', '29 > 42', '2023-11-01', 'img/anhgiaysneaker/giay-adidas-ultra-boost-60-triple-black-den-full-1.jpg', 20, NULL, 76),
('gs40', '03sneaker', 'Giày lv trainer 54 new york navy', 99, '890000', 'xanh đen', 'adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc xanh đen.', '31-42', '2023-11-09', 'img/anhgiaysneaker/lv-trainer-54-new-york-navy.jpg', 19, 2, 36),
('gs41', '03sneaker', 'Giày sneaker lv x yayoi kusama', 200, '390000', 'trắng', 'adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '32-41', '2023-11-12', 'img/anhgiaysneaker/sneaker-lv-x-yayoi-kusama.jpg', 50, 2, 69),
('gs42', '03sneaker', 'Giầy vans caro slip on', 99, '890000', 'trắng đen', 'adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '30-41', '2023-11-02', 'img/anhgiaysneaker/vans-caro-slip-on.jpg', 19, 4, 10),
('gs43', '03sneaker', 'Giầy vans classic white ', 200, '390000', 'trắng', 'adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '32-41', '2023-11-12', 'img/anhgiaysneaker/vans-classic-white-full.jpg', 50, 2, 69),
('gs5', '03sneaker', 'Adidas ultra boost 60 triple black den', 140, '139000 ', 'Đen', 'Adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc đen.', '29 > 42', '2023-11-01', 'img/anhgiaysneaker/giay-adidas-ultra-boost-60-triple-black-den-full.jpg', 22, NULL, 100),
('gs6', '03sneaker', 'Adidas ultraboost 40 trắng', 234, '199999 ', 'Trắng', 'Adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng.', '31 > 41', '2023-11-03', 'img/anhgiaysneaker/giay-adidas-ultraboost-40-trang.jpg', 21, NULL, 99),
('gs7', '03sneaker', 'Adidas ultraboost 40 xam', 100, '2450000', 'Xám', 'Adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc xám.', '35 > 41', '2023-11-10', 'img/anhgiaysneaker/giay-adidas-ultraboost-40-xam-2.jpg', 10, NULL, 93),
('gs8', '03sneaker', 'Converse chuck taylor 1970 parchment low top', 31, '1200000 ', 'Trắng gạch đỏ', 'Converse', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc trắng gạch đỏ.', '32 > 42', '2023-11-01', 'img/anhgiaysneaker/giay-converse-chuck-taylor-1970-parchment-low-top-rep-1-1.jpg', 16, NULL, 48),
('gs9', '03sneaker', 'Converse chuck taylor all star 1970s', 198, '1450000 ', 'Đen', 'Converse', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .Màu sắc đen.', '32 > 42', '2023-07-05', 'img/anhgiaysneaker/giay-converse-chuck-taylor-all-star-1970s-hi-top-sieu-cap.jpg', 19, NULL, 66),
('gtt1', '02Thethao', 'Giầy adidas adizero base nam trắng đen', 90, '2500000', 'trắng đen', 'adidas', 'Giày adidas được thiết kế để mang lại sự thoải mái, chắc bền và phong cách  phù hợp với mọi yêu cầu và mọi địa hình. Các loại giày dành cho nam, nữ và trẻ em của chúng tôi luôn tính toán đến khía các cạnh thể thao và phong cách, từ giày đinh và giày sân cỏ dành riêng cho cầu thủ chuyên nghiệp, cho đến những đôi giày thông thường  hoàn hảo để hoàn thiện phong cách thời trang dạo phố của bạn.', '39>41', '2023-11-06', 'img/giaythethao/giay-adidas-adizero-base-nam-trang-den.jpg', 10, 1, 16),
('gtt10', '02Thethao', 'Giầy adidas terrex unity lea low nam đen', 99, '890000', 'đen', 'adidas', 'Kiểu dáng đẹp phong cách năng động ,chất liệu cao cấp .', '30>41', '2023-11-04', 'img/giaythethao/giay-adidas-terrex-unity-lea-low-nam-den.jpg', 9, 1, 16),
('gtt2', '02Thethao', 'Giầy adidas adizero base nam xám', 99, '899000', 'xám', 'adidas', 'Giày adidas được thiết kế để mang lại sự thoải mái, chắc bền và phong cách  phù hợp với mọi yêu cầu và mọi địa hình. Các loại giày dành cho nam, nữ và trẻ em của chúng tôi luôn tính toán đến khía các cạnh thể thao và phong cách, từ giày đinh và giày sân cỏ dành riêng cho cầu thủ chuyên nghiệp, cho đến những đôi giày thông thường  hoàn hảo để hoàn thiện phong cách thời trang dạo phố của bạn.', '31-42', '2023-11-08', 'img/giaythethao/giay-adidas-adizero-base-nam-xam.jpg', 10, 2, 12),
('gtt23', '02Thethao', 'Giầy adidas adizero rc 4 nam xám', 67, '1200000', 'xám', 'adidas', 'Giày adidas được thiết kế để mang lại sự thoải mái, chắc bền và phong cách  phù hợp với mọi yêu cầu và mọi địa hình. Các loại giày dành cho nam, nữ và trẻ em của chúng tôi luôn tính toán đến khía các cạnh thể thao và phong cách, từ giày đinh và giày sân cỏ dành riêng cho cầu thủ chuyên nghiệp, cho đến những đôi giày thông thường  hoàn hảo để hoàn thiện phong cách thời trang dạo phố của bạn.', '29>41', '2023-11-04', 'img/giaythethao/giay-adidas-adizero-rc-4-nam-xam.jpg', 16, 4, 13),
('gtt4', '02Thethao', 'Giầy adidas adizero rc 5 nam đen trắng', 199, '390000', 'đen trắng', 'adidas', 'Giày adidas được thiết kế để mang lại sự thoải mái, chắc bền và phong cách  phù hợp với mọi yêu cầu và mọi địa hình. Các loại giày dành cho nam, nữ và trẻ em của chúng tôi luôn tính toán đến khía các cạnh thể thao và phong cách, từ giày đinh và giày sân cỏ dành riêng cho cầu thủ chuyên nghiệp, cho đến những đôi giày thông thường  hoàn hảo để hoàn thiện phong cách thời trang dạo phố của bạn.', '31>42', '2023-11-12', 'img/giaythethao/giay-adidas-adizero-rc-4-nam-xam.jpg', 11, 1, 170),
('gtt5', '02Thethao', 'Giầy adidas corerunner nam đen navy', 78, '890000', 'đen navy', 'adidas', 'Giày adidas được thiết kế để mang lại sự thoải mái, chắc bền và phong cách  phù hợp với mọi yêu cầu và mọi địa hình. Các loại giày dành cho nam, nữ và trẻ em của chúng tôi luôn tính toán đến khía các cạnh thể thao và phong cách, từ giày đinh và giày sân cỏ dành riêng cho cầu thủ chuyên nghiệp, cho đến những đôi giày thông thường  hoàn hảo để hoàn thiện phong cách thời trang dạo phố của bạn.', '29>41', '2023-11-06', 'img/giaythethao/giay-adidas-corerunner-nam-den-navy.jpg', 10, 2, 15),
('gtt6', '02Thethao', 'Giầy adidas duramo speed nam đen', 68, '890000', 'đen', 'adidas', 'Giày adidas được thiết kế để mang lại sự thoải mái, chắc bền và phong cách  phù hợp với mọi yêu cầu và mọi địa hình. Các loại giày dành cho nam, nữ và trẻ em của chúng tôi luôn tính toán đến khía các cạnh thể thao và phong cách, từ giày đinh và giày sân cỏ dành riêng cho cầu thủ chuyên nghiệp, cho đến những đôi giày thông thường  hoàn hảo để hoàn thiện phong cách thời trang dạo phố của bạn.', '28>40', '2023-11-09', 'img/giaythethao/giay-adidas-duramo-speed-den.jpg', 16, 4, 16),
('gtt7', '02Thethao', 'Giầy adidas galaxy 6 nam đen trắng', 75, '2100000', 'đen trắng', 'adidas', 'Giày adidas được thiết kế để mang lại sự thoải mái, chắc bền và phong cách  phù hợp với mọi yêu cầu và mọi địa hình. Các loại giày dành cho nam, nữ và trẻ em của chúng tôi luôn tính toán đến khía các cạnh thể thao và phong cách, từ giày đinh và giày sân cỏ dành riêng cho cầu thủ chuyên nghiệp, cho đến những đôi giày thông thường  hoàn hảo để hoàn thiện phong cách thời trang dạo phố của bạn.', '30>41', '2023-11-02', 'img/giaythethao/giay-adidas-galaxy-6-nam-den-trang.jpg', 9, 1, 10),
('gtt8', '02Thethao', 'Giầy adidas runf alcon 3 nam trắng đen', 83, '290000', 'trắng đen', 'adidas', 'Giày adidas được thiết kế để mang lại sự thoải mái, chắc bền và phong cách  phù hợp với mọi yêu cầu và mọi địa hình. Các loại giày dành cho nam, nữ và trẻ em của chúng tôi luôn tính toán đến khía các cạnh thể thao và phong cách, từ giày đinh và giày sân cỏ dành riêng cho cầu thủ chuyên nghiệp, cho đến những đôi giày thông thường  hoàn hảo để hoàn thiện phong cách thời trang dạo phố của bạn.', '29>41', '2023-11-02', 'img/giaythethao/giay-adidas-runf-alcon-3-nam-trang-den.jpg', 10, 1, 16),
('gtt9', '02Thethao', 'Giầy adidas runf alcon 3 nam trắng đỏ', 100, '699000', 'trắng đỏ', 'adidas', 'Giày adidas được thiết kế để mang lại sự thoải mái, chắc bền và phong cách  phù hợp với mọi yêu cầu và mọi địa hình. Các loại giày dành cho nam, nữ và trẻ em của chúng tôi luôn tính toán đến khía các cạnh thể thao và phong cách, từ giày đinh và giày sân cỏ dành riêng cho cầu thủ chuyên nghiệp, cho đến những đôi giày thông thường  hoàn hảo để hoàn thiện phong cách thời trang dạo phố của bạn.', '28>40', '2023-11-08', 'img/giaythethao/giay-adidas-runf-alcon-3-nam-trang-do.jpg', 19, 1, 37);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `Makhach` int(10) NOT NULL,
  `Mataikhoan` int(10) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Sodt` varchar(10) NOT NULL,
  `Diachi` varchar(100) NOT NULL,
  `Email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`Makhach`, `Mataikhoan`, `Fullname`, `Sodt`, `Diachi`, `Email`) VALUES
(1, 1, 'Lê Văn Đông', '0334815123', 'Thiệu Quang,Thiệu Hóa ,Thanh Hóa', 'dong.@gmail.com'),
(2, 2, 'Lê Văn Đông', '0334815123', 'Ninh Bình', 'dong@gmail.com'),
(3, 3, 'Đông', '0334815124', 'Ninh Bình 3', 'cvp73598@nezid.com'),
(6, 4, 'hung', '0334815124', 'Ninh Bình', 'levandong.180202@gmail.com'),
(7, 40, 'Lê Văn Đông', '0334815212', 'Ninh Bình', 'dong@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khieunai`
--

CREATE TABLE `khieunai` (
  `Makn` int(11) NOT NULL,
  `Mataikhoan` int(11) DEFAULT NULL,
  `Hoten` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Ykien` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khieunai`
--

INSERT INTO `khieunai` (`Makn`, `Mataikhoan`, `Hoten`, `Email`, `Ykien`) VALUES
(1, NULL, 'Lê Văn Đông', 'dong@gmail.com', 'shop nên giao hàng nhanh hơn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaigiay`
--

CREATE TABLE `loaigiay` (
  `Maloaigiay` varchar(10) NOT NULL,
  `Tenloai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaigiay`
--

INSERT INTO `loaigiay` (`Maloaigiay`, `Tenloai`) VALUES
('01da', 'Giày da'),
('02Thethao', 'Thể thao'),
('03sneaker', 'Sneaker');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muahang`
--

CREATE TABLE `muahang` (
  `Madon` int(11) NOT NULL,
  `Mataikhoan` int(11) NOT NULL,
  `Magiay` varchar(10) NOT NULL,
  `Makhach` int(10) DEFAULT NULL,
  `Soluong` int(5) NOT NULL,
  `Size` varchar(8) DEFAULT NULL,
  `yeucau` varchar(50) DEFAULT NULL,
  `ptthanhtoan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `muahang`
--

INSERT INTO `muahang` (`Madon`, `Mataikhoan`, `Magiay`, `Makhach`, `Soluong`, `Size`, `yeucau`, `ptthanhtoan`) VALUES
(113, 3, 'Pk8', 3, 1, NULL, '', 'Thanh toán bằng tiền'),
(116, 3, 'gtt10', 3, 2, '38', 'ko', 'Thanh toán bằng tiền'),
(117, 3, 'gtt10', 3, 2, '38', 'ko', 'Thanh toán bằng tiền'),
(124, 3, 'gtt9', 3, 1, '37', 'ko', 'Thanh toán bằng tiền'),
(126, 4, 'gtt9', 6, 1, '38', 'ko', 'Thanh toán bằng tiền'),
(129, 3, 'gs31', 3, 1, '30', 'ko', 'Thanh toán bằng tiền');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ncc`
--

CREATE TABLE `ncc` (
  `Mancc` int(11) NOT NULL,
  `Tenncc` varchar(100) NOT NULL,
  `Diachincc` varchar(100) NOT NULL,
  `Sdtncc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ncc`
--

INSERT INTO `ncc` (`Mancc`, `Tenncc`, `Diachincc`, `Sdtncc`) VALUES
(1, 'Kho Giày Phố', 'Thành phố Hồ Chí Minh', '0987567897'),
(2, 'Công Ty TNHH Giày Nam Việt', 'Số D17/4A Đinh Đức Thiện, Ấp 4, Xã Bình Chánh, Huyện Bình Chánh, Tp. Hồ Chí Minh.', '(028)62685'),
(3, 'Hà Đông', 'Hà Nội', '0987865456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phukien`
--

CREATE TABLE `phukien` (
  `Magiay` varchar(11) NOT NULL,
  `Tengiay` varchar(100) NOT NULL,
  `Soluong` int(20) NOT NULL,
  `Dongia` int(30) NOT NULL,
  `Mau` varchar(60) DEFAULT NULL,
  `hinh` varchar(100) DEFAULT NULL,
  `Mancc` int(11) DEFAULT NULL,
  `Ngaynhap` date DEFAULT NULL,
  `daban` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phukien`
--

INSERT INTO `phukien` (`Magiay`, `Tengiay`, `Soluong`, `Dongia`, `Mau`, `hinh`, `Mancc`, `Ngaynhap`, `daban`) VALUES
('Pk1', 'Dây giày converse 1970s low grey chính hãng', 20, 120000, NULL, 'img/phukien/day-giay-adidas-adizero-cream-converse-1970s-low-chinh-hang-130cm-494x329.jpg', NULL, NULL, NULL),
('Pk10', 'Dây giày jordan 1s mint chính hãng', 17, 30000, NULL, 'img/phukien/day-giay-jordan-1s-mint-chinh-hang-130cm-494x329.jpg', NULL, NULL, NULL),
('Pk11', 'Dây giày jordan 1s, nike af1 light grey chính hãng', 16, 35000, NULL, 'img/phukien/day-giay-jordan-1s-nike-af1-light-grey-chinh-hang-130cm-494x329.jpg', NULL, NULL, NULL),
('Pk12', 'Dây giày jordan 1s orange Starfish chính hãng', 11, 30000, NULL, 'img/phukien/day-giay-jordan-1s-orange-starfish-chinh-hang-130cm-494x329.jpg', NULL, NULL, NULL),
('Pk13', 'Dây giày jordan 1s pine green low Chính Hãng', 13, 35000, NULL, 'img/phukien/day-giay-jordan-1s-pine-green-low-chinh-hang-130cm-494x329.jpg', NULL, NULL, NULL),
('Pk14', 'Dây giày adidas adizero cream, converse 1970s low chính hãng', 14, 30000, NULL, 'img/phukien/day-giay-nike-af1-shadow-jordan-1s-low-sweet-pink-chinh-hang-130cm-494x329.jpg', NULL, NULL, NULL),
('PK15', 'Dây giày tròn trắng sọc đen', 16, 35000, NULL, 'img/phukien/day-giay-tron-trang-soc-den-130cm-494x329.jpg', NULL, NULL, NULL),
('Pk16', 'Dây giày xám phản quang', 3, 45000, NULL, 'img/phukien/day-giay-xam-phan-quang-95cm-494x329.jpg', NULL, NULL, NULL),
('Pk17', 'Tất basic đen,trắng', 10, 36000, NULL, 'img/phukien/vo-basic-den-3-494x329.jpg', NULL, NULL, NULL),
('Pk18', 'Tất hoạ tiết', 15, 25000, NULL, 'img/phukien/vo-hoa-tiet-2-494x329.jpg', NULL, NULL, NULL),
('Pk19', 'Tất hoa vintage', 9, 30000, NULL, 'img/phukien/vo-hoa-vintage-494x329.jpg', NULL, NULL, NULL),
('Pk2', 'Dây giày adidas stan smith đen Chính Hãng', 12, 30000, NULL, 'img/phukien/day-giay-adidas-stan-smith-den-chinh-hang-130cm-494x329.jpg', NULL, NULL, NULL),
('Pk20', 'Tất nâu vintage', 18, 25000, NULL, 'img/phukien/vo-nau-vintage-494x329.jpg', NULL, NULL, NULL),
('Pk21', 'Tất nike driFit mid – đen', 6, 33000, NULL, 'img/phukien/vo-nike-drifit-mid-den-3-450x329.jpg', NULL, NULL, NULL),
('Pk22', 'Tất sup gót', 26, 30000, NULL, 'img/phukien/vo-sup-got-494x329.jpg', NULL, NULL, NULL),
('Pk23', 'Tất thỏ vintage', 33, 40000, NULL, 'img/phukien/vo-tho-vintage-450x329.jpg', NULL, NULL, NULL),
('Pk3', 'Dây giày jordan 1s, nike af1 light grey chính hãng', 12, 30000, NULL, 'img/phukien/day-giay-converse-1970s-low-grey-chinh-hang-130cm-494x329.jpg', NULL, NULL, NULL),
('Pk4', 'Dây giày đen phản quang', 20, 25000, NULL, 'img/phukien/day-giay-den-phan-quang-120cm-494x329.jpg', NULL, NULL, NULL),
('Pk5', 'Dây giày human race đen phản quang', 10, 36000, NULL, 'img/phukien/day-giay-eqt-den-phan-quang-125cm-494x329.jpg', NULL, NULL, NULL),
('Pk6', 'Dây giày EQT xám tròn phản quang', 12, 35000, NULL, 'img/phukien/day-giay-eqt-xam-tron-phan-quang-125cm-494x329.jpg', NULL, NULL, NULL),
('Pk7', 'Dây giày human race đen phản quang', 9, 40000, NULL, 'img/phukien/day-giay-human-race-den-phan-quang-140cm-494x329.jpg', NULL, NULL, NULL),
('Pk8', 'Dây giày jordan 1s, af1 grey chính hãng', 14, 30000, NULL, 'img/phukien/day-giay-jordan-1s-af1-grey-chinh-hang-130cm-494x329.jpg', NULL, NULL, NULL),
('Pk9', 'Dây giày jordan 1s, af1, vans brown chính hãng', 0, 45000, NULL, 'img/phukien/day-giay-jordan-1s-af1-vans-brown-chinh-hang-130cm-494x329.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rohang`
--

CREATE TABLE `rohang` (
  `Marohang` int(10) NOT NULL,
  `Mataikhoan` int(10) NOT NULL,
  `Magiay` varchar(10) NOT NULL,
  `Ngaymua` datetime(6) DEFAULT NULL,
  `Size` varchar(8) DEFAULT NULL,
  `Soluong` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rohang`
--

INSERT INTO `rohang` (`Marohang`, `Mataikhoan`, `Magiay`, `Ngaymua`, `Size`, `Soluong`) VALUES
(1, 3, 'gs9', NULL, '30', 1),
(3, 3, 'gs8', NULL, '31', 1),
(5, 3, 'gs7', NULL, '33', 1),
(8, 3, 'gs8', NULL, '40', 1),
(11, 2, 'gtt8', NULL, '', 1),
(12, 2, 'gtt8', NULL, '30', 1),
(19, 3, 'Pk13', NULL, NULL, 1),
(20, 3, 'Pk13', NULL, NULL, 1),
(21, 3, 'gtt10', NULL, '38', 1),
(22, 3, 'Pk8', NULL, NULL, 1),
(23, 3, 'gtt8', NULL, '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Mataikhoan` int(11) NOT NULL,
  `Tentaikhoan` varchar(50) NOT NULL,
  `Sodt` varchar(11) DEFAULT NULL,
  `Matkhau` varchar(100) NOT NULL,
  `Phanquyen` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`Mataikhoan`, `Tentaikhoan`, `Sodt`, `Matkhau`, `Phanquyen`) VALUES
(1, 'Admin', NULL, '123456', b'1'),
(2, 'ledong', NULL, '12345678', b'0'),
(3, 'dong', NULL, '123456', b'0'),
(4, 'hung', NULL, '123456', b'0'),
(39, 'hung2', '0334815210', '123456', NULL),
(40, 'dong3', '0334815212', '123456', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `Mathongbao` int(10) NOT NULL,
  `Mataikhoan` int(10) NOT NULL,
  `Marohang` int(10) DEFAULT NULL,
  `Noidung` varchar(100) NOT NULL,
  `Madon` int(11) DEFAULT NULL,
  `Madonnhan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`Mathongbao`, `Mataikhoan`, `Marohang`, `Noidung`, `Madon`, `Madonnhan`) VALUES
(37, 2, NULL, 'Đã xác nhận đơn hàng', 105, NULL),
(38, 2, NULL, 'Đã xác nhận đơn hàng', 106, NULL),
(39, 2, NULL, 'Đã xác nhận đơn hàng', 107, NULL),
(40, 2, NULL, 'Đã xác nhận đơn hàng', 108, NULL),
(45, 3, NULL, 'Đã xác nhận đơn hàng', 114, NULL),
(47, 4, NULL, 'Đã xác nhận đơn hàng', 123, NULL),
(48, 4, NULL, 'Đã xác nhận đơn hàng', 127, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinnhap`
--

CREATE TABLE `thongtinnhap` (
  `Manhap` int(11) NOT NULL,
  `Magiay` varchar(10) NOT NULL,
  `Ngaynhap` date DEFAULT NULL,
  `Mancc` int(11) DEFAULT NULL,
  `Soluong` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinnhap`
--

INSERT INTO `thongtinnhap` (`Manhap`, `Magiay`, `Ngaynhap`, `Mancc`, `Soluong`) VALUES
(10, '1', '0000-00-00', 1, 2),
(12, '1', '0000-00-00', 1, 2),
(13, '1', '0000-00-00', 1, 1),
(14, '1', '0000-00-00', 1, 22);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dongiao`
--
ALTER TABLE `dongiao`
  ADD PRIMARY KEY (`Madonnhan`);

--
-- Chỉ mục cho bảng `giay`
--
ALTER TABLE `giay`
  ADD PRIMARY KEY (`Magiay`),
  ADD KEY `giaysangloaigiay` (`Maloaigiay`),
  ADD KEY `Mancc` (`Mancc`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Makhach`),
  ADD KEY `khachhang sang taikhoan` (`Mataikhoan`);

--
-- Chỉ mục cho bảng `khieunai`
--
ALTER TABLE `khieunai`
  ADD PRIMARY KEY (`Makn`),
  ADD KEY `Mataikhoan` (`Mataikhoan`);

--
-- Chỉ mục cho bảng `loaigiay`
--
ALTER TABLE `loaigiay`
  ADD PRIMARY KEY (`Maloaigiay`);

--
-- Chỉ mục cho bảng `muahang`
--
ALTER TABLE `muahang`
  ADD PRIMARY KEY (`Madon`),
  ADD KEY `muahang_Taikhoan` (`Mataikhoan`),
  ADD KEY `Muahang_khachhang` (`Makhach`),
  ADD KEY `Muahang_giay` (`Magiay`);

--
-- Chỉ mục cho bảng `ncc`
--
ALTER TABLE `ncc`
  ADD PRIMARY KEY (`Mancc`);

--
-- Chỉ mục cho bảng `phukien`
--
ALTER TABLE `phukien`
  ADD PRIMARY KEY (`Magiay`),
  ADD KEY `Mancc` (`Mancc`);

--
-- Chỉ mục cho bảng `rohang`
--
ALTER TABLE `rohang`
  ADD PRIMARY KEY (`Marohang`),
  ADD KEY `rohang sang giay` (`Magiay`),
  ADD KEY `rohang sang taikhoan` (`Mataikhoan`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Mataikhoan`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`Mathongbao`),
  ADD KEY `thongbao sang ro hang` (`Marohang`),
  ADD KEY `Madon` (`Madon`),
  ADD KEY `Madonnhan` (`Madonnhan`),
  ADD KEY `Mataikhoan` (`Mataikhoan`);

--
-- Chỉ mục cho bảng `thongtinnhap`
--
ALTER TABLE `thongtinnhap`
  ADD PRIMARY KEY (`Manhap`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dongiao`
--
ALTER TABLE `dongiao`
  MODIFY `Madonnhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `Makhach` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `khieunai`
--
ALTER TABLE `khieunai`
  MODIFY `Makn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `muahang`
--
ALTER TABLE `muahang`
  MODIFY `Madon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `ncc`
--
ALTER TABLE `ncc`
  MODIFY `Mancc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `rohang`
--
ALTER TABLE `rohang`
  MODIFY `Marohang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `Mataikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `Mathongbao` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `thongtinnhap`
--
ALTER TABLE `thongtinnhap`
  MODIFY `Manhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giay`
--
ALTER TABLE `giay`
  ADD CONSTRAINT `giaysangloaigiay` FOREIGN KEY (`Maloaigiay`) REFERENCES `loaigiay` (`Maloaigiay`);

--
-- Các ràng buộc cho bảng `muahang`
--
ALTER TABLE `muahang`
  ADD CONSTRAINT `Muahang_khachhang` FOREIGN KEY (`Makhach`) REFERENCES `khachhang` (`Makhach`);

--
-- Các ràng buộc cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbao_ibfk_2` FOREIGN KEY (`Madonnhan`) REFERENCES `dongiao` (`Madonnhan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
