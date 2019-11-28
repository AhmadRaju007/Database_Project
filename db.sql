/*
SQLyog Enterprise - MySQL GUI v8.14 
MySQL - 5.5.5-10.1.26-MariaDB : Database - login
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`login` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `login`;

/*Table structure for table `bill_info` */

DROP TABLE IF EXISTS `bill_info`;

CREATE TABLE `bill_info` (
  `bill_no` int(10) unsigned NOT NULL,
  `c_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gross_total_price` int(11) NOT NULL,
  `paid_status` tinyint(1) NOT NULL DEFAULT '0',
  `due_amount` int(11) NOT NULL DEFAULT '0',
  `customer_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `bill_info` */

insert  into `bill_info`(`bill_no`,`c_date`,`gross_total_price`,`paid_status`,`due_amount`,`customer_name`) values (101,'2019-11-23 00:00:00',11000,1,0,NULL),(102,'2019-11-27 12:10:19',233,0,2,NULL);

/*Table structure for table `bmw` */

DROP TABLE IF EXISTS `bmw`;

CREATE TABLE `bmw` (
  `b_no` int(10) unsigned NOT NULL,
  `stock_amount` bigint(20) NOT NULL,
  `amount_sold` bigint(20) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `total_price` bigint(20) DEFAULT '0',
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `stock_piece` int(11) DEFAULT '0',
  PRIMARY KEY (`b_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `bmw` */

/*Table structure for table `cherry` */

DROP TABLE IF EXISTS `cherry`;

CREATE TABLE `cherry` (
  `b_no` int(10) unsigned NOT NULL,
  `stock_amount` bigint(20) NOT NULL,
  `amount_sold` bigint(20) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `total_price` bigint(20) DEFAULT '0',
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `stock_piece` int(11) DEFAULT '0',
  PRIMARY KEY (`b_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cherry` */

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `customer_name` varchar(50) DEFAULT 'unknown',
  `customer_id` int(11) NOT NULL,
  `dues` double DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `customer` */

/*Table structure for table `diamond` */

DROP TABLE IF EXISTS `diamond`;

CREATE TABLE `diamond` (
  `b_no` int(10) unsigned NOT NULL,
  `stock_amount` bigint(20) NOT NULL,
  `amount_sold` bigint(20) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `total_price` bigint(20) DEFAULT '0',
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `stock_piece` int(11) DEFAULT '0',
  PRIMARY KEY (`b_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `diamond` */

/*Table structure for table `jorjet` */

DROP TABLE IF EXISTS `jorjet`;

CREATE TABLE `jorjet` (
  `b_no` int(10) unsigned NOT NULL,
  `stock_amount` bigint(20) NOT NULL,
  `amount_sold` bigint(20) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `total_price` bigint(20) DEFAULT '0',
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `stock_piece` int(11) DEFAULT '0',
  PRIMARY KEY (`b_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `jorjet` */

/*Table structure for table `lx` */

DROP TABLE IF EXISTS `lx`;

CREATE TABLE `lx` (
  `b_no` int(10) unsigned NOT NULL,
  `stock_amount` bigint(20) NOT NULL,
  `amount_sold` bigint(20) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `total_price` bigint(20) DEFAULT '0',
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `stock_piece` int(11) DEFAULT '0',
  PRIMARY KEY (`b_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `lx` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` double DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`is_active`,`password`,`created_by`,`created_at`,`date`) values (101,'raju',1,'67959999','1','2019-11-07 11:25:44','2019-11-20'),(102,'aaaaa',0,'11111','1','2019-11-28 15:18:00','2019-11-14'),(103,'abc',1,'123','1','2019-11-26 11:20:54','2019-11-27'),(104,'bbb',0,'bbb','1','2019-11-05 11:26:23','2019-11-27'),(105,'raj',1,'123','1','2019-11-27 14:43:55','2019-11-27'),(106,'aaa',0,'111','1','2019-11-27 14:46:23','2019-11-27');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
