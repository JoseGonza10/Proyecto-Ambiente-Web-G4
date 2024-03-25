let codigoVerificacion;

//Función para retrasar ejecución de linea
const retrasar = tiempo=> new Promise(respuesta => setTimeout(respuesta,tiempo));


//Función para verificar el ingreso correcto de credenciales
$('#user_login').on('submit',function(event){
    event.preventDefault();
    //let formData = new FormData($('#user_login'));
    $.ajax({
        url: '../controller/loginController.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
        }
    })
    .done(function(response){
        if(response.error !== true){
        let tipo = response.tipo;
        switch(tipo)
        {
            case 1:
                location.href='../view/dashboard.php';
                break;
            case 2:
                location.href='../view/index.php';
                break;
            case 3:
                location.href='../view/index.php';
                break;
        }
        }
        else
        {
            Swal.fire({
                title: "Error",
                text: "Las credenciales introducidas no son correctas, por favor intentelo de nuevo",
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

//Función para enviar correo de recuperación
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
            codigoVerificacion = response.codigo;
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


//Función para validar código de verificación
$('#form-submit').click(async function(event){
    event.preventDefault();
    codigoUsuario = document.getElementById('floatingCode').value;

    if(codigoUsuario === codigoVerificacion){
        Swal.fire({
            title: "Exito",
            text: "El código fue verificado existosamente",
            icon: "success",
          });
          await retrasar(5000);
          location.href='../view/restablecimiento.php';
          codigoVerificacion = null;
    }
    else{
        Swal.fire({
            title: "Error",
            text: "El código introducido no es correcto. Por favor intentarlo de nuevo",
            icon: "error",
          });
    }
});