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
-- Table structure for table `pi_products`
--

DROP TABLE IF EXISTS `pi_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brought` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recommend` text COLLATE utf8_unicode_ci NOT NULL,
  `confidence` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi_products`
--

LOCK TABLES `pi_products` WRITE;
/*!40000 ALTER TABLE `pi_products` DISABLE KEYS */;
INSERT INTO `pi_products` VALUES (1,'head scarf','handbags','20.83','2017-06-02 16:14:25','2017-06-02 16:14:25'),(2,'head scarf','shoes','62.5','2017-06-02 16:14:25','2017-06-02 16:14:25'),(3,'handbags','head scarf','31.25','2017-06-02 16:14:25','2017-06-02 16:14:25'),(4,'handbags','shoes','25','2017-06-02 16:14:25','2017-06-02 16:14:25'),(5,'handbags','woman_hat','37.5','2017-06-02 16:14:25','2017-06-02 16:14:25'),(6,'shoes','head scarf','27.78','2017-06-02 16:14:25','2017-06-02 16:14:25'),(7,'shoes','woman_hat','62.96','2017-06-02 16:14:25','2017-06-02 16:14:25'),(8,'router','HP laptop','60','2017-06-02 16:14:25','2017-06-02 16:14:25'),(9,'HP laptop','router','60','2017-06-02 16:14:25','2017-06-02 16:14:25'),(10,'iPhone7','Charger','40','2017-06-02 16:14:25','2017-06-02 16:14:25'),(11,'iPhone7','iPhone7_case','40','2017-06-02 16:14:25','2017-06-02 16:14:25'),(12,'Charger','iPhone7','40','2017-06-02 16:14:25','2017-06-02 16:14:25'),(13,'iPhone7_case','iPhone7','50','2017-06-02 16:14:25','2017-06-02 16:14:25'),(14,'woman_hat','shoes','85','2017-06-02 16:14:25','2017-06-02 16:14:25'),(15,'handbags,woman_hat','shoes','33.33','2017-06-02 16:14:25','2017-06-02 16:14:25'),(16,'handbags,shoes','woman_hat','50','2017-06-02 16:14:25','2017-06-02 16:14:25');
/*!40000 ALTER TABLE `pi_products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-07  1:16:39
