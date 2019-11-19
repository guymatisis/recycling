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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Bin_Notifications`
--

DROP TABLE IF EXISTS `Bin_Notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bin_Notifications` (
  `Bin_ID` int(11) DEFAULT '-1',
  `Date` date DEFAULT NULL,
  `User_ID` varchar(45) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Bin_Type`
--

DROP TABLE IF EXISTS `Bin_Type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bin_Type` (
  `Bin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Color` varchar(45) DEFAULT NULL,
  `Size` int(11) DEFAULT NULL,
  PRIMARY KEY (`Bin_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Bins`
--

DROP TABLE IF EXISTS `Bins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bins` (
  `Longitude` float DEFAULT NULL,
  `Latitude` float DEFAULT NULL,
  `Bin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Muni_ID` int(11) DEFAULT NULL,
  `Bin_Type` int(11) DEFAULT NULL,
  PRIMARY KEY (`Bin_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Municipality`
--

DROP TABLE IF EXISTS `Municipality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Municipality` (
  `Name` char(32) DEFAULT NULL,
  `Admin1_ID` int(11) DEFAULT NULL,
  `Admin2_ID` int(11) DEFAULT NULL,
  `Muni_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Muni_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bin_location_suggestions`
--

DROP TABLE IF EXISTS `bin_location_suggestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bin_location_suggestions` (
  `User_ID` int(11) DEFAULT NULL,
  `longitude` char(25) DEFAULT NULL,
  `latitude` char(25) DEFAULT NULL,
  `suggestion_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`suggestion_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `registered_users`
--

DROP TABLE IF EXISTS `registered_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registered_users` (
  `first_name` char(32) DEFAULT NULL,
  `last_name` char(32) DEFAULT NULL,
  `user_name` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `Address_ID` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-19 21:08:24
