<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
        function CargarTabla($nombres){
            echo '<table aling="center" border="1" cellpadding="2" cellspacing="2">';
            echo '<tbody style="background-color: grey; text-align: center; font-weight: bold">';
            echo '<td>Nombre</td>';
            echo '<td>Correo</td>';
            echo '</tbody>';
            $contador = 0; 
            foreach ($nombres as $key => $value) {
                $contador++;
                echo "<tr>";
                if ($contador % 2 == 0) {
                    echo "<td style='background-color: rgba(110, 244, 70)'>$key</td>";
                    echo  "<td style='background-color: rgba(110, 244, 70)' >$value</td>";
                } 
                else {
                    echo "<td style='background-color: rgba(70, 132, 244 )'>$key</td>";
                    echo  "<td style='background-color: rgba(70, 132, 244 )'>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }

        function VerCorreo($nombre, $nombres){
            if (array_key_exists($nombre, $nombres)) {
                echo "El correo de $nombre es $nombres[$nombre]";
            } else {
                echo "El nombre $nombre no esta en la tabla";
            }
            
        }

        function AñadirCorreo(&$nombres){
			if (array_key_exists($_POST['inputNombre'],$nombres)){
				echo "ERROR: ya existe";
			}
			else
            if (!empty($_POST['inputNombre']) && !empty($_POST['inputCorreo'])) {
                $nombres[$_POST['inputNombre']] = $_POST['inputCorreo'];
            }
            else{
                echo "No se han rellenado los campos de nombre y correo";
            }
         
        }

        if (isset($_POST["array"])){
            $nombres = unserialize($_POST["array"]);
        } else {
            $nombres = array("Juan" => "juan@educantabria.es", "Elena" => "elena@yahoo.es", "Pedro" => "pedro@gmail.com");
        }

        if (isset($_POST['btCorreo'])){
            VerCorreo($_POST['inputNombre'], $nombres);
        }

        if (isset($_POST['btAñadir'])){
            AñadirCorreo($nombres);
        }
		//  ------------ mostrar siempre la tabla de paises ----------
		CargarTabla($nombres);
    ?>

    </table>
    <h3>Agenda : Nombres y Correos</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="array" value='<?php echo serialize($nombres); ?>'>
        <p>Introduce un Nombre <input type="text" name="inputNombre" size="15"></p>
        <p>Introduce una Correo <input type="text" name="inputCorreo" size="15"></p>
        <button type="submit" name="btCorreo">Ver el Correo</button>
        <button type="submit" name="btAñadir">Añadir</button>
	</form>
</body>
</html>