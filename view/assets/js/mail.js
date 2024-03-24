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

//función para enviar correo de recuperación
$('#form-emailSubmit').click(function(event){
    event.preventDefault();
    correoSolicitante = document.getElementById('floatingEmail').value;
    $.ajax({
        url: '../controller/recuperacionController.php',
        type: 'POST',
        dataType: 'json',
        data: {correo : correoSolicitante},
        beforeSend: function(){
        }
    })
    .done(function(response){
        if(response.error !== true){
            Swal.fire({
                title: "Exito",
                text: "El correo de verificación fue enviado exitosamente",
                icon: "success",
              });
        }
        else
        {
            Swal.fire({
                title: "Error",
                text: "El correo ingresado no esta dentro del sistema, por favor intentarlo nuevamente",
                icon: "error",
              });
        }
    })
    .fail(function(error){
        console.log(error.responseText);
    })
    .always(function(){
        console.log("Operación completada");
    });
});

