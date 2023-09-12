<?php
header("Access-Control-Allow-Origin: *");
require_once("config.php");

if ($mysqli){

    $nombre=$_POST["nombre"];  
    $apellido=$_POST["apellido"];  
    $celular=$_POST["celular"]; 
    $email=$_POST["email"];  
    $password=$_POST["password"];
  
  $query="INSERT INTO usuarios (NOMBRE,APELLIDO,EMAIL,CELULAR,PASSWORD) VALUES ('$nombre','$apellido','$email','$celular','$password')";
  if($mysqli->query($query)){
		$resultado = array(
			'tipo'=>"success",
			'mensaje' => "El usuario ha sido creado con éxito."
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