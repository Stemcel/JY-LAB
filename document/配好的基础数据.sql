# Host: localhost  (Version: 5.5.47)
# Date: 2017-05-11 10:17:34
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
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=utf8;

#
# Data for table "act_log"
#

/*!40000 ALTER TABLE `act_log` DISABLE KEYS */;
INSERT INTO `act_log` VALUES (90,'10001于2017-05-06 13:54:29在用户角色配置模块下对ID=1,2,3,4,6进行了角色功能添加操作','2017-05-06 13:54:29'),(91,'10001于2017-05-06 13:56:23在角色管理模块下对ID=5进行了创建操作','2017-05-06 13:56:23'),(92,'10001于2017-05-08 08:57:34在模块管理模块下对ID=7进行了创建操作','2017-05-08 08:57:34'),(93,'10001于2017-05-08 08:59:39在模块管理模块下对ID=7进行了更新操作','2017-05-08 08:59:39'),(94,'10001于2017-05-08 09:01:20在功能管理模块下对ID=22进行了创建操作','2017-05-08 09:01:20'),(95,'10001于2017-05-08 09:01:35在功能管理模块下对ID=22进行了删除操作','2017-05-08 09:01:35'),(96,'10001于2017-05-08 09:02:26在模块管理模块下对ID=7进行了删除操作','2017-05-08 09:02:26'),(97,'10001于2017-05-09 14:02:41在人员管理模块下对ID=13进行了创建操作','2017-05-09 14:02:41'),(98,'10001于2017-05-09 14:03:28在人员管理模块下对ID=14进行了创建操作','2017-05-09 14:03:28'),(99,'10001于2017-05-09 14:04:28在人员管理模块下对ID=13进行了更新操作','2017-05-09 14:04:28'),(100,'10001于2017-05-09 14:12:58在角色管理模块下对ID=6进行了创建操作','2017-05-09 14:12:58'),(101,'10001于2017-05-09 14:13:18在角色管理模块下对ID=7进行了创建操作','2017-05-09 14:13:18'),(102,'10001于2017-05-09 14:14:52在角色管理模块下对ID=8进行了创建操作','2017-05-09 14:14:52'),(103,'10001于2017-05-09 14:15:08在角色管理模块下对ID=7,8进行了删除操作','2017-05-09 14:15:08'),(104,'10001于2017-05-09 14:29:04在用户角色配置模块下对ID=13,14进行了角色人员添加操作','2017-05-09 14:29:04'),(105,'10001于2017-05-09 14:29:56在用户角色配置模块下对ID=14进行了角色人员添加操作','2017-05-09 14:29:56'),(106,'10001于2017-05-09 14:32:54在用户角色配置模块下对ID=28进行了删除操作','2017-05-09 14:32:54'),(107,'10001于2017-05-09 14:34:43在用户角色配置模块下对ID=1,4,6进行了角色功能添加操作','2017-05-09 14:34:43'),(108,'10001于2017-05-09 14:45:03在人员管理模块下对ID=15进行了创建操作','2017-05-09 14:45:03'),(109,'10001于2017-05-09 14:45:33在人员管理模块下对ID=15进行了删除操作','2017-05-09 14:45:33'),(110,'10001于2017-05-09 14:47:46在人员管理模块下对ID=13进行了更新操作','2017-05-09 14:47:46'),(111,'10001于2017-05-09 14:49:12在人员管理模块下对ID=13进行了更新操作','2017-05-09 14:49:12'),(112,'10001于2017-05-10 08:41:10在人员管理模块下对ID=16进行了创建操作','2017-05-10 08:41:10'),(113,'10001于2017-05-10 08:44:03在角色管理模块下对ID=9进行了创建操作','2017-05-10 08:44:03'),(114,'10001于2017-05-10 09:10:18在人员管理模块下对ID=16进行了删除操作','2017-05-10 09:10:18'),(115,'10001于2017-05-10 09:12:46在人员管理模块下对ID=17进行了创建操作','2017-05-10 09:12:46'),(116,'10001于2017-05-10 09:14:14在人员管理模块下对ID=17进行了删除操作','2017-05-10 09:14:14'),(117,'10001于2017-05-10 09:14:33在人员管理模块下对ID=18进行了创建操作','2017-05-10 09:14:33'),(118,'10001于2017-05-10 09:24:50在模块管理模块下对ID=8进行了创建操作','2017-05-10 09:24:50'),(119,'10001于2017-05-10 09:25:20在模块管理模块下对ID=8进行了删除操作','2017-05-10 09:25:20'),(120,'10001于2017-05-10 09:25:31在模块管理模块下对ID=9进行了创建操作','2017-05-10 09:25:31'),(121,'10001于2017-05-10 09:36:54在人员管理模块下对ID=19进行了创建操作','2017-05-10 09:36:54'),(122,'10001于2017-05-10 09:39:09在人员管理模块下对ID=14进行了更新操作','2017-05-10 09:39:09'),(123,'10001于2017-05-10 09:44:14在人员管理模块下对ID=13进行了更新操作','2017-05-10 09:44:14'),(124,'10001于2017-05-10 14:18:34在模块管理模块下对ID=9进行了删除操作','2017-05-10 14:18:34'),(125,'10001于2017-05-10 15:21:55在人员管理模块下对ID=19进行了删除操作','2017-05-10 15:21:55'),(126,'10001于2017-05-10 15:29:08在人员管理模块下对ID=18进行了删除操作','2017-05-10 15:29:08'),(127,'10001于2017-05-10 16:34:44在人员管理模块下对ID=20进行了创建操作','2017-05-10 16:34:44'),(128,'10001于2017-05-10 16:34:58在人员管理模块下对ID=20进行了删除操作','2017-05-10 16:34:58'),(129,'10001于2017-05-10 17:15:28在人员管理模块下对ID=21进行了创建操作','2017-05-10 17:15:28'),(130,'10001于2017-05-10 17:46:32在人员管理模块下对ID=21进行了删除操作','2017-05-10 17:46:32'),(131,'10001于2017-05-10 18:56:28在模块管理模块下对ID=10进行了创建操作','2017-05-10 18:56:28'),(132,'10001于2017-05-10 18:56:51在模块管理模块下对ID=10进行了更新操作','2017-05-10 18:56:51'),(133,'10001于2017-05-10 18:59:25在功能管理模块下对ID=23进行了创建操作','2017-05-10 18:59:25'),(134,'10001于2017-05-10 19:00:09在用户功能配置模块下对ID=23进行了角色功能添加操作','2017-05-10 19:00:09'),(135,'10001于2017-05-10 19:24:32在功能管理模块下对ID=23进行了更新操作','2017-05-10 19:24:32'),(136,'10001于2017-05-10 19:28:18在功能管理模块下对ID=23进行了更新操作','2017-05-10 19:28:18'),(137,'10001于2017-05-10 20:30:51在功能管理模块下对ID=24进行了创建操作','2017-05-10 20:30:51'),(138,'10001于2017-05-10 20:31:07在功能管理模块下对ID=24进行了更新操作','2017-05-10 20:31:07'),(139,'10001于2017-05-10 20:32:02在用户功能配置模块下对ID=24进行了角色功能添加操作','2017-05-10 20:32:02'),(140,'10001于2017-05-11 09:22:25在学校管理模块下对ID=1进行了创建操作','2017-05-11 09:22:25'),(141,'10001于2017-05-11 09:28:21在学校管理模块下对ID=1进行了更新操作','2017-05-11 09:28:21'),(142,'10001于2017-05-11 09:38:22在学校管理模块下对ID=1进行了更新操作','2017-05-11 09:38:22'),(143,'10001于2017-05-11 09:41:04在学校管理模块下对ID=1进行了删除操作','2017-05-11 09:41:04'),(144,'10001于2017-05-11 09:42:57在学校管理模块下对ID=2进行了创建操作','2017-05-11 09:42:57'),(145,'10001于2017-05-11 09:43:23在学校管理模块下对ID=2进行了删除操作','2017-05-11 09:43:23'),(146,'10001于2017-05-11 09:47:11在功能管理模块下对ID=25进行了创建操作','2017-05-11 09:47:11'),(147,'10001于2017-05-11 09:49:28在功能管理模块下对ID=26进行了创建操作','2017-05-11 09:49:28'),(148,'10001于2017-05-11 09:50:55在功能管理模块下对ID=27进行了创建操作','2017-05-11 09:50:55'),(149,'10001于2017-05-11 09:52:09在功能管理模块下对ID=28进行了创建操作','2017-05-11 09:52:09'),(150,'10001于2017-05-11 09:53:04在功能管理模块下对ID=29进行了创建操作','2017-05-11 09:53:04'),(151,'10001于2017-05-11 09:53:31在功能管理模块下对ID=30进行了创建操作','2017-05-11 09:53:31'),(152,'10001于2017-05-11 09:54:12在用户功能配置模块下对ID=25,26,27,28,29,30进行了角色功能添加操作','2017-05-11 09:54:12');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "building"
#


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "campus"
#


#
# Structure for table "classes"
#

DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `classesID` int(11) NOT NULL DEFAULT '0',
  `Code` varchar(20) DEFAULT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `campusID` int(11) DEFAULT NULL,
  `majorID` int(11) DEFAULT NULL,
  `Grade` char(4) DEFAULT NULL,
  `Remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`classesID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "classes"
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "department"
#


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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

#
# Data for table "functions"
#

/*!40000 ALTER TABLE `functions` DISABLE KEYS */;
INSERT INTO `functions` VALUES (1,'001003001','用户维护','fa fa-user','/right/user/index',10,NULL,1),(2,'001003002','角色维护','fa fa-users','/right/role/index',20,NULL,1),(3,'001003003','模块维护','fa fa-list-ul','/right/module/index',30,NULL,1),(4,'001003004','功能维护','fa fa-tags','/right/functions/index',40,NULL,1),(5,'001','权限配置',' fa fa-link','/right/config/index',50,'',1),(6,'001004001','日志查看','fa fa-file-text','/log/log/index',10,'',2),(23,'','教师信息','','/basicinfo/teacher/index',NULL,'',10),(24,'','学校信息','','/basicinfo/school/index',NULL,'',10),(25,'','学生信息','','/basicinfo/student/index',NULL,'',10),(26,'','实验场地信息','','/basicinfo/building/index',NULL,'',10),(27,'','实验室信息','','/basicinfo/room/index',NULL,'',10),(28,'','专业信息','','/basicinfo/major/index',NULL,'',10),(29,'','行政单位信息','','/basicinfo/department/index',NULL,'',10),(30,'','班级信息','','/basicinfo/classes/index',NULL,'',10);
/*!40000 ALTER TABLE `functions` ENABLE KEYS */;

#
# Structure for table "major"
#

DROP TABLE IF EXISTS `major`;
CREATE TABLE `major` (
  `majorID` int(11) NOT NULL AUTO_INCREMENT,
  `Code` varchar(20) DEFAULT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `EnglishName` varchar(40) DEFAULT NULL,
  `departmentID` int(11) DEFAULT NULL,
  `type` char(1) DEFAULT NULL COMMENT '1博士、2硕士、3本科、4大专、5其他',
  `discipline` char(2) DEFAULT NULL,
  `IsEnroll` char(1) DEFAULT NULL COMMENT 'Y是默认，N不招',
  `Description` varchar(600) DEFAULT NULL,
  `Remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`majorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "major"
#


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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

#
# Data for table "role_function"
#

/*!40000 ALTER TABLE `role_function` DISABLE KEYS */;
INSERT INTO `role_function` VALUES (1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,1,1,'1','1','1','0','1','0','0','0','0','0',NULL),(27,2,1,'1','1','1','0','1','1','0','0','0','0',NULL),(28,3,1,'1','1','1','0','1','1','0','0','0','0',NULL),(29,4,1,'1','1','1','0','1','1','0','0','0','0',NULL),(30,6,1,'0','0','0','0','0','0','0','0','0','0',NULL),(31,1,5,'1','1','1','0','0','1','0','0','0','0',NULL),(32,4,5,'0','0','0','0','0','0','0','0','0','0',NULL),(33,6,5,'0','0','0','0','0','0','0','0','0','0',NULL),(34,23,1,'0','0','0','0','0','0','0','0','0','0',NULL),(35,24,1,'1','1','1','0','0','0','0','0','0','0',NULL),(36,25,1,'0','0','0','0','0','0','0','0','0','0',NULL),(37,26,1,'0','0','0','0','0','0','0','0','0','0',NULL),(38,27,1,'0','0','0','0','0','0','0','0','0','0',NULL),(39,28,1,'0','0','0','0','0','0','0','0','0','0',NULL),(40,29,1,'0','0','0','0','0','0','0','0','0','0',NULL),(41,30,1,'0','0','0','0','0','0','0','0','0','0',NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "roles"
#

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'001',NULL,'超级管理员','所有权限'),(5,'001',NULL,'管理员',''),(6,'001',NULL,'教师',''),(9,'001',NULL,'院长','');
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
  `techerID` int(11) DEFAULT NULL,
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
  `Remark` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`schoolID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='学校基本信息';

#
# Data for table "school"
#


#
# Structure for table "student"
#

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `studentID` int(11) NOT NULL DEFAULT '0',
  `Code` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Sex` char(2) DEFAULT NULL COMMENT '1男2女0未知',
  `classsesID` int(11) DEFAULT NULL,
  `Type` char(1) DEFAULT NULL COMMENT '1博士、2硕士、3本科、4大专、5其他',
  `Status` char(1) DEFAULT NULL COMMENT '1在读2、休学3毕业',
  `Email` varchar(40) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Remark` varchar(100) DEFAULT NULL,
  KEY `studentID` (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "student"
#


#
# Structure for table "teacher"
#

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `teacherID` int(11) NOT NULL DEFAULT '0',
  `Code` varchar(20) DEFAULT NULL,
  `40` varchar(255) DEFAULT NULL,
  `Sex` char(2) DEFAULT NULL COMMENT '1男2女0未知',
  `departmentID` int(11) DEFAULT NULL,
  `Title` char(3) DEFAULT NULL,
  `TitleDate` datetime DEFAULT NULL,
  `Status` char(3) DEFAULT NULL,
  `Background` char(2) DEFAULT NULL,
  `Degree` char(1) DEFAULT NULL COMMENT '1博士2硕士3本科4其他',
  `BackgroundDate` datetime DEFAULT NULL,
  `BackgroundSchool` varchar(40) DEFAULT NULL,
  `WorkDate` datetime DEFAULT NULL,
  `Remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`teacherID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "teacher"
#

/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

#
# Data for table "user_function"
#

/*!40000 ALTER TABLE `user_function` DISABLE KEYS */;
INSERT INTO `user_function` VALUES (1,5,1,'1','0','1','1','0','0','0',NULL,NULL,NULL,NULL),(67,1,1,'1','1','1','0','1','0','0','0','0','0',NULL),(68,2,1,'1','1','1','0','1','1','0','0','0','0',NULL),(69,3,1,'1','1','1','0','1','1','0','0','0','0',NULL),(70,4,1,'1','1','1','0','1','1','0','0','0','0',NULL),(71,6,1,'0','0','0','0','0','0','0','0','0','0',NULL),(72,5,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(73,1,13,'1','1','1','0','1','0','0','0','0','0',NULL),(74,2,13,'1','1','1','0','1','1','0','0','0','0',NULL),(75,3,13,'1','1','1','0','1','1','0','0','0','0',NULL),(76,4,13,'1','1','1','0','1','1','0','0','0','0',NULL),(77,6,13,'0','0','0','0','0','0','0','0','0','0',NULL),(84,1,14,'1','1','1','0','0','1','0','0','0','0',NULL),(85,4,14,'0','0','0','0','0','0','0','0','0','0',NULL),(86,6,14,'0','0','0','0','0','0','0','0','0','0',NULL),(87,23,1,'0','0','0','0','0','0','0','0','0','0',NULL),(88,23,13,'0','0','0','0','0','0','0','0','0','0',NULL),(89,24,1,'1','1','1','0','0','0','0','0','0','0',NULL),(90,24,13,'1','1','1','0','0','0','0','0','0','0',NULL),(91,25,1,'0','0','0','0','0','0','0','0','0','0',NULL),(92,25,13,'0','0','0','0','0','0','0','0','0','0',NULL),(93,26,1,'0','0','0','0','0','0','0','0','0','0',NULL),(94,26,13,'0','0','0','0','0','0','0','0','0','0',NULL),(95,27,1,'0','0','0','0','0','0','0','0','0','0',NULL),(96,27,13,'0','0','0','0','0','0','0','0','0','0',NULL),(97,28,1,'0','0','0','0','0','0','0','0','0','0',NULL),(98,28,13,'0','0','0','0','0','0','0','0','0','0',NULL),(99,29,1,'0','0','0','0','0','0','0','0','0','0',NULL),(100,29,13,'0','0','0','0','0','0','0','0','0','0',NULL),(101,30,1,'0','0','0','0','0','0','0','0','0','0',NULL),(102,30,13,'0','0','0','0','0','0','0','0','0','0',NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

#
# Data for table "user_module"
#

/*!40000 ALTER TABLE `user_module` DISABLE KEYS */;
INSERT INTO `user_module` VALUES (1,1,1,NULL),(7,1,1,NULL),(8,1,1,NULL),(9,1,1,NULL),(10,1,1,NULL),(11,1,2,NULL),(12,13,1,NULL),(13,13,1,NULL),(14,13,1,NULL),(15,13,1,NULL),(16,13,1,NULL),(17,13,2,NULL),(18,14,1,NULL),(19,14,1,NULL),(20,14,1,NULL),(21,14,1,NULL),(22,14,1,NULL),(23,14,2,NULL),(24,14,1,NULL),(25,14,1,NULL),(26,14,2,NULL),(27,1,10,NULL),(28,13,10,NULL),(29,1,10,NULL),(30,13,10,NULL),(31,1,10,NULL),(32,13,10,NULL),(33,1,10,NULL),(34,13,10,NULL),(35,1,10,NULL),(36,13,10,NULL),(37,1,10,NULL),(38,13,10,NULL),(39,1,10,NULL),(40,13,10,NULL),(41,1,10,NULL),(42,13,10,NULL);
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
INSERT INTO `user_role` VALUES (1,1,1,NULL),(27,13,1,NULL),(29,14,5,NULL);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
