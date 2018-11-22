-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2018 at 02:40 PM
-- Server version: 10.1.18-MariaDB
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cilab0710`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
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
-- Truncate table before insert `tb_admin`
--

TRUNCATE TABLE `tb_admin`;
--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`pk_no`, `fd_id`, `fd_pw`, `fd_name`, `fd_group`, `fd_position`, `fd_hp`, `fd_connect`, `fd_type`) VALUES
(1, 'admin', '$1$QGFL1Bur$PbQCAuJBGfzpw3X6u.N6S1', '김관리', '', '', '--', '2018-11-22', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contents`
--

CREATE TABLE `tb_contents` (
  `pk_no` int(11) NOT NULL,
  `fd_title` varchar(50) DEFAULT NULL,
  `fd_content` varchar(200) DEFAULT NULL,
  `fd_name` varchar(20) DEFAULT NULL,
  `fd_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `tb_contents`
--

TRUNCATE TABLE `tb_contents`;
-- --------------------------------------------------------

--
-- Table structure for table `tb_notice`
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

--
-- Truncate table before insert `tb_notice`
--

TRUNCATE TABLE `tb_notice`;
-- --------------------------------------------------------

--
-- Table structure for table `tb_option`
--

CREATE TABLE `tb_option` (
  `pk_no` int(11) NOT NULL,
  `fd_pro_no` int(11) DEFAULT NULL,
  `fd_name` varchar(50) DEFAULT NULL,
  `fd_value` varchar(50) DEFAULT NULL,
  `fd_extra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tb_option`
--

TRUNCATE TABLE `tb_option`;
-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
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
-- Truncate table before insert `tb_order`
--

TRUNCATE TABLE `tb_order`;
-- --------------------------------------------------------

--
-- Table structure for table `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `fk_order_no` int(11) NOT NULL,
  `fk_product_no` varchar(50) DEFAULT NULL,
  `fd_product_name` varchar(50) DEFAULT NULL,
  `fd_count` int(11) DEFAULT NULL,
  `fd_option` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `tb_order_detail`
--

TRUNCATE TABLE `tb_order_detail`;
-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
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
-- Truncate table before insert `tb_product`
--

TRUNCATE TABLE `tb_product`;
-- --------------------------------------------------------

--
-- Table structure for table `tb_qna`
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

--
-- Truncate table before insert `tb_qna`
--

TRUNCATE TABLE `tb_qna`;
-- --------------------------------------------------------

--
-- Table structure for table `tb_sw`
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

--
-- Truncate table before insert `tb_sw`
--

TRUNCATE TABLE `tb_sw`;
-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
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
-- Truncate table before insert `tb_user`
--

TRUNCATE TABLE `tb_user`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`pk_no`);

--
-- Indexes for table `tb_contents`
--
ALTER TABLE `tb_contents`
  ADD PRIMARY KEY (`pk_no`);

--
-- Indexes for table `tb_notice`
--
ALTER TABLE `tb_notice`
  ADD PRIMARY KEY (`pk_no`);

--
-- Indexes for table `tb_option`
--
ALTER TABLE `tb_option`
  ADD PRIMARY KEY (`pk_no`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`pk_no`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`pk_no`);

--
-- Indexes for table `tb_qna`
--
ALTER TABLE `tb_qna`
  ADD PRIMARY KEY (`pk_no`);

--
-- Indexes for table `tb_sw`
--
ALTER TABLE `tb_sw`
  ADD PRIMARY KEY (`pk_no`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`pk_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_contents`
--
ALTER TABLE `tb_contents`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_notice`
--
ALTER TABLE `tb_notice`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_option`
--
ALTER TABLE `tb_option`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_qna`
--
ALTER TABLE `tb_qna`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `tb_sw`
--
ALTER TABLE `tb_sw`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `pk_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
