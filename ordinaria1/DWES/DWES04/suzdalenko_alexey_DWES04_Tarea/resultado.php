<?php
session_start();
include 'funciones.php';

$sueldo_val      = 0;
$extra_val       = 0;
$hijos_val       = 0;
$empresa_val     = 0;
$total_acumulado = 0;

if(isset($_POST['calcular'])){
    $nombre      = $_POST['name'];
    $sueldo_val  = $_POST['salary'];
    $depart      = get_departamento($_POST['depart']);
    $html_extras = get_extras($_POST['extras']);
    $imp_h       = get_importe_hijos($_POST['children']);
    $imp_n       = get_importe_nomina();
    
    save_user_data_in_session($nombre, $sueldo_val, $_POST['extras'], $_POST['children'], $imp_n, $_POST['depart']);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <form class="card" method="GET" action="nomina.php">
            <h6>Resultados de la Nómina</h6>
            <p>Nombre del Empleado <span class="item"><?php imp($nombre);?></span></p>
            <p>Sueldo Base: <span class="item"><?php imp($sueldo_val);?></span></p>
            <p>Departamento: <span class="item"><?php imp($depart);?></span></p>
            <p>Extras: <span class="item"><?php imp($html_extras);?></span></p>
            <p>Importe por Hijos: <span class="item"><?php imp($imp_h);?></span></p>
            <p>Importe Total de la Nómina: <span class="item"><?php imp($imp_n);?></span></p>
            <p>Total Acumulado de la Empresa: <span class="item"><?php imp($total_acumulado);?></span></p>

            <input type="hidden" name="user_id" value="<?php echo $_POST['user_num'] ?? ''; ?>">
            <input type="submit" value="Modificar" class="action mgtop" name="modificar">

            <input type="submit" value="Otro" class="action" name="otro">
        </form>
    </div>
    <style>
        *{
            padding: 0; margin: 0;
            font-family: Consolas, sans-serif; font-weight: 700;
        }
        body{
            background-color: white;
        }
        .card{
            display: block;
            background-color: white;
            padding: 11px;
            width: 500px;
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
        .item{
            font-weight: 222;
        }
        .action{
            display: block;
            background-color: rgb(155, 228, 255);
            color: white;
            border: none;
            padding: 11px;
            border-radius: 7px;
            margin-top: 20px;
        }
    </style>
</body>
</html>