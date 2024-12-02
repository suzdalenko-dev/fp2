<?php
    $error = false;
    $host = "localhost";
    $db = "tarea3";
    $user = "gestor";
    $pass = "secreto";
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    try {
        $conexion = new PDO($dsn, $user, $pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        $mensaje = $ex->getMessage();
        $error = true;
    }
?>