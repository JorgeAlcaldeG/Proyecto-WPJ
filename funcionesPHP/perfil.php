<?php


function perfilAlu($id){
    include '../proc/conexion.php';
    $sql="SELECT * FROM tbl_alumne where id_alumne={$id}";
    $query=mysqli_query($connection,$sql);
    $ruta="../img/alumnos/";
    echo"</br>";
    foreach($query as $datos){
        $rutacompleta=$ruta.$datos["img_alu"];
        echo'<div class="row">
            <div class="column-2-foto">';
                echo "<img id='profilePic' src='$rutacompleta' alt='' srcset=''>";  
            echo'</div>';
            echo'<div class="column-2-text">';
                echo"</br>";
                echo "<span class='nombre'>{$datos["nom_alu"]} {$datos["cognom1_alu"]}</span>";
                echo "<p id='infoTitulo'><b>Información personal</b></p>";
                echo"<hr>";
                echo'<div class="row">';
                    echo'<div class="column-2">';
                        echo "<span class='infotext'>Nombre completo: {$datos["nom_alu"]} {$datos["cognom1_alu"]} {$datos["cognom2_alu"]}</span>";
                        echo "<p class='infotext'>DNI: {$datos["dni_alu"]}</p>";
                        echo "<p class='infotext'>Email: {$datos["email_alu"]}</p>";
                    echo'</div>';
                    echo'<div class="column-2">';
                        echo "<span class='infotext'>Telefono: {$datos["telf_alu"]}</span>";
                        $sqlcurso="select codi_classe from tbl_classe where id_classe = {$datos["classe"]}";
                        $query2=mysqli_query($connection,$sqlcurso);
                        foreach($query2 as $curso){
                            if(strlen($curso["codi_classe"]) ==10){
                                $cursomat=substr($curso["codi_classe"], 0,5);
                            }else{
                                $cursomat=substr($curso["codi_classe"], 0,4);
                            }
                            $cursoyear=substr($curso["codi_classe"], -4);
                            echo "<p class='infotext'>Curso actual: {$cursomat}</p>";
                            echo "<p class='infotext'>Año cursado: {$cursoyear}";
                        }
                    echo'</div>';
                echo'</div>';
            echo'</div>';
        echo'</div>';

    }
}
function perfilProf($id){
    include '../proc/conexion.php';
    $sql="SELECT * FROM tbl_professor where id_professor={$id}";
    $query=mysqli_query($connection,$sql);
    $ruta="../img/profesores/";
    echo"</br>";
    foreach($query as $datos){
        $rutacompleta=$ruta.$datos["img_prof"];
        echo'<div class="row">
            <div class="column-2-foto">';
                echo "<img id='profilePic' src='$rutacompleta' alt='' srcset=''>";  
            echo'</div>';
            echo'<div class="column-2-text">';
                echo"</br>";
                echo "<span class='nombre'>{$datos["nom_prof"]} {$datos["cognom1_prof"]}</span>";
                echo "<p id='infoTitulo'><b>Información personal</b></p>";
                echo"<hr>";
                echo'<div class="row">';
                    echo'<div class="column-2">';
                        echo "<span class='infotext'>Nombre completo: {$datos["nom_prof"]} {$datos["cognom1_prof"]} {$datos["cognom2_prof"]}</span>";
                        echo "<p class='infotext'>Email: {$datos["email_prof"]}</p>";
                    echo'</div>';
                    echo'<div class="column-2">';
                        echo "<span class='infotext'>Telefono: {$datos["telf"]}</span>";
                        $sqlcurso="select nom_dept from tbl_dept where id_dept = {$datos["dept"]}";
                        $query2=mysqli_query($connection,$sqlcurso);
                        foreach($query2 as $curso){
                            echo "<p class='infotext'>Departamento: {$curso["nom_dept"]}</p>";

                        }
                    echo'</div>';
                echo'</div>';
            echo'</div>';
        echo'</div>';

    }
}