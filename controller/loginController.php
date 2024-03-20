<?php
require_once '../config/conexion.php';
require_once '../model/usuario.php';

if(isset($_POST['enviar'])){
    $usuarioCorreo = $_POST["correo"];
    $usuarioClave = $_POST["clave"];
    $loginUsuario = new Usuario();
    $infoUsuario = array(); //Información sobre el usuario a logear
    $infoUsuario = $loginUsuario->traerInfoUsuario($usuarioCorreo,$usuarioClave);

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

    //Verifica si el usuario es estandar/empresa o admin y redirije
    if($infoUsuario[0] !== null){
        $tipo = $infoUsuario[3];
        switch($tipo){
            case 1:
                header("location: ../view/dashboard.php");
                break;
            case 2:
                header("location: ../view/index.php");
                break;
            case 3:
                header("location: ../view/index.php");
                break;
        }
    }      
}
?>