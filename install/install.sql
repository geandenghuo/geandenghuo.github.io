-- MySQL dump 10.13  Distrib 5.5.57, for Linux (x86_64)
--
-- Host: localhost    Database: 52xuanxue
-- ------------------------------------------------------
-- Server version	5.5.57-log

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
-- Table structure for table `ayangw_blacklist`
--

DROP TABLE IF EXISTS `ayangw_blacklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayangw_blacklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `data` varchar(200) DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayangw_blacklist`
--

LOCK TABLES `ayangw_blacklist` WRITE;
/*!40000 ALTER TABLE `ayangw_blacklist` DISABLE KEYS */;
/*!40000 ALTER TABLE `ayangw_blacklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayangw_config`
--

DROP TABLE IF EXISTS `ayangw_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayangw_config` (
  `ayangw_k` varchar(255) NOT NULL DEFAULT '',
  `ayangw_v` text,
  PRIMARY KEY (`ayangw_k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayangw_config`
--

LOCK TABLES `ayangw_config` WRITE;
/*!40000 ALTER TABLE `ayangw_config` DISABLE KEYS */;
INSERT INTO `ayangw_config` VALUES ('sqlv','1041'),('title','个人发卡网'),('keywords','个人发卡网,pay.cccer.cn'),('description','欢迎使用'),('zzqq','496642365'),('notice2','付款后按提示点击确定跳转到提取页面，不可提前关闭窗口！否则无法提取到卡密！'),('notice3','提取码是订单编号 或者 您的联系方式！'),('notice1','提取卡密后请尽快激活使用或保存好，系统定期清除被提取的卡密'),('foot','全名发卡网演示站'),('dd_notice','1.联系方式也可以作为你的提卡凭证<br>2.必须等待付款完成自动跳转，不可提前关闭页面，否则会导致订单失效，后果自负'),('admin','admin'),('pwd','f3b4e3b975e0484835e90514f8318e61'),('web_url','localhost'),('payapi','9'),('epay_id','1000'),('epay_key','K6Lyk040y46n0lkyMK0kbBVKFLy0fkfB'),('showKc','1'),('CC_Defender','2'),('txprotect','1'),('qqtz','1'),('create','2018-07-15 13:31:59'),('view','wz'),('submit','修改'),('epay_url','http://pay.cccer.cn/'),('showImgs','1'),('cyapi','1'),('cyid',''),('cykey',''),('cygg',''),('syslog','1');
/*!40000 ALTER TABLE `ayangw_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayangw_goods`
--

DROP TABLE IF EXISTS `ayangw_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayangw_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gName` varchar(255) DEFAULT NULL,
  `gInfo` text,
  `imgs` varchar(110) DEFAULT NULL,
  `tpId` int(11) NOT NULL COMMENT 'Ã¦â€°â‚¬Ã¥Â±Å¾Ã¥Ë†â€ Ã§Â±Â»',
  `price` float DEFAULT NULL,
  `state` int(11) DEFAULT '1',
  `sotr` int(4) DEFAULT '1',
  `sales` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayangw_goods`
--

LOCK TABLES `ayangw_goods` WRITE;
/*!40000 ALTER TABLE `ayangw_goods` DISABLE KEYS */;
/*!40000 ALTER TABLE `ayangw_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayangw_km`
--

DROP TABLE IF EXISTS `ayangw_km`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayangw_km` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `km` varchar(100) DEFAULT NULL,
  `benTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `out_trade_no` varchar(100) DEFAULT NULL,
  `trade_no` varchar(100) DEFAULT NULL,
  `rel` varchar(50) DEFAULT NULL,
  `stat` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayangw_km`
--

LOCK TABLES `ayangw_km` WRITE;
/*!40000 ALTER TABLE `ayangw_km` DISABLE KEYS */;
/*!40000 ALTER TABLE `ayangw_km` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayangw_order`
--

DROP TABLE IF EXISTS `ayangw_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayangw_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `out_trade_no` varchar(100) DEFAULT NULL,
  `trade_no` varchar(100) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `money` float DEFAULT NULL,
  `rel` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `benTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `sta` int(11) DEFAULT '0',
  `sendE` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayangw_order`
--

LOCK TABLES `ayangw_order` WRITE;
/*!40000 ALTER TABLE `ayangw_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `ayangw_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayangw_syslog`
--

DROP TABLE IF EXISTS `ayangw_syslog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayangw_syslog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_name` varchar(20) DEFAULT NULL,
  `log_time` datetime DEFAULT NULL,
  `log_txt` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayangw_syslog`
--

LOCK TABLES `ayangw_syslog` WRITE;
/*!40000 ALTER TABLE `ayangw_syslog` DISABLE KEYS */;
INSERT INTO `ayangw_syslog` VALUES (1,'登陆后台成功!','2018-07-15 13:32:40','登陆IP:223.74.10.8,城市:');
/*!40000 ALTER TABLE `ayangw_syslog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayangw_type`
--

DROP TABLE IF EXISTS `ayangw_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayangw_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tName` varchar(100) DEFAULT NULL,
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayangw_type`
--

LOCK TABLES `ayangw_type` WRITE;
/*!40000 ALTER TABLE `ayangw_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `ayangw_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `if_blacklist`
--

DROP TABLE IF EXISTS `if_blacklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `if_blacklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `data` varchar(200) DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `if_blacklist`
--

LOCK TABLES `if_blacklist` WRITE;
/*!40000 ALTER TABLE `if_blacklist` DISABLE KEYS */;
/*!40000 ALTER TABLE `if_blacklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `if_config`
--

DROP TABLE IF EXISTS `if_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `if_config` (
  `if_k` varchar(255) NOT NULL DEFAULT '',
  `if_v` text,
  PRIMARY KEY (`if_k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `if_config`
--

LOCK TABLES `if_config` WRITE;
/*!40000 ALTER TABLE `if_config` DISABLE KEYS */;
INSERT INTO `if_config` VALUES ('title','个人发卡网'),('keywords','个人发卡网'),('description','个人发卡网'),('zzqq','496642365'),('notice2','付款后按提示点击确定跳转到提取页面，不可提前关闭窗口！否则无法提取到卡密！'),('notice3','提取码是订单编号 或者 您的联系方式！'),('notice1','提取卡密后请尽快激活使用或保存好，系统定期清除被提取的卡密'),('foot','个人发卡网'),('dd_notice','1.联系方式也可以作为你的提卡凭证<br>2.必须等待付款完成自动跳转，不可提前关闭页面，否则会导致订单失效，后果自负'),('admin','admin'),('pwd','f3b4e3b975e0484835e90514f8318e61'),('web_url','127.0.0.1'),('payapi','4'),('epay_id','4966423656'),('epay_key','4966423656'),('showKc','1'),('CC_Defender','2'),('txprotect','1'),('qqtz','2'),('sqlv','1041'),('epay_url','http://pay.cccer.cn/'),('create','2018-07-15 18:32:58'),('view','wz'),('submit','修改'),('showImgs','1'),('cyapi','1'),('cyid',''),('cykey',''),('cygg',''),('syslog','1');

/*!40000 ALTER TABLE `if_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `if_goods`
--

DROP TABLE IF EXISTS `if_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `if_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gName` varchar(255) DEFAULT NULL,
  `gInfo` text,
  `imgs` varchar(110) DEFAULT NULL,
  `tpId` int(11) NOT NULL COMMENT 'Ã¦â€°â‚¬Ã¥Â±Å¾Ã¥Ë†â€ Ã§Â±Â»',
  `price` float DEFAULT NULL,
  `state` int(11) DEFAULT '1',
  `sotr` int(4) DEFAULT '1',
  `sales` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `if_goods`
--

LOCK TABLES `if_goods` WRITE;
/*!40000 ALTER TABLE `if_goods` DISABLE KEYS */;
INSERT INTO `if_goods` VALUES (2,'测试商品','测试商品','assets/goodsimg/df.jpg',2,10,1,5,0);
/*!40000 ALTER TABLE `if_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `if_km`
--

DROP TABLE IF EXISTS `if_km`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `if_km` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `km` varchar(100) DEFAULT NULL,
  `benTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `out_trade_no` varchar(100) DEFAULT NULL,
  `trade_no` varchar(100) DEFAULT NULL,
  `rel` varchar(50) DEFAULT NULL,
  `stat` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `if_km`
--

LOCK TABLES `if_km` WRITE;
/*!40000 ALTER TABLE `if_km` DISABLE KEYS */;
INSERT INTO `if_km` VALUES (7,2,'789','2019-02-22 19:16:00',NULL,NULL,NULL,NULL,0),(6,2,'456\r','2019-02-22 19:16:00',NULL,NULL,NULL,NULL,0),(5,2,'123\r','2019-02-22 19:16:00',NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `if_km` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `if_order`
--

DROP TABLE IF EXISTS `if_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `if_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `out_trade_no` varchar(100) DEFAULT NULL,
  `trade_no` varchar(100) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `money` float DEFAULT NULL,
  `rel` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `benTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `sta` int(11) DEFAULT '0',
  `sendE` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `if_order`
--

LOCK TABLES `if_order` WRITE;
/*!40000 ALTER TABLE `if_order` DISABLE KEYS */;
INSERT INTO `if_order` VALUES (1,'2018615184835795',NULL,1,5,'123','qqpay','2018-07-15 18:48:48',NULL,1,0,0),(2,'20191221924887349',NULL,2,10,'36115555','wxpay','2019-02-22 19:25:03',NULL,1,0,0);
/*!40000 ALTER TABLE `if_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `if_syslog`
--

DROP TABLE IF EXISTS `if_syslog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `if_syslog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_name` varchar(20) DEFAULT NULL,
  `log_time` datetime DEFAULT NULL,
  `log_txt` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `if_syslog`
--

LOCK TABLES `if_syslog` WRITE;
/*!40000 ALTER TABLE `if_syslog` DISABLE KEYS */;
INSERT INTO `if_syslog` VALUES (1,'登陆后台成功!','2018-07-15 18:22:13','登陆IP:223.74.10.65,城市:'),(2,'修改商户信息成功!','2018-07-15 18:22:50','IP:223.74.10.65,城市:'),(3,'创建订单成功!','2018-07-15 18:48:53','IP:223.74.10.65,城市:'),(4,'修改网站信息成功!','2018-07-15 19:21:43','IP:223.74.10.65,城市:'),(5,'修改网站信息成功!','2018-07-15 19:39:56','IP:223.74.10.65,城市:'),(6,'登陆后台成功!','2019-02-22 18:59:56','登陆IP:175.17.92.58,城市:'),(7,'修改网站信息成功!','2019-02-22 19:02:06','IP:175.17.92.58,城市:'),(8,'登陆后台成功!','2019-02-22 19:04:41','登陆IP:175.17.92.58,城市:'),(9,'修改商户信息成功!','2019-02-22 19:24:19','IP:175.17.92.58,城市:'),(10,'修改商户信息成功!','2019-02-22 19:24:59','IP:175.17.92.58,城市:'),(11,'创建订单成功!','2019-02-22 19:25:08','IP:175.17.92.58,城市:'),(12,'修改商户信息成功!','2019-02-22 19:27:07','IP:175.17.92.58,城市:'),(13,'修改商户信息成功!','2019-02-22 19:28:53','IP:175.17.92.58,城市:'),(14,'修改商户信息成功!','2019-02-22 19:29:49','IP:175.17.92.58,城市:'),(15,'登陆后台成功!','2019-02-22 21:16:16','登陆IP:175.17.92.58,城市:'),(16,'修改商户信息成功!','2019-02-23 11:27:52','IP:175.17.92.58,城市:');

/*!40000 ALTER TABLE `if_syslog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `if_type`
--

DROP TABLE IF EXISTS `if_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `if_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tName` varchar(100) DEFAULT NULL,
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `if_type`
--

LOCK TABLES `if_type` WRITE;
/*!40000 ALTER TABLE `if_type` DISABLE KEYS */;
INSERT INTO `if_type` VALUES (2,'测试商品',1);
/*!40000 ALTER TABLE `if_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-23 11:42:25
