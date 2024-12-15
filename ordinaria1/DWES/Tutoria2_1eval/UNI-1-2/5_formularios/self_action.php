<?php
if(isset($_POST['enviar'])) 
{ 
    $name = $_POST['nombre'];
    echo "Formulario enviado. El nombre introducido es: <b> $name </b>";
    echo "<br>Puede volver a introducir nuevos valores.";
	echo "<br>";
	echo $_SERVER['PHP_SELF'];
}
?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>"   method="post">
   <input type="text" name="nombre"><br>
   <input type="submit" name="enviar" value="Enviar formulario"><br>
</form>