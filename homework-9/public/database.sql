CREATE DATABASE `homework-8`;
CREATE TABLE `games`
(
	`id`	int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(200) NOT NULL,
    `year`	int(4) NOT NULL,
    primary key(id)
);

insert into games (name, year)
values ('Minecraft', '2011');

insert into games (name, year)
values ('Legend of Zelda', '2017');

insert into games (name, year)
values ('Fortnite', '2017');