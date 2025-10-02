<?php
include 'config.php';

$categoria = $_GET['categoria'] ?? null;

if (!$categoria) {
    echo "<p>Categoría no especificada.</p>";
    exit;
}

$estudios = [];
$offset = null;

do {
    // Construir URL con filtro y offset si existe
    $url = "https://api.airtable.com/v0/" . AIRTABLE_BASE_ID . "/" . AIRTABLE_TABLE_NAME .
        "?filterByFormula=" . urlencode("{Categoría}='{$categoria}'");

    if ($offset) {
        $url .= "&offset=" . urlencode($offset);
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . AIRTABLE_TOKEN
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        echo "<p>Error al cargar los estudios. Código: $httpCode</p>";
        exit;
    }

    $data = json_decode($response, true);
    if (!$data || !isset($data['records'])) {
        echo "<p>Error al procesar los datos.</p>";
        exit;
    }

    $registros = $data['records'];

    // Acumular estudios
    $estudios = array_merge($estudios, $registros);

    // Verificar si hay más páginas
    $offset = $data['offset'] ?? null;

} while ($offset);
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.png">
    <title><?= htmlspecialchars($categoria) ?> | Unidad de Diagnostico Humanismo Vivo A.C.</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="assets/css/plugins/plugins.css">
    <link rel="stylesheet" href="assets/css/plugins/magnifying-popup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="theme-color" content="#e4a39d">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
</head>

<body>

    <!-- header area start -->
    <header class="header-one header--sticky">
        <div class="header-top-area">
            <div class="container-full-header">
                <div class="col-lg-12">
                    <div class="header-top">
                        <div class="left">
                            <div class="map-area">
                                <i class="fa-light fa-envelope"></i>
                                <a
                                    href="mailto:comunicacionhumanismovivo@gmail.com">comunicacionhumanismovivo@gmail.com</a>
                            </div>
                        </div>
                        <div class="right">
                            <div class="map-area">
                                <i class="fa-brands fa-whatsapp"></i><a href="https://wa.me/5564277997"
                                    style="margin-right: 10px;">5564277997</a>
                                <i class="fa-solid fa-phone"></i><a href="tel:7121206232">71 2120 6232</a>
                            </div>
                            <div class="social-area-tranaparent">
                                <span>Síguenos</span>
                                <ul>
                                    <li><a href="https://www.facebook.com/profile.php?id=61568142511141"><i
                                                class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/ud.humanismovivo/"><i
                                                class="fa-brands fa-instagram"></i></a></li>
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
                                    <li class="main-nav"><a href="farmacia">Farmacia</a></li>
                                    <li class="main-nav has-dropdown mega-menu"><a href="#">Servicios</a>
                                        <div class="rts-mega-menu with-add">
                                            <div class="wrapper">
                                                <div class="row g-0">
                                                    <div class="col-lg-9">
                                                        <div class="row pl--30 pt--30">
                                                            <div class="col-lg-3">
                                                                <ul class="mega-menu-item">
                                                                    <li><a
                                                                            href="categoria.php?categoria=Colposcopia">Colposcopía</a>
                                                                    </li>
                                                                    <li><a
                                                                            href="categoria.php?categoria=Densitomatria">Densitometría</a>
                                                                    </li>
                                                                    <li><a href="#">Especialidades</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <ul class="mega-menu-item">
                                                                    <li><a
                                                                            href="categoria.php?categoria=Laboratorio">Laboratorio</a>
                                                                    </li>
                                                                    <li><a href="medicos-especialistas"
                                                                            style="color:#ef5834;">Médicos
                                                                            especialistas</a></li>
                                                                    <li><a
                                                                            href="categoria.php?categoria=Nutrición">Nutrición</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <ul class="mega-menu-item">
                                                                    <li><a
                                                                            href="categoria.php?categoria=Papanicolaou">Papanicolaou</a>
                                                                    </li>
                                                                    <li><a href="categoria.php?categoria=Rayos X">Rayos
                                                                            X</a></li>
                                                                    <li><a
                                                                            href="categoria.php?categoria=Resonancia Magnetica">Resonancia
                                                                            Magnética</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <ul class="mega-menu-item">
                                                                    <li><a
                                                                            href="categoria.php?categoria=Tomografía Computarizada">Tomografía</a>
                                                                    </li>
                                                                    <li><a
                                                                            href="categoria.php?categoria=Ultrasonido">Ultrasonido</a>
                                                                    </li>
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
                                                                    <a href="#" class="rts-btn btn-primary">Agendar
                                                                        cita</a>
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
                            <div class="cart-button" id="cart-button">
                                <i class="fa-light fa-cart-shopping"></i>
                                <span id="cart-count" class="cart-count">0</span>
                            </div>
                            <div id="cart-preview" class="cart-preview">
                                <div class="cart-header">
                                    <h4>Tu carrito</h4>
                                    <button class="close-cart" id="close-cart">&times;</button>
                                </div>
                                <div id="cart-items" class="cart-items"></div>
                                <div class="cart-footer">
                                    <div class="d-flex justify-content-between mb-3">
                                        <span>Subtotal:</span>
                                        <strong id="cart-subtotal">$0</strong>
                                    </div>
                                    <a href="checkout.html" class="btn btn-primary w-100">Ir al pago</a>
                                </div>
                            </div>
                            <a href="https://calendar.app.google/gMvFRz9Akj5dPw2p9" class="rts-btn btn-primary"
                                style="background-color:#25d366!important;font-weight: 700;">Agendar cita </a>
                            <div class="menu-btn" id="menu-btn">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
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

    <!-- service details area start -->
    <div class="service-details rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 pr--40 pr_md--10 pr_sm--15">
                    <div class="service-details-left-wrapper">
                        <div class="thumbnail-large-service">
                            <h1 class="titulo-categoria"><?= htmlspecialchars($categoria) ?></h1>
                            <?php if (empty($estudios)): ?>
                                <p>No hay estudios disponibles en esta categoría.</p>
                            <?php else: ?>

                                <!-- Buscador y selector de vista -->
                                <div class="herramientas-categoria">
                                    <input type="text" id="busqueda" placeholder="Buscar estudio..."
                                        class="form-control mb-3">
                                    <div class="vista-selector mb-3">
                                        <!-- Botón de vista mosaico -->
                                        <button id="btn-mosaico" class="btn-icon" title="Vista en mosaico">
                                            <!-- Tu SVG de cuadrícula -->
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.3327 6.01341V2.98675C16.3327 2.04675 15.906 1.66675 14.846 1.66675H12.1527C11.0927 1.66675 10.666 2.04675 10.666 2.98675V6.00675C10.666 6.95341 11.0927 7.32675 12.1527 7.32675H14.846C15.906 7.33341 16.3327 6.95341 16.3327 6.01341Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M16.3327 15.18V12.4867C16.3327 11.4267 15.906 11 14.846 11H12.1527C11.0927 11 10.666 11.4267 10.666 12.4867V15.18C10.666 16.24 11.0927 16.6667 12.1527 16.6667H14.846C15.906 16.6667 16.3327 16.24 16.3327 15.18Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M7.33268 6.01341V2.98675C7.33268 2.04675 6.90602 1.66675 5.84602 1.66675H3.15268C2.09268 1.66675 1.66602 2.04675 1.66602 2.98675V6.00675C1.66602 6.95341 2.09268 7.32675 3.15268 7.32675H5.84602C6.90602 7.33341 7.33268 6.95341 7.33268 6.01341Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M7.33268 15.18V12.4867C7.33268 11.4267 6.90602 11 5.84602 11H3.15268C2.09268 11 1.66602 11.4267 1.66602 12.4867V15.18C1.66602 16.24 2.09268 16.6667 3.15268 16.6667H5.84602C6.90602 16.6667 7.33268 16.24 7.33268 15.18Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>

                                        <!-- Botón de vista lista -->
                                        <button id="btn-lista" class="btn-icon" title="Vista en lista">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="4" width="12" height="2" fill="currentColor" />
                                                <rect x="3" y="8" width="12" height="2" fill="currentColor" />
                                                <rect x="3" y="12" width="12" height="2" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Contenedor de estudios -->
                                <div id="contenedor-estudios" class="grid-estudios mosaico"></div>
                                <div id="loader" style="text-align:center; margin:20px; display:none;">Cargando más
                                    estudios...</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Columna derecha: recomendaciones y extras -->
                <div class="col-lg-3">
                    <div class="single-rightsidebar-single">
                        <div class="doctor-title-table">
                            <div class="top">
                                <h5 class="title">Recomendaciones previas</h5>
                                <p class="disc">
                                    Antes de realizarse cualquier estudio de laboratorio, se recomienda acudir con una
                                    identificación oficial, llegar con unos minutos de anticipación y seguir las
                                    indicaciones específicas de su médico.
                                </p>
                                <a href="#" class="rts-btn btn-primary btn-border"
                                    style="border-color: white;border-style: solid;border-width: 1px;background-color: transparent!important;">Comprar
                                    ahora</a><br>
                                <a href="#" class="rts-btn btn-primary btn-border"
                                    style="border-color: white;border-style: solid;border-width: 1px;background-color: transparent!important;">Agregar
                                    al carrito</a>
                            </div>
                            <div class="bottom">
                                <h5 class="title">Disponibilidad</h5>
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
                                <h2 class="title">Confía en<br>nuestros<br> expertos</h2>
                                <a href="#" class="rts-btn btn-primary btn-white">¿Dudas?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service details area end -->

    <!-- rts footer area start -->
    <div class="rts-footer-area footer-bg pt--25 pt_sm--50 pb--25">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6" style="margin: auto 0px;">
                    <img src="assets/logo-blanco.svg" width="90%" style="margin-bottom: 20px;">
                </div>
                <div class="col-12 col-lg-5 col-md-6"
                    style="color: white !important;margin: auto 0px;line-height: 25px;">
                    <h3 style="color: white !important;">¿Tienes alguna duda?</h3>
                    <i class="fa-brands fa-whatsapp"></i> <a href="https://wa.me/5564277997"
                        style="text-decoration: underline;">5564277997</a>
                    <br><i class="fa-solid fa-phone"></i> <a href="tel:7121206232"
                        style="text-decoration: underline;">71 2120 6232</a>
                    <br><i class="fa-solid fa-envelope"></i> <a href="mailto:comunicacionhumanismovivo@gmail.com"
                        style="text-decoration: underline;">comunicacionhumanismovivo@gmail.com</a>
                    <br><i class="fa-solid fa-map-location"></i><strong><a
                            href="https://maps.app.goo.gl/7PW9V3eaHQii3sRD8" style="text-decoration: underline;">
                            Circuito Vial Dr. Jorge Jiménez Cantú No. 171, Col. Las Mercedes. Atlacomulco, Edo. De
                            México. CP. 50455</a></strong>
                </div>
                <div class="col-12 col-lg-3 col-md-6" style="margin: auto 0px;">
                    <h4 style="color: white!important;">No te pierdas ninguna novedad</h4>
                    <div class="social-area-tranaparent">
                        <ul>
                            <li><a href="https://www.facebook.com/profile.php?id=61568142511141"><i
                                        class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/ud.humanismovivo/"><i
                                        class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="https://maps.app.goo.gl/7PW9V3eaHQii3sRD8"><i class="fa fa-map-marker"></i></a>
                            </li>
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
                        <p>© 2025 Todos los derechos reservados | Unidad de Diagnóstico Humanismo Vivo A.C. | Aviso de
                            privacidad | Diseñador y desarrollado por 3CLUE.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts footer area end -->

    <!-- header style two -->
    <div id="side-bar" class="side-bar header-two">
        <button class="close-icon-menu"><i class="far fa-times"></i></button>
        <!-- mobile menu area start -->
        <div class="mobile-menu-main">
            <nav class="nav-main mainmenu-nav mt--30">
                <ul class="mainmenu metismenu" id="mobile-menu-active">
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="nosotros">Nosotros</a></li>
                    <li><a href="farmacia">Farmacia</a></li>
                    <li><a href="contacto">Contacto</a></li>
                    <li class="has-droupdown">
                        <a href="#" class="main">Servicios</a>
                        <ul class="submenu mm-collapse">
                            <li><a href="categoria.php?categoria=Colposcopia">Colposcopía</a></li>
                            <li><a href="categoria.php?categoria=Densitomatria">Densitometría</a></li>
                            <li><a href="#">Especialidades</a></li>
                            <li><a href="categoria.php?categoria=Laboratorio">Laboratorio</a></li>
                            <li><a href="medicos-especialistas" style="color:#ef5834;">Médicos especialistas</a></li>
                            <li><a href="categoria.php?categoria=Nutrición">Nutrición</a></li>
                            <li><a href="categoria.php?categoria=Papanicolaou">Papanicolaou</a></li>
                            <li><a href="categoria.php?categoria=Rayos X">Rayos X</a></li>
                            <li><a href="categoria.php?categoria=Resonancia Magnetica">Resonancia Magnética</a></li>
                            <li><a href="categoria.php?categoria=Tomografía Computarizada">Tomografía</a></li>
                            <li><a href="categoria.php?categoria=Ultrasonido">Ultrasonido</a></li>
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
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
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

    <!-- Chatbot -->
    <div class="chatbot-wrapper">
        <!-- Botón flotante -->
        <button id="chatbot-toggle">
            <img src="assets/Vivi_Humanisno.svg" alt="Vivi_HumanismoVivo" />
        </button>

        <!-- Ventana del chatbot -->
        <div id="chatbot" class="">
            <div id="chatbot-header">👩‍⚕️Vivi⚕️</div>
            <div id="chatbot-messages"></div>
            <div id="chatbot-input">
                <input type="text" id="user-input" placeholder="Escribe un mensaje..." />
                <button id="send-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>


    <!-- Sistema de carga con scroll infinito -->
    <script>
        let offset = null;
        let categoria = "<?= htmlspecialchars($categoria) ?>";
        let cargando = false;
        let finalizado = false;
        let busqueda = '';
        let estudiosIniciales = <?= json_encode($estudios) ?>;
        let estudiosActuales = [];

        // Cargar estudios iniciales
        function cargarEstudiosIniciales() {
            const contenedor = document.getElementById('contenedor-estudios');
            contenedor.innerHTML = '';

            estudiosIniciales.sort((a, b) => {
                const nombreA = (a.fields['Nombre del estudio'] || '').toLowerCase();
                const nombreB = (b.fields['Nombre del estudio'] || '').toLowerCase();
                return nombreA.localeCompare(nombreB);
            });


            estudiosIniciales.forEach(registro => {
                const f = registro.fields;
                const nombre = f['Nombre del estudio'] || 'Sin título';
                const descripcionRaw = f['Descripción'] || '';
                const descripcion = Array.isArray(descripcionRaw) ? descripcionRaw.join(" ") : descripcionRaw;
                const precio = f['Precio'] || 'No disponible';
                const slug = f['Slug'] || '';

                const tarjeta = document.createElement('div');
                tarjeta.className = 'tarjeta-estudio';
                tarjeta.innerHTML = `
                <h3 class="nombre-estudio">${nombre}</h3>
                <p class="descripcion-estudio">${descripcion}</p>
                <p class="precio-estudio">$${precio}</p>
                <div class="tarjeta-buttons">
                    <a href="estudio.php?slug=${encodeURIComponent(slug)}" class="btn-ver">Ver más</a>
                    <button class="btn-add-cart" onclick="agregarAlCarrito('${nombre}', ${precio})">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            `;
                contenedor.appendChild(tarjeta);
            });

            estudiosActuales = [...estudiosIniciales];
        }

        // Función de búsqueda
        function filtrarEstudios() {
            const query = busqueda.toLowerCase();
            const tarjetas = document.querySelectorAll('.tarjeta-estudio');

            if (query === '') {
                tarjetas.forEach(tarjeta => tarjeta.style.display = 'block');
                return;
            }

            tarjetas.forEach(tarjeta => {
                const nombre = tarjeta.querySelector('.nombre-estudio')?.textContent.toLowerCase() || '';
                const descripcion = tarjeta.querySelector('.descripcion-estudio')?.textContent.toLowerCase() || '';
                const coincide = nombre.includes(query) || descripcion.includes(query);
                tarjeta.style.display = coincide ? 'block' : 'none';
            });
        }

        // Eventos de botones de vista
        document.getElementById('btn-mosaico').addEventListener('click', () => {
            const grid = document.querySelector('.grid-estudios');
            grid.classList.add('mosaico');
            grid.classList.remove('lista');

            // Activar botón
            document.getElementById('btn-mosaico').classList.add('active');
            document.getElementById('btn-lista').classList.remove('active');
        });

        document.getElementById('btn-lista').addEventListener('click', () => {
            const grid = document.querySelector('.grid-estudios');
            grid.classList.add('lista');
            grid.classList.remove('mosaico');

            // Activar botón
            document.getElementById('btn-lista').classList.add('active');
            document.getElementById('btn-mosaico').classList.remove('active');
        });

        // Búsqueda
        document.getElementById('busqueda').addEventListener('input', function () {
            busqueda = this.value;
            filtrarEstudios();
        });

        // Funciones del carrito
        function obtenerCarrito() {
            return JSON.parse(localStorage.getItem('carritoEstudios') || '[]');
        }

        function guardarCarrito(carrito) {
            localStorage.setItem('carritoEstudios', JSON.stringify(carrito));
            actualizarContadorCarrito();
        }

        function agregarAlCarrito(nombre, precio) {
            let carrito = obtenerCarrito();
            const existente = carrito.find(e => e.nombre === nombre);
            if (existente) {
                existente.cantidad += 1;
            } else {
                carrito.push({ nombre, precio: parseFloat(precio), cantidad: 1 });
            }
            guardarCarrito(carrito);
            mostrarNotificacion('Producto agregado al carrito');
        }

        function actualizarContadorCarrito() {
            const carrito = obtenerCarrito();
            const total = carrito.reduce((sum, item) => sum + item.cantidad, 0);
            document.getElementById('cart-count').textContent = total;
            document.getElementById('cart-count').style.display = total > 0 ? 'inline' : 'none';
        }

        function actualizarCantidad(nombre, delta) {
            let carrito = obtenerCarrito();
            const item = carrito.find(e => e.nombre === nombre);
            if (item) {
                item.cantidad += delta;
                if (item.cantidad <= 0) {
                    carrito = carrito.filter(e => e.nombre !== nombre);
                }
            }
            guardarCarrito(carrito);
            renderizarCarrito();
        }

        function eliminarDelCarrito(nombre) {
            let carrito = obtenerCarrito();
            carrito = carrito.filter(e => e.nombre !== nombre);
            guardarCarrito(carrito);
            renderizarCarrito();
        }

        function renderizarCarrito() {
            const carrito = obtenerCarrito();
            const cartItems = document.getElementById('cart-items');
            const cartSubtotal = document.getElementById('cart-subtotal');

            cartItems.innerHTML = '';
            let subtotal = 0;

            if (carrito.length === 0) {
                cartItems.innerHTML = '<p class="empty-cart">No hay productos en el carrito</p>';
                cartSubtotal.textContent = '$0';
            } else {
                carrito.forEach(item => {
                    subtotal += item.precio * item.cantidad;
                    const itemDiv = document.createElement('div');
                    itemDiv.className = 'cart-item';
                    itemDiv.innerHTML = `
            <div class="cart-item-info">
              <h5>${item.nombre}</h5>
              <p class="cart-item-price">$${item.precio.toLocaleString('es-MX')}</p>
            </div>
            <div class="cart-item-controls">
              <button class="btn-quantity" onclick="actualizarCantidad('${item.nombre}', -1)">-</button>
              <span class="quantity">${item.cantidad}</span>
              <button class="btn-quantity" onclick="actualizarCantidad('${item.nombre}', 1)">+</button>
              <button class="btn-remove" onclick="eliminarDelCarrito('${item.nombre}')">
                <i class="fa-solid fa-trash"></i>
              </button>
            </div>
          `;
                    cartItems.appendChild(itemDiv);
                });
                cartSubtotal.textContent = `$${subtotal.toLocaleString('es-MX')}`;
            }
        }

        function mostrarNotificacion(mensaje) {
            const notif = document.createElement('div');
            notif.className = 'cart-notification';
            notif.textContent = mensaje;
            document.body.appendChild(notif);

            setTimeout(() => {
                notif.classList.add('show');
            }, 100);

            setTimeout(() => {
                notif.classList.remove('show');
                setTimeout(() => document.body.removeChild(notif), 300);
            }, 2000);
        }

        // Inicializar
        document.addEventListener('DOMContentLoaded', function () {
            cargarEstudiosIniciales();
            // Activar vista mosaico por defecto
            document.getElementById('btn-mosaico').classList.add('active');

            // Inicializar carrito
            actualizarContadorCarrito();

            // Toggle carrito
            document.getElementById('cart-button').addEventListener('click', function (e) {
                e.stopPropagation();
                const cartPreview = document.getElementById('cart-preview');
                cartPreview.classList.toggle('show');
                renderizarCarrito();
            });

            document.getElementById('cart-preview').addEventListener('click', function (e) {
                e.stopPropagation();
            });

            // Cerrar carrito
            document.getElementById('close-cart').addEventListener('click', function () {
                document.getElementById('cart-preview').classList.remove('show');
            });

            // Cerrar carrito al hacer click fuera
            document.addEventListener('click', function (e) {
                const cartPreview = document.getElementById('cart-preview');
                const cartButton = document.getElementById('cart-button');
                if (!cartPreview.contains(e.target) && !cartButton.contains(e.target)) {
                    cartPreview.classList.remove('show');
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
        // Elementos del DOM
        const chatbotToggle = document.getElementById('chatbot-toggle');
        const chatbot = document.getElementById('chatbot');
        const messages = document.getElementById('chatbot-messages');
        const sendBtn = document.getElementById('send-btn');
        const userInput = document.getElementById('user-input');

        // Historial de conversación
        const conversationHistory = [];
        let chatbotOpened = false;

        // Función para agregar mensajes al chat
        function addMessage(text, sender) {
            const msg = document.createElement('div');
            msg.classList.add('message', sender);
            msg.innerHTML = sender === "bot" ? marked.parse(text) : text;
            messages.appendChild(msg);
            messages.scrollTop = messages.scrollHeight;
            return msg;
        }

        // Mostrar el chatbot al hacer clic
        chatbotToggle.addEventListener('click', () => {
            chatbot.classList.toggle('active'); // activa clase que muestra el chatbot
            if (!chatbotOpened) {
                const saludo = "¡Hola! Bienvenido a Unidad de Diagnóstico Humanismo Vivo A.C.. Mi nombre es Vivi, Estoy aquí para ayudarte a agendar tu estudio o resolver tus dudas. ¿En qué te puedo ayudar hoy?";
                addMessage(saludo, "bot");
                conversationHistory.push({ role: "assistant", content: saludo });
                chatbotOpened = true;
            }
        });

        // Enviar mensaje al backend de Vivi
        async function sendMessageToVivi_HumanismoVivo(message) {
            conversationHistory.push({ role: "user", content: message });

            try {
                const response = await fetch("https://humanismo-vivo.vercel.app/api/chat", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        history: conversationHistory
                    })
                });

                if (!response.ok) throw new Error("Respuesta no válida del servidor");

                const data = await response.json();
                const reply = data.response || "Lo siento, no recibí respuesta.";
                conversationHistory.push({ role: "assistant", content: reply });
                return reply;

            } catch (error) {
                console.error("Error al conectar con la API:", error);
                return "⚠️ Hubo un problema al conectar con el asistente de Vivi.";
            }
        }

        // Evento al hacer clic en "Enviar"
        sendBtn.addEventListener('click', async () => {
            const text = userInput.value.trim();
            if (text) {
                addMessage(text, 'user');
                userInput.value = "";

                const typingMsg = addMessage("Vivi está escribiendo...", "bot");
                await new Promise(resolve => setTimeout(resolve, 600));

                const reply = await sendMessageToVivi_HumanismoVivo(text);
                messages.removeChild(typingMsg);
                addMessage(reply, "bot");
            }
        });

        // Enviar con Enter
        userInput.addEventListener('keypress', (e) => {
            if (e.key === "Enter") sendBtn.click();
        });
    </script>

</body>

</html>