/*
Navicat MySQL Data Transfer

Source Server         : jyLab@127.0.0.1
Source Server Version : 50547
Source Host           : 127.0.0.1:3306
Source Database       : jy_lab

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-04-26 17:52:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for act_log
-- ----------------------------
DROP TABLE IF EXISTS `act_log`;
CREATE TABLE `act_log` (
  `logID` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`logID`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of act_log
-- ----------------------------

-- ----------------------------
-- Table structure for functions
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of functions
-- ----------------------------
INSERT INTO `functions` VALUES ('1', '001003001', '用户维护', 'fa fa-user', '/right/user/index', '10', null, '1');
INSERT INTO `functions` VALUES ('2', '001003002', '角色维护', 'fa fa-users', '/right/role/index', '20', null, '1');
INSERT INTO `functions` VALUES ('3', '001003003', '模块维护', 'fa fa-list-ul', '/right/module/index', '30', null, '1');
INSERT INTO `functions` VALUES ('4', '001003004', '功能维护', 'fa fa-tags', '/right/functions/index', '40', null, '1');
INSERT INTO `functions` VALUES ('6', '001004001', '日志查看', 'fa fa-file-text', '/log/log/index', '10', '', '2');
INSERT INTO `functions` VALUES ('5', '001', '权限配置', ' fa fa-link', '/right/config/index', '50', '', '1');

-- ----------------------------
-- Table structure for modules
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `moduleID` int(11) NOT NULL AUTO_INCREMENT,
  `moduleCode` varchar(40) DEFAULT NULL COMMENT '编号',
  `name` varchar(255) DEFAULT NULL COMMENT '名字',
  `sort` int(4) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`moduleID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES ('1', '001003', '权限管理', '30', '1');
INSERT INTO `modules` VALUES ('2', '001004', '日志管理', '40', null);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `roleID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `roleCode` varchar(40) NOT NULL COMMENT '编号',
  `sort` int(4) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT '名字',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`roleID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', '001', null, '超级管理员', '所有权限');

-- ----------------------------
-- Table structure for role_function
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role_function
-- ----------------------------
INSERT INTO `role_function` VALUES ('1', '5', '1', null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '', '$2y$13$2FiAG.GMdyDnueablY6iTuGn5l1sXRsYPnDQhOodKoelkeESS3x.S', '10001', null, null, '1');

-- ----------------------------
-- Table structure for user_function
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_function
-- ----------------------------
INSERT INTO `user_function` VALUES ('1', '5', '1', '1', '0', '1', '1', '0', '0', '0', null, null, null, null);

-- ----------------------------
-- Table structure for user_laboratory
-- ----------------------------
DROP TABLE IF EXISTS `user_laboratory`;
CREATE TABLE `user_laboratory` (
  `userModuleID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `laboratoryID` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userModuleID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_laboratory
-- ----------------------------

-- ----------------------------
-- Table structure for user_module
-- ----------------------------
DROP TABLE IF EXISTS `user_module`;
CREATE TABLE `user_module` (
  `userModuleID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `moduleID` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userModuleID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_module
-- ----------------------------
INSERT INTO `user_module` VALUES ('1', '1', '1', null);

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `userRoleID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`userRoleID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('1', '1', '1', null);
SET FOREIGN_KEY_CHECKS=1;
