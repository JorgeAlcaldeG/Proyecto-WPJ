<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="./../css/form/style.css">
    <title>Document</title>
</head>
<body>
<div class="login-box">        
    <?php
    $EST = 0;
    if ($_GET['typeuser'] == 'alu' ) {
        $EST = 1;
        echo'<script  src="../js/valid_NewUserAlu.js"></script>';
        echo "<h2>Registro Alumno</h2>";
        // redireccionamiento a la pagina inicio
    }else{
        echo'<script  src="../js/valid_NewUserProf.js"></script>';
        echo "<h2>Registro Profesor</h2>";
    }
    
    $id=$_GET["var"];
    $typeuser=$_GET["typeuser"];
    
    include '../proc/conexion.php';
    include '../funcionesphp/modify.php';

    // $sql = "SELECT * FROM tbl_alumne WHERE id_alumne={$id}";
    // $sqlcurso = "SELECT id_classe, codi_classe FROM tbl_classe";
    // $result = mysqli_query($connection, $sql);
    // $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($typeuser=="alu"){
        modifyAlu($id);
    }
    if($typeuser=="prof"){
        modifyProf($id);
    }
    if(isset($_GET['msg'])){
                echo'<p>Sube una imagen con el siguiente formato: jpg, gif o png</p>';     
            }
?>
</div>

</body>
</html>