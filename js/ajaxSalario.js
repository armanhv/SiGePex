/******************* Metodos CRUD para SALARIO ***************************/
function insertarSalario() {

    if (validarSalario()) {

        var idEmpleado = document.getElementById("cbxEmpleadoSalario").value;
        var salarioBase = document.getElementById("txtSalarioBase").value;
        var horasExtra = document.getElementById("txtHorasExtras").value;
        var bonificacines = document.getElementById("txtBonificaciones").value;
        var diasExtra = document.getElementById("txtDiasExtra").value;

        salarioBase = salarioBase.replace(/₡/g, "");
        horasExtra = horasExtra.replace(/₡/g, "");
        bonificacines = bonificacines.replace(/₡/g, "");
        diasExtra = diasExtra.replace(/₡/g, "");

        var parametros = {
            "idEmpleado": idEmpleado,
            "salarioBase": salarioBase,
            "horasExtra": horasExtra,
            "bonificaciones": bonificacines,
            "diasExtra": diasExtra
        };

        if (confirm("¿ Desea agregar este salario ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/salario/insertarSalario.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios
                    $("#txtSalarioBase").val("");
                    $("#txtHorasExtras").val("");
                    $("#txtBonificaciones").val("");
                    $("#txtDiasExtra").val("");
                    obtenerSalarios();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function borrarSalario() {
    var idSalario = document.getElementById("cbxSalarios").value;

    var parametros = {
        "idSalario": idSalario
    };

    if (confirm("¿ Desea borrar este salario ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/salario/borrarSalario.php',
            type: 'post',
            success: function (response) {
                //se recarga el combo y limpan los espacios
                $("#txtSalarioBase").val("");
                $("#txtHorasExtras").val("");
                $("#txtBonificaciones").val("");
                $("#txtDiasExtra").val("");
                obtenerSalarios();
                $("#resultado").html(response);
            }
        });
    }
}

function actualizarSalario() {

    if (validarSalario()) {

        var idSalario = document.getElementById("cbxSalarios").value;
        var idEmpleado = document.getElementById("cbxEmpleadoSalario").value;
        var salarioBase = document.getElementById("txtSalarioBase").value;
        var horasExtra = document.getElementById("txtHorasExtras").value;
        var bonificacines = document.getElementById("txtBonificaciones").value;
        var diasExtra = document.getElementById("txtDiasExtra").value;

        salarioBase = salarioBase.replace(/₡/g, "");
        horasExtra = horasExtra.replace(/₡/g, "");
        bonificacines = bonificacines.replace(/₡/g, "");
        diasExtra = diasExtra.replace(/₡/g, "");

        var parametros = {
            "idSalario": idSalario,
            "idEmpleado": idEmpleado,
            "salarioBase": salarioBase,
            "horasExtra": horasExtra,
            "bonificaciones": bonificacines,
            "diasExtra": diasExtra
        };

        if (confirm("¿ Desea modificar este salario ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/salario/actualizarSalario.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios
                    $("#txtSalarioBase").val("");
                    $("#txtHorasExtras").val("");
                    $("#txtBonificaciones").val("");
                    $("#txtDiasExtra").val("");
                    obtenerSalarios();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function obtenerSalarios() {
    $.ajax({
        data: '',
        url: '../../actions/salario/obtenerSalarios.php',
        type: 'post',
        success: function (response) {
            $("#salarios").html(response);
            recarga();
        }
    });
}

function obtenerEmpleados() {
    $.ajax({
        data: '',
        url: '../../actions/salario/obtenerEmpleadosSalario.php',
        type: 'post',
        success: function (response) {
            $("#empleados").html(response);
        }
    });
}

function cargarSalarios() {
    //Obtener los valores
    var idSalario = document.getElementById("cbxSalarios").value;

    var parametros = {
        "idSalario": idSalario
    };

    $.ajax({
        data: parametros,
        url: '../../actions/salario/cargarCampos.php',
        type: 'post',
        success: function (response) {
            $("#tablaSalario").html(response);
        }
    });
}

/********************* Seccion de validaciones ************************/
function validarSalario() {
    var idEmpleado = document.getElementById("cbxEmpleadoSalario").value;
    var salarioBase = document.getElementById("txtSalarioBase").value;
    var horasExtra = document.getElementById("txtHorasExtras").value;
    var bonificacines = document.getElementById("txtBonificaciones").value;
    var diasExtra = document.getElementById("txtDiasExtra").value;

    salarioBase = salarioBase.replace(/₡/g, "");
    horasExtra = horasExtra.replace(/₡/g, "");
    bonificacines = bonificacines.replace(/₡/g, "");
    diasExtra = diasExtra.replace(/₡/g, "");


    if (idEmpleado === '0') {
        mandarMensaje("Debe seleccionar un empleado");
        cbxEmpleadoSalario.focus();
        return false;
    }

    if (!(validarNumero(salarioBase)) || ($.trim(salarioBase) === "")) {
        mandarMensaje("El salario base es inválido");
        txtSalarioBase.focus();
        return false;
    }

    if (!(validarNumero(horasExtra)) || ($.trim(horasExtra) === "")) {
        mandarMensaje("El monto de las horas extra es inválido");
        txtHorasExtras.focus();
        return false;
    }


    if (!(validarNumero(bonificacines)) || ($.trim(bonificacines) === "")) {
        mandarMensaje("El monto de las bonificaciones es inválido");
        txtBonificaciones.focus();
        return false;
    }

    if (!(validarNumero(diasExtra)) || ($.trim(diasExtra) === "")) {
        mandarMensaje("El monto de los días extra es inválido");
        txtDiasExtra.focus();
        return false;
    }
    return true;
}