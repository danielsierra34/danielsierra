<?php
require("/opt/bitnami/apache/htdocs/php/config.php");
require($server."/php/libs/phpmailer/class.phpmailer.php");
require($server."/php/enviarCorreo.php");
require($server."/php/captcha.php");


$nombre=strip_tags($_POST["name"]);
$email=strip_tags($_POST["email"]);
$telefono=strip_tags($_POST["phone"]);
$mensaje=strip_tags($_POST["message"]);

/*$indicativo=strip_tags($_POST["indicativo"]);
$indicativo=explode("|", $indicativo);

$codigo=$indicativo[0];
$pais=$indicativo[2];
$indicativo=$indicativo[1];*/

if($nombre!="" && $email!="" && $telefono!="" && $mensaje!="") {

    $asunto="Nuevo ingreso de formulario de contacto.";
    $contenido="<ul><li><b>Nombre: </b>$nombre</li><li><b>Email: </b>$email</li><li><b>Telefono: </b>$telefono</li><li><b>Mensaje: </b><p>$mensaje</p></li></ul>";
    $email="placelings@gmail.com";
    $query="email:$email, asunto:$asunto";
    if(enviarCorreo("danielsierra34@gmail.com",$asunto,$contenido,null,null)){
      $resultado = array(
        'tipo'=>"success",
        'mensaje' => "Thanks for contact me. I´ll get back to you as soon as posible.",
      ); 
    }else{
      $resultado = array(
        'tipo'=>"danger",
        'mensaje' =>"There are problems sending form data. Please try again later." 
      );    
    }        

}else{
  $resultado = array(
        'tipo'=>"danger",
        'mensaje' =>"Please fill up every single field in the form." 
      );    
}


echo json_encode($resultado);
?>