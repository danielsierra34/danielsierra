<footer id="footer">
  <div class="container">
    <h3>Daniel Sierra Rincón</h3>
    <p>
      <?php echo obtenerTexto("slogan1");?> <b><?php echo obtenerTexto("slogan2");?></b>.</p>
    <div class="social-links">
      <!--<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>-->
      <a href="https://www.linkedin.com/in/danielsierra34/" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
      <a href="https://wa.me/573115131750?text=<?php echo obtenerTexto("whatsapp");?>" class="whatsapp" target="_blank"><i class="bi bi-whatsapp"></i></a>
      <a href="<?php echo obtenerTexto("otros-linkDescarga");?>" class="download" target="_blank" data-toggle="tooltip" data-placement="bottom" title="<?php echo obtenerTexto("otros-descarga");?>"><i class="bi bi-cloud-arrow-down"></i></a>
      <a href="javascript:urlAppend('lng','es');" class="<?php echo $statusES;?>" data-toggle="tooltip" data-placement="bottom" title="Traducir a Español"><i class="bi bi-translate"></i></a>
      <a href="javascript:urlAppend('lng','en');" class="<?php echo $statusEN;?>" data-toggle="tooltip" data-placement="bottom" title="Translate to English"><i class="bi bi-translate"></i></a>
    </div>
    <div class="copyright" style="color:white">
      &copy; Copyright <strong><span>MyResume</span></strong>. All Rights Reserved
    </div>
    <div class="credits" style="color:white">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: [license-url] -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/ -->
      Designed by <a href="https://bootstrapmade.com/" style="color:white">BootstrapMade</a>
    </div>
  </div>
</footer>