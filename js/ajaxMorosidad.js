function insertarMorosidad() {

    //var fechaMorosidad = document.getElementById("txtFechaMorosidad").value;

    if (validarMorosidad()) {

        var idCliente = document.getElementById("cbxCliente").value;
        var fechaMorosidad = document.getElementById("txtFechaMorosidad");
        var monto = document.getElementById("txtMonto");

        //monto = monto.replace(/₡/g, "");

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
    //var fechaMorosidad = document.getElementById("fechaMorosidad").value;

    if (validarMorosidad()) {

        var idMorosidad = document.getElementById("cbxMorosidad").value;
        var idCliente = document.getElementById("cbxCliente").value;
        var fechaMorosidad = document.getElementById("txtFechaMorosidad");
        var monto = document.getElementById("txtMonto");

       // monto = monto.replace(/₡/g, "");

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
    $.ajax({
        data: '',
        url: '../../actions/morosidad/obtenerMorosidades.php',
        type: 'post',
        success: function (response) {
            $("#morosidad").html(response);
        }
    });
}

function cargarMorosidad() {

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
            //alert("'txtFechaMorosidad.value()'");
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

    monto = monto.replace(/₡/g, "");

    if (idCliente === '0') {
        mandarMensaje("Debe seleccionar un cliente");
        cbxCliente.focus();
        return false;
    }else if (!(validarNumero(fechaMorosidad)) || ($.trim(fechaMorosidad) === "")) {
        mandarMensaje("La fecha es inválida");
        txtFechaMorosidad.focus();
        return false;
    }else   if (!(validarNumero(monto)) || ($.trim(monto) === "")) {
        mandarMensaje("El monto es inválido");
        txtMonto.focus();
        return false;
    }

    return true;


//    if ($.trim(fechaMorosidad) === '') {
//        mandarMensaje("La fecha es inválida.\nDebe ser dd/mm/yyyy");
//        txtFechaMorosidad.focus();
//        return false;
//    }
}