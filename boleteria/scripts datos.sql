INSERT INTO rol (id_rol, nombre)
VALUES 
(1, 'user'),
(2, 'admin');

INSERT INTO genero (id_genero, nombre)
VALUES 
(1, 'Drama'),
(2, 'Romance'),
(3, 'Ciencia ficción'),
(4, 'Fantasía'),
(5, 'Misterio'),
(6, 'Animación'),
(7, 'Terror'),
(8, 'Accion');

INSERT INTO pelicula (titulo, imagen, id_genero, descripcion, director, calificacion, duracion)
VALUES 
('El Padrino', '/proyecto/img/pad.jpg', 1, 'La historia de la familia Corleone en el mundo de la mafia.', 'Francis Ford Coppola', 'R', 175),
('Titanic', '/proyecto/img/ti.jpg', 2, 'La historia de amor entre Jack y Rose a bordo del Titanic.', 'James Cameron', 'PG-13', 195),
('Avatar', '/proyecto/img/av.jpg', 3, 'La historia de un ex-marine en un planeta alienígena.', 'James Cameron', 'PG-13', 162),
('El Señor de los Anillos: La Comunidad del Anillo', '/proyecto/img/sdla.jpg', 4, 'La primera parte de la trilogía épica de Tolkien.', 'Peter Jackson', 'PG-13', 178),
('El Rey León', '/proyecto/img/rl.jpg', 6, 'La historia del joven león Simba y su camino para reclamar el trono.', 'Roger Allers', 'G', 88),
('Harry Potter y la Piedra Filosofal', '/proyecto/img/hp.jpg', 4, 'La primera película de la saga de Harry Potter.', 'Chris Columbus', 'PG', 152),
('El Código Da Vinci', '/proyecto/img/cdv.jpg', 5, 'Un profesor de simbología investiga un asesinato en el Louvre.', 'Ron Howard', 'PG-13', 149),
('Forrest Gump', '/proyecto/img/fg.jpg', 1, 'La historia de la vida de Forrest Gump, desde su infancia hasta su vida adulta.', 'Robert Zemeckis', 'PG-13', 142),
('Deadpool', '/proyecto/img/deadpool.jpg', 8, 'La historia de la vida de Forrest Gump, desde su infancia hasta su vida adulta.', 'Robert Zemeckis', 'PG-13', 142);

-- Insertar datos en la tabla de salas
INSERT INTO sala (nombre, tipo, num_asientos)
VALUES 
('Sala 1', 'Regular', 40),
('Sala 2', 'VIP', 36),
('Sala 3', 'Regular', 48),
('Sala 4', 'Regular', 56),
('Sala 5', 'VIP', 16),
('Sala 6', 'Regular', 24);

-- Insertar datos en la tabla de usuarios
INSERT INTO usuario (rol_id, email, pass, nombre, apellido, telefono)
VALUES 
(2, 'admin@example.com', 'admin123', 'Admin', 'Admin', 1234567890),
(1, 'usuario1@example.com', 'usuario123', 'Usuario', 'Uno', 987654321),
(1, 'usuario2@example.com', 'usuario456', 'Usuario', 'Dos', 567890123),
(1, 'usuario3@example.com', 'usuario789', 'Usuario', 'Tres', 123456789),
(1, 'usuario4@example.com', 'usuario101112', 'Usuario', 'Cuatro', 987654321),
(2, 'admin2@example.com', 'admin1234', 'Admin', 'Admin', 567890123);

-- Insertar datos en la tabla de estrenos
INSERT INTO estreno (id_pelicula, fecha)
VALUES 
(1, '2024-06-15'),
(3, '2024-07-20'),
(4, '2024-08-10'),
(5, '2024-09-05'),
(6, '2024-10-15'),
(7, '2024-11-20');

