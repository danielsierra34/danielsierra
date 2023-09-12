<?php

require_once("config.php");
require_once("enviarCorreo.php");
require_once("phpmailer/class.phpmailer.php");

if ($mysqli){

  $idRegistro=$_POST["idRegistro"]; 
    
  $query="UPDATE deudores set status=1 where idRegistro=$idRegistro";
  if($mysqli->query($query)){
		$resultado = array(
			'tipo'=>"success",
			'mensaje' => "El prestamo ha sido aceptado"
		); 
    
    $query="select * from deudores where idRegistro=$idRegistro";
    $result = $mysqli->query($query);
    $objetoPrestamo= mysqli_fetch_object($result);
    
    $query="select * from usuarios where ID=$objetoPrestamo->idUsuario";
    $result = $mysqli->query($query);
    $objetoOrigen= mysqli_fetch_object($result);
    
    $query="select * from usuarios where ID=$objetoPrestamo->idUsuarioDeudor";
    $result = $mysqli->query($query);
    $objetoDestino= mysqli_fetch_object($result);
    
    $contenido=aceptacionPrestamo($objetoOrigen,$objetoDestino,$objetoPrestamo);
    $asunto="Han aceptado tu prestado!!!";    
    enviarCorreo($objetoOrigen->EMAIL,$asunto,$contenido,null,null);


  }else{
	$resultado = array(
      'consulta'=>$query,
			'tipo'=>"error",
			'mensaje' => "No hay conexión en este momento. Intente nuevamente más tarde."
		); 
}
  		
$mysqli->close();
} 

echo json_encode($resultado);

?>
