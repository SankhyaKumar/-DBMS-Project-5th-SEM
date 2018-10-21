-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: dbms
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

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
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches` (
  `branch_id` int(10) NOT NULL,
  `branch_name` varchar(30) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (0,''),(1001,'COMPUTER SCIENCE'),(1002,'ELECTRONICS'),(1003,'ELECTRICAL'),(1004,'MECHANICAL'),(1005,'METALLURGY'),(1006,'CHEMICAL'),(1007,'CIVIL'),(1008,'INFORMATION TECHNOLOGY'),(1009,'INSTRUMENTATION'),(1010,'COMPUTER AND MATHEMATICS');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colleges`
--

DROP TABLE IF EXISTS `colleges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colleges` (
  `clg_id` int(20) NOT NULL,
  `clg_name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`clg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colleges`
--

LOCK TABLES `colleges` WRITE;
/*!40000 ALTER TABLE `colleges` DISABLE KEYS */;
INSERT INTO `colleges` VALUES (10001,'Malaviya National Institute of technolog'),(10002,'Punjab Engineering College'),(10003,'Poornima Engineering College'),(10004,'Manipal University Jaipur'),(10005,'JECRC'),(10006,'Amity University Jaipur'),(10007,'IIT Madras'),(10008,'IIT Bombay'),(10009,'IIT Delhi'),(10010,'IIT Kharagpur'),(10011,'IIT Kanpur'),(10012,'IIT Roorkee'),(10013,'IIT Guwahati'),(10014,'Anna University'),(10015,'IIT Hyderabad'),(10016,'Institute of Chemical Technology');
/*!40000 ALTER TABLE `colleges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_result`
--

DROP TABLE IF EXISTS `exam_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_result` (
  `app_no` int(10) NOT NULL,
  `rank` int(7) NOT NULL,
  PRIMARY KEY (`app_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_result`
--

LOCK TABLES `exam_result` WRITE;
/*!40000 ALTER TABLE `exam_result` DISABLE KEYS */;
INSERT INTO `exam_result` VALUES (1016,54),(1023,110),(1098,99),(1145,1092);
/*!40000 ALTER TABLE `exam_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pref`
--

DROP TABLE IF EXISTS `pref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pref` (
  `app_no` int(10) NOT NULL,
  `pref_no` int(10) NOT NULL,
  `clg_id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pref`
--

LOCK TABLES `pref` WRITE;
/*!40000 ALTER TABLE `pref` DISABLE KEYS */;
INSERT INTO `pref` VALUES (1016,1,10002,1001),(1016,2,10008,1001),(1016,3,10012,1001),(1023,1,10012,1001),(1023,2,10001,1001),(1023,3,10011,1001),(1098,1,10002,1002),(1098,2,10012,1002),(1145,3,10012,1001);
/*!40000 ALTER TABLE `pref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seats`
--

DROP TABLE IF EXISTS `seats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seats` (
  `clg_id` int(20) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `total_seats` int(10) NOT NULL,
  `filled_seats` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seats`
--

LOCK TABLES `seats` WRITE;
/*!40000 ALTER TABLE `seats` DISABLE KEYS */;
INSERT INTO `seats` VALUES (10001,1001,150,0),(10001,1002,100,0),(10001,1003,80,0),(10001,1004,90,0),(10001,1005,90,0),(10001,1006,80,0),(10001,1007,100,0),(10001,1008,90,0),(10001,1009,80,0),(10001,1010,80,0),(10002,1001,120,0),(10002,1002,150,0),(10002,1003,100,0),(10002,1004,80,0),(10002,1005,90,0),(10002,1006,90,0),(10002,1007,80,0),(10002,1008,100,0),(10003,1001,90,0),(10003,1002,80,0),(10003,1003,80,0),(10003,1004,120,0),(10003,1005,150,0),(10003,1006,100,0),(10003,1007,80,0),(10003,1008,90,0),(10003,1009,90,0),(10003,1010,80,0),(10004,1001,100,0),(10004,1002,90,0),(10004,1003,80,0),(10004,1004,80,0),(10004,1005,120,0),(10004,1006,150,0),(10004,1007,100,0),(10004,1009,80,0),(10004,1010,90,0),(10005,1001,90,0),(10005,1002,80,0),(10005,1003,100,0),(10005,1004,90,0),(10005,1005,80,0),(10005,1006,80,0),(10005,1007,120,0),(10005,1008,150,0),(10005,1009,100,0),(10005,1010,80,0),(10006,1001,90,0),(10006,1002,90,0),(10006,1003,80,0),(10006,1004,100,0),(10006,1005,90,0),(10006,1006,80,0),(10006,1007,80,0),(10006,1008,120,0),(10006,1009,150,0),(10006,1010,100,0),(10007,1001,80,0),(10007,1002,90,0),(10007,1003,90,0),(10007,1004,80,0),(10007,1005,100,0),(10008,1006,90,0),(10008,1007,80,0),(10008,1008,80,0),(10008,1009,120,0),(10008,1010,150,0),(10009,1001,100,0),(10009,1002,80,0),(10009,1003,90,0),(10009,1004,90,0),(10009,1005,80,0),(10009,1006,100,0),(10009,1007,90,0),(10009,1008,80,0),(10009,1009,80,0),(10009,1010,120,0),(10010,1001,150,0),(10010,1002,100,0),(10010,1003,80,0),(10010,1004,90,0),(10010,1005,90,0),(10010,1006,80,0),(10010,1007,100,0),(10010,1008,90,0),(10010,1009,80,0),(10010,1010,80,0),(10011,1001,120,0),(10011,1002,150,0),(10011,1003,100,0),(10011,1004,80,0),(10011,1005,90,0),(10011,1006,90,0),(10011,1007,80,0),(10011,1008,100,0),(10011,1009,90,0),(10011,1010,80,0),(10012,1001,80,0),(10012,1002,120,0),(10012,1003,150,0),(10012,1004,100,0),(10012,1005,80,0),(10012,1006,90,0),(10012,1007,90,0),(10012,1008,80,0),(10012,1009,100,0),(10012,1010,90,0),(10013,1001,80,0),(10013,1002,80,0),(10013,1003,120,0),(10013,1004,150,0),(10013,1005,100,0),(10013,1006,80,0),(10013,1007,90,0),(10013,1008,90,0),(10013,1009,80,0),(10013,1010,100,0),(10014,1001,90,0),(10014,1002,80,0),(10014,1003,80,0),(10014,1004,120,0),(10014,1005,150,0),(10014,1006,100,0),(10014,1007,80,0),(10014,1008,90,0),(10014,1009,90,0),(10014,1010,80,0),(10015,1001,100,0),(10015,1002,90,0),(10015,1003,80,0),(10015,1004,80,0),(10015,1005,120,0),(10015,1006,150,0),(10015,1007,100,0),(10015,1008,80,0),(10015,1009,90,0),(10015,1010,90,0),(10016,1001,80,0),(10016,1002,100,0),(10016,1003,90,0),(10016,1004,80,0),(10016,1005,80,0),(10016,1006,120,0);
/*!40000 ALTER TABLE `seats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `app_no` int(10) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `allocated` int(11) DEFAULT NULL,
  PRIMARY KEY (`app_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (0,'','',0,'','',NULL),(1016,'arnav','loonker',8209888041,'cularnav@gmail.com','dmbstest',NULL),(1023,'sidharth','dash',7478277311,'sdash@gmail.com','appxasa',NULL),(1098,'rishabh','kalakoti',8407238727,'rkalakoti@gmail.com','12345678',NULL),(1145,'Sankhya','Mitra',7665900655,'2016ucp1145@mnit.ac.in','admin',NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-22  1:09:47
