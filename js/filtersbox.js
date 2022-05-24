window.onload = function() {
    document.getElementById("spanFilters").onclick = abrirfiltros;
}

function abrirfiltros() {
    alert("funciono")
    var elemento = document.getElementById("filters")
    elemento.style.display = "none";
}