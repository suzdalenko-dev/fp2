<?php
session_start();
$nombre= isset($_SESSION['nombre'])?$_SESSION['nombre']:"";
$apellido= isset($_SESSION['apellido'])?$_SESSION['apellido']:"";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1>Formulario de inicio</h1>
        <form action="pagina2.php" autocomplete="on" method="post">
            Nombre<input type="text" name="nombre" value="<?php echo $nombre ?>"><br>
            Apellido<input type="text" name="apellido" value="<?php echo $apellido ?>"><br>
            <input type="submit" name="enviar" value="Siguiente">
        </form>
    </body>
</html>