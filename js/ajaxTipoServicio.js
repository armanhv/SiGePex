/******************* Metodos CRUD para Tipo de Servicio ***************************/
function insertarTipoServicio() {


    if (validarTipoServicio()) {

        var tipoServicio = document.getElementById("txtTipoServicio").value;
        var precio = document.getElementById("txtPrecio").value;
        var descripcionTipoServicio = document.getElementById("txtDescripcionTipoServicio").value;

        precio = precio.replace(/₡/g, "");

        var parametros = {
            "tipoServicio": tipoServicio,
            "precio": precio,
            "descripcionTipoServicio": descripcionTipoServicio
        };

        if (confirm("¿ Desea agregar este tipo de servicio ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/tipoServicio/insertarTipoServicio.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios
                    $("#txtTipoServicio").val("");
                    $("#txtPrecio").val("");
                    $("#txtDescripcionTipoServicio").val("");
                    obtenerTipoServicios();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function borrarTipoServicio() {
    var idTipoServicio = document.getElementById("cbxTipoServicios").value;

    var parametros = {
        "idTipoServicio": idTipoServicio
    };

    if (confirm("¿ Desea borrar este tipo de servicio ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/tipoServicio/borrarTipoServicio.php',
            type: 'post',
            success: function (response) {
                //se recarga el combo y limpan los espacios
                $("#txtTipoServicio").val("");
                $("#txtPrecio").val("");
                $("#txtDescripcionTipoServicio").val("");
                obtenerTipoServicios();
                $("#resultado").html(response);
            }
        });
    }
}

function actualizarTipoServicio() {

    if (validarTipoServicio()) {

        var idTipoServicio = document.getElementById("cbxTipoServicios").value;

        var tipoServicio = document.getElementById("txtTipoServicio").value;
        var precio = document.getElementById("txtPrecio").value;
        var descripcionTipoServicio = document.getElementById("txtDescripcionTipoServicio").value;

        precio = precio.replace(/₡/g, "");

        var parametros = {
            "idTipoServicio": idTipoServicio,
            "tipoServicio": tipoServicio,
            "precio": precio,
            "descripcionTipoServicio": descripcionTipoServicio
        };

        if (confirm("¿ Desea modificar este tipo de servicio ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/tipoServicio/actualizarTipoServicio.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpan los espacios
                    $("#txtTipoServicio").val("");
                    $("#txtPrecio").val("");
                    $("#txtDescripcionTipoServicio").val("");
                    obtenerTipoServicios();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function obtenerTipoServicios() {
    $.ajax({
        data: '',
        url: '../../actions/tipoServicio/obtenerTipoServicios.php',
        type: 'post',
        success: function (response) {
            $("#listaTipoServicio").html(response);
        }
    });
}

function cargarTipoServicios() {
    //Obtener los valores
    var idTipoServicio = document.getElementById("cbxTipoServicios").value;

    var parametros = {
        "idTipoServicio": idTipoServicio
    };

    $.ajax({
        data: parametros,
        url: '../../actions/tipoServicio/cargarTipoServicio.php',
        type: 'post',
        success: function (response) {
            $("#tablaTipoServicio").html(response);
        }
    });
}

function validarTipoServicio() {
    var expresion = /^[a-zA-Z ÑÁÉÍÓÚñáéíóú]*$/; // exprecion para solo letras

    var tipoServicio = document.getElementById("txtTipoServicio").value;
    var precio = document.getElementById("txtPrecio").value;
    var descripcionTipoServicio = document.getElementById("txtDescripcionTipoServicio").value;

    precio = precio.replace(/₡/g, "");

    if (!(tipoServicio.match(expresion)) || ($.trim(tipoServicio) === '')) {
        mandarMensaje("El tipo de servicio es inválido");
        txtTipoServicio.focus();
        return false;
    }

    if (!(validarNumero(precio)) || ($.trim(precio) === "")) {
        mandarMensaje("El precio del servicio es inválido");
        txtPrecio.focus();
        return false;
    }

    if ($.trim(descripcionTipoServicio) === "" || (descripcionTipoServicio.length <= 5)) {
        mandarMensaje("La descripcion del servicio es inválida.");
        txtDescripcionTipoServicio.focus();
        return false;
    }

    return  true;
}

