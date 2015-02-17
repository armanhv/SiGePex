/******************* Metodos CRUD para Credito ***************************/
function insertarCredito() {

    var fechaPagoLimite = document.getElementById("txtFechaPagoLimite").value;

    if (validarCreditos()) {

        var idCliente = document.getElementById("cbxCliente").value;
        var montoLimite = document.getElementById("txtMontoLimite").value;
        montoLimite = montoLimite.replace(/₡/g, "");

        var parametros = {
            "idCliente": idCliente,
            "montoLimite": montoLimite,
            "fechaPagoLimite": obtenerFechaFormatoSQL(fechaPagoLimite)
        };

        if (confirm("¿Desea agregar este credito?")) {

            $.ajax({
                data: parametros,
                url: '../../actions/credito/insertarCreditoAction.php',
                type: 'post',
                success: function (response) {

                    obtenerCreditosCliente();
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

function actualizarCredito() {

    if (validarCreditos()) {

        var idCredito = $('input:radio[name=idCredito]:checked').val();

        var idCliente = document.getElementById("cbxCliente").value;
        var montoLimite = document.getElementById("txtMontoLimite").value;
        var fechaPagoLimite = document.getElementById("txtFechaPagoLimite").value;

        montoLimite = montoLimite.replace(/₡/g, "");

        var parametros = {
            "idCredito": idCredito,
            "idCliente": idCliente,
            "fechaPagoLimite": obtenerFechaFormatoSQL(fechaPagoLimite),
            "montoLimite": montoLimite
        };

        if (confirm("¿ Desea modificar este credito ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/credito/actualizarCreditoAction.php',
                type: 'post',
                success: function (response) {
                    obtenerCreditosCliente();

                    $("#resultado").html(response);
                }
            });
        }
    }
}

function eliminarCredito() {
    var idCredito = $('input:radio[name=idCredito]:checked').val();

    var parametros = {
        "idCredito": idCredito
    };
    if (confirm("¿ Desea borrar este Credito ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/credito/borrarCreditoAction.php',
            type: 'post',
            success: function (response) {

                obtenerCreditosCliente();
                $("#resultado").html(response);
            }
        });

    }
}

function obtenerCreditosCliente() {
    var idCliente = document.getElementById("cbxCliente").value;
    var parametros = {
        "idCliente": idCliente
    };

    $.ajax({
        data: parametros,
        url: '../../actions/credito/obtenerCreditosAction.php',
        type: 'post',
        success: function (response) {
            $("#listaCreditosCliente").html(response);
        }
    });
}

/********************* Seccion de validaciones ************************/
function validarCreditos() {

    var idCliente = document.getElementById("cbxCliente").value;
    var valorFechaPagoLimite = document.getElementById("txtFechaPagoLimite").value;
    var montoLimite = document.getElementById("txtMontoLimite").value;
    montoLimite = montoLimite.replace(/₡/g, "");

    if (idCliente === '0') {
        mandarMensaje("Debe seleccionar un cliente");
        cbxCliente.focus();
        return false;

    } else if ($.trim(valorFechaPagoLimite) === "") {
        mandarMensaje("La fecha es inválida");
        txtFechaPagoLimite.focus();
        return false;
    } else if (!(validarNumero(montoLimite)) || ($.trim(montoLimite) === "")) {
        mandarMensaje("El monto es inválido");
        txtMontoLimite.focus();
        return false;
    }

    return true;
}