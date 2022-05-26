<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/form/style.css">
    <title>Document</title>
</head>
<body>
<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script src='./../js/alertas.js'></script>
<?php
require "conexion.php";
if (!isset($_POST['Nie'])) {
    # Si esta vacio, significa que estaremos registrando a un Profesor
    $name =  mysqli_real_escape_string($connection,$_POST['nom']);
    $lastnam =  mysqli_real_escape_string($connection,$_POST['apellido']);
    $lstnam2 =  mysqli_real_escape_string($connection,$_POST['apellido2']);
    $email =  mysqli_real_escape_string($connection,$_POST['mail']);
    $psw = sha1(1234);
    $curs =  mysqli_real_escape_string($connection,$_POST['curso']);
    $telf =  mysqli_real_escape_string($connection,$_POST['telf']);
    $foto =  $_FILES['foto'];
    // $ruta="/www/Proyecto-WPJ/img/profesores/";
    // $tipo = explode("/",$foto['type']); 
    // var_dump($_SERVER);
    // var_dump($tipo);
    // echo "<br>";
    // echo "<br>";

    // var_dump($foto);
    // $destinolocal= $_SERVER['DOCUMENT_ROOT'].$ruta.$name.".".$tipo[1];
    // $destinored = "http://".$_SERVER['SERVER_NAME'].$ruta.$name.".".$tipo[1];
    if ($foto['size']== 0) {
        $foto = "default.png";
        $sesion = "SELECT * from tbl_professor WHERE email_prof='$email';";
            //Realizamos la consulta y anadimos $connection, ya que es la variable que creamos en nuestro archivo connection.php    
            $resultado = $connection->query($sesion);
    
            //Usaremos la funcion mysqli_num_rows en la consulta $resultado,
            //esta funcion nos regresa el numero de filas en el resultado
            $contador = mysqli_num_rows($resultado);
            
            $datos = mysqli_fetch_assoc($resultado);
            //SI SI EXISTE una fila, quiere decir QUE SI ESTA EL CORREO EN LA BASE DE DATOS
            if($contador == 0) {
                    //CONEXION A LA BASE DE DATOS
                    // SUBIR LOS DATOS EN LA BASE DA DATOS
                    $sql = "INSERT INTO tbl_professor (`nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`, `dept`, `passwd`, `img_prof`,`classe`) VALUES ('$name', '$lastnam', '$lstnam2', '$email', '$telf', '$curs', '$psw', '$foto', 5);";
                    $insert = mysqli_query($connection , $sql);
                    echo "<script>aviso1('./../pantallas/CrudAdministradoresProf.php');</script>";
                }else{
                }
        
    }else{
        $destino='../img/profesores/'.$name.substr($foto['name'], -4);
        $nombrefichero=$name.substr($foto['name'], -4);
    
        //LIMITAMOS LA SUBIDA DE UN ARCHIVO POR TAMAÑO
        //TAMBIEN SE PUEDE LIMITAR POR EXTENSIÓN COMO SE HA PODIDO VER DESPUES DEL &&
        if ($foto['size']<200*2024 && $foto['type']="image/jpeg" || $foto['type']="image/png" || $foto['type']="image/gif") {
            $sesion = "SELECT * from tbl_professor WHERE email_prof='$email';";
            //Realizamos la consulta y anadimos $connection, ya que es la variable que creamos en nuestro archivo connection.php    
            $resultado = $connection->query($sesion);
    
            //Usaremos la funcion mysqli_num_rows en la consulta $resultado,
            //esta funcion nos regresa el numero de filas en el resultado
            $contador = mysqli_num_rows($resultado);
            
            $datos = mysqli_fetch_assoc($resultado);
            //SI SI EXISTE una fila, quiere decir QUE SI ESTA EL CORREO EN LA BASE DE DATOS
            if($contador == 0) {
                if (move_uploaded_file($foto['tmp_name'],$destino)) {
                    //CONEXION A LA BASE DE DATOS
                    // SUBIR LOS DATOS EN LA BASE DA DATOS
                    $sql = "INSERT INTO tbl_professor (`nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`, `dept`, `passwd`, `img_prof`, `classe`) VALUES ('$name', '$lastnam', '$lstnam2', '$email', '$telf', '$curs', '$psw', '$nombrefichero',5);";
                    $insert = mysqli_query($connection , $sql);
                    echo "<script>aviso1('./../pantallas/CrudAdministradoresProf.php');</script>";
                }
            }else{
    
                echo "<script>error('./../pantallas/CrudAdministradoresProf.php');</script>";
            }
        }else{
            echo "<script>error1('./../pantallas/CrudAdministradoresProf.php');</script>";
        }
    }
 }else{

// -----------------PROCESO ALUMNOS--------------------
    # Si esta vacio, significa que estaremos registrando a un Profesor
    $name =  mysqli_real_escape_string($connection,$_POST['nom']);
    $lastnam =  mysqli_real_escape_string($connection,$_POST['apellido']);
    $lstnam2 =  mysqli_real_escape_string($connection,$_POST['apellido2']);
    $NIE =  mysqli_real_escape_string($connection,$_POST['Nie']);
    $email =  mysqli_real_escape_string($connection,$_POST['mail']);
    $psw = sha1(1234);
    $curs =  mysqli_real_escape_string($connection,$_POST['curso']);
    $telf =  mysqli_real_escape_string($connection,$_POST['telf']);
    $foto =  $_FILES['foto'];
    // $ruta="/www/Proyecto-WPJ/img/profesores/";
    // $tipo = explode("/",$foto['type']); 
    // var_dump($_SERVER);
    // var_dump($tipo);
    // echo "<br>";
    // echo "<br>";

    // var_dump($foto);
    // $destinolocal= $_SERVER['DOCUMENT_ROOT'].$ruta.$name.".".$tipo[1];
    // $destinored = "http://".$_SERVER['SERVER_NAME'].$ruta.$name.".".$tipo[1];
    if ($foto['size']== 0) {
        $foto = "default.png";
        $sesion = "SELECT * from tbl_alumne WHERE email_alu='$email' or dni_alu='$email';";
            //Realizamos la consulta y anadimos $connection, ya que es la variable que creamos en nuestro archivo connection.php    
            $resultado = $connection->query($sesion);
            //Usaremos la funcion mysqli_num_rows en la consulta $resultado,
            //esta funcion nos regresa el numero de filas en el resultado
            $contador = mysqli_num_rows($resultado);
            
            $datos = mysqli_fetch_assoc($resultado);
            //SI SI EXISTE una fila, quiere decir QUE SI ESTA EL CORREO EN LA BASE DE DATOS
            if($contador == 0) {
                    //CONEXION A LA BASE DE DATOS
                    // SUBIR LOS DATOS EN LA BASE DA DATOS
                    $sql = "INSERT INTO tbl_alumne (`dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`, `passwd`, `img_alu`) VALUES ('$NIE', '$name', '$lastnam', '$lstnam2', '$telf', '$email', '$curs', '$psw', '$foto');";
                    $insert = mysqli_query($connection , $sql);
                    echo "<script>aviso1('./../pantallas/CrudAdministradoresAlu.php');</script>";
                }else{
                    echo "<script>error('./../pantallas/CrudAdministradoresAlu.php');</script>";
                }
        
    }else{
        $destino='../img/alumnos/'.$name.substr($foto['name'], -4);
        $nombrefichero=$name.substr($foto['name'], -4);
    
        //LIMITAMOS LA SUBIDA DE UN ARCHIVO POR TAMAÑO
        //TAMBIEN SE PUEDE LIMITAR POR EXTENSIÓN COMO SE HA PODIDO VER DESPUES DEL &&
        if ($foto['size']<200*2024 && $foto['type']="image/jpeg" || $foto['type']="image/png" || $foto['type']="image/gif") {
            $sesion = "SELECT * from tbl_professor WHERE email_prof='$email';";
            //Realizamos la consulta y anadimos $connection, ya que es la variable que creamos en nuestro archivo connection.php    
            $resultado = $connection->query($sesion);
    
            //Usaremos la funcion mysqli_num_rows en la consulta $resultado,
            //esta funcion nos regresa el numero de filas en el resultado
            $contador = mysqli_num_rows($resultado);
            
            $datos = mysqli_fetch_assoc($resultado);
            //SI SI EXISTE una fila, quiere decir QUE SI ESTA EL CORREO EN LA BASE DE DATOS
            if($contador == 0) {
                if (move_uploaded_file($foto['tmp_name'],$destino)) {
                    //CONEXION A LA BASE DE DATOS
                    // SUBIR LOS DATOS EN LA BASE DA DATOS
                    $sql = "INSERT INTO tbl_alumne (`dni_alu`, `nom_alu`, `cognom1_alu`, `cognom2_alu`, `telf_alu`, `email_alu`, `classe`, `passwd`, `img_alu`) VALUES ('$NIE', '$name', '$lastnam', '$lstnam2', '$telf', '$email', '$curs', '$psw', '$nombrefichero');";
                    $insert = mysqli_query($connection , $sql);
                    echo "<script>aviso1('./../pantallas/CrudAdministradoresAlu.php');</script>";
                }
            }else{
                echo "<script>error('./../pantallas/CrudAdministradoresAlu.php');</script>";
    
                echo "Correo o NIE esta ya en uso, porfavor compruebe los datos";
            }
        }else{
            echo "<script>error1('./../pantallas/CrudAdministradoresAlu.php');</script>";
        }
    }
}
?>

    <br>
</body>
</html>
