-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 35.154.222.230    Database: mydb
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `achievements`
--

DROP TABLE IF EXISTS `achievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `achievements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation_id` int(11) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `year` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_achievement_organisations_idx` (`organisation_id`),
  CONSTRAINT `fk_achievement_organisations` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achievements`
--

LOCK TABLES `achievements` WRITE;
/*!40000 ALTER TABLE `achievements` DISABLE KEYS */;
INSERT INTO `achievements` VALUES (5,2,'test','testing achievement','achivements/feb7b7c007c56b41f7187ee7be9bd1a0.png','2018-03-19 00:00:00','2018-03-18 16:17:53','2018-03-18 16:17:53');
/*!40000 ALTER TABLE `achievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation_id` int(11) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `landmark` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `pincode` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_branche_organisation_idx` (`organisation_id`),
  CONSTRAINT `fk_branche_organisation` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `businesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businesses`
--

LOCK TABLES `businesses` WRITE;
/*!40000 ALTER TABLE `businesses` DISABLE KEYS */;
INSERT INTO `businesses` VALUES (1,'test','2018-01-15 19:22:06',NULL),(2,'test1','2018-01-15 19:22:06',NULL),(3,'test3','2018-01-15 19:22:06',NULL);
/*!40000 ALTER TABLE `businesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'ielse'),(2,'pte');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_childs`
--

DROP TABLE IF EXISTS `category_childs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_childs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cateogry_childs_category_idx` (`category_id`),
  CONSTRAINT `fk_cateogry_childs_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_childs`
--

LOCK TABLES `category_childs` WRITE;
/*!40000 ALTER TABLE `category_childs` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_childs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certificates`
--

DROP TABLE IF EXISTS `certificates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certificates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificates`
--

LOCK TABLES `certificates` WRITE;
/*!40000 ALTER TABLE `certificates` DISABLE KEYS */;
/*!40000 ALTER TABLE `certificates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'chandigarh','2018-01-10 17:27:23','2018-01-16 17:47:14'),(2,'mohali','2018-01-10 17:27:31','2018-01-16 17:47:14'),(3,'kharar','2018-01-10 17:27:31','2018-01-16 17:47:14'),(4,'zirakpur','2018-01-10 17:27:31','2018-01-16 17:47:14');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(45) DEFAULT NULL,
  `country_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'AF','Afghanistan'),(2,'AL','Albania'),(3,'DZ','Algeria'),(4,'DS','American Samoa'),(5,'AD','Andorra'),(6,'AO','Angola'),(7,'AI','Anguilla'),(8,'AQ','Antarctica'),(9,'AG','Antigua and Barbuda'),(10,'AR','Argentina'),(11,'AM','Armenia'),(12,'AW','Aruba'),(13,'AU','Australia'),(14,'AT','Austria'),(15,'AZ','Azerbaijan'),(16,'BS','Bahamas'),(17,'BH','Bahrain'),(18,'BD','Bangladesh'),(19,'BB','Barbados'),(20,'BY','Belarus'),(21,'BE','Belgium'),(22,'BZ','Belize'),(23,'BJ','Benin'),(24,'BM','Bermuda'),(25,'BT','Bhutan'),(26,'BO','Bolivia'),(27,'BA','Bosnia and Herzegovina'),(28,'BW','Botswana'),(29,'BV','Bouvet Island'),(30,'BR','Brazil'),(31,'IO','British Indian Ocean Territory'),(32,'BN','Brunei Darussalam'),(33,'BG','Bulgaria'),(34,'BF','Burkina Faso'),(35,'BI','Burundi'),(36,'KH','Cambodia'),(37,'CM','Cameroon'),(38,'CA','Canada'),(39,'CV','Cape Verde'),(40,'KY','Cayman Islands'),(41,'CF','Central African Republic'),(42,'TD','Chad'),(43,'CL','Chile'),(44,'CN','China'),(45,'CX','Christmas Island'),(46,'CC','Cocos (Keeling) Islands'),(47,'CO','Colombia'),(48,'KM','Comoros'),(49,'CG','Congo'),(50,'CK','Cook Islands'),(51,'CR','Costa Rica'),(52,'HR','Croatia (Hrvatska)'),(53,'CU','Cuba'),(54,'CY','Cyprus'),(55,'CZ','Czech Republic'),(56,'DK','Denmark'),(57,'DJ','Djibouti'),(58,'DM','Dominica'),(59,'DO','Dominican Republic'),(60,'TP','East Timor'),(61,'EC','Ecuador'),(62,'EG','Egypt'),(63,'SV','El Salvador'),(64,'GQ','Equatorial Guinea'),(65,'ER','Eritrea'),(66,'EE','Estonia'),(67,'ET','Ethiopia'),(68,'FK','Falkland Islands (Malvinas)'),(69,'FO','Faroe Islands'),(70,'FJ','Fiji'),(71,'FI','Finland'),(72,'FR','France'),(73,'FX','France, Metropolitan'),(74,'GF','French Guiana'),(75,'PF','French Polynesia'),(76,'TF','French Southern Territories'),(77,'GA','Gabon'),(78,'GM','Gambia'),(79,'GE','Georgia'),(80,'DE','Germany'),(81,'GH','Ghana'),(82,'GI','Gibraltar'),(83,'GK','Guernsey'),(84,'GR','Greece'),(85,'GL','Greenland'),(86,'GD','Grenada'),(87,'GP','Guadeloupe'),(88,'GU','Guam'),(89,'GT','Guatemala'),(90,'GN','Guinea'),(91,'GW','Guinea-Bissau'),(92,'GY','Guyana'),(93,'HT','Haiti'),(94,'HM','Heard and Mc Donald Islands'),(95,'HN','Honduras'),(96,'HK','Hong Kong'),(97,'HU','Hungary'),(98,'IS','Iceland'),(99,'IN','India'),(100,'IM','Isle of Man'),(101,'ID','Indonesia'),(102,'IR','Iran (Islamic Republic of)'),(103,'IQ','Iraq'),(104,'IE','Ireland'),(105,'IL','Israel'),(106,'IT','Italy'),(107,'CI','Ivory Coast'),(108,'JE','Jersey'),(109,'JM','Jamaica'),(110,'JP','Japan'),(111,'JO','Jordan'),(112,'KZ','Kazakhstan'),(113,'KE','Kenya'),(114,'KI','Kiribati'),(115,'KP','Korea, Democratic People\'s Republic of'),(116,'KR','Korea, Republic of'),(117,'XK','Kosovo'),(118,'KW','Kuwait'),(119,'KG','Kyrgyzstan'),(120,'LA','Lao People\'s Democratic Republic'),(121,'LV','Latvia'),(122,'LB','Lebanon'),(123,'LS','Lesotho'),(124,'LR','Liberia'),(125,'LY','Libyan Arab Jamahiriya'),(126,'LI','Liechtenstein'),(127,'LT','Lithuania'),(128,'LU','Luxembourg'),(129,'MO','Macau'),(130,'MK','Macedonia'),(131,'MG','Madagascar'),(132,'MW','Malawi'),(133,'MY','Malaysia'),(134,'MV','Maldives'),(135,'ML','Mali'),(136,'MT','Malta'),(137,'MH','Marshall Islands'),(138,'MQ','Martinique'),(139,'MR','Mauritania'),(140,'MU','Mauritius'),(141,'TY','Mayotte'),(142,'MX','Mexico'),(143,'FM','Micronesia, Federated States of'),(144,'MD','Moldova, Republic of'),(145,'MC','Monaco'),(146,'MN','Mongolia'),(147,'ME','Montenegro'),(148,'MS','Montserrat'),(149,'MA','Morocco'),(150,'MZ','Mozambique'),(151,'MM','Myanmar'),(152,'NA','Namibia'),(153,'NR','Nauru'),(154,'NP','Nepal'),(155,'NL','Netherlands'),(156,'AN','Netherlands Antilles'),(157,'NC','New Caledonia'),(158,'NZ','New Zealand'),(159,'NI','Nicaragua'),(160,'NE','Niger'),(161,'NG','Nigeria'),(162,'NU','Niue'),(163,'NF','Norfolk Island'),(164,'MP','Northern Mariana Islands'),(165,'NO','Norway'),(166,'OM','Oman'),(167,'PK','Pakistan'),(168,'PW','Palau'),(169,'PS','Palestine'),(170,'PA','Panama'),(171,'PG','Papua New Guinea'),(172,'PY','Paraguay'),(173,'PE','Peru'),(174,'PH','Philippines'),(175,'PN','Pitcairn'),(176,'PL','Poland'),(177,'PT','Portugal'),(178,'PR','Puerto Rico'),(179,'QA','Qatar'),(180,'RE','Reunion'),(181,'RO','Romania'),(182,'RU','Russian Federation'),(183,'RW','Rwanda'),(184,'KN','Saint Kitts and Nevis'),(185,'LC','Saint Lucia'),(186,'VC','Saint Vincent and the Grenadines'),(187,'WS','Samoa'),(188,'SM','San Marino'),(189,'ST','Sao Tome and Principe'),(190,'SA','Saudi Arabia'),(191,'SN','Senegal'),(192,'RS','Serbia'),(193,'SC','Seychelles'),(194,'SL','Sierra Leone'),(195,'SG','Singapore'),(196,'SK','Slovakia'),(197,'SI','Slovenia'),(198,'SB','Solomon Islands'),(199,'SO','Somalia'),(200,'ZA','South Africa'),(201,'GS','South Georgia South Sandwich Islands'),(202,'ES','Spain'),(203,'LK','Sri Lanka'),(204,'SH','St. Helena'),(205,'PM','St. Pierre and Miquelon'),(206,'SD','Sudan'),(207,'SR','Suriname'),(208,'SJ','Svalbard and Jan Mayen Islands'),(209,'SZ','Swaziland'),(210,'SE','Sweden'),(211,'CH','Switzerland'),(212,'SY','Syrian Arab Republic'),(213,'TW','Taiwan'),(214,'TJ','Tajikistan'),(215,'TZ','Tanzania, United Republic of'),(216,'TH','Thailand'),(217,'TG','Togo'),(218,'TK','Tokelau'),(219,'TO','Tonga'),(220,'TT','Trinidad and Tobago'),(221,'TN','Tunisia'),(222,'TR','Turkey'),(223,'TM','Turkmenistan'),(224,'TC','Turks and Caicos Islands'),(225,'TV','Tuvalu'),(226,'UG','Uganda'),(227,'UA','Ukraine'),(228,'AE','United Arab Emirates'),(229,'GB','United Kingdom'),(230,'US','United States'),(231,'UM','United States minor outlying islands'),(232,'UY','Uruguay'),(233,'UZ','Uzbekistan'),(234,'VU','Vanuatu'),(235,'VA','Vatican City State'),(236,'VE','Venezuela'),(237,'VN','Vietnam'),(238,'VG','Virgin Islands (British)'),(239,'VI','Virgin Islands (U.S.)'),(240,'WF','Wallis and Futuna Islands'),(241,'EH','Western Sahara'),(242,'YE','Yemen'),(243,'ZR','Zaire'),(244,'ZM','Zambia'),(245,'ZW','Zimbabwe');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_collages_countries`
--

DROP TABLE IF EXISTS `event_collages_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_collages_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `collage` varchar(255) DEFAULT NULL,
  `country_id` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gasfdhfjgf_idx` (`event_id`),
  CONSTRAINT `gasfdhfjgf` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_collages_countries`
--

LOCK TABLES `event_collages_countries` WRITE;
/*!40000 ALTER TABLE `event_collages_countries` DISABLE KEYS */;
INSERT INTO `event_collages_countries` VALUES (1,1,'test','1',NULL,NULL),(2,1,'testing','2',NULL,NULL),(15,4,'test','1',NULL,NULL),(16,4,'testing','2',NULL,NULL);
/*!40000 ALTER TABLE `event_collages_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `introduction` text,
  `hotel` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `organisation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'test','ielse','tyuklknb','test','china','2018-03-19 00:00:00','18:25:00','18:25:00','2018-03-21 18:36:48','2018-03-21 18:36:48',2),(2,'test','ielse','tyuklknb','test','china','2018-03-19 00:00:00','18:25:00','18:25:00','2018-03-21 18:37:20','2018-03-21 18:37:20',2),(4,'test','ielse','tyuklknb','test','china','2018-03-19 00:00:00','18:25:00','18:25:00','2018-03-23 18:24:27','2018-03-23 18:24:27',2);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exams`
--

LOCK TABLES `exams` WRITE;
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
INSERT INTO `exams` VALUES (1,'IELSE'),(2,'PTE'),(3,'SAT'),(4,'GRE'),(5,'TUPLI'),(6,'GMAT'),(7,'AP'),(8,'ACT');
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation_id` int(11) DEFAULT NULL,
  `media_url` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gallery_organisation_idx` (`organisation_id`),
  CONSTRAINT `fk_gallery_organisation` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membership_mappings`
--

DROP TABLE IF EXISTS `membership_mappings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membership_mappings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membership_id` int(11) DEFAULT NULL,
  `organisation_id` int(11) DEFAULT NULL,
  `membership_value` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membership_mappings`
--

LOCK TABLES `membership_mappings` WRITE;
/*!40000 ALTER TABLE `membership_mappings` DISABLE KEYS */;
INSERT INTO `membership_mappings` VALUES (12,2,2,'gfd','2018-03-14 11:40:59','2018-03-14 11:40:59'),(13,4,2,'dfn','2018-03-14 11:40:59','2018-03-14 11:40:59'),(14,6,2,'test','2018-03-14 11:40:59','2018-03-14 11:40:59'),(15,11,2,'dfbmbd','2018-03-14 11:40:59','2018-03-14 11:40:59');
/*!40000 ALTER TABLE `membership_mappings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memberships`
--

DROP TABLE IF EXISTS `memberships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `memberships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memberships`
--

LOCK TABLES `memberships` WRITE;
/*!40000 ALTER TABLE `memberships` DISABLE KEYS */;
INSERT INTO `memberships` VALUES (1,'logos/687e30768eb48d5403d484c42249a5d8.png','MARA AGENT','MIGRATION AGENTS REGISTRATION AUTHORITY'),(2,NULL,'ICCRC',NULL),(3,NULL,'Trained Agent',NULL),(4,NULL,'PHD Chamber',NULL),(5,NULL,'CII Member',NULL),(6,NULL,'WEBA World',NULL),(7,NULL,'CA PIC AC CP',NULL),(8,NULL,'NFFSA',NULL),(9,NULL,'ICEF Agency',NULL),(10,NULL,'AIRC Certified',NULL),(11,NULL,'PIER',NULL),(12,NULL,'BC',NULL),(13,NULL,'IDP',NULL);
/*!40000 ALTER TABLE `memberships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mentor_certificates`
--

DROP TABLE IF EXISTS `mentor_certificates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mentor_certificates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` int(11) DEFAULT NULL,
  `certificate_id` int(11) DEFAULT NULL,
  `licence_number` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_mentor_certi_certificates_idx` (`certificate_id`),
  KEY `fk_mentor_certi_mentors_idx` (`mentor_id`),
  CONSTRAINT `fk_mentor_certi_certificates` FOREIGN KEY (`certificate_id`) REFERENCES `certificates` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mentor_certi_mentors` FOREIGN KEY (`mentor_id`) REFERENCES `mentors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mentor_certificates`
--

LOCK TABLES `mentor_certificates` WRITE;
/*!40000 ALTER TABLE `mentor_certificates` DISABLE KEYS */;
/*!40000 ALTER TABLE `mentor_certificates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mentor_services`
--

DROP TABLE IF EXISTS `mentor_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mentor_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `ehufsuddsfn_idx` (`mentor_id`),
  KEY `reryutuyrte_idx` (`service_id`),
  CONSTRAINT `ehufsuddsfn` FOREIGN KEY (`mentor_id`) REFERENCES `mentors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reryutuyrte` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mentor_services`
--

LOCK TABLES `mentor_services` WRITE;
/*!40000 ALTER TABLE `mentor_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `mentor_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mentor_skills`
--

DROP TABLE IF EXISTS `mentor_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mentor_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` int(11) DEFAULT NULL,
  `skill_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mentors_mentor_idx` (`mentor_id`),
  KEY `fk_mentors_skills` (`skill_id`),
  CONSTRAINT `fk_mentors_mentor` FOREIGN KEY (`mentor_id`) REFERENCES `mentors` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_mentors_skills` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mentor_skills`
--

LOCK TABLES `mentor_skills` WRITE;
/*!40000 ALTER TABLE `mentor_skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `mentor_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mentors`
--

DROP TABLE IF EXISTS `mentors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mentors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `qualification` varchar(45) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `experience` varchar(45) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `photo_url` varchar(45) DEFAULT NULL,
  `organisation_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_organsation_mentors_idx` (`organisation_id`),
  CONSTRAINT `fk_organsation_mentors` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mentors`
--

LOCK TABLES `mentors` WRITE;
/*!40000 ALTER TABLE `mentors` DISABLE KEYS */;
/*!40000 ALTER TABLE `mentors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organisation_services`
--

DROP TABLE IF EXISTS `organisation_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organisation_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_organisation_services_idx` (`service_id`),
  KEY `fk_organisation_services_organisation_idx` (`organisation_id`),
  CONSTRAINT `fk_organisation_services_organisation` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_organisation_services_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisation_services`
--

LOCK TABLES `organisation_services` WRITE;
/*!40000 ALTER TABLE `organisation_services` DISABLE KEYS */;
INSERT INTO `organisation_services` VALUES (151,2,1),(152,2,5),(153,2,17),(154,2,21);
/*!40000 ALTER TABLE `organisation_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organisations`
--

DROP TABLE IF EXISTS `organisations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organisations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `registration_number` varchar(45) DEFAULT NULL,
  `business_id` int(11) DEFAULT NULL,
  `started_year` int(11) DEFAULT NULL,
  `parent_trading_name` varchar(45) DEFAULT NULL,
  `previous_trading_name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `town` varchar(45) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `zipcode` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `primary_website` varchar(45) DEFAULT NULL,
  `secondary_website` varchar(45) DEFAULT NULL,
  `value_statement` varchar(45) DEFAULT NULL,
  `about_us` varchar(45) DEFAULT NULL,
  `logo_url` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_organisations_users_idx` (`user_id`),
  KEY `fk_businesses_id_idx` (`business_id`),
  CONSTRAINT `fk_businesses_id` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_organisations_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisations`
--

LOCK TABLES `organisations` WRITE;
/*!40000 ALTER TABLE `organisations` DISABLE KEYS */;
INSERT INTO `organisations` VALUES (2,'A2Z Visa','1234R345',1,2015,'IELTSPRO Pvt Ltd',NULL,'SCO 85-86,Third Floor,Sector-34A','Sector 34',1,1,'160022','987654456789','nattu4.com',NULL,'dsfdsf','gfsdfsf','logos/29ca704872618237330b82b21f9eb50b.png','best-visa-center',1,'2018-01-15 18:18:39','2018-03-18 15:47:49');
/*!40000 ALTER TABLE `organisations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `others`
--

DROP TABLE IF EXISTS `others`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `others` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_id` int(11) DEFAULT NULL,
  `type` enum('skills','services','tieups') DEFAULT NULL,
  `value` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `others`
--

LOCK TABLES `others` WRITE;
/*!40000 ALTER TABLE `others` DISABLE KEYS */;
INSERT INTO `others` VALUES (39,2,'tieups','Uganda','2018-03-11 11:16:11','2018-03-11 11:16:11'),(40,2,'tieups','UAE','2018-03-11 11:16:11','2018-03-11 11:16:11'),(46,2,'services','Study Fileing','2018-03-20 17:32:40','2018-03-20 17:32:40');
/*!40000 ALTER TABLE `others` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `reading` varchar(45) DEFAULT NULL,
  `writing` varchar(45) DEFAULT NULL,
  `listening` varchar(45) DEFAULT NULL,
  `speaking` varchar(45) DEFAULT NULL,
  `overall` varchar(45) DEFAULT NULL,
  `student_name` varchar(45) DEFAULT NULL,
  `image_url` varchar(45) DEFAULT NULL,
  `score_card_url` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_scores_exam_idx` (`exam_id`),
  CONSTRAINT `fk_scores_exam` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores`
--

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
INSERT INTO `scores` VALUES (1,2,1,'test','test','test','test','test','test','logos/1d40e2a6aa620a4d5ae0fbb55b05a723.png','logos/1d40e2a6aa620a4d5ae0fbb55b05a723.png','2018-01-29 17:05:36','2018-01-29 17:05:36');
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Educational Counselling','2018-01-10 17:55:25','2018-01-13 19:03:14'),(2,'Course Selection','2018-01-10 17:55:25','2018-01-13 19:03:15'),(3,'University Selection','2018-01-10 17:55:25','2018-01-13 19:03:15'),(4,'Offers & Admissions in Universities / Colleges','2018-01-10 17:55:25','2018-01-13 19:03:15'),(5,'Visa Assistance','2018-01-10 17:55:25','2018-01-13 19:03:15'),(6,'Scholarship Assistance','2018-01-10 17:55:25','2018-01-13 19:03:15'),(7,'Study Abroad','2018-01-10 17:55:25','2018-01-13 19:03:15'),(8,'Canada','2018-01-10 17:55:25','2018-01-13 19:03:15'),(9,'USA','2018-01-10 17:55:25','2018-01-13 19:03:15'),(10,'AUSTRALIA','2018-01-10 17:55:25','2018-01-13 19:03:15'),(11,'NEW ZEALAND','2018-01-10 17:55:25','2018-01-13 19:03:15'),(12,'SINGAPORE','2018-01-10 17:55:25','2018-01-13 19:03:15'),(13,'UK','2018-01-10 17:55:25','2018-01-13 19:03:15'),(14,'GERMANY','2018-01-10 17:55:25','2018-01-13 19:03:15'),(15,'EUROPE','2018-01-10 17:55:25','2018-01-13 19:03:15'),(16,'SCHENGEN VISA','2018-01-10 17:55:25','2018-01-13 19:03:15'),(17,'WORK VISA','2018-01-10 17:55:25','2018-01-13 19:03:15'),(18,'VISITOR VISA','2018-01-10 17:55:25','2018-01-13 19:03:15'),(19,'PERMANENT RESIDENCY','2018-01-10 17:55:25','2018-01-13 19:03:16'),(20,'BUSINESS VISA','2018-01-13 19:03:16',NULL),(21,'SCHOOLING VISA','2018-01-13 19:03:16',NULL),(22,'TOURIST VISA','2018-01-13 19:03:16',NULL),(23,'Travel Arrangements','2018-01-13 19:03:16',NULL),(24,'Loan Assistance','2018-01-13 19:03:16',NULL),(25,'Pre Departure and Post Arrival Services','2018-01-13 19:03:16',NULL),(26,'Airport Assistance','2018-01-13 19:03:16',NULL),(27,'Accommodation Services','2018-01-13 19:03:16',NULL),(28,'Part Time Job Guidance','2018-01-13 19:03:16',NULL),(29,'Psychometric testing','2018-01-13 19:03:16',NULL),(30,'IELTS','2018-01-13 19:03:16',NULL),(31,'PTE','2018-01-13 19:03:16',NULL),(32,'SPOKEN','2018-01-13 19:03:16',NULL),(33,'GRE','2018-01-13 19:03:16',NULL),(34,'GMAT','2018-01-13 19:03:16',NULL),(35,'SAT','2018-01-13 19:03:16',NULL),(36,'TOEFL','2018-01-13 19:03:16',NULL),(37,'PSAT','2018-01-13 19:03:17',NULL),(38,'ACT','2018-01-13 19:03:17',NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (1,'test'),(2,'test1'),(3,'test2'),(4,'test3'),(5,'test4');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tieups`
--

DROP TABLE IF EXISTS `tieups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tieups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `university` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_tieups_country_idx` (`country_id`),
  KEY `fk_tieups_organisation_idx` (`organisation_id`),
  CONSTRAINT `fk_tieups_country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tieups_organisation` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tieups`
--

LOCK TABLES `tieups` WRITE;
/*!40000 ALTER TABLE `tieups` DISABLE KEYS */;
INSERT INTO `tieups` VALUES (75,2,245,NULL,NULL,'2018-03-11 11:16:11',NULL),(76,2,230,'Oxford University','Master','2018-03-11 11:16:11',NULL),(77,2,229,'Harvard University','Phd.','2018-03-11 11:16:11',NULL);
/*!40000 ALTER TABLE `tieups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_metas`
--

DROP TABLE IF EXISTS `user_metas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_metas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `alternative_email` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `skype_id` varchar(45) DEFAULT NULL,
  `facebook_id` varchar(45) DEFAULT NULL,
  `linked_id` varchar(45) DEFAULT NULL,
  `google_id` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_user_metas_users_idx` (`user_id`),
  CONSTRAINT `fk_user_metas_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_metas`
--

LOCK TABLES `user_metas` WRITE;
/*!40000 ALTER TABLE `user_metas` DISABLE KEYS */;
INSERT INTO `user_metas` VALUES (2,1,'test.testing@gmail.com','9876545678','987653456789','wdddghfr4','texg1','jjbyfyf2','gffsa3','2018-01-13 08:22:14','2018-03-18 16:08:25'),(3,2,NULL,NULL,'9317788822',NULL,NULL,NULL,NULL,'2018-01-30 04:30:19','2018-01-30 04:30:19'),(4,3,NULL,NULL,'9317788822',NULL,NULL,NULL,NULL,'2018-01-30 17:01:59','2018-01-30 17:01:59'),(5,4,NULL,NULL,'98765678998',NULL,NULL,NULL,NULL,'2018-02-20 17:13:39','2018-02-20 17:13:39'),(6,5,NULL,NULL,'9876543234',NULL,NULL,NULL,NULL,'2018-02-20 17:19:32','2018-02-20 17:19:32'),(7,6,NULL,NULL,'98765567812',NULL,NULL,NULL,NULL,'2018-02-20 17:35:10','2018-02-20 17:35:10'),(8,7,NULL,NULL,'6789009876',NULL,NULL,NULL,NULL,'2018-03-23 18:29:48','2018-03-23 18:29:48'),(9,8,NULL,NULL,'67890098766789',NULL,NULL,NULL,NULL,'2018-03-23 18:35:03','2018-03-23 18:35:03');
/*!40000 ALTER TABLE `user_metas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_member` tinyint(3) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test.agency@gmail.com','Test','Agency','$2y$10$28rLfKEeWE8ZgyWKQ3l7hOYUTHXwN2tbW9CTNopOcRV5TriOr64jW',0,1,'9Us9fG0m4KzVFXFsKFHcd3uC75hPsjynEQHdfklqBCCsCnSpU0XDVWRjscf2','2018-01-13 08:22:14','2018-03-23 18:27:12'),(2,'deepak@gmail.com','Deepak','Kashyap','$2y$10$qt6/1NECZow8nIIUbbBTi.41VbmNu11JpzPH.7Bl7JpT2EcGhN2E.',0,1,NULL,'2018-01-30 04:30:19','2018-01-30 04:30:19'),(3,'excellencehead@gmail.com','deepak','kashyap','$2y$10$aiWIFgVNwzUcrYOmwkeWFuf.zwtmclkQme2LVDV89k6fWGHE8Jry2',0,1,NULL,'2018-01-30 17:01:59','2018-01-30 17:01:59'),(4,'shashank.dixit@gmail.com','shashank','dixit','$2y$10$9rIxoQtetpCqen/8umxJv.vpwAf4UXirjjgc3qbkKNE6DFQoRwQDS',0,1,NULL,'2018-02-20 17:13:38','2018-02-20 17:13:38'),(5,'nattu@yopmail.com','shashank','dixit','$2y$10$1MAZ5UXt9bouV2nvpX1BG.NgHzVf5T2Y0q7c7fe4fAEPYfr6rZT2m',0,1,'QmIj15ryjUF9eLFYXX1mcKDS24atfY4M2Jdhhzo7MU0lEeAcuRvez5yRynBU','2018-02-20 17:19:32','2018-02-24 14:25:55'),(6,'testDev1234@gmail.com','shashank','dixit','$2y$10$ZgVAdWSPsaf7YuiCMsEyE.Wa4HfUzBaemtM3S7jOZuqqKJF./FvvS',0,1,NULL,'2018-02-20 17:35:10','2018-02-20 17:35:10'),(7,'agency@gmail.com','Aaron ming da First','Chew last','$2y$10$a7d63ipF4.WuQueeVkSqOujRKFd5/e3krQcNTNZdoQwhmZP4vtb9i',0,1,NULL,'2018-03-23 18:29:48','2018-03-23 18:29:48'),(8,'agency123@gmail.com','Sateesh','Kumar','$2y$10$cCyWEGLJbEgfWdC.cty7rO7rKE3J1uKVyax05Y9rQagZNNkXeczIW',1,1,NULL,'2018-03-23 18:35:03','2018-03-23 18:35:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visas`
--

DROP TABLE IF EXISTS `visas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `request_type` enum('fresh','refuse') DEFAULT NULL,
  `refuse_count` varchar(45) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `university` varchar(45) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `photo_media_url` varchar(45) DEFAULT NULL,
  `visa_media_url` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_visas_exams_idx` (`exam_id`),
  CONSTRAINT `fk_visas_exams` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visas`
--

LOCK TABLES `visas` WRITE;
/*!40000 ALTER TABLE `visas` DISABLE KEYS */;
INSERT INTO `visas` VALUES (1,2,'shasha','dixit',NULL,'1',1,'5.5','test',99,'logos/0b6017fc98d6ecc79a52fecf20a01640.png','logos/0b6017fc98d6ecc79a52fecf20a01640.png','2018-01-28 11:33:48','2018-03-11 12:35:17'),(2,2,'test',NULL,NULL,'2',3,'testin','testey',1,'logos/80ade83024590a686acba0d34ce9f441.png','logos/80ade83024590a686acba0d34ce9f441.png','2018-03-11 11:16:06','2018-03-11 11:16:06');
/*!40000 ALTER TABLE `visas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-30 13:17:16
