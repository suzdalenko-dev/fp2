<?php

static public function mdlIngresarUsuario($tabla, $datos){
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil) VALUES (:nombre, :usuario, :password, :perfil)");

    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
    $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);

    if ($stmt->execute()){
        return "ok";
    }else{
        return "error";
    }

    $stmt->close();

    $stmt = null;
}

?>