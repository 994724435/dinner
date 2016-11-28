-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 12 月 30 日 08:18
-- 服务器版本: 5.1.36
-- PHP 版本: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `zichang`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(30) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `true_name` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sex` varchar(18) NOT NULL,
  `time` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `pwd`, `true_name`, `email`, `sex`, `time`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'zhangsan', 'zhangsan@admin.com', '1', '1448114827'),
(2, 'lihailong', '01d7f40760960e7bd9443513f22ab9af', 'admin', 'admin@amdin.com', '1', '1448111937');

-- --------------------------------------------------------

--
-- 表的结构 `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `Lid` int(8) NOT NULL AUTO_INCREMENT,
  `Lnum` varchar(10) NOT NULL,
  `Ltype` varchar(15) NOT NULL,
  `Lname` varchar(10) NOT NULL,
  `Limg` varchar(20) NOT NULL DEFAULT 'images/3g.jpg',
  `Ldis` text NOT NULL,
  `Ltime` varchar(18) NOT NULL,
  `Lplace` varchar(11) NOT NULL,
  `Ladmin` varchar(12) NOT NULL,
  `Ldi` varchar(20) NOT NULL,
  `Lbig_img` varchar(50) NOT NULL,
  `Lsmall_img` varchar(50) NOT NULL,
  PRIMARY KEY (`Lid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `list`
--

INSERT INTO `list` (`Lid`, `Lnum`, `Ltype`, `Lname`, `Limg`, `Ldis`, `Ltime`, `Lplace`, `Ladmin`, `Ldi`, `Lbig_img`, `Lsmall_img`) VALUES
(1, '7644', '', '脉搏器', 'images/7.jpg', '医疗设备，产于湖北宜昌，用于测量心律脉搏，预防心跳过快为中医药管理局《中医临床优秀人才项目》成员、省及优秀专家、名医、国家中西医结合肝病学会委员、山西中医药学会常务理事。曾参与国家973计划《慢性乙肝证侯要素临床流行病学研究》课题，为病种负责人；为山西省中医药研究院《卫生部肝炎防治健康教育计划实施基地》负责人，为《国家中医药管理局中医（中西医结合）传染病基地建设计划项目》负责人。负责多项临床药物研究，撰写论文二十余篇在国内医学杂志发表。现承担省级课题一项。', '2012-12-13', 'YF101', '李生', '医疗设备，产于湖北宜昌，用于测量心律脉搏', '', './Public/Uploads/s/s1_568352e3678ef.jpg'),
(2, '7644', '', '3G芯片', 'images/3g.jpg', '目前我国有中国移动的td-scdma和中国电信的CDMA2000以及中国联通的WCDMA三种网络制式，所以常见的无线上网卡就包括CDMA2000无线上网卡和TD、WCDMA无线上网卡三类。', '2012-12-12', 'YF101', '李生', '目前我国有中国移动的td-scdma和中', '', './Public/Uploads/s/s1_568352e3678ef.jpg'),
(3, '7644', '', '脉搏器', 'images/7.jpg', '医疗设备，产于湖北宜昌，用于测量心律脉搏，预防心跳过快为中医药管理局《中医临床优秀人才项目》成员、省及优秀专家、名医、国家中西医结合肝病学会委员、山西中医药学会常务理事。曾参与国家973计划《慢性乙肝证侯要素临床流行病学研究》课题，为病种负责人；为山西省中医药研究院《卫生部肝炎防治健康教育计划实施基地》负责人，为《国家中医药管理局中医（中西医结合）传染病基地建设计划项目》负责人。负责多项临床药物研究，撰写论文二十余篇在国内医学杂志发表。现承担省级课题一项。', '2012-12-12', 'YF101', '李生发', '医疗设备，产于湖北宜昌，用于测量心律脉搏', '', './Public/Uploads/s/s1_568352e3678ef.jpg'),
(4, '7644', '', '数控床', 'images/3g.jpg', '医疗设备，产于湖北宜昌，用于测量心律脉搏，预防心跳过快为中医药管理局《中医临床优秀人才项目》成员、省及优秀专家、名医、国家中西医结合肝病学会委员、山西中医药学会常务理事。曾参与国家973计划《慢性乙肝证侯要素临床流行病学研究》课题，为病种负责人；为山西省中医药研究院《卫生部肝炎防治健康教育计划实施基地》负责人，为《国家中医药管理局中医（中西医结合）传染病基地建设计划项目》负责人。负责多项临床药物研究，撰写论文二十余篇在国内医学杂志发表。现承担省级课题一项。', '2012-12-12', 'YF101', '李生', '医疗设备，产于湖北宜昌，用于测量心律脉搏', '', './Public/Uploads/s/s1_568352e3678ef.jpg'),
(5, '7644', '', '脉搏器', 'images/7.jpg', '医疗设备，产于湖北宜昌，用于测量心律脉搏，预防心跳过快为中医药管理局《中医临床优秀人才项目》成员、省及优秀专家、名医、国家中西医结合肝病学会委员、山西中医药学会常务理事。曾参与国家973计划《慢性乙肝证侯要素临床流行病学研究》课题，为病种负责人；为山西省中医药研究院《卫生部肝炎防治健康教育计划实施基地》负责人，为《国家中医药管理局中医（中西医结合）传染病基地建设计划项目》负责人。负责多项临床药物研究，撰写论文二十余篇在国内医学杂志发表。现承担省级课题一项。', '2012-12-12', 'YF101', '李生', '医疗设备，产于湖北宜昌，用于测量心律脉搏', '', './Public/Uploads/s/s1_568352e3678ef.jpg'),
(6, '7644', '', '脉搏器', 'images/3.jpg', '医疗设备，产于湖北宜昌，用于测量心律脉搏，预防心跳过快为中医药管理局《中医临床优秀人才项目》成员、省及优秀专家、名医、国家中西医结合肝病学会委员、山西中医药学会常务理事。曾参与国家973计划《慢性乙肝证侯要素临床流行病学研究》课题，为病种负责人；为山西省中医药研究院《卫生部肝炎防治健康教育计划实施基地》负责人，为《国家中医药管理局中医（中西医结合）传染病基地建设计划项目》负责人。负责多项临床药物研究，撰写论文二十余篇在国内医学杂志发表。现承担省级课题一项。', '2012-12-12', 'YF101', '李生', '医疗设备，产于湖北宜昌，用于测量心律脉搏', '', './Public/Uploads/s/s1_568352e3678ef.jpg'),
(19, '023331033', '科技', '5G芯片', 'images/3g.jpg', '医疗设备，产于湖北宜昌，用于测量心律脉搏，预防心跳过快为中医药管理局《中医临床优秀人才项目》成员、省及优秀专家、名医、国家中西医结合肝病学会委员、山西中医药学会常务理事。曾参与国家973计划《慢性乙肝证侯要素临床流行病学研究》课题，为病种负责人；为山西省中医药研究院《卫生部肝炎防治健康教育计划实施基地》负责人，为《国家中医药管理局中医（中西医结合）传染病基地建设计划项目》负责人。负责多项临床药物研究，撰写论文二十余篇在国内医学杂志发表。现承担省级课题一项。', '2015-10-13', '', 'Josn', '医疗设备，产于湖北宜昌，用于测量心律脉搏', './Public/Uploads/5683509696291', './Public/Uploads/s/s1_568352e3678ef.jpg'),
(20, '023331033', '科技', '5G芯片', 'images/3g.jpg', '医疗设备，产于湖北宜昌，用于测量心律脉搏，预防心跳过快为中医药管理局《中医临床优秀人才项目》成员、省及优秀专家、名医、国家中西医结合肝病学会委员、山西中医药学会常务理事。曾参与国家973计划《慢性乙肝证侯要素临床流行病学研究》课题，为病种负责人；为山西省中医药研究院《卫生部肝炎防治健康教育计划实施基地》负责人，为《国家中医药管理局中医（中西医结合）传染病基地建设计划项目》负责人。负责多项临床药物研究，撰写论文二十余篇在国内医学杂志发表。现承担省级课题一项。', '2015-10-13', 'YF101', 'Josn', '医疗设备，产于湖北宜昌，用于测量心律脉搏', '/Public/Uploads/568350d7759af', './Public/Uploads/s/s1_568352e3678ef.jpg'),
(21, '023331033', '科技', '7G芯片', 'images/3g.jpg', '医疗设备，产于湖北宜昌，用于测量心律脉搏，预防心跳过快为中医药管理局《中医临床优秀人才项目》成员、省及优秀专家、名医、国家中西医结合肝病学会委员、山西中医药学会常务理事。曾参与国家973计划《慢性乙肝证侯要素临床流行病学研究》课题，为病种负责人；为山西省中医药研究院《卫生部肝炎防治健康教育计划实施基地》负责人，为《国家中医药管理局中医（中西医结合）传染病基地建设计划项目》负责人。负责多项临床药物研究，撰写论文二十余篇在国内医学杂志发表。现承担省级课题一项。', '2015-10-13', 'YF101', 'Josn', '医疗设备，产于湖北宜昌，用于测量心律脉搏', './Public/Uploads/568352e3678ef.jpg', './Public/Uploads/s/s1_568352e3678ef.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `p_admin`
--

CREATE TABLE IF NOT EXISTS `p_admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `true_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '3' COMMENT '1,男。2，女，3，未知',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `p_admin`
--

INSERT INTO `p_admin` (`id`, `name`, `pwd`, `true_name`, `email`, `sex`, `time`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@amdin.com', 1, 1448111937),
(2, 'zhangsan', '01d7f40760960e7bd9443513f22ab9af', 'zhangsan', 'zhangsan@admin.com', 1, 1448114827);

-- --------------------------------------------------------

--
-- 表的结构 `p_product`
--

CREATE TABLE IF NOT EXISTS `p_product` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `auth` varchar(30) NOT NULL,
  `cbs` varchar(50) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `cb_time` int(11) NOT NULL,
  `cb_num` int(7) NOT NULL,
  `page_num` int(5) NOT NULL,
  `zhz` varchar(20) NOT NULL,
  `price` decimal(2,2) NOT NULL,
  `jd_price` decimal(2,2) NOT NULL,
  `type1_id` int(3) NOT NULL,
  `type2_id` int(3) NOT NULL,
  `big_img` varchar(100) NOT NULL,
  `small_img` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `descript` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `addtime` int(11) NOT NULL,
  `uptime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `p_product`
--

INSERT INTO `p_product` (`id`, `name`, `auth`, `cbs`, `isbn`, `cb_time`, `cb_num`, `page_num`, `zhz`, `price`, `jd_price`, `type1_id`, `type2_id`, `big_img`, `small_img`, `content`, `descript`, `status`, `addtime`, `uptime`) VALUES
(1, '西游记', '吴承恩', '人民邮电', '1928374655', 587055600, 10000, 100000, '胶装', '0.99', '0.99', 9, 11, './Public/Uploads/5654699e80c9b.jpg', './Public/Uploads/s/s1_5654699e80c9b.jpg', '西游记不错悟空八戒唐僧西游记不错悟空八戒唐僧西游记不错悟空八戒唐僧西游记不错悟空八戒唐僧', '西游记不错悟空八戒唐僧西游记不错悟空八戒唐僧西游记不错悟空八戒唐僧', 1, 1448372638, 1448372638),
(2, '水浒传', '施耐庵', '人民邮电', '1928374655', 587055600, 100, 100000, '胶装', '0.99', '0.99', 9, 11, './Public/Uploads/56546a504856a.jpg', './Public/Uploads/s/s1_56546a504856a.jpg', '水浒传水浒传水浒传水浒传水浒传水浒传水浒传水浒传水浒传', '水浒传水浒传水浒传水浒传水浒传水浒传水浒传水浒传水浒传', 1, 1448372816, 1448372816),
(3, '三国演义', '罗贯中', '人民邮电', '1928374655', 587055600, 1000, 100000, '胶装', '0.99', '0.99', 9, 11, './Public/Uploads/56546a6ab9c6f.jpg', './Public/Uploads/s/s1_56546a6ab9c6f.jpg', '三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义', '三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义三国演义', 1, 1448372842, 1448372842),
(4, '红楼梦', '曹雪芹', '人民邮电', '1928374655', 587055600, 10, 100000, '胶装', '0.99', '0.99', 9, 11, './Public/Uploads/56546a8c5f0b1.jpg', './Public/Uploads/s/s1_56546a8c5f0b1.jpg', '红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦', '红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦红楼梦', 1, 1448372876, 1448372876),
(5, '盗墓笔记', '坏蛋', '地域', '8888888888', 0, 1, 100000, '胶装', '0.99', '0.99', 9, 23, './Public/Uploads/56546de9a4c62.jpg', './Public/Uploads/s/s1_56546de9a4c62.jpg', '盗墓笔记盗墓笔记盗墓笔记盗墓笔记盗墓笔记', '盗墓笔记盗墓笔记盗墓笔记盗墓笔记', 1, 1448373737, 1448373737),
(6, '', '', '', '', 0, 0, 0, '', '0.00', '0.00', 9, 11, './Public/Uploads/5682344181ae8.png', './Public/Uploads/s/s1_5682344181ae8.png', '', '', 1, 1451373633, 1451373633);

-- --------------------------------------------------------

--
-- 表的结构 `p_type`
--

CREATE TABLE IF NOT EXISTS `p_type` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `fid` int(3) NOT NULL,
  `addtime` int(11) NOT NULL,
  `uptime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fid` (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `p_type`
--

INSERT INTO `p_type` (`id`, `name`, `fid`, `addtime`, `uptime`) VALUES
(9, '图书、音像', 0, 1448287740, 1448287740),
(10, '家用电器', 0, 1448287751, 1448287751),
(11, '小说', 9, 1448289214, 1448289214),
(12, '手机数码', 0, 1448289235, 1448289235),
(13, '三星手机', 12, 1448289349, 1448289349),
(14, '电脑', 0, 1448289382, 1448289382),
(15, '家具', 0, 1448289390, 1448289390),
(16, '服装', 0, 1448289397, 1448289397),
(17, '个人化妆', 0, 1448289405, 1448289405),
(18, '箱包', 0, 1448289413, 1448289413),
(19, '运动', 0, 1448289420, 1448289420),
(20, '玩具', 0, 1448289429, 1448289429),
(21, '视频', 0, 1448289438, 1448289438),
(22, '人文', 11, 1448289458, 1448289458),
(23, '文学', 9, 1448368342, 1448368342),
(24, '传记', 9, 1448368350, 1448368350),
(25, '经济', 9, 1448368358, 1448368358),
(26, '管理', 9, 1448368369, 1448368369),
(27, '旅游', 9, 1448368375, 1448368375),
(28, '历史', 9, 1448368381, 1448368381),
(29, '哲学', 9, 1448368387, 1448368387),
(30, '中国当代小说', 11, 1448369049, 1448369049),
(31, '中国近现代小说', 11, 1448369060, 1448369060),
(32, '中国古典小说', 11, 1448369070, 1448369070),
(33, '四大名著', 11, 1448369077, 1448369077),
(34, '网络小说', 11, 1448369087, 1448369087),
(35, '外国小说', 11, 1448369096, 1448369096),
(36, '快乐就好', 9, 1451297708, 1451297708);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `open_id` varchar(39) NOT NULL,
  `colle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`,`open_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `open_id`, `colle`) VALUES
(1, 'ddadfasfasdfaf', '3,4,2,5,1,20,21');

-- --------------------------------------------------------

--
-- 表的结构 `user_num`
--

CREATE TABLE IF NOT EXISTS `user_num` (
  `uid` int(7) NOT NULL AUTO_INCREMENT,
  `num` int(5) NOT NULL,
  `time` varchar(15) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `user_num`
--

