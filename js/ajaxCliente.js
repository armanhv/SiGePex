/******************* Metodos CRUD para cliente ***************************/
function insertarCliente() {

    var idCliente = 0;

    var parametros = {
        "idCliente": idCliente.value,
        "nombreCliente": $('#txtNombreCliente').val(),
        "primerApellido": $('#txtPrimerApellido').val(),
        "segundoApellido": $('#txtSegundoApellido').val(),
	"direccion": $('#txtDireccion').val()
    };

   // alert($('#txtNumeroCuenta').val());

    $.ajax({
        data: parametros,
        url: 'insertarCliente.php',
        type: 'post',
        success: function (response) {
            //se recarga el combo y limpan los espacios
            $('input[type=text]').val("");
            obtenerClientes();
            $("#resultado").html(response);
        }
    });

}

function actualizarCliente() {

    var idCliente = document.getElementById("cbxCliente").value;
    var parametros = {
        "idCliente": idCliente,
        "nombreCliente": $('#txtNombreCliente').val(),
        "primerApellido": $('#txtPrimerApellido').val(),
        "segundoApellido": $('#txtSegundoApellido').val(),
	"direccion": $('#txtDireccion').val()
    };

    $.ajax({
        data: parametros,
        url: 'actualizarClientes.php',
        type: 'post',
        success: function (response) {
            //se recarga el combo y limpan los espacios
            $('input[type=text]').val("");
            obtenerClientes();
            $("#resultado").html(response);
        }
    });
}

function borrarCliente() {
    var idCliente = document.getElementById("cbxCliente").value;

    var parametros = {
        "idCliente": idCliente
    };

    $.ajax({
        data: parametros,
        url: 'borrarCliente.php',
        type: 'post',
        success: function (response) {
            //se recarga el combo y limpan los espacios
            $('input[type=text]').val("");
            obtenerClientes();
            $("#resultado").html(response);
        }
    });
}
//function obtenerClientes() {
//    $.ajax({
//        data: '',
//        url: 'obtenerCliente.php',
//        type: 'post',
//        success: function (response) {
//            $("#clientes").html(response);
//        }
//
//
//    });
//}

function obtenerClientes() {
    $.ajax({
        data: '',
        url: '../../actions/cliente/obtenerClientes.php',
        type: 'post',
        success: function (response) {
            $("#cliente").html(response);
        }
    });
}


function buscarCliente() {

    var iID = document.getElementById("cbxCliente").value;
    
    $.ajax({
        url: "../../actions/cliente/buscarClienteAction.php",
        type: "POST",
        datatype: "JSON",
        data: {
            valueAction: 1,
            id: iID
        },
        success: function (msg)
        {
            var txtNombre = document.getElementById("txtIdCliente");
            var txtPrimerApellido = document.getElementById("txtPrimerApellido");
            var txtSegundoApellido = document.getElementById("txtSegundoApellido");
            var txtDireccion = document.getElementById("txtDireccion");
             
            txtNombre.value = msg.nombreCliente;
            txtPrimerApellido.value = msg.primerApellidoCliente;
            txtSegundoApellido.value = msg.segundoApellidoCliente;
            txtDireccion.value = msg.direccion;
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
        url: 'cargarClientes.php',
        type: 'post',
        success: function (response) {
            $("#tablaCliente").html(response);
        }
    });
}

