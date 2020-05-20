/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.11-MariaDB : Database - db_elock
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_elock` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_elock`;

/*Table structure for table `tb_card` */

DROP TABLE IF EXISTS `tb_card`;

CREATE TABLE `tb_card` (
  `kode` varchar(20) NOT NULL,
  `card_number` int(11) NOT NULL,
  `card_type` varbinary(20) DEFAULT NULL,
  `Card_Room` varchar(20) DEFAULT NULL,
  `card_state` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`kode`),
  KEY `Card_Room` (`Card_Room`),
  CONSTRAINT `tb_card_ibfk_1` FOREIGN KEY (`Card_Room`) REFERENCES `tb_room` (`id_room`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_card` */

insert  into `tb_card`(`kode`,`card_number`,`card_type`,`Card_Room`,`card_state`) values 
('234234',4,'KEY',NULL,'1'),
('32222',2,'KEY',NULL,'1'),
('3222223',3,'KEY',NULL,'1');

/*Table structure for table `tb_guest` */

DROP TABLE IF EXISTS `tb_guest`;

CREATE TABLE `tb_guest` (
  `id_guest` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `guest_card` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `phone` double DEFAULT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id_guest`),
  KEY `guest_card` (`guest_card`),
  CONSTRAINT `tb_guest_ibfk_1` FOREIGN KEY (`guest_card`) REFERENCES `tb_card` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_guest` */

insert  into `tb_guest`(`id_guest`,`guest_card`,`name`,`address`,`phone`,`email`,`status`) values 
('123','234234','Badu','padang',23123,'312331','1');

/*Table structure for table `tb_room` */

DROP TABLE IF EXISTS `tb_room`;

CREATE TABLE `tb_room` (
  `id_room` varchar(20) NOT NULL,
  `name_room` varchar(50) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `state` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id_room`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_room` */

insert  into `tb_room`(`id_room`,`name_room`,`owner`,`state`) values 
('RM-102','AXANA','GUE','1');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `kode_user` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varbinary(250) DEFAULT NULL,
  `level_user` char(1) DEFAULT NULL,
  `status_user` char(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_user`),
  KEY `kode_user` (`kode_user`),
  KEY `email` (`email`),
  CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`kode_user`) REFERENCES `tb_guest` (`id_guest`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`kode_user`,`email`,`password`,`level_user`,`status_user`,`created_at`) values 
(1,NULL,'admin','202cb962ac59075b964b07152d234b70','1','1','2020-05-12 15:13:36'),
(2,NULL,'crew','202cb962ac59075b964b07152d234b70','2','1','2020-05-12 15:14:16');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `kode_user` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level_user` char(1) DEFAULT NULL,
  `status_user` char(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`kode_user`,`email`,`password`,`level_user`,`status_user`,`created_at`) values 
(6,'1','admin','202cb962ac59075b964b07152d234b70','1','1','2020-05-11 14:00:40'),
(7,'2','crew','202cb962ac59075b964b07152d234b70','2','1','2020-05-11 14:01:19'),
(8,'3','guest','202cb962ac59075b964b07152d234b70','3','1','2020-05-11 14:01:39');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
