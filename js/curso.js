function bucle(a) {

    for (let i = 0; i < a.length; i++) {
        console.log(i)
        var texto = a[i].innerHTML

        if (texto == "ASIX1-2122" || texto == "ASIX2-2122") {
            console.log("mal")
            a[i].classList.add("badge");
            a[i].classList.add("badge-warning");
            a[i].classList.add("rounded-pill");
            a[i].classList.add("d-inline");
        }

        if (texto == "DAW1-2122" || texto == "DAW2-2122") {
            console.log("bien")
            a[i].classList.add("badge");
            a[i].classList.add("badge-info");
            a[i].classList.add("rounded-pill");
            a[i].classList.add("d-inline");

        }
        if (texto == "EAS1-2122" || texto == "EAS2-2122") {
            console.log("bien")
            a[i].classList.add("badge");
            a[i].classList.add("badge-success");
            a[i].classList.add("rounded-pill");
            a[i].classList.add("d-inline");

        }
        if (texto == "SMX1-2122" || texto == "SMX2-2122") {
            console.log("bien")
            a[i].classList.add("badge");
            a[i].classList.add("badge-danger");
            a[i].classList.add("rounded-pill");
            a[i].classList.add("d-inline");

        }
        if (texto == "CAI1-2122" || texto == "CAI2-2122") {
            console.log("bien")
            a[i].classList.add("badge");
            a[i].classList.add("badge-dark");
            a[i].classList.add("rounded-pill");
            a[i].classList.add("d-inline");

        }
    }
}
var elements = "";
var elementsModal = "";
window.onload = function() {

    // alert('funciono');
    var classe = document.getElementsByClassName("clase");

    bucle(classe);

    var tutor = document.getElementsByClassName("tutor");
    bucle(tutor);





    elementsModal = document.getElementsByClassName("checkmodal")
    elements = document.getElementsByClassName("check");

}