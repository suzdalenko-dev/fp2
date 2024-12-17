<?php 
if (isset($_POST['enviar'])){
	$nombre=$_POST['nombre']; 
	$edad=$_POST['edad'];
	echo $nombre."<br>";
	echo "La edad es:".$edad; 
}
else
{	
?>
<html><body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>"   method="post">
	Edad: <input type="text" name="edad" >
	<br>
	Nombre <input type="text" name="nombre">
	<input type="submit" name="enviar" value="ENVIAR DATOS">
</form>
</body></html>
<?php
}
?>

