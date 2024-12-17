<?php

function request_database($pdo, $sql){
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

try {
    $dsn = "mysql:host=localhost;dbname=tarea3;charset=utf8";
    $pdo = new PDO($dsn, "gestor", "secreto");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); die();
}

# busco el listado de todas las tienas que muestro en la opciones 
$html = '';
$selected = '';
$result = request_database($pdo, "SELECT * FROM tiendas");
foreach ($result as $row) { 
    if(isset($_GET["tienda_id"]) && $_GET["tienda_id"] == $row["id"]){ $selected  = 'selected'; }
    $html .= '<option '.$selected.' value="'.$row["id"].'">'.$row["nombre"].'</option>';
    $selected = '';
}


echo '<h2>Tarea: Listado de productos de una tienda</h2>
    <br>
    <form method="GET" action="tienda.php">
        Tienda
        <select name="tienda_id">'.$html.'</select>
        <input type="submit" value="Mostrar productos">
    </form>
    ';

if(isset($_GET["tienda_id"])){
    $html      = '';
    $tienda_id = $_GET["tienda_id"];
    $sql = "SELECT p.id, p.nombre_corto, p.pvp, s.unidades, p.nombre
            FROM productos p
            JOIN stocks s ON s.producto = p.id 
            WHERE s.tienda = $tienda_id
            ";
    $result = request_database($pdo, $sql);
    if(count($result) > 0){
        foreach ($result as $row){
            $html .= '<form method="GET" action="cambios.php">'
                  .'Producto '.$row["nombre_corto"].': '.$row["pvp"].', '.$row["unidades"].' ud. '.$row["nombre"]
                  .'<input type="hidden" name="producto_id" value="'.$row["id"].'">'   
                  .'<input type="submit" value="Editar">
                </form>';
        }
    } else echo 'MENSAJE DE ERROR';
    
    echo $html;
}