DROP DATABASE IF EXISTS boleteria;
CREATE DATABASE IF NOT EXISTS boleteria;
USE boleteria;

DROP TABLE IF EXISTS rol;
CREATE TABLE IF NOT EXISTS rol (
    id_rol int NOT NULL UNIQUE,    
    nombre varchar(50) NOT NULL UNIQUE,   
    PRIMARY KEY(id_rol)
);

DROP TABLE IF EXISTS genero;
CREATE TABLE IF NOT EXISTS genero (
    id_genero int NOT NULL UNIQUE,    
    nombre varchar(50) NOT NULL UNIQUE,   
    PRIMARY KEY(id_genero)
);

ALTER TABLE `genero`
  MODIFY `id_genero` int NOT NULL AUTO_INCREMENT;

DROP TABLE IF EXISTS pelicula;
CREATE TABLE IF NOT EXISTS pelicula (
    id_pelicula int NOT NULL UNIQUE,    
    titulo varchar(50) NOT NULL,
    imagen varchar(500),
    id_genero varchar(50),
    descripcion text,
    director varchar(50),
    calificacion varchar(50),    
    duracion int(5),
    PRIMARY KEY(id_pelicula)
    FOREIGN KEY(id_genero) REFERENCES genero(id_genero)
);
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` int NOT NULL AUTO_INCREMENT;

DROP TABLE IF EXISTS sala;
CREATE TABLE IF NOT EXISTS sala (
    id_sala int NOT NULL UNIQUE,
    nombre varchar(50),    
    tipo varchar(50) NOT NULL,
    num_asientos int NOT NULL,
    PRIMARY KEY(id_sala)
);
  ALTER TABLE `sala`
  MODIFY `id_sala` int NOT NULL AUTO_INCREMENT;

DROP TABLE IF EXISTS usuario;
CREATE TABLE IF NOT EXISTS usuario (
    id_usuario int NOT NULL UNIQUE,
    rol_id int,
    email varchar(50) NOT NULL UNIQUE,
    pass varchar(50) NOT NULL,
    nombre varchar(50),
    apellido varchar(50),
    telefono bigint(11),
    PRIMARY KEY(id_usuario),
    FOREIGN KEY(rol_id) REFERENCES rol(id_rol)
    
);
  ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT;



DROP TABLE IF EXISTS estreno;
CREATE TABLE IF NOT EXISTS estreno (
    id_estreno int NOT NULL UNIQUE,
    id_pelicula int,        
    fecha date NOT NULL,
    PRIMARY KEY(id_estreno),
    FOREIGN KEY(id_pelicula) REFERENCES pelicula(id_pelicula)
);


  ALTER TABLE `estreno`
  MODIFY `id_estreno` int NOT NULL AUTO_INCREMENT;

DROP TABLE IF EXISTS cartelera;
CREATE TABLE IF NOT EXISTS cartelera (
    id_cartelera int NOT NULL UNIQUE,
    id_pelicula int, 
    id_sala int,
    idioma varchar(50),
    dia date NOT NULL,
    horario time NOT NULL,
    PRIMARY KEY(id_cartelera),
    FOREIGN KEY(id_pelicula) REFERENCES pelicula(id_pelicula)
);
  ALTER TABLE `cartelera`
  MODIFY `id_cartelera` int NOT NULL AUTO_INCREMENT;

DROP TABLE IF EXISTS butaca;
CREATE TABLE IF NOT EXISTS butaca (
    id_butaca bigint NOT NULL UNIQUE,
    id_cartelera int,
    nombre varchar(50),        
    disponible boolean DEFAULT 1,
    PRIMARY KEY(id_butaca)
);

DROP TABLE IF EXISTS entrada;
CREATE TABLE IF NOT EXISTS entrada (
    id_entrada int NOT NULL UNIQUE,    
    id_cartelera int,
    id_usuario int,       
    butaca varchar(50),    
    PRIMARY KEY(id_entrada),
    FOREIGN KEY(id_cartelera) REFERENCES cartelera(id_cartelera),
    FOREIGN KEY(id_usuario) REFERENCES usuario(id_usuario)
);

  ALTER TABLE `entrada`
  MODIFY `id_entrada` int NOT NULL AUTO_INCREMENT;

DROP TABLE IF EXISTS log;
CREATE TABLE IF NOT EXISTS log (
    id_log INT NOT NULL AUTO_INCREMENT,    
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    accion VARCHAR(255) NOT NULL,
    tabla VARCHAR(255) NOT NULL,
    PRIMARY KEY(id_log)
);

--------------------- PROCEDURE -----------------------------------------------

DELIMITER $$
CREATE PROCEDURE `test`(IN `accion` VARCHAR(255), IN `tabla` VARCHAR(255))
BEGIN    
    INSERT INTO log (fecha, accion, tabla) VALUES (NOW(), accion, tabla);
END$$  
DELIMITER ;

--------------------- TRIGGETS -----------------------------------------------

DELIMITER $$

CREATE TRIGGER `Eliminar_butacas` BEFORE DELETE ON `cartelera`
FOR EACH ROW
BEGIN
    DELETE FROM butaca WHERE id_cartelera = OLD.id_cartelera;
    DELETE FROM entrada WHERE id_cartelera = OLD.id_cartelera;
    CALL generar_log('DELETE','cartelera');
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `log_update_cartelera` AFTER UPDATE ON `cartelera`
FOR EACH ROW
BEGIN    
    CALL generar_log('UPDATE','cartelera');
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `log_insert_cartelera` AFTER INSERT ON `cartelera`
FOR EACH ROW
BEGIN    
    CALL generar_log('INSERT','cartelera');
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `log_insert_entrada` AFTER INSERT ON `entrada`
FOR EACH ROW
BEGIN   
    CALL generar_log('INSERT','entrada');
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `log_insert_estreno` AFTER INSERT ON `estreno`
FOR EACH ROW
BEGIN    
    CALL generar_log('INSERT','estreno');
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `log_update_estreno` AFTER UPDATE ON `estreno`
FOR EACH ROW
BEGIN   
    CALL generar_log('UPDATE','estreno');
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `log_delete_estreno` AFTER DELETE ON `estreno`
FOR EACH ROW
BEGIN    
    CALL generar_log('DELETE','estreno');
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `log_delete_pelicula` AFTER DELETE ON `pelicula`
FOR EACH ROW
BEGIN    
    CALL generar_log('DELETE','pelicula');
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `log_update_pelicula` AFTER UPDATE ON `pelicula`
FOR EACH ROW
BEGIN   
    CALL generar_log('UPDATE','pelicula');
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `log_insert_pelicula` AFTER INSERT ON `pelicula`
FOR EACH ROW
BEGIN   
    CALL generar_log('INSERT','pelicula');
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `log_delete_sala` AFTER DELETE ON `sala`
FOR EACH ROW
BEGIN    
    CALL generar_log('DELETE','sala');
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `log_update_sala` AFTER UPDATE ON `sala`
FOR EACH ROW
BEGIN    
    CALL generar_log('UPDATE','sala');
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `log_insert_sala` AFTER INSERT ON `sala`
FOR EACH ROW
BEGIN    
    CALL generar_log('INSERT','sala');
END$$

DELIMITER ;



