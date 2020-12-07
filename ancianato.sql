#creacion de la bsae de datos#
CREATE database Ancianato;

#uso de la base de datos creada anteriormente#
use Ancianato;

#creacion de las tablas necesarias#
create table Atencion_Medica(
ID smallint not null auto_increment,
Nombre char(30) not null,
CalleNo char(35) not null,
Colonia char(20) not null,
CP numeric(5) not null,
Ciudad char(20),
Estado char(20) not null,
RFC char(13) not null unique,
Telefono numeric(10),
primary key (ID)
);

create table Benefactor(
ID smallint not null auto_increment,
Nombre char(30) not null,
CalleNo char(35) not null,
Colonia char(20) not null,
CP numeric(5) not null,
Cuidad char(20),
Estado char(20) not null,
Telefono numeric(10),
primary key (ID)
);

create table Medicina(
ID smallint not null auto_increment,
Nombre char(30) not null,
Descripcion char(30),
Via char(20),
Existencia smallint not null,
primary key (ID)
);

create table Residente(
ID smallint not null auto_increment,
Nombre char(30) not null,
Apellido_P char(20) not null,
Apellido_M char(20),
Fecha_Nac date not null,
Genero ENUM('F', 'M'),
Estado_civil enum("soltero", "casado", "divorciado", "separacion en proceso", "viudo", "concubinato"),
primary key (ID)
);

create table Familiar(
ID smallint not null auto_increment,
Nombre char(30) not null,
Apellido_P char(20) not null,
Apellido_M char(20),
Fecha_Nac date not null,
Parentezco char(20) not null,
CalleNo char(35),
Colonia char(20),
CP numeric(5),
Ciudad char(20),
Estado char(20) not null,
Telefono  numeric(10),
ID_Residente smallint not null,
foreign key (ID_Residente)
	references Residente(ID)
    ON UPDATE CASCADE ON DELETE cascade,
primary key (ID)
);

create table Suministro(
Codigo smallint not null auto_increment,
Nombre char(30) not null,
Descripcion char(30),
primary key (Codigo)
);

create table exp_Clinico(
ID_Residente smallint not null,
ID_Medicina smallint not null,
ID_Atencion_Medica smallint not null,
Dosis char(20) not null,
Motivo char(30) not null,
Fecha date not null,
foreign key (ID_Residente)
	references Residente(ID)
    ON UPDATE CASCADE ON DELETE cascade,
foreign key (ID_Medicina)
	references Medicina(ID)
    ON UPDATE CASCADE ON DELETE cascade,
foreign key (ID_Atencion_Medica)
	references Atencion_Medica(ID)
    ON UPDATE CASCADE ON DELETE cascade,
primary key (ID_Atencion_Medica,ID_Residente,ID_Medicina)
);

create table Donacion(
ID smallint not null auto_increment,
Aporte char(25) not null,
Fecha date not null,
Hora time,
ID_Residente smallint,
ID_Benefactor smallint,
foreign key (ID_Residente)
	references Residente(ID)
    ON UPDATE CASCADE on delete cascade,
foreign key (ID_Benefactor)
	references Benefactor(ID)
    ON UPDATE CASCADE on delete cascade,
primary key (ID)
);

create table aparecen_SD(
Codigo_Suministro smallint not null,
ID_Donacion smallint not null,
Cantidad double not null,
foreign key (Codigo_Suministro)
	references Suministro(Codigo)
    ON UPDATE CASCADE ON DELETE cascade,
foreign key (ID_Donacion)
	references Donacion(ID)
    ON UPDATE CASCADE ON DELETE cascade,
primary key (Codigo_Suministro,ID_Donacion)
);

create table aparecen_MD(
ID_Medicamento smallint not null,
ID_Donacion smallint not null,
Cantidad double not null,
foreign key (ID_Medicamento)
	references Medicina(ID)
    ON UPDATE CASCADE ON DELETE cascade,
foreign key (ID_Donacion)
	references Donacion(ID)
    ON UPDATE CASCADE ON DELETE cascade,
primary key (ID_Medicamento,ID_Donacion)
);

create table Empleado(
ID smallint not null auto_increment,
Nombre char(30) not null,
Apellido_P char(20) not null,
Apellido_M char(20),
Fecha_Nac date not null,
CalleNo char(35) not null,
Colonia char(20) not null,
CP numeric(5) not null,
Ciudad char(20),
Estado char(20) not null,
Telefono numeric(10),
Sueldo double not null,
Tipo char(20) not null,
primary key (ID)
);

create table Clase (
ID smallint not null auto_increment,
Descripcion char(30) not null,
Area char(20),
ID_Empleado smallint not null,
foreign key (ID_Empleado)
	references Empleado(ID)
    ON UPDATE CASCADE ON DELETE cascade,
primary key (ID)
);

create table se_encarga(
ID_Empleado smallint not null,
ID_Residente smallint not null,
Fecha date not null,
Horario char(20) not null,
foreign key (ID_Empleado)
	references Empleado(ID)
    ON UPDATE CASCADE ON DELETE cascade,
foreign key (ID_Residente)
	references Residente(ID)
    ON UPDATE CASCADE ON DELETE cascade,
primary key (ID_Empleado, ID_Residente)
);

create table inscrito(
ID_Clase smallint not null,
ID_Residente smallint not null,
Fecha date not null,
Horario char(20) not null,
foreign key (ID_Clase)
	references Clase(ID)
    ON UPDATE CASCADE ON DELETE cascade,
foreign key (ID_Residente)
	references Residente(ID)
    ON UPDATE CASCADE ON DELETE cascade,
primary key (ID_Clase,ID_Residente)
);

#TABLA DE HISTORIAL
create table HistorialRes(
	ID smallint primary key auto_increment,
    fecha date,
    accion varchar(100),
    usuario smallint,
    nombre varchar(50)
);

#para el inventario
create table aux2 (
id smallint,
cantidad smallint
);

#para resultados en los procedimientos almacenados
#promedio de la edad de los residentes
#cantidad en total de cada genero
#auxuliar en contador de inventario
create table aux(
concepto char(20),
cantidad int
);








#LLENADO
insert into Atencion_Medica values("1", "ISSSTE", "Av Universidad #503", "Av. Universidad", "20000", "Ags", "Ags", "SDM020699MAS", "4650146744");
insert into Atencion_Medica values("2", "Centro Hospitalario Ags", "Gral. Emiliano Zapata 521", "Av. Villa", "20000", "Ags", "Ags", "MAM020699MAS", "4499151500");
insert into Atencion_Medica values("3", "Médica Norte", "Blvd. Luis Donaldo Colosio Murrie", "Colosio", "20000", "Ags", "Ags", "AFD020699MAS", "4492513955");
insert into Atencion_Medica values("4", "Hospital MAC Aguascalientes", "República de Perú 102", "Av. Peru", "20000", "Ags", "Ags", "RTM020699MAS", "4499106120");
insert into Atencion_Medica values("5", "Star Médica Aguascalientes", "Av Universidad #503", "Av. Universidad", "20000", "Ags", "Ags", "SMM020699MAS", "4499109900");
insert into Atencion_Medica values("6", "Hospital Hidalgo", "Av Heroico Colegio Militar 801A", "Av. Heroico", "20000", "Ags", "Ags", "HHM020699MAS", "8009002002");

insert into Benefactor values("1", "Walmart", "Av Zacatecas #304A", "Av Zacatecas", "20678", "Ags", "Ags", "4650146744");
insert into Benefactor values("2","Aurrera","Av Miguel de la Madrid","Centro","20920","Jesus Maria","Ags","4498763456");
insert into Benefactor values("3","Soriana","Av Universidad","Bosques","20920","Ags","Ags","4492456865");
insert into Benefactor values("4","Juan Carlos","Madero #340","Centro","20020","Ags","Ags","4498761234");
insert into Benefactor values("5","Superama","Colosio #1090","Campestre","20409","Ags","Ags","4495678923");
insert into Benefactor values("6","Adriana Torres","Siglo XXI #3000","Rodolfo landeros","20978","Ags","Ags","4496597623");

insert into Medicina values("1", "Ibuprofeno 600", "Analgesico", "Oral", "300");
insert into Medicina values("2", "Paracetamol 500", "Analgesico", "Oral", "150");
insert into Medicina values("3", "Diazepam", "Sedante", "Oral", "200");
insert into Medicina values("4", "Insulina", "Droga", "Subcutaneo", "180");
insert into Medicina values("5", "amitriptyline", "Antidepresivo", "Oral", "90");

insert into Residente values("1", "Christopher Eduardo", "Martinez", "Serna", "1999-12-02", "M", "soltero");
insert into Residente values("2", "Clara Maria", "Marin", "Juarez", "1960-10-12", "F", "viudo");
insert into Residente values("3", "Carlos", "Garcia", "Hernandez", "1957-02-26", "M", "casado");
insert into Residente values("4", "Enrique", "Morales", "Torres", "1949-04-20", "M", "soltero");
insert into Residente values("5", "Matilda", "Ventura", "Perez", "1960-03-19", "F", "casado");
insert into Residente values("6", "Natalia Alejandra", "Lopez", "Luna", "1949-09-17", "F", "soltero");
insert into Residente values("7", "Natalia Alejandra", "Lopez", "Luna", "1949-09-17", "F", "soltero");
insert into Residente values("8", "Natalia Alejandra", "Lopez", "Luna", "1949-09-17", "F", "soltero");

insert into Familiar values("1", "Luis David", "Gonzalez", "Flores", "1989-09-03", "primo(a)", "Antares #19A", "Cosmos 3", "20678", "Ags", "Ags", "4650146744", "1");
insert into Familiar values("2","Carla","Herrera","Lopez","1999-05-13","hijo(a)","Agua dulce #111", "Agua clara", "20920", "Jesus Maria", "Ags", "4492376590", "6");
insert into Familiar values("3","Paola","Gonzalez","Ventura","1997-06-04","hijo(a)","Halcon #172", "Ruiseñores", "20923", "Jesus Maria", "Ags", "4499035100", "5");
insert into Familiar values("4","David","Morales","Moran","1950-11-28","primo(a)","Canario #181", "Ruiseñores", "20678", "Ags", "Ags", "4496474289", "4");
insert into Familiar values("5","Gerardo","Garcia","Hernandez","1970-09-09","hermano(a)","Las palmas #166", "La palma", "20910", "Jesus Maria", "Ags", "4497553278", "3");
insert into Familiar values("6","Luis Miguel","Cabrera","Marin","1980-12-31","hijo(a)","Cosio NTE #122", "Centro", "20900", "Ags", "Ags", "4496540909", "2");

insert into Suministro values("1", "Botella agua 1L", "Agua natural");
insert into Suministro values("2", "Jabon", "Limpieza");
insert into Suministro values("3", "Pinol", "Limpieza");
insert into Suministro values("4", "Manzana", "Alimento");
insert into Suministro values("5", "Jugo", "Alimento");
insert into Suministro values("6", "Té de manzanilla", "Alimento");
insert into Suministro values("7", "Monetario", "Monetario");

insert into exp_Clinico values("1", "1", "1", "1-8H", "Dolor muscular", "2020-09-03");
insert into exp_Clinico values("1", "2", "2", "1-8H", "Depresion", "2020-09-03");
insert into exp_Clinico values("2", "1", "4", "1-6H", "Dolor muscular", "2020-09-03");
insert into exp_Clinico values("3", "1", "6", "1-12H", "Dolor muscular", "2020-09-03");
insert into exp_Clinico values("4", "2", "2", "1-6H", "Dolor muscular", "2020-09-03");
insert into exp_Clinico values("4", "1", "2", "1-8H", "Dolor muscular", "2020-09-03");
insert into exp_Clinico values("5", "4", "1", "1-24H", "Diabetes", "2020-09-03");

insert into Donacion (aporte, fecha, hora, ID_Benefactor) values("1000", "2020-09-03", "19:30", "1");
insert into Donacion (aporte, fecha, hora, ID_Residente) values("especie", "2020-11-03", "16:30", "3");
insert into Donacion (aporte, fecha, hora, ID_Benefactor) values("especie", "2020-10-13", "15:00", "4");
insert into Donacion (aporte, fecha, hora, ID_Benefactor) values("especie", "2020-11-23", "19:50", "5");
insert into Donacion (aporte, fecha, hora, ID_Benefactor) values("especie", "2020-11-15", "08:58", "2");
insert into Donacion (aporte, fecha, hora, ID_Residente) values("monetario", "2020-11-09", "14:37", "2");

insert into aparecen_SD values("1", "5", "10");
insert into aparecen_SD values("3", "5", "10");
insert into aparecen_SD values("6", "5", "500");
insert into aparecen_SD values("2", "6", "10");
insert into aparecen_SD values("4", "1", "100");
insert into aparecen_SD values("5", "5", "500");
insert into aparecen_SD values("1", "2", "500");


insert into Empleado (Nombre, Apellido_P, Apellido_M, Fecha_Nac, calleNo, colonia, cp, ciudad, estado, telefono, sueldo, tipo) 
	values("Mariela", "Serna", "Davila", "1989-09-03", "5 de Mayo #19A", "Progreso Sur 3", "20678", "Ags", "Ags", "4650146744", "260", "voluntario");
insert into Empleado (Nombre, Apellido_P, Fecha_Nac, calleNo, colonia, cp, ciudad, estado, telefono, sueldo, tipo) 
	values("Jorge", "Lopez", "1999-08-23", "10 de Mayo #19A", "Progreso Nte", "20678", "Ags", "Ags", "4650146744", "260", "maestro");
insert into Empleado (Nombre, Apellido_P, Fecha_Nac, calleNo, colonia, cp, ciudad, estado, telefono, sueldo, tipo) 
	values("Paola", "Rebeca", "1997-06-04", "Halcon #172", "Ruiseñores", "20923", "Jesus Maria", "Ags", "4499035100", "2600", "Maestro");
insert into Empleado (Nombre, Apellido_P, Fecha_Nac, calleNo, colonia, cp, ciudad, estado, telefono, sueldo, tipo) 
	values("Adriana", "Torres", "1999-05-28", "Siglo XXI #509", "Rodolfo Landeros", "20908", "Ags", "Ags", "4498757674", "5000", "Enfermero");
insert into Empleado (Nombre, Apellido_P, Fecha_Nac, calleNo, colonia, cp, ciudad, estado, telefono, sueldo, tipo) 
	values("Gerardo", "Guevara", "1996-01-19", "Paseo del campestre 331", "Q Campestre", "20912", "Ags", "Ags", "4498970214", "10000", "Maestro");
insert into Empleado (Nombre, Apellido_P, Fecha_Nac, calleNo, colonia, cp, ciudad, estado, telefono, sueldo, tipo) 
	values("Maximiliano", "Garcia", "2000-05-05", "Canario 198", "Rinconada", "20922", "Jesus Maria", "Ags", "4497014646", "0", "Voluntario");
insert into Empleado (Nombre, Apellido_P, Fecha_Nac, calleNo, colonia, cp, ciudad, estado, telefono, sueldo, tipo) 
	values("Maria", "Moran", "1972-11-23", "Guadalupe Victoria #631", "Centro", "20012", "Jesus Maria", "Ags", "4494657890", "0", "Voluntario");

insert into clase values("1", "Historia de Mexico", "Sala 4", "1");
insert into clase values("2", "Bordado", "Sala 1", "2");
insert into clase values("3", "Ajedrez", "Sala 2", "5");
insert into clase values("4", "Lectura y escritura", "Sala 3", "3");
insert into clase values("5", "Manualidades", "Sala 4", "4");

insert into se_encarga values("1", "1", "2020-08-23", "Diario-4pm-8pm");
insert into se_encarga values("3", "2", "2020-08-23", "Diario-4pm-9pm");
insert into se_encarga values("2", "3", "2020-08-23", "Diario-3pm-8pm");
insert into se_encarga values("5", "4", "2020-08-23", "Diario-1pm-8pm");
insert into se_encarga values("1", "3", "2020-08-23", "Diario-11am-8pm");
insert into se_encarga values("1", "4", "2020-08-23", "Diario-7am-1pm");

insert into aparecen_MD values("1", "4", "40");
insert into aparecen_MD values("2", "6", "10");
insert into aparecen_MD values("3", "6", "50");
insert into aparecen_MD values("4", "4", "30");
insert into aparecen_MD values("1", "6", "10");
insert into aparecen_MD values("3", "4", "70");

insert into inscrito values("1", "5", "2020-08-23", "Diario-4pm-8pm");
insert into inscrito values("2", "4", "2020-08-23", "Diario-6pm-8pm");
insert into inscrito values("3", "3", "2020-08-23", "Diario-2pm-4pm");
insert into inscrito values("4", "2", "2020-08-23", "Diario-7pm-8pm");
insert into inscrito values("5", "1", "2020-08-23", "Diario-11am-1pm");
insert into inscrito values("1", "2", "2020-08-23", "Diario-10pm-1pm");
insert into inscrito values("4", "1", "2020-08-23", "Diario-9am-10am");

insert into aux values('promedioEdad', 0);
insert into aux values('cantidadM', 0);
insert into aux values('cantidadF', 0);
insert into aux values('auxCantidad', 0);









#VISTAS
CREATE or replace VIEW Data_AparcenSD  
AS SELECT a.Codigo_Suministro, a.ID_Donacion, a.Cantidad, s.Nombre, d.Aporte 
from aparecen_sd a 
join suministro s on a.Codigo_Suministro = s.Codigo 
join donacion d on d.ID = a.ID_Donacion;

CREATE or replace VIEW DataEmpleado  
AS SELECT ID, concat(Nombre, " ", Apellido_P) as "NombreCompleto"
from empleado;

CREATE or replace VIEW DataResidente 
AS SELECT ID, concat(Nombre, " ", Apellido_P, " ", Apellido_M) as "NombreCompleto"
from residente;

CREATE or replace VIEW Data_SeEncarga  
AS SELECT a.ID_Empleado, dE.NombreCompleto as "FullNameEmpleado", a.ID_Residente, dR.NombreCompleto as "FullNameResidente", a.Fecha, a.Horario
from se_encarga a
join DataEmpleado dE on dE.ID = a.ID_Empleado
join DataResidente dR on dR.ID = a.ID_Residente;

create or replace view Data_Inscrito
as select a.ID_Clase, c.Descripcion, a.ID_Residente, dR.NombreCompleto as "FullNameResidente", a.Fecha, a.Horario
from inscrito a
join Clase c on c.ID = a.ID_Clase
join DataResidente dR on dR.ID = a.ID_Residente;

create or replace view Res_ExpedienteClinico
as select distinct r.ID, dr.NombreCompleto, m.ID as "ID_M", m.Nombre, ec.Dosis, ec.Motivo, am.ID as "ID_AM", am.Nombre as "Responsable", ec.fecha
from residente r
join DataResidente dr on dr.ID = r.ID
join exp_clinico ec on ec.ID_Residente = r.ID
join medicina m on m.ID = ec.ID_Medicina
join atencion_medica am on am.ID = ec.ID_Atencion_Medica
order by r.ID asc;

CREATE or replace VIEW DataFamliar
AS SELECT ID, concat(Nombre, " ", Apellido_P, " ", Apellido_M) as "NombreCompleto", Parentezco, concat(calleNo," ", Colonia, " ", cp) as "Domicilio", telefono, ID_Residente
from familiar;

create or replace view Familiares_Residente
as select r.ID, dr.NombreCompleto, f.ID as "FamiliarID", f.NombreCompleto as "NombreFamiliar", f.Parentezco, f.Domicilio, f.telefono
from residente r
join DataResidente dr on dr.ID = r.ID
join DataFamliar f on f.ID_Residente = r.ID
order by r.ID asc;

create or replace view donaciones
as select d.ID, d.aporte, d.ID_Residente, d.Fecha, d.Hora, r.NombreCompleto, d.ID_Benefactor, b.nombre, s.Codigo as idsum,s.Nombre as "suministro",
asd.Cantidad, m.ID as idmedic, m.Nombre as "medicamento", amd.Cantidad as Cant
from donacion d
left outer join DataResidente r
on r.ID = d.ID_Residente
left outer join benefactor b
on b.ID = d.ID_Benefactor 
left outer join aparecen_sd asd
on  asd.ID_Donacion = d.id
left outer join suministro s 
on s.Codigo = asd.Codigo_Suministro
left outer join aparecen_md amd
on  amd.ID_Donacion = d.id
left outer join medicina m 
on m.ID = amd.ID_Medicamento
order by d.ID;

create or replace view listas_clases
as select c.ID as "ID clase", c.Descripcion as "namC", e.ID as "ID Empleado", e.NombreCompleto as "namE", r.ID "ID Residente", r.NombreCompleto as "namR" 
from Clase c
join DataEmpleado e on c.ID_Empleado=e.ID 
join inscrito i on c.ID=i.ID_Clase 
join DataResidente r on i.ID_Residente=r.ID;

create or replace view InventarioSum
as select s.Nombre,s.Descripcion, exis.id,exis.cantidad 
from Suministro s 
join aux2 exis on s.codigo=exis.id;

create or replace view EdadResidente
as SELECT ID, TIMESTAMPDIFF(YEAR,Fecha_Nac,CURDATE()) AS edad
FROM Residente;
     
create or replace view lastIDDonacion
as select ID
from Donacion
order by ID desc
limit 1;









#triggers
#Control de existencia en Medicina, siempre en positivo.
delimiter //
CREATE TRIGGER TR_checkInsert_Exis BEFORE insert ON Medicina
 FOR EACH ROW
BEGIN
  IF NEW.Existencia < 0 THEN
        SET NEW.Existencia = 0;
  END IF;
 END;//
delimiter ;
delimiter //

CREATE TRIGGER TR_checkUpdate_Exis BEFORE update ON Medicina
 FOR EACH ROW
BEGIN
  IF NEW.Existencia < 0 THEN
        SET NEW.Existencia = 0;
  END IF;
 END;//
delimiter ;

#control de cantidad en los articulos qua aparecen en las donaciones, siempre positivo y nunca 0
#Suministro en donacion, tabla aparecen_sd
delimiter //
CREATE TRIGGER TR_checkInsert_SD BEFORE insert ON aparecen_sd
 FOR EACH ROW
BEGIN
  IF NEW.Cantidad <= 0 THEN
        SET NEW.Cantidad = 1;
  END IF;
 END;//
delimiter ;
delimiter //
CREATE TRIGGER TR_chekUpdate_SD BEFORE update ON aparecen_sd
 FOR EACH ROW
BEGIN
  IF NEW.Cantidad <= 0 THEN
        SET NEW.Cantidad = 1;
  END IF;
 END;//
delimiter ;
#Medicina en donacion, tabla aparecen_md
delimiter //
CREATE TRIGGER TR_checkInsert_MD BEFORE insert ON aparecen_md
 FOR EACH ROW
BEGIN
  IF NEW.Cantidad <= 0 THEN
        SET NEW.Cantidad = 1;
  END IF;
 END;//
delimiter ;

delimiter //
CREATE TRIGGER TR_chekUpdate_MD BEFORE update ON aparecen_md
 FOR EACH ROW
BEGIN
  IF NEW.Cantidad <= 0 THEN
        SET NEW.Cantidad = 1;
  END IF;
 END;//
delimiter ;

#Verificicar que siempre sean mayusculas
DELIMITER //
create trigger verifRFC before insert on atencion_medica
for each row
begin
	 set new.RFC=upper(new.RFC);
end// 
DELIMITER ;

DELIMITER //
create trigger Historial_Res before delete on residente 
for each row
begin
	 insert into HistorialRes(fecha,accion,usuario,nombre) values(curdate(),'eliminacion',old.ID,concat(old.Nombre," ",old.Apellido_P," ",old.Apellido_M));
end// 
DELIMITER ;











#CURSORES
delimiter //
CREATE PROCEDURE promEdad () 
BEGIN
    declare suma int;
	declare _edad int;
    declare i int;
    declare noRegistro int default 0;
    
    declare cursor1 cursor for select edad from EdadResidente;
    declare continue handler for not found set noRegistro = 1;

	set suma=0;
    set i=1;
    
    open cursor1;
	loop1: LOOP
		fetch cursor1 into _edad;
        set suma = suma + _edad;
        set i = i+1;
        IF (noRegistro = 1) THEN
			LEAVE loop1;
		END IF;
	end loop;
    update aux set cantidad=(suma/i) WHERE concepto='promedioEdad';
    select * from aux WHERE concepto='promedioEdad';
    close cursor1;
END //

#contador de mujeres y hombres
delimiter //
CREATE PROCEDURE Generos () 
BEGIN
	declare f int;
    declare m int;
    declare noRegistro int default 0;
    declare _Genero char(1);
    declare cursor1 cursor for select Genero from Residente;
    declare continue handler for not found set noRegistro = 1;
	
	set f=0;
    set m=0;
    
    open cursor1;
	loop1: LOOP
		fetch cursor1 into _Genero;  
        IF (noRegistro = 1) THEN
			LEAVE loop1;
		END IF;
		IF (_Genero = 'M') then
			set m = m+1;
        elseif (_Genero = 'F') then
			set f = f+1;
        END IF;
	end loop;
    update aux set cantidad=m where concepto='cantidadM';
    update aux set cantidad=f where concepto='cantidadF';
    close cursor1;
END //

#usado para aumnentar la existencia de las medicinas
delimiter //
CREATE PROCEDURE actualizarMedic (in idM smallint, in cantidad smallint) 
BEGIN
	declare _id smallint;
    declare _existencia smallint;
    declare noRegistro int default 0;

    declare cursor1 cursor for select ID, Existencia from medicina;
    declare continue handler for not found set noRegistro = 1;
    
    open cursor1;
	loop1: LOOP
		fetch cursor1 into _id, _existencia;  
		IF (idM = _id) then
			update medicina set Existencia=cantidad+_existencia where ID=idM;
        END IF;
        IF (noRegistro = 1) THEN
			LEAVE loop1;
		END IF;
	end loop;
    close cursor1;
END //

#usado en solicitar medicamneto
delimiter //
CREATE PROCEDURE restarMedicina (in idM smallint, in cantidad smallint) 
BEGIN
	declare _id smallint;
    declare _existencia smallint;
    declare noRegistro int default 0;

    declare cursor1 cursor for select ID, Existencia from medicina;
    declare continue handler for not found set noRegistro = 1;
    
    open cursor1;
	loop1: LOOP
		fetch cursor1 into _id, _existencia;  
		IF (idM = _id) then
			update medicina set Existencia=_existencia-cantidad where ID=idM;
        END IF;
        IF (noRegistro = 1) THEN
			LEAVE loop1;
		END IF;
	end loop;
    close cursor1;
END //

#inventario de suministros
SET @total := 0;
SELECT @total;

#contador por cantidad en particular
delimiter //
CREATE PROCEDURE cuentaCant (in codSumi smallint) 
BEGIN
	declare _Codigo_Suministro int;
    declare _Cantidad int;
    declare total int;
    declare noRegistro int default 0;
    
    declare cursor1 cursor for select Codigo_Suministro, Cantidad from aparecen_sd;
    declare continue handler for not found set noRegistro = 1;
	
    set total = 0;
        
    open cursor1;
	loop1: LOOP
		fetch cursor1 into _Codigo_Suministro, _Cantidad; 
          IF (noRegistro = 1) THEN
			LEAVE loop1;
		END IF;
         if(_Codigo_Suministro = codSumi) THEN
			set total = total + _Cantidad;
        END IF;
	end loop;
    update aux set cantidad=total where concepto='auxCantidad';
    close cursor1;
END //


#contador en general
delimiter //
CREATE PROCEDURE cantidadS () 
BEGIN

	declare _Codigo_Suministro smallint;
    declare noRegistro int default 0;
     
    declare cursor1 cursor for select Codigo from suministro;
    declare continue handler for not found set noRegistro = 1;
	
    open cursor1;
    truncate aux2;
	loop1: LOOP
    
        IF (noRegistro = 1) THEN
			LEAVE loop1;
		END IF;
		fetch cursor1 into _Codigo_Suministro; 
        call cuentaCant(_Codigo_Suministro);
		SELECT cantidad INTO @total from aux where concepto = 'auxCantidad';
		insert into aux2 (id, cantidad) values(_Codigo_Suministro,@total);
        IF (noRegistro = 1) THEN
			LEAVE loop1;
		END IF;
	end loop;
    close cursor1;
END //
call promEdad();
call generos();
call cantidadS();
