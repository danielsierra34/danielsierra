<?php
function enviarCorreo($destino,$asunto,$contenido,$recipients,$adjunto){
	$mail = new PHPMailer(); 
  $mail->CharSet = 'UTF-8';
  $mail->Encoding = 'base64';
	$mail->IsSMTP(); 
	$mail->SMTPDebug  = 1;
	$mail->Host  = "smtp.gmail.com";
	$mail->Port       = 465;
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPAuth   = true;    
	$mail->Username   = "placelings@gmail.com";
	$mail->Password   = "Carraspunchis16#";
	$mail->AddAddress($destino);
	$mail->Subject    = $asunto;
	$mail->MsgHTML($contenido);
	$mail->AltBody    = "Para ver el mensaje, utilice un visor de HTML de correo electrónico compatible";
	$mail->FromName   = "www.danielsierra.com";
	$mail->From   = "placelings@gmail.com";    
	
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