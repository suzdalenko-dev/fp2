<?php

class Libro {
    public function getBooks(){
        $pdo = Conexion::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM libros");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function addBook($title, $author, $gender, $date_publication, $isbn, $page_number, $book_size){
        $pdo = Conexion::getInstance()->getConnection();
        $stmt = $pdo->prepare("INSERT INTO 
                                libros (titulo, autor, genero, isbn, numero_paginas, tamano_libro, fecha_publicacion) 
                                VALUES (:titulo, :autor, :genero, :isbn, :numero_paginas, :tamano_libro, :fecha_publicacion)");
        $stmt->bindParam(':titulo', $title);
        $stmt->bindParam(':autor', $author);
        $stmt->bindParam(':genero', $gender);
        $stmt->bindParam(':isbn', $isbn);
        $stmt->bindParam(':numero_paginas', $page_number);
        $stmt->bindParam(':tamano_libro', $book_size);
        $stmt->bindParam(':fecha_publicacion', $date_publication);
        if ($stmt->execute()) {
            return "Libro creado!";
        } else {
            return "Error al crear libro";
        }
    }
}