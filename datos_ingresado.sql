use planeacion;

select * from profesores;
select * from grupos;
select * from materias;
select * from periodos;
select * from semanas;
select * from unidades;
select * from catalogo;

select m.nombre, u.nombre, u.topics, u.learning, u.resources, u.material from Unidades as u
inner join Materias as m on u.id_materia = m.id where u.id_materia = 5;

delimiter $$
create procedure Validacion(in var_nombre_profesor text, in var_nombre_periodo text, in var_nombre_materia text, in var_nombre_unidad text, in var_fecha_inicio text, in var_fecha_final text, in var_topics text, in var_learning text, in var_resources text, in var_material text, in var_grupo text)
begin
	declare existe int;
	if exists(select * from catalogo where nombre_periodo = var_nombre_periodo && nombre_materia = var_nombre_materia && grupo = var_grupo && nombre_unidad = var_nombre_unidad) then
		set existe = 1;
	else
		insert into catalogo(nombre_profesor, nombre_periodo, nombre_materia, nombre_unidad, fecha_inicio, fecha_final, topics, learning, resources, material, grupo) values(var_nombre_profesor, var_nombre_periodo, var_nombre_materia, var_nombre_unidad, var_fecha_inicio, var_fecha_final, var_topics, var_learning, var_resources, var_material, var_grupo); 
	end if;
end$$
delimiter $$