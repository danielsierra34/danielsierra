<?php

require_once("config.php");

if ($mysqli){

    session_start();
    $idUsuario=$_SESSION['idUsuario'];
    $idUsuarioDeudor=$_POST["idUsuario"]; 
    $montoDeudor=$_POST["monto"];  
    $fechaDeudor=$_POST["fecha"];
  
  $query="INSERT INTO deudores (idUsuario,idUsuarioDeudor,valor,fecha_sistema, fecha_transaccion, status) VALUES ($idUsuarioDeudor,$idUsuario,$montoDeudor,NOW(),'$fechaDeudor',1)";
  if($mysqli->query($query)){
		$resultado = array(
			'tipo'=>"success",
			'mensaje' => "La deuda se ha creado con éxito."
		); 


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
