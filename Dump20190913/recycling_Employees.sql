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
-- Table structure for table `Employees`
--

DROP TABLE IF EXISTS `Employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Employees` (
  `First_Name` varchar(45) DEFAULT NULL,
  `Last_Name` varchar(45) DEFAULT NULL,
  `Phone_Number` varchar(45) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Address_ID` int(11) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Muni_ID` int(11) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Admin` int(11) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `Employee_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employees`
--

LOCK TABLES `Employees` WRITE;
/*!40000 ALTER TABLE `Employees` DISABLE KEYS */;
INSERT INTO `Employees` VALUES ('qw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),('f','l','aaa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('we','qwe','qwe','2019-08-01',NULL,NULL,NULL,NULL,NULL,NULL,3),('asd','asd','asd','2019-08-15',15,NULL,NULL,NULL,NULL,NULL,4),('asd','asd','2112','2019-08-07',25,'matisis',NULL,NULL,NULL,NULL,5),('sad','asd','123','2019-08-15',28,'matisis',1,'asd',1,NULL,6),('bob','bruner','0528887777','2019-08-01',29,'bobob',1,'bob@bb.com',1,NULL,7),('bob','bruner','0528887777','2019-08-01',30,'bobob',1,'bob@bb.com',1,NULL,8),('bob','bruner','0528887777','2019-08-01',31,'bobob',1,'bob@bb.com',1,NULL,9),('bob','bruner','0528887777','2019-08-01',32,'bobob',1,'bob@bb.com',1,NULL,10),('qwe','qwe','`12','2019-08-16',38,'matisis',NULL,'ad',0,NULL,11),('asd','sa','12','2019-08-23',0,'matisis',1,'aD',1,NULL,12),('Kayne','Ryan','7816900506','2019-08-02',0,'matisis',-1,'ASDF',1,NULL,13),('guy','matisis','123','2019-08-22',47,'matisis',5,'asfd',1,'username',14),('sup','admin','234','2019-08-22',1,'matisis',0,'12',4,'supadmin',15);
/*!40000 ALTER TABLE `Employees` ENABLE KEYS */;
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
