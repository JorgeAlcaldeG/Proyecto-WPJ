<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> </title>
    </head>
    <body>
    <?php
        session_start();
        require 'conexion.php';
        if (isset($_POST['insesion'])|| $_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['logemail']) || empty($_POST['logpass'])) {    
            } else{
                $email = mysqli_real_escape_string($connection, $_POST['logemail']);
                $pwd = sha1(mysqli_real_escape_string($connection, $_POST['logpass']));
                //Subir datos a la tabla correspondiente

                //Procederemos a hacer una consulta que buscara el correo del usuario
                $sesion = "SELECT * from tbl_admin WHERE email_admin='$email' and passwd='$pwd';";
                //Realizamos la consulta y anadimos $connection, ya que es la variable que creamos en nuestro archivo connection.php    
                $resultado = $connection->query($sesion);
                
                //Usaremos la funcion mysqli_num_rows en la consulta $resultado,
                //esta funcion nos regresa el numero de filas en el resultado
                $contador = mysqli_num_rows($resultado);
    
                $datos = mysqli_fetch_assoc($resultado);
                //SI SI EXISTE una fila, quiere decir QUE SI ESTA EL CORREO EN LA BASE DE DATOS
                if($contador == 1) {
                    $_SESSION['session'] = 3;
                    $_SESSION['id'] = $datos['id_admin'];
                    $_SESSION['nom'] = $datos['nombre_admin'];
                    $_SESSION['email'] = $datos['email_admin'];
                    echo "<script> window.location.href='./../pantallas/CrudAdministradoresAlu.php'</script>";
                }else {
                    //Procederemos a hacer una consulta que buscara el correo del usuario
                    $sesion = "SELECT * from tbl_professor WHERE email_prof='$email' and passwd='$pwd';";
                    //Realizamos la consulta y anadimos $connection, ya que es la variable que creamos en nuestro archivo connection.php    
                    $resultado = $connection->query($sesion);
                    
                    //Usaremos la funcion mysqli_num_rows en la consulta $resultado,
                    //esta funcion nos regresa el numero de filas en el resultado
                    $contador = mysqli_num_rows($resultado);
                    
                    $datos = mysqli_fetch_assoc($resultado);
                    //SI SI EXISTE una fila, quiere decir QUE SI ESTA EL CORREO EN LA BASE DE DATOS
                    if($contador == 1) {
                        $_SESSION['session'] = 2;
                        $_SESSION['id'] = $datos['id_professor'];
                        $_SESSION['nom'] = $datos['nom_prof'];
                        $_SESSION['email'] = $datos['email_prof'];
                        echo "<script> window.location.href='./../pantallas/CrudAdministradoresAlu.php'</script>";
                    }else {
                        //Procederemos a hacer una consulta que buscara el correo del usuario
                        $sesion = "SELECT * from tbl_alumne WHERE email_alu='$email' and passwd='$pwd';";
                        //Realizamos la consulta y anadimos $connection, ya que es la variable que creamos en nuestro archivo connection.php    
                        $resultado = $connection->query($sesion);
                        
                        //Usaremos la funcion mysqli_num_rows en la consulta $resultado,
                        //esta funcion nos regresa el numero de filas en el resultado
                        $contador = mysqli_num_rows($resultado);
                        
                        $datos = mysqli_fetch_assoc($resultado);
                        //SI SI EXISTE una fila, quiere decir QUE SI ESTA EL CORREO EN LA BASE DE DATOS
                        if($contador == 1) {
                            $_SESSION['session'] = 1;
                            $_SESSION['nom'] = $datos['nom_alu'];
                            echo "<script> window.location.href='./alumn.php'</script>";   
                        }else {
                            echo "<script> window.location.href='./../index.php?msg=1'</script>";   
                        }
                    }
                }
            }
        }else {
            echo "<script> window.location.href='./../index.php?msg=1'</script>";   
        }
    ?>

</body>
</html>