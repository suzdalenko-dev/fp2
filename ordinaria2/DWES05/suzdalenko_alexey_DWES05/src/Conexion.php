<?php

class Conexion{
    private static $instance = null;
    private $pdo;

    public function __construct(){
        try{
            $this->pdo = new PDO("mysql:host=localhost;dbname=biblioteca_digital", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Database connection failed: " . $e->getMessage());   
        }
    }

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new Conexion();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}