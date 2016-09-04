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
-- Table structure for table `Marca_vehiculo`
--

DROP TABLE IF EXISTS `Marca_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Marca_vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(55) NOT NULL,
  `nombre_marca` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Marca_vehiculo`
--

LOCK TABLES `Marca_vehiculo` WRITE;
/*!40000 ALTER TABLE `Marca_vehiculo` DISABLE KEYS */;
INSERT INTO `Marca_vehiculo` VALUES (1,'ACURA','Acura'),(2,'ALFA','Alfa Romeo'),(3,'AMC','AMC'),(4,'ASTON','Aston Martin'),(5,'AUDI','Audi'),(6,'AVANTI','Avanti'),(7,'BENTL','Bentley'),(8,'BMW','BMW'),(9,'BUICK','Buick'),(10,'CAD','Cadillac'),(11,'CHEV','Chevrolet'),(12,'CHRY','Chrysler'),(13,'DAEW','Daewoo'),(14,'DAIHAT','Daihatsu'),(15,'DATSUN','Datsun'),(16,'DELOREAN','DeLorean'),(17,'DODGE','Dodge'),(18,'EAGLE','Eagle'),(19,'FER','Ferrari'),(20,'FIAT','FIAT'),(21,'FISK','Fisker'),(22,'FORD','Ford'),(23,'FREIGHT','Freightliner'),(24,'GEO','Geo'),(25,'GMC','GMC'),(26,'HONDA','Honda'),(27,'AMGEN','HUMMER'),(28,'HYUND','Hyundai'),(29,'INFIN','Infiniti'),(30,'ISU','Isuzu'),(31,'JAG','Jaguar'),(32,'JEEP','Jeep'),(33,'KIA','Kia'),(34,'LAM','Lamborghini'),(35,'LAN','Lancia'),(36,'ROV','Land Rover'),(37,'LEXUS','Lexus'),(38,'LINC','Lincoln'),(39,'LOTUS','Lotus'),(40,'MAS','Maserati'),(41,'MAYBACH','Maybach'),(42,'MAZDA','Mazda'),(43,'MCLAREN','McLaren'),(44,'MB','Mercedes-Benz'),(45,'MERC','Mercury'),(46,'MERKUR','Merkur'),(47,'MINI','MINI'),(48,'MIT','Mitsubishi'),(49,'NISSAN','Nissan'),(50,'OLDS','Oldsmobile'),(51,'PEUG','Peugeot'),(52,'PLYM','Plymouth'),(53,'PONT','Pontiac'),(54,'POR','Porsche'),(55,'RAM','RAM'),(56,'REN','Renault'),(57,'RR','Rolls-Royce'),(58,'SAAB','Saab'),(59,'SATURN','Saturn'),(60,'SCION','Scion'),(61,'SMART','smart'),(62,'SRT','SRT'),(63,'STERL','Sterling'),(64,'SUB','Subaru'),(65,'SUZUKI','Suzuki'),(66,'TESLA','Tesla'),(67,'TOYOTA','Toyota'),(68,'TRI','Triumph'),(69,'VOLKS','Volkswagen'),(70,'VOLVO','Volvo'),(71,'YUGO','Yugo'),(72,'OTRO','OTRO');
/*!40000 ALTER TABLE `Marca_vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-04  1:50:07
