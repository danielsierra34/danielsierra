<section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Daniel Sierra Rincón</h1>
      <p><?php echo obtenerTexto("slogan1");?> <span class="typed" data-typed-items="<?php echo obtenerTexto("slogan2");?>"></span></p>
      <div class="social-links">
        <!--<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>-->
        <a href="https://www.linkedin.com/in/danielsierra34/" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
        <a href="https://wa.me/573115131750?text=<?php echo obtenerTexto("whatsapp");?>" class="whatsapp" target="_blank"><i class="bi bi-whatsapp"></i></a>
        <a href="<?php echo obtenerTexto("otros-linkDescarga");?>" class="download" target="_blank" data-toggle="tooltip" data-placement="bottom" title="<?php echo obtenerTexto("otros-descarga");?>"><i class="bi bi-cloud-arrow-down"></i></a>
        <a class="<?php echo $statusEN;?>" data-toggle="tooltip" data-placement="bottom" title="Translate to English" href="javascript:urlAppend('lng','en');" class="download"><i class="bi bi-translate"></i></a>
        <a class="<?php echo $statusES;?>" data-toggle="tooltip" data-placement="bottom" title="Traducir a Español" href="javascript:urlAppend('lng','es');" class="download"><i class="bi bi-translate"></i></a>
      </div>
    </div>
  </section>

