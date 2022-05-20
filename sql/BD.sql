create database IF NOT EXISTS curs;
use curs;

/* Creació de les taules*/ 
-- Creación de las tablas

CREATE TABLE IF NOT EXISTS tbl_professor(
	id_professor int(5) NOT NULL AUTO_INCREMENT,
	nom_prof varchar (20) NOT NULL,
	cognom1_prof varchar (20) NULL,
	cognom2_prof varchar (20) NULL,
	email_prof varchar(50) NULL,
	telf varchar (5) NULL, /* Son les extensions, per exemple: 32256*/
	dept int(5) NOT NULL,
    passwd varchar(15) NOT NULL, 
	constraint pk_professor PRIMARY KEY (id_professor)
);

CREATE TABLE IF NOT EXISTS tbl_classe (
	id_classe int(5) NOT NULL AUTO_INCREMENT,
	codi_classe varchar(5) NOT NULL,
	nom_classe varchar(25) NULL,
	tutor int(5) NOT NULL,
	constraint pk_consta PRIMARY KEY (id_classe)
);

CREATE TABLE IF NOT EXISTS tbl_alumne(
	id_alumne int(10) NOT NULL AUTO_INCREMENT,
	dni_alu varchar(9) NULL,
	nom_alu varchar(20) NOT NULL,
	cognom1_alu varchar(20) NULL,
	cognom2_alu varchar(20) NULL,
	telf_alu varchar(9) NULL,
	email_alu varchar(50) NULL,
	classe int(5) NOT NULL,
    passwd varchar(15) NOT NULL, 
	constraint pk_alumne PRIMARY KEY (id_alumne)
);
CREATE TABLE IF NOT EXISTS tbl_admin(
    id_admin int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_admin varchar(20) NOT NULL,
    apellido_admin varchar(20) NULL,
    email_admin varchar(50) NULL,
    telf_admin varchar(9) NULL,
    passwd varchar(15) NOT NULL
);
CREATE TABLE IF NOT EXISTS tbl_dept(
	id_dept int(5) NOT NULL AUTO_INCREMENT,
	codi_dept varchar(5) NOT NULL,
	nom_dept varchar(25) NULL,
	constraint pk_imparteix PRIMARY KEY (id_dept)
);

ALTER TABLE tbl_classe
MODIFY codi_classe varchar(10) NOT NULL;

ALTER TABLE tbl_admin
MODIFY passwd varchar(60) NOT NULL;

ALTER TABLE tbl_professor
MODIFY passwd varchar(60) NOT NULL;

ALTER TABLE tbl_alumne
RENAME COLUMN img TO img_alumne;

ALTER TABLE tbl_alumne
MODIFY passwd varchar(60) NOT NULL;

ALTER TABLE tbl_alumne
ADD COLUMN img varchar(30) NOT NULL;

/* Modificacions de les taules per cració de les FK*/

ALTER TABLE tbl_alumne
    ADD CONSTRAINT alumne_classe_fk FOREIGN KEY (classe)
    REFERENCES tbl_classe(id_classe);
	
ALTER TABLE tbl_classe
    ADD CONSTRAINT classe_prof_fk FOREIGN KEY (tutor)
    REFERENCES tbl_professor(id_professor);

ALTER TABLE tbl_professor
    ADD CONSTRAINT prof_dept_fk FOREIGN KEY (dept)
    REFERENCES tbl_dept(id_dept);

-- Inserts 
--DEPARTAMENTO
INSERT INTO tbl_dept(codi_dept, nom_dept)
VALUES('GM1','SMX');
INSERT INTO tbl_dept(codi_dept, nom_dept)
VALUES('GS1','DAW');
INSERT INTO tbl_dept(codi_dept, nom_dept)
VALUES('GS2','ASIX');

INSERT INTO tbl_dept(codi_dept, nom_dept)
VALUES('SEC','Secretaría');
INSERT INTO tbl_dept(codi_dept, nom_dept)
VALUES('ADMIN','Administradores');



--Profesor
INSERT INTO tbl_professor (nom_prof, cognom1_prof, cognom2_prof, email_prof, telf, dept, passwd)
VALUES ('Sofia', 'Cardenas', 'Costas', 'SofiaC@gmail.com', '48365', 5, '1234');
INSERT INTO tbl_professor (nom_prof, cognom1_prof, cognom2_prof, email_prof, telf, dept, passwd)
VALUES ('Alejandro', 'Mécias', 'Garnacho', 'AlejandroMG@gmail.com', '48365', 5, '1234');

--CLASE
INSERT INTO tbl_classe (codi_classe, nom_classe, tutor)
VALUES ('ASIX1-2122', 'ASIX1 curso 2021/2022', 1);
INSERT INTO tbl_classe (codi_classe, nom_classe, tutor)
VALUES ('ASIX2-2122', 'ASIX2 curso 2021/2022', 1);

INSERT INTO tbl_classe (codi_classe, nom_classe, tutor)
VALUES ('DAW1-2122', 'DAW1 curso 2021/2022', 5);
--ALUMNOS
INSERT INTO tbl_alumne(dni_alu, nom_alu, cognom1_alu, cognom2_alu, telf_alu, email_alu, classe, passwd)
VALUES ('32673315S','Samir', 'Girón', 'Grau', '376538976', 'samirG@gmail.com', 1, '1234');
INSERT INTO tbl_alumne(dni_alu, nom_alu, cognom1_alu, cognom2_alu, telf_alu, email_alu, classe, passwd, img)
VALUES ('32673315S','Juan', 'Garcia', 'Rodriguez', '376538976', 'samirG@gmail.com', 1, '1234','danny.png');

INSERT INTO tbl_alumne(dni_alu, nom_alu, cognom1_alu, cognom2_alu, telf_alu, email_alu, classe, passwd, img)
VALUES ('32673315S','Carlos', 'Jimenez', 'Paredes', '376538976', 'carlosJP@gmail.com', 1, '1234','danny.png');
INSERT INTO tbl_alumne(dni_alu, nom_alu, cognom1_alu, cognom2_alu, telf_alu, email_alu, classe, passwd, img)
VALUES ('32673315S','Juan', 'garcia', 'rodriguez', '376538976', 'samirG@gmail.com', 1, '1234','danny.png');
INSERT INTO tbl_alumne(dni_alu, nom_alu, cognom1_alu, cognom2_alu, telf_alu, email_alu, classe, passwd, img)
VALUES ('32673315S','Juan', 'garcia', 'rodriguez', '376538976', 'samirG@gmail.com', 1, '1234','danny.png');
INSERT INTO tbl_alumne(dni_alu, nom_alu, cognom1_alu, cognom2_alu, telf_alu, email_alu, classe, passwd, img)
VALUES ('32673315S','Juan', 'garcia', 'rodriguez', '376538976', 'samirG@gmail.com', 1, '1234','danny.png');
INSERT INTO tbl_alumne(dni_alu, nom_alu, cognom1_alu, cognom2_alu, telf_alu, email_alu, classe, passwd, img)
VALUES ('32673315S','Juan', 'garcia', 'rodriguez', '376538976', 'samirG@gmail.com', 1, '1234','danny.png');
INSERT INTO tbl_alumne(dni_alu, nom_alu, cognom1_alu, cognom2_alu, telf_alu, email_alu, classe, passwd, img)
VALUES ('32673315S','Juan', 'garcia', 'rodriguez', '376538976', 'samirG@gmail.com', 1, '1234','danny.png');
INSERT INTO tbl_alumne(dni_alu, nom_alu, cognom1_alu, cognom2_alu, telf_alu, email_alu, classe, passwd, img)
VALUES ('32673315S','Juan', 'garcia', 'rodriguez', '376538976', 'samirG@gmail.com', 1, '1234','danny.png');
INSERT INTO tbl_alumne(dni_alu, nom_alu, cognom1_alu, cognom2_alu, telf_alu, email_alu, classe, passwd, img)
VALUES ('32673315S','Juan', 'garcia', 'rodriguez', '376538976', 'samirG@gmail.com', 1, '1234','danny.png');
--Admin
INSERT INTO tbl_admin (nombre_admin, apellido_admin, email_admin, telf_admin, passwd)
VALUES ('test1', 'test', 'test@gmail.com', '274937167', '5c64152cbbe77fa550a73b8eb6be37f15e339acc');

DELETE FROM tbl_admin
WHERE nombre_admin = 'test1';

--usuario remoto
-- CREATE USER 'admin'@'%' IDENTIFIED BY 'qwe123QWE';

-- GRANT ALL ON curs TO 'admin'@'%';


-- Consultas

update tbl_alumne
SET passwd = '5c64152cbbe77fa550a73b8eb6be37f15e339acc'
WHERE id_professor = 1;

update tbl_alumne
SET passwd = '5c64152cbbe77fa550a73b8eb6be37f15e339acc'
WHERE id_professor = 2;
update tbl_professor
SET passwd = '5c64152cbbe77fa550a73b8eb6be37f15e339acc'
WHERE id_professor = 2;

 SELECT c.codi_classe FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe;

