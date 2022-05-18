window.onload = function() {
    document.getElementById("select_curso").onchange = filtrarCurso;
}

function filtrarCurso(event) {

    var curso = event.target.value
    window.location.href = "CrudAdministradoresAlu.php?curso=" + curso;
}