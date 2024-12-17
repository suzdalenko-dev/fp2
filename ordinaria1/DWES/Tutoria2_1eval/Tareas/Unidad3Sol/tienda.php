<?php

    //Función para desplegar nombre de  tienda
    function imprimirOpcion()
    {
        require 'conexion.php';
        if (!$error) {
            $sql = $conexion->prepare("SELECT id, nombre from tiendas");
            try {
                $sql->execute();
            } catch (PDOException $ex) {
                $error = true;
                $mensaje = $ex->getMessage();
                $conexion = null;
            }
            while ($opcion = $sql->fetch(PDO::FETCH_OBJ)) {

                if (isset($_POST["tiendas"]) && $_POST["tiendas"] == $opcion->id)

                    echo '<option value="' . $opcion->id . '" selected>' . $opcion->nombre . ' </option>';

                else

                    echo '<option value="' . $opcion->id . '">' . $opcion->nombre . ' </option>';

            }
        }
        $conexion = null;
    }

    //Acción mostrar productos
    function mostrarProducto()
    {
        if (isset($_POST['mostrar'])) {
            require 'conexion.php';
            if (!$error) {
                $idTienda = $_POST["tiendas"];
                $sql1 = $conexion->prepare("SELECT productos.id ,productos.nombre_corto, productos.pvp from productos,stocks where productos.id=stocks.producto and stocks.tienda= $idTienda");

                try {
                    $sql1->execute();
                } catch (PDOException $ex) {
                    $error = true;
                    $mensaje = $ex->getMessage();
                    $conexion = null;
                }
                //comprobación que la tienda tiene productos
                if ($sql1->rowCount() > 0) {

                    while ($opcion2 = $sql1->fetch(PDO::FETCH_OBJ)) {
                        echo "<form action='cambios.php' method='post'>";
                        echo "<p><input type='hidden' name='cod' value='{$opcion2->id}'/>";
                        echo "<b>Producto: </b>" . $opcion2->nombre_corto . " " . "<b>Precio de venta: </b>" . $opcion2->pvp . " €" . " " . "<input style=background:#F4BBB2 type='submit' value='Editar' name='editar'></p>";
                        echo "</form> ";
                    }
                } else {

                    echo "<form> ";
                    echo "<h3>La tienda no tiene productos<h3>";
                    echo "</fieldset>";
                    echo "</form> ";
                }
            }
            $conexion = null;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Tarea 3 listado de tiendas </title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset style="width:450px; background:#9BB5E5 ;">
        <h2> Listado de productos de una tienda </h2>
        <p><b>Tienda:</b>
            <select name="tiendas" id="tiendas"  required>
                <option select value=" "> Seleccione una tienda</option>
                <?php imprimirOpcion(); ?>
            </select>
            <input style=background:#F4BBB2 type='submit' value='Mostrar productos' name='mostrar'>
        </p>
        <h3>Productos de la tienda</h3>
</form>

</br>

<?php
    mostrarProducto();
?>
</body>
</html>