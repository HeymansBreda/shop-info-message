/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : data

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 06/26/2016 11:34:52 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `baoming`
-- ----------------------------
DROP TABLE IF EXISTS `baoming`;
CREATE TABLE `baoming` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sfz_img` varchar(50) NOT NULL,
  `cxk_img` varchar(50) NOT NULL,
  `scsfz_img` varchar(50) NOT NULL,
  `xingming` varchar(10) NOT NULL,
  `sfzhm` varchar(25) NOT NULL,
  `jycd` varchar(50) NOT NULL,
  `hyzk` varchar(50) NOT NULL,
  `ysr` varchar(50) NOT NULL,
  `province3` varchar(50) NOT NULL,
  `city3` varchar(50) NOT NULL,
  `area3` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `zylb` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `tjrkh` varchar(50) NOT NULL,
  `sta` int(11) NOT NULL,
  `posttime` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `baoming`
-- ----------------------------
BEGIN;
INSERT INTO `baoming` VALUES ('1', '1465570419-1.jpg', '1465570419-2.jpg', '1465570419-3.jpg', '宋冬兰', '452123198606123987', '本科', '未婚', '20000以上', '湖北省', '武汉市', '新洲区', '深圳市龙华新区民治大道牛栏前大厦C1020', '企业老板', '13988709123', '1212121', '1', '2016-06-10 22:53:40'), ('2', '1465609084-1.jpg', '1465609084-2.jpg', '1465609084-3.jpg', '姚明', '45212319900612445', '硕士及以上', '离异', '3000~5000', '广东省', '深圳市', '宝安区', '广东省深圳市宝安区龙华新区', '上班族', '18800992120', '217890', '1', '2016-06-11 09:38:04'), ('3', '1465801879-1.jpg', '1465801879-2.jpg', '1465801879-3.jpg', 'ryuui', '452123185870854213', '本科', '离异', '15001~20000', '吉林省', '长春市', '双阳区', 'ghuuuh', '私营业主', '15288007854', '12255', '1', '2016-06-13 15:11:19'), ('4', '1465802232-1.jpg', '1465802232-2.jpg', '1465802232-3.jpg', '王城', '370702198702325447', '本科', '未婚', '8001~12000', '河北省', '唐山市', '古冶区', '安顺路', '企业老板', '13011661481', '13011661481', '0', '2016-06-13 15:17:12'), ('5', '1465802244-1.jpg', '1465802244-2.jpg', '1465802244-3.jpg', 'ghuuyg', '5122588666', '本科', '未婚', '12001~15000', '内蒙古自治区', '呼和浩特市', '托克托县', 'y%ioojb', '私营业主', '15288554411', '12266', '0', '2016-06-13 15:17:24'), ('6', '1465808495-1.jpg', '1465808495-2.jpg', '1465808495-3.jpg', '家具', '371521198405062531', '本科', '已婚', '5001~8000', '天津市', '市辖区', '汉沽区', 'Jane good 嘘', '企业老板', '13181650651', '123', '0', '2016-06-13 17:01:35'), ('7', '1465992210-1.jpg', '1465992210-2.jpg', '1465992210-3.jpg', '养成', '370702195404025423', '硕士及以上', '已婚', '3000以下', '北京市', '市辖县', '密云县', '叫拦截', '企业老板', '13465843164', '', '0', '2016-06-15 20:03:30');
COMMIT;

-- ----------------------------
--  Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `sfz` varchar(30) CHARACTER SET utf8 NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(30) CHARACTER SET utf8 NOT NULL,
  `regtime` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `member`
-- ----------------------------
BEGIN;
INSERT INTO `member` VALUES ('1', 'admin', '414023195210214587', 'admin', '18822019671', '12345', 'test@qq.com', '上海市杨浦区控江路1555号', '2016-03-30 09:36:03');
COMMIT;

-- ----------------------------
--  Table structure for `syetem`
-- ----------------------------
DROP TABLE IF EXISTS `syetem`;
CREATE TABLE `syetem` (
  `title` varchar(40) CHARACTER SET utf8 NOT NULL,
  `keywords` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8 NOT NULL,
  `address` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 NOT NULL,
  `icp` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `syetem`
-- ----------------------------
BEGIN;
INSERT INTO `syetem` VALUES ('在线报名系统', '在线报名系统', '在线报名系统', '15844410258', '深圳市龙华新区民治大道牛栏前大厦C102', '1048461941@qq.com', '粤ICP备09076643号'), ('在线报名系统', '在线报名系统', '在线报名系统', '15844410258', '深圳市龙华新区民治大道牛栏前大厦C102', '1048461941@qq.com', '粤ICP备09076643号');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
