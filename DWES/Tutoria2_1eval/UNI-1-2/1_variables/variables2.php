<?php
$a = $b = "3.1416"; // asignamos a las dos variables la misma cadena de texto
settype($b, "float"); // y cambiamos $b a tipo float

print "\$a vale $a y es de tipo ".gettype($a);
print "<br />";
print "\$b vale $b y es de tipo ".gettype($b);

// funciones de fecha
$hoy = getdate();
print_r($hoy);
print "<br />";
// mostrar el nombre del mes
print $hoy['month'];
print "<br />";

// variables superglobales
echo $_SERVER['SERVER_NAME']."<br>"; 
echo $_SERVER['PHP_SELF']; 
?>
