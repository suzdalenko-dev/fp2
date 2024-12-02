<?php
// FETCH_ASSOC
    $stmt = $dbh->prepare("SELECT * FROM Clientes");
// Especificamos el fetch mode antes de llamar a fetch()
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
// Ejecutamos
    $stmt->execute();
// Mostramos los resultados
    while ($row = $stmt->fetch()) {
        echo "Nombre: {$row["nombre"]} <br>";
        echo "Ciudad: {$row["ciudad"]} <br><br>";
    }



// FETCH_OBJ
    $stmt = $dbh->prepare("SELECT * FROM Clientes");
// Ejecutamos
    $stmt->execute();
// Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo "Nombre: " . $row->nombre . "<br>";
        echo "Ciudad: " . $row->ciudad . "<br>";
    }


    //Con FETCH_BOUND debemos emplear el método bindColumn():
// Preparamos
    $stmt = $dbh->prepare("SELECT nombre, ciudad FROM Clientes");
// Ejecutamos
    $stmt->execute();
// bindColumn
    $stmt->bindColumn(1, $nombre);
    $stmt->bindColumn('ciudad', $ciudad);
    while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
        $cliente = $nombre . ": " . $ciudad;
        echo $cliente . "<br>";
    }

?>