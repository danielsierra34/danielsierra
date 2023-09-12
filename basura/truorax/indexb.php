<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Truora - Trusted Login</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <link href="css/agency.css" rel="stylesheet">
  <link href="css/fix.css" rel="stylesheet">
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <link href="css/bootstrap-social.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="js/webcam.js"></script>
  <link rel="icon" type="image/png" sizes="32x32" href="https://assets.website-files.com/5b559a554de48fbcb01fd277/5b97f0ac932c3291fa40d053_icon32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png" />
  <style>
    #dangerLogin {
      display: none
    }

    #warningLogin {
      display: none
    }

    #my_document,
    #my_person,
    #landmarksContainer {
      -webkit-transform: scaleX(-1);
      transform: scaleX(-1);
    }

    #my_document,
    #watermark,
    #cont
    #landmarks {
      width: 500px;
      height: 376px;
      text-align:left
    }
    #cont{
      text-align:left;
    }
    #docTransparent{
      width:100%;
      position:absolute;
    }
    #blah{
      width:100%;
      position:absolute;
    }
    #bleh{
      width:100%;
      position:absolute;
      z-index:1
    }

    #landmarksContainer {
      width: 500px;
      height: 376px;
      position: absolute;
      z-index: 1
    }

    #landmarks {
      width: 100%;
      height: 100%;
      position: relative;
    }

    .landmark {
      width: 4px;
      height: 4px;
      position: absolute;
      background-color: white
    }

    #watermark {
      position: absolute;
      z-index: 1
    }

    #capturarImagen,
    #cargarImagen {
      cursor: pointer
    }

    #my_document,
    #blah,
    #bleh,
    #watermark,
    #capturarDocumento,
    #recapturarDocumento {
      display: none
    }

    #recapturarPersona {
      display: none
    }
  </style>
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/truora.png" alt="" height="30" id="logo" style="filter: brightness(0) invert(1);"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <!--<li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">Team</a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#login">Regístrate</a>
          </li>
          <li class="nav-item hide">
            <a class="nav-link js-scroll-trigger" href="#documento" id="toDocumento">Documento</a>
          </li>
          <li class="nav-item hide">
            <a class="nav-link js-scroll-trigger" href="#datos" id="toDatos">Datos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-heading text-uppercase"><img src="img/logot.png" alt="" height=""></div>
        <div class="intro-lead-in">FAST & RELIABLE <br> BACKGROUND <br> CHECKS
</div>
        
      </div>
    </div>
  </header>

  <!-- Services -->
  <!-- <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Services</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">E-Commerce</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Responsive Design</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Web Security</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
      </div>
    </div>
  </section>-->

  <!-- Portfolio Grid -->
  <!--<section class="bg-light page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Portfolio</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/01-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Threads</h4>
            <p class="text-muted">Illustration</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/02-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Explore</h4>
            <p class="text-muted">Graphic Design</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/03-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Finish</h4>
            <p class="text-muted">Identity</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/04-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Lines</h4>
            <p class="text-muted">Branding</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/05-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Southwest</h4>
            <p class="text-muted">Website Design</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/06-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Window</h4>
            <p class="text-muted">Photography</p>
          </div>
        </div>
      </div>
    </div>
  </section>-->

  <!-- About -->
  <!--<section class="page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">About</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>2009-2011</h4>
                  <h4 class="subheading">Our Humble Beginnings</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>March 2011</h4>
                  <h4 class="subheading">An Agency is Born</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>December 2012</h4>
                  <h4 class="subheading">Transition to Full Service</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>July 2014</h4>
                  <h4 class="subheading">Phase Two Expansion</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Be Part
                  <br>Of Our
                  <br>Story!</h4>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>-->

  <!-- Team -->
  <!--<section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">
            <h4>Kay Garland</h4>
            <p class="text-muted">Lead Designer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="">
            <h4>Larry Parker</h4>
            <p class="text-muted">Lead Marketer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/3.jpg" alt="">
            <h4>Diana Pertersen</h4>
            <p class="text-muted">Lead Developer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
        </div>
      </div>
    </div>
  </section>-->

  <!-- Clients -->
  <!--<section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/themeforest.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">
          </a>
        </div>
      </div>
    </div>
  </section>-->

  <!-- Contact -->
  <section class="page-section" id="login">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Login</h2>
          <h3 class="section-subheading text-muted">Para ingresar a tu cuenta, utiliza ya sea tu huella digital o una imagen tuya.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <p class="text-muted"></p>

        </div>
        <div class="col-lg-12 text-center">
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#documento">Iniciar</a>
          <!--<div class="row">
            <div class="col-sm-8 col-md-4 form-group center-block">
              <a class="btn btn-block btn-social btn-facebook toDocumento">
                    <span class="fa fa-facebook"></span>Facebook
                  </a>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8 col-md-4 form-group center-block">
              <a class="btn btn-block btn-social btn-twitter toDocumento">
                    <span class="fa fa-twitter"></span>Twitter
                  </a>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8 col-md-4 form-group center-block">
              <a class="btn btn-block btn-social btn-google toDocumento">
                    <span class="fa fa-google"></span>Gmail
                  </a>
            </div>
          </div>-->
          <!--<div class="row">
            <div class="col-md-6 form-group center-block">
              <input class="form-control" id="email" type="text" placeholder="email">
              <p class="help-block text-danger"></p>
            </div>
          </div>-->

          <div class="row">
            <div class="warning" class="col-md-8 alert alert-warning center-block hide" role="alert">

            </div>
            <div class="danger" class="col-md-8 alert alert-danger center-block hide" role="alert">

            </div>
          </div>
          <!--<div class="row">
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
              <div id="success"></div>
              <button id="validarUsuario" class="btn btn-primary btn-xl text-uppercase" type="submit">Continuar</button>
              <button id="loginUsuario" class="btn btn-primary btn-xl text-uppercase" type="submit">Log in</button>
            </div>
          </div>-->
        </div>
      </div>
    </div>
  </section>
  <section class="page-section" id="documento">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Ingreso</h2>
          <h3 class="section-subheading text-muted">Elige una opción</h3>
        </div>
      </div>
      <div class="row">
        <div class=" col-6 col-sm-6 col-md-6 form-group text-center">
          <span class="fa-stack fa-4x" id="capturarImagen">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-user-tie fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Reconocimiento de Rostro</h4>
          <p class="text-muted">utilizando webcam</p>
        </div>
        <div class="col-6  col-sm-6 col-md-6 form-group text-center">
          <span class="fa-stack fa-4x" id="cargarImagen">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-fingerprint fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Huella Digital</h4>
          <p class="text-muted">utilizando el scanner de tu dispositivo</p>
          <form runat="server" class="hide">
            <input type='file' id="imgInp" />
          </form>
        </div>
      </div>
      <div class="row">
        <div class="warning" class="col-md-8 alert alert-warning center-block hide" role="alert">

        </div>
        <div class="danger" class="col-md-8 alert alert-danger center-block hide" role="alert">

        </div>
      </div>
    </div>
  </section>
  <!--<section class="page-section" id="datos">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Datos Personales</h2>
          <h3 class="section-subheading text-muted">Completa la información</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-sm-4 col-md-6 form-group center-block text-center">
              <div id="watermark">
                <img src="img/watermark.png" alt="">
              </div>
              <div id="my_document">

              </div>
              <div id="cont">
              <img id="docTransparent" src="img/doctransparent.png">
              <img id="blah" src="#"/>
              <img id="bleh" src="img/download.png" alt="" />
              </div>

              <hr>
              <button class="btn btn-primary text-uppercase" id="capturarDocumento">Capturar</button>
              <button class="btn btn-secondary text-uppercase" id="recapturarDocumento">De nuevo</button>

            </div>
            <div class="col-sm-8 col-md-6 form-group center-block">
              <div class="container-fluid">
                <div class="row-fluid">
                  <div class="form-group col-md-6">
                    <label for="tipoDocumento">Tipo Documento</label>
                    <input type="text" class="form-control" id="tipoDocumento" placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" id="numero" placeholder="">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="nombreCompleto">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombreCompleto" placeholder="">
                  </div>
                 <div class="form-group col-md-6">
                    <label for="fechaNacimiento">F. de Nacimiento</label>
                    <input type="text" class="form-control" id="fechaNacimiento" placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="fechaExpedicion">F. de Expedición</label>
                    <input type="text" class="form-control" id="fechaExpedicion" placeholder="">
                  </div>
                   <div class="form-group col-md-12">
                    <label for="restricciones">Restricciones</label>
                    <input type="text" class="form-control" id="restricciones" placeholder="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="warning" class="col-md-8 alert alert-warning center-block hide" role="alert">

            </div>
            <div class="danger" class="col-md-8 alert alert-danger center-block hide" role="alert">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>-->
  <section class="page-section" id="datos">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Foto</h2>
          <h3 class="section-subheading text-muted">utilizando tu webcam</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-sm-4 col-md-6 form-group center-block text-center">
              <div id="landmarksContainer">
                <div id="landmarks">

                </div>
              </div>
              <div id="my_person">

              </div>
              <hr>
              <button class="btn btn-primary text-uppercase" id="capturarPersona">Capturar</button>
              <button class="btn btn-secondary text-uppercase" id="recapturarPersona">De nuevo</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="page-section" id="huella">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Huella Digital</h2>
          <h3 class="section-subheading text-muted">utilizando el scanner de tu dispositivo</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-sm-4 col-md-6 form-group center-block text-center">
              <img src="img/fingerprint.gif" alt="">
              <hr>
              <button class="btn btn-primary text-uppercase" id="capturarPersona">Capturar</button>
              <button class="btn btn-secondary text-uppercase" id="recapturarPersona">De nuevo</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include "includes/footer.php";?>

  <!--<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Threads</li>
                  <li>Category: Illustration</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->

  <!--<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/02-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Explore</li>
                  <li>Category: Graphic Design</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/agency.min.js"></script>
  <!--<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/03-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Finish</li>
                  <li>Category: Identity</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->

  <!--<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/04-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Lines</li>
                  <li>Category: Branding</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->

  <!--<div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/05-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Southwest</li>
                  <li>Category: Website Design</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->

  <!--<div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/06-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Window</li>
                  <li>Category: Photography</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->
  <script language="JavaScript">
    Webcam.set({
      width: 500,
      height: 376,
      image_format: 'jpeg',
      jpeg_quality: 100,
      flip_horiz: false
    });

    Webcam.attach('#my_document');
    Webcam.attach('#my_person');
  </script>
  <script>
    function take_snapshot() {
      var foto = "";
      Webcam.snap(function(data_uri) {
        foto = data_uri;
      });
      return foto;
    }

    function mostrarMensaje(felicidad) {
      setTimeout(function() {
        $("#procesando").hide();
        var ran = Math.random();
        var mensaje = "";
        if (felicidad == 1) {
          mensaje = "<i class='fas fa-smile-beam' style='color:green'></i>¡Muchas Gracias por tu sonrisa! Que disfrutes del evento.";
          $("#finalizarRegistro").fadeIn("slow");
          $("#reintentarFoto").hide();
        } else {
          mensaje = "<i class='fas fa-frown' style='color:red'></i>Lo sentimos. Para poder ingresar al evento debes tener una gran sonrisa.<br> Vuelve a intentarlo.";
          $("#finalizarRegistro").hide();
          $("#capturarDocumento").css('visibility', 'visible');
          $("#reintentarFoto").trigger("click");
        }
        $("#mensaje").html(mensaje);
        $("#mensaje").fadeIn("slow")
      }, 2000);
    }

    function calcularLandmarks(base64) {
      var json = '{' +
        ' "requests": [' +
        '	{ ' +
        '	  "image": {' +
        '	    "content":"' + base64.replace("data:image/jpeg;base64,", "") + '"' +
        '	  },' +
        '	  "features": [' +
        '	      {' +
        '	      	"type": "FACE_DETECTION",' +
        '			"maxResults": 200' +
        '	      }' +
        '	  ]' +
        '	}' +
        ']' +
        '}';

      $.ajax({
        type: 'POST',
        url: "https://vision.googleapis.com/v1/images:annotate?key=AIzaSyDNTV6wfG7ABPMYYmnO2BRWOQxILxIA7Bs",
        dataType: 'json',
        data: json,
        headers: {
          "Content-Type": "application/json",
        },
        success: function(data, textStatus, jqXHR) {
          landmarks = data.responses[0].faceAnnotations[0].landmarks;
          console.log(landmarks);
          $("#landmarks").html("");
          $.each(landmarks, function(index, value) {
            $("#landmarks").append("<div class='landmark' data-toggle='tooltip' data-placement='top' title='" + value.type.replace(/\_/g, ' ') + "' style='top:" + value.position.y + "px;left:" + value.position.x + "px'></div>");
            $("#recapturarPersona").show();
            $("#capturarPersona").hide();
          });
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log('ERRORS: ' + textStatus + ' ' + errorThrown);
        }
      });
    }

    function calcularTexto(base64) {
      var json = '{' +
        ' "requests": [' +
        '	{ ' +
        '	  "image": {' +
        '	    "content":"' + base64.replace("data:image/png;base64,", "") + '"' +
        '	  },' +
        '	  "features": [' +
        '	      {' +
        '	      	"type": "DOCUMENT_TEXT_DETECTION",' +
        '			"maxResults": 200' +
        '	      }' +
        '	  ]' +
        '	}' +
        ']' +
        '}';
      $.ajax({
        type: 'POST',
        url: "https://vision.googleapis.com/v1/images:annotate?key=AIzaSyDNTV6wfG7ABPMYYmnO2BRWOQxILxIA7Bs",
        dataType: 'json',
        data: json,
        headers: {
          "Content-Type": "application/json",
        },
        success: function(data, textStatus, jqXHR) {
          var texto=data.responses[0].fullTextAnnotation.text;
          var arreglo=texto.split(/\r?\n/);
           $("#capturarDocumento").hide();
          $("#recapturarDocumento").show();
          console.log(arreglo);
          
          setTimeout(function(){            
            $("#tipoDocumento").val(arreglo[2]);
            $("#numero").val(arreglo[3].replace("No. ", ""));
            $("#nombreCompleto").val(arreglo[6]);
            $("#fechaNacimiento").val(arreglo[8]);
            $("#fechaExpedicion").val(arreglo[11]);
            $("#restricciones").val(arreglo[13]);          
          }, 2000);
          
          
         

         

        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log('ERRORS: ' + textStatus + ' ' + errorThrown);
        }
      });
    }

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
          calcularTexto(e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $(document).ready(function() {
      $("body").tooltip({
        selector: '[data-toggle="tooltip"]'
      });
      $("#capturarDocumento").click(function() {
        var foto = take_snapshot();
        var texto = calcularTexto(foto);
        console.log(texto);
      });
      $("#recapturarDocumento").click(function(){
        $("#recapturarDocumento").hide();
        $("#capturarDocumento").show();
      })
      $("#capturarPersona").click(function() {
        var foto = take_snapshot();
        var texto = calcularLandmarks(foto);
      });
      $("#recapturarPersona").click(function(){
        $("#recapturarPersona").hide();
        $("#capturarPersona").show();
        $("#landmarks").html("");
      })
      $("#capturarImagen").click(function() {
        $("#my_document").show();
        $("#watermark").show();
        $("#blah").hide();
         $("#bleh").hide();
        $("#capturarDocumento").show();
        $("#toDatos").trigger("click");
      });
      $("#cargarImagen").click(function() {
        $("#imgInp").trigger("click");
      });
      $(".toDocumento").click(function() {
        $("#toDocumento").trigger("click");
      });
      $("#imgInp").change(function() {
        readURL(this);
        $("#my_document").hide();
        $("#watermark").hide();
        $("#blah").show();
        $("#bleh").show();
        $("#capturarDocumento").hide();
        $("#toDatos").trigger("click");
      });
    });
  </script>
</body>

</html>