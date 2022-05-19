window.onload = function() {
    document.getElementsByName("curso")[0].onchange = filtrarCurso;
    document.getElementById("select_tutor").onchange = filtrarProfesores;


}
var curso = "%"
var prof = "1=1"
var cheked = false;
var ElementToChek = "";

if (sessionStorage.getItem(true)) {
    ElementToChek.cheked = true;
}

function filtrarCurso(event) {
    alert("hola");
    // prof = document.getElementById("select_tutor").value
    // alert(prof)
    curso = event.target.value

    window.location.href = "CrudAdministradoresAlu.php?tut=" + prof + "&curso=" + curso;
    ElementToChek = event.target;
    hecked = window.localStorage.sessionStorage.setItem(true, ElementToChek.cheked)
    alert(cheked);
}

function filtrarProfesores(event) {
    curso = document.getElementById("select_curso").value
    prof = event.target.value
    alert(event.target.innerHTML)

    window.location.href = "CrudAdministradoresAlu.php?tut=" + prof + "&curso=" + curso;
}