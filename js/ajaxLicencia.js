function insertarLicencia() {

    var valorIdEmpleado = document.getElementById("cbxEmpleado").value;
    var valorTipoLicencia = document.getElementById("cbxTipoLicencia").value;
    var valorFechaEmision = document.getElementById("txtFechaEmision").value;
    var valorFechaExpiracion = document.getElementById("txtFechaExpiracion").value;

    if (validarLicencia() && validarFecha(valorFechaEmision) && validarFecha(valorFechaExpiracion)) {

        var parametros = {
            "idEmpleado": valorIdEmpleado,
            "tipoLicencia": valorTipoLicencia,
            "fechaEmisionLicencia": obtenerFechaFormatoSQL(valorFechaEmision),
            "fechaExpiracionLicencia": obtenerFechaFormatoSQL(valorFechaExpiracion)
        };

        if (confirm("¿ Desea agregar esta licencia ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/licencia/insertarLicenciaAction.php',
                type: 'post',
                success: function (response) {
                    $('#txtFechaExpiracion').val("");
                    $('#txtFechaEmision').val("");
                    obtenerLicenciasEmpleado();
                    $("#resultadoLicencia").html(response);

                }
            });
        }
    }
}

function actualizarLicencia() {
    var valorIdLicencia = $('input:radio[name=idLicencia]:checked').val();
    var valorIdEmpleado = document.getElementById("cbxEmpleado").value;
    var valorTipoLicencia = document.getElementById("cbxTipoLicencia").value;
    var valorFechaEmision = document.getElementById("txtFechaEmision").value;
    var valorFechaExpiracion = document.getElementById("txtFechaExpiracion").value;

    if (validarLicencia() && validarFecha(valorFechaExpiracion) && validarFecha(valorFechaEmision)) {

        var parametros = {
            "idLicencia": valorIdLicencia,
            "idEmpleado": valorIdEmpleado,
            "tipoLicencia": valorTipoLicencia,
            "fechaEmisionLicencia": obtenerFechaFormatoSQL(valorFechaEmision),
            "fechaExpiracionLicencia": obtenerFechaFormatoSQL(valorFechaExpiracion)
        };

        if (confirm("¿ Desea modificar esta licencia ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/licencia/actualizarLicenciaAction.php',
                type: 'post',
                success: function (response) {
                    $('#txtFechaExpiracion').val("");
                    $('#txtFechaEmision').val("");
                    obtenerLicenciasEmpleado();
                    $("#resultadoLicencia").html(response);

                }
            });
        }
    }
}

function eliminarLicencia() {
    var idLicencia = $('input:radio[name=idLicencia]:checked').val();

    var parametros = {
        "id": idLicencia
    };

    if (confirm("¿ Desea eliminar esta licencia ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/licencia/eliminarLicenciaAction.php',
            type: 'post',
            success: function (response) {
                $('#txtFechaExpiracion').val("");
                $('#txtFechaEmision').val("");
                obtenerLicenciasEmpleado();
                $("#resultadoLicencia").html(response);
            }
        });
    }
}

function obtenerLicenciasEmpleado() {
    var idEmpleado = document.getElementById("cbxEmpleado").value;

    var parametros = {
        "idEmpleado": idEmpleado
    };

    $.ajax({
        data: parametros,
        url: '../../actions/licencia/obtenerLicenciasEmpleadoAction.php',
        type: 'post',
        success: function (response) {
            $("#listaLicencias").html(response);
        }
    });
}

function cargarInformacionLicencia() {
    var iID = $('input:radio[name=idLicencia]:checked').val();
    $.ajax({
        url: '../../actions/licencia/buscarLicenciaAction.php',
        type: "POST",
        datatype: "JSON",
        data: {
            valueAction: 1,
            id: iID
        },
        success: function (msg)
        {
            $('#txtFechaEmision').val(obtenerFechaFormatoWeb(msg.fechaEmisionLicencia));
            $('#txtFechaExpiracion').val(obtenerFechaFormatoWeb(msg.fechaExpiracion));

        }
    });
}

function validarLicencia() {

    if ($.trim($('#txtFechaEmision').val()) === "" || $.trim($('#txtFechaExpiracion').val()) === "") {
        mandarMensaje("La fecha de emición y expiracion son inválidas.\nDebe ser dd/mm/yyyy");

        if ($.trim($('#txtFechaEmision').val()) === "") {
            txtFechaEmision.focus();
        } else {
            txtFechaExpiracion.focus();
        }
        return false;
    }

    return true;
}