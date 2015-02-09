
create table platos (
  id tinyint(4) not null primary key auto_increment,
  nombre varchar(200) not null,
  descripcion varchar(400) not null,
  precio decimal(10,2) not null
) engine=innodb charset=utf8 collate=utf8_unicode_ci;

create table fotos (
  id tinyint(5) not null primary key auto_increment,
  idplato tinyint(4) not null,
  nombre varchar(50) not null,
  CONSTRAINT fotos_fk FOREIGN KEY (idplato) REFERENCES platos (id) ON DELETE CASCADE
) engine=innodb charset=utf8 collate=utf8_unicode_ci;

create table usuario( 
  login varchar(20) not null primary key, 
  clave varchar(40) not null, 
  nombre varchar (60) not null, 
  apellidos varchar(60) not null, 
  email varchar(40) not null, 
  fechaalta date not null, 
  isactivo tinyint(1) not null default 0, 
  isroot tinyint(1) not null default 0, 
  rol enum('administrador', 'usuario', 'vendedor') not null default 'usuario', 
  fechalogin datetime 
)  engine=innodb charset=utf8 collate=utf8_unicode_ci