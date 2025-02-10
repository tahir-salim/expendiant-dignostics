/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.24-MariaDB : Database - xpediant_diagnostics
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`xpediant_diagnostics` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `xpediant_diagnostics`;

/*Table structure for table `appointment_test_reports` */

DROP TABLE IF EXISTS `appointment_test_reports`;

CREATE TABLE `appointment_test_reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` bigint(20) unsigned NOT NULL,
  `appointment_id` bigint(20) unsigned NOT NULL,
  `report_status` enum('Report Awaited','Report Generated') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `appointment_test_reports` */

insert  into `appointment_test_reports`(`id`,`test_id`,`appointment_id`,`report_status`,`amount`,`created_at`,`updated_at`) values 
(1,1,0,'Report Generated',794.00,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(2,7,3,'Report Generated',166.00,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(3,8,2,'Report Awaited',69.00,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(4,1,3,'Report Generated',757.00,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(5,9,2,'Report Generated',390.00,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(6,9,5,'Report Awaited',671.00,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(7,5,6,'Report Generated',883.00,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(8,4,4,'Report Awaited',652.00,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(9,8,2,'Report Generated',383.00,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(10,8,1,'Report Generated',877.00,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(11,1,11,'Report Awaited',8674.00,'2022-09-15 15:33:12','2022-09-15 15:33:12'),
(12,19,11,'Report Awaited',610.00,'2022-09-15 15:33:12','2022-09-15 15:33:12'),
(13,1,12,'Report Awaited',8674.00,'2022-09-15 15:35:23','2022-09-15 15:35:23'),
(14,19,12,'Report Awaited',610.00,'2022-09-15 15:35:23','2022-09-15 15:35:23'),
(15,1,13,'Report Awaited',8674.00,'2022-09-15 15:37:28','2022-09-15 15:37:28'),
(16,19,13,'Report Awaited',610.00,'2022-09-15 15:37:28','2022-09-15 15:37:28'),
(17,1,14,'Report Awaited',8674.00,'2022-09-15 15:39:11','2022-09-15 15:39:11'),
(18,19,14,'Report Awaited',610.00,'2022-09-15 15:39:11','2022-09-15 15:39:11');

/*Table structure for table `appointments` */

DROP TABLE IF EXISTS `appointments`;

CREATE TABLE `appointments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `payment_type_id` bigint(20) unsigned NOT NULL,
  `status` enum('pending','booked','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `total_tax` decimal(10,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `payment_status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `appointments` */

insert  into `appointments`(`id`,`user_id`,`payment_type_id`,`status`,`date`,`time`,`sub_total`,`total_tax`,`grand_total`,`payment_status`,`created_at`,`updated_at`) values 
(1,18,8,'pending','1974-01-29','14:23:31',453.00,218.00,333.00,'paid','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(2,20,4,'cancelled','1972-01-16','19:51:31',675.00,486.00,659.00,'unpaid','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(3,3,9,'booked','1980-02-06','01:19:42',174.00,857.00,851.00,'unpaid','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(4,9,9,'pending','1992-11-11','12:33:41',594.00,630.00,545.00,'unpaid','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(5,10,7,'completed','2011-02-03','23:03:07',833.00,294.00,439.00,'paid','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(6,4,1,'cancelled','1997-10-16','23:50:21',536.00,397.00,248.00,'unpaid','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(7,4,3,'booked','1980-12-23','06:02:18',267.00,234.00,671.00,'paid','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(8,4,7,'cancelled','1982-04-22','19:23:32',799.00,660.00,575.00,'unpaid','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(9,19,2,'booked','1980-10-30','06:07:36',636.00,311.00,575.00,'paid','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(10,20,1,'pending','2010-11-27','15:15:48',140.00,675.00,444.00,'unpaid','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(11,3,1,'booked','2022-09-15','15:48:00',0.00,0.00,9284.00,'unpaid','2022-09-15 15:33:12','2022-09-15 15:33:12'),
(12,3,1,'booked','2022-09-15','16:03:00',0.00,0.00,9284.00,'unpaid','2022-09-15 15:35:23','2022-09-15 15:35:23'),
(13,3,1,'booked','2022-09-15','16:03:00',0.00,0.00,9284.00,'unpaid','2022-09-15 15:37:28','2022-09-15 15:37:28'),
(14,3,1,'booked','2022-09-15','16:03:00',0.00,0.00,9284.00,'paid','2022-09-15 15:39:11','2022-09-15 15:39:13');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`is_active`,`icon`,`created_at`,`updated_at`) values 
(1,'Cardiac',1,'assets/images/heartbeat.png','2022-09-13 22:57:24',NULL),
(2,'General Chemistry',1,'assets/images/chemistry.png','2022-09-13 22:57:24',NULL),
(3,'Renal',1,'assets/images/kidneys.png','2022-09-13 22:57:24',NULL),
(4,'Therepeutic Drug Monitoring',1,'assets/images/medicine.png','2022-09-13 22:57:24',NULL),
(5,'Oncology',1,'assets/images/cancer.png','2022-09-13 22:57:24',NULL),
(6,'Nutritional Assessment',1,'assets/images/nutrition.png','2022-09-13 22:57:24',NULL),
(7,'Bone Disease',1,'assets/images/bones.png','2022-09-13 22:57:24',NULL),
(8,'Prenatal',1,'assets/images/pregnant.png','2022-09-13 22:57:24',NULL),
(9,'Hepatic',1,'assets/images/hepatic.png','2022-09-13 22:57:24',NULL),
(10,'Inflammatory',1,'assets/images/skin-problems.png','2022-09-13 22:57:24',NULL),
(11,'Anemia',1,'assets/images/anemia.png','2022-09-13 22:57:24',NULL),
(12,'Respiratory',1,'assets/images/respiratory.png','2022-09-13 22:57:24',NULL),
(13,'Spinal',1,'assets/images/spinal-cord.png','2022-09-13 22:57:24',NULL),
(14,'Drugs of Abuse (Urine)',1,'assets/images/drugs.png','2022-09-13 22:57:24',NULL),
(15,'Infectious Disease',1,'assets/images/bacteria.png','2022-09-13 22:57:24',NULL),
(16,'Lipids',1,'assets/images/lipid-profile.png','2022-09-13 22:57:24',NULL),
(17,'Pancreatic',1,'assets/images/pancreas.png','2022-09-13 22:57:24',NULL),
(18,'Toxicology',1,'assets/images/toxic.png','2022-09-13 22:57:24',NULL),
(19,'Thyroid/Metabolic',1,'assets/images/thyroid.png','2022-09-13 22:57:24',NULL),
(20,'Diabetes',1,'assets/images/measurement.png','2022-09-13 22:57:24',NULL),
(21,'Reproductive Endocrinology',1,'assets/images/womb.png','2022-09-13 22:57:24',NULL),
(22,'Immunosuppressant Drugs',1,'assets/images/immunosuppressant-drugs.png','2022-09-13 22:57:24',NULL),
(23,'Urine',1,'assets/images/urology.png','2022-09-13 22:57:24',NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `faqs` */

DROP TABLE IF EXISTS `faqs`;

CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `faqs` */

insert  into `faqs`(`id`,`question`,`answer`,`is_active`,`created_at`,`updated_at`) values 
(1,'Laborum et aperiam id dolore placeat. Sit eos nam maiores incidunt id quas autem rerum. Et sunt quis aut. Enim itaque voluptates modi voluptatem.','Molestias ipsa odio ad enim dolorem corporis provident. Quasi incidunt sunt ratione dolorum quisquam. Fugiat in cumque ipsum impedit eaque aliquam. Temporibus aut qui temporibus odio.',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(2,'Quia cumque aut et. Voluptatem veniam mollitia ab ipsam possimus accusantium. Temporibus aut sint odit explicabo.','Ut consequuntur assumenda doloribus maxime et provident ut quos. Tempora accusantium sit dolorem ad et et nulla. Autem quod ex asperiores eaque sit dolore iste. Itaque corporis eligendi beatae incidunt. Perferendis enim totam corrupti.',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(3,'Qui adipisci omnis architecto perferendis et exercitationem. Autem dolores et vel delectus. Excepturi esse hic sint veritatis rerum.','Unde voluptates nostrum error similique. Ipsum perspiciatis rerum aut ipsam mollitia sit. Et vel distinctio ut aliquam. Voluptatem est necessitatibus quas nemo.',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(4,'Non dolore debitis sit voluptas debitis possimus numquam. Suscipit qui qui placeat explicabo architecto asperiores autem. Labore placeat in sit ab laborum facere. Natus nihil excepturi maiores.','Iusto occaecati similique aut sunt voluptates vel voluptatum. Voluptatem recusandae quaerat illo ut totam. In cumque velit debitis cumque reprehenderit tempora. In odit exercitationem exercitationem accusamus tempore voluptatibus.',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(5,'Eum pariatur tenetur voluptates quo vitae dignissimos nam. Ut magni vitae aspernatur tenetur accusantium sint beatae. Ex fuga cupiditate deleniti quia. Et inventore qui et et et atque voluptatem voluptatem.','Alias commodi qui eveniet sint. Aut modi iusto error quia dolor. Eum voluptatibus amet consequuntur consequatur expedita est quis enim. Vero iusto optio perferendis et et magni ea ex.',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(6,'Et blanditiis expedita sint aliquam. Aut et eveniet sint aspernatur sed molestias aut. Aut ea ab inventore nam blanditiis enim.','Culpa sint consectetur praesentium id. Sed quis ab sapiente officia est. Illo aut odit fuga aut et aspernatur veniam. Molestiae similique dolor dolores quis occaecati adipisci.',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(7,'Facere aspernatur enim autem sunt tempora cupiditate quo incidunt. Voluptas sapiente in quas itaque quia dolores aut. Commodi pariatur placeat nemo inventore a totam. Nesciunt repudiandae alias tenetur et.','Quasi ipsam enim sit eum consequatur. Beatae corporis minus illo voluptates rerum. Ipsam qui est est harum. Recusandae maxime corrupti rerum aut.',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(8,'Doloribus quis temporibus voluptatem accusamus voluptas sed illo quo. Quasi sapiente ab aut dolor quibusdam aut voluptatem. Culpa pariatur et dolor illum ex. Maxime tempore nobis quo sit.','Excepturi id qui ipsam dolor repellendus. Sint voluptatum numquam quod officia distinctio. Incidunt perspiciatis occaecati molestiae et aspernatur incidunt ipsa.',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(9,'Dolores asperiores soluta ut cumque sit tenetur error. Animi maxime aperiam est nesciunt fugiat recusandae eius.','Nesciunt ea cum in delectus labore ducimus eum. Et hic totam voluptates blanditiis omnis. Ut non quis commodi nam.',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(10,'Velit nisi atque excepturi libero qui assumenda autem ut. Ut dolores et eius ut similique fugit quia. Architecto officiis voluptatibus ea molestiae et a aut. Necessitatibus omnis voluptatem et dolores sit.','Consequatur autem non consequatur. Ad quibusdam voluptatem minima. Nisi maxime placeat eos quia odit odio.',1,'2022-09-13 22:57:25','2022-09-13 22:57:25');

/*Table structure for table `hospital_test_details` */

DROP TABLE IF EXISTS `hospital_test_details`;

CREATE TABLE `hospital_test_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hospital_test_id` bigint(20) unsigned NOT NULL,
  `test_id` bigint(20) unsigned NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','in_process','completed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_status` enum('Report Awaited','Report Generated') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hospital_test_details` */

/*Table structure for table `hospital_test_masters` */

DROP TABLE IF EXISTS `hospital_test_masters`;

CREATE TABLE `hospital_test_masters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hospital_id` bigint(20) unsigned NOT NULL,
  `hospital_test_id` bigint(20) unsigned NOT NULL,
  `date` date DEFAULT NULL,
  `master_time` time DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `no_of_patients` int(11) DEFAULT NULL,
  `no_of_test` int(11) DEFAULT NULL,
  `sample_delivery_type` enum('pick_up','deliver') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hospital_test_masters` */

insert  into `hospital_test_masters`(`id`,`hospital_id`,`hospital_test_id`,`date`,`master_time`,`grand_total`,`no_of_patients`,`no_of_test`,`sample_delivery_type`,`created_at`,`updated_at`) values 
(2,5,2,'1993-09-11','16:10:46',555.00,56,52,'pick_up','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(3,3,8,'2017-10-07','22:09:59',213.00,84,28,'pick_up','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(4,4,10,'1992-01-07','20:19:59',481.00,22,39,'pick_up','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(5,2,5,'2012-02-10','17:53:19',354.00,81,20,'deliver','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(6,6,3,'1970-09-08','02:48:19',276.00,37,76,'pick_up','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(7,7,4,'1986-06-08','04:39:36',484.00,29,49,'deliver','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(8,8,6,'1981-03-15','10:43:09',603.00,41,75,'pick_up','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(9,9,1,'2020-07-02','19:02:03',354.00,65,32,'pick_up','2022-09-13 22:57:25','2022-09-13 22:57:25'),
(10,10,8,'1994-03-09','15:38:13',276.00,41,75,'deliver','2022-09-13 22:57:25','2022-09-13 22:57:25');

/*Table structure for table `hospital_tests` */

DROP TABLE IF EXISTS `hospital_tests`;

CREATE TABLE `hospital_tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hospital_test_master_id` int(11) NOT NULL,
  `hospital_id` bigint(20) unsigned NOT NULL,
  `patient_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_age` int(11) DEFAULT NULL,
  `patient_gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_delivery` enum('pick_up','deliver') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','in_process','completed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) NOT NULL COMMENT '0=Unpaid, 1=Paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hospital_tests` */

insert  into `hospital_tests`(`id`,`hospital_test_master_id`,`hospital_id`,`patient_id`,`patient_fullname`,`patient_email`,`patient_phone`,`patient_age`,`patient_gender`,`sample_delivery`,`sub_total`,`grand_total`,`status`,`address_1`,`address_2`,`payment_status`,`created_at`,`updated_at`) values 
(1,1,1,'4756','Dr. Andy O\'Hara DDS','bailey.gordon@hotmail.com','(606) 844-4083',62,'female','deliver',8771.00,2128.00,'pending','50375 Jody Lodge\nMarcellaland, MA 55850','115 Miller Shores\nJuniorhaven, TN 77867-1806',0,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(2,2,5,'3360','Miss Alanna Stroman','xlubowitz@boehm.com','(442) 573-5565',29,'female','deliver',4037.00,1576.00,'pending','953 Kayli Alley\nJakobville, MO 81955','59075 Dion Inlet\nNorth Everardoton, SC 29622',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(3,3,3,'8206','Katheryn Krajcik','gbashirian@hotmail.com','(575) 924-9191',48,'male','deliver',7955.00,5253.00,'completed','191 Orn Loop\nPort Clint, AZ 16689-1589','91046 Chelsea Union Apt. 970\nEast Benton, ND 06130-5972',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(4,4,4,'7509','Brad Huel','ehalvorson@connelly.biz','1-863-225-9242',85,'female','deliver',1410.00,9815.00,'pending','5204 Elisha Drive Suite 291\nEnolafurt, UT 48648-6797','68053 Thiel Throughway\nMariaburgh, NE 02873-3048',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(5,5,2,'1296','Glenda Schaden','mhackett@lang.com','405.447.5637',32,'other','deliver',8279.00,9816.00,'in_process','8392 Forest Track\nHagenesview, GA 28075','164 Destiney Views\nWest Dougton, PA 26941-6872',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(6,7,6,'2719','Oleta Labadie','reilly.gleason@heathcote.org','1-518-920-8410',79,'other','deliver',1505.00,9992.00,'pending','65274 Bartoletti Square Apt. 002\nPort Selina, ME 39572-0701','350 Hayley Road\nAdellchester, OK 67780',0,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(7,10,7,'7046','Dr. Amya Senger','langworth.nickolas@orn.com','318-668-3992',59,'female','pick_up',4419.00,6214.00,'pending','55016 Ziemann Point Apt. 878\nEast Dustin, OR 30490','38117 Romaguera Rest Suite 911\nLake Madiehaven, WY 89022',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(8,9,8,'7321','Lori Cronin','beier.brant@johns.com','+1 (720) 314-0709',65,'other','pick_up',9960.00,2727.00,'pending','729 Kulas Cliff Apt. 562\nWest Marquiseland, ME 82890-7366','9476 Wolff Wells Apt. 131\nLake Ciarahaven, GA 55694',0,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(9,6,9,'2036','Nickolas Ziemann MD','flo56@yahoo.com','1-520-857-5426',70,'male','pick_up',8952.00,3065.00,'completed','4179 Bednar Well Suite 712\nAbbieborough, UT 58133','1379 Verla Plaza Apt. 897\nNorth Joanie, MD 92084',1,'2022-09-13 22:57:25','2022-09-13 22:57:25'),
(10,8,10,'7452','Patience Hammes','susan47@jast.com','650-763-1887',38,'male','deliver',2104.00,5631.00,'completed','63430 Judd Light Apt. 732\nShanieshire, SC 05053-6636','5287 Nienow Trafficway\nWest Baileyborough, WI 03943-6623',0,'2022-09-13 22:57:25','2022-09-13 22:57:25');

/*Table structure for table `hospitals` */

DROP TABLE IF EXISTS `hospitals`;

CREATE TABLE `hospitals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hospitals` */

insert  into `hospitals`(`id`,`user_id`,`name`,`phone`,`address`,`created_at`,`updated_at`) values 
(2,7,'Hospital123','+9521478522','EFG address','2022-09-13 22:57:25',NULL),
(3,2,'Hospital456','+9532147692','HIJ address','2022-09-13 22:57:25',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_09_02_154935_create_hospitals_table',1),
(6,'2022_09_02_154959_create_roles_table',1),
(7,'2022_09_02_155018_create_reports_table',1),
(8,'2022_09_02_155043_create_appointments_table',1),
(9,'2022_09_02_155100_create_tests_table',1),
(10,'2022_09_02_155114_create_categories_table',1),
(11,'2022_09_02_155158_create_payments_table',1),
(12,'2022_09_02_155215_create_payment_types_table',1),
(13,'2022_09_02_155258_create_hospital_tests_table',1),
(14,'2022_09_02_155321_create_hospital_test_details_table',1),
(15,'2022_09_02_155337_create_hospital_test_masters_table',1),
(16,'2022_09_02_155416_create_appointment_test_reports_table',1),
(17,'2022_09_02_155441_create_faqs_table',1),
(18,'2022_09_02_171747_create_slot_availabilities_table',1),
(19,'2022_09_02_171817_create_occupied_slots_table',1),
(20,'2022_09_06_202139_create_settings_table',1),
(21,'2022_09_06_203353_add_column_hospital_test_id_to_hospital_test_masters',1),
(22,'2022_09_08_210939_add_columns_to_reports',1),
(23,'2022_09_08_211852_add_report_status_to_hospital_test_details',1),
(24,'2022_09_08_213405_add_patient_email_to_hospital_tests',1),
(25,'2022_09_08_214448_add_report_status_to_appointment_test_reports',1);

/*Table structure for table `occupied_slots` */

DROP TABLE IF EXISTS `occupied_slots`;

CREATE TABLE `occupied_slots` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('booked','available','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `occupied_slots` */

insert  into `occupied_slots`(`id`,`date`,`time`,`status`,`created_at`,`updated_at`) values 
(1,'2022-09-15','15:48:00','booked','2022-09-15 15:33:12','2022-09-15 15:33:12'),
(2,'2022-09-15','16:03:00','booked','2022-09-15 15:35:23','2022-09-15 15:35:23'),
(3,'2022-09-15','16:03:00','booked','2022-09-15 15:37:28','2022-09-15 15:37:28'),
(4,'2022-09-15','16:03:00','booked','2022-09-15 15:39:11','2022-09-15 15:39:11');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `payment_types` */

DROP TABLE IF EXISTS `payment_types`;

CREATE TABLE `payment_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `payment_types` */

insert  into `payment_types`(`id`,`name`,`is_active`,`created_at`,`updated_at`) values 
(1,'Online',1,'2022-09-13 22:57:24',NULL),
(2,'Onsite',1,'2022-09-13 22:57:24',NULL);

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_id` bigint(20) unsigned DEFAULT NULL,
  `hospital_test_id` bigint(20) unsigned DEFAULT NULL,
  `status` enum('pending','paid','partial_paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `payments` */

insert  into `payments`(`id`,`transaction_id`,`appointment_id`,`hospital_test_id`,`status`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'1663256353203231224663234721ee4476.47797310',14,NULL,'paid','2022-09-15 15:39:13','2022-09-15 15:39:13',NULL);

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `reports` */

DROP TABLE IF EXISTS `reports`;

CREATE TABLE `reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `appointment_id` bigint(20) unsigned NOT NULL,
  `appointment_test_report_id` bigint(20) unsigned NOT NULL,
  `hospital_test_id` bigint(20) unsigned NOT NULL,
  `hospital_test_detail_id` bigint(20) unsigned NOT NULL,
  `test_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `report_file` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reports` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`role`,`is_active`,`created_at`,`updated_at`) values 
(1,'Lab',1,'2022-09-13 22:57:24',NULL),
(2,'Hospital',1,'2022-09-13 22:57:24',NULL),
(3,'Patient',1,'2022-09-13 22:57:24',NULL);

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

insert  into `settings`(`id`,`setting_name`,`setting_value`,`is_active`,`created_at`,`updated_at`) values 
(1,'currency','$',1,'2022-09-13 22:57:25',NULL),
(2,'open_timing','10:00',1,'2022-09-13 22:57:25',NULL),
(3,'close_timing','18:00',1,'2022-09-13 22:57:25',NULL),
(4,'timing_gap','15',1,'2022-09-13 22:57:25',NULL);

/*Table structure for table `slot_availabilities` */

DROP TABLE IF EXISTS `slot_availabilities`;

CREATE TABLE `slot_availabilities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('booked','available','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `slot_availabilities` */

/*Table structure for table `tests` */

DROP TABLE IF EXISTS `tests`;

CREATE TABLE `tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tests` */

insert  into `tests`(`id`,`name`,`amount`,`category_id`,`is_active`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Apolipoprotein A1',8674.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(2,'Apolipoprotein B',6037.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(3,'Cholesterol',2164.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(4,'CK',4514.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(5,'CKMB',4683.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(6,'CK-MB',2112.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(7,'Direct HDL',9689.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(8,'Direct LDL',1804.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(9,'Homocysteine',678.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(10,'hsTroponin',2735.00,1,0,'2022-09-13 22:57:25',NULL,NULL),
(11,'LDH',2965.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(12,'LDH',8036.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(13,'Lp(a)',2318.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(14,'Myoglobin',4523.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(15,'NT-proBNP',3791.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(16,'Triglycerides',7194.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(17,'Troponin I ES',4140.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(18,'Wide-Range CRP',8532.00,1,1,'2022-09-13 22:57:25',NULL,NULL),
(19,'Amylase',610.00,2,1,'2022-09-13 22:57:25',NULL,NULL),
(20,'BUN/Urea',8188.00,2,1,'2022-09-13 22:57:25',NULL,NULL),
(21,'Calcium',422.00,2,1,'2022-09-13 22:57:25',NULL,NULL),
(22,'CK',2070.00,2,1,'2022-09-13 22:57:25',NULL,NULL),
(23,'Glucose',2265.00,2,1,'2022-09-13 22:57:25',NULL,NULL),
(24,'Lactate',8774.00,2,1,'2022-09-13 22:57:25',NULL,NULL),
(25,'LDH',2998.00,2,1,'2022-09-13 22:57:25',NULL,NULL),
(26,'Lipase',7721.00,2,1,'2022-09-13 22:57:25',NULL,NULL),
(27,'Magnesium',2667.00,2,1,'2022-09-13 22:57:25',NULL,NULL),
(28,'Phosphorus',5929.00,2,1,'2022-09-13 22:57:25',NULL,NULL),
(29,'Uric Acid',2635.00,2,1,'2022-09-13 22:57:25',NULL,NULL),
(30,'Albumin',389.00,3,1,'2022-09-13 22:57:25',NULL,NULL),
(31,'BUN/Urea',204.00,3,1,'2022-09-13 22:57:25',NULL,NULL),
(32,'Calcium',5869.00,3,1,'2022-09-13 22:57:25',NULL,NULL),
(33,'Carbon Dioxide',3936.00,3,1,'2022-09-13 22:57:25',NULL,NULL),
(34,'Chloride',4693.00,3,1,'2022-09-13 22:57:25',NULL,NULL),
(35,'Creatinine',1049.00,3,1,'2022-09-13 22:57:25',NULL,NULL),
(36,'Glucose',8900.00,3,1,'2022-09-13 22:57:25',NULL,NULL),
(37,'Microalbumin',1428.00,3,1,'2022-09-13 22:57:25',NULL,NULL),
(38,'NephroCheck®',602.00,3,0,'2022-09-13 22:57:25',NULL,NULL),
(39,'Phosphorus',6882.00,3,1,'2022-09-13 22:57:25',NULL,NULL),
(40,'Potassium',8773.00,3,1,'2022-09-13 22:57:25',NULL,NULL),
(41,'Sodium',9325.00,3,1,'2022-09-13 22:57:25',NULL,NULL),
(42,'Uric Acid',9153.00,3,1,'2022-09-13 22:57:25',NULL,NULL),
(43,'Urine Protein',9394.00,3,1,'2022-09-13 22:57:25',NULL,NULL),
(44,'Amikacin¶',6612.00,4,1,'2022-09-13 22:57:25',NULL,NULL),
(45,'Caffeine',3648.00,4,1,'2022-09-13 22:57:25',NULL,NULL),
(46,'Carbamazepine',5773.00,4,1,'2022-09-13 22:57:25',NULL,NULL),
(47,'Digoxin',1631.00,4,1,'2022-09-13 22:57:25',NULL,NULL),
(48,'Gentamicin',7779.00,4,1,'2022-09-13 22:57:25',NULL,NULL),
(49,'Lithium',942.00,4,1,'2022-09-13 22:57:25',NULL,NULL),
(50,'Lidocaine',4615.00,4,0,'2022-09-13 22:57:25',NULL,NULL),
(51,'Phenobarbital*',5538.00,4,1,'2022-09-13 22:57:25',NULL,NULL),
(52,'Phenytoin',6654.00,4,1,'2022-09-13 22:57:25',NULL,NULL),
(53,'Theophylline',9555.00,4,1,'2022-09-13 22:57:25',NULL,NULL),
(54,'Tobramycin',4457.00,4,1,'2022-09-13 22:57:25',NULL,NULL),
(55,'Valproic Acid',4088.00,4,1,'2022-09-13 22:57:25',NULL,NULL),
(56,'Vancomycin',2827.00,4,1,'2022-09-13 22:57:25',NULL,NULL),
(57,'AFP',5502.00,5,1,'2022-09-13 22:57:25',NULL,NULL),
(58,'CA 15-3TM',9909.00,5,1,'2022-09-13 22:57:25',NULL,NULL),
(59,'CA 19-9TM',8565.00,5,1,'2022-09-13 22:57:25',NULL,NULL),
(60,'CA 125 IITM',7736.00,5,1,'2022-09-13 22:57:25',NULL,NULL),
(61,'CEA',5723.00,5,1,'2022-09-13 22:57:25',NULL,NULL),
(62,'IgA',9269.00,5,1,'2022-09-13 22:57:25',NULL,NULL),
(63,'IgG',6158.00,5,1,'2022-09-13 22:57:25',NULL,NULL),
(64,'IgM',7795.00,5,1,'2022-09-13 22:57:25',NULL,NULL),
(65,'PSA',3282.00,5,1,'2022-09-13 22:57:25',NULL,NULL),
(66,'Albumin',1750.00,6,1,'2022-09-13 22:57:25',NULL,NULL),
(67,'Direct TIBC',1736.00,6,1,'2022-09-13 22:57:25',NULL,NULL),
(68,'Ferritin',8844.00,6,1,'2022-09-13 22:57:25',NULL,NULL),
(69,'Folate',1034.00,6,1,'2022-09-13 22:57:25',NULL,NULL),
(70,'Iron',3592.00,6,1,'2022-09-13 22:57:25',NULL,NULL),
(71,'Prealbumin',5407.00,6,1,'2022-09-13 22:57:25',NULL,NULL),
(72,'Total Protein',7147.00,6,1,'2022-09-13 22:57:25',NULL,NULL),
(73,'Transferrin',6356.00,6,1,'2022-09-13 22:57:25',NULL,NULL),
(74,'Vitamin B12',7144.00,6,1,'2022-09-13 22:57:25',NULL,NULL),
(75,'Alkaline Phosphatase',5293.00,7,1,'2022-09-13 22:57:25',NULL,NULL),
(76,'Calcium',716.00,7,1,'2022-09-13 22:57:25',NULL,NULL),
(77,'Intact PTH',8211.00,7,1,'2022-09-13 22:57:25',NULL,NULL),
(78,'NTx',3173.00,7,1,'2022-09-13 22:57:25',NULL,NULL),
(79,'Phosphorus',4479.00,7,1,'2022-09-13 22:57:25',NULL,NULL),
(80,'Vitamin D',2527.00,7,1,'2022-09-13 22:57:25',NULL,NULL),
(81,'Anti-HIV 1+2',3212.00,8,1,'2022-09-13 22:57:25',NULL,NULL),
(82,'HBsAg',2212.00,8,1,'2022-09-13 22:57:25',NULL,NULL),
(83,'Rubella IgG',9115.00,8,1,'2022-09-13 22:57:25',NULL,NULL),
(84,'Total ß-hCG Generation II',2005.00,8,1,'2022-09-13 22:57:25',NULL,NULL),
(85,'Albumin',9199.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(86,'Alkaline Phosphatase',35.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(87,'Alpha 1-antitrypsin',6294.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(88,'ALT',5786.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(89,'Ammonia',7002.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(90,'AST',6036.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(91,'BuBc',537.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(92,'Cholinesterase',9806.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(93,'GGT',4863.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(94,'IgA',9719.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(95,'IgG',4617.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(96,'IgM',9362.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(97,'Total Bilirubin',9023.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(98,'Prealbumin',3807.00,9,1,'2022-09-13 22:57:25',NULL,NULL),
(99,'ASO',393.00,10,1,'2022-09-13 22:57:25',NULL,NULL),
(100,'C3',30.00,10,1,'2022-09-13 22:57:25',NULL,NULL),
(101,'C4',3325.00,10,1,'2022-09-13 22:57:25',NULL,NULL),
(102,'CRP',8439.00,10,1,'2022-09-13 22:57:25',NULL,NULL),
(103,'IgA',624.00,10,1,'2022-09-13 22:57:25',NULL,NULL),
(104,'IgG',491.00,10,1,'2022-09-13 22:57:25',NULL,NULL),
(105,'IgM',7472.00,10,1,'2022-09-13 22:57:25',NULL,NULL),
(106,'RF',2540.00,10,1,'2022-09-13 22:57:25',NULL,NULL),
(107,'Wide-Range CRP',2964.00,10,1,'2022-09-13 22:57:25',NULL,NULL),
(108,'Direct TIBC',6417.00,11,1,'2022-09-13 22:57:25',NULL,NULL),
(109,'Ferritin',9084.00,11,1,'2022-09-13 22:57:25',NULL,NULL),
(110,'Folate',1915.00,11,1,'2022-09-13 22:57:25',NULL,NULL),
(111,'Haptoglobin',1450.00,11,1,'2022-09-13 22:57:25',NULL,NULL),
(112,'Iron',257.00,11,1,'2022-09-13 22:57:25',NULL,NULL),
(113,'TIBC',3125.00,11,0,'2022-09-13 22:57:25',NULL,NULL),
(114,'Transferrin',967.00,11,1,'2022-09-13 22:57:25',NULL,NULL),
(115,'Vitamin B12',821.00,11,1,'2022-09-13 22:57:25',NULL,NULL),
(116,'Alpha 1-antitrypsin',3319.00,12,1,'2022-09-13 22:57:25',NULL,NULL),
(117,'Caffeine',8822.00,12,1,'2022-09-13 22:57:25',NULL,NULL),
(118,'Carbon Dioxide',7005.00,12,1,'2022-09-13 22:57:25',NULL,NULL),
(119,'Chloride',5817.00,12,1,'2022-09-13 22:57:25',NULL,NULL),
(120,'Potassium',8121.00,12,1,'2022-09-13 22:57:25',NULL,NULL),
(121,'Sodium',1405.00,12,1,'2022-09-13 22:57:25',NULL,NULL),
(122,'Glucose (csf)',2166.00,13,1,'2022-09-13 22:57:25',NULL,NULL),
(123,'Total Protein (csf)',2860.00,13,1,'2022-09-13 22:57:25',NULL,NULL),
(124,'Amphetamines',7142.00,14,1,'2022-09-13 22:57:25',NULL,NULL),
(125,'Barbiturates',3730.00,14,1,'2022-09-13 22:57:25',NULL,NULL),
(126,'Benzodiazepines',9829.00,14,1,'2022-09-13 22:57:25',NULL,NULL),
(127,'Buprenorphine/Suboxone',9700.00,14,0,'2022-09-13 22:57:25',NULL,NULL),
(128,'Amphetamines',2241.00,14,1,'2022-09-13 22:57:25',NULL,NULL),
(129,'Cocaine Metabolites',6520.00,14,1,'2022-09-13 22:57:25',NULL,NULL),
(130,'Ecstasy¶',9609.00,14,1,'2022-09-13 22:57:25',NULL,NULL),
(131,'Ethyl Glucuronide (ETG)#',6898.00,14,0,'2022-09-13 22:57:25',NULL,NULL),
(132,'Heroin Metabolite (6-AM)',5909.00,14,0,'2022-09-13 22:57:25',NULL,NULL),
(133,'Hydrocodone',3959.00,14,0,'2022-09-13 22:57:25',NULL,NULL),
(134,'Methadone',3520.00,14,1,'2022-09-13 22:57:25',NULL,NULL),
(135,'Methadone Metabolite (EDDP)',8556.00,14,0,'2022-09-13 22:57:25',NULL,NULL),
(136,'Opiates',4390.00,14,1,'2022-09-13 22:57:25',NULL,NULL),
(137,'Oxycodone¶',8.00,14,1,'2022-09-13 22:57:25',NULL,NULL),
(138,'PCP',4448.00,14,1,'2022-09-13 22:57:25',NULL,NULL),
(139,'Propoxyphene',4292.00,14,0,'2022-09-13 22:57:25',NULL,NULL),
(140,'THC',9129.00,14,1,'2022-09-13 22:57:25',NULL,NULL),
(141,'Anti-HAV IgM',5169.00,15,1,'2022-09-13 22:57:25',NULL,NULL),
(142,'Anti-HAV Total ',240.00,15,1,'2022-09-13 22:57:25',NULL,NULL),
(143,'Anti-HBc',2405.00,15,1,'2022-09-13 22:57:25',NULL,NULL),
(144,'Anti-HBc IgM',7508.00,15,1,'2022-09-13 22:57:25',NULL,NULL),
(145,'Anti-HBe',2183.00,15,1,'2022-09-13 22:57:25',NULL,NULL),
(146,'Anti-HBs',7405.00,15,1,'2022-09-13 22:57:25',NULL,NULL),
(147,'Anti-HCV',8938.00,15,1,'2022-09-13 22:57:25',NULL,NULL),
(148,'Anti-HIV 1+2',5850.00,15,1,'2022-09-13 22:57:25',NULL,NULL),
(149,'HBeAg',3348.00,15,1,'2022-09-13 22:57:25',NULL,NULL),
(150,'HBsAg',5530.00,15,1,'2022-09-13 22:57:25',NULL,NULL),
(151,'HIV Combo',3556.00,15,1,'2022-09-13 22:57:25',NULL,NULL),
(152,'Rubella IgG',1536.00,15,1,'2022-09-13 22:57:25',NULL,NULL),
(153,'Apolipoprotein A1',6477.00,16,1,'2022-09-13 22:57:25',NULL,NULL),
(154,'Apolipoprotein B',6043.00,16,1,'2022-09-13 22:57:25',NULL,NULL),
(155,'Cholestero',3590.00,16,1,'2022-09-13 22:57:25',NULL,NULL),
(156,'Direct HDL',9082.00,16,1,'2022-09-13 22:57:25',NULL,NULL),
(157,'Direct LDL',7409.00,16,1,'2022-09-13 22:57:25',NULL,NULL),
(158,'Triglycerides',1373.00,16,1,'2022-09-13 22:57:25',NULL,NULL),
(159,'Amylase',2780.00,17,1,'2022-09-13 22:57:25',NULL,NULL),
(160,'Lipase',7806.00,17,1,'2022-09-13 22:57:25',NULL,NULL),
(161,'Acetaminophen',7929.00,18,1,'2022-09-13 22:57:25',NULL,NULL),
(162,'Alcohol',6458.00,18,1,'2022-09-13 22:57:25',NULL,NULL),
(163,'Cholinesterase',9215.00,18,1,'2022-09-13 22:57:25',NULL,NULL),
(164,'Salicylate',1694.00,18,1,'2022-09-13 22:57:25',NULL,NULL),
(165,'Cortiso',5947.00,19,1,'2022-09-13 22:57:25',NULL,NULL),
(166,'Free T3',6630.00,19,1,'2022-09-13 22:57:25',NULL,NULL),
(167,'Free T4',9285.00,19,1,'2022-09-13 22:57:25',NULL,NULL),
(168,'Lactate',2155.00,19,1,'2022-09-13 22:57:25',NULL,NULL),
(169,'Cortiso',1464.00,19,1,'2022-09-13 22:57:25',NULL,NULL),
(170,'T3 Uptake',3714.00,19,1,'2022-09-13 22:57:25',NULL,NULL),
(171,'Total T3',3414.00,19,1,'2022-09-13 22:57:25',NULL,NULL),
(172,'Total T4',1271.00,19,1,'2022-09-13 22:57:25',NULL,NULL),
(173,'TSH',1510.00,19,1,'2022-09-13 22:57:25',NULL,NULL),
(174,'ß-hydroxybuturate*',9321.00,20,1,'2022-09-13 22:57:25',NULL,NULL),
(175,'BUN/Urea',4834.00,20,1,'2022-09-13 22:57:25',NULL,NULL),
(176,'C-Peptide',669.00,20,1,'2022-09-13 22:57:25',NULL,NULL),
(177,'Creatinine',2080.00,20,1,'2022-09-13 22:57:25',NULL,NULL),
(178,'Glucose',6101.00,20,1,'2022-09-13 22:57:25',NULL,NULL),
(179,'Glycated Serum Protein',8987.00,20,0,'2022-09-13 22:57:25',NULL,NULL),
(180,'HbA1c',400.00,20,1,'2022-09-13 22:57:25',NULL,NULL),
(181,'Insulin',9575.00,20,1,'2022-09-13 22:57:25',NULL,NULL),
(182,'Microalbumin',2601.00,20,1,'2022-09-13 22:57:25',NULL,NULL),
(183,'Estradiol',5943.00,21,1,'2022-09-13 22:57:25',NULL,NULL),
(184,'FSH',7570.00,21,1,'2022-09-13 22:57:25',NULL,NULL),
(185,'LH',4584.00,21,1,'2022-09-13 22:57:25',NULL,NULL),
(186,'Progesterone',4027.00,21,1,'2022-09-13 22:57:25',NULL,NULL),
(187,'Prolactin',4021.00,21,1,'2022-09-13 22:57:25',NULL,NULL),
(188,'Testosterone',4326.00,21,1,'2022-09-13 22:57:25',NULL,NULL),
(189,'Total ß-hCG Generation II',1428.00,21,1,'2022-09-13 22:57:25',NULL,NULL),
(190,'TSH',1818.00,21,1,'2022-09-13 22:57:25',NULL,NULL),
(191,'Cyclosporine¶',7100.00,22,1,'2022-09-13 22:57:25',NULL,NULL),
(192,'Everolimus¶',9682.00,22,1,'2022-09-13 22:57:25',NULL,NULL),
(193,'Mycophenolic Acid¶',6755.00,22,1,'2022-09-13 22:57:25',NULL,NULL),
(194,'Tacrolimus¶',5299.00,22,1,'2022-09-13 22:57:25',NULL,NULL),
(195,'Amylase',398.00,23,1,'2022-09-13 22:57:25',NULL,NULL),
(196,'Calcium',1475.00,23,1,'2022-09-13 22:57:25',NULL,NULL),
(197,'Chloride',4098.00,23,1,'2022-09-13 22:57:25',NULL,NULL),
(198,'Creatinine',31.00,23,1,'2022-09-13 22:57:25',NULL,NULL),
(199,'Glucose',5241.00,23,1,'2022-09-13 22:57:25',NULL,NULL),
(200,'Magnesium',3662.00,23,1,'2022-09-13 22:57:25',NULL,NULL),
(201,'Phosphorus',2176.00,23,1,'2022-09-13 22:57:25',NULL,NULL),
(202,'Potassium',4169.00,23,1,'2022-09-13 22:57:25',NULL,NULL),
(203,'Protein',1539.00,23,1,'2022-09-13 22:57:25',NULL,NULL),
(204,'Sodium',5064.00,23,1,'2022-09-13 22:57:25',NULL,NULL),
(205,'BUN/Urea',6468.00,23,1,'2022-09-13 22:57:25',NULL,NULL),
(206,'Uric Acid',7766.00,23,1,'2022-09-13 22:57:25',NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `hospital_id` bigint(20) unsigned DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`role_id`,`hospital_id`,`is_active`,`phone`,`gender`,`age`,`country`,`address`,`address2`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Lab','lab@gmail.com','2022-09-13 22:57:24','$2y$10$lkUwanLvzafVZKNvtf9ua..Q5LHAFr4.gojBqHA9zq0PXt0U0Mvn6',1,NULL,1,'+111222333','others',NULL,NULL,NULL,NULL,NULL,'2022-09-13 22:57:24',NULL),
(2,'Hospital','hospital@gmail.com','2022-09-15 03:55:53','$2y$10$GNvQubV47DziDvu1ocAGiuyRBb9oEdNNvp7n9wTe3v0Mdon5ytygS',2,NULL,1,'+8514258865',NULL,NULL,NULL,NULL,NULL,NULL,'2022-09-15 03:56:24',NULL),
(3,'Patient','patient@gmail.com','2022-09-13 22:57:24','$2y$10$wJc8z2g7n7/V8OA1vcMzO.8wegbsr/XgTI3w/xVuxJiAkPTkb3D2y',3,NULL,1,'+111222333','male',23,NULL,'64 East Fabien Drive','Qui vel consequatur',NULL,'2022-09-13 22:57:25','2022-09-15 15:33:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
