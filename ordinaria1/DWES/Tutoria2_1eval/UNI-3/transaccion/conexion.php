<?php
//establecer conexion
$servidor = "localhost";
$db = "proyecto";
$usuario = "gestor";
$pass = "secreto";

	try
	{    
		$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); 
		$dwes = new PDO("mysql:host=$servidor;dbname=$db", $usuario, $pass, $opciones);
		$dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch(PDOException $e) {
        $mensaje = $e->getMessage();
        echo "ERROR DE CONEXIÓN CON LA BASE DE DATOS</br>";
        echo $mensaje;
		exit();
    }
	
?>