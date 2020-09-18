-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 16, 2020 lúc 05:24 PM
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
-- Cơ sở dữ liệu: `web_noi_that`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_up` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `avatar`, `created_at`, `created_up`) VALUES
(218, 'Trần Duy Thịnh', '50/3 Lạc Long Quân Phường 3 Quận 11', 'thinhtran122000@gmail.com', '123456', '0768004506', NULL, '2020-09-14 09:36:02', '2020-09-14 09:36:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(50) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated`) VALUES
(1, 'Phòng Khách', '2020-09-16 11:25:21', '2020-09-16 11:25:21'),
(2, 'Phòng Ngủ', '2020-09-16 11:25:21', '2020-09-16 11:25:21'),
(3, 'Phòng Bếp', '2020-09-16 11:25:54', '2020-09-16 11:25:54'),
(4, 'Đồ Trang Trí', '2020-09-16 11:25:54', '2020-09-16 11:25:54'),
(5, 'Tranh Nghệ Thuật', '2020-09-16 11:26:34', '2020-09-16 11:26:34');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `soluong`, `gia`, `created_at`) VALUES
(1212, 1234, 1111, 1, 3000000, '2020-09-16 13:16:26'),
(2323, 2345, 1112, 2, 40000000, '2020-09-16 13:16:26'),
(3434, 3456, 1122, 1, 6000000, '2020-09-16 13:19:20'),
(4545, 4567, 1121, 1, 9000000, '2020-09-16 13:21:41'),
(5656, 5678, 1132, 1, 40000000, '2020-09-16 13:24:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(50) NOT NULL,
  `tensanpham` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soluong` int(100) NOT NULL DEFAULT 1,
  `gia` int(100) DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(100) NOT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updata_up` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `tensanpham`, `soluong`, `gia`, `avatar`, `type`, `content`, `created_at`, `updata_up`) VALUES
(1111, 'Sofa - Màu Be', 100, 3000000, NULL, 11, 'Gỗ cây dương vàng và gỗ dán.\r\nGhế ngồi được làm bằng vải công nghiệp cho thoải mái và độ bền.\r\nThi công khung khối góc.', '2020-09-16 11:38:00', '2020-09-16 11:38:00'),
(1112, 'Sofa Vải Lanh Water-Look', 100, 20000000, NULL, 11, 'Mềm mại nhưng vẫn sành điệu, chất liệu vải lanh nhìn quanh ghế sofa tạo nên sự lôi cuốn.\r\nMột màu xám đen cung cấp một mỏ neo trung tính, thanh lịch để xây dựng không gian sống của bạn xung quanh.\r\nỐng vải làm nổi bật độ dày và thoải mái của đệm bọt mật độ cao.\r\nGỗ màu sô cô la đóng khung cơ sở của đồ nội thất và kéo dài xuống chân hỗ trợ.', '2020-09-16 11:38:00', '2020-09-16 11:38:00'),
(1121, 'Tủ Cổ Điển', 100, 9000000, '', 12, 'Sơn bán bóng có keo\r\n2 ngăn kéo\r\nBàn tay đã hoàn thành', '2020-09-16 11:43:09', '2020-09-16 11:43:09'),
(1122, 'Tủ TALA - Bạc', 100, 6000000, NULL, 12, 'Phong cách ở bên ngoài và thực tế ở bên trong, bảng điều khiển này có ngăn kéo để lưu trữ cũng như một kệ cố định phía sau hai cánh cửa tủ.\r\nSự kết hợp của các tấm gương và trang trí màu đen tạo ra một cái nhìn sang trọng.\r\nCánh cửa như pha lê kéo thêm sự lấp lánh cho mảnh nhấn rạng rỡ này.\r\nXây dựng: MDF cung cấp một khung mạnh mẽ, ổn định cho các điểm nhấn kính nhân đôi.', '2020-09-16 11:43:09', '2020-09-16 11:43:09'),
(1131, 'Bàn cà phê Walsh', 100, 11000000, NULL, 13, 'Mặt bàn bằng kính cường lực có góc xiên một inch và tạo cảm giác thoáng đãng.\r\nChân cong làm tăng thiết kế tinh xảo của chiếc bàn.\r\nBánh xe di động cho phép bạn linh hoạt để di chuyển bàn nơi bạn cần.\r\nPucks thép không gỉ an toàn chân đến cơ sở.\r\nGỗ cứng cáp tạo thành nền tảng của bộ sưu tập thanh lịch này.', '2020-09-16 11:47:49', '2020-09-16 11:47:49'),
(1132, 'Bàn cà phê Tenterden', 100, 40000000, NULL, 13, 'Chân thép chải đan xen và kết thúc trên tấm đế màu đen.\r\nKính cường lực đứng đầu bàn.\r\nHiện đại hóa không gian của bạn với sáng tạo kim loại và thủy tinh này.', '2020-09-16 11:47:49', '2020-09-16 11:47:49'),
(1141, 'Ghế Lười Thư Giãn ZT5', 100, 6000000, NULL, 14, 'Ghế sofa thư giãn đẹp giá rẻ thiết kế hiện đại, tính năng ưu việt mang tới một không gian mới cho gia đình bạn, bảo hành 3 năm, sản phẩm mang thương hiệu zSOFA.vn với uy tín chúng tôi có được từ khách hàng.\r\nChúng tôi sẽ mang lại sự hài lòng nhất đến quý khách hàng sản phẩm đến dịch vụ.\r\nSofa thư giãn ZT05 kích thước 180x70cm', '2020-09-16 11:52:43', '2020-09-16 11:52:43'),
(1142, 'Ghế Lười Home Dream Sofa Corner Canvas Vàng', 100, 2000000, NULL, 14, 'Sofa Chair Ticket có thành phần gồm vỏ chất liệu sử dụng trong nhà, bên trong chứa hạt xốp mềm mại, có thể tháo rời khi vệ sinh.\r\nTicket được sử dụng cho chiếc ghế Sofa Chair với tính năng mềm mại, rút mồ hôi, sử dụng được trong nhà, không bám bụi.\r\nChất liệu an toàn tuyệt đối với cả trẻ em.\r\nChất liệu nhẹ, thoáng mát, dễ vệ sinh, thích hợp khí hậu nhiệt đới.\r\nSofa Chair thiết kế như một chiếc sofa đơn, tạo cảm giác mềm mại, thư giãn khi ngồi; có thể dễ dàng di chuyển ở mọi gốc.\r\nChiếc ghế thường dùng trong nhà thư giãn cho gia đình , cho các quán cafe hoặc trong nội thất.\r\nNgoài tính năng thư giãn, chống mỏi sống lưng người dùng còn có thể sử dụng trang trí góc đọc sách, góc uống trà, trang trí nội thất…', '2020-09-16 11:52:43', '2020-09-16 11:52:43'),
(2211, 'Giường Tara - Màu Be', 100, 7000000, NULL, 21, 'Ghế bọc vải lanh mang lại sự thoải mái quanh năm cho chiếc giường êm ái này.\r\nCác đầu giường đệm, nút chần là thoải mái và thiết thực như nó là hấp dẫn.\r\nChân gỗ cứng châu Á đen thêm một nét hiện đại làm cho vải trông hấp dẫn hơn.\r\nTông màu trung tính mở ra khả năng lựa chọn màu sắc và hoa văn giường của bạn.\r\nBốn thanh và hai chân trung tâm cho phép hỗ trợ an toàn lên tới 500 pounds.\r\nBedframe này phù hợp với một tấm nệm kích thước đầy đủ tiêu chuẩn (bắt buộc phải có hộp).', '2020-09-16 11:59:01', '2020-09-16 11:59:01'),
(2212, 'Giường Iluka', 100, 8000000, NULL, 21, 'Thiết kế đơn giản, tối giản thêm phong cách hiện đại cho phòng ngủ của bạn.\r\nNgăn kéo tích hợp cung cấp một vị trí tiện dụng để lưu trữ thêm phòng ngủ dưới giường.\r\nViệc nghiên cứu xây dựng khung giường nền có nghĩa là không cần thêm hộp con.\r\nKết thúc màu xám làm nổi bật vẻ đẹp của khung gỗ keo, thể hiện các hoa văn tự nhiên của gỗ.', '2020-09-16 11:59:01', '2020-09-16 11:59:01'),
(2221, 'Đầu Giường Appleton', 100, 5000000, NULL, 22, 'Đường thẳng và kiểu dáng đẹp cho phong cách hiện đại, theo xu hướng.\r\nXong trong sạch, bạch dương.\r\nPhần cứng thiếc hiện đại trông khác biệt so với kết thúc ánh sáng.\r\nNgăn kéo chống bụi.', '2020-09-16 12:03:21', '2020-09-16 12:03:21'),
(2222, 'Tủ Đầu Giường Spevi Mini HK20VG Màu Gỗ', 100, 3000000, NULL, 22, 'Tủ đầu giườnng là một trong những vật dụng rất cần thiết trong cuộc sống của mỗi gia đình. Một chiếc tủ đầu giường đẹp sẽ tôn thêm vẻ đẹp cho không gian ngôi nhà bạn. Hiện nay sản phẩm tủ đầu giường luôn được đưa vào nội thất đi kèm không thể thiếu trong bộ nội thất phòng ngủ. Với mẫu mã kiểu dáng đa dạng và không ngừng đổi mới phù hợp với mọi phong cách nội thất khiến cho tổ ấm của bạn trở nên sang trọng và ấm áp.', '2020-09-16 12:03:21', '2020-09-16 12:03:21'),
(2231, 'Bàn Trang Điểm Twin Home Màu Trắng Phối Gỗ (Không Gương)', 100, 2000000, NULL, 23, 'Giúp căn phòng trở nên xinh đẹp\r\nĐể đồ trang điểm\r\nKiểu dáng hiện đại, tiết kiệm diện tích', '2020-09-16 12:09:34', '2020-09-16 12:09:34'),
(2232, 'Bàn Phấn Queen A2016 Walnut ', 100, 3000000, NULL, 23, 'Loại sản phẩm:	Bàn Phấn\r\nKích thước:	800*390*1560\r\nChất liệu:	Gỗ MDF', '2020-09-16 12:09:34', '2020-09-16 12:09:34'),
(2241, 'Tủ quần áo Carlingford', 100, 9000000, NULL, 24, 'Gỗ kỹ thuật làm cho một khung vừa cứng cáp và chắc chắn.\r\nKết thúc màu xanh xám phù hợp với hầu hết mọi trang trí, đặc biệt là màu sắc mềm mại.\r\nMỗi ngăn kéo bao gồm phần cứng dễ trượt và cấu trúc khớp nối phía trước cho nhiều năm sử dụng đáng tin cậy.\r\nCác mặt bên có rãnh và khung đính cườm tạo cho mảnh này một nét duyên dáng của ngôi nhà nông thôn.', '2020-09-16 12:14:50', '2020-09-16 12:14:50'),
(2242, 'Tủ quần áo Salthill', 100, 8000000, NULL, 24, 'Kết thúc phong phú, than củi cung cấp phong cách theo xu hướng cũng như tính linh hoạt, pha trộn với hầu hết các trang trí.\r\nThiết kế nổi bật với gỗ phong, các tấm ốp vát cho cách tiếp cận đơn giản, gọn gàng với nội thất phòng ngủ.\r\nSatin xử lý hoàn thiện niken làm nổi bật các ngăn kéo lưu trữ sâu.\r\nTủ quần áo này có tính năng lưu trữ cửa ngoài ngăn kéo.', '2020-09-16 12:14:50', '2020-09-16 12:14:50'),
(3311, 'Bàn ăn tròn Carter', 100, 7000000, NULL, 31, 'Mặt kính cường lực dày\r\nHai bộ ống thép không gỉ được đặt cạnh nhau để cung cấp hỗ trợ lâu dài\r\nHoạt động tốt trong mọi không gian hiện đại hoặc đương đại', '2020-09-16 12:19:50', '2020-09-16 12:19:50'),
(3312, 'Bàn ăn Reynosa', 100, 5000000, NULL, 31, 'Có tám cổng sạc USB.\r\nGhế lên đến 6.', '2020-09-16 12:19:50', '2020-09-16 12:19:50'),
(3321, 'Ghế ăn vải Niko', 100, 1000000, NULL, 32, 'Chỗ ngồi nhồi bông rộng rãi làm cho nơi hoàn hảo để dành một bữa ăn thư giãn.\r\nCác polyester màu pastel, màu nước là một sự tương phản đáng yêu với các veneer Mindi màu óc chó.\r\nKhâu tinh tế và búi trung tâm đưa chiếc ghế này từ đơn giản đến phong cách.\r\nMột khung gỗ cao su bền cho sức mạnh và sự ổn định cho nhiều bữa ăn sắp tới.', '2020-09-16 12:22:44', '2020-09-16 12:22:44'),
(3322, 'Ghế ăn Bolt', 100, 1000000, NULL, 32, 'Được làm thủ công bằng gỗ thông nguyên khối, Ghế Bolt chuyển tiếp của chúng tôi cập nhật một hình bóng mộc mạc cổ điển với lớp sơn mài trắng sang trọng. Chi tiết chéo ở mặt sau làm tăng thêm sự thú vị và chắc chắn sẽ thu hút mọi ánh nhìn dù được đặt xung quanh bàn ăn hay được sử dụng làm ghế phụ trong phòng khách hoặc sảnh.', '2020-09-16 12:22:44', '2020-09-16 12:22:44'),
(3331, 'Tủ Tenisha', 100, 13000000, NULL, 33, 'Tận hưởng cảm giác nhẹ nhàng và thoáng mát mà chiếc tủ lấy cảm hứng từ đất nước này mang đến cho ngôi nhà của bạn.\r\nThể hiện sự sở hữu quý giá của bạn với đèn định vị LED tích hợp, cảm ứng.\r\nNỉ lót trong hai ngăn kéo để đựng đồ bạc của bạn hoặc các mảnh tinh tế khác.\r\nTay cầm bằng đồng cổ được chà xát bằng tay để cung cấp một kết thúc mộc mạc kỳ lạ.\r\nMàu trắng cổ điển và gỗ sồi chải hai tông màu thêm phong cách cho một loạt các phối màu.\r\nMái vòm chạm khắc dốc đẹp thêm phong cách trang trại cho phòng ăn của bạn.', '2020-09-16 12:25:41', '2020-09-16 12:25:41'),
(3332, 'Tủ Curio', 100, 8000000, NULL, 33, '4 kệ có thể điều chỉnh, có thể tháo rời; Đèn 50W có công tắc tắt / bật.\r\nKiểu dáng chuyển tiếp đẹp.\r\nSản xuất tại Canada của các vật liệu tốt nhất.\r\nXúc tác hoàn thiện để giúp đồ nội thất đẹp.\r\nBản lề đàn piano đầy đủ giúp cửa ổn định hơn và tránh bụi.\r\nLõm gỗ gụ để làm đẹp và củng cố tủ.\r\nMortise và mộng cửa xây dựng để làm cho nó kéo dài suốt đời.\r\nKết thúc phong cách sô cô la tuyệt đẹp và phần cứng niken chải.\r\nLắp ráp hoàn chỉnh; yêu cầu lắp đặt kính.', '2020-09-16 12:25:41', '2020-09-16 12:25:41'),
(3341, 'Bộ ghế bar CorLiving', 100, 4000000, NULL, 34, 'Kiểu dáng đẹp, khung chrome được làm nổi bật với da giả màu đen hiện đại.\r\nKhâu kim cương ở mặt sau hỗ trợ mang lại sự quan tâm trực quan tinh tế.\r\nThang máy khí cho phép điều chỉnh độ cao dễ dàng giữa 23,75 và 32 inch.\r\nChỗ để chân thuận tiện và tính năng xoay đảm bảo sự thoải mái lâu dài.\r\nKim loại bền và vật liệu đảm bảo những thanh phân này dễ dàng để làm sạch.\r\nGói này bao gồm hai phân thanh phù hợp.', '2020-09-16 12:30:06', '2020-09-16 12:30:06'),
(3342, 'Bàn Bisk Bar', 100, 1000000, NULL, 34, 'Thang máy chrome tuyệt đẹp điều chỉnh chiều cao bàn từ 26 \"đến 35,5\".\r\nMặt bàn tròn có bề mặt gỗ bóng mượt.\r\nThiết kế hợp lý có một dấu chân nhỏ để dễ dàng đặt.\r\nDễ dàng để làm sạch và lắp ráp.', '2020-09-16 12:30:06', '2020-09-16 12:30:06'),
(4411, 'Đèn Trang Trí Hiện Đại CCH69', 100, 4000000, NULL, 41, 'Đèn Hera được thiết kế từ nguồn cảm hứng bởi loài hoa HERACLEUM, Một loài thảo mộc tuyệt đẹp sống ở các đỉnh núi Ethiopia.\r\nLoài hoa Heracleum cao đến 2,5 mét với những bông hoa trắng muốt xinh đẹp nhưng lại chứa chất kịch độc, có thể khiến con người bị tổn thương nghiêm trọng khi tiếp xúc với nó', '2020-09-16 12:32:22', '2020-09-16 12:32:22'),
(4412, 'Đèn Gỗ: Mẫu Đèn Gỗ Thả Trần Trang Trí Bàn Ăn, Phòng Khách DG047', 100, 3000000, NULL, 41, 'Mẫu đèn gỗ thả trần trang trí bàn ăn, phòng khách với hiệu ứng ánh sáng được thiết kế độc đáo mà không kém phần sang trọng. Ánh sáng ấm lan tỏa nhẹ đều trong căn phòng sẽ giúp gia chủ có cảm giác ấm áp, thoải mái và thư giản.', '2020-09-16 12:32:22', '2020-09-16 12:32:22'),
(4421, 'Vỏ Gối Lá Trà', 100, 100000, NULL, 42, 'Gối mềm mại tạo cảm giác thoải mái', '2020-09-16 12:36:58', '2020-09-16 12:36:58'),
(4422, 'Vỏ Gối Nửa Trái Tim Màu Đen', 100, 120000, NULL, 42, 'Gối có họa tiết độc đáo', '2020-09-16 12:36:58', '2020-09-16 12:36:58'),
(4431, 'Thảm Chân Love Hồng Hạc', 100, 200000, NULL, 43, NULL, '2020-09-16 12:40:53', '2020-09-16 12:40:53'),
(4432, 'Thảm Chân Hoa Mẫu Đơn Sweet House', 100, 200000, NULL, 43, NULL, '2020-09-16 12:40:53', '2020-09-16 12:40:53'),
(5511, 'Tranh Trừu Tượng Canvas - VQ039', 100, 2000000, NULL, 51, 'Tranh canvas đang là xu hướng dành cho các căn nhà hiện đại, căn hộ chung cư.\r\nVải canvas – loại vải cao cấp chuyên dùng trong lĩnh vực hội hoạ, được căng trên khung gỗ, tạo cảm giác thanh, nhẹ, không cần lồng kiếng an toàn cho trẻ nhỏ.\r\nVới ưu điểm: sang trọng, nhẹ nhàng và hiện đại không bay màu, dễ lau chùi kết hợp với đinh 3 chân, rất dễ dàng cho việc treo trên tường mà không cần khoan.\r\nTất cả các bức tranh tại Viet Canvas luôn ở độ phân giải cao nhất, tỉ mỉ trong từng chi tiết, phù hợp treo ở phòng khách, phòng ngủ, cầu thang, phòng bếp,…', '2020-09-16 12:44:37', '2020-09-16 12:44:37'),
(5512, 'Tranh Treo Tường Nghệ Thuật Hoa Hồng', 100, 2000000, NULL, 51, 'Tranh vẽ với các họa tiết đơn giản ', '2020-09-16 12:44:37', '2020-09-16 12:44:37'),
(5521, 'Tranh Cát Dầu Nghệ Thuật', 100, 300000, '', 52, 'Với sự kết hợp giữa cát tự nhiên, dầu, bong bóng khí và trọng lực trái đất, bạn sẽ có những bức tranh cực kỳ ấn tượng và còn có thể biến đổi khung cảnh bên trong theo ý thích. Sẽ vô cùng ấn tượng nhận ra rằng sau mỗi khoảng thời gian bức tranh lại biến đổi khác đi ', '2020-09-16 12:51:26', '2020-09-16 12:51:26'),
(5522, 'Tranh Cát Mã Đáo Thành Công - PV0125', 100, 300000, NULL, 52, NULL, '2020-09-16 12:51:26', '2020-09-16 12:51:26'),
(5531, 'Tranh Chú Cá Bên Hoa Sen - NT127', 100, 3000000, NULL, 53, 'Chưa cập nhật', '2020-09-16 12:58:19', '2020-09-16 12:58:19'),
(5532, 'Tranh Gốm Bát Tràng Làng Quê', 100, 3000000, NULL, 53, 'Chưa cập nhật', '2020-09-16 12:58:19', '2020-09-16 12:58:19'),
(5541, 'Tranh Bình Hoa Cúc Dại - HD709', 100, 4000000, NULL, 54, 'Tranh canvas đang là xu hướng dành cho các căn nhà hiện đại, căn hộ chung cư.\r\nVải canvas – loại vải cao cấp chuyên dùng trong lĩnh vực hội hoạ, được căng trên khung gỗ, tạo cảm giác thanh, nhẹ, không cần lồng kiếng an toàn cho trẻ nhỏ.\r\nVới ưu điểm: sang trọng, nhẹ nhàng và hiện đại không bay màu, dễ lau chùi kết hợp với đinh 3 chân, rất dễ dàng cho việc treo trên tường mà không cần khoan.\r\nTất cả các bức tranh tại Viet Canvas luôn ở độ phân giải cao nhất, tỉ mỉ trong từng chi tiết, phù hợp treo ở phòng khách, phòng ngủ, cầu thang, phòng bếp,….', '2020-09-16 13:02:18', '2020-09-16 13:02:18'),
(5542, 'Tranh Sơn Dầu Hoa Cúc Trắng Dày Màu', 100, 4000000, NULL, 54, 'Chưa cập nhật', '2020-09-16 13:02:18', '2020-09-16 13:02:18');

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
  `created_up` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `user_id`, `note`, `created_at`, `created_up`) VALUES
(1234, 3000000, 1512, 'Ship nhanh nhanh', '2020-09-16 13:14:21', '2020-09-16 13:14:21'),
(2345, 40000000, 1512, 'Ship lẹ lẹ còn đi ngủ', '2020-09-16 13:14:21', '2020-09-16 13:14:21'),
(3456, 6000000, 1512, 'Không ship là cây vô đầu', '2020-09-16 13:17:58', '2020-09-16 13:17:58'),
(4567, 9000000, 1512, 'Nhớ khuyến mãi cả người yêu nhé', '2020-09-16 13:20:13', '2020-09-16 13:20:13'),
(5678, 40000000, 1512, 'Nhớ khuyến mãi thêm 1 bộ ', '2020-09-16 13:24:15', '2020-09-16 13:24:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `id` int(50) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`id`, `name`, `category`) VALUES
(11, 'Ghế', 1),
(12, 'Tủ & Kệ', 1),
(13, 'Bàn Cà Phê', 1),
(14, 'Ghế Lười & Đôn Mềm', 1),
(21, 'Giường Ngủ', 2),
(22, 'Bàn Kê Đầu Giường', 2),
(23, 'Bàn Trang Điểm', 2),
(24, 'Tủ Quần Áo', 2),
(31, 'Bàn Ăn', 3),
(32, 'Ghế Ăn', 3),
(33, 'Tủ Bát Đĩa', 3),
(34, 'Ghế Quầy Bar & Quầy Bar', 3),
(41, 'Đèn Phòng Khách', 4),
(42, 'Gối Trang Trí', 4),
(43, 'Thảm', 4),
(51, 'Tranh Lụa', 5),
(52, 'Tranh Cát', 5),
(53, 'Tranh Gốm', 5),
(54, 'Tranh Sơn Dầu', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_up` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `address`, `phone`, `account`, `password`, `avatar`, `created_at`, `created_up`) VALUES
(1512, 'Trần Duy Thịnh', 'thinhtran122000@gmail.com', '50/3 Lạc Long Quân Phường 3 Quận 11', '0768004506', 'thinhtran122000', '123456', NULL, '2020-09-16 13:08:14', '2020-09-16 13:08:14'),
(1612, 'Nguyễn Lam Trường', 'truongnguyen1231998@gmail.com', '280 An Dương Vương Phường 4 Quận 5', '0965967706', 'truongnguyen1231998', '123456', NULL, '2020-09-16 13:26:09', '2020-09-16 13:26:09');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

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
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5657;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5543;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5679;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1613;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type` (`id`);

--
-- Các ràng buộc cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
