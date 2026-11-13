// BUGZONE: JavaScript compartido por todas las páginas.

function toggleMenu() {
    const menu = document.getElementById('sideMenu');
    if (menu && menu.classList.contains('active')) cerrarMenu();
    else abrirMenuLateral();
}

function abrirMenuLateral() {
    const menu = document.getElementById('sideMenu');
    const overlay = document.getElementById('menuOverlay');
    const boton = document.getElementById('botonMenu');
    if (!menu) return;
    menu.classList.add('active');
    if (overlay) overlay.classList.add('visible');
    document.body.classList.add('menu-activo');
    menu.setAttribute('aria-hidden', 'false');
    if (boton) boton.setAttribute('aria-expanded', 'true');
}

function cerrarMenu() {
    const menu = document.getElementById('sideMenu');
    const overlay = document.getElementById('menuOverlay');
    const boton = document.getElementById('botonMenu');
    if (menu) {
        menu.classList.remove('active');
        menu.setAttribute('aria-hidden', 'true');
    }
    if (overlay) overlay.classList.remove('visible');
    document.body.classList.remove('menu-activo');
    if (boton) boton.setAttribute('aria-expanded', 'false');
}

// Abre el formulario de opinión si está en esta página; si no, va al inicio.
function abrirOpinion() {
    const caja = document.getElementById('opinionBox');
    if (!caja) {
        window.location.href = 'index.php#opinionBox';
        return;
    }
    caja.style.display = caja.style.display === 'block' ? 'none' : 'block';
    if (caja.style.display === 'block') caja.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function abrirOpinionDesdeMenu(evento) {
    const caja = document.getElementById('opinionBox');
    if (caja) {
        evento.preventDefault();
        abrirOpinion();
        return false;
    }
    return true;
}

function mostrar(id) {
    const elemento = document.getElementById(id);
    if (elemento) elemento.style.display = 'block';
}

function buscar() {
    const entrada = document.getElementById('busqueda') || document.querySelector('.buscador input');
    if (!entrada) return;
    const texto = entrada.value.trim().toLocaleLowerCase('es');
    const tarjetas = document.querySelectorAll('.card, .news-card, .news-card, .guia-card, .hardware-card, .celular-card');
    let visibles = 0;
    tarjetas.forEach(function (tarjeta) {
        const contenido = (tarjeta.innerText || tarjeta.textContent).toLocaleLowerCase('es');
        const coincide = texto === '' || contenido.includes(texto);
        tarjeta.style.display = coincide ? '' : 'none';
        if (coincide) visibles++;
    });
    if (texto && tarjetas.length && visibles === 0) alert('No se encontraron resultados para: ' + entrada.value);
}

document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('keydown', function (evento) {
        if (evento.key === 'Escape') {
            cerrarMenu();
            const opinion = document.getElementById('opinionBox');
            if (opinion) opinion.style.display = 'none';
        }
    });

    // Reloj compartido.
    const reloj = document.getElementById('fecha-hora');
    function actualizarFechaHora() {
        if (!reloj) return;
        const ahora = new Date();
        reloj.textContent = ahora.toLocaleDateString('es-AR') + ' | ' + ahora.toLocaleTimeString('es-AR');
    }
    actualizarFechaHora();
    window.setInterval(actualizarFechaHora, 1000);

    // Validación del formulario de opinión, solo si existe en esta página.
    const formulario = document.getElementById('formOpinion');
    if (formulario) {
        formulario.addEventListener('submit', function (evento) {
            const correo = document.getElementById('correo');
            const juegos = document.getElementById('juegos');
            const errorCorreo = document.getElementById('errorCorreo');
            const errorJuegos = document.getElementById('errorJuegos');
            let valido = true;
            if (errorCorreo) errorCorreo.textContent = '';
            if (errorJuegos) errorJuegos.textContent = '';
            const valorCorreo = correo ? correo.value.trim() : '';
            const valorJuegos = juegos ? juegos.value.trim() : '';
            const formatoCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!valorCorreo) {
                if (errorCorreo) errorCorreo.textContent = 'Por favor, ingresá tu correo electrónico.';
                valido = false;
            } else if (!formatoCorreo.test(valorCorreo)) {
                if (errorCorreo) errorCorreo.textContent = 'Ingresá un correo electrónico válido.';
                valido = false;
            }
            if (!valorJuegos) {
                if (errorJuegos) errorJuegos.textContent = 'Este campo no puede estar vacío.';
                valido = false;
            }
            if (!valido) evento.preventDefault();
        });
        formulario.addEventListener('reset', function () {
            document.querySelectorAll('#opinionBox .oculto').forEach(function (elemento) { elemento.style.display = 'none'; });
            ['errorCorreo', 'errorJuegos'].forEach(function (id) {
                const elemento = document.getElementById(id);
                if (elemento) elemento.textContent = '';
            });
        });
    }
});
