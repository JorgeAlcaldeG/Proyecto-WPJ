<?php
 $cons="SELECT * FROM tbl_classe ";
 $classes = mysqli_query($connection, $cons); 
$cons2="SELECT * FROM tbl_professor";
$profesores= mysqli_query($connection, $cons2); 
 $cont=1;
$cabecera= <<<wxt
<div class="inputsFiltro"><button>filters</button>
<form action="../pantallas/CrudAdministradoresAlu.php"  method='post'>




wxt;


$cabecera2=<<<wxt



  <input type="text" name="search">
  <input type="submit" name="enviar" value="buscar">
</form></div>
<div class="botonesFiltro">
<span> <button class="btn btn-success"><a href="./form.php?typeuser=alu" >Crear Nuevo Registro</a></button></span>
<span class="csv"> <button onclick="window.location.href='../proc/save_csv.php'" class="btn btn-warning ">CSV</button></span>
</div> 
wxt;


echo $cabecera;


    echo "<button type='submit' name='todos' >Todos</button>";

foreach ($classes as $key => $datos) {
  $nom=explode("-",$datos['codi_classe']);
  
if (isset($_POST["todos"])) {
    $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.id_professor";
    echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe] checked>$nom[0]</option>";
}else {
    $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.id_professor=c.tutor  where c.codi_classe=1";
        
    if (isset($_POST[$nom[0]])&&($_POST[$nom[0]]==$datos['codi_classe'])) {
        echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe] checked>$nom[0]</input>";
    
    }else{
        echo "<input type='checkbox' name=$nom[0] value= $datos[codi_classe] >$nom[0]</input>";
    
    }
}
     
        
}
echo "<button type='submit' name='todos2' >Todos</button>";

foreach ($profesores as $key => $datos) {
//   print_r($datos);
if (isset($_POST["todos2"])) {
  echo "<input type='checkbox' name='{$datos['id_professor']}' value= '{$datos['id_professor']}' checked>{$datos['nom_prof']}</input>";
  $sql=$sql."";
}else {
    if (isset($_POST[$datos['id_professor']])&& $_POST[$datos['id_professor']]==$datos['id_professor']) {
        echo "<input type='checkbox' name='{$datos['id_professor']}' value= '{$datos['id_professor']}' checked >{$datos['nom_prof']}</input>";
    }else{
    echo "<input type='checkbox' name='{$datos['id_professor']}' value= '{$datos['id_professor']}' >{$datos['nom_prof']}</input>";
    }       
}}
  
   
   
echo $cabecera2;
if (isset($_POST['enviar'])) {
    // echo "dentro";
    
    $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.id_professor=c.tutor where (c.codi_classe=1";
           
 
   
    foreach ($classes as $key => $datos) {
        $nom=explode("-",$datos['codi_classe']);
       
        if (isset($_POST[$nom[0]])) {
            // $sql=$sql." where c.codi_classe=1";
            
            
                $cont++;
                $sql=$sql." or c.codi_classe like '{$_POST[$nom[0]]}'";
            
            
        } 

        
        
          
      
          
        
      }
      $sql=$sql.")";
      $contador=1;
      foreach ($profesores as $key => $datos) {
        //   print_r($datos);
        if (isset($_POST[$datos['id_professor']])&& $contador==1) {
          $contador++;
          $sql=$sql." and p.id_professor= ".$datos['id_professor'];
        }else if (isset($_POST[$datos['id_professor']])) {
             $sql=$sql." or p.id_professor= ".$datos['id_professor'];
        }
    }

    if (isset($_POST['search'])) {
        $explode=explode(" ",$_POST['search']);
        print_r($explode);
        $sql= $sql." and a.dni_alu =".$_POST['search']." or  (a.nom_alu like ".$explode[0]." and a.cognom1_alu like ".$explode[1]." and a.cognom2_alu like".$explode[2].")" ;
    }
      print_r($sql);
}else{
    $sql="SELECT * FROM tbl_classe c inner join tbl_alumne a on a.classe=c.id_classe inner join tbl_professor p on p.id_professor=c.tutor ";
}

// LIMIT $limit, $cantidad 