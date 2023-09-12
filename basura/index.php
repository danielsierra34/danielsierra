<?php 
$domain = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
if (strpos($domain,'danielsierra.com') == true) {
    header('location: /danielsierra');
    exit();
}
?>