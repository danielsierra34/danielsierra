<?php
header("Access-Control-Allow-Origin: *");
require_once("config.php");

if ($mysqli){

    $email=$_POST["email"];  
    $password=$_POST["password"];
  
  $query="select * from usuarios where EMAIL='$email' and PASSWORD='$password' ";
  $result = $mysqli->query($query);
  $registro= mysqli_fetch_object($result);
  $idRegistro=$registro->ID;
  $resultados=$result->num_rows;
  if($resultados>0){

    session_start();
    if(isset($_SESSION['idUsuario'])){
			session_destroy();
		}
    session_start();
		$_SESSION['idUsuario']  = $idRegistro;
  }
  $resultado = array(
			'tipo'=>"success",
			'mensaje' => $resultados,
    'id'=>$idRegistro
 		);
  		
$mysqli->close();
} 

echo json_encode($resultado);

?>