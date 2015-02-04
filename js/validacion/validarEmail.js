function validarEmail() {
    var valorEmailEmpleado = document.getElementById("txtEmailEmpleado").value;

    if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(valorEmailEmpleado)) {
        return true;
    } else {
        mandarMensaje("La dirección de email es inválida");
        txtEmailEmpleado.focus();
        return false;
    }
}