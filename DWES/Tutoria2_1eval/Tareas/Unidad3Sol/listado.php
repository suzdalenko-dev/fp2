<?php
    //Función para mostar listado con los datos de la tabla log
    function crearListado(){
        require_once 'conexion.php'; 
        if(!$error){
            $sql3=$conexion->prepare("SELECT numero, id_producto, f_cambio from log");

        try{
            $sql3->execute();
        }catch(PDOException $ex){
            $error= true; 
            $mensaje = $ex->getMessage();
            $conexion=null;
        }   
        while($opcion3 = $sql3->fetch(PDO::FETCH_OBJ)){
            $fecha=new DateTime($opcion3->f_cambio);
            echo "<tr>";
            echo"<td>".$opcion3->numero."</td>";
            echo"<td>".$opcion3->id_producto."</td>";
            echo"<td>".$fecha->format('d/m/Y')."</td>";//conversión del formato fecha a (d/m/Y)
            echo"</tr>";
        }
    }
        $conexion=null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tarea 3 mostrar listado de transacciones</title>
       
</head>
<body align="center">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset style="width:500px; background:#9BB5E5" >
        <h2>Listado de modificaciones</h2>
        <table border="4" cellspacing="1" cellpadding="8" align="center">
                <tr>
                <th>Nº</th>
                <th>Producto</th>
                <th>Fecha modificación</th>
                </tr>

                <?php crearListado(); ?>
        </table>
        <br></br>
        <a align="center" href="tienda.php">Volver al inicio</a> <!--enlace para regresar a la pagina principal-->
    </fieldset> 
</form>
</body>
</html>
