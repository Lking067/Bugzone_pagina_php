-- BUGZONE | TP6 - Datos de prueba y consultas CRUD
-- Ejecutar después de schema.sql.

USE bugzone;

-- INSERT: datos de tablas maestras.
INSERT INTO roles (nombre, descripcion) VALUES
('Administrador', 'Puede administrar el contenido del sitio'),
('Editor', 'Puede crear y editar publicaciones')
ON DUPLICATE KEY UPDATE descripcion = VALUES(descripcion);

INSERT INTO categorias (nombre, descripcion) VALUES
('Videojuegos', 'Noticias sobre juegos y comunidades'),
('Hardware', 'Noticias sobre componentes y computadoras')
ON DUPLICATE KEY UPDATE descripcion = VALUES(descripcion);

INSERT INTO etiquetas (nombre) VALUES
('PC'), ('Gaming'), ('Novedades')
ON DUPLICATE KEY UPDATE nombre = VALUES(nombre);

-- INSERT: usuario de ejemplo.
-- La contraseña es un hash de demostración; en una aplicación real
-- se debe generar con password_hash() desde PHP.
INSERT INTO usuarios (rol_id, nombre, email, password)
SELECT r.id, 'Usuario de prueba', 'prueba@bugzone.local',
       '$2y$10$ejemplo_hash_no_utilizable_en_produccion'
FROM roles r
WHERE r.nombre = 'Editor'
ON DUPLICATE KEY UPDATE nombre = VALUES(nombre);

-- INSERT: dos registros en la tabla principal (noticias).
INSERT INTO noticias (usuario_id, categoria_id, titulo, contenido, estado)
SELECT u.id, c.id,
       'Novedades del mundo gamer',
       'Publicación de ejemplo para probar la base de datos de BUGZONE.',
       'publicada'
FROM usuarios u
JOIN categorias c ON c.nombre = 'Videojuegos'
WHERE u.email = 'prueba@bugzone.local'
  AND NOT EXISTS (
      SELECT 1 FROM noticias n WHERE n.titulo = 'Novedades del mundo gamer'
  );

INSERT INTO noticias (usuario_id, categoria_id, titulo, contenido, estado)
SELECT u.id, c.id,
       'Consejos para mejorar una PC',
       'Publicación de ejemplo sobre hardware y rendimiento.',
       'publicada'
FROM usuarios u
JOIN categorias c ON c.nombre = 'Hardware'
WHERE u.email = 'prueba@bugzone.local'
  AND NOT EXISTS (
      SELECT 1 FROM noticias n WHERE n.titulo = 'Consejos para mejorar una PC'
  );

-- Relacionar etiquetas con noticias (tabla intermedia N:M).
INSERT IGNORE INTO noticia_etiqueta (noticia_id, etiqueta_id)
SELECT n.id, e.id
FROM noticias n
JOIN etiquetas e ON e.nombre = 'Gaming'
WHERE n.titulo = 'Novedades del mundo gamer';

INSERT IGNORE INTO noticia_etiqueta (noticia_id, etiqueta_id)
SELECT n.id, e.id
FROM noticias n
JOIN etiquetas e ON e.nombre = 'PC'
WHERE n.titulo = 'Consejos para mejorar una PC';

-- SELECT con WHERE y ORDER BY.
SELECT id, titulo, estado, created_at
FROM noticias
WHERE estado = 'publicada'
ORDER BY created_at DESC;

-- SELECT con INNER JOIN: noticia, usuario y categoría.
SELECT n.id, n.titulo, u.nombre AS autor, c.nombre AS categoria
FROM noticias n
INNER JOIN usuarios u ON n.usuario_id = u.id
INNER JOIN categorias c ON n.categoria_id = c.id
ORDER BY n.created_at DESC;

-- SELECT con INNER JOIN para mostrar las etiquetas de cada noticia.
SELECT n.titulo, e.nombre AS etiqueta
FROM noticia_etiqueta ne
INNER JOIN noticias n ON ne.noticia_id = n.id
INNER JOIN etiquetas e ON ne.etiqueta_id = e.id
ORDER BY n.titulo, e.nombre;

-- UPDATE con WHERE: cambiar el estado de una noticia de prueba.
UPDATE noticias
SET estado = 'borrador'
WHERE titulo = 'Consejos para mejorar una PC';

-- DELETE con WHERE: eliminar solamente la noticia de prueba indicada.
-- Se borran primero sus relaciones en noticia_etiqueta.
DELETE ne
FROM noticia_etiqueta ne
INNER JOIN noticias n ON n.id = ne.noticia_id
WHERE n.titulo = 'Novedades del mundo gamer';

DELETE FROM noticias
WHERE titulo = 'Novedades del mundo gamer';
