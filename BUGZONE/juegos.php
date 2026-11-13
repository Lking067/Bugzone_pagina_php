<?php
$titulo_pagina = 'BUGZONE | Juegos';
$pagina_actual = 'juegos';
require_once __DIR__ . '/includes/header.php';
?>

<main class="games-container">
    <h1 class="games-title">Nuevos juegos</h1>
    <div class="news-list">
        <a href="noticia1.php" class="news-card">
            <img src="assets/fortnite.jpg" alt="Imagen de Fortnite">
            <div class="news-text">
                <h2>Fortnite Salva el Mundo</h2>
                <p>Salva el mundo de Fortnite pasará a ser gratuito a partir del 16 de abril y le damos la bienvenida a todavía más jugadores para que se unan a la lucha en PC, PlayStation, Xbox y Nintendo Switch.</p>
            </div>
        </a>
        <a href="noticia2.php" class="news-card">
            <img src="assets/csgo.jpg" alt="Imagen de CS:GO">
            <div class="news-text">
                <h2>Nuevo juego competitivo</h2>
                <p>Nuevas filtraciones muestran modos online, mejoras gráficas y nuevos mapas para el próximo lanzamiento competitivo.</p>
            </div>
        </a>
        <a href="noticia3.php" class="news-card">
            <img src="assets/valorant.jpg" alt="Imagen de Valorant">
            <div class="news-text">
                <h2>Actualización importante</h2>
                <p>Se anunció una gran actualización con nuevos personajes, armas y contenido exclusivo para jugadores.</p>
            </div>
        </a>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
