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