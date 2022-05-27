/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - projectdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`projectdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `projectdb`;

/*Table structure for table `area` */

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(20) NOT NULL,
  `City_city_id` int(11) NOT NULL,
  PRIMARY KEY (`area_id`),
  KEY `Area_City_FK` (`City_city_id`),
  CONSTRAINT `Area_City_FK` FOREIGN KEY (`City_city_id`) REFERENCES `city` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `area` */

insert  into `area`(`area_id`,`area_name`,`City_city_id`) values 
(1,'Gulshan',1),
(2,'Karsaz',1),
(3,'Azizabad',1),
(4,'North Nazimabad',1),
(5,'Chandi Chowk',3),
(6,'Jauhar Town',4),
(7,'Khaddar Market',7),
(8,'DHA',4);

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `DATE` date NOT NULL,
  `TIME` time NOT NULL,
  `User_User_id` int(11) NOT NULL,
  `Worker_worker_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `done` int(2) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `Booking_User_FK` (`User_User_id`),
  KEY `Booking_Worker_FK` (`Worker_worker_id`),
  CONSTRAINT `Booking_User_FK` FOREIGN KEY (`User_User_id`) REFERENCES `user` (`User_id`),
  CONSTRAINT `Booking_Worker_FK` FOREIGN KEY (`Worker_worker_id`) REFERENCES `worker` (`worker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `booking` */

insert  into `booking`(`DATE`,`TIME`,`User_User_id`,`Worker_worker_id`,`booking_id`,`done`) values 
('2020-12-16','02:31:25',32,7,2,1),
('2020-12-25','02:32:51',31,6,3,2),
('2020-12-16','02:33:16',31,19,4,0),
('2020-12-31','19:32:34',27,10,7,1),
('2020-12-17','01:09:20',1,7,8,2),
('2020-12-17','15:25:02',1,6,9,2),
('2020-12-17','15:25:08',1,22,10,0),
('2020-12-18','00:49:37',31,1,11,0),
('2020-12-18','00:49:41',31,10,12,0),
('2020-12-18','00:55:36',1,1,13,2),
('2020-12-18','00:55:39',1,10,14,1),
('2020-12-18','00:58:32',27,22,16,0),
('2020-12-18','00:59:04',27,3,17,0),
('2020-12-18','00:59:07',27,18,18,0),
('2020-12-18','00:59:12',27,17,19,0),
('2020-12-18','00:59:31',27,20,20,0),
('2020-12-25','01:06:34',31,6,22,1),
('2020-12-18','01:06:38',31,22,23,0),
('2020-12-18','01:09:24',31,7,25,0),
('2020-12-19','01:24:24',31,7,26,0),
('2020-12-20','01:26:30',31,7,27,0),
('2020-12-21','01:35:35',31,7,30,0),
('2021-01-02','01:42:58',31,7,31,0),
('2020-12-28','12:34:05',1,6,32,1),
('2020-12-21','22:43:56',28,6,33,1),
('2020-12-21','18:17:19',1,6,34,0),
('2020-12-30','18:46:26',1,9,35,2);

/*Table structure for table `city` */

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(20) NOT NULL,
  `Country_country_id` int(11) NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `City_Country_FK` (`Country_country_id`),
  CONSTRAINT `City_Country_FK` FOREIGN KEY (`Country_country_id`) REFERENCES `country` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `city` */

insert  into `city`(`city_id`,`city_name`,`Country_country_id`) values 
(1,'Karachi',1),
(2,'Islamabad',1),
(3,'Dehli',2),
(4,'Lahore',1),
(5,'Mumbai',2),
(6,'Washington D.C',4),
(7,'Kabul',6);

/*Table structure for table `complaints` */

DROP TABLE IF EXISTS `complaints`;

CREATE TABLE `complaints` (
  `complain` varchar(250) NOT NULL,
  `User_User_id` int(11) NOT NULL,
  `Worker_worker_id` int(11) NOT NULL,
  `complain_id` int(11) NOT NULL,
  PRIMARY KEY (`Worker_worker_id`,`User_User_id`,`complain_id`),
  KEY `Complaints_User_FK` (`User_User_id`),
  CONSTRAINT `Complaints_User_FK` FOREIGN KEY (`User_User_id`) REFERENCES `user` (`User_id`),
  CONSTRAINT `Complaints_Worker_FK` FOREIGN KEY (`Worker_worker_id`) REFERENCES `worker` (`worker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `complaints` */

insert  into `complaints`(`complain`,`User_User_id`,`Worker_worker_id`,`complain_id`) values 
('Bht hi kaam chor tha kasme',1,1,1),
('very badd',1,1,4),
('so and so work',1,1,7),
('meh work',1,6,3),
('bad',1,6,6),
('bas awein tha',31,6,8),
('Was very sloppy at times ',1,7,2),
('okayish',1,7,5),
('bas awein kaam tha',1,9,9);

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(20) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `country` */

insert  into `country`(`country_id`,`country_name`) values 
(1,'Pakistan'),
(2,'India'),
(3,'Bangladesh'),
(4,'USA'),
(5,'UK'),
(6,'Afghanistan');

/*Table structure for table `occupation` */

DROP TABLE IF EXISTS `occupation`;

CREATE TABLE `occupation` (
  `occ_id` int(11) NOT NULL,
  `occup` varchar(20) NOT NULL,
  PRIMARY KEY (`occ_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `occupation` */

insert  into `occupation`(`occ_id`,`occup`) values 
(1,'Plumber'),
(2,'Electrician'),
(3,'Carpenter'),
(4,'Mechanic'),
(5,'Painter'),
(6,'Event Planner'),
(7,'Gardener'),
(8,'Driver'),
(9,'Photographer'),
(10,'Carpet Cleaner'),
(11,'Fumigator'),
(12,'Cleaner');

/*Table structure for table `rating` */

DROP TABLE IF EXISTS `rating`;

CREATE TABLE `rating` (
  `rate_id` int(11) NOT NULL,
  `description` varchar(10) NOT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `rating` */

insert  into `rating`(`rate_id`,`description`) values 
(1,'Very Bad'),
(2,'Bad'),
(3,'Average'),
(4,'Good'),
(5,'Very Good');

/*Table structure for table `relation_11` */

DROP TABLE IF EXISTS `relation_11`;

CREATE TABLE `relation_11` (
  `Booking_booking_id` int(11) NOT NULL,
  `Rating_rate_id` int(11) NOT NULL,
  PRIMARY KEY (`Booking_booking_id`,`Rating_rate_id`),
  KEY `FK_ASS_12` (`Rating_rate_id`),
  CONSTRAINT `FK_ASS_11` FOREIGN KEY (`Booking_booking_id`) REFERENCES `booking` (`booking_id`),
  CONSTRAINT `FK_ASS_12` FOREIGN KEY (`Rating_rate_id`) REFERENCES `rating` (`rate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `relation_11` */

insert  into `relation_11`(`Booking_booking_id`,`Rating_rate_id`) values 
(3,5),
(8,5),
(9,4),
(13,5),
(14,5),
(32,5),
(35,3);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `User_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `cnic` varchar(25) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`User_id`,`fname`,`lname`,`cnic`,`phone_no`,`address`,`username`,`password`) values 
(1,'Mekhi','King','09076341865',490925,'625 Ryan Way Apt. 971\nPort Nya','Mekh','123'),
(2,'Melvin','Grady','929.181.9529x1770',232720,'347 Aaron Fall\nEast Nina, HI 6','Melv','123'),
(3,'Arlo','Heaney','509-874-6469x99053',1,'66778 Kennith Villages Suite 0','Arlo','123'),
(4,'Kelsi','Lebsack','798.486.0423',23705,'960 Mallory Pines\nParkerside, ','Kels','123'),
(5,'Lexus','Mayer','050-320-8945',1,'79619 Elwin Ridge\nBritneyton, ','Lexi','123'),
(6,'Flavio','Hamill','923.927.0480x63151',962802,'82154 Monahan Rapid\nSouth Hann','Flavi','123'),
(7,'Jovan','Mayert','(245)327-0907',0,'463 Jerod Harbors\nNew Alanna, ','Jovi','123'),
(8,'Marguerite','Raynor','(613)208-5197',87,'6451 Quitzon Run Apt. 579\nSpin','Marge','123'),
(9,'Ethyl','Schaefer','325-038-7275',946395,'867 Delphine Falls\nSchusterfur','Ethi','123'),
(10,'Iliana','Murphy','08222742846',0,'491 Funk Branch Apt. 167\nBaumb','Iles','123'),
(11,'Prince','Becker','1-805-760-7048x0992',45,'0972 Marcos Courts Apt. 709\nNe','Prince','123'),
(12,'Evie','Treutel','(402)851-9870x792',1,'58964 Harmon Islands Suite 853','Eve','123'),
(13,'Ahmed','Rosenbaum','192.823.4807x0632',0,'377 Hoppe Course Apt. 846\nSout','Ahmed','123'),
(14,'Cecilia','Morissette','270-451-0259x8445',1,'119 Bailey Way\nParkerchester, ','Cecil','123'),
(15,'Brandy','O\'Keefe','1-419-005-4763x53431',0,'4614 Crist Views Apt. 506\nKath','Brandi','123'),
(16,'Rupert','Hauck','662-552-5331x62855',667,'135 Watsica Fords\nAlessandromo','Rupert','123'),
(17,'Larry','Goldner','1-041-314-8292x32820',0,'283 Padberg Common Suite 341\nE','Lar','123'),
(18,'Sydnie','Hoeger','583-638-3693',620070,'25705 Altenwerth Knolls Suite ','Sydi','123'),
(19,'Erica','Abernathy','504-114-7560x023',1,'7895 Wolff Burg\nNew Jamir, WA ','Eric','123'),
(20,'Charley','Bednar','04204835845',0,'523 Adolfo Skyway Apt. 197\nGra','Charles','123'),
(21,'Delaney','Metz','275-079-9799',1,'83591 Daugherty Mountain Suite','Delane','123'),
(22,'Hettie','Ziemann','154-556-0973x9877',0,'57597 Albertha Junction\nLake Z','Hetti','123'),
(23,'Ford','Lindgren','09113017663',0,'2096 Osborne Flat Suite 006\nBr','Ford','123'),
(24,'Mellie','Friesen','1-617-711-2334x647',1,'957 Purdy Oval Suite 732\nPort ','Mel','123'),
(25,'Joy','Kreiger','(175)766-6119',899661,'4704 Anderson Street\nNorth Mon','Joy','123'),
(26,'Hafiz','Saroosh','12345342',332415223,'A-42 Block 16 Dastagir','Soshi','123'),
(27,'Hashir','Ahmed','123',2147483647,'Somewhere','Hash','123'),
(28,'Abeer','Fatima','42101-123456',4321,'North Nazimabad xD','Abeech','123'),
(29,'Ruba','Waqar','321456',1231241241,'House 5 Jauhar','Ruby','123'),
(30,'Ayesha','Raza','42101-12',124151,'A-42 Block L','Ash','123'),
(31,'Khaula','Fatima','1353141',16853,'Somewhere pt2','Khala','123'),
(32,'Talal','Khan ','965341',16853,'Bhens Colony gali 420','Talal','123'),
(33,'Kashish','Khan ','12315124214124',0,'A-42 Block L','Kash','123'),
(34,'Nepal','i','124321123',0,'Azizabad ki 3ri gali','Nepal','123'),
(35,'Hiba','Zubair','196367592',156426,'4th ave','Hib','123');

/*Table structure for table `worker` */

DROP TABLE IF EXISTS `worker`;

CREATE TABLE `worker` (
  `worker_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `cnic` varchar(25) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `Area_area_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`worker_id`),
  KEY `Worker_Area_FK` (`Area_area_id`),
  CONSTRAINT `Worker_Area_FK` FOREIGN KEY (`Area_area_id`) REFERENCES `area` (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `worker` */

insert  into `worker`(`worker_id`,`fname`,`lname`,`cnic`,`phone_no`,`Area_area_id`,`username`,`password`) values 
(1,'Audreanne','Conn','01106388632',839142,1,'Audre','123'),
(2,'Drew','Bogisich','05072039158',1,2,'Drew','123'),
(3,'Joseph','Ward','00416175247',812290,3,'Jose','123'),
(4,'Lauriane','Jones','044.226.6517x417',0,4,'Lauri','123'),
(5,'Jamir','Cruickshank','078.802.0225',3,2,'Jami','123'),
(6,'Evalyn','Bernier','138-802-0227x44383',1,1,'Eva','123'),
(7,'Michel','Wiegand','317.575.1568',1961889447,3,'Mike','123'),
(8,'Cordia','Bednar','980-232-4312',41,2,'Cordi','123'),
(9,'Alaina','Pfeffer','896-084-9241x6478',92632,4,'Ala','123'),
(10,'Eloise','Dietrich','749.576.5598x2152',1,1,'Eloise','123'),
(11,'Monserrat','Sawayn','1-229-225-3419x547',1,3,'Monse','123'),
(12,'Demarco','Monahan','(426)626-8620',1,4,'Marco','123'),
(13,'Afton','Abernathy','995-867-3990',0,3,'Afton','123'),
(14,'Marge','Halvorson','(903)872-0112',220855,1,'Marge','123'),
(15,'Litzy','Metz','330-683-0893x84234',0,1,'Litzy','123'),
(16,'Cameron','Conn','(971)952-3166x358',142183,2,'Cameron','123'),
(17,'Destiney','Friesen','423-332-3966x1031',2147483647,3,'Desti','123'),
(18,'Ezequiel','Heidenreich','485-780-9513',382,3,'Ezeq','123'),
(19,'Sigrid','Dare','050.185.4625x501',374159,4,'Sigrid','123'),
(20,'Kraig','Auer','+31(6)0816811601',1,3,'Kraig','123'),
(21,'Francis','Hermann','107.758.3073x626',0,2,'Franci','123'),
(22,'Roberta','Rolfson','(663)664-6645x328',33,1,'Robert','123'),
(23,'Annette','McCullough','1-271-568-8815x440',388173,3,'Anni','123'),
(24,'Ariane','Friesen','014.877.5927x966',2147483647,1,'Ari','123'),
(25,'Stefan','Jones','(262)441-9981',2147483647,1,'Stef','123'),
(26,'Hashir','Ahmed','123',164362,7,'Hash','123'),
(27,'Hashir','Khan ','123',164362,8,'Hashir','123');

/*Table structure for table `works_on` */

DROP TABLE IF EXISTS `works_on`;

CREATE TABLE `works_on` (
  `Worker_worker_id` int(11) NOT NULL,
  `Occupation_occ_id` int(11) NOT NULL,
  PRIMARY KEY (`Worker_worker_id`,`Occupation_occ_id`),
  KEY `FK_ASS_10` (`Occupation_occ_id`),
  CONSTRAINT `FK_ASS_10` FOREIGN KEY (`Occupation_occ_id`) REFERENCES `occupation` (`occ_id`),
  CONSTRAINT `FK_ASS_9` FOREIGN KEY (`Worker_worker_id`) REFERENCES `worker` (`worker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `works_on` */

insert  into `works_on`(`Worker_worker_id`,`Occupation_occ_id`) values 
(1,3),
(1,5),
(2,8),
(3,3),
(3,5),
(3,7),
(4,5),
(5,7),
(6,1),
(6,6),
(7,2),
(8,7),
(9,4),
(10,4),
(10,5),
(11,8),
(12,3),
(12,8),
(13,6),
(14,6),
(15,8),
(16,6),
(17,3),
(18,3),
(19,1),
(20,3),
(20,6),
(21,6),
(22,1),
(24,8),
(25,6),
(25,7),
(27,12);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
