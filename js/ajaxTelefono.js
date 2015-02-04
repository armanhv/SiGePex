/******************* Metodos CRUD para telefono ***************************/
function insertarTelefono() {
    if (validarTelefono()) {
        var parametros = {
            "identificacionEmpleadoTelefono": $('#cbxEmpleado').val(),
            "numeroTelefono": obtenerTelefono()
        };

        if (confirm("¿ Desea agregar este teléfono ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/telefono/insertarTelefono.php',
                type: 'post',
                success: function (response) {
                    //se recarga los telefonos y limpan los espacios
                    $('#txtTelefonoNum1').val("");
                    $('#txtTelefonoNum2').val("");
                    $('#txtTelefonoNum3').val("");
                    $('#txtTelefonoNum4').val("");
                    obtenerTelefonosEmpleado();
                    ("#resultadoTelefono").html(response);
                    //mandarMensaje(response);
                }
            });
        }
    }
}

function actualizarTelefono() {

    if (validarTelefono()) {
        var idTelefono = $('input:radio[name=idTelefono]:checked').val();

        var parametros = {
            "idTelefono": idTelefono,
            "nuevoTelefono": obtenerTelefono
        };

        if (confirm("¿ Desea modificar este teléfono ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/telefono/actualizarTelefonoAction.php',
                type: 'post',
                success: function (response) {
                    //se recarga los telefonos y limpan los espacios
                    $('#txtTelefonoNum1').val("");
                    $('#txtTelefonoNum2').val("");
                    $('#txtTelefonoNum3').val("");
                    $('#txtTelefonoNum4').val("");
                    obtenerTelefonosEmpleado();
                    $("#resultadoTelefono").html(response);
                }
            });
        }
    }
}

function eliminarTelefono() {
    var idTelefono = $('input:radio[name=idTelefono]:checked').val();

    var parametros = {
        "idTelefono": idTelefono
    };
    if (confirm("¿ Desea borrar este teléfono ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/telefono/borrarTelefonoAction.php',
            type: 'post',
            success: function (response) {
                //se recarga los telefonos y limpan los espacios
                $('#txtTelefonoNum1').val("");
                $('#txtTelefonoNum2').val("");
                $('#txtTelefonoNum3').val("");
                $('#txtTelefonoNum4').val("");
                obtenerTelefonosEmpleado();
                $("#resultadoTelefono").html(response);
            }
        });

    }
}

function obtenerTelefonosEmpleado() {
    var idEmpleado = document.getElementById("cbxEmpleado").value;

    var parametros = {
        "idEmpleado": idEmpleado
    };

    $.ajax({
        data: parametros,
        url: '../../actions/telefono/obtenerTelefonosEmpleadoAction.php',
        type: 'post',
        success: function (response) {
            $("#listaTelefonos").html(response);
        }
    });
}
