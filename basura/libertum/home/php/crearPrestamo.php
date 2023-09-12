<?php

require_once("config.php");
require_once("enviarCorreo.php");
require_once("phpmailer/class.phpmailer.php");
if ($mysqli){

    session_start();
    $idUsuario=$_SESSION['idUsuario'];
    $idUsuarioDeudor=$_POST["idUsuario"]; 
    $montoDeudor=$_POST["monto"];  
    $fechaDeudor=$_POST["fecha"];
  
  $query="INSERT INTO deudores (idUsuario,idUsuarioDeudor,valor,fecha_sistema, fecha_transaccion, status) VALUES ($idUsuario,$idUsuarioDeudor,$montoDeudor,NOW(),'$fechaDeudor',0)";
  if($mysqli->query($query)){
		$resultado = array(
			'tipo'=>"success",
			'mensaje' => "La deuda se ha creado con éxito."
		); 
    
    $query="select * from usuarios where ID=$idUsuario";
    $result = $mysqli->query($query);
    $objetoOrigen= mysqli_fetch_object($result);
    
    $query="select * from usuarios where ID=$idUsuarioDeudor";
    $result = $mysqli->query($query);
    $objetoDestino= mysqli_fetch_object($result);
    
    $contenido=creacionPrestamo($objetoOrigen,$objetoDestino,$montoDeudor,$fechaDeudor);
    $asunto="Te han prestado dinero!!!";    
    enviarCorreo($objetoDestino->EMAIL,$asunto,$contenido,null,null);


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
