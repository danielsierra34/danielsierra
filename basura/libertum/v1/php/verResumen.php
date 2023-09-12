<?php
header("Access-Control-Allow-Origin: *");
require_once("config.php");

if ($mysqli){

    session_start();
    $idUsuario=$_SESSION['idUsuario'];
     
  $query="select sum(monto) as total from deudores where idUsuario=$idUsuario";
  $result = $mysqli->query($query);
  $objeto= mysqli_fetch_object($result);
  $cuantoPreste=$objeto->total;
  
  $query="select idUsuario, sum(monto) as total from deudores where idUsuario=$idUsuario group by idUsuarioDeudor";
  $result = $mysqli->query($query);
  $detalleCuantoPreste=array();
  while ($objeto= mysqli_fetch_object($result)){
  array_push($detalleCuantoPreste,$objeto);   
  }
  
  $query="select sum(monto) as total from deudores where idUsuarioDeudor=$idUsuario";
  $result = $mysqli->query($query);
  $objeto= mysqli_fetch_object($result);
  $cuantoDebo=$objeto->total;
   
  /*MIRAR CON CUIDADO */
  
  $query="select idUsuario, sum(monto) as total from deudores where idUsuarioDeudor=$idUsuario group by idUsuario";
  $result = $mysqli->query($query);
  $detalleCuantoDebo=array();
  while ($objeto= mysqli_fetch_object($result)){
  array_push($detalleCuantoDebo,$objeto);   
  }
  
		$resultado = array(
			'tipo'=>"success",
			'mensaje' => "Se han calculado los valores con éxito.", 
      "cuantoPreste" => $cuantoPreste, 
      "detalleCuantoPreste" => $detalleCuantoPreste,
      "cuantoDebo" => $cuantoDebo,
      "detalleCuantoDebo" => $detalleCuantoDebo
		); 


    		
$mysqli->close();
} 

echo json_encode($resultado);

?>
