<?php
// Si la variable de sesion no esta creada rebota a la pagina principal
session_start();
if(!isset($_SESSION['idUsuario'])){ 
	header("Location:index.html");
	session_destroy();
}
//Traer los datos para conectrase a la base de datos
require_once("php/config.php");
//con la variable de sesion idusuario traer el nombre de la persona para saludarla, y almacenerna en una nueva variable $nombre
$idRegistro=$_SESSION['idUsuario'];
$query="select * from usuarios where ID=$idRegistro";
  $result = $mysqli->query($query);
  $objeto= mysqli_fetch_object($result);
  $nombre=$objeto->NOMBRE;
//seleccionar de la base de datos los usuarios que no son yo, y hacer un loop sobre ellos para construir las opciones del select que esta donde yo agrego aquien le preste o a quine le devo 
$queryx="select * from usuarios where ID<>$idRegistro";
  $resultx = $mysqli->query($queryx);
  $opciones="<option selected disabled>Seleccione un usuario</option>";  
while($objetox= mysqli_fetch_object($resultx)){
    $nombrex=$objetox->NOMBRE;
    $id=$objetox->ID;
    $opciones= $opciones."<option value='".$id."'>".$nombrex."</option>";
  } 
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>$PLATAPP$</title>
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
		<script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
		<link href="css/styles.css" rel="stylesheet" />
		<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
	</head>

	<body id="page-top">
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
			<div class="container">
				<a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/img/BUHO.png" /></a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
				 aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav text-uppercase ml-auto">
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#resumen">Resumen</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#prestamos">Prestamos</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#deudas">Deudas</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#notificaciones">Notificaciones</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="salir.php">SALIR</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<header class="masthead">
			<div class="container">
				<div class="masthead-subheading">HOLA
					<?php echo $nombre;?>
				</div>
				<div class="btn btn-primary btn-xl mx-auto" href="#resumen">VER RESUMEN</div>
			</div>
		</header>
		<section class="page-section" id="resumen">
			<div class="container">
				<div class="text-center">
					<h2 class="section-heading text-uppercase">RESUMEN</h2>
					<h3 class="section-subheading text-muted">Este es el resumen de tu estado financiero</h3>
				</div>
				<div class="row text-center">
					<div class="col-md-6">
						<span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="far fa-smile-beam fa-stack-1x fa-inverse"></i></span>
						<h4 class="my-3">PRESTAMOS</h4>
						<p class="text-muted ">En total tienes prestado:</p>
						<div class="acumulado" id="totalPrestamos"></div>
						<p class="text-muted rotuloPendiente">Pendiente por aprobar:
							<div class="valorPendiente" id="totalPrestamosPendientes"></div>
						</p>
					</div>

					<div class="col-md-6">
						<span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="far fa-frown-open fa-stack-1x fa-inverse"></i></span>
						<h4 class="my-3">DEUDAS</h4>
						<p class="text-muted">En total debes:</p>
						<div class="acumulado" id="totalDeudas"></div>
					</div>

				</div>
			</div>

			<section class="page-section" id="prestamos">
				<div class="container text-center">
					<div class="text-center">
						<h2 class="section-heading text-uppercase" data-toggle="popover">Prestamos</h2>
						<h3 class="section-subheading text-muted">Este es el resumen de tus prestamos</h3>
					</div>
					<div class="row text-left" id="listadoPrestamos">
					</div>
					<div class="alert alert-success" role="alert" id="success-prestamos">
					</div>
					<div class="alert alert-danger" role="alert" id="danger-prestamos">
					</div>
					<div class="btn btn-primary btn-xl mx-auto center-block" data-toggle="modal" data-target="#modalCrearPrestamo">AGREGAR PRESTAMO<i class="far fa-smile-beam fa-2x despegado"></i></div>
					<hr>
				</div>
			</section>

		</section>
		<section class="page-section" id="deudas">
			<div class="container text-center">
				<div class="text-center">
					<h2 class="section-heading text-uppercase">Deudas</h2>
					<h3 class="section-subheading text-muted">Este es el resumen de tus deudas</h3>
				</div>
				<div class="row text-left" id="listadoDeudas">
				</div>
				<div class="alert alert-success" role="alert" id="success-deudas">
				</div>
				<div class="alert alert-danger" role="alert" id="danger-deudas">
				</div>
				<div class="btn btn-primary btn-xl mx-auto center-block" data-toggle="modal" data-target="#modalCrearDeuda">AGREGAR DEUDA<i class="far fa-frown-open fa-2x despegado"></i></div>
				<hr>
			</div>
		</section>

		<section class="page-section" id="notificaciones">
			<div class="container text-center">
				<div class="text-center">
					<h2 class="section-heading text-uppercase">Notificaciones</h2>
					<h3 class="section-subheading text-muted">Confirma si has recibido estos prestamos</h3>
				</div>
				<div class="row text-left" id="listadoNotificaciones">
				</div>
				<div class="text-center">
					<h3 class="section-subheading text-muted">Los siguientes prestamos han sido rechazados</h3>
				</div>
				<div class="row text-left" id="listadoRechazos">
				</div>
				<div class="alert alert-success" role="alert" id="success-notificaciones">
				</div>
				<div class="alert alert-danger" role="alert" id="danger-notificaciones">
				</div>
			</div>
		</section>
		<div id="popoverCambiarPrestamo" class="d-none">
			<div class="input-group">
				<input type="text" class="form-control nuevoValorPrestamo precio" placeholder="">
				<div class="input-group-append" id="button-addon1">
					<button class="btn btn-sm h-100 d-flex align-items-center btn-primary modificarValor">
                          <i class="far fa-check-circle"></i>
                      </button>
				</div>
			</div>
		</div>
		<footer class="footer py-4">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-4 text-lg-left">Copyright © Your Website 2020</div>
					<div class="col-lg-4 my-3 my-lg-0">
						<a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a><a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a><a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
					</div>
					<div class="col-lg-4 text-lg-right"><a class="mr-3" href="#!">Privacy Policy</a><a href="#!">Terms of Use</a></div>
				</div>
			</div>
		</footer>
		<div class="modal fade" id="modalCrearPrestamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">REGISTRAR PRESTAMO</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
					</div>
					<div class="modal-body">
						<form id="formCrearPrestamo">
							<div class="form-group">
								<label for="montoPrestamo">Monto</label>
								<input type="text" class="form-control precio" id="montoPrestamo" placeholder="">
							</div>
							<div class="form-group">
								<label for="fechaPrestano">Fecha</label>
								<input type="date" class="form-control" id="fechaPrestamo" placeholder="">
							</div>
							<div class="form-group">
								<label for="idUsuarioPrestamo">Usuario</label>
								<select class="form-control" id="idUsuarioPrestamo">
      <?php echo $opciones; ?>
    </select>
																<div class="text-right">
									<a class="btn btn-link" data-toggle="collapse" href="#miniFormularioPrestamo" role="button" aria-expanded="false" aria-controls="collapseExample">
    No esta en la lista?
  </a>
										</div>
														<hr>
								<div class="collapse" id="miniFormularioPrestamo">
									<div class="card card-body">
										ACA VA EL FORMULARIO PARA AGREGAR A ALGUIEN</div>
								</div>
							</div>
							<div class="alert alert-success" role="alert" id="success-registrarPrestamo">
							</div>
							<div class="alert alert-danger" role="alert" id="danger-registrarPrestamo">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
						<button type="button" class="btn btn-primary" id="crearPrestamo">CREAR</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modalCrearDeuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">REGISTRAR DEUDA</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
					</div>
					<div class="modal-body">
						<form id="formCrearDeuda">
							<div class="form-group">
								<label for="montoDeudor">Monto</label>
								<input type="text" class="form-control precio" id="montoDeudor" placeholder="">
							</div>
							<div class="form-group">
								<label for="fechaDeudor">Fecha</label>
								<input type="date" class="form-control" id="fechaDeudor" placeholder="">
							</div>
							<div class="form-group">
								<label for="idUsuarioDeudor">Usuario</label>
								<select class="form-control" id="idUsuarioDeudor">
      <?php echo $opciones; ?>
    </select>

								<div class="text-right">
									<a class="btn btn-link" data-toggle="collapse" href="#miniFormularioDeudor" role="button" aria-expanded="false" aria-controls="collapseExample">
    No esta en la lista?
  </a>

								</div>
								<hr>
								<div class="collapse" id="miniFormularioDeudor"> 
									<div class="card card-body">
										ACA VA EL FORMULARIO PARA AGREGAR A ALGUIEN</div>
								</div>
							</div>
							<div class="alert alert-success" role="alert" id="success-registrarDeuda">
							</div>
							<div class="alert alert-danger" role="alert" id="danger-registrarDeuda">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
						<button type="button" class="btn btn-primary" id="crearDeuda">CREAR DEUDA</button>
					</div>
				</div>
			</div>
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-confirmation2/dist/bootstrap-confirmation.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		<script src="js/price.js"></script>
		<script src="js/scripts.js"></script>
		<script src="js/codigo.js"></script>
	</body>

	</html>