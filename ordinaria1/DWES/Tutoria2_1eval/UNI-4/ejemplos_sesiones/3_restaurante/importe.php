<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
    </head>
    <body>
        <?php
		session_start();
		// ----------- ver si cierra la sesion --------------------------------
        if (isset($_GET['fin'])) {
            echo "Muchas Gracias.";
            session_destroy();
            header("refresh:2;url='pedido.php'");
        }
		// ---------------- Ver si ha elegido un plato ------------------------
        if (isset($_GET["nombre"])) {
            $plato = $_GET["nombre"];
            if (!isset($_SESSION["total"])) {
                $_SESSION["total"] = 0;
            }
			// --------------- ver si tiene descuento -------------------------
            if ($_SESSION["descuento"] == $plato) {
                $importePlatoSeleccionado = $_SESSION["platos"][$plato] * 0.9;
            } else {
                $importePlatoSeleccionado = $_SESSION["platos"][$plato];
            }
			// ---------------- mostrar coste ---------------------------------
            echo "<div id='compra'>Ha elegido <br>";
            echo "<img src='img/" . $plato . ".jpg'/>";
            echo "<p>Precio: " . $importePlatoSeleccionado . " &euro;</p><br>";
            $_SESSION["total"] += $importePlatoSeleccionado;
            echo "Total: " . $_SESSION["total"] . " &euro;<br>";
            echo "<a href='pedido.php'>Seguir comprando</a><br>";
            echo "<a href='importe.php?fin=true'>Finalizar</a>";
            echo "</div>";
        }
        ?>
    </body>
</html>

