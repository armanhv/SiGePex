/******************* Metodos CRUD para HORARIO ***************************/
function insertarHorario() {
    if (validarHorario()) {

        var dias = obtenerDias();
        var idEmpleado = document.getElementById("cbxEmpleado").value;
        var horaInicio = document.getElementById("cbxHoraInicio").value;
        var horaInicioMinuto = document.getElementById('cbxHoraInicioMinutos').value;
        var horaSalida = document.getElementById("cbxHoraSalida").value;
        var horaSalidaMinuto = document.getElementById('cbxHoraSalidaMinutos').value;

        var parametros = {
            "idEmpleado": idEmpleado,
            "dias": dias,
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
                    $("input[name='chbDias']:checked").removeAttr("checked");
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
                $("input[name='chbDias']:checked").removeAttr("checked");
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
    var dia = $("input[name='chbDias']:checked").length;

    if (idEmpleado === '0') {
        mandarMensaje("Debe elegir un empleado.");
        cbxEmpleado.focus();
        return false;
    }

    if (dia === 0) {
        mandarMensaje("Debe elegir un día.");
        return false;
    }

    return true;
}

function obtenerDias() {

    var tamaño = $("input[name='chbDias']:checked").length;//cantidad seleccionada
    var chkArray = [];

    // ver los checkboxs de la clase 'chbDias' q estan seleccionados
    $(".chbDias:checked").each(function () {
        chkArray.push($(this).val());
    });

    var dias = chkArray.join(',');//separamos todo en el arreglo por una coma

    return dias;
}