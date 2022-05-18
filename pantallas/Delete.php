<?php
// alu 1
include '../proc/conexion.php';
$id=$_GET["var"];
$typeuser=$_GET["typeuser"];

if($typeuser == "prof"){
    $sql="DELETE FROM tbl_professor WHERE `tbl_professor`.`id_professor` = $id";
    $list=mysqli_query($connection,$sql);
}else{
    $sql="DELETE FROM tbl_alumne WHERE `tbl_alumne`.`id_alumne` = $id";
    $list=mysqli_query($connection,$sql); 
}