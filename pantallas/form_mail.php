<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- iconos -->
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
    <link rel="stylesheet" href="./../css/form/style.css">
</head>
<body>
<div class="login-box">   
    <h2>Enviar correo</h2>
    <?php
    //var_dump($_POST);
    if(!isset($_GET['msg'])){
        if(empty($_POST)){
            if($_GET["var"]=="alu"){
                header('Location: CrudAdministradoresAlu.php?msg=error');
            }else{
                header('Location: CrudAdministradoresProf.php?msg=error');
            }
        }
    }
    if(isset($_GET["msg"])){
            if($_GET["var"]=="alu"){
                header('Location: CrudAdministradoresAlu.php?msg2=error');
            }else{
                header('Location: CrudAdministradoresProf.php?msg2=error');
            }  
      }
    $correos=array();
    include "../proc/conexion.php";
    echo"<h3 class='Correo'>Correos elegidos: </h3>";
    if($_GET["var"]=="alu"){
        foreach ($_POST as $name){
            //echo $name;
            $sql="SELECT email_alu FROM tbl_alumne where id_alumne = $name";
            $listalumnos=mysqli_query($connection,$sql);
            foreach($listalumnos as $alumno){
                echo "<span class='Correo'>{$alumno["email_alu"]} </span>";
                array_push($correos, $alumno["email_alu"]);
            }
        }
    }else{
        foreach ($_POST as $name){
            //echo $name;
            $sql="SELECT email_prof FROM tbl_professor where id_professor = $name";
            $listalumnos=mysqli_query($connection,$sql);
            foreach($listalumnos as $alumno){
                echo "<span class='Correo'>{$alumno["email_prof"]} </span>";
                array_push($correos, $alumno["email_prof"]);
            }
        }     
    }
    //ECHO $_POST["2"];
    ?>
    <form action="../proc/mail.php" method="post" enctype='multipart/form-data'>
    <div class="user-box">
        <input type="text" name="asunto" placeholder="Asunto">
    </div>
    <div class="user-box">
        <input type="text" name="mensaje" placeholder="Mensaje">
    </div>
    <div class="user-box">
        <input type='file' name='fichero' placeholder='Fichero'>
        </div>
    <div class="user-box">
        <button type="submit" class="btn">Enviar</button>
    </div>
        <?php
        //var_dump($correos);
        $count=0;
        foreach($correos AS $nombrecorreo){
            //echo $nombrecorreo;
            echo"<input type='hidden' name=$count value=$nombrecorreo>";
            $count++;
        }
        echo"<input type='hidden' name='numcorreo' value=$count>";
        echo"<input type='hidden' name='typeuser' value={$_GET["var"]}>";
        ?>
    </form>
</div>
</body>
</html>