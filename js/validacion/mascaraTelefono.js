function contar(textbox, destino) {

    var valor = textbox.value;//obtengo el texto

    if (isNaN(valor)) {
        textbox.value = "";//se limpia el campo
    }

    //Este if es para verificar q el primer campo no inicie en 0 o q desp de un numero siga un 0  
    if (valor.charAt(0) === '0' && textbox.id === "txtTelefonoNum1") {
        textbox.value = "";
    }

    //cambio al siguiente input
    if (textbox.value.length === textbox.maxLength)
        destino.focus();
}

//metodo para obtern el numero completo 
function obtenerTelefono() {

    var num1 = document.getElementById("txtTelefonoNum1").value;
    var num2 = document.getElementById("txtTelefonoNum2").value;
    var num3 = document.getElementById("txtTelefonoNum3").value;
    var num4 = document.getElementById("txtTelefonoNum4").value;

    return num1 + num2 + num3 + num4;
}

function validarTelefono() {

    if ($('#cbxEmpleado').val() === '0') {
        mandarMensaje("Elija un empleado para agregarle un teléfono");
        cbxEmpleado.focus();
        return false;
    }

    if ($.trim($('#txtTelefonoNum1').val()) === "" || $.trim($('#txtTelefonoNum2').val()) === "" ||
            $.trim($('#txtTelefonoNum3').val()) === "" || $.trim($('#txtTelefonoNum4').val()) === "") {
        
        mandarMensaje("El teléfono es inválido.");
        txtTelefonoNum1.focus();
        return false;
    }
    return true;
}