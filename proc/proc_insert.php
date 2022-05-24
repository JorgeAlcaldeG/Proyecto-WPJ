<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./../css/style.css">
    <title>Document</title>
</head>
<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script>
function aviso(url){
    Swal.fire({
        icon: 'success',
        title: 'Usuario Añadidos',
        text: 'No se han encontrado ninguna inicidencia',
        showConfirmButton: true,
        confirmButtonText: 'Inicio'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}
function error(url){
    Swal.fire({
        icon: 'error',
        title: 'Usuario Conflictivo',
        text: 'Algun dato puede ya estar registrado, revise su formulario',
        showConfirmButton: true,
        confirmButtonText: 'Regresar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}
</script>

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
                    $sql = "INSERT INTO tbl_professor (`nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`, `dept`, `passwd`, `img_prof`) VALUES ('$name', '$lastnam', '$lstnam2', '$email', '$telf', '$curs', '$psw', '$foto');";
                    $insert = mysqli_query($connection , $sql);
                    echo "<script>aviso('./../pantallas/CrudAdministradoresProf.php');</script>";
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
                    $sql = "INSERT INTO tbl_professor (`nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`, `dept`, `passwd`, `img_prof`) VALUES ('$name', '$lastnam', '$lstnam2', '$email', '$telf', '$curs', '$psw', '$nombrefichero');";
                    $insert = mysqli_query($connection , $sql);
                    echo "<script>aviso('./../pantallas/CrudAdministradoresProf.php');</script>";
                }
            }else{
    
                echo "Correo utilizado ya esta en uso, porfavor registrese con otro correo";
            }
        }else{
            echo "El archivo que intentas subir es demsaido grande y supera los 50K";
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
                    echo "<script>aviso('./../pantallas/CrudAdministradoresAlu.php');</script>";
                }else{
                    echo "Correo o NIE esta ya en uso, porfavor compruebe los datos";
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
                    echo "<script>aviso('./../pantallas/CrudAdministradoresAlu.php');</script>";
                }
            }else{
                echo "<script>error('./../pantallas/form.php');</script>";
    
                echo "Correo o NIE esta ya en uso, porfavor compruebe los datos";
            }
        }else{
            echo "El archivo que intentas subir es demsaido grande y supera los 50K";
        }
    }
}
?>
<body>
    <br>
</body>
</html>
