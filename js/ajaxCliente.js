/******************* Metodos CRUD para cliente ***************************/
function insertarCliente() {

    if (verificarCliente()) {
        var parametros = {
            "nombreCliente": depurarTexto($('#txtNombreCliente').val()),
            "primerApellido": depurarTexto($('#txtPrimerApellido').val()),
            "segundoApellido": depurarTexto($('#txtSegundoApellido').val()),
            "direccion": $('#txtDireccion').val()
        };

        if (confirm("¿ Desea ingresar este cliente ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/cliente/insertarCliente.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios
                    $('input[type=text]').val("");
                    $('#txtDireccion').val("");
                    obtenerClientes();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function actualizarCliente() {

    if (verificarCliente()) {

        var idCliente = document.getElementById("cbxCliente").value;

        var parametros = {
            "idCliente": idCliente,
            "nombreCliente": $('#txtNombreCliente').val(),
            "primerApellido": $('#txtPrimerApellido').val(),
            "segundoApellido": $('#txtSegundoApellido').val(),
            "direccion": $('#txtDireccion').val()
        };

        if (confirm("¿ Desea modificar este cliente ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/cliente/actualizarClientes.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios
                    $('input[type=text]').val("");
                    $('#txtDireccion').val("");
                    obtenerClientes();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function borrarCliente() {
    var idCliente = document.getElementById("cbxCliente").value;

    var parametros = {
        "idCliente": idCliente
    };

    $.ajax({
        data: parametros,
        url: '../../actions/cliente/borrarCliente.php',
        type: 'post',
        success: function (response) {
            //se recarga el combo y limpan los espacios
            $('input[type=text]').val("");
            $('#txtDireccion').val("");
            obtenerClientes();
            $("#resultado").html(response);
        }
    });
}

function obtenerClientes() {
    $.ajax({
        data: '',
        url: '../../actions/cliente/obtenerCliente.php',
        type: 'post',
        success: function (response) {
            $("#clientes").html(response);
        }


    });
}

function cargarCliente() {
    //Obtener los valores
    var idCliente = document.getElementById("cbxCliente").value;

    var parametros = {
        "idCliente": idCliente
    };

    $.ajax({
        data: parametros,
        url: '../../actions/cliente/cargarClientes.php',
        type: 'post',
        success: function (response) {
            $("#tablaCliente").html(response);
        }
    });
}


/********************* Seccion de validaciones ************************/
function verificarCliente() {
    var expresion = /^[a-zA-Z ÑÁÉÍÓÚñáéíóú]*$/; // exprecion para solo letras

    var nombre = $('#txtNombreCliente').val();
    var primerApellido = $('#txtPrimerApellido').val();
    var segundoApellido = $('#txtSegundoApellido').val();
    var direccion = $('#txtDireccion').val();


    if (!(nombre.match(expresion)) || ($.trim(nombre) === '')) {
        mandarMensaje("El nombre es inválido");
        txtNombreCliente.focus();
        return false;
    }

    if (!(primerApellido.match(expresion)) || ($.trim(primerApellido) === '')) {
        mandarMensaje("El primer apellido es inválido");
        txtPrimerApellido.focus();
        return false;
    }

    if (!(segundoApellido.match(expresion)) || ($.trim(segundoApellido) === '')) {
        mandarMensaje("El segundo apellido es inválido");
        txtSegundoApellido.focus();
        return false;
    }

    if ($.trim(direccion) === '') {
        mandarMensaje("La dirección es inválida");
        txtDireccion.focus();
        return false;
    }

    return true;
}

