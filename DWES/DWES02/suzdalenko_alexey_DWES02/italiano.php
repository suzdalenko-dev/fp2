<?php
# Definimos los valores iniciales
$capitalPorAmortizar = 580000; # Capital inicial
$tasaInteres = 7;             # Tasa de interés (7%)
$numeroAnios = 6;             # Número de años

$capitalAmortizado = 0;
# Calculamos la cuota de amortización constante
$cuotaAmortizacion =  $capitalPorAmortizar / $numeroAnios;

// Inicializamos variables
$capitalPendiente = $capitalPorAmortizar;
$tablaAmortizacion = [];

// Generamos la tabla de amortización
for ($anio = 1; $anio <= $numeroAnios; $anio++) {
    // Calculamos los intereses para el año actual
    $intereses = $capitalPendiente * $tasaInteres / 100;
    
    // Calculamos la cuota total (cuota de amortización + intereses)
    $cuotaTotal = $cuotaAmortizacion + $intereses;
    // Calculamos capital amortizado
    $capitalAmortizado += $cuotaAmortizacion;

    // Guardamos los datos en la tabla
    $tablaAmortizacion[] = [
        'Año'                   => $anio,
        'Cuota anual'           => number_format($intereses+$cuotaAmortizacion, 2, ',', ' '),
        'Intereses'             => number_format($intereses, 2, ',', ' '),
        'Cuota de amortizacion' => number_format($cuotaAmortizacion, 2, ',', ' '),
        'Capital por amorizar'  => number_format(max($capitalPendiente - $cuotaAmortizacion, 0), 2, ',', ' '),
        'Capital amorizado'     => number_format($capitalAmortizado, 2, ',', ' '),
    ];

    // Actualizamos el capital pendiente
    $capitalPendiente -= $cuotaAmortizacion;
}

// Presentamos la tabla de amortización
echo "<table border='1' cellpadding='5'>
        <tr>
            <th>Año</th>
            <th>Cuota anual</th>
            <th>Intereses</th>
            <th>Cuota de amorizacíon</th>
            <th>Capital por amorizar</th>
            <th>Capital amortizado</th>
        </tr>
        <tr>
            <td>0</td>
            <td></td>
            <td></td>
            <td></td>
            <td>".number_format($capitalPorAmortizar, 2, ',', ' ')." €</td>
            <td></td>
        </tr>";

foreach ($tablaAmortizacion as $fila) {
    echo "<tr>
            <td>{$fila['Año']}</td>
            <td>{$fila['Cuota anual']} €</td>
            <td>{$fila['Intereses']} €</td>
            <td>{$fila['Cuota de amortizacion']} €</td>
            <td>{$fila['Capital por amorizar']} €</td>
            <td>{$fila['Capital amorizado']} €</td>
        </tr>";
}

echo "</table>";
?>
