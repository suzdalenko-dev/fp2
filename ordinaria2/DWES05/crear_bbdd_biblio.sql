-- Crear base de datos
CREATE DATABASE IF NOT EXISTS biblioteca_digital;

-- Usar la base de datos recién creada
USE biblioteca_digital;

-- Crear tabla libros
CREATE TABLE IF NOT EXISTS libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    genero VARCHAR(100) NOT NULL,
    fecha_publicacion DATE NOT NULL,
    isbn VARCHAR(20) NOT NULL,
    numero_paginas INT,
    tamano_libro INT, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



-- mis scripts
-- mysql
    > CREATE DATABASE TIENDA;
    > SHOW DATABASES;
    > USE TIENDA;

    CREATE TABLE productos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) DEFAULT  NULL
    );

    ALTER TABLE productos ADD COLUMN price DECIMAL(10, 3);
    ALTER TABLE productos ADD COLUMN description VARCHAR(222);
    ALTER TABLE productos MODIFY COLUMN description INT(11);
    ALTER TABLE productos DROP COLUMN description;
    alter table libros add column created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;


    > SHOW TABLES;
    > DESCRIBE productos;

    INSERT INTO productos (nombre, precio, cantidad) VALUES
    ('Laptop', 1200.50, 10),
    ('Mouse', 25.99, 50),
    ('Teclado', 45.75, 30);

    SELECT * FROM productos;

    UPDATE TABLE productos SET price = 1.1 WHERE id = 1;