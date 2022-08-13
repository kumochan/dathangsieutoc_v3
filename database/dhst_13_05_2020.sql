-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: dathangsieutoc
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `history_transaction`
--

DROP TABLE IF EXISTS `history_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history_transaction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_status_id` int(11) NOT NULL DEFAULT '0',
  `transaction_status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_price` float(16,3) DEFAULT '0.000',
  `last_balance` float(16,3) DEFAULT '0.000',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_transaction`
--

LOCK TABLES `history_transaction` WRITE;
/*!40000 ALTER TABLE `history_transaction` DISABLE KEYS */;
INSERT INTO `history_transaction` VALUES (1,'52521052',1,'Nạp Tiền',500000.000,500000.000,'CK TECH',0,1,'2020-05-11 08:04:13','2020-05-11 08:04:13'),(2,'52521052',1,'Nạp Tiền',500000.000,999999.000,'CK TECH',0,1,'2020-05-11 08:04:13','2020-05-11 08:04:13'),(3,'52521053',3,'Tất toán đơn hàng',300000.000,700000.000,'Đặt cọc: 90% tiền hàng (Chưa bao gồm phí phát sinh)',1,1,'2020-05-11 08:04:13','2020-05-11 08:04:13'),(4,'52521054',1,'Nạp Tiền',750000.000,999999.000,'CK TECH',0,1,'2020-05-11 08:04:13','2020-05-11 08:04:13'),(5,'52521055',2,'Rút Tiền',500000.000,950000.000,'Rút tiền về tài khoản ngân hàng',0,1,'2020-05-11 08:04:13','2020-05-11 08:04:13');
/*!40000 ALTER TABLE `history_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (11,'2020_05_01_151455_create_orders_table',1),(12,'2020_05_01_151504_create_order_detail_table',1),(13,'2020_05_02_133001_adds_api_token_to_users_table',2),(14,'2020_05_10_151817_add_missing_price_to_orders_table',2),(15,'2020_05_10_155607_create_wallet_table',3),(16,'2020_05_10_155711_create_shipping_detail_table',3),(21,'2020_05_10_160614_create_history_transaction_table',4),(34,'2020_05_12_140530_change_column_type_orders_table',5),(35,'2020_05_12_140536_change_column_type_order_detail_table',5),(36,'2020_05_12_140723_change_column_type_wallet_table',5),(37,'2020_05_12_140742_change_column_type_history_transaction_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `group` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (1,'locale_default','vi','system','Mã ngôn ngữ mặc định',''),(2,'locale_list','[{\"locale\":\"vi\",\"name\":\"Tiếng Việt\",\"flag\":\"/backend/assets/images/flag_vi.png\"},{\"locale\":\"en\",\"name\":\"English\",\"flag\":\"/backend/assets/images/flag_en.png\"}]','system','Danh sách ngôn ngữ hỗ trợ',''),(3,'site_title','Guide review asia','site','Tiêu đề mặc định','en'),(4,'site_title','Guide review asia','site','Tiêu đề mặc định','vi'),(5,'site_description','Do not worry about tourism, guidereview.asia will help you not miss any great things in your travel. We choose the hotel suitable, special tours, detailed travel information with attractive prices.','site','Mô tả ngắn gọn về site','en'),(6,'site_description','Đừng lo lắng về chuyến đi, guidereview.asia sẽ giúp bạn không bỏ lỡ bất kỳ điều tuyệt vời nào trong chuyến du lịch của bạn. Chúng tôi chọn khách sạn phù hợp, các tour du lịch đặc biệt, thông tin du lịch chi tiết với mức giá hấp dẫn.','site','Mô tả ngắn gọn về site','vi'),(7,'site_image','/upload/slide-1.jpg','site','Ảnh mặc định của website',''),(8,'order_status','[\"Tạo đơn hàng\", \"Chờ đặt cọc\", \"Đã đặt cọc\", \"Đang đặt hàng\", \"Đã đặt hàng\", \"Shop xưởng giao\", \"Đang vận chuyển\", \"Kho VN nhận\", \"Đã trả hàng\", \"Đã Hủy\"]','system',NULL,'vi'),(9,'exchange_rate','3.399','system',NULL,'vi'),(10,'purchase_fee','3',NULL,NULL,'vi');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT '1',
  `detail_price_cn` float(16,3) DEFAULT '0.000',
  `detail_price_vn` float(16,3) DEFAULT '0.000',
  `detail_total_price_cn` float(16,3) DEFAULT '0.000',
  `detail_total_price_vn` float(16,3) DEFAULT '0.000',
  `detail_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_metadata` text COLLATE utf8mb4_unicode_ci,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` VALUES (1,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/7.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,1,'2020-05-02 11:28:07','2020-05-03 04:03:15'),(2,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/4.jpg','S','do',3,2.000,7000.000,6.000,21000.000,NULL,NULL,1,'2020-05-02 11:28:07','2020-05-03 04:03:15'),(3,'23袋 咸菜','backend/assets/images/products/big/3.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,2,'2020-05-02 11:28:07','2020-05-02 11:28:07'),(4,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/12.jpg','S','do',3,3.000,10500.000,9.000,31500.000,NULL,NULL,6,'2020-05-06 10:28:51','2020-05-07 07:00:07'),(5,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/12.jpg','S','do',0,2.000,7000.000,2.000,7000.000,NULL,NULL,4,'2020-05-06 10:28:51','2020-05-07 09:50:46'),(6,'23袋 咸菜','backend/assets/images/products/big/10.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,4,'2020-05-06 10:28:51','2020-05-06 10:28:51'),(7,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/8.jpg','S','do',5,3.000,10500.000,15.000,52500.000,NULL,NULL,9,'2020-05-06 10:28:52','2020-05-07 07:00:35'),(8,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/15.jpg','S','do',2,2.000,7000.000,4.000,14000.000,NULL,NULL,3,'2020-05-06 10:28:52','2020-05-07 07:00:07'),(9,'23袋 咸菜','backend/assets/images/products/big/10.jpg','M','xanh',2,20.000,70000.000,40.000,140000.000,NULL,NULL,5,'2020-05-06 10:28:52','2020-05-07 07:00:07'),(10,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/10.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,4,'2020-05-06 10:28:53','2020-05-06 10:28:53'),(11,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/11.jpg','S','do',3,2.000,7000.000,6.000,21000.000,NULL,NULL,9,'2020-05-06 10:28:53','2020-05-06 10:56:08'),(12,'23袋 咸菜','backend/assets/images/products/big/15.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,7,'2020-05-06 10:28:53','2020-05-06 10:28:53'),(13,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/14.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,8,'2020-05-06 10:28:54','2020-05-06 10:28:54'),(14,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/14.jpg','S','do',1,2.000,7000.000,2.000,7000.000,NULL,NULL,4,'2020-05-06 10:28:54','2020-05-06 10:28:54'),(15,'23袋 咸菜','backend/assets/images/products/big/11.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,7,'2020-05-06 10:28:54','2020-05-06 10:28:54'),(16,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/11.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,4,'2020-05-06 10:28:55','2020-05-06 10:28:55'),(17,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/13.jpg','S','do',1,2.000,7000.000,2.000,7000.000,NULL,NULL,7,'2020-05-06 10:28:55','2020-05-06 10:28:55'),(18,'23袋 咸菜','backend/assets/images/products/big/9.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,7,'2020-05-06 10:28:55','2020-05-06 10:28:55'),(19,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/9.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,10,'2020-05-06 10:28:56','2020-05-06 10:28:56'),(20,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/9.jpg','S','do',1,2.000,7000.000,2.000,7000.000,NULL,NULL,8,'2020-05-06 10:28:56','2020-05-06 10:28:56'),(21,'23袋 咸菜','backend/assets/images/products/big/8.jpg','M','xanh',2,20.000,70000.000,40.000,140000.000,NULL,NULL,6,'2020-05-06 10:28:56','2020-05-06 10:56:15'),(22,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/13.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,5,'2020-05-06 10:28:57','2020-05-06 10:28:57'),(23,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/15.jpg','S','do',2,2.000,7000.000,4.000,14000.000,NULL,NULL,8,'2020-05-06 10:28:57','2020-05-07 07:00:35'),(24,'23袋 咸菜','backend/assets/images/products/big/11.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,6,'2020-05-06 10:28:57','2020-05-06 10:28:57'),(25,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/8.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,11,'2020-05-07 10:01:22','2020-05-07 10:01:22'),(26,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/10.jpg','S','do',1,2.000,7000.000,2.000,7000.000,NULL,NULL,16,'2020-05-07 10:01:22','2020-05-07 10:01:22'),(27,'23袋 咸菜','backend/assets/images/products/big/11.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,13,'2020-05-07 10:01:22','2020-05-07 10:01:22'),(28,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/8.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,14,'2020-05-07 10:01:24','2020-05-07 10:01:24'),(29,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/12.jpg','S','do',1,2.000,7000.000,2.000,7000.000,NULL,NULL,14,'2020-05-07 10:01:24','2020-05-07 10:01:24'),(30,'23袋 咸菜','backend/assets/images/products/big/12.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,11,'2020-05-07 10:01:24','2020-05-07 10:01:24'),(31,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/10.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,11,'2020-05-07 10:01:25','2020-05-07 10:01:25'),(32,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/14.jpg','S','do',1,2.000,7000.000,2.000,7000.000,NULL,NULL,13,'2020-05-07 10:01:25','2020-05-07 10:01:25'),(33,'23袋 咸菜','backend/assets/images/products/big/8.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,13,'2020-05-07 10:01:25','2020-05-07 10:01:25'),(34,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/9.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,15,'2020-05-07 10:01:26','2020-05-07 10:01:26'),(35,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/15.jpg','S','do',1,2.000,7000.000,2.000,7000.000,NULL,NULL,16,'2020-05-07 10:01:26','2020-05-07 10:01:26'),(36,'23袋 咸菜','backend/assets/images/products/big/10.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,10,'2020-05-07 10:01:26','2020-05-07 10:01:26'),(37,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/15.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,15,'2020-05-07 10:01:27','2020-05-07 10:01:27'),(38,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/10.jpg','S','do',1,2.000,7000.000,2.000,7000.000,NULL,NULL,10,'2020-05-07 10:01:27','2020-05-07 10:01:27'),(39,'23袋 咸菜','backend/assets/images/products/big/11.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,10,'2020-05-07 10:01:27','2020-05-07 10:01:27'),(40,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/15.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,11,'2020-05-07 10:01:27','2020-05-07 10:01:27'),(41,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/8.jpg','S','do',1,2.000,7000.000,2.000,7000.000,NULL,NULL,16,'2020-05-07 10:01:27','2020-05-07 10:01:27'),(42,'23袋 咸菜','backend/assets/images/products/big/13.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,15,'2020-05-07 10:01:28','2020-05-07 10:01:28'),(43,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/10.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,13,'2020-05-07 10:01:28','2020-05-07 10:01:28'),(44,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/11.jpg','S','do',1,2.000,7000.000,2.000,7000.000,NULL,NULL,16,'2020-05-07 10:01:28','2020-05-07 10:01:28'),(45,'23袋 咸菜','backend/assets/images/products/big/14.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,13,'2020-05-07 10:01:28','2020-05-07 10:01:28'),(46,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/13.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,10,'2020-05-07 10:01:29','2020-05-07 10:01:29'),(47,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/12.jpg','S','do',1,2.000,7000.000,2.000,7000.000,NULL,NULL,15,'2020-05-07 10:01:29','2020-05-07 10:01:29'),(48,'23袋 咸菜','backend/assets/images/products/big/13.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,11,'2020-05-07 10:01:29','2020-05-07 10:01:29'),(49,'20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/10.jpg','S','do',2,3.000,10500.000,6.000,21000.000,NULL,NULL,15,'2020-05-07 10:01:30','2020-05-07 10:01:30'),(50,'糖麻辣味250g*3袋 咸菜','backend/assets/images/products/big/13.jpg','S','do',1,2.000,7000.000,2.000,7000.000,NULL,NULL,14,'2020-05-07 10:01:30','2020-05-07 10:01:30'),(51,'23袋 咸菜','backend/assets/images/products/big/9.jpg','M','xanh',1,20.000,70000.000,20.000,70000.000,NULL,NULL,14,'2020-05-07 10:01:30','2020-05-07 10:01:30');
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shipping_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `number_counted` int(11) NOT NULL DEFAULT '0',
  `number_order` int(11) NOT NULL DEFAULT '0',
  `received_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `prepayment` float(16,3) DEFAULT '0.000',
  `price_vn` float(16,3) DEFAULT '0.000',
  `price_cn` float(16,3) DEFAULT '0.000',
  `ship_cn` float(16,3) DEFAULT '0.000',
  `ship_vn` float(16,3) DEFAULT '0.000',
  `weight` float(16,3) DEFAULT '0.000',
  `weight_fee` float(16,3) DEFAULT '0.000',
  `purchase_fee` float(16,3) DEFAULT '0.000',
  `additional_fee` float(16,3) DEFAULT '0.000',
  `arrears_fee` float(16,3) DEFAULT '0.000',
  `counting_fee` float(16,3) DEFAULT '0.000',
  `packing_fee` float(16,3) DEFAULT '0.000',
  `total_price_vn` float(16,3) DEFAULT '0.000',
  `total_price_cn` float(16,3) DEFAULT '0.000',
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '0',
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ tạo đơn hàng',
  `note` text COLLATE utf8mb4_unicode_ci,
  `metadata` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `missing_price` double(8,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'75500','发现好货','4691948847','KHO HN',3,5,'ha dong, ha noi 3','1,2,3',31500.000,35000.000,10.000,0.000,30000.000,1.500,10000.000,1050.000,0.000,50550.000,0.000,0.000,42000.000,12.000,'1, 25',1,5,'Shop xưởng giao','Laravel\'s versioning scheme maintains the following convention: paradigm.major.minor. Major framework releases are released every six months (February and August)',NULL,'2020-05-02 11:28:07','2020-05-06 08:36:22',0.00),(2,'3520000012','實時推薦最適合你的寶貝','24442857143','KHO HN',0,1,'ha dong, ha noi','1,3',63000.000,70000.000,20.000,0.000,30000.000,1.000,10000.000,2100.000,0.000,49100.000,0.000,0.000,70000.000,20.000,'1, 24',1,4,'Đã đặt hàng',NULL,NULL,'2020-04-02 11:28:07','2020-05-06 08:37:41',0.00),(3,'75500','发现好货','4691948847','KHO HN',3,2,'ha dong, ha noi','',31500.000,35000.000,10.000,0.000,30000.000,1.500,10000.000,1050.000,0.000,50550.000,0.000,0.000,14000.000,4.000,'',1,1,'Chờ đặt cọc',NULL,NULL,'2020-12-30 10:23:25','2020-05-07 07:00:07',0.00),(4,'3520000012','實時推薦最適合你的寶貝','24442857143','KHO HN',0,7,'ha dong, ha noi','',63000.000,70000.000,20.000,0.000,30000.000,1.000,10000.000,2100.000,0.000,49100.000,0.000,0.000,126000.000,36.000,'1, 24',1,1,'Chờ đặt cọc',NULL,NULL,'2020-12-30 10:23:25','2020-05-07 09:50:46',0.00),(5,'75500','发现好货','4691948847','KHO HN',3,4,'ha dong, ha noi','1,2',31500.000,35000.000,10.000,0.000,30000.000,1.500,10000.000,1050.000,0.000,50550.000,0.000,0.000,161000.000,46.000,'1, 24',1,1,'Chờ đặt cọc',NULL,NULL,'2020-05-06 10:23:24','2020-05-07 07:00:07',0.00),(6,'3520000012','實時推薦最適合你的寶貝','24442857143','KHO HN',0,6,'ha dong, ha noi','1,2',0.000,70000.000,20.000,0.000,30000.000,1.000,10000.000,2100.000,0.000,49100.000,0.000,0.000,241500.000,69.000,'1, 24',1,1,'Chờ đặt cọc',NULL,NULL,'2020-05-06 10:23:24','2020-05-07 07:00:07',0.00),(7,'75500','发现好货','4691948847','KHO HN',3,4,'ha dong, ha noi','2,3',31500.000,35000.000,10.000,0.000,30000.000,1.500,10000.000,1050.000,0.000,50550.000,0.000,0.000,217000.000,62.000,'1, 25',1,1,'Chờ đặt cọc',NULL,NULL,'2020-12-30 10:23:25','2020-05-12 08:15:57',0.00),(8,'3520000012','實時推薦最適合你的寶貝','24442857143','KHO HN',0,5,'ha dong, ha noi','',63000.000,70000.000,20.000,0.000,30000.000,1.000,10000.000,2100.000,0.000,49100.000,0.000,0.000,42000.000,12.000,'1, 24',1,1,'Chờ đặt cọc',NULL,NULL,'2020-05-06 10:23:25','2020-05-07 07:00:35',0.00),(9,'75500','发现好货','4691948847','KHO HN',3,8,'ha dong, ha noi','',0.000,35000.000,10.000,0.000,30000.000,1.500,10000.000,1050.000,0.000,50550.000,0.000,0.000,73500.000,21.000,'1, 25',1,1,'Chờ đặt cọc',NULL,NULL,'2020-05-06 10:23:26','2020-05-07 07:00:35',0.00),(10,'3520000012','實時推薦最適合你的寶貝','24442857143','KHO HN',0,7,'ha dong, ha noi','',63000.000,70000.000,20.000,0.000,30000.000,1.000,10000.000,2100.000,0.000,49100.000,0.000,0.000,189000.000,54.000,'1, 24',1,1,'Chờ đặt cọc',NULL,NULL,'2020-05-06 10:23:26','2020-05-09 21:58:08',0.00),(11,'75500','发现好货','4691948847','KHO HN',3,8,'ha dong, ha noi','',31500.000,35000.000,10.000,0.000,30000.000,1.500,10000.000,1050.000,0.000,50550.000,0.000,0.000,203000.000,58.000,'1, 25',1,1,'Chờ đặt cọc',NULL,NULL,'2020-05-07 10:00:10','2020-05-07 10:01:53',0.00),(12,'3520000012','實時推薦最適合你的寶貝','24442857143','Kho HN',0,1,'ha dong, ha noi','1, 3',63000.000,70000.000,20.000,0.000,30000.000,1.000,10000.000,2100.000,0.000,49100.000,0.000,0.000,70000.000,20.000,'1, 24',1,0,'Chờ tạo đơn hàng',NULL,NULL,'2020-05-07 10:00:10','2020-05-07 10:00:10',0.00),(13,'75500','发现好货','4691948847','KHO HN',3,6,'ha dong, ha noi','',31500.000,35000.000,10.000,0.000,30000.000,1.500,10000.000,1050.000,0.000,50550.000,0.000,0.000,238000.000,68.000,'1, 25',1,0,'Chờ tạo đơn hàng',NULL,NULL,'2020-05-07 10:00:12','2020-05-07 10:01:53',0.00),(14,'3520000012','實時推薦最適合你的寶貝','24442857143','KHO HN',0,5,'ha dong, ha noi','',63000.000,70000.000,20.000,0.000,30000.000,1.000,10000.000,2100.000,0.000,49100.000,0.000,0.000,105000.000,30.000,'1, 24',1,1,'Chờ đặt cọc',NULL,NULL,'2020-05-07 10:00:12','2020-05-07 10:01:53',0.00),(15,'75500','发现好货','4691948847','KHO HN',3,8,'ha dong, ha noi','',31500.000,35000.000,10.000,0.000,30000.000,1.500,10000.000,1050.000,0.000,50550.000,0.000,0.000,140000.000,40.000,'1, 25',1,1,'Chờ đặt cọc',NULL,NULL,'2020-05-07 10:00:13','2020-05-07 10:01:53',0.00),(16,'3520000012','實時推薦最適合你的寶貝','24442857143','KHO HN',0,4,'ha dong, ha noi','',63000.000,70000.000,20.000,0.000,30000.000,1.000,10000.000,2100.000,0.000,49100.000,0.000,0.000,28000.000,8.000,'1, 24',1,1,'Chờ đặt cọc',NULL,NULL,'2020-05-07 10:00:13','2020-05-07 10:01:53',0.00);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
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
-- Table structure for table `shipping_detail`
--

DROP TABLE IF EXISTS `shipping_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipping_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shipping_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_detail`
--

LOCK TABLES `shipping_detail` WRITE;
/*!40000 ALTER TABLE `shipping_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipping_detail` ENABLE KEYS */;
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
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_api_token_unique` (`api_token`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'backend','system','hungtrinh.un@gmail.com','Trịnh Việt Hưng',NULL,NULL,'$2y$10$YORRqXqZfkYtvEAMz6B6oOAto0/tVoFTR.888hO.GdtSuZhwho3Wm','fEtP1Z692RfToG5zad8PPHc1R60DznXd57f5VLnt145ipV2yjtBvo9wvE5B5','2018-08-21 00:24:55','2019-01-17 09:40:40',NULL,'PexhIMR0baVFd0iuW3jxexAO4VEtFUwnhZzJYGXC940c4HMjO6ZiNOxnWhVf'),(24,'backend','hobasoft','hobasoft99999@gmail.com','hobasoft',NULL,NULL,'123456',NULL,'2019-01-09 11:10:58','2019-01-09 11:10:58',NULL,NULL),(25,'backend','hungtrinh','hungtrinh@gmail.com','hungtrinh',NULL,NULL,'$2y$10$nQ2LTU0Jbaetp/vQSzR5O.NMKROC6UqkUJwI4xMbKSZBwMCxXtXWm',NULL,'2020-04-30 21:49:36','2020-04-30 21:49:36',NULL,NULL),(26,'backend','admin','admin@gmail.com','admin',NULL,NULL,'$2y$10$.WHg.xydJJTiQ/y58GAhieq9j3g5I33OwmnBEV9WG6lWeMhjl7Viq',NULL,'2020-05-05 09:09:29','2020-05-05 09:09:29',NULL,NULL);
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
INSERT INTO `users_permissions` VALUES (1,40),(1,41),(1,42),(1,43),(1,44),(1,45),(1,46),(1,47),(1,48),(1,49),(1,50),(1,51),(1,1),(1,2),(1,3),(1,4),(1,52),(1,53),(1,54),(1,55),(1,56),(1,57),(27,1),(27,3),(27,4),(27,2),(27,53),(27,54),(27,56),(27,55),(27,57),(27,40),(27,42),(27,43),(27,48),(27,41),(27,44),(27,52),(28,52),(1,58),(29,40),(29,41),(29,42),(29,43),(29,44),(29,45),(29,46),(29,47),(29,48),(29,49),(29,50),(29,51),(29,1),(29,2),(29,3),(29,4),(29,52),(29,53),(29,24),(29,58),(30,1),(30,3),(30,4),(30,2),(30,53),(30,54),(30,56),(30,55),(30,57),(30,40),(30,42),(30,43),(30,48),(30,41),(30,44),(30,52),(33,1),(33,3),(33,4),(33,2),(33,53),(33,40),(33,42),(33,43),(33,41),(33,44),(33,48),(33,52),(33,1),(33,3),(33,4),(33,2),(33,53),(33,54),(33,56),(33,55),(33,57),(33,40),(33,42),(33,43),(33,48),(33,41),(33,44),(33,52),(33,52),(1,59),(25,1),(25,3),(25,4),(25,2),(25,53),(25,54),(25,56),(25,55),(25,57),(25,40),(25,42),(25,43),(25,48),(25,41),(25,44),(25,52),(25,40),(25,42),(25,43),(25,48),(25,41),(25,44),(25,52),(25,1),(25,3),(25,4),(25,2),(25,53),(25,58),(25,57),(25,55),(25,56),(25,54),(25,59),(26,1),(26,3),(26,4),(26,2),(26,53),(26,54),(26,56),(26,55),(26,57),(26,40),(26,42),(26,43),(26,48),(26,41),(26,44),(26,52);
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
INSERT INTO `users_roles` VALUES (1,1),(1,2),(1,3),(27,3),(1,4),(28,4),(1,5),(29,1),(30,3),(33,2),(33,3),(33,4),(25,3),(25,1),(26,3);
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallet`
--

DROP TABLE IF EXISTS `wallet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wallet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `deposit` float(16,3) DEFAULT '0.000',
  `withdraw` float(16,3) DEFAULT '0.000',
  `total_payment` float(16,3) DEFAULT '0.000',
  `balance` float(16,3) DEFAULT '0.000',
  `refund` float(16,3) DEFAULT '0.000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallet`
--

LOCK TABLES `wallet` WRITE;
/*!40000 ALTER TABLE `wallet` DISABLE KEYS */;
INSERT INTO `wallet` VALUES (1,1,1000000.000,500000.000,300000.000,950000.000,0.000,'2020-05-11 10:21:29','2020-05-11 10:21:29');
/*!40000 ALTER TABLE `wallet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dathangsieutoc'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-13 22:55:35
