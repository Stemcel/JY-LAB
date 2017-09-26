﻿# Host: localhost  (Version: 5.5.47)
# Date: 2017-08-10 15:46:08
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "act_log"
#

DROP TABLE IF EXISTS `act_log`;
CREATE TABLE `act_log` (
  `logID` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`logID`)
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=utf8;

#
# Data for table "act_log"
#

INSERT INTO `act_log` VALUES (1,'于2017-06-12 09:56:42在经费类型管理模块下对ID=2进行了创建操作','2017-06-12 09:56:42'),(2,'于2017-06-12 10:00:53在经费类型管理模块下对ID=3进行了创建操作','2017-06-12 10:00:53'),(3,'于2017-06-12 10:02:44在经费类型管理模块下对ID=3进行了删除操作','2017-06-12 10:02:44'),(4,'于2017-06-12 10:03:13在经费类型管理模块下对ID=4进行了创建操作','2017-06-12 10:03:13'),(5,'于2017-06-12 10:06:25在经费类型管理模块下对ID=5进行了创建操作','2017-06-12 10:06:25'),(6,'于2017-06-12 10:06:51在经费类型管理模块下对ID=6进行了创建操作','2017-06-12 10:06:51'),(7,'于2017-06-12 10:08:34在经费类型管理模块下对ID=7进行了创建操作','2017-06-12 10:08:34'),(8,'于2017-06-12 10:08:52在经费类型管理模块下对ID=7,6,5,4进行了删除操作','2017-06-12 10:08:52'),(9,'于2017-06-12 10:09:09在经费类型管理模块下对ID=8进行了创建操作','2017-06-12 10:09:09'),(10,'于2017-06-12 10:10:09在经费类型管理模块下对ID=8进行了删除操作','2017-06-12 10:10:09'),(11,'于2017-06-12 10:10:22在经费类型管理模块下对ID=9进行了创建操作','2017-06-12 10:10:22'),(12,'于2017-06-12 10:11:24在经费类型管理模块下对ID=10进行了创建操作','2017-06-12 10:11:24'),(13,'于2017-06-12 10:11:32在经费类型管理模块下对ID=9进行了删除操作','2017-06-12 10:11:32'),(14,'于2017-06-12 10:12:34在经费类型管理模块下对ID=10进行了删除操作','2017-06-12 10:12:34'),(15,'于2017-06-20 11:06:11在模块管理模块下对ID=14进行了创建操作','2017-06-20 11:06:11'),(16,'于2017-06-20 11:06:24在模块管理模块下对ID=14进行了更新操作','2017-06-20 11:06:24'),(17,'于2017-06-20 11:06:37在模块管理模块下对ID=13进行了更新操作','2017-06-20 11:06:37'),(18,'于2017-06-20 11:06:50在模块管理模块下对ID=10进行了更新操作','2017-06-20 11:06:50'),(19,'于2017-06-20 11:07:02在模块管理模块下对ID=2进行了更新操作','2017-06-20 11:07:02'),(20,'于2017-06-20 11:07:43在模块管理模块下对ID=1进行了更新操作','2017-06-20 11:07:43'),(21,'于2017-06-20 11:08:11在模块管理模块下对ID=15进行了创建操作','2017-06-20 11:08:11'),(22,'于2017-06-20 11:23:41在功能管理模块下对ID=37进行了创建操作','2017-06-20 11:23:41'),(23,'于2017-06-20 11:24:08在功能管理模块下对ID=37进行了更新操作','2017-06-20 11:24:08'),(24,'于2017-06-20 11:26:02在功能管理模块下对ID=38进行了创建操作','2017-06-20 11:26:02'),(25,'于2017-06-20 12:34:03在功能管理模块下对ID=38,37进行了删除操作','2017-06-20 12:34:03'),(26,'于2017-06-22 09:08:11在经费类型管理模块下对ID=3进行了创建操作','2017-06-22 09:08:11'),(27,'于2017-06-22 09:10:06在经费类型管理模块下对ID=4进行了申请操作','2017-06-22 09:10:06'),(28,'3于2017-06-22 09:11:34在经费类型管理模块下对ID=4进行了批准操作','2017-06-22 09:11:34'),(29,'3于2017-06-22 09:14:08在经费类型管理模块下对ID=4进行了删除操作','2017-06-22 09:14:08'),(30,'3于2017-06-22 09:16:26在经费类型管理模块下对ID=5进行了申请操作','2017-06-22 09:16:26'),(31,'3于2017-06-22 09:17:03在经费类型管理模块下对ID=5进行了批准操作','2017-06-22 09:17:03'),(32,'3于2017-06-22 09:18:18在经费类型管理模块下对ID=6进行了申请操作','2017-06-22 09:18:18'),(33,'3于2017-06-22 09:18:48在经费类型管理模块下对ID=6进行了批准操作','2017-06-22 09:18:48'),(34,'3于2017-06-30 13:30:05在功能管理模块下对ID=37进行了创建操作','2017-06-30 13:30:05'),(35,'3于2017-06-30 13:30:47在功能管理模块下对ID=38进行了创建操作','2017-06-30 13:30:47'),(36,'3于2017-06-30 13:35:29在功能管理模块下对ID=39进行了创建操作','2017-06-30 13:35:29'),(37,'3于2017-06-30 13:42:52在功能管理模块下对ID=40进行了创建操作','2017-06-30 13:42:52'),(38,'3于2017-06-30 13:43:15在功能管理模块下对ID=38进行了更新操作','2017-06-30 13:43:15'),(39,'3于2017-06-30 13:43:31在功能管理模块下对ID=37进行了更新操作','2017-06-30 13:43:31'),(40,'3于2017-06-30 13:46:46在功能管理模块下对ID=40,39进行了删除操作','2017-06-30 13:46:46'),(41,'3于2017-06-30 13:48:53在功能管理模块下对ID=41进行了创建操作','2017-06-30 13:48:53'),(42,'3于2017-06-30 13:55:09在功能管理模块下对ID=42进行了创建操作','2017-06-30 13:55:09'),(43,'3于2017-06-30 13:56:17在功能管理模块下对ID=43进行了创建操作','2017-06-30 13:56:17'),(44,'3于2017-06-30 13:57:11在功能管理模块下对ID=44进行了创建操作','2017-06-30 13:57:11'),(45,'3于2017-06-30 13:58:00在功能管理模块下对ID=45进行了创建操作','2017-06-30 13:58:00'),(46,'3于2017-06-30 13:58:20在功能管理模块下对ID=41进行了更新操作','2017-06-30 13:58:20'),(47,'3于2017-06-30 13:58:50在用户功能配置模块下对ID=45,44,43,42,41,38,37进行了角色功能添加操作','2017-06-30 13:58:50'),(48,'3于2017-06-30 14:01:21在功能管理模块下对ID=45进行了更新操作','2017-06-30 14:01:21'),(49,'3于2017-06-30 14:01:32在功能管理模块下对ID=44进行了更新操作','2017-06-30 14:01:32'),(50,'3于2017-06-30 14:01:41在功能管理模块下对ID=43进行了更新操作','2017-06-30 14:01:41'),(51,'3于2017-06-30 14:01:53在功能管理模块下对ID=42进行了更新操作','2017-06-30 14:01:53'),(52,'3于2017-07-14 10:54:21在经费类型管理模块下对ID=5,6进行了删除操作','2017-07-14 10:54:21'),(53,'3于2017-07-14 10:56:10在教师管理模块下对ID=3进行了更新操作','2017-07-14 10:56:10'),(54,'3于2017-07-14 10:56:30在教师管理模块下对ID=3进行了更新操作','2017-07-14 10:56:30'),(55,'3于2017-07-14 14:46:59在经费类型管理模块下对ID=1,2,3进行了删除操作','2017-07-14 14:46:59'),(56,'3于2017-07-14 14:52:27在经费类型管理模块下对ID=7进行了申请操作','2017-07-14 14:52:27'),(57,'3于2017-07-14 15:29:46在经费类型管理模块下对ID=7进行了批准操作','2017-07-14 15:29:46'),(58,'3于2017-07-19 10:29:13在经费类型管理模块下对ID=8进行了申请操作','2017-07-19 10:29:13'),(59,'3于2017-07-19 14:42:34在经费类型管理模块下对ID=8进行了批准操作','2017-07-19 14:42:34'),(60,'3于2017-07-19 14:43:29在经费类型管理模块下对ID=9进行了申请操作','2017-07-19 14:43:29'),(61,'3于2017-07-19 15:02:29在经费类型管理模块下对ID=9进行了批准操作','2017-07-19 15:02:29'),(62,'3于2017-07-20 10:03:29在经费类型管理模块下对ID=9进行了批准操作','2017-07-20 10:03:29'),(63,'3于2017-07-20 10:06:38在经费类型管理模块下对ID=9进行了批准操作','2017-07-20 10:06:38'),(64,'3于2017-07-20 10:08:03在经费类型管理模块下对ID=9进行了批准操作','2017-07-20 10:08:03'),(65,'3于2017-07-20 10:10:13在经费类型管理模块下对ID=9进行了批准操作','2017-07-20 10:10:13'),(66,'3于2017-07-20 10:47:34在经费类型管理模块下对ID=9进行了批准操作','2017-07-20 10:47:34'),(67,'3于2017-07-20 10:48:16在经费类型管理模块下对ID=9进行了批准操作','2017-07-20 10:48:16'),(68,'3于2017-07-20 10:50:45在经费类型管理模块下对ID=9进行了批准操作','2017-07-20 10:50:45'),(69,'3于2017-07-20 10:53:22在经费类型管理模块下对ID=9进行了批准操作','2017-07-20 10:53:22'),(70,'3于2017-07-20 11:03:25在经费类型管理模块下对ID=9进行了批准操作','2017-07-20 11:03:25'),(71,'3于2017-07-20 11:06:44在经费类型管理模块下对ID=9进行了批准操作','2017-07-20 11:06:44'),(72,'3于2017-07-20 14:35:31在经费类型管理模块下对ID=9进行了批准操作','2017-07-20 14:35:31'),(73,'3于2017-07-20 15:02:57在经费类型管理模块下对ID=9进行了批准操作','2017-07-20 15:02:57'),(74,'3于2017-07-20 15:08:33在经费类型管理模块下对ID=9进行了批准操作','2017-07-20 15:08:33'),(75,'3于2017-07-20 16:51:55在经费类型管理模块下对ID=10进行了申请操作','2017-07-20 16:51:55'),(76,'3于2017-07-27 10:46:53在经费类型管理模块下对ID=10进行了批准操作','2017-07-27 10:46:53'),(77,'3于2017-07-27 15:02:15在经费类型管理模块下对ID=9进行了批准操作','2017-07-27 15:02:15'),(78,'3于2017-07-29 09:50:07在经费类型管理模块下对ID=10进行了批准操作','2017-07-29 09:50:07'),(79,'3于2017-07-29 15:39:34在经费类型管理模块下对ID=8进行了批准操作','2017-07-29 15:39:34'),(80,'3于2017-07-29 16:02:33在经费类型管理模块下对ID=7进行了批准操作','2017-07-29 16:02:33'),(81,'3于2017-07-31 09:52:01在经费类型管理模块下对ID=8进行了批准操作','2017-07-31 09:52:01'),(82,'3于2017-08-01 13:53:30在模块管理模块下对ID=16进行了创建操作','2017-08-01 13:53:30'),(83,'3于2017-08-01 13:55:59在功能管理模块下对ID=46进行了创建操作','2017-08-01 13:55:59'),(84,'3于2017-08-01 14:11:18在功能管理模块下对ID=47进行了创建操作','2017-08-01 14:11:18'),(85,'3于2017-08-01 14:13:33在功能管理模块下对ID=48进行了创建操作','2017-08-01 14:13:33'),(86,'3于2017-08-01 14:15:21在功能管理模块下对ID=49进行了创建操作','2017-08-01 14:15:21'),(87,'3于2017-08-01 14:15:53在功能管理模块下对ID=48进行了更新操作','2017-08-01 14:15:53'),(88,'3于2017-08-01 14:16:42在用户功能配置模块下对ID=49,48,47,46进行了角色功能添加操作','2017-08-01 14:16:42'),(89,'3于2017-08-01 14:26:17在功能管理模块下对ID=47进行了更新操作','2017-08-01 14:26:17'),(90,'3于2017-08-01 15:56:49在供应商管理模块下对ID=1进行了申请操作','2017-08-01 15:56:49'),(91,'3于2017-08-01 15:58:20在供应商管理模块下对ID=2进行了申请操作','2017-08-01 15:58:20'),(92,'3于2017-08-01 16:09:15在供应商管理模块下对ID=1进行了删除操作','2017-08-01 16:09:15'),(93,'3于2017-08-02 08:53:49在供应商管理模块下对ID=2进行了批准操作','2017-08-02 08:53:49'),(94,'3于2017-08-02 14:33:28在采购申请管理模块下对ID=1进行了申请操作','2017-08-02 14:33:28'),(95,'3于2017-08-02 14:39:11在采购申请管理模块下对ID=1进行了批准操作','2017-08-02 14:39:11'),(96,'3于2017-08-02 14:41:31在采购申请管理模块下对ID=1进行了批准操作','2017-08-02 14:41:31'),(97,'3于2017-08-02 15:21:34在采购申请管理模块下对ID=2进行了申请操作','2017-08-02 15:21:34'),(98,'3于2017-08-02 15:53:57在采购申请管理模块下对ID=3进行了申请操作','2017-08-02 15:53:57'),(99,'3于2017-08-02 16:08:12在采购申请管理模块下对ID=4进行了申请操作','2017-08-02 16:08:12'),(100,'3于2017-08-02 16:09:42在采购申请管理模块下对ID=5进行了申请操作','2017-08-02 16:09:42'),(101,'3于2017-08-02 16:12:09在采购申请管理模块下对ID=6进行了申请操作','2017-08-02 16:12:09'),(102,'3于2017-08-02 16:13:58在采购申请管理模块下对ID=7进行了申请操作','2017-08-02 16:13:58'),(103,'3于2017-08-02 16:22:10在采购申请管理模块下对ID=7,6,5,4,3,2,1进行了删除操作','2017-08-02 16:22:10'),(104,'3于2017-08-03 14:18:43在供应商管理模块下对ID=1进行了申请操作','2017-08-03 14:18:43'),(105,'3于2017-08-03 15:21:59在供应商管理模块下对ID=2进行了申请操作','2017-08-03 15:21:59'),(106,'3于2017-08-04 08:57:44在供应商管理模块下对ID=3进行了申请操作','2017-08-04 08:57:44'),(107,'3于2017-08-04 08:59:02在供应商管理模块下对ID=4进行了申请操作','2017-08-04 08:59:02'),(108,'3于2017-08-04 08:59:36在供应商管理模块下对ID=5进行了申请操作','2017-08-04 08:59:36'),(109,'3于2017-08-04 09:00:39在供应商管理模块下对ID=6进行了申请操作','2017-08-04 09:00:39'),(110,'3于2017-08-04 09:01:07在供应商管理模块下对ID=7进行了申请操作','2017-08-04 09:01:07'),(111,'3于2017-08-04 09:03:08在供应商管理模块下对ID=8进行了申请操作','2017-08-04 09:03:08'),(112,'3于2017-08-04 09:03:30在供应商管理模块下对ID=9进行了申请操作','2017-08-04 09:03:30'),(113,'3于2017-08-04 09:05:04在供应商管理模块下对ID=10进行了申请操作','2017-08-04 09:05:04'),(114,'3于2017-08-04 09:23:23在供应商管理模块下对ID=11进行了申请操作','2017-08-04 09:23:23'),(115,'3于2017-08-04 09:25:10在供应商管理模块下对ID=1,2,3,4,5,6,7,8,9,10进行了删除操作','2017-08-04 09:25:10'),(116,'3于2017-08-04 09:25:15在供应商管理模块下对ID=11进行了删除操作','2017-08-04 09:25:15'),(117,'3于2017-08-04 09:25:35在供应商管理模块下对ID=12进行了申请操作','2017-08-04 09:25:35'),(118,'3于2017-08-04 09:26:11在供应商管理模块下对ID=13进行了申请操作','2017-08-04 09:26:11'),(119,'3于2017-08-04 10:46:35在供应商管理模块下对ID=14进行了申请操作','2017-08-04 10:46:35'),(120,'3于2017-08-04 10:46:37在供应商管理模块下对ID=15进行了申请操作','2017-08-04 10:46:37'),(121,'3于2017-08-04 10:46:45在供应商管理模块下对ID=15进行了删除操作','2017-08-04 10:46:45'),(122,'3于2017-08-04 10:47:14在供应商管理模块下对ID=16进行了申请操作','2017-08-04 10:47:14'),(123,'3于2017-08-04 10:47:39在供应商管理模块下对ID=17进行了申请操作','2017-08-04 10:47:39'),(124,'3于2017-08-04 11:25:09在供应商管理模块下对ID=18进行了申请操作','2017-08-04 11:25:09'),(125,'3于2017-08-04 14:57:46在供应商管理模块下对ID=18进行了删除操作','2017-08-04 14:57:46'),(126,'3于2017-08-04 15:19:27在供应商管理模块下对ID=19进行了申请操作','2017-08-04 15:19:27'),(127,'3于2017-08-04 15:19:36在供应商管理模块下对ID=19进行了删除操作','2017-08-04 15:19:36'),(128,'3于2017-08-04 15:19:43在供应商管理模块下对ID=20进行了申请操作','2017-08-04 15:19:43'),(129,'3于2017-08-04 15:20:22在供应商管理模块下对ID=20进行了删除操作','2017-08-04 15:20:22'),(130,'3于2017-08-04 15:20:31在供应商管理模块下对ID=21进行了申请操作','2017-08-04 15:20:31'),(131,'3于2017-08-04 15:20:42在供应商管理模块下对ID=21进行了删除操作','2017-08-04 15:20:42'),(132,'3于2017-08-04 15:23:03在供应商管理模块下对ID=22进行了申请操作','2017-08-04 15:23:03'),(133,'3于2017-08-04 15:23:15在供应商管理模块下对ID=22进行了删除操作','2017-08-04 15:23:15'),(134,'3于2017-08-04 15:26:04在供应商管理模块下对ID=23进行了申请操作','2017-08-04 15:26:04'),(135,'3于2017-08-04 15:27:59在供应商管理模块下对ID=24进行了申请操作','2017-08-04 15:27:59'),(136,'3于2017-08-04 15:28:09在供应商管理模块下对ID=24进行了删除操作','2017-08-04 15:28:09'),(137,'3于2017-08-04 15:28:47在供应商管理模块下对ID=25进行了申请操作','2017-08-04 15:28:47'),(138,'3于2017-08-04 15:28:50在供应商管理模块下对ID=26进行了申请操作','2017-08-04 15:28:50'),(139,'3于2017-08-04 15:28:57在供应商管理模块下对ID=25进行了删除操作','2017-08-04 15:28:57'),(140,'3于2017-08-04 15:29:06在供应商管理模块下对ID=26进行了删除操作','2017-08-04 15:29:06'),(141,'3于2017-08-04 15:29:17在供应商管理模块下对ID=27进行了申请操作','2017-08-04 15:29:17'),(142,'3于2017-08-04 15:30:42在供应商管理模块下对ID=28进行了申请操作','2017-08-04 15:30:42'),(143,'3于2017-08-04 15:31:33在供应商管理模块下对ID=29进行了申请操作','2017-08-04 15:31:33'),(144,'3于2017-08-04 15:35:16在供应商管理模块下对ID=27,28,29进行了删除操作','2017-08-04 15:35:16'),(145,'3于2017-08-04 15:35:52在供应商管理模块下对ID=30进行了申请操作','2017-08-04 15:35:52'),(146,'3于2017-08-04 15:38:03在供应商管理模块下对ID=23进行了删除操作','2017-08-04 15:38:03'),(147,'3于2017-08-04 15:38:15在供应商管理模块下对ID=31进行了申请操作','2017-08-04 15:38:15'),(148,'3于2017-08-04 15:38:30在供应商管理模块下对ID=31进行了删除操作','2017-08-04 15:38:30'),(149,'3于2017-08-04 15:43:33在供应商管理模块下对ID=32进行了申请操作','2017-08-04 15:43:33'),(150,'3于2017-08-04 16:47:40在采购申请管理模块下对ID=1进行了申请操作','2017-08-04 16:47:40'),(151,'3于2017-08-04 16:47:50在采购申请管理模块下对ID=1进行了删除操作','2017-08-04 16:47:50'),(152,'3于2017-08-04 16:48:08在采购申请管理模块下对ID=2进行了申请操作','2017-08-04 16:48:08'),(153,'3于2017-08-04 16:52:22在采购申请管理模块下对ID=3进行了申请操作','2017-08-04 16:52:22'),(154,'3于2017-08-04 16:56:32在采购申请管理模块下对ID=4进行了申请操作','2017-08-04 16:56:32'),(155,'3于2017-08-04 16:57:26在采购申请管理模块下对ID=4,3进行了删除操作','2017-08-04 16:57:26'),(156,'3于2017-08-04 17:07:22在采购申请管理模块下对ID=5进行了申请操作','2017-08-04 17:07:22'),(157,'3于2017-08-05 09:28:58在采购申请管理模块下对ID=6进行了申请操作','2017-08-05 09:28:58'),(158,'3于2017-08-05 09:38:05在采购申请管理模块下对ID=7进行了申请操作','2017-08-05 09:38:05'),(159,'3于2017-08-05 09:43:46在供应商管理模块下对ID=6进行了申请操作','2017-08-05 09:43:46'),(160,'3于2017-08-05 09:47:45在采购申请管理模块下对ID=8进行了申请操作','2017-08-05 09:47:45'),(161,'3于2017-08-05 09:52:21在采购明细管理模块下对ID=进行了申请操作','2017-08-05 09:52:21'),(162,'3于2017-08-05 09:56:47在采购申请管理模块下对ID=8,7,6,5进行了删除操作','2017-08-05 09:56:47'),(163,'3于2017-08-05 10:01:57在采购申请管理模块下对ID=3进行了申请操作','2017-08-05 10:01:57'),(164,'3于2017-08-05 10:02:53在采购申请管理模块下对ID=4进行了申请操作','2017-08-05 10:02:53'),(165,'3于2017-08-05 10:03:57在采购申请管理模块下对ID=5进行了申请操作','2017-08-05 10:03:57'),(166,'3于2017-08-05 10:05:05在采购申请管理模块下对ID=6进行了申请操作','2017-08-05 10:05:05'),(167,'3于2017-08-05 10:06:10在采购申请管理模块下对ID=6,5,4,3,2进行了删除操作','2017-08-05 10:06:10'),(168,'3于2017-08-05 10:15:59在采购申请管理模块下对ID=1进行了申请操作','2017-08-05 10:15:59'),(169,'3于2017-08-05 10:16:46在采购申请管理模块下对ID=2进行了申请操作','2017-08-05 10:16:46'),(170,'3于2017-08-05 10:16:56在采购明细管理模块下对ID=99999进行了申请操作','2017-08-05 10:16:56'),(171,'3于2017-08-05 10:17:18在采购申请管理模块下对ID=3进行了申请操作','2017-08-05 10:17:18'),(172,'3于2017-08-05 10:17:23在采购明细管理模块下对ID=8888进行了申请操作','2017-08-05 10:17:23'),(173,'3于2017-08-05 10:18:49在采购申请管理模块下对ID=4进行了申请操作','2017-08-05 10:18:49'),(174,'3于2017-08-05 10:18:55在采购明细管理模块下对ID=55555进行了申请操作','2017-08-05 10:18:55'),(175,'3于2017-08-05 10:42:23在采购申请管理模块下对ID=1进行了申请操作','2017-08-05 10:42:23'),(176,'3于2017-08-05 10:42:37在采购明细管理模块下对ID=1进行了申请操作','2017-08-05 10:42:37'),(177,'3于2017-08-05 10:48:30在采购申请管理模块下对ID=1进行了申请操作','2017-08-05 10:48:30'),(178,'3于2017-08-05 10:48:34在采购明细管理模块下对ID=1进行了申请操作','2017-08-05 10:48:34'),(179,'3于2017-08-05 10:48:51在采购申请管理模块下对ID=1进行了删除操作','2017-08-05 10:48:51'),(180,'3于2017-08-05 11:16:50在采购申请管理模块下对ID=2进行了申请操作','2017-08-05 11:16:50'),(181,'3于2017-08-05 13:53:13在采购申请管理模块下对ID=3进行了申请操作','2017-08-05 13:53:13'),(182,'3于2017-08-05 13:53:20在采购明细管理模块下对ID=2进行了申请操作','2017-08-05 13:53:20'),(183,'3于2017-08-05 13:53:50在采购申请管理模块下对ID=2进行了删除操作','2017-08-05 13:53:50'),(184,'3于2017-08-05 13:54:15在采购申请管理模块下对ID=4进行了申请操作','2017-08-05 13:54:15'),(185,'3于2017-08-05 13:54:29在采购明细管理模块下对ID=4进行了申请操作','2017-08-05 13:54:29'),(186,'3于2017-08-05 13:54:58在采购申请管理模块下对ID=4,3进行了删除操作','2017-08-05 13:54:58'),(187,'3于2017-08-05 14:02:01在采购申请管理模块下对ID=5进行了申请操作','2017-08-05 14:02:01'),(188,'3于2017-08-05 14:18:21在经费类型管理模块下对ID=7,8,9,10进行了删除操作','2017-08-05 14:18:21'),(189,'3于2017-08-05 14:19:28在经费类型管理模块下对ID=3,2,1进行了删除操作','2017-08-05 14:19:28'),(190,'3于2017-08-05 14:19:56在经费类型管理模块下对ID=4进行了创建操作','2017-08-05 14:19:56'),(191,'3于2017-08-05 14:31:53在经费类型管理模块下对ID=1进行了申请操作','2017-08-05 14:31:53'),(192,'3于2017-08-05 14:32:19在经费类型管理模块下对ID=2进行了申请操作','2017-08-05 14:32:19'),(193,'3于2017-08-05 14:33:26在经费类型管理模块下对ID=1进行了批准操作','2017-08-05 14:33:26'),(194,'3于2017-08-05 14:38:20在经费类型管理模块下对ID=2进行了批准操作','2017-08-05 14:38:20'),(195,'3于2017-08-05 14:39:45在采购申请管理模块下对ID=5进行了删除操作','2017-08-05 14:39:45'),(196,'3于2017-08-05 14:42:27在采购申请管理模块下对ID=6进行了申请操作','2017-08-05 14:42:27'),(197,'3于2017-08-05 15:01:05在采购申请管理模块下对ID=7进行了申请操作','2017-08-05 15:01:05'),(198,'3于2017-08-05 15:30:44在采购申请管理模块下对ID=8进行了申请操作','2017-08-05 15:30:44'),(199,'3于2017-08-05 15:35:53在采购申请管理模块下对ID=9进行了申请操作','2017-08-05 15:35:53'),(200,'3于2017-08-05 15:39:04在采购申请管理模块下对ID=10进行了申请操作','2017-08-05 15:39:04'),(201,'3于2017-08-05 15:40:46在采购明细管理模块下对ID=10进行了申请操作','2017-08-05 15:40:46'),(202,'3于2017-08-05 15:41:18在采购申请管理模块下对ID=10进行了删除操作','2017-08-05 15:41:18'),(203,'3于2017-08-05 15:41:39在采购申请管理模块下对ID=9,8,7,6进行了删除操作','2017-08-05 15:41:39'),(204,'3于2017-08-07 09:27:56在经费类型管理模块下对ID=3进行了申请操作','2017-08-07 09:27:56'),(205,'3于2017-08-07 09:52:58在经费类型管理模块下对ID=4进行了申请操作','2017-08-07 09:52:58'),(206,'3于2017-08-07 09:54:16在经费类型管理模块下对ID=4进行了批准操作','2017-08-07 09:54:16'),(207,'3于2017-08-10 09:14:31在采购申请管理模块下对ID=1进行了申请操作','2017-08-10 09:14:31'),(208,'3于2017-08-10 09:14:47在采购明细管理模块下对ID=1进行了申请操作','2017-08-10 09:14:47'),(209,'3于2017-08-10 09:16:18在功能管理模块下对ID=50进行了创建操作','2017-08-10 09:16:18'),(210,'3于2017-08-10 09:16:44在用户功能配置模块下对ID=50进行了角色功能添加操作','2017-08-10 09:16:44'),(211,'3于2017-08-10 09:17:49在功能管理模块下对ID=48进行了更新操作','2017-08-10 09:17:49'),(212,'3于2017-08-10 09:20:22在功能管理模块下对ID=51进行了创建操作','2017-08-10 09:20:22'),(213,'3于2017-08-10 09:21:01在用户功能配置模块下对ID=51进行了角色功能添加操作','2017-08-10 09:21:01'),(214,'3于2017-08-10 09:24:15在功能管理模块下对ID=52进行了创建操作','2017-08-10 09:24:15'),(215,'3于2017-08-10 09:24:27在功能管理模块下对ID=52进行了更新操作','2017-08-10 09:24:27'),(216,'3于2017-08-10 09:25:41在功能管理模块下对ID=52进行了更新操作','2017-08-10 09:25:41'),(217,'3于2017-08-10 09:26:07在功能管理模块下对ID=45进行了更新操作','2017-08-10 09:26:07'),(218,'3于2017-08-10 09:26:20在功能管理模块下对ID=44进行了更新操作','2017-08-10 09:26:20'),(219,'3于2017-08-10 09:26:32在功能管理模块下对ID=43进行了更新操作','2017-08-10 09:26:32'),(220,'3于2017-08-10 09:26:44在功能管理模块下对ID=52进行了更新操作','2017-08-10 09:26:44'),(221,'3于2017-08-10 09:27:40在用户功能配置模块下对ID=52进行了角色功能添加操作','2017-08-10 09:27:40'),(222,'3于2017-08-10 10:10:03在供应商管理模块下对ID=2进行了申请操作','2017-08-10 10:10:03'),(223,'3于2017-08-10 10:17:15在供应商管理模块下对ID=3进行了申请操作','2017-08-10 10:17:15'),(224,'3于2017-08-10 10:19:03在采购申请管理模块下对ID=2进行了申请操作','2017-08-10 10:19:03'),(225,'3于2017-08-10 10:20:00在采购明细管理模块下对ID=4进行了申请操作','2017-08-10 10:20:00'),(226,'3于2017-08-10 10:20:39在供应商管理模块下对ID=5进行了申请操作','2017-08-10 10:20:39'),(227,'3于2017-08-10 10:27:28在采购申请管理模块下对ID=3进行了申请操作','2017-08-10 10:27:28'),(228,'3于2017-08-10 10:28:08在采购明细管理模块下对ID=6进行了申请操作','2017-08-10 10:28:08'),(229,'3于2017-08-10 10:33:10在供应商管理模块下对ID=7进行了申请操作','2017-08-10 10:33:10'),(230,'3于2017-08-10 10:40:11在采购明细管理模块下对ID=3进行了删除操作','2017-08-10 10:40:11'),(231,'3于2017-08-10 10:43:29在采购明细管理模块下对ID=2进行了删除操作','2017-08-10 10:43:29'),(232,'3于2017-08-10 10:44:18在采购明细管理模块下对ID=5,7进行了删除操作','2017-08-10 10:44:18'),(233,'3于2017-08-10 10:45:08在采购明细管理模块下对ID=4进行了删除操作','2017-08-10 10:45:08'),(234,'3于2017-08-10 10:45:48在采购申请管理模块下对ID=3,2,1进行了删除操作','2017-08-10 10:45:48'),(235,'3于2017-08-10 10:46:04在采购申请管理模块下对ID=4进行了申请操作','2017-08-10 10:46:04'),(236,'3于2017-08-10 10:46:30在采购明细管理模块下对ID=8进行了申请操作','2017-08-10 10:46:30'),(237,'3于2017-08-10 10:46:38在采购明细管理模块下对ID=8进行了删除操作','2017-08-10 10:46:38'),(238,'3于2017-08-10 10:48:38在供应商管理模块下对ID=9进行了申请操作','2017-08-10 10:48:38'),(239,'3于2017-08-10 10:48:51在采购明细管理模块下对ID=9进行了删除操作','2017-08-10 10:48:51'),(240,'3于2017-08-10 10:50:36在供应商管理模块下对ID=10进行了申请操作','2017-08-10 10:50:36'),(241,'3于2017-08-10 10:50:42在采购明细管理模块下对ID=10进行了删除操作','2017-08-10 10:50:42'),(242,'3于2017-08-10 10:52:13在供应商管理模块下对ID=11进行了申请操作','2017-08-10 10:52:13'),(243,'3于2017-08-10 10:53:10在采购明细管理模块下对ID=11进行了删除操作','2017-08-10 10:53:10'),(244,'3于2017-08-10 10:54:03在供应商管理模块下对ID=12进行了申请操作','2017-08-10 10:54:03'),(245,'3于2017-08-10 10:54:10在采购明细管理模块下对ID=12进行了删除操作','2017-08-10 10:54:10'),(246,'3于2017-08-10 10:56:37在供应商管理模块下对ID=13进行了申请操作','2017-08-10 10:56:37'),(247,'3于2017-08-10 10:56:50在采购明细管理模块下对ID=13进行了删除操作','2017-08-10 10:56:50'),(248,'3于2017-08-10 14:11:41在采购申请管理模块下对ID=5进行了申请操作','2017-08-10 14:11:41'),(249,'3于2017-08-10 14:11:49在采购明细管理模块下对ID=1进行了申请操作','2017-08-10 14:11:49'),(250,'3于2017-08-10 14:21:11在供应商管理模块下对ID=2进行了申请操作','2017-08-10 14:21:11'),(251,'3于2017-08-10 14:31:01在供应商管理模块下对ID=3进行了申请操作','2017-08-10 14:31:01'),(252,'3于2017-08-10 14:42:53在供应商管理模块下对ID=4进行了申请操作','2017-08-10 14:42:53'),(253,'3于2017-08-10 14:43:21在供应商管理模块下对ID=5进行了申请操作','2017-08-10 14:43:21'),(254,'3于2017-08-10 14:43:56在供应商管理模块下对ID=6进行了申请操作','2017-08-10 14:43:56'),(255,'3于2017-08-10 14:44:30在采购明细管理模块下对ID=2,4,6进行了删除操作','2017-08-10 14:44:30'),(256,'3于2017-08-10 14:45:32在采购明细管理模块下对ID=5进行了删除操作','2017-08-10 14:45:32'),(257,'3于2017-08-10 14:46:01在采购明细管理模块下对ID=3进行了删除操作','2017-08-10 14:46:01'),(258,'3于2017-08-10 14:47:37在供应商管理模块下对ID=7进行了申请操作','2017-08-10 14:47:37'),(259,'3于2017-08-10 14:47:52在采购明细管理模块下对ID=7进行了删除操作','2017-08-10 14:47:52'),(260,'3于2017-08-10 14:49:21在采购明细管理模块下对ID=1进行了删除操作','2017-08-10 14:49:21'),(261,'3于2017-08-10 14:54:02在采购申请管理模块下对ID=6进行了申请操作','2017-08-10 14:54:02'),(262,'3于2017-08-10 14:56:38在采购明细管理模块下对ID=8进行了申请操作','2017-08-10 14:56:38'),(263,'3于2017-08-10 14:59:53在采购申请管理模块下对ID=7进行了申请操作','2017-08-10 14:59:53'),(264,'3于2017-08-10 15:17:49在采购明细管理模块下对ID=9进行了申请操作','2017-08-10 15:17:49'),(265,'3于2017-08-10 15:18:15在采购明细管理模块下对ID=10进行了申请操作','2017-08-10 15:18:15'),(266,'3于2017-08-10 15:19:34在采购明细管理模块下对ID=11进行了申请操作','2017-08-10 15:19:34'),(267,'3于2017-08-10 15:20:03在采购明细管理模块下对ID=12进行了申请操作','2017-08-10 15:20:03'),(268,'3于2017-08-10 15:20:49在采购申请管理模块下对ID=7,6,5,4进行了删除操作','2017-08-10 15:20:49'),(269,'3于2017-08-10 15:21:18在采购申请管理模块下对ID=8进行了申请操作','2017-08-10 15:21:18'),(270,'3于2017-08-10 15:22:05在采购明细管理模块下对ID=13进行了申请操作','2017-08-10 15:22:05'),(271,'3于2017-08-10 15:45:32在功能管理模块下对ID=51进行了更新操作','2017-08-10 15:45:32');

#
# Structure for table "annual_budget"
#

DROP TABLE IF EXISTS `annual_budget`;
CREATE TABLE `annual_budget` (
  `annualBudgetID` int(11) NOT NULL AUTO_INCREMENT,
  `years` char(4) DEFAULT NULL,
  `departmentID` int(11) DEFAULT NULL,
  `feeID` int(11) DEFAULT NULL,
  `purpose` text,
  `amount` decimal(10,2) DEFAULT NULL,
  `approveAmount` decimal(10,2) DEFAULT NULL,
  `useAmount` decimal(10,2) DEFAULT NULL,
  `handlerName` int(11) DEFAULT NULL,
  `handlerDate` datetime DEFAULT NULL,
  `approver` int(11) DEFAULT NULL,
  `approveDate` datetime DEFAULT NULL,
  `type` char(1) DEFAULT NULL COMMENT '0正常，默认，1追加',
  `status` char(2) DEFAULT NULL COMMENT '“NA”申请，“OP”批准，“CL”结束',
  `remark` varchar(100) DEFAULT NULL,
  `annualBudgetCode` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`annualBudgetID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "annual_budget"
#

INSERT INTO `annual_budget` VALUES (1,'2068',8,4,'<p>888888</p>',20000.00,20000.00,NULL,4,'2017-08-05 14:33:07',3,'2017-08-05 14:33:07','0','OP','','X19603'),(2,'2000',7,4,'<p>sad</p>',100.00,5000.00,NULL,3,'2017-08-05 14:37:57',3,'2017-08-05 14:37:57','0','OP','','XP9996'),(3,'2036',9,4,'<p>3223</p>',1.00,NULL,NULL,4,'2017-08-07 09:27:30',NULL,NULL,'0','NA','',NULL),(4,'1236',8,4,'<p>1</p>',3.00,300.00,NULL,3,'2017-08-07 09:53:37',3,'2017-08-07 09:53:38','0','OP','','WX999');

#
# Structure for table "building"
#

DROP TABLE IF EXISTS `building`;
CREATE TABLE `building` (
  `buildingID` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增，主键',
  `code` varchar(20) DEFAULT NULL,
  `campusID` int(11) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `departmentID` int(11) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`buildingID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "building"
#

INSERT INTO `building` VALUES (1,'s123',1,'S楼',1,NULL,''),(2,'343',2,'343',1,NULL,''),(5,'999999',1,'666',5,'',''),(6,'shizu',3,'实验室23',1,NULL,'');

#
# Structure for table "campus"
#

DROP TABLE IF EXISTS `campus`;
CREATE TABLE `campus` (
  `campusID` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增，主键',
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`campusID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "campus"
#

INSERT INTO `campus` VALUES (1,'sju','主校区','',''),(2,'sju123','东山校区','','');

#
# Structure for table "classes"
#

DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `classesID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `campusID` int(11) DEFAULT NULL,
  `majorID` int(11) DEFAULT NULL,
  `grade` char(4) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`classesID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "classes"
#


#
# Structure for table "contract"
#

DROP TABLE IF EXISTS `contract`;
CREATE TABLE `contract` (
  `contractID` int(11) NOT NULL AUTO_INCREMENT,
  `vendorID` int(11) DEFAULT NULL COMMENT '供应商',
  `code` varchar(30) DEFAULT NULL COMMENT '合同编号',
  `title` varchar(100) DEFAULT NULL COMMENT '主题',
  `amount` decimal(10,2) DEFAULT NULL COMMENT '总金额',
  `createDate` datetime DEFAULT NULL COMMENT '签订时间',
  `deliveryTime` datetime DEFAULT NULL COMMENT '交货时间',
  `paymentType` varchar(100) DEFAULT NULL COMMENT '付款方式',
  `contractFile` varchar(100) DEFAULT NULL COMMENT '附件',
  `status` char(2) DEFAULT NULL COMMENT 'OP执行CL结束',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`contractID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='合同管理';

#
# Data for table "contract"
#


#
# Structure for table "contract_detail"
#

DROP TABLE IF EXISTS `contract_detail`;
CREATE TABLE `contract_detail` (
  `contractDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `contractID` int(11) DEFAULT NULL,
  `purchaseDetailID` int(11) DEFAULT NULL,
  `annualBudgetID` int(11) DEFAULT NULL COMMENT '经费账号',
  `purchaseCatalogueID` int(11) DEFAULT NULL COMMENT '采购目录',
  `description` varchar(200) DEFAULT NULL COMMENT '采购项目',
  `specification` varchar(400) DEFAULT NULL COMMENT '规格',
  `quantity` decimal(10,2) DEFAULT NULL COMMENT '数量',
  `unit` varchar(10) DEFAULT NULL COMMENT '单位',
  `price` decimal(10,2) DEFAULT NULL COMMENT '价格',
  `amount` decimal(10,2) DEFAULT NULL COMMENT '金额',
  `deliveryTime` datetime DEFAULT NULL COMMENT '交货时间',
  `deliveryTeacher` int(11) DEFAULT NULL COMMENT '交货经手人',
  `checkTime` datetime DEFAULT NULL COMMENT '验收时间',
  `checkTeacher` int(11) DEFAULT NULL COMMENT '验收人',
  `closeTime` datetime DEFAULT NULL COMMENT '建账时间',
  `closeTeacher` int(11) DEFAULT NULL COMMENT '建账人',
  `status` char(3) DEFAULT NULL COMMENT 'OP签约，DE交货，CL验收通过，NCL验收未通过',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`contractDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='合同明细';

#
# Data for table "contract_detail"
#


#
# Structure for table "contract_payment"
#

DROP TABLE IF EXISTS `contract_payment`;
CREATE TABLE `contract_payment` (
  `contractPaymentID` int(11) NOT NULL AUTO_INCREMENT,
  `contractID` int(11) DEFAULT NULL COMMENT '合同编号',
  `predictPaymentDate` datetime DEFAULT NULL COMMENT '预计付款时间',
  `predictAmount` decimal(10,2) DEFAULT NULL COMMENT '预计付款金额',
  `amount` decimal(10,2) DEFAULT NULL COMMENT '已付款金额',
  `status` char(2) DEFAULT NULL COMMENT 'OP执行CL结束',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`contractPaymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='合同付款管理';

#
# Data for table "contract_payment"
#


#
# Structure for table "department"
#

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `departmentID` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增，主键',
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `parentDepartmentID` int(11) DEFAULT NULL,
  `isLaboratory` char(1) DEFAULT NULL COMMENT 'Y 是，N 不是默认',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`departmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "department"
#

INSERT INTO `department` VALUES (6,'jwc123456','教务处',NULL,'N',''),(7,'jsj123','计算机学院',NULL,'N',''),(8,'jz123456','建筑学院',NULL,NULL,''),(9,'rq114053','软嵌',7,'N','');

#
# Structure for table "equipment"
#

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `equipmentID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `modell` varchar(60) DEFAULT NULL,
  `specification` varchar(60) DEFAULT NULL,
  `purchaseDate` datetime DEFAULT NULL,
  `feeSubject` varchar(20) DEFAULT NULL,
  `teacherID` int(11) DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `checkPeriod` varchar(20) DEFAULT NULL COMMENT '配置',
  `purchasePerson` varchar(60) DEFAULT NULL,
  `nation` varchar(40) DEFAULT NULL COMMENT 'XML配置',
  `sourceFrom` varchar(20) DEFAULT NULL COMMENT 'XML配置',
  `feeCode` varchar(40) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `purpose` varchar(20) DEFAULT NULL,
  `transptation` decimal(10,2) NOT NULL DEFAULT '0.00',
  `foreignPrice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `picture` varchar(60) DEFAULT NULL COMMENT '主要存放文件的URL',
  `maker` varchar(100) DEFAULT NULL,
  `makeDate` datetime DEFAULT NULL,
  `makeCode` varchar(60) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `departmentID` int(11) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `managerID` int(11) DEFAULT NULL,
  `laboratoryID` int(11) DEFAULT NULL,
  `roomID` int(11) DEFAULT NULL,
  `status` char(2) DEFAULT NULL COMMENT 'RU运行 CL报废 CR报废再利用 RP维修',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`equipmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设备管理';

#
# Data for table "equipment"
#


#
# Structure for table "equipment_maintain"
#

DROP TABLE IF EXISTS `equipment_maintain`;
CREATE TABLE `equipment_maintain` (
  `equipmentMaintainID` int(11) NOT NULL AUTO_INCREMENT,
  `equipmentID` int(11) DEFAULT NULL,
  `applier` int(11) DEFAULT NULL,
  `applyDate` datetime DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `checker` int(11) DEFAULT NULL,
  `checkDate` datetime DEFAULT NULL,
  `status` char(2) DEFAULT NULL COMMENT 'OP 维修 CL 验收',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`equipmentMaintainID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设备维修';

#
# Data for table "equipment_maintain"
#


#
# Structure for table "equipment_scrap"
#

DROP TABLE IF EXISTS `equipment_scrap`;
CREATE TABLE `equipment_scrap` (
  `equipmentScrapID` int(11) NOT NULL AUTO_INCREMENT,
  `equipmentID` int(11) DEFAULT NULL,
  `brokerage` int(11) DEFAULT NULL,
  `brokerageDate` datetime DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `status` char(2) DEFAULT NULL COMMENT 'CL报废  CR 报废再利用',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`equipmentScrapID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设备报废';

#
# Data for table "equipment_scrap"
#


#
# Structure for table "equipment_transfer"
#

DROP TABLE IF EXISTS `equipment_transfer`;
CREATE TABLE `equipment_transfer` (
  `equipmentTransferID` int(11) NOT NULL AUTO_INCREMENT,
  `equipmentID` int(11) DEFAULT NULL,
  `brokerage` int(11) DEFAULT NULL,
  `brokerageDate` datetime DEFAULT NULL,
  `oldLaboratoryID` int(11) DEFAULT NULL,
  `newLaboratoryID` int(11) DEFAULT NULL,
  `roomID` int(11) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`equipmentTransferID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='调拨';

#
# Data for table "equipment_transfer"
#


#
# Structure for table "fee"
#

DROP TABLE IF EXISTS `fee`;
CREATE TABLE `fee` (
  `feeID` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增，主键',
  `feeTypeID` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `userAmount` decimal(10,2) DEFAULT NULL,
  `teacherID` int(11) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `status` char(2) DEFAULT NULL COMMENT '''OP''批准，‘CL’结束',
  `description` varchar(400) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`feeID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='学校费用管理';

#
# Data for table "fee"
#

INSERT INTO `fee` VALUES (4,'1','器材采购',500000.00,25300.00,3,'2017-08-05 14:19:33','OP','','');

#
# Structure for table "fee_type"
#

DROP TABLE IF EXISTS `fee_type`;
CREATE TABLE `fee_type` (
  `feeTypeID` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增，主键',
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `departmentID` int(11) DEFAULT NULL,
  `teacherID` int(11) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`feeTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='经费来源类型';

#
# Data for table "fee_type"
#

INSERT INTO `fee_type` VALUES (1,'qc001','校内',6,3,'',''),(2,'jc1222','校外企业',NULL,NULL,'','');

#
# Structure for table "functions"
#

DROP TABLE IF EXISTS `functions`;
CREATE TABLE `functions` (
  `functionID` int(11) NOT NULL AUTO_INCREMENT,
  `functionCode` varchar(40) DEFAULT NULL COMMENT '编号',
  `name` varchar(255) DEFAULT NULL COMMENT '名字',
  `icon` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL COMMENT '页面路径',
  `sort` int(4) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `moduleID` int(11) DEFAULT NULL,
  PRIMARY KEY (`functionID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

#
# Data for table "functions"
#

INSERT INTO `functions` VALUES (1,'001003001','用户维护','fa fa-user','/right/user/index',10,NULL,1),(2,'001003002','角色维护','fa fa-users','/right/role/index',20,NULL,1),(3,'001003003','模块维护','fa fa-list-ul','/right/module/index',30,NULL,1),(4,'001003004','功能维护','fa fa-tags','/right/functions/index',40,NULL,1),(5,'001','权限配置',' fa fa-link','/right/config/index',50,'',1),(6,'001004001','日志查看','fa fa-file-text','/log/log/index',4001,'',2),(23,'001005008','教师信息','','/basicinfo/teacher/index',5008,'',10),(24,'001005001','学校信息','','/basicinfo/school/index',5001,'',10),(25,'001005009','学生信息','','/basicinfo/student/index',5009,'',10),(26,'001005003','实验场地信息','','/basicinfo/building/index',5003,'',10),(27,'001005004','实验室信息','','/basicinfo/room/index',5004,'',10),(28,'001005006','专业信息','','/basicinfo/major/index',5006,'',10),(29,'001005005','部门信息','','/basicinfo/department/index',5005,'',10),(30,'001005008','班级信息','','/basicinfo/classes/index',5008,'',10),(31,'001005002','校区信息','','/basicinfo/campus/index',5002,'',10),(32,'001006001','经费类型管理','','/budget/fee-type/index',6001,'',13),(33,'001006002','学校经费管理','','/budget/school-fees/index',6002,'',13),(34,'001006003','年度预算管理','','/budget/annual-budget/index',6003,'',13),(35,'001006004','预算申请','','/budget/my-annual-budget/index',6004,'',13),(36,'001006005','经费分析图表','','/analysis/budget-analysis/index',6005,'',13),(37,'001007001','实验室审核','','/laboratory/lab/index',7001,'',14),(38,'001007002','实验室申报','','/laboratory/my-lab/index',7002,'',14),(41,'001007003','实验室资源管理','','/laboratory/lab-resources/index',7003,'',14),(42,'001008001','实验室设备基本信息管理','','/equipment/equip/index',8001,'',15),(43,'001008003','设备维修管理','','/equipment/equip-maintain/index',8003,'',15),(44,'001008004','设备调拨管理','','/equipment/equip-transfer/index',8004,'',15),(45,'001008005','设备报废管理','','/equipment/equip-scrap/index',8005,'',15),(46,'001009001','供应商管理','','/purchase/vendor/index',9001,'',16),(47,'001009002','物资采购目录管理','','/purchase/purchase-catalogue/index',9002,'',16),(48,'001009003','物资采购申请','','/purchase/my-purchase/index',9003,'',16),(49,'001009004','采购审批','','/purchase/purchase/index',9004,'',16),(50,'001009005','物资采购明细总览','','/purchase/purchase-detail/index',9005,'',16),(51,'001007004','实验室验收','','/laboratory/lab-tea/index',7004,'',14),(52,'001008002','申请维修设备','','/equipment/equip-apply/index',8002,'',15);

#
# Structure for table "laboratory"
#

DROP TABLE IF EXISTS `laboratory`;
CREATE TABLE `laboratory` (
  `laboratoryID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `manager` int(11) DEFAULT NULL COMMENT '教师ID',
  `type` char(1) DEFAULT NULL COMMENT '教学、科研、其他',
  `laboratoryCategoryID` int(11) DEFAULT NULL,
  `departmentID` int(11) DEFAULT NULL,
  `schoolType` varchar(20) DEFAULT NULL COMMENT '配置XML解决',
  `createDate` varchar(20) DEFAULT NULL,
  `approveDate` datetime DEFAULT NULL,
  `buildDate` datetime DEFAULT NULL,
  `URL` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `status` char(2) DEFAULT NULL COMMENT '''NA'' ''OP'' ''RU'' ''CL''',
  `remark` varchar(100) DEFAULT NULL,
  `approveName` varchar(40) DEFAULT NULL,
  `handerName` varchar(40) DEFAULT NULL,
  `checkName` int(11) DEFAULT NULL,
  PRIMARY KEY (`laboratoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='实验室';

#
# Data for table "laboratory"
#


#
# Structure for table "laboratory_category"
#

DROP TABLE IF EXISTS `laboratory_category`;
CREATE TABLE `laboratory_category` (
  `laboratoryCategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`laboratoryCategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='实验室类别';

#
# Data for table "laboratory_category"
#


#
# Structure for table "laboratory_course"
#

DROP TABLE IF EXISTS `laboratory_course`;
CREATE TABLE `laboratory_course` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='实验室课程（预留）';

#
# Data for table "laboratory_course"
#


#
# Structure for table "laboratory_equipment"
#

DROP TABLE IF EXISTS `laboratory_equipment`;
CREATE TABLE `laboratory_equipment` (
  `laboratoryEquipmentID` int(11) NOT NULL AUTO_INCREMENT,
  `laboratoryID` int(11) DEFAULT NULL,
  `equipment` int(11) DEFAULT NULL,
  `teacherID` int(11) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`laboratoryEquipmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "laboratory_equipment"
#


#
# Structure for table "laboratory_room"
#

DROP TABLE IF EXISTS `laboratory_room`;
CREATE TABLE `laboratory_room` (
  `laboratoryRoomID` int(11) NOT NULL AUTO_INCREMENT,
  `laboratoryID` int(11) DEFAULT NULL,
  `roomID` int(11) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`laboratoryRoomID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='实验室场地';

#
# Data for table "laboratory_room"
#


#
# Structure for table "laboratory_teacher"
#

DROP TABLE IF EXISTS `laboratory_teacher`;
CREATE TABLE `laboratory_teacher` (
  `laboratoryTeacherID` int(11) NOT NULL AUTO_INCREMENT,
  `laboratoryID` int(11) DEFAULT NULL,
  `teacherID` int(11) DEFAULT NULL,
  `type` char(1) DEFAULT NULL COMMENT '0专职 1 兼职',
  `position` varchar(20) DEFAULT NULL COMMENT 'XML配置',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`laboratoryTeacherID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "laboratory_teacher"
#


#
# Structure for table "major"
#

DROP TABLE IF EXISTS `major`;
CREATE TABLE `major` (
  `majorID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `englishName` varchar(40) DEFAULT NULL,
  `departmentID` int(11) DEFAULT NULL,
  `type` char(1) DEFAULT NULL COMMENT '1博士、2硕士、3本科、4大专、5其他',
  `discipline` char(2) DEFAULT NULL,
  `isEnroll` char(1) DEFAULT NULL COMMENT 'Y是默认，N不招',
  `description` varchar(600) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`majorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "major"
#


#
# Structure for table "module_function"
#

DROP TABLE IF EXISTS `module_function`;
CREATE TABLE `module_function` (
  `moduleFunctionID` int(11) NOT NULL AUTO_INCREMENT,
  `moduleID` int(11) DEFAULT NULL,
  `functionID` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`moduleFunctionID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

#
# Data for table "module_function"
#

/*!40000 ALTER TABLE `module_function` DISABLE KEYS */;
INSERT INTO `module_function` VALUES (1,1,1,NULL),(2,1,2,NULL),(3,2,3,NULL),(4,2,4,NULL),(5,3,5,NULL),(6,3,6,NULL),(7,3,7,NULL),(8,3,8,NULL),(9,3,9,NULL),(10,3,10,NULL),(11,3,11,NULL),(12,3,12,NULL),(13,4,13,NULL);
/*!40000 ALTER TABLE `module_function` ENABLE KEYS */;

#
# Structure for table "modules"
#

DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `moduleID` int(11) NOT NULL AUTO_INCREMENT,
  `moduleCode` varchar(40) DEFAULT NULL COMMENT '编号',
  `name` varchar(255) DEFAULT NULL COMMENT '名字',
  `sort` int(4) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`moduleID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

#
# Data for table "modules"
#

INSERT INTO `modules` VALUES (1,'001003','权限管理',1003,''),(2,'001004','日志管理',1004,''),(10,'001005','基础信息管理',1005,''),(13,'001006','经费管理',1006,''),(14,'001007','实验室管理',1007,''),(15,'001008','仪器设备管理',1008,''),(16,'001009','采购管理',1009,'');

#
# Structure for table "purchase"
#

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `purchaseID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL COMMENT '主题',
  `departmentID` int(11) DEFAULT NULL COMMENT '部门编号',
  `teacherID` int(11) DEFAULT NULL COMMENT '采购联系人',
  `createDate` datetime DEFAULT NULL COMMENT '申请时间',
  `status` char(2) DEFAULT NULL COMMENT 'NA初始，PR批准，OP执行，CL验收通过',
  `purchaseFile` varchar(200) DEFAULT NULL COMMENT '采购文件',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`purchaseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='采购申请';

#
# Data for table "purchase"
#


#
# Structure for table "purchase_catalogue"
#

DROP TABLE IF EXISTS `purchase_catalogue`;
CREATE TABLE `purchase_catalogue` (
  `purchaseCatalogueID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `parentCode` varchar(100) DEFAULT NULL COMMENT '父类编号',
  `name` varchar(100) DEFAULT NULL COMMENT '名称',
  `description` varchar(200) DEFAULT NULL,
  `type` varchar(40) DEFAULT NULL COMMENT '采购类型  XML配置',
  `isCollection` char(1) DEFAULT NULL COMMENT '是否汇总  0汇总  1 不汇总',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`purchaseCatalogueID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='采购目录';

#
# Data for table "purchase_catalogue"
#

INSERT INTO `purchase_catalogue` VALUES (12,'01',NULL,'电脑','','1','1',''),(13,'0102','01','笔记本电脑','','1','1',''),(14,'02',NULL,'桌子','','1','1',''),(16,'0103','01','台式说的是','','1','1',''),(17,'0201','02','办公桌','','1','1',''),(30,'020101','0201','高桌','','1','1',''),(32,'01020301','0103','66','','1','1','');

#
# Structure for table "purchase_detail"
#

DROP TABLE IF EXISTS `purchase_detail`;
CREATE TABLE `purchase_detail` (
  `purchaseDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `purchaseID` int(11) NOT NULL DEFAULT '0' COMMENT '外键',
  `annualBudgetID` int(11) DEFAULT NULL COMMENT '经费账号',
  `purchaseCatalogueID` int(11) DEFAULT NULL COMMENT '采购目录',
  `description` varchar(200) DEFAULT NULL COMMENT '采购项目',
  `specification` varchar(400) DEFAULT NULL COMMENT '规格',
  `quantity` decimal(10,2) DEFAULT NULL COMMENT '数量',
  `unit` varchar(10) DEFAULT NULL COMMENT '单位',
  `price` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL COMMENT '金额',
  `status` char(3) DEFAULT NULL COMMENT 'NA初始，PR批准，OP签约，CL验收通过，NCL验收未通过',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`purchaseDetailID`),
  KEY `FK_f_ID` (`purchaseID`),
  CONSTRAINT `FK_f_ID` FOREIGN KEY (`purchaseID`) REFERENCES `purchase` (`purchaseID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='采购申请明细';

#
# Data for table "purchase_detail"
#


#
# Structure for table "role_function"
#

DROP TABLE IF EXISTS `role_function`;
CREATE TABLE `role_function` (
  `roleFunctionID` int(11) NOT NULL AUTO_INCREMENT,
  `functionID` int(11) NOT NULL,
  `roleID` int(11) DEFAULT NULL,
  `addFun` char(1) DEFAULT NULL,
  `modifyFun` char(1) DEFAULT NULL,
  `deleteFun` char(1) DEFAULT NULL,
  `queryFun` char(1) DEFAULT NULL,
  `importFun` char(1) DEFAULT NULL,
  `exportFun` char(1) DEFAULT NULL,
  `printFun` char(1) DEFAULT NULL,
  `otherFun1` char(1) DEFAULT NULL,
  `otherFun2` char(1) DEFAULT NULL,
  `otherFun3` char(1) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`roleFunctionID`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

#
# Data for table "role_function"
#

INSERT INTO `role_function` VALUES (1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,1,1,'1','1','1','0','1','0','0','0','0','0',NULL),(27,2,1,'1','1','1','0','1','1','0','0','0','0',NULL),(28,3,1,'1','1','1','0','1','1','0','0','0','0',NULL),(29,4,1,'1','1','1','0','1','1','0','0','0','0',NULL),(30,6,1,'0','0','0','0','0','0','0','0','0','0',NULL),(34,23,1,'1','1','1','0','0','0','0','0','0','0',NULL),(35,24,1,'1','1','1','0','1','1','0','0','0','0',NULL),(36,25,1,'1','1','1','0','0','0','0','0','0','0',NULL),(37,26,1,'1','1','1','0','0','0','0','0','0','0',NULL),(38,27,1,'1','1','1','0','0','0','0','0','0','0',NULL),(39,28,1,'1','1','1','0','0','0','0','0','0','0',NULL),(40,29,1,'1','1','1','0','0','0','0','0','0','0',NULL),(41,30,1,'1','1','1','0','0','0','0','0','0','0',NULL),(42,31,1,'1','1','1','0','0','0','0','0','0','0',NULL),(46,34,1,'1','1','1','0','0','0','0','0','0','0',NULL),(47,33,1,'1','1','1','0','0','0','0','0','0','0',NULL),(49,32,1,'1','1','1','0','0','0','0','0','0','0',NULL),(50,35,1,'1','1','1','0','0','0','0','0','0','0',NULL),(51,36,1,'0','0','0','0','0','0','0','0','0','0',NULL),(52,36,6,'0','0','0','0','0','0','0','0','0','0',NULL),(53,34,6,'0','1','0','0','0','0','0','0','0','0',NULL),(54,33,6,'1','1','1','0','0','0','0','0','0','0',NULL),(55,32,6,'0','0','0','0','0','0','0','0','0','0',NULL),(56,31,6,'0','0','0','0','0','0','0','0','0','0',NULL),(57,30,6,'0','0','0','0','0','0','0','0','0','0',NULL),(58,29,6,'0','0','0','0','0','0','0','0','0','0',NULL),(59,28,6,'0','0','0','0','0','0','0','0','0','0',NULL),(60,27,6,'0','0','0','0','0','0','0','0','0','0',NULL),(61,26,6,'0','0','0','0','0','0','0','0','0','0',NULL),(62,25,6,'0','0','0','0','0','0','0','0','0','0',NULL),(63,24,6,'0','0','0','0','0','0','0','0','0','0',NULL),(64,23,6,'0','0','0','0','0','0','0','0','0','0',NULL),(65,36,7,'0','0','0','0','0','0','0','0','0','0',NULL),(66,35,7,'1','1','1','0','0','0','0','0','0','0',NULL),(67,34,7,'0','0','0','0','0','0','0','0','0','0',NULL),(68,33,7,'0','0','0','0','0','0','0','0','0','0',NULL),(69,32,7,'0','0','0','0','0','0','0','0','0','0',NULL),(70,31,7,'0','0','0','0','0','0','0','0','0','0',NULL),(71,30,7,'0','0','0','0','0','0','0','0','0','0',NULL),(72,29,7,'0','0','0','0','0','0','0','0','0','0',NULL),(73,28,7,'0','0','0','0','0','0','0','0','0','0',NULL),(74,27,7,'0','0','0','0','0','0','0','0','0','0',NULL),(75,26,7,'0','0','0','0','0','0','0','0','0','0',NULL),(76,25,7,'0','0','0','0','0','0','0','0','0','0',NULL),(77,24,7,'0','0','0','0','0','0','0','0','0','0',NULL),(78,23,7,'0','0','0','0','0','0','0','0','0','0',NULL),(79,45,1,'0','0','0','0','0','0','0','0','0','0',NULL),(80,44,1,'0','0','0','0','0','0','0','0','0','0',NULL),(81,43,1,'0','0','0','0','0','0','0','0','0','0',NULL),(82,42,1,'0','0','0','0','0','0','0','0','0','0',NULL),(83,41,1,'0','0','0','0','0','0','0','0','0','0',NULL),(84,38,1,'0','0','0','0','0','0','0','0','0','0',NULL),(85,37,1,'0','0','0','0','0','0','0','0','0','0',NULL),(86,49,1,'1','1','1','0','0','0','0','0','0','0',NULL),(87,48,1,'1','1','1','0','0','0','0','0','0','0',NULL),(88,47,1,'1','1','1','0','0','0','0','0','0','0',NULL),(89,46,1,'1','1','1','0','0','0','0','0','0','0',NULL),(90,50,1,'1','1','1','0','0','0','0','0','0','0',NULL),(91,51,1,'0','0','0','0','0','0','0','0','0','0',NULL),(92,52,1,'0','0','0','0','0','0','0','0','0','0',NULL);

#
# Structure for table "roles"
#

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `roleID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `roleCode` varchar(40) NOT NULL COMMENT '编号',
  `sort` int(4) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT '名字',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`roleID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "roles"
#

INSERT INTO `roles` VALUES (1,'001',NULL,'超级管理员','所有权限'),(6,'sp001',NULL,'审批人',''),(7,'sq001',NULL,'申请人','');

#
# Structure for table "room"
#

DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `roomID` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增，主键',
  `code` varchar(20) DEFAULT NULL,
  `buildingID` int(11) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `departmentID` int(11) DEFAULT NULL,
  `type` char(2) DEFAULT NULL,
  `teacherID` int(11) DEFAULT NULL,
  `useArea` decimal(8,2) DEFAULT '0.00',
  `buildingArea` decimal(8,2) DEFAULT NULL,
  `galleryful` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL COMMENT 'Y在用 默认',
  `application` varchar(200) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`roomID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "room"
#


#
# Structure for table "school"
#

DROP TABLE IF EXISTS `school`;
CREATE TABLE `school` (
  `schoolID` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增，主键',
  `remark` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`schoolID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='学校基本信息';

#
# Data for table "school"
#

INSERT INTO `school` VALUES (2,'','三江'),(3,'','三江01');

#
# Structure for table "sex"
#

DROP TABLE IF EXISTS `sex`;
CREATE TABLE `sex` (
  `studentID` int(11) NOT NULL DEFAULT '0',
  `code` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `sex` char(2) DEFAULT NULL COMMENT '1男2女0未知',
  `classsesID` int(11) DEFAULT NULL,
  `type` char(1) DEFAULT NULL COMMENT '1博士、2硕士、3本科、4大专、5其他',
  `status` char(1) DEFAULT NULL COMMENT '1在读2、休学3毕业',
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  KEY `studentID` (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "sex"
#


#
# Structure for table "student"
#

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `studentID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `sex` char(2) DEFAULT NULL COMMENT '1男2女0未知',
  `classesID` int(11) DEFAULT NULL,
  `type` char(1) DEFAULT NULL COMMENT '1博士、2硕士、3本科、4大专、5其他',
  `status` char(1) DEFAULT NULL COMMENT '1在读2、休学3毕业',
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "student"
#

INSERT INTO `student` VALUES (1,'12014053036','','周宏伟','1',1,'1','1','','','');

#
# Structure for table "teacher"
#

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `teacherID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `sex` char(2) DEFAULT NULL COMMENT '1男2女0未知',
  `departmentID` int(11) DEFAULT NULL,
  `title` char(3) DEFAULT NULL,
  `titleDate` datetime DEFAULT NULL,
  `status` char(3) DEFAULT NULL,
  `background` char(2) DEFAULT NULL,
  `degree` char(1) DEFAULT NULL COMMENT '1博士2硕士3本科4其他',
  `backgroundDate` datetime DEFAULT NULL,
  `backgroundSchool` varchar(40) DEFAULT NULL,
  `workDate` datetime DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`teacherID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "teacher"
#

INSERT INTO `teacher` VALUES (3,'56546','张三','1',6,'555',NULL,'','','2',NULL,'',NULL,''),(4,'888','李四','1',7,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,''),(5,'99','王五','2',9,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'');

#
# Structure for table "teacher_achievement"
#

DROP TABLE IF EXISTS `teacher_achievement`;
CREATE TABLE `teacher_achievement` (
  `teacherAchievementID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `laboratoryID` int(11) DEFAULT NULL,
  `achieveDate` datetime DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`teacherAchievementID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='教师成果';

#
# Data for table "teacher_achievement"
#


#
# Structure for table "teacherid"
#

DROP TABLE IF EXISTS `teacherid`;
CREATE TABLE `teacherid` (
  `classesID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `campusID` int(11) DEFAULT NULL,
  `majorID` int(11) DEFAULT NULL,
  `grade` char(4) DEFAULT NULL COMMENT '1:大一，2：大二，3：大三，4：大四，5：大五，0：其他',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`classesID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "teacherid"
#

INSERT INTO `teacherid` VALUES (1,'01','zzz',1,1,'1','1'),(3,'04','052',120140520,2,'2',''),(11,'03','asd',12014,2,'1','');

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `userCode` varchar(40) NOT NULL COMMENT '编号',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `name` int(11) DEFAULT NULL COMMENT '姓名',
  `remark` varchar(100) DEFAULT NULL COMMENT '备注',
  `auth_key` varchar(32) DEFAULT NULL,
  `currentModule` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'10001','$2y$13$2FiAG.GMdyDnueablY6iTuGn5l1sXRsYPnDQhOodKoelkeESS3x.S',3,NULL,NULL,1),(15,'zhw001','$2y$13$VkaBg7E1fGs4dKUrcGh9YOjUETXzThscVAutYN9VEI7W2lY4sH8ke',3,'',NULL,13),(16,'zhw002','$2y$13$Xzq62Xb1eDG4efzsktxAUedBjvMlBy9lezFWjFCuPmJHyxyPAc7zO',4,'',NULL,13);

#
# Structure for table "user_function"
#

DROP TABLE IF EXISTS `user_function`;
CREATE TABLE `user_function` (
  `userFunctionID` int(11) NOT NULL AUTO_INCREMENT,
  `functionID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `addFun` char(1) DEFAULT NULL,
  `modifyFun` char(1) DEFAULT NULL,
  `deleteFun` char(1) DEFAULT NULL,
  `queryFun` char(1) DEFAULT NULL,
  `importFun` char(1) DEFAULT NULL,
  `exportFun` char(1) DEFAULT NULL,
  `printFun` char(1) DEFAULT NULL,
  `otherFun1` char(1) DEFAULT NULL,
  `otherFun2` char(1) DEFAULT NULL,
  `otherFun3` char(1) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userFunctionID`)
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8;

#
# Data for table "user_function"
#

INSERT INTO `user_function` VALUES (1,5,1,'1','0','1','1','0','0','0',NULL,NULL,NULL,NULL),(67,1,1,'1','1','1','0','1','0','0','0','0','0',NULL),(68,2,1,'1','1','1','0','1','1','0','0','0','0',NULL),(69,3,1,'1','1','1','0','1','1','0','0','0','0',NULL),(70,4,1,'1','1','1','0','1','1','0','0','0','0',NULL),(71,6,1,'0','0','0','0','0','0','0','0','0','0',NULL),(87,23,1,'1','1','1','0','0','0','0','0','0','0',NULL),(89,24,1,'1','1','1','0','1','1','0','0','0','0',NULL),(91,25,1,'1','1','1','0','0','0','0','0','0','0',NULL),(93,26,1,'1','1','1','0','0','0','0','0','0','0',NULL),(95,27,1,'1','1','1','0','0','0','0','0','0','0',NULL),(97,28,1,'1','1','1','0','0','0','0','0','0','0',NULL),(99,29,1,'1','1','1','0','0','0','0','0','0','0',NULL),(101,30,1,'1','1','1','0','0','0','0','0','0','0',NULL),(103,31,1,'1','1','1','0','0','0','0','0','0','0',NULL),(108,34,1,'1','1','1','0','0','0','0','0','0','0',NULL),(109,33,1,'1','1','1','0','0','0','0','0','0','0',NULL),(111,32,1,'1','1','1','0','0','0','0','0','0','0',NULL),(112,35,1,'1','1','1','0','0','0','0','0','0','0',NULL),(113,36,1,'0','0','0','0','0','0','0','0','0','0',NULL),(114,36,15,'0','0','0','0','0','0','0','0','0','0',NULL),(115,34,15,'0','1','0','0','0','0','0','0','0','0',NULL),(116,33,15,'1','1','1','0','0','0','0','0','0','0',NULL),(117,32,15,'0','0','0','0','0','0','0','0','0','0',NULL),(118,31,15,'0','0','0','0','0','0','0','0','0','0',NULL),(119,30,15,'0','0','0','0','0','0','0','0','0','0',NULL),(120,29,15,'0','0','0','0','0','0','0','0','0','0',NULL),(121,28,15,'0','0','0','0','0','0','0','0','0','0',NULL),(122,27,15,'0','0','0','0','0','0','0','0','0','0',NULL),(123,26,15,'0','0','0','0','0','0','0','0','0','0',NULL),(124,25,15,'0','0','0','0','0','0','0','0','0','0',NULL),(125,24,15,'0','0','0','0','0','0','0','0','0','0',NULL),(126,23,15,'0','0','0','0','0','0','0','0','0','0',NULL),(127,36,16,'0','0','0','0','0','0','0','0','0','0',NULL),(128,35,16,'1','1','1','0','0','0','0','0','0','0',NULL),(129,34,16,'0','0','0','0','0','0','0','0','0','0',NULL),(130,33,16,'0','0','0','0','0','0','0','0','0','0',NULL),(131,32,16,'0','0','0','0','0','0','0','0','0','0',NULL),(132,31,16,'0','0','0','0','0','0','0','0','0','0',NULL),(133,30,16,'0','0','0','0','0','0','0','0','0','0',NULL),(134,29,16,'0','0','0','0','0','0','0','0','0','0',NULL),(135,28,16,'0','0','0','0','0','0','0','0','0','0',NULL),(136,27,16,'0','0','0','0','0','0','0','0','0','0',NULL),(137,26,16,'0','0','0','0','0','0','0','0','0','0',NULL),(138,25,16,'0','0','0','0','0','0','0','0','0','0',NULL),(139,24,16,'0','0','0','0','0','0','0','0','0','0',NULL),(140,23,16,'0','0','0','0','0','0','0','0','0','0',NULL),(141,45,1,'0','0','0','0','0','0','0','0','0','0',NULL),(142,44,1,'0','0','0','0','0','0','0','0','0','0',NULL),(143,43,1,'0','0','0','0','0','0','0','0','0','0',NULL),(144,42,1,'0','0','0','0','0','0','0','0','0','0',NULL),(145,41,1,'0','0','0','0','0','0','0','0','0','0',NULL),(146,38,1,'0','0','0','0','0','0','0','0','0','0',NULL),(147,37,1,'0','0','0','0','0','0','0','0','0','0',NULL),(148,49,1,'1','1','1','0','0','0','0','0','0','0',NULL),(149,48,1,'1','1','1','0','0','0','0','0','0','0',NULL),(150,47,1,'1','1','1','0','0','0','0','0','0','0',NULL),(151,46,1,'1','1','1','0','0','0','0','0','0','0',NULL),(152,50,1,'1','1','1','0','0','0','0','0','0','0',NULL),(153,51,1,'0','0','0','0','0','0','0','0','0','0',NULL),(154,52,1,'0','0','0','0','0','0','0','0','0','0',NULL);

#
# Structure for table "user_laboratory"
#

DROP TABLE IF EXISTS `user_laboratory`;
CREATE TABLE `user_laboratory` (
  `userModuleID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `laboratoryID` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userModuleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "user_laboratory"
#


#
# Structure for table "user_module"
#

DROP TABLE IF EXISTS `user_module`;
CREATE TABLE `user_module` (
  `userModuleID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `moduleID` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userModuleID`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

#
# Data for table "user_module"
#

INSERT INTO `user_module` VALUES (1,1,1,NULL),(7,1,1,NULL),(8,1,1,NULL),(9,1,1,NULL),(10,1,1,NULL),(11,1,2,NULL),(12,13,1,NULL),(13,13,1,NULL),(14,13,1,NULL),(15,13,1,NULL),(16,13,1,NULL),(17,13,2,NULL),(18,14,1,NULL),(19,14,1,NULL),(20,14,1,NULL),(21,14,1,NULL),(22,14,1,NULL),(23,14,2,NULL),(24,14,1,NULL),(25,14,1,NULL),(26,14,2,NULL),(27,1,10,NULL),(28,13,10,NULL),(29,1,10,NULL),(30,13,10,NULL),(31,1,10,NULL),(32,13,10,NULL),(33,1,10,NULL),(34,13,10,NULL),(35,1,10,NULL),(36,13,10,NULL),(37,1,10,NULL),(38,13,10,NULL),(39,1,10,NULL),(40,13,10,NULL),(41,1,10,NULL),(42,13,10,NULL),(43,1,1,NULL),(44,13,1,NULL),(45,1,13,NULL),(46,1,13,NULL),(47,1,13,NULL),(48,1,13,NULL),(49,1,13,NULL),(50,1,13,NULL),(51,1,13,NULL),(52,1,13,NULL),(53,1,13,NULL),(54,15,13,NULL),(55,15,13,NULL),(56,15,13,NULL),(57,15,13,NULL),(58,15,10,NULL),(59,15,10,NULL),(60,15,10,NULL),(61,15,10,NULL),(62,15,10,NULL),(63,15,10,NULL),(64,15,10,NULL),(65,15,10,NULL),(66,15,10,NULL),(67,16,13,NULL),(68,16,13,NULL),(69,16,13,NULL),(70,16,13,NULL),(71,16,13,NULL),(72,16,10,NULL),(73,16,10,NULL),(74,16,10,NULL),(75,16,10,NULL),(76,16,10,NULL),(77,16,10,NULL),(78,16,10,NULL),(79,16,10,NULL),(80,16,10,NULL),(81,1,15,NULL),(82,1,15,NULL),(83,1,15,NULL),(84,1,15,NULL),(85,1,14,NULL),(86,1,14,NULL),(87,1,14,NULL),(88,1,16,NULL),(89,1,16,NULL),(90,1,16,NULL),(91,1,16,NULL),(92,1,16,NULL),(93,1,14,NULL),(94,1,15,NULL);

#
# Structure for table "user_role"
#

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `userRoleID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`userRoleID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "user_role"
#

INSERT INTO `user_role` VALUES (1,1,1,NULL),(2,15,6,NULL),(3,16,7,NULL);

#
# Structure for table "vendor"
#

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE `vendor` (
  `vendorID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL COMMENT '编码',
  `password` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL COMMENT '名称',
  `address` varchar(200) DEFAULT NULL,
  `contacts` varchar(100) DEFAULT NULL COMMENT '联系人',
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL COMMENT '传真',
  `depositBank` varchar(40) DEFAULT NULL COMMENT '开户银行',
  `bankNumber` varchar(40) DEFAULT NULL COMMENT '银行账号',
  `licenseNumber` varchar(40) DEFAULT NULL COMMENT '营业执照编号',
  `website` varchar(40) DEFAULT NULL COMMENT '主页',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`vendorID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='供应商管理';

#
# Data for table "vendor"
#

INSERT INTO `vendor` VALUES (2,'sj3332','12345689','联想',NULL,'乐扣','193256@163.com','1965833223','999999','','','','','');

#
# Structure for table "yii2_city"
#

DROP TABLE IF EXISTS `yii2_city`;
CREATE TABLE `yii2_city` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `name` varchar(120) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=3410 DEFAULT CHARSET=utf8;

#
# Data for table "yii2_city"
#

/*!40000 ALTER TABLE `yii2_city` DISABLE KEYS */;
/*!40000 ALTER TABLE `yii2_city` ENABLE KEYS */;
