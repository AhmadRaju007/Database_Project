/*
SQLyog Enterprise - MySQL GUI v8.14 
MySQL - 5.5.5-10.1.34-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `user` (
	`id` double ,
	`username` varchar (150),
	`is_active` tinyint (1),
	`password` varchar (150),
	`created_by` varchar (150),
	`created_at` timestamp 
); 
insert into `user` (`id`, `username`, `is_active`, `password`, `created_by`, `created_at`) values('101','raju','1','67959999','1','2019-11-07 11:25:44');
insert into `user` (`id`, `username`, `is_active`, `password`, `created_by`, `created_at`) values('102','aaaaa','0','11111','1','2019-11-04 15:18:00');
insert into `user` (`id`, `username`, `is_active`, `password`, `created_by`, `created_at`) values('103','abc','1','123','1','2019-11-05 11:20:54');
insert into `user` (`id`, `username`, `is_active`, `password`, `created_by`, `created_at`) values('104','bbb','0','bbb','1','2019-11-05 11:26:23');
insert into `user` (`id`, `username`, `is_active`, `password`, `created_by`, `created_at`) values('105','raj','1','123','1','2019-11-07 14:43:55');
insert into `user` (`id`, `username`, `is_active`, `password`, `created_by`, `created_at`) values('106','aaa','0','111','1','2019-11-07 14:46:23');
