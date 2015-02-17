/******************* Metodos CRUD para Credito ***************************/
function insertarAutorizadoCredito() {

  if (validarAutorizadoCredito() ) {

        var idCredito= document.getElementById("cbxCredito").value;
        var nombreAutorizado = document.getElementById("txtNombreAutorizado").value;


        var parametros = {
            "idCredito": idCredito,
            "nombreAutorizado": nombreAutorizado,
           
        };
 
        if (confirm("¿Desea agregar este autorizado?")) {

            $.ajax({
                data: parametros,
                url: '../../actions/autorizaCliente/insertarAutorizadoCreditoAction.php',
                type: 'post',
                success: function (response) {
                    //limpiarCamposCreditos();
                    
                    obtenerAutorizadosClientes();
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

function actualizarAutorizadoCredito() {

    if (validarAutorizadoCredito()) {
        
        var idAutorizadoCredito = $('input:radio[name=idAutorizadoCredito]:checked').val();

        var idCredito = document.getElementById("cbxCredito").value;
        var nombreAutorizado = document.getElementById("txtNombreAutorizado").value;

        var parametros = {
            "idAutorizadoCredito": idAutorizadoCredito,
            "idCredito": idCredito,
            "nombreAutorizado": nombreAutorizado
        };

        if (confirm("¿ Desea modificar este autorizado ?")) {
            $.ajax({
                data: parametros,
                url: '../../actions/autorizaCliente/actualizarAutorizadoCreditoAction.php',
                type: 'post',
                success: function (response) {
                    obtenerAutorizadosClientes();
                    
                    $("#resultado").html(response);
                }
                
            });
        }
        alert('si si');
    }
}

function eliminarAutorizadoCredito() {
    var idAutorizadoCredito= $('input:radio[name=idAutorizadoCredito]:checked').val();

    var parametros = {
        "idAutorizadoCredito": idAutorizadoCredito
    };
    if (confirm("¿ Desea borrar este autorizado ?")) {
        $.ajax({
            data: parametros,
            url: '../../actions/autorizaCliente/borrarAutorizaClienteAction.php',
            type: 'post',
            success: function (response) {
                
                obtenerAutorizadosClientes();
                $("#resultado").html(response);
            }
            
        });
   
    }
}

function obtenerAutorizadosClientes() {
  
    var idCredito = document.getElementById("cbxCredito").value;

    var parametros = {
        "idCredito": idCredito
    };
  
    $.ajax({
        data: parametros,
        url: '../../actions/autorizaCliente/obtenerAutorizadosClientesAction.php',
        type: 'post',
        success: function (response) {
            $("#listaAutorizadosCredito").html(response);
        }
        
    });

}

/********************* Seccion de validaciones ************************/
function validarAutorizadoCredito() {
   
    var idCredito = document.getElementById("cbxCredito").value;
    var nombreAutorizado = document.getElementById("txtNombreAutorizado").value;

    if (idCredito === '0') {
        mandarMensaje("Debe seleccionar un credito");
        cbxCredito.focus();
        return false;
    }else if (nombreAutorizado === "") {
        mandarMensaje("El nombre es inválido");
        txtNombreAutorizado.focus();
           return false;
    }

    return true;
}

