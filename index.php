<?php
$titulo_pagina = 'BUGZONE | Inicio';
$pagina_actual = 'inicio';
require_once __DIR__ . '/includes/header.php';
?>

<main>
    <h1 class="titulo">EXPLORA SERVIDORES FOROS Y JUEGOS</h1>

    <div class="buscador">
        <div class="lupa" aria-label="Buscar">🔍</div>
        <label for="busqueda" hidden>Buscar contenido</label>
        <input id="busqueda" type="text" aria-label="Buscar contenido" placeholder="Buscar...">
        <button type="button" onclick="buscar()">Buscar</button>
    </div>

    <div class="video-box">
        <video autoplay muted loop playsinline>
            <source src="videos/video.mp4" type="video/mp4">
            Tu navegador no soporta videos HTML5.
        </video>
    </div>

    <h2 class="subtitulo">Noticias:</h2>

    <div class="noticias">
        <div class="card">
            <img src="img/noticia1.jpg" alt="Imagen relacionada con noticia de Half-Life 3">
            <p>¿Half-Life 3 podría anunciarse oficialmente?</p>
        </div>
        <div class="card">
            <img src="img/noticia2.jpg" alt="Imagen relacionada con noticia de Epic Games">
            <p>En marzo de 2026, Epic Games anunció el despido de más de 1000 empleados, aproximadamente el 20% de su plantilla, debido a que sus gastos superaban los ingresos.</p>
        </div>
    </div>
</main>

<!-- Formulario original de opinión conservado -->
<div id="opinionBox" class="opinion-box">
    <h2>Danos tu opinión</h2>

    <form action="registrar.php" method="post" id="formOpinion" novalidate>
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo">
        <span id="errorCorreo" class="mensaje-error"></span>

        <fieldset>
            <legend>¿Te gustó la página?</legend>
            <label><input type="radio" name="gusto" value="excelente" required> Excelente</label><br>
            <label><input type="radio" name="gusto" value="muy buena"> Muy buena</label><br>
            <label><input type="radio" name="gusto" value="buena" onclick="mostrar('sugerencia1')"> Buena</label><br>
            <label><input type="radio" name="gusto" value="mala" onclick="mostrar('sugerencia1')"> Mala</label><br>
            <label><input type="radio" name="gusto" value="muy mala" onclick="mostrar('sugerencia1')"> Muy mala</label>
            <div id="sugerencia1" class="oculto">
                <label for="sugerencia">Envíanos tu sugerencia para mejorar la página:</label>
                <textarea id="sugerencia" name="sugerencia"></textarea>
            </div>
        </fieldset>

        <fieldset>
            <legend>¿Qué te parece el estilo de la página?</legend>
            <label><input type="radio" name="estilo" value="excelente" required> Excelente</label><br>
            <label><input type="radio" name="estilo" value="muy buena"> Muy buena</label><br>
            <label><input type="radio" name="estilo" value="buena" onclick="mostrar('sugerencia2')"> Buena</label><br>
            <label><input type="radio" name="estilo" value="mala" onclick="mostrar('sugerencia2')"> Mala</label><br>
            <label><input type="radio" name="estilo" value="muy mala" onclick="mostrar('sugerencia2')"> Muy mala</label>
            <div id="sugerencia2" class="oculto">
                <label for="estilo_sugerencia">Explícanos qué mejorarías del estilo:</label>
                <textarea id="estilo_sugerencia" name="estilo_sugerencia"></textarea>
            </div>
        </fieldset>

        <label for="juegos">¿Qué otros juegos debemos agregar?</label>
        <textarea id="juegos" name="juegos"></textarea>
        <span id="errorJuegos" class="mensaje-error"></span>

        <fieldset>
            <legend>¿Nos recomendarías?</legend>
            <label><input type="radio" name="recomendar" value="si" required> Sí</label><br>
            <label><input type="radio" name="recomendar" value="no" onclick="mostrar('porqueNo')"> No</label>
            <div id="porqueNo" class="oculto">
                <label for="no_recomendar">Explícanos por qué no:</label>
                <textarea id="no_recomendar" name="no_recomendar"></textarea>
            </div>
        </fieldset>

        <fieldset>
            <legend>¿Qué te parece la accesibilidad?</legend>
            <label><input type="radio" name="accesibilidad" value="muy buena" required> Muy buena</label><br>
            <label><input type="radio" name="accesibilidad" value="buena"> Buena</label><br>
            <label><input type="radio" name="accesibilidad" value="mala" onclick="mostrar('accesoMalo')"> Mala</label><br>
            <label><input type="radio" name="accesibilidad" value="muy mala" onclick="mostrar('accesoMalo')"> Muy mala</label>
            <div id="accesoMalo" class="oculto">
                <label for="acceso_explicacion">Explícanos por qué la accesibilidad es mala:</label>
                <textarea id="acceso_explicacion" name="acceso_explicacion"></textarea>
            </div>
        </fieldset>

        <button type="submit">Enviar cuestionario</button>
        <button type="reset">Borrar</button>
        <button type="button" onclick="abrirOpinion()">Cerrar</button>
    </form>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
