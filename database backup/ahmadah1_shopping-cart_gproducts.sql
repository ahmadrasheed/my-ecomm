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
-- Table structure for table `gproducts`
--

DROP TABLE IF EXISTS `gproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gproducts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gproducts`
--

LOCK TABLES `gproducts` WRITE;
/*!40000 ALTER TABLE `gproducts` DISABLE KEYS */;
INSERT INTO `gproducts` VALUES (1,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(2,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(3,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(4,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(5,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(6,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(7,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(8,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(9,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(10,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(11,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(12,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(13,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(14,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(15,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(16,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(17,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(18,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(19,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(20,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(21,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(22,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(23,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(24,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(25,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(26,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(27,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(28,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(29,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(30,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(31,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(32,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(33,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(34,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(35,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(36,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(37,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(38,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(39,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(40,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(41,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(42,'Fluffy Pink Bunnies','Iraq','Fluffy Pink Bunnies','2017-06-02 21:24:09','2017-06-02 21:24:09'),(43,'ahmad-product','Iraq','ahmad-product','2017-06-02 21:24:09','2017-06-02 21:24:09'),(44,'ahmad-product','Iraq','ahmad-product','2017-06-02 21:24:09','2017-06-02 21:24:09'),(45,'ahmad-product','Iraq','ahmad-product','2017-06-02 21:24:09','2017-06-02 21:24:09'),(46,'ahmad-product','Iraq','ahmad-product','2017-06-02 21:24:09','2017-06-02 21:24:09'),(47,'ahmad-product2','Iraq','ahmad-product2','2017-06-02 21:24:09','2017-06-02 21:24:09'),(48,'ahmad-product2','Iraq','ahmad-product2','2017-06-02 21:24:09','2017-06-02 21:24:09'),(49,'ahmad-product2','Iraq','ahmad-product2','2017-06-02 21:24:09','2017-06-02 21:24:09'),(50,'ahmad-product2','Iraq','ahmad-product2','2017-06-02 21:24:09','2017-06-02 21:24:09'),(51,'ahmad-product2','Iraq','ahmad-product2','2017-06-02 21:24:09','2017-06-02 21:24:09'),(52,'ahmad-product2','Iraq','ahmad-product2','2017-06-02 21:24:09','2017-06-02 21:24:09');
/*!40000 ALTER TABLE `gproducts` ENABLE KEYS */;
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
