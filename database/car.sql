/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.14-MariaDB : Database - carparking
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`carparking` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `carparking`;

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `ps_id` int(10) NOT NULL,
  `duration` int(11) NOT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `pslot_fk` (`ps_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `booking` */

insert  into `booking`(`bid`,`uid`,`ps_id`,`duration`,`paid`,`status`,`time`) values 
(1,300,1,1,100.00,'Leaved','08-11-2021 11:54:15'),
(2,300,1,2,200.00,'Leaved','06-11-2021 11:54:15'),
(3,300,2,2,200.00,'Leaved','2021-11-08 11:58:51'),
(4,300,3,5,500.00,'Leaved','2021-11-15 16:11:23'),
(5,300,4,1,100.00,'Pending','2021-11-15 16:48:23'),
(6,300,4,1,100.00,'Leaved','2021-11-15 16:49:05'),
(7,300,4,1,100.00,'Pending','2021-11-18 14:24:37'),
(8,300,3,4,400.00,'Leaved','2021-11-18 14:26:03'),
(9,300,4,3,300.00,'Leaved','2021-11-18 17:41:38'),
(10,300,6,1,100.00,'Leaved','2021-11-19 09:40:19'),
(11,300,5,3,300.00,'PAID','2021-11-19 09:31:27');

/*Table structure for table `card_pay` */

DROP TABLE IF EXISTS `card_pay`;

CREATE TABLE `card_pay` (
  `cardpay_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `card_na` varchar(20) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `exp_date` varchar(10) NOT NULL,
  `card_type` varchar(20) NOT NULL DEFAULT 'credit/debit',
  PRIMARY KEY (`cardpay_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `card_pay` */

insert  into `card_pay`(`cardpay_id`,`uid`,`card_na`,`card_no`,`exp_date`,`card_type`) values 
(1,300,'sam','1234567890123456','12/25','credit/debit'),
(2,300,'qwerty','1234567890123456','12/25','credit/debit'),
(3,300,'qwertyu','1234567890123456','12/25','credit/debit'),
(4,300,'qwert','1122334455667788','12/25','credit/debit'),
(5,300,'qwert','1234567890123456','12/25','credit/debit'),
(6,300,'rrr','1234567890123456','12/25','credit/debit'),
(7,300,'qwertyu','1234567890123456','12/25','credit/debit'),
(8,300,'qwert','1234567890123456','12/45','credit/debit'),
(9,300,'qwer','1234567890123456','12/24','credit/debit'),
(10,300,'wqert','1234567890123456','12/25','credit/debit'),
(11,300,'qwert','1234567890123456','12/25','credit/debit'),
(12,300,'qwretrtyu','1234567890123456','12/25','credit/debit'),
(13,300,'wdefg','112233445566778899','12/25','credit/debit'),
(14,300,'plmkoijn','1234567891234560','12/25','credit/debit'),
(15,300,'qwert','1234567890123456','12/24','credit/debit'),
(16,300,'qwert','1234567890123456','12/25','credit/debit');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `hna` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Not-verified',
  `type` varchar(20) NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`id`),
  KEY `customer_fk` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `customer` */

insert  into `customer`(`id`,`uid`,`name`,`lname`,`phone`,`email`,`hna`,`city`,`pin`,`status`,`type`) values 
(1,300,'Test','test',9874561230,'test@gmail.com','test house','test city','683593','verified','customer'),
(2,301,'Tony','Stark',9874561230,'tony@stark.in','Stark Industries','NYC','455551','verified','customer'),
(3,303,'Glen','maxwell',7458692013,'glen.m@gmail.com','abc house','queensland','654321','verified','customer'),
(4,304,'clint','antony',7736324336,'clint@gmail.com','p h','Kochi','68006','verified','customer');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `pay_status` varchar(20) NOT NULL DEFAULT 'paid',
  PRIMARY KEY (`pay_id`),
  KEY `booking_id` (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

insert  into `payment`(`pay_id`,`bid`,`pay_status`) values 
(1,1,'paid'),
(2,4,'paid'),
(3,4,'paid'),
(4,0,'Fine Amount'),
(5,1,'Fine Amount'),
(6,1,'Fine Amount'),
(7,5,'paid'),
(8,7,'paid'),
(9,8,'paid'),
(10,1,'paid'),
(11,3,'paid'),
(12,4,'paid'),
(13,4,'paid'),
(14,3,'Fine Amount'),
(15,6,'paid'),
(16,1,'Fine Amount'),
(17,6,'Fine Amount'),
(18,8,'paid'),
(19,8,'paid'),
(20,9,'paid'),
(21,10,'paid'),
(22,11,'paid'),
(23,10,'Fine Amount');

/*Table structure for table `payment_err` */

DROP TABLE IF EXISTS `payment_err`;

CREATE TABLE `payment_err` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `payment_err` */

/*Table structure for table `pslot` */

DROP TABLE IF EXISTS `pslot`;

CREATE TABLE `pslot` (
  `ps_id` int(11) NOT NULL AUTO_INCREMENT,
  `npslot` varchar(50) NOT NULL,
  `slotrate` decimal(10,2) DEFAULT NULL,
  `slotstatus` varchar(20) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`ps_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `pslot` */

insert  into `pslot`(`ps_id`,`npslot`,`slotrate`,`slotstatus`) values 
(1,'P01',100.00,'Active'),
(2,'P02',100.00,'Active'),
(3,'P03',100.00,'Active'),
(4,'P04',100.00,'Active'),
(5,'P05',100.00,'in-active'),
(6,'P06',100.00,'Active'),
(7,'P07',100.00,'Active'),
(8,'P08',100.00,'Active'),
(9,'P09',100.00,'Active'),
(10,'P10',100.00,'Active'),
(11,'',NULL,'in-active');

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `resaddress` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `datejoined` date DEFAULT NULL,
  `jobpos` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'staff',
  PRIMARY KEY (`sid`),
  KEY `staff_fk` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=1102 DEFAULT CHARSET=latin1;

/*Data for the table `staff` */

insert  into `staff`(`sid`,`uid`,`firstname`,`lastname`,`email`,`phone`,`resaddress`,`street`,`city`,`state`,`datejoined`,`jobpos`,`status`,`type`) values 
(1100,2,'Staff','Staff','staff@gmail.com',7894561230,'staff house','Park-iN street','Kochi','Kerala','2021-09-26','verifier','active','staff'),
(1101,302,'Clinston','Antony','clinston@gmail.com',9745312880,'Park-in','Park-iN street','Kochi','Kerala','2021-06-01','verifier','active','staff');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=305 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`uid`,`name`,`lname`,`email`,`password`,`status`,`type`) values 
(1,'Admin','','admin@gmail.com','admin','active','admin'),
(2,'Staff','staff','staff@gmail.com','staff','active','staff'),
(300,'Test','test','test@gmail.com','123456789','active','customer'),
(301,'Tony','Stark','tony@stark.in','tony123','in-active','customer'),
(302,'Clinston','Antony','clinston@gmail.com','123','active','staff'),
(303,'Glen','maxwell','glen.m@gmail.com','glen123','active','customer'),
(304,'clint','antony','clint@gmail.com','clint123','active','customer');

/*Table structure for table `userlog` */

DROP TABLE IF EXISTS `userlog`;

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logoutTime` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `userlog` */

insert  into `userlog`(`id`,`email`,`ip`,`loginTime`,`logoutTime`,`status`) values 
(1,'admin@gmail.com','::1\0\0\0\0\0\0\0\0\0\0\0\0\0','2021-08-26 16:48:50','2021-08-26 17:27:50',1),
(2,'admin@gmail.com','142.251.42.68','2021-10-09 02:14:30','2021-10-09 17:01:37',1),
(3,'staff@gmail.com','216.58.196.68','2021-10-09 02:28:07','2021-10-09 02:35:11',1),
(4,'staff@gmail.com','216.58.196.68','2021-11-06 11:13:51','2021-11-06 11:14:50',1),
(5,'test@gmail.com','216.58.196.68','2021-11-06 11:15:12','2021-11-06 11:16:42',1),
(6,'admin@gmail.com','216.58.196.68','2021-11-06 11:16:53','2021-11-06 11:17:15',1),
(7,'test@gmail.com','216.58.196.68','2021-11-06 11:17:28','2021-11-06 12:28:50',1),
(8,'staff@gmail.com','142.250.182.100','2021-11-06 12:29:07','2021-11-06 12:30:53',1),
(9,'test@gmail.com','142.250.182.100','2021-11-06 12:31:05','2021-11-06 12:32:11',1),
(10,'staff@gmail.com','142.250.182.100','2021-11-06 12:32:17','2021-11-06 14:56:37',1),
(11,'test@gmail.com','142.250.182.100','2021-11-06 14:57:00','2021-11-06 15:51:41',1),
(12,'admin@gmail.com','142.250.182.100','2021-11-06 15:51:54','2021-11-06 15:54:03',1),
(13,'test@gmail.com','216.58.196.68','2021-11-06 15:54:11','2021-11-06 15:54:54',1),
(14,'admin@gmail.com','216.58.196.68','2021-11-06 15:55:02','2021-11-08 10:06:32',1),
(15,'staff@gmail.com','142.250.182.100','2021-11-08 10:06:42','2021-11-08 10:35:57',1),
(16,'admin@gmail.com','142.251.42.36','2021-11-08 10:36:21',NULL,1),
(17,'admin@gmail.com','142.250.182.100','2021-11-08 11:17:52','2021-11-08 11:50:39',1),
(18,'test@gmail.com','142.251.42.68','2021-11-08 11:50:56','2021-11-08 11:54:55',1),
(19,'admin@gmail.com','142.251.42.68','2021-11-08 11:55:02','2021-11-08 11:55:11',1),
(20,'admin@gmail.com','142.251.42.68','2021-11-08 11:55:52','2021-11-08 11:58:37',1),
(21,'test@gmail.com','142.251.42.68','2021-11-08 11:58:43','2021-11-08 11:59:10',1),
(22,'admin@gmail.com','142.250.182.100','2021-11-08 11:59:16','2021-11-08 13:59:31',1),
(23,'admin@gmail.com','142.251.42.68','2021-11-15 15:51:37','2021-11-15 15:53:17',1),
(24,'admin@gmail.com','216.58.196.68','2021-11-15 16:04:18','2021-11-15 16:10:03',1),
(25,'staff@gmail.com','142.250.182.4','2021-11-15 16:10:15','2021-11-15 16:10:37',1),
(26,'test@gmail.com','216.58.196.68','2021-11-15 16:10:51','2021-11-15 16:19:53',1),
(27,'staff@gmail.com','216.58.196.68','2021-11-15 16:20:59','2021-11-15 16:21:50',1),
(28,'test@gmail.com','172.217.160.164','2021-11-15 16:29:10','2021-11-15 16:31:05',1),
(29,'test@gmail.com','172.217.160.164','2021-11-15 16:31:37','2021-11-15 16:33:50',1),
(30,'admin@gmail.com','172.217.160.164','2021-11-15 16:33:58','2021-11-15 16:39:37',1),
(31,'admin@gmail.com','142.250.182.4','2021-11-15 16:40:15','2021-11-15 16:40:23',1),
(32,'test@gmail.com','142.250.182.4','2021-11-15 16:40:33','2021-11-15 16:56:17',1),
(33,'test@gmail.com','172.217.27.196','2021-11-17 11:31:14',NULL,1),
(34,'test@gmail.com','142.250.67.36','2021-11-17 12:25:37','2021-11-17 15:19:44',1),
(35,'admin@gmail.com','216.58.196.68','2021-11-17 15:19:48','2021-11-17 15:37:13',1),
(36,'admin@gmail.com','142.250.67.36','2021-11-18 12:32:14','2021-11-18 12:32:26',1),
(37,'test@gmail.com','142.250.67.36','2021-11-18 12:37:40','2021-11-18 13:59:08',1),
(38,'admin@gmail.com','142.250.182.4','2021-11-18 13:59:19','2021-11-18 14:13:03',1),
(39,'test@gmail.com','142.250.67.36','2021-11-18 14:24:19','2021-11-18 14:31:08',1),
(40,'staff@gmail.com','142.251.42.68','2021-11-18 14:31:20','2021-11-18 14:57:04',1),
(41,'test@gmail.com','172.217.160.164','2021-11-18 14:57:17','2021-11-18 14:58:51',1),
(42,'test@gmail.com','172.217.160.164','2021-11-18 14:59:44','2021-11-18 15:54:25',1),
(43,'admin@gmail.com','142.251.42.68','2021-11-18 15:54:34','2021-11-18 17:41:14',1),
(44,'test@gmail.com','216.58.196.68','2021-11-18 17:41:23','2021-11-19 09:39:51',1),
(45,'test@gmail.com','142.250.67.36','2021-11-19 09:40:02','2021-11-19 11:35:58',1),
(46,'admin@gmail.com','142.250.182.36','2021-11-19 11:36:07','2021-11-19 11:39:10',1),
(47,'staff@gmail.com','142.250.182.36','2021-11-19 11:39:17','2021-11-19 11:40:43',1),
(48,'admin@gmail.com','142.250.182.36','2021-11-19 11:40:53','2021-11-19 17:01:57',1),
(49,'test@gmail.com','172.217.27.196','2021-11-19 17:02:10','2021-11-19 17:36:41',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
