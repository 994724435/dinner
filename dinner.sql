/*
Navicat MySQL Data Transfer

Source Server         : 本地开发
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : dinner

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-11-28 18:36:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(30) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '123@qq.com', '1');
INSERT INTO `admin` VALUES ('4', 'root', '63a9f0ea7bb98050796b649e85481845', '456@qq.com', '2');

-- ----------------------------
-- Table structure for `list`
-- ----------------------------
DROP TABLE IF EXISTS `list`;
CREATE TABLE `list` (
  `Lid` int(8) NOT NULL AUTO_INCREMENT,
  `Lnum` varchar(10) DEFAULT NULL,
  `Ltype` varchar(20) DEFAULT NULL,
  `Lname` varchar(10) DEFAULT NULL,
  `Limg` varchar(20) DEFAULT 'images/3g.jpg',
  `Ldis` text,
  `Ltime` varchar(18) DEFAULT NULL,
  `Lplace` varchar(11) DEFAULT '0',
  `Ladmin` varchar(12) DEFAULT NULL,
  `Ldi` varchar(20) DEFAULT NULL,
  `Lbig_img` varchar(50) DEFAULT NULL,
  `Lsmall_img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Lid`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of list
-- ----------------------------
INSERT INTO `list` VALUES ('25', '13', '川菜', '青椒鸡丁', 'images/3g.jpg', '青椒鸡丁，很好吃！', '2016-11-26', '0', null, null, './Public/Uploads/5838e611689f3.jpg', './Public/Uploads/s/s1_5838e611689f3.jpg');
INSERT INTO `list` VALUES ('24', '18', '粤菜', '白切鸡', 'images/3g.jpg', '香嫩可口，香嫩可口！', '2016-11-26', '0', null, null, './Public/Uploads/5838e47252b9b.jpg', './Public/Uploads/s/s1_5838e47252b9b.jpg');
INSERT INTO `list` VALUES ('26', '30', '湘菜', '火腿白菜', 'images/3g.jpg', '火腿白菜，下饭菜！', '2016-11-26', '0', null, null, './Public/Uploads/5838e4bfa8b1a.jpg', './Public/Uploads/s/s1_5838e4bfa8b1a.jpg');
INSERT INTO `list` VALUES ('27', '23.0', '川菜', '锅头肉', 'images/3g.jpg', '酥脆可口，大份！', '2016-11-25', '0', null, null, '/Public/Uploads/58382e1da964b.jpg', '/Public/Uploads/s/s1_58382e1da964b.jpg');
INSERT INTO `list` VALUES ('28', '34', '东北菜', '香锅肉丸', 'images/3g.jpg', '香锅肉丸，很香！', '2016-11-26', '0', null, null, '/Public/Uploads/5838e67b1fe34.jpg', '/Public/Uploads/s/s1_5838e67b1fe34.jpg');

-- ----------------------------
-- Table structure for `log`
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foodName` varchar(255) DEFAULT NULL,
  `addtime` varchar(255) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `foodId` int(11) DEFAULT NULL,
  `isxiadan` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES ('13', '锅头肉', '2016-11-26 09:38:32', '1', '5', '23', 'admin1', '27', '0');
INSERT INTO `log` VALUES ('12', '白切鸡', '2016-11-26 09:38:22', '1', '5', '18', 'admin1', '24', '0');
INSERT INTO `log` VALUES ('3', '锅头肉', '2016-11-25 22:45:22', '1', '4', '23', 'admin', '27', '0');
INSERT INTO `log` VALUES ('11', '锅头肉', '2016-11-25 23:52:17', '1', '1', '23', 'admin', '27', '0');
INSERT INTO `log` VALUES ('14', '火腿白菜', '2016-11-26 09:38:41', '1', '5', '30', 'admin1', '26', '0');
INSERT INTO `log` VALUES ('15', '香锅肉丸', '2016-11-26 09:38:51', '1', '5', '34', 'admin1', '28', '0');
INSERT INTO `log` VALUES ('16', '白切鸡', '2016-11-26 09:39:00', '1', '5', '18', 'admin1', '24', '0');
INSERT INTO `log` VALUES ('24', '青椒鸡丁', '2016-11-27 13:17:01', '1', '6', '13', 'wangjia', '25', '1');
INSERT INTO `log` VALUES ('23', '白切鸡', '2016-11-27 13:16:49', '1', '6', '18', 'wangjia', '24', '1');
INSERT INTO `log` VALUES ('22', '白切鸡', '2016-11-27 13:00:35', '1', '6', '18', 'wangjia', '24', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '123');
INSERT INTO `user` VALUES ('2', 'we', 'ew');
INSERT INTO `user` VALUES ('3', 'root', '123456');
INSERT INTO `user` VALUES ('4', 'root1', '123456');
INSERT INTO `user` VALUES ('5', 'admin1', '123');
INSERT INTO `user` VALUES ('6', 'wangjia', '123456');
