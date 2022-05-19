 <?
 include "./proc/conexion.php";

 $sql="SELECT nom_prof, cognom1_prof, cognom2_prof FROM tbl_professor ";
 $profesores = mysqli_query($connection, $sql); 

 



  // CABECERAS
//  if ($_SESSION['session']==3) {
   $cabecera= <<<wxt
   <div class="inputsFiltro"><button>filters</button>
   <form action="../proc/filtros.php"  method='post'>
     <select name="curso" id="select_curso">
     <option value=""></option>
     <option value="ASIX1-2122">ASIX1</option>
     <option value="ASIX2-2122">ASIX2</option>
     </select>
     <select name="curso" id="select_curso">
     <input type="text" name="search">
     <input type="submit">
   </form></div>
   <div class="botonesFiltro">
   <span> <button class="btn btn-success"><a href="./form.php".?typeuser=alu >Crear Nuevo Registro</a></button></span>
   <span class="csv"> <button onclick="window.location.href='./proc/save_csv.php'" class="btn btn-warning ">CSV</button></span>
   </div>  
   wxt;
   echo $cabecera;
//  }elseif (isset($_SESSION['session']) && $_SESSION['session']==2) {
   $cabecera= <<<wxt
   <div class="inputsFiltro2"><button>filters</button>
   <form action="">
     <input type="text">
   </form></div>

   wxt;
   echo $cabecera;
//  }else{
// //    echo "<script>window.location.href='../index.php'</script>";
//  }