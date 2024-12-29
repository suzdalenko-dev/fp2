<?php

function conectClases(){
    $files = [
        'functions.php',
        'Conexion.php',
        'Libro.php',
    ];

    foreach ($files as $file) {
        require_once 'src/' . $file;
    }
}

conectClases();