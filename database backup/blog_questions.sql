-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` int(11) NOT NULL DEFAULT '1',
  `chapter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'babil',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Mcq',
  `active` int(11) DEFAULT '1',
  `difficulty` int(11) DEFAULT '1',
  `info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'information',
  `user_id` int(11) DEFAULT '1',
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'unknown',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (46,'يقع نهر النيل في دولة ..... ؟',2,'1','history','1','متوسطة الرافدين','Mcq',1,1,'information',1,'unknown','2017-04-21 20:52:54','2017-04-21 20:52:54'),(47,'take=took,       buy= ...........?',2,'1','en','1','متوسطة الرافدين','Mcq',1,1,'information',1,'unknown','2017-04-21 20:58:09','2017-04-21 20:58:09'),(48,'برشلونة نادي في .......؟',2,'3','history','3','','Mcq',1,1,'information',1,'unknown','2017-04-22 12:31:03','2017-04-22 12:31:03'),(95,'معركة وادي جيرالند',2,'2','history','3','','Mcq',1,1,'information',1,'unknown','2017-05-12 06:16:36','2017-05-12 06:16:36'),(96,'معركة عين جالوت في الفصل الرابع',2,'4','history','3','','Mcq',1,1,'information',1,'unknown','2017-05-12 06:20:32','2017-05-12 06:20:32'),(45,'يقع نهر الفرات في دولة ..... ؟',2,'1','geo','3','متوسطة الرافدين','Mcq',1,1,'information',1,'unknown','2017-04-21 20:51:23','2017-04-21 20:51:23'),(168,'<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/photos//IMG_2805.JPG\" alt=\"\" width=\"273\" height=\"204\" /></p>\r\n<h2 dir=\"rtl\" style=\"text-align: right;\">س/ تقع مدينة الكاظمية المقدسة في محافظة كربلاء.&nbsp;</h2>',2,'1','geo','1','','tf',1,1,'information',1,'unknown','2017-05-12 18:21:21','2017-05-12 18:21:21');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-07  1:16:38
