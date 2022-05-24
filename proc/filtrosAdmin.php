<?php

// Los filtros estan tecogido en modales. Previamente se han creado varibales que recogen cada estructura de la cebcera y los modales
// Se van llamando en funcion de cuando nos interesa mostrarlas.




   include "../proc/conexion.php";

  //  consultas genericas para poder recoger los datos necesarios a la hora de hacer comparaciones
 $cons="SELECT * FROM tbl_classe ";
 $classes = mysqli_query($connection, $cons); 
$cons2="SELECT * FROM tbl_professor";
$profesores= mysqli_query($connection, $cons2); 
$cons3="SELECT * FROM tbl_alumne";
$alumnos= mysqli_query($connection, $cons3); 
 $cont=1;



//  Aperturas de modales
$cabecera= <<<wxt
<div class="inputsFiltro">





wxt;
$aperturaModal1="
<div class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' id='modal' aria-hidden='true'> 
 <div class='modal-dialog modal-sm'>
<div class='modal-content'>

";
$aperturaModal2="
<div class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' id='modal2' aria-hidden='true'> 
 <div class='modal-dialog modal-sm'>
<div class='modal-content'>

";

$modal3="
<div class='modal fade  ' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' id='modal3' aria-hidden='true'> 
 <div class='modal-dialog modal-sm'>
<div class='modal-content'>
 <input type='text' name='nombre' placeholder='Nombre'>
 <input type='text' name='PrimerAp' placeholder='Primer Apellido'>
 <input type='text' name='SegundoAp' placeholder='Segundo Apellido'>
 <input type='text' name='Telf' placeholder='Teléfono'>
 <input type='text' name='DNI' placeholder='DNI'>
 <input type='text' name='Email' placeholder='Email'>
 <input type='submit' name='enviar' value='Buscar'> 
<div class='modal-footer'>
       
        <button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>
      </div></div>
</div>
</div>";
$cierreModal="  
<input type='submit' name='enviar' value='Buscar'>
<div class='modal-footer'>
       
        <button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>
      </div></div>
</div>
</div>";

$cabecera2=<<<wxt
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


      
  


</form></div>
<div class="botonesFiltro">

<span> <button class="btn btn-success"><a href="./form.php?typeuser=alu" >Crear Nuevo Registro</a></button></span>
<span class="csv"> <button onclick="window.location.href='../proc/save_csv.php'" class="btn btn-warning ">CSV</button></span>
</div> 
wxt;

// Llamamos a la cabecera que nos abrirá el formulario

echo $cabecera;
echo "<form action='../pantallas/CrudAdministradoresAlu.php'  method='post'>";

// Llamamos al modal, con un foreach recorremos las consultas pertinentes
echo $aperturaModal1;

    echo "<button name='todos' >Todos</button>";

foreach ($classes as $key => $datos) {
  $nom=explode("-",$datos['codi_classe']);
  
  // Si esta seteado el boton de todos deberemos lanzar la consulta generica que muestra todos los registros y los checkbox deberan estar "checkeados"

if (isset($_POST["todos"])) {

  // Como no queremos mostrar un checkbox de no es tutor lo saltamos con el if (este caso se tratará con un boton más adelante)
  if ( $datos['codi_classe']=="No es tutor") {
      
  }else {
    $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.id_professor=c.tutor";
    echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe] checked>$nom[0]</option>";
  }

  // Si no esta seteado todos pueden estar ninguno setado o alguno 

}else {
    $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.id_professor=c.tutor";

    // volvemos a evitar el no es tutor
    if ( $datos['codi_classe']=="No es tutor") {
      
    }else {

      // si ya se habia selccionado un item este tiene que serguir setado sino se muestra sin checkear
      if (isset($_POST[$nom[0]])&&($_POST[$nom[0]]==$datos['codi_classe'])) {
     
        echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe] checked>$nom[0]</input>";
    
    }else{
        echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe] >$nom[0]</input>";
    
    }
    } 
    
}
     
        
}
echo $cierreModal;   
// Boton que llama al modal de cursos
echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#modal'>Cursos</button>"; 
echo $aperturaModal2;


foreach ($profesores as $key => $datos) {
//   print_r($datos);

  // Si esta seteado el boton de todos deberemos lanzar la consulta generica que muestra todos los registros y los checkbox deberan estar "checkeados"
if (isset($_POST["todos2"])) {
  echo "<input type='checkbox' name='{$datos['id_professor']}' value= '{$datos['id_professor']}' checked>{$datos['nom_prof']}</input>";
  $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.id_professor=c.tutor";
}else {

   // si ya se habia selccionado un item este tiene que serguir setado sino se muestra sin checkear
    if (isset($_POST[$datos['id_professor']])&& $_POST[$datos['id_professor']]==$datos['id_professor']) {
        echo "<input type='checkbox' name='{$datos['id_professor']}' value= '{$datos['id_professor']}' checked >{$datos['nom_prof']}</input>";
    }else{
    echo "<input type='checkbox' name='{$datos['id_professor']}' value= '{$datos['id_professor']}' >{$datos['nom_prof']}</input>";
    }       
}}
echo "<button ' name='todos2' >Todos</button>";

echo $cierreModal;   
echo "<button type='button'  class='btn btn-info' data-toggle='modal' data-target='#modal2'>Tutor</button>";
echo $modal3;
echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#modal3'>Alumnos</button>";
echo $cabecera2;





if (isset($_POST['enviar'])) {
    // echo "dentro";
    
    $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.id_professor=c.tutor";
           
  
    $cursEst=0;
    $contCurs=0;
    foreach ($classes as $key => $datos) {
        $nom=explode("-",$datos['codi_classe']);
        
        if (isset($_POST[$nom[0]])) {
            // $sql=$sql." where c.codi_classe=1";
            if ($contCurs == 0) {
              $contCurs++;
              $sql=$sql." where (c.codi_classe like '{$_POST[$nom[0]]}'  ";
            }
                $contCurs++;
                $cursEst=1;
                $sql=$sql." or c.codi_classe like '{$_POST[$nom[0]]}'";
            
            
        } 
     

        
        
          
      
          
        
      }
      // print_r($sql);
      if (isset($cursEst) && $cursEst ==1) {
        $sql=$sql.")";
      }
      
      $contador=1;
      foreach ($profesores as $key => $datos) {
        //   print_r($datos);
        if (isset($_POST[$datos['id_professor']])&& $contador==1) {
          $contador++;
          $profEst=1;
          $sql=$sql." and ( p.id_professor= ".$datos['id_professor'];
        }else if (isset($_POST[$datos['id_professor']])) {
             $sql=$sql." or p.id_professor= ".$datos['id_professor'];
             $profEst=1;
        }
      }
      if (isset($profEst) && $profEst==1) {
        $sql=$sql.")";
      }
  
        
          if (!empty ($_POST['nombre'])) {
              $sql= $sql." and lower(nom_alu) like '%{$_POST['nombre']}%' ";
          }
          if (!empty($_POST['PrimerAp'])) {
              $sql= $sql." and lower(cognom1_alu) like '%{$_POST['PrimerAp']}%'";
            
          }

          if (!empty ($_POST['SegundoAp'])) {
            $sql= $sql." and lower(cognom2_alu) like '%{$_POST['SegundoAp']}%'";
          }
          if (!empty ($_POST['Telf'])) {
            $sql= $sql." and lower(telf_alu) like '%{$_POST['Telf']}%'";
          }
          if (!empty ($_POST['DNI'])) {
            $sql= $sql." and lower(dni_alu) like '%{$_POST['DNI']}%'";
          }
          if (!empty ($_POST['Email'])) {
            $sql= $sql." and lower(email_alu) like '%{$_POST['Email']}%'";
          }
          // print_r($sql);
        
       
    
  
    
}   
// print_r($sql);
//     if (isset($_POST['search'])) {
//         $explode=explode(" ",$_POST['search']);
//         print_r($explode);
//         $sql= $sql." and a.dni_alu =".$_POST['search']." or  (a.nom_alu like ".$explode[0]." and a.cognom1_alu like ".$explode[1]." and a.cognom2_alu like ".$explode[2].")" ;
// //     }
//      
// }else{
//     $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.id_professor=c.tutor ";
// }
// print_r($sql );  
$registros = mysqli_query($connection, $sql);
      $rows=mysqli_num_rows($registros);
      if($rows == 0){
        echo"No se han encontrado registros";
      }else{
        echo "Registros encontrados: ".$rows;
      }
$cantidad = 4;
      $Pagina=1; 
      //Saber si estamos en la página 1 u en otra
      if (empty($_GET["pag"] )|| $_GET["pag"]==1 ) {
        
        $limit = 0;
        $Pagina=1;

      } else {
      //  echo "elseeeeeee";
        $limit = ($_GET["pag"]-1)*$cantidad;
        $Pagina =($_GET["pag"]);
      }
$registrosTotal = mysqli_query($connection, $sql);
    //mysqli_num_rows = cantidad de registros que me devuelve
    $numRegistros = mysqli_num_rows($registrosTotal);
    
  

//Saber la cantidad de páginas según la cantidad de registros por página
$numPaginas = ceil($numRegistros/$cantidad);
$sql=$sql." LIMIT {$limit}, {$cantidad}"; 
// print _r($sql);  