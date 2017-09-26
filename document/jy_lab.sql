/*
Navicat MySQL Data Transfer

Source Server         : root@127.0.0.1
Source Server Version : 50547
Source Host           : 127.0.0.1:3306
Source Database       : jy_lab

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-04-21 15:31:41
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
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of act_log
-- ----------------------------
INSERT INTO `act_log` VALUES ('38', '10001于2017-04-21 15:29:35在功能管理模块下对ID=19进行了删除操作', '2017-04-21 15:29:35');
INSERT INTO `act_log` VALUES ('37', '10001于2017-04-21 15:29:15在功能管理模块下对ID=20进行了删除操作', '2017-04-21 15:29:15');
INSERT INTO `act_log` VALUES ('36', '10001于2017-04-21 15:25:12在功能管理模块下对ID=20进行了更新操作', '2017-04-21 15:25:12');
INSERT INTO `act_log` VALUES ('35', '10001于2017-04-21 15:24:08在功能管理模块下对ID=20进行了创建操作', '2017-04-21 15:24:08');
INSERT INTO `act_log` VALUES ('34', '10001于2017-04-21 15:17:20在功能管理模块下对ID=19进行了创建操作', '2017-04-21 15:17:20');
INSERT INTO `act_log` VALUES ('33', '10001于2017-04-21 10:21:28在功能管理模块下对ID=18进行了创建操作', '2017-04-21 10:21:28');
INSERT INTO `act_log` VALUES ('32', '10001于2017-04-20 19:59:39在功能管理模块下对ID=9进行了更新操作', '2017-04-20 19:59:39');
INSERT INTO `act_log` VALUES ('31', '10001于2017-04-20 19:47:11在功能管理模块下对ID=13进行了更新操作', '2017-04-20 19:47:11');
INSERT INTO `act_log` VALUES ('30', '10001于2017-04-20 19:40:56在功能管理模块下对ID=2进行了更新操作', '2017-04-20 19:40:56');
INSERT INTO `act_log` VALUES ('29', '10001于2017-04-20 19:39:45在模块管理模块下对ID=2进行了更新操作', '2017-04-20 19:39:45');
INSERT INTO `act_log` VALUES ('28', '10001于2017-04-20 19:38:13在角色管理模块下对ID=4进行了删除操作', '2017-04-20 19:38:13');
INSERT INTO `act_log` VALUES ('27', '10001于2017-04-20 19:37:52在角色管理模块下对ID=4进行了更新操作', '2017-04-20 19:37:52');
INSERT INTO `act_log` VALUES ('26', '10001于2017-04-20 19:37:34在角色管理模块下对ID=4进行了创建操作', '2017-04-20 19:37:34');
INSERT INTO `act_log` VALUES ('25', '10001于2017-04-20 19:26:14在功能管理模块下对ID=1进行了更新操作', '2017-04-20 19:26:14');
INSERT INTO `act_log` VALUES ('24', '10001于2017-04-20 19:25:57在功能管理模块下对ID=17,16进行了删除操作', '2017-04-20 19:25:57');
INSERT INTO `act_log` VALUES ('23', '10001于2017-04-20 19:25:42在功能管理模块下对ID=17进行了创建操作', '2017-04-20 19:25:42');
INSERT INTO `act_log` VALUES ('22', '10001于2017-04-20 19:25:22在功能管理模块下对ID=16进行了创建操作', '2017-04-20 19:25:22');

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of functions
-- ----------------------------
INSERT INTO `functions` VALUES ('1', '001001001', '功能1', '', '001001001', '10', '1111', '1');
INSERT INTO `functions` VALUES ('2', '001001002', '功能2', '', '001001002', '20', '', '1');
INSERT INTO `functions` VALUES ('3', '001002001', '功能3', null, '001002001', '10', null, '2');
INSERT INTO `functions` VALUES ('4', '001002002', '功能4', null, '001002002', '20', null, '2');
INSERT INTO `functions` VALUES ('5', '001003001', '用户维护', 'fa fa-user', '/right/user/index', '10', null, '3');
INSERT INTO `functions` VALUES ('6', '001003002', '角色维护', 'fa fa-users', '/right/role/index', '20', null, '3');
INSERT INTO `functions` VALUES ('7', '001003003', '模块维护', 'fa fa-list-ul', '/right/module/index', '30', null, '3');
INSERT INTO `functions` VALUES ('8', '001003004', '功能维护', 'fa fa-tags', '/right/functions/index', '40', null, '3');
INSERT INTO `functions` VALUES ('9', '001003005', '用户角色配置', ' fa fa-link', '001003005', '50', '', '3');
INSERT INTO `functions` VALUES ('10', '001003006', '角色功能配置', null, '001003006', '60', null, '3');
INSERT INTO `functions` VALUES ('11', '001003007', '模块功能配置', null, '001003007', '70', null, '3');
INSERT INTO `functions` VALUES ('12', '001003008', '用户实验室配置', null, '001003008', '80', null, '3');
INSERT INTO `functions` VALUES ('13', '001004001', '日志查看', 'fa fa-file-text', '/log/log/index', '10', '', '4');
INSERT INTO `functions` VALUES ('18', '001', '权限配置', ' fa fa-link', '/right/config/index', '90', '', '3');

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
INSERT INTO `modules` VALUES ('1', '001001', '模块1', '10', null);
INSERT INTO `modules` VALUES ('2', '001002', '模块2', '20', '');
INSERT INTO `modules` VALUES ('3', '001003', '权限管理', '30', '1');
INSERT INTO `modules` VALUES ('4', '001004', '日志管理', '40', null);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role_function
-- ----------------------------

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
INSERT INTO `user` VALUES ('1', '', '$2y$13$2FiAG.GMdyDnueablY6iTuGn5l1sXRsYPnDQhOodKoelkeESS3x.S', '10001', null, null, '3');
INSERT INTO `user` VALUES ('2', '001', '$2y$13$.MvNCgjZuNkYIRz8gKBhYOPAhgbLrq/Ed3sZ.iUZK8CNtowON/evO', '10002', '1112', null, '2');
INSERT INTO `user` VALUES ('4', '001', '$2y$13$5IWZ9d.8aXO4T4iEkfzBb.WE8nlpDBajjyXULMdZuum0tCAgblD1K', '10003', '12345', null, null);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_function
-- ----------------------------
INSERT INTO `user_function` VALUES ('1', '5', '1', '1', '1', '1', '1', '1', '1', '1', null, null, null, null);
INSERT INTO `user_function` VALUES ('2', '4', '2', '1', '0', '1', '1', '1', '1', '1', null, null, null, null);
INSERT INTO `user_function` VALUES ('3', '6', '1', '1', '1', '1', '1', '1', '1', '1', '', '', null, null);
INSERT INTO `user_function` VALUES ('4', '7', '1', '1', '1', '1', '1', '1', '1', '1', null, null, null, null);
INSERT INTO `user_function` VALUES ('5', '8', '1', '1', '1', '1', '1', '1', '1', '1', null, null, null, null);
INSERT INTO `user_function` VALUES ('6', '2', '1', '1', '1', '1', '1', '1', '1', '1', null, null, null, null);
INSERT INTO `user_function` VALUES ('7', '13', '1', '0', '0', '0', '1', '0', '0', '0', null, null, null, null);
INSERT INTO `user_function` VALUES ('9', '18', '1', '0', '0', '0', '1', '0', '0', '0', null, null, null, null);

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
INSERT INTO `user_module` VALUES ('2', '1', '2', null);
INSERT INTO `user_module` VALUES ('3', '1', '3', null);
INSERT INTO `user_module` VALUES ('4', '2', '2', null);
INSERT INTO `user_module` VALUES ('5', '3', '1', null);
INSERT INTO `user_module` VALUES ('6', '1', '4', null);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_role
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
