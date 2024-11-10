<?php

function request_database($pdo, $sql, $action, $producto_id){
    $stmt = $pdo->prepare($sql);
    $res = $stmt->execute();
    if($action == "update"){
        $date_update = date('Y-m-d');
        $log_sql = "INSERT INTO log (id_producto, f_cambio) VALUES (:id_producto, :f_cambio)";
        $stmt = $pdo->prepare($log_sql);
        $stmt->bindParam(':id_producto', $producto_id);
        $stmt->bindParam(':f_cambio', $date_update);
        $stmt->execute();
        return $res;
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

try {
    $dsn = "mysql:host=localhost;dbname=tarea3;charset=utf8";
    $pdo = new PDO($dsn, "gestor", "secreto");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); die();
}

if(isset($_GET["producto_id"])){
    $producto_id = $_GET["producto_id"];
    $result      = request_database($pdo, "SELECT * FROM productos WHERE id = $producto_id", null, null);
    $art         = $result[0];

    echo '<form action="cambios.php" method="POST">
            <h2>Producto: '.$art["nombre_corto"].'</h2>
            Nombre <br><br> <textarea name="nombre" rows="3" cols="55">'.$art["nombre"].'</textarea><br><br>
            Descripcion <br><br> <textarea name="descripcion" rows="11" cols="55">'.$art["descripcion"].'"</textarea><br><br>
            P.V.P. <input type="text" value="'.$art["pvp"].'" name="pvp"><br><br><br><br>
            <input type="submit" value="Actualizar" name="update"><input type="submit" value="Cancelar" name="cancel">
            <input type="text" hidden name="producto_id" value="'.$art["id"].'">
            <input type="text" hidden name="nombre_corto" value="'.$art["nombre_corto"].'">
        </form>';
}

if(isset($_POST['update'])){
    $sql = 'UPDATE productos SET nombre = "'.$_POST['nombre'].'", descripcion = "'.$_POST['descripcion'].', pvp = "'.$_POST['pvp'].'" WHERE id = '.$_POST['producto_id'];
    $result      = request_database($pdo,  $sql, "update", $_POST['producto_id']);
    if($result){
        echo "CORRECTO Se ha actualizado los datos de ".$_POST['nombre_corto'];
        echo '<script>
          setTimeout(function() { window.location.href = "http://localhost/listado.php";}, 11000);
        </script>';
    } else {
        echo "FALLO TRANSACCION, ERROR";
    }
}

if(isset($_POST['cancel'])){
    echo '<br><br><span style="border: 3px solid blue; padding:11px;">Cancelando...</span>';
    echo '<script>
          setTimeout(function() { window.location.href = "http://localhost/tienda.php";}, 11000);
        </script>';
}