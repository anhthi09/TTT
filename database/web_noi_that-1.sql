-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2020 lúc 06:07 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_noi_that-1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `account` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `status` tinytext DEFAULT '1',
  `level` tinytext DEFAULT '1',
  `avatar` char(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `address`, `email`, `account`, `password`, `phone`, `status`, `level`, `avatar`, `created_at`, `updated_at`) VALUES
(219, 'Mai', 'quan Cam', 'admin@gmail.com', 'admin1', '12345678', '0123456789', '1', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `images` char(50) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinyint(100) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'alolo', NULL, NULL, NULL, 0, 0, '2020-09-16 11:25:21', '2020-09-27 04:51:45'),
(2, 'Phòng Ngủ', NULL, NULL, NULL, 0, 0, '2020-09-16 11:25:21', '2020-09-16 11:25:21'),
(4, 'Đồ Trang Trí', NULL, NULL, NULL, 0, 0, '2020-09-16 11:25:54', '2020-09-16 11:25:54'),
(5, 'Tranh Nghệ Thuật', NULL, NULL, NULL, 0, 0, '2020-09-16 11:26:34', '2020-09-16 11:26:34'),
(8, 'aaâ', NULL, NULL, NULL, 0, 0, '2020-09-27 04:52:22', '2020-09-27 04:53:32'),
(9, 'Phongkhach', NULL, NULL, NULL, 0, 0, '2020-09-28 10:53:03', '2020-09-28 10:53:49'),
(11, 'phòng khách', NULL, NULL, NULL, 0, 0, '2020-10-01 04:09:06', '2020-10-01 04:09:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `transaction_id` int(30) DEFAULT NULL,
  `product_id` int(30) DEFAULT NULL,
  `soluong` int(100) DEFAULT NULL,
  `gia` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `soluong`, `gia`, `created_at`) VALUES
(5681, 5708, 2211, 1, 7000000, '2020-09-29 10:16:04'),
(5684, 5710, 1122, 2, 6000000, '2020-10-01 04:58:59'),
(5686, 5711, 1122, 2, 6000000, '2020-10-01 04:59:35'),
(5687, 5711, 1132, 4, 40000000, '2020-10-01 04:59:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `soluong` int(100) NOT NULL DEFAULT 1,
  `gia` int(100) DEFAULT NULL,
  `avatar` char(50) DEFAULT NULL,
  `category` int(50) NOT NULL,
  `type` int(100) NOT NULL,
  `content` text DEFAULT NULL,
  `head` int(11) NOT NULL DEFAULT 0,
  `view` int(11) DEFAULT 0,
  `hot` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `soluong`, `gia`, `avatar`, `category`, `type`, `content`, `head`, `view`, `hot`, `created_at`, `updated_at`) VALUES
(1121, 'Tủ Cổ Điển', NULL, 100, 9000000, NULL, 1, 12, 'Sơn bán bóng có keo\r\n2 ngăn kéo\r\nBàn tay đã hoàn thành', 0, 0, 0, '2020-09-16 11:43:09', '2020-09-16 11:43:09'),
(1122, 'Tủ TALA - Bạc', NULL, 100, 6000000, NULL, 1, 12, 'Phong cách ở bên ngoài và thực tế ở bên trong, bảng điều khiển này có ngăn kéo để lưu trữ cũng như một kệ cố định phía sau hai cánh cửa tủ.\r\nSự kết hợp của các tấm gương và trang trí màu đen tạo ra một cái nhìn sang trọng.\r\nCánh cửa như pha lê kéo thêm sự lấp lánh cho mảnh nhấn rạng rỡ này.\r\nXây dựng: MDF cung cấp một khung mạnh mẽ, ổn định cho các điểm nhấn kính nhân đôi.', 0, 0, 0, '2020-09-16 11:43:09', '2020-09-16 11:43:09'),
(1131, 'Bàn cà phê Walsh', NULL, 100, 11000000, NULL, 1, 13, 'Mặt bàn bằng kính cường lực có góc xiên một inch và tạo cảm giác thoáng đãng.\r\nChân cong làm tăng thiết kế tinh xảo của chiếc bàn.\r\nBánh xe di động cho phép bạn linh hoạt để di chuyển bàn nơi bạn cần.\r\nPucks thép không gỉ an toàn chân đến cơ sở.\r\nGỗ cứng cáp tạo thành nền tảng của bộ sưu tập thanh lịch này.', 0, 0, 0, '2020-09-16 11:47:49', '2020-09-16 11:47:49'),
(1132, 'Bàn cà phê Tenterden', NULL, 100, 40000000, NULL, 1, 13, 'Chân thép chải đan xen và kết thúc trên tấm đế màu đen.\r\nKính cường lực đứng đầu bàn.\r\nHiện đại hóa không gian của bạn với sáng tạo kim loại và thủy tinh này.', 2020, 0, 0, '0000-00-00 00:00:00', '2020-09-16 11:47:49'),
(1141, 'Ghế Lười Thư Giãn ZT5', NULL, 100, 6000000, NULL, 1, 14, 'Ghế sofa thư giãn đẹp giá rẻ thiết kế hiện đại, tính năng ưu việt mang tới một không gian mới cho gia đình bạn, bảo hành 3 năm, sản phẩm mang thương hiệu zSOFA.vn với uy tín chúng tôi có được từ khách hàng.\r\nChúng tôi sẽ mang lại sự hài lòng nhất đến quý khách hàng sản phẩm đến dịch vụ.\r\nSofa thư giãn ZT05 kích thước 180x70cm', 0, 0, 0, '2020-09-16 11:52:43', '2020-09-16 11:52:43'),
(1142, 'Ghế Lười Home Dream Sofa Corner Canvas Vàng', NULL, 100, 2000000, NULL, 1, 14, 'Sofa Chair Ticket có thành phần gồm vỏ chất liệu sử dụng trong nhà, bên trong chứa hạt xốp mềm mại, có thể tháo rời khi vệ sinh.\r\nTicket được sử dụng cho chiếc ghế Sofa Chair với tính năng mềm mại, rút mồ hôi, sử dụng được trong nhà, không bám bụi.\r\nChất liệu an toàn tuyệt đối với cả trẻ em.\r\nChất liệu nhẹ, thoáng mát, dễ vệ sinh, thích hợp khí hậu nhiệt đới.\r\nSofa Chair thiết kế như một chiếc sofa đơn, tạo cảm giác mềm mại, thư giãn khi ngồi; có thể dễ dàng di chuyển ở mọi gốc.\r\nChiếc ghế thường dùng trong nhà thư giãn cho gia đình , cho các quán cafe hoặc trong nội thất.\r\nNgoài tính năng thư giãn, chống mỏi sống lưng người dùng còn có thể sử dụng trang trí góc đọc sách, góc uống trà, trang trí nội thất…', 0, 0, 0, '2020-09-16 11:52:43', '2020-09-16 11:52:43'),
(2211, 'Giường Tara - Màu Be', NULL, 100, 7000000, NULL, 2, 21, 'Ghế bọc vải lanh mang lại sự thoải mái quanh năm cho chiếc giường êm ái này.\r\nCác đầu giường đệm, nút chần là thoải mái và thiết thực như nó là hấp dẫn.\r\nChân gỗ cứng châu Á đen thêm một nét hiện đại làm cho vải trông hấp dẫn hơn.\r\nTông màu trung tính mở ra khả năng lựa chọn màu sắc và hoa văn giường của bạn.\r\nBốn thanh và hai chân trung tâm cho phép hỗ trợ an toàn lên tới 500 pounds.\r\nBedframe này phù hợp với một tấm nệm kích thước đầy đủ tiêu chuẩn (bắt buộc phải có hộp).', 0, 0, 0, '2020-09-16 11:59:01', '2020-09-16 11:59:01'),
(2212, 'Giường Iluka', NULL, 100, 8000000, NULL, 2, 21, 'Thiết kế đơn giản, tối giản thêm phong cách hiện đại cho phòng ngủ của bạn.\r\nNgăn kéo tích hợp cung cấp một vị trí tiện dụng để lưu trữ thêm phòng ngủ dưới giường.\r\nViệc nghiên cứu xây dựng khung giường nền có nghĩa là không cần thêm hộp con.\r\nKết thúc màu xám làm nổi bật vẻ đẹp của khung gỗ keo, thể hiện các hoa văn tự nhiên của gỗ.', 0, 0, 0, '2020-09-16 11:59:01', '2020-09-16 11:59:01'),
(2221, 'Đầu Giường Appleton', NULL, 100, 5000000, NULL, 2, 22, 'Đường thẳng và kiểu dáng đẹp cho phong cách hiện đại, theo xu hướng.\r\nXong trong sạch, bạch dương.\r\nPhần cứng thiếc hiện đại trông khác biệt so với kết thúc ánh sáng.\r\nNgăn kéo chống bụi.', 0, 0, 0, '2020-09-16 12:03:21', '2020-09-16 12:03:21'),
(2222, 'Tủ Đầu Giường Spevi Mini HK20VG Màu Gỗ', NULL, 100, 3000000, NULL, 2, 22, 'Tủ đầu giườnng là một trong những vật dụng rất cần thiết trong cuộc sống của mỗi gia đình. Một chiếc tủ đầu giường đẹp sẽ tôn thêm vẻ đẹp cho không gian ngôi nhà bạn. Hiện nay sản phẩm tủ đầu giường luôn được đưa vào nội thất đi kèm không thể thiếu trong bộ nội thất phòng ngủ. Với mẫu mã kiểu dáng đa dạng và không ngừng đổi mới phù hợp với mọi phong cách nội thất khiến cho tổ ấm của bạn trở nên sang trọng và ấm áp.', 0, 0, 0, '2020-09-16 12:03:21', '2020-09-16 12:03:21'),
(2231, 'Bàn Trang Điểm Twin Home Màu Trắng Phối Gỗ (Không Gương)', NULL, 100, 2000000, NULL, 2, 23, 'Giúp căn phòng trở nên xinh đẹp\r\nĐể đồ trang điểm\r\nKiểu dáng hiện đại, tiết kiệm diện tích', 0, 0, 0, '2020-09-16 12:09:34', '2020-09-16 12:09:34'),
(2232, 'Bàn Phấn Queen A2016 Walnut', NULL, 100, 3000000, NULL, 2, 23, 'Loại sản phẩm:	Bàn Phấn\r\nKích thước:	800*390*1560\r\nChất liệu:	Gỗ MDF', 0, 0, 0, '2020-09-16 12:09:34', '2020-09-16 12:09:34'),
(2241, 'Tủ quần áo Carlingford', NULL, 100, 9000000, NULL, 2, 24, 'Gỗ kỹ thuật làm cho một khung vừa cứng cáp và chắc chắn.\r\nKết thúc màu xanh xám phù hợp với hầu hết mọi trang trí, đặc biệt là màu sắc mềm mại.\r\nMỗi ngăn kéo bao gồm phần cứng dễ trượt và cấu trúc khớp nối phía trước cho nhiều năm sử dụng đáng tin cậy.\r\nCác mặt bên có rãnh và khung đính cườm tạo cho mảnh này một nét duyên dáng của ngôi nhà nông thôn.', 0, 0, 0, '2020-09-16 12:14:50', '2020-09-16 12:14:50'),
(2242, 'Tủ quần áo Salthill', NULL, 100, 8000000, NULL, 2, 24, 'Kết thúc phong phú, than củi cung cấp phong cách theo xu hướng cũng như tính linh hoạt, pha trộn với hầu hết các trang trí.\r\nThiết kế nổi bật với gỗ phong, các tấm ốp vát cho cách tiếp cận đơn giản, gọn gàng với nội thất phòng ngủ.\r\nSatin xử lý hoàn thiện niken làm nổi bật các ngăn kéo lưu trữ sâu.\r\nTủ quần áo này có tính năng lưu trữ cửa ngoài ngăn kéo.', 0, 0, 0, '2020-09-16 12:14:50', '2020-09-16 12:14:50'),
(4411, 'Đèn Trang Trí Hiện Đại CCH69', NULL, 100, 4000000, NULL, 4, 41, 'Đèn Hera được thiết kế từ nguồn cảm hứng bởi loài hoa HERACLEUM, Một loài thảo mộc tuyệt đẹp sống ở các đỉnh núi Ethiopia.\r\nLoài hoa Heracleum cao đến 2,5 mét với những bông hoa trắng muốt xinh đẹp nhưng lại chứa chất kịch độc, có thể khiến con người bị tổn thương nghiêm trọng khi tiếp xúc với nó', 0, 0, 0, '2020-09-16 12:32:22', '2020-09-16 12:32:22'),
(4412, 'Đèn Gỗ: Mẫu Đèn Gỗ Thả Trần Trang Trí Bàn Ăn, Phòng Khách DG047', NULL, 100, 3000000, NULL, 4, 41, 'Mẫu đèn gỗ thả trần trang trí bàn ăn, phòng khách với hiệu ứng ánh sáng được thiết kế độc đáo mà không kém phần sang trọng. Ánh sáng ấm lan tỏa nhẹ đều trong căn phòng sẽ giúp gia chủ có cảm giác ấm áp, thoải mái và thư giãn.', 0, 0, 0, '2020-09-16 12:32:22', '2020-09-16 12:32:22'),
(4421, 'Vỏ Gối Lá Trà', NULL, 100, 100000, NULL, 4, 42, 'Gối mềm mại tạo cảm giác thoải mái', 0, 0, 0, '2020-09-16 12:36:58', '2020-09-16 12:36:58'),
(4422, 'Vỏ Gối Nửa Trái Tim Màu Đen', NULL, 100, 120000, NULL, 4, 42, 'Gối có họa tiết độc đáo', 0, 0, 0, '2020-09-16 12:36:58', '2020-09-16 12:36:58'),
(4431, 'Thảm Chân Love Hồng Hạc', NULL, 100, 200000, NULL, 4, 43, NULL, 0, 0, 0, '2020-09-16 12:40:53', '2020-09-16 12:40:53'),
(4432, 'Thảm Chân Hoa Mẫu Đơn Sweet House', NULL, 100, 200000, NULL, 4, 43, 'Chưa cập nhật', 0, 0, 0, '2020-09-16 12:40:53', '2020-09-16 12:40:53'),
(5511, 'Tranh Trừu Tượng Canvas - VQ039', NULL, 100, 2000000, NULL, 5, 51, 'Tranh canvas đang là xu hướng dành cho các căn nhà hiện đại, căn hộ chung cư.\r\nVải canvas – loại vải cao cấp chuyên dùng trong lĩnh vực hội hoạ, được căng trên khung gỗ, tạo cảm giác thanh, nhẹ, không cần lồng kiếng an toàn cho trẻ nhỏ.\r\nVới ưu điểm: sang trọng, nhẹ nhàng và hiện đại không bay màu, dễ lau chùi kết hợp với đinh 3 chân, rất dễ dàng cho việc treo trên tường mà không cần khoan.\r\nTất cả các bức tranh tại Viet Canvas luôn ở độ phân giải cao nhất, tỉ mỉ trong từng chi tiết, phù hợp treo ở phòng khách, phòng ngủ, cầu thang, phòng bếp,…', 0, 0, 0, '2020-09-16 12:44:37', '2020-09-16 12:44:37'),
(5512, 'Tranh Treo Tường Nghệ Thuật Hoa Hồng', NULL, 100, 2000000, NULL, 5, 51, 'Tranh vẽ với các họa tiết đơn giản ', 0, 0, 0, '2020-09-16 12:44:37', '2020-09-16 12:44:37'),
(5521, '&quot;Tranh Cát Dầu Nghệ Thuật&quot;', NULL, 100, 300000, '060542am116713458_159020572437069_7918531983739162', 5, 52, '&quot;Với sự kết hợp giữa cát tự nhiên, dầu, bong bóng khí và trọng lực trái đất, bạn sẽ có những bức tranh cực kỳ ấn tượng và còn có thể biến đổi khung cảnh bên trong theo ý thích. Sẽ vô cùng ấn tượng nhận ra rằng sau mỗi khoảng thời gian bức tranh lại biến đổi khác đi &quot;', 0, 0, 0, '2020-09-16 12:51:26', '2020-10-02 04:05:42'),
(5522, 'Tranh Cát Mã Đáo Thành Công - PV0125', NULL, 100, 300000, NULL, 5, 52, 'Chưa cập nhật', 0, 0, 0, '2020-09-16 12:51:26', '2020-09-16 12:51:26'),
(5531, 'Tranh Chú Cá Bên Hoa Sen - NT127', NULL, 100, 3000000, NULL, 5, 53, 'Chưa cập nhật', 0, 0, 0, '2020-09-16 12:58:19', '2020-09-16 12:58:19'),
(5532, 'Tranh Gốm Bát Tràng Làng Quê', NULL, 100, 3000000, NULL, 5, 53, 'Chưa cập nhật', 0, 0, 0, '2020-09-16 12:58:19', '2020-09-16 12:58:19'),
(5561, 'mai', NULL, 1, 1000000000, NULL, 1, 12, 'đẹp', 0, 0, 0, '2020-09-26 23:22:21', '0000-00-00 00:00:00'),
(5563, 'alolo', NULL, 2, 1000000000, NULL, 1, 14, 'đẹp', 0, 0, 0, '2020-09-26 23:27:59', '2020-09-27 04:30:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(50) NOT NULL,
  `amount` int(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
(5697, 2000000, 1613, '', '2020-09-26 18:59:35', '2020-09-26 18:59:35'),
(5698, 2000000, 1613, '', '2020-09-26 19:00:10', '2020-09-26 19:00:10'),
(5699, 2000000, 1613, '', '2020-09-26 19:00:33', '2020-09-26 19:00:33'),
(5700, 2000000, 1613, '', '2020-09-26 19:00:48', '2020-09-26 19:00:48'),
(5701, 2000000, 1613, '', '2020-09-26 19:01:07', '2020-09-26 19:01:07'),
(5704, 4000000, 1613, '', '2020-09-29 10:07:06', '2020-09-29 10:07:06'),
(5705, 4000000, 1613, '', '2020-09-29 10:07:27', '2020-09-29 10:07:27'),
(5706, 4000000, 1613, '', '2020-09-29 10:14:21', '2020-09-29 10:14:21'),
(5707, 4000000, 1613, '', '2020-09-29 10:14:32', '2020-09-29 10:14:32'),
(5708, 4000000, 1613, '', '2020-09-29 10:16:04', '2020-09-29 10:16:04'),
(5710, 120000000, 1613, '', '2020-10-01 04:58:59', '2020-10-01 04:58:59'),
(5711, 120000000, 1613, '', '2020-10-01 04:59:35', '2020-10-01 04:59:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`id`, `name`, `category`) VALUES
(12, 'Tủ & Kệ', 1),
(13, 'Bàn Cà Phê', 1),
(14, 'Ghế Lười & Đôn', 1),
(21, 'Giường Ngủ', 2),
(22, 'Bàn Kê Đầu Giường', 2),
(23, 'Bàn Trang Điểm', 2),
(24, 'Tủ Quần Áo', 2),
(41, 'Đèn Phòng Khách', 4),
(42, 'Gối Trang Trí', 4),
(43, 'Thảm', 4),
(51, 'Tranh Lụa', 5),
(52, 'Tranh Cát', 5),
(53, 'Tranh Gốm', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `Account` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `avatar` char(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `phone`, `Account`, `password`, `avatar`, `created_at`, `updated_at`) VALUES
(1613, 'Maii', 'maii@gmail.com', 'Quan 5', '0123456788', 'mai123', '$2y$10$yUrJ2XNHagAV.RqSCwqm/eANJXLCWtkQ0CkpgU01dXm7zJ8ezQI.u', NULL, NULL, '2020-09-24 17:58:01'),
(1614, 'mai á', 'mai@gmail.com', 'cam', '0123456789', 'haha', '$2y$10$o9KUPLkyJEPqoX2xjU3Ape/Sh1tOnIsYifcQ9eF8Yxo35VD0U0hIi', NULL, NULL, NULL),
(1615, 'mai 123', 'mai@gmail.com', 'cam', '0123456789', 'haha', '$2y$10$VNmiV9xDK7W4nZmrjxmH9eeZWjT7Q5urhK/Dw.xQMxZtAeHGp1CMS', '123.png', NULL, NULL),
(1616, 'mai10', 'mai@gmail.com', 'cam', '0123456789', 'haha', '$2y$10$lsCT.UyzC6dJjEF.skuw0OBCr8ez49uClpCPvToqnjXaTFOp/hEty', '123.png', '2020-09-27 00:29:36', '2020-09-27 00:29:36'),
(1617, 'maim', 'mais@gmail.com', 'cams', '0123456789', 'haha', '$2y$10$NEWEfYnS0w3.gFt1C5rh6OPGvUavzIVFTYg0.aOkTkBM/fUOaG.YG', NULL, '2020-09-27 04:53:42', '2020-09-27 04:53:42'),
(1618, 'maim', 'mais@gmail.com', 'cams', '0123456789', 'haha', '$2y$10$Gj8LhGXOgDKo8PC8fpSk3.svupqWqnMqp8K5IynUODmd9/RUPk/JC', '', '2020-09-27 05:47:04', '2020-09-27 05:47:04'),
(1619, 'maim', 'mais@gmail.com', 'cams', '0123456789', 'haha', '$2y$10$jIbO0adz4bherVPMe/CTb.OyghN.cGQD3xODFbjFilntVtljOL97K', 'avt_01.jpg', '2020-09-27 05:47:44', '2020-09-27 05:47:44'),
(1621, 'mai', 'huhu@gmail.com', 'dkfa', '0987655432', 'huhu', '$2y$10$zhoAs6uWTj69/sm36wXet.vaJVotuNEAUVOIc.q/IaaTGBklPz0ha', 'avt_01.png', '2020-10-01 21:50:30', '2020-10-01 21:50:30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ketnoisanpham` (`product_id`),
  ADD KEY `ketnoidonhang` (`transaction_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ketnoidanhmuc` (`category`),
  ADD KEY `ketnoiloai` (`type`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ketnoiusers` (`user_id`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ketnoicategory` (`category`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5688;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5569;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5712;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1622;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `ketnoidonhang` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ketnoisanpham` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `ketnoidanhmuc` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ketnoiloai` FOREIGN KEY (`type`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `ketnoiusers` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `ketnoicategory` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
