/*
Navicat MySQL Data Transfer

Source Server         : 39.107.73.171
Source Server Version : 50640
Source Host           : 39.107.73.171:3306
Source Database       : auth

Target Server Type    : MYSQL
Target Server Version : 50640
File Encoding         : 65001

Date: 2019-04-16 14:02:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for think_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_group`;
CREATE TABLE `think_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='tp_auth_group　(group翻译为中文为 【组】的意思，合起来就是认证组)\r\n\r\n字段概述：\r\nid：这个大家都懂得吧（认证组的ID标识，表主键 自增）\r\ntitle：认证组名称\r\nstatus：是否开启 0为关闭 1为开启 （默认为1 开启）\r\nrules ：规则ID （这里填写的是 tp_auth_rule里面的规则的ID，下面会给大家演示）';

-- ----------------------------
-- Records of think_auth_group
-- ----------------------------
INSERT INTO `think_auth_group` VALUES ('1', '斗帝', '1', '1,2,3,4,5,6');
INSERT INTO `think_auth_group` VALUES ('2', '斗皇', '1', '1,2,3,4,5');
INSERT INTO `think_auth_group` VALUES ('3', '斗尊', '1', '1,2,3');
INSERT INTO `think_auth_group` VALUES ('4', '斗王', '1', '1,2');

-- ----------------------------
-- Table structure for think_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_group_access`;
CREATE TABLE `think_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='tp_auth_group_access（这个表就俩字段，是规则和组别的中间表）\r\n\r\n字段概述：\r\nuid：会员ID （这里填写是 需要认证的会员ID）\r\ngroup_id：认证组ID （这里填写的是 认证组的ID）\r\n';

-- ----------------------------
-- Records of think_auth_group_access
-- ----------------------------
INSERT INTO `think_auth_group_access` VALUES ('1', '1');
INSERT INTO `think_auth_group_access` VALUES ('2', '2');
INSERT INTO `think_auth_group_access` VALUES ('3', '3');
INSERT INTO `think_auth_group_access` VALUES ('4', '4');
INSERT INTO `think_auth_group_access` VALUES ('5', '1');

-- ----------------------------
-- Table structure for think_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_rule`;
CREATE TABLE `think_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='tp_auth_rule    (rule翻译成中文为【规则】 合起来就是认证规则)\r\n\r\n字段概述：\r\nid：这个不必多说 相信大家都懂得 （表主键，自增 ，规则ID标识）\r\nname：认证规则 （字段保存的是你需要认证的 【模块名/控制器名/方法名】或【自定义规则】 字符串类型 这里大家最好按照 模块名/控制器/方法 来填写，多个规则之间用,隔开即可，当前规则是按照你的思路来定制的，你也可以填写一个 admin 或 * 或 guanliyuan 等！字段长度为80，不要超过这个长度就可以）\r\ntitle：规则描述 这个不多讲\r\ntype：tinyint类型的，如果type为1， condition字段就可以定义规则表达式。 如定义{score}>5 and {score}<100 表示用户的分数在5-100之间时这条规则才会通过。（默认为1）\r\ncondition：当type为1时，condition字段里面的内容将会用作正则表达式的规则来配合认证规则来认证用户';

-- ----------------------------
-- Records of think_auth_rule
-- ----------------------------
INSERT INTO `think_auth_rule` VALUES ('1', 'index/index/Add1', '一级功法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('2', 'index/index/Add2', '二级功法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('3', 'index/index/Add3', '三级功法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('5', 'index/index/Add4', '五级功法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('6', 'index/index/Add5', '六级功法', '1', '1', '');

-- ----------------------------
-- Table structure for think_user
-- ----------------------------
DROP TABLE IF EXISTS `think_user`;
CREATE TABLE `think_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_user
-- ----------------------------
INSERT INTO `think_user` VALUES ('1', '萧炎');
INSERT INTO `think_user` VALUES ('2', '药老');
INSERT INTO `think_user` VALUES ('3', '小明');
INSERT INTO `think_user` VALUES ('4', '小奇');
INSERT INTO `think_user` VALUES ('5', '小乖');
