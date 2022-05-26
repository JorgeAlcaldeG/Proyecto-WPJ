function aviso(url) {
    Swal.fire({
        icon: 'success',
        title: 'Correo enviado',
        text: 'No se han encontrado ninguna inicidencia',
        showConfirmButton: true,
        confirmButtonText: 'Inicio'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}

function aviso1(url) {
    Swal.fire({
        icon: 'success',
        title: 'Usuario creado',
        text: 'Se ha creado correctamente',
        showConfirmButton: true,
        confirmButtonText: 'Inicio'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}

function error(url) {
    Swal.fire({
        icon: 'warning',
        title: 'Hubo  un problema para enviar tu correo',
        text: 'Vuelve intentarlo más tarde, estamos trabajando en ello',
        showConfirmButton: true,
        confirmButtonText: 'Regresar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}

function error1(url) {
    console.log(20)
    Swal.fire({
        icon: 'error',
        title: 'Error Imagen',
        text: 'Revisa la imagen que estas subiendo, recuerda el formato y el tamaño de esta',
        showConfirmButton: true,
        confirmButtonText: 'Regresar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}

function out(url) {
    Swal.fire({
            title: 'Has cerrado sesión correctamente.',
            width: 600,
            padding: '3em',
            color: '#716add',
            backdrop: `
                #02ec9e00
                url("https://sweetalert2.github.io/images/nyan-cat.gif")
                left top
                repeat
              `
        })
        .then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
}

function confirm(url) {
    Swal.fire({
        title: 'Cuidado',
        text: "Estas apunto de aliminar un registro",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url
        }
    })
}

function delet(url) {
    Swal.fire({
        icon: 'success',
        title: 'Registro Eliminado',
        text: 'Se ha eliminado el registro correctamente',
        showConfirmButton: true,
        confirmButtonText: 'Inicio'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}

function modificar(url) {
    Swal.fire({
        title: 'Modificar',
        text: "Estas apunto de Modificar un registro",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Modificar',
        cancelButtonText: 'cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url
        }
    })
}

function alertaconf(url) {
    console.log(20)
    Swal.fire({
        icon: 'success',
        title: 'Modificado',
        text: 'El usuario se ha modificado correctamente',
        showConfirmButton: true,
        confirmButtonText: 'Regresar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}

function errorfoto(url) {
    console.log(20)
    Swal.fire({
        icon: 'Cuidado',
        title: 'Cuidado',
        text: 'Hubo un problema en subir la foto, intentalo más tarde. Estamos en ello',
        showConfirmButton: true,
        confirmButtonText: 'Inicio'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}

function errorformat(url) {
    console.log(20)
    Swal.fire({
        icon: 'Cuidado',
        title: 'Formato o Tamaño incompatible',
        text: 'El formato de la foto debe de ser jpg o png. No debe de ocupar mucho espacio',
        showConfirmButton: true,
        confirmButtonText: 'Inicio'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}

function errortext(url) {
    console.log(20)
    Swal.fire({
        icon: 'Cuidado',
        title: 'Datos Invalidos',
        text: 'Tenemos datos ya registrados, porfavor revisa los datos modificados',
        showConfirmButton: true,
        confirmButtonText: 'Volver'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}