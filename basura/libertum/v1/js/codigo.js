function formata(number) {
	var comma = ',',
		string = Math.max(0, number).toFixed(0),
		length = string.length,
		end = /^\d{4,}$/.test(string) ? length % 3 : 0;
	return "$ " + (end ? string.slice(0, end) + comma : '') + string.slice(end).replace(/(\d{3})(?=\d)/g, '$1' + comma);
}

$(document).ready(function() {
  $("#crearCuenta").click(function() {
    var password1 = $("#password1").val();
    var password2 = $("#password2").val();

    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var celular = $("#celular").val();
    var email = $("#email").val();

   if (nombre.length>0 && apellido.length>0 && celular.length>0 && email.length>0) {
     
    if (password1 == password2) {

      if (password1.length > 5) {

        $.ajax({
          type: "POST",
          url: "php/crearUsuario.php",
          dataType: "json",
          data: {
            nombre: $("#nombre").val(),
            apellido: $("#apellido").val(),
            celular: $("#celular").val(),
            email: $("#email").val(),
            password: $("#password1").val()
          },
          success: function(respuesta) {
            console.log(respuesta)
            alert(respuesta.mensaje)
          }
        });

      } else {
        alert('LA CONTRASEÑA MINIMA DE 6 CARACTERES')
      }
    } else {
      alert("Las contraseñas no coinciden")
    }
     
   }else {
     alert("COMPLETE TODOS LOS CAMPOS");
   }  
     
  })

  
  
  /*  VALIDAR EL INGRESO */

  $("#ingresarx").click(function() {
    $.ajax({
      type: "POST",
      url: "php/validarUsuario.php",
      dataType: "json",
      data: {
        email: $("#email-login").val(),
        password: $("#password-login").val()
      },
      success: function(respuesta) {
        console.log(respuesta)
        if (respuesta.mensaje == 0) {
          alert('USUARIO O CONTRESAÑESA INCORRECTAS');
        } else {
          alert('ingresando')
          location.href = 'cuenta.php';
        }
      }
    });
  })
})

/*  CREAR DEUDA */

$("#crearDeudor").click(function() {
  $.ajax({
    type: "POST",
    url: "php/crearDeudor.php",
    dataType: "json",
    data: {
    idUsuario: $("#idUsuarioDeudor").val(),
      monto: $("#montoDeudor").val(),
      fecha: $("#fechaDeudor").val()
    },
    success: function(respuesta) {
      console.log(respuesta)
      alert(respuesta.mensaje)
    }
  });
})

/*  VER RESUMEN */

$("#verResumen").click(function() {
  $.ajax({
    type: "POST",
    url: "php/verResumen.php",
    dataType: "json",
      success: function(respuesta) {
      console.log(respuesta)      
      alert(respuesta.mensaje)
      $("#totalDeuda").html(formata(respuesta.cuantoDebo)) 
      $("#totalPrestamo").html(formata(respuesta.cuantoPreste))  
    }
  });
})