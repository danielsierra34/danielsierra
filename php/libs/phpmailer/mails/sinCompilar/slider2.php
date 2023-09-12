<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title></title>

<style>.carousel a {
    position:absolute;
    top:0px;
    left:0px; 
    -webkit-animation: car-anim 9s linear infinite;    
  }

  .carousel a:nth-child(1){
    -webkit-animation-delay: 0s;    
  }
  .carousel a:nth-child(2){
    -webkit-animation-delay: 3s;    
  }
  .carousel a:nth-child(3){
    -webkit-animation-delay: 6s;    
  }

  @-webkit-keyframes car-anim 
  {
      0% {
        z-index:2;
      }
      33%{
        z-index:2;
      }
      33.001%{
        z-index:1;
      }
      100%{
        z-index:1;
      }
  }

</style></head>
 
<body bgcolor="#ffffff" style="padding: 0;">

<center style="font-family: Arial;">To view animation, view this page in a Webkit browser like Safari or Chrome<br /><br />

<div class="carousel fade car-cont" style="position: relative; width: 500px; height: 320px;">
<a href="https://www.google.com/search?q=castles"><img src="http://freshinbox.com/examples/animated-carousel/images/car-castle.jpg" border="0" /></a>
<a href="https://www.google.com/search?q=meadows"><img src="http://freshinbox.com/examples/animated-carousel/images/car-meadow.jpg" border="0" /></a>
<a href="https://www.google.com/search?q=coast"><img src="http://freshinbox.com/examples/animated-carousel/images/car-coast.jpg" border="0" /></a>
</div>

<br /><br /><br /><br /><br /><br /><br /><br />
</center>


</body>
</html>
