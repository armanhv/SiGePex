/******************* Metodos CRUD para Ingresos ***************************/
function insertarIngresos() {

    var fecha = $('#txtFechaIngreso').val();
    if (validarIngreso() && validarFecha(fecha)) {

        var monto = $('#txtMonto').val();
        monto = monto.replace(/₡/g, "");


        var parametros = {
            "idEmpleado": $('#cbxEmpleadoIngreso').val(),
            "idCliente": $('#cbxClienteIngreso').val(),
            "tipoPago": $('#cbxTipoPago').val(),
            "numBoucher": $('#txtNumBoucher').val(),
            "monto": monto,
            "fechaIngreso": obtenerFechaFormatoSQL(fecha)
        };

        if (confirm("¿ Desea agregar este ingreso ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/ingresos/insertarIngresos.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios
                    $('input[type=text]').val("");
                    $("#cbxEmpleadoIngreso").val("0");
                    $("#cbxClienteIngreso").val("0");
                    $("#cbxTipoPago").val("0");
                    obtenerIngresos();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function actualizarIngresos() {

    var fecha = $('#txtFechaIngreso').val();
    if (validarIngreso() && validarFecha(fecha)) {

        var monto = $('#txtMonto').val();
        monto = monto.replace(/₡/g, "");
        var idIngresos = document.getElementById("cbxIngresos").value;


        var parametros = {
            "idIngresos": idIngresos,
            "idEmpleado": $('#cbxEmpleadoIngreso').val(),
            "idCliente": $('#cbxClienteIngreso').val(),
            "tipoPago": $('#cbxTipoPago').val(),
            "numBoucher": $('#txtNumBoucher').val(),
            "monto": monto,
            "fechaIngreso": obtenerFechaFormatoSQL(fecha)
        };

        if (confirm("¿ Desea modificar este ingreso ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/ingresos/actualizarIngresos.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios     $('input[type=text]').val("");
                    $("#cbxEmpleadoIngreso").val("0");
                    $("#cbxClienteIngreso").val("0");
                    $("#cbxTipoPago").val("0");
                    obtenerIngresos();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function borrarIngresos() {
    var idIngresos = document.getElementById("cbxIngresos").value;

    var parametros = {
        "idIngresos": idIngresos
    };
    if (confirm("¿ Desea borrar este ingreso ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/ingresos/borrarIngresos.php',
            type: 'post',
            success: function (response) {
                //se recarga el combo y limpan los espacios
                $('input[type=text]').val("");
                $("#cbxEmpleadoIngreso").val("0");
                $("#cbxClienteIngreso").val("0");
                $("#cbxTipoPago").val("0");
                obtenerIngresos();
                $("#resultado").html(response);
            }});
    }
}

function obtenerIngresos() {
    $.ajax({
        data: '',
        url: '../../actions/ingresos/obtenerIngresos.php',
        type: 'post',
        success: function (response) {
            $("#ingresos").html(response);
        }
    });
}

function obtenerEmpleadosIngresos() {
    $.ajax({
        data: '',
        url: '../../actions/ingresos/obtenerEmpleadosIngresos.php',
        type: 'post',
        success: function (response) {
            $("#empleados").html(response);
        }
    });
}

function obtenerClientesIngresos() {
    $.ajax({
        data: '',
        url: '../../actions/ingresos/obtenerClientesIngresos.php',
        type: 'post',
        success: function (response) {
            $("#clientes").html(response);
        }
    });
}

function cargarIngresos() {
    //Obtener los valores
    var idIngresos = document.getElementById("cbxIngresos").value;

    var parametros = {
        "idIngresos": idIngresos
    };

    $.ajax({
        data: parametros,
        url: '../../actions/ingresos/cargarIngresos.php',
        type: 'post',
        success: function (response) {
            $("#tablaIngresos").html(response);
        }
    });
}

function obtenerTipoPago() {

    $.ajax({
        data: '',
        url: '../../actions/ingresos/obtenerTipoPago.php',
        type: 'post',
        success: function (response) {
            $("#tipoPagos").html(response);
        }
    });
}

/********************* Seccion de validaciones ************************/
function validarIngreso() {
    var expresionAlfaNumerica = /^[a-zA-Z0-9]+$/;

    var idEmpleado = $('#cbxEmpleadoIngreso').val();
    var idCliente = $('#cbxClienteIngreso').val();
    var tipoPago = $('#cbxTipoPago').val();
    var numBoucher = $('#txtNumBoucher').val();
    var monto = $('#txtMonto').val();
    var fechaIngreso = $('#txtFechaIngreso').val();
    monto = monto.replace(/₡/g, "");

    if (idEmpleado === '0') {
        mandarMensaje("Elija un empleado para el ingreso");
        cbxEmpleadoIngreso.focus();
        return false;
    }

    if (idCliente === '0') {
        mandarMensaje("Elija un cliente para el ingreso");
        cbxClienteIngreso.focus();
        return false;
    }

    if (tipoPago === '0') {
        mandarMensaje("Elija un tipo de pago para el ingreso");
        cbxTipoPago.focus();
        return false;
    }

    if (!(numBoucher.match(expresionAlfaNumerica)) || ($.trim(numBoucher) === '')) {
        mandarMensaje("El número de boucher es inválido");
        txtNumBoucher.focus();
        return false;
    }

    if (!(validarNumero(monto)) || ($.trim(monto) === "")) {
        mandarMensaje("El monto del ingreso es inválido");
        txtMonto.focus();
        return false;
    }

    if ($.trim(fechaIngreso) === '') {
        mandarMensaje("La fecha del ingreso es inválida.\nDebe ser dd/mm/yyyy");
        txtFechaIngreso.focus();
        return false;
    }

    return true;
}
