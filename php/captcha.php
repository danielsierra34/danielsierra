<?php

  //$secretKey="6LdNsL8eAAAAAOERo3_4HKwNC1V-aw5jkp5EKJgG";
  $secretKey="6LdNsL8eAAAAAPxNqjGTIi1Cw0XMb4jNn4Sdk0Un";
  $responseKey=$_POST["g-recaptcha-response"];
  $userIp=$_SERVER["REMOTE_ADDR"];
  $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIp";
  $response=file_get_contents($url);
  $response=json_decode($response);
  $captcha=$response->success;
  if($captchaGlobal){
    if (!$captcha){
      $resultado = array(
        'tipo'=>"danger",
        'mensaje' =>"Please fill the Captcha in order to continue." 
      ); 
      echo json_encode($resultado);
      exit();
    }
  }
  
?>
