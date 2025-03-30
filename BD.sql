-- Cambiar el método de autenticación del usuario (si es necesario)
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Pa$$w0rd';


-- Eliminar base de datos si ya existe y crear una nueva
DROP DATABASE IF EXISTS CafeteriaDB;
CREATE DATABASE CafeteriaDB;

-- Usar la base de datos recién creada
USE CafeteriaDB;

-- Crear tabla de productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    imagen VARCHAR(255) NOT NULL
);

-- Insertar productos (ejemplo para algunas comidas, bebidas y postres)
INSERT INTO productos (nombre, precio, imagen) VALUES
('Sándwich de pollo', 120.00, 'imgs/sandwich.jpg'),
('Tostada de aguacate', 95.00, 'imgs/tostada.jpg'),
('Ensalada César', 150.00, 'imgs/ensalada_cesar.jpg'),
('Café latte', 45.00, 'imgs/latte.jpg'),
('Brownie de chocolate', 70.00, 'imgs/postre2.webp');

-- Crear tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('administrador', 'usuario') DEFAULT 'usuario'
);

-- Insertar un administrador con nombre de usuario "admin" y contraseña "admin123"
INSERT INTO usuarios (nombre, apellido, email, username, password, role) 
VALUES ('Admin', 'Sistema', 'admin@example.com', 'admin', 'admin123', 'administrador');

-- Insertar un cliente con nombre de usuario "cliente" y contraseña "cliente123"
INSERT INTO usuarios (nombre, apellido, email, username, password, role) 
VALUES ('Juan', 'Pérez', 'juan@example.com', 'juanperez', 'cliente123', 'usuario');

-- Crear tabla de pedidos
CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Crear tabla de productos del pedido (relación muchos a muchos entre pedidos y productos)
CREATE TABLE IF NOT EXISTS pedido_productos (
    pedido_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT DEFAULT 1,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- Crear tabla de información de la tienda
CREATE TABLE IF NOT EXISTS informacion_tienda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    telefono VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    ubicacion_mapa TEXT,
    lunes_hora VARCHAR(50),
    martes_hora VARCHAR(50),
    miercoles_hora VARCHAR(50),
    jueves_hora VARCHAR(50),
    viernes_hora VARCHAR(50),
    sabado_hora VARCHAR(50),
    domingo_hora VARCHAR(50)
);

-- Insertar información de la tienda
INSERT INTO informacion_tienda (nombre, direccion, telefono, email, ubicacion_mapa, lunes_hora, martes_hora, miercoles_hora, jueves_hora, viernes_hora, sabado_hora, domingo_hora)
VALUES
('Cafetería', 
 'Avenida de la Belleza, 123, Ciudad Bella', 
 '+34 123 456 789', 
 'contacto@bellezanatural.com', 
 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509184!2d144.95373531531865!3d-37.81627997975186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f123f97%3A0x5045675218cd1c0!2sAvenida%20de%20la%20Belleza%2C%20123%2C%20Ciudad%20Bella!5e0!3m2!1ses!2ses!4v1617984000000!5m2!1ses!2ses',
 '10:00 - 20:00', '10:00 - 20:00', '10:00 - 20:00', '10:00 - 20:00', '10:00 - 21:00', '11:00 - 21:00', 'Cerrado');

-- Consultar todas las reservas
CREATE TABLE IF NOT EXISTS reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL UNIQUE
);

SELECT * FROM reservas;
-- Consultar información de la tienda
SELECT * FROM informacion_tienda;

-- Consultar productos
SELECT * FROM productos;

-- Consultar usuarios
SELECT * FROM usuarios;




