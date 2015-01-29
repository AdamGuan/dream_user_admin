-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.5.40-0ubuntu1 - (Ubuntu)
-- 服务器操作系统:                      debian-linux-gnu
-- HeidiSQL 版本:                  9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 导出 dream_user_admin 的数据库结构
DROP DATABASE IF EXISTS `dream_user_admin`;
CREATE DATABASE IF NOT EXISTS `dream_user_admin` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dream_user_admin`;


-- 导出  表 dream_user_admin.t_user 结构
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE IF NOT EXISTS `t_user` (
  `F_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `F_login_name` varchar(50) NOT NULL COMMENT '登录名',
  `F_login_password` char(32) NOT NULL COMMENT '登录密码',
  `F_nick_name` varchar(50) NOT NULL COMMENT '昵称',
  `F_status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0无效,1有效',
  `F_create_time` datetime NOT NULL COMMENT '添加时间',
  `F_modify_time` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`F_id`),
  UNIQUE KEY `F_login_name` (`F_login_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

-- 正在导出表  dream_user_admin.t_user 的数据：1 rows
DELETE FROM `t_user`;
/*!40000 ALTER TABLE `t_user` DISABLE KEYS */;
INSERT INTO `t_user` (`F_id`, `F_login_name`, `F_login_password`, `F_nick_name`, `F_status`, `F_create_time`, `F_modify_time`) VALUES
	(1, 'admin', '111111', 'admin', 1, '0000-00-00 00:00:00', '2015-01-08 10:17:26');
/*!40000 ALTER TABLE `t_user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
