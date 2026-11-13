<?php
require_once __DIR__ . '/includes/seguridad.php';
$tituloPagina='Guías'; $pagina_actual='guias';
$buscar=entrada('GET','buscar',100);
$guias=[
 ['titulo'=>'Resident Evil 4','descripcion'=>'Consejos para administrar munición, resolver situaciones complicadas y sobrevivir a los enemigos.','imagen'=>'images/resident-evil.jpg'],
 ['titulo'=>'Elden Ring','descripcion'=>'Aprendé los fundamentos del combate, la exploración y la preparación para enfrentar jefes.','imagen'=>'images/elden-ring.jpg'],
 ['titulo'=>'Warzone','descripcion'=>'Mejorá tu posicionamiento, la comunicación con el equipo y la elección de equipamiento.','imagen'=>'images/warzone.jpg'],
 ['titulo'=>'Minecraft','descripcion'=>'Recomendaciones para comenzar una partida, conseguir recursos y construir tu base.','imagen'=>'images/minecraft.jpg']
];
$filtradas=array_filter($guias,function($g)use($buscar){return $buscar==='' || str_contains(strtolower($g['titulo'].' '.$g['descripcion']),strtolower($buscar));});
require_once __DIR__.'/includes/header.php';
?>
<section class="pagina-guias">
<h1>GUÍAS DE VIDEOJUEGOS</h1><p>Consejos, trucos y recomendaciones para mejorar tu experiencia de juego.</p>
<form action="guias.php" method="get" class="barra-busqueda"><input type="search" name="buscar" placeholder="Buscar una guía..." value="<?= e($buscar) ?>"><button type="submit">Buscar</button><a href="guias.php">Limpiar</a></form>
<p>Guías encontradas: <?= count($filtradas) ?></p>
<div class="contenedor-guias"><?php if(!$filtradas): ?><p>No se encontraron guías.</p><?php else: foreach($filtradas as $g): ?>
<article class="tarjeta-guia"><img src="<?= e($g['imagen']) ?>" alt="<?= e($g['titulo']) ?>" onerror="this.style.display='none'"><div><h2><?= e($g['titulo']) ?></h2><p><?= e($g['descripcion']) ?></p></div></article>
<?php endforeach; endif; ?></div>
</section>
<?php require_once __DIR__.'/includes/footer.php'; ?>
