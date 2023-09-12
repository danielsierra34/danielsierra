var prestamoActual;
//CONVERTIR UN NUMERO EN UN PRECIO
function formata(number) {
  var comma = ',',
    string = Math.max(0, number).toFixed(0),
    length = string.length,
    end = /^\d{4,}$/.test(string) ? length % 3 : 0;
  return "$ " + (end ? string.slice(0, end) + comma : '') + string.slice(end).replace(/(\d{3})(?=\d)/g, '$1' + comma);
}



function unformata(number) {
  number = number.replace(/^\$/, "");
  return parseFloat(number.replace(/,/g, ''));
}
//TRAE EL RESUMEN DE DEUDAS, PRESTAMOS Y NOTIFICACIONES
function verResumen() {
  $.ajax({
    type: "POST",
    url: "php/verResumen.php",
    dataType: "json",
    success: function(respuesta) {
      console.log(respuesta)
      $("#totalDeudas").html(formata(respuesta.Deudas.valor))
      $("#totalPrestamos").html(formata(respuesta.Prestamos.valor))
      $("#totalPrestamosPendientes").html(formata(respuesta.Prestamos.pendiente))
      //ACA EMPIEZA EL PROCESAMIENTO DE DEUDAS
      var nodoDeudas = respuesta.Deudas.detalle;
      $("#listadoDeudas").html("")
      $.each(nodoDeudas, function(x, y) {
        var detalleDeudas = "";
        $.each(y.detalle, function(xx, yy) {
          detalleDeudas = detalleDeudas + `<li class="list-group-item"> <span data-toggle="tooltip" data-placement="right" title="${yy.fecha_transaccion}">${formata(yy.valor)}</span></li>`;
        })
        $("#listadoDeudas").append(`<div class="col-md-4">
  									<div class="card bg-light mb-3">
									<div class="card-header"><div class="avatar"><img src="img/avatar.png"></div>${y.nombre}<a class="float-right" data-toggle="collapse" href="#bloque-deudas-${x}" role="button" aria-expanded="false" aria-controls="collapseExample">
 								 		<i class="fas fa-angle-right"></i>  </a><span class="span-valor">${formata(y.valor)}</span>
										</div>
  									<div class="card-body collapse" id="bloque-deudas-${x}">
    									<ul class="list-group">
											${detalleDeudas}
											</ul>
  									</div>
										</div>
									</div>`)
      })
      //ACA EMPIEZA EL PROCESAMIENTO DE PRESTAMOS
      var nodoPrestamos = respuesta.Prestamos.detalle;
      $("#listadoPrestamos").html("")
      $.each(nodoPrestamos, function(x, y) {
        var detallePrestamos = "";
        $.each(y.detalle, function(xx, yy) {
          if (yy.status == 2) {
            detallePrestamos = detallePrestamos + `<li class="list-group-item rosado">
<span data-toggle="tooltip" data-placement="right" title="${yy.fecha_transaccion}">${formata(yy.valor)}</span>
<a tipo="eliminarPrestamo" class="float-right" data-toggle="confirmation" data-title="Desea eliminar esta transaccion del sistema?" idRegistro="${yy.idRegistro}">
<i class="fas fa-times despegado danger"></i>
</a></li>`;
          }
          if (yy.status == 1) {
            detallePrestamos = detallePrestamos + `<li class="list-group-item">
<span data-toggle="tooltip" data-placement="right" title="${yy.fecha_transaccion}">${formata(yy.valor)}</span>
<a tipo="finalizarPrestamo" class="float-right" data-toggle="confirmation" data-title="Desea dar por terminada este prestamo?" idRegistro="${yy.idRegistro}">
<i class="far fa-check-circle despegado"></i>
</a>
<a tipo="editarPrestamo" class="float-right" data-toggle="popover" idRegistro="${yy.idRegistro}">
<i class="far fa-edit despegado"></i>
</a></li>`;
          }
          if (yy.status == 0) {
            detallePrestamos = detallePrestamos + `<li class="list-group-item">
<span data-toggle="tooltip" data-placement="right" title="${yy.fecha_transaccion}">${formata(yy.valor)}</span>
<a tipo="finalizarPrestamo" class="float-right" data-toggle="tooltip" data-placement="left" title="Pendiente por aceptar">
<i class="fas fa-exclamation-triangle warning despegado"></i>
</a><a tipo="editarPrestamo" class="float-right" data-toggle="popover" idRegistro="${yy.idRegistro}">
<i class="far fa-edit despegado"></i>
</a></li>`;
          }
        })
        $("#listadoPrestamos").append(`<div class="col-md-4">
							<div class="card bg-light mb-3">  									
								<div class="card-header"><div class="avatar"><img src="img/avatar.png"></div>${y.NOMBRE}<a class="float-right" data-toggle="collapse" href="#bloque-prestamos-${x}" role="button" aria-expanded="false" aria-controls="collapseExample">
 								 <i class="fas fa-angle-right"></i>  </a><span class="span-valor">${formata(y.valor)}</span>
										</div>
  									<div class="card-body collapse" id="bloque-prestamos-${x}">
    									<ul class="list-group">
											${detallePrestamos}
											</ul>
										</div>
  									</div>
									</div>`)
      })
      //ACA EMPIEZA EL PROCESAMIENTO DE NOTIFICACIONES
      var nodoNotificaciones = respuesta.Notificaciones;
      $("#listadoNotificaciones").html("")
      $.each(nodoNotificaciones, function(x, y) {
        $("#listadoNotificaciones").append(`<div class="col-md-12">
  									<div class="card bg-light mb-3">
									<div class="card-header"><div class="avatar"><img src="img/avatar.png"></div>${y.nombre} ${y.apellido} te presto <b>${formata(y.valor)}</b> en ${y.fecha_transaccion}
										<a tipo="aceptarNotificacion" class="float-right" data-toggle="confirmation" data-title="Desea aceptar este prestamo?" idRegistro="${y.idRegistro}"><i class="far fa-check-circle"></i></a>
										</div>
  									</div>
									</div>`)
      })
      //ACA EMPIEZA EL PROCESAMIENTO DE RECHAZOS
      var nodoRechazos = respuesta.Rechazos;
      $("#listadoRechazos").html("")
      $.each(nodoRechazos, function(x, y) {
        $("#listadoRechazos").append(`<div class="col-md-12">
  									<div class="card bg-light mb-3">
									<div class="card-header"><div class="avatar"><img src="img/avatar.png"></div>${y.nombre} ${y.apellido} rechazo tu prestamo por <b>${formata(y.valor)}</b> en ${y.fecha_transaccion}
										</div>
  									</div>
									</div>`)
      })
      //ESTA LINEA ACTUALIZA EL PLUGIN DE FECHA-TOOLTIP
      $('[data-toggle="tooltip"]').tooltip()
    }
  });
}
//RECIVE UN IDREGISTRO(DEUDA), INVOCA UN PHP QUE LE CAMNBIA EL STATUS DE 0 A 1  
function aceptarNotificacion(x) {
  $.ajax({
    type: "POST",
    url: "php/aceptarPrestamo.php",
    dataType: "json",
    data: {
      idRegistro: x
    },
    success: function(respuesta) {
      $("#success-notificaciones").html(respuesta.mensaje)
      $("#success-notificaciones").show()
      setTimeout(function() {
        $("#success-notificaciones").fadeOut(1500)
      }, 1500);
      verResumen()
    }
  });
}
//RECIVE UN IDREGISTRO(DEUDA), INVOCA UN PHP QUE LE CAMNBIA EL STATUS DE 0 A 2  
function rechazarNotificacion(x) {
  $.ajax({
    type: "POST",
    url: "php/rechazarPrestamo.php",
    dataType: "json",
    data: {
      idRegistro: x
    },
    success: function(respuesta) {
      $("#success-notificaciones").html(respuesta.mensaje)
      $("#success-notificaciones").show()
      setTimeout(function() {
        $("#success-notificaciones").fadeOut(1500)
      }, 1500);
      verResumen()
    }
  });
}
////RECIVE UN IDREGISTRO(DEUDA), INVOCA UN PHP QUE LE CAMNBIA EL STATUS DE 0 A 3  
function finalizarPrestamo(x) {
  $.ajax({
    type: "POST",
    url: "php/finalizarPrestamo.php",
    dataType: "json",
    data: {
      idRegistro: x
    },
    success: function(respuesta) {
      $("#success-prestamos").html(respuesta.mensaje)
      $("#success-prestamos").show()
      setTimeout(function() {
        $("#success-prestamos").fadeOut(1500)
      }, 1500);
      verResumen()
    }
  });
}
////RECIVE UN IDREGISTRO(DEUDA), EL VALOR NUEVO Y SE LOS ENVIA A UN PHP QUE HACE EL CAMBIO  
function modificarPrestamo(x, y) {
  $.ajax({
    type: "POST",
    url: "php/modificarPrestamo.php",
    dataType: "json",
    data: {
      idRegistro: x,
      valor: unformata(y),
    },
    success: function(respuesta) {
      /*$("#success-prestamos").html(respuesta.mensaje)
      	$("#success-prestamos").show()
      	setTimeout(function(){ 
      		$("#success-prestamos").fadeOut(1500)
      	}, 1500);*/
      verResumen()
    }
  });
}
//ELIMINA UN PRESTAMO
function eliminarPrestamo(x) {
  $.ajax({
    type: "POST",
    url: "php/eliminarPrestamo.php",
    dataType: "json",
    data: {
      idRegistro: x,
    },
    success: function(respuesta) {
      /*$("#success-prestamos").html(respuesta.mensaje)
      	$("#success-prestamos").show()
      	setTimeout(function(){ 
      		$("#success-prestamos").fadeOut(1500)
      	}, 1500);*/
      verResumen()
    }
  });
}
//valido para los elementos que se crean durante el runtime
$(document).delegate(".modificarValor", "click", function() {
  var nuevoValor = $(this).parent().siblings(".nuevoValorPrestamo").val();
  modificarPrestamo(prestamoActual, nuevoValor)
})
$(document).delegate(".precio", "keyup", function(e) {
  if (e.which != 37 && e.which != 38 && e.which != 39 && e.which != 40) {
    valor = accounting.unformat($(this).val());
    $(this).val(accounting.formatMoney(valor, '$', 0));
  }
});

//TODO LO DE ACA SUCEDE EN EL MOMENTO DEL CARGUE
$(function() {

  /*$('body').on('click', function (e) {
    $('[data-toggle=popover]').each(function () {
         $('.popover').popover('hide');
    });
     $('[data-toggle=tooltip]').each(function () {
      $('.confirmation').confirmation('hide');
    });
});*/

  $('body').popover({
    selector: '[data-toggle="popover"]',
    title: `Modificar prestamo`,
    html: true,
    placement: 'top',
    sanitize: false,
    content: function() {
      prestamoActual = $(this).attr("idRegistro");
      $('.popover').popover('hide');
      $('.confirmation').confirmation('hide');
      return $("#popoverCambiarPrestamo").html();
    },
    container: '#listadoPrestamos'
  });
  $('[data-toggle="tooltip"]').tooltip()
  $('body').confirmation({
    selector: '[data-toggle=confirmation]',
    content: function() {
      $('.popover').popover('hide');
      $('.confirmation').confirmation('hide');
    },
    onConfirm: function() {
      var idRegistro = $(this).attr('idRegistro');
      var tipo = $(this).attr('tipo');
      if (tipo == "finalizarPrestamo") {
        finalizarPrestamo(idRegistro);
      }
      if (tipo == "aceptarNotificacion") {
        aceptarNotificacion(idRegistro);
      }
      if (tipo == "eliminarPrestamo") {
        eliminarPrestamo(idRegistro);
      }
    },
    onCancel: function() {
      var idRegistro = $(this).attr('idRegistro');
      var tipo = $(this).attr('tipo');
      if (tipo == "finalizarPrestamo") {}
      if (tipo == "aceptarNotificacion") {
        rechazarNotificacion(idRegistro);
      }
      if (tipo == "eliminarPrestamo") {}
    }
  });
  verResumen()
  $("#crearCuenta").click(function() {
    var password1 = $("#password1").val();
    var password2 = $("#password2").val();
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var celular = $("#celular").val();
    var email = $("#email").val();
    if (nombre.length > 0 && apellido.length > 0 && celular.length > 0 && email.length > 0) {
      if (password1 == password2) {
        if (password1.length > 5) {
          $("#crearUsuario").hide()
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
              $("#crearUsuario").show()
              $("#formCrearUsuario")[0].reset()
              console.log(respuesta)
              $("#success-crearCuenta").html(respuesta.mensaje)
              $("#success-crearCuenta").show()
              setTimeout(function() {
                $("#success-crearCuenta").fadeOut(1500)
              }, 1500);
            }
          });
        } else {
          $("#danger-crearCuenta").html("La contraseña debe tener minimo 6 caracteres")
          $("#danger-crearCuenta").show()
          setTimeout(function() {
            $("#danger-crearCuenta").fadeOut(1500)
          }, 1500);
        }
      } else {
        $("#danger-crearCuenta").html("Las contraseñas no coinciden")
        $("#danger-crearCuenta").show()
        setTimeout(function() {
          $("#danger-crearCuenta").fadeOut(1500)
        }, 1500);
      }
    } else {
      $("#danger-crearCuenta").html("Diligencie todos los campos")
      $("#danger-crearCuenta").show()
      setTimeout(function() {
        $("#danger-crearCuenta").fadeOut(1500)
      }, 1500);
    }
  })
  /*  VALIDAR EL INGRESO */
  $("#loginUsuario").click(function() {
    //$(this).hide() 
    $.ajax({
      type: "POST",
      url: "php/validarUsuario.php",
      dataType: "json",
      data: {
        email: $("#email-login").val(),
        password: $("#password-login").val()
      },
      success: function(respuesta) {
        //$("#loginUsuario").show()
        //$("#formLoginUsuario")[0].reset()			
        console.log(respuesta)
        if (respuesta.mensaje == 0) {
          $("#danger-ingresar").html("Usuario o contraseña invalida")
          $("#danger-ingresar").show()
          setTimeout(function() {
            $("#danger-ingresar").fadeOut(1500)
          }, 1500);
        } else {
          $("#success-ingresar").html("Ingresando...")
          $("#success-ingresar").show()
          setTimeout(function() {
            location.href = 'account.php';
          }, 500);
        }
      }
    });
  })

  /*  CREAR PRESTAMO */
  $("#crearPrestamo").click(function() {
    $(this).hide();
    $.ajax({
      type: "POST",
      url: "php/crearPrestamo.php",
      dataType: "json",
      data: {
        idUsuario: $("#idUsuarioPrestamo").val(),
        monto: unformata($("#montoPrestamo").val()),
        fecha: $("#fechaPrestamo").val()
      },
      success: function(respuesta) {
        $("#crearPrestamo").show()
        $("#formCrearPrestamo")[0].reset()
        console.log(respuesta)
        $("#success-registrarPrestamo").html(respuesta.mensaje)
        $("#success-registrarPrestamo").show()
        setTimeout(function() {
          $("#success-registrarPrestamo").fadeOut(1500)
        }, 2000);
        verResumen()
        //$("#modalCrearPrestamo").modal("hide")
      }
    });
  })
  /*  CREAR DEUDA */
  $("#crearDeuda").click(function() {
    $(this).hide();
    $.ajax({
      type: "POST",
      url: "php/crearDeuda.php",
      dataType: "json",
      data: {
        idUsuario: $("#idUsuarioDeudor").val(),
        monto: unformata($("#montoDeudor").val()),
        fecha: $("#fechaDeudor").val()
      },
      success: function(respuesta) {
        $("#crearDeuda").show()
        $("#formCrearDeuda")[0].reset()
        console.log(respuesta)
        $("#success-registrarDeuda").html(respuesta.mensaje)
        $("#success-registrarDeuda").show()
        setTimeout(function() {
          $("#success-registrarDeuda").fadeOut(1500)
        }, 2000);
        verResumen()
        //$("#modalCrearDeuda").modal("hide")
      }
    });
  })

  
})