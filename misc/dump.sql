-- MySQL dump 10.13  Distrib 5.1.51, for pc-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: disney-video_dev_db
-- ------------------------------------------------------
-- Server version	5.1.51-log

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
-- Table structure for table `admin_lock`
--

DROP TABLE IF EXISTS `admin_lock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_lock` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(11) unsigned NOT NULL,
  `row_id` int(11) unsigned NOT NULL,
  `admin_user_id` int(11) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `section_id` (`section_id`,`row_id`),
  KEY `admin_user_id` (`admin_user_id`),
  CONSTRAINT `admin_lock_ibfk_1` FOREIGN KEY (`admin_user_id`) REFERENCES `admin_user` (`id`),
  CONSTRAINT `admin_lock_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `admin_section` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4089 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_lock`
--

LOCK TABLES `admin_lock` WRITE;
/*!40000 ALTER TABLE `admin_lock` DISABLE KEYS */;
INSERT INTO `admin_lock` VALUES (4078,90,1,61,'2011-03-17 15:58:31'),(4082,89,3,61,'2011-03-19 11:42:07'),(4088,95,1,61,'2011-03-20 11:50:33');
/*!40000 ALTER TABLE `admin_lock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_log`
--

DROP TABLE IF EXISTS `admin_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `log` varchar(512) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed_table` varchar(32) NOT NULL,
  `changed_columns` varchar(255) NOT NULL,
  `changed_row` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `admin_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admin_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3717 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_log`
--

LOCK TABLES `admin_log` WRITE;
/*!40000 ALTER TABLE `admin_log` DISABLE KEYS */;
INSERT INTO `admin_log` VALUES (3683,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/profile_wallet\'>profile_wallet</a>` (id=<a href=\'/admin/crud/edit/table/profile_wallet/id/1\'>1</a>)','2011-03-17 10:57:14','profile_wallet','',1),(3684,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/profile_wallet\'>profile_wallet</a>` (id=<a href=\'/admin/crud/edit/table/profile_wallet/id/1\'>1</a>) (0 cols changed)','2011-03-17 11:05:53','profile_wallet','',1),(3685,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/profile_wallet\'>profile_wallet</a>` (id=<a href=\'/admin/crud/edit/table/profile_wallet/id/1\'>1</a>) (0 cols changed)','2011-03-17 11:07:05','profile_wallet','',1),(3686,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/profile_wallet\'>profile_wallet</a>` (id=<a href=\'/admin/crud/edit/table/profile_wallet/id/1\'>1</a>) (0 cols changed)','2011-03-17 11:07:36','profile_wallet','',1),(3687,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/profile_wallet\'>profile_wallet</a>` (id=<a href=\'/admin/crud/edit/table/profile_wallet/id/1\'>1</a>) (0 cols changed)','2011-03-17 11:07:41','profile_wallet','',1),(3688,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/profile\'>profile</a>` (id=<a href=\'/admin/crud/edit/table/profile/id/1\'>1</a>)','2011-03-17 11:13:39','profile','',1),(3689,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/news\'>news</a>` (id=<a href=\'/admin/crud/edit/table/news/id/1\'>1</a>)','2011-03-17 12:56:41','news','',1),(3690,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/faq\'>faq</a>` (id=<a href=\'/admin/crud/edit/table/faq/id/1\'>1</a>)','2011-03-17 13:37:24','faq','',1),(3691,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/faq\'>faq</a>` (id=<a href=\'/admin/crud/edit/table/faq/id/1\'>1</a>) (0 cols changed)','2011-03-17 13:41:51','faq','',1),(3692,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/profile_payment\'>profile_payment</a>` (id=<a href=\'/admin/crud/edit/table/profile_payment/id/1\'>1</a>)','2011-03-17 15:46:10','profile_payment','',1),(3693,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/profile\'>profile</a>` (id=<a href=\'/admin/crud/edit/table/profile/id/2\'>2</a>)','2011-03-17 19:08:33','profile','',2),(3694,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/profile\'>profile</a>` (id=<a href=\'/admin/crud/edit/table/profile/id/2\'>2</a>) (0 cols changed)','2011-03-17 19:48:10','profile','',2),(3695,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/profile\'>profile</a>` (id=<a href=\'/admin/crud/edit/table/profile/id/2\'>2</a>) (0 cols changed)','2011-03-17 19:48:29','profile','',2),(3696,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/profile\'>profile</a>` (id=<a href=\'/admin/crud/edit/table/profile/id/2\'>2</a>) (0 cols changed)','2011-03-17 19:48:58','profile','',2),(3697,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/profile\'>profile</a>` (id=<a href=\'/admin/crud/edit/table/profile/id/3\'>3</a>)','2011-03-17 19:49:43','profile','',3),(3698,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/profile\'>profile</a>` (id=<a href=\'/admin/crud/edit/table/profile/id/1\'>1</a>) (0 cols changed)','2011-03-17 20:17:52','profile','',1),(3699,61,'User `MaffiN` delete entry with id `2` from `<a href=\'/admin/crud/list/table/profile\'>profile</a>`','2011-03-19 11:44:00','profile','',2),(3700,61,'User `MaffiN` delete entry with id `3` from `<a href=\'/admin/crud/list/table/profile\'>profile</a>`','2011-03-19 11:44:03','profile','',3),(3701,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/profile\'>profile</a>` (id=<a href=\'/admin/crud/edit/table/profile/id/1\'>1</a>) (0 cols changed)','2011-03-20 10:06:56','profile','',1),(3702,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/subacc\'>subacc</a>` (id=<a href=\'/admin/crud/edit/table/subacc/id/1\'>1</a>)','2011-03-20 11:14:54','subacc','',1),(3703,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/subacc\'>subacc</a>` (id=<a href=\'/admin/crud/edit/table/subacc/id/2\'>2</a>)','2011-03-20 11:15:21','subacc','',2),(3704,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/subacc\'>subacc</a>` (id=<a href=\'/admin/crud/edit/table/subacc/id/2\'>2</a>) (0 cols changed)','2011-03-20 11:16:06','subacc','',2),(3705,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/subacc\'>subacc</a>` (id=<a href=\'/admin/crud/edit/table/subacc/id/1\'>1</a>) (0 cols changed)','2011-03-20 11:16:19','subacc','',1),(3706,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/profile\'>profile</a>` (id=<a href=\'/admin/crud/edit/table/profile/id/5\'>5</a>) (0 cols changed)','2011-03-20 11:17:52','profile','',5),(3707,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/profile\'>profile</a>` (id=<a href=\'/admin/crud/edit/table/profile/id/1\'>1</a>) (0 cols changed)','2011-03-20 11:17:59','profile','',1),(3708,61,'User `MaffiN` modify `<a href=\'/admin/crud/list/table/profile\'>profile</a>` (id=<a href=\'/admin/crud/edit/table/profile/id/1\'>1</a>) (0 cols changed)','2011-03-20 15:33:26','profile','',1),(3709,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/sms_number\'>sms_number</a>` (id=<a href=\'/admin/crud/edit/table/sms_number/id/1\'>1</a>)','2011-03-20 15:47:41','sms_number','',1),(3710,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/sms_number\'>sms_number</a>` (id=<a href=\'/admin/crud/edit/table/sms_number/id/2\'>2</a>)','2011-03-20 15:47:57','sms_number','',2),(3711,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/sms_number\'>sms_number</a>` (id=<a href=\'/admin/crud/edit/table/sms_number/id/3\'>3</a>)','2011-03-20 15:48:16','sms_number','',3),(3712,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/sms_number\'>sms_number</a>` (id=<a href=\'/admin/crud/edit/table/sms_number/id/4\'>4</a>)','2011-03-20 15:48:27','sms_number','',4),(3713,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/subacc\'>subacc</a>` (id=<a href=\'/admin/crud/edit/table/subacc/id/3\'>3</a>)','2011-03-23 10:30:28','subacc','',3),(3714,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/subacc\'>subacc</a>` (id=<a href=\'/admin/crud/edit/table/subacc/id/4\'>4</a>)','2011-03-23 10:30:37','subacc','',4),(3715,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/subacc\'>subacc</a>` (id=<a href=\'/admin/crud/edit/table/subacc/id/5\'>5</a>)','2011-03-23 10:30:49','subacc','',5),(3716,61,'User `MaffiN` add entry in `<a href=\'/admin/crud/list/table/sms_number\'>sms_number</a>` (id=<a href=\'/admin/crud/edit/table/sms_number/id/5\'>5</a>)','2011-03-24 10:49:39','sms_number','',5);
/*!40000 ALTER TABLE `admin_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role`
--

DROP TABLE IF EXISTS `admin_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role`
--

LOCK TABLES `admin_role` WRITE;
/*!40000 ALTER TABLE `admin_role` DISABLE KEYS */;
INSERT INTO `admin_role` VALUES (10,'admin','Администратор системы');
/*!40000 ALTER TABLE `admin_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role2section`
--

DROP TABLE IF EXISTS `admin_role2section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role2section` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL,
  `section_id` int(11) unsigned NOT NULL,
  `permissions` varchar(4) NOT NULL DEFAULT '0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_id` (`role_id`,`section_id`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `admin_role2section_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `admin_section` (`id`),
  CONSTRAINT `admin_role2section_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `admin_role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role2section`
--

LOCK TABLES `admin_role2section` WRITE;
/*!40000 ALTER TABLE `admin_role2section` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_role2section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role2section_group`
--

DROP TABLE IF EXISTS `admin_role2section_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role2section_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `permissions` varchar(4) NOT NULL DEFAULT '0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_group` (`role_id`,`group_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `admin_role2group_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `admin_section_group` (`id`),
  CONSTRAINT `admin_role2group_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `admin_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role2section_group`
--

LOCK TABLES `admin_role2section_group` WRITE;
/*!40000 ALTER TABLE `admin_role2section_group` DISABLE KEYS */;
INSERT INTO `admin_role2section_group` VALUES (7,10,13,'1111'),(8,10,16,'1111'),(9,10,14,'1111'),(10,10,15,'1111');
/*!40000 ALTER TABLE `admin_role2section_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_section`
--

DROP TABLE IF EXISTS `admin_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_section` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `action_name` varchar(32) DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `main_property` varchar(64) DEFAULT NULL,
  `view_script` varchar(64) DEFAULT NULL,
  `list_view_script` varchar(64) DEFAULT NULL,
  `order` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `admin_section_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `admin_section_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 COMMENT='row:Crud_Section';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_section`
--

LOCK TABLES `admin_section` WRITE;
/*!40000 ALTER TABLE `admin_section` DISABLE KEYS */;
INSERT INTO `admin_section` VALUES (89,'profile','profile',NULL,'Пользователи',13,'login',NULL,NULL,0),(90,'profile_wallet','profile_wallet',NULL,'Баланс пользователей',13,'amount',NULL,NULL,0),(91,'profile_payment','profile_payment',NULL,'Проведенные платежи',13,'destination',NULL,NULL,0),(92,'news','news',NULL,'Новости',16,'name',NULL,NULL,0),(93,'faq','faq',NULL,'FAQ',16,'question',NULL,NULL,0),(94,'subacc','subacc',NULL,'Субаккаунты',13,NULL,NULL,NULL,0),(95,'midlet','midlet',NULL,'Мидлеты',14,NULL,NULL,NULL,0),(96,'statistic_download','statistic_download',NULL,'Загрузки',15,NULL,NULL,NULL,0),(97,'sms_number','sms_number',NULL,'Короткие номера',14,'cost',NULL,NULL,0);
/*!40000 ALTER TABLE `admin_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_section_group`
--

DROP TABLE IF EXISTS `admin_section_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_section_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `order` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_section_group`
--

LOCK TABLES `admin_section_group` WRITE;
/*!40000 ALTER TABLE `admin_section_group` DISABLE KEYS */;
INSERT INTO `admin_section_group` VALUES (13,'profile','Пользователи и платежи',0),(14,'midlet','Мидлеты и файлы',0),(15,'stat','Статистика',0),(16,'interactive','Интерактив',0);
/*!40000 ALTER TABLE `admin_section_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_section_handler`
--

DROP TABLE IF EXISTS `admin_section_handler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_section_handler` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(11) unsigned NOT NULL,
  `class_name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `section_id` (`section_id`,`class_name`),
  CONSTRAINT `admin_section_handler_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `admin_section` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_section_handler`
--

LOCK TABLES `admin_section_handler` WRITE;
/*!40000 ALTER TABLE `admin_section_handler` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_section_handler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_section_property`
--

DROP TABLE IF EXISTS `admin_section_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_section_property` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(11) unsigned NOT NULL,
  `key` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `show_in_list` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `show_in_item` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `default_value` varchar(255) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `element_class` varchar(64) DEFAULT NULL,
  `order` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`,`section_id`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `admin_section_property_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `admin_section` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=450 DEFAULT CHARSET=utf8 COMMENT='row:Crud_Section_Property';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_section_property`
--

LOCK TABLES `admin_section_property` WRITE;
/*!40000 ALTER TABLE `admin_section_property` DISABLE KEYS */;
INSERT INTO `admin_section_property` VALUES (406,89,'login','Логин',1,1,NULL,NULL,NULL,0),(407,89,'password','Пароль',0,1,NULL,'Показывается только хеш, но для изменения введите исходный пароль',NULL,0),(408,89,'percent','Процент',0,1,NULL,'Сколько процентов отчислять пользователю',NULL,0),(409,89,'icq','Аська',1,1,NULL,NULL,NULL,0),(410,89,'wallet_id','Баланс',1,1,NULL,'Редактируется в отдельном разделе',NULL,0),(411,90,'amount','Баланс',1,1,NULL,NULL,NULL,0),(412,90,'modified','Последнее изменение',1,0,NULL,NULL,NULL,0),(413,91,'profile_id','Пользователь',1,1,NULL,NULL,NULL,0),(414,91,'amount','Сумма',1,1,NULL,NULL,NULL,0),(415,91,'destination','Кошелек',1,1,NULL,NULL,NULL,0),(416,91,'created','Дата платежа',1,0,NULL,NULL,NULL,0),(417,92,'name','Заголовок',1,1,NULL,NULL,NULL,0),(418,92,'text','Текст новости',0,1,NULL,NULL,NULL,0),(419,92,'is_publish','Публиковать на сайте?',1,1,NULL,NULL,NULL,0),(420,92,'created','Дата создания',1,0,NULL,NULL,NULL,0),(421,93,'question','Вопрос',1,1,NULL,NULL,NULL,0),(422,93,'answer','Ответ',0,1,NULL,NULL,NULL,0),(423,93,'is_publish','Публиковать на сайте?',1,1,NULL,NULL,NULL,0),(424,93,'ord','Порядок сортировки',1,1,NULL,NULL,NULL,0),(425,90,'profit','Профит',1,1,NULL,NULL,NULL,0),(426,89,'email','Электронный адрес',1,1,NULL,NULL,NULL,0),(427,89,'subacc_id','Субаккаунт',0,1,NULL,'Используется по умолчанию. Проверьте, чтобы он не использовался другими пользователями',NULL,0),(428,94,'key','Название',1,1,NULL,NULL,NULL,0),(429,94,'profile_id','Профиль',1,1,NULL,NULL,NULL,0),(430,96,'ip','IP',1,1,NULL,NULL,NULL,0),(431,96,'referer','Referer',1,1,NULL,NULL,NULL,0),(432,96,'user_agent','UserAgent',1,1,NULL,NULL,NULL,0),(433,96,'profile_id','Профиль',1,1,NULL,NULL,NULL,0),(434,96,'midlet_id','Мидлет',1,1,NULL,NULL,NULL,0),(435,96,'subacc_id','Субаккаунт',1,1,NULL,NULL,NULL,0),(436,96,'datetime','Время',1,0,NULL,NULL,NULL,0),(437,95,'internal_path','Сгенеренный JAR',0,1,NULL,'Только имя файла, путь где его будут брать указывается в конфиге проекта',NULL,0),(438,95,'original_path','Оригинальный JAR',0,1,NULL,'Только имя файла, путь где его будут брать указывается в конфиге проекта',NULL,0),(441,95,'profile_id','Профиль',1,1,NULL,NULL,NULL,0),(444,95,'sms_count','Колличество СМС',1,1,NULL,NULL,NULL,0),(445,95,'sms_cost','Цена СМС',1,1,NULL,NULL,NULL,0),(446,95,'name','Название',1,1,NULL,NULL,NULL,0),(447,95,'description','Описание',0,1,NULL,NULL,NULL,0),(448,97,'number','Номер',1,1,NULL,NULL,NULL,0),(449,97,'cost','Цена (руб)',1,1,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `admin_section_property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_section_property_filter`
--

DROP TABLE IF EXISTS `admin_section_property_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_section_property_filter` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(11) unsigned NOT NULL,
  `class_name` varchar(65) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `property_id` (`property_id`,`class_name`),
  CONSTRAINT `admin_section_property_filter_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `admin_section_property` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_section_property_filter`
--

LOCK TABLES `admin_section_property_filter` WRITE;
/*!40000 ALTER TABLE `admin_section_property_filter` DISABLE KEYS */;
INSERT INTO `admin_section_property_filter` VALUES (3,407,'Password');
/*!40000 ALTER TABLE `admin_section_property_filter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_section_property_validator`
--

DROP TABLE IF EXISTS `admin_section_property_validator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_section_property_validator` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(11) unsigned NOT NULL,
  `class_name` varchar(65) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `property_id` (`property_id`,`class_name`),
  CONSTRAINT `admin_section_property_validator_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `admin_section_property` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_section_property_validator`
--

LOCK TABLES `admin_section_property_validator` WRITE;
/*!40000 ALTER TABLE `admin_section_property_validator` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_section_property_validator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `granted_ip` varchar(255) NOT NULL DEFAULT '*',
  `role_id` int(11) unsigned NOT NULL,
  `code` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `code` (`code`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `admin_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `admin_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user`
--

LOCK TABLES `admin_user` WRITE;
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;
INSERT INTO `admin_user` VALUES (61,'MaffiN','c55c0b6df3637a1c461e75ce5398f2f4','s.andrey.d@gmail.com','Андрей Смирнов','*',10,NULL);
/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(128) NOT NULL,
  `answer` varchar(2056) NOT NULL,
  `ord` smallint(6) NOT NULL DEFAULT '0',
  `is_publish` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` VALUES (1,'Что такое фак ?','ЧАВО, ЧаВо, ЧаВО, ЧЗВ, FAQ, F.A.Q. (акроним от англ. Frequently Asked Question(s) — часто задаваемые вопросы, произносится «фай-кью», «фак», «фэк», «факу», «фэкс», «эф-эй-кью») — собрание часто задаваемых вопросов по какой-либо теме и ответов на них. В английском языке произношение «фэк» практически совпадает с произношением слова fact («факт»), и устойчивое выражение check the facts («убедись в достоверности») дало выражение check the FAQ («посмотри в FAQ»)[источник не указан 608 дней]. Иногда встречается русский аналог этого сокращения — ЧАВО (что, как полагают, означает частые вопросы или же часто задаваемые вопросы и ответы) или простой перевод английской аббревиатуры ЧЗВ (часто задаваемые вопросы). Нередко в рунете встречается и прямая транслитерация, ФАК («посмотри в ФАКе»). Существует множество FAQ, посвящённых самым разным темам. Некоторые сайты каталогизируют их и обеспечивают возможность поиска — например, Internet FAQ Consortium .',0,1);
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `midlet`
--

DROP TABLE IF EXISTS `midlet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `midlet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `original_url` varchar(255) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `sms_number_id` int(11) NOT NULL,
  `sms_count` tinyint(4) NOT NULL,
  `sms_wait1` smallint(5) unsigned NOT NULL,
  `sms_wait2` smallint(5) unsigned NOT NULL,
  `key` varchar(32) NOT NULL,
  `hello_message` varchar(128) NOT NULL,
  `bye_message` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `m_ref_profile` (`profile_id`),
  KEY `sms_number_id` (`sms_number_id`),
  CONSTRAINT `midlet_ibfk_1` FOREIGN KEY (`sms_number_id`) REFERENCES `sms_number` (`id`),
  CONSTRAINT `m_ref_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `midlet`
--

LOCK TABLES `midlet` WRITE;
/*!40000 ALTER TABLE `midlet` DISABLE KEYS */;
INSERT INTO `midlet` VALUES (1,'jimm','icq for mobile','/tmp/jimm_original.jar',1,1,0,0,0,'','',''),(2,'Opera','OperaOpera!','http://kaimi.ru/quest/data/15.html',1,1,2,0,0,'','',''),(16,'myapp','Описание myappa!','http://bash.org.ru:80/',1,5,2,1000,2000,'myapp','Надпись на экране приветствия. Привет!','Спасибо за СМС. Пока!');
/*!40000 ALTER TABLE `midlet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `midlet2subacc`
--

DROP TABLE IF EXISTS `midlet2subacc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `midlet2subacc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subacc_id` int(11) NOT NULL,
  `midlet_id` int(11) NOT NULL,
  `internal_jar` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subacc_id` (`subacc_id`,`midlet_id`),
  KEY `m2s_ref_midlet` (`midlet_id`),
  CONSTRAINT `m2s_ref_midlet` FOREIGN KEY (`midlet_id`) REFERENCES `midlet` (`id`),
  CONSTRAINT `m2s_ref_subacc` FOREIGN KEY (`subacc_id`) REFERENCES `subacc` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `midlet2subacc`
--

LOCK TABLES `midlet2subacc` WRITE;
/*!40000 ALTER TABLE `midlet2subacc` DISABLE KEYS */;
INSERT INTO `midlet2subacc` VALUES (1,4,2,'20110323142249'),(2,5,2,'20110323142249'),(15,3,16,'20110324135422'),(16,4,16,'20110324135422'),(17,5,16,'20110324135422'),(18,1,16,'20110324135422');
/*!40000 ALTER TABLE `midlet2subacc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `text` varchar(2056) NOT NULL,
  `is_publish` tinyint(1) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `created` (`created`,`is_publish`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Немцы написали четыре сценария для Токио','Что будет с японской экономикой? Погрузится ли страна в хаос? Справится ли с угрозой радиационного заражения? Немецкие эксперты предлагают четыре сценария развития событий. Об этом — публикация в журнале Spiegel.',1,'2011-03-17 12:56:41');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `activated` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `percent` tinyint(4) NOT NULL DEFAULT '80',
  `icq` varchar(12) DEFAULT NULL,
  `wallet_id` int(11) NOT NULL,
  `subacc_id` int(11) NOT NULL,
  `webmoney_number` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `wallet_id` (`wallet_id`),
  UNIQUE KEY `subacc_id` (`subacc_id`),
  CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`subacc_id`) REFERENCES `subacc` (`id`),
  CONSTRAINT `p_ref_wallet` FOREIGN KEY (`wallet_id`) REFERENCES `profile_wallet` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,'h@gmail.com','h@gmail.com','eefbf64d1707804afa5b073339399434',1,80,'207202',1,1,'1315189'),(5,'Tech Support','tech@support','88dd2190c1c647de5e72e9f428045815',1,80,NULL,2,2,NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_payment`
--

DROP TABLE IF EXISTS `profile_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `amount` float(9,2) NOT NULL,
  `destination` varchar(32) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  CONSTRAINT `profile_payment_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_payment`
--

LOCK TABLES `profile_payment` WRITE;
/*!40000 ALTER TABLE `profile_payment` DISABLE KEYS */;
INSERT INTO `profile_payment` VALUES (1,1,250.00,'R12345','2011-03-17 15:46:10');
/*!40000 ALTER TABLE `profile_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_wallet`
--

DROP TABLE IF EXISTS `profile_wallet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float(9,2) NOT NULL DEFAULT '0.00',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `profit` float(9,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_wallet`
--

LOCK TABLES `profile_wallet` WRITE;
/*!40000 ALTER TABLE `profile_wallet` DISABLE KEYS */;
INSERT INTO `profile_wallet` VALUES (1,0.00,'2011-03-17 11:07:41',0.00),(2,0.00,NULL,0.00);
/*!40000 ALTER TABLE `profile_wallet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_number`
--

DROP TABLE IF EXISTS `sms_number`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(11) NOT NULL,
  `cost` float(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_number`
--

LOCK TABLES `sms_number` WRITE;
/*!40000 ALTER TABLE `sms_number` DISABLE KEYS */;
INSERT INTO `sms_number` VALUES (1,'9395',254.24),(2,'8404',169.49),(3,'8385',144.07),(4,'1315',114.41),(5,'89653315639',0.00);
/*!40000 ALTER TABLE `sms_number` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistic_download`
--

DROP TABLE IF EXISTS `statistic_download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statistic_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(16) NOT NULL,
  `referer` varchar(256) DEFAULT NULL,
  `user_agent` varchar(256) DEFAULT NULL,
  `profile_id` int(11) NOT NULL,
  `midlet_id` int(11) NOT NULL,
  `subacc_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `midlet_id` (`midlet_id`),
  KEY `profile_id` (`profile_id`,`midlet_id`),
  KEY `subacc_id` (`subacc_id`),
  CONSTRAINT `statistic_download_ibfk_1` FOREIGN KEY (`midlet_id`) REFERENCES `midlet` (`id`),
  CONSTRAINT `statistic_download_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`),
  CONSTRAINT `statistic_download_ibfk_3` FOREIGN KEY (`subacc_id`) REFERENCES `subacc` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistic_download`
--

LOCK TABLES `statistic_download` WRITE;
/*!40000 ALTER TABLE `statistic_download` DISABLE KEYS */;
/*!40000 ALTER TABLE `statistic_download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistic_sms`
--

DROP TABLE IF EXISTS `statistic_sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statistic_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msisdn` varchar(16) NOT NULL,
  `sms_number` varchar(16) NOT NULL,
  `midlet_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subacc_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ss_ref_midlet` (`midlet_id`),
  KEY `ss_ref_subacc` (`subacc_id`),
  CONSTRAINT `ss_ref_subacc` FOREIGN KEY (`subacc_id`) REFERENCES `subacc` (`id`),
  CONSTRAINT `ss_ref_midlet` FOREIGN KEY (`midlet_id`) REFERENCES `midlet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistic_sms`
--

LOCK TABLES `statistic_sms` WRITE;
/*!40000 ALTER TABLE `statistic_sms` DISABLE KEYS */;
/*!40000 ALTER TABLE `statistic_sms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subacc`
--

DROP TABLE IF EXISTS `subacc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subacc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(32) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`,`profile_id`),
  KEY `profile_id` (`profile_id`),
  CONSTRAINT `subacc_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subacc`
--

LOCK TABLES `subacc` WRITE;
/*!40000 ALTER TABLE `subacc` DISABLE KEYS */;
INSERT INTO `subacc` VALUES (1,'h_default',1),(3,'subacc_one',1),(5,'subacc_three',1),(4,'subacc_two',1),(2,'techsupport_default',5);
/*!40000 ALTER TABLE `subacc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topic` varchar(300) NOT NULL,
  `text` text,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `t_ref_ticket_status` (`status_id`),
  KEY `t_ref_profile` (`profile_id`),
  CONSTRAINT `t_ref_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`),
  CONSTRAINT `t_ref_ticket_status` FOREIGN KEY (`status_id`) REFERENCES `ticket_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (1,1,'2011-03-18 14:59:41','asdaf','fdas',1),(2,1,'2011-03-18 15:09:57','test','test text ',1),(3,1,'2011-03-20 11:00:05','theme','text',1),(4,1,'2011-03-23 17:49:08','&Ntilde;','&Ntilde;',1);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_message`
--

DROP TABLE IF EXISTS `ticket_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_profile_id` int(11) NOT NULL,
  `to_profile_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text,
  `ticket_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tm_ref_profile` (`from_profile_id`),
  KEY `tm_ref_profile2` (`to_profile_id`),
  KEY `tm_ref_ticket` (`ticket_id`),
  CONSTRAINT `tm_ref_profile` FOREIGN KEY (`from_profile_id`) REFERENCES `profile` (`id`),
  CONSTRAINT `tm_ref_profile2` FOREIGN KEY (`to_profile_id`) REFERENCES `profile` (`id`),
  CONSTRAINT `tm_ref_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_message`
--

LOCK TABLES `ticket_message` WRITE;
/*!40000 ALTER TABLE `ticket_message` DISABLE KEYS */;
INSERT INTO `ticket_message` VALUES (2,1,5,'2011-03-19 00:19:18','test messagge',1),(3,1,5,'2011-03-19 00:34:47','test2',1),(4,1,5,'2011-03-20 10:59:13','&ETH;&cent;&ETH;&deg;&ETH;&ordm;&Ntilde;',1),(5,1,5,'2011-03-20 10:59:36','&ETH;&frac34;_&ETH;',1),(6,1,5,'2011-03-20 10:59:49','problem with russian',1),(7,1,5,'2011-03-20 11:00:30','hmm',3);
/*!40000 ALTER TABLE `ticket_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_status`
--

DROP TABLE IF EXISTS `ticket_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_status`
--

LOCK TABLES `ticket_status` WRITE;
/*!40000 ALTER TABLE `ticket_status` DISABLE KEYS */;
INSERT INTO `ticket_status` VALUES (1,'new','Новый');
/*!40000 ALTER TABLE `ticket_status` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-03-26  1:52:50
