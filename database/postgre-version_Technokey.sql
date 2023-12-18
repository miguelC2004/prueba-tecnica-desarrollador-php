-- Creación de la base de datos
CREATE DATABASE technokey_airlines;

-- Cambio al contexto de la base de datos
\c technokey_airlines;

-- Creación de la tabla `aeropuertos`
CREATE TABLE aeropuertos (
  id serial PRIMARY KEY,
  codigo varchar(3) NOT NULL,
  nombre varchar(255) NOT NULL,
  ciudad varchar(255) NOT NULL
);

-- Inserción de datos en la tabla `aeropuertos`
INSERT INTO aeropuertos (codigo, nombre, ciudad) VALUES
('BOG', 'Aeropuerto El Dorado', 'Bogotá'),
('MDE', 'Aeropuerto José María Córdova', 'Medellín'),
('CTG', 'Aeropuerto Rafael Núñez', 'Cartagena'),
('PEI', 'Aeropuerto Matecaña', 'Pereira');

-- Creación de la tabla `mensajes_contacto`
CREATE TABLE mensajes_contacto (
  id serial PRIMARY KEY,
  nombre varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  mensaje text NOT NULL,
  fecha_envio timestamp NOT NULL DEFAULT current_timestamp()
);

-- Creación de la tabla `preferencias_destino`
CREATE TABLE preferencias_destino (
  id serial PRIMARY KEY,
  usuario_id int NOT NULL,
  destino_id int NOT NULL,
  CONSTRAINT fk_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
  CONSTRAINT fk_destino FOREIGN KEY (destino_id) REFERENCES aeropuertos (id)
);

-- Inserción de datos en la tabla `preferencias_destino`
INSERT INTO preferencias_destino (usuario_id, destino_id) VALUES
(3, 2);

-- Creación de la tabla `rutas`
CREATE TABLE rutas (
  id serial PRIMARY KEY,
  origen_id int NOT NULL,
  destino_id int NOT NULL,
  distancia_km int NOT NULL,
  duracion_horas int NOT NULL,
  CONSTRAINT fk_origen FOREIGN KEY (origen_id) REFERENCES aeropuertos (id),
  CONSTRAINT fk_destino FOREIGN KEY (destino_id) REFERENCES aeropuertos (id)
);

-- Inserción de datos en la tabla `rutas`
INSERT INTO rutas (origen_id, destino_id, distancia_km, duracion_horas) VALUES
(1, 2, 260, 1),
(1, 3, 660, 2),
(2, 3, 550, 2);

-- Creación de la tabla `usuarios`
CREATE TABLE usuarios (
  id serial PRIMARY KEY,
  nombre varchar(255) NOT NULL,
  correo varchar(255) NOT NULL,
  contrasena varchar(255) NOT NULL,
  rol varchar(10) NOT NULL DEFAULT 'usuario'
);

-- Inserción de datos en la tabla `usuarios`
INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES
('Admin', 'prueba@technokeyairlines.com', 'Qazplm123*', 'admin'),
('user', 'user@technokeyairlines.com', 'Qazplm123*', 'usuario'),
('miguel', 'miancaza18004@gmail.com', '12345', 'usuario');

-- Creación de la tabla `vuelos_diarios`
CREATE TABLE vuelos_diarios (
  id serial PRIMARY KEY,
  ruta_id int NOT NULL,
  fecha date NOT NULL,
  hora_salida time NOT NULL,
  plazas_disponibles int NOT NULL,
  precio numeric(10,2) NOT NULL,
  CONSTRAINT fk_ruta FOREIGN KEY (ruta_id) REFERENCES rutas (id)
);

-- Inserción de datos en la tabla `vuelos_diarios`
INSERT INTO vuelos_diarios (ruta_id, fecha, hora_salida, plazas_disponibles, precio) VALUES
(1, '2023-12-19', '08:00:00', 150, '150.00'),
(2, '2023-12-20', '10:30:00', 120, '200.00'),
(3, '2023-12-21', '14:15:00', 100, '180.00');
