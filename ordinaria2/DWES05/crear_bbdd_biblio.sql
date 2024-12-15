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