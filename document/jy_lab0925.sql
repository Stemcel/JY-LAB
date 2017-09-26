# Host: localhost  (Version: 5.5.47)
# Date: 2017-09-25 11:01:13
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "act_log"
#

DROP TABLE IF EXISTS `act_log`;
CREATE TABLE `act_log` (
  `logID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `moduleName` varchar(40) DEFAULT NULL,
  `id` varchar(40) DEFAULT NULL,
  `functionName` varchar(40) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`logID`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

#
# Data for table "act_log"
#

INSERT INTO `act_log` VALUES (1,'5','行政单位管理','9','删除','2017-09-20 09:41:54'),(2,'5','实验室场地管理','2,6','删除','2017-09-20 09:42:51'),(3,'5','功能管理','58','创建','2017-09-20 09:49:01'),(4,'5','功能管理','59','创建','2017-09-20 09:50:11'),(5,'5','功能管理','60','创建','2017-09-20 09:51:27'),(6,'5','用户功能配置','60,59,58','角色功能添加','2017-09-20 09:51:54'),(7,'5','行政单位管理','11','创建','2017-09-20 11:02:06'),(8,'5','行政单位管理','12','创建','2017-09-20 17:25:15'),(9,'5','行政单位管理','13','创建','2017-09-20 17:25:42'),(10,'5','行政单位管理','14','创建','2017-09-21 08:27:45'),(11,'5','采购明细管理','13','批准','2017-09-21 12:47:13'),(12,'5','行政单位管理','20','创建','2017-09-23 01:32:44'),(13,'5','行政单位管理','24','创建','2017-09-23 01:47:22'),(14,'5','行政单位管理','26','创建','2017-09-23 15:38:34'),(15,'5','采购申请管理','14','申请','2017-09-25 09:07:54'),(16,'5','采购明细管理','14','申请','2017-09-25 09:08:11'),(17,'5','采购申请管理','14,13,12,11','删除','2017-09-25 09:08:30'),(18,'5','学生管理','1','删除','2017-09-25 09:09:49'),(19,'5','学校管理','3','删除','2017-09-25 09:15:26'),(20,'5','实验室场地管理','5','删除','2017-09-25 09:16:05'),(21,'5','实验室场地管理','6','创建','2017-09-25 09:17:04'),(22,'5','实验室场地管理','1','更新','2017-09-25 09:17:18'),(23,'5','实验室管理','1','创建','2017-09-25 09:21:05'),(24,'5','专业管理','1','创建','2017-09-25 09:26:05'),(25,'5','教师管理','4','更新','2017-09-25 09:26:45'),(26,'5','班级管理','1','创建','2017-09-25 09:27:25'),(27,'5','实验室申报','1','申请','2017-09-25 09:28:01'),(28,'5','学生管理','2','创建','2017-09-25 09:29:33'),(29,'5','经费类型管理','4','删除','2017-09-25 09:30:10'),(30,'5','经费类型管理','5','创建','2017-09-25 09:30:48'),(31,'5','经费类型管理','6','创建','2017-09-25 09:31:23'),(32,'5','经费类型管理','1','申请','2017-09-25 09:32:33'),(33,'5','经费类型管理','2','申请','2017-09-25 09:33:08'),(34,'5','经费类型管理','3','申请','2017-09-25 09:37:02'),(35,'5','经费类型管理','3','批准','2017-09-25 09:41:22'),(36,'5','经费类型管理','4','申请','2017-09-25 09:47:31'),(37,'5','经费类型管理','4','批准','2017-09-25 09:48:39'),(38,'5','实验室申报','1','删除','2017-09-25 09:50:18'),(39,'5','实验室申报','2','申请','2017-09-25 09:51:12'),(40,'5','实验室申报','3','申请','2017-09-25 09:54:46'),(41,'5','实验室申报','4','申请','2017-09-25 09:57:37'),(42,'5','实验室申报','4','批准','2017-09-25 09:59:03'),(43,'5','实验室申报','2','批准','2017-09-25 10:13:46'),(44,'5','实验室申报','3','批准','2017-09-25 10:27:27'),(45,'5','设备管理','1','创建','2017-09-25 10:31:08'),(46,'5','实验室申报','5','申请','2017-09-25 10:34:29'),(47,'5','实验室申报','5','批准','2017-09-25 10:34:47'),(48,'5','设备管理','1','创建','2017-09-25 10:36:20'),(49,'5','设备维修管理','1','更新','2017-09-25 10:36:43'),(50,'5','设备调拨','1','创建','2017-09-25 10:38:12'),(51,'5','设备报废','1','创建','2017-09-25 10:38:40'),(52,'5','供应商管理','3','申请','2017-09-25 10:39:49'),(53,'5','采购申请管理','1','申请','2017-09-25 10:40:48'),(54,'5','采购明细管理','1','申请','2017-09-25 10:41:57'),(55,'5','采购申请管理','1','批准','2017-09-25 10:42:25'),(56,'5','采购明细管理','1','批准','2017-09-25 10:43:03'),(57,'5','合同管理','1','创建','2017-09-25 10:44:06'),(58,'5','合同详细管理','1','创建','2017-09-25 10:44:51'),(59,'5','合同详细管理','1','更新','2017-09-25 10:46:16'),(60,'5','合同付款管理','1','创建','2017-09-25 10:46:33'),(61,'5','合同付款管理','1','更新','2017-09-25 10:47:34'),(62,'5','合同付款管理','1','创建','2017-09-25 10:50:29'),(63,'5','合同付款管理','1','更新','2017-09-25 10:51:00'),(64,'5','合同管理','2','创建','2017-09-25 10:55:11'),(65,'5','合同详细管理','2','创建','2017-09-25 10:56:12'),(66,'5','合同详细管理','2','更新','2017-09-25 10:56:55'),(67,'5','合同付款管理','2','创建','2017-09-25 10:57:10'),(68,'5','合同付款管理','2','更新','2017-09-25 10:57:29'),(69,'5','合同付款管理','2','更新','2017-09-25 10:57:37'),(70,'5','合同管理','3','创建','2017-09-25 10:58:37'),(71,'5','合同详细管理','3','创建','2017-09-25 10:59:17'),(72,'5','合同详细管理','3','更新','2017-09-25 10:59:30'),(73,'5','合同付款管理','3','创建','2017-09-25 10:59:44'),(74,'5','合同付款管理','3','更新','2017-09-25 11:00:02');

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

INSERT INTO `annual_budget` VALUES (1,'2018',29,5,'<p>购买电脑</p>',200000.00,NULL,NULL,1,'2017-09-25 09:32:02',NULL,NULL,'0','NA','',NULL),(2,'2018',20,6,'<p>出版费</p>',50000.00,NULL,NULL,0,'2017-09-25 09:32:45',NULL,NULL,'0','NA','',NULL),(3,'2018',29,6,'<p>研究经费&nbsp;</p>',20000.00,3000.00,11000.00,2,'2017-09-25 09:40:55',5,'2017-09-25 09:40:55','0','OP','','q55'),(4,'2019',22,5,'<p>qqq</p>',300000.00,500000.00,NULL,5,'2017-09-25 09:48:16',5,'2017-09-25 09:48:16','0','OP','','xq9999');

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

INSERT INTO `building` VALUES (1,'s123',1,'S楼',21,'',''),(6,'L023',1,'L楼',21,'','');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "classes"
#

INSERT INTO `classes` VALUES (1,'rq120','114053',1,1,'1','');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='合同管理';

#
# Data for table "contract"
#

INSERT INTO `contract` VALUES (1,3,'9266','镇徐家的采购',30000.00,'2017-09-13 00:00:00','2017-09-20 00:00:00','3','114053.xlsx','CL',''),(2,3,'1234444','镇徐家的采购',NULL,'2017-09-22 00:00:00','2017-09-14 00:00:00','1','','CL',''),(3,2,'1234','镇徐家的采购',1000.00,'2017-09-30 00:00:00','2017-09-28 00:00:00','1','','CL','');

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
  `closeTeacher` varchar(200) DEFAULT NULL COMMENT '建账人',
  `status` char(3) DEFAULT NULL COMMENT 'OP签约，DE交货，CL验收通过，NCL验收未通过',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`contractDetailID`),
  KEY `FK_ID` (`contractID`),
  CONSTRAINT `FK_ID` FOREIGN KEY (`contractID`) REFERENCES `contract` (`contractID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='合同明细';

#
# Data for table "contract_detail"
#

INSERT INTO `contract_detail` VALUES (1,1,1,3,13,'2','<p>8</p>',20.00,'台',10000.00,30000.00,'2017-09-21 00:00:00',2,'2017-09-27 00:00:00',1,'2017-09-22 00:00:00','王五','CL',''),(2,2,1,3,13,'1','<p>8</p>',20.00,'台',10000.00,1000.00,'2017-09-21 00:00:00',0,'2017-09-26 00:00:00',1,'2017-09-14 00:00:00','王五','NCL',''),(3,3,1,3,32,'2','<p>8</p>',20.00,'台',10000.00,1000.00,'2017-09-29 00:00:00',1,'2017-09-14 00:00:00',1,'2017-09-28 00:00:00','王五','CL','');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='合同付款管理';

#
# Data for table "contract_payment"
#

INSERT INTO `contract_payment` VALUES (1,1,'2017-09-30 00:00:00',30000.00,10000.00,'CL',''),(2,2,'2017-09-16 00:00:00',NULL,10000.00,'CL',''),(3,3,'2017-09-30 00:00:00',1000.00,3000.00,'CL','');

#
# Structure for table "contract_payment_detail"
#

DROP TABLE IF EXISTS `contract_payment_detail`;
CREATE TABLE `contract_payment_detail` (
  `contractPaymentDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `contractPaymentID` int(11) DEFAULT NULL,
  `paymentDate` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `paymentTeacherID` int(11) DEFAULT NULL,
  PRIMARY KEY (`contractPaymentDetailID`),
  KEY `FK_P_ID` (`contractPaymentID`),
  CONSTRAINT `FK_P_ID` FOREIGN KEY (`contractPaymentID`) REFERENCES `contract_payment` (`contractPaymentID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "contract_payment_detail"
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

#
# Data for table "department"
#

INSERT INTO `department` VALUES (20,'xp111','三江学院',NULL,'Y',''),(22,NULL,'文学',20,NULL,NULL),(24,'001','南京大学',NULL,'N',''),(26,'9','3',NULL,'Y',''),(27,NULL,'99',26,NULL,NULL),(28,NULL,'工科',20,NULL,NULL),(29,NULL,'计算机学院',28,NULL,NULL);

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
  `status` char(4) DEFAULT NULL COMMENT 'RU运行 CL报废 CR报废再利用 RP维修 MISS报失',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`equipmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='设备管理';

#
# Data for table "equipment"
#

INSERT INTO `equipment` VALUES (1,'123','方正','x3','3','2017-09-23 00:00:00','5',1,'2017-09-20 00:00:00','2','1','1','2','1',123.00,'机房',123.00,123.00,'','方正','2017-09-27 00:00:00','123','len',29,'1',1,1,4,1,'CR','');

#
# Structure for table "equipment_maintain"
#

DROP TABLE IF EXISTS `equipment_maintain`;
CREATE TABLE `equipment_maintain` (
  `equipmentMaintainID` int(11) NOT NULL AUTO_INCREMENT,
  `equipmentID` int(11) DEFAULT NULL,
  `applier` varchar(40) DEFAULT NULL,
  `applyDate` datetime DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `checker` varchar(40) DEFAULT NULL,
  `checkDate` datetime DEFAULT NULL,
  `status` char(2) DEFAULT NULL COMMENT 'OP 维修 CL 验收',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`equipmentMaintainID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='设备维修';

#
# Data for table "equipment_maintain"
#

INSERT INTO `equipment_maintain` VALUES (1,1,'王五','2017-09-25 10:36:14','','王五','2017-09-25 10:36:40','CL','');

#
# Structure for table "equipment_scrap"
#

DROP TABLE IF EXISTS `equipment_scrap`;
CREATE TABLE `equipment_scrap` (
  `equipmentScrapID` int(11) NOT NULL AUTO_INCREMENT,
  `equipmentID` int(11) DEFAULT NULL,
  `brokerage` varchar(40) DEFAULT NULL,
  `brokerageDate` datetime DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `status` char(2) DEFAULT NULL COMMENT 'CL报废  CR 报废再利用',
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`equipmentScrapID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='设备报废';

#
# Data for table "equipment_scrap"
#

INSERT INTO `equipment_scrap` VALUES (1,1,'王五','2017-09-25 10:38:31','了，','CR','');

#
# Structure for table "equipment_transfer"
#

DROP TABLE IF EXISTS `equipment_transfer`;
CREATE TABLE `equipment_transfer` (
  `equipmentTransferID` int(11) NOT NULL AUTO_INCREMENT,
  `equipmentID` int(11) DEFAULT NULL,
  `brokerage` varchar(40) DEFAULT NULL,
  `brokerageDate` datetime DEFAULT NULL,
  `oldLaboratoryID` int(11) DEFAULT NULL,
  `newLaboratoryID` int(11) DEFAULT NULL,
  `oldRoomID` int(11) DEFAULT NULL,
  `newRoomID` int(11) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`equipmentTransferID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='调拨';

#
# Data for table "equipment_transfer"
#

INSERT INTO `equipment_transfer` VALUES (1,1,'王五','2017-09-25 10:38:04',NULL,4,NULL,1,'','');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='学校费用管理';

#
# Data for table "fee"
#

INSERT INTO `fee` VALUES (5,'1','器材采购',800000.00,500000.00,0,'2017-09-25 09:30:13','OP','',''),(6,'1','科研经费',100000.00,3000.00,0,'2017-09-25 09:30:53','OP','','');

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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

#
# Data for table "functions"
#

INSERT INTO `functions` VALUES (1,'001003001','用户维护','fa fa-user','/right/user/index',10,NULL,1),(2,'001003002','角色维护','fa fa-users','/right/role/index',20,NULL,1),(3,'001003003','模块维护','fa fa-list-ul','/right/module/index',30,NULL,1),(4,'001003004','功能维护','fa fa-tags','/right/functions/index',40,NULL,1),(5,'001','权限配置',' fa fa-link','/right/config/index',50,'',1),(6,'001004001','日志查看','fa fa-file-text','/log/log/index',4001,'',2),(23,'001005008','教师信息','','/basicinfo/teacher/index',5008,'',10),(24,'001005001','学校信息','','/basicinfo/school/index',5001,'',10),(25,'001005009','学生信息','','/basicinfo/student/index',5009,'',10),(26,'001005003','实验场地信息','','/basicinfo/building/index',5003,'',10),(27,'001005004','实验室信息','','/basicinfo/room/index',5004,'',10),(28,'001005006','专业信息','','/basicinfo/major/index',5006,'',10),(29,'001005005','部门信息','','/basicinfo/department/index',5005,'',10),(30,'001005008','班级信息','','/basicinfo/classes/index',5008,'',10),(31,'001005002','校区信息','','/basicinfo/campus/index',5002,'',10),(32,'001006001','经费类型管理','','/budget/fee-type/index',6001,'',13),(33,'001006002','学校经费管理','','/budget/school-fees/index',6002,'',13),(34,'001006003','年度预算审核','','/budget/annual-budget/index',6005,'',13),(35,'001006004','年度预算申请','','/budget/my-annual-budget/index',6004,'',13),(36,'001006005','经费分析图表','','/analysis/budget-analysis/index',6006,'',13),(37,'001007001','实验室审核','','/laboratory/lab/index',7002,'',14),(38,'001007002','实验室申报','','/laboratory/my-lab/index',7001,'',14),(41,'001007003','实验室资源管理','','/laboratory/lab-resources/index',7004,'',14),(42,'001008001','实验室设备基本信息管理','','/equipment/equip/index',8001,'',15),(43,'001008003','设备维修管理','','/equipment/equip-maintain/index',8003,'',15),(44,'001008004','设备调拨管理','','/equipment/equip-transfer/index',8004,'',15),(45,'001008005','设备报废管理','','/equipment/equip-scrap/index',8005,'',15),(46,'001009001','供应商管理','','/purchase/vendor/index',9001,'',16),(47,'001009002','采购目录管理','','/purchase/purchase-catalogue/index',9002,'',16),(48,'001009003','物资采购申请','','/purchase/my-purchase/index',9003,'',16),(49,'001009004','物资采购审批','','/purchase/purchase/index',9004,'',16),(50,'001009005','采购明细总览','','/purchase/purchase-detail/index',9005,'',16),(51,'001007004','实验室验收','','/laboratory/lab-tea/index',7003,'',14),(52,'001008002','申请维修设备','','/equipment/equip-apply/index',8002,'',15),(53,'001009006','采购合同','','/purchase/contract/index',9006,'',16),(54,'001009008','合同预付款管理','','/purchase/contract-payment/index',9008,'',16),(56,'001006006','年度预算总览','','/budget/all-annual-budget/index',6003,'',13),(57,'001009009','采购明细审批','','/purchase/approval-purchase-detail/index',9004,'',16),(58,'001007009','教师成果展示','','/laboratory/tea-ach/index',7007,'',14),(59,'001007007','实验室人员管理','','/laboratory/lab-tea/index',7006,'',14),(60,'001007006','实验室用房管理','','/laboratory/lab-room/index',7005,'',14);

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
  `handlerName` varchar(40) DEFAULT NULL,
  `checkName` int(11) DEFAULT NULL,
  `buildStatus` varchar(20) NOT NULL DEFAULT '' COMMENT '建造状态，‘NEW’=‘新建’，‘ADD’=‘扩建’，‘CHANGE’=‘改建’',
  PRIMARY KEY (`laboratoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='实验室';

#
# Data for table "laboratory"
#

INSERT INTO `laboratory` VALUES (2,'jy123','聚萤工作室',1,'教',NULL,0,NULL,'2017-09-25 09:50:23','2017-09-25 10:13:39',NULL,NULL,'18252055872','',200000.00,'OP','','1','1',NULL,''),(3,'1','1',1,'教',NULL,0,NULL,'2017-09-25 09:54:19','2017-09-25 10:27:22',NULL,NULL,'18065874521','<p>1</p>',1.00,'OP','','1','李四',NULL,''),(4,'ios','ios',0,'教',NULL,0,NULL,'2017-09-25 09:57:16','2017-09-25 09:58:17',NULL,NULL,'18065874521','<p>1</p>',1.00,'OP','','0','李四',NULL,''),(5,'13','22',0,'教',NULL,0,NULL,'2017-09-25 10:34:03','2017-09-25 10:34:37',NULL,NULL,'18065874521','<p>1</p>',1.00,'OP','','1','李四',NULL,'');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "major"
#

INSERT INTO `major` VALUES (1,'rq053','软件工程（嵌入式培养）','',29,'3','工科','Y','','');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='采购申请';

#
# Data for table "purchase"
#

INSERT INTO `purchase` VALUES (1,'镇徐家的采购',29,2,'2017-09-25 10:40:14','PR','垃圾清理.bat','');

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

INSERT INTO `purchase_catalogue` VALUES (12,'01',NULL,'电脑','3','1','1',''),(13,'0102','01','笔记本电脑','2','1','1',''),(14,'02',NULL,'桌子','1','1','1',''),(17,'0201','02','办公桌','6','1','1',''),(30,'020101','0201','高桌','','1','1',''),(32,'01020301','','联想笔记本v1000','','3','1','');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='采购申请明细';

#
# Data for table "purchase_detail"
#

INSERT INTO `purchase_detail` VALUES (1,1,4,13,'<p>方正电脑&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>','<p>8</p>',20.00,'台',10000.00,30000.00,'PR','');

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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

#
# Data for table "role_function"
#

INSERT INTO `role_function` VALUES (1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,1,1,'1','1','1','0','1','0','0','0','0','0',NULL),(27,2,1,'1','1','1','0','1','1','0','0','0','0',NULL),(28,3,1,'1','1','1','0','1','1','0','0','0','0',NULL),(29,4,1,'1','1','1','0','1','1','0','0','0','0',NULL),(30,6,1,'0','0','0','0','0','0','0','0','0','0',NULL),(34,23,1,'1','1','1','0','0','0','0','0','0','0',NULL),(35,24,1,'1','1','1','0','1','1','0','0','0','0',NULL),(36,25,1,'1','1','1','0','0','0','0','0','0','0',NULL),(37,26,1,'1','1','1','0','0','0','0','0','0','0',NULL),(38,27,1,'1','1','1','0','0','0','0','0','0','0',NULL),(39,28,1,'1','1','1','0','1','1','0','0','0','0',NULL),(40,29,1,'1','1','1','0','0','0','0','0','0','0',NULL),(41,30,1,'1','1','1','0','0','0','0','0','0','0',NULL),(42,31,1,'1','1','1','0','0','0','0','0','0','0',NULL),(46,34,1,'1','1','1','0','0','0','0','0','0','0',NULL),(47,33,1,'1','1','1','0','0','0','0','0','0','0',NULL),(49,32,1,'1','1','1','0','0','0','0','0','0','0',NULL),(50,35,1,'1','1','1','0','0','0','0','0','0','0',NULL),(51,36,1,'0','0','0','0','0','0','0','0','0','0',NULL),(52,36,6,'0','0','0','0','0','0','0','0','0','0',NULL),(53,34,6,'0','1','0','0','0','0','0','0','0','0',NULL),(54,33,6,'1','1','1','0','0','0','0','0','0','0',NULL),(55,32,6,'0','0','0','0','0','0','0','0','0','0',NULL),(56,31,6,'0','0','0','0','0','0','0','0','0','0',NULL),(57,30,6,'0','0','0','0','0','0','0','0','0','0',NULL),(58,29,6,'0','0','0','0','0','0','0','0','0','0',NULL),(59,28,6,'0','0','0','0','0','0','0','0','0','0',NULL),(60,27,6,'0','0','0','0','0','0','0','0','0','0',NULL),(61,26,6,'0','0','0','0','0','0','0','0','0','0',NULL),(62,25,6,'0','0','0','0','0','0','0','0','0','0',NULL),(63,24,6,'0','0','0','0','0','0','0','0','0','0',NULL),(64,23,6,'0','0','0','0','0','0','0','0','0','0',NULL),(65,36,7,'0','0','0','0','0','0','0','0','0','0',NULL),(66,35,7,'1','1','1','0','0','0','0','0','0','0',NULL),(67,34,7,'0','0','0','0','0','0','0','0','0','0',NULL),(68,33,7,'0','0','0','0','0','0','0','0','0','0',NULL),(69,32,7,'0','0','0','0','0','0','0','0','0','0',NULL),(70,31,7,'0','0','0','0','0','0','0','0','0','0',NULL),(71,30,7,'0','0','0','0','0','0','0','0','0','0',NULL),(72,29,7,'0','0','0','0','0','0','0','0','0','0',NULL),(73,28,7,'0','0','0','0','0','0','0','0','0','0',NULL),(74,27,7,'0','0','0','0','0','0','0','0','0','0',NULL),(75,26,7,'0','0','0','0','0','0','0','0','0','0',NULL),(76,25,7,'0','0','0','0','0','0','0','0','0','0',NULL),(77,24,7,'0','0','0','0','0','0','0','0','0','0',NULL),(78,23,7,'0','0','0','0','0','0','0','0','0','0',NULL),(79,45,1,'1','1','1','0','0','0','0','0','0','0',NULL),(80,44,1,'1','1','1','0','0','0','0','0','0','0',NULL),(81,43,1,'1','1','1','0','0','0','0','0','0','0',NULL),(82,42,1,'1','1','1','0','0','0','0','0','0','0',NULL),(83,41,1,'1','1','1','0','0','0','0','0','0','0',NULL),(84,38,1,'1','1','1','0','0','0','0','0','0','0',NULL),(85,37,1,'0','1','0','0','0','0','0','0','0','0',NULL),(86,49,1,'1','1','1','0','0','0','0','0','0','0',NULL),(87,48,1,'1','1','1','0','0','0','0','0','0','0',NULL),(88,47,1,'1','1','1','0','0','0','0','0','0','0',NULL),(89,46,1,'1','1','1','0','0','0','0','0','0','0',NULL),(90,50,1,'1','1','1','0','0','0','0','0','0','0',NULL),(91,51,1,'0','1','0','0','0','0','0','0','0','0',NULL),(92,52,1,'1','0','1','0','0','0','0','0','0','0',NULL),(93,53,1,'1','1','1','0','0','0','0','0','0','0',NULL),(94,54,1,'1','1','1','0','0','0','0','0','0','0',NULL),(96,56,1,'0','1','0','0','0','0','0','0','0','0',NULL),(97,57,1,'0','1','1','0','0','0','0','0','0','0',NULL),(98,60,1,'1','1','1','0','0','0','0','0','0','0',NULL),(99,59,1,'1','1','1','0','0','0','0','0','0','0',NULL),(100,58,1,'1','1','1','0','0','0','0','0','0','0',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "room"
#

INSERT INTO `room` VALUES (1,'jy705',1,'聚萤工作室',21,'',0,NULL,NULL,NULL,'Y','','','');

#
# Structure for table "school"
#

DROP TABLE IF EXISTS `school`;
CREATE TABLE `school` (
  `schoolID` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增，主键',
  `remark` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`schoolID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='学校基本信息';

#
# Data for table "school"
#

INSERT INTO `school` VALUES (2,'','三江');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "student"
#

INSERT INTO `student` VALUES (2,'12014053036','12014053036','周宏伟','1',1,'3','1','18252055872@163.com','18252055872','');

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

INSERT INTO `teacher` VALUES (3,'56546','张三','1',6,'555',NULL,'','','2',NULL,'',NULL,''),(4,'888','李四','1',29,'',NULL,'','','1',NULL,'',NULL,''),(5,'99','王五','2',9,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'');

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

INSERT INTO `user` VALUES (1,'10001','$2y$13$2FiAG.GMdyDnueablY6iTuGn5l1sXRsYPnDQhOodKoelkeESS3x.S',5,NULL,NULL,13),(15,'zhw001','$2y$13$VkaBg7E1fGs4dKUrcGh9YOjUETXzThscVAutYN9VEI7W2lY4sH8ke',3,'',NULL,13),(16,'zhw002','$2y$13$Xzq62Xb1eDG4efzsktxAUedBjvMlBy9lezFWjFCuPmJHyxyPAc7zO',4,'',NULL,13);

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
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8;

#
# Data for table "user_function"
#

INSERT INTO `user_function` VALUES (1,5,1,'1','0','1','1','0','0','0',NULL,NULL,NULL,NULL),(67,1,1,'1','1','1','0','1','0','0','0','0','0',NULL),(68,2,1,'1','1','1','0','1','1','0','0','0','0',NULL),(69,3,1,'1','1','1','0','1','1','0','0','0','0',NULL),(70,4,1,'1','1','1','0','1','1','0','0','0','0',NULL),(71,6,1,'0','0','0','0','0','0','0','0','0','0',NULL),(87,23,1,'1','1','1','0','0','0','0','0','0','0',NULL),(89,24,1,'1','1','1','0','1','1','0','0','0','0',NULL),(91,25,1,'1','1','1','0','0','0','0','0','0','0',NULL),(93,26,1,'1','1','1','0','0','0','0','0','0','0',NULL),(95,27,1,'1','1','1','0','0','0','0','0','0','0',NULL),(97,28,1,'1','1','1','0','1','1','0','0','0','0',NULL),(99,29,1,'1','1','1','0','0','0','0','0','0','0',NULL),(101,30,1,'1','1','1','0','0','0','0','0','0','0',NULL),(103,31,1,'1','1','1','0','0','0','0','0','0','0',NULL),(108,34,1,'1','1','1','0','0','0','0','0','0','0',NULL),(109,33,1,'1','1','1','0','0','0','0','0','0','0',NULL),(111,32,1,'1','1','1','0','0','0','0','0','0','0',NULL),(112,35,1,'1','1','1','0','0','0','0','0','0','0',NULL),(113,36,1,'0','0','0','0','0','0','0','0','0','0',NULL),(114,36,15,'0','0','0','0','0','0','0','0','0','0',NULL),(115,34,15,'0','1','0','0','0','0','0','0','0','0',NULL),(116,33,15,'1','1','1','0','0','0','0','0','0','0',NULL),(117,32,15,'0','0','0','0','0','0','0','0','0','0',NULL),(118,31,15,'0','0','0','0','0','0','0','0','0','0',NULL),(119,30,15,'0','0','0','0','0','0','0','0','0','0',NULL),(120,29,15,'0','0','0','0','0','0','0','0','0','0',NULL),(121,28,15,'0','0','0','0','0','0','0','0','0','0',NULL),(122,27,15,'0','0','0','0','0','0','0','0','0','0',NULL),(123,26,15,'0','0','0','0','0','0','0','0','0','0',NULL),(124,25,15,'0','0','0','0','0','0','0','0','0','0',NULL),(125,24,15,'0','0','0','0','0','0','0','0','0','0',NULL),(126,23,15,'0','0','0','0','0','0','0','0','0','0',NULL),(127,36,16,'0','0','0','0','0','0','0','0','0','0',NULL),(128,35,16,'1','1','1','0','0','0','0','0','0','0',NULL),(129,34,16,'0','0','0','0','0','0','0','0','0','0',NULL),(130,33,16,'0','0','0','0','0','0','0','0','0','0',NULL),(131,32,16,'0','0','0','0','0','0','0','0','0','0',NULL),(132,31,16,'0','0','0','0','0','0','0','0','0','0',NULL),(133,30,16,'0','0','0','0','0','0','0','0','0','0',NULL),(134,29,16,'0','0','0','0','0','0','0','0','0','0',NULL),(135,28,16,'0','0','0','0','0','0','0','0','0','0',NULL),(136,27,16,'0','0','0','0','0','0','0','0','0','0',NULL),(137,26,16,'0','0','0','0','0','0','0','0','0','0',NULL),(138,25,16,'0','0','0','0','0','0','0','0','0','0',NULL),(139,24,16,'0','0','0','0','0','0','0','0','0','0',NULL),(140,23,16,'0','0','0','0','0','0','0','0','0','0',NULL),(141,45,1,'1','1','1','0','0','0','0','0','0','0',NULL),(142,44,1,'1','1','1','0','0','0','0','0','0','0',NULL),(143,43,1,'1','1','1','0','0','0','0','0','0','0',NULL),(144,42,1,'1','1','1','0','0','0','0','0','0','0',NULL),(145,41,1,'1','1','1','0','0','0','0','0','0','0',NULL),(146,38,1,'1','1','1','0','0','0','0','0','0','0',NULL),(147,37,1,'0','1','0','0','0','0','0','0','0','0',NULL),(148,49,1,'1','1','1','0','0','0','0','0','0','0',NULL),(149,48,1,'1','1','1','0','0','0','0','0','0','0',NULL),(150,47,1,'1','1','1','0','0','0','0','0','0','0',NULL),(151,46,1,'1','1','1','0','0','0','0','0','0','0',NULL),(152,50,1,'1','1','1','0','0','0','0','0','0','0',NULL),(153,51,1,'0','1','0','0','0','0','0','0','0','0',NULL),(154,52,1,'1','0','1','0','0','0','0','0','0','0',NULL),(155,53,1,'1','1','1','0','0','0','0','0','0','0',NULL),(156,54,1,'1','1','1','0','0','0','0','0','0','0',NULL),(158,56,1,'0','1','0','0','0','0','0','0','0','0',NULL),(159,57,1,'0','1','1','0','0','0','0','0','0','0',NULL),(160,60,1,'1','1','1','0','0','0','0','0','0','0',NULL),(161,59,1,'1','1','1','0','0','0','0','0','0','0',NULL),(162,58,1,'1','1','1','0','0','0','0','0','0','0',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

#
# Data for table "user_module"
#

INSERT INTO `user_module` VALUES (1,1,1,NULL),(7,1,1,NULL),(8,1,1,NULL),(9,1,1,NULL),(10,1,1,NULL),(11,1,2,NULL),(12,13,1,NULL),(13,13,1,NULL),(14,13,1,NULL),(15,13,1,NULL),(16,13,1,NULL),(17,13,2,NULL),(18,14,1,NULL),(19,14,1,NULL),(20,14,1,NULL),(21,14,1,NULL),(22,14,1,NULL),(23,14,2,NULL),(24,14,1,NULL),(25,14,1,NULL),(26,14,2,NULL),(27,1,10,NULL),(28,13,10,NULL),(29,1,10,NULL),(30,13,10,NULL),(31,1,10,NULL),(32,13,10,NULL),(33,1,10,NULL),(34,13,10,NULL),(35,1,10,NULL),(36,13,10,NULL),(37,1,10,NULL),(38,13,10,NULL),(39,1,10,NULL),(40,13,10,NULL),(41,1,10,NULL),(42,13,10,NULL),(43,1,1,NULL),(44,13,1,NULL),(45,1,13,NULL),(46,1,13,NULL),(47,1,13,NULL),(48,1,13,NULL),(49,1,13,NULL),(50,1,13,NULL),(51,1,13,NULL),(52,1,13,NULL),(53,1,13,NULL),(54,15,13,NULL),(55,15,13,NULL),(56,15,13,NULL),(57,15,13,NULL),(58,15,10,NULL),(59,15,10,NULL),(60,15,10,NULL),(61,15,10,NULL),(62,15,10,NULL),(63,15,10,NULL),(64,15,10,NULL),(65,15,10,NULL),(66,15,10,NULL),(67,16,13,NULL),(68,16,13,NULL),(69,16,13,NULL),(70,16,13,NULL),(71,16,13,NULL),(72,16,10,NULL),(73,16,10,NULL),(74,16,10,NULL),(75,16,10,NULL),(76,16,10,NULL),(77,16,10,NULL),(78,16,10,NULL),(79,16,10,NULL),(80,16,10,NULL),(81,1,15,NULL),(82,1,15,NULL),(83,1,15,NULL),(84,1,15,NULL),(85,1,14,NULL),(86,1,14,NULL),(87,1,14,NULL),(88,1,16,NULL),(89,1,16,NULL),(90,1,16,NULL),(91,1,16,NULL),(92,1,16,NULL),(93,1,14,NULL),(94,1,15,NULL),(95,1,16,NULL),(96,1,16,NULL),(97,1,16,NULL),(98,1,13,NULL),(99,1,16,NULL),(100,1,14,NULL),(101,1,14,NULL),(102,1,14,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='供应商管理';

#
# Data for table "vendor"
#

INSERT INTO `vendor` VALUES (2,'sj3332','12345689','联想',NULL,'乐扣','193256@163.com','1965833223','999999','','','','',''),(3,'fz123','123456','方正',NULL,'周宏伟','182@163.com','182520555872','','','','','','');
