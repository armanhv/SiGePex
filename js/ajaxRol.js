/******************* Metodos CRUD para ROL ***************************/

var expresion = /^[a-zA-Z ÑÁÉÍÓÚñáéíóú]*$/;//Expresion regular que no permite que se ingresen numeros en los nombres.

function insertarRol() {
    var nombreRol = document.getElementById("txtNombreRol").value;

    if ($("#txtNombreRol").val() === "") {
        $("#resultado").html("No deje campos vacío");
        txtNombreRol.focus();
    } else if (!nombreRol.match(expresion)) {
        $("#resultado").html("El nombre del rol es incorecto");
        txtNombreRol.focus();
    } else {

        var parametros = {
            "nombreRol": depurarTexto(nombreRol)
        };

        if (confirm("¿ Desea agregar este rol ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/rol/insertarRol.php',
                type: 'post',
                success: function (response) {
                    //se recarga el combo y limpo los espacios
                    $("#txtNombreRol").val("");
                    obtenerRoles();
                    $("#resultado").html(response);
                }
            });
        }
    }//fin else if para validar 
}

function borrarRol() {
    var idRol = document.getElementById("cbxRoles").value;

    var parametros = {
        "idRol": idRol
    };

    if (confirm("¿ Desea borrar este rol ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/rol/borrarRol.php',
            type: 'post',
            success: function (response) {
                $("#txtNombreRol").val("");
                obtenerRoles();
                $("#resultado").html(response);
            }
        });
    }
}

function actualizarRol() {
    var idRol = document.getElementById("cbxRoles").value;
    var nombreRol = document.getElementById("txtNombreRol").value;

    if ($("#txtNombreRol").val() === "") {
        $("#resultado").html("Seleccione un rol para actualizarlo");
    } else if (!nombreRol.match(expresion)) {
        $("#resultado").html("El nombre del rol es incorecto");
    } else {

        var parametros = {
            "idRol": idRol,
            "nombreRol": depurarTexto(nombreRol)
        };

        if (confirm("¿ Desea modificar este rol ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/rol/actualizarRol.php',
                type: 'post',
                success: function (response) {
                    $("#txtNombreRol").val("");
                    obtenerRoles();
                    $("#resultado").html(response);
                }
            });
        }
    }
}

function obtenerRoles() {
    $.ajax({
        data: '',
        url: '../../actions/rol/obtenerRoles.php',
        type: 'post',
        success: function (response) {
            $("#roles").html(response);
        }
    });
}

function cargarRoles() {
    //Obtener los valores
    var idRol = document.getElementById("cbxRoles").value;
    var combo = document.getElementById("cbxRoles");
    var nombreRol = combo.options[combo.selectedIndex].text;

    //Cargar los valores en el cuadro de texto
    var txtNombreRol = document.getElementById("txtNombreRol");
    txtNombreRol.value = nombreRol;
}