<?php

require_once("config.php");

if ($mysqli){

    $idUsuario=$_POST["idUsuario"];
	  $password=$_POST["password"]; 
    
  $query="UPDATE usuarios set PASSWORD='$password' where md5(ID)='$idUsuario'";
  if($mysqli->query($query)){
		$resultado = array(
			'tipo'=>"success",
			'mensaje' => "la contraseña se ha establecido"
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
