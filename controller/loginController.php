<?php
require_once '../config/conexion.php';
require_once '../model/usuario.php';

//if(isset($_POST['enviar'])){
    $usuarioCorreo = $_POST["correo"];
    $usuarioClave = $_POST["clave"];
    $operacionesUsuario = new Usuario();
    $infoUsuario = array(); //Información sobre el usuario a logear
    $infoUsuario = $operacionesUsuario->traerInfoUsuario($usuarioCorreo,$usuarioClave);

    /* Información de posiciones de infoUsuario
    $arr[0] -> IdUsuario
    $arr[1] -> DireccionUsuario
    $arr[2] -> Sexo
    $arr[3] -> TipoUsuario
    $arr[4] -> NombreUsuario
    $arr[5] -> PrimerApellido
    $arr[6] -> SegundoApellido
    $arr[7] -> TelefonoUsuario
    $arr[8] -> CorreoUsuario
    $arr[9] -> FechaNacimiento
    $arr[10] -> ClaveUsuario
    */

    if($infoUsuario !== []){
        $tipo = $infoUsuario[3];
        echo json_encode(array('error'=> false,'tipo'=> $tipo));
    }
    else{
        echo json_encode(array('error' => true));
    }      
//}
?>