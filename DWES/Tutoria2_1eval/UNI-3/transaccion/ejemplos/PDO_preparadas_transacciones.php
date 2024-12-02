<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href='css/custom.css' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="contenido">
            <?php
			try {
			$db = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "abc123.");
				echo "Conectado<br>";
			} catch (Exception $e) {
				die("No se pudo conectar: " . $e->getMessage());
			}
			
            $tabla = "familia";
            $sentencia = $db->prepare("INSERT INTO $tabla (cod, nombre) VALUES (:cod, :nombre)");
            $sentencia->bindParam(':cod', $cod);
            $sentencia->bindParam(':nombre', $nombre);
			
			try {
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$db-> beginTransaction();
	// insertar una fila
				$cod = 'MP6';
				$nombre = "reproductor";
				$sentencia->execute();
	// insertar otra fila con diferentes valores
				$cod = 'MP7';
				$nombre = "reproductor1";
				$sentencia->execute();
				echo "insertado bien";
				$db->commit();
				  
				} catch (Exception $e) {
				  $db->rollBack();
				  echo "Fallo: " . $e->getMessage();
			}
            ?>
        </div>
    </body>
</html>