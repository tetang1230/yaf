-- MySQL dump 10.13  Distrib 5.6.19, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: commerce
-- ------------------------------------------------------
-- Server version	5.6.19-0ubuntu0.14.04.1

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
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupId` int(10) NOT NULL COMMENT '实体店groupId',
  `title` varchar(128) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `condition` text NOT NULL COMMENT '条件',
  `link` text NOT NULL COMMENT '连接',
  `deleted` tinyint(1) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cases`
--

DROP TABLE IF EXISTS `cases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cases` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `male_user_name` varchar(128) NOT NULL COMMENT '男会员名称',
  `famale_user_name` varchar(128) NOT NULL COMMENT '女会员名称',
  `consultant_name` varchar(128) NOT NULL COMMENT '顾问名称',
  `groupId` int(10) unsigned NOT NULL COMMENT '实体店groupId',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `bless` text NOT NULL COMMENT '祝福',
  `deleted` tinyint(1) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `groupId` (`groupId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` bigint(13) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `request` text NOT NULL COMMENT '请求',
  `response` text NOT NULL COMMENT '响应',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `create_time` (`create_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='接口日志记录';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pic`
--

DROP TABLE IF EXISTS `pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pic` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bin` mediumblob NOT NULL,
  `hash` char(32) NOT NULL,
  `mime` varchar(64) NOT NULL,
  `aid` int(10) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `hash` (`hash`),
  KEY `aid` (`aid`,`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupId` int(10) NOT NULL COMMENT '实体店id',
  `shop_addr` varchar(255) NOT NULL COMMENT '实体店地址',
  `shop_telephone` char(16) NOT NULL COMMENT '实体店电话',
  `cityCode` int(10) unsigned NOT NULL COMMENT '实体店所在城市',
  `shop_profile` varchar(255) NOT NULL COMMENT '实体店简介',
  `deleted` tinyint(1) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `groupId` (`groupId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(64) NOT NULL COMMENT '姓名',
  `age` tinyint(3) unsigned NOT NULL COMMENT '年龄',
  `gender` tinyint(1) unsigned NOT NULL COMMENT '性别',
  `height` int(10) unsigned NOT NULL COMMENT '身高',
  `weight` int(10) unsigned NOT NULL COMMENT '体重',
  `marriage` tinyint(1) unsigned NOT NULL COMMENT '婚姻状况',
  `love_type` tinyint(1) unsigned NOT NULL COMMENT '恋爱类型',
  `cityCode` int(10) unsigned NOT NULL COMMENT '城市代码',
  `groupId` int(10) NOT NULL COMMENT '实体店groupId',
  `career` char(128) NOT NULL COMMENT '职业',
  `income` varchar(64) NOT NULL COMMENT '收入',
  `education` char(64) NOT NULL COMMENT '学历',
  `house` char(64) NOT NULL COMMENT '住房情况',
  `authentic_real_name` tinyint(1) unsigned NOT NULL COMMENT '实名认证',
  `authentic_education` tinyint(1) unsigned NOT NULL COMMENT '学历认证',
  `authentic_legacy` tinyint(1) unsigned NOT NULL COMMENT '财产认证',
  `mate_authentic_real_name` tinyint(1) unsigned NOT NULL COMMENT '择偶实名认证',
  `mate_authentic_education` tinyint(1) unsigned NOT NULL COMMENT '择偶学历认证',
  `mate_authentic_legacy` tinyint(1) unsigned NOT NULL COMMENT '择偶财产认证',
  `mate_age` varchar(128) NOT NULL COMMENT '择偶年龄',
  `mate_height` varchar(128) NOT NULL COMMENT '择偶身高',
  `mate_weight` varchar(128) NOT NULL COMMENT '择偶体重',
  `mate_marriage` tinyint(1) unsigned NOT NULL COMMENT '择偶婚姻状况',
  `mate_love_type` tinyint(1) unsigned NOT NULL COMMENT '择偶恋爱类型',
  `mate_city` int(10) unsigned NOT NULL COMMENT '择偶城市代码',
  `mate_children` tinyint(1) unsigned NOT NULL COMMENT '择偶子女情况',
  `mate_career` varchar(128) NOT NULL COMMENT '择偶职业情况',
  `mate_income` varchar(128) NOT NULL COMMENT '择偶收入',
  `mate_education` tinyint(1) unsigned NOT NULL COMMENT '择偶学历',
  `mate_house` tinyint(1) unsigned NOT NULL COMMENT '择偶住房',
  `hobby` varchar(128) NOT NULL COMMENT '兴趣',
  `self_intro` varchar(128) NOT NULL COMMENT '自我介绍',
  `consultant_info_me` varchar(255) NOT NULL COMMENT '爱情顾问眼中的TA',
  `profile_title` varchar(128) NOT NULL COMMENT '简介文章title',
  `profile_content` text NOT NULL COMMENT '简介文章content',
  `deleted` tinyint(1) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-16 15:05:02
