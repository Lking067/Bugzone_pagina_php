<?php
require_once __DIR__ . '/includes/seguridad.php';
$tituloPagina = 'Servidores'; $pagina_actual = 'servidores';
$errores = []; $mensaje = '';
$nombre = ''; $juego = ''; $pais = ''; $direccion = ''; $descripcion = '';
$juegos = ['minecraft','counter-strike','valorant','rust'];
$paises = ['argentina','chile','brasil','uruguay'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = entrada('POST','nombre',100); $juego = entrada('POST','juego',40);
    $pais = entrada('POST','pais',40); $direccion = entrada('POST','direccion',150);
    $descripcion = entrada('POST','descripcion',1000);
    if (!csrf_valido()) $errores[] = 'El formulario no es válido. Actualizá la página.';
    if ($nombre === '') $errores[] = 'El nombre es obligatorio.';
    if (!in_array($juego,$juegos,true)) $errores[] = 'Elegí un juego válido.';
    if (!in_array($pais,$paises,true)) $errores[] = 'Elegí un país válido.';
    if ($direccion === '') $errores[] = 'La dirección o IP es obligatoria.';
    if (!$errores) {
        $ok = guardar_json_lista(__DIR__.'/data/servidores.json', [
            'nombre'=>$nombre,'juego'=>$juego,'pais'=>$pais,'direccion'=>$direccion,
            'descripcion'=>$descripcion,'fecha'=>date('Y-m-d H:i:s')
        ]);
        if ($ok) { $mensaje='El servidor se publicó correctamente.'; $nombre=$juego=$pais=$direccion=$descripcion=''; unset($_SESSION['csrf_token']); }
        else $errores[]='No se pudo guardar. Revisá los permisos de la carpeta data.';
    }
}
$buscar = entrada('GET','buscar',100);
$filtroJuego = entrada('GET','juego',40);
$filtroPais = entrada('GET','pais',40);
if (!in_array($filtroJuego,$juegos,true)) $filtroJuego='';
if (!in_array($filtroPais,$paises,true)) $filtroPais='';
$servidores = array_merge([['nombre'=>'Servidor de Minecraft','juego'=>'minecraft','pais'=>'argentina','direccion'=>'','descripcion'=>'Comunidad para construir, explorar y jugar en equipo.']], leer_json_lista(__DIR__.'/data/servidores.json'));
$filtrados = array_filter($servidores, function($s) use($buscar,$filtroJuego,$filtroPais) {
    $texto = strtolower(($s['nombre']??'').' '.($s['juego']??'').' '.($s['pais']??'').' '.($s['descripcion']??''));
    return ($buscar==='' || str_contains($texto,strtolower($buscar)))
        && ($filtroJuego==='' || ($s['juego']??'')===$filtroJuego)
        && ($filtroPais==='' || ($s['pais']??'')===$filtroPais);
});
require_once __DIR__ . '/includes/header.php';
?>
<section class="pagina-servidores">
<h1>SERVIDORES GAMER</h1><p>Encontrá comunidades y servidores para jugar con otras personas.</p>
<?php if($mensaje): ?><p class="mensaje-exito" role="status"><?= e($mensaje) ?></p><?php endif; ?>
<?php if($errores): ?><div class="mensajes-error" role="alert"><ul><?php foreach($errores as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>

<h2>Buscar y filtrar servidores (GET)</h2>
<form action="servidores.php" method="get" class="filtros-servidores">
<input type="search" name="buscar" placeholder="Buscar servidor..." value="<?= e($buscar) ?>">
<select name="juego"><option value="">Todos los juegos</option><?php foreach($juegos as $op): ?><option value="<?= e($op) ?>" <?= $filtroJuego===$op?'selected':'' ?>><?= e(ucwords(str_replace('-',' ',$op))) ?></option><?php endforeach; ?></select>
<select name="pais"><option value="">Todos los países</option><?php foreach($paises as $op): ?><option value="<?= e($op) ?>" <?= $filtroPais===$op?'selected':'' ?>><?= e(ucfirst($op)) ?></option><?php endforeach; ?></select>
<button type="submit">Buscar</button><a href="servidores.php">Limpiar filtros</a>
</form>

<h2>Publicar un servidor (POST)</h2>
<form action="servidores.php" method="post" class="formulario-servidor">
<input type="hidden" name="csrf_token" value="<?= e(token_csrf()) ?>">
<label for="nombreServidor">Nombre</label><input id="nombreServidor" name="nombre" maxlength="100" value="<?= e($nombre) ?>" required>
<label for="juegoServidor">Juego</label><select id="juegoServidor" name="juego" required><option value="">Seleccioná un juego</option><?php foreach($juegos as $op): ?><option value="<?= e($op) ?>" <?= $juego===$op?'selected':'' ?>><?= e(ucwords(str_replace('-',' ',$op))) ?></option><?php endforeach; ?></select>
<label for="paisServidor">País</label><select id="paisServidor" name="pais" required><option value="">Seleccioná un país</option><?php foreach($paises as $op): ?><option value="<?= e($op) ?>" <?= $pais===$op?'selected':'' ?>><?= e(ucfirst($op)) ?></option><?php endforeach; ?></select>
<label for="direccionServidor">Dirección o IP</label><input id="direccionServidor" name="direccion" maxlength="150" value="<?= e($direccion) ?>" required>
<label for="descripcionServidor">Descripción</label><textarea id="descripcionServidor" name="descripcion" rows="3" maxlength="1000"><?= e($descripcion) ?></textarea>
<button type="submit">Publicar servidor</button>
</form>

<h2>Resultados: <?= count($filtrados) ?></h2><div class="lista-servidores">
<?php if(!$filtrados): ?><p>No se encontraron servidores con esos filtros.</p><?php else: foreach($filtrados as $s): ?>
<article class="tarjeta-servidor"><h2><?= e($s['nombre']??'') ?></h2><p><strong>Juego:</strong> <?= e(ucwords(str_replace('-',' ',$s['juego']??''))) ?></p><p><strong>País:</strong> <?= e(ucfirst($s['pais']??'')) ?></p><?php if(!empty($s['direccion'])): ?><p><strong>Dirección:</strong> <?= e($s['direccion']) ?></p><?php endif; ?><p><?= e($s['descripcion']??'') ?></p></article>
<?php endforeach; endif; ?></div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
