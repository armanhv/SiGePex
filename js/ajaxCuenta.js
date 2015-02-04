/******************* Metodos CRUD para CUENTA ***************************/
function insertarCuenta() {
    if (validarCuenta()) {

        var parametros = {
            "numeroCuenta": $('#txtNumeroCuenta').val(),
            "nombreBanco": $('#cbxBancos').val(),
            "tipoCuenta": $('#cbxTipoCuenta').val(),
            "numeroSimpe": $('#txtnumeroSimpe').val(),
            "idEmpleado": $('#cbxEmpleadoCuenta').val()
        };

        if (confirm("¿ Desea agregar esta Cuenta ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/cuenta/insertarCuenta.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios
                    $('input[type=text]').val("");
                    obtenerCuentas();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function actualizarCuenta() {

    if (validarCuenta()) {

        var idCuenta = document.getElementById("cbxCuentas").value;
        var parametros = {
            "idCuenta": idCuenta,
            "numeroCuenta": $('#txtNumeroCuenta').val(),
            "nombreBanco": $('#cbxBancos').val(),
            "tipoCuenta": $('#cbxTipoCuenta').val(),
            "numeroSimpe": $('#txtnumeroSimpe').val(),
            "idEmpleado": $('#cbxEmpleadoCuenta').val()
        };

        if (confirm("¿ Desea modificar esta Cuenta ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/cuenta/actualizarCuenta.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios
                    $('input[type=text]').val("");
                    obtenerCuentas();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function borrarCuenta() {
    var idCuenta = document.getElementById("cbxCuentas").value;

    var parametros = {
        "idCuenta": idCuenta
    };

    if (confirm("¿ Desea borrar esta Cuenta ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/cuenta/borrarCuenta.php',
            type: 'post',
            success: function (response) {
                //se recarga el combo y limpan los espacios
                $('input[type=text]').val("");
                obtenerCuentas();
                $("#resultado").html(response);
            }
        });
    }
}

function obtenerCuentas() {
    $.ajax({
        data: '',
        url: '../../actions/cuenta/obtenerCuentas.php',
        type: 'post',
        success: function (response) {
            $("#cuentas").html(response);
        }
    });
}

function obtenerEmpleadosCuentas() {
    $.ajax({
        data: '',
        url: '../../actions/cuenta/obtenerEmpleadosCuenta.php',
        type: 'post',
        success: function (response) {
            $("#empleados").html(response);
        }
    });
}

function cargarCuentas() {
    //Obtener los valores
    var idCuenta = document.getElementById("cbxCuentas").value;

    var parametros = {
        "idCuenta": idCuenta
    };

    $.ajax({
        data: parametros,
        url: '../../actions/cuenta/cargarCamposCuenta.php',
        type: 'post',
        success: function (response) {
            $("#tablaCuenta").html(response);
        }
    });
}

function validarCuenta() {
    var expresionNumeros = '^[0-9]+$';

    if ($('#cbxEmpleadoCuenta').val() === '0') {
        mandarMensaje("Debe elejir un empleado");
        cbxEmpleadoCuenta.focus();
        return false;
    }

    if (!($('#txtNumeroCuenta').val().match(expresionNumeros)) || ($.trim($('#txtNumeroCuenta').val()) === '')) {
        mandarMensaje("El número de cuenta es inválido");
        txtNumeroCuenta.focus();
        return false;
    }

    if ($('#cbxBancos').val() === '0') {
        mandarMensaje("Debe elejir un banco");
        cbxBancos.focus();
        return false;
    }

    if ($('#cbxTipoCuenta').val() === '0') {
        mandarMensaje("Debe elejir un tipo de cuenta");
        cbxTipoCuenta.focus();
        return false;
    }

    if (!($('#txtnumeroSimpe').val().match(expresionNumeros)) || ($.trim($('#txtnumeroSimpe').val()) === '')) {
        mandarMensaje("El número simpe es inválido");
        txtnumeroSimpe.focus();
        return false;
    }

    return true;
}

