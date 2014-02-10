CREATE DATABASE  IF NOT EXISTS `friends` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `friends`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: friends
-- ------------------------------------------------------
-- Server version	5.5.33

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
-- Table structure for table `friendsidentities`
--

DROP TABLE IF EXISTS `friendsidentities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friendsidentities` (
  `user_id` int(11) NOT NULL,
  `friend_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friendsidentities`
--

LOCK TABLES `friendsidentities` WRITE;
/*!40000 ALTER TABLE `friendsidentities` DISABLE KEYS */;
INSERT INTO `friendsidentities` VALUES (1,'15'),(15,'1'),(1,'8'),(8,'1'),(1,'3'),(3,'1'),(1,'5'),(5,'1'),(1,'6'),(6,'1');
/*!40000 ALTER TABLE `friendsidentities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Gurpreet','Kalra','grprtkal@gmail.com','123456789','2013-11-14 19:21:20','2013-11-14 19:21:20'),(2,'Mary ','Smith','mary@gmail.com','mary123','2013-11-14 22:26:27','2013-11-14 22:26:27'),(3,'John','Smith','john@gmail.com','123john','2013-11-14 22:28:44','2013-11-14 22:28:44'),(4,'Hello','Kitty','kitty@gmail.com','hellokitty','2013-11-14 22:30:04','2013-11-14 22:30:04'),(5,'Pumpkin','Pie','pumpkin@gmail.com','123pumpkin','2013-11-14 22:30:37','2013-11-14 22:30:37'),(6,'Tom','Cruise','tom@gmail.com','tomtom123','2013-11-14 22:31:53','2013-11-14 22:31:53'),(7,'Mickey','Mouse','mickey@gmail.com','123mickey','2013-11-14 22:33:17','2013-11-14 22:33:17'),(8,'Brad ','Pitt','brad@gmail.com','bradbrad','2013-11-14 23:03:34','2013-11-14 23:03:34'),(9,'Tommy','Lee','tommy@gmail.com','1234512345','2013-11-14 23:24:52','2013-11-14 23:24:52'),(12,'Harry','Man','harry@gmail.com','123harry','2013-11-15 11:45:58','2013-11-15 11:45:58'),(14,'Mary','May','marymay@gmail.com','999mary','2013-11-15 13:17:25','2013-11-15 13:17:25'),(15,'Terry','Park','terry@gmail.com','terryterry','2013-11-15 13:20:32','2013-11-15 13:20:32');
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

-- Dump completed on 2013-11-18 11:20:20
