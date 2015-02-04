/******************* Metodos CRUD para Ingresos ***************************/
function insertarIngresos() {

    var idIngresos = 0;

    var parametros = {
        "idIngresos": idIngresos.value,
        "idEmpleado": $('#cbxEmpleado').val(),
        "idCliente": $('#cbxCliente').val(),
        "tipoPago": $('#cbxTipoPago').val(),
        "numBoucher": $('#txtNumBoucher').val(),
        "monto": $('#txtMonto').val(),
	"fechaIngreso": $('#txtFechaIngreso').val()
    };

    //alert($('#txtNumeroCuenta').val());

    $.ajax({
        data: parametros,
        url: '../../actions/ingresos/insertarIngresos.php',
        type: 'post',
        success: function (response) {
            //se recarga el combo y limpan los espacios
            $('input[type=text]').val("");
            obtenerIngresos();
            $("#resultado").html(response);
        }
    });

}

function actualizarIngresos() {

    var idIngresos = document.getElementById("cbxIngresos").value;
  

    var parametros = {
        "idIngresos": idIngresos,
        "idEmpleado": $('#cbxEmpleado').val(),
        "idCliente": $('#cbxCliente').val(),
        "tipoPago": $('#cbxTipoPago').val(),
        "numBoucher": $('#txtNumBoucher').val(),
        "monto": $('#txtMonto').val(),
	"fechaIngreso": $('#txtFechaIngreso').val()
    };

    $.ajax({
        data: parametros,
        url: '../../actions/ingresos/actualizarIngresos.php',
        type: 'post',
        success: function (response) {
            //se recarga el combo y limpan los espacios
            $('input[type=text]').val("");
            obtenerIngresos();
            $("#resultado").html(response);
        }
    });
}

function borrarIngresos() {
    var idIngresos = document.getElementById("cbxIngresos").value;

    var parametros = {
        "idIngresos": idIngresos
    };

    $.ajax({
        data: parametros,
        url: '../../actions/ingresos/borrarIngresos.php',
        type: 'post',
        success: function (response) {
            //se recarga el combo y limpan los espacios
            $('input[type=text]').val("");
            obtenerIngresos();
            $("#resultado").html(response);
        }
    });
}
function obtenerIngresos() {

    
    $.ajax({
        data: '',
        url: '../../actions/ingresos/obtenerIngresos.php',
        type: 'post',
        success: function (response) {
            $("#ingresos").html(response);
        }


    });
}

function obtenerEmpleadosIngresos() {
    $.ajax({
        data: '',
        url: '../../actions/ingresos/obtenerEmpleadosIngresos.php',
        type: 'post',
        success: function (response) {
            $("#empleados").html(response);
        }
    });
}

function obtenerClientesIngresos() {
    $.ajax({
        data: '',
        url: '../../actions/ingresos/obtenerClientesIngresos.php',
        type: 'post',
        success: function (response) {
            $("#clientes").html(response);
        }
    });
}

function cargarIngresos() {
    //Obtener los valores
    var idIngresos = document.getElementById("cbxIngresos").value;

    var parametros = {
        "idIngresos": idIngresos
    };

    $.ajax({
        data: parametros,
        url: '../../actions/ingresos/cargarIngresos.php',
        type: 'post',
        success: function (response) {
            $("#tablaIngresos").html(response);
        }
    });
}

function obtenerTipoPago() {
    
    $.ajax({
        data: '',
        url: '../../actions/ingresos/obtenerTipoPago.php',
        type: 'post',
        success: function (response) {
            $("#tipoPagos").html(response);
        }
    });
}
