-- MySQL dump 10.13  Distrib 5.6.30, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: te461
-- ------------------------------------------------------
-- Server version	5.6.30-1

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
-- Current Database: `te461`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `te461` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `te461`;

--
-- Table structure for table `acl`
--

DROP TABLE IF EXISTS `acl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `dept` int(11) DEFAULT '0',
  `pass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl`
--

LOCK TABLES `acl` WRITE;
/*!40000 ALTER TABLE `acl` DISABLE KEYS */;
INSERT INTO `acl` VALUES (1,'dfdfdfd',0,'ZkE4ak9CV3JkWFhaTGREVTVNVEd4UT09');
/*!40000 ALTER TABLE `acl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Civil Engineering'),(2,'Agricultural Engineering'),(3,'Chemical Engineering'),(4,'Computer Engineering'),(5,'Electrical/Electronics Engineering'),(6,'Telecommunication Engineering'),(7,'Geological Engineering'),(8,'Geomatic Engineering'),(9,'Materials Engineering'),(10,'Mechanical Engineering'),(11,'Petroleum Engineering'),(12,'Petrochemical Engineering'),(13,'Aerospace Engineering'),(14,'Biomedical Engineering'),(15,'Metallurgical Engineering');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `username` varchar(100) DEFAULT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lastlogin`
--

DROP TABLE IF EXISTS `lastlogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lastlogin` (
  `username` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lastlogin`
--

LOCK TABLES `lastlogin` WRITE;
/*!40000 ALTER TABLE `lastlogin` DISABLE KEYS */;
INSERT INTO `lastlogin` VALUES ('jayluxferro','127.0.0.1','2016-07-20 01:18:39'),('jayluxferro','127.0.0.1','2016-07-20 01:18:48'),('jayluxferro','127.0.0.1','2016-07-20 01:18:57'),('jayluxferro','127.0.0.1','2016-07-20 01:19:07'),('jayluxferro','127.0.0.1','2016-07-20 01:19:11'),('jayluxferro','127.0.0.1','2016-07-20 01:19:41'),('jayluxferro','127.0.0.1','2016-07-20 01:22:31'),('jayluxferro','127.0.0.1','2016-07-20 01:22:41'),('jayluxferro','127.0.0.1','2016-07-20 01:31:35'),('jayluxferro','127.0.0.1','2016-07-20 01:32:46'),('jayluxferro','127.0.0.1','2016-07-20 01:46:36'),('jayluxferro','127.0.0.1','2016-07-20 01:56:33'),('jayluxferro','127.0.0.1','2016-07-20 06:05:28'),('jayluxferro','127.0.0.1','2016-07-20 09:12:42'),('jayluxferro','127.0.0.1','2016-07-20 01:43:27'),('jayluxferro','127.0.0.1','2016-07-20 03:40:14'),('jayluxferro','127.0.0.1','2016-07-21 01:33:11'),('4134915','127.0.0.1','2016-07-21 03:17:43'),('4134915','127.0.0.1','2016-07-21 08:16:33'),('4134915','127.0.0.1','2016-07-21 08:18:55'),('4134915','127.0.0.1','2016-07-21 09:24:16'),('4134915','127.0.0.1','2016-07-21 09:24:29'),('4134915','127.0.0.1','2016-07-22 05:27:48'),('2191014','127.0.0.1','2016-07-22 05:28:23'),('4134915','127.0.0.1','2016-07-22 05:43:04'),('4134915','127.0.0.1','2016-07-22 12:02:31'),('4134915','127.0.0.1','2016-07-23 12:19:42'),('jayluxferro','127.0.0.1','2016-07-23 12:32:10'),('4134915','127.0.0.1','2016-07-23 01:24:31'),('4134915','127.0.0.1','2016-07-23 03:48:37'),('jayluxferro','127.0.0.1','2016-07-23 03:50:12'),('4134915','127.0.0.1','2016-07-23 04:46:18'),('jayluxferro','127.0.0.1','2016-07-23 04:46:27'),('4134915','127.0.0.1','2016-07-23 05:11:03'),('jayluxferro','127.0.0.1','2016-07-23 05:13:49'),('4134915','127.0.0.1','2016-07-23 05:32:07'),('4134915','127.0.0.1','2016-07-24 10:03:26'),('4134915','127.0.0.1','2016-07-24 10:09:53'),('4134915','127.0.0.1','2016-07-24 10:10:02'),('4134915','127.0.0.1','2016-07-24 10:21:54'),('jayluxferro','127.0.0.1','2016-07-24 10:22:05'),('4134915','127.0.0.1','2016-07-25 11:16:30'),('jayluxferro','127.0.0.1','2016-07-25 11:17:52'),('4134915','127.0.0.1','2016-07-26 10:04:18'),('jayluxferro','127.0.0.1','2016-07-26 10:11:14'),('jayluxferro','127.0.0.1','2016-08-05 10:08:04'),('jayluxferro','127.0.0.1','2016-08-06 12:34:12'),('jayluxferro','127.0.0.1','2016-08-06 12:39:22'),('4134915','127.0.0.1','2016-08-06 12:40:21'),('jayluxferro','127.0.0.1','2016-08-06 12:44:38'),('jayluxferro','127.0.0.1','2016-08-06 07:35:55'),('4134915','127.0.0.1','2016-08-06 07:36:23'),('4134915','127.0.0.1','2016-08-06 08:54:45'),('jayluxferro','127.0.0.1','2016-08-06 08:58:43'),('4134915','127.0.0.1','2016-08-06 09:05:18'),('4134915','127.0.0.1','2016-08-06 10:33:14'),('jayluxferro','127.0.0.1','2016-08-06 11:03:07'),('jayluxferro','127.0.0.1','2016-08-06 10:21:54'),('4134915','127.0.0.1','2016-08-06 10:24:49'),('jayluxferro','127.0.0.1','2016-08-08 04:03:44'),('jjkponyo.soe','127.0.0.1','2016-08-08 04:55:32'),('jjkponyo.soe','127.0.0.1','2016-08-08 05:05:21'),('jjkponyo.soe','127.0.0.1','2016-08-08 05:35:38'),('jjkponyo.soe','127.0.0.1','2016-08-08 05:36:05'),('jjkponyo.soe','127.0.0.1','2016-08-11 04:27:28'),('jayluxferro','127.0.0.1','2016-08-12 11:46:37'),('4134915','127.0.0.1','2016-08-12 12:21:02'),('jjkponyo.soe','127.0.0.1','2016-08-12 04:48:50'),('4134915','127.0.0.1','2016-08-12 05:30:01'),('jjkponyo.soe','127.0.0.1','2016-08-12 05:30:40'),('4134915','127.0.0.1','2016-08-13 10:26:11'),('jayluxferro','127.0.0.1','2016-08-14 07:28:07'),('4134915','127.0.0.1','2016-08-19 10:38:23'),('jjkponyo.soe','127.0.0.1','2016-08-19 10:39:22'),('4134915','127.0.0.1','2016-08-22 12:37:29'),('jjkponyo.soe','127.0.0.1','2016-08-22 12:38:54'),('jjkponyo.soe','127.0.0.1','2016-08-22 01:07:21'),('4134915','127.0.0.1','2016-08-22 01:19:11'),('41349151','127.0.0.1','2016-08-22 01:19:36'),('4134915','127.0.0.1','2016-08-22 01:19:48'),('4444445','127.0.0.1','2016-08-22 01:21:36'),('44444444444','127.0.0.1','2016-08-22 01:26:04'),('44444444444','127.0.0.1','2016-08-22 01:27:01'),('44444444444444','127.0.0.1','2016-08-22 01:27:28'),('jjkponyo.soe','127.0.0.1','2016-08-22 01:29:43'),('jjkponyo.soe','127.0.0.1','2016-08-22 01:31:17'),('4134915','127.0.0.1','2016-08-22 01:41:51'),('jjkponyo.soe','127.0.0.1','2016-08-22 01:56:16'),('4134915','127.0.0.1','2016-08-24 11:13:34'),('jjkponyo.soe','127.0.0.1','2016-08-24 11:13:49'),('jjkponyo.soe','127.0.0.1','2016-08-25 06:46:47'),('4134915','127.0.0.1','2016-08-28 07:16:19'),('jjkponyo.soe','127.0.0.1','2016-08-30 12:07:59'),('4134915','127.0.0.1','2016-08-30 12:09:21'),('jayluxferro','127.0.0.1','2016-09-03 10:56:59'),('jayluxferro','127.0.0.1','2016-09-03 11:05:38'),('daniel','127.0.0.1','2016-09-03 03:01:10'),('jayluxferro','127.0.0.1','2016-09-03 04:12:48'),('jayluxferro','127.0.0.1','2016-09-03 04:20:55'),('daniel','127.0.0.1','2016-09-03 04:22:39'),('daniel','127.0.0.1','2016-09-03 04:27:11'),('daniel','127.0.0.1','2016-09-03 04:27:40'),('daniel','127.0.0.1','2016-09-03 04:28:24'),('daniel','127.0.0.1','2016-09-03 04:55:29'),('daniel','127.0.0.1','2016-09-03 04:56:51'),('daniel','127.0.0.1','2016-09-03 04:57:56'),('jayluxferro','127.0.0.1','2016-09-04 03:12:07'),('daniel','127.0.0.1','2016-09-04 03:12:25'),('daniel','127.0.0.1','2016-09-04 03:21:25'),('jayluxferro','127.0.0.1','2016-09-04 03:30:19'),('daniel','127.0.0.1','2016-09-04 03:31:11'),('jayluxferro','127.0.0.1','2016-09-15 07:25:56'),('7759212','127.0.0.1','2016-11-18 12:19:18'),('7759212','127.0.0.1','2016-11-18 12:20:20'),('7759212','127.0.0.1','2016-11-18 12:45:56'),('7759212','127.0.0.1','2016-11-18 12:49:06'),('7759212','127.0.0.1','2016-11-18 12:55:30'),('9773212','127.0.0.1','2016-11-18 01:12:07'),('9773212','127.0.0.1','2016-11-18 01:14:36'),('jayluxferro','127.0.0.1','2016-11-19 07:09:22'),('jjkponyo.soe','127.0.0.1','2016-11-20 10:02:13'),('jayluxferro','127.0.0.1','2016-11-23 09:31:11'),('jayluxferro','10.42.0.73','2016-11-26 12:51:01'),('jayluxferro','127.0.0.1','2016-11-28 05:56:42');
/*!40000 ALTER TABLE `lastlogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lastpasschng`
--

DROP TABLE IF EXISTS `lastpasschng`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lastpasschng` (
  `username` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lastpasschng`
--

LOCK TABLES `lastpasschng` WRITE;
/*!40000 ALTER TABLE `lastpasschng` DISABLE KEYS */;
/*!40000 ALTER TABLE `lastpasschng` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lastupdatedetails`
--

DROP TABLE IF EXISTS `lastupdatedetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lastupdatedetails` (
  `username` varchar(100) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lastupdatedetails`
--

LOCK TABLES `lastupdatedetails` WRITE;
/*!40000 ALTER TABLE `lastupdatedetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `lastupdatedetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('jayluxferro','a1d04adb346a5a6d66ae77c0e8036c0824a78e48'),('jjkponyo.soe','aa09b6a2d776e6bcd99e81eeeacbae9b06cb4c83'),('dfdfdfd','d2a8584699e5733d5061d666f001a45808870fbc');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logindetails`
--

DROP TABLE IF EXISTS `logindetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logindetails` (
  `username` varchar(100) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobileNo` varchar(100) DEFAULT NULL,
  `dp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logindetails`
--

LOCK TABLES `logindetails` WRITE;
/*!40000 ALTER TABLE `logindetails` DISABLE KEYS */;
INSERT INTO `logindetails` VALUES ('jayluxferro','Justice Owusu Agyemang','justiceowusuagyemang@gmail.com','0501371810','jayluxferro.png'),('jjkponyo.soe','Ing. Dr. Jerry John Kponyo','jjkponyo@ieee.org','0208227980','jjkponyo.soe.png'),('dfdfdfd',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `logindetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realtimechat`
--

DROP TABLE IF EXISTS `realtimechat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `realtimechat` (
  `username` varchar(100) DEFAULT NULL,
  `message` text,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realtimechat`
--

LOCK TABLES `realtimechat` WRITE;
/*!40000 ALTER TABLE `realtimechat` DISABLE KEYS */;
INSERT INTO `realtimechat` VALUES ('jjkponyo.soe','Welcome to TE461','2016-08-22 01:43:04');
/*!40000 ALTER TABLE `realtimechat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentlist`
--

DROP TABLE IF EXISTS `studentlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) DEFAULT NULL,
  `indexnumber` varchar(100) DEFAULT NULL,
  `mobileNo` varchar(1000) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `programme` varchar(100) DEFAULT NULL,
  `topic` varchar(200) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12285 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentlist`
--

LOCK TABLES `studentlist` WRITE;
/*!40000 ALTER TABLE `studentlist` DISABLE KEYS */;
INSERT INTO `studentlist` VALUES (12228,'Nsiah  Kwaku Gyamfi','7762312','','','','Telecommunication Engineering','Assignment-2','','K2xJQmtkNUszUEhQb3p6WGt6enFwZz09'),(12229,'Opoku-inkum Samuel','7762912','','','','Telecommunication Engineering','Assignment-2','','eUVFVWx3N2FRandDUW1Sa3NqbmxnUT09'),(12230,'Abdulai Mariam','9768413','','','','Telecommunication Engineering','Assignment-2','','bGh3YW55UVBYTm4yYWYwU2V2eVBWdz09'),(12231,'Acquah  Shirley','9768513','','','','Telecommunication Engineering','Assignment-2','','NlhuUGUwLzY2Z2F4R1g5Z0xkQkthQT09'),(12232,'Adjei Nuako  Benjamin','9768613','','','','Telecommunication Engineering','Assignment-2','','Wmd0SG1vSWNZOTlZdjBVT291WFBvZz09'),(12233,'Adu Collins Yeboah','9768713','','','','Telecommunication Engineering','Assignment-2','','eEpEUEJ5Uis3bjhIcmFuQzR1VWNRUT09'),(12234,'Agyapong Richmond Asiedu','9768813','','','','Telecommunication Engineering','Assignment-2','','ZG1HOFllZmhmWEppTkNVNWpCeEJ2QT09'),(12235,'Agyenim Boateng Leonard','9768913','','','','Telecommunication Engineering','Assignment-2','','YTVweTRiTDVqOVVkSW9tZFhJOEl3UT09'),(12236,'Aidoo Frank Fiifi','9769013','','','','Telecommunication Engineering','Assignment-2','','WkMreHB4Mm9WTVhOOG1pdkhPcW5ZUT09'),(12237,'Amanin Kwarteng Kwaku Akyeampong','9769213','','','','Telecommunication Engineering','Assignment-2','','cytGMWdpNHQxOWVKc3cvSGZIRFhNZz09'),(12238,'Aning Herta','9769313','','','','Telecommunication Engineering','Assignment-2','','Zkx4NjN4cDZWNXdGMUhZSGNEeDhJdz09'),(12239,'Asakipaam Simon Atuah','9769413','','','','Telecommunication Engineering','Assignment-2','','eFQrS292QXFwTmI5cHltcVkxRk03QT09'),(12240,'Asempah Enoch Kofi','9769513','','','','Telecommunication Engineering','Assignment-2','','eUxYMEZwTmxTd3AzcnRxOWlPSWhrQT09'),(12241,'Atimbire Samuel Adombila','9769613','','','','Telecommunication Engineering','Assignment-2','','M0xJTktSMktJYXdWOFJ6dkxLdTNOdz09'),(12242,'Awortwe Esmond','9769713','','','','Telecommunication Engineering','Assignment-2','','dGRFOVBGLzhtRjRqRExNbWsvSWR1Zz09'),(12243,'Bandoh Stephen','9769813','','','','Telecommunication Engineering','Assignment-2','','Y3R4TGlWSUxrWU5NOTFOZUpHaTR3UT09'),(12244,'Ben-crentsil Isaac','9769913','','','','Telecommunication Engineering','Assignment-2','','VjJycUVVZEpxbTU5M1Qyc0JzYmdmdz09'),(12245,'Boakye Osei Eugene','9770013','','','','Telecommunication Engineering','Assignment-2','','TENBTWhNMlNIa1pIS2E4d1U1K25kZz09'),(12246,'Boamah Abena Asieduaa','9770113','','','','Telecommunication Engineering','Assignment-2','','cXliWG5SZjlxQzc3K2Z2c3YvR3RLUT09'),(12247,'Coker Kenneth','9770313','','','','Telecommunication Engineering','Assignment-2','','K0tnUTM1aDVIaGV5MEFXYzhvVU82QT09'),(12248,'Dabiri Justin Teriwiizi','9770413','','','','Telecommunication Engineering','Assignment-2','','RWhITVY5SVFHdzhvQTFrbi8yZHg3UT09'),(12249,'Damptey Michael','9770513','','','','Telecommunication Engineering','Assignment-2','','YXgvK1JwOWlZMDJHZU5MRDNjM2pBUT09'),(12250,'Dasanah Cletus','9770613','','','','Telecommunication Engineering','Assignment-2','','Zm4vSnhOd2xEUXo3UFh0OWNXdE5sdz09'),(12251,'Ephraim Ekow Esson','9770813','','','','Telecommunication Engineering','Assignment-2','','T2toLzBQYWpmTHJLUHM4emwyd3NlQT09'),(12252,'Forson Nancy','9770913','','','','Telecommunication Engineering','Assignment-2','','QmRnZzZpZ2pwZUVRcmI3TFQvQnhMUT09'),(12253,'Gborsong Theophilus Arthur','9771013','','','','Telecommunication Engineering','Assignment-2','','MjdTMzU2ZEYzTVhLbXlnb01KakRhQT09'),(12254,'Hutton-mills Nancy','9771313','','','','Telecommunication Engineering','Assignment-2','','S2xKM1pXc1o1Q2k3dXRIMmJ0SXZCZz09'),(12255,'Koya Dekumwin Jerome','9771413','','','','Telecommunication Engineering','Assignment-2','','TkxaUFQ1Vkp0bjd3Q1FjQ1dpS3ZQZz09'),(12256,'Kutsienyo Bright Dela','9771613','','','','Telecommunication Engineering','Assignment-2','','MUJQQzV4RVBLU1YrNW9taU5udC8xdz09'),(12257,'Mantey Alfred Mcphilip','9771813','','','','Telecommunication Engineering','Assignment-2','','OUtyU0FvRHZLN3MvcDVoZEV4bEptQT09'),(12258,'Mensa Mighty Mawuena','9771913','','','','Telecommunication Engineering','Assignment-2','','aVcvWTgxaU9xY3VCbk01WHFURm95QT09'),(12259,'Morrison David','9772013','','','','Telecommunication Engineering','Assignment-2','','UUp6YXgyT0NoNStjV0hzdmhPYW5GQT09'),(12260,'Nelson-cofie Michael','9772113','','','','Telecommunication Engineering','Assignment-2','','cGdQL0xJUjRmWkhNdjVYVWVTcTkvUT09'),(12261,'Nkoom Matilda','9772213','','','','Telecommunication Engineering','Assignment-2','','THZiTVhES0kveW9XUmFLbFNueXlQQT09'),(12262,'Nzenwa Chelsea Chidinma','9772413','','','','Telecommunication Engineering','Assignment-2','','cUt1aE9sZEpucU9tVWt2N1I5RTZ1Zz09'),(12263,'Ocansey Richard','9772513','','','','Telecommunication Engineering','Assignment-2','','SFZnSjRVNDllTEFYL1lMSXhJWUV6QT09'),(12264,'Ocran Kofi Obrasi','9772613','','','','Telecommunication Engineering','Assignment-2','','YjNGSitJSDVyK3cxa2ZTeXkydEhyUT09'),(12265,'Oppong Philip','9772813','','','','Telecommunication Engineering','Assignment-2','','Q3Ftc0pJTk0rVFlkRjVkTk8yeXVUdz09'),(12266,'Osei Clement Tano','9772913','','','','Telecommunication Engineering','Assignment-2','','ZVc3ZEczbXcvS3p3VHNUU0lSbmJkZz09'),(12267,'Otuo Kwaku Nantwi','9773113','','','','Telecommunication Engineering','Assignment-2','','d1UvL3JYajJYeUR5S2xTU1JTTU9KQT09'),(12268,'Quampah Samuel Kweku Ofosu','9773313','','','','Telecommunication Engineering','Assignment-2','','UWhRZDA5Z1kyMHV2Qzh5aFJLQ01pUT09'),(12269,'Sama Carlson Mbinglo\'o','9773413','','','','Telecommunication Engineering','Assignment-2','','RDFHekVpMU4wTGIzWUtIcUJMU0czZz09'),(12270,'Tamakloe Kweku Victor','9773513','','','','Telecommunication Engineering','Assignment-2','','SmsvMStPeXZ4WnIzR3k2aFd4TDQvZz09'),(12271,'Tandoh Anthony N.','9773613','','','','Telecommunication Engineering','Assignment-2','','MHJLNDBld056d2oxL09kWHRERVI4Zz09'),(12272,'Taylor Francis Towers','9773713','','','','Telecommunication Engineering','Assignment-2','','UEFrWC84Q2pJNlYwUEpXajVoRHIwUT09'),(12273,'Tetteh Anthony Morrison','9773813','','','','Telecommunication Engineering','Assignment-2','','S1BoM1pLbzQyRmVMZzE2QXc3QW1TUT09'),(12274,'Tetteh Isaac','9773913','','','','Telecommunication Engineering','Assignment-2','','bC9VSzR3WGlIOVVKbUV6b0dDWnJWQT09'),(12275,'Torkpo Enoch Kobla','9774013','','','','Telecommunication Engineering','Assignment-2','','V25SdWpKMDF6S0VlcGsxakJoOVJCdz09'),(12276,'Viswanathan Shankar Sathish','9774113','','','','Telecommunication Engineering','Assignment-2','','SER5d1Z0WjdCdTg1VCtwY3BXYUM4UT09'),(12277,'Woode Theodore','9774213','','','','Telecommunication Engineering','Assignment-2','','eEJjUGdZZExySTV0eXYvQjRxaU1zUT09'),(12278,'Yankey Felix Ekow','9774313','','','','Telecommunication Engineering','Assignment-2','','dVNBVC83QStBVUVlaCttbFRTeXUvdz09'),(12279,'Yeboah Atta Frimpong Kweku','9774413','','','','Telecommunication Engineering','Assignment-2','','T2VqNTUxOURCeE1PNFVGT2hpYWRBdz09'),(12280,'Ziem Isaac Newton','9774513','','','','Telecommunication Engineering','Assignment-2','','amNoMmFCYytRMThhc0NMRUJOd2c5UT09'),(12281,'Bobie David','9770213','','','','Telecommunication Engineering','Assignment-2','','Vm5VNXZNV0o5d0NZRG52VFNWR1BDQT09'),(12282,'','9771213','','','','Telecommunication Engineering','Assignment-2','','aUViTG04VHZOcGkrK1pPb2czQU1pUT09'),(12283,'Kumah Kafui Kofi','9771513','','','','Telecommunication Engineering','Assignment-2','','WkxuVXRjREtTSDhMa2ZucTV0amhOUT09'),(12284,'Owulabi Peter','9773212','','','','Telecommunication Engineering','Assignment-2','','OGpPR2d3TlgrZ3RZbWZ4NjhyeUJtUT09');
/*!40000 ALTER TABLE `studentlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-30 19:50:19
