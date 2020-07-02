create database Planeacion;
use Planeacion;

create table Profesores
(
	id int not null auto_increment primary key,
    nombre text not null
)engine=InnoDB, charset=utf8;

create table Materias
(
	id int not null auto_increment primary key,
    nombre text not null
)engine=InnoDB, charset=utf8;

create table Unidades
(
	id int not null auto_increment primary key,
    nombre text not null,
    topics text not null,
    learning text not null,
    resources text not null,
    material text not null,
    id_materia int not null
)engine=InnoDB, charset=utf8;

alter table Unidades add constraint foreign key(id_materia)
references Materias(id);

create table Grupos
(
	id int not null auto_increment primary key,
    nombre text not null
)engine=InnoDB, charset=utf8;

create table Periodos
(
	id int not null auto_increment primary key,
    nombre text not null
)engine=InnoDB, charset=utf8;

create table Semanas
(
	id int not null auto_increment primary key,
    nombre text not null
)engine=InnoDB, charset=utf8;

create table catalogo
(
	id int not null auto_increment primary key,
    nombre_profesor text not null,
    nombre_periodo text not null,
    nombre_materia text not null,
    nombre_unidad text not null,
    fecha_inicio text null,
    fecha_final text null,
    topics text not null,
    learning text null,
    resources text null,
    material text null,
    grupo text not null
)engine=InnoDB, charset=utf8;