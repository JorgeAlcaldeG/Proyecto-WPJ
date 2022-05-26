<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- BOOTSTRAP-->

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS -->

    <link rel="stylesheet" href="../css/CrudAdministradoresProf/styles.css">

    <!-- JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/alertas.js"></script>
 
    <script src="../js/pages2.js"></script>
    <script src="../js/seleccion.js"></script>
    <script src="../js/curso.js"></script>  
    
</head>
<body>


<!-- La estructura de la wes es la siguiente, hay dos pantallas CRUD, una para mostrar a los registros de alumnos y otra para mostrar los registros de profesores
.Cada pantalla contiene dos tablas que se van desarrollando con variables. Se abren las cabeceras y se suman filas a la tabla segun los registros
Los dos tipos de tablas que hay muestran el mismo contenido, pero cambian las funcionalidades segun se ha iniciado session como admin o como profe

Para hacer el código algo más libiano se han hecho includes de los filtros, de manera que los filtros son creados y procesados en otro documento
para después ser añadidos a este.
De esta forma nos queda que este documento es capaz de diferenciar el rol del usuario, los contenidos que se muestran y las funcionalidades
mientras que en el docuemento de filtrso se crean lños formularios y se gestionan las consultas correspondientes -->









<!-- Div nav -->
<div class="nav">
    <!-- <span id="logo"></span> -->
    <span class="h3" id="spanFilters">Filtros</span>
    <span id="spanAlumnos">
    <a href="./CrudAdministradoresAlu.php">Alumnos</a>
    </span>
    <span id="spanProfesores">
        <a href="./CrudAdministradoresProf.php">Profesores</a>
    </span>
</div>

<!-- Div box -->
<div class="box">

    <!-- div cabecera -->
    <div class="cabecera">
        <h2>Profesores</h2>
        <div>
        <button class="btn btn-info" onClick="window.location.href='../proc/proc_logout.php'">Cerrar Sesión</button>
        </div>

    </div>
    <!-- div pagina -->
    <div class="pagina">
    
        <div class="filters">
        
       
              <?php 
              // SESSION Y CONEXION A LA BD
             session_start();
             include "../proc/conexion.php";

              // Comprobaciones de la sessiones y eviat salto de la url
            // con los includes incluimos los filtros
              if ($_SESSION['session']==3) {
                include "../proc/filtrosProf.php";

              }elseif (isset($_SESSION['session']) && $_SESSION['session']==2) {
                include "../proc/filtrosProf.php";
        
              }else{
                echo "<script>window.location.href='../index.php'</script>";
              }
              
      
      



      $cantidad = 10;
      $Pagina=1; 
      //Saber si estamos en la página 1 u en otra
      if (empty($_GET["pag"])) {
        $limit = 0;
        $Pagina=1;

      }
      else {
        $limit = ($_GET["pag"]-1)*$cantidad;
        $Pagina =($_GET["pag"]);
      }
      include "../proc/conexion.php";
 

        // echo "<br>";


        // CABECERAS DE LA TABLA PARA ADMINISTRADORES
        $tablaAdmin="
          <div class='tabla'>
        <table class='table align-middle mb-0 bg-white'>
           
        <thead class='bg-light'>
          <tr class='cabecerasTabla'>
          <th class='seleccionar'>Select</th>
          <th class='nombre'>Nombre</th>
          <th class='email'>Email </th>
          <th class='departamento' >Depertamento</th>
          <th class='clase'>Clase</th>
          <th class='acc'>Acciones</th>
        </tr> 
          </thead>
          <tbody>
          <form action='../pantallas/form_mail.php?var=prof' method='post'>";

          // CABECERAS DE LA TABLA PARA ADMINISTRADORES
          $tablaProf="
          <div class='tabla'>
          <table class='table align-middle mb-0 bg-white'>
<thead class='bg-light'>
          <tr class='cabecerasTabla'>
          <th class='seleccionar'>Select</th>
          <th class='nombre'>Nombre</th>
          <th class='email'>Email </th>
          <th class='departamento' >Depertamento</th>
          <th class='clase'>Clase</th>
          <th class='acc'>Acciones</th>
        </tr> 
          </thead>

          
      </thead>
      <body>
      
         <form action='form_mail.php?var=prof' method='post'>";

         echo "<button onclick='seleccionarTodo()' name='todos' class='btn btn-secondary selectCrud'>Todos</button>";
         echo "<button onclick='desSeleccionarTodo()' name='todos' class='btn btn-secondary desSelectCrud'>Ninguno</button>";

      include "../proc/conexion.php";
      
       // SQL ES RECOGIDA DE LOS FILTROS Y RECORREMOS LOS DATOS DE LA CONSULTA

      $registros = mysqli_query($connection, $sql);
      $rows=mysqli_num_rows($registros);
        echo "<br>";
        foreach ($registros as $registro => $dato) {
            // print_r($dato);
            // print_r($registro);
            // print_r($dato);
            

            $nombreArchivo= $dato['img_prof'];
            
            $ruta = "../img/profesores/".$nombreArchivo;
            // echo $ruta;
            
       
      
      // FILA SI ERES DEL GRUPO ADMINISTRADORES
   $filaAdmin=<<<wxt
    <tr>
    <td class="checkbox">   <input type="checkbox" name="{$dato['id_professor']}" value="{$dato['id_professor']}"  class="check">
    </td>
      <td class="nombre">
        <div class="d-flex align-items-center">

        <!-- IMAGEN -->
        <img
        
         
              src="{$ruta}";
        
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
         

          <!-- NOMBRE Y PRIMER APELLIDO-->
            <p class="fw-bold mb-1">{$dato['nom_prof']} {$dato['cognom1_prof']}</p>

            <!-- Nombre y segundo -->
            <p class="text-muted mb-0">{$dato['nom_prof']} {$dato['cognom1_prof']} {$dato['cognom2_prof']}</p>
          </div>

        </div>
      </td>
      <td class="email">    
        <p class="fw-normal mb-1">{$dato['email_prof']}</p>
  
      </td>
      <td class="dept">
      <span ">{$dato['nom_dept']}</span>
      <td  class='tutor'>
      <span class='tutor'>{$dato['codi_classe']}</span>

      </td>
    
      <td class="acciones">

      <span>
            <svg class="svg1" xmlns="http://www.w3.org/2000/svg" onclick="window.location.href='CrudFicha.php?var={$dato['id_professor']}&typeuser=prof'" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
            </svg>
     </span>
      
      <span>
            <svg class="svg2" xmlns="http://www.w3.org/2000/svg" onclick="modificar('Modify.php?var={$dato['id_professor']}&typeuser=prof')" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
      </span>
      <span>
            <svg class="svg3" xmlns="http://www.w3.org/2000/svg"  onclick="confirm('Delete.php?var={$dato['id_professor']}&typeuser=prof')"fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            </svg>      
      </span>
    
    
    
    
      </td>
    </tr>
   wxt;

    // OPERACION QUE CONCATENA LAS CABECERAS CON LAS FILAS
   $tablaAdmin = $tablaAdmin.$filaAdmin;

//  FILA SI ERES UN PROFESOR
$filaProf=<<<wxt
<tr>
<td class="checkbox">   <input type="checkbox" name="{$dato['id_professor']}" value="{$dato['id_professor']}"  class="check">
</td>
  <td class="nombre">
    <div class="d-flex align-items-center">

    <!-- IMAGEN -->
    <img
    
     x
    src="{$ruta}";
    
          alt=""
          style="width: 45px; height: 45px"
          class="rounded-circle"
          />
      <div class="ms-3">
     

      <!-- NOMBRE Y PRIMER APELLIDO-->
        <p class="fw-bold mb-1">{$dato['nom_prof']} {$dato['cognom1_prof']}</p>

        <!-- Nombre y segundo -->
        <p class="text-muted mb-0">{$dato['nom_prof']} {$dato['cognom1_prof']} {$dato['cognom2_prof']}</p>
      </div>

    </div>
  </td>
  <td class="email">    
    <p class="fw-normal mb-1">{$dato['email_prof']}</p>

  </td>
  <td class="dept">
  <span class="badge badge-success rounded-pill d-inline">{$dato['nom_dept']}</span>
  <td class="tutor">
  {$dato['codi_classe']}

  </td>

  <td class="acciones">

  <span>
        <svg class="svg1" xmlns="http://www.w3.org/2000/svg" onclick="window.location.href='CrudFicha.php?var={$dato['id_professor']}&typeuser=prof'" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
        </svg>
 </ >
  





  </td>
</tr>
wxt;
// OPERACION QUE CONCATENA LAS CABECERAS CON LAS FILAS
$tablaProf = $tablaProf.$filaProf;
}

// Final de las tablas que son comunes para las dos
$final =<<<wxt

</table>
</div>
<button type="submit" class='btn btn-info enviarCorreos'>Enviar correos</button>
</form>
</body>
wxt;


// Operacion que concatena las cabeceras y filas  (que estan recogidas previamente en $tablaAdmin o $tablaProf) con el final de la tabla
$tablaAdmin=$tablaAdmin.$final;
$tablaProf=$tablaProf.$final;

// Segun el usuario mostramos una tabla o otra.
if (isset($_SESSION['session']) && $_SESSION['session']==3) {
  echo $tablaAdmin;
}elseif (isset($_SESSION['session']) && $_SESSION['session']==2) {
  echo $tablaProf;
  
}else{
  echo "<script>window.location.href='index.php'</script>";
}
// echo $Pagina;


// Botones para la paginacion

// echo"<section class='archive-pages'>";
// echo "<ul>";
// echo "<li class='first'><a href='CrudAdministradoresAlu.php?pag=1' title='first page'>first page</a></li>";
// echo "<li class='previous'><a href='CrudAdministradoresAlu.php?pag=$PaginaAnterior' title='previous page'>previous page</a></li>";
// for($i=1;$i<=$numPaginas;$i++) {
//   echo "<li><a href='CrudAdministradoresAlu.php?pag=$i' title='Pagina $i'>$i</a></li>";
// }
// $cierrepag="  <li class='next'><a href='CrudAdministradoresAlu.php?pag=$PaginaSiguiente' title='next page'>next page</a></li>
// <li class='last'><a href='CrudAdministradoresAlu.php?pag=$numPaginas' title='last page'>last page</a></li>
// </ul>
// </section>";
// echo $cierrepag;

// $buttonNext="<button
// onclick=next({$Pagina},{$numPaginas})>Next</button>";
// echo $buttonNext;
// $buttonBack="<button
// onclick=back({$Pagina},{$numPaginas})>Back</button>";
// echo $buttonBack;
// if(isset($_GET["msg"])){
//   echo"<p>ERROR: Elige una direccion de Email para enviar correos</p>";
// }
// if(isset($_GET["msg2"])){
//   echo"<p>ERROR: Tienes que indicar asunto y mensaje del correo</p>";
// }
?>

    
   
    </div>

</div>


    

    
</body>
</html>
