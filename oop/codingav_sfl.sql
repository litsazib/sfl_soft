-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 26, 2016 at 06:10 AM
-- Server version: 10.0.25-MariaDB
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codingav_sfl`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_name`
--

CREATE TABLE IF NOT EXISTS `accounts_name` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `accounts_name` varchar(100) NOT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `accounts_name`
--

INSERT INTO `accounts_name` (`acc_id`, `accounts_name`) VALUES
(1, 'Cash'),
(2, 'bKash'),
(3, 'Cheque'),
(4, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE IF NOT EXISTS `catagory` (
  `id_catagory` int(11) NOT NULL AUTO_INCREMENT,
  `cat_code` varchar(40) CHARACTER SET latin1 NOT NULL,
  `cat_name` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id_catagory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table `catagory_sub`
--

CREATE TABLE IF NOT EXISTS `catagory_sub` (
  `id_sub_catagory` int(11) NOT NULL AUTO_INCREMENT,
  `sub_cat_code` varchar(40) NOT NULL,
  `catagory_id` int(11) NOT NULL DEFAULT '0',
  `sub_cat_name` varchar(80) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Active',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_sub_catagory`),
  KEY `catagory_id` (`catagory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `default_balance` float NOT NULL DEFAULT '0',
  `customer_code` int(11) NOT NULL DEFAULT '0',
  `name` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `address` text CHARACTER SET latin1,
  `email` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `contact` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `cutomer_type` varchar(30) NOT NULL,
  `company_name` varchar(60) DEFAULT NULL,
  `images_up` text,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(13) CHARACTER SET latin1 NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_accounts`
--

CREATE TABLE IF NOT EXISTS `customer_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipt_code` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reperence_status` varchar(40) NOT NULL DEFAULT 'Payment',
  `ref_osm_full_id` varchar(50) NOT NULL,
  `total_amount` float NOT NULL DEFAULT '0',
  `payment_amount` float NOT NULL DEFAULT '0',
  `net_blance` float NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accounts_id` int(11) NOT NULL,
  `bank_name` varchar(80) NOT NULL DEFAULT 'NULL',
  `cheque_number` varchar(80) NOT NULL,
  `bkash_trans_id` varchar(40) DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `pd_code` varchar(30) CHARACTER SET latin1 NOT NULL,
  `pd_name` varchar(80) CHARACTER SET latin1 NOT NULL,
  `catagory_id` int(11) NOT NULL DEFAULT '0',
  `sub_catagory_id` int(11) NOT NULL DEFAULT '0',
  `pd_type` varchar(80) CHARACTER SET latin1 NOT NULL DEFAULT 'Finish Good Product',
  `status` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT 'Active',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`),
  KEY `catagory_id` (`catagory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_accounts`
--

CREATE TABLE IF NOT EXISTS `product_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pd_id` int(11) NOT NULL DEFAULT '0',
  `order_sales_manage_status` varchar(40) NOT NULL DEFAULT 'CustomManage',
  `supplier_customerid` int(11) NOT NULL DEFAULT '0',
  `osm_content_code` varchar(40) NOT NULL,
  `osm_id` int(11) NOT NULL,
  `osm_fulll_id` varchar(70) NOT NULL,
  `stock_kg` float NOT NULL DEFAULT '0',
  `stock_bag` float NOT NULL DEFAULT '0',
  `bag_size` int(11) NOT NULL DEFAULT '0',
  `unit_number` int(11) NOT NULL DEFAULT '0',
  `total_kg` float NOT NULL DEFAULT '0',
  `nots` text,
  `auto_sales_pursess_unit_price` float NOT NULL DEFAULT '0',
  `total_price` float NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `insert_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pd_id` (`pd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_osm_accounts`
--

CREATE TABLE IF NOT EXISTS `product_osm_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `osm_full_id` varchar(60) NOT NULL,
  `sales_purchase_status` varchar(30) NOT NULL DEFAULT 'Sales',
  `customer_supplier_id` int(11) NOT NULL,
  `truck_no` varchar(40) NOT NULL,
  `truck_rate` float NOT NULL DEFAULT '0',
  `totla_kg` float NOT NULL DEFAULT '0',
  `total_bag` float NOT NULL DEFAULT '0',
  `total_unit` float NOT NULL DEFAULT '0',
  `subtotal` float NOT NULL DEFAULT '0',
  `discount_amount` float NOT NULL DEFAULT '0',
  `final_amount` float NOT NULL DEFAULT '0',
  `payment_amount` float NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `pd_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `pd_type_name` varchar(80) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`pd_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`pd_type_id`, `pd_type_name`) VALUES
(1, 'Finish Good Product'),
(2, 'Raw Materials Product');

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_view`
--
CREATE TABLE IF NOT EXISTS `product_view` (
`product_id` int(11)
,`pd_code` varchar(30)
,`pd_name` varchar(80)
,`cat_name` varchar(80)
,`sub_cat_name` varchar(80)
,`pd_type` varchar(80)
,`status` varchar(30)
,`reg_date` timestamp
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `report_customer_accounts`
--
CREATE TABLE IF NOT EXISTS `report_customer_accounts` (
`customer_id` int(11)
,`customer_code` int(11)
,`name` varchar(60)
,`total_amount` varbinary(23)
,`payment_amount` varbinary(23)
,`net_blance` varbinary(23)
,`acc_id` int(11)
,`accounts_name` varchar(100)
,`bank_name` varchar(80)
,`cheque_number` varchar(80)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `report_product_stock`
--
CREATE TABLE IF NOT EXISTS `report_product_stock` (
`product_id` int(11)
,`pd_code` varchar(30)
,`pd_name` varchar(80)
,`catagory_id` int(11)
,`cat_name` varchar(80)
,`pd_type` varchar(80)
,`stock_kg` double
,`stock_bag` double
,`bag_size` decimal(32,0)
,`unit_number` decimal(32,0)
,`total_kg` double
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `report_supplier_accounts`
--
CREATE TABLE IF NOT EXISTS `report_supplier_accounts` (
`id_supplier` int(10) unsigned
,`supplier_code` int(11)
,`name` varchar(64)
,`total_amount` varbinary(23)
,`payment_amount` varbinary(23)
,`net_blance` varbinary(23)
,`acc_id` int(11)
,`accounts_name` varchar(100)
,`bank_name` varchar(80)
,`cheque_number` varchar(80)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `sub_catagory_view`
--
CREATE TABLE IF NOT EXISTS `sub_catagory_view` (
`id_sub_catagory` int(11)
,`cat_name` varchar(80)
,`sub_cat_name` varchar(80)
,`status` varchar(30)
,`reg_date` timestamp
,`sub_cat_code` varchar(40)
);
-- --------------------------------------------------------

--
-- Table structure for table `supplier_accounts`
--

CREATE TABLE IF NOT EXISTS `supplier_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipt_code` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `reperence_status` varchar(40) NOT NULL DEFAULT 'Payment',
  `ref_osm_full_id` varchar(50) NOT NULL,
  `total_amount` float NOT NULL DEFAULT '0',
  `payment_amount` float NOT NULL DEFAULT '0',
  `net_blance` float NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accounts_id` int(11) NOT NULL,
  `bank_name` varchar(80) NOT NULL DEFAULT 'NULL',
  `cheque_number` varchar(80) DEFAULT NULL,
  `bkash_trans_id` varchar(40) DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

-- --------------------------------------------------------

--
-- Table structure for table `uom_bag_size`
--

CREATE TABLE IF NOT EXISTS `uom_bag_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `szie_unit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vg_employee`
--

CREATE TABLE IF NOT EXISTS `vg_employee` (
  `id_employee` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_profile` varchar(60) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `roule` varchar(10) NOT NULL DEFAULT 'User',
  `key_mail` varchar(40) NOT NULL,
  `images_up` text,
  PRIMARY KEY (`id_employee`),
  KEY `employee_login` (`email`,`passwd`),
  KEY `id_employee_passwd` (`id_employee`,`passwd`),
  KEY `id_profile` (`id_profile`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vg_employee`
--

INSERT INTO `vg_employee` (`id_employee`, `id_profile`, `lastname`, `firstname`, `email`, `passwd`, `joindate`, `active`, `roule`, `key_mail`, `images_up`) VALUES
(1, '1001', 'Islam', 'Nazrul', 'nzl.nadeem', 'nzl.nadeem', '2016-03-07 04:31:06', 1, 'Supper', 'solaimanfeedsltd@gmail.com', NULL),
(2, 'sajib.png', 'Sojib', 'Roktim', 'admin', 'admin', '2016-03-07 04:33:09', 1, 'Admin', 'solaimanfeedsltd@gmail.com', './upload_image/EMPLOYEE/1461568819ommanlhhpumnvhgvolh7sij2t2.png');

-- --------------------------------------------------------

--
-- Table structure for table `vg_supplier`
--

CREATE TABLE IF NOT EXISTS `vg_supplier` (
  `id_supplier` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `default_balance` float NOT NULL DEFAULT '0',
  `supplier_code` int(11) NOT NULL DEFAULT '0',
  `name` varchar(64) NOT NULL,
  `address` text,
  `email_` varchar(50) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_upd` datetime NOT NULL,
  `company_name` varchar(60) DEFAULT NULL,
  `images_up` text NOT NULL,
  `active` varchar(20) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

-- --------------------------------------------------------

--
-- Structure for view `product_view`
--
DROP TABLE IF EXISTS `product_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`codingav_sfl`@`%` SQL SECURITY DEFINER VIEW `product_view` AS (select `product`.`product_id` AS `product_id`,`product`.`pd_code` AS `pd_code`,`product`.`pd_name` AS `pd_name`,ifnull(`catagory`.`cat_name`,'Have No Catagory') AS `cat_name`,ifnull(`catagory_sub`.`sub_cat_name`,'Have No Sub Catagory') AS `sub_cat_name`,`product`.`pd_type` AS `pd_type`,`product`.`status` AS `status`,`product`.`reg_date` AS `reg_date` from ((`product` left join `catagory` on((`product`.`catagory_id` = `catagory`.`id_catagory`))) left join `catagory_sub` on((`product`.`sub_catagory_id` = `catagory_sub`.`id_sub_catagory`))));

-- --------------------------------------------------------

--
-- Structure for view `report_customer_accounts`
--
DROP TABLE IF EXISTS `report_customer_accounts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`codingav_sfl`@`%` SQL SECURITY DEFINER VIEW `report_customer_accounts` AS (select `customer`.`customer_id` AS `customer_id`,`customer`.`customer_code` AS `customer_code`,`customer`.`name` AS `name`,ifnull(sum(`customer_accounts`.`total_amount`),'0') AS `total_amount`,ifnull(sum(`customer_accounts`.`payment_amount`),'0') AS `payment_amount`,ifnull(sum((`customer_accounts`.`total_amount` - `customer_accounts`.`payment_amount`)),'0') AS `net_blance`,`accounts_name`.`acc_id` AS `acc_id`,`accounts_name`.`accounts_name` AS `accounts_name`,`customer_accounts`.`bank_name` AS `bank_name`,`customer_accounts`.`cheque_number` AS `cheque_number` from ((`customer` join `customer_accounts` on((`customer`.`customer_id` = `customer_accounts`.`customer_id`))) join `accounts_name` on((`customer_accounts`.`accounts_id` = `accounts_name`.`acc_id`))) group by `customer`.`customer_id`);

-- --------------------------------------------------------

--
-- Structure for view `report_product_stock`
--
DROP TABLE IF EXISTS `report_product_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`codingav`@`localhost` SQL SECURITY DEFINER VIEW `report_product_stock` AS (select `product`.`product_id` AS `product_id`,`product`.`pd_code` AS `pd_code`,`product`.`pd_name` AS `pd_name`,`product`.`catagory_id` AS `catagory_id`,`catagory`.`cat_name` AS `cat_name`,`product`.`pd_type` AS `pd_type`,sum(`product_accounts`.`stock_kg`) AS `stock_kg`,sum(`product_accounts`.`stock_bag`) AS `stock_bag`,sum(`product_accounts`.`bag_size`) AS `bag_size`,sum(`product_accounts`.`unit_number`) AS `unit_number`,sum(`product_accounts`.`total_kg`) AS `total_kg` from ((`product_accounts` join `product` on((`product_accounts`.`pd_id` = `product`.`product_id`))) join `catagory` on((`product`.`catagory_id` = `catagory`.`id_catagory`))) group by `product_accounts`.`pd_id`);

-- --------------------------------------------------------

--
-- Structure for view `report_supplier_accounts`
--
DROP TABLE IF EXISTS `report_supplier_accounts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`codingav_sfl`@`%` SQL SECURITY DEFINER VIEW `report_supplier_accounts` AS (select `vg_supplier`.`id_supplier` AS `id_supplier`,`vg_supplier`.`supplier_code` AS `supplier_code`,`vg_supplier`.`name` AS `name`,ifnull(sum(`supplier_accounts`.`total_amount`),'0') AS `total_amount`,ifnull(sum(`supplier_accounts`.`payment_amount`),'0') AS `payment_amount`,ifnull(sum((`supplier_accounts`.`total_amount` - `supplier_accounts`.`payment_amount`)),'0') AS `net_blance`,`accounts_name`.`acc_id` AS `acc_id`,`accounts_name`.`accounts_name` AS `accounts_name`,`supplier_accounts`.`bank_name` AS `bank_name`,`supplier_accounts`.`cheque_number` AS `cheque_number` from ((`vg_supplier` join `supplier_accounts` on((`vg_supplier`.`id_supplier` = `supplier_accounts`.`supplier_id`))) join `accounts_name` on((`supplier_accounts`.`accounts_id` = `accounts_name`.`acc_id`))) group by `vg_supplier`.`id_supplier`);

-- --------------------------------------------------------

--
-- Structure for view `sub_catagory_view`
--
DROP TABLE IF EXISTS `sub_catagory_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`codingav_sfl`@`%` SQL SECURITY DEFINER VIEW `sub_catagory_view` AS (select `catagory_sub`.`id_sub_catagory` AS `id_sub_catagory`,ifnull(`catagory`.`cat_name`,'Have No Catagory') AS `cat_name`,`catagory_sub`.`sub_cat_name` AS `sub_cat_name`,`catagory_sub`.`status` AS `status`,`catagory_sub`.`reg_date` AS `reg_date`,`catagory_sub`.`sub_cat_code` AS `sub_cat_code` from (`catagory_sub` left join `catagory` on((`catagory_sub`.`catagory_id` = `catagory`.`id_catagory`))));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catagory_sub`
--
ALTER TABLE `catagory_sub`
  ADD CONSTRAINT `catagory_sub_ibfk_1` FOREIGN KEY (`catagory_id`) REFERENCES `catagory` (`id_catagory`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catagory_id`) REFERENCES `catagory` (`id_catagory`) ON DELETE CASCADE;

--
-- Constraints for table `product_accounts`
--
ALTER TABLE `product_accounts`
  ADD CONSTRAINT `product_accounts_ibfk_1` FOREIGN KEY (`pd_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
