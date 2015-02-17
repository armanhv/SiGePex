/******************* Metodos CRUD para Pago de periodo ***************************/
function insertarPago() {

    var fechaInicio = document.getElementById("txtFechaInicio").value;
    var fechaFinal = document.getElementById("txtFechaFinal").value;

    if (validarPago() && validarFecha(fechaInicio) && validarFecha(fechaFinal)) {

        var idEmpleado = document.getElementById("cbxEmpleadoPago").value;
        var salarioBasePeriodo = document.getElementById("txtSalarioBasePeriodo").value;
        var horasExtra = document.getElementById("txtHorasExtrasPeriodo").value;
        var rebajos = document.getElementById("txtRebajos").value;
        var descripcionRebajo = document.getElementById("txtDescripcionRebajo").value;

        salarioBasePeriodo = salarioBasePeriodo.replace(/₡/g, "");
        horasExtra = horasExtra.replace(/₡/g, "");
        rebajos = rebajos.replace(/₡/g, "");

        var parametros = {
            "idEmpleado": idEmpleado,
            "fechaInicio": obtenerFechaFormatoSQL(fechaInicio),
            "fechaFinal": obtenerFechaFormatoSQL(fechaFinal),
            "salarioBasePeriodo": salarioBasePeriodo,
            "horasExtra": horasExtra,
            "rebajos": rebajos,
            "descripcionRebajo": descripcionRebajo
        };

        if (confirm("¿ Desea agregar este pago ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/pagoPeriodo/insertarPago.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios
                    $("#txtFechaInicio").val("");
                    $("#txtFechaFinal").val("");
                    $("#txtSalarioBasePeriodo").val("");
                    $("#txtHorasExtrasPeriodo").val("");
                    $("#txtRebajos").val("");
                    $("#txtDescripcionRebajo").val("");
                    obtenerPagos();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function borrarPago() {
    var idPago = document.getElementById("cbxPagos").value;

    var parametros = {
        "idPago": idPago
    };

    if (confirm("¿ Desea borrar este pago ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/pagoPeriodo/borrarPago.php',
            type: 'post',
            success: function (response) {
                //se recarga el combo y limpan los espacios
                $("#txtFechaInicio").val("");
                $("#txtFechaFinal").val("");
                $("#txtSalarioBasePeriodo").val("");
                $("#txtHorasExtrasPeriodo").val("");
                $("#txtRebajos").val("");
                $("#txtDescripcionRebajo").val("");
                obtenerPagos();
                $("#resultado").html(response);
            }
        });
    }
}

function actualizarPago() {

    var fechaInicio = document.getElementById("txtFechaInicio").value;
    var fechaFinal = document.getElementById("txtFechaFinal").value;

    if (validarPago() && validarFecha(fechaInicio) && validarFecha(fechaFinal)) {

        var idPago = document.getElementById("cbxPagos").value;
        var idEmpleado = document.getElementById("cbxEmpleadoPago").value;
        var salarioBasePeriodo = document.getElementById("txtSalarioBasePeriodo").value;
        var horasExtra = document.getElementById("txtHorasExtrasPeriodo").value;
        var rebajos = document.getElementById("txtRebajos").value;
        var descripcionRebajo = document.getElementById("txtDescripcionRebajo").value;

        salarioBasePeriodo = salarioBasePeriodo.replace(/₡/g, "");
        horasExtra = horasExtra.replace(/₡/g, "");
        rebajos = rebajos.replace(/₡/g, "");

        var parametros = {
            "idPago": idPago,
            "idEmpleado": idEmpleado,
            "fechaInicio": obtenerFechaFormatoSQL(fechaInicio),
            "fechaFinal": obtenerFechaFormatoSQL(fechaFinal),
            "salarioBasePeriodo": salarioBasePeriodo,
            "horasExtra": horasExtra,
            "rebajos": rebajos,
            "descripcionRebajo": descripcionRebajo
        };

        if (confirm("¿ Desea modificar este pago ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/pagoPeriodo/actualizarPago.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios
                    $("#txtFechaInicio").val("");
                    $("#txtFechaFinal").val("");
                    $("#txtSalarioBasePeriodo").val("");
                    $("#txtHorasExtrasPeriodo").val("");
                    $("#txtRebajos").val("");
                    $("#txtDescripcionRebajo").val("");
                    obtenerPagos();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function obtenerPagos() {
    $.ajax({
        data: '',
        url: '../../actions/pagoPeriodo/obtenerPagos.php',
        type: 'post',
        success: function (response) {
            $("#listaPagos").html(response);
        }
    });
}

function obtenerEmpleadosPago() {
    $.ajax({
        data: '',
        url: '../../actions/pagoPeriodo/obtenerEmpleadosPago.php',
        type: 'post',
        success: function (response) {
            $("#empleados").html(response);
        }
    });
}

function cargarPagos() {
    //Obtener los valores
    var idPago = document.getElementById("cbxPagos").value;

    var parametros = {
        "idPago": idPago
    };

    $.ajax({
        data: parametros,
        url: '../../actions/pagoPeriodo/cargarCamposPago.php',
        type: 'post',
        success: function (response) {

//            obtenerFechaFormatoWeb(fecha);
//            $('#txtFechaExpiracion').val(obtenerFechaFormatoWeb(msg.fechaExpiracion));
            $("#tablaPago").html(response);
        }
    });
}

function validarPago() {

    var idEmpleado = document.getElementById("cbxEmpleadoPago").value;
    var salarioBasePeriodo = document.getElementById("txtSalarioBasePeriodo").value;
    var horasExtra = document.getElementById("txtHorasExtrasPeriodo").value;
    var rebajos = document.getElementById("txtRebajos").value;
    var descripcionRebajo = document.getElementById("txtDescripcionRebajo").value;

    salarioBasePeriodo = salarioBasePeriodo.replace(/₡/g, "");
    horasExtra = horasExtra.replace(/₡/g, "");
    rebajos = rebajos.replace(/₡/g, "");

    if (idEmpleado === '0') {
        mandarMensaje("Debe seleccionar un empleado");
        cbxEmpleadoPago.focus();
        return false;
    }

    if ($.trim($('#txtFechaInicio').val()) === "" || $.trim($('#txtFechaFinal').val()) === "") {
        mandarMensaje("La fecha de inicio y finalización son inválidas.\nDebe ser dd/mm/yyyy");

        if ($.trim($('#txtFechaInicio').val()) === "") {
            txtFechaInicio.focus();
        } else {
            txtFechaFinal.focus();
        }
        return false;
    }

    if (!(validarNumero(salarioBasePeriodo)) || ($.trim(salarioBasePeriodo) === "")) {
        mandarMensaje("El salario base del periodo es inválido");
        txtSalarioBasePeriodo.focus();
        return false;
    }

    if (!(validarNumero(horasExtra)) || ($.trim(horasExtra) === "")) {
        mandarMensaje("El monto por horas extra es inválido");
        txtHorasExtrasPeriodo.focus();
        return false;
    }

    if (!(validarNumero(rebajos)) || ($.trim(rebajos) === "")) {
        mandarMensaje("El monto por rebajos es inválido");
        txtRebajos.focus();
        return false;
    }

    if ($.trim(descripcionRebajo) === "") {
        mandarMensaje("La descripcion es inválida.");
        txtDescripcionRebajo.focus();
        return false;
    }

    return  true;
}