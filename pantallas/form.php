<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Login Form with floating placeholder and light button</title>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- iconos -->
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
    <link rel="stylesheet" href="./../css/form/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="login-box">
        <?php
        if ($_GET['typeuser'] == "prof" ) {
            $EST = 1;
            // redireccionamiento a la pagina inicio
            echo "<h2>Registro Profesor</h2>";
        }else
            echo "<h2>Registro Alumno</h2>";

        // $_GET['typeuser']=alu
        // $_GET['typeuser']=prof
        ?>
        <form action="./proc_add.php" method="post">
            <div class="user-box">
                <input type="text" name="" required="">
                <label>Nombre</label>
            </div>
            <div class="user-box">
                <input type="text" name="" required="">
                <label>Primer Apellido</label>
            </div>
            <div class="user-box">
                <input type="text" name="" required="">
                <label>Segundo Apellido</label>
            </div>
            <?php
            if ($EST == 1) {
                echo "<div class='user-box'> <input type='text' name='' required=''><label>DNI/NIE</label></div>";
            }
            ?>
            <div class="user-box">
                <input type="number" name="" required="">
                <label>Telefono</label>
            </div>
            <div class="user-box">
                <input type="email" name="" required="">
                <label>Correo / Email </label>
            </div>
            <div class="user-box">
                <p class="active">Foto</p>
                <input class="form-control form-control-sm" id="formFileSm" type="file">
            </div>
            <input type="submit" value="Registrar" class="btn">
        </form>
    </div>
    <!-- partial -->

</body>

</html>