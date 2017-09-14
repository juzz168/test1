/*
Navicat MySQL Data Transfer

Source Server         : frist
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2017-09-14 09:51:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ad
-- ----------------------------
DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (
  `user_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL DEFAULT '0',
  `label_pid` int(11) NOT NULL DEFAULT '0',
  `head_img` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ad
-- ----------------------------
INSERT INTO `ad` VALUES ('1', '0', '0', null, 'xxx', '', null, '1505203774', null, '1505203774');
INSERT INTO `ad` VALUES ('1', '0', '0', null, 'xxx', '', null, '1505203802', null, '1505203802');
INSERT INTO `ad` VALUES ('1', '0', '0', null, 'xxx', '', null, '1505203848', null, '1505203848');
INSERT INTO `ad` VALUES ('1', '0', '0', null, 'xxx', '', null, '1505204537', null, '1505204537');
INSERT INTO `ad` VALUES ('1', '0', '0', null, 'xxx', '', null, '1505204559', null, '1505204559');

-- ----------------------------
-- Table structure for ad_oneday
-- ----------------------------
DROP TABLE IF EXISTS `ad_oneday`;
CREATE TABLE `ad_oneday` (
  `user_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  `label_pid` int(11) NOT NULL,
  `head_img` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `img` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ad_oneday
-- ----------------------------

-- ----------------------------
-- Table structure for label
-- ----------------------------
DROP TABLE IF EXISTS `label`;
CREATE TABLE `label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` char(50) NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `top_price` decimal(6,2) NOT NULL DEFAULT '0.00' COMMENT '置顶价格',
  `create_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of label
-- ----------------------------
INSERT INTO `label` VALUES ('1', '0', '房屋信息', '0.00', '0.00', null, null, null);
INSERT INTO `label` VALUES ('2', '1', '房屋出租', '0.01', '0.01', null, null, null);

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` char(20) NOT NULL COMMENT '订单号',
  `user_id` int(11) NOT NULL,
  `total_price` decimal(6,2) NOT NULL,
  `top_status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1不置顶2置顶',
  `top_day` int(1) NOT NULL DEFAULT '0' COMMENT '置顶天数',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:未支付， 2：已支付，3：置顶已支付, 4: 已支付，但置顶栏不足',
  `snap_label` int(11) NOT NULL,
  `snap_image` varchar(255) DEFAULT NULL COMMENT '订单快照图片',
  `snap_name` varchar(80) DEFAULT NULL,
  `snap_item` text,
  `prepay_id` varchar(100) DEFAULT NULL COMMENT '订单微信支付的预订单id（用于发送模板消息）',
  `create_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('1', 'A911055917312604', '1', '0.01', '1', '3', '1', '0', null, '房屋出租', null, null, '1505105591', null, '1505105591');
INSERT INTO `order` VALUES ('2', 'A911057108728128', '1', '0.01', '1', '3', '1', '0', null, '房屋出租', null, null, '1505105710', null, '1505105710');
INSERT INTO `order` VALUES ('3', 'A911057875456933', '1', '0.04', '2', '3', '1', '0', null, '房屋出租', null, null, '1505105787', null, '1505105787');
INSERT INTO `order` VALUES ('4', 'A911082272670681', '1', '0.04', '2', '3', '1', '0', null, '房屋出租', null, null, '1505108227', null, '1505108227');
INSERT INTO `order` VALUES ('5', 'A911082370030528', '1', '0.04', '2', '3', '1', '0', null, '房屋出租', null, null, '1505108237', null, '1505108237');
INSERT INTO `order` VALUES ('6', 'A911094371739284', '1', '0.04', '2', '3', '1', '2', null, '房屋出租', null, null, '1505109437', null, '1505109437');
INSERT INTO `order` VALUES ('7', 'A911140128651965', '1', '0.04', '2', '3', '1', '2', null, '房屋出租', null, null, '1505114012', null, '1505114012');
INSERT INTO `order` VALUES ('8', 'A911141118468501', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505114111', null, '1505114111');
INSERT INTO `order` VALUES ('9', 'A911144214044690', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505114421', null, '1505114421');
INSERT INTO `order` VALUES ('10', 'A911152050489645', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505115205', null, '1505115205');
INSERT INTO `order` VALUES ('11', 'A911154993815402', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505115499', null, '1505115499');
INSERT INTO `order` VALUES ('12', 'A911156827357592', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505115682', null, '1505115682');
INSERT INTO `order` VALUES ('13', 'A911157462670820', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505115746', null, '1505115746');
INSERT INTO `order` VALUES ('14', 'A911158215313738', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505115821', null, '1505115821');
INSERT INTO `order` VALUES ('15', 'A911159749625419', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505115974', null, '1505115974');
INSERT INTO `order` VALUES ('16', 'A911163194847632', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505116319', null, '1505116319');
INSERT INTO `order` VALUES ('17', 'A911163838996518', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505116383', null, '1505116383');
INSERT INTO `order` VALUES ('18', 'A911166235001668', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505116623', null, '1505116623');
INSERT INTO `order` VALUES ('19', 'A911166600334591', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505116660', null, '1505116660');
INSERT INTO `order` VALUES ('20', 'A911166776861495', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505116677', null, '1505116677');
INSERT INTO `order` VALUES ('21', 'A911167764516559', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505116776', null, '1505116776');
INSERT INTO `order` VALUES ('22', 'A913776348443385', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505277634', null, '1505277634');
INSERT INTO `order` VALUES ('23', 'A913940159055759', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505294015', null, '1505294015');
INSERT INTO `order` VALUES ('24', 'A913941948834830', '1', '0.01', '1', '2', '1', '2', null, '房屋出租', null, null, '1505294194', null, '1505294194');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) DEFAULT NULL,
  `openid` varchar(50) NOT NULL,
  `extend` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', null, 'oxNse0XXQCd_sxvdIBHvxzZUjCjA', null, '1505093752', null, '1505093752');

-- ----------------------------
-- Event structure for e_delete_adoneday
-- ----------------------------
DROP EVENT IF EXISTS `e_delete_adoneday`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` EVENT `e_delete_adoneday` ON SCHEDULE EVERY 1 SECOND STARTS '2017-09-12 16:02:46' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
insert into ad select * from ad_oneday WHERE create_time < unix_timestamp(now())-10;
DELETE FROM ad_oneday WHERE create_time < unix_timestamp(now())-10;
END
;;
DELIMITER ;
