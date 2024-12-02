<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1 - Tarea DWES02</title>
        <style type="text/css">
            table{text-align: center;}
            th,td{width: 100px; height: 30px;}
        </style>
    </head>
    <body>
        <?php
            //Declaración de constantes para el cálculo de la amortización
            define("PRESTAMO", 58000);        
            define("PORCENTAJE", 7);        
            define("ANIOS", 6);    

            //funcion para realizar los calculos de la amortización
            function amortizacion() {
                /* Definimos las variables static para que solo de inicializen 
                 * la primera vez y las siguientes llamadas guarde el valor.*/
                static $amortizacion = PRESTAMO / ANIOS;
                static $amortizar = PRESTAMO;
                static $amortizado = 0;
                
                //calculamos los valores de la amortización
                $interes = $amortizar * (PORCENTAJE /100);
                $cuota = $amortizacion + $interes;
                $amortizar -= $amortizacion;
                $amortizado += $amortizacion;
                
                // Devolvemos los valores en un array para pintarlos
                return array($cuota, $interes, $amortizacion, $amortizar,$amortizado);
            }
        ?>
        <style>
        table, th, td {
        border: 1px solid black;
        }
        </style>
        <table>
            <thead>
                <tr>
                    <th>Año</th>
                    <th>Cuota anual</th>
                    <th>Intereses</th>
                    <th>Cuota de amortización</th>
                    <th>Capital por amortizar</th>
                    <th>Capital amortizado</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    for ($i = 0; $i <= ANIOS; $i++) { 
                        if ($i === 0) { ?>            
                            <tr>
                                <td><?php echo $i ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?php echo number_format(PRESTAMO, 2, ",", "."). " €" ?></td>
                                <td></td>
                            </tr>
                <?php 
                        } else {
                            //Recogemos el array devuelto por la función en una lista
                            list($cuota, $interes, $amortizacion, $amortizar,$amortizado) = amortizacion(); 
                ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <!-- Empleamos la función number_format() para indicar el nº de decimales,
                                el separador de decimales y el separador de miles -->
                                <td><?php echo number_format($cuota, 2, ",", "."). " €" ?></td>
                                <td><?php echo number_format($interes, 2, ",", "."). " €" ?></td>
                                <td><?php echo number_format($amortizacion, 2, ",", "."). " €" ?></td>
                                <td><?php echo number_format($amortizar, 2, ",", "."). " €" ?></td>
                                <td><?php echo number_format($amortizado, 2, ",", "."). " €" ?></td>
                            </tr>   
                <?php
                        }
                    } 
                ?>
            </tbody>
        </table>

    </body>
</html>

