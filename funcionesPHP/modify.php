<?php
function modifyAlu($id){
    include '../proc/conexion.php';
    $sql = "SELECT * FROM tbl_alumne WHERE id_alumne={$id}";
    $sqlcurso = "SELECT id_classe, codi_classe FROM tbl_classe";
    $result = mysqli_query($connection, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo"
    <form action='../proc/update.php' method='post'enctype='multipart/form-data'>
    <div class='user-box'>
        <input type='text' name='nombre' value='".$user['nom_alu']."'>
        <label>Nombre</label>
    </div>
    <div class='user-box'>
        <input type='text' name='apellido1'  value='".$user['cognom1_alu']."'>
        <label>Apellido</label>
    </div>
    <div class='user-box'>
        <input type='text' name='apellido2'  value='".$user['cognom2_alu']."'>
        <label>Segundo Apellido</label>
    </div>
    <div class='user-box'>
        <input type='text' name='dni'  value='".$user['dni_alu']."'>
        <label>DNI/NIE</label>
    </div>
    <div class='user-box'>
        <input type='email' name='correo' value='".$user['email_alu']."'>
        <label>email</label>
    </div>
    <div class='user-box ax'>
        <input type='text' name='telefono' value='".$user['telf_alu']."'>
        <label>Telefono</label>
    </div>
    <div class='user-box'>
    <p class='active'>Curso</p>
    <select class='form-select bg-transparent border-0 text-white border-bottom border-warning' aria-label='asd'>";
            $option = mysqli_query($connection, $sqlcurso);
            foreach($option as $curso){
                echo "<option value='{$curso["id_classe"]}'>{$curso["codi_classe"]}</option>";

            }
    echo"</select>
    </div>

    <input type='file' name='foto' placeholder='Foto'>
    <br>
    <br>
    <input type='hidden' name='id' value='".$_GET['var']."'>
    <input type='hidden' name='typeuser' value='alu'>
    <input type='submit' value='Modificar' class='btn'>
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
    <div class='user-box'>
        <input type='text' name='nombre' value='".$user['nom_prof']."'>
        <label>Nombre</label>
    </div>
    <div class='user-box'>
        <input type='text' name='apellido1'  value='".$user['cognom1_prof']."'>
        <label>Apellido</label>
    </div>
    <div class='user-box'>
        <input type='text' name='apellido2'  value='".$user['cognom2_prof']."'>
        <label>Segundo Apellido</label>
    </div>
    <div class='user-box'>
        <input type='email' name='correo' value='".$user['email_prof']."'>
        <label>email</label>
    </div>
    <div class='user-box ax'>
        <input type='text' name='telefono' value='".$user['telf']."'>
        <label>Telefono</label>
    </div>
    <div class='user-box'>
    <p class='active'>Curso</p>
    <select class='form-select bg-transparent border-0 text-white border-bottom border-warning' aria-label='asd'>";
            $option = mysqli_query($connection, $sqlcurso);
            foreach($option as $curso){
                echo "<option value='{$curso["id_dept"]}'>{$curso["nom_dept"]}</option>";
            }
    echo"</select>
    </div>

    <input type='file' name='foto' placeholder='Foto'>
    <br>
    <br>
    <input type='hidden' name='id' value='".$_GET['var']."'>
    <input type='hidden' name='typeuser' value='alu'>
    <input type='submit' value='Modificar' class='btn'>
</form>";
}