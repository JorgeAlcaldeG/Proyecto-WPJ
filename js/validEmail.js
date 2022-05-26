var validaAsunto = function(evento) {
    var valor = evento.target.value;
    console.log(valor);
    if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
        if (document.getElementById("mailmsg") == null) {
            var parrafo = document.createElement("p");
            var contenido = document.createTextNode("Rellena el campo asunto y mensaje");
            parrafo.appendChild(contenido);
            document.getElementById("mailmens").appendChild(parrafo);
            parrafo.setAttribute('id', 'mailmsg');
        }
        event.target.focus();
    } else {
        var parrafo = document.getElementById("mailmsg");
        parrafo.parentNode.removeChild(parrafo);
    }
}

window.onload = function() {
    document.getElementById("asunto").onblur = validaAsunto;
    document.getElementById("mensaje").onblur = validaAsunto;

}