-- --------------------------------------------------------
-- 호스트:                          127.0.0.1
-- 서버 버전:                        10.2.10-MariaDB - mariadb.org binary distribution
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- cilab 데이터베이스 구조 내보내기
CREATE DATABASE IF NOT EXISTS `cilab` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cilab`;

-- 테이블 cilab.tb_admin 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `pk_no` int(11) NOT NULL AUTO_INCREMENT,
  `fd_id` varchar(50) DEFAULT NULL,
  `fd_pw` varchar(50) DEFAULT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_group` varchar(50) DEFAULT NULL,
  `fd_position` varchar(50) DEFAULT NULL,
  `fd_hp` varchar(50) DEFAULT NULL,
  `fd_connect` date DEFAULT NULL,
  `fd_type` char(1) DEFAULT 'a',
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_admin:2 rows 내보내기
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` (`pk_no`, `fd_id`, `fd_pw`, `fd_name`, `fd_group`, `fd_position`, `fd_hp`, `fd_connect`, `fd_type`) VALUES
	(1, 'admin', '$1$770.CR..$1KAprMYQKHX35aJgxjeBq0', '김관리', 'bs', '대리', '010-3124-6767', '2018-11-11', 'a'),
	(4, 'admin2', '$1$770.CR..$1KAprMYQKHX35aJgxjeBq0', '이관리', 'bs', '과장', '010-1234-5678', '2018-11-10', 'a');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;

-- 테이블 cilab.tb_contents 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_contents` (
  `pk_no` int(11) NOT NULL AUTO_INCREMENT,
  `fd_title` varchar(50) DEFAULT NULL,
  `fd_content` varchar(200) DEFAULT NULL,
  `fd_name` varchar(20) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_contents:1 rows 내보내기
/*!40000 ALTER TABLE `tb_contents` DISABLE KEYS */;
INSERT INTO `tb_contents` (`pk_no`, `fd_title`, `fd_content`, `fd_name`, `fd_date`) VALUES
	(6, 'ㅅㅅㅅ', '', '김관리', '2018-11-09');
/*!40000 ALTER TABLE `tb_contents` ENABLE KEYS */;

-- 테이블 cilab.tb_notice 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_notice` (
  `pk_no` int(11) NOT NULL AUTO_INCREMENT,
  `fd_title` varchar(50) DEFAULT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_count` int(11) DEFAULT 0,
  `fd_file` varchar(50) DEFAULT NULL,
  `fd_new_file` varchar(50) DEFAULT NULL,
  `fd_content` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_notice:2 rows 내보내기
/*!40000 ALTER TABLE `tb_notice` DISABLE KEYS */;
INSERT INTO `tb_notice` (`pk_no`, `fd_title`, `fd_name`, `fd_date`, `fd_count`, `fd_file`, `fd_new_file`, `fd_content`) VALUES
	(8, '공지도 한번테스트', '김관리', '2018-11-10', 3, 'test.png', '5be71a8ec2a75.png', 'ㅌㅌㅌ'),
	(7, '공지요2', '김관리', '2018-11-09', 1, 'test.png||test1.png', '5be5cdea301f7.png||5be5cdea307aa.png', '공지오');
/*!40000 ALTER TABLE `tb_notice` ENABLE KEYS */;

-- 테이블 cilab.tb_option 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_option` (
  `pk_no` int(11) NOT NULL AUTO_INCREMENT,
  `fd_pro_no` int(11) DEFAULT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_value` varchar(50) DEFAULT NULL,
  `fd_extra` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 테이블 데이터 cilab.tb_option:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `tb_option` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_option` ENABLE KEYS */;

-- 테이블 cilab.tb_order 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_order` (
  `pk_no` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order_number` varchar(50) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_product_no` int(11) DEFAULT NULL,
  `fd_order_id` varchar(50) DEFAULT NULL,
  `fd_order_hp` varchar(50) DEFAULT NULL,
  `fd_order_name` varchar(50) DEFAULT NULL,
  `fd_order_mail` varchar(50) DEFAULT NULL,
  `fd_del_name` varchar(50) DEFAULT NULL,
  `fd_del_zip` varchar(50) DEFAULT NULL,
  `fd_del_address1` varchar(50) DEFAULT NULL,
  `fd_del_address2` varchar(50) DEFAULT NULL,
  `fd_del_hp` varchar(50) DEFAULT NULL,
  `fd_del_comment` varchar(50) DEFAULT NULL,
  `fd_price` int(11) DEFAULT NULL,
  `fd_del_fee` int(11) DEFAULT 0,
  `fd_payment` varchar(50) DEFAULT NULL,
  `fd_paynum` varchar(50) DEFAULT NULL,
  `fd_invoice_number` varchar(50) DEFAULT NULL,
  `fd_status` varchar(50) DEFAULT '1',
  `fd_status_msg` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='\r\n';

-- 테이블 데이터 cilab.tb_order:6 rows 내보내기
/*!40000 ALTER TABLE `tb_order` DISABLE KEYS */;
INSERT INTO `tb_order` (`pk_no`, `fk_order_number`, `fd_date`, `fd_product_no`, `fd_order_id`, `fd_order_hp`, `fd_order_name`, `fd_order_mail`, `fd_del_name`, `fd_del_zip`, `fd_del_address1`, `fd_del_address2`, `fd_del_hp`, `fd_del_comment`, `fd_price`, `fd_del_fee`, `fd_payment`, `fd_paynum`, `fd_invoice_number`, `fd_status`, `fd_status_msg`) VALUES
	(21, '181110001', '2018-11-10', 1, 'bhg514', '010-3389-3333', '배현길', 'bhk514@hanmail.net', '배현길', '06364', '서울 강남구 자곡동 210', '상세어딘가', '010-3389-3333', '빨리주숑', 2500, 2000, NULL, NULL, NULL, '1', NULL),
	(22, '181110002', '2018-11-10', 2, 'bhg514', '010-3389-3333', '배현길', 'bhk514@hanmail.net', '배현길', '06364', '서울 강남구 자곡동 210', '상세어딘가', '010-3389-3333', '빨리주숑', 2500, 2000, NULL, NULL, NULL, '1', NULL),
	(23, '181110003', '2018-11-10', 1, 'bhg514', '010-3389-3333', '배현길', 'bhk514@hanmail.net', '배현길', '06364', '서울 강남구 자곡동 210', '상세어딘가', '010-3389-3333', '빨리주숑', 2500, 2000, NULL, NULL, NULL, '2', NULL),
	(24, '181110004', '2018-11-10', 1, 'bhg514', '010-3389-3333', '배현길', 'bhk514@hanmail.net', '배현길', '06364', '서울 강남구 자곡동 210', '상세어딘가', '010-3389-3333', '빨리주숑', 2500, 2000, NULL, NULL, '6075051734329', '3', NULL),
	(25, '181110005', '2018-11-10', 1, 'bhg514', '010-3389-3333', '배현길', 'bhk514@hanmail.net', '배현길', '06364', '서울 강남구 자곡동 210', '상세어딘가', '010-3389-3333', '빨리주숑', 2500, 2000, NULL, NULL, '6075051734329', '4', NULL),
	(26, '181110005', '2018-11-10', 1, 'bhg514', '010-3389-3333', '배현길', 'bhk514@hanmail.net', '배현길', '06364', '서울 강남구 자곡동 210', '상세어딘가', '010-3389-3333', '빨리주숑', 2500, 2000, NULL, NULL, '6075051734329', '5', NULL);
/*!40000 ALTER TABLE `tb_order` ENABLE KEYS */;

-- 테이블 cilab.tb_order_detail 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_order_detail` (
  `fk_order_no` int(11) NOT NULL,
  `fk_product_no` varchar(50) DEFAULT NULL,
  `fd_product_name` varchar(50) DEFAULT NULL,
  `fd_count` int(11) DEFAULT NULL,
  `fd_option` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_order_detail:0 rows 내보내기
/*!40000 ALTER TABLE `tb_order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_order_detail` ENABLE KEYS */;

-- 테이블 cilab.tb_product 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_product` (
  `pk_no` int(11) NOT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_price` int(11) DEFAULT NULL,
  `fd_category` varchar(50) DEFAULT NULL,
  `fd_content` longtext DEFAULT NULL,
  `fd_stock` int(11) DEFAULT NULL,
  `fd_date` varchar(50) DEFAULT NULL,
  `fd_status` varchar(50) DEFAULT NULL,
  `fd_delivery` int(11) DEFAULT NULL,
  `fd_made` varchar(50) DEFAULT NULL,
  `fd_main_img` varchar(200) DEFAULT NULL,
  `fd_new_main_img` varchar(200) DEFAULT NULL,
  `fd_sub_img` varchar(200) DEFAULT NULL,
  `fd_new_sub_img` varchar(200) DEFAULT NULL,
  `fd_option` varchar(200) DEFAULT NULL,
  `fk_admin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_product:5 rows 내보내기
/*!40000 ALTER TABLE `tb_product` DISABLE KEYS */;
INSERT INTO `tb_product` (`pk_no`, `fd_name`, `fd_price`, `fd_category`, `fd_content`, `fd_stock`, `fd_date`, `fd_status`, `fd_delivery`, `fd_made`, `fd_main_img`, `fd_new_main_img`, `fd_sub_img`, `fd_new_sub_img`, `fd_option`, `fk_admin`) VALUES
	(1, '선', 2500, '2', '<p><img src=/admin/img/upload_image/5be5c9cb8fb34.png><br></p>', 6000, '2018-11-09 05:54:19', '판매중', 2000, '대한민국', 'test.png', '5be5c93fd0247.png', 'test1.png', '5be5c93fcf990.png', '굵은거^10000||얇은거^2000', '김관리'),
	(2, '선2', 2500, '2', '<p><img src=/admin/img/upload_image/5be5c9cb8fb34.png><br></p>', 6000, '2018-11-09 05:54:19', '판매중', 2000, '대한민국', 'test.png', '5be5c93fd0247.png', 'test1.png', '5be5c93fcf990.png', '굵은거^10000||얇은거^2000', '김관리'),
	(3, '선', 2500, '2', '<p><img src=/admin/img/upload_image/5be5c9cb8fb34.png><br></p>', 6000, '2018-11-09 05:54:19', '판매중', 2000, '대한민국', 'test.png', '5be5c93fd0247.png', 'test1.png', '5be5c93fcf990.png', '굵은거^10000||얇은거^2000', '김관리'),
	(4, '선', 2500, '2', '<p><img src=/admin/img/upload_image/5be5c9cb8fb34.png><br></p>', 6000, '2018-11-09 05:54:19', '판매중', 2000, '대한민국', 'test.png', '5be5c93fd0247.png', 'test1.png', '5be5c93fcf990.png', '굵은거^10000||얇은거^2000', '김관리'),
	(5, '이것은 WD3', 5000000, '1', '<p><img style=\'width: 50%;\'src=/admin/img/upload_image/5be709d9d7473.png></p><p><img style=\'width: 25%;\' src=\'/admin/img/upload_image/5be6f25fe7da5.png\'><br></p>', 333, '2018-11-10 04:39:53', '판매중', 0, '대한민국', '', '', '', '', '', '김관리');
/*!40000 ALTER TABLE `tb_product` ENABLE KEYS */;

-- 테이블 cilab.tb_qna 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_qna` (
  `pk_no` int(11) NOT NULL AUTO_INCREMENT,
  `fd_title` varchar(50) DEFAULT NULL,
  `fd_content` varchar(200) DEFAULT NULL,
  `fd_file` varchar(50) DEFAULT NULL,
  `fd_new_file` varchar(50) DEFAULT NULL,
  `fd_pw` varchar(50) DEFAULT NULL,
  `fd_name` varchar(200) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_hp` varchar(50) DEFAULT NULL,
  `fd_mail` varchar(50) DEFAULT NULL,
  `fd_reply` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_qna:133 rows 내보내기
/*!40000 ALTER TABLE `tb_qna` DISABLE KEYS */;
INSERT INTO `tb_qna` (`pk_no`, `fd_title`, `fd_content`, `fd_file`, `fd_new_file`, `fd_pw`, `fd_name`, `fd_date`, `fd_hp`, `fd_mail`, `fd_reply`) VALUES
	(1, 'qna_1', 'qna1', NULL, NULL, '1234', '몰라', '2018-10-28', '010-2314-7657', 'abc@def.ghi', '이것은 답변\r\n'),
	(2, 'qna_2', 'qna1', NULL, NULL, '1234', '몰라', '2018-10-28', '010-3389-3854', 'abc@def.ghi', '뭐시여'),
	(14, '333', '333', 'test.png', '5be5b6135299f.png', '$1$wU..3b5.$fwvmpYPr5OQ5EjKkT28rk/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(13, '333', '333', 'test.png', '5be5b5f5de9e8.png', '$1$C...jc5.$ojuZIHIH0/SSmLnRvjaJZ/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(12, '1111', '222', 'test.png', '5be5b5c1d6f1d.png', '$1$Eg2.7M..$KLVVbvj.yMyPVYZRWNJDi.', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(11, '궁금하오', '궁금쓰', 'test.png', '5be71a6637a4d.png', '$1$0b..HD5.$4EG8akkiRUluQsZQh1q3h0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(10, '문의요', '문', '', '', '$1$YW2.BM/.$caiBQkX1UfCx1.5cR/oYl/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(15, '333', '333', 'test.png', '5be5b6d694021.png', '$1$pG0.8R5.$om16o.MjSuaLg4HlbkiL81', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(16, '333', '333', 'test.png', '5be5b70085c0e.png', '$1$Ow..9d..$DmdujCYFwCqlGuhiv.OSH0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(17, '333', '333', 'test.png', '5be5b726a265a.png', '$1$vO..MT..$zY.3lMXnajneuB7wLQFEw0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(18, '333', '333', 'test.png', '5be5b73c32a02.png', '$1$ck4./p4.$uQtHULf2aqBuQmBCg9c3O/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(19, '333', '333', 'test.png', '5be5b74a27ce2.png', '$1$lQ3.Ks1.$3aE5Lsu30W5Ask6d8ZAfs/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(20, '333', '333', 'test.png', '5be5b75caa94f.png', '$1$a9..b...$qKdJPkAO/dUEc3GZaBL2Z.', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(21, '1', '1', '', '', '$1$LC3.2a2.$wgTCzELd9KWKfRHMGFmxP/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(22, '1', '1', '', '', '$1$hJ1.WK0.$f/lLWxxpWpInXNO.vAfzB.', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(23, '1', '1', '', '', '$1$n6/.kb5.$jY7n7yaK.GXoidS1Mmum50', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(24, '1', '1', '', '', '$1$dh1.ib5.$OFAdNd/SYuvWhPTsDj05X/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(25, '1', '1', '', '', '$1$Du/.QI2.$.53jGJe.DzzgoqkUypfxo1', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(26, '1', '1', '', '', '$1$ZI0.uP2.$qjTorx3C8byd80BUZolsC/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(27, '1', '1', '', '', '$1$fG/.6Q/.$DtRKeGK51frbmCMdo0oCx1', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(28, '1', '1', '', '', '$1$Vu4.4X3.$TO.v0B55VLGyDZ1xvqrQb.', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(29, '1', '1', '', '', '$1$503.oi/.$XUCpYfWZ11CTX/YKtk37H/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(30, '1', '1', '', '', '$1$RD3.Gh1.$Exl5RKEeUiw88HY3SAD1q.', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(31, '1', '1', '', '', '$1$Xs4.Uw1.$HWecbmMSdSpl6.ISJ7sqs.', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(32, '1', '1', '', '', '$1$N13.Se1.$X5.BX3EsJB3W.KYD9rB06/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(33, '1', '1', '', '', '$1$zZ2.Ap0.$cE7wiATfKVdMI5X0bCPqy0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(34, '1', '1', '', '', '$1$J40.e84.$PwoNsJJIn8oFW7T3pNToh0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(35, '1', '1', '', '', '$1$Pu5.s63.$oszrcB5lBi/B9nRaMt88J1', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(36, '1', '1', '', '', '$1$F62.qx5.$ZEwpk3YeoKIB9OD/Y2oML1', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(37, '1', '1', '', '', '$1$rZ4.Yb3.$YeUUO7Qt3Q2YaRHFkSqyW.', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(38, '1', '1', '', '', '$1$Bt4.0o/.$.7NJwY2xfeXzDlVXuTJjK/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(39, '1', '1', '', '', '$1$I90.xl/.$fAR4O/9Y76LC3GSekrKh61', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(40, '1', '1', '', '', '$1$mR4.1T5.$Jfi3XMOyfFXaR4tKXpBO90', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(41, '1', '1', '', '', '$1$.V/.tB..$Z49WvROe7ZP.fYcJhRudy/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(42, '1', '1', '', '', '$1$yW..To2.$.OwM7/p4DOhsYxGg5WgXL/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(43, '1', '1', '', '', '$1$gV5.ps3.$8LzVwckBLA5YY6XD7qn18.', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(44, '1', '1', '', '', '$1$895.vk/.$flCgZoDhJjY0HajCzKMlE/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(45, '1', '1', '', '', '$1$Mx0.lW0.$Fb3AYHWL7n8laj6WMJ/Pi1', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(46, '1', '1', '', '', '$1$K45.L22.$/W85CF686xt/6W8Gg6UKC0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(47, '1', '1', '', '', '$1$2Y4.hv/.$zyjjBL18Lqj4OefV64E1o/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(48, '1', '1', '', '', '$1$W2/.nS3.$98FMXYSsx2S72r5sPy4L80', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(49, '1', '1', '', '', '$1$k3/.dn1.$RE0jhmnOUwLW2EB1Di2tg/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(50, '1', '1', '', '', '$1$ip/.Dk1.$Xh2NX.IbX6d416bZHTGBe1', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(51, '1', '1', '', '', '$1$QG3.Zu1.$/SofJEFqJg4UCsQXC8hQJ1', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(52, '1', '1', '', '', '$1$u70.fc..$2l3lJPCrP1GDCsRU3bWh70', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(53, '1', '1', '', '', '$1$6u/.V.0.$FJ.GclZA8gQKGjctkWfeZ/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(54, '1', '1', '', '', '$1$4l4.5s/.$waahZifkk2skifwH7afFo.', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(55, '1', '1', '', '', '$1$og/.Rp/.$yC5dE87A8vObEB3bruj8w1', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(56, '1', '1', '', '', '$1$GP..XC/.$IcgaCrQef7lIFeEeRyQVQ0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(57, '1', '1', '', '', '$1$UO1.N71.$AlIlct8pHTpT57yAoTIxv.', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(58, '1', '1', '', '', '$1$Ss1.zP2.$EO5BPsOyn8tz99rZNREGY.', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(59, '1', '1', '', '', '$1$An/.Jg/.$jI8gJLbNJIWRrCcZO5yi.1', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(60, '1', '1', '', '', '$1$es/.PE3.$HC6SaH96MQGUe7KD90aMk0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(61, '1', '1', '', '', '$1$sa1.FC3.$zpWCP9DAybganuCqGntI./', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(62, '1', '1', '', '', '$1$q95.rP/.$O4/La.jTKTz8.bISg4ibK0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(63, '1', '1', '', '', '$1$YZ1.BT/.$3.Kbxpa/Utp6Yc3AgIEkU/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(64, '1', '1', '', '', '$1$0W2.Hi0.$Yt9KxMHfn46OG1yImRlCL.', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(65, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(66, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(67, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(68, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(69, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(70, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(71, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(72, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(73, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(74, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(75, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(76, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(77, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(78, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(79, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(80, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(81, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(82, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(83, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(84, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(85, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(86, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(87, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(88, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(89, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(90, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(91, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(92, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(93, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(94, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(95, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(96, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(97, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(98, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(99, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(100, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(101, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(102, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(103, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(104, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(105, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(106, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(107, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(108, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(109, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(110, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(111, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(112, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(113, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(114, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(115, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(116, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(117, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(118, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(119, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(120, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(121, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(122, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(123, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(124, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(125, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(126, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(127, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(128, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(129, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(130, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(131, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(132, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(133, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(134, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(135, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(136, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(137, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(138, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', NULL),
	(139, '1', '1', '', '', '$1$HM0.E/1.$9YCGrCPLgCUt7METb3Lum0', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', '뭐시여'),
	(140, '1', '1', '', '', '$1$ET..7D4.$p1ZeOmYBWhtmLRBo4LUAN/', '배현길', '2018-11-09', '010-3389-3333', 'bhk514@hanmail.net', '나도 몰러');
/*!40000 ALTER TABLE `tb_qna` ENABLE KEYS */;

-- 테이블 cilab.tb_sw 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_sw` (
  `pk_no` int(11) NOT NULL AUTO_INCREMENT,
  `fd_title` varchar(50) DEFAULT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_count` int(11) DEFAULT 0,
  `fd_file` varchar(50) DEFAULT NULL,
  `fd_new_file` varchar(50) DEFAULT NULL,
  `fd_content` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 테이블 데이터 cilab.tb_sw:7 rows 내보내기
/*!40000 ALTER TABLE `tb_sw` DISABLE KEYS */;
INSERT INTO `tb_sw` (`pk_no`, `fd_title`, `fd_name`, `fd_date`, `fd_count`, `fd_file`, `fd_new_file`, `fd_content`) VALUES
	(4, 'sw제목이오', '김관리', '2018-11-09', 1, 'test.png', '5be5cf1c98839.png', ''),
	(5, '첨부파일이요', '김관리', '2018-11-10', 0, 'test1.png', '5be718b5253ba.png', '첨부하나있소'),
	(6, '테스트합니다', '김관리', '2018-11-10', 0, 'test1.png', '5be71934b7184.png', '테스트'),
	(7, '경로수정했으', '김관리', '2018-11-10', 0, 'test1.png', '5be71a2c84e43.png', '해쓰요'),
	(8, '나참ㅋㅋ', '김관리', '2018-11-10', 0, 'test1.png', '5be71a57a9e7b.png', '골아파'),
	(9, '나참ㅋㅋ', '김관리', '2018-11-10', 3, 'test1.png', '5be71a6637a4d.png', '골아파'),
	(10, '2개', '김관리', '2018-11-10', 1, 'test.png||test1.png', '5be7239d40881.png||5be7239d4100c.png', '2개');
/*!40000 ALTER TABLE `tb_sw` ENABLE KEYS */;

-- 테이블 cilab.tb_user 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_user` (
  `pk_no` int(11) NOT NULL AUTO_INCREMENT,
  `fd_id` varchar(50) DEFAULT NULL,
  `fd_pw` varchar(100) DEFAULT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_hp` varchar(50) DEFAULT NULL,
  `fd_mail` varchar(50) DEFAULT NULL,
  `fd_zip` varchar(50) DEFAULT NULL,
  `fd_address1` varchar(50) DEFAULT NULL,
  `fd_address2` varchar(50) DEFAULT NULL,
  `fd_reception` char(1) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_gender` char(1) DEFAULT NULL,
  `fd_birthday` date DEFAULT NULL,
  `fd_type` char(1) DEFAULT 'u',
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_user:2 rows 내보내기
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`pk_no`, `fd_id`, `fd_pw`, `fd_name`, `fd_hp`, `fd_mail`, `fd_zip`, `fd_address1`, `fd_address2`, `fd_reception`, `fd_date`, `fd_gender`, `fd_birthday`, `fd_type`) VALUES
	(6, 'test123', '$2y$10$rZQqu3dJZr38ze0Hm22XM.W9Etm/WWors/qX5/7/2A6G2jvgs9g7C', '배현길', '010-3389-3333', 'bhg514@naver.com', '06027', '서울 강남구 신사동 527-4', '지구', 'o', '2018-10-06', 'w', '2018-10-09', 'u'),
	(7, 'bhg514', '$1$770.CR..$1KAprMYQKHX35aJgxjeBq0', '배현길', '010-3389-3333', 'bhk514@hanmail.net', '06364', '서울 강남구 자곡동 210', '상세어딘가', 'x', '2018-10-13', 'm', '2018-10-11', 'u');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
