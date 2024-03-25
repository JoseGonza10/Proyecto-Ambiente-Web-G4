//Función para enviar correos a contacto
function visitanteEnviaSolicitud(){
    let opcion=document.getElementById('sendMessage').value;
    let nombre= document.getElementById('fname').value;
    let apellidos= document.getElementById('lname').value;
    let correo=document.getElementById('mail').value;
    let cuerpo=document.getElementById('message').value;

    $.post('../controller/emailController.php',
    {
        enviarSolicitud:opcion,
        nombreSolicitante:nombre,
        apellidoSolicitante:apellidos,
        correoSolicitante:correo,
        cuerpoSolicitud:cuerpo,
    }, function(data){
    });
};



