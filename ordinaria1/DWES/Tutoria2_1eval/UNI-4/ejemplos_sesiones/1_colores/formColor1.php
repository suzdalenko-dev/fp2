<?php
session_start();
$color=$_POST['color'];
$nombre=$_POST['nombre'];
$_SESSION['nombre']=$nombre;
$_SESSION['color']=$color;
echo "propagamos valores a la página 3 <br>";
?>
<a href="formColor2.php"> Pagina 3 </a>

