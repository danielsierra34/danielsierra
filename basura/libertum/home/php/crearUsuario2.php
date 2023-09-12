<?php
header("Access-Control-Allow-Origin: *");
require_once("config.php");

if ($mysqli){

    $nombre=$_POST["nombre"];  
    $apellido=$_POST["apellido"];  
    $email=$_POST["email"];    
  
  $query="select * from usuarios where EMAIL='$email'";
  $result = $mysqli->query($query);  
  $resultados=$result->num_rows;
  if($resultados>0){
    
    $registro= mysqli_fetch_object($result);
    $idRegistro=$registro->ID;
    session_start();
    if(isset($_SESSION['idUsuario'])){
			session_destroy();
		}
    session_start();
		$_SESSION['idUsuario']  = $idRegistro;
    
    $resultado = array(
        'tipo'=>"success",
        'mensaje' => "El usuario se ha validado con éxito."
      ); 
    
  }else{
    
    $query="INSERT INTO usuarios (NOMBRE,APELLIDO,EMAIL,TIPO) VALUES ('$nombre','$apellido','$email','GOOGLE')";
    if($mysqli->query($query)){
      $idRegistro=$mysqli->insert_id;
      session_start();
      if(isset($_SESSION['idUsuario'])){
        session_destroy();
      }
      session_start();
      $_SESSION['idUsuario']  = $idRegistro;
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
  }
  
  
  
  		
$mysqli->close();
} 

echo json_encode($resultado);

?>