<?php
$tituloPagina = 'Ayuda';
$pagina_actual = 'ayuda';
require_once __DIR__ . '/includes/header.php';
?>

<style>
.ayuda-container {
    width: min(1100px, 92%);
    margin: 45px auto;
    color: white;
}

.ayuda-titulo {
    text-align: center;
    color: #00ffbf;
    font-family: 'Orbitron', sans-serif;
    font-size: clamp(38px, 6vw, 60px);
    margin-bottom: 20px;
    letter-spacing: 2px;
}

.ayuda-descripcion {
    text-align: center;
    color: #ddd;
    line-height: 1.8;
    margin-bottom: 40px;
}

.ayuda-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 25px;
}

.ayuda-box {
    min-height: 100px;
    padding: 20px;
    background: linear-gradient(90deg, #000, #197e60);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    font-size: 22px;
    font-weight: bold;
    border: 0;
    border-left: 4px solid #00ffbf;
    border-radius: 8px;
    cursor: pointer;
    transition: .25s;
}

.ayuda-box:hover,
.ayuda-box[aria-expanded="true"] {
    transform: translateY(-3px);
    box-shadow: 0 0 18px rgba(0,255,191,.18);
}

.ayuda-respuesta {
    display: none;
    margin-top: 12px;
    padding: 20px;
    background: rgba(0,0,0,.6);
    border: 1px solid #176e58;
    border-radius: 8px;
    line-height: 1.8;
    color: #eee;
}

.ayuda-respuesta.visible {
    display: block;
}

.ayuda-contacto {
    margin-top: 35px;
    padding: 25px;
    background: #101010;
    border: 1px solid #176e58;
    border-radius: 10px;
    text-align: center;
}

.ayuda-contacto h2 {
    color: #00ffbf;
    margin-bottom: 12px;
}

.ayuda-contacto p {
    line-height: 1.8;
}

.ayuda-contacto a {
    display: inline-block;
    margin-top: 15px;
    padding: 12px 18px;
    background: #00ffbf;
    color: #00130e;
    font-weight: bold;
    text-decoration: none;
    border-radius: 5px;
}

@media (max-width: 700px) {
    .ayuda-grid {
        grid-template-columns: 1fr;
    }

    .ayuda-box {
        font-size: 19px;
    }
}
</style>

<section class="ayuda-container">

    <h1 class="ayuda-titulo">AYUDA</h1>

    <p class="ayuda-descripcion">
        En esta sección encontrarás información para resolver dudas,
        comunicar problemas y conocer las condiciones de uso de BUGZONE.
    </p>

    <div class="ayuda-grid">

        <div>
            <button class="ayuda-box" type="button"
                aria-expanded="false"
                aria-controls="respuestaProblema"
                onclick="alternarAyuda('respuestaProblema', this)">
                ¿Encontraste un problema?
            </button>

            <div id="respuestaProblema" class="ayuda-respuesta">
                Si una página no carga o un enlace no funciona, intentá
                actualizarla y verificar tu conexión. Si el problema continúa,
                podés comunicarlo desde la sección Contacto.
            </div>
        </div>

        <div>
            <button class="ayuda-box" type="button"
                aria-expanded="false"
                aria-controls="respuestaIdeas"
                onclick="alternarAyuda('respuestaIdeas', this)">
                Ideas y sugerencias
            </button>

            <div id="respuestaIdeas" class="ayuda-respuesta">
                Podés proponer nuevas secciones, guías, juegos o herramientas
                que te gustaría encontrar en BUGZONE. Las sugerencias ayudan
                a mejorar el contenido del sitio.
            </div>
        </div>

        <div>
            <button class="ayuda-box" type="button"
                aria-expanded="false"
                aria-controls="respuestaSoporte"
                onclick="alternarAyuda('respuestaSoporte', this)">
                Soporte de la página
            </button>

            <div id="respuestaSoporte" class="ayuda-respuesta">
                Para consultar sobre el funcionamiento del sitio, ingresá a
                Contacto y utilizá los medios de comunicación disponibles.
                Las redes sociales de ejemplo deben reemplazarse por las
                cuentas oficiales de BUGZONE.
            </div>
        </div>

        <div>
            <button class="ayuda-box" type="button"
                aria-expanded="false"
                aria-controls="respuestaTerminos"
                onclick="alternarAyuda('respuestaTerminos', this)">
                Términos y condiciones
            </button>

            <div id="respuestaTerminos" class="ayuda-respuesta">
                Utilizá el sitio de forma responsable, respetá los derechos
                de autor y evitá compartir información personal o contenido
                dañino. Antes de publicar reglas definitivas, revisá y adaptá
                estas condiciones a las necesidades reales del proyecto.
            </div>
        </div>

    </div>

    <section class="ayuda-contacto">
        <h2>¿Necesitás más ayuda?</h2>
        <p>Visitá la página de contacto para encontrar los enlaces de las redes sociales de BUGZONE.</p>
        <a href="contacto.php">Ir a Contacto</a>
    </section>

</section>

<script>
function alternarAyuda(id, boton) {
    const respuesta = document.getElementById(id);
    const estaVisible = respuesta.classList.toggle('visible');

    boton.setAttribute('aria-expanded', String(estaVisible));
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
