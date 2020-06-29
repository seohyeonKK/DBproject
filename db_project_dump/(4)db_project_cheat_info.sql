-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: db_project
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cheat_info`
--

DROP TABLE IF EXISTS `cheat_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cheat_info` (
  `register_code` int NOT NULL AUTO_INCREMENT,
  `cheater_code_cheat` int NOT NULL,
  `item` varchar(20) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`register_code`),
  KEY `cheat_info_ibfk_1` (`cheater_code_cheat`),
  CONSTRAINT `cheat_info_ibfk_1` FOREIGN KEY (`cheater_code_cheat`) REFERENCES `cheater_info` (`cheater_code`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cheat_info`
--

LOCK TABLES `cheat_info` WRITE;
/*!40000 ALTER TABLE `cheat_info` DISABLE KEYS */;
INSERT INTO `cheat_info` VALUES (1,1,'아이폰5s',400000),(2,2,'노트북',700000),(3,3,'자켓',60000),(4,2,'LG그램',400000),(5,4,'아이패드2세대',200000),(6,5,'LED',30000),(7,3,'코트',100000),(8,1,'아이폰11프로',1120000),(9,4,'아이패드3세대프로',1200000),(10,6,'닌텐도 스위치',450000),(11,2,'삼성갤럭시북',1500000),(12,7,'니트',30000),(13,6,'닌텐도DS',300000),(14,7,'바지',130000);
/*!40000 ALTER TABLE `cheat_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-28 23:32:23
