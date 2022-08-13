-- MySQL dump 10.13  Distrib 5.7.18, for macos10.12 (x86_64)
--
-- Host: localhost    Database: order247
-- ------------------------------------------------------
-- Server version	5.7.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(500) NOT NULL,
  `email` varchar(500) DEFAULT NULL,
  `phone` text NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `metadata_customer` text,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (3,'Trịnh Việt Hưng','kkk@gmail.com','0987654321','hà nội',NULL),(4,'Trịnh Quyết Tiến','hoang9872@gmail.com','09876543211','hà nội',NULL),(5,'test 12313','123@gmail.com','0987654321','hà nội',NULL),(6,'kiki','kiki@gmail.com','123123123123','123123123',NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_products`
--

DROP TABLE IF EXISTS `customer_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_products` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_products`
--

LOCK TABLES `customer_products` WRITE;
/*!40000 ALTER TABLE `customer_products` DISABLE KEYS */;
INSERT INTO `customer_products` VALUES (3,4),(3,22),(3,23),(4,24),(3,25),(3,26),(3,24),(3,25),(3,26),(3,27),(3,28),(3,29),(3,30),(3,31),(4,32),(3,33);
/*!40000 ALTER TABLE `customer_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `options` (
  `key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `group` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES ('AboutUs','<div class=\"section product-section\">\r\n<div class=\"gutter\">\r\n<div class=\"pull-out\">\r\n<div class=\"pull-out-container\">\r\n<p class=\"pull-out__text\">Ch&agrave;o mừng bạn đến với guidereview!</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"section\">\r\n<div class=\"gutter\">\r\n<div class=\"thumbnail \">\r\n<div class=\"grid\">\r\n<div class=\"thumbnail__content\">\r\n<div class=\"rte\">\r\n<p>Ch&uacute;ng t&ocirc;i muốn giới thiệu cho bạn một ch&uacute;t về ch&uacute;ng t&ocirc;i &ndash; ch&uacute;ng t&ocirc;i l&agrave; ai, ch&uacute;ng t&ocirc;i l&agrave;m g&igrave; v&agrave; những g&igrave; l&agrave; quan trọng đối với ch&uacute;ng t&ocirc;i.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>',NULL,'aboutus','en'),('AboutUs','<div class=\"section product-section\">\r\n<div class=\"gutter\">\r\n<div class=\"pull-out\">\r\n<div class=\"pull-out-container\">\r\n<p class=\"pull-out__text\">Ch&agrave;o mừng bạn đến với guidereview!</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"section\">\r\n<div class=\"gutter\">\r\n<div class=\"thumbnail \">\r\n<div class=\"grid\">\r\n<div class=\"thumbnail__content\">\r\n<div class=\"rte\">\r\n<p>Ch&uacute;ng t&ocirc;i muốn giới thiệu cho bạn một ch&uacute;t về ch&uacute;ng t&ocirc;i &ndash; ch&uacute;ng t&ocirc;i l&agrave; ai, ch&uacute;ng t&ocirc;i l&agrave;m g&igrave; v&agrave; những g&igrave; l&agrave; quan trọng đối với ch&uacute;ng t&ocirc;i.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>',NULL,'aboutus','vi'),('fb_app_id','784212385010419','seo','ID App của FB',''),('fb_page_link','https://www.facebook.com/bannhahanoidvg/','seo','Đường dẫn page facebook',''),('gg_analytics_tracking_id','','seo','TrackingID của Google Analytics',''),('js_banner','[{\"image\":\"\\/upload\\/sl-profile-1.jpg\"}]',NULL,NULL,'en'),('js_banner','[{\"image\":\"\\/upload\\/sl-profile-1.jpg\"}]',NULL,NULL,'vi'),('js_left_image','[{\"image\":\"\\/upload\\/ads-banner-01 (2).png\"},{\"image\":\"\\/upload\\/ads-banner-02 (1).png\"},{\"image\":\"\\/upload\\/ads-banner-03 (1).png\"}]',NULL,NULL,'en'),('js_left_image','[{\"image\":\"\\/upload\\/top-employers-05.png\"},{\"image\":\"\\/upload\\/top-employers-04.png\"},{\"image\":\"\\/upload\\/top-employers-03 (1).png\"}]',NULL,NULL,'vi'),('js_top_employer','[{\"name\":\"Viettel\",\"image\":\"\\/upload\\/top-employers-05.png\"},{\"name\":\"Fpt\",\"image\":\"\\/upload\\/top-employers-04.png\"},{\"name\":\"VP-bank\",\"image\":\"\\/upload\\/top-employers-03 (1).png\"}]',NULL,'danh sách các nhà tuyển dụng hàng đầu','en'),('js_top_employer','[{\"name\":\"Viettel\",\"image\":\"\\/upload\\/top-employers-05.png\"},{\"name\":\"Fpt\",\"image\":\"\\/upload\\/top-employers-04.png\"},{\"name\":\"VP-bank\",\"image\":\"\\/upload\\/top-employers-03 (1).png\"}]',NULL,NULL,'vi'),('locale_default','vi','system','Mã ngôn ngữ mặc định',''),('locale_list','[{\"locale\":\"vi\",\"name\":\"Tiếng Việt\",\"flag\":\"/backend/assets/images/flag_vi.png\"},{\"locale\":\"en\",\"name\":\"English\",\"flag\":\"/backend/assets/images/flag_en.png\"}]','system','Danh sách ngôn ngữ hỗ trợ',''),('site_about_us','[{\"title\":\"ABOUT US\",\"content\":\"A business, also known as an enterprise, agency, or a firm, is anentity involved in the provision of goods, services, or both to consumers. Businesses are prevalent in capitalist economies.\"}]','site','about us. Dữ liệu lưu theo json','en'),('site_about_us','[{\"title\":\"ABOUT US\",\"content\":\"A business, also known as an enterprise, agency, or a firm, is anentity involved in the provision of goods, services, or both to consumers. Businesses are prevalent in capitalist economies.\"}]','site','about us. Dữ liệu lưu theo json','vi'),('site_address','Keangnam - Ha Noi','site','Địa chỉ chính.','en'),('site_address','Keangnam - Ha Noi','site','Địa chỉ chính.','vi'),('site_contact_us','[\"Why guide review\",\"Why guide review ??????\",\"Agriculture and mining businesses produce raw material\",\"Organization and government regulation\",\"Organization and government regulation\"]','site','contact us. Dữ liệu lưu theo json','en'),('site_contact_us','[\"T\\u1ea1i sao l\\u1ea1i ch\\u1ecdn guidereview.asia\",\"h\\u00e3y \\u0111\\u1ebfn v\\u1edbi ch\\u00fang t\\u00f4i \\u0111\\u1ec3 tr\\u1ea3i nghi\\u1ec7m !!\",\"Nh\\u1eefng d\\u1ecbch v\\u1ee5 t\\u1ed1t nh\\u1ea5t\",\"Nh\\u1eefng d\\u1ecbch v\\u1ee5 t\\u1ed1t nh\\u1ea5t\",null]','site','contact us. Dữ liệu lưu theo json','vi'),('site_copyright','© Copyright LIVE REAL 2018','site','Dòng thông tin copyright',''),('site_description','Do not worry about tourism, guidereview.asia will help you not miss any great things in your travel. We choose the hotel suitable, special tours, detailed travel information with attractive prices.','site','Mô tả ngắn gọn về site','en'),('site_description','Đừng lo lắng về chuyến đi, guidereview.asia sẽ giúp bạn không bỏ lỡ bất kỳ điều tuyệt vời nào trong chuyến du lịch của bạn. Chúng tôi chọn khách sạn phù hợp, các tour du lịch đặc biệt, thông tin du lịch chi tiết với mức giá hấp dẫn.','site','Mô tả ngắn gọn về site','vi'),('site_email','hello@guidereview.com','site','Địa chỉ email',''),('site_faqs','[{\"title\":\"Want to cooperate with you, what do I do?\",\"content\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\"},{\"title\":\"I would like a quotation, can you help me?\",\"content\":\"A business, also known as an enterprise, agency, or a firm, is anentity involved in the provision of goods, services, or both to consumers. Businesses are prevalent in capitalist economies.\"},{\"title\":\"Industrial classification of economic activities?\",\"content\":\"A business, also known as an enterprise, agency, or a firm, is anentity involved in the provision of goods, services, or both to consumers. Businesses are prevalent in capitalist economies.\"}]','update','faqs. Dữ liệu lưu theo json','en'),('site_faqs','[{\"title\":\"Mu\\u1ed1n h\\u1ee3p t\\u00e1c v\\u1edbi b\\u1ea1n, t\\u00f4i ph\\u1ea3i l\\u00e0m g\\u00ec?\",\"content\":\"li\\u00ean h\\u1ec7 ngay v\\u1edbi ch\\u00fang t\\u00f4i qua s\\u1ed1 \\u0111i\\u1ec7n tho\\u1ea1i 092203918\"},{\"title\":\"T\\u00f4i mu\\u1ed1n b\\u00e1o gi\\u00e1, b\\u1ea1n c\\u00f3 th\\u1ec3 gi\\u00fap t\\u00f4i kh\\u00f4ng?\",\"content\":\"li\\u00ean h\\u1ec7 ngay v\\u1edbi ch\\u00fang t\\u00f4i qua s\\u1ed1 \\u0111i\\u1ec7n tho\\u1ea1i 092203918\"},{\"title\":\"Mu\\u1ed1n h\\u1ee3p t\\u00e1c v\\u1edbi b\\u1ea1n, t\\u00f4i ph\\u1ea3i l\\u00e0m g\\u00ec?\",\"content\":\"li\\u00ean h\\u1ec7 ngay v\\u1edbi ch\\u00fang t\\u00f4i qua s\\u1ed1 \\u0111i\\u1ec7n tho\\u1ea1i 092203918\"}]','update','faqs. Dữ liệu lưu theo json','vi'),('site_guide_profile','[\"\\/upload\\/bg-profile.jpg\",\"Connecting the hundred of tour guides in the country\",\"Making the contract and having no any additional charges to the customer\",\"Supporting to search the professional tour guides\",\"Caring the customer 24\\/7\"]','site','Danh sách guideprofile site. Dữ liệu lưu theo json','en'),('site_guide_profile','[\"\\/upload\\/bg-profile.jpg\",\"K\\u1ebft n\\u1ed1i h\\u00e0ng tr\\u0103m h\\u01b0\\u1edbng d\\u1eabn vi\\u00ean du l\\u1ecbch trong n\\u01b0\\u1edbc\",\"L\\u1eadp h\\u1ee3p \\u0111\\u1ed3ng v\\u00e0 kh\\u00f4ng c\\u00f3 b\\u1ea5t k\\u1ef3 kho\\u1ea3n ph\\u00ed b\\u1ed5 sung n\\u00e0o cho kh\\u00e1ch h\\u00e0ng\",\"H\\u1ed7 tr\\u1ee3 t\\u00ecm ki\\u1ebfm h\\u01b0\\u1edbng d\\u1eabn vi\\u00ean chuy\\u00ean nghi\\u1ec7p\",\"Ch\\u0103m s\\u00f3c kh\\u00e1ch h\\u00e0ng 24\\/7\"]','site','Danh sách guideprofile site. Dữ liệu lưu theo json','vi'),('site_hotline','(+84) 123 456 789','site','Số điện thoại hotline',''),('site_icon','/upload/logo.jpg','site','Biểu tượng trên trình duyệt của website',''),('site_image','/upload/slide-1.jpg','site','Ảnh mặc định của website',''),('site_job_search','[{\"title\":\"Job Opportunity Search\",\"description\":\"Recruitment Recruitment\",\"content\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\",\"image\":\"\\/upload\\/banner-01.jpg\"}]','site','Job search. Dữ liệu lưu theo json','en'),('site_job_search','[{\"title\":\"Job Opportunity Search\",\"description\":\"Tuy\\u1ec3n d\\u1ee5ng\",\"content\":\"Trang web tuy\\u1ec3n d\\u1ee5ng tr\\u1ef1c tuy\\u1ebfn v\\u1edbi g\\u1ea7n 3 tri\\u1ec7u h\\u1ed3 s\\u01a1 \\u1ee9ng vi\\u00ean t\\u00e0i n\\u0103ng. Tuy\\u1ec3n D\\u1ee5ng Nhanh. H\\u1ed7 Tr\\u1ee3 24\\/7. T\\u00ecm Vi\\u1ec7c Uy T\\u00edn. Mi\\u1ec5n Ph\\u00ed.\",\"image\":\"\\/upload\\/banner-01.jpg\"}]','site','Job search. Dữ liệu lưu theo json','vi'),('site_keywords','[\"live real\",\"b\\u1ea5t \\u0111\\u1ed9ng s\\u1ea3n\",\"118 v\\u0169 t\\u00f4ng phan\"]','site','Danh sách từ khóa mặc định của site.','en'),('site_keywords','[\"guidereview\",\"asia\",\"du-lich\"]','site','Danh sách từ khóa mặc định của site.','vi'),('site_logos','[\"/upload/sl-profile-3.jpg\",\"/upload/sl-profile-2.jpg\",\"/upload/sl-profile-1.jpg\"]','site','Danh sách ảnh logo của site. Dữ liệu lưu theo json',''),('site_multi_address','[\"ph\\u00f9ng h\\u01b0ng- h\\u00e0 \\u0111\\u00f4ng\",\"h\\u00e0 n\\u1ed9i\",\"h\\u1ea3i ph\\u00f2ng\",\"t\\u00e2y ban nha\"]','site','chi nhánh','en'),('site_multi_address','[\"s\\u1ed1 30, \\u0111\\u01b0\\u1eddng nam k\\u1ef3 kh\\u1edfi ngh\\u0129a,qu\\u1eadn 3,Tp.H\\u1ed3 Ch\\u00ed Minh,s\\u1ed1 30, \\u0111\\u01b0\\u1eddng nam k\\u1ef3 kh\\u1edfi ngh\\u0129a,qu\\u1eadn 3,Tp.H\\u1ed3 Ch\\u00ed Minh,s\\u1ed1 30, \\u0111\\u01b0\\u1eddng nam k\\u1ef3 kh\\u1edfi ngh\\u0129a,qu\\u1eadn 3,Tp.H\\u1ed3 Ch\\u00ed Minh,s\\u1ed1 30, \\u0111\\u01b0\\u1eddng nam k\\u1ef3 kh\\u1edfi ngh\\u0129a,qu\\u1eadn 3,Tp.H\\u1ed3 Ch\\u00ed Minh\"]','site','chi nhánh','vi'),('site_name','guide review','site','Tên website/ứng dụng','en'),('site_name','hướng dẫn viên','site','Tên website/ứng dụng','vi'),('site_number','[{\"number\":\"50\",\"word\":\"Hard Worker\"},{\"number\":\"200\",\"word\":\"Happy Customer\"},{\"number\":\"100\",\"word\":\"Projects Complete\"}]','site','Các con số','en'),('site_number','[{\"number\":\"50\",\"word\":\"Nh\\u00e2n vi\\u00ean\"},{\"number\":null,\"word\":null},{\"number\":\"100\",\"word\":\"d\\u1ef1 \\u00e1n th\\u00e0nh c\\u00f4ng\"}]','site','Các con số','vi'),('site_review','[{\"image\":\"\\/upload\\/tour-guilder-03.jpg\",\"title\":\"Tr\\u1ecbnh Vi\\u1ec7t H\\u01b0ng\",\"content\":\"With over 10 years of experience helping businesses to find comprehensive solutions\",\"name\":\"slide_top_1\"},{\"image\":\"\\/upload\\/list-guider-08 (1).png\",\"title\":\"Nguy\\u1ec5n H\\u00e0 Thu\",\"content\":\"For the company searching the tour guides suit the large members\",\"name\":\"slide_top_2\"},{\"image\":\"\\/upload\\/list-guider-04 (1).png\",\"title\":\"Nguy\\u1ec5n V\\u0169 h\\u00e0 Linh\",\"content\":\"With over 10 years of experience helping businesses to find comprehensive solutions\",\"name\":\"slide_top_3\"}]','site','cam nghi','en'),('site_review','[{\"image\":\"\\/upload\\/tour-guilder-02.jpg\",\"title\":\"Tr\\u1ecbnh Vi\\u1ec7t H\\u01b0nggggggg\",\"content\":\"kh\\u00f3a h\\u1ecdc ch\\u1ea5t l\\u01b0\\u1ee3ng nh\\u1ea5t m\\u00ecnh t\\u1eebng h\\u1ecdc\",\"name\":\"slide_top_1\"},{\"image\":\"\\/upload\\/tour-guilder-01.jpg\",\"title\":\"Nguy\\u1ec5n H\\u00e0 Thu\",\"content\":\"kh\\u00f3a h\\u1ecdc ch\\u1ea5t l\\u01b0\\u1ee3ng nh\\u1ea5t m\\u00ecnh t\\u1eebng h\\u1ecdc, kh\\u00f3a h\\u1ecdc ch\\u1ea5t l\\u01b0\\u1ee3ng nh\\u1ea5t m\\u00ecnh t\\u1eebng h\\u1ecdckh\\u00f3a h\\u1ecdc ch\\u1ea5t l\\u01b0\\u1ee3ng nh\\u1ea5t m\\u00ecnh t\\u1eebng h\\u1ecdc\",\"name\":\"slide_top_2\"},{\"image\":\"\\/upload\\/tour-guilder-03.jpg\",\"title\":\"V\\u0169 H\\u00e0 Linh\",\"content\":\"kh\\u00f3a h\\u1ecdc ch\\u1ea5t l\\u01b0\\u1ee3ng nh\\u1ea5t m\\u00ecnh t\\u1eebng h\\u1ecdc\",\"name\":\"slide_top_3\"}]','site','cam nghi','vi'),('site_slide','[{\"image\":\"\\/upload\\/slider.jpg\",\"title\":\"this is a disaster\",\"content\":\"With over 10 years of experience helping businesses to find comprehensive solutions\",\"name\":\"slide_top_1\"},{\"image\":\"\\/upload\\/slider.jpg\",\"title\":\"COMPANY TOUR GUIDE\",\"content\":\"For the company searching the tour guides suit the large members\",\"name\":\"slide_top_2\"},{\"image\":\"\\/upload\\/slider.jpg\",\"title\":\"born to win\",\"content\":\"With over 10 years of experience helping businesses to find comprehensive solutions\",\"name\":\"slide_top_3\"}]','site','Danh sách ảnh slide top của site. Dữ liệu lưu theo json','en'),('site_slide','[{\"image\":\"\\/upload\\/slider.jpg\",\"title\":\"Ch\\u00fang t\\u00f4i l\\u00e0m vi\\u1ec7c v\\u00ec ni\\u1ec1m vui c\\u1ee7a kh\\u00e1ch h\\u00e0ng!\",\"content\":\"V\\u1edbi h\\u01a1n 10 n\\u0103m kinh nghi\\u1ec7m gi\\u00fap c\\u00e1c doanh nghi\\u1ec7p t\\u00ecm ra gi\\u1ea3i ph\\u00e1p to\\u00e0n di\\u1ec7n\",\"name\":\"slide_top_1\"},{\"image\":\"\\/upload\\/slider.jpg\",\"title\":\"Ch\\u00fang t\\u00f4i l\\u00e0m vi\\u1ec7c v\\u00ec ni\\u1ec1m vui c\\u1ee7a kh\\u00e1ch h\\u00e0ng!\",\"content\":\"V\\u1edbi h\\u01a1n 10 n\\u0103m kinh nghi\\u1ec7m gi\\u00fap c\\u00e1c doanh nghi\\u1ec7p t\\u00ecm ra gi\\u1ea3i ph\\u00e1p to\\u00e0n di\\u1ec7n\",\"name\":\"slide_top_2\"},{\"image\":\"\\/upload\\/slider.jpg\",\"title\":\"Ch\\u00fang t\\u00f4i l\\u00e0m vi\\u1ec7c v\\u00ec ni\\u1ec1m vui c\\u1ee7a kh\\u00e1ch h\\u00e0ng!\",\"content\":\"V\\u1edbi h\\u01a1n 10 n\\u0103m kinh nghi\\u1ec7m gi\\u00fap c\\u00e1c doanh nghi\\u1ec7p t\\u00ecm ra gi\\u1ea3i ph\\u00e1p to\\u00e0n di\\u1ec7n\",\"name\":\"slide_top_3\"}]','site','Danh sách ảnh slide top của site. Dữ liệu lưu theo json','vi'),('site_telephone','(+84) 123 456 789','site','Số điện thoại văn phòng',''),('site_title','Guide review asia','site','Tiêu đề mặc định','en'),('site_title','Guide review asia','site','Tiêu đề mặc định','vi'),('site_tourguide','[{\"image\":\"\\/upload\\/ico-customer.png\",\"title\":\"PRIVATE TOUR GUIDE\",\"content\":\"For the customers searching the tour guides suit privately\"},{\"image\":\"\\/upload\\/ico-company (2).png\",\"title\":\"COMPANY TOUR GUIDE\",\"content\":\"For the company searching the tour guides suit the large members\"}]','site','PRIVATE TOUR GUIDE + Company tour guide. Dữ liệu lưu theo json','en'),('site_tourguide','[{\"image\":\"\\/upload\\/ico-customer.png\",\"title\":\"H\\u01af\\u1edaNG D\\u1eaaN VI\\u00caN DU L\\u1ecaCH  T\\u01af \\u200b\\u200bNH\\u00c2N\",\"content\":\"\\u0110\\u1ed1i v\\u1edbi kh\\u00e1ch h\\u00e0ng t\\u00ecm ki\\u1ebfm h\\u01b0\\u1edbng d\\u1eabn vi\\u00ean du l\\u1ecbch ph\\u00f9 h\\u1ee3p v\\u1edbi nh\\u00f3m nh\\u1ecf\"},{\"image\":\"\\/upload\\/ico-company.png\",\"title\":\"H\\u01af\\u1edaNG D\\u1eaaN VI\\u00caN DU L\\u1ecaCH C\\u00d4NG TY\",\"content\":\"\\u0110\\u1ed1i v\\u1edbi c\\u00f4ng ty t\\u00ecm ki\\u1ebfm h\\u01b0\\u1edbng d\\u1eabn vi\\u00ean du l\\u1ecbch ph\\u00f9 h\\u1ee3p v\\u1edbi c\\u00e1c quy m\\u00f4 l\\u1edbn\"}]','site','PRIVATE TOUR GUIDE + Company tour guide. Dữ liệu lưu theo json','vi'),('site_training_course','[{\"title\":\"K\\u0129 n\\u0103ng t\\u1ed5 ch\\u1ee9c\",\"content\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim voluptatem.\",\"image\":\"\\/upload\\/top-employers-06.png\"},{\"title\":\"k\\u0129 n\\u0103ng \\u0111\\u1eb7t ph\\u00f2ng\",\"content\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim voluptatem.\",\"image\":\"\\/upload\\/top-employers-06.png\"},{\"title\":\"kh\\u1ea3 n\\u0103ng ngo\\u1ea1i ng\\u1eef\",\"content\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim voluptatem.\",\"image\":\"\\/upload\\/top-employers-04.png\"}]','site','site_training_courses. Dữ liệu lưu theo json','en'),('site_training_course','[{\"title\":null,\"content\":null,\"image\":null},{\"title\":null,\"content\":null,\"image\":null},{\"title\":null,\"content\":null,\"image\":null}]','site','site_training_courses. Dữ liệu lưu theo json','vi'),('site_training_course_image','[\"\\/upload\\/bg-course (2).jpg\",\"\\/upload\\/bg-form-search.png\"]','site','ảnh site_training_courses. Dữ liệu lưu theo json','en'),('site_training_course_image','[null,null]','site','ảnh site_training_courses. Dữ liệu lưu theo json','vi'),('site_url','http://lr.seekill.com','site','Domain website/ứng dụng',''),('tb_banner','[{\"image\":\"\\/upload\\/banner-ads-blog.png\"}]',NULL,NULL,'en'),('tb_banner','[{\"image\":\"\\/upload\\/banner-ads-blog.png\"}]',NULL,NULL,'vi'),('tc_banner1','[{\"image\":\"\\/upload\\/bg-form-search.png\"}]',NULL,NULL,'en'),('tc_banner1','[{\"image\":\"\\/upload\\/bg-form-search.png\"}]',NULL,NULL,'vi'),('tc_banner2','[{\"image\":\"\\/upload\\/bg-course.jpg\"}]',NULL,NULL,'en'),('tc_banner2','[{\"image\":\"\\/upload\\/bg-course.jpg\"}]',NULL,NULL,'vi'),('tc_banner3','[{\"image\":\"\\/upload\\/banner-branch.png\"}]',NULL,NULL,'en'),('tc_banner3','[{\"image\":\"\\/upload\\/banner-branch.png\"}]',NULL,NULL,'vi'),('status1','1.Chưa đặt',NULL,'trạng thái',''),('status2','2.Đã thanh toán',NULL,'trạng thái',''),('status_store','[\"1.Chưa đặt\",\"2.Đã thanh toán\",\"3.Shop đã phát hàng\",\"4.Kho TQ đã kí nhận\",\"5.Đang chuyển HN\",\"6.HN đã nhận\",\"7.Đã hủy\"]',NULL,'trạng thái','');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thing_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'product','Sản phẩm',13,'vi','2018-08-21 00:24:50','2018-08-21 00:24:50'),(2,'add-product','thêm sản phẩm',16,'vi','2018-08-21 00:24:50','2018-08-21 00:24:50'),(3,'edit-product','sửa sản phẩm',14,'vi','2018-08-21 00:24:50','2018-08-21 00:24:50'),(4,'delete-product','xóa sản phẩm',15,'vi','2018-08-21 00:24:50','2018-08-21 00:24:50'),(40,'list-user','Người dùng',1,'vi','2018-08-21 00:24:54','2018-08-21 00:24:54'),(41,'add-user','Thêm Người dùng',2,'vi','2018-08-21 00:24:54','2018-08-21 00:24:54'),(42,'edit-user','Cập nhật Người dùng',3,'vi','2018-08-21 00:24:54','2018-08-21 00:24:54'),(43,'delete-user','Xóa Người dùng',4,'vi','2018-08-21 00:24:54','2018-08-21 00:24:54'),(44,'list-role','Danh sách Nhóm vai trò',5,'vi','2018-08-21 00:24:54','2018-08-21 00:24:54'),(45,'add-role','Thêm Nhóm vai trò',6,'vi','2018-08-21 00:24:54','2018-08-21 00:24:54'),(46,'edit-role','Cập nhật Nhóm vai trò',7,'vi','2018-08-21 00:24:54','2018-08-21 00:24:54'),(47,'delete-role','Xóa Nhóm vai trò',8,'vi','2018-08-21 00:24:54','2018-08-21 00:24:54'),(48,'list-permission','Danh sách Quyền',9,'vi','2018-08-21 00:24:54','2018-08-21 00:24:54'),(49,'add-permission','Thêm Quyền',10,'vi','2018-08-21 00:24:55','2018-08-21 00:24:55'),(50,'edit-permission','Cập nhật Quyền',11,'vi','2018-08-21 00:24:55','2018-08-21 00:24:55'),(51,'delete-permission','Xóa Quyền',12,'vi','2018-08-21 00:24:55','2018-08-21 00:24:55'),(52,'ds-user','Danh sách người dùng',17,'vi','2018-08-21 00:24:50','2018-08-21 00:24:50'),(53,'ds-product','Danh sách',18,'vi','2018-08-21 00:24:50','2018-08-21 00:24:50'),(54,'customer','Cập nhật khách hàng',20,'vi','2018-08-21 00:24:50','2018-08-21 00:24:50'),(55,'list-customer','Danh sách khách hàng',21,'vi','2018-08-21 00:24:50','2018-08-21 00:24:50'),(56,'edit-customer','Sửa khách hàng',22,'vi','2018-08-21 00:24:50','2018-08-21 00:24:50'),(57,'add-customer','Thêm mới khách hàng',23,'vi','2018-08-21 00:24:50','2018-08-21 00:24:50'),(58,'delete-customer','Xóa khách hàng',24,'vi',NULL,NULL),(59,'detail-product','Chi tiết sản phẩm',25,'vi','2018-08-20 17:24:50','2018-08-20 17:24:50');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT '0',
  `number` int(11) DEFAULT '0',
  `sum` double DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transporters` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport_code` text COLLATE utf8mb4_unicode_ci,
  `author` int(11) DEFAULT '0',
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '1. Chưa đặt',
  `parent_id` bigint(20) DEFAULT '0',
  `order_index` bigint(20) NOT NULL DEFAULT '1',
  `metadata` text COLLATE utf8mb4_unicode_ci,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi',
  `locale_source_id` bigint(20) NOT NULL DEFAULT '0',
  `customer_id` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `status_code` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (42,'áo dạ',1000,2,2000,'<p>mua &aacute;o cho fanta mặc</p>','ao-da','product','vietel','cd500',1,'1',0,1,'{\"link\":\"https:\\/\\/www.w3schools.com\\/html\\/tryit.asp?filename=tryhtml_input_week\",\"rate\":\"3.5\",\"weight\":null,\"ship\":\"1000\",\"shipCN\":null,\"total\":5250}','vi',0,'5','2019-01-18 09:44:24','2019-03-04 08:49:54',NULL,500,1500,1),(43,'áo len',1000,3,3000,NULL,'ao-len','product','vietel','cd500',1,'5.Đang chuyển HN',0,1,'{\"link\":\"http:\\/\\/127.0.0.1:8000\\/backyard\\/product\\/add\",\"rate\":\"3.5\",\"weight\":\"2\",\"ship\":\"10\",\"shipCN\":null,\"total\":8820}','en',0,'3','2019-01-18 10:05:32','2019-03-18 09:57:28',NULL,500,2520,1),(44,'áo len',1000,3,3000,NULL,'ao-len','product','vietel','cd500',1,'3',0,1,'{\"link\":\"http:\\/\\/127.0.0.1:8000\\/backyard\\/product\\/add\",\"rate\":\"3.5\",\"weight\":\"2\",\"ship\":\"10\"}','vi',0,'3','2019-01-18 10:06:10','2019-01-18 10:06:10',NULL,500,2520,1),(45,'áo mỡ',0,0,0,NULL,'ao-mo','product','0','0',1,'4. Kho TQ đã kí nhận',0,1,'{\"link\":\"http:\\/\\/127.0.0.1:8000\\/backyard\\/product\\/add\",\"rate\":\"3.5\",\"weight\":\"2\",\"ship\":\"10\",\"shipCN\":null,\"total\":70}','en',0,'3','2019-01-20 09:04:20','2019-03-13 20:46:06',NULL,0,20,1),(46,'Kỹ thuật hệ thống',1000,1000,1000000,'Chúng tôi cung cấp các dịch vụ order hàng hoá trên các trang thương mại điện tử taobao, 1688, tmail. Dịch vụ nạp tiền alipay, chuyển tiền, hỗ trợ mua hàng. Và các dịch vụ chuyển phát nhanh, cho thuê kho, tư vấn nhập hàng.\r\n\r\n','ky-thuat-he-thong','product','vietel','cd500',1,'1',0,1,'{\"link\":\"https:\\/\\/www.w3schools.com\\/html\\/tryit.asp?filename=tryhtml_input_week\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":\"10\",\"shipCN\":\"50\"}','vi',0,'3','2019-01-20 11:24:19','2019-01-20 11:24:19',NULL,50,3500000,1),(47,'Kỹ thuật hệ thống',1000,3,3000,NULL,'ky-thuat-he-thong','product','vietel','cd500',1,'1',0,1,'{\"link\":\"https:\\/\\/www.w3schools.com\\/html\\/tryit.asp?filename=tryhtml_input_week\",\"rate\":\"3.5\",\"weight\":\"3\",\"ship\":\"10\",\"shipCN\":\"500\"}','vi',0,'3','2019-01-22 08:10:03','2019-01-22 08:10:03',NULL,500,10530,1),(49,'sp test 2',0,0,0,NULL,'sp-test-2','product',NULL,NULL,1,'3.Shop đã phát hàng',0,1,'{\"link\":\"\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":0,\"shipCN\":0}','en',0,'3','2019-03-18 09:42:57','2019-03-18 09:42:57',NULL,0,0,1),(50,'sp test 24',0,0,0,NULL,'sp-test-24','product',NULL,NULL,1,'2.Đã thanh toán',0,1,'{\"link\":\"\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":0,\"shipCN\":0}','en',0,'3','2019-03-18 09:46:09','2019-03-18 09:46:09',NULL,0,0,1),(51,'sp test 2434534',0,0,0,NULL,'sp-test-2434534','product',NULL,NULL,1,'6.HN đã nhận',0,1,'{\"link\":\"\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":0,\"shipCN\":0}','en',0,'3','2019-03-18 09:48:43','2019-03-18 09:48:43',NULL,0,0,1),(52,'sp test 1',0,0,0,NULL,'sp-test-1','product',NULL,NULL,1,'3.Shop đã phát hàng',0,1,'{\"link\":\"\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":0,\"shipCN\":0}','en',0,'3','2019-03-18 09:50:30','2019-03-18 09:50:30',NULL,0,0,1),(53,'sp test 12345',0,0,0,NULL,'sp-test-12345','product',NULL,NULL,1,'6.HN đã nhận',0,1,'{\"link\":\"\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":0,\"shipCN\":0}','en',0,'3','2019-03-18 09:53:03','2019-03-18 09:53:03',NULL,0,0,1),(54,'sp test 12345',100,0,0,'<p>00000</p>','sp-test-12345','product','0','0',1,'6.HN đã nhận',0,1,'{\"link\":\"000\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":\"0\",\"shipCN\":\"0\"}','en',0,'3','2019-03-18 09:53:27','2019-03-18 09:53:27',NULL,0,0,1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_things`
--

DROP TABLE IF EXISTS `product_things`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_things` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` int(11) NOT NULL DEFAULT '0',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `order_index` bigint(20) NOT NULL DEFAULT '1',
  `metadata` text COLLATE utf8mb4_unicode_ci,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi',
  `locale_source_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_things`
--

LOCK TABLES `product_things` WRITE;
/*!40000 ALTER TABLE `product_things` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_things` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi',
  `locale_source_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'developer','Kỹ thuật hệ thống','vi',0,'2018-08-21 00:24:50','2018-08-21 00:24:50'),(2,'123123','123','vi',0,'2019-01-10 08:33:50','2019-01-10 08:33:50'),(3,'admin','admin','vi',0,'2019-01-17 02:21:25','2019-01-17 02:21:25'),(4,'asd','asd','vi',0,'2019-01-17 02:33:58','2019-01-17 02:33:58'),(5,'san-pham','sản phẩm','vi',0,'2019-01-17 06:56:21','2019-01-17 06:56:21');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_permissions`
--

DROP TABLE IF EXISTS `roles_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_permissions` (
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_permissions`
--

LOCK TABLES `roles_permissions` WRITE;
/*!40000 ALTER TABLE `roles_permissions` DISABLE KEYS */;
INSERT INTO `roles_permissions` VALUES (2,1),(2,3),(2,4),(2,2),(2,53),(2,40),(2,42),(2,43),(2,41),(2,44),(2,48),(2,52),(3,1),(3,3),(3,4),(3,2),(3,53),(3,54),(3,56),(3,55),(3,57),(3,40),(3,42),(3,43),(3,48),(3,41),(3,44),(3,52),(4,52),(5,1),(5,3),(5,4),(5,2),(5,53),(1,40),(1,42),(1,43),(1,48),(1,41),(1,44),(1,52),(1,1),(1,3),(1,4),(1,2),(1,53),(1,58),(1,57),(1,55),(1,56),(1,54),(1,59);
/*!40000 ALTER TABLE `roles_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `things`
--

DROP TABLE IF EXISTS `things`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `things` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` int(11) NOT NULL DEFAULT '0',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `order_index` bigint(20) NOT NULL DEFAULT '1',
  `metadata` text COLLATE utf8mb4_unicode_ci,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi',
  `locale_source_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `things`
--

LOCK TABLES `things` WRITE;
/*!40000 ALTER TABLE `things` DISABLE KEYS */;
INSERT INTO `things` VALUES (1,'Người dùng','/user','ti-user',NULL,NULL,'menu_item',0,'publish',0,3,'{\"hasChild\":true,\"showOnMenu\":true}','vi',0,'2018-08-21 00:24:49','2018-08-21 00:24:49',NULL),(2,'Thêm','/user/add','',NULL,NULL,'menu_item',0,'publish',1,1,'{\"hasChild\":false,\"showOnMenu\":true}','vi',0,'2018-08-21 00:24:49','2018-08-21 00:24:49',NULL),(3,'Sửa','/user/edit','',NULL,NULL,'menu_item',0,'publish',1,0,'{\"hasChild\":false,\"showOnMenu\":false}','vi',0,'2018-08-21 00:24:49','2018-08-21 00:24:49',NULL),(4,'Xóa','/user/delete','',NULL,NULL,'menu_item',0,'publish',1,0,'{\"hasChild\":false,\"showOnMenu\":false}','vi',0,'2018-08-21 00:24:49','2018-08-21 00:24:49',NULL),(5,'Nhóm vai trò','/role','ti-cup',NULL,NULL,'menu_item',0,'publish',1,2,'{\"hasChild\":true,\"showOnMenu\":true}','vi',0,'2018-08-21 00:24:49','2018-08-21 00:24:49',NULL),(6,'Thêm','/role/add','',NULL,NULL,'menu_item',0,'publish',5,1,'{\"hasChild\":false,\"showOnMenu\":false}','vi',0,'2018-08-21 00:24:49','2018-08-21 00:24:49',NULL),(7,'Sửa','/role/edit','',NULL,NULL,'menu_item',0,'publish',5,0,'{\"hasChild\":false,\"showOnMenu\":false}','vi',0,'2018-08-21 00:24:49','2018-08-21 00:24:49',NULL),(8,'Xóa','/role/delete','',NULL,NULL,'menu_item',0,'publish',5,0,'{\"hasChild\":false,\"showOnMenu\":false}','vi',0,'2018-08-21 00:24:49','2018-08-21 00:24:49',NULL),(9,'Danh sách Quyền','/permission','ti-shield',NULL,NULL,'menu_item',0,'pending',1,0,'{\"hasChild\":true,\"showOnMenu\":false}','vi',0,'2018-08-21 00:24:49','2018-08-21 00:24:49',NULL),(10,'Thêm','/permission/add','',NULL,NULL,'menu_item',0,'publish',9,1,'{\"hasChild\":false,\"showOnMenu\":false}','vi',0,'2018-08-21 00:24:50','2018-08-21 00:24:50',NULL),(11,'Sửa','/permission/edit','',NULL,NULL,'menu_item',0,'publish',9,0,'{\"hasChild\":false,\"showOnMenu\":false}','vi',0,'2018-08-21 00:24:50','2018-08-21 00:24:50',NULL),(12,'Xóa','/permission/delete','',NULL,NULL,'menu_item',0,'publish',9,0,'{\"hasChild\":false,\"showOnMenu\":false}','vi',0,'2018-08-21 00:24:50','2018-08-21 00:24:50',NULL),(13,'Sản Phẩm','/product','ti-shopping-cart',NULL,NULL,'menu_item',0,'publish',0,1,'{\"hasChild\":true,\"showOnMenu\":true}','vi',0,'2018-08-21 00:24:47','2018-08-21 00:24:47',NULL),(14,'Sửa','/product/edit','',NULL,NULL,'menu_item',0,'publish',13,0,'{\"hasChild\":false,\"showOnMenu\":false}','vi',0,'2018-08-21 00:24:47','2018-08-21 00:24:47',NULL),(15,'Xóa ','/product/delete','',NULL,NULL,'menu_item',0,'publish',13,0,'{\"hasChild\":false,\"showOnMenu\":false}','vi',0,'2018-08-21 00:24:47','2018-08-21 00:24:47',NULL),(16,'Thêm mới','/product/add','',NULL,NULL,'menu_item',0,'publish',13,1,'{\"hasChild\":false,\"showOnMenu\":true}','vi',0,'2018-08-21 00:24:47','2018-08-21 00:24:47',NULL),(17,'Danh sách người dùng','/user/list','',NULL,NULL,'menu_item',0,'publish',1,5,'{\"hasChild\":false,\"showOnMenu\":true}','vi',0,'2018-08-21 00:24:47','2018-08-21 00:24:47',NULL),(18,'Danh sách sản phẩm','/product/list','',NULL,NULL,'menu_item',0,'publish',13,7,'{\"hasChild\":false,\"showOnMenu\":true}','vi',0,'2018-08-21 00:24:47','2018-08-21 00:24:47',NULL),(19,'tỉ giá','ti-gia',NULL,'3.5',NULL,'tigia',0,'pending',0,1,NULL,'vi',0,NULL,NULL,NULL),(20,'Khách hàng','/customer','ti-user',NULL,NULL,'menu_item',0,'publish',0,2,'{\"hasChild\":true,\"showOnMenu\":true}','vi',0,'2018-08-21 00:24:47','2018-08-21 00:24:47',NULL),(21,'Danh sách khách hàng','/customer/list','',NULL,NULL,'menu_item',0,'publish',20,2,'{\"hasChild\":false,\"showOnMenu\":true}','vi',0,'2018-08-21 00:24:47','2018-08-21 00:24:47',NULL),(22,'Thêm ','/customer/add','',NULL,NULL,'menu_item',0,'publish',20,1,'{\"hasChild\":false,\"showOnMenu\":true}','vi',0,'2018-08-21 00:24:47','2018-08-21 00:24:47',NULL),(23,'Sửa ','/customer/edit','',NULL,NULL,'menu_item',0,'publish',20,3,'{\"hasChild\":false,\"showOnMenu\":false}','vi',0,'2018-08-21 00:24:47','2018-08-21 00:24:47',NULL),(24,'Xóa khách hàng','/customer/delete','',NULL,NULL,'menu_item',0,'publish',20,6,'{\"hasChild\":false,\"showOnMenu\":false}','vi',0,'2018-08-21 00:24:47','2018-08-21 00:24:47',NULL),(25,'Chi tiết sản phẩm','/product/detail','ti-user',NULL,NULL,'menu_item',0,'publish',13,8,'{\"hasChild\":false,\"showOnMenu\":true}','vi',0,'2018-08-20 17:24:49','2018-08-20 17:24:49',NULL);
/*!40000 ALTER TABLE `things` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `channel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'backend','system','hungtrinh.un@gmail.com','system',NULL,NULL,'$2y$10$YORRqXqZfkYtvEAMz6B6oOAto0/tVoFTR.888hO.GdtSuZhwho3Wm','fYU7rEFKrWRSkSPSr1B2hKkg6EJbiqGt1k7yfAYuUOGv4diofIO4jFld2dpe','2018-08-21 00:24:55','2019-01-17 09:40:40',NULL),(24,'backend','hobasoft','hobasoft99999@gmail.com','hobasoft',NULL,NULL,'123456',NULL,'2019-01-09 11:10:58','2019-01-09 11:10:58',NULL),(25,'backend','hungtrinh','hungtrinh@gmail.com','hungtrinh',NULL,NULL,'$2y$10$nQ2LTU0Jbaetp/vQSzR5O.NMKROC6UqkUJwI4xMbKSZBwMCxXtXWm',NULL,'2020-04-30 21:49:36','2020-04-30 21:49:36',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_permissions`
--

DROP TABLE IF EXISTS `users_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_permissions` (
  `user_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_permissions`
--

LOCK TABLES `users_permissions` WRITE;
/*!40000 ALTER TABLE `users_permissions` DISABLE KEYS */;
INSERT INTO `users_permissions` VALUES (1,40),(1,41),(1,42),(1,43),(1,44),(1,45),(1,46),(1,47),(1,48),(1,49),(1,50),(1,51),(1,1),(1,2),(1,3),(1,4),(1,52),(1,53),(1,54),(1,55),(1,56),(1,57),(27,1),(27,3),(27,4),(27,2),(27,53),(27,54),(27,56),(27,55),(27,57),(27,40),(27,42),(27,43),(27,48),(27,41),(27,44),(27,52),(28,52),(1,58),(29,40),(29,41),(29,42),(29,43),(29,44),(29,45),(29,46),(29,47),(29,48),(29,49),(29,50),(29,51),(29,1),(29,2),(29,3),(29,4),(29,52),(29,53),(29,24),(29,58),(30,1),(30,3),(30,4),(30,2),(30,53),(30,54),(30,56),(30,55),(30,57),(30,40),(30,42),(30,43),(30,48),(30,41),(30,44),(30,52),(33,1),(33,3),(33,4),(33,2),(33,53),(33,40),(33,42),(33,43),(33,41),(33,44),(33,48),(33,52),(33,1),(33,3),(33,4),(33,2),(33,53),(33,54),(33,56),(33,55),(33,57),(33,40),(33,42),(33,43),(33,48),(33,41),(33,44),(33,52),(33,52),(1,59),(25,1),(25,3),(25,4),(25,2),(25,53),(25,54),(25,56),(25,55),(25,57),(25,40),(25,42),(25,43),(25,48),(25,41),(25,44),(25,52),(25,40),(25,42),(25,43),(25,48),(25,41),(25,44),(25,52),(25,1),(25,3),(25,4),(25,2),(25,53),(25,58),(25,57),(25,55),(25,56),(25,54),(25,59);
/*!40000 ALTER TABLE `users_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_roles` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_roles`
--

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
INSERT INTO `users_roles` VALUES (1,1),(1,2),(1,3),(27,3),(1,4),(28,4),(1,5),(29,1),(30,3),(33,2),(33,3),(33,4),(25,3),(25,1);
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-01 12:09:30
