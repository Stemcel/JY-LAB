# Host: localhost  (Version: 5.5.47)
# Date: 2017-05-09 17:06:12
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
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

#
# Data for table "act_log"
#

/*!40000 ALTER TABLE `act_log` DISABLE KEYS */;
INSERT INTO `act_log` VALUES (90,'10001于2017-05-06 13:54:29在用户角色配置模块下对ID=1,2,3,4,6进行了角色功能添加操作','2017-05-06 13:54:29'),(91,'10001于2017-05-06 13:56:23在角色管理模块下对ID=5进行了创建操作','2017-05-06 13:56:23'),(92,'10001于2017-05-08 08:57:34在模块管理模块下对ID=7进行了创建操作','2017-05-08 08:57:34'),(93,'10001于2017-05-08 08:59:39在模块管理模块下对ID=7进行了更新操作','2017-05-08 08:59:39'),(94,'10001于2017-05-08 09:01:20在功能管理模块下对ID=22进行了创建操作','2017-05-08 09:01:20'),(95,'10001于2017-05-08 09:01:35在功能管理模块下对ID=22进行了删除操作','2017-05-08 09:01:35'),(96,'10001于2017-05-08 09:02:26在模块管理模块下对ID=7进行了删除操作','2017-05-08 09:02:26'),(97,'10001于2017-05-09 14:02:41在人员管理模块下对ID=13进行了创建操作','2017-05-09 14:02:41'),(98,'10001于2017-05-09 14:03:28在人员管理模块下对ID=14进行了创建操作','2017-05-09 14:03:28'),(99,'10001于2017-05-09 14:04:28在人员管理模块下对ID=13进行了更新操作','2017-05-09 14:04:28'),(100,'10001于2017-05-09 14:12:58在角色管理模块下对ID=6进行了创建操作','2017-05-09 14:12:58'),(101,'10001于2017-05-09 14:13:18在角色管理模块下对ID=7进行了创建操作','2017-05-09 14:13:18'),(102,'10001于2017-05-09 14:14:52在角色管理模块下对ID=8进行了创建操作','2017-05-09 14:14:52'),(103,'10001于2017-05-09 14:15:08在角色管理模块下对ID=7,8进行了删除操作','2017-05-09 14:15:08'),(104,'10001于2017-05-09 14:29:04在用户角色配置模块下对ID=13,14进行了角色人员添加操作','2017-05-09 14:29:04'),(105,'10001于2017-05-09 14:29:56在用户角色配置模块下对ID=14进行了角色人员添加操作','2017-05-09 14:29:56'),(106,'10001于2017-05-09 14:32:54在用户角色配置模块下对ID=28进行了删除操作','2017-05-09 14:32:54'),(107,'10001于2017-05-09 14:34:43在用户角色配置模块下对ID=1,4,6进行了角色功能添加操作','2017-05-09 14:34:43'),(108,'10001于2017-05-09 14:45:03在人员管理模块下对ID=15进行了创建操作','2017-05-09 14:45:03'),(109,'10001于2017-05-09 14:45:33在人员管理模块下对ID=15进行了删除操作','2017-05-09 14:45:33'),(110,'10001于2017-05-09 14:47:46在人员管理模块下对ID=13进行了更新操作','2017-05-09 14:47:46'),(111,'10001于2017-05-09 14:49:12在人员管理模块下对ID=13进行了更新操作','2017-05-09 14:49:12');
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

#
# Data for table "functions"
#

/*!40000 ALTER TABLE `functions` DISABLE KEYS */;
INSERT INTO `functions` VALUES (1,'001003001','用户维护','fa fa-user','/right/user/index',10,NULL,1),(2,'001003002','角色维护','fa fa-users','/right/role/index',20,NULL,1),(3,'001003003','模块维护','fa fa-list-ul','/right/module/index',30,NULL,1),(4,'001003004','功能维护','fa fa-tags','/right/functions/index',40,NULL,1),(5,'001','权限配置',' fa fa-link','/right/config/index',50,'',1),(6,'001004001','日志查看','fa fa-file-text','/log/log/index',10,'',2);
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "modules"
#

/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'001003','权限管理',30,'1'),(2,'001004','日志管理',40,NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

#
# Data for table "role_function"
#

/*!40000 ALTER TABLE `role_function` DISABLE KEYS */;
INSERT INTO `role_function` VALUES (1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,1,1,'1','1','1','0','1','0','0','0','0','0',NULL),(27,2,1,'1','1','1','0','1','1','0','0','0','0',NULL),(28,3,1,'1','1','1','0','1','1','0','0','0','0',NULL),(29,4,1,'1','1','1','0','1','1','0','0','0','0',NULL),(30,6,1,'0','0','0','0','0','0','0','0','0','0',NULL),(31,1,5,'1','1','1','0','1','1','0','0','0','0',NULL),(32,4,5,'0','0','0','0','0','0','0','0','0','0',NULL),(33,6,5,'0','0','0','0','0','0','0','0','0','0',NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "roles"
#

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'001',NULL,'超级管理员','所有权限'),(5,'001',NULL,'管理员',''),(6,'001',NULL,'教师','');
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
  PRIMARY KEY (`schoolID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学校基本信息';

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'','$2y$13$2FiAG.GMdyDnueablY6iTuGn5l1sXRsYPnDQhOodKoelkeESS3x.S','10001',NULL,NULL,1),(13,'001','123456','zhw0010','',NULL,NULL),(14,'001','$2y$13$7yMF75wTl5tpvMR1d3ynUuAsNIy5/ws6/7RBFM5olKTEUDiV8DUZW','zhw002','',NULL,1);
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
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

#
# Data for table "user_function"
#

/*!40000 ALTER TABLE `user_function` DISABLE KEYS */;
INSERT INTO `user_function` VALUES (1,5,1,'1','0','1','1','0','0','0',NULL,NULL,NULL,NULL),(67,1,1,'1','1','1','0','1','0','0','0','0','0',NULL),(68,2,1,'1','1','1','0','1','1','0','0','0','0',NULL),(69,3,1,'1','1','1','0','1','1','0','0','0','0',NULL),(70,4,1,'1','1','1','0','1','1','0','0','0','0',NULL),(71,6,1,'0','0','0','0','0','0','0','0','0','0',NULL),(72,5,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(73,1,13,'1','1','1','0','1','0','0','0','0','0',NULL),(74,2,13,'1','1','1','0','1','1','0','0','0','0',NULL),(75,3,13,'1','1','1','0','1','1','0','0','0','0',NULL),(76,4,13,'1','1','1','0','1','1','0','0','0','0',NULL),(77,6,13,'0','0','0','0','0','0','0','0','0','0',NULL),(84,1,14,'1','1','1','0','1','1','0','0','0','0',NULL),(85,4,14,'0','0','0','0','0','0','0','0','0','0',NULL),(86,6,14,'0','0','0','0','0','0','0','0','0','0',NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

#
# Data for table "user_module"
#

/*!40000 ALTER TABLE `user_module` DISABLE KEYS */;
INSERT INTO `user_module` VALUES (1,1,1,NULL),(7,1,1,NULL),(8,1,1,NULL),(9,1,1,NULL),(10,1,1,NULL),(11,1,2,NULL),(12,13,1,NULL),(13,13,1,NULL),(14,13,1,NULL),(15,13,1,NULL),(16,13,1,NULL),(17,13,2,NULL),(18,14,1,NULL),(19,14,1,NULL),(20,14,1,NULL),(21,14,1,NULL),(22,14,1,NULL),(23,14,2,NULL),(24,14,1,NULL),(25,14,1,NULL),(26,14,2,NULL);
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
