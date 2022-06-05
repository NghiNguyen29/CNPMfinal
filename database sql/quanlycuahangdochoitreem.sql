-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 05, 2022 lúc 10:50 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlycuahangdochoitreem`
--
CREATE DATABASE IF NOT EXISTS `quanlycuahangdochoitreem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `quanlycuahangdochoitreem`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) DEFAULT NULL,
  `STAFF_ID` int(11) DEFAULT NULL,
  `ORDER_DATE` date DEFAULT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `ADDRESS` varchar(200) DEFAULT NULL,
  `PHONE` varchar(10) DEFAULT NULL,
  `TOTAL` float DEFAULT NULL,
  `STATUS` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`ID`, `CUSTOMER_ID`, `STAFF_ID`, `ORDER_DATE`, `NAME`, `ADDRESS`, `PHONE`, `TOTAL`, `STATUS`) VALUES
(1, 2, 1, '2022-06-05', 'Thạch Lầu', 'Quận 7, Tp,HCM', '712384634', 6732000, 1),
(2, 3, 1, '2022-06-05', 'Phạm Văn Khang', 'Cần Thơ', '589348791', 32763000, 2),
(3, 3, 1, '2022-06-05', 'Phạm Văn Khang', 'Hà Nội', '0810463793', 13663000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billdetails`
--

CREATE TABLE `billdetails` (
  `ID` int(11) NOT NULL,
  `BILL_ID` int(11) DEFAULT NULL,
  `PRODUCT_ID` int(11) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `billdetails`
--

INSERT INTO `billdetails` (`ID`, `BILL_ID`, `PRODUCT_ID`, `QUANTITY`, `PRICE`) VALUES
(77, 1, 33, 5, 5995000),
(78, 1, 27, 3, 717000),
(79, 2, 32, 6, 19704000),
(80, 2, 26, 11, 6919000),
(81, 2, 1, 18, 6120000),
(82, 3, 3, 23, 8050000),
(83, 3, 30, 17, 5593000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `ID_PRODUCT` int(11) NOT NULL,
  `ID_CUSTOMER` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`ID`, `ID_PRODUCT`, `ID_CUSTOMER`, `QUANTITY`) VALUES
(48, 22, 3, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `FULLNAME` varchar(100) DEFAULT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PWD` varchar(20) DEFAULT NULL,
  `ADDRESS` tinytext DEFAULT NULL,
  `IMAGE` varchar(222) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`ID`, `FULLNAME`, `USERNAME`, `EMAIL`, `PWD`, `ADDRESS`, `IMAGE`) VALUES
(1, 'Vãng lai', '', 'toystory@gmail.com', ' ', '19 Nguyễn Hữu Thọ, P.Tân Phong, Q.7, HCM', 'user.png'),
(2, 'Thạch Lầu', 'thachlau', 'thachlau@gmail.com', 'thachlau123', 'Quận 10, TP.HCM', 'user.png'),
(3, 'Phạm Văn Khang', 'vankhang', 'vankhang@gmail.com', 'vankhang111', 'Quận 7, TP.HCM', 'user.png'),
(4, 'Anh Tài', 'anhtai', 'taipham123@gmail.com', 'anhtaioz', 'Cai Lậy, Tiền Giang', 'user.png'),
(5, 'Văn Minh', 'vanminh', 'vanminh@gmail.com', 'vanminh', 'Gò Công, Tiền Giang', 'user.png'),
(6, 'Phúc Khang', 'phuckhang', 'phuckhang@gmail.com', 'khangmg123', 'Tràm Chim, Đồng Tháp', 'user.png'),
(7, 'Browne', 'browne123', 'browne123@gmail.com', 'brownehandsome', 'Hà Đông, Hà Nội', 'user.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `ID_STAFF` int(11) NOT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `IMAGE` varchar(50) DEFAULT NULL,
  `SUMMARY` text DEFAULT NULL,
  `CONTENT` text DEFAULT NULL,
  `ID_NEWS_CATEGORY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`ID`, `ID_STAFF`, `NAME`, `IMAGE`, `SUMMARY`, `CONTENT`, `ID_NEWS_CATEGORY`) VALUES
(2, 1, 'Việt Nam có thể nhập khẩu xăng dầu từ Malaysia với giá 13.000 đồng/lít?', 'tinnoibo_01.jpg', '<p>Đại diện Thương vụ Việt Nam tại Malaysia cho biết, nếu Việt Nam nhập khẩu xăng dầu từ Malaysia sẽ nhập khẩu theo gi&aacute; đ&agrave;m ph&aacute;n.</p>\n', '<p>Theo b&agrave; Trần L&ecirc; Dung, B&iacute; thứ thứ nhất phụ tr&aacute;ch Thương vụ Việt Nam tại Malaysia, xăng RON95 tại nước n&agrave;y hiện nay được b&aacute;n với gi&aacute; 2,05 RM/l&iacute;t, tương đương với 13.000 đồng. Đ&acirc;y l&agrave; mức gi&aacute; m&agrave; Ch&iacute;nh phủ đang trợ gi&aacute; cho d&acirc;n tại Malaysia.</p>\n\n<p>&quot;Tuy nhi&ecirc;n, tr&ecirc;n thực tế, để Việt Nam nhập được xăng với mức gi&aacute; 13.000 đồng/l&iacute;t từ Malaysia l&agrave; chuyện &ldquo;kh&ocirc;ng thể&rdquo;. Nếu nhập khẩu xăng từ Malaysia th&igrave; Việt Nam sẽ mua theo gi&aacute; đ&agrave;m ph&aacute;n, kh&ocirc;ng phải l&agrave; gi&aacute; m&agrave; Ch&iacute;nh phủ Malaysia đang hỗ trợ người d&acirc;n&rdquo;, b&agrave; Trần L&ecirc; Dung th&ocirc;ng tin.</p>\n\n<table align=\"center\" border=\"0\">\n	<tbody>\n		<tr>\n		</tr>\n		<tr>\n			<td><img alt=\"Việt Nam có thể nhập khẩu xăng dầu từ Malaysia với giá 13.000 đồng/lít?\" src=\"https://file3.qdnd.vn/data/images/0/2022/06/03/nguyenthao/gia%20xang%201.jpg?dpi=150&amp;quality=100&amp;w=870\" /></td>\n		</tr>\n		<tr>\n			<td>&nbsp;Ảnh minh họa: vtv.vn</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>Tr&ecirc;n thực tế, Malaysia l&agrave; nước sản xuất v&agrave; xuất khẩu&nbsp;<a href=\"https://www.qdnd.vn/tag/gia-xang-dau-9.html\">xăng dầu</a>&nbsp;lớn tr&ecirc;n thế giới, do đ&oacute;, họ c&oacute; ch&iacute;nh s&aacute;ch trợ gi&aacute; đối với xăng dầu trong nước. Để giữ gi&aacute; xăng dầu tại đ&acirc;y ổn định, bất kể gi&aacute; xăng dầu thế giới biến động như thế n&agrave;o, Malaysia phải tốn th&ecirc;m tiền trợ cấp mỗi khi gi&aacute; xăng dầu tăng &ndash; số tiền vốn c&oacute; thể được đưa v&agrave;o c&aacute;c dự &aacute;n kinh tế kh&aacute;c.</p>\n\n<p>Theo một b&aacute;o c&aacute;o nghi&ecirc;n cứu cho thấy, ước t&iacute;nh, gi&aacute; dầu tăng 1 USD/th&ugrave;ng (tương đương 4,18 RM) th&igrave; Ch&iacute;nh phủ Malaysia sẽ phải chi ra th&ecirc;m 80 triệu RM (18 triệu USD) tiền trợ cấp nhi&ecirc;n liệu để giữ gi&aacute; xăng RON95 l&agrave; 2,05 RM (0,47 USD).</p>\n\n<p>Theo Bộ C&ocirc;ng Thương, người ti&ecirc;u d&ugrave;ng Singapore &ndash; quốc gia chung bi&ecirc;n giới với Malaysia cũng kh&ocirc;ng mua được mức gi&aacute; n&agrave;y. V&agrave;o hồi th&aacute;ng 4, khi gi&aacute; dầu thế giới tăng phi m&atilde;, nhằm mua được dầu gi&aacute; rẻ, nhiều người d&acirc;n Singapore đ&atilde; l&aacute;i xe qua bi&ecirc;n giới đổ xăng, buộc giới chức Malaysia phải y&ecirc;u cầu c&aacute;c biện ph&aacute;p kiểm so&aacute;t mạnh mẽ hơn đối với c&aacute;c cửa h&agrave;ng xăng dầu khi b&aacute;n cho người nước ngo&agrave;i.</p>\n\n<p>Cụ thể, từ năm 2010, Malaysia đ&atilde; ra quy định kh&ocirc;ng b&aacute;n xăng trợ gi&aacute; gi&aacute; cho xe c&oacute; biển số nước ngo&agrave;i. Những xe n&agrave;y chỉ c&oacute; thể mua xăng RON97 &ndash; loại xăng c&oacute; gi&aacute; th&agrave;nh đắt hơn v&agrave; kh&ocirc;ng được trợ gi&aacute; từ Ch&iacute;nh phủ.</p>\n\n<p>Về vấn đề nhập khẩu xăng dầu Malaysia, Thương vụ Việt Nam tại Malaysia cho biết, xăng dầu Việt Nam v&agrave; xăng dầu Petronal (Malaysia) vẫn đang x&uacute;c tiến thương mại trao đổi thường xuy&ecirc;n với mức gi&aacute; đ&agrave;m ph&aacute;n, kh&ocirc;ng phải gi&aacute; được Ch&iacute;nh phủ trợ gi&aacute;.</p>\n', 1),
(3, 1, 'Thúc đẩy trao đổi thương mại với các doanh nghiệp tỉnh Chungbuk, Hàn Quốc', 'tinnoibo_02.jpg', '<p>Từ ng&agrave;y 13 tới 17-6, c&aacute;c doanh nghiệp Việt Nam sẽ c&oacute; cơ hội gặp gỡ v&agrave; giao thương trực tuyến (1:1) miễn ph&iacute; với 10 doanh nghiệp H&agrave;n Quốc đến từ tỉnh Chungbuk. Sự kiện n&agrave;y do Cơ quan X&uacute;c tiến Thương mại v&agrave; Đầu tư H&agrave;n Quốc (KOTRA Hanoi) tổ chức.</p>\n', '<p>C&aacute;c sản phẩm H&agrave;n Quốc sẽ được giới thiệu với c&aacute;c doanh nghiệp c&oacute; nhu cầu của Việt Nam rất đa dạng lĩnh vực bao gồm thực phẩm, mỹ phẩm, đồ gia dụng, n&ocirc;ng nghiệp (ph&acirc;n b&oacute;n), c&ocirc;ng nghiệp (m&agrave;ng film cho &ocirc; t&ocirc;).</p>\n\n<p><a href=\"https://www.qdnd.vn/tag/doanh-nghiep-786.html\">Doanh nghiệp Việt Nam</a>&nbsp;kh&ocirc;ng những nhận được cơ hội t&igrave;m kiếm nh&agrave; sản xuất/cung cấp uy t&iacute;n của H&agrave;n Quốc m&agrave; c&ograve;n được hỗ trợ t&iacute;ch cực để biến cơ hội th&agrave;nh hiện thực v&agrave; hợp t&aacute;c th&agrave;nh c&ocirc;ng. To&agrave;n bộ hoạt động hỗ trợ x&uacute;c tiến thương mại cho doanh nghiệp Việt Nam đều ho&agrave;n to&agrave;n miễn ph&iacute;, được thực hiện bằng ng&acirc;n s&aacute;ch của Ch&iacute;nh phủ H&agrave;n Quốc.</p>\n\n<table align=\"center\" border=\"0\">\n	<tbody>\n		<tr>\n		</tr>\n		<tr>\n			<td><img alt=\"Thúc đẩy trao đổi thương mại với các doanh nghiệp tỉnh Chungbuk, Hàn Quốc\" src=\"https://file3.qdnd.vn/data/images/0/2022/06/03/vudung/anh%20chungbuk.jpg?dpi=150&amp;quality=100&amp;w=870\" /></td>\n		</tr>\n		<tr>\n			<td>Hoạt động tư vấn, x&uacute;c tiến thương mại trực tuyến với c&aacute;c doanh nghiệp H&agrave;n Quốc.&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>Chungbuk (hay Chungcheongbuk-do) l&agrave; tỉnh nằm giữa H&agrave;n Quốc. Địa phương n&agrave;y đặt mục ti&ecirc;u GRDP b&igrave;nh qu&acirc;n đầu người đạt 50.000 USD v&agrave;o năm 2028.</p>\n\n<p>Doanh nghiệp Việt Nam li&ecirc;n hệ với KOTRA Hanoi&nbsp; để được hỗ trợ v&agrave; bố tr&iacute; lịch giao thương trực tuyến 1:1 (c&oacute; hỗ trợ phi&ecirc;n dịch) miễn ph&iacute; với từng doanh nghiệp H&agrave;n Quốc.</p>\n\n<p>Tiếp nối c&aacute;c hoạt động giao thương online th&agrave;nh c&ocirc;ng trong 2 năm vừa qua, KOTRA Hanoi nhận thấy đ&acirc;y l&agrave; giai đoạn cần đẩy mạnh hơn nữa c&aacute;c hoạt động x&uacute;c tiến thương mại, g&oacute;p phần đẩy mạnh phục hồi kinh tế cho cộng đồng doanh nghiệp hai nước.</p>\n', 1),
(4, 1, 'Gợi ý những hoạt động hè bổ ích cho trẻ ba mẹ không nên bỏ qua', 'camnang_01.jpeg', '<p>M&ugrave;a h&egrave; l&agrave; thời điểm c&aacute;c b&eacute; được tạm rời xa việc học v&agrave; nghỉ ngơi vui chơi thỏa th&iacute;ch. B&eacute; cũng được tự do kh&aacute;m ph&aacute; năng lực bản th&acirc;n, theo đuổi c&aacute;c sở th&iacute;ch c&aacute; nh&acirc;n cũng như tham gia nhiều hoạt động h&egrave; bổ &iacute;ch cho trẻ. Điều n&agrave;y kh&ocirc;ng chỉ gi&uacute;p trẻ tr&aacute;nh xa c&aacute;c thiết bị điện tử g&acirc;y hại m&agrave; c&ograve;n được n&acirc;ng cao kiến thức,&nbsp;&nbsp;kỹ năng sống&nbsp;v&agrave; ph&aacute;t triển thể chất tốt nhất.</p>\n\n<p>Nếu ba mẹ chưa c&oacute; &yacute; tưởng hoạt động h&egrave; bổ &iacute;ch cho trẻ, h&atilde;y tham khảo b&agrave;i viết sau đ&acirc;y:</p>\n', '<h2>Tham gia c&aacute;c lớp học năng khiếu</h2>\n\n<p>Theo c&aacute;c chuy&ecirc;n gia, trẻ tham gia c&aacute;c lớp năng khiếu vừa được tăng cường sức khỏe, vừa r&egrave;n luyện c&aacute;c kỹ năng sống cần thiết. Hơn nữa, khi trẻ tham gia vui chơi c&ugrave;ng bạn b&egrave;, trẻ sẽ học c&aacute;ch l&agrave;m việc nh&oacute;m, tăng cường khả năng ng&ocirc;n ngữ v&agrave; giao tiếp hiệu quả.</p>\n\n<p>V&igrave; vậy, m&ugrave;a h&egrave; l&agrave; thời điểm l&yacute; tưởng để b&eacute; tham gia c&aacute;c hoạt động h&egrave; bổ &iacute;ch như học bơi, chơi cầu l&ocirc;ng, học v&otilde;, học nhảy, b&oacute;ng chuyền, b&oacute;ng rổ... Tuy nhi&ecirc;n ba mẹ cần lựa chọn m&ocirc;n học năng khiếu ph&ugrave; hợp với độ tuổi, thể lực v&agrave; sở th&iacute;ch của con.</p>\n\n<h2>Cho trẻ đi bơi</h2>\n\n<p>Đi bơi l&agrave; một trong những hoạt động h&egrave; bổ &iacute;ch cho trẻ ba mẹ kh&ocirc;ng n&ecirc;n bỏ qua. Đi bơi rất tốt cho sức khỏe v&agrave; sự ph&aacute;t triển thể chất của trẻ. Trẻ sẽ ăn ngon, ngủ ngon, cao lớn khỏe mạnh hơn sau những giờ vận động bơi lội đầy h&agrave;o hứng. Tuy nhi&ecirc;n để đảm bảo an to&agrave;n cho trẻ khi đi bơi, ba mẹ cần lu&ocirc;n gi&aacute;m s&aacute;t trẻ v&agrave; chuẩn bị đầy đủ c&aacute;c dụng cụ như k&iacute;nh bơi, phao bơi, mũ bơi...</p>\n\n<h2>Cho trẻ trượt patin</h2>\n\n<p>Ng&agrave;y nay, h&igrave;nh ảnh những b&eacute; từ 4 tuổi trở l&ecirc;n chơi trượt&nbsp;<a href=\"https://www.mykingdom.com.vn/danh-muc/xe-dap-scooter/patin.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=goi-y-nhung-hoat-dong-he-bo-ich-cho-tre&amp;itm_content=blog_patin&amp;itm_term=blog_3_6_2022\" target=\"_blank\">patin</a>&nbsp;một c&aacute;ch thuần thục đ&atilde; kh&ocirc;ng c&ograve;n xa lạ với tất cả mọi người. Trượt patin cũng l&agrave; hoạt động h&egrave; bổ &iacute;ch cho trẻ. M&ocirc;n thể thao n&agrave;y sẽ mang lại cho trẻ những giờ vui chơi đầy hứng th&uacute;. Qua đ&oacute; trẻ được tăng cường thể chất, học c&aacute;ch xử l&yacute; t&igrave;nh huống nhanh nhạy v&agrave; linh hoạt.</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/danh-muc/xe-dap-scooter/patin.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=goi-y-nhung-hoat-dong-he-bo-ich-cho-tre&amp;itm_content=blog_patin&amp;itm_term=blog_3_6_2022\" target=\"_blank\"><img src=\"https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/BlogContentMKD/mykingdom-hoat-dong-he-bo-ich-cho-tre-3.jpg\" style=\"height:600px; width:600px\" /></a></p>\n\n<h2>Cho trẻ đi xe đạp</h2>\n\n<p><a href=\"https://www.mykingdom.com.vn/blog/nhung-loi-ich-cua-viec-di-xe-dap-doi-voi-tre-nho\" target=\"_blank\">Đi xe đạp</a>&nbsp;l&agrave; một hoạt động h&egrave; bổ &iacute;ch cho trẻ em lẫn người lớn. Hoạt động n&agrave;y rất tốt cho sức khỏe tim mạch, ổn định c&acirc;n nặng, cải thiện chiều cao. Đồng thời đi xe đạp c&ograve;n gi&uacute;p trẻ kh&aacute;m ph&aacute; thế giới, tăng cường sự tự tin v&agrave; giao tiếp x&atilde; hội. Do đ&oacute;, ba mẹ h&atilde;y trang bị cho b&eacute; một chiếc xe đạp ph&ugrave; hợp với chiều cao, độ tuổi để trẻ vui chơi trong dịp h&egrave; n&agrave;y nh&eacute;.</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/thuong-hieu/bike.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=goi-y-nhung-hoat-dong-he-bo-ich-cho-tre&amp;itm_content=blog_bike&amp;itm_term=blog_3_6_2022\" target=\"_blank\"><img src=\"https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/BlogContentMKD/mykingdom-hoat-dong-he-bo-ich-cho-tre-1.jpg\" style=\"height:600px; width:600px\" /></a></p>\n\n<h2>Tham gia hoạt động d&atilde; ngoại</h2>\n\n<p>Cho trẻ đi du lịch, d&atilde; ngoại l&agrave; hoạt động h&egrave; bổ &iacute;ch cho trẻ ba mẹ c&oacute; thể c&acirc;n nhắc. &Ocirc;ng b&agrave; ta thường n&oacute;i &quot;Đi một ng&agrave;y đ&agrave;ng, học một s&agrave;ng kh&ocirc;n&quot;, trẻ đi chơi nhiều sẽ biết th&ecirc;m nhiều điều mới mẻ, th&uacute; vị. Kh&ocirc;ng những vậy, đ&acirc;y cũng l&agrave; cơ hội gi&uacute;p gắn kết t&igrave;nh cảm giữa c&aacute;c th&agrave;nh vi&ecirc;n. C&aacute;c b&eacute; c&oacute; thể cho trẻ tham gia c&aacute;c hoạt động kh&aacute;m ph&aacute; tự nhi&ecirc;n, tham quan c&aacute;c địa điểm nổi tiếng, gi&uacute;p ba mẹ chuẩn bị&nbsp;<a href=\"https://www.mykingdom.com.vn/bo-leu-va-dung-cu-cam-trai-cho-be-cpg4911.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=goi-y-nhung-hoat-dong-he-bo-ich-cho-tre&amp;itm_content=blog_CPG4911&amp;itm_term=blog_3_6_2022\" target=\"_blank\">bộ lều v&agrave; dụng cụ cắm trại</a>...</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/bo-leu-va-dung-cu-cam-trai-cho-be-cpg4911.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=goi-y-nhung-hoat-dong-he-bo-ich-cho-tre&amp;itm_content=blog_CPG4911&amp;itm_term=blog_3_6_2022\" target=\"_blank\"><img src=\"https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/BlogContentMKD/mykingdom-hoat-dong-he-bo-ich-cho-tre-2.jpg\" style=\"height:600px; width:600px\" /></a></p>\n\n<h2>Thực hiện c&aacute;c th&iacute; nghiệm khoa học tại nh&agrave;</h2>\n\n<p>Ngo&agrave;i c&aacute;c hoạt động vừa kể tr&ecirc;n, ba mẹ h&atilde;y d&agrave;nh thời gian c&ugrave;ng con thực hiện c&aacute;c th&iacute; nghiệm khoa học th&uacute; vị. Ba mẹ cũng c&oacute; thể sử dụng c&aacute;c bộ đồ chơi gi&aacute;o dục&nbsp;<a href=\"https://www.mykingdom.com.vn/thuong-hieu/steam.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=goi-y-nhung-hoat-dong-he-bo-ich-cho-tre&amp;itm_content=blog_steam&amp;itm_term=blog_3_6_2022\" target=\"_blank\">STEAM</a>&nbsp;hấp dẫn để trẻ kh&aacute;m ph&aacute;, nghi&ecirc;n cứu v&agrave; học hỏi những kiến thức mới. Hoạt động n&agrave;y sẽ gi&uacute;p trẻ học c&aacute;c kỹ năng sống hữu &iacute;ch m&agrave; vẫn đảm bảo sự an to&agrave;n.</p>\n\n<p>Tr&ecirc;n đ&acirc;y l&agrave; những gợi &yacute; hoạt động h&egrave; bổ &iacute;ch cho trẻ. Ba mẹ h&atilde;y sắp xếp thời gian v&agrave; tạo điều kiện để con c&oacute; một m&ugrave;a h&egrave; thật sự vui vẻ v&agrave; &yacute; nghĩa nh&eacute;.</p>\n', 2),
(5, 1, 'Loạt đồ chơi nhà bếp xịn sò bé gái nào cũng mê', 'camnang_02.jpeg', '<p>Nhắc đến đồ chơi b&eacute; g&aacute;i nhất định kh&ocirc;ng thể bỏ qua đồ chơi nh&agrave; bếp hay&nbsp;<a href=\"https://www.mykingdom.com.vn/blog/do-choi-nau-an-cho-be-vui-choi-va-phat-trien-ky-nang\" target=\"_blank\">đồ chơi nấu ăn</a>. Những bộ đồ chơi nh&agrave; bếp m&ocirc; phỏng c&aacute;c vật dụng, đồ d&ugrave;ng, c&aacute;c loại thực phẩm quen thuộc. Thiết kế đồ chơi thu h&uacute;t bởi kiểu d&aacute;ng xinh xắn, m&agrave;u sắc bắt mắt c&ugrave;ng chất liệu cao cấp.</p>\n', '<p>Kh&ocirc;ng chỉ mang t&iacute;nh giải tr&iacute;, đồ chơi nh&agrave; bếp vừa mang t&iacute;nh gi&aacute;o dục hữu &iacute;ch. B&eacute; c&oacute; thể chơi giả vờ đầy h&agrave;o hứng c&ugrave;ng bạn b&egrave;, từ đ&oacute; ph&aacute;t triển vượt trội về thể chất v&agrave; tư duy. Bởi trong qu&aacute; tr&igrave;nh chơi nấu ăn, b&eacute; sẽ phải vận động tay ch&acirc;n li&ecirc;n tục khi sử dụng c&aacute;c vật dụng, thao t&aacute;c nấu nướng như mẹ thường l&agrave;m. B&ecirc;n cạnh đ&oacute;, b&eacute; c&ograve;n suy nghĩ phải nấu những m&oacute;n g&igrave;, sử dụng nguy&ecirc;n liệu, dụng cụ g&igrave;... Thậm ch&iacute; b&eacute; c&ograve;n tạo ra v&ocirc; số c&acirc;u chuyện th&uacute; vị dựa theo quan s&aacute;t thực tế hoặc theo tr&iacute; tưởng tượng của m&igrave;nh.</p>\n\n<p>Dưới đ&acirc;y l&agrave; gợi &yacute; những bộ đồ chơi nh&agrave; bếp cực hay d&agrave;nh cho b&eacute; đam m&ecirc; nấu nướng, chơi giả vờ. Ba mẹ h&atilde;y tham khảo để mua tặng b&eacute; nh&eacute;!</p>\n\n<h2>1. Vali nh&agrave; bếp di động 3 trong 1</h2>\n\n<p>Thương hiệu: SWEET HEART<br />\nSKU SH8121<br />\nGiảm 25% chỉ c&ograve;n 494,000 VNĐ (Gi&aacute; gốc 659,000 VNĐ)</p>\n\n<p><em>Lưu &yacute;: Gi&aacute; sản phẩm được cập nhật đến thời điểm hiện tại v&agrave; c&oacute; thể thay đổi t&ugrave;y theo từng chương tr&igrave;nh khuyến m&atilde;i.</em></p>\n\n<p><a href=\"https://www.mykingdom.com.vn/vali-nha-bep-di-dong-3-trong-1-sh8121.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_SH8121&amp;itm_term=blog_1_6_2022\" target=\"_blank\">Vali nh&agrave; bếp di động 3 trong 1 SH8121</a>&nbsp;c&oacute; thiết kế xinh xắn, m&agrave;u hồng ngọt ng&agrave;o, ph&ugrave; hợp với sở th&iacute;ch của b&eacute; g&aacute;i. Sản phẩm n&agrave;y đến từ thương hiệu Sweetheart nổi tiếng n&ecirc;n đảm bảo chất lượng cao cấp, an to&agrave;n.</p>\n\n<p>Bộ đồ chơi c&oacute; thể gập lại th&agrave;nh chiếc vali k&eacute;o xịn x&ograve; n&ecirc;n b&eacute; c&oacute; thể mang theo bất cứ đ&acirc;u. Hoặc b&eacute; c&oacute; thể t&aacute;i hiện th&agrave;nh d&aacute;ng bếp đứng ho&agrave;nh tr&aacute;ng hay d&aacute;ng bếp thấy nhỏ xinh xinh. B&ecirc;n trong sản phẩm gồm c&oacute; 49 chi tiết, phụ kiện l&agrave;m bếp sinh động. Ngo&agrave;i ra, bếp c&ograve;n c&oacute; bồn rửa c&oacute; thể chơi được với nước thật, k&egrave;m chức năng xoay thức ăn, &acirc;m thanh v&agrave; đ&egrave;n ph&aacute;t s&aacute;ng sinh động.</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/vali-nha-bep-di-dong-3-trong-1-sh8121.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_SH8121&amp;itm_term=blog_1_6_2022\" target=\"_blank\"><img src=\"https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/BlogContentMKD/mykingdom-do-choi-nha-bep-1.jpg\" style=\"height:600px; width:600px\" /></a></p>\n\n<h2>2. Bộ nh&agrave; bếp sang trọng</h2>\n\n<p>Thương hiệu: ECOIFFIER<br />\nSKU 001696<br />\nGiảm 30% chỉ c&ograve;n 839,000 VNĐ (Gi&aacute; gốc 1,199,000 VNĐ)</p>\n\n<p><em>Lưu &yacute;: Gi&aacute; sản phẩm được cập nhật đến thời điểm hiện tại v&agrave; c&oacute; thể thay đổi t&ugrave;y theo từng chương tr&igrave;nh khuyến m&atilde;i.</em></p>\n\n<p>Gợi &yacute; đồ chơi nh&agrave; bếp tiếp theo ba mẹ c&oacute; thể tham khảo l&agrave;&nbsp;<a href=\"https://www.mykingdom.com.vn/bo-nha-bep-sang-trong-001696.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_001696&amp;itm_term=blog_1_6_2022\" target=\"_blank\">Bộ nh&agrave; bếp sang trọng 001696</a>&nbsp;của h&atilde;ng Eoiffier (Ph&aacute;p). Bộ đồ chơi vừa kết hợp cả căn bếp c&ugrave;ng đầy đủ c&aacute;c dụng cụ nấu ăn như nồi, xoong, chảo, muỗng, đĩa... B&eacute; c&oacute; thể dễ d&agrave;ng nhập vai th&agrave;nh đầu bếp t&agrave;i ba để chế biến nhiều m&oacute;n ăn hấp dẫn. Sản phẩm gi&uacute;p b&eacute; r&egrave;n luyện sự kh&eacute;o l&eacute;o, ph&aacute;t triển tr&iacute; tưởng tượng, cũng như khuyến kh&iacute;ch b&eacute; học t&iacute;nh l&agrave;m việc nh&oacute;m, ngăn nắp v&agrave; kh&aacute;m ph&aacute; c&ocirc;ng việc của một đầu bếp.</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/bo-nha-bep-sang-trong-001696.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_001696&amp;itm_term=blog_1_6_2022\" target=\"_blank\"><img src=\"https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/BlogContentMKD/mykingdom-do-choi-nha-bep-2.jpg\" style=\"height:600px; width:600px\" /></a></p>\n\n<h2>3. Ph&ograve;ng bếp ho&agrave;ng gia của c&ocirc;ng ch&uacute;a Belles</h2>\n\n<p>Thương hiệu: DISNEY PRINCESS<br />\nSKU E8936<br />\nGiảm 40% chỉ c&ograve;n 791,000 VNĐ (Gi&aacute; gốc 1,319,000 VNĐ)</p>\n\n<p><em>Lưu &yacute;: Gi&aacute; sản phẩm được cập nhật đến thời điểm hiện tại v&agrave; c&oacute; thể thay đổi t&ugrave;y theo từng chương tr&igrave;nh khuyến m&atilde;i.</em></p>\n\n<p>Những b&eacute; g&aacute;i l&agrave; fan của c&ocirc;ng ch&uacute;a Disney chắc chắn sẽ th&iacute;ch m&ecirc; bộ đồ chơi nấu ăn&nbsp;<a href=\"https://www.mykingdom.com.vn/phong-bep-hoang-gia-cua-cong-chua-belles-e8936.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_E8936&amp;itm_term=blog_1_6_2022\" target=\"_blank\">Ph&ograve;ng bếp ho&agrave;ng gia của c&ocirc;ng ch&uacute;a Belles E8936</a>. Sản phẩm lấy cảm hứng từ bộ phim hoạt h&igrave;nh nổi tiếng &quot;Người đẹp v&agrave; Qu&aacute;i vật&quot; của h&atilde;ng Disney.</p>\n\n<p>Sản phẩm gồm c&oacute; 1 b&uacute;p b&ecirc; Belle, 13 phụ kiện, 2 nh&acirc;n vật đồ chơi B&agrave; Potts v&agrave; con trai của b&agrave; ấy Chip. Thiết kế xinh xắn, c&ugrave;ng m&agrave;u sắc sống động sẽ gi&uacute;p k&iacute;ch th&iacute;ch thị gi&aacute;c của b&eacute;. Đặc biệt, b&uacute;p b&ecirc; c&ocirc;ng ch&uacute;a Belle sở hữu chiếc v&aacute;y c&oacute; thể th&aacute;o rời cho ph&eacute;p b&eacute; thay đổi trang phục theo &yacute; th&iacute;ch. Với bộ đồ chơi n&agrave;y, b&eacute; sẽ được chơi nấu ăn c&ugrave;ng c&ocirc;ng ch&uacute;a Belle, h&ograve;a nhập c&ugrave;ng kh&ocirc;ng kh&iacute; trong l&acirc;u đ&agrave;i - nơi n&agrave;ng Belle nấu ăn cho Qu&aacute;i vật.</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/phong-bep-hoang-gia-cua-cong-chua-belles-e8936.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_E8936&amp;itm_term=blog_1_6_2022\" target=\"_blank\"><img src=\"https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/BlogContentMKD/mykingdom-do-choi-nha-bep-3.jpg\" style=\"height:600px; width:600px\" /></a></p>\n\n<h2>4. Bộ dụng cụ nh&agrave; bếp (45 m&oacute;n)</h2>\n\n<p>Thương hiệu: ECOIFFIER<br />\nSKU 001210<br />\nGi&aacute; 699,000 VNĐ</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/bo-dung-cu-nha-bep-45-mon-001210.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_001210&amp;itm_term=blog_1_6_2022\" target=\"_blank\">Bộ dụng cụ nh&agrave; bếp Ecoiffier 001210</a>&nbsp;bao gồm tới 45 m&oacute;n dụng cụ như nồi, ấm nước, ly, t&aacute;ch, dĩa, ch&eacute;n, muỗng, nĩa... Ngo&agrave;i ra, bộ đồ chơi c&ograve;n c&oacute; một chiếc rổ chia ngăn cứng c&aacute;p để b&eacute; sắp xếp c&aacute;c đồ d&ugrave;ng gọn g&agrave;ng nhất.</p>\n\n<p>Thiết kế đồ chơi m&ocirc; phỏng sắc n&eacute;t, ch&acirc;n thực với m&agrave;u sắc nổi bật. Chất liệu an to&agrave;n, kh&ocirc;ng chứa chất độc hại, kh&ocirc;ng g&oacute;c cạnh n&ecirc;n đảm bảo an to&agrave;n cho sức khỏe của b&eacute;.</p>\n\n<p>Với m&oacute;n đồ chơi nh&agrave; bếp n&agrave;y, b&eacute; dễ d&agrave;ng h&oacute;a th&acirc;n th&agrave;nh đầu bếp để nấu những bữa tiệc hấp dẫn d&agrave;nh tặng cho gia đ&igrave;nh m&igrave;nh. Qua đ&oacute;, b&eacute; được r&egrave;n luyện sự kh&eacute;o l&eacute;o, ngăn nắp, đồng thời ph&aacute;t triển kỹ năng linh hoạt, s&aacute;ng tạo.</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/bo-dung-cu-nha-bep-45-mon-001210.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_001210&amp;itm_term=blog_1_6_2022\" target=\"_blank\"><img src=\"https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/BlogContentMKD/mykingdom-do-choi-nha-bep-4.jpg\" style=\"height:600px; width:600px\" /></a></p>\n\n<h2>5. Bộ khu&ocirc;n l&agrave;m bếp cơ bản tặng 1 B5517</h2>\n\n<p>Thương hiệu: PLAYDOH<br />\nSKU CBE7253-B5517<br />\nGiảm 28% chỉ c&ograve;n 249,000 VNĐ (Gi&aacute; gốc 348,000 VNĐ)</p>\n\n<p><em>Lưu &yacute;: Gi&aacute; sản phẩm được cập nhật đến thời điểm hiện tại v&agrave; c&oacute; thể thay đổi t&ugrave;y theo từng chương tr&igrave;nh khuyến m&atilde;i.</em></p>\n\n<p>Nhằm đ&aacute;p ứng sở th&iacute;ch nấu nướng của c&aacute;c b&eacute;, h&atilde;ng bột nặn Play-doh đ&atilde; cho ra mắt nhiều sản phẩm c&oacute; chủ đề hấp dẫn n&agrave;y. Ba mẹ c&oacute; thể tham khảo&nbsp;<a href=\"https://www.mykingdom.com.vn/bo-khuon-lam-bep-co-ban-tang-1-b5517-cbe7253-b5517.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_CBE7253-B5517&amp;itm_term=blog_1_6_2022\" target=\"_blank\">Bộ khu&ocirc;n l&agrave;m bếp cơ bản tặng 1 B5517</a>&nbsp;để b&eacute; trổ t&agrave;i l&agrave;m đầu bếp nh&iacute; v&agrave; học được nhiều điều bổ &iacute;ch.</p>\n\n<p>Sản phẩm bao gồm 2 phi&ecirc;n bản được giao ngẫu nhi&ecirc;n l&agrave; bộ nấu bếp hoặc bộ l&agrave;m kem. Ngo&agrave;i ra, b&eacute; c&ograve;n được tặng th&ecirc;m 1 thanh bột nặn Play Doh B5517 với 4 m&agrave;u sắc kh&aacute;c nhau cho b&eacute; tha hồ s&aacute;ng tạo. C&aacute;c m&oacute;n đồ d&ugrave;ng m&ocirc; phỏng tinh tế dụng cụ l&agrave;m bếp, c&ugrave;ng bột nặn Play-doh mềm mịn, bắt mắt, cho b&eacute; thỏa sức nấu c&aacute;c bữa ăn ngon miệng hay l&agrave;m ra những c&acirc;y kem hấp dẫn d&agrave;nh tặng cho gia đ&igrave;nh v&agrave; bạn b&egrave;.</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/bo-khuon-lam-bep-co-ban-tang-1-b5517-cbe7253-b5517.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_CBE7253-B5517&amp;itm_term=blog_1_6_2022\" target=\"_blank\"><img src=\"https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/BlogContentMKD/mykingdom-do-choi-nha-bep-5.jpg\" style=\"height:600px; width:600px\" /></a></p>\n\n<h2>6. Bộ đồ chơi salad rau củ</h2>\n\n<p>Thương hiệu: ECOIFFIER<br />\nSKU 002579<br />\nGiảm 30% chỉ c&ograve;n 377,000 VNĐ (Gi&aacute; gốc 539,000 VNĐ)</p>\n\n<p><em>Lưu &yacute;: Gi&aacute; sản phẩm được cập nhật đến thời điểm hiện tại v&agrave; c&oacute; thể thay đổi t&ugrave;y theo từng chương tr&igrave;nh khuyến m&atilde;i.</em></p>\n\n<p><a href=\"https://www.mykingdom.com.vn/bo-do-choi-salad-rau-cu-002579.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_002579&amp;itm_term=blog_1_6_2022\" target=\"_blank\">Bộ đồ chơi salad rau củ 002579</a>&nbsp;mang đến cho c&aacute;c đầu bếp nh&iacute; đầy đủ nguy&ecirc;n liệu như nấm, rau củ l&agrave;m salad đến c&aacute;c dụng cụ l&agrave;m bếp như cối xay muối, cối xay ti&ecirc;u, m&ugrave; tạt, chai dầu, lọ giấm... B&eacute; c&oacute; thể dễ d&agrave;ng nhận biết v&agrave; ph&acirc;n biệt c&aacute;c dụng cụ trong nh&agrave; bếp. Đồng thời sử dụng c&aacute;c nguy&ecirc;n liệu, vật dụng để chế biến những m&oacute;n salad rau củ thật vừa bắt mắt vừa ngon miệng để mời ba mẹ c&ugrave;ng thưởng thức.</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/bo-do-choi-salad-rau-cu-002579.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_002579&amp;itm_term=blog_1_6_2022\" target=\"_blank\"><img src=\"https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/BlogContentMKD/mykingdom-do-choi-nha-bep-6.jpg\" style=\"height:600px; width:600px\" /></a></p>\n\n<h2>7. C&ugrave;ng Barbie l&agrave;m mỳ</h2>\n\n<p>Thương hiệu: BARBIE<br />\nSKU GHK43<br />\nGiảm 30% chỉ c&ograve;n 489,000 VNĐ (Gi&aacute; gốc 699,000 VNĐ)</p>\n\n<p><em>Lưu &yacute;: Gi&aacute; sản phẩm được cập nhật đến thời điểm hiện tại v&agrave; c&oacute; thể thay đổi t&ugrave;y theo từng chương tr&igrave;nh khuyến m&atilde;i.</em></p>\n\n<p><a href=\"https://www.mykingdom.com.vn/cung-barbie-lam-my-ghk43.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_GHK43&amp;itm_term=blog_1_6_2022\" target=\"_blank\">C&ugrave;ng Barbie l&agrave;m mỳ GHK43</a>&nbsp;cho b&eacute; g&aacute;i thử sức trổ t&agrave;i đảm đang c&ugrave;ng c&ocirc; n&agrave;ng b&uacute;p b&ecirc; xinh đẹp. Sản phẩm gồm c&oacute; b&uacute;p b&ecirc; Barbie mặc trang phục nấu ăn chuy&ecirc;n nghiệp, b&agrave;n l&agrave;m m&igrave; v&agrave; phụ kiện l&agrave;m m&igrave;. B&eacute; c&oacute; thể d&ugrave;ng bột trắng trong hộp, cho v&agrave;o lỗ ở giữa b&agrave;n l&agrave;m việc v&agrave; đặt b&aacute;t c&oacute; nắp l&ecirc;n tr&ecirc;n. Sau đ&oacute; k&eacute;o tấm b&igrave;a xuống v&agrave; xem m&igrave; xuất hiện trong b&aacute;t. Chưa dừng lại ở đ&oacute;, b&eacute; cũng c&oacute; thể d&ugrave;ng bột m&agrave;u xanh ấn v&agrave;o khu&ocirc;n để tạo n&ecirc;n b&ocirc;ng cải xanh để ăn k&egrave;m với m&igrave; nữa đấy. Nghe thật hấp dẫn đ&uacute;ng kh&ocirc;ng n&agrave;o?</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/cung-barbie-lam-my-ghk43.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_GHK43&amp;itm_term=blog_1_6_2022\" target=\"_blank\"><img src=\"https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/BlogContentMKD/mykingdom-do-choi-nha-bep-7.jpg\" style=\"height:600px; width:600px\" /></a></p>\n\n<h2>8. Bộ nh&agrave; bếp khổng lồ của Peppa Pig</h2>\n\n<p>Thương hiệu: PEPPA PIG<br />\nSKU 1680948INF19<br />\nGi&aacute; 2,999,000 VNĐ</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/bo-nha-bep-khong-lo-cua-peppa-pig-1680948inf19.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_1680948INF19&amp;itm_term=blog_1_6_2022\" target=\"_blank\">Bộ nh&agrave; bếp khổng lồ của Peppa Pig 1680948INF19</a>&nbsp;được sản xuất theo phim hoạt h&igrave;nh Peppa Pig nổi tiếng của Anh. Sản phẩm gồm c&oacute; đầy đủ c&aacute;c đồ d&ugrave;ng nh&agrave; bếp quen thuộc như tủ lạnh lớn, l&ograve; nướng b&aacute;nh, l&ograve; vi s&oacute;ng, bếp gas, m&aacute;y nướng b&aacute;nh, v&ograve;i rửa v&agrave; lọc nước c&ugrave;ng th&ugrave;ng r&aacute;c t&aacute;i chế... Đi k&egrave;m với c&aacute;c nguy&ecirc;n vật liệu nấu ăn để b&eacute; trổ t&agrave;i nấu nướng. Tất cả c&aacute;c chi tiết đều được chế tạo bằng nhựa cao cấp, m&agrave;u sắc phối hợp h&agrave;i h&ograve;a v&ocirc; c&ugrave;ng thu h&uacute;t. Đặc biệt, sản phẩm c&ograve;n đi k&egrave;m &acirc;m thanh, giai điệu Peppa Pig quen thuộc gi&uacute;p b&eacute; chơi thật say m&ecirc;.</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/bo-nha-bep-khong-lo-cua-peppa-pig-1680948inf19.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=loat-do-choi-nha-bep-xin-so-be-gai-nao-cung-me&amp;itm_content=blog_1680948INF19&amp;itm_term=blog_1_6_2022\" target=\"_blank\"><img src=\"https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/BlogContentMKD/mykingdom-do-choi-nha-bep-8.jpg\" style=\"height:600px; width:600px\" /></a></p>\n\n<p>Tr&ecirc;n đ&acirc;y l&agrave; những bộ đồ chơi nh&agrave; bếp cực hay d&agrave;nh cho c&aacute;c b&eacute; đam m&ecirc; nấu nướng, chơi tưởng tượng. Hi vọng ba mẹ sẽ c&oacute; th&ecirc;m lựa chọn để mua đồ chơi giải tr&iacute; bổ &iacute;ch cho b&eacute; trong những ng&agrave;y h&egrave; sắp tới.</p>\n\n<p>Mykingdom cam kết cung cấp cho kh&aacute;ch h&agrave;ng c&aacute;c sản phẩm đồ chơi cao cấp, mang t&iacute;nh gi&aacute;o dục, c&oacute; thể gi&uacute;p trẻ ph&aacute;t triển tốt nhất cả thể chất v&agrave; tinh thần. Tất cả c&aacute;c sản phẩm ở đ&acirc;y đều c&oacute; thương hiệu, xuất xứ r&otilde; r&agrave;ng, th&ocirc;ng qua kiểm định chất lượng đạt ti&ecirc;u chuẩn quốc tế n&ecirc;n ba mẹ ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m.</p>\n', 2),
(6, 1, 'Tại sao trẻ cần được rèn luyện kỹ năng sống ngay từ nhỏ?', 'camnang_03.jpeg', '<p>Bất cứ đứa trẻ n&agrave;o cũng cần được r&egrave;n luyện kỹ năng sống ngay từ nhỏ. Điều n&agrave;y ảnh hưởng rất lớn đến qu&aacute; tr&igrave;nh h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển nh&acirc;n c&aacute;ch sau n&agrave;y của trẻ. Vậy kỹ năng sống l&agrave; g&igrave;? Tại sao cần r&egrave;n luyện kỹ năng sống cho trẻ? V&agrave; khi n&agrave;o l&agrave; ph&ugrave; hợp nhất để r&egrave;n luyện kỹ năng sống cho trẻ? Để t&igrave;m hiểu r&otilde; hơn về vấn đề n&agrave;y, ch&uacute;ng ta h&atilde;y c&ugrave;ng tham khảo b&agrave;i viết sau đ&acirc;y.</p>\n', '<h2>Kỹ năng sống l&agrave; g&igrave;?</h2>\n\n<p>Th&ocirc;ng thường kỹ năng sống được hiểu l&agrave; những kỹ năng cơ bản m&agrave; con người cần phải c&oacute; để cuộc sống lu&ocirc;n khỏe mạnh, an to&agrave;n v&agrave; chất lượng.</p>\n\n<p>Theo Tổ chức Y tế Thế giới (WHO), kỹ năng sống l&agrave; c&aacute;c kỹ năng t&acirc;m l&yacute; x&atilde; hội v&agrave; giao tiếp gi&uacute;p mỗi c&aacute; nh&acirc;n c&oacute; thể tương t&aacute;c với người kh&aacute;c một c&aacute;ch hiệu quả. Đồng thời ứng ph&oacute; linh hoạt với những vấn đề, t&igrave;nh huống xảy ra trong cuộc sống h&agrave;ng ng&agrave;y.</p>\n\n<p>Theo UNICEFF, kỹ năng sống tập hợp nhiều kỹ năng t&acirc;m l&yacute;, x&atilde; hội, giao tiếp c&aacute; nh&acirc;n. Những kỹ năng n&agrave;y gi&uacute;p con người đưa ra những quyết định đ&uacute;ng đắn, hiệu quả, c&oacute; thể dễ d&agrave;ng xử l&yacute; v&agrave; quản l&yacute; bản th&acirc;n nhằm hướng đến một cuộc sống l&agrave;nh mạnh, chất lượng.</p>\n\n<p>Kỹ năng sống được h&igrave;nh th&agrave;nh theo nhiều c&aacute;ch kh&aacute;c nhau, t&ugrave;y v&agrave;o m&ocirc;i trường sống, phương ph&aacute;p gi&aacute;o dục... Việc r&egrave;n luyện kỹ năng sống cho trẻ sẽ hướng v&agrave;o những hoạt động c&aacute; nh&acirc;n hay nh&oacute;m trẻ em, gi&uacute;p trẻ ứng ph&oacute; t&iacute;ch cực với c&aacute;c t&igrave;nh huống, th&aacute;ch thức trong cuộc sống.</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/be-anna-be-bong-e3690.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=tai-sao-can-ren-luyen-ky-nang-song-cho-tre&amp;itm_content=blog_E3690&amp;itm_term=blog_30_05_2022\" target=\"_blank\"><img src=\"https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/BlogContentMKD/mykingdom-ky-nang-song-cho-tre-1.jpg\" style=\"height:600px; width:600px\" /></a></p>\n\n<h2>Khi n&agrave;o ba mẹ cần r&egrave;n luyện kỹ năng sống cho trẻ?</h2>\n\n<p>Việc r&egrave;n luyện kỹ năng sống cho trẻ diễn ra từ rất sớm, thậm ch&iacute; l&agrave; ngay từ khi mới sinh ra. Khi biết n&oacute;i, ba mẹ đ&atilde; dạy trẻ c&aacute;c kỹ năng giao tiếp đầu đời như ch&agrave;o &ocirc;ng b&agrave;, ch&agrave;o c&ocirc; ch&uacute;... Lớn l&ecirc;n, trẻ được đi học, c&aacute;c mối quan hệ dần được mở rộng, trẻ được học th&ecirc;m nhiều kỹ năng mới. Một số kỹ năng sống cần thiết cho trẻ ở giai đoạn n&agrave;y c&oacute; thể kể đến như r&egrave;n luyện v&agrave; ph&aacute;t triển thể chất, kỹ năng giao tiếp, kỹ năng l&agrave;m việc nh&oacute;m. Do đ&oacute;, ba mẹ cần phối hợp với thầy c&ocirc;, nh&agrave; trường để r&egrave;n luyện kỹ năng sống cho trẻ đ&uacute;ng c&aacute;ch để trẻ được ph&aacute;t triển to&agrave;n diện nhất.</p>\n\n<p><a href=\"https://www.mykingdom.com.vn/may-hut-bui-cua-peppa-pig-1684640inf.html?itm_source=homepage&amp;itm_medium=blog_mykingdom&amp;itm_campaign=tai-sao-can-ren-luyen-ky-nang-song-cho-tre&amp;itm_content=blog_1684640INF&amp;itm_term=blog_30_05_2022\" target=\"_blank\"><img src=\"https://u6wdnj9wggobj.vcdn.cloud/media/wysiwyg/BlogContentMKD/mykingdom-ky-nang-song-cho-tre-2.jpg\" style=\"height:600px; width:600px\" /></a></p>\n\n<h2>Tại sao cần r&egrave;n luyện kỹ năng sống cho trẻ?</h2>\n\n<p>B&ecirc;n cạnh việc cung cấp những tri thức, kiến thức từ s&aacute;ch vở, ba mẹ cần tạo điều kiện cho con r&egrave;n luyện kỹ năng sống bởi những l&yacute; do sau đ&acirc;y:</p>\n\n<p>R&egrave;n luyện kỹ năng sống sẽ gi&uacute;p trẻ biết c&aacute;ch giao tiếp với mọi người, biết c&aacute;ch ứng xử đ&uacute;ng mực.</p>\n\n<p>R&egrave;n luyện kỹ năng sống sớm gi&uacute;p trẻ c&oacute; &yacute; thức l&agrave;m chủ bản th&acirc;n, sống l&agrave;nh mạnh, t&iacute;ch cực v&agrave; ph&aacute;t triển to&agrave;n diện sau n&agrave;y.</p>\n\n<p>R&egrave;n luyện kỹ năng sống c&ograve;n gi&uacute;p trẻ dễ d&agrave;ng h&ograve;a nhập v&agrave;o tập thể, khẳng định được vị tr&iacute; của m&igrave;nh.</p>\n\n<p>R&egrave;n luyện kỹ năng sống gi&uacute;p trẻ giữ được sự b&igrave;nh tĩnh, tự tin v&agrave; c&oacute; đủ kiến thức để giải quyết c&aacute;c t&igrave;nh huống, th&aacute;ch thức trong cuộc sống.</p>\n\n<p>R&egrave;n luyện kỹ năng sống sẽ gi&uacute;p trẻ ho&agrave;n thiện nh&acirc;n c&aacute;ch một c&aacute;ch t&iacute;ch cực.</p>\n\n<p>Hi vọng những th&ocirc;ng tin trong b&agrave;i viết tr&ecirc;n sẽ gi&uacute;p c&aacute;c bậc phụ huynh c&oacute; c&aacute;i nh&igrave;n to&agrave;n diện v&agrave; đ&uacute;ng đắn về kỹ năng sống cho trẻ. Mỗi trẻ sẽ bộc lộ c&aacute;c kỹ năng sống kh&aacute;c nhau t&ugrave;y theo từng ho&agrave;n cảnh, độ tuổi. Tuy nhi&ecirc;n để trẻ ph&aacute;t triển to&agrave;n diện cả về thể chất v&agrave; tinh thần, ba mẹ n&ecirc;n r&egrave;n luyện kỹ năng sống cho trẻ ngay từ nhỏ, nhất l&agrave; độ tuổi mẫu gi&aacute;o.</p>\n', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newscategory`
--

CREATE TABLE `newscategory` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `newscategory`
--

INSERT INTO `newscategory` (`ID`, `NAME`) VALUES
(1, 'Tin nội bộ'),
(2, 'Cẩm nang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `IMAGE` varchar(100) DEFAULT NULL,
  `TITLE` varchar(100) DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `DISCRIPTION` text DEFAULT NULL,
  `ID_CATEGORY` int(11) DEFAULT NULL,
  `ID_STORE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID`, `IMAGE`, `TITLE`, `PRICE`, `QUANTITY`, `DISCRIPTION`, `ID_CATEGORY`, `ID_STORE`) VALUES
(1, 'dochoitheophim_01.jpg', 'Đồ chơi lắp ráp Gunpla - SD GUNDAM EX-STANDARD RX-93 Νgundam', 340000, 10, '<p><strong>Đồ chơi lắp r&aacute;p Gunpla - SD GUNDAM EX-STANDARD RX-93 &Nu;gundam 5060928</strong>&nbsp;l&agrave; sản phẩm của nh&atilde;n h&agrave;ng Gundam thuộc thương hiệu Bandai nổi tiếng tại Nhật Bản. Đồ chơi m&ocirc; h&igrave;nh n&agrave;y lấy cảm hứng từ bộ phim hoạt h&igrave;nh Gundam</p>\n\n<p>Đến với bộ đồ chơi sưu tập n&agrave;y, b&eacute; sẽ c&oacute; cơ hội sở hữu một trong v&ocirc; số người m&aacute;y mạnh mẽ của Gundam trong si&ecirc;u phẩm phim hoạt h&igrave;nh bộ phim hoạt h&igrave;nh Gundam<br />\nĐược sản xuất theo c&ocirc;ng nghệ đồ chơi Nhật Bản,Đồ chơi lắp r&aacute;p Gunpla - SD GUNDAM EX-STANDARD RX-93 &Nu;gundam 5060928 g&acirc;y ấn tượng với những đặc điểm nổi bật sau đ&acirc;y:<br />\n- Thiết kế m&ocirc; phỏng theo người m&aacute;y Gundam trong phim hoạt h&igrave;nh, từng chi tiết điều tinh xảo v&agrave; ch&iacute;nh x&aacute;c. V&igrave; vậy, Đồ chơi lắp r&aacute;p Gunpla - SD GUNDAM EX-STANDARD RX-93 &Nu;gundam 5060928 như bước ra từ những tập phim hoạt h&igrave;nh chắc chắn sẽ khiến b&eacute; th&iacute;ch th&uacute;.<br />\n- Sản phẩm được l&agrave;m bằng chất liệu nhựa cao cấp, kh&ocirc;ng chứa chất độc hại. &Aacute;p dụng c&aacute;ch lắp r&aacute;p từng chi tiết v&agrave; di chuyển cử động ri&ecirc;ng biệt với từng sản phẩm<br />\n- Mỗi người m&aacute;y Gundam đều c&oacute; sức mạnh v&agrave; khả năng xuất chi&ecirc;u di chuyển ri&ecirc;ng biệt. Sở hữuĐồ chơi lắp r&aacute;p Gunpla - SD GUNDAM EX-STANDARD RX-93 &Nu;gundam 5060928 tăng bộ sưu tập Gundam của b&eacute;. Sản phảm khuyến kh&iacute;ch c&aacute;c b&eacute; học tập tư duy logic tỉ mỉ v&agrave; tinh thần từ c&aacute;c nh&acirc;n vật trong Gundam. Hơn nữa, b&eacute; sẽ được thỏa th&iacute;ch chơi đ&ugrave;a, tr&ograve; chuyện hoặc h&oacute;a th&acirc;n trở th&agrave;nh c&aacute;c nh&acirc;n vật Gundam. Từ đ&oacute; k&iacute;ch th&iacute;ch tr&iacute; tưởng tượng v&agrave; s&aacute;ng tạo của trẻ bay cao bay xa.</p>\n', 1, 1),
(2, 'dochoitheophim_02.jpg', 'Mô hình Bumblebee dòng Studio Deluxe TF6', 969000, 33, '<p>Nh&acirc;n vật thuộc d&ograve;ng Studio Deluxe c&oacute; k&iacute;ch thước 4,5 inch. Lấy cảm hứng từ những cảnh phim mang t&iacute;nh biểu tượng, được thiết kế với th&ocirc;ng số kỹ thuật v&agrave; chi tiết với độ ch&iacute;nh x&aacute;c cao, để t&aacute;i hiện vũ trụ điện ảnh Transformers ngay tr&ecirc;n ch&iacute;nh b&agrave;n trưng b&agrave;y của bạn. Tỷ lệ h&igrave;nh ảnh phản &aacute;nh k&iacute;ch thước của nh&acirc;n vật Bumblebee trong thế giới của Transformers. H&igrave;nh vẽ v&agrave; bao b&igrave; được lấy cảm hứng từ cảnh th&aacute;c Cybertron trong phim. Ph&ocirc;ng nền trưng b&agrave;y c&oacute; thể th&aacute;o rời, t&aacute;i hiện cảm Bumblebee trong cảnh Th&aacute;c Cybertron. Với 20 bước chuyển đổi, sản phẩm l&agrave; lựa chọn ho&agrave;n hảo cho những người h&acirc;m mộ đang t&igrave;m kiếm mức độ chơi kh&oacute; hơn. D&agrave;nh cho người lớn v&agrave; trẻ em từ 8 tuổi trở l&ecirc;n.</p>\n', 1, 1),
(3, 'dochoitheophim_03.jpg', 'Robot siêu khủng long Brachio cuồng phong cùng siêu nhân Max', 350000, 72, '<p>Đồ chơi Robot si&ecirc;u khủng long Stego băng gi&aacute; c&ugrave;ng si&ecirc;u nh&acirc;n Max can đảm 304037 l&agrave; d&ograve;ng sản phẩm Robot của thương hiệu MINI FORCE trong bộ phim hoạt h&igrave;nh nổi tiếng Số 1 H&agrave;n Quốc MINIFORCE - BIỆT ĐỘ SI&Ecirc;U NH&Acirc;N NH&Iacute;</p>\n\n<p>Bộ phim với c&aacute;c bạn nh&iacute; biến th&agrave;nh si&ecirc;u nh&acirc;n anh h&ugrave;ng lu&ocirc;n sẵn s&agrave;ng chiến đấu bảo vệ th&agrave;nh phố của m&igrave;nh khỏi khỏi thế lực hắc &aacute;m.Sự trở lại phần 2 với phi&ecirc;n bản n&acirc;ng cấp hơn. C&aacute;c si&ecirc;u nh&acirc;n v&agrave; khủng long kết hợp lại th&agrave;nh SI&Ecirc;U ROBOT mang đến sức mạnh v&ocirc; địch, tinh nhuệ bảo vệ Th&agrave;nh Phố.<br />\n<br />\nĐồ chơi Robot si&ecirc;u khủng long Stego băng gi&aacute; c&ugrave;ng si&ecirc;u nh&acirc;n Max can đảm 304037 thuộc d&ograve;ng sản phẩm nhập vai, với thiết kế tinh tế, c&aacute;c khớp chắc chắn:</p>\n\n<p>L&agrave; phim hoạt h&igrave;nh nổi tiếng số 1 tại H&Agrave;N QUỐC với c&aacute;c bạn nh&iacute; biến th&agrave;nh si&ecirc;u nh&acirc;n anh h&ugrave;ng lu&ocirc;n sẵn s&agrave;ng chiến đấu bảo vệ th&agrave;nh phố của m&igrave;nh khỏi khỏi thế lực hắc &aacute;m.Sự trở lại phần 2 với phi&ecirc;n bản n&acirc;ng cấp hơn. C&aacute;c si&ecirc;u nh&acirc;n v&agrave; khủng long kết hợp lại th&agrave;nh SI&Ecirc;U ROBOT mang đến sức mạnh v&ocirc; địch, tinh nhuệ bảo vệ Th&agrave;nh Phố.</p>\n\n<p>Đồ chơi Robot si&ecirc;u khủng long Brachio cuồng phong c&ugrave;ng si&ecirc;u nh&acirc;n Max can đảm với thiết kế tinh tế, c&aacute;c khớp chắc chắn:</p>\n\n<p>- Khủng long Brachio Cuồng phong v&agrave; si&ecirc;u nh&acirc;n Max Can đảm kết hợp biến h&igrave;nh th&agrave;nh SI&Ecirc;U ROBOT KHỦNG LONG</p>\n\n<p>- C&aacute;c khớp linh hoạt, biến h&oacute;a nhanh ch&oacute;ng, chuẩn bị chiến đấu chống c&aacute;c thế lực b&oacute;ng tối</p>\n\n<p>- Sản phẩm bao gồm một khủng long, một si&ecirc;u nh&acirc;n.<br />\n<br />\nSản phẩm gi&uacute;p trẻ em tư duy logic để lắp r&aacute;p, ph&aacute;t triển đ&ocirc;i tay kh&eacute;o l&eacute;o v&agrave; h&oacute;a th&acirc;n v&agrave;o nh&acirc;n vật anh h&ugrave;ng với c&aacute;c t&iacute;nh c&aacute;ch tốt, mang lại h&ograve;a b&igrave;nh cho thế giới<br />\n<br />\nSản phẩm l&agrave;m bằng chất liệu nhựa cao cấp, an to&agrave;n cho trẻ</p>\n', 1, 1),
(4, 'dochoitheophim_04.jpg', 'Đàn phím điện tử của Peppa Pig', 579000, 30, '<h2>Đồ Chơi PEPPA PIG Đ&agrave;n Ph&iacute;m Điện Tử&nbsp; Của Peppa Pig 1684242INF19</h2>\n\n<p>Sản phẩm Đ&Agrave;N PH&Iacute;M ĐIỆN TỬ CỦA PEPPA PIG sản xuất dựa tr&ecirc;n phim hoạt h&igrave;nh nổi tiếng Nước Anh PEPPA PIG được c&aacute;c em b&eacute; PRESCHOOL y&ecirc;u th&iacute;ch tr&ecirc;n to&agrave;n thế giới.<br />\nSản phẩm Đ&Agrave;N PH&Iacute;M ĐIỆN TỬ 1684242INF19 l&agrave; sản phẩm theo phim. Đ&acirc;y c&ograve;n l&agrave; sản phẩm nhập vai kh&ocirc;ng thể thiếu cho c&aacute;c b&eacute; mầm non<br />\n- Đ&agrave;n ph&iacute;m điện tử của Peppa Pig l&agrave; một c&acirc;y đ&agrave;n piano đầu ti&ecirc;n ho&agrave;n hảo cho bất kỳ nhạc sĩ nhỏ tuổi n&agrave;o.<br />\n- Bật để nghe giai điệu chủ đề Peppa Pig. Với 8 nốt nhạc, chơi v&agrave; tạo giai điệu của ri&ecirc;ng bạn bằng c&aacute;ch nhấn c&aacute;c ph&iacute;m.<br />\n- Xoay v&agrave; xoay những người bạn của Peppa: George, Rebecca Rabbit v&agrave; Candy Cat! Thật bất ngờ, c&aacute;c bạn nhảy m&uacute;a tr&ecirc;n giai điệu Peppa Pig.<br />\n- Sản phẩm gi&uacute;p b&eacute; ph&aacute;t triển nhịp điệu, phối hợp tay mắt v&agrave; kỹ năng vận động.<br />\n- Y&ecirc;u cầu 2 x pin AA (bao gồm). Th&iacute;ch hợp cho lứa tuổi từ 18 th&aacute;ng trở l&ecirc;n.<br />\n- Sản phẩm l&agrave;m từ nhựa cao cấp, an to&agrave;n cho b&eacute;.</p>\n', 1, 1),
(5, 'dochoitheophim_05.jpg', 'Trang bị Spider man phóng tơ siêu chuẩn', 529000, 19, '<h2>Đồ Chơi SPIDERMAN Trang Bị Spider Man Ph&oacute;ng Tơ Si&ecirc;u Chuẩn E8735/E8361</h2>\n\n<p><strong>Trang bị Spider man ph&oacute;ng tơ si&ecirc;u chuẩn E8735/E8361</strong>&nbsp;l&agrave; sản phẩm của thương hiệu Spiderman nổi tiếng tại Mỹ. Đồ chơi m&ocirc; h&igrave;nh n&agrave;y lấy cảm hứng từ những bộ phim si&ecirc;u anh h&ugrave;ng Spiderman nổi tiếng của h&atilde;ng Marvel mang đến nhiều bất ngờ th&uacute; vị cho c&aacute;c b&eacute; trai.</p>\n\n<p>Đến với bộ đồ chơi sưu tập n&agrave;y, b&eacute; sẽ c&oacute; cơ hội sở hữu một trong số 3 vũ kh&iacute; của Spiderman trong si&ecirc;u phẩm điện ảnh Spiderman Far From Home. Được sản xuất theo bản quyền của Marvel, Trang bị Spider man ph&oacute;ng tơ si&ecirc;u chuẩn E8735/E8361 g&acirc;y ấn tượng với những đặc điểm nổi bật sau đ&acirc;y:</p>\n\n<p>- Thiết kế m&ocirc; phỏng theo vũ kh&iacute; Spiderman trong phim, từng chi tiết điều tinh xảo v&agrave; đẹp mắt. V&igrave; vậy, Trang bị Spider man ph&oacute;ng tơ si&ecirc;u chuẩn E8735/E8361 như bước ra từ những thước phim điện ảnh chắc chắn sẽ khiến b&eacute; th&iacute;ch th&uacute;.</p>\n\n<p>- Sản phẩm được l&agrave;m bằng chất liệu nhựa cao cấp, kh&ocirc;ng chứa chất độc hại. C&aacute;c g&oacute;c cạnh được bo tr&ograve;n với bề mặt nhẵn tạo sự an to&agrave;n, kh&ocirc;ng l&agrave;m trầy xước da khi b&eacute; chơi.</p>\n\n<p>- Mỗi vũ kh&iacute; của Spiderman đều c&oacute; sức mạnh v&agrave; c&aacute;ch sử dụng ri&ecirc;ng biệt. Sử dụng bộ đồ chơi Trang bị Spider man ph&oacute;ng tơ si&ecirc;u chuẩn E8735/E8361 sẽ khuyến kh&iacute;ch c&aacute;c b&eacute; học tập c&aacute;c đức t&iacute;nh tốt của Spiderman. Hơn nữa, b&eacute; sẽ được thỏa th&iacute;ch chơi đ&ugrave;a, tr&ograve; chuyện hoặc h&oacute;a th&acirc;n trở th&agrave;nh si&ecirc;u anh h&ugrave;ng Spiderman. Từ đ&oacute; k&iacute;ch th&iacute;ch tr&iacute; tưởng tượng v&agrave; s&aacute;ng tạo của trẻ bay cao bay xa.</p>\n\n<p><strong>Trang bị Spider man ph&oacute;ng tơ si&ecirc;u chuẩn E8735/E8361</strong>&nbsp;bao gồm:<br />\n- 01 vũ kh&iacute; ch&iacute;nh<br />\n- 03 vi&ecirc;n xốp</p>\n', 1, 1),
(22, 'dodunghoctap_01.jpg', 'Ba lô Classy - L.O.L Surprise Glee Club Ba lô Classy - L.O.L Surprise Glee Club', 800000, 230, '<h2>Ba L&ocirc; CLEVER HIPPO Classy - L.O.L Surprise Glee Club BL1212/PINK</h2>\n\n<p>H&igrave;nh ảnh những c&ocirc; n&agrave;ng c&aacute; t&iacute;nh v&agrave; thời trang L.O.L Surprise! nay đ&atilde; xuất hiện tr&ecirc;n những chiếc ba l&ocirc; chống g&ugrave; cao cấp CLASSY. Đ&acirc;y ch&iacute;nh l&agrave; d&ograve;ng sản phẩm được cả b&eacute; &amp; mẹ đều y&ecirc;u th&iacute;ch bởi t&ocirc;ng m&agrave;u pastel ngọt ng&agrave;o, v&ocirc; c&ugrave;ng nữ t&iacute;nh, ph&ugrave; hợp với sở th&iacute;ch của c&aacute;c b&eacute;, c&ugrave;ng với chất lượng vượt trội, đ&aacute;p ứng đ&uacute;ng y&ecirc;u cầu của mẹ<br />\n- K&iacute;ch thước sản phẩm: 22 x 28 x 38 (cm). Th&iacute;ch hợp cho b&eacute; từ lớp 3 đến lớp 6.<br />\n- Trọng lượng sản phẩm: 830g</p>\n', 3, 1),
(24, 'dodunghoctap_02.jpg', 'Móc khóa Pom Pom - Cutie buddies', 62000, 250, '<h2>Đồ Chơi CLEVER HIPPO M&oacute;c Kh&oacute;a Pom Pom - Cutie Buddies POMPOM/KCP2403</h2>\n\n<p>M&oacute;c kh&oacute;a treo v&agrave; trang tr&iacute; Pom Pom si&ecirc;u đ&aacute;ng y&ecirc;u c&ugrave;ng c&aacute;c m&agrave;u sắc kh&aacute;c nhau với nhiều đặc điểm nổi bật:<br />\n&bull; H&igrave;nh ảnh si&ecirc;u đ&aacute;ng y&ecirc;u: kỳ l&acirc;n lấp l&aacute;nh, bạn m&egrave;o dễ thương hay c&aacute;nh cụt cực ngộ nghĩnh<br />\n&bull; Chất liệu giả l&ocirc;ng an to&agrave;n, kh&ocirc;ng bị bay m&agrave;u sau qu&aacute; tr&igrave;nh sử dụng. L&ocirc;ng mềm mượt, nhỏ gọn.<br />\n&bull; Phần l&ocirc;ng mềm mượt, chạm v&agrave;o si&ecirc;u th&iacute;ch<br />\nM&oacute;c kh&oacute;a đ&aacute;ng y&ecirc;u n&agrave;y hứa hẹn sẽ l&agrave; phụ kiện cực hot cho c&aacute;c b&eacute; g&aacute;i.</p>\n', 3, 1),
(26, 'dodunghoctap_03.jpg', 'Kool Urban - Ba lô Roller Đen Kool Urban - Ba lô Roller Đen', 629000, 256, '<p>Bộ sưu ba l&ocirc; KOOL URBAN đến từ thương hiệu Clever Hippo d&agrave;nh ri&ecirc;ng cho c&aacute;c bạn trẻ năng động, c&aacute; t&iacute;nh, được thiết kế với c&aacute;c t&ocirc;ng m&agrave;u hiện đại v&agrave; họa tiết &quot;on trend&quot;, đi c&ugrave;ng kiểu d&aacute;ng thời trang. C&aacute;c sản phẩm trong KOOL URBAN ch&iacute;nh l&agrave; lựa chọn v&ocirc; c&ugrave;ng ph&ugrave; hợp để đồng h&agrave;nh c&ugrave;ng bạn kh&aacute;m ph&aacute; khắp nơi.<br />\nC&aacute;c d&ograve;ng ba l&ocirc; thời trang c&ograve;n c&oacute; nhiều t&iacute;nh năng nổi bật:<br />\n- Trọng lượng si&ecirc;u nhẹ, thiết kế năng động, thời trang, sử dụng được nhiều mục đ&iacute;ch v&agrave; trang phục kh&aacute;c nhau.<br />\n- C&aacute;c ngăn chứa rộng r&atilde;i; với thiết kế th&ocirc;ng minh mở nhanh từ b&ecirc;n h&ocirc;ng gi&uacute;p cất/lấy đồ nhanh ch&oacute;ng từ ba l&ocirc; m&agrave; kh&ocirc;ng cần mở ngăn ch&iacute;nh ph&iacute;a tr&ecirc;n như c&aacute;c ba l&ocirc; th&ocirc;ng thường kh&aacute;c<br />\n- Đựng vừa laptop 15 inches, th&ecirc;m ngăn đựng cục sạc k&egrave;m theo, đảm bảo gọn g&agrave;ng v&agrave; an to&agrave;n cho c&aacute;c thiết bị điện tử của bạn<br />\n- Hỗ trợ 01 ngăn h&ocirc;ng may vải kh&aacute;ng khuẩn gi&uacute;p cất giữ khẩu trang an to&agrave;n.<br />\n- C&oacute; đệm lưng &ecirc;m &aacute;i, tho&aacute;ng kh&iacute; ở phần lưng &amp; vai, gi&uacute;p trợ lực &amp; tạo sự thoải m&aacute;i khi sử dụng<br />\n- Chất liệu polyester trượt nước, dễ d&agrave;ng vệ sinh.<br />\n- K&iacute;ch thước sản phẩm: 12 x 30 x 39 (cm)<br />\n- Trọng lượng: 550g</p>\n', 3, 1),
(27, 'dodunghoctap_04.jpg', 'Bộ bút màu sáng tạo - 40 màu kèm phụ kiện', 239000, 277, '<p>- Sản phẩm gồm: 20 m&agrave;u s&aacute;p, 10 m&agrave;u l&ocirc;ng c&oacute; thể tẩy rửa được, 10 m&agrave;u ch&igrave;, đồ chuốt v&agrave; giấy vẽ - B&eacute; c&oacute; thể tự do s&aacute;ng tạo những bức tranh độc đ&aacute;o của ri&ecirc;ng m&igrave;nh Th&ocirc;ng tin thương hiệu - Crayola l&agrave; thương hiệu b&uacute;t m&agrave;u h&agrave;ng đầu của Mỹ - Được b&igrave;nh chọn l&agrave; nh&atilde;n hiệu được c&aacute;c mẹ y&ecirc;u th&iacute;ch nhất tại Mỹ v&agrave; được giao vi&ecirc;n khuy&ecirc;n d&ugrave;ng - Sản phẩm được l&agrave;m từ nguy&ecirc;n liệu thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng chất độc hại, tuyệt đối an to&agrave;n cho b&eacute; với kiểm định AP về độ an to&agrave;n theo ti&ecirc;u chuẩn Mỹ tr&ecirc;n từng sản phẩmỹ tr&ecirc;n từng sản phẩm - Mỗi c&acirc;y b&uacute;t ch&igrave; m&agrave;u được sản xuất ra, Crayola cam kết sẽ trồng lại 1 c&acirc;y xanh - Tất cả c&aacute;c nh&agrave; m&aacute;y sản xuất b&uacute;t m&agrave;u Crayola đều sử dụng năng lượng mặt trời, bảo vệ m&ocirc;i trường</p>\n', 3, 1),
(30, 'dodunghoctap_05.jpg', 'Sổ có khóa – kì nhông đáng yêu', 329000, 555, '<p>- Cuốn nhật k&yacute; sang trọng c&oacute; h&igrave;nh dạng bạn kỳ nh&ocirc;ng với bộ l&ocirc;ng m&agrave;u hồng pastel dễ thương v&agrave; đ&ocirc;i tai lấp l&aacute;nh, tr&aacute;i tim đ&iacute;nh cườm nổi v&agrave; chiếc kh&oacute;a nhỏ c&oacute; k&egrave;m đ&aacute; sẽ gi&uacute;p c&aacute;c b&eacute; bảo vệ những điều ri&ecirc;ng tư thầm k&iacute;n - với k&iacute;ch thước 6 x 8 inch v&agrave; 160 trang giấy, b&eacute; thật dễ d&agrave;ng mang theo khi đi mọi nơi hoặc cất v&agrave;o một vị tr&iacute; b&iacute; mật n&agrave;o đ&oacute; trong nh&agrave;.</p>\n\n<p>- Đ&acirc;y l&agrave; cuốn sổ tay ho&agrave;n hảo cho c&aacute;c c&ocirc; b&eacute; kh&aacute;m ph&aacute; khả năng s&aacute;ng tạo của m&igrave;nh, viết nhật k&yacute; hay tự do s&aacute;ng t&aacute;c truyện hoặc thậm ch&iacute; nguệch ngoạc v&agrave; vẽ h&igrave;nh, sau đ&oacute; b&eacute; c&oacute; thể an t&acirc;m kh&oacute;a sổ lại một c&aacute;ch an to&agrave;n. V&agrave;, quyển sổ nhật k&yacute; kỳ nh&ocirc;ng đ&aacute;ng y&ecirc;u n&agrave;y kh&ocirc;ng chỉ để ghi ch&eacute;p, m&agrave; c&ograve;n l&agrave; nơi để c&ocirc; b&eacute; tự nhi&ecirc;n, dễ d&agrave;ng chia sẻ, b&agrave;y tỏ cảm x&uacute;c của bản th&acirc;n v&agrave; khai ph&aacute; tr&iacute; tưởng tượng của c&aacute;c em.</p>\n\n<p>Thương hiệu: 3C4G &ndash; Đến từ vương quốc Anh.</p>\n\n<p>Tuổi: 6+</p>\n\n<p>Giới t&iacute;nh: Nữ</p>\n', 3, 1),
(32, 'xedap_01.jpg', 'Xe đạp trẻ em Royal Baby Macaron 18 inch Cam', 3284000, 121, '<p>RoyalBaby l&agrave; thương hiệu chuy&ecirc;n sản xuất xe đạp trẻ em được y&ecirc;u th&iacute;ch nhất tại Bắc &Acirc;u. Nhờ tập trung v&agrave;o mảng xe đạp trẻ em, RoyalBaby nghi&ecirc;n cứu s&acirc;u v&agrave; thiết kế sản phẩm ph&ugrave; hợp với đặc điểm cơ thể v&agrave; nhu cầu của b&eacute;.</p>\n\n<p><strong>Đặc điểm nổi bật của sản phẩm:</strong></p>\n\n<ul>\n	<li>Ph&ugrave; hợp cho b&eacute; từ 5-8 tuổi.</li>\n	<li>Thiết kế ưu ti&ecirc;n an to&agrave;n của b&eacute;.</li>\n	<li>Lốp xe c&oacute; độ rộng 5.4cm đảm bảo an to&agrave;n hơn cho b&eacute;.</li>\n	<li>Phanh tay được thiết kế đặc biệt ph&ugrave; hợp với k&iacute;ch thước b&agrave;n tay v&agrave; lực b&oacute;p của b&eacute;.</li>\n	<li>X&iacute;ch c&oacute; hộp bảo vệ, tr&aacute;nh quần &aacute;o của b&eacute; mắc v&agrave;o v&ograve;ng x&iacute;ch g&acirc;y ra tai nạn kh&ocirc;ng đ&aacute;ng c&oacute;.</li>\n	<li>Lắp r&aacute;p trong 4 bước đơn giản: xe đ&atilde; được lắp r&aacute;p ho&agrave;n thiện 95%, gi&uacute;p bố mẹ tiết kiệm thời gian v&agrave; c&ocirc;ng sức.</li>\n	<li>Y&ecirc;n xe v&agrave; cổ xe dễ điều chỉnh độ cao ph&ugrave; hợp với c&aacute;c b&eacute; c&oacute; chiều cao kh&aacute;c nhau, hoặc khi chiều cao của b&eacute; ph&aacute;t triển.</li>\n	<li>Rất ph&ugrave; hợp l&agrave;m m&oacute;n qu&agrave; đặc biệt d&agrave;nh tặng cho b&eacute;.</li>\n	<li>Size 18&quot; v&agrave; 20&quot; KH&Ocirc;NG C&Oacute; b&aacute;nh phụ</li>\n</ul>\n\n<p><strong>CHẾ ĐỘ BẢO H&Agrave;NH:</strong></p>\n\n<ul>\n	<li><strong>KHUNG XE:&nbsp;</strong>Được bảo h&agrave;nh miến ph&iacute; trong thời gian 5 năm kể từ ng&agrave;y mua h&agrave;ng đầu ti&ecirc;n.</li>\n	<li><strong>RU&Ocirc;T V&Agrave; LỐP XE:</strong>&nbsp;Được bảo h&agrave;nh miễn ph&iacute; trong thời gian 30 ng&agrave;y kể từ ng&agrave;y mua h&agrave;ng đầu ti&ecirc;n.</li>\n	<li><strong>PHỤ T&Ugrave;NG KH&Aacute;C:</strong>&nbsp;Bao gồm tất cả phụ t&ugrave;ng của xe (ngoại từ vỏ v&agrave; ruột b&aacute;nh) đều được bảo h&agrave;nh miễn ph&iacute; trong thời gian 60 ng&agrave;y kể từ ng&agrave;y mua h&agrave;ng đầu ti&ecirc;n.&nbsp;</li>\n</ul>\n', 4, 1),
(33, 'xedap_02.jpg', 'Xe chòi chân 2 trong 1 cho bé', 1199000, 65, '<p>*Sản phẩm chịu được tải trọng được 50kg.</p>\n\n<p>*Tay cầm chắc chắn an to&agrave;n cho b&eacute;</p>\n\n<p>*Xe gi&uacute;p b&eacute; ph&aacute;t triển về vận động tinh v&agrave; vận động th&ocirc;</p>\n\n<p>*Sản phẩm&nbsp; vừa l&agrave;m xe đẩy ch&acirc;n cho b&eacute; v&agrave; cũng c&oacute; thể l&agrave;m bập b&ecirc;nh cho b&eacute; chỉ bằng một bước lắp r&aacute;p đơn giản ba mẹ c&oacute; thể l&agrave;m tại nh&agrave;.</p>\n\n<p>*Sản phẩm khuyến kh&iacute;ch b&eacute; vận động nhiều hơn.</p>\n\n<p>* Th&ugrave;ng xe rộng r&atilde;i ba mẹ c&oacute; thể đựng, cất đồ của b&eacute;</p>\n\n<p>* Sản phẩm ph&ugrave; hợp cho b&eacute; từ 3 tuổi</p>\n', 4, 1),
(34, 'xedap_03.jpg', 'Patin Neon Inline Yvolution xanh dương NT07B4-size 4-7 tuổi', 1519000, 350, '<p>Thương hiệu Yvolution l&agrave; thương hiệu đồ chơi vận động ngo&agrave;i trời nổi tiếng từ Ch&acirc;u &Acirc;u. C&aacute;c sản phẩm được thiết kế tỉ mỉ, trau chuốt cho từng chi tiết đảm bảo t&iacute;nh an to&agrave;n tuyệt đối v&agrave; trải nghiệm ho&agrave;n hảo.</p>\n\n<p>Patin Neon Inline m&agrave;u xanh dương - NT07B4 d&agrave;nh cho b&eacute; từ 4-7 tuổi l&agrave; một trong những d&ograve;ng sản phẩm b&aacute;n chạy nhất:</p>\n\n<p>-&nbsp; Đ&egrave;n Led dưới b&aacute;nh xe, kh&ocirc;ng cần pin, s&aacute;ng khi chuyển động</p>\n\n<p>-&nbsp; B&aacute;nh xe l&agrave;m bằng PU gi&uacute;p di chuyển &ecirc;m &aacute;i, giảm tiếng ồn, độ bền tốt</p>\n\n<p>-&nbsp; C&oacute; thể điều chỉnh k&iacute;ch thước, &ocirc;m trọn b&agrave;n ch&acirc;n gi&uacute;p b&eacute; di chuyển một c&aacute;ch thoải m&aacute;i</p>\n\n<p>-&nbsp; Phanh g&oacute;t dễ d&agrave;ng điều khiển đảm bảo an to&agrave;n tuyệt đối</p>\n\n<p>-&nbsp; M&agrave;u sắc độc đ&aacute;o, thiết kế nổi bật</p>\n\n<p><strong>Th&ocirc;ng tin chi tiết:</strong></p>\n\n<p>- Tải trọng tối đa: 50kg</p>\n\n<p>- Tuổi: 4+</p>\n\n<p>- K&iacute;ch thước sản phẩm: 320 x 108 x 250mm</p>\n\n<p>- K&iacute;ch thước b&aacute;nh xe: 65 x 65mm</p>\n\n<p>- Trọng lượng sản phẩm: 1.7kg</p>\n\n<p>- K&iacute;ch thước hộp sản phẩm: 500 x 110 x 285mm</p>\n\n<p><strong>Th&ocirc;ng tin kỹ thuật:</strong></p>\n\n<p>- Chất liệu: Nhựa PP</p>\n\n<p>- B&aacute;nh xe: 4 b&aacute;nh: 2 b&aacute;nh PU, 2 b&aacute;nh đ&egrave;n Led</p>\n\n<p><strong>Th&ocirc;ng tin cảnh b&aacute;o:</strong></p>\n\n<p>-&nbsp; C&oacute; chi tiết nhỏ. Kh&ocirc;ng th&iacute;ch hợp cho trẻ dưới 3 tuổi.</p>\n\n<p>- D&agrave;nh cho trẻ c&oacute; khối lượng tối đa 50 Kg.</p>\n\n<p>- Chỉ sử dụng dưới sự gi&aacute;m s&aacute;t của người lớn.</p>\n\n<p>-&nbsp; Cần mang thiết bị bảo vệ khi sử dụng sản phẩm, kh&ocirc;ng sử dụng thiết bị tham gia giao th&ocirc;ng,</p>\n\n<p>-&nbsp; Kh&ocirc;ng chơi patin v&agrave;o buổi tối.</p>\n\n<p>- Kiểm tra kỹ phần b&aacute;nh xe v&agrave; thắng trước khi d&ugrave;ng, sau đ&oacute; b&eacute; mang gi&agrave;y v&agrave;o ch&acirc;n v&agrave; trượt với mục đ&iacute;ch thể thao v&agrave; tr&ecirc;n bề mặt bằng phẳng, sạch sẽ, tr&aacute;nh xa đường lớn</p>\n', 4, 1),
(37, 'xedap_04.jpg', 'Xe trượt Scooter trẻ em có đèn màu Xanh- có điều chỉnh độ', 615000, 100, '<p>RoyalBaby l&agrave; thương hiệu xe đạp trẻ em được y&ecirc;u th&iacute;ch nhất khu vực Bắc &Acirc;u v&agrave; b&aacute;n chạy tr&ecirc;n Amazon trong nhiều năm liền. Khung xe l&agrave;m bằng th&eacute;p cường lực, lắp r&aacute;p bằng robot, tải trọng 2 người lớn đảm bảo an to&agrave;n tuyệt đối cho b&eacute;.&nbsp;</p>\n\n<h3>Điểm nổi bật của sản phẩm:</h3>\n\n<ul>\n	<li>Phanh tay được thiết kế đặc biệt ph&ugrave; hợp với k&iacute;ch thước b&agrave;n tay v&agrave; lực b&oacute;p của b&eacute;</li>\n	<li>Lốp xe bơm hơi bản rộng gi&uacute;p giữ thăng bằng tốt hơn</li>\n	<li>B&agrave;n đạp nhựa chống trượt</li>\n	<li>Hai b&aacute;nh phụ dễ d&agrave;ng th&aacute;o lắp</li>\n	<li>Y&ecirc;n xe v&agrave; cổ xe c&oacute; thể thay đổi chiều cao ph&ugrave; hợp với chiều cao của b&eacute;</li>\n	<li>Xe đ&atilde; được lắp r&aacute;p 95% gi&uacute;p bố mẹ tiết kiệm thời gian lắp r&aacute;p</li>\n	<li>Phụ kiện bao gồm: Chu&ocirc;ng, ch&acirc;n chống (với c&aacute;c size 16&rdquo; v&agrave; 18&rdquo;), lục gi&aacute;c, cờ l&ecirc;.&nbsp;</li>\n</ul>\n', 4, 1),
(39, 'xedap_05.jpg', 'Xe điện Mercedes Maybach 2 chỗ', 6999000, 40, '<p><strong>Xe điện Mercedes &ndash; Maybach G650 Landaulet &ndash; Đẳng cấp, thanh lịch, thời lượng</strong></p>\n\n<p>Sản phẩm đẳng cấp cho b&eacute; s&agrave;nh điệu</p>\n\n<p>Ph&ugrave; hợp cho b&eacute; 3 tuổi trở l&ecirc;n</p>\n\n<p>B&eacute; c&oacute; thể tự l&aacute;i hoặc bố mẹ c&oacute; thể điều khiển bằng điều khiển từ xa 2.4G</p>\n\n<p>C&oacute; thể di chuyển tới - l&ugrave;i</p>\n\n<p>Tải trọng tối đa: 30kg</p>\n\n<p>Xe c&oacute; tiện &iacute;ch nổi bật:</p>\n\n<p>- Lốp xe bằng cao su Eva, c&oacute; bộ giảm x&oacute;c</p>\n\n<p>- Ghế ngồi bằng da, c&oacute; đai an to&agrave;n</p>\n\n<p>-&nbsp; Bộ điều khiển: Cổng USB, Đầu ph&aacute;t nhạc bằng blue-tooth c&oacute; thể điều chỉnh &acirc;m thanh</p>\n\n<p>-&nbsp; Hộc đựng ph&iacute;a sau rộng r&atilde;i</p>\n\n<p>Th&ocirc;ng số động cơ:</p>\n\n<p>-&nbsp; Pin: 12V4.5ah*1 c&oacute; thể sử dụng li&ecirc;n tục hơn 1 giờ</p>\n\n<p>-&nbsp; Động cơ l&aacute;i: 12V390 (16000 rev)*2</p>\n\n<p>-&nbsp; Động cơ trợ lực: 12V380 (5000 rev)</p>\n\n<p>-&nbsp; &nbsp;Cục sạc: 12V500mA</p>\n\n<p>K&iacute;ch thước:</p>\n\n<p>-&nbsp; K&iacute;ch thước sản phẩm: 110 * 62 * 52cm</p>\n\n<p>-&nbsp; &nbsp;K&iacute;ch thước th&ugrave;ng h&agrave;ng: 110 * 60 * 32cm</p>\n\n<p>-&nbsp; &nbsp;C&acirc;n nặng: 15kg</p>\n\n<p><strong>V&agrave;i n&eacute;t về thương hiệu:</strong></p>\n\n<p>PEEK A BOO l&agrave; thương hiệu đồ chơi - đồ d&ugrave;ng trẻ em với mong muốn mang lại tất cả những sản phẩm cần thiết nhất tr&ecirc;n từng chặng đường ph&aacute;t triển của b&eacute; với chất lượng tốt, an to&agrave;n, gi&aacute; cả phải chăng.&nbsp;</p>\n', 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productcategory`
--

CREATE TABLE `productcategory` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `productcategory`
--

INSERT INTO `productcategory` (`ID`, `NAME`) VALUES
(1, 'Đồ chơi theo phim'),
(3, 'Đồ dùng học tập'),
(4, 'Xe đạp & scooter');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(11) NOT NULL,
  `description` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`ID_ROLE`, `description`) VALUES
(0, 'quản Lý'),
(1, 'kế toán'),
(2, 'kho'),
(3, 'bán hàng'),
(4, 'biên tập');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PWD` varchar(100) DEFAULT NULL,
  `FULLNAME` varchar(100) DEFAULT NULL,
  `ID_ROLE` int(11) DEFAULT NULL,
  `IMAGE` varchar(222) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`ID`, `USERNAME`, `PWD`, `FULLNAME`, `ID_ROLE`, `IMAGE`) VALUES
(1, 'admin1', 'admin1', 'Nguyễn Vĩnh Nghi', 0, 'user.png'),
(4, 'admin4', 'admin4', 'Quế Chi', 0, 'user.png'),
(12, 'admin6', 'admin6', 'Quang Vũ', 0, 'user.png'),
(15, 'banhang', 'banhang', 'Vĩnh Nghi', 3, 'user.png'),
(16, 'bientap', 'bientap', 'Quế Chi', 4, 'user.png'),
(17, 'kho', 'khokho', 'Quang Vũ', 2, 'user.png'),
(19, 'ketoan', 'ketoan1', 'Vĩnh Nghi', 1, 'user.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store`
--

CREATE TABLE `store` (
  `ID` int(11) NOT NULL,
  `ID_MANAGER` int(11) NOT NULL,
  `NAME_STORE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ADDRESS` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `store`
--

INSERT INTO `store` (`ID`, `ID_MANAGER`, `NAME_STORE`, `ADDRESS`) VALUES
(1, 1, 'cửa hàng Q7', 'Tân phong, Q7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wareshousereceipt`
--

CREATE TABLE `wareshousereceipt` (
  `ID` int(11) NOT NULL,
  `STAFF_ID` int(11) DEFAULT NULL,
  `RECEIVED_DATE` date DEFAULT NULL,
  `DELIVERY_PLACE` varchar(200) DEFAULT NULL,
  `PHONE` varchar(10) DEFAULT NULL,
  `TOTAL` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `wareshousereceipt`
--

INSERT INTO `wareshousereceipt` (`ID`, `STAFF_ID`, `RECEIVED_DATE`, `DELIVERY_PLACE`, `PHONE`, `TOTAL`) VALUES
(12, 17, '2022-06-05', 'Tp.HCM', '0001110001', 3400000),
(13, 17, '2022-06-05', 'Nghệ An', '0001110001', 19380000),
(14, 17, '2022-06-05', 'Sóc Trăng', '0001110001', 24500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wareshousereceiptdetails`
--

CREATE TABLE `wareshousereceiptdetails` (
  `ID` int(11) NOT NULL,
  `WR_ID` int(11) DEFAULT NULL,
  `PRODUCT_ID` int(11) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `wareshousereceiptdetails`
--

INSERT INTO `wareshousereceiptdetails` (`ID`, `WR_ID`, `PRODUCT_ID`, `QUANTITY`, `PRICE`) VALUES
(120, 12, 1, 10, 3400000),
(121, 13, 2, 20, 19380000),
(122, 14, 3, 70, 24500000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CUSTOMER_ID` (`CUSTOMER_ID`),
  ADD KEY `CUSTOMER_ID_2` (`CUSTOMER_ID`,`STAFF_ID`),
  ADD KEY `STAFF_ID` (`STAFF_ID`);

--
-- Chỉ mục cho bảng `billdetails`
--
ALTER TABLE `billdetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BILL_ID` (`BILL_ID`,`PRODUCT_ID`),
  ADD KEY `PRODUCT_ID` (`PRODUCT_ID`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_PRODUCT` (`ID_PRODUCT`,`ID_CUSTOMER`),
  ADD KEY `ID_CUSTOMER` (`ID_CUSTOMER`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_NEWS_CATEGORY` (`ID_NEWS_CATEGORY`),
  ADD KEY `ID_STAFF` (`ID_STAFF`);

--
-- Chỉ mục cho bảng `newscategory`
--
ALTER TABLE `newscategory`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_CATEGORY` (`ID_CATEGORY`,`ID_STORE`),
  ADD KEY `ID_STORE` (`ID_STORE`);

--
-- Chỉ mục cho bảng `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD KEY `ID_ROLE` (`ID_ROLE`);

--
-- Chỉ mục cho bảng `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_MANAGER` (`ID_MANAGER`);

--
-- Chỉ mục cho bảng `wareshousereceipt`
--
ALTER TABLE `wareshousereceipt`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `STAFF_ID` (`STAFF_ID`);

--
-- Chỉ mục cho bảng `wareshousereceiptdetails`
--
ALTER TABLE `wareshousereceiptdetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `WR_ID` (`WR_ID`,`PRODUCT_ID`),
  ADD KEY `WR_ID_2` (`WR_ID`),
  ADD KEY `WR_ID_3` (`WR_ID`),
  ADD KEY `PRODUCT_ID` (`PRODUCT_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `billdetails`
--
ALTER TABLE `billdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `newscategory`
--
ALTER TABLE `newscategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `store`
--
ALTER TABLE `store`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `wareshousereceipt`
--
ALTER TABLE `wareshousereceipt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `wareshousereceiptdetails`
--
ALTER TABLE `wareshousereceiptdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`STAFF_ID`) REFERENCES `staff` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `billdetails`
--
ALTER TABLE `billdetails`
  ADD CONSTRAINT `billdetails_ibfk_1` FOREIGN KEY (`BILL_ID`) REFERENCES `bill` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `billdetails_ibfk_2` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`ID_PRODUCT`) REFERENCES `product` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ID_CUSTOMER`) REFERENCES `customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_id_newscategory` FOREIGN KEY (`ID_NEWS_CATEGORY`) REFERENCES `newscategory` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_staff` FOREIGN KEY (`ID_STAFF`) REFERENCES `staff` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ID_CATEGORY`) REFERENCES `productcategory` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`ID_STORE`) REFERENCES `store` (`ID`);

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`ID_ROLE`) REFERENCES `role` (`ID_ROLE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `fk_id_manager` FOREIGN KEY (`ID_MANAGER`) REFERENCES `staff` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `wareshousereceipt`
--
ALTER TABLE `wareshousereceipt`
  ADD CONSTRAINT `wareshousereceipt_ibfk_3` FOREIGN KEY (`STAFF_ID`) REFERENCES `staff` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `wareshousereceiptdetails`
--
ALTER TABLE `wareshousereceiptdetails`
  ADD CONSTRAINT `fk_wr_id` FOREIGN KEY (`WR_ID`) REFERENCES `wareshousereceipt` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wareshousereceiptdetails_ibfk_3` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
