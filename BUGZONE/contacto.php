<?php
$tituloPagina = 'Contacto';
$pagina_actual = 'contacto';
require_once __DIR__ . '/includes/header.php';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
.contacto-container {
    max-width: 1400px;
    margin: auto;
    padding: 35px 20px;
    color: #00ffcc;
}

.contacto-container .top-bar {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
}

.contacto-container .quienes-btn {
    background: linear-gradient(to right, #7a00ff, #2b2b2b);
    border: none;
    padding: 15px 24px;
    color: white;
    font-size: 17px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 6px;
}

.contacto-container .titulo-contacto {
    text-align: center;
    margin: 20px 0 45px;
    font-family: 'Orbitron', sans-serif;
    font-size: clamp(40px, 7vw, 75px);
    color: #28ffd0;
    text-shadow: 0 0 20px rgba(0,255,200,.35);
}

.redes-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 25px;
}

.social-card {
    min-height: 85px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    padding: 20px 25px;
    font-size: 23px;
    font-weight: bold;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    transition: .25s;
}

.social-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 0 20px rgba(255,255,255,.15);
}

.social-card i {
    font-size: 35px;
}

.facebook { background: linear-gradient(to right, #1c1c1c, #005eff); }
.instagram { background: linear-gradient(to right, #7a00cc, #6d2a00); }
.whatsapp { background: linear-gradient(to right, #003300, #11cc44); }
.youtube { background: linear-gradient(to right, #1a1a1a, #ff0000); }
.discord { background: linear-gradient(to right, #202020, #1d1dff); }
.telegram { background: linear-gradient(to right, #004b57, #0088cc); }

.extra-section {
    display: none;
    margin-top: 55px;
}

.extra-section.active {
    display: block;
}

.info-card {
    margin-bottom: 28px;
    padding: 28px;
    border-radius: 15px;
    border: 1px solid rgba(255,255,255,.15);
    color: white;
}

.info-card h2 {
    margin: 22px 0 12px;
    color: #00ffcc;
}

.info-card h3 {
    margin: 18px 0 8px;
    color: #ffe600;
}

.info-card p,
.info-card li {
    font-size: 17px;
    line-height: 1.8;
}

.info-card ul {
    padding-left: 25px;
}

.card-quienes { background: linear-gradient(135deg, #002f3d, #0075a8); }
.card-curso { background: linear-gradient(135deg, #2e003d, #7200b8); }
.card-blog { background: linear-gradient(135deg, #3d1b00, #a84000); }
.card-cv { background: linear-gradient(135deg, #003d24, #008b4b); }
.card-faq { background: linear-gradient(135deg, #3d0000, #a9002c); }

@media (max-width: 700px) {
    .redes-grid {
        grid-template-columns: 1fr;
    }

    .social-card {
        font-size: 20px;
    }

    .info-card {
        padding: 20px;
    }
}
</style>

<section class="contacto-container">

    <div class="top-bar">
        <button class="quienes-btn" type="button" onclick="mostrarSeccionContacto()">
            ¿Quiénes somos?
        </button>
    </div>

    <h1 class="titulo-contacto">CONTACTO</h1>

    <div class="redes-grid">
        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="social-card facebook">
            <span>Facebook</span>
            <i class="fa-brands fa-facebook-f"></i>
        </a>

        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="social-card instagram">
            <span>Instagram</span>
            <i class="fa-brands fa-instagram"></i>
        </a>

        <a href="https://wa.me/" target="_blank" rel="noopener noreferrer" class="social-card whatsapp">
            <span>WhatsApp</span>
            <i class="fa-brands fa-whatsapp"></i>
        </a>

        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="social-card youtube">
            <span>YouTube</span>
            <i class="fa-brands fa-youtube"></i>
        </a>

        <a href="https://discord.com" target="_blank" rel="noopener noreferrer" class="social-card discord">
            <span>Discord</span>
            <i class="fa-brands fa-discord"></i>
        </a>

        <a href="https://telegram.org" target="_blank" rel="noopener noreferrer" class="social-card telegram">
            <span>Telegram</span>
            <i class="fa-brands fa-telegram"></i>
        </a>
    </div>

    <section id="seccionQuienes" class="extra-section">

        <article class="info-card card-quienes">
            <h2>¿Quiénes somos?</h2>
            <p>BUGZONE es una plataforma creada para compartir noticias, guías, juegos, servidores y contenido relacionado con el mundo gamer y la tecnología.</p>

            <h2>Nuestro objetivo</h2>
            <p>Ayudar a la comunidad ofreciendo contenido útil, tutoriales, recomendaciones y herramientas para jugadores y usuarios de tecnología.</p>

            <h2>Qué ofrecemos</h2>
            <ul>
                <li>Noticias gaming.</li>
                <li>Guías y tutoriales.</li>
                <li>Servidores públicos.</li>
                <li>Ayuda técnica.</li>
                <li>Programas y herramientas.</li>
            </ul>
        </article>

        <article class="info-card card-curso">
            <h2>Curso de armado y optimización de PC</h2>
            <h3>1. Componentes de una PC</h3>
            <p>Procesador, memoria RAM, placa madre, fuente de poder, almacenamiento y tarjeta gráfica.</p>

            <h3>2. Instalación del sistema operativo</h3>
            <p>Instalación de Windows, controladores y programas básicos.</p>

            <h3>3. Optimización para juegos</h3>
            <p>Configuración de FPS, mantenimiento del sistema y mejoras de rendimiento.</p>

            <h2>Guía de estudio</h2>
            <ul>
                <li>Identificar componentes.</li>
                <li>Aprender compatibilidades.</li>
                <li>Instalar programas.</li>
                <li>Mejorar el rendimiento.</li>
            </ul>
        </article>

        <article class="info-card card-blog">
            <h2>Blog</h2>
            <h3>Cómo mejorar los FPS en juegos</h3>
            <p>Consejos para revisar la configuración gráfica, cerrar programas innecesarios y mantener los controladores actualizados.</p>

            <h3>Servidores de Minecraft</h3>
            <p>Conocé distintas comunidades y revisá las reglas de cada servidor antes de ingresar.</p>

            <h2>Comentarios</h2>
            <p>Podés compartir opiniones y sugerencias a través de la sección de contacto o ayuda.</p>
        </article>

        <article class="info-card card-cv">
            <h2>Currículum Vitae</h2>
            <h3>Experiencia</h3>
            <p>Espacio para presentar experiencia en administración de servidores gaming y soporte técnico, si corresponde.</p>

            <h3>Educación</h3>
            <p>Espacio para agregar estudios y cursos de programación web y mantenimiento de PC.</p>

            <h3>Habilidades</h3>
            <ul>
                <li>HTML y CSS.</li>
                <li>Configuración de servidores.</li>
                <li>Soporte técnico.</li>
                <li>Edición multimedia.</li>
            </ul>
        </article>

        <article class="info-card card-faq">
            <h2>Preguntas frecuentes</h2>
            <h3>¿BUGZONE es gratuito?</h3>
            <p>El contenido informativo principal del sitio está pensado para que la comunidad pueda consultarlo gratuitamente.</p>

            <h3>¿Cómo puedo agregar un servidor?</h3>
            <p>Ingresá en la sección Servidores y completá el formulario disponible.</p>

            <h3>¿Cómo contacto al soporte?</h3>
            <p>Podés utilizar los enlaces de redes sociales o consultar la sección Ayuda.</p>
        </article>

    </section>
</section>

<script>
function mostrarSeccionContacto() {
    const seccion = document.getElementById('seccionQuienes');
    seccion.classList.toggle('active');

    if (seccion.classList.contains('active')) {
        seccion.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
