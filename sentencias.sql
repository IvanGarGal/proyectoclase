CREATE TABLE cds (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(40) NOT NULL,
  canciones varchar(100) NOT NULL,
  existencias int(11) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE libros (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(40) NOT NULL,
  descripcion varchar(40) NOT NULL,
  existencias int(11) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE peliculas (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(40) NOT NULL,
  genero varchar(40) NOT NULL,
  sinopsis varchar(100) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE usuarios (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(40) NOT NULL,
  password varchar(200) NOT NULL,
  email varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
);