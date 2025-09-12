<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.png">
    <title><?= $nombre ?>  | Unidad de Diagnostico Humanismo Vivo A.C.</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="assets/css/plugins/plugins.css">
    <link rel="stylesheet" href="assets/css/plugins/magnifying-popup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style.css">
    <meta name="theme-color" content="#e4a39d">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

</head>

<body>

    <!-- header area start -->
    <!-- header area start -->
    <header class="header-one  header--sticky">
        <div class="header-top-area">
            <div class="container-full-header">
                <div class="col-lg-12">
                    <div class="header-top">
                        <div class="left">
                            <div class="map-area">
                                <i class="fa-light fa-envelope"></i>
                                <a href="mailto:comunicacionhumanismovivo@gmail.com">comunicacionhumanismovivo@gmail.com</a>
                            </div>
                        </div>
                        <div class="right">
                            <div class="map-area">
                                <i class="fa-brands fa-whatsapp"></i><a href="https://wa.me/5564277997" style="margin-right: 10px;">5564277997</a>
                                <i class="fa-solid fa-phone"></i><a href="tel:7121206232">71 2120 6232</a>
                            </div>
                            <div class="social-area-tranaparent">
                                <span>Síguenos</span>
                                <ul>
                                    <li><a href="https://www.facebook.com/profile.php?id=61568142511141"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/ud.humanismovivo/"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-full-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-wrapper-1">
                        <div class="logo-area-start">
                            <a href="index.html" class="logo">
                                <img src="assets/logo.svg" alt="logo_area" width="300px">
                            </a>
                            <div class="nav-area">
                                <ul class="">
                                    <li class="main-nav"><a href="index.html">Inicio</a></li>
                                    <li class="main-nav"><a href="nosotros">Nosotros</a></li>
                                    <li class="main-nav"><a href="#">Farmacia</a></li>
                                    <li class="main-nav has-dropdown mega-menu"><a href="#">Servicios</a>
                                        <div class="rts-mega-menu with-add">
                                            <div class="wrapper">
                                                <div class="row g-0">
                                                    <div class="col-lg-9">
                                                        <div class="row pl--30 pt--30">
                                                            <div class="col-lg-3">
                                                                <ul class="mega-menu-item">
                                                                    <li><a href="#">Colposcopía</a></li>
                                                                    <li><a href="#">Densitometría</a></li>
                                                                    <li><a href="#">Especialidades</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <ul class="mega-menu-item">
                                                                    <li><a href="#">Laboratorio</a></li>
                                                                    <li><a href="medicos-especialistas" style="color:#ef5834;">Médicos especialistas</a></li>
                                                                    <li><a href="#">Nutrición</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <ul class="mega-menu-item">
                                                                    <li><a href="#">Papanicolao</a></li>
                                                                    <li><a href="rayosx">Rayos X</a></li>
                                                                    <li><a href="#">Resonancia Magnética</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <ul class="mega-menu-item">
                                                                    <li><a href="#">Tomografía</a></li>
                                                                    <li><a href="#">Ultrasonido</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="menu-right-add">
                                                            <img src="assets/images/menu/01.webp" alt="">
                                                            <div class="absolute-image">
                                                                <img src="assets/images/menu/02.webp" alt="">
                                                                <div class="inner-content">
                                                                    <h3 class="title"> Reserva tu cita aquí</h3>
                                                                    <a href="#" class="rts-btn btn-primary">Agendar cita</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    
                                    <li class="main-nav"><a href="contacto">Contacto</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="header-right">
                            <div class="cart-button">
                                <i class="fa-light fa-cart-shopping"></i>
                            </div>
                            <a href="#" class="rts-btn btn-primary" style="background-color:#25d366!important;font-weight: 700;">Agendar cita </a>
                            <div class="menu-btn" id="menu-btn">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
                                    <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
                                    <rect width="20" height="2" fill="#1F1F25"></rect>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->
    <!-- header area end -->



    <!-- service details area start -->
    <div class="service-details rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 pr--40 pr_md--10 pr_sm--15">
                    <div class="service-details-left-wrapper">
                        <div class="thumbnail-large-service">
                            <img src="<?= $imagenUrl ?>" alt="Imagen del estudio">
                        </div>
                        <h3 class="title mt--35"><?= $nombre ?></h3>
                        <h2 style="color: #ef5834;">$<?= $precio ?></h2>
                        <p class="disc mb--30">
                            <?= $descripcion ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-rightsidebar-single">
                        <div class="doctor-title-table">
                            <div class="top">
                                <h5 class="title">Recomendaciones previas</h5>
                                <p class="disc">
                                    Antes de realizarse cualquier estudio de laboratorio, se recomienda acudir con una identificación oficial, llegar con unos minutos de anticipación y seguir las indicaciones específicas de su médico.
                                </p>
                                <a href="#" class="rts-btn btn-primary btn-border">Comprar ahora</a>
                                <br>
                                <a href="#" class="rts-btn btn-primary btn-border" style="border-color: white;border-style: solid;border-width: 1px;background-color: transparent!important;">Agregar al carrito</a>
                            </div>
                            <div class="bottom">
                                <h5 class="title">
                                    Disponibilidad
                                </h5>
                                <div class="single-table pt--0">
                                    <span>Lun - Vie</span>
                                    <span>8:00 - 20:00 hrs</span>
                                </div>
                                <div class="single-table">
                                    <span>Sáb y Dom</span>
                                    <span>8:00 - 14:00hrs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-rightsidebar-single">
                        <div class="thumbnail-image-right-cardio">
                            <img src="assets/images/14.png" alt="service" style="border-radius: 20px;">

                            <div class="inner">
                                <h2 class="title">Confia en<br>nuestros<br> expertos</h2>
                                <a href="#" class="rts-btn btn-primary btn-white">¿Dudas?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service details area end -->
    


   

    <!-- header area start -->
    <!-- rts footer area start -->
    <div class="rts-footer-area footer-bg pt--25 pt_sm--50 pb--25">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6" style="margin: auto 0px;">
                    <img src="assets/logo-blanco.svg" width="90%" style="margin-bottom: 20px;">
                </div>
                <div class="col-12 col-lg-5 col-md-6" style="color: white !important;margin: auto 0px;line-height: 25px;">
                    <h3 style="color: white !important;">¿Tienes alguna duda?</h3>
                    <i class="fa-brands fa-whatsapp"></i> <a href="https://wa.me/5564277997" style="text-decoration: underline;">5564277997</a>
                    <br><i class="fa-solid fa-phone"></i> <a href="tel:7121206232" style="text-decoration: underline;">71 2120 6232</a>
                    <br><i class="fa-solid fa-envelope"></i> <a href="mailto:comunicacionhumanismovivo@gmail.com" style="text-decoration: underline;">comunicacionhumanismovivo@gmail.com</a>
                    <br><i class="fa-solid fa-map-location"></i><strong> Circuito Vial Dr. Jorge Jiménez Cantú No. 171, Col. Las Mercedes. Atlacomulco, Edo. De México. CP. 50455</strong>
                </div>
                <div class="col-12 col-lg-3 col-md-6" style="margin: auto 0px;">
                    <h4 style="color: white!important;">No te pierdas ninguna novedad</h4>
                    <div class="social-area-tranaparent">
                        <ul>
                            <li><a href="https://www.facebook.com/profile.php?id=61568142511141"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/ud.humanismovivo/"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-area-inner">
                        <p>© 2025 Todos los derechos reservados | Unidad de Diagnóstico Humanismo Vivo A.C. | Aviso de privacidad | Diseñador y desarrollado por 3CLUE.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts footer area end -->
    <!-- header area end -->

    <!-- header style two -->
    <div id="side-bar" class="side-bar header-two">
        <button class="close-icon-menu"><i class="far fa-times"></i></button>
        <!-- mobile menu area start -->
        <div class="mobile-menu-main">
            <nav class="nav-main mainmenu-nav mt--30">
                <ul class="mainmenu metismenu" id="mobile-menu-active">
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="nosotros">Nosotros</a></li>
                    <li><a href="#">Farmacia</a></li>
                    <li><a href="contacto">Contacto</a></li>
                    <li class="has-droupdown">
                        <a href="#" class="main">Servicios</a>
                        <ul class="submenu mm-collapse">
                            <li><a href="#">Colposcopía</a></li>
                            <li><a href="#">Densitometría</a></li>
                            <li><a href="#">Especialidades</a></li>
                            <li><a href="#">Laboratorio</a></li>
                            <li><a href="medicos-especialistas" style="color:#ef5834;">Médicos especialistas</a></li>
                            <li><a href="#">Nutrición</a></li>
                            <li><a href="#">Papanicolao</a></li>
                            <li><a href="rayosx">Rayos X</a></li>
                            <li><a href="#">Resonancia Magnética</a></li>
                            <li><a href="#">Tomografía</a></li>
                            <li><a href="#">Ultrasonido</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </div>
        <!-- mobile menu area end -->
    </div>
    <!-- header style two End -->

    <div id="anywhere-home">
    </div>
    <!-- progress area start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>
    <!-- progress area end -->

    <script src="assets/js/plugins/jquery.js"></script>
    <script src="assets/js/plugins/jquery-ui.js"></script>
    <script src="assets/js/vendor/waw.js"></script>
    <script src="assets/js/plugins/swiper.js"></script>
    <script src="assets/js/plugins/metismenu.js"></script>
    <script src="assets/js/plugins/jarallax.js"></script>
    <script src="assets/js/plugins/smooth-scroll.js"></script>
    <script src="assets/js/plugins/magnifying-popup.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- main js here -->
    <script src="assets/js/main.js"></script>
</body>

</html>