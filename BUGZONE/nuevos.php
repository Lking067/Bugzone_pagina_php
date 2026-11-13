<?php
$titulo_pagina = 'BUGZONE | Novedades';
$pagina_actual = 'nuevos';
require_once __DIR__ . '/includes/header.php';
?>

<main>
    <h1 class="titulo">EXPLORA SERVIDORES FOROS Y JUEGOS</h1>

    <div class="buscador">
        <label for="busqueda">Buscar contenido:</label>
        <input type="text" id="busqueda" placeholder="Buscar...">
        <button type="button" onclick="buscar()">Buscar</button>
    </div>

    <h2 class="subtitulo">Noticias:</h2>
    <div class="noticias">
        <div class="card">
            <img src="img/noticia1.jpg" alt="Imagen de la noticia 1">
            <p>Noticia 1</p>
        </div>
        <div class="card">
            <img src="img/noticia2.jpg" alt="Imagen de la noticia 2">
            <p>Noticia 2</p>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
