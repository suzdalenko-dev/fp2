<?php

function request_database($pdo, $sql){
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

try {
    $dsn = "mysql:host=localhost;dbname=tarea3;charset=utf8";
    $pdo = new PDO($dsn, "gestor", "secreto");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); die();
}

$sql = "SELECT numero, id_producto, DATE_FORMAT(f_cambio, '%d/%m/%Y') AS fecha 
        FROM log 
        ORDER BY f_cambio ASC";
$rows = request_database($pdo, $sql);

$html = '<table style="width: 80%; margin-left:10%;">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Producto</th>
                    <th>Fecha modificacion</th>
                </tr>
            </thead>
            <tbody>
            ';

foreach($rows as $r){
    $html .= '<tr>
                <td style="text-align:center;">'.$r["numero"].'</td>
                <td style="text-align:center;">'.$r["id_producto"].'</td>
                <td style="text-align:center;">'.$r["fecha"].'</td>
            </tr>';
}
$html .=    '</tbody>
        </table>';

echo '<div style="text-align:center; width:400px; border: 3px solid blue;  " >
        <p><b>Listado de modificaciones</b><p>
        '.$html.'
        <br>
        <a href="http://localhost/tienda.php" style="text-decoration:none;">Volver al inicio</a>
    </div>';
