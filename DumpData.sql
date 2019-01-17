-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: c9
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

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
-- Table structure for table `Major`
--

DROP TABLE IF EXISTS `Major`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Major` (
  `major_name` varchar(30) NOT NULL,
  `major_office` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`major_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Major`
--

LOCK TABLES `Major` WRITE;
/*!40000 ALTER TABLE `Major` DISABLE KEYS */;
INSERT INTO `Major` VALUES ('관광경영학과','관광경영학과 사무실'),('기계공학과','기계공학과 사무실'),('사회체육학과','사회체육학과 사무실'),('식품영양학과','식품영양학과 사무실'),('연극무용학과','연극무용학과 사무실'),('영문학과','영문학과 사무실'),('유아교육과','유아교육과 사무실'),('의예과','의예과 사무실'),('전자공학과','전자공학과 사무실'),('컴퓨터공학과','컴퓨터공학과 사무실');
/*!40000 ALTER TABLE `Major` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `Major_view`
--

DROP TABLE IF EXISTS `Major_view`;
/*!50001 DROP VIEW IF EXISTS `Major_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Major_view` (
  `major_name` tinyint NOT NULL,
  `major_office` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Meeting`
--

DROP TABLE IF EXISTS `Meeting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Meeting` (
  `m_stu_num` int(11) NOT NULL DEFAULT '0',
  `m_date` varchar(30) NOT NULL DEFAULT '',
  `m_contents` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`m_stu_num`,`m_date`),
  CONSTRAINT `Meeting_ibfk_1` FOREIGN KEY (`m_stu_num`) REFERENCES `Student` (`stu_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Meeting`
--

LOCK TABLES `Meeting` WRITE;
/*!40000 ALTER TABLE `Meeting` DISABLE KEYS */;
INSERT INTO `Meeting` VALUES (20100001,'2017년12월11일 06시 29분 09초','위 학생은 키가 크다.'),(20100001,'2017년12월11일 06시 29분 21초','알고보니 더크다.'),(20130001,'2017년12월11일 11시 46분 49초','생각보다 마음씨가 고우며 착합니다.');
/*!40000 ALTER TABLE `Meeting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `Meeting_view`
--

DROP TABLE IF EXISTS `Meeting_view`;
/*!50001 DROP VIEW IF EXISTS `Meeting_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Meeting_view` (
  `m_stu_num` tinyint NOT NULL,
  `m_date` tinyint NOT NULL,
  `m_contents` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Opensubject`
--

DROP TABLE IF EXISTS `Opensubject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Opensubject` (
  `osu_make_num` int(11) NOT NULL DEFAULT '0',
  `osu_sub_num` int(11) NOT NULL DEFAULT '0',
  `osu_year` int(11) NOT NULL DEFAULT '0',
  `osu_sub_semester` int(11) NOT NULL DEFAULT '0',
  `osu_prof_num` int(11) NOT NULL,
  PRIMARY KEY (`osu_make_num`,`osu_sub_num`,`osu_year`,`osu_sub_semester`),
  KEY `osu_sub_num` (`osu_sub_num`),
  KEY `osu_prof_num` (`osu_prof_num`),
  KEY `osu_sub_semester` (`osu_sub_semester`),
  CONSTRAINT `Opensubject_ibfk_1` FOREIGN KEY (`osu_sub_num`) REFERENCES `Subject` (`sub_num`),
  CONSTRAINT `Opensubject_ibfk_2` FOREIGN KEY (`osu_prof_num`) REFERENCES `Professor` (`prof_num`),
  CONSTRAINT `Opensubject_ibfk_3` FOREIGN KEY (`osu_sub_semester`) REFERENCES `Subject` (`semester`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Opensubject`
--

LOCK TABLES `Opensubject` WRITE;
/*!40000 ALTER TABLE `Opensubject` DISABLE KEYS */;
INSERT INTO `Opensubject` VALUES (201810001,10001,2018,1,1),(201810010,10010,2018,1,1),(201810003,10003,2018,1,2),(201810005,10005,2018,1,3),(201810012,10012,2018,1,3),(201820010,20010,2018,1,5);
/*!40000 ALTER TABLE `Opensubject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `Opensubject_view`
--

DROP TABLE IF EXISTS `Opensubject_view`;
/*!50001 DROP VIEW IF EXISTS `Opensubject_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Opensubject_view` (
  `osu_make_num` tinyint NOT NULL,
  `osu_sub_num` tinyint NOT NULL,
  `osu_year` tinyint NOT NULL,
  `osu_sub_semester` tinyint NOT NULL,
  `osu_prof_num` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `Osubject_view`
--

DROP TABLE IF EXISTS `Osubject_view`;
/*!50001 DROP VIEW IF EXISTS `Osubject_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Osubject_view` (
  `osu_make_num` tinyint NOT NULL,
  `osu_sub_num` tinyint NOT NULL,
  `osu_year` tinyint NOT NULL,
  `osu_sub_semester` tinyint NOT NULL,
  `osu_prof_num` tinyint NOT NULL,
  `sub_name` tinyint NOT NULL,
  `sub_major_name` tinyint NOT NULL,
  `goal_grade` tinyint NOT NULL,
  `division` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Professor`
--

DROP TABLE IF EXISTS `Professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Professor` (
  `prof_num` int(11) NOT NULL,
  `prof_name` varchar(30) NOT NULL,
  `prof_major_name` varchar(30) NOT NULL,
  PRIMARY KEY (`prof_num`),
  KEY `prof_major_name` (`prof_major_name`),
  CONSTRAINT `Professor_ibfk_1` FOREIGN KEY (`prof_major_name`) REFERENCES `Major` (`major_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Professor`
--

LOCK TABLES `Professor` WRITE;
/*!40000 ALTER TABLE `Professor` DISABLE KEYS */;
INSERT INTO `Professor` VALUES (1,'이해각','컴퓨터공학과'),(2,'하상호','컴퓨터공학과'),(3,'천인국','컴퓨터공학과'),(4,'강찬민','기계공학과'),(5,'박현우','기계공학과'),(6,'최중혁','기계공학과'),(7,'복진우','유아교육과'),(8,'문준영','유아교육과'),(9,'임시완','유아교육과'),(10,'황광희','식품영양학과'),(11,'김태현','식품영양학과'),(12,'정희철','식품영양학과'),(13,'하민우','연극무용학과'),(14,'박형식','연극무용학과'),(15,'김동준','연극무용학과'),(16,'김희철','전자공학과'),(17,'조예성','전자공학과'),(18,'임윤아','전자공학과'),(19,'김태연','영문학과'),(20,'서주현','영문학과'),(21,'배주현','영문학과'),(22,'이강욱','관광경영학과'),(23,'김다현','관광경영학과'),(24,'박수정','관광경영학과'),(25,'이순규','의예과'),(26,'강소라','의예과'),(27,'고준희','의예과'),(28,'김태희','사회체육학과'),(29,'이나영','사회체육학과'),(30,'박준현','사회체육학과'),(31,'이교수','컴퓨터공학과'),(32,'안톤','기계공학과');
/*!40000 ALTER TABLE `Professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `Professor_view`
--

DROP TABLE IF EXISTS `Professor_view`;
/*!50001 DROP VIEW IF EXISTS `Professor_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Professor_view` (
  `prof_num` tinyint NOT NULL,
  `prof_name` tinyint NOT NULL,
  `prof_major_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Student` (
  `stu_num` int(11) NOT NULL,
  `stu_name` varchar(30) DEFAULT NULL,
  `stu_grade` int(11) DEFAULT NULL,
  `stu_major_name` varchar(30) DEFAULT NULL,
  `stu_prof_num` int(11) NOT NULL,
  `stu_gender` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`stu_num`),
  KEY `stu_major_name` (`stu_major_name`),
  KEY `stu_prof_num` (`stu_prof_num`),
  CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`stu_major_name`) REFERENCES `Major` (`major_name`),
  CONSTRAINT `Student_ibfk_2` FOREIGN KEY (`stu_prof_num`) REFERENCES `Professor` (`prof_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Student`
--

LOCK TABLES `Student` WRITE;
/*!40000 ALTER TABLE `Student` DISABLE KEYS */;
INSERT INTO `Student` VALUES (20100001,'일동근',4,'컴퓨터공학과',1,'여'),(20100002,'이동근',4,'컴퓨터공학과',2,'남'),(20100003,'삼동근',4,'컴퓨터공학과',3,'여'),(20100011,'일준호',4,'기계공학과',5,'여'),(20100012,'이준호',4,'기계공학과',4,'남'),(20100013,'삼준호',4,'기계공학과',6,'여'),(20100021,'일준면',4,'유아교육과',7,'여'),(20100022,'이준면',4,'유아교육과',8,'남'),(20100023,'삼준면',4,'유아교육과',9,'여'),(20100031,'일종인',4,'식품영양학과',10,'여'),(20100032,'이종인',4,'식품영양학과',11,'남'),(20100033,'삼종인',4,'식품영양학과',12,'여'),(20100041,'일종대',4,'연극무용학과',13,'여'),(20100042,'이종대',4,'연극무용학과',14,'남'),(20100043,'삼종대',4,'연극무용학과',15,'여'),(20100051,'일유천',4,'전자공학과',16,'여'),(20100052,'이유천',4,'전자공학과',17,'남'),(20100053,'삼유천',4,'전자공학과',18,'여'),(20100061,'일찬성',4,'영문학과',19,'여'),(20100062,'이찬성',4,'영문학과',20,'남'),(20100063,'삼찬성',4,'영문학과',21,'여'),(20100071,'일태우',4,'관광경영학과',22,'여'),(20100072,'이태우',4,'관광경영학과',23,'남'),(20100073,'삼태우',4,'관광경영학과',24,'여'),(20100081,'일주환',4,'의예과',25,'여'),(20100082,'이주환',4,'의예과',26,'남'),(20100083,'삼주환',4,'의예과',27,'여'),(20100091,'일연식',4,'사회체육학과',28,'여'),(20100092,'이연식',4,'사회체육학과',29,'남'),(20100093,'삼연식',4,'사회체육학과',30,'여'),(20110001,'일재현',3,'컴퓨터공학과',3,'남'),(20110002,'이재현',3,'컴퓨터공학과',3,'여'),(20110003,'삼재현',3,'컴퓨터공학과',3,'남'),(20110011,'일석희',3,'기계공학과',6,'남'),(20110012,'이석희',3,'기계공학과',6,'여'),(20110013,'삼석희',3,'기계공학과',6,'남'),(20110021,'일선희',3,'유아교육과',9,'남'),(20110022,'이선희',3,'유아교육과',9,'여'),(20110023,'삼선희',3,'유아교육과',9,'남'),(20110031,'일찬열',3,'식품영양학과',12,'남'),(20110032,'이찬열',3,'식품영양학과',12,'여'),(20110033,'삼찬열',3,'식품영양학과',12,'남'),(20110041,'일우민',3,'연극무용학과',15,'남'),(20110042,'이우민',3,'연극무용학과',15,'여'),(20110043,'삼우민',3,'연극무용학과',15,'남'),(20110051,'일재중',3,'전자공학과',18,'남'),(20110052,'이재중',3,'전자공학과',18,'여'),(20110053,'삼재중',3,'전자공학과',18,'남'),(20110061,'일우영',3,'영문학과',21,'남'),(20110062,'이우영',3,'영문학과',21,'여'),(20110063,'삼우영',3,'영문학과',21,'남'),(20110071,'일호영',3,'관광경영학과',24,'남'),(20110072,'이호영',3,'관광경영학과',24,'여'),(20110073,'삼호영',3,'관광경영학과',24,'남'),(20110081,'일영서',3,'의예과',27,'남'),(20110082,'이영서',3,'의예과',27,'여'),(20110083,'삼영서',3,'의예과',27,'남'),(20110091,'일승찬',3,'사회체육학과',30,'남'),(20110092,'이승찬',3,'사회체육학과',30,'여'),(20110093,'삼승찬',3,'사회체육학과',30,'남'),(20120001,'일경준',2,'컴퓨터공학과',2,'여'),(20120002,'이경준',2,'컴퓨터공학과',2,'남'),(20120003,'삼경준',2,'컴퓨터공학과',2,'여'),(20120011,'일승훈',2,'기계공학과',5,'여'),(20120012,'이승훈',2,'기계공학과',5,'남'),(20120013,'삼승훈',2,'기계공학과',5,'여'),(20120021,'일혜린',2,'유아교육과',8,'여'),(20120022,'이혜린',2,'유아교육과',8,'남'),(20120023,'삼혜린',2,'유아교육과',8,'여'),(20120031,'일수호',2,'식품영양학과',11,'여'),(20120032,'이수호',2,'식품영양학과',11,'남'),(20120033,'삼수호',2,'식품영양학과',11,'여'),(20120041,'일세훈',2,'연극무용학과',14,'여'),(20120042,'이세훈',2,'연극무용학과',14,'남'),(20120043,'삼세훈',2,'연극무용학과',14,'여'),(20120051,'일창민',2,'전자공학과',17,'여'),(20120052,'이창민',2,'전자공학과',17,'남'),(20120053,'삼창민',2,'전자공학과',17,'여'),(20120061,'일택연',2,'영문학과',20,'여'),(20120062,'이택연',2,'영문학과',20,'남'),(20120063,'삼택연',2,'영문학과',20,'여'),(20120071,'일계상',2,'관광경영학과',23,'여'),(20120072,'이계상',2,'관광경영학과',23,'남'),(20120073,'삼계상',2,'관광경영학과',23,'여'),(20120081,'일소미',2,'의예과',26,'여'),(20120082,'이소미',2,'의예과',26,'남'),(20120083,'삼소미',2,'의예과',26,'여'),(20120091,'일문성',2,'사회체육학과',29,'여'),(20120092,'이문성',2,'사회체육학과',29,'남'),(20120093,'삼문성',2,'사회체육학과',29,'여'),(20130001,'일지훈',1,'컴퓨터공학과',1,'남'),(20130002,'이지훈',1,'컴퓨터공학과',1,'여'),(20130003,'삼지훈',1,'컴퓨터공학과',1,'남'),(20130011,'일택윤',1,'기계공학과',4,'남'),(20130012,'이택윤',1,'기계공학과',4,'여'),(20130013,'삼택윤',1,'기계공학과',4,'남'),(20130021,'일찬미',1,'유아교육과',7,'남'),(20130022,'이찬미',1,'유아교육과',7,'여'),(20130023,'삼찬미',1,'유아교육과',7,'남'),(20130031,'일경수',1,'식품영양학과',10,'남'),(20130032,'이경수',1,'식품영양학과',10,'여'),(20130033,'삼경수',1,'식품영양학과',10,'남'),(20130041,'일백현',1,'연극무용학과',13,'남'),(20130042,'이백현',1,'연극무용학과',13,'여'),(20130043,'삼백현',1,'연극무용학과',13,'남'),(20130051,'일윤호',1,'전자공학과',16,'남'),(20130052,'이윤호',1,'전자공학과',16,'여'),(20130053,'삼윤호',1,'전자공학과',16,'남'),(20130061,'일준수',1,'영문학과',19,'남'),(20130062,'이준수',1,'영문학과',19,'여'),(20130063,'삼준수',1,'영문학과',19,'남'),(20130071,'일준형',1,'관광경영학과',22,'남'),(20130072,'이준형',1,'관광경영학과',22,'여'),(20130073,'삼준형',1,'관광경영학과',22,'남'),(20130081,'일유정',1,'의예과',25,'남'),(20130082,'이유정',1,'의예과',25,'여'),(20130083,'삼유정',1,'의예과',25,'남'),(20130091,'일광전',1,'사회체육학과',28,'남'),(20130092,'이광전',1,'사회체육학과',28,'여'),(20130093,'삼광전',1,'사회체육학과',28,'남');
/*!40000 ALTER TABLE `Student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `Student_view`
--

DROP TABLE IF EXISTS `Student_view`;
/*!50001 DROP VIEW IF EXISTS `Student_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Student_view` (
  `stu_num` tinyint NOT NULL,
  `stu_name` tinyint NOT NULL,
  `stu_grade` tinyint NOT NULL,
  `stu_major_name` tinyint NOT NULL,
  `stu_prof_num` tinyint NOT NULL,
  `stu_gender` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Subject`
--

DROP TABLE IF EXISTS `Subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Subject` (
  `sub_num` int(11) NOT NULL,
  `sub_name` varchar(30) NOT NULL,
  `sub_major_name` varchar(30) DEFAULT NULL,
  `goal_grade` int(11) NOT NULL,
  `division` varchar(30) NOT NULL,
  `semester` int(11) NOT NULL,
  PRIMARY KEY (`sub_num`),
  KEY `sub_major_name` (`sub_major_name`),
  KEY `semester` (`semester`),
  CONSTRAINT `Subject_ibfk_1` FOREIGN KEY (`sub_major_name`) REFERENCES `Major` (`major_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Subject`
--

LOCK TABLES `Subject` WRITE;
/*!40000 ALTER TABLE `Subject` DISABLE KEYS */;
INSERT INTO `Subject` VALUES (10001,'공학설계입문','컴퓨터공학과',1,'전공',1),(10002,'컴퓨터관리','컴퓨터공학과',1,'교양',2),(10003,'웹프로그래밍기초','컴퓨터공학과',2,'전공',1),(10004,'컴퓨터영어','컴퓨터공학과',2,'교양',2),(10005,'화일처리','컴퓨터공학과',3,'전공',1),(10006,'현대미술','컴퓨터공학과',3,'교양',2),(10007,'캡스톤디자인','컴퓨터공학과',4,'전공',1),(10008,'빅데이터응용','컴퓨터공학과',4,'교양',2),(10009,'공학설계입문2','컴퓨터공학과',1,'전공',1),(10010,'컴퓨터관리2','컴퓨터공학과',1,'교양',1),(10011,'웹프로그래밍기초2','컴퓨터공학과',2,'전공',1),(10012,'컴퓨터영어2','컴퓨터공학과',2,'교양',1),(10013,'화일처리2','컴퓨터공학과',3,'전공',1),(10014,'현대미술2','컴퓨터공학과',3,'교양',1),(10015,'캡스톤디자인2','컴퓨터공학과',4,'전공',1),(10016,'빅데이터응용2','컴퓨터공학과',4,'교양',1),(11001,'스포츠영어','사회체육학과',1,'전공',1),(11002,'볼링','사회체육학과',1,'교양',2),(11003,'현대스포츠론','사회체육학과',2,'전공',1),(11004,'골프','사회체육학과',2,'교양',2),(11005,'체육사','사회체육학과',3,'전공',1),(11006,'스키','사회체육학과',3,'교양',2),(11007,'스포츠사회학','사회체육학과',4,'전공',1),(11008,'테니스','사회체육학과',4,'교양',2),(11009,'스포츠영어2','사회체육학과',1,'전공',1),(11010,'볼링2','사회체육학과',1,'교양',1),(11011,'현대스포츠론2','사회체육학과',2,'전공',1),(11012,'골프2','사회체육학과',2,'교양',1),(11013,'체육사2','사회체육학과',3,'전공',1),(11014,'스키2','사회체육학과',3,'교양',1),(11015,'스포츠사회학2','사회체육학과',4,'전공',1),(11016,'테니스2','기계공학과',4,'교양',1),(20001,'열역학','기계공학과',1,'전공',1),(20002,'CAD','기계공학과',1,'교양',2),(20003,'진동해석','기계공학과',2,'전공',1),(20004,'초급한자','기계공학과',2,'교양',2),(20005,'연료전지설계','기계공학과',3,'전공',1),(20006,'대학영어','기계공학과',3,'교양',2),(20007,'회전체동역학','기계공학과',4,'전공',1),(20008,'교양학입문','기계공학과',4,'교양',2),(20009,'열역학2','기계공학과',1,'전공',1),(20010,'CAD2','기계공학과',1,'교양',1),(20011,'진동해석2','기계공학과',2,'전공',1),(20012,'초급한자2','기계공학과',2,'교양',1),(20013,'연료전지설계2','기계공학과',3,'전공',1),(20014,'대학영어2','기계공학과',3,'교양',1),(20015,'회전체동역학2','기계공학과',4,'전공',1),(20016,'교양학입문2','기계공학과',4,'교양',1),(30001,'교육학개론','유아교육과',1,'전공',1),(30002,'말하기기법','유아교육과',1,'교양',2),(30003,'특수아동의이해','유아교육과',2,'전공',1),(30004,'대학생활','유아교육과',2,'교양',2),(30005,'유아평가','유아교육과',3,'전공',1),(30006,'글쓰기기초','유아교육과',3,'교양',2),(30007,'보육실습','유아교육과',4,'전공',1),(30008,'인문학','유아교육과',4,'교양',2),(30009,'교육학개론2','유아교육과',1,'전공',1),(30010,'말하기기법2','유아교육과',1,'교양',1),(30011,'특수아동의이해2','유아교육과',2,'전공',1),(30012,'대학생활2','유아교육과',2,'교양',1),(30013,'유아평가2','유아교육과',3,'전공',1),(30014,'글쓰기기초2','유아교육과',3,'교양',1),(30015,'보육실습2','유아교육과',4,'전공',1),(30016,'인문학2','유아교육과',4,'교양',1),(40001,'기초영양학','식품영양학과',1,'전공',1),(40002,'봉사','식품영양학과',1,'교양',2),(40003,'미생물학','식품영양학과',2,'전공',1),(40004,'범죄와심리','식품영양학과',2,'교양',2),(40005,'조리과학','식품영양학과',3,'전공',1),(40006,'피닉스열린강좌','식품영양학과',3,'교양',2),(40007,'건강기능식품','식품영양학과',4,'전공',1),(40008,'리더쉽기행','식품영양학과',4,'교양',2),(40009,'기초영양학2','식품영양학과',1,'전공',1),(40010,'봉사2','식품영양학과',1,'교양',1),(40011,'미생물학2','식품영양학과',2,'전공',1),(40012,'범죄와심리2','식품영양학과',2,'교양',1),(40013,'조리과학2','식품영양학과',3,'전공',1),(40014,'피닉스열린강좌2','식품영양학과',3,'교양',1),(40015,'건강기능식품2','식품영양학과',4,'전공',1),(40016,'리더쉽기행2','식품영양학과',4,'교양',1),(50001,'공연예술입문','연극무용학과',1,'전공',1),(50002,'작품감상','연극무용학과',1,'교양',2),(50003,'무대분장','연극무용학과',2,'전공',1),(50004,'연극의역사','연극무용학과',2,'교양',2),(50005,'레파토리댄스','연극무용학과',3,'전공',1),(50006,'무대디자인','연극무용학과',3,'교양',2),(50007,'인턴쉽','연극무용학과',4,'전공',1),(50008,'논리논술','연극무용학과',4,'교양',2),(50009,'공연예술입문2','연극무용학과',1,'전공',1),(50010,'작품감상2','연극무용학과',1,'교양',1),(50011,'무대분장2','연극무용학과',2,'전공',1),(50012,'연극의역사2','연극무용학과',2,'교양',1),(50013,'레파토리댄스2','연극무용학과',3,'전공',1),(50014,'무대디자인2','연극무용학과',3,'교양',1),(50015,'인턴쉽2','연극무용학과',4,'전공',1),(50016,'논리논술2','연극무용학과',4,'교양',1),(60001,'일반물리학','전자공학과',1,'전공',1),(60002,'사고와표현','전자공학과',1,'교양',2),(60003,'논리회로설계','전자공학과',2,'전공',1),(60004,'세계민속','전자공학과',2,'교양',2),(60005,'전자장','전자공학과',3,'전공',1),(60006,'확률과통계','전자공학과',3,'교양',2),(60007,'반도체공학','전자공학과',4,'전공',1),(60008,'교직이수','전자공학과',4,'교양',2),(60009,'일반물리학2','전자공학과',1,'전공',1),(60010,'사고와표현2','전자공학과',1,'교양',1),(60011,'논리회로설계2','전자공학과',2,'전공',1),(60012,'세계민속2','전자공학과',2,'교양',1),(60013,'전자장2','전자공학과',3,'전공',1),(60014,'확률과통계2','전자공학과',3,'교양',1),(60015,'반도체공학2','전자공학과',4,'전공',1),(60016,'교직이수2','전자공학과',4,'교양',1),(70001,'토익스피킹','영문학과',1,'전공',1),(70002,'영어작문','영문학과',1,'교양',2),(70003,'영어학개론','영문학과',2,'전공',1),(70004,'초급영작문','영문학과',2,'교양',2),(70005,'영어학습론','영문학과',3,'전공',1),(70006,'미국소설','영문학과',3,'교양',2),(70007,'현대영미시','영문학과',4,'전공',1),(70008,'교과교육론','영문학과',4,'교양',2),(70009,'토익스피킹2','영문학과',1,'전공',1),(70010,'영어작문2','영문학과',1,'교양',1),(70011,'영어학개론2','영문학과',2,'전공',1),(70012,'초급영작문2','영문학과',2,'교양',1),(70013,'영어학습론2','영문학과',3,'전공',1),(70014,'미국소설2','영문학과',3,'교양',1),(70015,'현대영미시2','영문학과',4,'전공',1),(70016,'교과교육론2','영문학과',4,'교양',1),(80001,'관광학개론','관광경영학과',1,'전공',1),(80002,'비즈니스영어','관광경영학과',1,'교양',2),(80003,'여행사경영론','관광경영학과',2,'전공',1),(80004,'이야기만들기','관광경영학과',2,'교양',2),(80005,'호텔경영론','관광경영학과',3,'전공',1),(80006,'인간관계론','관광경영학과',3,'교양',2),(80007,'관광법규','관광경영학과',4,'전공',1),(80008,'현대음악의이해','관광경영학과',4,'교양',2),(80009,'관광학개론2','관광경영학과',1,'전공',1),(80010,'비즈니스영어2','관광경영학과',1,'교양',1),(80011,'여행사경영론2','관광경영학과',2,'전공',1),(80012,'이야기만들기2','관광경영학과',2,'교양',1),(80013,'호텔경영론2','관광경영학과',3,'전공',1),(80014,'인간관계론2','관광경영학과',3,'교양',1),(80015,'관광법규2','관광경영학과',4,'전공',1),(80016,'현대음악의이해2','관광경영학과',4,'교양',1),(90001,'세포생물학','의예과',1,'전공',1),(90002,'인간사랑','의예과',1,'교양',2),(90003,'의사학','의예과',2,'전공',1),(90004,'셀프리더쉽','의예과',2,'교양',2),(90005,'해부학','의예과',3,'전공',1),(90006,'독일어','의예과',3,'교양',2),(90007,'조직학','의예과',4,'전공',1),(90008,'문서제작','의예과',4,'교양',2),(90009,'세포생물학2','의예과',1,'전공',1),(90010,'인간사랑2','의예과',1,'교양',1),(90011,'의사학2','의예과',2,'전공',1),(90012,'셀프리더쉽2','의예과',2,'교양',1),(90013,'해부학2','의예과',3,'전공',1),(90014,'독일어2','의예과',3,'교양',1),(90015,'조직학2','의예과',4,'전공',1),(90016,'문서제작2','의예과',4,'교양',1);
/*!40000 ALTER TABLE `Subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `Subject_view`
--

DROP TABLE IF EXISTS `Subject_view`;
/*!50001 DROP VIEW IF EXISTS `Subject_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Subject_view` (
  `sub_num` tinyint NOT NULL,
  `sub_name` tinyint NOT NULL,
  `sub_major_name` tinyint NOT NULL,
  `goal_grade` tinyint NOT NULL,
  `division` tinyint NOT NULL,
  `semester` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Sugang`
--

DROP TABLE IF EXISTS `Sugang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sugang` (
  `sg_stu_num` int(11) NOT NULL DEFAULT '0',
  `sg_osu_num` int(11) NOT NULL DEFAULT '0',
  `sg_approval` varchar(30) DEFAULT NULL,
  `sg_grade` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`sg_stu_num`,`sg_osu_num`),
  KEY `sg_stu_num` (`sg_stu_num`),
  KEY `sg_osu_num` (`sg_osu_num`),
  CONSTRAINT `Sugang_ibfk_1` FOREIGN KEY (`sg_stu_num`) REFERENCES `Student` (`stu_num`),
  CONSTRAINT `Sugang_ibfk_2` FOREIGN KEY (`sg_osu_num`) REFERENCES `Opensubject` (`osu_make_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sugang`
--

LOCK TABLES `Sugang` WRITE;
/*!40000 ALTER TABLE `Sugang` DISABLE KEYS */;
INSERT INTO `Sugang` VALUES (20120001,201810003,'Y','A'),(20130001,201810001,'Y','A'),(20130001,201810010,'Y','C'),(20130001,201820010,'Y','A');
/*!40000 ALTER TABLE `Sugang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `Sugang_view`
--

DROP TABLE IF EXISTS `Sugang_view`;
/*!50001 DROP VIEW IF EXISTS `Sugang_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Sugang_view` (
  `sg_stu_num` tinyint NOT NULL,
  `sg_osu_num` tinyint NOT NULL,
  `sg_approval` tinyint NOT NULL,
  `sg_grade` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `Major_view`
--

/*!50001 DROP TABLE IF EXISTS `Major_view`*/;
/*!50001 DROP VIEW IF EXISTS `Major_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`bbakji`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `Major_view` AS select `a`.`major_name` AS `major_name`,`a`.`major_office` AS `major_office` from `Major` `a` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Meeting_view`
--

/*!50001 DROP TABLE IF EXISTS `Meeting_view`*/;
/*!50001 DROP VIEW IF EXISTS `Meeting_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`bbakji`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `Meeting_view` AS select `a`.`m_stu_num` AS `m_stu_num`,`a`.`m_date` AS `m_date`,`a`.`m_contents` AS `m_contents` from `Meeting` `a` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Opensubject_view`
--

/*!50001 DROP TABLE IF EXISTS `Opensubject_view`*/;
/*!50001 DROP VIEW IF EXISTS `Opensubject_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`bbakji`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `Opensubject_view` AS select `a`.`osu_make_num` AS `osu_make_num`,`a`.`osu_sub_num` AS `osu_sub_num`,`a`.`osu_year` AS `osu_year`,`a`.`osu_sub_semester` AS `osu_sub_semester`,`a`.`osu_prof_num` AS `osu_prof_num` from `Opensubject` `a` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Osubject_view`
--

/*!50001 DROP TABLE IF EXISTS `Osubject_view`*/;
/*!50001 DROP VIEW IF EXISTS `Osubject_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`bbakji`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `Osubject_view` AS select `a`.`osu_make_num` AS `osu_make_num`,`a`.`osu_sub_num` AS `osu_sub_num`,`a`.`osu_year` AS `osu_year`,`a`.`osu_sub_semester` AS `osu_sub_semester`,`a`.`osu_prof_num` AS `osu_prof_num`,`b`.`sub_name` AS `sub_name`,`b`.`sub_major_name` AS `sub_major_name`,`b`.`goal_grade` AS `goal_grade`,`b`.`division` AS `division` from (`Opensubject_view` `a` join `Subject_view` `b`) where (`b`.`sub_num` = `a`.`osu_sub_num`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Professor_view`
--

/*!50001 DROP TABLE IF EXISTS `Professor_view`*/;
/*!50001 DROP VIEW IF EXISTS `Professor_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`bbakji`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `Professor_view` AS select `a`.`prof_num` AS `prof_num`,`a`.`prof_name` AS `prof_name`,`a`.`prof_major_name` AS `prof_major_name` from `Professor` `a` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Student_view`
--

/*!50001 DROP TABLE IF EXISTS `Student_view`*/;
/*!50001 DROP VIEW IF EXISTS `Student_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`bbakji`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `Student_view` AS select `a`.`stu_num` AS `stu_num`,`a`.`stu_name` AS `stu_name`,`a`.`stu_grade` AS `stu_grade`,`a`.`stu_major_name` AS `stu_major_name`,`a`.`stu_prof_num` AS `stu_prof_num`,`a`.`stu_gender` AS `stu_gender` from `Student` `a` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Subject_view`
--

/*!50001 DROP TABLE IF EXISTS `Subject_view`*/;
/*!50001 DROP VIEW IF EXISTS `Subject_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`bbakji`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `Subject_view` AS select `a`.`sub_num` AS `sub_num`,`a`.`sub_name` AS `sub_name`,`a`.`sub_major_name` AS `sub_major_name`,`a`.`goal_grade` AS `goal_grade`,`a`.`division` AS `division`,`a`.`semester` AS `semester` from `Subject` `a` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Sugang_view`
--

/*!50001 DROP TABLE IF EXISTS `Sugang_view`*/;
/*!50001 DROP VIEW IF EXISTS `Sugang_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`bbakji`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `Sugang_view` AS select `a`.`sg_stu_num` AS `sg_stu_num`,`a`.`sg_osu_num` AS `sg_osu_num`,`a`.`sg_approval` AS `sg_approval`,`a`.`sg_grade` AS `sg_grade` from `Sugang` `a` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-11  3:10:05
