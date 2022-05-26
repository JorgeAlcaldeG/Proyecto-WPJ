<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <!-- boostrap -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
  <!-- iconos -->
  <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
  <link rel="stylesheet" href="./css/index/login.css">
  <title>Inicio Sesion / Registrarse</title>

</head>
<body>
<!-- NOM. POST DEL FORM UTILIZADO -->
<!-- CORREO => logemail  -->
<!-- CONTRASEÑA => logpas  -->

	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Info.</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<!------------------------------INICIO-FORMULARRIO-INICIO-DE-SESIÓN------------------------------->
											<form action="./proc/proc_login.php" method="post">
												<h4 class="mb-4 pb-3">Wilson school</h4>
												<div class="form-group">
													<input type="email" name="logemail" class="form-style" placeholder="Usuario" id="logemail" autocomplete="off">
													<i class="input-icon uil uil-at"></i>
												</div>	
												<span id="msg"></span>
												<div class="form-group mt-2">
													<input type="password" name="logpass" class="form-style" placeholder="Contraseña" id="logpass" autocomplete="off">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<span id="msg2"></span>
                                                <?php
                                            	if (isset($_GET['msg'])) {
                                            	    $msg=$_GET['msg'];
                                            	    if ($msg==1) {
                                            	        echo "<br>";
                                            	        echo "<span>Usuario o Contraseña Incorrecto</span>";
                                            	        echo "<br>";
                                            	    }else{
                                            	    }
                                            	}
                                                ?>
												<input type="submit" name="insesion" value="entrar" class="btn mt-4">
											</form>
											
											<!------------------------------FIN-FORMULARRIO-INICIO-DE-SESIÓN------------------------------->
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
												<h4 class="mb-4 pb-3">Bienvenido</h4>
												<div class="form-group">
													<p>En caso de no poder acceder con tu usuario y contraseña, consulta tu acceso al administrador de sistemas que este al cargo</p>
												</div>	
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
<!-- partial -->
  <script  src="./js/valid.js"></script>

</body>
</html>
