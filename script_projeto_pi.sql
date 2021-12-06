create table entregador(
id_entregador int(11) primary key auto_increment,
nome varchar(120) not null,
cpf varchar(14) not null,
bairro varchar(120)
);


create table encomenda(
id_encomenda int(11) primary key auto_increment,
rastreador varchar(120) not null,
cep varchar(120) not null,
bairro varchar(120),
entregador_id int(11),
foreign key(entregador_id) references entregador (id_entregador)
on delete cascade
);


drop table encomenda;
drop table entregador;

select * from encomenda;
select * from entregador;