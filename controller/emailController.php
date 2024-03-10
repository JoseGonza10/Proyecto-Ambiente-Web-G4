<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../view/assets/lib/phpmailer/src/Exception.php';
require '../view/assets/lib/phpmailer/src/PHPMailer.php';
require '../view/assets/lib/phpmailer/src/SMTP.php';


//Información de formulario
$opcion=$_POST["enviarSolicitud"];
$nombre=$_POST["nombreSolicitante"] . " " . $_POST["apellidoSolicitante"];
$email=$_POST["correoSolicitante"];
$cuerpo=$_POST["cuerpoSolicitud"];
$correo=new PHPMailer(true);

if(isset($opcion)){
    try
    {
    $correo->isSMTP();
    $correo->Host='smtp.gmail.com';
    $correo->SMTPAuth= true;
    $correo->Username= 'fidelitastesterg4@gmail.com'; // Usuario
    $correo->Password= 'ixwqbbzxjldfjpnw'; // Clave de seguridad
    $correo->SMTPSecure= 'ssl';
    $correo->Port= 465;

    $correo->setFrom($email, $nombre); 
    $correo->addReplyTo($email, $nombre); // Correo emisor
    $correo->addAddress('fidelitastesterg4@gmail.com'); // Correo receptor

    $correo->isHTML(true);

    $correo->Subject='Solicitud ' . $nombre;

    $correo->Body=$cuerpo;

    $correo->send();
    header("location: ../view/contact.php");
}
catch(Exception $e){
    echo "Mensaje: " . $e;
}
}
?>