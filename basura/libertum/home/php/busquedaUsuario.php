<?php
header("Access-Control-Allow-Origin: *");
require_once("config.php");

if ($mysqli){

    $celular=$_POST["celular"];  
  
  $query="select * from usuarios where CELULAR='$celular'";
  $result = $mysqli->query($query);  
  $resultados=$result->num_rows;
  if($resultados>0){
    $objeto= mysqli_fetch_object($result); 
    $nombre=$objeto->NOMBRE;
    $apellido=$objeto->APELLIDO;
    $id=$objeto->ID;
    $resultado = array(
			'tipo'=>"success",
			'mensaje' => "el usuario <b>".$nombre." ".$apellido."</b> se ha encontrado en la base de datos",
      'id'=>$id,
      'nombreCompleto' => $nombre." ".$apellido      
 		);    
  }else{
    $resultado = array(
			'tipo'=>"error",
			'mensaje' => "el usuario no se encuentra en la base de datos. lo invitamos a crearlo."
 		); 
  }
  
  		
$mysqli->close();
} 

echo json_encode($resultado);

?>