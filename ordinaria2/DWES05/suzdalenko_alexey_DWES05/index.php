<?php
require 'src/includer.php';

if(!user_is_logged_in()) {
    /* si el usuario no esta logeado */
    die('El usuario NO esta logeado');
}

$db    = Conexion::getInstance()->getConnection();
$sql   = "SELECT * FROM libros";
$stmt  = $db->prepare($sql);
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
 

if(count($books) == 0) {
    # no hay libros en la base de datos
    header('Location: instalacion.php');
} else {
    # hay libros en la base de datos
    header('Location: libros.php');
}


