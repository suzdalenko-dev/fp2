<?php

require 'vendor/autoload.php';
require 'src/includer.php';

use Philo\Blade\Blade;

if(!user_is_logged_in()) {
    /* si el usuario no esta logeado */
    die('El usuario NO esta logeado');
}

if(isset($_GET['add_new_book'])) {
    header('Location: fcrear.php');
}

$l = new Libro();
$books = $l->getBooks();

$blade = new Blade('public/views', 'cache');
echo $blade->view()->make('libros', ['books' => $books])->render();