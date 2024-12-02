<?php
   if(isset($_POST["editar"])){
      $producto=$_POST['cod'];
   }
   require "conexion.php";
   
   global $producto;

   if(!$error){
      $sql3=$conexion->prepare("SELECT id, nombre, nombre_corto, descripcion, pvp from productos where id=$producto");
   try{
      $sql3->execute();
   }catch(PDOException $ex){
      $error= true; 
      $mensaje = $ex->getMessage();
      $conexion=null;
   }

      while($opcion3 = $sql3->fetch(PDO::FETCH_OBJ)){

		  $idProducto=$opcion3->id;
		  $nombreProducto=$opcion3->nombre;
		  $nombre_CortoProducto=$opcion3->nombre_corto;
		  $descripcionProducto=$opcion3->descripcion;
		  $pvpProducto=$opcion3->pvp;

      }
      $conexion=null;
   } 

   //Acción cancelar
   if(isset($_POST['cancelar'])){

      $nombre_CortoProducto=$_POST['nCorto'];
         $nombreProducto=$_POST['nombre'];
         $descripcionProducto=$_POST['descripcion'];
         $pvpProducto=$_POST['pvp'];
         $idProducto=$_POST['id'];

      echo "<h2>Cancelando......</h2>";
      echo "<script>setTimeout(\"location.href = 'tienda.php';\",2000);</script>";
   
   }

   //Acción actualizar
   if(isset($_POST['actualizar'])){

      $nombre_CortoProducto=$_POST['nCorto'];
      $nombreProducto=$_POST['nombre'];
      $descripcionProducto=$_POST['descripcion'];
      $pvpProducto=$_POST['pvp'];
      $idProducto=$_POST['id'];
      $productoString="".$idProducto;
      $dia=date('Y-m-d');

      require "conexion.php";
      try {  
         $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $conexion->beginTransaction();
         $conexion->exec("UPDATE productos set nombre_corto='{$nombre_CortoProducto}', nombre='{$nombreProducto}', descripcion='{$descripcionProducto}', pvp='{$pvpProducto}' where id='{$idProducto}'");
         $conexion->exec("INSERT into log (numero, id_producto, f_cambio) values (null,'$productoString','$dia')");
         $conexion->commit();

            echo"<h2>¡CORRECTO!  Se han actualizado los datos de $nombre_CortoProducto </h2>";
            echo "<script>setTimeout(\"location.href = 'listado.php';\",2500);</script>";

      }catch(Exception $ex){
         $conexion->rollBack();
            echo"<p class='text-danger font-weight-bold'>".$ex->getMessage()."</p>";
      }

   }
         
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tarea 3 edición de productos</title>
      
</head>
<body>
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name=form1>
      <fieldset style="width:500px; background:#9BB5E5" >
         <h2>Edición del producto</h2>
         <p><b>Producto</b></p>
         <label for="nameC"><b>Nombre corto:</b><input type="text" id="nCorto" value="<?php echo $nombre_CortoProducto; ?> " name="nCorto"></label>
         <p><b>Nombre:</b></p>
         <p> <textarea name="nombre" cols="65" rows="3"><?php echo $nombreProducto; ?></textarea></p>
         <p><b>Descripción:</b></p>
         <p><textarea name="descripcion" cols="65" rows="10"><?php echo $descripcionProducto; ?> </textarea></p>
         <label for="pvp"><b>PVP: </b><input type="text" value="<?php echo $pvpProducto; ?>" id="pvp" name="pvp"> </label>
         <input type='hidden' name='id' value='<?php echo $idProducto; ?>'>
         <br></br>
         <input style=background:#F4BBB2 type='submit' value='Actualizar' name='actualizar'/>
         <input style=background:#F4BBB2 type='submit' value='Cancelar' name='cancelar'/>
          
          </fieldset>
         </form> 

         </body>
</html>