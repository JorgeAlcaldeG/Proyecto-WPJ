<?php
require 'conexion.php';
    // Sección de alumnos
    $sql="SELECT a.nom_alu, a.cognom1_alu, a.cognom2_alu, email_alu, c.codi_classe FROM tbl_alumne a INNER JOIN tbl_classe c ON a.classe = c.id_classe";
    $listaUser=mysqli_query($connection,$sql);
    
    $ouAlu="OUalumnos";
    $ouProf="OUprofesores";
    if(!file_exists("ListaUsuarios.csv")){
        file_put_contents("./csv/ListaUsuarios.csv","Nombre;Apellido1;Apellido2;Email;Grupo;OU;end \n");
    }
    foreach ($listaUser as $user){
        $clase=explode("-", $user['codi_classe']);
        file_put_contents("./csv/ListaUsuarios.csv","{$user['nom_alu']};{$user['cognom1_alu']};{$user['cognom2_alu']};{$user['email_alu']};$clase[0];$ouAlu;end \n",FILE_APPEND);
    }
    $fileAlu="./csv/ListaUsuarios.csv";
    
    // if (file_exists($fileAlu)) {
    //     header('Content-Description: File Transfer');
    //     header('Content-Type: application/octet-stream');
    //     header('Content-Disposition: attachment; filename="'.basename($fileAlu).'"');
    //     header('Expires: 0');
    //     header('Cache-Control: must-revalidate');
    //     header('Pragma: public');
    //     header('Content-Length: ' . filesize($fileAlu));
    //     readfile($fileAlu);
    // }

    // Sección de profes
    $sql2="SELECT p.nom_prof, p.cognom1_prof, p.cognom2_prof, email_prof, d.codi_dept FROM tbl_professor p INNER JOIN tbl_dept d ON p.dept = d.id_dept";
    $listaUser=mysqli_query($connection,$sql2);
    
    // if(!file_exists("ListaUsuarios.csv")){
    //     file_put_contents("./csv/ListaUsuarios.csv","Nombre;Apellido1;Apellido2;Email;Pass;dept \n");
    // }
    foreach ($listaUser as $user){
        file_put_contents("./csv/ListaUsuarios.csv","{$user['nom_prof']};{$user['cognom1_prof']};{$user['cognom2_prof']};{$user['email_prof']};{$user['codi_dept']};$ouProf;end \n",FILE_APPEND);
    }
    $fileAlu="./csv/ListaUsuarios.csv";
    
    if (file_exists($fileAlu)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($fileAlu).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fileAlu));
        readfile($fileAlu);
    }
  

