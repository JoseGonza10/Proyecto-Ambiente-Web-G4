<?php
require_once '../config/conexion.php';
require_once '../model/usuario.php';

if(isset($_POST['enviar'])){
    $usuarioCorreo = $_POST["correo"];
    $usuarioClave = $_POST["clave"];

    $usuario = new Usuario();
    $usuario = $usuario->encontrarUsuario($usuarioCorreo,$usuarioClave);

    if($usuario !== NULL){
        header("location: ../view/dashboard.php")
    }
    
}

?>