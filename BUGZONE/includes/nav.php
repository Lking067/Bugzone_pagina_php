<header class="navbar">
    <a class="logo" href="index.php" aria-label="BUGZONE - Inicio">BUGZONE</a>

    <nav class="nav-links" aria-label="Navegación principal">
        <a class="<?= $pagina_actual === 'inicio' ? 'active' : '' ?>" href="index.php">Inicio</a>
        <a class="<?= $pagina_actual === 'juegos' ? 'active' : '' ?>" href="juegos.php">Juegos</a>
        <a class="<?= $pagina_actual === 'ayuda' ? 'active' : '' ?>" href="ayuda.php">Ayuda</a>
        <a class="<?= $pagina_actual === 'contacto' ? 'active' : '' ?>" href="contacto.php">Contacto</a>
        <a href="index.php#opinionBox" onclick="return abrirOpinionDesdeMenu(event)">Danos tu opinión</a>
    </nav>

    <button type="button" class="menu-btn" id="botonMenu" onclick="toggleMenu()"
            aria-label="Abrir menú lateral" aria-controls="sideMenu" aria-expanded="false">☰</button>
</header>

<div id="menuOverlay" class="menu-overlay" onclick="cerrarMenu()"></div>
<aside id="sideMenu" class="side-menu" aria-label="Menú lateral de navegación" aria-hidden="true">
    <div class="menu-header">
        <div class="menu-icon">☰</div>
        <div class="menu-title">Explorar</div>
        <button type="button" class="menu-close" onclick="cerrarMenu()" aria-label="Cerrar menú">×</button>
    </div>
    <nav class="side-menu-links" aria-label="Todas las secciones">
        <a class="pc <?= $pagina_actual === 'hardware' ? 'active' : '' ?>" href="hardware.php">PC - Hardware y Software</a>
        <a class="juegos <?= in_array($pagina_actual, ['juegos', 'nuevos'], true) ? 'active' : '' ?>" href="juegos.php">Juegos y recomendaciones</a>
        <a class="guias <?= $pagina_actual === 'guias' ? 'active' : '' ?>" href="guias.php">Guías - Foros de ayuda</a>
        <a class="celulares <?= $pagina_actual === 'celulares' ? 'active' : '' ?>" href="celulares.php">Celulares - Programas</a>
        <a class="servidores <?= $pagina_actual === 'servidores' ? 'active' : '' ?>" href="servidores.php">Servidores públicos</a>
        <a class="noticias <?= $pagina_actual === 'noticias' ? 'active' : '' ?>" href="noticias.php">Noticias - Novedades</a>
        <a class="curso <?= $pagina_actual === 'curso' ? 'active' : '' ?>" href="curso.php">Curso e información</a>
        <a class="ayuda <?= $pagina_actual === 'ayuda' ? 'active' : '' ?>" href="ayuda.php">Ayuda</a>
        <a class="contacto <?= $pagina_actual === 'contacto' ? 'active' : '' ?>" href="contacto.php">Contacto</a>
    </nav>
</aside>
