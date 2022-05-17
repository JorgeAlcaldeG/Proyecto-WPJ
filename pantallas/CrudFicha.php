<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSS -->

    <link rel="stylesheet" href="../css/CrudAdministradoresProf/styles.css">

</head>
<body>
<?php
    include '../proc/conexion.php';
    include '../funcionesPHP/perfil_func.php';
    // $id=$_POST[""];
?>
<!-- Div nav -->
<div class="nav">
<span id="logo"></span>
    <span id="spanAlumnos">
    <a href="./CrudAdministradoresAlu.php">Alumnos</a>
    </span>
    <span id="spanProfesores">
        <a href="./CrudAdministradoresProf.php">Profesores</a>
    </span>
    
</div>

<!-- Div box -->
<div class="box">

    <!-- div cabecera -->
    <div class="cabecera">
        <h2>Profesores</h2>

    </div>
    <!-- div pagina -->
    <div class="pagina">

    <?php
        PerfilAlu(1);
    ?>
    </div>

</div>


    
</body>
</html>

