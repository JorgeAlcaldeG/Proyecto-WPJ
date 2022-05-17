<?php
function modifyAlu($id){
    include '../proc/conexion.php';
    $sql = "SELECT * FROM tbl_alumne WHERE id_alumne={$id}";
    $sqlcurso = "SELECT id_classe, codi_classe FROM tbl_classe";
    $result = mysqli_query($connection, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo"
    <form action='../proc/update.php' method='post'enctype='multipart/form-data'>
    <input type='text' name='nombre' placeholder='Nombre' value='".$user['nom_alu']."'>
    <input type='text' name='apellido1' placeholder='Apellido' value='".$user['cognom1_alu']."'>
    <input type='text' name='apellido2' placeholder='Apellido' value='".$user['cognom2_alu']."'>
    <input type='text' name='dni' placeholder='DNI' value='".$user['dni_alu']."'>
    <input type='email' name='correo' placeholder='Email' value='".$user['email_alu']."'>
    <input type='text' name='telefono' placeholder='Telefono' value='".$user['telf_alu']."'>
    <br>
    <select name='curso'>";
            $option = mysqli_query($connection, $sqlcurso);
            foreach($option as $curso){
                echo "<option value='{$curso["id_classe"]}'>{$curso["codi_classe"]}</option>";

            }
    echo"</select>
    <input type='file' name='foto' placeholder='Foto'>
    <input type='hidden' name='id' value='".$_GET['var']."'>
    <input type='hidden' name='typeuser' value='0'>
    <input type='submit' value='Modificar'>
</form>";
}
function modifyProf($id){
    include '../proc/conexion.php';
    $sql = "SELECT * FROM tbl_professor WHERE id_professor={$id}";
    $sqlcurso = "SELECT id_dept, nom_dept FROM tbl_dept";
    $result = mysqli_query($connection, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo"
    <form action='../proc/update.php' method='post'enctype='multipart/form-data'>
    <input type='text' name='nombre' placeholder='Nombre' value='".$user['nom_prof']."'>
    <input type='text' name='apellido1' placeholder='Apellido' value='".$user['cognom1_prof']."'>
    <input type='text' name='apellido2' placeholder='Apellido' value='".$user['cognom2_prof']."'>
    <input type='email' name='correo' placeholder='Email' value='".$user['email_prof']."'>
    <input type='text' name='telefono' placeholder='Telefono' value='".$user['telf']."'>
    <br>
    <select name='curso'>";
            $option = mysqli_query($connection, $sqlcurso);
            foreach($option as $curso){
                echo "<option value='{$curso["id_dept"]}'>{$curso["nom_dept"]}</option>";

            }
    echo"</select>
    <input type='file' name='foto' placeholder='Foto'>
    <input type='hidden' name='id' value='".$_GET['var']."'>
    <input type='hidden' name='typeuser' value='1'>
    <input type='submit' value='Modificar'>
</form>";  
}