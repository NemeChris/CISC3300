CREATE DATABASE `in-class-20`;
CREATE TABLE `posts`(
	`id`	int(11) NOT NULL AUTO_INCREMENT,
    `comm`	varchar(100) NOT NULL,
    primary key(id)
);

ALTER TABLE posts ADD likes int(10) NOT NULL;

