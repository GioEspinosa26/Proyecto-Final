DROP DATABASE IF EXISTS login;

CREATE DATABASE login
CHARACTER SET = 'latin1' 
COLLATE = 'latin1_spanish_ci';

USE login;
SET SQL_SAFE_UPDATES = 0;

CREATE TABLE cApellido(
CvApellido int auto_increment not null primary key,
DsApellido varchar(40) not null
)ENGINE=InnoDB;
INSERT INTO cApellido VALUES(NULL, 'Rosado'), (NULL, 'Ruedas'), (NULL, 'Rodas'),
(NULL, 'Manchado'), (NULL, 'Calles'), (NULL, 'Pilar'),(NULL, 'Ortiz'), (NULL, 'Menchaca'), (NULL, 'Moreno'), 
(NULL, 'Urias');
#SELECT * FROM cApellido;

CREATE TABLE cNombre(
CvNombre int auto_increment not null primary key,
DsNombre varchar(40) not null
)ENGINE=InnoDB;
INSERT INTO cNombre VALUES(NULL, 'Juan'), (NULL, 'Rosalia'), (NULL, 'Rosario'),
(NULL, 'Apolinar'), (NULL, 'Guadalupe');
#SELECT * FROM cNombre;

CREATE TABLE cPuesto(
CvPuesto int auto_increment not null primary key,
DsPuesto varchar(40) not null
)ENGINE=InnoDB;
INSERT INTO cPuesto VALUES(NULL, 'Mantenimiento'), (NULL, 'Intendencia'), (NULL, 'Programador'),
(NULL, 'Gerente'), (NULL, 'Secretaria'), (NULL, 'Ventas'),(NULL, 'Diseño'), (NULL, 'Pedidos');
#SELECT * FROM cPuesto;

CREATE TABLE cAficion(
CvAficion int auto_increment not null primary key,
DsAficion varchar(40) not null
)ENGINE=InnoDB;
INSERT INTO cAficion VALUES(NULL, 'Musica'), (NULL, 'Pesca'), (NULL, 'Baile'),(NULL, 'Fotografia'), 
(NULL, 'Cine'), (NULL, 'Teatro'),(NULL, 'Modelado'), (NULL, 'Lectura'), (NULL, 'Pintura'), (NULL, 'Natacion');
#SELECT * FROM cAficion;

CREATE TABLE cMunicipio(
CvMunicipio int auto_increment not null primary key,
DsMunicipio varchar(40) not null
)ENGINE=InnoDB;
INSERT INTO cMunicipio VALUES(NULL, 'Las Margaritas'), (NULL, 'La Trinitaria'), (NULL, 'Centro'),
(NULL, 'Macuspana'), (NULL, 'Palenque'), (NULL, 'Ixtepec');

CREATE TABLE cCalle(
CvCalle int auto_increment not null primary key,
DsNombre varchar(40) not null
)ENGINE=InnoDB;
INSERT INTO cCalle VALUES(NULL, 'Gardenia'), (NULL, 'Azucena'), (NULL, 'Arboledas'),
(NULL, 'Buganbilia');

CREATE TABLE cGenero(
CvGenero int auto_increment not null primary key,
DsGenero varchar(40) not null
)ENGINE=InnoDB;
INSERT INTO cGenero VALUES(NULL, 'Mujer'), (NULL, 'Hombre');

CREATE TABLE cColonia(
CvColonia int auto_increment not null primary key,
DsColonia varchar(40) not null
)ENGINE=InnoDB;
INSERT INTO cColonia VALUES(NULL, 'Zapotal'), (NULL, 'Las Flores'), (NULL, 'Islas'),
(NULL, 'Grecia');

CREATE TABLE cCiudad(
CvCiudad int auto_increment not null primary key,
DsCiudad varchar(40) not null
)ENGINE=InnoDB;
INSERT INTO cCiudad VALUES(NULL, 'Chiapas'), (NULL, 'Tabasco'), (NULL, 'Oaxaca');

CREATE TABLE cTipPerson(
CvTipPerson int auto_increment not null primary key,
DsTipPerson varchar(40) not null
)ENGINE=InnoDB;
INSERT INTO cTipPerson VALUES(NULL, 'Cliente'), (NULL, 'Proveedor'), (NULL, 'Empleado');

CREATE TABLE mDirecc(
CvDireccion int auto_increment not null primary key,
Calle int not null,
Numero varchar(40) not null,
Colonia int not null,
Municipio int not null,
Ciudad int not null
)ENGINE=InnoDB;
INSERT INTO mDirecc VALUES(NULL, 1, '120', 1, 1, 1), (NULL, 2, '345', 1, 2, 1), 
(NULL, 3, '213', 2, 3, 2), (NULL, 1, '456', 3, 4, 2), (NULL, 2, '395', 3, 5, 1), 
(NULL, 4, '342', 2, 6, 3), (NULL, 3, '332', 4, 6, 3);

CREATE TABLE mPerson(
CvPerson int auto_increment not null primary key,
CvNombre int not null,
ApePat int not null,
ApeMat int not null,
#CvDireccion int not null,
CvGenero int not null,
CvTipPerson int not null,
CvAficion int not null
)ENGINE=InnoDB;
INSERT INTO mPerson VALUES(NULL, 1, 1, 4, 2, 1, 10), (NULL, 2, 2, 5, 1, 3, 9), (NULL, 1, 3, 8, 2, 2, 8),
(NULL, 3, 4, 2, 1, 1, 7), (NULL, 4, 5, 1, 2, 2, 8), (NULL, 3, 9, 10, 2, 3, 10), (NULL, 5, 7, 9, 1, 3, 9),
(NULL, 2, 5, 10, 1, 2, 3), (NULL, 3, 10, 2, 2, 1, 1);

/*CREATE TABLE mPerson(
CvPerson int auto_increment not null primary key,
Nombre varchar(40) not null
)ENGINE=InnoDB;*/

CREATE TABLE mUsuario(
CvUser int auto_increment not null primary key,
CvPerson int not null,
Login varchar(20) not null,
Contra varchar(15) not null,
FechaIni date not null,
FechaFin date not null,
EdoCta varchar(10) not null
)ENGINE=InnoDB;

#INSERT INTO mPerson VALUES(2, 'Rosalia Ruedas Calles'), (6, 'Rosario Moreno Urias'), (7, 'Guadalupe Ortiz Moreno');
/*
INSERT INTO mUsuario VALUES(1, 2, 'Rosalia', 'chalia', '01/10/2022', '11/11/2022', False),
(2, 6, 'Rosario', 'charis', '02/10/2022', '12/11/2022', True),
(3, 7, 'Guadalupe', 'guada', '09/10/2022', '18/11/2022', True);
*/
INSERT INTO mUsuario VALUES(1, 2, 'Rosalia', 'chalia', '2022/11/10', '2022/11/19', 'True'),
						   (2, 6, 'Rosario', 'charis', '2022/11/10', '2022/11/21', 'True'),
						   (3, 7, 'Guadalupe', 'guada', '2022/11/06', '2022/11/23', 'True');

SELECT CvUser, CONCAT(cNombre.DsNombre, ' ', AP.DsApellido, ' ', AM.DsApellido) AS Nombre, Login, Contra, FechaIni, FechaFin, EdoCta 
FROM mUsuario, mPerson, cNombre, cApellido AP, cApellido AM
WHERE (mPerson.CvNombre = cNombre.CvNombre AND
mPerson.ApePat = AP.CvApellido AND
mPerson.ApeMat = AM.CvApellido AND mUsuario.CvPerson=mPerson.CvPerson);
SELECT * FROM mUsuario;

SELECT mPerson.CvPerson, CONCAT(cNombre.DsNombre, ' ', AP.DsApellido, ' ', AM.DsApellido) AS Nombre, cGenero.DsGenero, 
cTipPerson.DsTipPerson, cAficion.DsAficion
FROM mPerson, cNombre, cApellido AP, cApellido AM,
cGenero, cPuesto, cTipPerson, cAficion
WHERE (mPerson.CvNombre = cNombre.CvNombre AND
mPerson.ApePat = AP.CvApellido AND
mPerson.ApeMat = AM.CvApellido AND
mPerson.CvGenero = cGenero.CvGenero AND
mPerson.CvTipPerson = cTipPerson.CvTipPerson AND
mPerson.CvAficion = cAficion.CvAficion)GROUP BY CvPerson
ORDER BY  CvPerson;
SELECT * FROM mPerson;
/*
UPDATE mUsuario SET Login='$user', Contra='$contra', FechaIni='$fec_ini', 
FechaFin='$fec_fin', EdoCta='$_edo' WHERE CvUser='$id';
SELECT * FROM mUsuario WHERE (Login='admin2' AND CvUser<>'1');
SELECT COUNT(*) FROM mUsuario WHERE (Login='Rosario' AND CvUser<>"1" OR Contra='Chalia' AND CvUser<>"1");
SELECT count(*) FROM mUsuario, mPerson WHERE mPerson.Nombre='Alex';
UPDATE mUsuario SET Login='$user', Contra='$contra', FechaIni='$fec_ini', FechaFin='$fec_fin', EdoCta='$_edo' 
WHERE CvUser='$id';
SELECT mPerson.CvPerson FROM mPerson WHERE (mPerson.Nombre='Rosario Moreno Urias');
SELECT mPerson.CvPerson, mPerson.Nombre as nombre FROM mPerson GROUP BY nombre;
SELECT CvUser, mPerson.Nombre FROM mUsuario, mPerson WHERE mPerson.CvPerson=mUsuario.CvPerson AND CvUser='2';*/

#UPDATE mUsuario SET EdoCta='False' WHERE Login='Rosario' AND Contra='charis';
#SELECT Contra FROM mUsuario WHERE CvUser=2;

#USE farmaciatest;
#SELECT * FROM usuario WHERE usuario = 'alex' AND clave = 'alex'
SELECT mPerson.CvPerson as clave FROM mPerson, cNombre, cApellido AP, cApellido AM 
WHERE(mPerson.CvNombre = cNombre.CvNombre AND mPerson.ApePat = AP.CvApellido 
AND mPerson.ApeMat = AM.CvApellido 
AND CONCAT(cNombre.DsNombre, ' ', AP.DsApellido, ' ', AM.DsApellido)='Guadalupe Ortiz Moreno');

SELECT CvUser, CONCAT(cNombre.DsNombre, ' ', AP.DsApellido, ' ', AM.DsApellido) AS Nombre, cTipPerson.DsTipPerson AS puesto, 
Login, Contra, FechaIni, FechaFin, EdoCta 
FROM mUsuario, mPerson, cNombre, cApellido AP, cApellido AM, cTipPerson
WHERE (mPerson.CvNombre = cNombre.CvNombre AND
mPerson.ApePat = AP.CvApellido AND
mPerson.ApeMat = AM.CvApellido AND mUsuario.CvPerson=mPerson.CvPerson AND mUsuario.CvUser=3 
AND cTipPerson.CvTipPerson=mPerson.CvTipPerson);