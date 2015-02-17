/******************* Metodos CRUD para telefono ***************************/
function insertarTelefonoCliente() {
    if (validarTelefonoCliente()) {
        var parametros = {
            "idCliente": $('#cbxCliente').val(),
            "numeroTelefono": obtenerTelefono()
        };
        if (confirm("¿ Desea agregar este teléfono  al cliente?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/telefonoCliente/insertarTelefono.php',
                type: 'post',
                success: function (response) {
                    //se recarga los telefonos y limpan los espacios
                    $('#txtTelefonoNum1').val("");
                    $('#txtTelefonoNum2').val("");
                    $('#txtTelefonoNum3').val("");
                    $('#txtTelefonoNum4').val("");
                    obtenerTelefonosCliente();
                    $("#resultadoTelefono").html(response);
                }
            });
        }
    }
}

function actualizarTelefonoCliente() {

    if (validarTelefono()) {
        var idTelefono = $('input:radio[name=idTelefono]:checked').val();

        var parametros = {
            "idTelefono": idTelefono,
            "nuevoTelefono": obtenerTelefono
        };

        if (confirm("¿ Desea modificar este teléfono ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/telefonoCliente/actualizarTelefonoAction.php',
                type: 'post',
                success: function (response) {
                    //se recarga los telefonos y limpan los espacios
                    $('#txtTelefonoNum1').val("");
                    $('#txtTelefonoNum2').val("");
                    $('#txtTelefonoNum3').val("");
                    $('#txtTelefonoNum4').val("");
                    obtenerTelefonosCliente();
                    $("#resultadoTelefono").html(response);
                }
            });
        }
    }
}

function eliminarTelefonoCliente() {
    var idTelefono = $('input:radio[name=idTelefono]:checked').val();

    var parametros = {
        "idTelefono": idTelefono
    };
    if (confirm("¿ Desea borrar este teléfono ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/telefonoCliente/borrarTelefonoAction.php',
            type: 'post',
            success: function (response) {
                //se recarga los telefonos y limpan los espacios
                $('#txtTelefonoNum1').val("");
                $('#txtTelefonoNum2').val("");
                $('#txtTelefonoNum3').val("");
                $('#txtTelefonoNum4').val("");
                obtenerTelefonosCliente();
                $("#resultadoTelefono").html(response);
            }
        });

    }
}

function obtenerTelefonosCliente() {
    var idCliente = document.getElementById("cbxCliente").value;
    var parametros = {
        "idCliente": idCliente
    };

    $.ajax({
        data: parametros,
        url: '../../actions/telefonoCliente/obtenerTelefonosClienteAction.php',
        type: 'post',
        success: function (response) {
            $("#listaTelefonos").html(response);
        }
    });
}
