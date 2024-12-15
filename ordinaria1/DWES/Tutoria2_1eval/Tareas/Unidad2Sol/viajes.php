<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 3</title>
</head>
<body>
    <h3>Servicio de compra de billetes on-line</h3>
    
        <?php
            function PrecioTotal(int $billetes, float $descuento = 0){
                if($descuento == 0){
                    $resultado = 5 * $billetes;
                }
                else{
					$resultado = (5 * $billetes) *(1-$descuento);
                }
                echo $resultado, "€";
            }

            if (isset($_POST['btConfirmar'])) {
                $origen = $_POST["origen"];
                $destino = $_POST["destino"];
                $fecha = $_POST["fecha"];
                $pagoValido = true;

                if (isset($_POST['imputAsientos'])) {
                    $contadorAsientos = count($_POST['imputAsientos']);
                }

                if (isset($_POST['imputBilletes'])) {
                    $billetes = $_POST['imputBilletes'];
                }

                if (isset($_POST['imputDecuentos'])) {
                    $descuento = $_POST['imputDecuentos'];
                }

                if ($contadorAsientos != $billetes) {
                    $pagoValido = false;
                    echo "No se ha seleccionado el mismo número de asientos que el de billetes. </br>";
                }
                if ($pagoValido) {
                        echo "<h3>Información de Compra</h3>";
                        echo "<p>Origen: $origen</p>";
                        echo "<p>Destino: $destino</p>";
                        echo "<p>Fecha: $fecha</p>";
                        echo "<p>Nº Billetes: $billetes, cada billete vale 5€</p>";
                        $descuentoTexto = $descuento * 100;
                        echo "<p>Descuento: $descuentoTexto%</p>";
                        echo "Asientos seleccionados: ";
                        foreach ($_POST['imputAsientos'] as $asiento) {
                            echo $asiento, ",  ";
                        }
                        echo "<br><br>Precio final: ";
                        PrecioTotal($billetes, $descuento);
                }
            }
        ?>
		
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <span>Origen <input type="text" name="origen" size="15" required></span>
        <span>Destino <input type="text" name="destino" size="15" required></span>
        <span>Fecha <input type="date" name="fecha" size="15" required></span>

        <p>Nº Billetes 
            <select name="imputBilletes">
                <?php
                    for ($a = 1; $a<=6; $a++) {
                        echo "<option value='$a'>$a</option>";
                    }
                ?>
            </select>
        </p>

        <span>Descuento</span><br>
        <?php
            $descuentos = array("Estudiante" => 0.2, "Jubilado" => 0.4, "F. Numerosa" => 0.2, "Empleado" => 0.5);

            foreach ($descuentos as $descuento => $porcentaje) {
                echo "<span><input type='radio' name='imputDecuentos' value=$porcentaje> $descuento</span>";
            }
        ?>

        <br><br><span>Elige los asientos</span><br>
        <?php
            for ($a = 1; $a<=15; $a++) {
                echo "<span><input type='checkbox' name='imputAsientos[]' value=$a> $a</span>";
            }
        ?>

        <br><br><button type="submit" name="btConfirmar">Confirmar</button>
	
		
	</form>
</body>
</html>