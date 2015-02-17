/******************* Metodos CRUD para Credito ***************************/
function insertarDireccionCliente() {

    if (validarDireccionCliente()) {

        var idCliente = document.getElementById("cbxCliente").value;
        var direccion = document.getElementById("txtDireccion").value;


        var parametros = {
            "idCliente": idCliente,
            "direccion": direccion

        };

        if (confirm("¿Desea agregar esta direccion?")) {

            $.ajax({
                data: parametros,
                url: '../../actions/direccionCliente/insertarDireccionClienteAction.php',
                type: 'post',
                success: function (response) {
                    //limpiarCamposCreditos();

                    obtenerDirecciones();
                    $("#resultado").html(response);
                },
                error: function (textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });

        }
    }
}

function actualizarDireccionCliente() {

    if (validarDireccionCliente()) {

        var idDireccion = $('input:radio[name=idDireccion]:checked').val();

        var idCliente = document.getElementById("cbxCliente").value;
        var direccion = document.getElementById("txtDireccion").value;

        var parametros = {
            "idDireccion": idDireccion,
            "idCliente": idCliente,
            "direccion": direccion
        };

        if (confirm("¿ Desea modificar esta Direccion ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/direccionCliente/actualizarDireccionClienteAction.php',
                type: 'post',
                success: function (response) {
                    obtenerDirecciones();

                    $("#resultado").html(response);
                }

            });
        }
    }
}

function eliminarDireccionCliente() {
    var idDireccion = $('input:radio[name=idDireccion]:checked').val();

    var parametros = {
        "idDireccion": idDireccion
    };
    if (confirm("¿ Desea borrar esta Direccion ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/direccionCliente/borrarDireccionClienteAction.php',
            type: 'post',
            success: function (response) {

                obtenerDirecciones();
                $("#resultado").html(response);
            }

        });

    }
}

function obtenerDirecciones() {

    var idCliente = document.getElementById("cbxCliente").value;

    var parametros = {
        "idCliente": idCliente
    };

    $.ajax({
        data: parametros,
        url: '../../actions/direccionCliente/obtenerDireccionesAction.php',
        type: 'post',
        success: function (response) {
            $("#listaDireccionesCliente").html(response);
        }

    });

}

/********************* Seccion de validaciones ************************/
function validarDireccionCliente() {

    var idCliente = document.getElementById("cbxCliente").value;
    var direccion = document.getElementById("txtDireccion").value;

    if (idCliente === '0') {
        mandarMensaje("Debe seleccionar un cliente");
        cbxCliente.focus();
        return false;
    } else if (direccion === "") {
        mandarMensaje("La Direccion es inválida");
        txtDireccion.focus();
        return false;
    }

    return true;
}

