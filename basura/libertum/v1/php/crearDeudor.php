<?php
header("Access-Control-Allow-Origin: *");
require_once("config.php");

if ($mysqli){

    session_start();
    $idUsuario=$_SESSION['idUsuario'];
    $idUsuarioDeudor=$_POST["idUsuario"]; 
    $montoDeudor=$_POST["monto"];  
    $fechaDeudor=$_POST["fecha"];
  
  $query="INSERT INTO deudores (idUsuario,idUsuarioDeudor,monto,fecha) VALUES ($idUsuario,$idUsuarioDeudor,$montoDeudor,'$fechaDeudor')";
  if($mysqli->query($query)){
		$resultado = array(
			'tipo'=>"success",
			'mensaje' => "La deuda se ha creado con éxito."
		); 


  }else{
	$resultado = array(
			'tipo'=>"error",
			'mensaje' => "No hay conexión en este momento. Intente nuevamente más tarde."
		); 
}
  		
$mysqli->close();
} 

echo json_encode($resultado);

?>
