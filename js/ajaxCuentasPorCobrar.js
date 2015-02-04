/******************* Metodos CRUD para Cuentas Por Cobrar ***************************/
function insertarCuentaPorCobrar() {
       
    var idEmpleado = document.getElementById("cbxEmpleado").value;
    var idCliente = document.getElementById("cbxCliente").value;
    var fechaPago = document.getElementById("txtFechaPago");
    var monto = document.getElementById("txtMonto");

    var parametros = {
        "idEmpleado": idEmpleado,
        "idCliente": idCliente,
        "fechaPago": fechaPago.value,
        "monto": monto.value
    };

    $.ajax({
        data: parametros,
        url: '../../actions/cuentasporcobrar/insertarCuentaPorCobrarAction.php',
        type: 'post',
        success: function (response) {
                   
            $("#resultado").html(response);
            limpiarCampos();
            obtenerCuentasPorCobrar();
        },
        error: function( textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        } 
    });

}

function borrarCuentaPorCobrar() {
    var idCuentasPorCobrar = document.getElementById("cbxCuentasPorCobrar").value;

    var parametros = {
        "idCuentasPorCobrar": idCuentasPorCobrar
    };

    $.ajax({
        data: parametros,
        url: '../../actions/cuentasporcobrar/borrarCuentaPorCobrarAction.php',
        type: 'post',
        success: function (response) {
             
            $("#resultado").html(response);
            limpiarCampos();
            obtenerCuentasPorCobrar();
        },
        error: function( textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        }
    });
}

function actualizarCuentaPorCobrar() {
    
    var idCuentasPorCobrar = document.getElementById("cbxCuentasPorCobrar").value;
    var idEmpleado = document.getElementById("cbxEmpleado").value;
    var idCliente = document.getElementById("cbxCliente").value;
    var fechaPago = document.getElementById("txtFechaPago");
    var monto = document.getElementById("txtMonto");
    
    var parametros = {
        
        "idCuentasPorCobrar": idCuentasPorCobrar,
        "idEmpleado": idEmpleado,
        "idCliente": idCliente,
        "fechaPago": fechaPago.value,
        "monto": monto.value
    };

    $.ajax({
        data: parametros,
        url: '../../actions/cuentasporcobrar/actualizarCuentaPorCobrarAction.php',
        type: 'post',
        success: function (response) {
            
            $("#resultado").html(response); 
            limpiarCampos();
            obtenerCuentasPorCobrar();
        },
        error: function( textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        }
    });
}

function obtenerCuentasPorCobrar() {
    
    
    $.ajax({
        data: '',
        url: '../../actions/cuentasporcobrar/obtenerCuentasPorCobrarAction.php',
        type: 'post',
        success: function (response) {
            $("#cuentasPorCobrar").html(response);
            
        },
        
        error: function( textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown);
            
        }
        
    });
    
}

function buscarCuentasPorCobrar() {

    var iID = document.getElementById("cbxCuentasPorCobrar").value;
    
    $.ajax({
        url: "../../actions/cuentasporcobrar/buscarCuentasPorCobrarAction.php",
        type: "POST",
        datatype: "JSON",
        data: {
            valueAction: 1,
            id: iID
        },
        success: function (msg)
        {
            var cbxEmpleado = document.getElementById("cbxEmpleado").value;
            var cbxCliente = document.getElementById("cbxCliente").value;
            var txtFechaPago = document.getElementById("txtFechaPago");
            var txtMonto = document.getElementById("txtMonto");
         
            cbxEmpleado.value = msg.idEmpleado;
            cbxCliente.value = msg.idCliente;
            txtFechaPago.value = msg.fechaPago;
            txtMonto.value =  msg.monto;
           
        },
        error: function( textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        }
    });
}

//
//function cargarCuentasPorCobrar() {
//
//    var combo  = document.getElementById("cbxCuentasPorCobrar").value;
//  
//   // var idEmpleado = combo.options[combo.selectedIndex].text;
//    var idCliente = combo.options[combo.selectedIndex].text;
//    var fechaPago = combo.options[combo.selectedIndex].text;
//    var monto = combo.options[combo.selectedIndex].text;
//     
//    alert('hola');
//    //Cargar los valores en el cuadro de texto
//    var cbxEmpleado = document.getElementById("cbxEmpleado").value;
//    cbxEmpleado.value = idEmpleado;
//    
//    var cbxCliente = document.getElementById("cbxCliente").value;
//    cbxCliente.value = idCliente;
//    
//    var txtFechaPgo = document.getElementById("txtFechaPgo");
//    txtFechaPgo.value = fechaPago;
//    
//    var txtMonto = document.getElementById("txtMonto");
//    txtMonto.value = monto;
//    
//    
//}


function  limpiarCampos() {

    var cbxEmpleado = document.getElementById("cbxEmpleado").value;
    var cbxCliente = document.getElementById("cbxCliente").value;
    var txtFechaPago = document.getElementById("txtFechaPago");
    var txtMonto = document.getElementById("txtMonto");

    cbxEmpleado.value = "";
    cbxCliente.value = "";
    txtFechaPago.value = "";
    txtMonto.value = "";

}