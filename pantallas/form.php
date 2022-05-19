<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- iconos -->
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
    <link rel="stylesheet" href="./../css/form/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="login-box">        
        <?php
        
        require './../proc/conexion.php';
        require './../funcionesPHP/modify.php';
        $EST = 0;
        if ($_GET['typeuser'] == 'alu' ) {
            $EST = 1;
            $sqlcurso = "SELECT id_classe, codi_classe FROM tbl_classe";
            echo "<h2>Registro Alumno</h2>";
            // redireccionamiento a la pagina inicio
        }else
        echo "<h2>Registro Profesor</h2>";
        $sqlcurso = "SELECT id_dept, nom_dept FROM tbl_dept";

        // $_GET['typeuser']=alu
        // $_GET['typeuser']=prof
        ?>
        <form action="./../proc/proc_insert.php" method="post">
            <div class="user-box">
                <input type="text" name="nom" required="">
                <label>Nombre</label>
            </div>
            <div class="user-box">
                <input type="text" name="apellido" required="">
                <label>Primer Apellido</label>
            </div>
            <div class="user-box">
                <input type="text" name="apellido2" required="">
                <label>Segundo Apellido</label>
            </div>
            <?php
            if ($EST == 1) {
                echo "<div class='user-box'> <input type='text' name='Nie' required=''><label>DNI/NIE</label></div>";
            }else{

            }
            ?>
            <div class="user-box">
                <p class="active">Curso</p>
                <div class="user-box">
                <select class="form-select bg-transparent border-0 text-white border-bottom border-warning">
                    <?php
                    if($EST == 1){
                        $option = mysqli_query($connection, $sqlcurso);
                        foreach($option as $curso){
                        echo "<option name='curso' value='{$curso["id_classe"]}'>{$curso["codi_classe"]}</option>";
                        }
                    }else {
                        $option = mysqli_query($connection, $sqlcurso);
                        foreach($option as $curso){
                            echo "<option value='{$curso["id_dept"]}'>{$curso["nom_dept"]}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="user-box">
                <input type="number" name="telf" required="">
                <label>Telefono</label>
            </div>
            <div class="user-box">
                <input type="email" name="mail" required="">
                <label>Correo / Email </label>
            </div>
            <div class="user-box">
                <p class="active">Foto</p>
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="foto">
            </div>
    </div>
    <input type="submit" value="Registrar" class="btn">
        </form>
    
    <!-- partial -->

</body>

</html>