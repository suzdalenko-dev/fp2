<?php
session_start();

$color=$_SESSION['color'];
echo" El nombre es ;". $_SESSION['nombre']."<br>";
echo " El color elegido  es ;".$_SESSION['color'];
$fondo="<body style='background-color:$color'>";
echo $fondo;
?>
