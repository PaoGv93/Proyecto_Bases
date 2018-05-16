# Proyecto_Bases


Proyecto de la materia de base de datos avanzadas.
Programa con Register y Login de usuarios
Lista de usuarios y proyectos, así como edción de los mismos.
Bases de datos en Postgres y MySQL.





Database structure:
-------------------------------------------- CONSTRAINTS , NULL CLAUSE, AUTO INCREMENT
create table miembro(
id serial primary key,
nombre text not null,
password text not null,
matricula varchar(9) not null,
carrera text,
idProyecto int references proyecto(id)
);

create table proyecto(
id serial primary key,
nombre text not null,
alcance text,
riesgo text,
vision text,
fecha_Inicio date,
fecha_Fin date
);

create table sprint(
id serial primary key,
descripcion text,
fecha_Inicio date,
fecha_Fin date,
idProyecto int references proyecto(id)
);

create table historiasUsuario(
id serial primary key,
peso int,
scrumBoardStatus int,
historia text,
prioridad int,
criterio text
);

create table tarea(
id serial primary key,
nombreEncargado text,
idSprint int references sprint(id),
completado bool
);

create table criteriosAceptacion(
id serial primary key,
nombre text
);

---------------------------- inserts para las tablas
//MIEMBRO
INSERT INTO miembro (nombre, password, matricula, carrera, idProyecto) VALUES ('Paola', '1234567', 'A00399906', 'ITC', 1);
INSERT INTO miembro (nombre, password, matricula, carrera, idProyecto) VALUES ('Roberto', 'roberto12', 'A01324567', 'ITC', 1);
INSERT INTO miembro (nombre, password, matricula, carrera, idProyecto) VALUES ('Luis', 'luis123', 'A00399999', 'ITC', 1);

//PROYECTO
INSERT INTO proyecto (nombre, alcance, fecha_Inicio, fecha_Fin) VALUES ('TCRUM', 'quien sabe', '2018-01-20', '2018-05-2');

//SPRINT
INSERT INTO sprint (descripcion, fecha_Inicio, fecha_Fin, idProyecto) VALUES ('hacer la base de datos', '2018-02-10', '2018-02-17', 1);
INSERT INTO sprint (descripcion, fecha_Inicio, fecha_Fin, idProyecto) VALUES ('hacer el front', '2018-03-15', '2018-03-22', 1);

//HISTORIASUSUARIO
INSERT INTO historiasUsuario (peso, scrumBoardStatus, historia) VALUES (1, 1, 'historia de usuario');
INSERT INTO historiasUsuario (peso, historia, prioridad, criterio) VALUES (2, 'historia de usuario', 1, 'criterio');
INSERT INTO historiasUsuario (peso, scrumBoardStatus, prioridad) VALUES (4, 2, 2);
INSERT INTO historiasUsuario (peso, scrumBoardStatus, historia, prioridad, criterio) VALUES (8, 3, 'historia de usuario', 3, 'criterio');


-------------------------------------------- JOINS
//Inner join
SELECT p.id, p.nombreEncargado, p.idSprint FROM tarea as p INNER JOIN sprint
  ON p.id = sprint.id;

//Left outer join
SELECT p.id, p.nombreEncargado, p.idSprint FROM tarea as p LEFT OUTER JOIN sprint
  ON p.id = sprint.id;

//Right outer join
SELECT p.id, p.nombreEncargado, p.idSprint FROM tarea as p RIGHT OUTER JOIN sprint
  ON p.id = sprint.id;

//Full outer join
SELECT p.id, p.nombreEncargado, p.idSprint FROM tarea as p FULL OUTER JOIN sprint
  ON p.id = sprint.id;

-------------------------------------------- ALIAS
SELECT e.id, e.descripcion, e.fecha_Inicio, e.fecha_Fin
  FROM SPRINT AS e, TAREA AS s
    WHERE e.id = s.idSprint;

-------------------------------------------- TRIGGERS
CREATE TRIGGER historia_trigger AFTER INSERT ON historiasUsuario
FOR EACH ROW EXECUTE PROCEDURE insertar_criterio();


-------------------------------------------- INDEX
CREATE INDEX index_proyecto ON PROYECTO (nombre);


-------------------------------------------- ALTER TABLE
ALTER TABLE criteriosAceptacion ADD tipo text;


-------------------------------------------- VIEWS
CREATE VIEW miembros_view AS
SELECT id, nombre, matricula
FROM miembro;

SELECT * FROM miembros_view;

-------------------------------------------- TRANSACTIONS
BEGIN;
INSERT INTO tarea (nombreEncargado, idSprint, completado) VALUES ('Luis', 1, TRUE);
INSERT INTO tarea (nombreEncargado, idSprint, completado) VALUES ('Alberto', 1, FALSE);
INSERT INTO tarea (nombreEncargado, idSprint, completado) VALUES ('Paola', 2, TRUE);
INSERT INTO tarea (nombreEncargado, idSprint, completado) VALUES ('Celeste', 1, FALSE);
COMMIT;

BEGIN;
DELETE FROM tarea WHERE completado = FALSE;
ROLLBACK;

-------------------------------------------- LOCKS
BEGIN;
LOCK TABLE tarea IN ACCESS EXCLUSIVE MODE;
INSERT INTO tarea (nombreEncargado, idSprint, completado) VALUES ('Gabriel', 1, FALSE);
COMMIT;

-------------------------------------------- SUB QUERIES
SELECT *
  FROM miembro
  WHERE id IN (SELECT ID
    FROM miembro
    WHERE id > 2);

SELECT *
  FROM historiasUsuario
  WHERE id IN (SELECT ID
    FROM historiasUsuario
    WHERE peso < 5);


-------------------------------------------- PRIVILEGES
create user admingeneral with password '1234567';
grant all privileges on database tcrum to admingeneral;
psql -d tcrum -U admingeneral;


-------------------------------------------- DATE/TIME FUNCTION
INSERT INTO proyecto (nombre, alcance, fecha_Inicio, fecha_Fin) VALUES ('Otro', 'quien sabe', CURRENT_DATE, '2018-05-2');


-------------------------------------------- FUNCTIONS
//Funcion del trigger
CREATE OR REPLACE FUNCTION insertar_criterio() RETURNS TRIGGER AS $example_table$
  DECLARE
    cri text;
   BEGIN
    SELECT p.criterio INTO cri FROM historiasUsuario as p WHERE criterio IS NOT NULL;
      INSERT INTO criteriosAceptacion(nombre) VALUES (cri);
      RETURN NEW;
   END;
$example_table$ LANGUAGE plpgsql;


-------------------------------------------- USEFUL FUNCTIONS
//contar los miembros registrados
SELECT COUNT(*) FROM miembro;

//ver la historia de usuario que tenga el mayor peso
SELECT MAX(peso) FROM historiasUsuario WHERE peso IS NOT NULL;












#LOGIN and session control in PHP using MySQL
//Passwords save not in plain-text
 

Users, projects and how the page works
 

 

 

 

 

 
