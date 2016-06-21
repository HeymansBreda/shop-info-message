-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-06-17 09:31:52
-- 服务器版本： 5.5.37-log
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baoming2`
--

-- --------------------------------------------------------

--
-- 表的结构 `baoming`
--

CREATE TABLE IF NOT EXISTS `baoming` (
  `id` int(10) NOT NULL,
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
  `posttime` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `baoming`
--

INSERT INTO `baoming` (`id`, `sfz_img`, `cxk_img`, `scsfz_img`, `xingming`, `sfzhm`, `jycd`, `hyzk`, `ysr`, `province3`, `city3`, `area3`, `address`, `zylb`, `tel`, `tjrkh`, `sta`, `posttime`) VALUES
(1, '1465570419-1.jpg', '1465570419-2.jpg', '1465570419-3.jpg', '宋冬兰', '452123198606123987', '本科', '未婚', '20000以上', '湖北省', '武汉市', '新洲区', '深圳市龙华新区民治大道牛栏前大厦C1020', '企业老板', '13988709123', '1212121', 1, '2016-06-10 22:53:40'),
(2, '1465609084-1.jpg', '1465609084-2.jpg', '1465609084-3.jpg', '姚明', '45212319900612445', '硕士及以上', '离异', '3000~5000', '广东省', '深圳市', '宝安区', '广东省深圳市宝安区龙华新区', '上班族', '18800992120', '217890', 1, '2016-06-11 09:38:04'),
(3, '1465801879-1.jpg', '1465801879-2.jpg', '1465801879-3.jpg', 'ryuui', '452123185870854213', '本科', '离异', '15001~20000', '吉林省', '长春市', '双阳区', 'ghuuuh', '私营业主', '15288007854', '12255', 1, '2016-06-13 15:11:19'),
(4, '1465802232-1.jpg', '1465802232-2.jpg', '1465802232-3.jpg', '王城', '370702198702325447', '本科', '未婚', '8001~12000', '河北省', '唐山市', '古冶区', '安顺路', '企业老板', '13011661481', '13011661481', 0, '2016-06-13 15:17:12'),
(5, '1465802244-1.jpg', '1465802244-2.jpg', '1465802244-3.jpg', 'ghuuyg', '5122588666', '本科', '未婚', '12001~15000', '内蒙古自治区', '呼和浩特市', '托克托县', 'y%ioojb', '私营业主', '15288554411', '12266', 0, '2016-06-13 15:17:24'),
(6, '1465808495-1.jpg', '1465808495-2.jpg', '1465808495-3.jpg', '家具', '371521198405062531', '本科', '已婚', '5001~8000', '天津市', '市辖区', '汉沽区', 'Jane good 嘘', '企业老板', '13181650651', '123', 0, '2016-06-13 17:01:35'),
(7, '1465992210-1.jpg', '1465992210-2.jpg', '1465992210-3.jpg', '养成', '370702195404025423', '硕士及以上', '已婚', '3000以下', '北京市', '市辖县', '密云县', '叫拦截', '企业老板', '13465843164', '', 0, '2016-06-15 20:03:30');

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(10) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `sfz` varchar(30) CHARACTER SET utf8 NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(30) CHARACTER SET utf8 NOT NULL,
  `regtime` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`id`, `username`, `sfz`, `pwd`, `tel`, `qq`, `email`, `address`, `regtime`) VALUES
(1, 'admin', '414023195210214587', 'admin', '18822019671', '12345', 'test@qq.com', '上海市杨浦区控江路1555号', '2016-03-30 09:36:03');

-- --------------------------------------------------------

--
-- 表的结构 `syetem`
--

CREATE TABLE IF NOT EXISTS `syetem` (
  `title` varchar(40) CHARACTER SET utf8 NOT NULL,
  `keywords` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8 NOT NULL,
  `address` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 NOT NULL,
  `icp` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `syetem`
--

INSERT INTO `syetem` (`title`, `keywords`, `description`, `tel`, `address`, `email`, `icp`) VALUES
('在线报名系统', '在线报名系统', '在线报名系统', '15844410258', '深圳市龙华新区民治大道牛栏前大厦C102', '1048461941@qq.com', '粤ICP备09076643号');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baoming`
--
ALTER TABLE `baoming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baoming`
--
ALTER TABLE `baoming`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
