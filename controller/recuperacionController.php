<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../view/assets/lib/phpmailer/src/Exception.php';
require '../view/assets/lib/phpmailer/src/PHPMailer.php';
require '../view/assets/lib/phpmailer/src/SMTP.php';
require_once '../config/conexion.php';
require_once '../model/usuario.php';

$correo=new PHPMailer(true);
$operacionesUsuario = new Usuario();
$usuarioCorreo = $_POST["correo"];
$verificacion = $operacionesUsuario->verificarUsuario($usuarioCorreo);


if($verificacion !== false){
    $codigo = '';
    for($x = 0; $x <= 5 ; $x++)
    {
        $codigo .= (string) rand(0,9);
    }

        try
        {
        $correo->isSMTP();
        $correo->Host='smtp.gmail.com';
        $correo->SMTPAuth= true;
        $correo->Username= 'fidelitastesterg4@gmail.com'; // Usuario
        $correo->Password= 'ixwqbbzxjldfjpnw'; // Clave de seguridad
        $correo->SMTPSecure= 'ssl';
        $correo->Port= 465;
    
        $correo->setFrom('fidelitastesterg4@gmail.com', 'Underfire Paintball CR'); 
        $correo->addReplyTo('fidelitastesterg4@gmail.com', 'Underfire Paintball CR'); // Correo emisor
        $correo->addAddress($usuarioCorreo); // Correo receptor
    
        $correo->isHTML(true);
    
        $correo->Subject='Correo de recuperacion';
    
        $correo->Body='Su código de verificación de cuenta es ' . $codigo;
    
        $correo->send();
    }
    catch(Exception $e){
        echo "Mensaje: " . $e;
    }
    echo json_encode(array('error'=> false,'codigo'=> $codigo));
}
else
{
    echo json_encode(array('error' => true));
}
?>