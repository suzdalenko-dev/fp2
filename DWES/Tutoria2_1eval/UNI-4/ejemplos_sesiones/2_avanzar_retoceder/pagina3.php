<?php
session_start();
if (isset($_POST['enviar2'])) {
    if (isset($_POST['genero']) && isset($_POST['formaenvio'])) {
        $_SESSION['genero'] = $_POST['genero'];
        $_SESSION['formaenvio'] = $_POST['formaenvio'];
    }
}
        echo "Nombre ".$_SESSION['nombre']."<br>";
        echo "Apellido ".$_SESSION['apellido']."<br>";
        echo "Genero ".$_SESSION['genero']."<br>";
        echo "Forma de envio ".$_SESSION['formaenvio']."<br>";
  

?>
            <a href="pagina2.php">Volver</a>
 