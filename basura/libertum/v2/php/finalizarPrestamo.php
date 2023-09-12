<?php

require_once("config.php");

if ($mysqli){

    $idRegistro=$_POST["idRegistro"]; 
    
  $query="UPDATE deudores set status=3 where idRegistro=$idRegistro";
  if($mysqli->query($query)){
		$resultado = array(
			'tipo'=>"success",
			'mensaje' => "El prestamo ha sido saldado"
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
