function insertarMorosidad() {
    var fechaMorosidad = document.getElementById("txtFechaMorosidad").value;

    if (validarMorosidad() && validarFecha(fechaMorosidad)) {

        var idCliente = document.getElementById("cbxCliente").value;
        var monto = document.getElementById("txtMonto").value;
        monto = monto.replace(/₡/g, "");

        var parametros = {
            "idCliente": idCliente,
            "fechaMorosidad": obtenerFechaFormatoSQL(fechaMorosidad),
            "monto": monto
        };

        if (confirm("¿Desea agregar esta morosidad?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/morosidad/insertarMorosidad.php',
                type: 'post',
                success: function (response) {
                    obtenerMorosidadesCliente();
                    limpiarCamposMorosidad();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function borrarMorosidad() {
    var idMorosidad = $('input:radio[name=idMorosidad]:checked').val();

    var parametros = {
        "idMorosidad": idMorosidad
    };
    if (confirm("¿Desea borrar esta morosidad?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/morosidad/borrarMorosidad.php',
            type: 'post',
            success: function (response) {
                obtenerMorosidadesCliente();
                limpiarCamposMorosidad();
                $("#resultado").html(response);
            }
        });
    }
}

function actualizarMorosidad() {

    var fechaMorosidad = document.getElementById("txtFechaMorosidad").value;

    if (validarMorosidad() && validarFecha(fechaMorosidad)) {

        var idMorosidad = $('input:radio[name=idMorosidad]:checked').val();
        var idCliente = document.getElementById("cbxCliente").value;
        var monto = document.getElementById("txtMonto").value;
        monto = monto.replace(/₡/g, "");


        var parametros = {
            "idMorosidad": idMorosidad,
            "idCliente": idCliente,
            "fechaMorosidad": obtenerFechaFormatoSQL(fechaMorosidad),
            "monto": monto
        };

        if (confirm("¿Desea modificar esta morosidad?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/morosidad/actualizarMorosidad.php',
                type: 'post',
                success: function (response) {
                    obtenerMorosidadesCliente();
                    limpiarCamposMorosidad();
                    $("#resultado").html(response);

                }
            });
        }
    }
}

function obtenerClientesMorosidades() {

    $.ajax({
        data: '',
        url: '../../actions/morosidad/obtenerClientesMorosidades.php',
        type: 'post',
        success: function (response) {
            $("#clientes").html(response);

        }
    });
}

function obtenerMorosidadesCliente() {
    var idCliente = document.getElementById("cbxCliente").value;

    var parametros = {
        "idCliente": idCliente
    };
    $.ajax({
        data: parametros,
        url: '../../actions/morosidad/obtenerMorosidadesCliente.php',
        type: 'post',
        success: function (response) {
            $("#morosidades").html(response);
        }
    });
}

function obtenerMorosidadesRangoFechas() {
    var fechaInicio = document.getElementById("txtFechaInicio").value;
    var fechaFinal = document.getElementById("txtFechaFinal").value;

    if (validarFecha(fechaInicio) && validarFecha(fechaFinal)) {

        var parametros = {
            "fechaInicio": obtenerFechaFormatoSQL(fechaInicio),
            "fechaFinal": obtenerFechaFormatoSQL(fechaFinal)
        };
        $.ajax({
            data: parametros,
            url: '../../actions/morosidad/obtenerMorosidadesPorRangoFechas.php',
            type: 'post',
            success: function (response) {
                $("#morosidades").html(response);
            }
        });
    }
}

function buscarMorosidad() {

    var iID = $('input:radio[name=idMorosidad]:checked').val();
    $.ajax({
        url: "../../actions/morosidad/buscarMorosidadAction.php",
        type: "POST",
        datatype: "JSON",
        data: {
            valueAction: 1,
            id: iID
        },
        success: function (msg)
        {
            //Cargar los valores en el cuadro de texto
            var txtFechaMorosidad = document.getElementById("txtFechaMorosidad");
            var txtMonto = document.getElementById("txtMonto");

            txtFechaMorosidad.value = obtenerFechaFormatoWeb(msg.fechaMorosidad);
            txtMonto.value = msg.monto;
        }
    });
}


function  limpiarCamposMorosidad() {

//    $("#cbxCliente").val("0");
    $("#txtFechaMorosidad").val("");
    $("#txtMonto").val("");
}


/********************* Seccion de validaciones ************************/
function validarMorosidad() {
//    var idMorosidad = document.getElementById("cbxMorosidad").value;
    var idCliente = document.getElementById("cbxCliente").value;
    var monto = document.getElementById("txtMonto").value;
    var fechaMorosidad = document.getElementById("txtFechaMorosidad").value;
    monto = monto.replace(/₡/g, "");

    if (idCliente === '0') {
        mandarMensaje("Debe seleccionar un cliente");
        cbxCliente.focus();
        return false;
    } else if (($.trim(fechaMorosidad) === "")) {
        mandarMensaje("La fecha es inválida");
        txtFechaMorosidad.focus();
        return false;
    } else if (!(validarNumero(monto)) || ($.trim(monto) === "")) {
        mandarMensaje("El monto es inválido");
        txtMonto.focus();
        return false;
    }

    return true;

}