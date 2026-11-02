<?php
require_once __DIR__ . '/includes/seguridad.php';
$tituloPagina = 'Información y cursos';
$pagina_actual = 'curso';
$errores = []; $mensaje = '';
$nombre = ''; $correo = ''; $comentario = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = entrada('POST', 'nombre', 80);
    $correo = entrada('POST', 'correo', 150);
    $comentario = entrada('POST', 'comentario', 2000);

    if (!csrf_valido()) $errores[] = 'El formulario venció o el envío no es válido. Actualizá la página.';
    if ($nombre === '') $errores[] = 'El nombre es obligatorio.';
    if ($correo === '' || !filter_var($correo, FILTER_VALIDATE_EMAIL)) $errores[] = 'Ingresá un correo electrónico válido.';
    if ($comentario === '') $errores[] = 'El comentario no puede estar vacío.';

    if (!$errores) {
        $ok = guardar_json_lista(__DIR__ . '/data/comentarios.json', [
            'nombre' => $nombre, 'correo' => $correo,
            'comentario' => $comentario, 'fecha' => date('Y-m-d H:i:s')
        ]);
        if ($ok) {
            $mensaje = '¡Tu comentario se recibió correctamente!';
            $nombre = $correo = $comentario = '';
            unset($_SESSION['csrf_token']);
        } else $errores[] = 'No se pudo guardar. Revisá los permisos de la carpeta data.';
    }
}
$comentarios = leer_json_lista(__DIR__ . '/data/comentarios.json');
require_once __DIR__ . '/includes/header.php';
?>
<section class="pagina-curso">
    <section class="bloque-curso"><h1>¿QUIÉNES SOMOS?</h1><p>BUGZONE es un espacio dedicado a los videojuegos, la informática y la tecnología. Buscamos compartir información útil, guías y novedades para quienes disfrutan del mundo gamer.</p></section>
    <section class="bloque-curso"><h2>NUESTRO OBJETIVO</h2><p>Reunir información sobre juegos, computadoras, celulares y servidores, y ofrecer contenido que ayude a resolver dudas y aprender sobre tecnología.</p></section>
    <section class="bloque-curso"><h2>¿QUÉ ENCONTRÁS EN BUGZONE?</h2><ul><li>Noticias sobre videojuegos y tecnología.</li><li>Guías y recomendaciones.</li><li>Información sobre hardware y software.</li><li>Contenido sobre servidores y comunidades.</li><li>Consejos para mejorar el rendimiento de una PC.</li></ul></section>
    <section class="bloque-curso"><h2>CURSO DE ARMADO Y OPTIMIZACIÓN DE PC</h2><p>Conceptos sobre componentes, compatibilidad, armado, instalación de programas y optimización.</p></section>
    <section class="bloque-curso"><h2>BLOG Y NOVEDADES</h2><article class="entrada-blog"><h3>Cómo mantener tu PC</h3><p>Limpiar el equipo, actualizar programas y controlar temperaturas ayuda a conservar el rendimiento.</p></article></section>

    <section class="bloque-curso">
        <h2>DEJANOS TU COMENTARIO (POST)</h2>
        <?php if ($mensaje): ?><p class="mensaje-exito" role="status"><?= e($mensaje) ?></p><?php endif; ?>
        <?php if ($errores): ?><div class="mensajes-error" role="alert"><ul><?php foreach ($errores as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
        <form action="curso.php" method="post" class="formulario-comentarios">
            <input type="hidden" name="csrf_token" value="<?= e(token_csrf()) ?>">
            <label for="nombreComentario">Nombre</label>
            <input id="nombreComentario" name="nombre" maxlength="80" value="<?= e($nombre) ?>" required>
            <label for="correoComentario">Correo electrónico</label>
            <input id="correoComentario" type="email" name="correo" maxlength="150" value="<?= e($correo) ?>" required>
            <label for="comentario">Comentario</label>
            <textarea id="comentario" name="comentario" rows="5" maxlength="2000" required><?= e($comentario) ?></textarea>
            <button type="submit">Enviar comentario</button>
        </form>
    </section>

    <section class="bloque-curso"><h2>COMENTARIOS RECIBIDOS</h2>
    <?php if (!$comentarios): ?><p>Todavía no hay comentarios.</p><?php else: ?>
        <?php foreach (array_reverse($comentarios) as $c): ?><article class="entrada-blog"><h3><?= e($c['nombre'] ?? 'Usuario') ?></h3><p><?= nl2br(e($c['comentario'] ?? '')) ?></p><small><?= e($c['fecha'] ?? '') ?></small></article><?php endforeach; ?>
    <?php endif; ?></section>
    <section class="bloque-curso"><h2>CURRÍCULUM</h2><p>Espacio para presentar formación, conocimientos y proyectos relacionados con tecnología.</p></section>
    <section class="bloque-curso"><h2>PREGUNTAS FRECUENTES</h2><details><summary>¿Qué es BUGZONE?</summary><p>Un sitio sobre videojuegos, informática y tecnología.</p></details><details><summary>¿Dónde encuentro las guías?</summary><p>Desde el menú lateral.</p></details></section>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
