<?php
// Definimos un array asociativo con los descuentos
$descuentos = [
    "Estudiante"  => 0.2,
    "Jubilado"    => 0.25,
    "F. Numerosa" => 0.3,
    "Empleado"    => 0.15
];

// Número total de plazas del autobús
$total_asientos = 15;

// Genera la lista desplegable del número de billetes (1-6)
function generarListaBilletes() {
    for ($i = 1; $i <= 6; $i++) {
        echo "<option value='$i'>$i</option>";
    }
}

// Genera los botones de radio dinámicos para los descuentos
function generarBotonesDescuento($descuentos) {
    foreach ($descuentos as $key => $value) {
        echo "<input type='radio' name='descuento' value='$value' required><span>$key </span> ";
    }
}

// Genera los checkboxes para los asientos
function generarCheckboxAsientos($total_asientos) {
    for ($i = 1; $i <= $total_asientos; $i++) {
        echo "<input type='checkbox' name='asiento[]' value='$i'>$i";
    }
}

// Calcula el importe total con los billetes y el descuento
function calcularImporte($num_billetes, $descuento, $precio_base) {
    $importe_total = $num_billetes * $precio_base;
    $importe_con_descuento = $importe_total - ($importe_total * $descuento);
    return $importe_con_descuento;
}

// Procesa los datos del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $num_billetes = $_POST['num_billetes'];
    $descuento = $_POST['descuento'];
    $asientos_seleccionados = $_POST['asiento'];

    // Precio base por billete
    $precio_base = 10;

    // Calcula el importe total
    $importe_total = calcularImporte($num_billetes, $descuento, $precio_base);

    // Mostrar los datos y el cálculo
    echo "<h2>Resumen del viaje:</h2>";
    echo "Origen: $origen<br>";
    echo "Destino: $destino<br>";
    echo "Fecha: $fecha<br>";
    echo "Número de billetes: $num_billetes<br>";
    echo "Asientos seleccionados: " . implode(", ", $asientos_seleccionados) . "<br>";
    echo "Descuento aplicado: " . ($descuento * 100) . "%<br>";
    echo "Importe total a pagar: $importe_total €";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de billetes de autobús</title>
</head>
<body>
    <div style="margin-left: 10%; margin-right: 10%; border: 2px solid blue; ">
       <div style="text-align: center;"><h2>Servicio de compra de billetes on-line</h2></div>
           <form action="viajes.php" method="POST" style="margin:11px;">
               <span>Origen</span>
               <input type="text" id="origen" name="origen" required>
               <span> Destino</span>
               <input type="text" id="destino" name="destino" required>
               <span>Fecha</span>
               <input type="date" id="fecha" name="fecha" required><br><br><br>
               <span>Número de billetes</span>
               <select id="num_billetes" name="num_billetes" style="width: 101px;">
                   <?php generarListaBilletes(); ?>
               </select><br><br>

               <p>Descuento:</p>
               <?php generarBotonesDescuento($descuentos); ?><br>

               <p>Elige los asientos:</p>
               <?php generarCheckboxAsientos($total_asientos); ?><br><br><br>

               <input type="submit" value="Confirmar" style="padding:11px">
           </form>
       </div>
    </div>
</body>
</html>
