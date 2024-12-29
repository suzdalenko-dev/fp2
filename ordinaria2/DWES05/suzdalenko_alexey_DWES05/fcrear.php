<?php

require 'vendor/autoload.php';
require 'src/includer.php';

use Philo\Blade\Blade;

if(!user_is_logged_in()) {
    /* si el usuario no esta logeado */
    die('El usuario NO esta logeado');
}

$res = '';
/* creamos nuevo libro */
if(isset($_POST['create'])) {
    $l = new Libro();
    $res = $l->addBook($_POST['title'], $_POST['author'], $_POST['gender'], $_POST['date_publication'], $_POST['isbn'], $_POST['page_number'], $_POST['book_size']);
}

/* limpiamos los campos simplemente reiniciando la pagina */
if(isset($_POST['clear'])) {
    header('Location: fcrear.php');
}

/* vamos al listado de libros */
if(isset($_POST['back'])) {
    header('Location: libros.php');
}

$blade = new Blade('public/views', 'cache');
echo $blade->view()->make('fcrear', ['message'=>$res])->render();
