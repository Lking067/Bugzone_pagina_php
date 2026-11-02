<?php
$tituloPagina = 'Celulares';
$pagina_actual = 'celulares';
require_once __DIR__ . '/includes/header.php';
?>

<style>
.celulares-container {
    width: min(1100px, 92%);
    margin: 45px auto;
    color: white;
}

.celulares-title {
    text-align: center;
    color: #00e5ff;
    font-family: 'Orbitron', sans-serif;
    font-size: clamp(38px, 6vw, 65px);
    margin-bottom: 45px;
    text-shadow: 0 0 18px rgba(0,229,255,.25);
}

.celulares-intro {
    text-align: center;
    line-height: 1.8;
    margin-bottom: 35px;
    color: #ddd;
}

.celulares-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 25px;
}

.celulares-column {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.celular-card {
    min-height: 105px;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    text-decoration: none;
    font-family: 'Orbitron', sans-serif;
    font-size: 19px;
    font-weight: bold;
    background: linear-gradient(110deg, #101010, #006b65);
    border-left: 4px solid #00e5ff;
    border-radius: 8px;
    transition: .25s;
}

.celular-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 0 20px rgba(0,229,255,.2);
    background: linear-gradient(110deg, #101010, #008f85);
}

.celulares-detalle {
    margin-top: 35px;
    padding: 25px;
    background: #151515;
    border: 1px solid #333;
    border-radius: 10px;
}

.celulares-detalle h2 {
    color: #00e5ff;
    margin-bottom: 15px;
}

.celulares-detalle p {
    line-height: 1.8;
    color: #ddd;
}

@media (max-width: 700px) {
    .celulares-grid {
        grid-template-columns: 1fr;
    }

    .celular-card {
        min-height: 80px;
        font-size: 17px;
    }
}
</style>

<section class="celulares-container">

    <h1 class="celulares-title">CELULARES</h1>

    <p class="celulares-intro">
        Información, recomendaciones y herramientas para conocer mejor
        tu teléfono y aprovechar su rendimiento.
    </p>

    <div class="celulares-grid">

        <div class="celulares-column">
            <a href="#modelos" class="celular-card">
                Modelos recomendados
            </a>

            <a href="#optimizadores" class="celular-card">
                Programas - optimizadores
            </a>

            <a href="#emuladores" class="celular-card">
                Emuladores - ROMs
            </a>
        </div>

        <div class="celulares-column">
            <a href="#comunidades" class="celular-card">
                Comunidades
            </a>

            <a href="#rendimiento" class="celular-card">
                ¿Lo corre tu teléfono?
            </a>
        </div>

    </div>

    <section id="modelos" class="celulares-detalle">
        <h2>Modelos recomendados</h2>
        <p>Antes de elegir un celular, compará el procesador, la memoria RAM, el almacenamiento, la batería, la pantalla y el soporte de actualizaciones. La mejor opción depende del uso que quieras darle.</p>
    </section>

    <section id="optimizadores" class="celulares-detalle">
        <h2>Programas y optimización</h2>
        <p>Mantené el sistema actualizado, desinstalá aplicaciones que no uses y revisá qué aplicaciones consumen batería y memoria. Evitá instalar optimizadores desconocidos que prometan mejoras milagrosas.</p>
    </section>

    <section id="emuladores" class="celulares-detalle">
        <h2>Emuladores y ROMs</h2>
        <p>Los emuladores permiten ejecutar software de otras plataformas compatibles. Usá aplicaciones de fuentes confiables y asegurate de contar con los derechos necesarios para utilizar los juegos y archivos correspondientes.</p>
    </section>

    <section id="comunidades" class="celulares-detalle">
        <h2>Comunidades</h2>
        <p>Podés compartir dudas, experiencias y recomendaciones sobre teléfonos, aplicaciones y configuraciones con otros usuarios.</p>
    </section>

    <section id="rendimiento" class="celulares-detalle">
        <h2>¿Lo corre tu teléfono?</h2>
        <p>Para evaluar si un juego funciona bien, compará los requisitos mínimos con el procesador, la GPU, la memoria RAM y el espacio disponible de tu celular. También influye la versión del sistema operativo.</p>
    </section>

</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
