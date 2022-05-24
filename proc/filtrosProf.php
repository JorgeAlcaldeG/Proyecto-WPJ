<?php
  include "../proc/conexion.php";
  $cons="SELECT * FROM tbl_classe ";
  $classes = mysqli_query($connection, $cons); 
 $cons2="SELECT * FROM tbl_professor";
 $profesores= mysqli_query($connection, $cons2); 
 $cons3="SELECT * FROM tbl_dept";
 $dept= mysqli_query($connection, $cons3); 
  $cont=1;







  $cabecera= <<<wxt
  <div class="inputsFiltro">
  
  
  
  
  
  wxt;
  $aperturaModal1="
  <div class='modal fade bd-example-modal-sm' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' id='modal' aria-hidden='true'> 
   <div class='modal-dialog modal-sm'>
  <div class='modal-content'>
  
  ";
  $aperturaModal2="
  <div class='modal fade bd-example-modal-sm' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' id='modal2' aria-hidden='true'> 
   <div class='modal-dialog modal-sm'>
  <div class='modal-content'>
  
  ";
  
  $modal3="
  <div class='modal fade bd-example-modal-sm' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' id='modal3' aria-hidden='true'> 
   <div class='modal-dialog modal-sm'>
  <div class='modal-content'>
   <input type='text' name='nombre' placeholder='Nombre'>
   <input type='text' name='PrimerAp' placeholder='Primer Apellido'>
   <input type='text' name='SegundoAp' placeholder='Segundo Apellido'>
   <input type='text' name='Telf' placeholder='Teléfono'>
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
  
  <span> <button class="btn btn-success"><a href="./form.php?typeuser=prof" >Crear Nuevo Registro</a></button></span>
  <span class="csv"> <button onclick="window.location.href='../proc/save_csv.php'" class="btn btn-warning ">CSV</button></span>
  </div> 
  wxt;
echo $cabecera;
echo "<form action='../pantallas/CrudAdministradoresProf.php'  method='post'>";
echo $aperturaModal1;

  

   
foreach ($classes as $key => $datos) {
  $nom=explode("-",$datos['codi_classe']);
  
if (isset($_POST["todos"])) {
  if ( $datos['codi_classe']=="No es tutor") {
      
  }else {
  
    $sql="SELECT * FROM tbl_classe c inner join tbl_professor p on p.id_professor  inner join tbl_dept d on p.dept=d.id_dept=c.tutor";
    echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe] checked>$nom[0]</option>";
  
  }}else {
  $sql="SELECT * FROM tbl_classe c inner join tbl_professor p on p.id_professor  inner join tbl_dept d on p.dept=d.id_dept =c.tutor";
  if ( $datos['codi_classe']=="No es tutor") {
      
  }else if (isset($_POST['NoTut'])) {
    $sql="SELECT * FROM tbl_classe c inner join tbl_professor p on p.id_professor=c.tutor inner join tbl_dept d on p.dept=d.id_dept where c.codi_classe like 'No es tutor'";
    if ( $datos['codi_classe']=="No es tutor") {
      
    }else {
    
      echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe] >$nom[0]</option>";
    }
  } else{
      if (isset($_POST[$nom[0]])&&($_POST[$nom[0]]==$datos['codi_classe'])) {
     
        echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe] checked>$nom[0]</input>";
    
    }else{
        echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe] >$nom[0]</input>";
    
    }
    } 
  }
}

echo "<button name='todos' >Todos</button>";
echo "<button name='NoTut' >No es tutor</button>";
echo $cierreModal; 
echo "<button type='button' id='modal' class='btn btn-primary' data-toggle='modal' data-target='#modal'>Cursos</button>";
echo $aperturaModal2;

foreach ($dept as $key => $datos) {
  if (isset($_POST[$datos['nom_dept']]) && $_POST[$datos['nom_dept']]==$datos['nom_dept']   ) {
    # code...
  }
  echo "<input type='checkbox' name=$datos[nom_dept] value= $datos[nom_dept] >$datos[nom_dept]</input>";
}
echo $cierreModal;
echo "<button type='button' id='modal2' class='btn btn-primary' data-toggle='modal' data-target='#modal2'>Departamentos</button>";
echo $modal3;
echo "<button type='button' id='modal3' class='btn btn-primary' data-toggle='modal' data-target='#modal3'>Profesores</button>";
echo $cabecera2;

  
if (isset($_POST['enviar'])) {
  // echo "dentro";
  
  $sql="SELECT * FROM tbl_classe c inner join tbl_professor p on p.id_professor=c.tutor  inner join tbl_dept d on p.dept=d.id_dept";
         

  $cursEst=0;
  $contCurs=0;
  $contDept=0;
  $deptEst=0;
  foreach ($classes as $key => $datos) {
    $nom=explode("-",$datos['codi_classe']);
    
    if (isset($_POST[$nom[0]])) {
        // $sql=$sql." where c.codi_classe=1";
        if ($contCurs == 0) {
          $contCurs++;
          $cursEst=1;
          $sql=$sql." where (c.codi_classe like '{$_POST[$nom[0]]}'  ";
        }else{
            $contCurs++;
            $cursEst=1;
            $sql=$sql." or c.codi_classe like '{$_POST[$nom[0]]}'";
        }
        
    } 
 

    
    
      
  
      
    
  }
  if (isset($cursEst) && $cursEst ==1) {
    $sql=$sql.")";
  }
  foreach ($dept as $key => $datos) {
      if (isset($_POST[ $datos['nom_dept']]) && $_POST[$datos['nom_dept']] ==$datos['nom_dept']  ) {
        if ($contDept == 0) {
          $contDept++;
          $deptEst=1;
          $sql=$sql." and (d.nom_dept like '{$datos['nom_dept']}'  ";
        }else{
            $contDept++;
            $deptEst=1;
            $sql=$sql." or d.nom_dept like '{$datos['nom_dept']}'";
        }
      }
  }
}
if (isset($deptEst) && $deptEst ==1) {
  $sql=$sql.")";
}
if (!empty ($_POST['nombre'])) {
  $sql= $sql." and lower(nom_prof) like '%{$_POST['nombre']}%' ";
}
if (!empty($_POST['PrimerAp'])) {
  $sql= $sql." and lower(cognom1_prof) like '%{$_POST['PrimerAp']}%'";

}

if (!empty ($_POST['SegundoAp'])) {
$sql= $sql." and lower(cognom2_prof) like '%{$_POST['SegundoAp']}%'";
}
if (!empty ($_POST['Telf'])) {
$sql= $sql." and lower(telf) like '%{$_POST['Telf']}%'";
}

if (!empty ($_POST['Email'])) {
$sql= $sql." and lower(email_prof) like '%{$_POST['Email']}%'";
}
  // print_r($sql);

  // print_r($sql);
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