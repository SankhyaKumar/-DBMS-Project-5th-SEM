-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: dbms
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('admin','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

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
  `clg_name` varchar(100) DEFAULT NULL,
  `clg_password` varchar(50) NOT NULL,
  `clg_rank` int(20) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `clg_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`clg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colleges`
--

LOCK TABLES `colleges` WRITE;
/*!40000 ALTER TABLE `colleges` DISABLE KEYS */;
INSERT INTO `colleges` VALUES (0,'clg  name','pass ',0,'website ','email\r'),(10001,'Indian Institute of Technology Madras','SgQSJs',1,'https://www.iitm.ac.in/','cularnav@gmail.com\r'),(10002,'Indian Institute of Technology Bombay','UnFEC2NqNKX',2,'http://www.iitb.ac.in/','cularnav@gmail.com\r'),(10003,'Indian Institute of Technology Delhi','Lnauckp99Is',3,'http://www.iitd.ac.in/','cularnav@gmail.com\r'),(10004,'Indian Institute of Technology Kharagpur','WBUiIWME',4,'http://www.iitkgp.ac.in/','cularnav@gmail.com\r'),(10005,'Indian Institute of Technology Kanpur','5Qd2ua9',5,'https://iitk.ac.in/','cularnav@gmail.com\r'),(10006,'Indian Institute of Technology Roorkee','0FkQZLY',6,'https://www.iitr.ac.in/','cularnav@gmail.com\r'),(10007,'Indian Institute of Technology Guwahati','CKbhBH',7,'http://www.iitg.ac.in/','cularnav@gmail.com\r'),(10008,'Anna University','NcGfgt',8,'https://www.annauniv.edu/','cularnav@gmail.com\r'),(10009,'Indian Institute of Technology Hyderabad','1SuWbx1fQ',9,'https://www.iith.ac.in/','cularnav@gmail.com\r'),(10010,'Institute of Chemical Technology','hKHscsLsd',10,'http://www.ictmumbai.edu.in/','cularnav@gmail.com\r'),(10011,'National Institute of Technology Tiruchirappalli','hEf1x4',11,'https://www.nitt.edu/','cularnav@gmail.com\r'),(10012,'Jadavpur University','lPLsV5YQ',12,'http://www.jaduniv.edu.in/','cularnav@gmail.com\r'),(10013,'Indian Institute of Technology (Indian School of Mines) Dhanbad','PIf1oo',13,'https://www.iitism.ac.in/','cularnav@gmail.com\r'),(10014,'Indian Institute of Technology Indore','59Wglv6qRbmF',14,'http://www.iiti.ac.in/','cularnav@gmail.com\r'),(10015,'National Institute of Technology Rourkela','C7OeUtyP965',15,'http://www.nitrkl.ac.in/','cularnav@gmail.com\r'),(10016,'Vellore Institute of Technology','OFcFaqmcn0',16,'http://www.vit.ac.in/','cularnav@gmail.com\r'),(10017,'Birla Institute of Technology & Science','3HMvPItZxRK',17,'http://www.bits-pilani.ac.in/','cularnav@gmail.com\r'),(10018,'Indian Institute of Technology Bhubaneswar','XaDb5Z',18,'http://www.iitbbs.ac.in/','cularnav@gmail.com\r'),(10019,'Indian Institute of Technology (Banaras Hindu University) Varanas','NzbLJOJkhIV',19,'https://www.iitbhu.ac.in/','cularnav@gmail.com\r'),(10020,'Thapar Institute of Engineering and Technology','PWCIAK7A81',20,'http://www.thapar.edu/','cularnav@gmail.com\r'),(10021,'\"Indian Institute of Engineering Science and Technology',' Shibpur\"',0,'21','http://www.iiests.ac.in/'),(10022,'National Institute of Technology Surathkal','TzDKgqnO',22,'http://www.nitk.ac.in/','cularnav@gmail.com\r'),(10023,'Indian Institute of Technology Ropar','zRtBqH',23,'http://www.iitrpr.ac.in/','cularnav@gmail.com\r'),(10024,'Indian Institute of Space Science and Technology','ghSx397B',24,'https://www.iist.ac.in/','cularnav@gmail.com\r'),(10025,'Indian Institute of Technology Patna','78HGNE',25,'https://www.iitp.ac.in/','cularnav@gmail.com\r'),(10026,'National Institute of Technology Warangal','rSFBxw73uuv',26,'https://www.iitp.ac.in/','cularnav@gmail.com\r'),(10027,'Indian Institute of Technology Mandi','0H9vcX8m',27,'http://www.iitmandi.ac.in/','cularnav@gmail.com\r'),(10028,'Birla Institute of Technology','oZnkBvPABTzd',28,'https://www.bitmesra.ac.in/BIT_Mesra?cid=5&pid=H','cularnav@gmail.com\r'),(10029,'Indian Institute of Technology Gandhinagar','l0cFsbrjnH',29,'https://www.iitgn.ac.in/','cularnav@gmail.com\r'),(10030,'PSG College of Technology','UljrOa',30,'http://www.psgtech.edu/','cularnav@gmail.com\r'),(10031,'Visvesvaraya National Institute of Technology','Fr3nXgx1D6',31,'http://www.vnit.ac.in/','cularnav@gmail.com\r'),(10032,'Jamia Millia Islamia','lK7VDzRZ66L',32,'https://www.jmi.ac.in/','cularnav@gmail.com\r'),(10033,'Shanmugha Arts Science Technology & Research Academy','DMSFkWiv0hq',33,'http://www.htcampus.com/college/shanmugha-arts-science-technology-research-academy/','cularnav@gmail.com\r'),(10034,'Amity University','zT0rHqD',34,'http://www.amity.edu/','cularnav@gmail.com\r'),(10035,'Aligarh Muslim University','lNSar3ZXa',35,'https://www.amu.ac.in/','cularnav@gmail.com\r');
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
INSERT INTO `pref` VALUES (1145,1,10001,1001),(1145,3,10007,1002),(1145,2,10008,1009);
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
INSERT INTO `seats` VALUES (0,0,0,0),(10001,1001,15,0),(10001,1002,11,0),(10001,1003,16,0),(10001,1004,19,0),(10001,1005,11,0),(10002,1001,19,0),(10002,1002,10,0),(10002,1003,17,0),(10002,1004,15,0),(10002,1005,10,0),(10002,1006,16,0),(10003,1001,16,0),(10003,1002,15,0),(10003,1003,19,0),(10003,1004,16,0),(10003,1005,12,0),(10004,1001,17,0),(10004,1002,16,0),(10004,1003,17,0),(10004,1004,13,0),(10004,1005,19,0),(10004,1006,19,0),(10005,1001,12,0),(10005,1002,15,0),(10005,1003,15,0),(10005,1004,19,0),(10005,1005,10,0),(10006,1001,17,0),(10006,1002,13,0),(10006,1003,19,0),(10006,1004,18,0),(10006,1005,19,0),(10007,1001,11,0),(10007,1002,12,0),(10007,1003,11,0),(10007,1004,15,0),(10007,1005,20,0),(10007,1006,18,0),(10008,1001,18,0),(10008,1002,19,0),(10008,1003,11,0),(10008,1004,20,0),(10008,1005,12,0),(10008,1006,12,0),(10009,1001,20,0),(10009,1002,14,0),(10009,1003,20,0),(10009,1004,18,0),(10009,1005,17,0),(10010,1001,11,0),(10010,1002,13,0),(10010,1003,12,0),(10010,1004,20,0),(10010,1005,13,0),(10011,1001,20,0),(10011,1002,14,0),(10011,1003,18,0),(10011,1004,19,0),(10011,1005,10,0),(10012,1001,13,0),(10012,1002,15,0),(10012,1003,13,0),(10012,1004,10,0),(10012,1005,12,0),(10013,1001,14,0),(10013,1002,12,0),(10013,1003,11,0),(10013,1004,13,0),(10013,1005,20,0),(10014,1001,13,0),(10014,1002,18,0),(10014,1003,11,0),(10014,1004,15,0),(10014,1005,18,0),(10015,1001,18,0),(10015,1002,17,0),(10015,1003,17,0),(10015,1004,20,0),(10015,1005,17,0),(10016,1001,19,0),(10016,1002,20,0),(10016,1003,13,0),(10016,1004,12,0),(10016,1005,14,0),(10017,1001,11,0),(10017,1002,16,0),(10017,1003,16,0),(10017,1004,10,0),(10017,1005,14,0),(10018,1001,12,0),(10018,1002,15,0),(10018,1003,14,0),(10018,1004,10,0),(10018,1005,12,0),(10019,1001,19,0),(10019,1002,15,0),(10019,1003,18,0),(10019,1004,14,0),(10019,1005,10,0),(10020,1001,15,0),(10020,1002,13,0),(10020,1003,19,0),(10020,1004,11,0),(10020,1005,17,0),(10020,1006,17,0),(10020,1007,15,0),(10021,1001,11,0),(10021,1002,16,0),(10021,1003,13,0),(10021,1004,13,0),(10021,1005,20,0),(10021,1006,10,0),(10022,1001,20,0),(10022,1002,14,0),(10022,1003,14,0),(10022,1004,12,0),(10022,1005,16,0),(10023,1001,11,0),(10023,1002,14,0),(10023,1003,10,0),(10023,1004,20,0),(10023,1005,10,0),(10023,1006,15,0),(10024,1001,16,0),(10024,1002,17,0),(10024,1003,17,0),(10024,1004,18,0),(10024,1005,18,0),(10024,1006,10,0),(10025,1001,20,0),(10025,1002,12,0),(10025,1003,14,0),(10025,1004,13,0),(10025,1005,14,0),(10025,1006,12,0),(10026,1001,13,0),(10026,1002,19,0),(10026,1003,16,0),(10026,1004,20,0),(10026,1005,14,0),(10026,1006,18,0),(10026,1007,14,0),(10027,1001,11,0),(10027,1002,16,0),(10027,1003,17,0),(10027,1004,18,0),(10027,1005,12,0),(10027,1006,16,0),(10028,1001,19,0),(10028,1002,18,0),(10028,1003,19,0),(10028,1004,16,0),(10028,1005,17,0),(10028,1006,13,0),(10029,1001,13,0),(10029,1002,16,0),(10029,1003,11,0),(10029,1004,17,0),(10029,1005,19,0),(10029,1006,12,0),(10030,1001,20,0),(10030,1002,11,0),(10030,1003,16,0),(10030,1004,16,0),(10030,1005,10,0),(10030,1006,14,0),(10031,1001,12,0),(10031,1002,15,0),(10031,1003,14,0),(10031,1004,10,0),(10031,1005,12,0),(10031,1006,19,0),(10032,1001,15,0),(10032,1002,18,0),(10032,1003,14,0),(10032,1004,10,0),(10032,1005,13,0),(10033,1001,15,0),(10033,1002,13,0),(10033,1003,10,0),(10033,1004,12,0),(10033,1005,14,0),(10034,1001,12,0),(10034,1002,11,0),(10034,1003,13,0),(10034,1004,20,0),(10034,1005,13,0),(10034,1006,18,0),(10035,1001,11,0),(10035,1002,15,0),(10035,1003,18,0),(10035,1004,20,0),(10035,1005,13,0);
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
  `phone` int(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `allocated` int(11) DEFAULT NULL,
  `alloted_clg` int(20) DEFAULT NULL,
  `alloted_branch` int(20) DEFAULT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `ms_12` varchar(100) NOT NULL,
  PRIMARY KEY (`app_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (0,'first_name','last_name',0,'email','password',0,0,0,'',''),(1001,'Ali','Rosario',2147483647,'a.rosario@gmail.com','ewlKoFyIHA9',0,0,0,'',''),(1002,'Emanuel','Roizin',2147483647,'e.roizin@gmail.com','RJdleu0w',0,0,0,'',''),(1003,'Garwin','Waplinton',1577557936,'g.waplinton@gmail.com','6DV0iP',0,0,0,'',''),(1004,'Alvan','Hassey',2147483647,'a.hassey@gmail.com','Iz3b3W32RFzR',0,0,0,'',''),(1005,'Dex','Rockell',2147483647,'d.rockell@gmail.com','rRcfZPE24',0,0,0,'',''),(1006,'Mischa','Oguz',2147483647,'m.oguz@gmail.com','L9wsVtE2',0,0,0,'',''),(1007,'Erik','Barbosa',2147483647,'e.barbosa@gmail.com','915TuQHrbOj',0,0,0,'',''),(1008,'Carmine','Gundrey',2147483647,'c.gundrey@gmail.com','VPv3YP9rzl',0,0,0,'',''),(1009,'Birdie','Rickwood',2147483647,'b.rickwood@gmail.com','kqkE2txjI68V',0,0,0,'',''),(1010,'Giralda','Yanukhin',2147483647,'g.yanukhin@gmail.com','eh2kB9ihfB',0,0,0,'',''),(1011,'George','Eilles',2147483647,'g.eilles@gmail.com','rHXviS',0,0,0,'',''),(1012,'Vanya','Spruce',2147483647,'v.spruce@gmail.com','mGd2EL5',0,0,0,'',''),(1013,'Lana','Fold',2147483647,'l.fold@gmail.com','ek4nB6JN',0,0,0,'',''),(1014,'George','MacKeig',2147483647,'g.mackeig@gmail.com','BEMEvfj6',0,0,0,'',''),(1015,'Dagmar','Linch',2147483647,'d.linch@gmail.com','wAII7hVejR3',0,0,0,'',''),(1016,'Billi','Westcott',2147483647,'b.westcott@gmail.com','0Se5qanSUm',0,0,0,'',''),(1017,'Boris','Danson',2147483647,'b.danson@gmail.com','3jWVt4Q',0,0,0,'',''),(1018,'Ingrid','Lennon',2128101976,'i.lennon@gmail.com','ps79TT',0,0,0,'',''),(1019,'Elsinore','Ragsdale',2147483647,'e.ragsdale@gmail.com','OPaTj3t0IWYB',0,0,0,'',''),(1020,'Arlie','Sinton',2147483647,'a.sinton@gmail.com','v8qHIfBsVnt',0,0,0,'',''),(1021,'Violette','Wilder',2147483647,'v.wilder@gmail.com','XTRUQCGbvEvt',0,0,0,'',''),(1022,'Denny','Drezzer',2147483647,'d.drezzer@gmail.com','aKP3TQbQ0TbA',0,0,0,'',''),(1023,'Skell','Shatliff',2147483647,'s.shatliff@gmail.com','oeenLl3xy',0,0,0,'',''),(1024,'Lennard','Ryles',2147483647,'l.ryles@gmail.com','gkI85wQ8d6',0,0,0,'',''),(1025,'Hana','Laurentin',2147483647,'h.laurentin@gmail.com','hPKADGn',0,0,0,'',''),(1026,'Sarene','Crebbin',2147483647,'s.crebbin@gmail.com','ZF6e6G',0,0,0,'',''),(1027,'Angel','Moyles',2147483647,'a.moyles@gmail.com','ImUbAhDI',0,0,0,'',''),(1028,'Doralyn','Norwood',2147483647,'d.norwood@gmail.com','B6RBjg',0,0,0,'',''),(1029,'Miguel','Brownlea',2147483647,'m.brownlea@gmail.com','iiswPdJuC75',0,0,0,'',''),(1030,'Georg','MacAscaidh',2147483647,'g.macascaidh@gmail.com','YufDL6',0,0,0,'',''),(1031,'Kial','Jarrett',2147483647,'k.jarrett@gmail.com','jwyHqmv',0,0,0,'',''),(1032,'Arne','Golland',2147483647,'a.golland@gmail.com','2tmbGE',0,0,0,'',''),(1033,'Arther','Roullier',2147483647,'a.roullier@gmail.com','3A4G9ZG4jn0',0,0,0,'',''),(1034,'Rickey','Daverin',2147483647,'r.daverin@gmail.com','xgSGkkUnIyS',0,0,0,'',''),(1035,'Gayle','Lunt',2147483647,'g.lunt@gmail.com','jjBQYHahSd',0,0,0,'',''),(1036,'Leticia','Hexam',2147483647,'l.hexam@gmail.com','a48OByTv',0,0,0,'',''),(1037,'Maxy','Neenan',2147483647,'m.neenan@gmail.com','s9aEXa',0,0,0,'',''),(1038,'Stanly','Sitwell',2147483647,'s.sitwell@gmail.com','Zx14KAeF1Abo',0,0,0,'',''),(1039,'Elise','Kermode',2147483647,'e.kermode@gmail.com','RVZgiv',0,0,0,'',''),(1040,'Rockwell','Semper',1676545316,'r.semper@gmail.com','6sCQUcDaHGpT',0,0,0,'',''),(1041,'Melesa','Hackford',2147483647,'m.hackford@gmail.com','uezhtQOVu765',0,0,0,'',''),(1042,'Vina','Qualtrough',2147483647,'v.qualtrough@gmail.com','BiFyDpdaXJ',0,0,0,'',''),(1043,'Lyell','Marshall',2147483647,'l.marshall@gmail.com','xUZHv75E',0,0,0,'',''),(1044,'Demetrius','Gwinnel',2147483647,'d.gwinnel@gmail.com','Nkhn6CfSj2I',0,0,0,'',''),(1045,'Merrie','Hardson',2147483647,'m.hardson@gmail.com','JDf4YaBMefiA',0,0,0,'',''),(1046,'Kameko','Blaby',2147483647,'k.blaby@gmail.com','wDWBnm4jCtdM',0,0,0,'',''),(1047,'Cassandra','Balassa',2118664408,'c.balassa@gmail.com','eydvqz1',0,0,0,'',''),(1048,'Patrizio','Daburn',1225200652,'p.daburn@gmail.com','PGVSotuOWqn',0,0,0,'',''),(1049,'Kellia','Cherm',2147483647,'k.cherm@gmail.com','euBcu95',0,0,0,'',''),(1050,'Robyn','Paprotny',2147483647,'r.paprotny@gmail.com','NeBVZ1fe',0,0,0,'',''),(1051,'Cherilynn','Tricker',2147483647,'c.tricker@gmail.com','QaOJlY',0,0,0,'',''),(1052,'Alexandros','Corkan',2147483647,'a.corkan@gmail.com','PfxjzhJnTB2',0,0,0,'',''),(1053,'Gusella','Farley',2147483647,'g.farley@gmail.com','w5tn2p',0,0,0,'',''),(1054,'Gale','Croydon',2147483647,'g.croydon@gmail.com','fyRsUr8MyM',0,0,0,'',''),(1055,'Meris','Oulet',2147483647,'m.oulet@gmail.com','o7qeyh',0,0,0,'',''),(1056,'Tomas','Sopp',2147483647,'t.sopp@gmail.com','U1Lra9HOx5mr',0,0,0,'',''),(1057,'Wang','Brende',2147483647,'w.brende@gmail.com','ksIvPxu',0,0,0,'',''),(1058,'Malvin','Guice',2147483647,'m.guice@gmail.com','SqD6EnRuf',0,0,0,'',''),(1059,'Christiana','Melbury',2147483647,'c.melbury@gmail.com','hvxVfCuDUmBg',0,0,0,'',''),(1060,'Carolan','Croce',2147483647,'c.croce@gmail.com','AzVHQN211',0,0,0,'',''),(1061,'Shawn','Strangeway',1553040798,'s.strangeway@gmail.com','pWyfiCohQv',0,0,0,'',''),(1062,'Cecile','Powney',2147483647,'c.powney@gmail.com','HkAz9T',0,0,0,'',''),(1063,'Isadora','McGonagle',2147483647,'i.mcgonagle@gmail.com','K9oPi85',0,0,0,'',''),(1064,'Roxane','Devericks',2147483647,'r.devericks@gmail.com','2lo039U2y2my',0,0,0,'',''),(1065,'Matti','Cantrill',1755909402,'m.cantrill@gmail.com','5hrfcb',0,0,0,'',''),(1066,'Rockey','Maletratt',2147483647,'r.maletratt@gmail.com','42KIXzTHH',0,0,0,'',''),(1067,'Mala','Haymes',2147483647,'m.haymes@gmail.com','SXWjr3',0,0,0,'',''),(1068,'Lem','Foss',1404172378,'l.foss@gmail.com','hajaOznH',0,0,0,'',''),(1069,'Reynard','Noriega',2147483647,'r.noriega@gmail.com','WXaeEw',0,0,0,'',''),(1070,'Babara','O\'Mailey',2147483647,'b.o\'mailey@gmail.com','zIAahNvm5',0,0,0,'',''),(1071,'Micky','Dalliston',2147483647,'m.dalliston@gmail.com','D52ze3',0,0,0,'',''),(1072,'Taddeusz','Bettington',2147483647,'t.bettington@gmail.com','RwhBHCxf6Q',0,0,0,'',''),(1073,'Cyndie','Loudiane',2147483647,'c.loudiane@gmail.com','A3ssVj0C',0,0,0,'',''),(1074,'Janeta','Pescott',2147483647,'j.pescott@gmail.com','QUVknT73b3',0,0,0,'',''),(1075,'Glenn','Fackrell',2147483647,'g.fackrell@gmail.com','75WHoAP',0,0,0,'',''),(1076,'Ardys','Marshal',2147483647,'a.marshal@gmail.com','HGro1sj',0,0,0,'',''),(1077,'Jens','Wait',2147483647,'j.wait@gmail.com','1gUKpp',0,0,0,'',''),(1078,'Gordon','Condie',2147483647,'g.condie@gmail.com','9kEybSmk',0,0,0,'',''),(1079,'Joy','Goodrich',2147483647,'j.goodrich@gmail.com','0N81QQQaz952',0,0,0,'',''),(1080,'Arvie','Pinson',2147483647,'a.pinson@gmail.com','ZOKum6Jpn',0,0,0,'',''),(1081,'Merrel','Carnalan',2147483647,'m.carnalan@gmail.com','8PjrOnu',0,0,0,'',''),(1082,'Obidiah','Itzchaky',2147483647,'o.itzchaky@gmail.com','fgK6ut',0,0,0,'',''),(1083,'Hubey','Goudman',2147483647,'h.goudman@gmail.com','PJiDjIZYz',0,0,0,'',''),(1084,'Joshuah','Lemoir',2147483647,'j.lemoir@gmail.com','nmkQZ6DeWkg',0,0,0,'',''),(1085,'Allan','Knoller',2147483647,'a.knoller@gmail.com','46NReE1',0,0,0,'',''),(1086,'Ham','Stent',2147483647,'h.stent@gmail.com','wmnKefvXs1',0,0,0,'',''),(1087,'Cherrita','McIsaac',2147483647,'c.mcisaac@gmail.com','Ptf8dobcEV',0,0,0,'',''),(1088,'Maighdiln','Vidloc',2147483647,'m.vidloc@gmail.com','euX6T1',0,0,0,'',''),(1089,'Mattias','Petricek',2147483647,'m.petricek@gmail.com','eGfUfcX5o',0,0,0,'',''),(1090,'Bamby','Forsaith',2147483647,'b.forsaith@gmail.com','p8TwSi28fwKd',0,0,0,'',''),(1091,'Inglis','Goldring',2147483647,'i.goldring@gmail.com','v7h1t1vfGZX',0,0,0,'',''),(1092,'Waiter','Salmen',2147483647,'w.salmen@gmail.com','87zLBAuhzK',0,0,0,'',''),(1093,'Winston','Sier',2147483647,'w.sier@gmail.com','7LfWp6C30',0,0,0,'',''),(1094,'Mac','Forshaw',2147483647,'m.forshaw@gmail.com','ig2LbgxhWxbZ',0,0,0,'',''),(1095,'Amara','Lawther',2147483647,'a.lawther@gmail.com','GGerF5v8Qnq',0,0,0,'',''),(1096,'Jonah','MacDiarmid',2147483647,'j.macdiarmid@gmail.com','vJ15qqIa',0,0,0,'',''),(1097,'Adelbert','MacAlpine',2147483647,'a.macalpine@gmail.com','z1YrgA0d9I',0,0,0,'',''),(1098,'Walliw','Millin',2147483647,'w.millin@gmail.com','GYZhJmEP',0,0,0,'',''),(1099,'Harwilll','Skitt',2147483647,'h.skitt@gmail.com','tq7oa18TBds',0,0,0,'',''),(1100,'Doy','Woodworth',2147483647,'d.woodworth@gmail.com','cqcfIj',0,0,0,'','');
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

-- Dump completed on 2018-10-31 18:07:00
