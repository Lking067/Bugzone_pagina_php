<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function e($v): string {
    return htmlspecialchars((string)$v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
function entrada(string $metodo, string $campo, int $max = 2000): string {
    $origen = $metodo === 'GET' ? INPUT_GET : INPUT_POST;
    $v = filter_input($origen, $campo, FILTER_UNSAFE_RAW);
    if ($v === null || $v === false) return '';
    return mb_substr(trim((string)$v), 0, $max, 'UTF-8');
}
function token_csrf(): string {
    if (empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf_token'];
}
function csrf_valido(): bool {
    return isset($_SESSION['csrf_token'], $_POST['csrf_token'])
        && is_string($_POST['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']);
}
function leer_json_lista(string $ruta): array {
    if (!is_file($ruta)) return [];
    $datos = json_decode((string)file_get_contents($ruta), true);
    return is_array($datos) ? $datos : [];
}
function guardar_json_lista(string $ruta, array $registro): bool {
    $dir = dirname($ruta);
    if (!is_dir($dir) && !mkdir($dir, 0755, true)) return false;
    $f = fopen($ruta, 'c+');
    if (!$f) return false;
    try {
        if (!flock($f, LOCK_EX)) return false;
        $datos = json_decode(stream_get_contents($f) ?: '[]', true);
        if (!is_array($datos)) $datos = [];
        $datos[] = $registro;
        $json = json_encode($datos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        if ($json === false) return false;
        rewind($f); ftruncate($f, 0);
        $ok = fwrite($f, $json) !== false;
        fflush($f); flock($f, LOCK_UN);
        return $ok;
    } finally { fclose($f); }
}
