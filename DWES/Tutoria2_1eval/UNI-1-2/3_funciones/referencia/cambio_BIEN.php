<?php
echo "<br>Ejercicio Cambiar valor de 2 variables</br>";

Function cambio_variables(&$valor1,&$valor2){
   
    $aux=$valor1;
    $valor1=$valor2;
    $valor2=$aux;
  
    echo "Este es el valor de \$valor1 en funcion: ",$valor1."<br>";
    echo "Este es el valor de \valor2 en funcion: ",$valor2."<br>";; 
}
    $valor1=3;
    $valor2=12;
 
echo "Este es el valor de \$valor1 INICIAL : ",$valor1,"<br>";
echo "Este es el valor de \$valor2 INICIAL : ",$valor2,"<br>"; 

cambio_variables($valor1, $valor2);

print "</br> ";
echo "Este es el valor de \$valor1 ACTUAL : ",$valor1,"<br>";
echo "Este es el valor de \$valor2 ACTUAL : ",$valor2,"<br>"; 
  
  
?>