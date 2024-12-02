<?php
require "conexion.php";

try{
	//transaccion
	$dwes->beginTransaction();
	
	$dwes->exec("INSERT INTO familias (cod, nombre) VALUES('ELEC2', 'electrico')");
	echo "primera"."<br>";

	$dwes->exec("INSERT INTO familias  VALUES('EEEE', 'bajo consumo')");
	echo "segunda"."<br>";
	$dwes->commit();
	echo "insertado"."<br>";
	}
catch (PDOException $e) {
	$dwes->rollBack();
	echo "deshacemos operaciones";
	echo "Fallo: " . $e->getMessage();
}

//cerrar conexion
$dwes = null;
?>