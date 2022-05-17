<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- CSS -->

    <link rel="stylesheet" href="./../css/index/login.css">
    <title>Cerrar Sesion</title>
</head>
<body>
    <br>
    <?php
    session_start();

    session_destroy();
    ?>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
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
        aviso('../index.php');
    </script>
</body>
</html>
