<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/login.css">
    <title>Cerrar Sesion</title>
</head>
<body>
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
                background: '#f2344 url(https://sweetalert2.github.io/images/trees.png)',
                backdrop: `
                        rgba(0,0,123,0.4)
                        url("https://sweetalert2.github.io/images/nyan-cat.gif")
                        left top
                        no-repeat
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
