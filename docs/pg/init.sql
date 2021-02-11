create table usuario(
	id_usr SERIAL primary key,
	username varchar(50) UNIQUE NOT NULL,
	password varchar(255) NOT NULL,
	question integer NOT NULL,
	answer varchar(50) NOT NULL
);

create table cuenta(
	id_acc SERIAL primary key,
	id_usr integer NOT NULL,
	account varchar(50) NOT NULL,
	description varchar(255) NOT NULL,
	foreign key(id_usr) references usuario
);

create table transaccion(
	id_trs SERIAL primary key,
	id_usr integer NOT NULL,
	id_acc integer NOT NULL,
	quantity integer NOT NULL,
	datestamp timestamp NOT NULL,
	description varchar(255) NOT NULL,
	foreign key(id_usr) references usuario,
	foreign key(id_acc) references cuenta
);

create view transacciones
as (
	select id_trs,id_usr,id_acc,account,quantity,datestamp,description from (
		select * from transaccion TR
		inner join (
			select id_acc as id_cu,account from cuenta
		) as CU
		on CU.id_cu=TR.id_acc
	) as transacciones
);
