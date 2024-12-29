<?php
include 'src/includer.php';
include 'vendor/autoload.php';
use Philo\Blade\Blade;

if(!user_is_logged_in()) {
    /* si el usuario no esta logeado */
    die('El usuario NO esta logeado');
}

if(isset($_GET['instalacion'])) {
    /* creamos y guardamos los datos de libros la base de datos */

    $db = Conexion::getInstance()->getConnection();
    $faker = Faker\Factory::create();
    $sql = "INSERT INTO 
            libros (titulo, autor, genero, fecha_publicacion, isbn, tamano_libro, numero_paginas) 
            VALUES (:titulo, :autor, :genero, :fecha_publicacion, :isbn, :tamano_libro, :numero_paginas)";
    $stmt = $db->prepare($sql);

    for ($i = 0; $i < 10; $i++) {
        $titulo = $faker->sentence(3); # titulo 
        $autor = $faker->name; # author
        $genero = $faker->randomElement(['Novela', 'Ciencia Ficción', 'Ensayo', 'Historia', 'Terror']); 
        $fecha_publicacion = $faker->date(); 
        $isbn = $faker->isbn13; 
        $tamano_libro = $faker->numberBetween(100, 1000);
        $numero_paginas = $faker->numberBetween(50, 500); 
    
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':fecha_publicacion', $fecha_publicacion);
        $stmt->bindParam(':isbn', $isbn);
        $stmt->bindParam(':tamano_libro', $tamano_libro);
        $stmt->bindParam(':numero_paginas', $numero_paginas);
        $stmt->execute();
    }


    header('Location: index.php');
}

$blade = new Blade('public/views', 'cache');
echo $blade->view()->make('instalacion', [])->render();
