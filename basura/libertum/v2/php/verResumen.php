<?php
require_once("config.php");
if ($mysqli){
    session_start();
   $idUsuario=$_SESSION['idUsuario'];
//INICIO PROCESAMINTO PRESTAMOS
  $query="select sum(case when status=1 then valor else 0 end) as valor, sum(case when status=0 then valor else 0 end) as pendiente from deudores where idUsuario=$idUsuario and status in (0,1,2)";
    $result = $mysqli->query($query);
  $objeto= mysqli_fetch_object($result);
 $cuantoPreste->valor=$objeto->valor;
	$cuantoPreste->pendiente=$objeto->pendiente;	
  //QUIEN ME DEBE. EN ESTE CASO YO SOY IDUSUARIO
  $query="select deudores.idUsuario,deudores.idUsuarioDeudor, sum(case when status=1 then deudores.valor else 0 end) as valor, usuarios.NOMBRE from deudores LEFT JOIN usuarios on deudores.idUsuarioDeudor=usuarios.ID where deudores.idUsuario=$idUsuario and deudores.status in(0,1) group by deudores.idUsuarioDeudor";
	$result = $mysqli->query($query);
  $detalleCuantoPreste=array();
  while ($objeto= mysqli_fetch_object($result)){
    $queryx="select idRegistro, idUsuario,idUsuarioDeudor, valor, fecha_transaccion, status from deudores where idUsuarioDeudor=$objeto->idUsuarioDeudor and idUsuario=$idUsuario and status in (0,1,2)";
    $resultx = $mysqli->query($queryx);
    $detallePrestamos=array();
      while ($objetox= mysqli_fetch_object($resultx)){
        array_push($detallePrestamos,$objetox);
      }
    $objeto->detalle=$detallePrestamos;
		$objeto->consulta=$queryx;
   	array_push($detalleCuantoPreste,$objeto);
  }
  $cuantoPreste->detalle=$detalleCuantoPreste;
  //FIN PROCESAMIENTO PRESTAMOS
    
    //PROCESAMIENTO DEUDAS
  $query="select sum(valor) as valor from deudores where idUsuarioDeudor=$idUsuario and status=1";
  $result = $mysqli->query($query);
  $objeto= mysqli_fetch_object($result);
  $cuantoDebo->valor=$objeto->valor;
   // AQUIEN LE DEBO. EN ESTE CASO SOY ID USUARIO DEUDOR
 $query="select deudores.idUsuario, deudores.idUsuarioDeudor, sum(deudores.valor) as valor, usuarios.nombre from deudores LEFT JOIN usuarios on deudores.idUsuario = usuarios.ID where deudores.idUsuarioDeudor=$idUsuario and deudores.status=1 group by deudores.idUsuario";
 	$result = $mysqli->query($query);
  $detalleCuantoDebo=array();
  while ($objeto= mysqli_fetch_object($result)){
    $queryx="select idRegistro, idUsuario, idUsuarioDeudor, fecha_transaccion, status, valor from deudores where idUsuario=$objeto->idUsuario and idUsuarioDeudor=$idUsuario and status=1";
    $resultx = $mysqli->query($queryx);
    $detalleDeudas=array();
    while ($objetox= mysqli_fetch_object($resultx)){
    array_push($detalleDeudas,$objetox);   
    }
  $objeto->detalle=$detalleDeudas;
	array_push($detalleCuantoDebo,$objeto);   
  }
  $cuantoDebo->detalle=$detalleCuantoDebo;
  //FIN PROCESAMIENTO DEUDAS
	
	//INICIO PROCESAMIENTO NOTIFICACIONES
	$query="select deudores.status, deudores.idRegistro, deudores.idUsuario, deudores.idUsuarioDeudor, deudores.valor, deudores.fecha_transaccion, usuarios.nombre, usuarios.apellido from deudores LEFT JOIN usuarios on deudores.idUsuario = usuarios.ID where deudores.idUsuarioDeudor=$idUsuario and deudores.status =0";
 	$result = $mysqli->query($query);
  $notificaciones=array();
  while ($objeto= mysqli_fetch_object($result)){
  array_push($notificaciones,$objeto);   
	}
	$query="select deudores.status, deudores.idRegistro, deudores.idUsuario, deudores.idUsuarioDeudor, deudores.valor, deudores.fecha_transaccion, usuarios.nombre, usuarios.apellido from deudores LEFT JOIN usuarios on deudores.idUsuarioDeudor = usuarios.ID where deudores.idUsuario=$idUsuario and deudores.status =2";
 	$result = $mysqli->query($query);
  $rechazos=array();
  while ($objeto= mysqli_fetch_object($result)){
  array_push($rechazos,$objeto);   
	}
	//FIN PROCESAMIENTO NOTIFICACIONES
		$resultado = array(
			'tipo'=>"success",
			'mensaje' => "Se han calculado los valores con éxito.", 
      "Prestamos" => $cuantoPreste, 
      "Deudas" => $cuantoDebo,
			"Notificaciones"=>$notificaciones,
			"Rechazos"=>$rechazos,
			 ); 


    		
$mysqli->close();
} 

echo json_encode($resultado);

?>
