<?php
function PerfilAlu($id){
    include '../proc/conexion.php';

    $alu=$id;
    $sql="SELECT * FROM tbl_alumne where id_alumne=1";
    $query=mysqli_query($connection,$sql);
    foreach($query as $datos){
        echo "<span>{$datos["nom_alu"]}</span>";
        echo "<span>{$datos["nom_alu"]}</span>";
        echo "<span>{$datos["nom_alu"]}</span>";
        //echo"<img src='{$contacto["id"]}'' alt='' srcset=''>";
        //var_dump($datos);
    }
}