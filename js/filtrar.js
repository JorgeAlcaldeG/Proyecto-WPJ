window.onload = function() {
    document.getElementById("curso").onchange = filtrarCurso;
    document.getElementById("tut").onchange = filtrarProfesores;


}
var curso = "%"
var tut = "1 and 1000"
var cheked = false;
var ElementToChek = "";



function filtrarCurso(event) {
    alert("hola");
    // prof = document.getElementById("select_tutor").value
    // alert(prof)
    curso = event.target.value
    alert(event.target.value)
    window.location.href = "CrudAdministradoresAlu.php?tut=" + tut + "&curso=" + curso;


}

function filtrarProfesores(event) {
    alert(hola)
    tut = event.target.value;
    window.location.href = "CrudAdministradoresAlu.php?tut=" + tut + "&curso=" + curso;

}