<?php
//establecer conexion

try{
	$dwes = new PDO("mysql:host=localhost;dbname=concesionario", "prueba", "prueba");
	$dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "Error: ",$e -> getMessage(),"<br />";
	die();

}
try{

	//transaccion
	$dwes->beginTransaction();
	
	$dwes->exec("INSERT INTO tipo (cod, nombre) VALUES('ELEC', 'electrico')");
	echo "primera";
	
	$dwes->exec("INSERT INTO familia VALUES('ELEC', 'bajo consumo')");
	echo "segunda";
	$dwes->commit();
	echo "insertado";
	}
catch (Exception $e) {
	$dwes->rollBack();
	echo "deshacemos operaciones";
	echo "Fallo: " . $e->getMessage();
}

//cerrar conexion
$dwes = null;
?>