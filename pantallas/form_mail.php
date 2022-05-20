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
    echo"<p>Correos elegidos: </p>";
    if($_GET["var"]=="alu"){
        foreach ($_POST as $name){
            //echo $name;
            $sql="SELECT email_alu FROM tbl_alumne where id_alumne = $name";
            $listalumnos=mysqli_query($connection,$sql);
            foreach($listalumnos as $alumno){
                echo "<span>{$alumno["email_alu"]} </span>";
            }
        }
    }else{
        foreach ($_POST as $name){
            //echo $name;
            $sql="SELECT email_prof FROM tbl_professor where id_professor = $name";
            $listalumnos=mysqli_query($connection,$sql);
            foreach($listalumnos as $alumno){
                echo "<span>{$alumno["email_prof"]} </span>";
                array_push($correos, $alumno["email_prof"]);
            }
        }     
    }
    //ECHO $_POST["2"];
    ?>
    <form action="../proc/mail.php" method="post">
        <input type="text" name="asunto" placeholder="asunto">
        <br>
        <input type="text" name="mensaje" placeholder="Mensaje">
        <br>
        <button type="submit">Enviar</button>
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
</body>
</html>