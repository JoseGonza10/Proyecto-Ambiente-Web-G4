<?php
require_once '../config/conexion.php';
require_once '../model/usuario.php';

if(isset($_POST['enviar'])){
    $usuarioCorreo = $_POST["correo"];
    $usuarioClave = $_POST["clave"];

    $usuario = NULL;
    $usuario = $usuario->encontrarUsuario($usuarioCorreo,$usuarioClave);

    if($usuario !== NULL){
        die("Llegaste aca");
        redirect('../dashboard.php');
    }
    
}

?>