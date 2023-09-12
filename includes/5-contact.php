<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2><?php echo obtenerTexto("header-contacto");?></h2>
    </div>
    <div class="row mt-1">
      <div class="col-lg-4">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4><?php echo obtenerTexto("contact-location");?>:</h4>
            <p>Bogotá - Colombia</p>
          </div>
          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>danielsierra34@gmail.com</p>
          </div>
          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4><?php echo obtenerTexto("contact-call");?>:</h4>            
            <p><a href="tel:+573115131750">(+57) 311 5131750</a></p>
          </div>
          <div class="phone">
            <i class="bi bi-whatsapp"></i>
            <h4>WhatsApp:</h4>            
            <p><a href="https://wa.me/573115131750?text=<?php echo obtenerTexto("whatsapp");?>" class="whatsapp" target="_blank">(+57) 311 5131750</a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8 mt-5 mt-lg-0">
        <form  id="formContacto" class="php-email-form" onsubmit="crearContacto(event,this)">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="<?php echo obtenerTexto("contact-name");?>" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo obtenerTexto("contact-email");?>" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="<?php echo obtenerTexto("contact-phone");?>" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="<?php echo obtenerTexto("contact-message");?>" required></textarea>
          </div>
          <div class="form-group col-md-12 text-center">
              <div id="captchaContacto" class="captcha"></div>
            </div>
            <div class="form-group col-md-12">
              <div class="alert alert-success small">
              </div>
            </div>
          <!--<div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>-->
          <div class="text-center">
            <a href="javascript:void(0)" class="btn btn-primary btn-block botonInterno" onclick="$('#formContacto').submit();">
                <?php echo obtenerTexto("contact-send");?>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>