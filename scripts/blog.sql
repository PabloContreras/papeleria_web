CREATE DATABASE project;

USE project;

CREATE TABLE `blog` (
`id` int(99) NOT NULL,
`title` varchar(300) NOT NULL,
`content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `blog`
ADD PRIMARY KEY (`id`);

ALTER TABLE `blog`
MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;