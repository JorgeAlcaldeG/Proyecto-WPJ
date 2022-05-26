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
<div class='tbl'>

";
$aperturaModal2="
<div class='modal fade' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' id='modal2' aria-hidden='true'> 
 <div class='modal-dialog modal-sm'>
<div class='modal-content'>
<div class='tbl'>

";

$modal3="
<div class='modal fade  ' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' id='modal3' aria-hidden='true'> 
 <div class='modal-dialog modal-sm'>
<div class='modal-content'>
<div class='modalForm'>
 <input type='text' name='nombre' placeholder='Nombre'>
 <input type='text' name='PrimerAp' placeholder='Primer Apellido'>
 <input type='text' name='SegundoAp' placeholder='Segundo Apellido'>
 <input type='text' name='Telf' placeholder='Teléfono'>
 <input type='text' name='DNI' placeholder='DNI'>
 <input type='text' name='Email' placeholder='Email'>
 </div>
<div class='modal-footer'>
        <input type='submit' name='enviar' value='Buscar'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>
      </div></div>
</div>
</div>";
$cierreModal="  

<div class='modal-footer'>
        <input type='submit' name='enviar' value='Buscar'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>
      </div></div>
</div>
</div>";

$cabecera2=<<<wxt
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


      
  


</div></div>
<div class="botonesFiltro">

<span> <button class="btn btn-success"><a href="./form.php?typeuser=alu" >Crear Nuevo Registro</a></button></span>
<span class="csv"> <button class="btn btn-warning "><a href="./../proc/save_csv.php">CSV</a></button></span>
</div> 
wxt;
$cabecera3=<<<wxt
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


      
  


</div></div>
<div class="botonesFiltro">

<span> <button class="btn btn-success" style='visibility:hidden'><a href="./form.php?typeuser=pro" >Crear Nuevo Registro</a></button></span>
<span class="csv" style='visibility:hidden'> <button class="btn btn-warning "><a href="./../proc/save_csv.php">CSV</a></button></span>
</div> 
wxt;

// Llamamos a la cabecera que nos abrirá el formulario

echo $cabecera;
echo "<form action='../pantallas/CrudAdministradoresAlu.php'  method='post'>";

// Llamamos al modal, con un foreach recorremos las consultas pertinentes
echo $aperturaModal1;

    
    

  
  


foreach ($classes as $key => $datos) {
  $nom=explode("-",$datos['codi_classe']);
  
  // Si esta seteado el boton de todos deberemos lanzar la consulta generica que muestra todos los registros y los checkbox deberan estar "checkeados"

if (isset($_POST["todos"])) {

  // Como no queremos mostrar un checkbox de no es tutor lo saltamos con el if (este caso se tratará con un boton más adelante)
  if ( $datos['codi_classe']=="No es tutor") {
      
  }else {
    $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.classe=c.id_classe";
    echo "<div class='form-check'>";
    echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe] checked>";
    echo"<label class='form-check-label' for='flexCheckDefault'>
  $nom[0]
</label>";
echo "</div>";
  }

  // Si no esta seteado todos pueden estar ninguno setado o alguno 

}else if (isset($_POST["ninguno"])) {

  // Como no queremos mostrar un checkbox de no es tutor lo saltamos con el if (este caso se tratará con un boton más adelante)
  if ( $datos['codi_classe']=="No es tutor") {
      
  }else {
    $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.classe=c.id_classe";
    echo "<div class='form-check'>";
    echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe] check>";
    echo"<label class='form-check-label' for='flexCheckDefault'>
  $nom[0]
</label>";
echo "</div>";
  }}else {
    
    $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.classe=c.id_classe";

    // volvemos a evitar el no es tutor
    if ( $datos['codi_classe']=="No es tutor") {
      
    }else {

      // si ya se habia selccionado un item este tiene que serguir setado sino se muestra sin checkear
      if (isset($_POST[$nom[0]])&&($_POST[$nom[0]]==$datos['codi_classe'])) {
        echo "<div class='form-check'>";
        echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe] checked>";
        echo"<label class='form-check-label' for='flexCheckDefault'>
        $nom[0]
      </label>";
      echo "</div>";
    }else{
      echo "<div class='form-check'>";
      echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe]  >";
      echo"<label class='form-check-label' for='flexCheckDefault'>
      $nom[0]
    </label>";
    echo "</div>";
    
    }

    
    } 
    
}
     
        
}

echo "</div>";
echo "<div class='modalButons'>";
echo "<button name='todos' class='btn btn-info btnTodos'>Todos</button>";
echo "<button name='ninguno' class='btn btn-info btnTodos'>Ninguno</button>";
echo "</div>";
echo $cierreModal;   
// Boton que llama al modal de cursos
echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#modal'>Cursos</button>"; 
echo $aperturaModal2;


foreach ($profesores as $key => $datos) {
//   print_r($datos);

  // Si esta seteado el boton de todos deberemos lanzar la consulta generica que muestra todos los registros y los checkbox deberan estar "checkeados"
if (isset($_POST["todos2"])) {
  echo "<div class='form-check'>";
  echo "<input type='checkbox' name='{$datos['id_professor']}' value= '{$datos['id_professor']}' checked>";
  echo"<label class='form-check-label' for='flexCheckDefault'>
  {$datos['nom_prof']}
</label>";
echo "</div>";
  
  $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.classe=c.id_classe";
}else if (isset($_POST["ninguno2"])) { 

  $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.classe=c.id_classe";


  echo "<div class='form-check'>";
  echo "<input type='checkbox' name='{$datos['id_professor']}' value= '{$datos['id_professor']}' >";
  echo"<label class='form-check-label' for='flexCheckDefault'>
  {$datos['nom_prof']}
</label>";
echo "</div>";
}else{

   // si ya se habia selccionado un item este tiene que serguir setado sino se muestra sin checkear
    if (isset($_POST[$datos['id_professor']])&& $_POST[$datos['id_professor']]==$datos['id_professor']) {
        
        echo "<div class='form-check'>";
        echo "<input type='checkbox' name='{$datos['id_professor']}' value= '{$datos['id_professor']}' checked >";
        echo"<label class='form-check-label' for='flexCheckDefault'>
        {$datos['nom_prof']}
      </label>";
      echo "</div>";
    }else{
      echo "<div class='form-check'>";
      echo "<input type='checkbox' name='{$datos['id_professor']}' value= '{$datos['id_professor']}' >";
      echo"<label class='form-check-label' for='flexCheckDefault'>
      {$datos['nom_prof']}
    </label>";
    echo "</div>";
    
    }       
}}
echo "</div>";
echo "<div class='modalButons'>";
echo "<button name='todos2' class='btn btn-info btnTodos'>Todos</button>";
echo "<button name='ninguno2' class='btn btn-info btnTodos'>Ninguno</button>";
echo "</div>";

echo $cierreModal;   
echo "<button type='button'  class='btn btn-info' data-toggle='modal' data-target='#modal2'>Tutor</button>";
echo $modal3;
echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#modal3'>Alumnos</button>";

if ($_SESSION['session']==3) {
  echo $cabecera2;

 }elseif ($_SESSION['session']==2) {
  echo $cabecera3;
 }else{
   
 }







if (isset($_POST['enviar'])) {
    // echo "dentro";
    
    $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.classe=c.id_classe";
           
  
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
      echo "<div class='registrosEncontrados'>";
      if($rows == 0){
        echo"No se han encontrado registros";
      }else{
        echo "Registros encontrados: ".$rows;
      }
      echo "</div>";
// $cantidad = 12;
//       $Pagina=1; 
//       //Saber si estamos en la página 1 u en otra
//       if (empty($_GET["pag"] )|| $_GET["pag"]==1 ) {
        
//         $limit = 0;
//         $Pagina=1;
        

//       } else {
//       //  echo "elseeeeeee";
//         $limit = ($_GET["pag"]-1)*$cantidad;
//         $Pagina =($_GET["pag"]);
//       }
      
// $registrosTotal = mysqli_query($connection, $sql);
//     //mysqli_num_rows = cantidad de registros que me devuelve
//     $numRegistros = mysqli_num_rows($registrosTotal);
    
  

// //Saber la cantidad de páginas según la cantidad de registros por página
// $numPaginas = ceil($numRegistros/$cantidad);
// $sql=$sql." LIMIT {$limit}, {$cantidad}"; 
// // print_r($sql);  



// if ($Pagina == 1) {
 
//   $PaginaAnterior=1;
// }else{

//   $PaginaAnterior=$Pagina-1;  
// }

// if ($Pagina == $numPaginas) {
 
//   $PaginaSiguiente=$numPaginas;
// }else{

//   $PaginaSiguiente=$Pagina+1;  
// }

// // echo $_POST['nombre'];
// echo"<section class='archive-pages'>";
// echo "<ul>";
// // echo "<li class='first'><a href='CrudAdministradoresAlu.php?pag=1' title='first page'>first page</a></li>";
// // echo "<li class='previous'><a href='CrudAdministradoresAlu.php?pag=$PaginaAnterior' title='previous page'>previous page</a></li>";
// for($i=1;$i<=$numPaginas;$i++) {
//   echo "<li>
 
  
//   <button type=submit onclick='window.location.href='CrudAdministradoresAlu.php?pag=$i' 'value='Buscar' value='Pagina $i'>

  
  
//   </li>";
// }
// // <li class='next'><a href='CrudAdministradoresAlu.php?pag=$PaginaSiguiente' title='next page'>next page</a></li>
// // <li class='last'><a href='CrudAdministradoresAlu.php?pag=$numPaginas' title='last page'>last page</a></li>
// $cierrepag=" 

// </ul>
// </section>
echo "</form>";
// ";


// echo $cierrepag;

