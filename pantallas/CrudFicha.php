<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <!-- CSS -->

    <link rel="stylesheet" href="../css/CrudAdministradoresProf/styles.css">
    <link rel="stylesheet" href="../css/perfil/styles.css">

</head>
<body>
<?php
    include '../funcionesPHP/perfil.php';
?>
<!-- Div nav -->
<div class="nav">
<span id="logo"></span>
    <span id="spanAlumnos">
    <a href="./CrudAdministradoresAlu.php">Alumnos</a>
    </span>
    <span id="spanAlumnos">
        <a href="./CrudAdministradoresProf.php">Profesores</a>
    </span>
    
</div>

<!-- Div box -->
<div class="box">

    <!-- div cabecera -->
    <div class="cabecera">
        <h2>Perfil</h2>

    </div>
    <!-- div pagina -->
    <div class="pagina">

    <?php
        //perfilProf($_GET["var"]);
        if($_GET["typeuser"]==1){
            perfilAlu($_GET["var"]);
        }else{
            perfilProf($_GET["var"]);
        }
    ?>
    </div>

</div>


    
</body>
</html>

