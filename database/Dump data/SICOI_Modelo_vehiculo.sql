-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: SICOI
-- ------------------------------------------------------
-- Server version	5.7.10

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
-- Table structure for table `Modelo_vehiculo`
--

DROP TABLE IF EXISTS `Modelo_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Modelo_vehiculo` (
  `idModelo_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `Año` varchar(45) NOT NULL,
  PRIMARY KEY (`idModelo_vehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Modelo_vehiculo`
--

LOCK TABLES `Modelo_vehiculo` WRITE;
/*!40000 ALTER TABLE `Modelo_vehiculo` DISABLE KEYS */;
INSERT INTO `Modelo_vehiculo` VALUES (1,'1950'),(2,'1951'),(3,'1952'),(4,'1953'),(5,'1954'),(6,'1955'),(7,'1956'),(8,'1957'),(9,'1958'),(10,'1959'),(11,'1960'),(12,'1961'),(13,'1962'),(14,'1963'),(15,'1964'),(16,'1965'),(17,'1966'),(18,'1967'),(19,'1968'),(20,'1969'),(21,'1970'),(22,'1971'),(23,'1972'),(24,'1973'),(25,'1974'),(26,'1975'),(27,'1976'),(28,'1977'),(29,'1978'),(30,'1979'),(31,'1980'),(32,'1981'),(33,'1982'),(34,'1983'),(35,'1984'),(36,'1985'),(37,'1986'),(38,'1987'),(39,'1988'),(40,'1989'),(41,'1990'),(42,'1991'),(43,'1992'),(44,'1993'),(45,'1994'),(46,'1995'),(47,'1996'),(48,'1997'),(49,'1998'),(50,'1999'),(51,'2000'),(52,'2001'),(53,'2002'),(54,'2003'),(55,'2004'),(56,'2005'),(57,'2006'),(58,'2007'),(59,'2008'),(60,'2009'),(61,'2010'),(62,'2011'),(63,'2012'),(64,'2013'),(65,'2014'),(66,'2015'),(67,'2016');
/*!40000 ALTER TABLE `Modelo_vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-04  1:50:06
