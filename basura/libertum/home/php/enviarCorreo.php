<?php


function creacionPrestamo($objetoOrigen,$objetoDestino,$montoDeudor,$fechaDeudor){

  $mensaje=file_get_contents('mails/compilados/creacionPrestamo.php'); 
  $mensaje = str_replace('%nombreDestino%',$objetoDestino->NOMBRE, $mensaje);
  $mensaje = str_replace('%nombreOrigen%',$objetoOrigen->NOMBRE." ".$objetoOrigen->APELLIDO, $mensaje);
  $mensaje = str_replace('%monto%',"$ ".number_format($montoDeudor,0), $mensaje);
	return $mensaje;	
}

function creacionPrestamo2($objetoOrigen,$objetoDestino,$montoDeudor,$fechaDeudor){
  $mensaje=file_get_contents('mails/compilados/creacionPrestamo2.php'); 
  $mensaje = str_replace('%nombreDestino%',$objetoDestino->NOMBRE, $mensaje);
  $mensaje = str_replace('%password%',$objetoDestino->PASSWORD, $mensaje);
  $mensaje = str_replace('%idUsuario%',md5($objetoDestino->ID), $mensaje);
  $mensaje = str_replace('%nombreOrigen%',$objetoOrigen->NOMBRE." ".$objetoOrigen->APELLIDO, $mensaje);
  $mensaje = str_replace('%monto%',"$ ".number_format($montoDeudor,0), $mensaje);
	return $mensaje;	
}


function aceptacionPrestamo($objetoOrigen,$objetoDestino,$objetoDeudor){
  $mensaje=file_get_contents('mails/compilados/statusPrestamo.php'); 
  $mensaje = str_replace('%nombreDestino%',$objetoDestino->NOMBRE. " ".$objetoDestino->APELLIDO, $mensaje);
  $mensaje = str_replace('%nombreOrigen%',$objetoOrigen->NOMBRE, $mensaje);
  $mensaje = str_replace('%monto%',"$ ".number_format($objetoDeudor->valor,0), $mensaje);
  $mensaje = str_replace('%statusNuevo%',"Confirmado", $mensaje);
	return $mensaje;	
}

function rechazoPrestamo($objetoOrigen,$objetoDestino,$objetoDeudor){
  $mensaje=file_get_contents('mails/compilados/statusPrestamo.php'); 
  $mensaje = str_replace('%nombreDestino%',$objetoDestino->NOMBRE. " ".$objetoDestino->APELLIDO, $mensaje);
  $mensaje = str_replace('%nombreOrigen%',$objetoOrigen->NOMBRE, $mensaje);
  $mensaje = str_replace('%monto%',"$ ".number_format($objetoDeudor->valor,0), $mensaje);
  $mensaje = str_replace('%statusNuevo%',"Rechazado", $mensaje);
	return $mensaje;	
}


 
function enviarCorreo($destino,$asunto,$contenido,$recipients,$adjunto){

	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug  = 1;
	$mail->Host  = "smtp.gmail.com";
	$mail->Port       = 465;
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPAuth   = true;    
	$mail->Username   = "libertum.co@gmail.com";
	$mail->Password   = "libertum123";
	$mail->AddAddress($destino);
	$mail->Subject    = $asunto;
	$mail->MsgHTML($contenido);
	$mail->AltBody    = "Para ver el mensaje, utilice un visor de HTML de correo electrónico compatible!!!";
	$mail->FromName   = "Libertum.co";
	$mail->From   = "libertum.co@gmail.com";    
	$mail->CharSet = 'UTF-8';
  if($adjunto){
    $mail->AddAttachment($adjunto);
  }
  if($recipients){
    foreach($recipients as $email){
      $mail->AddCC($email);
    }
  }
	
	if(!$mail->Send()) {
		return false;
	} else {
		return true;
	}	
	exit;
}




?>