<?php
include '../proc/conexion.php';
if($_GET['typeuser']=0){
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $dni = $_POST['dni'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $id = $_POST['id'];
    $foto = $_FILES['foto'];
    $fname=$foto["name"];
    $curso = $_POST['curso'];
    $destino='../img/alumnos/'.$nombre.substr($foto['name'], -4);
    $nombrefichero=$nombre.substr($foto['name'], -4);
    //var_dump($foto);
    
    if($foto["size"]==0){
            $sql="UPDATE `tbl_alumne` SET `dni_alu` = '$dni', `nom_alu` = '$nombre', `cognom1_alu` = '$apellido1', `cognom2_alu` = '$apellido2',`telf_alu`='$telefono', `email_alu`='$correo', `classe`='$curso' WHERE `tbl_alumne`.`id_alumne` = $id";
            $listalumnos=mysqli_query($connection,$sql); 
    }else{
        if(($foto['size']<100000) && ($foto['type']=="image/jpeg" || $foto['type']=="image/png" || $foto['type']=="image/gif")){
            $exito=move_uploaded_file($foto['tmp_name'], $destino);
            if($exito){
                $sql="UPDATE `tbl_alumne` SET `dni_alu` = '$dni', `nom_alu` = '$nombre', `cognom1_alu` = '$apellido1', `cognom2_alu` = '$apellido2',`telf_alu`='$telefono', `email_alu`='$correo', `classe`='$curso', `img`='$nombrefichero' WHERE `tbl_alumne`.`id_alumne` = $id";
                $listalumnos=mysqli_query($connection,$sql);
            }else{
                header('Location: ../pantallas/Modify.php');
            }
        }else{
            header("Location: ../pantallas/Modify.php?msg=fallo&var={$id}");
        }
    }
}else{
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $id = $_POST['id'];
    $foto = $_FILES['foto'];
    $fname=$foto["name"];
    $curso = $_POST['curso'];
    $destino='../img/profesores/'.$nombre.substr($foto['name'], -4);
    $nombrefichero=$nombre.substr($foto['name'], -4);
}
