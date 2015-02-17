/******************* Metodos CRUD para Servicio ***************************/
function insertarServicio() {

    var fecha = $('#txtFechaServicio').val();

    if (validarServicio() && validarFecha(fecha)) {

        var idCliente = $('#cbxCliente').val();
        var idEmpleado = $('#cbxEmpleadoSalario').val();
        var idTipoServicio = $('#cbxTipoServicios').val();
        var formaPago = $('#cbxTipoPago').val();
        var descripcion = $('#txtDescripcionServicio').val();
        var descripcionCargoExtra = $('#txtDescripcionCargoExtra').val();
        var cargosExtra = $('#txtCargosExtra').val();
        var total = $('#montoTotal').text();
        var numBoucher = $('#txtNumBoucher').val();

        cargosExtra = cargosExtra.replace(/₡/g, "");
        total = total.replace(/₡/g, "");

        var parametros = {
            "idCliente": idCliente,
            "idEmpleado": idEmpleado,
            "idTipoServicio": idTipoServicio,
            "fechaServicio": obtenerFechaFormatoSQL(fecha),
            "formaPago": formaPago,
            "descripcion": descripcion,
            "cargosExtra": cargosExtra,
            "total": total,
            "numBoucher": numBoucher,
            "descripcionCargoExtra": descripcionCargoExtra
        };

        if (confirm("¿ Desea agregar este servicio ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/servicio/insertarServicio.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios
                    $('#cbxCliente').val("0");
                    $('#cbxEmpleadoSalario').val("0");
                    $('#cbxTipoServicios').val("0");
                    $('#cbxTipoPago').val("0");
                    $('#txtDescripcionServicio').val("");
                    $('#txtDescripcionCargoExtra').val("");
                    $('#txtCargosExtra').val("");
                    $('#txtFechaServicio').val("");
                    $('#txtNumBoucher').val("");
                    $('#montoTotal').text("₡ 0");
                    document.getElementById("trBoucher").style.display = "none";
                    obtenerServicios();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function actualizarServicio() {

    var fecha = $('#txtFechaServicio').val();

    if (validarServicio() && validarFecha(fecha)) {

        var idCliente = $('#cbxCliente').val();
        var idEmpleado = $('#cbxEmpleadoSalario').val();
        var idTipoServicio = $('#cbxTipoServicios').val();
        var formaPago = $('#cbxTipoPago').val();
        var descripcion = $('#txtDescripcionServicio').val();
        var idServicio = document.getElementById("cbxServicios").value;
        var cargosExtra = $('#txtCargosExtra').val();
        var total = $('#montoTotal').text();
        var numBoucher = $('#txtNumBoucher').val();
        var descripcionCargoExtra = $('#txtDescripcionCargoExtra').val();
        cargosExtra = cargosExtra.replace(/₡/g, "");
        total = total.replace(/₡/g, "");

        var parametros = {
            "idServicio": idServicio,
            "idCliente": idCliente,
            "idEmpleado": idEmpleado,
            "idTipoServicio": idTipoServicio,
            "fechaServicio": obtenerFechaFormatoSQL(fecha),
            "formaPago": formaPago,
            "descripcion": descripcion,
            "cargosExtra": cargosExtra,
            "total": total,
            "numBoucher": numBoucher,
            "descripcionCargoExtra": descripcionCargoExtra
        };

        if (confirm("¿ Desea modificar este servicio ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/servicio/actualizarServicio.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios
                    $('#cbxCliente').val("0");
                    $('#cbxEmpleadoSalario').val("0");
                    $('#cbxTipoServicios').val("0");
                    $('#cbxTipoPago').val("0");
                    $('#txtDescripcionServicio').val("");
                    $('#txtCargosExtra').val("");
                    $('#txtFechaServicio').val("");
                    $('#txtNumBoucher').val("");
                    $('#montoTotal').text("₡ 0");
                    $('#txtDescripcionCargoExtra').val("");
                    document.getElementById("trBoucher").style.display = "none";
                    obtenerServicios();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function borrarServicio() {
    var idServicio = document.getElementById("cbxServicios").value;

    var parametros = {
        "idServicio": idServicio
    };
    if (confirm("¿ Desea borrar este servicio ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/servicio/eliminarServicio.php',
            type: 'post',
            success: function (response) {
                //se recarga el combo y limpan los espacios
                $('#cbxCliente').val("0");
                $('#cbxEmpleadoSalario').val("0");
                $('#cbxTipoServicios').val("0");
                $('#cbxTipoPago').val("0");
                $('#txtDescripcionServicio').val("");
                $('#txtCargosExtra').val("");
                $('#txtFechaServicio').val("");
                $('#txtNumBoucher').val("");
                $('#montoTotal').text("₡ 0");
                $('#txtDescripcionCargoExtra').val("");
                document.getElementById("trBoucher").style.display = "none";
                obtenerServicios();
                $("#resultado").html(response);
            }});
    }
}

function obtenerServicios() {
    $.ajax({
        data: '',
        url: '../../actions/servicio/obtenerServicios.php',
        type: 'post',
        success: function (response) {
            $("#servicios").html(response);
        }
    });
}

function cargarServicios() {
    //Obtener los valores
    var idServicio = document.getElementById("cbxServicios").value;

    var parametros = {
        "idServicio": idServicio
    };

    $.ajax({
        data: parametros,
        url: '../../actions/servicio/cargarCamposServicio.php',
        type: 'post',
        success: function (response) {
            $("#tablaServicios").html(response);
        }
    });
}

function mostrarTotal() {

    var idTipoServicio = $('#cbxTipoServicios').val();
    var cargosExtra = $('#txtCargosExtra').val();

    var parametros = {
        "idTipoServicio": idTipoServicio,
        "cargosExtra": cargosExtra
    };

    $.ajax({
        data: parametros,
        url: '../../actions/servicio/sumarTotal.php',
        type: 'post',
        success: function (response) {
            $("#montoTotal").html(response);
        }});
}

function obtenerEmpleadosConServicios() {
    $.ajax({
        data: '',
        url: '../../actions/servicio/obtenerEmpleadosConServicios.php',
        type: 'post',
        success: function (response) {
            $("#empleados").html(response);
        }
    });
}

function cargarServiciosEmpleado() {

    $('#resultado').text("");
    //Obtener los valores
    var idEmpleado = document.getElementById("cbxEmpleadoConServicio").value;

    var parametros = {
        "idEmpleado": idEmpleado
    };

    $.ajax({
        data: parametros,
        url: '../../actions/servicio/cargarServiciosPendientes.php',
        type: 'post',
        success: function (response) {
            $("#tablaServiciosPendientes").html(response);
        }
    });
}

function procesarServicio(idServicio) {

    var parametros = {"idServicio": idServicio};

    if (confirm("¿ Desea modificar el estado de este servicio ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/servicio/cambiarEstadoServicio.php',
            type: 'post',
            success: function (response) {
                //se recarga el combo y limpan los espacios
                $('#cbxEmpleadoConServicio').val("0");
                obtenerEmpleadosConServicios();
                cargarServiciosEmpleado();
                $("#resultado").html(response);
            }
        });
    }
}

/********************* Seccion de validaciones ************************/
function validarServicio() {

    var expresionAlfaNumerica = /^[a-zA-Z0-9]+$/;
    var idCliente = $('#cbxCliente').val();
    var idEmpleado = $('#cbxEmpleadoSalario').val();
    var idTipoServicio = $('#cbxTipoServicios').val();
    var fechaServicio = $('#txtFechaServicio').val();
    var formaPago = $('#cbxTipoPago').val();
    var descripcion = $('#txtDescripcionServicio').val();
    var cargosExtra = $('#txtCargosExtra').val();
    var numBoucher = $('#txtNumBoucher').val();
    var descripcionCargoExtra = $('#txtDescripcionCargoExtra').val();
    cargosExtra = cargosExtra.replace(/₡/g, "");

    if (idCliente === '0') {
        mandarMensaje("Elija un cliente para el servicio");
        cbxCliente.focus();
        return false;
    }

    if (idEmpleado === '0') {
        mandarMensaje("Elija un empleado para el servicio");
        cbxEmpleadoSalario.focus();
        return false;
    }

    if (idTipoServicio === '0') {
        mandarMensaje("Elija un tipo de servicio a contratar");
        cbxTipoServicios.focus();
        return false;
    }

    if ($.trim(fechaServicio) === "") {
        mandarMensaje("La fecha del servicio esta vacía");
        txtFechaServicio.focus();
        return false;
    }

    if (formaPago === '0') {
        mandarMensaje("Debe elegir una forma de pago");
        cbxTipoPago.focus();
        return false;
    }

    if (formaPago === '2') {
        if (!(numBoucher.match(expresionAlfaNumerica)) || ($.trim(numBoucher) === '')) {
            mandarMensaje("El número de boucher es inválido");
            txtNumBoucher.focus();
            return false;
        }
    }

    if (!(validarNumero(cargosExtra)) || ($.trim(cargosExtra) === "")) {
        mandarMensaje("El precio del servicio es inválido");
        txtCargosExtra.focus();
        return false;
    }

    if ($.trim(descripcionCargoExtra) === "" || (descripcionCargoExtra.length <= 5)) {
        mandarMensaje("Los detalles del cargo extra son inválidos.");
        txtDescripcionCargoExtra.focus();
        return false;
    }

    if ($.trim(descripcion) === "" || (descripcion.length <= 5)) {
        mandarMensaje("Los detalles del servicio son inválidos.");
        txtDescripcionServicio.focus();
        return false;
    }

    return true;
}

function cambiarDisplay() {

    var formaPago = $('#cbxTipoPago').val();
    var filaBoucher = document.getElementById("trBoucher");

    if (formaPago === '2') {
        filaBoucher.style.display = ""; //mostrar fila Boucher
    } else if (formaPago === '1') {
        filaBoucher.style.display = "none"; //ocultar fila Boucher
    } else {
        filaBoucher.style.display = "none"; //ocultar fila Boucher
    }

}