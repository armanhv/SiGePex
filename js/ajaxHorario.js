/******************* Metodos CRUD para HORARIO ***************************/
function insertarHorario() {
    if (validarHorario()) {

        var dia = $('input:radio[name=rbnDias]:checked').val();
        var idEmpleado = document.getElementById("cbxEmpleado").value;
        var horaInicio = document.getElementById("cbxHoraInicio").value;
        var horaInicioMinuto = document.getElementById('cbxHoraInicioMinutos').value;
        var horaSalida = document.getElementById("cbxHoraSalida").value;
        var horaSalidaMinuto = document.getElementById('cbxHoraSalidaMinutos').value;

        var parametros = {
            "idEmpleado": idEmpleado,
            "dias": dia,
            "horaInicio": horaInicio + ':' + horaInicioMinuto,
            "horaSalida": horaSalida + ':' + horaSalidaMinuto
        };

        if (confirm("¿ Desea agregar este Horario ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/horario/insertarHorario.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpo los espacios
                    obtenerHorarios();
                    $("#cbxHoraInicio").val("07");
                    $("#cbxHoraInicioMinutos").val("00");
                    $("#cbxHoraSalida").val("08");
                    $("#cbxHoraSalidaMinutos").val("00");
                    $('input:radio[name=rbnDias]:checked').removeAttr("checked");
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function borrarHorario() {
    var idHorario = $('input:radio[name=idHorario]:checked').val();

    var parametros = {
        "idHorario": idHorario
    };

    //para confirmar la opcion
    if (confirm("¿ Desea eliminar este Horario ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/horario/borrarHorario.php',
            type: 'post',
            success: function (response) {
                obtenerHorarios();
                $("#cbxHoraInicio").val("07");
                $("#cbxHoraInicioMinutos").val("00");
                $("#cbxHoraSalida").val("08");
                $("#cbxHoraSalidaMinutos").val("00");
                $('input:radio[name=rbnDias]:checked').removeAttr("checked");
                $("#resultado").html(response);
            }
        });
    }
}

function obtenerHorarios() {
    var idEmpleado = document.getElementById("cbxEmpleado").value;

    var parametros = {
        "idEmpleado": idEmpleado
    };

    $.ajax({
        data: parametros,
        url: '../../actions/horario/obtenerHorarios.php',
        type: 'post',
        success: function (response) {
            $("#listaHorarios").html(response);
        }
    });
}

function obtenerEmpleadosHorario() {
    $.ajax({
        data: '',
        url: '../../actions/horario/obtenerEmpleadosHorario.php',
        type: 'post',
        success: function (response) {
            $("#empleados").html(response);
        }
    });
}

function validarHorario() {
    var idEmpleado = document.getElementById("cbxEmpleado").value;
    var dia = $('input:radio[name=rbnDias]:checked').val();

    //alert(dia);

    if (idEmpleado === '0') {
        mandarMensaje("Debe elegir un empleado.");
        cbxEmpleado.focus();
        return false;
    }

    if (typeof (dia) === "undefined") {
        mandarMensaje("Debe elegir un día.");
        return false;
    }

    return true;
}