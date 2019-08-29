/*
SQLyog Community Edition- MySQL GUI v5.22a
Host - 5.1.41 : Database - helpme_db
*********************************************************************
Server version : 5.1.41
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `helpme_db`;

USE `helpme_db`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `tbl_employee` */

DROP TABLE IF EXISTS `tbl_employee`;

CREATE TABLE `tbl_employee` (
  `emp_id` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `emp_fullname` varchar(100) DEFAULT NULL,
  `emp_surname` varchar(50) DEFAULT NULL,
  `emp_cell` varchar(10) DEFAULT NULL,
  `emp_email` varchar(100) DEFAULT NULL,
  `emp_password` varchar(50) DEFAULT NULL,
  `emp_idNO` varchar(13) DEFAULT NULL,
  `emp_role` varchar(10) DEFAULT 'employee',
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_employee` */

insert  into `tbl_employee`(`emp_id`,`emp_fullname`,`emp_surname`,`emp_cell`,`emp_email`,`emp_password`,`emp_idNO`,`emp_role`) values (00000001,'Jimmy James','Robin','0132553004','jj@aura.co.za','aura@12345','8801236378088','employee');

/*Table structure for table `tbl_follow_up` */

DROP TABLE IF EXISTS `tbl_follow_up`;

CREATE TABLE `tbl_follow_up` (
  `fol_id` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `fol_status` varchar(50) DEFAULT NULL,
  `fol_notes` varchar(999) DEFAULT NULL,
  `fol_panId` int(8) unsigned DEFAULT NULL,
  `fol_empId` int(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`fol_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_follow_up` */

insert  into `tbl_follow_up`(`fol_id`,`fol_status`,`fol_notes`,`fol_panId`,`fol_empId`) values (00000001,'Accepted',NULL,21,1),(00000002,'Accepted',NULL,21,1),(00000003,'Accepted',NULL,21,1);

/*Table structure for table `tbl_panic` */

DROP TABLE IF EXISTS `tbl_panic`;

CREATE TABLE `tbl_panic` (
  `pan_id` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `pan_location` varchar(100) DEFAULT NULL,
  `pan_date` date DEFAULT NULL,
  `pan_time` varchar(10) DEFAULT NULL,
  `pan_userId` int(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`pan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_panic` */

insert  into `tbl_panic`(`pan_id`,`pan_location`,`pan_date`,`pan_time`,`pan_userId`) values (00000021,'Joburg,Wynberg, Sandton,2000 ','2019-08-28','12:29:50pm',1);

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `user_id` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(100) DEFAULT NULL,
  `user_surname` varchar(50) DEFAULT NULL,
  `user_cell` varchar(10) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(20) DEFAULT NULL,
  `user_idNo` varchar(13) DEFAULT NULL,
  `user_role` varchar(10) DEFAULT 'client',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`user_id`,`user_fullname`,`user_surname`,`user_cell`,`user_email`,`user_password`,`user_idNo`,`user_role`) values (00000001,'Lindo Prince','Motha','084385473','lindo@gmail.com','12345','9701156289088','client'),(00000002,'Sajar Jan','Nameshnee','0483725637','sajar@hotmail.com','12345','9503216234088','client');

/*Table structure for table `tbl_vehicle` */

DROP TABLE IF EXISTS `tbl_vehicle`;

CREATE TABLE `tbl_vehicle` (
  `veh_id` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `veh_regNo` varchar(50) DEFAULT NULL,
  `veh_make` varchar(50) DEFAULT NULL,
  `veh_model` varchar(50) DEFAULT NULL,
  `veh_userId` int(8) unsigned NOT NULL,
  PRIMARY KEY (`veh_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_vehicle` */

insert  into `tbl_vehicle`(`veh_id`,`veh_regNo`,`veh_make`,`veh_model`,`veh_userId`) values (00000001,'564-MVV-GP','Toyota','Hilux',1),(00000002,'342-WER-MP','BM','M4',2);

/* Procedure structure for procedure `accept` */

/*!50003 DROP PROCEDURE IF EXISTS  `accept` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `accept`(
IN pemail VARCHAR(100),
IN ppanid INT(8)
)
BEGIN
	DECLARE v_empId INT(8);
	SELECT emp_id INTO v_empId FROM tbl_employee WHERE emp_email = pemail;
	INSERT INTO tbl_follow_up(fol_status,fol_panId,fol_empId) VALUES('Accepted',ppanid,v_empId);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `get_panic` */

/*!50003 DROP PROCEDURE IF EXISTS  `get_panic` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `get_panic`()
BEGIN
	SELECT pa.pan_id pan_id,CONCAT(us.user_fullname,' ',us.user_surname) user_name, CONCAT(ve.veh_make,' ',ve.veh_model,' | ',ve.veh_regNo) user_vehicle,us.user_cell user_cell,pa.pan_location user_location
	FROM tbl_panic pa
	INNER JOIN tbl_user us
	ON pa.pan_userId = us.user_id
	INNER JOIN tbl_vehicle ve
	ON us.user_id = ve.veh_userId
	ORDER BY pa.pan_id DESC LIMIT 1;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `panic` */

/*!50003 DROP PROCEDURE IF EXISTS  `panic` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `panic`(
IN pemail VARCHAR(100),
IN plocation VARCHAR(100),
IN pdate DATE,
IN ptime VARCHAR(20)
)
BEGIN
	DECLARE v_uid INT(8);
	SELECT user_id INTO v_uid FROM tbl_user WHERE user_email = pemail;
	INSERT INTO tbl_panic(pan_location,pan_date,pan_time,pan_userId) VALUES(plocation,pdate,ptime,v_uid);
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
