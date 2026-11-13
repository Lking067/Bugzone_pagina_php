<?php
/**
 * Conexión PDO opcional de BUGZONE con MySQL.
 *
 * Valores por defecto para XAMPP local:
 * host: 127.0.0.1 | base: bugzone | usuario: root | contraseña: vacía
 *
 * Se pueden definir DB_HOST, DB_NAME, DB_USER y DB_PASS en el entorno
 * antes de iniciar PHP. Este archivo todavía no está incluido en las páginas.
 */
$host = getenv('DB_HOST') ?: '127.0.0.1';
$base = getenv('DB_NAME') ?: 'bugzone';
$usuario = getenv('DB_USER') ?: 'root';
$contrasena = getenv('DB_PASS') ?: '';

try {
    $conexion = new PDO(
        "mysql:host={$host};dbname={$base};charset=utf8mb4",
        $usuario,
        $contrasena,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $error) {
    // No mostrar credenciales ni detalles internos al visitante.
    error_log('Error de conexión MySQL de BUGZONE: ' . $error->getMessage());
    throw new RuntimeException(
        'No se pudo conectar con MySQL. Revisá XAMPP y la configuración DB_*.',
        0,
        $error
    );
}

return $conexion;
