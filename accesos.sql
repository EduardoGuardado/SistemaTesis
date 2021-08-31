CREATE DATABASE AccesosUsuario;
USE AccesosUsuario;
CREATE TABLE roles
    (
        id_rol INT PRIMARY KEY NOT NULL AUTO_INCREMENT
      , rol    VARCHAR(16)
    )
    ENGINE=INNODB
;

CREATE TABLE usuarios
    (
        id_usuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT
      , nombre     VARCHAR(50)
      , usuario    VARCHAR(35)
      , clave      VARCHAR(45)
      , id_rol     INT
      , FOREIGN KEY (id_rol) REFERENCES roles(id_rol)
    )
    ENGINE=INNODB
;

INSERT INTO roles
    (rol
    )
    values
    ("Director"
    ),
    ("Profesor")
;

INSERT INTO usuarios
    (nombre
      , usuario
      , clave
      , id_rol
    )
    values
    ("Eduardo"
      ,"Ed"
      ,"123456", 2
    ),
    ("Urrutia","Ut","123456",1)
;