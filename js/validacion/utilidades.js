/*
 * Metodo que depura el nombre ingresado quitando espacios en blanco al inico y final del nombre,
 * ademas deja solo un espacio en blanco en caso de ingresar mas de un nombre.
 */
function depurarTexto(exprecion) {
    //variable de retorno y bandera de control
    var banderaEspacio = 0;
    var nuevoNombre = "";
    //funcion jquery que elimina espacios en blanco al inicio y final de una cadena
    exprecion = $.trim(exprecion);
    nuevoNombre = exprecion.charAt(0).toUpperCase();
    for (i = 1; i < exprecion.length; i++)
    {
        //se pregunta si es el primer espacio en blanco que encuentra en caso de no ser el primero lo omite
        if (exprecion.charAt(i) === ' ' && banderaEspacio === 0)
        {   //copia el espacio y sube la bandare
            banderaEspacio = 1;
            nuevoNombre = nuevoNombre + " ";
        } else {
            //pregunta si el caracter es una letra, si lo es baja la bandera de espacios
            if (exprecion.charAt(i) !== ' ')
            {
                banderaEspacio = 0;
                //pregunta si el caracter anterior es un espacio en blanco, si lo es coloca ese caracter en mayuscula
                if (exprecion.charAt(i - 1) === ' ')
                {
                    nuevoNombre = nuevoNombre + exprecion.charAt(i).toUpperCase();
                } else {
                    nuevoNombre = nuevoNombre + exprecion.charAt(i);
                }//Fin de else
            }//end if es un letra
        }//end else primer espacio en blanco
    }//end for
    return(nuevoNombre);
}

function obtenerFechaFormatoSQL(fecha) {

    var arrayFecha = fecha.split("/");

    return arrayFecha[2] + '/' + arrayFecha[1] + '/' + arrayFecha[0];

}//fin del metodo

function obtenerFechaFormatoWeb(fecha) {

    var arrayFecha = fecha.split("-");

    return arrayFecha[2] + '/' + arrayFecha[1] + '/' + arrayFecha[0];

}//fin del metodo

function validarFecha(fecha) {
    var arrayFecha = fecha.split("/");

    if (arrayFecha.length > 0 && ((arrayFecha[0] > 0 && arrayFecha[0] <= 31)
            && (arrayFecha[1] > 0 && arrayFecha[1] <= 12) && arrayFecha[2] > 0)) {

        return true;
    } else {
        mandarMensaje("La fecha ingresada es inválida.\nDebe ser dd/mm/yyyy");
        return false;
    }
}//fin del metodo

function datePickerLatino() {

    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };

    $.datepicker.setDefaults($.datepicker.regional['es']);

    $(function () {
        $("#txtFechaNacimiento").datepicker();
        $("#txtFechaEmision").datepicker();
        $("#txtFechaExpiracion").datepicker();
    });

}

function  moneda() {
    $(document).ready(function () {
        $('.currency').blur(function () {
            $('.currency').formatCurrency();
        });
    });
}//Fin de funcion

function validarNumero(expresion) {
    var expresionNumerica = /^(\d|-)?\$?(?!0,00)(([0-9]{1,3}.([0-9]{3}.)*)[0-9]{3}|[0-9]{1,3})(\,[0-9]{2})?$/;

    if (expresionNumerica.test(expresion) === true) {
        return true;
    } else {
        return false;
    }
}//Fin metodo

function validarPassword(password) {
    var re = /^[a-z\d]{8,}$/i;
    var nre = /^([A-Z]{8,}|[a-z]{8,}|\d{8,}|[A-Z\d]{8,}|[A-Za-z]{8,}|[a-z\d]{8,})$/;


    if (re.test(password) && !nre.test(password)) {
        return true;
    } else {
        alert('Su password debe contener minimo 8 caracteres alfanumericos y sin espacios.\nCon al menos una letra en mayuscula');
        txtPassword.focus();
        return false;
    }
}

function mandarMensaje(mensaje) {
    alert(mensaje);
//    $("#resultado").html(mensaje);
//    $("#resultado").dialog();
}

function recarga() {
    $('.currency').formatCurrency();
}