function insertarMorosidad() {

    if (validarMorosidad()) {

        var idCliente = document.getElementById("cbxCliente").value;
        var fechaMorosidad = document.getElementById("txtFechaMorosidad");
        var monto = document.getElementById("txtMonto");

        var parametros = {
            "idCliente": idCliente,
            "fechaMorosidad": fechaMorosidad.value,
            "monto": monto.value
        };

        if (confirm("¿Desea agregar esta morosidad?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/morosidad/insertarMorosidad.php',
                type: 'post',
                success: function (response) {

                    $("#resultado").html(response);
                    limpiarCamposMorosidad();
                    obtenerMorosidadesCliente();
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

    $.ajax({
        data: parametros,
        url: '../../actions/morosidad/borrarMorosidad.php',
        type: 'post',
        success: function (response) {

            $("#resultado").html(response);
            limpiarCamposMorosidad();
            obtenerMorosidadesCliente();
        }
    });
}

function actualizarMorosidad() {

    if (validarMorosidad()) {

        var idMorosidad = $('input:radio[name=idMorosidad]:checked').val();
        var idCliente = document.getElementById("cbxCliente").value;
        var fechaMorosidad = document.getElementById("txtFechaMorosidad");
        var monto = document.getElementById("txtMonto");

        var parametros = {
            "idMorosidad": idMorosidad,
            "idCliente": idCliente,
            "fechaMorosidad": fechaMorosidad.value,
            "monto": monto.value
        };

        if (confirm("¿Desea modificar esta morosidad?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/morosidad/actualizarMorosidad.php',
                type: 'post',
                success: function (response) {

                    $("#resultado").html(response);
                    limpiarCamposMorosidad();
                    obtenerMorosidadesCliente();
                }
            });
        }
    }
}

function obtenerClientesMorosidades() {

    //alert('hola');

    $.ajax({
        data: '',
        url: '../../actions/morosidad/obtenerClientesMorosidades.php',
        type: 'post',
        success: function (response) {
//alert('hola');
            $("#clientes").html(response);

        }
    });

}


function obtenerMorosidadesCliente() {
    var idCliente = document.getElementById("cbxCliente").value;

    // alert("entro a obtener morosidades idCliente="+idCliente);

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

    // alert("entro a obtener morosidades idCliente="+idCliente);

    var parametros = {
        "fechaInicio": fechaInicio,
        "fechaFinal":fechaFinal
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

            txtFechaMorosidad.value = msg.fechaMorosidad;
            txtMonto.value = msg.monto;
        }
    });
}


function  limpiarCamposMorosidad() {

    var cbxCliente = document.getElementById("cbxCliente").value;
    var txtFechaMorosidad = document.getElementById("txtFechaMorosidad");
    var txtMonto = document.getElementById("txtMonto");

    cbxCliente.value = "";
    txtFechaMorosidad.value = "";
    txtMonto.value = "";

}


/********************* Seccion de validaciones ************************/
function validarMorosidad() {
//    var idMorosidad = document.getElementById("cbxMorosidad").value;
    var idCliente = document.getElementById("cbxCliente").value;
    var monto = document.getElementById("txtMonto").value;
    var fechaMorosidad = document.getElementById("txtFechaMorosidad").value;

    if (idCliente === '0') {
        mandarMensaje("Debe seleccionar un cliente");
        cbxCliente.focus();
        return false;
    } else if (($.trim(fechaMorosidad) === "")) {
        mandarMensaje("La fecha es inválida");
        txtFechaMorosidad.focus();
        return false;

    }

    else if (!(validarNumero(monto)) || ($.trim(monto) === "")) {
        mandarMensaje("El monto es inválido");
        txtMonto.focus();
        return false;
    }

    return true;

}