<?php

require_once("config.php");

if ($mysqli){

    $idRegistro=$_POST["idRegistro"];
	  $valor=$_POST["valor"]; 
    
  $query="UPDATE deudores set valor=$valor where idRegistro=$idRegistro";
  if($mysqli->query($query)){
		$resultado = array(
			'tipo'=>"success",
			'mensaje' => "El prestamo ha sido actualizado"
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
