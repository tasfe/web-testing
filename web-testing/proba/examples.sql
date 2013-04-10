create database `examples`;

use `examples`;

create table `examples`.`cars` (
	`id` int unique not null,
	`name` varchar(40),
	`year` varchar(50),
	PRIMARY KEY(`id`)
);

INSERT INTO `cars` VALUES(1,'Mercedes','2000');
INSERT INTO `cars` VALUES(2,'BMW','2004');
INSERT INTO `cars` VALUES(3,'Audi','2001');