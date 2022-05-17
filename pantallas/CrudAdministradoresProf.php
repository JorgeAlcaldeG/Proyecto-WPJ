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

</head>
<body>

<!-- Div nav -->
<div class="nav">
<span id="logo"></span>
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
        <h2>Alumnos</h2>
        <?php  session_start();
        echo "{$_SESSION['session']}";
        ?>

    </div>
    <!-- div pagina -->
    <div class="pagina">
    <span class="h3">Filters</span>
        <div class="filters">
        
       
              <?php 
             
              
              if ($_SESSION['session']==3) {
                $cabecera= <<<wxt
                <div class="inputsFiltro"><button>filters</button>
                <form action="">
                  <input type="text">
                </form></div>
                <div class="botonesFiltro">
                <span> <button class="btn btn-success">Crear Nuevo Registro</button></span>
                <span class="csv"> <button class="btn btn-warning ">CSV</button></span>
                </div>  
                wxt;
                echo $cabecera;
              }elseif (isset($_SESSION['session']) && $_SESSION['session']==2) {
                $cabecera= <<<wxt
                <div class="inputsFiltro2"><button>filters</button>
                <form action="">
                  <input type="text">
                </form></div>
        
                wxt;
                echo $cabecera;
              }else{
                echo "<script>window.location.href='index.php'</script>";
              }
              ?>
      
      </div>

    <!-- TABLE -->
        <div class="tabla">
        <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th></th>
      <th>Nombre</th>
      <th>Email </th>
      <th>Departamento</th>
      <th>Tutor  </th>
      <th class="acc">Acciones</th>
    </tr>
  </thead>
  <tbody>
      <?php

      include "../proc/conexion.php";
      $sql="SELECT * FROM tbl_professor p inner join tbl_classe c on p.id_professor=c.tutor;";
      $registros = mysqli_query($connection, $sql);
      
        
        echo "<br>";
        // foreach ($registros as $registro => $dato) {
        //     print_r($dato);
        //     print_r($registro);
        //     // print_r($dato);
            

        //     $nombreArchivo= $dato['img'];
            
        //     $ruta = "../img/profesores/".$nombreArchivo;
        //     echo $ruta;
        while ($dato = mysqli_fetch_array($registros)) {
            
            // $ruta="../img/alumnos/{$dato['img']}";
      
    
   $tablaAdmin=<<<wxt
    <tr>
    <td class="checkbox">   <input type="checkbox" name="{$dato['id_professor']}" value="{$dato['id_professor']}" id="">
    </td>
      <td class="nombre">
        <div class="d-flex align-items-center">

        <!-- IMAGEN -->
        <img
        
         
              src=;
        
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
      <span class="badge badge-success rounded-pill d-inline">{$dato['dept']}</span>
      <td class="tutor">
      {$dato['codi_classe']}

      </td>
    
      <td class="acciones">

      <span>
            <svg class="svg1" xmlns="http://www.w3.org/2000/svg" onclick="window.location.href='CrudFicha.php?var={$dato['id_professor']}&typeuser=0'" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
            </svg>
     </span>
      
      <span>
            <svg class="svg2" xmlns="http://www.w3.org/2000/svg" onclick="window.location.href='Modify.php?var={$dato['id_professor']}&typeuser=1'" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
      </span>
      <span>
            <svg class="svg3" xmlns="http://www.w3.org/2000/svg"  onclick="window.location.href='Delete.php?var={$dato['id_professor']}'"fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            </svg>      
      </span>
    
    
    
    
      </td>
    </tr>
   wxt;


$tablaProf=<<<wxt
<tr>
<td class="checkbox">   <input type="checkbox" name="{$dato['id_professor']}" value="{$dato['id_professor']}" id="">
</td>
  <td class="nombre">
    <div class="d-flex align-items-center">

    <!-- IMAGEN -->
    <img
    
     
          src=;
    
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
  <span class="badge badge-success rounded-pill d-inline">{$dato['dept']}</span>
  <td class="tutor">
  {$dato['codi_classe']}

  </td>

  <td class="acciones">

  <span>
        <svg class="svg1" xmlns="http://www.w3.org/2000/svg" onclick="window.location.href='CrudFicha.php?var={$dato['id_professor']}.php'" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
        </svg>
 </span>
  





  </td>
</tr>
wxt;
}

if (isset($_SESSION['session']) && $_SESSION['session']==3) {
  echo $tablaAdmin;
}elseif (isset($_SESSION['session']) && $_SESSION['session']==2) {
  echo $tablaProf;
}else{
  echo "<script>window.location.href='index.php'</script>";
}
    ?>
  </tbody>
</table>
        </div>
    </div>

</div>


    

    
</body>
</html>