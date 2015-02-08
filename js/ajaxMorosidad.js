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
                    limpiarCampos();
                    obtenerMorosidades();
                }
            });
        }
    }
}

function borrarMorosidad() {
    var idMorosidad = document.getElementById("cbxMorosidad").value;

    var parametros = {
        "idMorosidad": idMorosidad
    };

    $.ajax({
        data: parametros,
        url: '../../actions/morosidad/borrarMorosidad.php',
        type: 'post',
        success: function (response) {

            $("#resultado").html(response);
            limpiarCampos();
            obtenerMorosidades();
        }
    });
}

function actualizarMorosidad() {

    if (validarMorosidad()) {

        var idMorosidad = document.getElementById("cbxMorosidad").value;
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
                    limpiarCampos();
                    obtenerMorosidades();
                }
            });
        }
    }
}

function obtenerMorosidades() {
    
    //alert('hola');

    $.ajax({
        data: '',
        url: '../../actions/morosidad/obtenerMorosidades.php',
        type: 'post',
        success: function (response) {
//alert('hola');
            $("#morosidad").html(response);

        },
        error: function (textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);

        }

    });

}

//
//function obtenerMorosidadesCliente() {
//    
//    var idCliente = document.getElementById("cbxMorosidad").value;
//
//    var parametros = {
//        "idCliente": idCliente
//    };
//
//            $('select').on('change', function () {
//                alert(this.value); // or $(this).val()
//            });
//            
//    $.ajax({
//        data: parametros,
//        url: '../../actions/morosidad/obtenerMorosidadesCliente.php',
//        type: 'post',
//        success: function (response) {
//            $("#morosidadCliente").html(response);
//        }
//    });
//}

function buscarMorosidad() {

    var iID = document.getElementById("cbxMorosidad").value;
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


function  limpiarCampos() {

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