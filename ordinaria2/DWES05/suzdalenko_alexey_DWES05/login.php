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
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $pass, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user) {
        $_SESSION['user'] = ['email' => $user['email'], 'password' => $user['password'], 'user_login' => true];
        header('Location: index.php');
    } else {
        $message = 'Invalid username or password';
    }
}

$blade = new Blade('public/views', 'cache');
echo $blade->view()->make('login', ['message' => $message])->render();

