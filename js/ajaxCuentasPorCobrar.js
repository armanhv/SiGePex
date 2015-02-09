/******************* Metodos CRUD para Cuentas Por Cobrar ***************************/
function insertarCuentaPorCobrar() {

    var fechaPago = document.getElementById("txtFechaPago").value;

    if (validarCuentasPorCobrar() && validarFecha(fechaPago)) {

        var idEmpleado = document.getElementById("cbxEmpleado").value;
        var idCliente = document.getElementById("cbxCliente").value;
        var monto = document.getElementById("txtMonto").value;
        monto = monto.replace(/₡/g, "");

        var parametros = {
            "idEmpleado": idEmpleado,
            "idCliente": idCliente,
            "fechaPago": obtenerFechaFormatoSQL(fechaPago),
            "monto": monto
        };
        if (confirm("¿Desea agregar esta cuenta por cobrar?")) {

            $.ajax({
                data: parametros,
                url: '../../actions/cuentasporcobrar/insertarCuentaPorCobrarAction.php',
                type: 'post',
                success: function (response) {
                    limpiarCamposCuentas();
                    obtenerCuentasPorCobrar();
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

function borrarCuentaPorCobrar() {
    var idCuentasPorCobrar = $('input:radio[name=idCuentaPorCobrar]:checked').val();

    var parametros = {
        "idCuentasPorCobrar": idCuentasPorCobrar
    };

    $.ajax({
        data: parametros,
        url: '../../actions/cuentasporcobrar/borrarCuentaPorCobrarAction.php',
        type: 'post',
        success: function (response) {

            $("#resultado").html(response);
            limpiarCamposCuentas();
            obtenerCuentasPorCobrar();
        },
        error: function (textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }
    });
}

function actualizarCuentaPorCobrar() {

    var fechaPago = document.getElementById("txtFechaPago").value;

    if (validarCuentasPorCobrar() && validarFecha(fechaPago)) {

        var idCuentasPorCobrar = $('input:radio[name=idCuentaPorCobrar]:checked').val();
        var idEmpleado = document.getElementById("cbxEmpleado").value;
        var idCliente = document.getElementById("cbxCliente").value;
        var monto = document.getElementById("txtMonto").value;
        monto = monto.replace(/₡/g, "");

        var parametros = {
            "idCuentasPorCobrar": idCuentasPorCobrar,
            "idEmpleado": idEmpleado,
            "idCliente": idCliente,
            "fechaPago": obtenerFechaFormatoSQL(fechaPago),
            "monto": monto
        };

        if (confirm("¿Desea modificar esta cuenta por cobrar?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/cuentasporcobrar/actualizarCuentaPorCobrarAction.php',
                type: 'post',
                success: function (response) {
                    limpiarCamposCuentas();
                    obtenerCuentasPorCobrar();
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

function obtenerCuentasPorCobrar() {

    var idCliente = document.getElementById("cbxCliente").value;

    var parametros = {
        "idCliente": idCliente
    };
    $.ajax({
        data: parametros,
        url: '../../actions/cuentasporcobrar/obtenerCuentasPorCobrarAction.php',
        type: 'post',
        success: function (response) {
            $("#cuentasPorCobrar").html(response);

        }
    });

}

function cargarCuentasPorCobrar() {
    var idCuentasPorCobrar = $('input:radio[name=idCuentaPorCobrar]:checked').val();

    var parametros = {
        "idCuentasPorCobrar": idCuentasPorCobrar
    };
    $.ajax({
        data: parametros,
        url: '../../actions/cuentasporcobrar/cargarCuentasPorCobrar.php',
        type: 'post',
        success: function (response) {
            $("#tablaCuentasPorCobrar").html(response);
        }
    });
}

function obtenerEmpleadosCuentaCobrar() {

    $.ajax({
        data: '',
        url: '../../actions/cuentasporcobrar/obtenerEmpleadosCuentaCobrar.php',
        type: 'post',
        success: function (response) {
            $("#empleados").html(response);
        }
    });
}

function obtenerClientesCuentas() {

    $.ajax({
        data: '',
        url: '../../actions/cuentasporcobrar/obtenerClientesCuentas.php',
        type: 'post',
        success: function (response) {

            $("#clientes").html(response);
        }
    });
}

function limpiarCamposCuentas() {
    $("#cbxEmpleado").val("0");
    $("#cbxCliente").val("0");
    $("#txtFechaPago").val("");
    $("#txtMonto").val("");
}
function verificarCuentasPorCobrarFechaPago(){
      $.ajax({
        data: '',
        url: 'actions/cuentasporcobrar/verificarCuentasPorCobrarMorosidad.php',
        type: 'post',
        success: function (response) {
            $("#empleados").html(response);
        }
    });
    
}

/********************* Seccion de validaciones ************************/
function validarCuentasPorCobrar() {
    var idEmpleado = document.getElementById("cbxEmpleado").value;
    var idCliente = document.getElementById("cbxCliente").value;
    var fechaPago = document.getElementById("txtFechaPago").value;
    var monto = document.getElementById("txtMonto").value;
    monto = monto.replace(/₡/g, "");

    if (idEmpleado === '0') {
        mandarMensaje("Debe seleccionar un empleado");
        cbxEmpleado.focus();
        return false;
    } else if (idCliente === '0') {
        mandarMensaje("Debe seleccionar un cliente");
        cbxCliente.focus();
        return false;

    } else if ($.trim(fechaPago) === "") {
        mandarMensaje("La fecha es inválida");
        txtFechaPago.focus();
        return false;
    } else if (!(validarNumero(monto)) || ($.trim(monto) === "")) {
        mandarMensaje("El monto es inválido");
        txtMonto.focus();
        return false;
    }

    return true;
}