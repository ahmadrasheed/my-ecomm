-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: ahmadah1_shopping-cart
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'2016-09-24 16:51:02','2017-06-02 17:06:41','a@yahoo.com','$2y$10$2lnP/8uIHzXu/97XdzTTfe0VybajhAW9gwVd65PeVPAG7UlvFPF1q','OKhjZKiLkvjCo04SYQew1QhgtfcCdcpi5uJgmxZ8iFHHqaAtqPOWo882Lgn9'),(2,'2016-10-26 21:13:53','2017-06-02 16:15:26','b@yahoo.com','$2y$10$da4PRzSevxhUhbUNgJtYquGcUVUiL.7A3Q3aj/lp8Qi/tV1Di2QOO','sEHr638RwVKEVcMcpwG9GIMGjNy1L13PnFDTmyCGTDR4u69WxoEtv5DPtrrv'),(3,'2016-11-17 10:02:27','2017-06-02 10:46:11','c@yahoo.com','$2y$10$kmiZTrvi.A/S3Q4znSw8TOVoTYCKRUYiQ7JqMGb4K2XCAWSlVNxbu','Oopam92B4pUpKMoz7iVTAuKDtqrEQayoICj41XVQcRkRbJrYkGb60rGmiTKT'),(4,'2016-11-19 09:45:49','2017-06-02 17:06:55','d@yahoo.com','$2y$10$95Fsxrbt7LpJ1vLZ/Ozn4uf4xwz2U6qy74QMRQjQjAHzWRREm1kim','EabsfGzivVmBrMofGWsN9shVFQpBH3JXe1raZQtqcM0rJjyT7AAFGxsIm6YT'),(5,'2016-11-19 13:03:47','2017-06-02 16:32:36','e@yahoo.com','$2y$10$X1EQq2ZsDGx.hiKu2W/uyu51yybNLbVRs5DclW5Bt1JZG78ZGcLXq','r2NUtl1md8H6eJ7jeUo2w5hIxHzBP3T8RTxTkNCfYWpqRailVPEG4f2GdPhB'),(6,'2016-11-19 13:12:38','2017-06-02 15:09:25','f@yahoo.com','$2y$10$D1vlGK..fkVhPpQqIjr24.cs1XkTARLu2QDdgRowR3R3w/S7vDV5C','ceXho5EOeVIeKEUPAV6R0zB1uW5ctrLNrrtGFTSaqzojXkHYYuU39DPJYLjQ'),(7,'2016-11-19 13:21:28','2016-11-19 13:22:00','g@yahoo.com','$2y$10$3e9A/q/JJpOYKbB7vk1.cew1U87SMtQ055UT5ARRQK53hjnRH74TC','YzyxMzVM6MtbvAJi5S9XqzBvvxKkEUE0TE59uxhV5zplJ5eLGrxL2uTzGmyP'),(8,'2016-11-20 07:59:58','2016-11-20 07:59:58','gg@yahoo.com','$2y$10$V5QdZ7sf7IEkXg0ELhC.semsesLKInpFMu/jdO1Kdb3AIKFssC9YO',NULL),(9,'2016-12-14 17:33:31','2016-12-14 17:33:31','i@yahoo.com','$2y$10$8qNIoNuUSeVQ08sMcvV/.uwRPpODzte3.xs7nSuQzPFdO9hT8fua2',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
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
