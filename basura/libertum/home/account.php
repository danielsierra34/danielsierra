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

$query="select distinct(idUsuarioDeudor) from deudores where idUsuario=$idRegistro";
$result = $mysqli->query($query);
$opciones="<option selected disabled>Seleccione un usuario</option>";  
while($objeto= mysqli_fetch_object($result)){
    $id = $objeto->idUsuarioDeudor;
    $queryx="select * from usuarios where ID=$id";
    $resultx = $mysqli->query($queryx);
    $objetox= mysqli_fetch_object($resultx);
    $opciones = $opciones."<option value='".$objetox->ID."'>".$objetox->NOMBRE." ".$objetox->APELLIDO."</option>";
  } 

$mysqli->close();

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-170880819-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-170880819-1');
</script>
		
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon-96x96.png" type="image/gif" sizes="96x96">
    <title>Libertum.co | conoce lo que debes y lo que tienes</title>
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://nashio.github.io/star-rating-svg/src/css/star-rating-svg.css">

    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://nashio.github.io/star-rating-svg/src/jquery.star-rating-svg.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
    <!--<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <meta name="google-signin-client_id" content="350189856814-hmepbe15473unvdhm85injf9m7hvel12.apps.googleusercontent.com">-->
  </head>

  <body id="page-top">
    <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
  </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a class="js-scroll-trigger" href="#resumen">Resumen</a>
        </li>
         <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#notificaciones">Notificaciones</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#prestamos">Prestamos</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#deudas">Deudas</a>
        </li>       
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#" onclick="signOut()">Salir</a>
        </li>


      </ul>
    </nav>
    <!--<header class="masthead d-flex">
      <div class="container text-center my-auto">
        <img height="200" src="img/libertumlogo.png" alt="">
        <h1 class="mb-1">Libertum</h1>
        <h3 class="mb-5">
          <em>HOLA
					<?php //echo $nombre;?></em>
        </h3>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#resumen">Iniciar</a>
      </div>
      <div class="overlay"></div>
    </header>-->
    <section class="content-section bg-light text-center" id="resumen">
      <div class="container">
        <div class="content-section-heading">
          <h2 class="section-heading text-uppercase">RESUMEN</h2>
          <h3 class="section-subheading text-muted">Hola
            <?php echo $nombre;?> este es el resumen de tu estado financiero</h3>

        </div>
        <div class="row">
          <div class="col-md-12">

          </div>

          <div class="col-md-4">
            <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-emotsmile"></i>
          </span>
            <h4>
              <strong><a class="js-scroll-trigger" href="#prestamos">Prestamos</a></strong>
            </h4>
            <p class="mb-0">En total tienes prestado:</p>
            <div class="acumulado" id="totalPrestamos">$ 0</div>
            <p class="text-muted rotuloPendiente">Pendiente por confirmar:
              <div class="text-muted " id="totalPrestamosPendientes">$ 0</div>
            </p>
          </div>

          <div class="col-md-4">
            <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-ghost"></i>
          </span>
            <h4>
              <strong><a class="js-scroll-trigger" href="#deudas">Deudas</a></strong>
            </h4>
            <p class="mb-0">En total debes:</p>
            <div class="acumulado" id="totalDeudas">$ 0</div>
          </div>

          <div class="col-md-4">
            <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-star"></i>
          </span>
            <h4>
              <strong><a class="js-scroll-trigger" href="#deudas">Mi Calificación</a></strong>
            </h4>
            <p class="mb-0">Es:</p>
            <div class="acumulado" id="totalCalificacion">0.0</div>
          </div>

          <!-- <div class="col-md-4">
            <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-wallet"></i>
          </span>
            <h4>
              <strong><a class="js-scroll-trigger" href="#dinero">Dinero</a></strong>
            </h4>
            <p class="mb-0">En total tienes:</p>
            <div class="acumulado" id="totalDinero"></div>
          </div> -->

        </div>
      </div>
    </section>
    <hr>
     <section class="content-section bg-light text-center" id="notificaciones">
      <div class="container">
        <div class="content-section-heading">
          <h2 class="section-heading text-uppercase">NOTIFICACIONES</h2>
          <h3 class="section-subheading text-muted">Confirma si has contraido estas deudas:</h3>
        </div>
        <div class="row">
          <div class="col-md-12">
            
          </div>
          <div class="col-md-12">
            <div class="row text-left" id="listadoNotificaciones"></div>
          </div>
        </div>
        <div class="content-section-heading">
          <h3 class="section-subheading text-muted">Los siguientes prestamos han sido rechazados:</h3>
        </div>
        <div class="row">
          <div class="col-md-12">
            
          </div>
          <div class="col-md-12">
            <div class="row text-left" id="listadoRechazos">
            </div>
            <div class="alert alert-success" role="alert" id="success-notificaciones">
            </div>
            <div class="alert alert-danger" role="alert" id="danger-notificaciones">
            </div>
          </div>
        </div>
      </div>
    </section>
    <hr>
    <section class="content-section bg-light text-center" id="prestamos">
      <div class="container">
        <div class="content-section-heading">
          <h2 class="section-heading text-uppercase">PRESTAMOS</h2>
          <h3 class="section-subheading text-muted">Este es el resumen de tus prestamos:</h3>
        </div>
        <div class="row">
          <div class="col-md-12">

          </div>
          <div class="col-md-12">
            <div class="row text-left" id="listadoPrestamos">
            </div>
            <div class="alert alert-success" role="alert" id="success-prestamos">
            </div>
            <div class="alert alert-danger" role="alert" id="danger-prestamos">
            </div>
            <div class="btn btn-primary btn-xl mx-auto center-block" id="abrirModalCrearPrestamo"><i class="icon-emotsmile"></i> AGREGAR PRESTAMO</div>
           
          </div>
        </div>
      </div>
    </section>
		 <hr>
    <section class="content-section bg-light text-center" id="deudas">
      <div class="container">
        <div class="content-section-heading">
          <h2 class="section-heading text-uppercase">DEUDAS</h2>
          <h3 class="section-subheading text-muted">Este es el resumen de tus deudas:</h3>
        </div>
        <div class="row">
          <div class="col-md-12">

          </div>
          <div class="col-md-12">
            <div class="row text-left" id="listadoDeudas">
            </div>
            <div class="alert alert-success" role="alert" id="success-deudas">
            </div>
            <div class="alert alert-danger" role="alert" id="danger-deudas">
            </div>
            <!-- <div class="btn btn-primary btn-xl mx-auto center-block" data-toggle="modal" data-target="#modalCrearDeuda"><i class="icon-ghost"></i> AGREGAR DEUDA</div> -->
           
          </div>
        </div>
      </div>
    </section>
 <hr>
    <!--<section class="content-section bg-light text-center" id="dinero">
      <div class="container">
        <div class="content-section-heading">
          <h2 class="section-heading text-uppercase">DINERO</h2>
          <h3 class="section-subheading text-muted">Este es el resumen de tu dinero:</h3>
        </div>
        <div class="row">
          <div class="col-md-12">

          </div>
          <div class="col-md-12">
            <div class="row text-left" id="listadoDinero">
            </div>
            <div class="alert alert-success" role="alert" id="success-dinero">
            </div>
            <div class="alert alert-danger" role="alert" id="danger-dinero">
            </div>
            <div class="btn btn-primary btn-xl mx-auto center-block" data-toggle="modal" data-target="#modalCrearDinero"><i class="icon-wallet"></i> AGREGAR DINERO</div>
            <hr>
          </div>
        </div>
      </div>
    </section>-->

   
		<hr> 	
    <!-- Callout -->
    <!--<section class="callout">
    <div class="container text-center">
      <h2 class="mx-auto mb-5">Welcome to
        <em>your</em> next website!</h2>
      <a class="btn btn-primary btn-xl" href="https://startbootstrap.com/template-overviews/stylish-portfolio/">Download Now!</a>
    </div>
  </section>-->

    <!-- Portfolio -->
    <!--<section class="content-section" id="portfolio">
    <div class="container">
      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">Portfolio</h3>
        <h2 class="mb-5">Recent Projects</h2>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6">
          <a class="portfolio-item" href="#">
            <span class="caption">
              <span class="caption-content">
                <h2>Stationary</h2>
                <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
              </span>
            </span>
            <img class="img-fluid" src="img/portfolio-1.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-6">
          <a class="portfolio-item" href="#">
            <span class="caption">
              <span class="caption-content">
                <h2>Ice Cream</h2>
                <p class="mb-0">A dark blue background with a colored pencil, a clip, and a tiny ice cream cone!</p>
              </span>
            </span>
            <img class="img-fluid" src="img/portfolio-2.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-6">
          <a class="portfolio-item" href="#">
            <span class="caption">
              <span class="caption-content">
                <h2>Strawberries</h2>
                <p class="mb-0">Strawberries are such a tasty snack, especially with a little sugar on top!</p>
              </span>
            </span>
            <img class="img-fluid" src="img/portfolio-3.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-6">
          <a class="portfolio-item" href="#">
            <span class="caption">
              <span class="caption-content">
                <h2>Workspace</h2>
                <p class="mb-0">A yellow workspace with some scissors, pencils, and other objects.</p>
              </span>
            </span>
            <img class="img-fluid" src="img/portfolio-4.jpg" alt="">
          </a>
        </div>
      </div>
    </div>
  </section>-->
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
    <div id="popoverCalificarPrestamo" class="d-none">
      <p>Califica este prestamo antes de finalizarla.</p>
      <div class="my-rating-4" data-rating="2.5"></div>
      <span class="live-rating"></span>
      <hr>
      <button type="button" class="btn btn-dark cerrarPopover">CERRAR</button>
      <button type="button" class="btn btn-primary pull-right" onclick="finalizarPrestamo()">Finalizar</button>
    </div>

    <footer class="footer text-center">
      <div class="container">
        <!--<ul class="list-inline mb-5">
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="icon-social-facebook"></i>
          </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="icon-social-twitter"></i>
          </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white" href="#">
            <i class="icon-social-github"></i>
          </a>
          </li>
        </ul>-->
        <p class="text-muted small mb-0">Copyright &copy; Libertum.co 2020</p>
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
              <div class="form-group esconderPrestamo">
                <label for="idUsuarioPrestamo">Usuario</label>
                <select class="form-control" id="idUsuarioPrestamo">
      <?php echo $opciones; ?>
    </select>
                <div class="text-right">
                  <a class="btn btn-link" href="#" id="noEstaListaPrestamo" role="button">
    No está en la lista?
  </a>
                </div>
              </div>
              <div class="collapse" id="miniFormularioPrestamo">
                <div class="form-group buscadorCelular">
                  <div class="input-group">
                    <input id="celularBusqueda" type="text" class="form-control " placeholder="Ingrese el número celular del destinatario">
                    <div class="input-group-append" id="">
                      <button type="button" id="buscarPorTelefono" class="btn btn-sm h-100 d-flex align-items-center btn-primary">
                          <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  <hr>
                </div>
                <div class="alert alert-success" role="alert" id="success-usuarioEncontrado">
                </div>
                <div class="alert alert-danger" role="alert" id="danger-usuarioEncontrado">
                </div>
                
                <div class="form-group esconderCrearPersona">
                  <label>Nombre</label><input class="form-control" id="nombreNuevoPrestamo" type="text" placeholder="" required="required" data-validation-required-message="COMPLETE SU NOMBRE." />
                </div>
                <div class="form-group esconderCrearPersona">
                  <label>Apellido</label><input class="form-control" id="apellidoNuevoPrestamo" type="text" placeholder="" required="required" data-validation-required-message="COMPLETE SU APELLIDO." />
                </div>
                <div class="form-group esconderCrearPersona">
                  <label>Celular</label><input class="form-control" id="celularNuevoPrestamo" type="tel" placeholder="" required="required" data-validation-required-message="COMPLETE SU NUMERO CELULAR." />
                </div>
                <div class="form-group esconderCrearPersona">
                  <label>Email</label><input class="form-control" id="emailNuevoPrestamo" type="email" placeholder="" required="required" data-validation-required-message="COMPLETE SU EMAIL." />
                </div>
                <div class="form-group hide">
                  <label>ID</label><input class="form-control" id="idNuevoPrestamo" type="email" placeholder="" required="required" data-validation-required-message="COMPLETE SU EMAIL." />
                </div>
              </div>

              <div class="form-group aparecerCrearPersona">
                <label for="montoPrestamo">Monto</label>
                <input type="text" class="form-control precio" id="montoPrestamo" placeholder="">
              </div>
              <div class="form-group aparecerCrearPersona">
                <label for="fechaPrestano">Fecha</label>
                <input type="date" class="form-control" id="fechaPrestamo" placeholder="">
              </div>
              <div class="alert alert-success" role="alert" id="success-registrarPrestamo">
              </div>
              <div class="alert alert-danger" role="alert" id="danger-registrarPrestamo">
              </div>
            </form>
          </div>
          <div class="modal-footer aparecerCrearPersona">
            <button type="button" class="btn btn-dark" data-dismiss="modal">CERRAR</button>
            <button type="button" class="btn btn-primary" id="crearPrestamo">CREAR</button>
            <button type="button" class="btn btn-primary" id="crearPrestamo2">CREAR</button>
            <button type="button" class="btn btn-primary" id="crearPrestamo3">CREAR</button>
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
              <div class="form-group">
                <label for="montoDeudor">Monto</label>
                <input type="text" class="form-control precio" id="montoDeudor" placeholder="">
              </div>
              <div class="form-group">
                <label for="fechaDeudor">Fecha</label>
                <input type="date" class="form-control" id="fechaDeudor" placeholder="">
              </div>
              <div class="alert alert-success" role="alert" id="success-registrarDeuda">
              </div>
              <div class="alert alert-danger" role="alert" id="danger-registrarDeuda">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">CERRAR</button>
            <button type="button" class="btn btn-primary" id="crearDeuda">CREAR DEUDA</button>
          </div>
        </div>
      </div>
    </div>

    <!--<div class="modal fade" id="modalCrearDinero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">REGISTRAR DINERO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          </div>
          <div class="modal-body">
            <form id="formCrearDeuda">
              <div class="form-group">
                <label for="idUsuarioDeudor">Cuenta</label>
                <select class="form-control" id="idUsuarioDeudor">
      <?php //echo $opciones; ?>
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
              <div class="form-group">
                <label for="montoDeudor">Monto</label>
                <input type="text" class="form-control precio" id="montoDeudor" placeholder="">
              </div>
  <div class="form-group">
               <label for="fechaDeudor">Fecha</label> 
                <input type="date" class="form-control" id="fechaDeudor" placeholder="">
              </div>
              <div class="alert alert-success" role="alert" id="success-registrarDeuda">
              </div>
              <div class="alert alert-danger" role="alert" id="danger-registrarDeuda">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">CERRAR</button>
            <button type="button" class="btn btn-primary" id="crearDeuda">CREAR DINERO</button>
          </div>
        </div>
      </div>
    </div>-->

    <div class="modal fade" id="modalCalificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Califica esta transacción</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">CERRAR</button>
            <button type="button" class="btn btn-primary" id="calificarTransacción">CALIFICAR</button>
          </div>
        </div>
      </div>
    </div>


    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

    <script src="js/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-confirmation2/dist/bootstrap-confirmation.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/price.js"></script>
    <script src="js/stylish-portfolio.min.js"></script>
    <script src="js/codigo.js"></script>
  </body>

  </html>