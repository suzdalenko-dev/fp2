<?php


print("Dados los valores capital, rédito y tiempo define las funciones: </br>
Asigna valores al capital, Rédito o porcentaje al que se invierte y al número de años de la inversión. </br>
Codifica las funciones: </br>
interesSimple: calcula lo que produce con los datos suministrados aplicando la fórmula del interés simple. </br>
interesCompuesto:  calcula lo que produce el capital a interés compuesto. </br>
Indica cuál de los dos métodos es más beneficioso para nosotros. </br>");

function simple($capital,$interes,$tiempo){
    $intereseSimple=$capital*($interes/100)*$tiempo;
    $devolverSimple=$capital+$intereseSimple;
    return $devolverSimple;
    }

function compuesto($capital,$interes,$tiempo){
    $devolverCompuesto=pow((1+$interes/100),$tiempo)*$capital;
    return $devolverCompuesto;
    }

function comparar($simple,$compuesto){
 
   if($compuesto>$simple){
		echo" El interes compuesto es peor si vas a pagar los intereses de un prestamo</br>";
		echo" El interes compuesto es mejor si vas a ponerlo a plazo fijo";
   }else {
		echo" El interes simple es peor si vas a pagar los intereses de un prestamo</br>";
		echo" El interes simple es mejor si vas a ponerlo a plazo fijo";}
    
}

$capital=25000;
$interes=6;
$tiempo=4;
 $devolverSimple=simple($capital,$interes,$tiempo);
 $devolverCompuesto=compuesto($capital,$interes,$tiempo);
echo $devolverSimple."</br>";
echo $devolverCompuesto."</br>";
echo comparar($devolverSimple,$devolverCompuesto);

?>