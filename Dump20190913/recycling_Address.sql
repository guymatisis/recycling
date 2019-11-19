-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: recycling
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.16.04.1

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
-- Table structure for table `Address`
--

DROP TABLE IF EXISTS `Address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Address` (
  `Street` char(32) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL,
  `Muni_ID` enum('RAMAT HASHARON','TEL AVIV') DEFAULT NULL,
  `Address_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Apt_Num` int(11) DEFAULT NULL,
  PRIMARY KEY (`Address_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Address`
--

LOCK TABLES `Address` WRITE;
/*!40000 ALTER TABLE `Address` DISABLE KEYS */;
INSERT INTO `Address` VALUES ('happyst',33,'RAMAT HASHARON',1,7),('wayward',22,NULL,2,23),('ads',NULL,NULL,3,NULL),('asaa',21,NULL,4,NULL),('asd',22,NULL,5,11),('asd',22,NULL,6,11),('adasdsad',123,NULL,7,2212),('adasdsad',123,NULL,8,2212),('asdf',123,NULL,9,3241),('asdf',123,NULL,10,3241),('asdf',123,NULL,11,3241),('asdf',123,NULL,12,3241),('asd',12,NULL,13,12),('asd',12,NULL,14,12),('asd',123,NULL,15,123),('2',32,NULL,16,12),('2',32,NULL,17,12),('asd',12,NULL,18,1),('asd',12,NULL,19,1),('a',1,NULL,20,1),('a',1,NULL,21,1),('a',1,NULL,22,1),('asd',12,NULL,23,1),('sd',1,NULL,24,1),('sd',1,NULL,25,1),('sd',1,NULL,26,1),('asd',1,NULL,27,1),('asd',1,NULL,28,1),('brunerln',1,NULL,29,1),('brunerln',1,NULL,30,1),('brunerln',1,NULL,31,1),('brunerln',1,NULL,32,1),('yomama',22,NULL,33,22),('yomama',22,NULL,34,22),('yomama',22,NULL,35,22),('asd',122,NULL,36,21),('123',23,NULL,37,12),('ads',2,NULL,38,1),('zxc',23,NULL,39,1),('asd',12,NULL,40,21),('asd',12,NULL,41,21),('QSAD',121,NULL,42,1),('asd',12,NULL,43,21),('ASDF',12,NULL,44,1),('ASDF',12,NULL,45,1),('weizman',111,NULL,46,2),('weizman',111,NULL,47,2),('weizman',111,NULL,48,2),('weizman',111,NULL,49,2);
/*!40000 ALTER TABLE `Address` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-13 10:25:38
