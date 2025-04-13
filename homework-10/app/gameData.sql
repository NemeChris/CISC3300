CREATE DATABASE `homework-10`;
CREATE TABLE `games`(
	`id`	int(11) NOT NULL AUTO_INCREMENT,
    `name`	varchar(100) NOT NULL,
    `year`  int(4) NOT NULL,
    `price` varchar(8) NOT NULL,
    primary key(id)
);
