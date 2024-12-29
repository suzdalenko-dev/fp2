<?php

session_start();

# $_SESSION['user'] = null;

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = ['email' => null, 'password' => null, 'user_login' => false];
} 

function user_is_logged_in(){
    if(isset($_SESSION['user'])){
        return $_SESSION['user']['user_login'];
    } else {
        return false;
    }
}

