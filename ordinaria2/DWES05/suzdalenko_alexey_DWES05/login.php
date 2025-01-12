<?php
require 'vendor/autoload.php';
require 'src/includer.php';

use Philo\Blade\Blade;

$message = '';
if(isset($_POST['login'])) {
    /* intentamos hacer login con el usuario */
    
    $email = $_POST['email'];
    $pass  =  hash('sha256', $_POST['pass']);
    $db = Conexion::getInstance()->getConnection();
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :pass";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':usuario', $email, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user) {
        $_SESSION['user'] = ['email' => $user['usuario'], 'password' => $user['pass'], 'user_login' => true];
        header('Location: index.php');
    } else {
        $message = 'Invalid username or password';
    }
}

$blade = new Blade('public/views', 'cache');
echo $blade->view()->make('login', ['message' => $message])->render();

