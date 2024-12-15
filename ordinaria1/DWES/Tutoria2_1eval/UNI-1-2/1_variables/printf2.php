<?php
# definamos dos variables numéricas asignandoles valores
$a=53; $b=34;
/* hagamos una suma y escribamos directamente los resultados
utilizando las instrucciones print y echo
con todas sus posibles opciones de sintaxis */
print("La suma de $a + $b es: " . $a . "+" . $b . "=" . ($a+$b)."<br>");
print 'La suma de $a + $b es: ' . $a . "+" . $b . "=" . ($a+$b) ."<BR>";
print ("La suma de $a + $b es: " . $a . "+" . $b . "=" . ($a+$b) ."<BR>");
echo "La suma de $a + $b es: " . $a . "+" . $b . "=" . ($a+$b) ."<BR>";
echo "La suma de $a + $b es: " , $a , "+" , $b . "=" , ($a+$b) ."<BR>";
echo "La suma de $a + $b es: " , $a , "+" , $b , "=" , $a+$b ,"<BR>";
printf ("La suma de $a + $b es: %d + %d = %d  \n" , $a , $b, $a+$b);
echo "<BR>";
printf ("La division de $a / $b e: %d / %d = %f <BR>" , $a , $b, $a/$b) ;
printf ("La division de $a / $b e: %d / %d = %.2f <BR>" , $a , $b, $a/$b) ;
printf ("La division de $a / $b e: %d / %d = %+.2f <BR>" , $a , $b, $a/$b) ;

echo "<BR>";
printf ("(9.95 * 100) = %d <br>", 9.95 * 100);    // no salta de línea con \n
printf ("(9.95 * 100) = %f <br>", (9.95 * 100));

$nombre="juan";$apellido="lopez";$edad=25; 
 printf ("el nombre es %s, el apellido es %s y tiene %d a&ntildeos", $nombre, $apellido, $edad);
 echo "<BR>";
 $mascara="con masca: el nombre es %s, el apellido es %s y tiene %d a&ntildeos";
 printf ($mascara, $nombre, $apellido, $edad);
  echo "<BR>";
 printf("%d se desborda",10023123553.45634663);   // desbordamiento al truncar a entero
 echo "<BR>";
  printf("%d trunca bien",1002.45634663);
 echo "<BR>";
 printf("%f",10023123553.45634663);   // float, es correcto
 echo "<BR>";
 $entero=255;
printf("Valor entero en formato decimal %d <br>",$entero);
printf("Valor entero en formato decimal simple %d <br>",$entero);

?>