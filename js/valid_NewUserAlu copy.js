var validaTexto = function(evento) {
    var valor = evento.target.value;
    console.log(valor);
    if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
        if (document.getElementById("newuserName") == null) {
            var parrafo = document.createElement("p");
            var contenido = document.createTextNode("Inserta un nombre");
            parrafo.appendChild(contenido);
            document.getElementById("NewUserMSG").appendChild(parrafo);
            parrafo.setAttribute('id', 'newuserName');
        }
        event.target.focus();
    } else {
        var parrafo = document.getElementById("newuserName");
        parrafo.parentNode.removeChild(parrafo);
    }
}
var validaApellidos = function(evento) {
    var valor = evento.target.value;
    console.log(valor);
    if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
        if (document.getElementById("newuserName") == null) {
            var parrafo = document.createElement("p");
            var contenido = document.createTextNode("Inserta un apellido");
            parrafo.appendChild(contenido);
            document.getElementById("NewUserMSG").appendChild(parrafo);
            parrafo.setAttribute('id', 'newuserName');
        }
        event.target.focus();
    } else {
        var parrafo = document.getElementById("newuserName");
        parrafo.parentNode.removeChild(parrafo);
    }
}

function validarDNI(event) {
    var dni = event.target.value
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    if (!(/^\d{8}[A-Z]$/.test(dni))) {
        if (document.getElementById("newuserName") == null) {
            var parrafo = document.createElement("p");
            var contenido = document.createTextNode("DNI incorrecto");
            parrafo.appendChild(contenido);
            document.getElementById("NewUserMSG").appendChild(parrafo);
            parrafo.setAttribute('id', 'newuserName');
            //console.log(event.target.name + " sin rellenar");
            event.target.focus();
        }
    }
    if ((dni.charAt(8) != letras[(dni.substring(0, 8)) % 23]) || dni == null) {
        if (document.getElementById("newuserName") == null) {
            var parrafo = document.createElement("p");
            var contenido = document.createTextNode("Letra del DNI incorrecta");
            parrafo.appendChild(contenido);
            document.getElementById("NewUserMSG").appendChild(parrafo);
            parrafo.setAttribute('id', 'newuserName');
            //console.log(event.target.name + " sin rellenar");
            event.target.focus();
        }
    } else {
        var parrafo = document.getElementById("newuserName");
        parrafo.parentNode.removeChild(parrafo);
    }
}
var validaTel = function(evento) {
    var valor = evento.target.value;
    console.log(valor);
    if (!(/^\d{9}$/.test(valor))) {
        if (document.getElementById("newuserName") == null) {
            var parrafo = document.createElement("p");
            var contenido = document.createTextNode("Formato del telefono incorrecto");
            parrafo.appendChild(contenido);
            document.getElementById("NewUserMSG").appendChild(parrafo);
            parrafo.setAttribute('id', 'newuserName');
        }
        event.target.focus();
    } else {
        var parrafo = document.getElementById("newuserName");
        parrafo.parentNode.removeChild(parrafo);
    }
}
var validaMail = function(evento) {
    var valor = evento.target.value;
    console.log(valor);
    if (!(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(valor))) {
        if (document.getElementById("newuserName") == null) {
            var parrafo = document.createElement("p");
            var contenido = document.createTextNode("Formato del email incorrecto");
            parrafo.appendChild(contenido);
            document.getElementById("NewUserMSG").appendChild(parrafo);
            parrafo.setAttribute('id', 'newuserName');
            
        }
        event.target.focus();
    } else {
        var parrafo = document.getElementById("newuserName");
        parrafo.parentNode.removeChild(parrafo);
    }
}
window.onload = function() {
    document.getElementById("newusername").onblur = validaTexto;
    document.getElementById("newuserape1").onblur = validaApellidos;
    document.getElementById("newuserape2").onblur = validaApellidos;
    document.getElementById("newuserdni").onblur = validarDNI;
    document.getElementById("newusertel").onblur = validaTel;
    document.getElementById("newusermail").onblur = validaMail;

}