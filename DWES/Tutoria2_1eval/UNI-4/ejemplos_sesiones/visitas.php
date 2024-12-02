<?php
    // Iniciamos la sesión o recuperamos la anterior sesión existente
    session_start();
    // Comprobamos si la variable ya existe
    if (isset($_SESSION['visitas']))
        $_SESSION['visitas']++;
    else
        $_SESSION['visitas'] = 0;
    echo "te has conectado ". $_SESSION['visitas']. " veces";

    // eliminar la sesion cuando se ha visitado la página mas de 10 veces
    if  ($_SESSION['visitas']>10)
        unset($_SESSION['visitas']);
?>
