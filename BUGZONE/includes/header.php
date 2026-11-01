<?php
require_once __DIR__ . '/../config/env.php';
// Acepta los dos nombres de variable usados por las páginas antiguas.
$titulo_pagina = $titulo_pagina ?? $tituloPagina ?? $nombre_sitio;
$pagina_actual = $pagina_actual ?? '';
$clase_pagina = preg_replace('/[^a-z0-9_-]/i', '', $pagina_actual);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo_pagina, ENT_QUOTES, 'UTF-8') ?> | BUGZONE</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
</head>
<body class="pagina-<?= htmlspecialchars($clase_pagina, ENT_QUOTES, 'UTF-8') ?>">
<?php require_once __DIR__ . '/nav.php'; ?>
