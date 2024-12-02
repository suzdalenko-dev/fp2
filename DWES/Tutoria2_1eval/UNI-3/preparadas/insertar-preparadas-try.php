<?php

include("conexion.php");

$c_articulo=$_POST["c_articulo"];
$seccion=$_POST["seccion"];
$n_art=$_POST["nombre_articulo"];
$precio=$_POST["precio"];
$fecha=$_POST["fecha"];
$importado=$_POST["importado"];
$p_origen=$_POST["p_origen"];


try { 
    
	$sql= "INSERT INTO PRODUCTOS ('CÓDIGOARTÍCULO', 'SECCIÓN', 'NOMBREARTÍCULO', 'PRECIO', 'FECHA', 'IMPORTADO', 'PAÍSDEORIGEN') VALUES (:c_articulo, :seccion, :n_art, :precio, :fecha, :importado, :p_origen)";

    $resultado = $base->prepare($sql); 

    $resultado->execute(array(":c_articulo"=>$c_articulo,
							  ":seccion"=>$seccion,
							  ":n_art"=>$n_art,
							  ":precio"=>$precio, 
							  ":fecha"=>$fecha,
							  ":importado"=>$importado,
							  ":p_origen"=>$p_origen)); 

    echo "Hemos insertado el registro";
    $resultado->closeCursor();
}           
catch(Exception $e){ 
    die ("Error: " . $e->GetMessage() . " En la Linea " .  $e->getline());
}
?>