<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
</head>
<body>
<?php
    //Decir el numero de digitos que tiene
    function ndigitos($var)
    {
        return strlen($var);
    }

    //Saber si el numero es capicua
    function ncapicua($numero)
    {
        $numeroinver = strrev($numero);
        if ($numero == $numeroinver) {
            $mensaje = "<br> El numero $numero es capicua";
        } else {
            $mensaje = "<br> El numero $numero no es capicua";
        }
        return $mensaje;
    }

    // redondear
    function redondear($var)
    {
        return (int)($var + 0.5);
    }

    //Saber si el numero es primo
    function nprimo($n)
    {
        $primo = true;
        $i = 2;
        while (($i < $n) & ($primo)) {
            if ($n % $i == 0) {
                $primo = false;
            }
            $i++;
        }
        return $primo;
    }

    // -------------------------------- programa principal ---------------------------
    $numero = 112211;
    // numero de dígitos
    echo "<br> El numero de digitos que tiene el numero $numero es " . ndigitos($numero);
    // si es capicua
    echo ncapicua($numero);
    //redondearle
    $numero = 17.678;
    echo "<br> El numero $numero redondeado es: " . redondear($numero);
    // es primo?
    $numero = 13;
    if (nprimo($numero)) {
        echo "<br> Tu numero $numero es primo";
    } else {
        echo "<br> El numero $numero no es primo";
    }

?>
</body>
</html>
