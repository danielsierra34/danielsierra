<?php

require_once("config.php");
require_once("enviarCorreo.php");
require_once("phpmailer/class.phpmailer.php");

function RandomString($length=6,$uc=TRUE,$n=TRUE,$sc=FALSE){
	$source = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
	if($length>0){
		$rstr = "";
		$source = str_split($source,1);
		for($i=1; $i<=$length; $i++){
			mt_srand((double)microtime() * 1000000);
			$num = mt_rand(1,count($source));
			$rstr .= $source[$num-1];
		}
	}
	return $rstr;
};

if ($mysqli){
    session_start();
    $idUsuario=$_SESSION['idUsuario'];
    
    $id=trim($_POST["id"]);  
    $montoDeudor=$_POST["monto"];  
    $fechaDeudor=$_POST["fecha"];
    $password=RandomString();
      $query2="INSERT INTO deudores (idUsuario,idUsuarioDeudor,valor,fecha_sistema, fecha_transaccion, status) VALUES ($idUsuario,$id,$montoDeudor,NOW(),'$fechaDeudor',0)";
      if($mysqli->query($query2)){
        $resultado = array(
          'tipo'=>"success",
          'mensaje' => "La deuda se ha creado con éxito."
        );
        
        $query="select * from usuarios where ID=$idUsuario";
        $result = $mysqli->query($query);
        $objetoOrigen= mysqli_fetch_object($result);

        $query="select * from usuarios where ID=$idUsuarioDeudor";
        $result = $mysqli->query($query);
        $objetoDestino= mysqli_fetch_object($result);

        $contenido=creacionPrestamo2($objetoOrigen,$objetoDestino,$montoDeudor,$fechaDeudor);
        $asunto="Te han prestado dinero!!!";    
        enviarCorreo($objetoDestino->EMAIL,$asunto,$contenido,null,null);
      }else{
        $resultado = array(
          'consulta'=>$query2,
          'tipo'=>"error",
          'mensaje' => "No se pudo crear el prestamo."
        ); 
      }

  		
$mysqli->close();
}else{
  $resultado = array(
      'consulta'=>$query,
			'tipo'=>"error",
			'mensaje' => "No hay conexión en este momento. Intente nuevamente más tarde."
		); 
}

echo json_encode($resultado);

?>