<!-- <?php
// require "conexion.php";

// if (empty($_POST['Nie'])) {
//     # code...
//     $name = $_POST['nom'];
//     $lastnam = $_POST['apellido']
//     if(isset($_POST['apellido2'])){
//         $lstnam2 = $_POST['apellido2'];
//     }else{
//         $lstnam2 = "";
//     }
//     $email = $_POST['mail'];
//     $psw = sha1(1234);
//     $curs = $_POST['curso'];
//     $telf = $_POST['telf'];
//     $ruta="/www/Proyecto-WPJ/img/profesores/";
//     $tipo = explode("/",$foto['type']); 
//     $destinolocal= $_SERVER['DOCUMENT_ROOT'].$ruta.$telf.".".$tipo[1];
//     $destinored = "http://".$_SERVER['SERVER_NAME'].$ruta.$telf.".".$tipo[1];        
//     //LIMITAMOS LA SUBIDA DE UN ARCHIVO POR TAMAÑO
//     //TAMBIEN SE PUEDE LIMITAR POR EXTENSIÓN COMO SE HA PODIDO VER DESPUES DEL &&
//     if ($foto['size']<200*1024 && $foto['type']="image/jpeg" || $foto['type']="image/png" || $foto['type']="image/gif") {
//         if (move_uploaded_file($foto['tmp_name'],$destinolocal)) {
//             //CONEXION A LA BASE DE DATOS
//             // SUBIR LOS DATOS EN LA BASE DA DATOS
//             $sql = "INSERT INTO tbl_contactos (`nom_prof`, `cognom1_prof`, `cognom2_prof`, `email_prof`, `telf`, `dept`, `passwd`, `img_prof`) VALUES ('$name', '$lastnam', '$lastnam2', '$email', '$telf', '$telf','$curs');";
//             $insert = mysqli_query($connection , $sql);
//         }
//     }else{
//         echo "El archivo que intentas subir es demsaido grande y supera los 50K";
//     }

//     $connection 
// } 
