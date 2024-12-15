<?php
session_start();
include 'funciones.php';
get_init_sesion();

$usuario_nombre = '';
$sueldo_base    = '';
$dep_clave      = '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES</title>
</head>
<body>
    <div class="wrapper">
        <h6>Empleado Número: <?php html_numero_empleado(); ?></h6>
        <form class="card" method="POST" action="resultado.php">
            <input type="number" value="<?php html_numero_empleado(); ?>" name="user_num" hidden>
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="topInput" value="<?php imp($usuario_nombre);?>">
            <label for="salary">Sueldo Base:</label>
            <input type="text" name="salary" class="topInput" value="<?php imp($sueldo_base);?>">
            <label for="depart">Clave Departamiento:</label>
            <input type="text" name="depart" class="topInputX" value="<?php imp($dep_clave);?>">
            <div class="extras">
                Extras: <?php html_extras(); ?>
            </div>
            <div class="hijos">
                Número de hijos: <?php html_hijos(); ?> 
            </div>
            <input type="submit" value="Calcular" class="action mgtop" name="calcular">
        </form>
        <form class="card mgtop" method="GET">
            <input type="submit" value="Cerrar" class="action" name="cerrar">
        </form>
    </div>

    <style>
        *{
            padding: 0; margin: 0;
            font-family: Consolas, sans-serif;
        }
        body{
            background-color: rgb(233, 233, 233);
        }
        .wrapper{
            width: 80%;
            margin-left: 10%;
            margin-top: 1%;
        }
        h6{
            display: block;
            font-size: 22px;
            margin-bottom: 11px;
        }
        .card{
            display: block;
            border-radius: 3px;
            background-color: white;
            padding: 11px;
            width: 500px;
            
        }
        label{
            display: block;
            margin-top: 11px;
        }
        .topInput{
            height: 40px;
            width: 100%;
            background-color: rgb(234, 244, 255);
            border: none;
        }
        .topInputX{
            height: 40px;
            width: 100%;
            background-color: white;
            border: 1px solid grey;
        }
        .extras{
            margin-top: 22px;
        }
        .hijos{
            margin-top: 44px;
        }
        .mgtop{
            margin-top: 22px;
        }
        .action{
            background-color: rgb(155, 228, 255);
            color: white;
            border: none;
            padding: 11px;
            border-radius: 7px;
        }
    </style>
</body>
</html>


