function insertarBanco() {

    if (validarBanco()) {

        var nombreBanco = document.getElementById("txtNombreBanco").value;

        var parametros = {
            "nombreBanco": nombreBanco
        };

        if (confirm("¿ Desea agregar este banco ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/banco/insertarBanco.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpo los espacios
                    $("#txtNombreBanco").val("");
                    obtenerBancos();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function borrarBanco() {
    var idBanco = document.getElementById("cbxBancos").value;

    var parametros = {
        "idBanco": idBanco
    };
    if (confirm("¿ Desea borrar este banco ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/banco/borrarBanco.php',
            type: 'post',
            success: function (response) {
                $("#txtNombreBanco").val("");
                obtenerBancos();
                $("#resultado").html(response);
            }
        });
    }
}

function actualizarBanco() {
    if (validarBanco()) {

        var idBanco = document.getElementById("cbxBancos").value;
        var nombreBanco = document.getElementById("txtNombreBanco").value;

        var parametros = {
            "idBanco": idBanco,
            "nombreBanco": nombreBanco
        };

        if (confirm("¿ Desea modificar este banco ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/banco/actualizarBanco.php',
                type: 'post',
                success: function (response) {
                    $("#txtNombreBanco").val("");
                    obtenerBancos();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function obtenerBancos() {
    $.ajax({
        data: '',
        url: '../../actions/banco/obtenerBancos.php',
        type: 'post',
        success: function (response) {
            $("#bancos").html(response);
        }
    });
}

function cargarBancos() {

    var combo = document.getElementById("cbxBancos");
    var nombreBanco = combo.options[combo.selectedIndex].text;
    
    //Cargar los valores en el cuadro de texto
    var txtNombreBanco = document.getElementById("txtNombreBanco");
    txtNombreBanco.value = nombreBanco;
}

function validarBanco() {
    var expresion = /^[a-zA-Z ÑÁÉÍÓÚñáéíóú]*$/; // exprecion para solo letras

    if (!($("#txtNombreBanco").val().match(expresion)) || ($.trim($("#txtNombreBanco").val()) === '')) {
        mandarMensaje("El nombre del banco es incorecto es inválido");
        txtNombreBanco.focus();
        return false;
    }
    return true;
}