/*
Navicat MySQL Data Transfer

Source Server         : 本地3308
Source Server Version : 50728
Source Host           : localhost:3308
Source Database       : dt_demo

Target Server Type    : MYSQL
Target Server Version : 50728
File Encoding         : 65001

Date: 2020-12-28 18:01:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for add_dt_user
-- ----------------------------
DROP TABLE IF EXISTS `add_dt_user`;
CREATE TABLE `add_dt_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `phone` char(16) NOT NULL,
  `wx_name` varchar(50) NOT NULL DEFAULT '',
  `wx_img` varchar(255) DEFAULT NULL,
  `openid` char(28) NOT NULL,
  `p_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL COMMENT '员工状态，0-正常，1-暂不可选，99-删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of add_dt_user
-- ----------------------------

-- ----------------------------
-- Table structure for adminuser_role
-- ----------------------------
DROP TABLE IF EXISTS `adminuser_role`;
CREATE TABLE `adminuser_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `role_id` int(11) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of adminuser_role
-- ----------------------------

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '',
  `phone` char(12) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `last_login_ip` char(24) DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'admin', '13996401045', 'eyJpdiI6IjN1a1RMZkg5ZzdrcWtmdlBNXC9JQmFBPT0iLCJ2YWx1ZSI6Inp2ZjZjajFKNnF4N1UwOGNKWHlGMFE9PSIsIm1hYyI6ImRjZDY5MTE2MTU3OWNmOTc2Yjg1YjE5NDc3ZWM0NjM1ODQyMDE4NzQxMzIzNDZiZGY5N2Y0YTE0YWYxNWE1YWUifQ==', '0', '', '2020-12-23 15:29:51', '2020-12-23 15:29:55');
INSERT INTO `admin_user` VALUES ('6', 'hahah168', '13996401041', 'eyJpdiI6Im9kdFRaYXRSQityTXVQbjZrUjVlVmc9PSIsInZhbHVlIjoiZDA0bnpqaXVocVBtVTdoTVFTVGNFZz09IiwibWFjIjoiNzI5OWEwODM0YWJmNjY0MDJiM2EzZjNlMmUzMGYwYmRiMDVhYWQ3ZWZkMTA1NDc4MDdiNjdlYTE5MmEyYmI2MSJ9', '0', null, null, '2020-12-23 08:47:30');
INSERT INTO `admin_user` VALUES ('8', 'ceshi', '13646494446', 'eyJpdiI6IkVRYVNyU0hEK2xRVHdMWk5RYVwvSWJ3PT0iLCJ2YWx1ZSI6IjcxRVBrNTFMYTllRVVlTjVZK0JjM2c9PSIsIm1hYyI6IjhiNDAyMGJjNGE4MDk0YThkZmZmMWQ0NzllMDRhMzE1NzQxYTlkNThlMWU0MWQ3Y2I5NTk0YjMyNzkxYmFjNWQifQ==', '0', null, null, '2020-12-23 10:00:40');
INSERT INTO `admin_user` VALUES ('9', '罗二168', '13996401045', 'eyJpdiI6Ilo4N3hQVGZaalZZeURqWDE1M0xuTWc9PSIsInZhbHVlIjoiR01mOXZubXYyK2wyRm1DNXV0c1VUdz09IiwibWFjIjoiYmM2MjJlOTZjMjFjM2M0YTdkMDM4ZWRlNGQ1Y2I4MDlmZmMxMzliMTk1YWExYjM0YjlkYTZhMjdlZTJlZWEzYiJ9', '1', null, null, '2020-12-23 10:02:52');
INSERT INTO `admin_user` VALUES ('10', '二位热无热', '13996401045', 'eyJpdiI6IllVeWJFS3hMUlZISHpBckhEd1pka0E9PSIsInZhbHVlIjoiUDRSYlJvTkRPS0xOSGFwS3R3ejNhUT09IiwibWFjIjoiOTgwZDQ1YmM1ZDg1NDA5MWMyYjRkNmNmOTZhMGVjNWI1OTkzODgxZWQxZWJjYjAxNDM4MWNiNjNlNzU4MWIyMiJ9', '1', null, null, '2020-12-23 10:05:30');
INSERT INTO `admin_user` VALUES ('11', '撒大大的是非得失', '15636561616', 'eyJpdiI6Inh3eitZVGoyRVR4VHhhSG9BVWtrWlE9PSIsInZhbHVlIjoiZnNBU01ITzF2R1hnNW42TGUrM2NGdz09IiwibWFjIjoiYTA0MGNkN2QyMDk1Nzk3MDg5YmI3ZDIxOTdmZWMzZTEyZmIyYWI4NzEwOTExYTFjMzc2NjFmNjBhNzU2ODM2YSJ9', '1', null, null, '2020-12-23 10:07:38');
INSERT INTO `admin_user` VALUES ('12', 'admin1', '14234234234', 'eyJpdiI6IlwvaE0zNjRJdVNWTkU3Tnl5V1EyemRBPT0iLCJ2YWx1ZSI6InRiZVo5M2ltWU9FRnRSNlwveXRTU1NnPT0iLCJtYWMiOiI5MGZhYThiYjA5OWViNmViOTk1NmJmZDEyN2ZiY2QwYjczODMzNTMxY2E4NTk1NGJkODAwNGU4ODQxZDU4NTNhIn0=', '1', null, null, '2020-12-23 10:10:26');
INSERT INTO `admin_user` VALUES ('13', '长度是多少', '13966646111', 'eyJpdiI6IlZtanYyN2pCTHByVUcwbjJhZ21cL1dnPT0iLCJ2YWx1ZSI6ImRIM2hwK1wvZUlTWXZYQjgxWUd1SEpRPT0iLCJtYWMiOiJhYzI4NWI3YjFlNzNiYzNiYmM0MDJkNGNkNTY5Y2Q2NjQyYjI2ZmZiYTllODY3OTY4OGNjMjcwYjM4NzAwOWM2In0=', '1', null, null, '2020-12-23 10:12:15');
INSERT INTO `admin_user` VALUES ('14', '二位热无热1', '14242343242', 'eyJpdiI6ImRaMFdiQ2Joalg1OTZVcEprMWxhSmc9PSIsInZhbHVlIjoiMTEwM25NdCtXUUE3K1lrZkVwOXFOdz09IiwibWFjIjoiMWIxZDdhYTMxY2I3YWM0ZmM4ZjRiNzliZjIyZWQ1ZDU5NDEzN2E2ZWI1NGU3YmQ4ZmE4NzkzYmVkMTk0MjAyMiJ9', '1', null, null, '2020-12-23 10:13:29');

-- ----------------------------
-- Table structure for permission
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `urls` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `updated_time` datetime DEFAULT NULL,
  `create_timed` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of permission
-- ----------------------------

-- ----------------------------
-- Table structure for project_name
-- ----------------------------
DROP TABLE IF EXISTS `project_name`;
CREATE TABLE `project_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of project_name
-- ----------------------------

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) NOT NULL,
  `role_desc` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `updated_time` datetime DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '超级管理员', '掌管一切', '0', '2020-12-28 15:30:28', '2020-12-28 15:30:30');
INSERT INTO `role` VALUES ('2', '普通管理员', '一般权限', '0', null, null);
INSERT INTO `role` VALUES ('3', '文章管理', '对文档进行新增编辑', '0', null, null);
INSERT INTO `role` VALUES ('4', '文章删除', '对文档进行审核删除', '0', null, null);
INSERT INTO `role` VALUES ('5', '测试劫色', '大萨达多方', '1', null, '2020-12-28 08:47:13');

-- ----------------------------
-- Table structure for role_permission
-- ----------------------------
DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of role_permission
-- ----------------------------

-- ----------------------------
-- Table structure for task_info_list
-- ----------------------------
DROP TABLE IF EXISTS `task_info_list`;
CREATE TABLE `task_info_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属项目',
  `task_id` int(6) NOT NULL DEFAULT '0' COMMENT '6位数任务编号',
  `task_start_time` date DEFAULT NULL,
  `task_end_time` date DEFAULT NULL,
  `choose_day` text NOT NULL COMMENT '2020-10-11,2020-10-12,2020-10-13,2020-10-14',
  `start_work` time DEFAULT NULL COMMENT '上班打卡时间',
  `off_work` time DEFAULT NULL COMMENT '下班打卡时间',
  `capita_num` smallint(5) NOT NULL DEFAULT '0' COMMENT '人居获客目标',
  `task_location_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '打卡地点ID',
  `card_radius` int(6) NOT NULL DEFAULT '0' COMMENT '打卡半径',
  `electric_fence` int(7) NOT NULL DEFAULT '0' COMMENT '电子围栏（米）',
  `task_desc` text COMMENT '任务描述',
  `poster_path` varchar(255) NOT NULL DEFAULT '' COMMENT '物料海报图片',
  `operator_id` int(11) NOT NULL DEFAULT '0' COMMENT '添加操作人',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '任务状态，0，未发布，1，已发布，2，删除',
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of task_info_list
-- ----------------------------

-- ----------------------------
-- Table structure for user_card_log
-- ----------------------------
DROP TABLE IF EXISTS `user_card_log`;
CREATE TABLE `user_card_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL DEFAULT '0' COMMENT '添加的用户ID',
  `start_time` time NOT NULL COMMENT '上班打卡',
  `off_time` time NOT NULL COMMENT '下班打卡',
  `now_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_card_log
-- ----------------------------
