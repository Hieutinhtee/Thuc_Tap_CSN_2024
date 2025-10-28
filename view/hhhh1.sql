-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2025 lúc 12:28 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hhhh1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bacluong`
--

CREATE TABLE `bacluong` (
  `MABACLUONG` int(11) NOT NULL,
  `LUONGCOBAN` int(11) NOT NULL,
  `PHUCAP` int(11) NOT NULL,
  `TENBACLUONG` varchar(45) NOT NULL,
  `THAMNIEN` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bacluong`
--

INSERT INTO `bacluong` (`MABACLUONG`, `LUONGCOBAN`, `PHUCAP`, `TENBACLUONG`, `THAMNIEN`) VALUES
(1, 1800000, 200000, 'Lương bậc 1', '0-1 năm'),
(5, 2100000, 400000, 'Lương bậc 2', '1-3 năm'),
(6, 2500000, 700000, 'Lương bậc 3', '3-5 năm'),
(8, 2700000, 1100000, 'Lương bậc 4', '5-10 năm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangcap`
--

CREATE TABLE `bangcap` (
  `MABANGCAP` int(11) NOT NULL,
  `TENBANGCAP` varchar(100) NOT NULL,
  `MOTABANGCAP` longtext DEFAULT NULL,
  `NGAYTAO` varchar(45) NOT NULL,
  `HESOLUONG` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bangcap`
--

INSERT INTO `bangcap` (`MABANGCAP`, `TENBANGCAP`, `MOTABANGCAP`, `NGAYTAO`, `HESOLUONG`) VALUES
(1, 'Cử nhân', 'Trình Đại học', '28-12-2024', 2.34),
(13, 'Thạc sĩ', 'Bằng thạc sĩ', '28-12-2024', 4),
(14, 'Tiến sĩ', 'Cấp bậc trên thạc sĩ', '28-12-2024', 4.4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chamcong`
--

CREATE TABLE `chamcong` (
  `MACHAMCONG` int(11) NOT NULL,
  `MANV` int(11) NOT NULL,
  `SOGIOLAM` int(11) DEFAULT 0,
  `SOGIOTANGCA` int(11) DEFAULT 0,
  `TIENVIPHAM` int(11) DEFAULT 0,
  `THUONG` int(11) DEFAULT 0,
  `THOIGIAN` varchar(100) NOT NULL,
  `TENNV` varchar(200) NOT NULL,
  `THUCLINH` double DEFAULT 0,
  `PHUCAP` int(11) DEFAULT 0,
  `HESOLUONG` float DEFAULT NULL,
  `LUONGCOBAN` int(11) DEFAULT NULL,
  `PHUCAPCONGTAC` int(11) DEFAULT NULL,
  `LUONGCOSO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chamcong`
--

INSERT INTO `chamcong` (`MACHAMCONG`, `MANV`, `SOGIOLAM`, `SOGIOTANGCA`, `TIENVIPHAM`, `THUONG`, `THOIGIAN`, `TENNV`, `THUCLINH`, `PHUCAP`, `HESOLUONG`, `LUONGCOBAN`, `PHUCAPCONGTAC`, `LUONGCOSO`) VALUES
(15, 2024027, 28, 15, 0, 0, '2024-12', 'Nguyễn Văn E', 16948317.307692, 1500000, 5.3, 567308, 0, 2500000),
(16, 2024018, 26, 21, 0, 0, '2024-12', 'Đặng Minh Hiếu 2', 15299663.461538, 1200000, 5.7, 506538, 800000, 2100000),
(17, 2024038, 24, 15, 600000, 100000, '2024-12', 'Nguyễn Thị Mùi', 7015692.3076923, 1000000, 3.64, 290462, 0, 1800000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MACHUCVU` int(11) NOT NULL,
  `TENCHUCVU` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MOTACHUCVU` longtext DEFAULT NULL,
  `NGAYTAOCHUCVU` varchar(45) NOT NULL,
  `PHUCAP` int(11) DEFAULT NULL,
  `HESOLUONG` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MACHUCVU`, `TENCHUCVU`, `MOTACHUCVU`, `NGAYTAOCHUCVU`, `PHUCAP`, `HESOLUONG`) VALUES
(18, 'Phó giám đốc', 'Uy tín', '29-12-2024', 1700000, 3.9),
(20, 'Tổng giám đốc', 'Tổng giám đốc điều hành toàn công ty ', '29-12-2024', 2100000, 4.7),
(34, 'Trưởng phòng', 'Trưởng phòng, chịu trách nhiệm quản lý một phòng ban nhất định', '29-12-2024', 1300000, 3.3),
(35, 'Nhân viên', 'Nhân viên ưu tú\r\n', '29-12-2024', 800000, 1.3),
(38, 'Phó phòng', 'Phó phòng dưới quyền trưởng phòng chịu trách nhiệm quản lý', '29-12-2024', 1000000, 2.5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congtac`
--

CREATE TABLE `congtac` (
  `MACONGTAC` int(11) NOT NULL,
  `MANV` int(11) NOT NULL,
  `TENNV` varchar(100) NOT NULL,
  `NGAYBATDAU` varchar(45) NOT NULL,
  `NGAYKETTHUC` varchar(45) NOT NULL,
  `DIADIEM` varchar(200) NOT NULL,
  `MUCDICH` longtext NOT NULL,
  `HOTRO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `congtac`
--

INSERT INTO `congtac` (`MACONGTAC`, `MANV`, `TENNV`, `NGAYBATDAU`, `NGAYKETTHUC`, `DIADIEM`, `MUCDICH`, `HOTRO`) VALUES
(3, 2024019, 'Nguyễn Văn F', '2024-12-01', '2024-12-27', 'Phú Quốc', 'Học tập', 200000),
(4, 2024032, 'Nguyễn Mạnh Hiệp', '2024-12-01', '2025-01-01', 'Hà Nội', 'Sửa chữa', 400000),
(5, 2024018, 'Đặng Minh Hiếu 2', '2024-12-26', '2025-01-01', 'Haui', 'Học tập', 200000),
(6, 2024018, 'Đặng Minh Hiếu 2', '2024-12-17', '2024-12-17', 'Hà Nội', 'Xây dựng sản phẩm mới', 600000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `MADANHGIA` int(11) NOT NULL,
  `LYDO` longtext NOT NULL,
  `LOAIDANHGIA` varchar(50) NOT NULL,
  `SOTIEN` int(11) NOT NULL,
  `THOIGIAN` varchar(45) NOT NULL,
  `MANV` int(11) NOT NULL,
  `TENNV` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`MADANHGIA`, `LYDO`, `LOAIDANHGIA`, `SOTIEN`, `THOIGIAN`, `MANV`, `TENNV`) VALUES
(1, 'Đi muộn 20p', 'Vi phạm', 100000, '2024-12-18', 2024038, 'Nguyễn Thị Mùi'),
(2, 'Đề xuất sáng kiến cải tiến thiết kế E300.1', 'Khen thưởng', 1000000, '2024-12-20', 2024032, 'Nguyễn Mạnh Hiệp'),
(4, 'test', 'Vi phạm', 500000, '2024-12-13', 2024038, 'Nguyễn Thị Mùi'),
(5, 'test', 'Khen thưởng', 100000, '2024-12-24', 2024038, 'Nguyễn Thị Mùi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `MAHOPDONG` int(11) NOT NULL,
  `TENHOPDONG` varchar(45) NOT NULL,
  `MOTAHOPDONG` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kiennghi`
--

CREATE TABLE `kiennghi` (
  `MAKIENNGHI` int(11) NOT NULL,
  `MANV` int(11) NOT NULL,
  `TENNV` varchar(255) NOT NULL,
  `NOIDUNG` longtext NOT NULL,
  `TIEUDE` varchar(200) NOT NULL,
  `NGAYTAO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `kiennghi`
--

INSERT INTO `kiennghi` (`MAKIENNGHI`, `MANV`, `TENNV`, `NOIDUNG`, `TIEUDE`, `NGAYTAO`) VALUES
(1, 2024018, 'Đặng Minh Hiếu 2', 'Để tiện nhu cầu giải khát nhân viên cũng như thêm một nguồn cung nhỏ cho quỹ công ty', 'Thêm cây bán nước tự động', '29-12-2024'),
(2, 2024018, 'Đặng Minh Hiếu 2', 'Nghiệp vụ abc có thể hoàn thành và cải tiến như sau: xyzxyz', 'Đề xuất sáng kiến kinh nghiệm', '29-12-2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nghiphep`
--

CREATE TABLE `nghiphep` (
  `MANGHIPHEP` int(11) NOT NULL,
  `MANHANVIEN` int(11) NOT NULL,
  `NGAYBATDAUNGHI` varchar(45) NOT NULL,
  `NGAYDILAMLAI` varchar(45) NOT NULL,
  `LYDO` longtext NOT NULL,
  `PHEDUYET` int(11) NOT NULL DEFAULT 0,
  `TENNV` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nghiphep`
--

INSERT INTO `nghiphep` (`MANGHIPHEP`, `MANHANVIEN`, `NGAYBATDAUNGHI`, `NGAYDILAMLAI`, `LYDO`, `PHEDUYET`, `TENNV`) VALUES
(1, 2024018, '2024-12-01', '2024-12-12', 'Lên Hà Nội bế cháu', 1, 'Đặng Minh Hiếu 2'),
(2, 2024018, '2024-12-01', '2024-12-19', 'đi chill thôi, làm làm gì', 2, 'Đặng Minh Hiếu 2'),
(3, 2024018, '2024-12-01', '2024-12-28', 'test thử cái đơn nghỉ phép', 1, 'Đặng Minh Hiếu 2'),
(4, 2024031, '2024-12-01', '2024-12-28', 'test toast', 2, 'Nguyễn Thị A'),
(5, 2024018, '2024-12-06', '2024-12-08', 'Gia đình có việc bận', 1, 'Đặng Minh Hiếu 2'),
(6, 2024018, '2024-12-07', '2024-12-09', 'Trùng lịch công tác', 1, 'Đặng Minh Hiếu 2'),
(7, 2024018, '2024-12-01', '2024-12-29', 'xin nghỉ đi chơi', 0, 'Đặng Minh Hiếu 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MANV` int(11) NOT NULL,
  `TENNV` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `GIOITINH` varchar(5) NOT NULL,
  `NGAYSINH` varchar(15) NOT NULL,
  `DIACHI` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SDT` varchar(255) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NGAYVAOLAM` varchar(15) NOT NULL,
  `MAPHONGBAN` int(11) DEFAULT NULL,
  `CMND` varchar(200) NOT NULL,
  `BANGCAP` varchar(45) NOT NULL,
  `QUYENHAN` varchar(45) DEFAULT NULL,
  `TENTAIKHOAN` varchar(45) DEFAULT NULL,
  `MATKHAU` longtext DEFAULT NULL,
  `BACLUONG` varchar(60) DEFAULT NULL,
  `MAHOPDONG` int(11) DEFAULT NULL,
  `CHUCVU` varchar(45) DEFAULT NULL,
  `ANHNV` varchar(255) NOT NULL DEFAULT 'profile.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `TENNV`, `GIOITINH`, `NGAYSINH`, `DIACHI`, `SDT`, `EMAIL`, `NGAYVAOLAM`, `MAPHONGBAN`, `CMND`, `BANGCAP`, `QUYENHAN`, `TENTAIKHOAN`, `MATKHAU`, `BACLUONG`, `MAHOPDONG`, `CHUCVU`, `ANHNV`) VALUES
(2024018, 'Đặng Minh Hiếu 2', 'Nữ', '2024-11-01', 'Thanh Trì, Hà Nội', '0987654321', 'minh05@gmail.com', '2024-11-28', 2, '3222222222221', 'Tiến sĩ', 'Nhân viên', 'nhanvien', '$2y$10$ExhjEfU03Pv3VwHYXjf7ZOI.1SbIA/qeO0dM.T35f5LiQFORwaMe6', 'Lương bậc 2', NULL, 'Nhân viên', '2024018676bc8007558a7.97595067.jpg'),
(2024024, 'Nguyễn Văn C', 'Nam', '2024-12-01', 'Thanh Trì, Hà Nội 4', '000000004', 'minh04@gmail.com', '2024-12-31', 2, '000000000002', 'Cử nhân', 'Nhân viên', '2024024', '$2y$10$hYq85uq2uqx9M0P8vIjBtuy/8Yfxpj1itt.W0FjY18Nj2C1Dygv5G', 'Lương bậc 2', NULL, 'Trưởng phòng', '2024024676bc818b18972.72374337.jpg'),
(2024027, 'Nguyễn Văn E', 'Nữ', '2024-12-06', 'Nam Từ Liêm, Hà Nội', '0987654321', '035vane@gmail.com', '2024-12-28', 1, '2222222222221', 'Thạc sĩ', '', NULL, NULL, 'Lương bậc 3', NULL, 'Nhân viên', '2024027676bc9cd40d436.41842814.jpg'),
(2024028, 'Nguyễn Văn A', 'Nữ', '2024-12-01', 'Thanh Trì, Hà Nội 1', '0987654321', 'minh01@gmail.com', '2024-12-29', 1, '000000000001', 'Cử nhân', 'Nhân viên', '2024028', '$2y$10$E5vdcaOQIbxkwicrVlL03uAQv2d.g/cHLQGXDwlHnwqAw7td6Sa2i', 'Lương bậc 4', NULL, 'Trưởng phòng', '2024028676f565d5ef276.66963278.jpg'),
(2024029, 'Nguyễn Thị A', 'Nữ', '2024-12-01', 'Thanh Trì, Hà Nội 4', '0987654321', 'czxczxc@gmail.com', '2024-12-29', 2, '000000000001', 'Thạc sĩ', 'Nhân viên', NULL, NULL, 'Lương bậc 1', NULL, 'Nhân viên', '2024029676bc9f7e5aa36.86831825.jpg'),
(2024030, 'Nguyễn Thị B', 'Nam', '2024-12-01', 'Sóc Sơn 0', '0987654321', 'minh0xoapb@gmail.com', '2024-12-28', 17, '2222222222221', 'Cử nhân', 'Nhân viên', NULL, NULL, 'Lương bậc 2', NULL, 'Trưởng phòng', '2024030676bca0857bbb5.14449726.jpg'),
(2024032, 'Nguyễn Mạnh Hiệp', 'Nam', '2004-12-06', 'Hà Nội', '0395093922', 'ngmanhhiep2004@gmail.com', '2009-12-22', 1, '1212457781814', 'Thạc sĩ', NULL, NULL, NULL, 'Lương bậc 2', NULL, 'Nhân viên', '2024032676bca1d31e5c9.33565413.jpg'),
(2024036, 'Nguyễn Văn F', 'Nam', '2024-12-01', '1', '1', '1', '2024-12-01', 17, '1', 'Tiến sĩ', 'Quản trị viên', 'admin', '$2y$10$1E56tMcl//.gL9w6QD2Z2.Jdqh8mWLDnCYHZygcvGxSM6WTvtsifq', 'Lương bậc 3', NULL, 'admin', '2024033676b5a1e393fe1.69360163.jpg'),
(2024038, 'Nguyễn Thị Mùi', 'Nữ', '2024-12-06', 'Kim Trì, Đồng Thau', '0985432611', 'gheeelego@gmail.com', '2024-12-29', NULL, '035206007959', 'Cử nhân', NULL, NULL, NULL, 'Lương bậc 1', NULL, 'Nhân viên', '20240376770970db0c1c0.20034078.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `MAPHONGBAN` int(11) NOT NULL,
  `TENPHONGBAN` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MOTAPHONGBAN` mediumtext DEFAULT NULL,
  `MATRUONGPHONG` varchar(45) NOT NULL,
  `TENTRUONGPHONG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`MAPHONGBAN`, `TENPHONGBAN`, `MOTAPHONGBAN`, `MATRUONGPHONG`, `TENTRUONGPHONG`) VALUES
(1, 'Phòng tài chính', 'Phòng tài chính ghi nhận các giao dịch tài chính phát sinh trong doanh nghiệp và tiến hành lập báo cáo tài chính tổng hợp cùng các báo cáo chi tiết về thu nhập, bảng cân đối kế toán, báo cáo lưu chuyển tiền tệ theo định kỳ, thường là hàng tháng', '2024028', 'Nguyễn Văn A'),
(2, 'Phòng kinh doanh', 'Phòng kinh doanh chịu trách nhiệm quản lý và thực hiện các hoạt động liên quan đến việc tạo ra doanh số bán hàng và lợi nhuận. Phòng kinh doanh thường tham gia vào việc xây dựng chiến lược kinh doanh, chiến lược sản phẩm, chiến lược Marketing, quản lý mối quan hệ với khách ', '2024024', 'Nguyễn Văn C'),
(17, 'Phòng thiết kế', 'Phòng thiết kế giám sát các dự án thiết kế và sáng tạo khác nhau của công ty. Các thành viên thuộc phòng thiết kế phối hợp công việc với nhau để hình ảnh hóa các đối tượng trước khi đưa vào sản xuất hay thi công.', '2024030', 'Nguyễn Thị B');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bacluong`
--
ALTER TABLE `bacluong`
  ADD PRIMARY KEY (`MABACLUONG`);

--
-- Chỉ mục cho bảng `bangcap`
--
ALTER TABLE `bangcap`
  ADD PRIMARY KEY (`MABANGCAP`);

--
-- Chỉ mục cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  ADD PRIMARY KEY (`MACHAMCONG`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MACHUCVU`);

--
-- Chỉ mục cho bảng `congtac`
--
ALTER TABLE `congtac`
  ADD PRIMARY KEY (`MACONGTAC`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`MADANHGIA`);

--
-- Chỉ mục cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`MAHOPDONG`);

--
-- Chỉ mục cho bảng `kiennghi`
--
ALTER TABLE `kiennghi`
  ADD PRIMARY KEY (`MAKIENNGHI`);

--
-- Chỉ mục cho bảng `nghiphep`
--
ALTER TABLE `nghiphep`
  ADD PRIMARY KEY (`MANGHIPHEP`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`MAPHONGBAN`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bacluong`
--
ALTER TABLE `bacluong`
  MODIFY `MABACLUONG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `bangcap`
--
ALTER TABLE `bangcap`
  MODIFY `MABANGCAP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  MODIFY `MACHAMCONG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `MACHUCVU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `congtac`
--
ALTER TABLE `congtac`
  MODIFY `MACONGTAC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `MADANHGIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `MAHOPDONG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `kiennghi`
--
ALTER TABLE `kiennghi`
  MODIFY `MAKIENNGHI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nghiphep`
--
ALTER TABLE `nghiphep`
  MODIFY `MANGHIPHEP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MANV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2024040;

--
-- AUTO_INCREMENT cho bảng `phongban`
--
ALTER TABLE `phongban`
  MODIFY `MAPHONGBAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
