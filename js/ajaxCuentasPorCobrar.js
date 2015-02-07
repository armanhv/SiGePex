/******************* Metodos CRUD para Cuentas Por Cobrar ***************************/
function insertarCuentaPorCobrar() {
    if (validarCuentasPorCobrar()) {
        var idEmpleado = document.getElementById("cbxEmpleado").value;
        var idCliente = document.getElementById("cbxCliente").value;
        var fechaPago = document.getElementById("txtFechaPago");
        var monto = document.getElementById("txtMonto");

        var parametros = {
            "idEmpleado": idEmpleado,
            "idCliente": idCliente,
            "fechaPago": fechaPago.value,
            "monto": monto.value
        };
        if (confirm("¿Desea agregar esta cuenta por cobrar?")) {

            $.ajax({
                data: parametros,
                url: '../../actions/cuentasporcobrar/insertarCuentaPorCobrarAction.php',
                type: 'post',
                success: function (response) {

                    $("#resultado").html(response);
                    limpiarCampos();
                    obtenerCuentasPorCobrar();
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
    var idCuentasPorCobrar = document.getElementById("cbxCuentasPorCobrar").value;

    var parametros = {
        "idCuentasPorCobrar": idCuentasPorCobrar
    };

    $.ajax({
        data: parametros,
        url: '../../actions/cuentasporcobrar/borrarCuentaPorCobrarAction.php',
        type: 'post',
        success: function (response) {

            $("#resultado").html(response);
            limpiarCampos();
            obtenerCuentasPorCobrar();
        },
        error: function (textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }
    });
}

function actualizarCuentaPorCobrar() {
    if (validarCuentasPorCobrar()) {
        var idCuentasPorCobrar = document.getElementById("cbxCuentasPorCobrar").value;
        var idEmpleado = document.getElementById("cbxEmpleado").value;
        var idCliente = document.getElementById("cbxCliente").value;
        var fechaPago = document.getElementById("txtFechaPago");
        var monto = document.getElementById("txtMonto");

        var parametros = {
            "idCuentasPorCobrar": idCuentasPorCobrar,
            "idEmpleado": idEmpleado,
            "idCliente": idCliente,
            "fechaPago": fechaPago.value,
            "monto": monto.value
        };
        if (confirm("¿Desea modificar esta cuenta por cobrar?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/cuentasporcobrar/actualizarCuentaPorCobrarAction.php',
                type: 'post',
                success: function (response) {

                    $("#resultado").html(response);
                    limpiarCampos();
                    obtenerCuentasPorCobrar();
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


    $.ajax({
        data: '',
        url: '../../actions/cuentasporcobrar/obtenerCuentasPorCobrarAction.php',
        type: 'post',
        success: function (response) {
            $("#cuentasPorCobrar").html(response);

        },
        error: function (textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);

        }

    });

}

function buscarCuentasPorCobrar() {

    var iID = document.getElementById("cbxCuentasPorCobrar").value;

    $.ajax({
        url: "../../actions/cuentasporcobrar/buscarCuentasPorCobrarAction.php",
        type: "POST",
        datatype: "JSON",
        data: {
            valueAction: 1,
            id: iID
        },
        success: function (msg)
        {
            var cbxEmpleado = document.getElementById("cbxEmpleado").value;
            var cbxCliente = document.getElementById("cbxCliente").value;
            var txtFechaPago = document.getElementById("txtFechaPago");
            var txtMonto = document.getElementById("txtMonto");

            cbxEmpleado.value = msg.idEmpleado;
            cbxCliente.value = msg.idCliente;
            txtFechaPago.value = msg.fechaPago;
            txtMonto.value = msg.monto;

        },
        error: function (textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }
    });
}

//----------------

function cargarCuentasPorCobrar() {
    alert('aqui');
    //Obtener los valores
    var idCuentasPorCobrar = document.getElementById("cbxCuentasPorCobrar").value;
alert('aqui');
    var parametros = {
        "idCuentasPorCobrar": idCuentasPorCobrar
    };
alert('aqui');
    $.ajax({
        data: parametros,
        url: '../../actions/cuentasporcobrar/cargarCuentasPorCobrar.php',
        type: 'post',
        success: function (response) {
            $("#tablaCuentasPorCobrar").html(response);
            alert('fin');
        }
    });
}

function obtenerEmpleadosCuentaCobrar() {
    
    $.ajax({
        data: '',
        url: '../../actions/cuentasporcobrar/obtenerEmpleadosCuentaCobrar.php',
        type: 'post',
        success: function (response) {
            $("#EmpleadoCuenta").html(response);
        }
    });
}

function obtenerClientesMorosos() {
    
    $.ajax({
        data: '',
        url: '../../actions/cuentasporcobrar/obtenerClientesMorosos.php',
        type: 'post',
        success: function (response) {
            
            $("#Cliente").html(response);
        }
    });
}

//----------------

function  limpiarCampos() {

    var cbxEmpleado = document.getElementById("cbxEmpleado").value;
    var cbxCliente = document.getElementById("cbxCliente").value;
    var txtFechaPago = document.getElementById("txtFechaPago");
    var txtMonto = document.getElementById("txtMonto");

    cbxEmpleado.value = "";
    cbxCliente.value = "";
    txtFechaPago.value = "";
    txtMonto.value = "";

}


/********************* Seccion de validaciones ************************/
function validarCuentasPorCobrar() {

    var idEmpleado = document.getElementById("cbxEmpleado").value;
    var idCliente = document.getElementById("cbxCliente").value;
    var fechaPago = document.getElementById("txtFechaPago").value;
    var monto = document.getElementById("txtMonto").value;

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