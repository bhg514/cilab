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
  `fd_number` int(11) DEFAULT NULL,
  `fd_connect` date DEFAULT NULL,
  `fd_type` char(1) DEFAULT 'a',
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_admin:1 rows 내보내기
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` (`pk_no`, `fd_id`, `fd_pw`, `fd_name`, `fd_group`, `fd_position`, `fd_number`, `fd_connect`, `fd_type`) VALUES
	(1, 'admin', '$1$SB4.zA0.$0YiQaggp04AwT6DvTqksx/', '관리자', NULL, NULL, NULL, '2018-10-13', 'a');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;

-- 테이블 cilab.tb_contents 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_contents` (
  `pk_no` int(11) NOT NULL AUTO_INCREMENT,
  `fd_title` varchar(50) DEFAULT NULL,
  `fd_content` varchar(200) DEFAULT NULL,
  `fd_writer` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_contents:1 rows 내보내기
/*!40000 ALTER TABLE `tb_contents` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_contents` ENABLE KEYS */;

-- 테이블 cilab.tb_notice 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_notice` (
  `pk_no` int(11) NOT NULL AUTO_INCREMENT,
  `fd_title` varchar(50) DEFAULT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_count` int(11) DEFAULT NULL,
  `fd_attach` varchar(50) DEFAULT NULL,
  `fd_content` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_notice:0 rows 내보내기
/*!40000 ALTER TABLE `tb_notice` DISABLE KEYS */;
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
  `fk_user` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_order:0 rows 내보내기
/*!40000 ALTER TABLE `tb_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_order` ENABLE KEYS */;

-- 테이블 cilab.tb_order_detail 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_order_detail` (
  `pk_no` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order_number` int(11) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_count` int(11) DEFAULT NULL,
  `fd_option` varchar(50) DEFAULT NULL,
  `fd_order_name` varchar(50) DEFAULT NULL,
  `fd_order_mail` varchar(50) DEFAULT NULL,
  `fd_del_name` varchar(50) DEFAULT NULL,
  `fd_del_address1` varchar(50) DEFAULT NULL,
  `fd_del_address2` varchar(50) DEFAULT NULL,
  `fd_del_number` varchar(50) DEFAULT NULL,
  `fd_del_comment` varchar(50) DEFAULT NULL,
  `fd_price` int(11) DEFAULT NULL,
  `fd_payment` varchar(50) DEFAULT NULL,
  `fd_invoice_number` int(11) DEFAULT NULL,
  `fd_status` varchar(50) DEFAULT NULL,
  `fd_status_msg` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `fd_main_img` varchar(50) DEFAULT NULL,
  `fd_sub_img` varchar(50) DEFAULT NULL,
  `fd_option` varchar(50) DEFAULT NULL,
  `fk_admin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_product:1 rows 내보내기
/*!40000 ALTER TABLE `tb_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_product` ENABLE KEYS */;

-- 테이블 cilab.tb_qna 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_qna` (
  `pk_no` int(11) NOT NULL AUTO_INCREMENT,
  `fd_title` varchar(50) DEFAULT NULL,
  `fd_content` varchar(200) DEFAULT NULL,
  `fd_attach` varchar(50) DEFAULT NULL,
  `fd_pw` int(4) DEFAULT NULL,
  `fd_answer` varchar(200) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_mail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_qna:0 rows 내보내기
/*!40000 ALTER TABLE `tb_qna` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_qna` ENABLE KEYS */;

-- 테이블 cilab.tb_sw 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_sw` (
  `pk_no` int(11) NOT NULL AUTO_INCREMENT,
  `fd_title` varchar(50) DEFAULT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_count` int(11) DEFAULT NULL,
  `fd_attach` varchar(50) DEFAULT NULL,
  `fd_content` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pk_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 테이블 데이터 cilab.tb_sw:0 rows 내보내기
/*!40000 ALTER TABLE `tb_sw` DISABLE KEYS */;
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

-- 테이블 데이터 cilab.tb_user:3 rows 내보내기
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`pk_no`, `fd_id`, `fd_pw`, `fd_name`, `fd_hp`, `fd_mail`, `fd_zip`, `fd_address1`, `fd_address2`, `fd_reception`, `fd_date`, `fd_gender`, `fd_birthday`, `fd_type`) VALUES
	(1, 'test12', 'pw1', '테스트용', NULL, 'test@test.com', NULL, '인천시 부평구', '삼산동', '1', '2018-09-28', 'm', '1991-09-28', NULL),
	(6, 'test123', '$2y$10$rZQqu3dJZr38ze0Hm22XM.W9Etm/WWors/qX5/7/2A6G2jvgs9g7C', '배현길', NULL, 'bhg514@naver.com', '06027', '서울 강남구 신사동 527-4', '지구', 'y', '2018-10-06', 'm', '2018-10-09', 'u'),
	(7, 'bhg514', '$1$SB4.zA0.$0YiQaggp04AwT6DvTqksx/', '배현길', '010-3389-3333', 'bhk514@hanmail.net', '06364', '서울 강남구 자곡동 210', 'sss', 'y', '2018-10-13', 'm', '2018-10-11', 'u');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
