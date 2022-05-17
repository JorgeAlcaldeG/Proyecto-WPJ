<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $id=$_GET["var"];
    $typeuser=$_GET["typeuser"];
    
    include '../proc/conexion.php';
    include '../funcionesphp/modify.php';

    // $sql = "SELECT * FROM tbl_alumne WHERE id_alumne={$id}";
    // $sqlcurso = "SELECT id_classe, codi_classe FROM tbl_classe";
    // $result = mysqli_query($connection, $sql);
    // $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($typeuser==0){
        modifyAlu($id);
    }
    if($typeuser==1){
        modifyProf($id);
    }
    ?>
<?php
    if(isset($_GET['msg'])){
                echo'<p>Sube una imagen con el siguiente formato: jpg, gif o png</p>';     
            }
?>
</body>
</html>