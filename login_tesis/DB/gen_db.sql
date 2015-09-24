CREATE TABLE Usuarios (Id_usu integer(4) NOT NULL AUTO_INCREMENT, Nombre VARCHAR(100) , Email VARCHAR(100), Password varchar(100), Funcion TINYINT, Codbaja char(1), PRIMARY KEY (Id_usu));
CREATE TABLE Carreras (Id_carrera integer(3) NOT NULL AUTO_INCREMENT, Desc_Carr VARCHAR(100), Plan VARCHAR(4), PRIMARY KEY (Id_carrera));
CREATE TABLE Materias (Id_materia INTEGER(4) NOT NULL AUTO_INCREMENT,  CarrerasId_carrera integer(3) NOT NULL, Desc_Mat VARCHAR(100), PRIMARY KEY (Id_materia));
CREATE TABLE Alumnos (Id_alumno integer(6) NOT NULL AUTO_INCREMENT, Nombre VARCHAR(50) , Apellido VARCHAR(50) , Telefono VARCHAR(14) , Email VARCHAR(100) , Matricula varchar(10), PRIMARY KEY (Id_alumno));
CREATE TABLE Docentes (Id_docente integer(4) NOT NULL AUTO_INCREMENT, Nombre VARCHAR(50) , Apellido VARCHAR(50) , Telefono VARCHAR(14) , Email VARCHAR(100) , Password VARCHAR(100) , Codbaja char(1) , PRIMARY KEY (Id_docente));
CREATE TABLE Inscriptos (Id_insc integer(4) NOT NULL AUTO_INCREMENT, AlumnosId_alumno INTEGER(6) NOT NULL, DictadosId_curso INTEGER(4) NOT NULL, Cant_faltas_act SMALLINT(5), Cant_medfaltas_act SMALLINT(5), PRIMARY KEY (Id_insc));
CREATE TABLE Asignados (Id_asig integer(4) NOT NULL AUTO_INCREMENT, DictadosId_curso INTEGER(4) NOT NULL, DocentesId_docente integer(4) NOT NULL, Desc_Cargo VARCHAR(25) , PRIMARY KEY (Id_asig));
CREATE TABLE Dictados (Id_curso integer(4) NOT NULL AUTO_INCREMENT, Cuat SMALLINT(5)NOT NULL, Año VARCHAR(4), Diacursada VARBINARY(7), Alt_hor VARCHAR(2) , Cant_insc_act SMALLINT(5), Cant_clases SMALLINT(5), Cant_faltas_max SMALLINT(5), Finicio DATE , Ffin DATE , PRIMARY KEY (Id_curso));
CREATE TABLE Asistentes (Id_asist integer(3) NOT NULL AUTO_INCREMENT, AlumnosId_alumno INTEGER(6) NOT NULL, DictadosId_curso INTEGER(4) NOT NULL, Fecha_clase DATE , Cod_asist Varchar(1), PRIMARY KEY (Id_asist));
ALTER TABLE Materias ADD INDEX FKMateria12125 (CarrerasId_carrera), ADD CONSTRAINT FKMateria12125 FOREIGN KEY (CarrerasId_carrera) REFERENCES Carreras (Id_carrera);
ALTER TABLE Inscriptos ADD INDEX FKInscriptos563746 (AlumnosId_alumno), ADD CONSTRAINT FKInscriptos563746 FOREIGN KEY (AlumnosId_alumno) REFERENCES Alumnos (Id_alumno);
ALTER TABLE Inscriptos ADD INDEX FKInscriptos563747 (DictadosId_curso), ADD CONSTRAINT FKInscriptos563747 FOREIGN KEY (DictadosId_curso) REFERENCES Dictados (Id_curso);
ALTER TABLE Asignados ADD INDEX FKAsignados563748 (DictadosId_curso), ADD CONSTRAINT FKAsignados563748 FOREIGN KEY (DictadosId_curso) REFERENCES Dictados (Id_curso);
ALTER TABLE Asignados ADD INDEX FKAsignados563749 (DocentesId_docente), ADD CONSTRAINT FKAsignados563749 FOREIGN KEY (DocentesId_docente) REFERENCES Docentes (Id_docente);
ALTER TABLE Asistentes ADD INDEX FKAsistentes563755 (AlumnosId_alumno), ADD CONSTRAINT FKAsistentes563755 FOREIGN KEY (AlumnosId_alumno) REFERENCES Alumnos (Id_alumno);
ALTER TABLE Asistentes ADD INDEX FKAsistentes563777 (DictadosId_curso), ADD CONSTRAINT FKAsistentes563777 FOREIGN KEY (DictadosId_curso) REFERENCES Dictados (Id_curso);

