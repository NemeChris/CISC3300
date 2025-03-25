--5a
CREATE DATABASE `homework`;

--5b
CREATE TABLE `notes`
(
    `id`	int(11) NOT NULL AUTO_INCREMENT,
    `title`	varchar(80) NOT NULL,
    `description`	text NOT NULL,
    primary key(id)
);

--6a
insert into notes (title, description)
values ('Manchester City', 'Best in the world');

insert into notes (title, description)
values ('Manchester United', 'Worst in the world');

insert into notes (title, description)
values ('Arsenal', 'Most average in the world');

insert into notes (title, description)
values ('Tottenham', 'Most irrelevant in the world');

--6b
update notes SET title = 'Liverpool' WHERE id = 3;

--6c
delete from notes WHERE id = 4;

--7a
SELECT * from notes order by title desc;

--7b
SELECT * from notes LIMIT 1 OFFSET 1;

--7c
--use `description` since the word is highlighted like a keyword in VSCode
SELECT * from notes WHERE `description` LIKE '%a%' OR `description` LIKE '%e%' OR `description` LIKE '%i%' OR `description` LIKE '%o%' OR `description` LIKE '%u%';