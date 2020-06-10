CREATE DATABASE project;

USE project;
/*
**		Tabla administradores
*/
CREATE TABLE `admins` (
`id` int(99) NOT NULL,
`Name` varchar(300) NOT NULL,
`Email` varchar(300) NOT NULL,
`Password` varchar(450) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `admins`
ADD PRIMARY KEY (`id`);

ALTER TABLE `admins`
MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*
**		Tabla usuarios
*/
CREATE TABLE `turista` (
`id` int(99) NOT NULL,
`admin_id` int(99) NOT NULL FOREIGN KEY REFERENCES admins(id),
`Name` varchar(300) NOT NULL,
`Email` varchar(300) NOT NULL,
`Password` varchar(450) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `turista`
ADD PRIMARY KEY (`id`);

ALTER TABLE `turista`
MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*
**		Tabla videojuegos
*/
CREATE TABLE `videojuegos` (
`id` int(99) NOT NULL,
`Nombre` varchar(300) NOT NULL,
`Precio` varchar(300) NOT NULL,
`consola` varchar(450) NOT NULL
`turista_id` int(99) NOT NULL FOREIGN KEY REFERENCES turista(id),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `videojuegos`
ADD PRIMARY KEY (`id`);

ALTER TABLE `videojuegos`
MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*
**		Tabla videojuegos
*/
CREATE TABLE `animales` (
`id` int(99) NOT NULL,
`Nombre` varchar(300) NOT NULL,
`Genero` varchar(300) NOT NULL,
`turista_id` int(99) NOT NULL FOREIGN KEY REFERENCES turista(id),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `animales`
ADD PRIMARY KEY (`id`);

ALTER TABLE `animales`
MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*
**		Tabla país
*/
CREATE TABLE `pais` (
`id` int(99) NOT NULL,
`Nombre` varchar(300) NOT NULL,
`Clima` varchar(300) NOT NULL,
`turista_id` int(99) NOT NULL FOREIGN KEY REFERENCES turista(id),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `pais`
ADD PRIMARY KEY (`id`);

ALTER TABLE `pais`
MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*
**		Tabla notas
*/
CREATE TABLE `blog` (
`id` int(99) NOT NULL,
`content` varchar(300) NOT NULL,
`turista_id` int(99) NOT NULL FOREIGN KEY REFERENCES turista(id),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `blog`
ADD PRIMARY KEY (`id`);

ALTER TABLE `blog`
MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;