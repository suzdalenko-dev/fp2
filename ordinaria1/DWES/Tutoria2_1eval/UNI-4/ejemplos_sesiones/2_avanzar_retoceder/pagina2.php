<?php
session_start();
if (isset($_POST['enviar'])) {
    if (!empty($_POST['nombre']) && !empty($_POST['apellido'])) {
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['apellido'] = $_POST['apellido'];
    }
}
$genero = isset($_SESSION['genero']) ? $_SESSION['genero'] : "";
$formaenvio = isset($_SESSION['formaenvio']) ? $_SESSION['formaenvio'] : "";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Formulario 2</h1>
        <form action="pagina3.php" autocomplete="on" method="post">
            Genero
          
            
              <input type='radio' name='genero' value='hombre' <?php if($genero=="hombre") echo "checked" ?>>Hombre
             <input type='radio' name='genero' value='mujer'<?php if($genero=="mujer") echo "checked" ?>>Mujer
            
           
            <br>
            Forma de envio<select name="formaenvio">
               
                <option value='correo' <?php if($formaenvio=="correo") echo "selected" ?>>Correo</option>
                 <option value='seur'<?php if($formaenvio=="seur") echo "selected" ?>>Seur</option>
            
               
                ?>
         
            </select>
            <br>
             <a href="pagina1.php">Volver</a>
            <input type="submit" name="enviar2" value="Siguiente">
           
        </form>
        
    </body>
</html>
