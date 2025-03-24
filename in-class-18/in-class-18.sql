CREATE DATABASE `in_class_17`;

CREATE TABLE `users`
(
    `id`	int(11) NOT NULL AUTO_INCREMENT,
    `username`	varchar(80) NOT NULL,
    `passKey`	varchar(80) NOT NULL,
    primary key(`id`)
);

CREATE TABLE `userComments`
(
    `comm`	varchar(100) NOT NULL,
    `userID`	int(11) NOT NULL,
    primary key(`comm`)
);

insert into users(username, passKey)
values('jay', 'harryPotter');

insert into users(username, passKey)
values('mike', 'lordOfTheRings');

insert into users(username, passKey)
values('justin', 'interstellar');

insert into users(username, passKey)
values('jacob', 'driveMyCar');

insert into userComments(comm, userID)
values('best movie ever', 1);

insert into userComments(comm, userID)
values('worst movie ever', 2);

-- 6a
select * from users left join userComments on users.id = userComments.userID;

-- 6b
select * from users inner join userComments on users.id = userComments.userID;
