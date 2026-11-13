<?php
$tituloPagina = 'Noticias';
$pagina_actual = 'noticias';
require_once __DIR__ . '/includes/header.php';
?>

<section class="pagina-noticias">
    <h1>NOTICIAS GAMER</h1>
    <p>Enterate de las últimas novedades del mundo de los videojuegos y la tecnología.</p>

    <div class="barra-busqueda">
        <input type="search" id="buscarNoticia" placeholder="Buscar noticias...">
        <button type="button" onclick="mostrarFormularioNoticia()">+ Agregar noticia</button>
    </div>

    <form id="formNoticia" class="formulario-noticia" hidden>
        <h2>Publicar noticia</h2>

        <label for="tituloNoticia">Título</label>
        <input id="tituloNoticia" type="text" required maxlength="120">

        <label for="textoNoticia">Descripción</label>
        <textarea id="textoNoticia" required rows="4" maxlength="1500"></textarea>

        <label for="imagenNoticia">URL de la imagen (opcional)</label>
        <input id="imagenNoticia" type="url" placeholder="https://ejemplo.com/imagen.jpg">

        <button type="submit">Publicar</button>
        <button type="button" onclick="ocultarFormularioNoticia()">Cancelar</button>
    </form>

    <div id="contenedorNoticias" class="contenedor-noticias">
        <article class="tarjeta-noticia">
            <img
                src="images/half-life-3.jpg"
                alt="Imagen relacionada con videojuegos"
                onerror="this.style.display='none'"
            >
            <div class="texto-noticia">
                <h2>Rumores sobre Half-Life 3</h2>
                <p>La comunidad gamer sigue atenta a los rumores sobre una posible nueva entrega de la saga Half-Life. Por ahora, cualquier novedad debe confirmarse mediante fuentes oficiales.</p>
            </div>
        </article>
    </div>
</section>

<script>
const formularioNoticia = document.getElementById('formNoticia');
const contenedorNoticias = document.getElementById('contenedorNoticias');
const buscarNoticia = document.getElementById('buscarNoticia');

function mostrarFormularioNoticia() {
    formularioNoticia.hidden = false;
}

function ocultarFormularioNoticia() {
    formularioNoticia.reset();
    formularioNoticia.hidden = true;
}

formularioNoticia.addEventListener('submit', function(event) {
    event.preventDefault();

    const titulo = document.getElementById('tituloNoticia').value.trim();
    const texto = document.getElementById('textoNoticia').value.trim();
    const urlImagen = document.getElementById('imagenNoticia').value.trim();

    if (!titulo || !texto) {
        alert('Completá el título y la descripción.');
        return;
    }

    const tarjeta = document.createElement('article');
    tarjeta.className = 'tarjeta-noticia';

    if (urlImagen) {
        const imagen = document.createElement('img');
        imagen.src = urlImagen;
        imagen.alt = 'Imagen de la noticia';
        imagen.onerror = function() {
            this.style.display = 'none';
        };
        tarjeta.appendChild(imagen);
    }

    const contenido = document.createElement('div');
    contenido.className = 'texto-noticia';

    const encabezado = document.createElement('h2');
    encabezado.textContent = titulo;

    const parrafo = document.createElement('p');
    parrafo.textContent = texto;

    contenido.append(encabezado, parrafo);
    tarjeta.appendChild(contenido);
    contenedorNoticias.prepend(tarjeta);

    formularioNoticia.reset();
    formularioNoticia.hidden = true;
});

buscarNoticia.addEventListener('input', function() {
    const texto = this.value.toLowerCase();

    document.querySelectorAll('.tarjeta-noticia').forEach(function(tarjeta) {
        tarjeta.style.display = tarjeta.textContent.toLowerCase().includes(texto)
            ? ''
            : 'none';
    });
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
