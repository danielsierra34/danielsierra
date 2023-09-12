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
  <!-- PARA HACER COMENTARIO -->
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- TITULO DE LA PESTAÑA -->
    <title>PLATAPP MI CUENTA</title>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

  <body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"> <img height="40" class="masthead-avatar mb-5" src="assets/img/ojo de dios 5.png" alt="" />PLATAPP1</a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
          type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#seccion1">RESUMEN</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#seccion2">A QUIEN LE DEBO</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#seccion3">QUIEN ME DEBE</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="salir.php">SALIR</a></li>

            <!-- CREAR UNA SUBPAGINA -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
      <div class="container d-flex align-items-center flex-column">
        <h1 class="masthead-heading text-uppercase mb-0">HOLA
          <?php echo $nombre;?> </h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0"> CONOCIMIENTO ES PODER</p>
      </div>
    </header>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="seccion1">
      <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">RESUMEN</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
          <div class="divider-custom-line"></div>                    
        </div>
        
 <div class="row">
    <div class="col-md-6 col-lg-6 mb-5 text-center">
    EN TOTAL DEBES <b id="totalDeuda"></b>        
    </div>
    <div class="col-md-6 col-lg-6 mb-5 text-center">
     EN TOTAL TE DEBEN <b id="totalPrestamo"></b>  
    </div>    
</div>
        
        <!-- BOTON RESUMEN-->
        <div class="text-center mt-4">
          <div class="btn btn-primary btn-xl mx-auto" id="verResumen">VER RESUMEN</div>
        </div>
        <!-- Portfolio Grid Items-->
      </div>
    </section>
    <section class="page-section portfolio" id="seccion2">
      <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">A QUIEN LE DEBO</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row">

        </div>
        <div class="text-center mt-4">
          <div class="btn btn-primary btn-xl mx-auto" id="agregarDeuda">AGREGAR DEUDA</div>
        </div>
      </div>
    </section>
    <section class="page-section portfolio" id="seccion3">
      <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">QUIEN ME DEBE</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row">
        </div>
      </div>
      </div>
      <!-- BOTON  QUIEN ME DEBE-->
      <div class="text-center mt-4">
        <div class="btn btn-primary btn-xl mx-auto" id="agregarDeudor">AGREGAR DEUDOR</div>
      </div>
    </section>
    <!-- POPUP BOTON RESUMEN-->
    <!-- Footer-->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <!-- Footer Location-->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">DIRECCION</h4>
            <p class="lead mb-0">BOGOTA<br />COLOMBIA</p>
          </div>
          <!-- Footer Social Icons-->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">SIGUENOS</h4>
            <a class="btn btn-outline-light btn-social mx-1" href="#"><i class="fab fa-fw fa-facebook-f"></i></a><a class="btn btn-outline-light btn-social mx-1" href="#"><i class="fab fa-fw fa-twitter"></i></a><a class="btn btn-outline-light btn-social mx-1"
              href="#"><i class="fab fa-fw fa-linkedin-in"></i></a><a class="btn btn-outline-light btn-social mx-1" href="#"><i class="fab fa-fw fa-dribbble"></i></a>
          </div>
          <!-- Footer About Text-->
          <div class="col-lg-4">
            <h4 class="text-uppercase mb-4">POWERED BY SIERRA.GAY</h4>
            <p class="lead mb-0"><a href="http://startbootstrap.com"></a></p>
          </div>
        </div>
      </div>
    </footer>
    <!-- Copyright Section-->
    <section class="copyright py-4 text-center text-white">
      <div class="container"><small>Copyright © Your Website 2020</small></div>
    </section>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <!--
  <script src="assets/mail/jqBootstrapValidation.js"></script>
  <script src="assets/mail/contact_me.js"></script>
  -->
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="js/codigo.js"></script>
  </body>

  </html>