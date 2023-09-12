<header id="header" class="d-flex flex-column justify-content-center">
    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span><?php echo obtenerTexto("header-principal");?></span></a></li>
        <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span><?php echo obtenerTexto("header-perfil");?></span></a></li>
         <li><a href="#education" class="nav-link scrollto"><i class="bi bi-book"></i> <span><?php echo obtenerTexto("header-educacion");?></span></a></li>
        <li><a href="#skills" class="nav-link scrollto"><i class="bi bi-tools"></i> <span><?php echo obtenerTexto("header-habilidades");?></span></a></li>       
        <li><a href="#experience" class="nav-link scrollto"><i class="bi bi-briefcase"></i> <span><?php echo obtenerTexto("header-experiencia");?></span></a></li>
        <!--<li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>-->
        <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span><?php echo obtenerTexto("header-contacto");?></span></a></li>
        <li><a href="<?php echo obtenerTexto("otros-linkDescarga");?>" target="_blank"><i class="bi bi-cloud-arrow-down"></i> <span><?php echo obtenerTexto("otros-descarga");?></span></a></li>
        <li class="<?php echo $statusES;?>"><a href="javascript:urlAppend('lng','es');"><i class="bi bi-translate"></i> <span>Traducir a Español</span></a></li>
        <li class="<?php echo $statusEN;?>"><a href="javascript:urlAppend('lng','en');"><i class="bi bi-translate"></i> <span>Translate to English</span></a></li>
      </ul>
    </nav>
  </header>