<?php
header('Access-Control-Allow-Origin: *');
$server = isset($_SERVER['DOCUMENT_ROOT']) && !empty($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : "/opt/bitnami/apache/htdocs";
$captchaGlobal=true;

?>