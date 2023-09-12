<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="img/favicon-96x96.png" type="image/gif" sizes="96x96">
  <title>Libertum.co </title>
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="css/stylish-portfolio.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
</head>
<script>
  function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;
    for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');
      if (sParameterName[0] === sParam) {
        return sParameterName[1] === undefined ? true : sParameterName[1];
      }
    }
  }

  $(document).ready(function() {
    $("#establecerPassword").click(function() {
      var pass1 = $("#pass1").val();
      var pass2 = $("#pass2").val();
      if (pass1 == pass2) {
        if (pass1.length >= 10) {
          $.ajax({
            type: "POST",
            url: "php/establecerPassword.php",
            dataType: "json",
            data: {
              idUsuario: getUrlParameter("e"),
              password: $("#pass1").val()
            },
            success: function(respuesta) {
              $("#formEstablecerPassword")[0].reset()
              console.log(respuesta)
              $("#success-recovery").html(respuesta.mensaje)
              $("#success-recovery").show()
              setTimeout(function() {
                $("#success-recovery").fadeOut(1500)
                setTimeout(function() {
                  window.location.href = 'index.html';

                }, 1000);
              }, 2000);
            }
          });
        } else {
          $("#danger-recovery").html("La contraseña debe tener como mínimo 10 caracteres.")
          $("#danger-recovery").show()
          setTimeout(function() {
            $("#danger-recovery").fadeOut(1500)
          }, 2000);
        }
      } else {
        $("#danger-recovery").html("Las contraseñas no coinciden.")
        $("#danger-recovery").show()
        setTimeout(function() {
          $("#danger-recovery").fadeOut(1500)
        }, 2000);
      }
    })

  })
</script>

<body id="page-top">

  <section class="content-section bg-primary text-white text-center" id="ingresar1">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <!--  <img _ngcontent-mvf-c1="" alt="libertumGif" class="image" fxhide.xs="" fxshow="" src="img/LIBERTUMGIF.gif" style="cursor: pointer;"> -->
          <h2>Bienvenido</h2>
          <p class="lead mb-5">Establece tu contraseña</p>
          <form id="formEstablecerPassword" class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="control-group text-left">
                <div class="form-group">
                  <label>PASSWORD</label>
                  <input class="form-control" id="pass1" type="password" placeholder="">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group text-left">
                <div class="form-group">
                  <label>REPETIR PASSWORD</label>
                  <input class="form-control" id="pass2" type="password" placeholder="">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="alert alert-success" role="alert" id="success-recovery">
              </div>
              <div class="alert alert-danger" role="alert" id="danger-recovery">
              </div>
              <a class="btn btn-dark btn-xl js-scroll-trigger" id="establecerPassword" type="button">Continuar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/stylish-portfolio.min.js"></script>
</body>

</html>