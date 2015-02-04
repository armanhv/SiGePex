function eliminarEmpleado() {
    var valorIdEmpleado = document.getElementById("cbxEmpleado").value;
    var parametros = {
        "idEmpleado": valorIdEmpleado
    };

    if (confirm("¿ Desea borrar a este empleado ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/empleado/eliminarEmpleadoAction.php',
            type: 'post',
            success: function (response) {
                limpiarCampos();
                obtenerEmpleados();
                obtenerTelefonosEmpleado();
                $("#resultado").html(response);
            }
        });
    }

}

function insertarEmpleado() {
    var valorFechaNacimiento = document.getElementById("txtFechaNacimiento").value;

    if (verificarCampos() && validarFecha(valorFechaNacimiento) && validarEmail()) {

        var valorCedula = document.getElementById("txtCedula").value;
        var valorNombre = document.getElementById("txtNombre").value;
        var valorPrimerApellido = document.getElementById("txtPrimerApellido").value;
        var valorSegundoApellido = document.getElementById("txtSegundoApellido").value;
        var valorEmailEmpleado = document.getElementById("txtEmailEmpleado").value;
        var valorDireccionEmpleado = document.getElementById("txtDireccionEmpleado").value;
        var valorLogin = document.getElementById("txtLogin").value;
        var valorPass = document.getElementById("txtPassword").value;
        var valorCantidadHorasLaborales = document.getElementById("txtCantidadHorasLaborales").value;
        var valorCostoHoraExtra = document.getElementById("txtCostoHoraExtra").value;
        var valorTiempoAlmuerzo = document.getElementById("cbxTiempoAlmuerzo").value;
        var valorRol = document.getElementById("cbxRoles").value;
        valorCostoHoraExtra = valorCostoHoraExtra.replace(/₡/g, "");

        var parametros = {
            "cedula": valorCedula,
            "nombre": depurarTexto(valorNombre),
            "primerApellido": depurarTexto(valorPrimerApellido),
            "segundoApellido": depurarTexto(valorSegundoApellido),
            "fechaNacimiento": obtenerFechaFormatoSQL(valorFechaNacimiento),
            "emailEmpleado": depurarTexto(valorEmailEmpleado),
            "direccionEmpleado": depurarTexto(valorDireccionEmpleado),
            "login": depurarTexto(valorLogin),
            "pass": valorPass,
            "cantidadHoras": valorCantidadHorasLaborales,
            "costoHoraExtra": valorCostoHoraExtra,
            "tiempoAlmuerzo": valorTiempoAlmuerzo,
            "idRol": valorRol
        };

        if (confirm("¿ Desea agregar este empleado ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/empleado/insertarEmpleadoAction.php',
                type: 'post',
                success: function (response) {
                    limpiarCampos();
                    obtenerEmpleados();
                    obtenerTelefonosEmpleado();
                    $("#resultadoTelefono").html(response);
                }
            });
        }
    }
}

function actualizarEmpleado() {
    var valorFechaNacimiento = document.getElementById("txtFechaNacimiento").value;

    if (verificarCampos() && validarEmail() && validarFecha(valorFechaNacimiento)) {
        var valorIdEmpleado = document.getElementById("cbxEmpleado").value;
        var valorCedula = document.getElementById("txtCedula").value;
        var valorNombre = document.getElementById("txtNombre").value;
        var valorPrimerApellido = document.getElementById("txtPrimerApellido").value;
        var valorSegundoApellido = document.getElementById("txtSegundoApellido").value;
        var valorEmailEmpleado = document.getElementById("txtEmailEmpleado").value;
        var valorDireccionEmpleado = document.getElementById("txtDireccionEmpleado").value;
        var valorLogin = document.getElementById("txtLogin").value;
        var valorPass = document.getElementById("txtPassword").value;
        var valorCantidadHorasLaborales = document.getElementById("txtCantidadHorasLaborales").value;
        var valorCostoHoraExtra = document.getElementById("txtCostoHoraExtra").value;
        var valorTiempoAlmuerzo = document.getElementById("cbxTiempoAlmuerzo").value;
        var valorRol = document.getElementById("cbxRoles").value;
        valorCostoHoraExtra = valorCostoHoraExtra.replace(/₡/g, "");

        var parametros = {
            "idEmpleado": valorIdEmpleado,
            "cedula": valorCedula,
            "nombre": depurarTexto(valorNombre),
            "primerApellido": depurarTexto(valorPrimerApellido),
            "segundoApellido": depurarTexto(valorSegundoApellido),
            "fechaNacimiento": obtenerFechaFormatoSQL(valorFechaNacimiento),
            "emailEmpleado": depurarTexto(valorEmailEmpleado),
            "direccionEmpleado": depurarTexto(valorDireccionEmpleado),
            "login": depurarTexto(valorLogin),
            "pass": valorPass,
            "cantidadHoras": valorCantidadHorasLaborales,
            "costoHoraExtra": valorCostoHoraExtra,
            "tiempoAlmuerzo": valorTiempoAlmuerzo,
            "idRol": valorRol
        };

        if (confirm("¿ Desea modificar este empleado ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/empleado/actualizarEmpleadoAction.php',
                type: 'post',
                success: function (response) {
                    limpiarCampos();
                    obtenerEmpleados();
                    obtenerTelefonosEmpleado();
                    $("#resultadoTelefono").html(response);
                    //mandarMensaje(response);
                }
            });
        }
    }
}

function obtenerEmpleados22() {
    alert("ent<klnzdmhfv");
    $.ajax({
        data: '',
        url: '../../actions/empleado/obtenerEmpleados.php',
        type: 'post',
        success: function (response) {
            $("#empleados").html(response);
        }
    });
}

function buscarEmpleado() {
    var iID = document.getElementById("cbxEmpleado").value;
    $.ajax({
        url: "../../actions/empleado/buscarEmpleadoAction.php",
        type: "POST",
        datatype: "JSON",
        data: {
            valueAction: 1,
            id: iID
        },
        success: function (msg)
        {

            var txtCedula = document.getElementById("txtCedula");
            var txtNombre = document.getElementById("txtNombre");
            var txtPrimerApellido = document.getElementById("txtPrimerApellido");
            var txtSegundoApellido = document.getElementById("txtSegundoApellido");
            var txtFechaNacimiento = document.getElementById("txtFechaNacimiento");
            var txtEmailEmpleado = document.getElementById("txtEmailEmpleado");
            var txtDireccionEmpleado = document.getElementById("txtDireccionEmpleado");
            var txtLogin = document.getElementById("txtLogin");
            var txtPass = document.getElementById("txtPassword");
            var txtCantidadHorasLaborales = document.getElementById("txtCantidadHorasLaborales");
            var txtCostoHoraExtra = document.getElementById("txtCostoHoraExtra");
            var txtTiempoAlmuerzo = document.getElementById("txtTiempoAlmuerzo");

            txtCedula.value = msg.cedulaEmpleado;
            txtNombre.value = msg.nombreEmpleado;
            txtPrimerApellido.value = msg.primerApellidoEmpleado;
            txtSegundoApellido.value = msg.segundoApellidoEmpleado;
            txtFechaNacimiento.value = obtenerFechaFormatoWeb(msg.fechaNacimientoEmpleado);
            txtEmailEmpleado.value = msg.emailEmpleado;
            txtDireccionEmpleado.value = msg.direccionEmpleado;
            txtLogin.value = msg.loginEmpleado;
            txtPass.value = msg.passwordEmpleado;
            txtCantidadHorasLaborales.value = msg.cantidadHorasLaborales;
            txtCostoHoraExtra.value = msg.costoHoraExtra;
            txtTiempoAlmuerzo.value = msg.tiempoAlmuerzo;

            recarga();
        }
    });
}

function limpiarCampos() {
    var txtCedula = document.getElementById("txtCedula");
    var txtNombre = document.getElementById("txtNombre");
    var txtPrimerApellido = document.getElementById("txtPrimerApellido");
    var txtSegundoApellido = document.getElementById("txtSegundoApellido");
    var txtFechaNacimiento = document.getElementById("txtFechaNacimiento");
    var txtEmailEmpleado = document.getElementById("txtEmailEmpleado");
    var txtDireccionEmpleado = document.getElementById("txtDireccionEmpleado");
    var txtLogin = document.getElementById("txtLogin");
    var txtPass = document.getElementById("txtPassword");
    var txtCantidadHorasLaborales = document.getElementById("txtCantidadHorasLaborales");
    var txtCostoHoraExtra = document.getElementById("txtCostoHoraExtra");
    var txtTiempoAlmuerzo = document.getElementById("txtTiempoAlmuerzo");
    
    var valorIdEmpleado = document.getElementById("cbxEmpleado").value;
    alert(valorIdEmpleado);
    document.getElementById("cbxEmpleado").selectedIndex = 0;
    alert(valorIdEmpleado);

    txtCedula.value = "";
    txtNombre.value = "";
    txtPrimerApellido.value = "";
    txtSegundoApellido.value = "";
    txtFechaNacimiento.value = "";
    txtEmailEmpleado.value = "";
    txtDireccionEmpleado.value = "";
    txtLogin.value = "";
    txtPass.value = "";
    txtCantidadHorasLaborales.value = "";
    txtCostoHoraExtra.value = "";
    txtTiempoAlmuerzo.value = "";
    obtenerTelefonosEmpleado();
    obtenerLicenciasEmpleado();
}

/********************* Seccion de validaciones ************************/
function verificarCampos() {
    var expresion = /^[a-zA-Z ÑÁÉÍÓÚñáéíóú]*$/; // exprecion para solo letras
    var expresion2 = /^[a-zA-Z 0-9]+$/;
    var expresionNumeros = '^[0-9]+$';

    var valorCedula = document.getElementById("txtCedula").value;
    var valorNombre = document.getElementById("txtNombre").value;
    var valorPrimerApellido = document.getElementById("txtPrimerApellido").value;
    var valorSegundoApellido = document.getElementById("txtSegundoApellido").value;
    var valorFechaNacimiento = document.getElementById("txtFechaNacimiento").value;
    var valorEmailEmpleado = document.getElementById("txtEmailEmpleado").value;
    var valorDireccionEmpleado = document.getElementById("txtDireccionEmpleado").value;
    var valorLogin = document.getElementById("txtLogin").value;
    var valorPass = document.getElementById("txtPassword").value;
    var valorCantidadHorasLaborales = document.getElementById("txtCantidadHorasLaborales").value;
    var valorCostoHoraExtra = document.getElementById("txtCostoHoraExtra").value;
    var valorTiempoAlmuerzo = document.getElementById("cbxTiempoAlmuerzo").value;
    var valorRol = document.getElementById("cbxRoles").value;
    valorCostoHoraExtra = valorCostoHoraExtra.replace(/₡/g, "");

    if (valorRol === '0') {
        mandarMensaje("Elija un rol para el empleado");
        cbxRoles.focus();
        return false;
    }

    if ($.trim(valorCedula) === "") {//$.trim("txt")
        mandarMensaje("La cédula es inválida.");
        txtCedula.focus();
        return false;
    }

    if (!(valorNombre.match(expresion)) || ($.trim(valorNombre) === '')) {
        mandarMensaje("El nombre es inválido");
        txtNombre.focus();
        return false;
    }

    if (!(valorPrimerApellido.match(expresion)) || ($.trim(valorPrimerApellido) === '')) {
        mandarMensaje("El primer apellido es inválido");
        txtPrimerApellido.focus();
        return false;
    }

    if (!(valorSegundoApellido.match(expresion)) || ($.trim(valorSegundoApellido) === '')) {
        mandarMensaje("El segundo apellido es inválido");
        txtSegundoApellido.focus();
        return false;
    }

    if ($.trim(valorFechaNacimiento) === '') {
        mandarMensaje("La fecha de nacimiento es inválida.\nDebe ser dd/mm/yyyy");
        txtFechaNacimiento.focus();
        return false;
    }

    if (!(valorDireccionEmpleado.match(expresion2)) || ($.trim(valorDireccionEmpleado) === '')) {
        mandarMensaje("La direccion es inválida");
        txtDireccionEmpleado.focus();
        return false;
    }

    if ($.trim(valorEmailEmpleado) === '') {
        mandarMensaje("El email es inválido");
        txtEmailEmpleado.focus();
        return false;
    }

    if (!(valorLogin.match(expresion)) || ($.trim(valorLogin) === '')) {
        mandarMensaje("El login es inválido");
        txtLogin.focus();
        return false;
    }

    if (!(validarPassword(valorPass))) {
        return false;
    }

    if (!(valorCantidadHorasLaborales.match(expresionNumeros)) || ($.trim(valorCantidadHorasLaborales) === '')) {
        mandarMensaje("La cantidad de horas laborales son invalidas");
        txtCantidadHorasLaborales.focus();
        return false;
    }

    if (!(validarNumero(valorCostoHoraExtra)) || ($.trim(valorCostoHoraExtra) === "")) {
        mandarMensaje("El costo por hora extra es inválido");
        txtCostoHoraExtra.focus();
        return false;
    }

    if (valorTiempoAlmuerzo === '0') {
        mandarMensaje("Elija un tiempo de almuerzo");
        cbxTiempoAlmuerzo.focus();
        return false;
    }

    return true;
}