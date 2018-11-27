-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 18-11-28 01:12
-- 서버 버전: 10.1.18-MariaDB
-- PHP 버전: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `cilab0710`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `tb_admin`
--

CREATE TABLE `tb_admin` (
  `pk_no` int(11) NOT NULL,
  `fd_id` varchar(50) DEFAULT NULL,
  `fd_pw` varchar(50) DEFAULT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_group` varchar(50) DEFAULT NULL,
  `fd_position` varchar(50) DEFAULT NULL,
  `fd_hp` varchar(50) DEFAULT NULL,
  `fd_connect` date DEFAULT NULL,
  `fd_type` char(1) DEFAULT 'a'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `tb_admin`
--

INSERT INTO `tb_admin` (`pk_no`, `fd_id`, `fd_pw`, `fd_name`, `fd_group`, `fd_position`, `fd_hp`, `fd_connect`, `fd_type`) VALUES
(1, 'admin', '$1$QGFL1Bur$PbQCAuJBGfzpw3X6u.N6S1', '김관리', '', '', '--', '2018-11-28', 'a');

-- --------------------------------------------------------

--
-- 테이블 구조 `tb_contents`
--

CREATE TABLE `tb_contents` (
  `pk_no` int(11) NOT NULL,
  `fd_title` varchar(50) DEFAULT NULL,
  `fd_content` varchar(200) DEFAULT NULL,
  `fd_name` varchar(20) DEFAULT NULL,
  `fd_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `tb_notice`
--

CREATE TABLE `tb_notice` (
  `pk_no` int(11) NOT NULL,
  `fd_title` varchar(50) DEFAULT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_count` int(11) DEFAULT '0',
  `fd_file` varchar(50) DEFAULT NULL,
  `fd_new_file` varchar(50) DEFAULT NULL,
  `fd_content` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `tb_option`
--

CREATE TABLE `tb_option` (
  `pk_no` int(11) NOT NULL,
  `fd_pro_no` int(11) DEFAULT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_value` varchar(50) DEFAULT NULL,
  `fd_extra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 테이블 구조 `tb_order`
--

CREATE TABLE `tb_order` (
  `pk_no` int(11) NOT NULL,
  `fk_order_number` varchar(50) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_product_no` int(11) DEFAULT NULL,
  `fd_product_name` varchar(50) DEFAULT NULL,
  `fd_product_option` varchar(50) DEFAULT NULL,
  `fd_product_count` int(11) DEFAULT NULL,
  `fd_order_id` varchar(50) DEFAULT NULL,
  `fd_order_hp` varchar(50) DEFAULT NULL,
  `fd_order_name` varchar(50) DEFAULT NULL,
  `fd_order_mail` varchar(50) DEFAULT NULL,
  `fd_del_name` varchar(50) DEFAULT NULL,
  `fd_del_zip` varchar(50) DEFAULT NULL,
  `fd_del_address1` varchar(50) DEFAULT NULL,
  `fd_del_address2` varchar(50) DEFAULT NULL,
  `fd_del_address3` varchar(50) DEFAULT NULL,
  `fd_del_address4` varchar(50) DEFAULT NULL,
  `fd_del_hp` varchar(50) DEFAULT NULL,
  `fd_del_comment` varchar(50) DEFAULT NULL,
  `fd_price` int(11) DEFAULT NULL,
  `fd_del_fee` int(11) DEFAULT '0',
  `fd_payment` varchar(50) DEFAULT NULL,
  `fd_paynum` varchar(50) DEFAULT NULL,
  `fd_invoice_number` varchar(50) DEFAULT NULL,
  `fd_status` varchar(50) DEFAULT '1',
  `fd_status_msg` varchar(200) DEFAULT NULL,
  `fd_imp_uid` varchar(50) DEFAULT NULL,
  `fd_merchant_uid` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='\r\n';

--
-- 테이블의 덤프 데이터 `tb_order`
--

INSERT INTO `tb_order` (`pk_no`, `fk_order_number`, `fd_date`, `fd_product_no`, `fd_product_name`, `fd_product_option`, `fd_product_count`, `fd_order_id`, `fd_order_hp`, `fd_order_name`, `fd_order_mail`, `fd_del_name`, `fd_del_zip`, `fd_del_address1`, `fd_del_address2`, `fd_del_address3`, `fd_del_address4`, `fd_del_hp`, `fd_del_comment`, `fd_price`, `fd_del_fee`, `fd_payment`, `fd_paynum`, `fd_invoice_number`, `fd_status`, `fd_status_msg`, `fd_imp_uid`, `fd_merchant_uid`) VALUES
(39, '181126001', '2018-11-26', 11, '방수 커넥터 케이블 4핀(4p)(Waterproof Connector)', '', 1, 'cilab123', '111-2222-3333', '테스트계정', 'bhg514@hanmail.net', '테스트계정', '123', '국가', '시', '구', '상', '111-2222-3333', '빠른 배송 부탁드립니다.', 2200, 2500, NULL, NULL, NULL, '4', NULL, 'imp_098898367382', 'merchant_1543205898158');

-- --------------------------------------------------------

--
-- 테이블 구조 `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `fk_order_no` int(11) NOT NULL,
  `fk_product_no` varchar(50) DEFAULT NULL,
  `fd_product_name` varchar(50) DEFAULT NULL,
  `fd_count` int(11) DEFAULT NULL,
  `fd_option` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `tb_product`
--

CREATE TABLE `tb_product` (
  `pk_no` int(11) NOT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_price` int(11) DEFAULT NULL,
  `fd_category` varchar(50) DEFAULT NULL,
  `fd_content` longtext,
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
  `fk_admin` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `tb_product`
--

INSERT INTO `tb_product` (`pk_no`, `fd_name`, `fd_price`, `fd_category`, `fd_content`, `fd_stock`, `fd_date`, `fd_status`, `fd_delivery`, `fd_made`, `fd_main_img`, `fd_new_main_img`, `fd_sub_img`, `fd_new_sub_img`, `fd_option`, `fk_admin`) VALUES
(4, '부력제 방수/수중 무게추(수중/방수/부력 조절/봉돌)', 20000, '3', '<p align=\'center\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf673dce67bf.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf673dce6c42.jpeg\'><br></p>', 40, '2018-11-26 01:04:11', '판매중', 2500, '중국', '무게추2.jpg', '5bf675864fbaf.jpg', '무게추.jpg', '5bf675864fd79.jpg', '무게(160g~169g)^-1000||무게(170g~179g)^0||무게(180g~189g)^1000', '김관리'),
(2, 'Afro ESC 12Amp OPTO UltraLite Multirotor ESC V3 (S', 42900, '3', '<p align=\'center\'><img style=\'width: 720px;\'src=/admin/img/upload_image/5bf6725e936e9.jpeg><br></p>', 100, '2018-11-22 06:09:50', '판매중', 0, '중국', '그림4.jpg', '5bf6725e94550.jpg', '로고_원본.jpg', '5bf6725e94083.jpg', '', '김관리'),
(3, 'Thruster', 330000, '3', '<p align=\'center\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf6734ace579.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf6734ace9cb.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf6734acec6b.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf6734acf037.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf6734acf31a.jpeg\'><br></p>', 40, '2018-11-22 06:16:34', '판매중', 0, '중국 ', '그림2.png', '5bf6734ad0284.png', '그림3.jpg', '5bf6734ad0164.jpg', '', '김관리'),
(1, '수중 브러시리스 모터 A2212/13T 1000KV(방수 모터)', 10200, '3', '<p align=\'center\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf671689f65c.jpeg\'><img style=\'width: 722px;\' src=\'/admin/img/upload_image/5bf671689f9c6.jpeg\'><br></p>', 50, '2018-11-22 06:07:24', '판매중', 2500, '중국', '그림1.png', '5bf671cc65379.png', '원본_2.jpg', '5bf671cc65735.jpg', '', '김관리'),
(5, '4잎 플라스틱 프로펠러/4입 프로펠러/프로펠러/수중 프로펠러/5mm 프로펠러', 27600, '3', '<p align=\'center\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf674926fd99.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf67492701a6.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf67492704ee.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf67492707e4.jpeg\'><br></p>', 50, '2018-11-22 06:42:09', '판매중', 2500, '중국', '메인.jpg', '5bf67492715a1.jpg', '예시.jpg', '5bf6749271405.jpg', '정방향^0||역방향^0', '김관리'),
(6, '4잎 합금 프로펠러/프로펠러/금속 프로펠러/수중 프로펠러/메탈 프로펠러(정방향)', 32000, '3', '<p><img style=\'width: 720px;\'src=/admin/img/upload_image/5bf6767cb5ce9.jpeg></p><p align=\'center\'><img style=\'width: 720px;\'src=/admin/img/upload_image/5bf6767cb612d.jpeg><br></p>', 50, '2018-11-22 06:27:24', '판매중', 2500, '중국', '응용1.jpg', '5bf6767cb67c6.jpg', '', '', '', '김관리'),
(9, '방수 커넥터 케이블 2핀(2p)(Waterproof Connector)', 2400, '3', '<p align=\'center\'><img style=\'width: 720px;\'src=/admin/img/upload_image/5bf67abbca108.jpeg><img style=\'width: 720px;\'src=/admin/img/upload_image/5bf67abbca5a0.jpeg><br></p>', 500, '2018-11-22 06:45:31', '판매중', 2500, '중국', '메인.jpg', '5bf67abbcad12.jpg', '2pin_1.jpg', '5bf67abbcabb3.jpg', '', '김관리'),
(7, '통신 케이블 공릴 - 100M 이하용', 42300, '3', '<p align=\'center\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf67844c7d69.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf67844c8207.jpeg\'><br></p>', 30, '2018-11-22 06:35:19', '판매중', 2500, '중국', '공릴_메인.png', '5bf67844c8d7c.png', '그림6.jpg', '5bf67844c8c2c.jpg', '', '김관리'),
(8, '통신 / 중성부력 / 수중로봇 / 방수 케이블', 13200, '3', '<p align=\'center\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf678ebc158a.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf678ebc1839.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf678ebc1aa7.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf678ebc1ebf.jpeg\'><br></p>', 1200, '2018-11-22 06:43:09', '판매중', 2500, '중국', '3333.jpg', '5bf678ebc2bb9.jpg', '사.jpg', '5bf678ebc2736.jpg', '1M 기준 ^0', '김관리'),
(10, '방수 커넥터 케이블 3핀(3p)(Waterproof Connector)', 2400, '3', '<p align=\'center\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf67b13b1b63.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf67b13b1e98.jpeg\'><br></p>', 500, '2018-11-22 06:49:47', '판매중', 2500, '중국', '3pin.jpg', '5bf67b13b25dd.jpg', '3 복사.jpg', '5bf67b13b22ac.jpg', '', '김관리'),
(11, '방수 커넥터 케이블 4핀(4p)(Waterproof Connector)', 2200, '3', '<p align=\'center\'><img style=\'width: 720px;\'src=/admin/img/upload_image/5bf67c093342b.jpeg><img style=\'width: 720px;\'src=/admin/img/upload_image/5bf67c093372c.jpeg><br></p>', 499, '2018-11-22 06:51:05', '판매중', 2500, '중국 ', '4pin_2.jpg', '5bf67c0933c59.jpg', '4pin_3.jpg', '5bf67c0933b0d.jpg', '', '김관리'),
(12, '다목적 방수 하드케이스/방수 케이스', 49500, '2', '<p align=\'center\'><img style=\'width: 720px;\'src=/admin/img/upload_image/5bf67c85bdcdf.jpeg><img style=\'width: 720px;\'src=/admin/img/upload_image/5bf67c85be127.jpeg><img style=\'width: 720px;\'src=/admin/img/upload_image/5bf67c85be513.jpeg><br></p>', 200, '2018-11-22 06:53:09', '판매중', 2500, '중국 ', '1.jpg', '5bf67c85bf923.jpg', '4_1.jpg', '5bf67c85bf10b.jpg', '', '김관리'),
(13, 'IWD-IMU V1 (수중용 방수 IMU 센서)', 880000, '2', '<p align=\'center\'><img style=\'width: 1190px;\' src=\'/admin/img/upload_image/5bf67d935818b.png\'><br></p><p align=\'center\'><img style=\'width: 582px;\' src=\'/admin/img/upload_image/5bf67d2f2e64f.png\'><img style=\'width: 581px;\' src=\'/admin/img/upload_image/5bf67d2f2fd01.png\'><img style=\'width: 581px;\' src=\'/admin/img/upload_image/5bf67d2f3016c.png\'></p><p align=\'center\'><img style=\'width: 583px;\' src=\'/admin/img/upload_image/5bf67d2f30529.png\'></p><p align=\'center\'><br></p><p align=\'center\'><iframe width=\'640\' height=\'360\' class=\'note-video-clip\' src=\'//www.youtube.com/embed/xnpwuZDMtoc\' frameborder=\'0\'></iframe></p><p align=\'center\'><br></p>', 20, '2018-11-22 07:37:30', '판매중', 0, '대한민국 ', '메인 배경.png', '5bf67d2f3250e.png', '메인사진.jpg', '5bf67dc8ec7eb.jpg', '레드^0||골드^0||블루^0||실버^0', '김관리'),
(14, '8Pin 방수 통신 / 중성 부력 / 방수 케이블 50M/100M SET', 660000, '3', '<p align=\'center\'><img style=\'width: 582px;\' src=\'/admin/img/upload_image/5bf6813e4d0dc.png\'><img style=\'width: 569px;\' src=\'/admin/img/upload_image/5bf6813e4e53b.png\'><img style=\'width: 579px;\' src=\'/admin/img/upload_image/5bf6821733b38.png\'><img style=\'width: 584px;\' src=\'/admin/img/upload_image/5bf68217345b9.png\'></p><p align=\'center\'><br></p><p align=\'center\'><img style=\'width: 398px;\' src=\'/admin/img/upload_image/5bf6821735691.png\'></p><p align=\'center\'><iframe class=\'note-video-clip\' src=\'//www.youtube.com/embed/ZN1DwsBqQEE\' width=\'640\' height=\'360\' frameborder=\'0\'></iframe><br></p>', 20, '2018-11-23 09:00:23', '판매중', 0, '중국 ', '50m.png', '5bf6813e505d8.png', '100m.png', '5bf6813e4ff1a.png', '50M SET^0||100M SET^+660000', '김관리'),
(15, '방수 수축튜브/열/절연/삼중/투명/수축 튜브/삼중 수축률', 4400, '2', '<p align=\'center\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf683622d90d.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf683622ddcc.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf683622e11d.jpeg\'><br></p>', 100, '2018-11-22 07:29:45', '판매중', 2500, '중국 ', '메인22.jpg', '5bf684ead957f.jpg', '메인22.jpg', '5bf684ead96d2.jpg', '1M 기준^0', '김관리'),
(16, '방수 커넥터 케이블 8핀(8p)(Waterproof Connector)', 7900, '2', '<p align=\'center\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf68b6042767.jpeg\'><img style=\'width: 720px;\' src=\'/admin/img/upload_image/5bf68b6042b82.jpeg\'><br></p>', 100, '2018-11-22 07:56:47', '판매중', 2500, '중국 ', '8핀메인.jpg', '5bf68b6043097.jpg', '8핀메인.jpg', '5bf68b6043211.jpg', '', '김관리'),
(17, 'IWD_수중드론 ', 2200000, '1', '<p align=\'center\'><img style=\'width: 581px;\'src=/admin/img/upload_image/5bf68aef41b69.jpeg><br></p><p align=\'center\'><img style=\'width: 574px;\'src=/admin/img/upload_image/5bf68aef428fe.jpeg><br></p><p align=\'center\'><img style=\'width: 579px;\'src=/admin/img/upload_image/5bf68aef43882.jpeg><br></p><p align=\'center\'><img style=\'width: 638px;\' src=\'/admin/img/upload_image/5bf688d3591c4.png\'><img style=\'width: 642px;\' src=\'/admin/img/upload_image/5bf688d35a576.png\'><br></p>', 10, '2018-11-22 07:54:39', '판매중', 0, '대한민국 ', '메인.jpg', '5bf689a479e0d.jpg', '메인.jpg', '5bf689a47a003.jpg', '빨강^0', '김관리');

-- --------------------------------------------------------

--
-- 테이블 구조 `tb_qna`
--

CREATE TABLE `tb_qna` (
  `pk_no` int(11) NOT NULL,
  `fd_title` varchar(50) DEFAULT NULL,
  `fd_content` varchar(200) DEFAULT NULL,
  `fd_file` varchar(50) DEFAULT NULL,
  `fd_new_file` varchar(50) DEFAULT NULL,
  `fd_pw` varchar(50) DEFAULT NULL,
  `fd_name` varchar(200) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_hp` varchar(50) DEFAULT NULL,
  `fd_mail` varchar(50) DEFAULT NULL,
  `fd_reply` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `tb_sw`
--

CREATE TABLE `tb_sw` (
  `pk_no` int(11) NOT NULL,
  `fd_title` varchar(50) DEFAULT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_count` int(11) DEFAULT '0',
  `fd_file` varchar(50) DEFAULT NULL,
  `fd_new_file` varchar(50) DEFAULT NULL,
  `fd_content` varchar(200) DEFAULT NULL,
  `fd_version` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 테이블 구조 `tb_user`
--

CREATE TABLE `tb_user` (
  `pk_no` int(11) NOT NULL,
  `fd_id` varchar(50) DEFAULT NULL,
  `fd_pw` varchar(100) DEFAULT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_hp` varchar(50) DEFAULT NULL,
  `fd_mail` varchar(50) DEFAULT NULL,
  `fd_zip` varchar(50) DEFAULT NULL,
  `fd_address1` varchar(50) DEFAULT NULL,
  `fd_address2` varchar(50) DEFAULT NULL,
  `fd_address3` varchar(50) DEFAULT NULL,
  `fd_address4` varchar(50) DEFAULT NULL,
  `fd_reception` char(1) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  `fd_gender` char(1) DEFAULT NULL,
  `fd_birthday` date DEFAULT NULL,
  `fd_type` char(1) DEFAULT 'u'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `tb_user`
--

INSERT INTO `tb_user` (`pk_no`, `fd_id`, `fd_pw`, `fd_name`, `fd_hp`, `fd_mail`, `fd_zip`, `fd_address1`, `fd_address2`, `fd_address3`, `fd_address4`, `fd_reception`, `fd_date`, `fd_gender`, `fd_birthday`, `fd_type`) VALUES
(10, 'cilab123', '$1$2j30yo64$Nb1SNtkv0Ik.GPU3.sBjT/', '테스트계정', '111-2222-3333', 'bhg514@hanmail.net', '123', '국가', '시', '구', '상', 'y', '2018-11-28', 'm', '1981-11-04', 'u');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`pk_no`);

--
-- 테이블의 인덱스 `tb_contents`
--
ALTER TABLE `tb_contents`
  ADD PRIMARY KEY (`pk_no`);

--
-- 테이블의 인덱스 `tb_notice`
--
ALTER TABLE `tb_notice`
  ADD PRIMARY KEY (`pk_no`);

--
-- 테이블의 인덱스 `tb_option`
--
ALTER TABLE `tb_option`
  ADD PRIMARY KEY (`pk_no`);

--
-- 테이블의 인덱스 `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`pk_no`);

--
-- 테이블의 인덱스 `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`pk_no`);

--
-- 테이블의 인덱스 `tb_qna`
--
ALTER TABLE `tb_qna`
  ADD PRIMARY KEY (`pk_no`);

--
-- 테이블의 인덱스 `tb_sw`
--
ALTER TABLE `tb_sw`
  ADD PRIMARY KEY (`pk_no`);

--
-- 테이블의 인덱스 `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`pk_no`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 테이블의 AUTO_INCREMENT `tb_contents`
--
ALTER TABLE `tb_contents`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 테이블의 AUTO_INCREMENT `tb_notice`
--
ALTER TABLE `tb_notice`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 테이블의 AUTO_INCREMENT `tb_option`
--
ALTER TABLE `tb_option`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- 테이블의 AUTO_INCREMENT `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- 테이블의 AUTO_INCREMENT `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 테이블의 AUTO_INCREMENT `tb_qna`
--
ALTER TABLE `tb_qna`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- 테이블의 AUTO_INCREMENT `tb_sw`
--
ALTER TABLE `tb_sw`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 테이블의 AUTO_INCREMENT `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
