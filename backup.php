<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Daniel Sierra Rincón - Curriculum Vitae </title>
  
  <meta name="title" content="Daniel Sierra Rincón - Curriculum Vitae">
  <meta name="description" content="Digital Transformation & Innovation Expert. Over 12 years of experience in IT Consulting, Software Development & Project Management; integrating people, business processes and software through emerging technologies and Agile Practices.">
  <meta name="keywords" content="Digital transformation, Software Development, Automation, Google Cloud Platform, Internet of Things">
  <meta name="robots" content="index, follow">
  <meta name="language" content="English">
  <meta name="revisit-after" content="10 days">
  <meta name="author" content="Daniel Sierra Rincón">
  
  <meta property="og:site_name" content="Daniel Sierra Rincón - Curriculum Vitae">
<meta property="og:title" content="Daniel Sierra Rincón - Curriculum Vitae" />
<meta property="og:description" content="Digital Transformation & Innovation Expert. Over 12 years of experience in IT Consulting, Software Development & Project Management; integrating people, business processes and software through emerging technologies and Agile Practices." />
<meta property="og:image" itemprop="image" content="https://www.danielsierra.com/assets/img/me/mex1.png">
<meta property="og:type" content="website" />
<meta property="og:updated_time" content="1440432930" />
  

  <!-- Favicons -->
  <link href="assets/img/favicon-96x96.png" type="image/gif" sizes="96x96" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  <?php include 'includes/0-header.php';?>
  <?php include 'includes/1-main.php';?>
  <main id="main">
    <?php include 'includes/2-profile.php';?>
    <section id="education" class="resume">
      <?php include 'includes/4-education.php';?>
    </section>
    <?php include 'includes/3-skills.php'?>

    <section id="experience" class="resume testimonials">
      <?php include 'includes/4a-experience.php';?>
      <?php include 'includes/4b-experience.php';?>
    </section>

    <?php include 'includes/5-contact.php';?>
    <?php include 'includes/6-footer.php';?>
    <?php include 'includes/7-portfolio.php';?>
    <?php include 'includes/8-services.php';?>


  </main>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/jquery.js"></script>
  <script>
    var onloadCallbackIndex = function() {
      captchaContacto = grecaptcha.render(document.getElementById('captchaContacto'), {
        'sitekey': '6LdNsL8eAAAAAOERo3_4HKwNC1V-aw5jkp5EKJgG'
      });
    };

    var ajaxLoaders = [
      "..."
    ]

    var consoleColores = {
      'danger': '#d94141',
      'success': '#bada55'
    };

    function serialize(obj) {
      var serial = ""
      for (const [key, value] of Object.entries(obj)) {
        serial += `${key}=${value}&`
      }
      serial = serial.slice(0, -1);
      return serial
    }

    function getFormData(datax) {
      var indexed_array = {};
      $.map(datax, function(n, i) {
        indexed_array[n.name] = n.value;
      });
      return indexed_array;
    }

    function ajax(url, data, onSuccess, onDanger, boton, alerta, loader, substitute) {
      console.log(data)
      let HTMLboton = boton.html()
      if (boton) {
        boton.prop('disabled', true).html(ajaxLoaders[loader])
      }
      if (typeof data == "object" && data !== null) {
        data = serialize(data)

      }

      $.ajax({
        timeout: 60000,
        type: "POST",
        url: `https://www.danielsierra.com/${url}`,
        dataType: 'json',
        data: data,
        cache: true,
      }).fail(function(respuesta) {
        finalizarConsultaFail(boton, HTMLboton, alerta, respuesta, substitute)
      }).done(function(respuesta) {
        finalizarConsultaDone(boton, HTMLboton, alerta, respuesta, substitute)
        if (respuesta.tipo == "success") {
          if (onSuccess) {
            onSuccess(respuesta)
          }
        }
        if (respuesta.tipo == "danger") {
          if (onDanger) {
            onDanger(respuesta)
          }
        }
      });
    }

    function finalizarConsultaFail(boton, HTMLboton, alerta, respuesta, substitute) {
      console.log(`%c Error Inesperado`, 'color: #8e1b1b ');
      console.log(respuesta);
      if (boton) {
        boton.html(HTMLboton).prop('disabled', false);
      }
      if (alerta) {
        alerta.removeClass("alert-danger alert-success").addClass("alert-danger").html(`Ha ocurrido un error inesperado. Intente de nuevo más tarde`).show().delay(2200).fadeOut("slow");
      }
      if (substitute)
        substitute.hide().delay(2200).fadeIn("slow");
    }

    function finalizarConsultaDone(boton, HTMLboton, alerta, respuesta, substitute) {
      console.log(`%c ${respuesta.tipo}`, `color:${consoleColores[respuesta.tipo]}`);
      console.log(respuesta)
      if (boton) {
        boton.html(HTMLboton).prop('disabled', false);
      }
      if (alerta) {
        alerta.removeClass("alert-danger alert-success").addClass(`alert-${respuesta.tipo}`).html(respuesta.mensaje).show().delay(2200).fadeOut("slow");
      }
      if (substitute)
        substitute.hide().delay(2500).fadeIn("slow");
    }

    function crearContacto(event, e) {
      event.preventDefault();
      var boton = $(e).find(".botonInterno");
      var alerta = $(e).find(".alert");
      var data = $(e).serialize();
      var campos = getFormData($(e).serializeArray());
      var onSuccess = function() {
        grecaptcha.reset(captchaContacto);
        /*$("#contacto-asunto").val("")
        $("#contacto-mensaje").val("")*/
      }
      var onDanger = function() {
        grecaptcha.reset(captchaContacto);
      }
      ajax("php/entidades/contacto/services/crear.php", data, onSuccess, onDanger, boton, alerta, 0)
    }

    $(document).ready(function() {
      $('.collapse').collapse()
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallbackIndex&render=explicit"></script>

</body>

</html>