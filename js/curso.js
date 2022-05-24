window.onload = function() {


    var classe = document.getElementsByClassName("clase");
    console.log(classe);
    bucle(classe);
    console.log(classe[0])

};

function bucle(a) {
    for (let i = 0; i < a.length; i++) {
        console.log(i)
        var texto = a[i].innerHTML
        console.log(texto)
        console.log(a[i])
        if (texto == "ASIX1-2122") {
            console.log("mal")
            a[i].classList.add("badge");
            a[i].classList.add("badge-warning");
            a[i].classList.add("rounded-pill");
            a[i].classList.add("d-inline");
        }
        if (texto == "ASIX2-2122") {
            console.log("bien")
            a[i].classList.add("badge");
            a[i].classList.add("badge-primary");
            a[i].classList.add("rounded-pill");
            a[i].classList.add("d-inline");

        }
        if (texto == "DAW1-2122") {
            console.log("bien")
            a[i].classList.add("badge");
            a[i].classList.add("badge-info");
            a[i].classList.add("rounded-pill");
            a[i].classList.add("d-inline");

        }
        if (texto == "DAW2-2122") {
            console.log("bien")
            a[i].classList.add("badge");
            a[i].classList.add("badge-success");
            a[i].classList.add("rounded-pill");
            a[i].classList.add("d-inline");

        }
    }
}