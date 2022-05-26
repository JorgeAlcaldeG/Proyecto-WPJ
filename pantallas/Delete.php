<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./../css/form/style.css">
    <title>Document</title>
</head>
<body>
<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script src='./../js/alertas.js'></script>
<?php
session_start();
if (!isset($_SESSION['session'])) {
    echo "<script>window.location.href='./../index.php'</script>";
  }else{

    // alu 1
    include '../proc/conexion.php';
    $id=$_GET["var"];
    $typeuser=$_GET["typeuser"];

    if($typeuser == "prof"){
        $sql="DELETE FROM tbl_professor WHERE `tbl_professor`.`id_professor` = $id";
        $list=mysqli_query($connection,$sql);
        echo "<script>delet('./../pantallas/CrudAdministradoresProf.php')</script>";

    }else{
        $sql="DELETE FROM tbl_alumne WHERE `tbl_alumne`.`id_alumne` = $id";
        $list=mysqli_query($connection,$sql);
        echo "<script>delet('./../pantallas/CrudAdministradoresAlu.php')</script>";
    }
}
?>
</body>
</html>