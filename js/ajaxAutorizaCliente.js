/******************* Metodos CRUD para Credito ***************************/
function insertarAutorizaCliente() {

  if (validarAutorizaCliente() ) {

        var idCliente = document.getElementById("cbxCliente").value;
        var nombreAutorizado = document.getElementById("txtNombreAutorizado").value;


        var parametros = {
            "idCliente": idCliente,
            "nombreAutorizado": nombreAutorizado
           
        };
 
        if (confirm("¿Desea agregar este autorizado?")) {

            $.ajax({
                data: parametros,
                url: '../../actions/autorizaCliente/insertarAutorizaClienteAction.php',
                type: 'post',
                success: function (response) {
                    //limpiarCamposCreditos();
                    
                    obtenerAutorizados();
                    $("#resultado").html(response);
                },
                error: function (textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });

        }
    }
}

function actualizarAutorizaCliente() {

    if (validarAutorizaCliente()) {
        
        var idAutorizacionCliente = $('input:radio[name=idAutorizacionCliente]:checked').val();

        var idCliente = document.getElementById("cbxCliente").value;
        var nombreAutorizado = document.getElementById("txtNombreAutorizado").value;

        var parametros = {
            "idAutorizacionCliente": idAutorizacionCliente,
            "idCliente": idCliente,
            "nombreAutorizado": nombreAutorizado
        };

        if (confirm("¿ Desea modificar este autorizado ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/autorizaCliente/actualizarAutorizaClienteAction.php',
                type: 'post',
                success: function (response) {
                    obtenerAutorizados();
                    
                    $("#resultado").html(response);
                }
                
            });
        }
        alert('si si');
    }
}

function eliminarAutorizaCliente() {
    var idAutorizacionCliente= $('input:radio[name=idAutorizacionCliente]:checked').val();

    var parametros = {
        "idAutorizacionCliente": idAutorizacionCliente
    };
    if (confirm("¿ Desea borrar este autorizado ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/autorizaCliente/borrarAutorizaClienteAction.php',
            type: 'post',
            success: function (response) {
                
                obtenerAutorizados();
                $("#resultado").html(response);
            }
            
        });
   
    }
}

function obtenerAutorizados() {
  
    var idCliente = document.getElementById("cbxCliente").value;

    var parametros = {
        "idCliente": idCliente
    };
  
    $.ajax({
        data: parametros,
        url: '../../actions/autorizaCliente/obtenerAutorizadosAction.php',
        type: 'post',
        success: function (response) {
            $("#listaAutorizaCliente").html(response);
        }
        
    });

}

/********************* Seccion de validaciones ************************/
function validarAutorizaCliente() {
   
    var idCliente = document.getElementById("cbxCliente").value;
    var nombreAutorizado = document.getElementById("txtNombreAutorizado").value;

    if (idCliente === '0') {
        mandarMensaje("Debe seleccionar un cliente");
        cbxCliente.focus();
        return false;
    }else if (nombreAutorizado === "") {
        mandarMensaje("El nombre es inválido");
        txtNombreAutorizado.focus();
           return false;
    }

    return true;
}