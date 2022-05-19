// var validaMail = function(evento) {
//     var valor = evento.target.value;
//     if (!(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(valor))) {
//         if (document.getElementById("mail") == null) {
//             var parrafo = document.createElement("p");
//             var contenido = document.createTextNode("Mail incorrecto");
//             parrafo.appendChild(contenido);
//             document.getElementById("msg").appendChild(parrafo);
//             parrafo.setAttribute('id', 'mail');
//         }
//         event.target.focus();
//     } else {
//         var parrafo = document.getElementById("mail");
//         parrafo.parentNode.removeChild(parrafo);
//     }
// }
// var validaTexto = function(evento) {
//     var valor = evento.target.value;
//     console.log(valor);
//     if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
//         if (document.getElementById("pass") == null) {
//             var parrafo = document.createElement("p");
//             var contenido = document.createTextNode("Falta la contraseña");
//             parrafo.appendChild(contenido);
//             document.getElementById("msg2").appendChild(parrafo);
//             parrafo.setAttribute('id', 'pass');
//         }
//         event.target.focus();
//     } else {
//         var parrafo = document.getElementById("pass");
//         parrafo.parentNode.removeChild(parrafo);
//     }
// }

// window.onload = function() {
//     document.getElementById("logemail").onblur = validaMail;
//     document.getElementById("logpass").onblur = validaTexto;

// }