# Host: localhost  (Version: 5.5.47)
# Date: 2017-05-19 16:36:14
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
) ENGINE=MyISAM AUTO_INCREMENT=283 DEFAULT CHARSET=utf8;

#
# Data for table "act_log"
#

/*!40000 ALTER TABLE `act_log` DISABLE KEYS */;
INSERT INTO `act_log` VALUES (90,'10001于2017-05-06 13:54:29在用户角色配置模块下对ID=1,2,3,4,6进行了角色功能添加操作','2017-05-06 13:54:29'),(91,'10001于2017-05-06 13:56:23在角色管理模块下对ID=5进行了创建操作','2017-05-06 13:56:23'),(92,'10001于2017-05-08 08:57:34在模块管理模块下对ID=7进行了创建操作','2017-05-08 08:57:34'),(93,'10001于2017-05-08 08:59:39在模块管理模块下对ID=7进行了更新操作','2017-05-08 08:59:39'),(94,'10001于2017-05-08 09:01:20在功能管理模块下对ID=22进行了创建操作','2017-05-08 09:01:20'),(95,'10001于2017-05-08 09:01:35在功能管理模块下对ID=22进行了删除操作','2017-05-08 09:01:35'),(96,'10001于2017-05-08 09:02:26在模块管理模块下对ID=7进行了删除操作','2017-05-08 09:02:26'),(97,'10001于2017-05-09 14:02:41在人员管理模块下对ID=13进行了创建操作','2017-05-09 14:02:41'),(98,'10001于2017-05-09 14:03:28在人员管理模块下对ID=14进行了创建操作','2017-05-09 14:03:28'),(99,'10001于2017-05-09 14:04:28在人员管理模块下对ID=13进行了更新操作','2017-05-09 14:04:28'),(100,'10001于2017-05-09 14:12:58在角色管理模块下对ID=6进行了创建操作','2017-05-09 14:12:58'),(101,'10001于2017-05-09 14:13:18在角色管理模块下对ID=7进行了创建操作','2017-05-09 14:13:18'),(102,'10001于2017-05-09 14:14:52在角色管理模块下对ID=8进行了创建操作','2017-05-09 14:14:52'),(103,'10001于2017-05-09 14:15:08在角色管理模块下对ID=7,8进行了删除操作','2017-05-09 14:15:08'),(104,'10001于2017-05-09 14:29:04在用户角色配置模块下对ID=13,14进行了角色人员添加操作','2017-05-09 14:29:04'),(105,'10001于2017-05-09 14:29:56在用户角色配置模块下对ID=14进行了角色人员添加操作','2017-05-09 14:29:56'),(106,'10001于2017-05-09 14:32:54在用户角色配置模块下对ID=28进行了删除操作','2017-05-09 14:32:54'),(107,'10001于2017-05-09 14:34:43在用户角色配置模块下对ID=1,4,6进行了角色功能添加操作','2017-05-09 14:34:43'),(108,'10001于2017-05-09 14:45:03在人员管理模块下对ID=15进行了创建操作','2017-05-09 14:45:03'),(109,'10001于2017-05-09 14:45:33在人员管理模块下对ID=15进行了删除操作','2017-05-09 14:45:33'),(110,'10001于2017-05-09 14:47:46在人员管理模块下对ID=13进行了更新操作','2017-05-09 14:47:46'),(111,'10001于2017-05-09 14:49:12在人员管理模块下对ID=13进行了更新操作','2017-05-09 14:49:12'),(112,'10001于2017-05-10 08:41:10在人员管理模块下对ID=16进行了创建操作','2017-05-10 08:41:10'),(113,'10001于2017-05-10 08:44:03在角色管理模块下对ID=9进行了创建操作','2017-05-10 08:44:03'),(114,'10001于2017-05-10 09:10:18在人员管理模块下对ID=16进行了删除操作','2017-05-10 09:10:18'),(115,'10001于2017-05-10 09:12:46在人员管理模块下对ID=17进行了创建操作','2017-05-10 09:12:46'),(116,'10001于2017-05-10 09:14:14在人员管理模块下对ID=17进行了删除操作','2017-05-10 09:14:14'),(117,'10001于2017-05-10 09:14:33在人员管理模块下对ID=18进行了创建操作','2017-05-10 09:14:33'),(118,'10001于2017-05-10 09:24:50在模块管理模块下对ID=8进行了创建操作','2017-05-10 09:24:50'),(119,'10001于2017-05-10 09:25:20在模块管理模块下对ID=8进行了删除操作','2017-05-10 09:25:20'),(120,'10001于2017-05-10 09:25:31在模块管理模块下对ID=9进行了创建操作','2017-05-10 09:25:31'),(121,'10001于2017-05-10 09:36:54在人员管理模块下对ID=19进行了创建操作','2017-05-10 09:36:54'),(122,'10001于2017-05-10 09:39:09在人员管理模块下对ID=14进行了更新操作','2017-05-10 09:39:09'),(123,'10001于2017-05-10 09:44:14在人员管理模块下对ID=13进行了更新操作','2017-05-10 09:44:14'),(124,'10001于2017-05-10 14:18:34在模块管理模块下对ID=9进行了删除操作','2017-05-10 14:18:34'),(125,'10001于2017-05-10 15:21:55在人员管理模块下对ID=19进行了删除操作','2017-05-10 15:21:55'),(126,'10001于2017-05-10 15:29:08在人员管理模块下对ID=18进行了删除操作','2017-05-10 15:29:08'),(127,'10001于2017-05-10 16:34:44在人员管理模块下对ID=20进行了创建操作','2017-05-10 16:34:44'),(128,'10001于2017-05-10 16:34:58在人员管理模块下对ID=20进行了删除操作','2017-05-10 16:34:58'),(129,'10001于2017-05-10 17:15:28在人员管理模块下对ID=21进行了创建操作','2017-05-10 17:15:28'),(130,'10001于2017-05-10 17:46:32在人员管理模块下对ID=21进行了删除操作','2017-05-10 17:46:32'),(131,'10001于2017-05-10 18:56:28在模块管理模块下对ID=10进行了创建操作','2017-05-10 18:56:28'),(132,'10001于2017-05-10 18:56:51在模块管理模块下对ID=10进行了更新操作','2017-05-10 18:56:51'),(133,'10001于2017-05-10 18:59:25在功能管理模块下对ID=23进行了创建操作','2017-05-10 18:59:25'),(134,'10001于2017-05-10 19:00:09在用户功能配置模块下对ID=23进行了角色功能添加操作','2017-05-10 19:00:09'),(135,'10001于2017-05-10 19:24:32在功能管理模块下对ID=23进行了更新操作','2017-05-10 19:24:32'),(136,'10001于2017-05-10 19:28:18在功能管理模块下对ID=23进行了更新操作','2017-05-10 19:28:18'),(137,'10001于2017-05-10 20:30:51在功能管理模块下对ID=24进行了创建操作','2017-05-10 20:30:51'),(138,'10001于2017-05-10 20:31:07在功能管理模块下对ID=24进行了更新操作','2017-05-10 20:31:07'),(139,'10001于2017-05-10 20:32:02在用户功能配置模块下对ID=24进行了角色功能添加操作','2017-05-10 20:32:02'),(140,'10001于2017-05-11 09:22:25在学校管理模块下对ID=1进行了创建操作','2017-05-11 09:22:25'),(141,'10001于2017-05-11 09:28:21在学校管理模块下对ID=1进行了更新操作','2017-05-11 09:28:21'),(142,'10001于2017-05-11 09:38:22在学校管理模块下对ID=1进行了更新操作','2017-05-11 09:38:22'),(143,'10001于2017-05-11 09:41:04在学校管理模块下对ID=1进行了删除操作','2017-05-11 09:41:04'),(144,'10001于2017-05-11 09:42:57在学校管理模块下对ID=2进行了创建操作','2017-05-11 09:42:57'),(145,'10001于2017-05-11 09:43:23在学校管理模块下对ID=2进行了删除操作','2017-05-11 09:43:23'),(146,'10001于2017-05-11 09:47:11在功能管理模块下对ID=25进行了创建操作','2017-05-11 09:47:11'),(147,'10001于2017-05-11 09:49:28在功能管理模块下对ID=26进行了创建操作','2017-05-11 09:49:28'),(148,'10001于2017-05-11 09:50:55在功能管理模块下对ID=27进行了创建操作','2017-05-11 09:50:55'),(149,'10001于2017-05-11 09:52:09在功能管理模块下对ID=28进行了创建操作','2017-05-11 09:52:09'),(150,'10001于2017-05-11 09:53:04在功能管理模块下对ID=29进行了创建操作','2017-05-11 09:53:04'),(151,'10001于2017-05-11 09:53:31在功能管理模块下对ID=30进行了创建操作','2017-05-11 09:53:31'),(152,'10001于2017-05-11 09:54:12在用户功能配置模块下对ID=25,26,27,28,29,30进行了角色功能添加操作','2017-05-11 09:54:12'),(153,'10001于2017-05-11 11:18:47在角色管理模块下对ID=11进行了创建操作','2017-05-11 11:18:47'),(154,'10001于2017-05-11 11:19:13在角色管理模块下对ID=11进行了删除操作','2017-05-11 11:19:13'),(155,'10001于2017-05-11 14:01:02在功能管理模块下对ID=24进行了更新操作','2017-05-11 14:01:02'),(156,'10001于2017-05-11 14:01:25在功能管理模块下对ID=23进行了更新操作','2017-05-11 14:01:25'),(157,'10001于2017-05-11 14:02:22在功能管理模块下对ID=25进行了更新操作','2017-05-11 14:02:22'),(158,'10001于2017-05-11 14:02:53在功能管理模块下对ID=26进行了更新操作','2017-05-11 14:02:53'),(159,'10001于2017-05-11 14:03:13在功能管理模块下对ID=27进行了更新操作','2017-05-11 14:03:13'),(160,'10001于2017-05-11 14:04:02在功能管理模块下对ID=28进行了更新操作','2017-05-11 14:04:02'),(161,'10001于2017-05-11 14:04:29在功能管理模块下对ID=29进行了更新操作','2017-05-11 14:04:29'),(162,'10001于2017-05-11 14:04:52在功能管理模块下对ID=30进行了更新操作','2017-05-11 14:04:52'),(163,'10001于2017-05-11 14:08:04在学校管理模块下对ID=1进行了创建操作','2017-05-11 14:08:04'),(164,'10001于2017-05-11 14:26:12在功能管理模块下对ID=31进行了创建操作','2017-05-11 14:26:12'),(165,'10001于2017-05-11 14:28:25在用户功能配置模块下对ID=31进行了角色功能添加操作','2017-05-11 14:28:25'),(166,'10001于2017-05-11 14:30:26在功能管理模块下对ID=31进行了更新操作','2017-05-11 14:30:26'),(167,'10001于2017-05-11 16:39:29在学校管理模块下对ID=1进行了删除操作','2017-05-11 16:39:29'),(168,'10001于2017-05-11 17:07:54在学校管理模块下对ID=2进行了创建操作','2017-05-11 17:07:54'),(169,'10001于2017-05-11 18:54:54在行政单位管理模块下对ID=1进行了创建操作','2017-05-11 18:54:54'),(170,'10001于2017-05-11 18:56:24在行政单位管理模块下对ID=2进行了创建操作','2017-05-11 18:56:24'),(171,'10001于2017-05-11 18:57:28在行政单位管理模块下对ID=3进行了创建操作','2017-05-11 18:57:28'),(172,'10001于2017-05-12 09:21:40在功能管理模块下对ID=29进行了更新操作','2017-05-12 09:21:40'),(173,'10001于2017-05-12 10:18:41在行政单位管理模块下对ID=1进行了更新操作','2017-05-12 10:18:41'),(174,'10001于2017-05-12 10:18:58在行政单位管理模块下对ID=2进行了更新操作','2017-05-12 10:18:58'),(175,'10001于2017-05-12 10:20:25在行政单位管理模块下对ID=2进行了更新操作','2017-05-12 10:20:25'),(176,'10001于2017-05-12 10:22:04在行政单位管理模块下对ID=3进行了更新操作','2017-05-12 10:22:04'),(177,'10001于2017-05-12 11:06:14在行政单位管理模块下对ID=4进行了创建操作','2017-05-12 11:06:14'),(178,'10001于2017-05-12 13:58:26在行政单位管理模块下对ID=5进行了创建操作','2017-05-12 13:58:26'),(179,'10001于2017-05-12 14:56:08在行政单位管理模块下对ID=2进行了更新操作','2017-05-12 14:56:08'),(180,'10001于2017-05-12 15:16:41在行政单位管理模块下对ID=5进行了更新操作','2017-05-12 15:16:41'),(181,'10001于2017-05-12 17:05:12在学校管理模块下对ID=3进行了创建操作','2017-05-12 17:05:12'),(182,'10001于2017-05-12 18:29:07在行政单位管理模块下对ID=4进行了删除操作','2017-05-12 18:29:07'),(183,'10001于2017-05-12 18:29:15在行政单位管理模块下对ID=3,5进行了删除操作','2017-05-12 18:29:15'),(184,'10001于2017-05-14 14:50:52在角色管理模块下对ID=12进行了创建操作','2017-05-14 14:50:52'),(185,'10001于2017-05-14 14:50:59在角色管理模块下对ID=12进行了删除操作','2017-05-14 14:50:59'),(186,'10001于2017-05-14 14:53:24在角色管理模块下对ID=13进行了创建操作','2017-05-14 14:53:24'),(187,'10001于2017-05-14 14:53:31在角色管理模块下对ID=13进行了删除操作','2017-05-14 14:53:31'),(188,'10001于2017-05-14 14:59:27在角色管理模块下对ID=14进行了创建操作','2017-05-14 14:59:27'),(189,'10001于2017-05-14 14:59:38在角色管理模块下对ID=14进行了删除操作','2017-05-14 14:59:38'),(190,'10001于2017-05-14 17:46:36在行政单位管理模块下对ID=3进行了创建操作','2017-05-14 17:46:36'),(191,'10001于2017-05-14 17:46:40在行政单位管理模块下对ID=4进行了创建操作','2017-05-14 17:46:40'),(192,'10001于2017-05-14 19:25:03在行政单位管理模块下对ID=4进行了删除操作','2017-05-14 19:25:03'),(193,'10001于2017-05-14 19:28:13在行政单位管理模块下对ID=5进行了创建操作','2017-05-14 19:28:13'),(194,'10001于2017-05-14 19:45:52在行政单位管理模块下对ID=5进行了删除操作','2017-05-14 19:45:52'),(195,'10001于2017-05-14 20:00:44在行政单位管理模块下对ID=6进行了创建操作','2017-05-14 20:00:44'),(196,'10001于2017-05-14 20:00:53在行政单位管理模块下对ID=6进行了删除操作','2017-05-14 20:00:53'),(197,'10001于2017-05-15 09:09:43在教师管理模块下对ID=1进行了创建操作','2017-05-15 09:09:43'),(198,'10001于2017-05-15 09:21:20在学校管理模块下对ID=1进行了创建操作','2017-05-15 09:21:20'),(199,'10001于2017-05-15 09:50:32在学生管理模块下对ID=1进行了创建操作','2017-05-15 09:50:32'),(200,'10001于2017-05-15 09:51:26在学生管理模块下对ID=1进行了创建操作','2017-05-15 09:51:26'),(201,'10001于2017-05-15 10:07:43在实验室场地管理模块下对ID=1进行了创建操作','2017-05-15 10:07:43'),(202,'10001于2017-05-15 10:25:56在专业管理模块下对ID=1进行了创建操作','2017-05-15 10:25:56'),(203,'10001于2017-05-15 10:55:41在学生管理模块下对ID=2进行了创建操作','2017-05-15 10:55:41'),(204,'10001于2017-05-15 10:56:10在学校管理模块下对ID=2进行了创建操作','2017-05-15 10:56:10'),(205,'10001于2017-05-15 10:57:05在学生管理模块下对ID=1进行了更新操作','2017-05-15 10:57:05'),(206,'10001于2017-05-15 11:00:45在实验室管理模块下对ID=1进行了创建操作','2017-05-15 11:00:45'),(207,'10001于2017-05-15 11:01:29在学校管理模块下对ID=3进行了删除操作','2017-05-15 11:01:29'),(208,'10001于2017-05-15 11:14:46在学校管理模块下对ID=4进行了创建操作','2017-05-15 11:14:46'),(209,'10001于2017-05-15 11:15:38在学校管理模块下对ID=3进行了创建操作','2017-05-15 11:15:38'),(210,'10001于2017-05-15 11:15:54在学校管理模块下对ID=1进行了更新操作','2017-05-15 11:15:54'),(211,'10001于2017-05-15 11:16:50在实验室场地管理模块下对ID=1进行了更新操作','2017-05-15 11:16:50'),(212,'10001于2017-05-15 14:15:34在学生管理模块下对ID=2进行了创建操作','2017-05-15 14:15:34'),(213,'10001于2017-05-15 14:15:59在学生管理模块下对ID=2进行了删除操作','2017-05-15 14:15:59'),(214,'10001于2017-05-15 14:21:18在专业管理模块下对ID=2进行了创建操作','2017-05-15 14:21:18'),(215,'10001于2017-05-15 14:21:24在学校管理模块下对ID=2进行了删除操作','2017-05-15 14:21:24'),(216,'10001于2017-05-15 15:00:12在专业管理模块下对ID=3进行了创建操作','2017-05-15 15:00:12'),(217,'10001于2017-05-15 15:00:42在专业管理模块下对ID=4进行了创建操作','2017-05-15 15:00:42'),(218,'10001于2017-05-15 15:07:27在学生管理模块下对ID=3进行了创建操作','2017-05-15 15:07:27'),(219,'10001于2017-05-15 15:07:48在教师管理模块下对ID=2进行了创建操作','2017-05-15 15:07:48'),(220,'10001于2017-05-15 15:29:34在专业管理模块下对ID=5进行了创建操作','2017-05-15 15:29:34'),(221,'10001于2017-05-15 15:29:46在专业管理模块下对ID=5进行了更新操作','2017-05-15 15:29:46'),(222,'10001于2017-05-15 16:01:36在学校管理模块下对ID=5进行了创建操作','2017-05-15 16:01:36'),(223,'10001于2017-05-15 16:01:45在学校管理模块下对ID=5进行了更新操作','2017-05-15 16:01:45'),(224,'10001于2017-05-15 16:01:50在学校管理模块下对ID=5进行了删除操作','2017-05-15 16:01:50'),(225,'10001于2017-05-15 16:02:03在学校管理模块下对ID=4进行了创建操作','2017-05-15 16:02:03'),(226,'10001于2017-05-15 16:02:10在学校管理模块下对ID=4进行了更新操作','2017-05-15 16:02:10'),(227,'10001于2017-05-15 16:02:18在学校管理模块下对ID=4进行了删除操作','2017-05-15 16:02:18'),(228,'10001于2017-05-15 16:03:25在实验室场地管理模块下对ID=2进行了创建操作','2017-05-15 16:03:25'),(229,'10001于2017-05-15 16:12:33在学校管理模块下对ID=2进行了更新操作','2017-05-15 16:12:33'),(230,'10001于2017-05-15 16:12:49在学校管理模块下对ID=2进行了更新操作','2017-05-15 16:12:49'),(231,'10001于2017-05-15 16:24:17在教师管理模块下对ID=3进行了创建操作','2017-05-15 16:24:17'),(232,'10001于2017-05-16 08:50:31在学校管理模块下对ID=5进行了创建操作','2017-05-16 08:50:31'),(233,'10001于2017-05-16 08:50:38在学校管理模块下对ID=5进行了删除操作','2017-05-16 08:50:38'),(234,'10001于2017-05-16 08:52:21在学校管理模块下对ID=6进行了创建操作','2017-05-16 08:52:21'),(235,'10001于2017-05-16 08:55:45在学校管理模块下对ID=7进行了创建操作','2017-05-16 08:55:45'),(236,'10001于2017-05-16 08:58:27在学校管理模块下对ID=6,7进行了删除操作','2017-05-16 08:58:27'),(237,'10001于2017-05-16 09:30:13在学校管理模块下对ID=3进行了创建操作','2017-05-16 09:30:13'),(238,'10001于2017-05-16 09:30:54在学校管理模块下对ID=4进行了创建操作','2017-05-16 09:30:54'),(239,'10001于2017-05-16 09:31:15在实验室场地管理模块下对ID=3,4进行了删除操作','2017-05-16 09:31:15'),(240,'10001于2017-05-16 10:31:26在学校管理模块下对ID=6进行了创建操作','2017-05-16 10:31:26'),(241,'10001于2017-05-16 10:33:08在学校管理模块下对ID=8进行了创建操作','2017-05-16 10:33:08'),(242,'10001于2017-05-16 10:34:57在学校管理模块下对ID=9进行了创建操作','2017-05-16 10:34:57'),(243,'10001于2017-05-16 10:36:59在学校管理模块下对ID=10进行了创建操作','2017-05-16 10:36:59'),(244,'10001于2017-05-16 10:38:10在学校管理模块下对ID=8,9进行了删除操作','2017-05-16 10:38:10'),(245,'10001于2017-05-16 10:45:18在学校管理模块下对ID=4进行了创建操作','2017-05-16 10:45:18'),(246,'10001于2017-05-16 10:45:35在学校管理模块下对ID=5进行了创建操作','2017-05-16 10:45:35'),(247,'10001于2017-05-16 10:45:57在学校管理模块下对ID=2进行了创建操作','2017-05-16 10:45:57'),(248,'10001于2017-05-16 10:46:13在学校管理模块下对ID=4进行了创建操作','2017-05-16 10:46:13'),(249,'10001于2017-05-16 10:46:28在学校管理模块下对ID=7进行了创建操作','2017-05-16 10:46:28'),(250,'10001于2017-05-16 10:47:28在学校管理模块下对ID=4进行了创建操作','2017-05-16 10:47:28'),(251,'10001于2017-05-16 11:07:32在学校管理模块下对ID=11进行了创建操作','2017-05-16 11:07:32'),(252,'10001于2017-05-16 11:08:04在学校管理模块下对ID=5进行了创建操作','2017-05-16 11:08:04'),(253,'10001于2017-05-16 13:48:40在学校管理模块下对ID=3进行了创建操作','2017-05-16 13:48:40'),(254,'10001于2017-05-16 13:56:28在学生管理模块下对ID=3进行了更新操作','2017-05-16 13:56:28'),(255,'10001于2017-05-16 14:02:42在学生管理模块下对ID=5进行了创建操作','2017-05-16 14:02:42'),(256,'10001于2017-05-16 14:48:14在学校管理模块下对ID=12进行了创建操作','2017-05-16 14:48:14'),(257,'10001于2017-05-16 14:48:33在学校管理模块下对ID=4,10,11,12进行了删除操作','2017-05-16 14:48:33'),(258,'10001于2017-05-16 14:52:12在学生管理模块下对ID=3,4,5进行了删除操作','2017-05-16 14:52:12'),(259,'10001于2017-05-16 18:15:02在行政单位管理模块下对ID=2进行了更新操作','2017-05-16 18:15:02'),(260,'10001于2017-05-16 19:42:14在实验室管理模块下对ID=2进行了更新操作','2017-05-16 19:42:14'),(261,'10001于2017-05-17 10:13:25在学校管理模块下对ID=3进行了创建操作','2017-05-17 10:13:25'),(262,'10001于2017-05-17 10:13:57在校区管理模块下对ID=6进行了创建操作','2017-05-17 10:13:57'),(263,'10001于2017-05-17 10:14:31在实验室场地管理模块下对ID=6进行了创建操作','2017-05-17 10:14:31'),(264,'10001于2017-05-17 10:15:05在实验室管理模块下对ID=3进行了创建操作','2017-05-17 10:15:05'),(265,'10001于2017-05-17 10:49:27在班级管理模块下对ID=3进行了更新操作','2017-05-17 10:49:27'),(266,'10001于2017-05-17 16:00:57在行政单位管理模块下对ID=3进行了删除操作','2017-05-17 16:00:57'),(267,'10001于2017-05-17 16:48:01在行政单位管理模块下对ID=5进行了创建操作','2017-05-17 16:48:01'),(268,'10001于2017-05-17 16:48:49在行政单位管理模块下对ID=4进行了删除操作','2017-05-17 16:48:49'),(269,'10001于2017-05-17 16:49:59在班级管理模块下对ID=2进行了删除操作','2017-05-17 16:49:59'),(270,'10001于2017-05-17 16:56:13在学校管理模块下对ID=3进行了删除操作','2017-05-17 16:56:13'),(271,'10001于2017-05-17 17:17:52在学校管理模块下对ID=3,4,5,6进行了删除操作','2017-05-17 17:17:52'),(272,'10001于2017-05-18 08:39:45在用户角色配置模块下对ID=29进行了删除操作','2017-05-18 08:39:45'),(273,'10001于2017-05-18 15:47:30在行政单位管理模块下对ID=6进行了创建操作','2017-05-18 15:47:30'),(274,'10001于2017-05-18 15:47:53在行政单位管理模块下对ID=6进行了删除操作','2017-05-18 15:47:53'),(275,'10001于2017-05-18 16:35:41在行政单位管理模块下对ID=5进行了更新操作','2017-05-18 16:35:41'),(276,'10001于2017-05-18 19:16:49在实验室场地管理模块下对ID=5进行了更新操作','2017-05-18 19:16:49'),(277,'10001于2017-05-19 11:08:36在班级管理模块下对ID=3进行了删除操作','2017-05-19 11:08:36'),(278,'10001于2017-05-19 11:13:27在校区管理模块下对ID=3进行了创建操作','2017-05-19 11:13:27'),(279,'10001于2017-05-19 11:14:17在学校管理模块下对ID=3进行了删除操作','2017-05-19 11:14:17'),(280,'10001于2017-05-19 11:14:40在教师管理模块下对ID=3进行了删除操作','2017-05-19 11:14:40'),(281,'10001于2017-05-19 11:25:10在学校管理模块下对ID=6,7进行了删除操作','2017-05-19 11:25:10'),(282,'10001于2017-05-19 11:40:43在班级管理模块下对ID=4进行了创建操作','2017-05-19 11:40:43');
/*!40000 ALTER TABLE `act_log` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "classes"
#

INSERT INTO `classes` VALUES (1,'dn123456','dn',1,1,'3',''),(4,'78956','DA',1,1,'1','');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "department"
#

INSERT INTO `department` VALUES (1,'','计算机学院',NULL,'Y',''),(2,'9856','软嵌',1,'N',''),(5,'sju','软工',5,'Y','');

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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

#
# Data for table "functions"
#

/*!40000 ALTER TABLE `functions` DISABLE KEYS */;
INSERT INTO `functions` VALUES (1,'001003001','用户维护','fa fa-user','/right/user/index',10,NULL,1),(2,'001003002','角色维护','fa fa-users','/right/role/index',20,NULL,1),(3,'001003003','模块维护','fa fa-list-ul','/right/module/index',30,NULL,1),(4,'001003004','功能维护','fa fa-tags','/right/functions/index',40,NULL,1),(5,'001','权限配置',' fa fa-link','/right/config/index',50,'',1),(6,'001004001','日志查看','fa fa-file-text','/log/log/index',10,'',2),(23,'','教师信息','','/basicinfo/teacher/index',18,'',10),(24,'','学校信息','','/basicinfo/school/index',11,'',10),(25,'','学生信息','','/basicinfo/student/index',19,'',10),(26,'','实验场地信息','','/basicinfo/building/index',13,'',10),(27,'','实验室信息','','/basicinfo/room/index',14,'',10),(28,'','专业信息','','/basicinfo/major/index',16,'',10),(29,'','部门信息','','/basicinfo/department/index',15,'',10),(30,'','班级信息','','/basicinfo/classes/index',17,'',10),(31,'','校区信息','','/basicinfo/campus/index',12,'',10);
/*!40000 ALTER TABLE `functions` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "major"
#

INSERT INTO `major` VALUES (1,'rq777','软嵌','',1,'1','','Y','',''),(4,'no66999','农业','',3,'3','','N','',''),(5,'LL6666','SDA','',2,'3','','Y','','');

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

#
# Data for table "modules"
#

/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'001003','权限管理',30,'1'),(2,'001004','日志管理',40,NULL),(10,'001005','基础信息管理',NULL,'');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;

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
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

#
# Data for table "role_function"
#

/*!40000 ALTER TABLE `role_function` DISABLE KEYS */;
INSERT INTO `role_function` VALUES (1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,1,1,'1','1','1','0','1','0','0','0','0','0',NULL),(27,2,1,'1','1','1','0','1','1','0','0','0','0',NULL),(28,3,1,'1','1','1','0','1','1','0','0','0','0',NULL),(29,4,1,'1','1','1','0','1','1','0','0','0','0',NULL),(30,6,1,'0','0','0','0','0','0','0','0','0','0',NULL),(31,1,5,'1','1','1','0','0','1','0','0','0','0',NULL),(32,4,5,'0','0','0','0','0','0','0','0','0','0',NULL),(33,6,5,'0','0','0','0','0','0','0','0','0','0',NULL),(34,23,1,'1','1','1','0','0','0','0','0','0','0',NULL),(35,24,1,'1','1','1','0','1','1','0','0','0','0',NULL),(36,25,1,'1','1','1','0','0','0','0','0','0','0',NULL),(37,26,1,'1','1','1','0','0','0','0','0','0','0',NULL),(38,27,1,'1','1','1','0','0','0','0','0','0','0',NULL),(39,28,1,'1','1','1','0','0','0','0','0','0','0',NULL),(40,29,1,'1','1','1','0','0','0','0','0','0','0',NULL),(41,30,1,'1','1','1','0','0','0','0','0','0','0',NULL),(42,31,1,'1','1','1','0','0','0','0','0','0','0',NULL);
/*!40000 ALTER TABLE `role_function` ENABLE KEYS */;

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Data for table "roles"
#

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'001',NULL,'超级管理员','所有权限'),(5,'001',NULL,'管理员','');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "room"
#

INSERT INTO `room` VALUES (1,'sju705',1,'s705',NULL,'',1,NULL,NULL,NULL,'N','','',''),(2,'9999',NULL,'555',2,'6',NULL,NULL,NULL,NULL,'Y','','',''),(3,'555',5,'9999',2,'是',1,NULL,NULL,NULL,'Y','','','');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "teacher"
#

/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (1,'teacher001','灰色','1',2,'',NULL,NULL,NULL,'1',NULL,NULL,NULL,''),(2,'sdas','6666','1',2,'',NULL,NULL,NULL,'1',NULL,NULL,NULL,'');
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `userCode` varchar(40) NOT NULL COMMENT '编号',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `name` varchar(40) DEFAULT NULL COMMENT '姓名',
  `remark` varchar(100) DEFAULT NULL COMMENT '备注',
  `auth_key` varchar(32) DEFAULT NULL,
  `currentModule` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'','$2y$13$2FiAG.GMdyDnueablY6iTuGn5l1sXRsYPnDQhOodKoelkeESS3x.S','10001',NULL,NULL,1),(13,'dsa3333','123456','zhw0010','',NULL,NULL),(14,'sda2333','123456','zhw002','',NULL,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

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
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

#
# Data for table "user_function"
#

/*!40000 ALTER TABLE `user_function` DISABLE KEYS */;
INSERT INTO `user_function` VALUES (1,5,1,'1','0','1','1','0','0','0',NULL,NULL,NULL,NULL),(67,1,1,'1','1','1','0','1','0','0','0','0','0',NULL),(68,2,1,'1','1','1','0','1','1','0','0','0','0',NULL),(69,3,1,'1','1','1','0','1','1','0','0','0','0',NULL),(70,4,1,'1','1','1','0','1','1','0','0','0','0',NULL),(71,6,1,'0','0','0','0','0','0','0','0','0','0',NULL),(72,5,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(73,1,13,'1','1','1','0','1','0','0','0','0','0',NULL),(74,2,13,'1','1','1','0','1','1','0','0','0','0',NULL),(75,3,13,'1','1','1','0','1','1','0','0','0','0',NULL),(76,4,13,'1','1','1','0','1','1','0','0','0','0',NULL),(77,6,13,'0','0','0','0','0','0','0','0','0','0',NULL),(87,23,1,'1','1','1','0','0','0','0','0','0','0',NULL),(88,23,13,'1','1','1','0','0','0','0','0','0','0',NULL),(89,24,1,'1','1','1','0','1','1','0','0','0','0',NULL),(90,24,13,'1','1','1','0','1','1','0','0','0','0',NULL),(91,25,1,'1','1','1','0','0','0','0','0','0','0',NULL),(92,25,13,'1','1','1','0','0','0','0','0','0','0',NULL),(93,26,1,'1','1','1','0','0','0','0','0','0','0',NULL),(94,26,13,'1','1','1','0','0','0','0','0','0','0',NULL),(95,27,1,'1','1','1','0','0','0','0','0','0','0',NULL),(96,27,13,'1','1','1','0','0','0','0','0','0','0',NULL),(97,28,1,'1','1','1','0','0','0','0','0','0','0',NULL),(98,28,13,'1','1','1','0','0','0','0','0','0','0',NULL),(99,29,1,'1','1','1','0','0','0','0','0','0','0',NULL),(100,29,13,'1','1','1','0','0','0','0','0','0','0',NULL),(101,30,1,'1','1','1','0','0','0','0','0','0','0',NULL),(102,30,13,'1','1','1','0','0','0','0','0','0','0',NULL),(103,31,1,'1','1','1','0','0','0','0','0','0','0',NULL),(104,31,13,'1','1','1','0','0','0','0','0','0','0',NULL);
/*!40000 ALTER TABLE `user_function` ENABLE KEYS */;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "user_laboratory"
#

/*!40000 ALTER TABLE `user_laboratory` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_laboratory` ENABLE KEYS */;

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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

#
# Data for table "user_module"
#

/*!40000 ALTER TABLE `user_module` DISABLE KEYS */;
INSERT INTO `user_module` VALUES (1,1,1,NULL),(7,1,1,NULL),(8,1,1,NULL),(9,1,1,NULL),(10,1,1,NULL),(11,1,2,NULL),(12,13,1,NULL),(13,13,1,NULL),(14,13,1,NULL),(15,13,1,NULL),(16,13,1,NULL),(17,13,2,NULL),(18,14,1,NULL),(19,14,1,NULL),(20,14,1,NULL),(21,14,1,NULL),(22,14,1,NULL),(23,14,2,NULL),(24,14,1,NULL),(25,14,1,NULL),(26,14,2,NULL),(27,1,10,NULL),(28,13,10,NULL),(29,1,10,NULL),(30,13,10,NULL),(31,1,10,NULL),(32,13,10,NULL),(33,1,10,NULL),(34,13,10,NULL),(35,1,10,NULL),(36,13,10,NULL),(37,1,10,NULL),(38,13,10,NULL),(39,1,10,NULL),(40,13,10,NULL),(41,1,10,NULL),(42,13,10,NULL),(43,1,1,NULL),(44,13,1,NULL);
/*!40000 ALTER TABLE `user_module` ENABLE KEYS */;

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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

#
# Data for table "user_role"
#

/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,1,1,NULL),(27,13,1,NULL);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
