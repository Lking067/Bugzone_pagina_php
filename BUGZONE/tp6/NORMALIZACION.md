# TP6 - Normalización aplicada a BUGZONE

## 1. Situación inicial: tabla sin normalizar

Para el ejemplo se toma una tabla hipotética llamada `publicaciones`, donde se guardan noticias de BUGZONE. Una versión desordenada podría tener estos campos:

| id | titulo | autor | categoria | etiquetas |
|---|---|---|---|---|
| 1 | Novedades gamer | Usuario de prueba | Videojuegos | PC, Gaming, Novedades |

El problema es que `etiquetas` contiene varios valores en una misma columna. Además, si se repiten los nombres de autores y categorías en muchas publicaciones, se genera redundancia y pueden aparecer diferencias al escribir los mismos datos.

## 2. Aplicación de las formas normales

### Primera Forma Normal (1FN)

La primera forma normal pide que cada campo tenga un solo valor y que no se guarden listas dentro de una columna. Por eso, las etiquetas se separan en registros individuales y se crea una tabla propia para ellas.

En BUGZONE se utilizan las tablas `noticias` y `etiquetas`, relacionadas mediante `noticia_etiqueta`. Así una noticia puede tener varias etiquetas sin guardar una lista de texto en un solo campo.

### Segunda Forma Normal (2FN)

La segunda forma normal evita que un campo que no es clave dependa solamente de una parte de una clave primaria compuesta.

En la tabla intermedia `noticia_etiqueta`, la clave primaria está formada por `noticia_id` y `etiqueta_id`. Esta tabla guarda únicamente esas dos claves: no repite el título de la noticia ni el nombre de la etiqueta. Los datos propios de cada entidad quedan en sus tablas correspondientes.

### Tercera Forma Normal (3FN)

La tercera forma normal busca evitar dependencias entre campos que no son claves. Por ejemplo, no conviene guardar el nombre del rol repetido en cada usuario si ese nombre depende del identificador del rol.

Por eso se crea la tabla `roles` y en `usuarios` se guarda `rol_id` como clave foránea. Lo mismo se aplica a las categorías: las noticias guardan `categoria_id` y el nombre de la categoría se almacena una sola vez en `categorias`.

## 3. Tablas resultantes, claves primarias y foráneas

- **roles**: PK `id`. Guarda los tipos de usuario, como Administrador y Editor.
- **usuarios**: PK `id`; FK `rol_id` que referencia a `roles.id`. Guarda nombre, email y contraseña.
- **categorias**: PK `id`. Guarda categorías como Videojuegos y Hardware.
- **noticias**: PK `id`; FK `usuario_id` que referencia a `usuarios.id` y FK `categoria_id` que referencia a `categorias.id`.
- **etiquetas**: PK `id`. Guarda cada etiqueta una sola vez.
- **noticia_etiqueta**: PK compuesta (`noticia_id`, `etiqueta_id`); ambas columnas son también claves foráneas hacia `noticias` y `etiquetas`.

## 4. Relación entre las tablas

Un rol puede corresponder a muchos usuarios. Un usuario puede publicar muchas noticias. Una categoría puede contener muchas noticias. Por último, noticias y etiquetas tienen una relación muchos a muchos (N:M), resuelta con la tabla intermedia `noticia_etiqueta`.

## 5. Archivos de esta entrega

- `schema.sql`: crea la base de datos, las tablas, las claves y los índices.
- `consultas.sql`: inserta datos de prueba y contiene consultas SELECT, INNER JOIN, UPDATE y DELETE.
- `../config/database.php`: conexión PDO opcional para que el proyecto PHP pueda conectarse a MySQL cuando se decida integrarlo.

## 6. Aclaración sobre el estado actual de BUGZONE

La versión original del sitio guarda comentarios y servidores en archivos JSON, y la publicación de noticias de `noticias.php` se realiza en el navegador. Estos mecanismos no se migraron automáticamente a MySQL en esta entrega para evitar alterar el funcionamiento actual y el diseño del sitio.

El esquema y las consultas del TP6 quedan preparados y se pueden ejecutar por separado en MySQL. La conexión PDO incluida es una herramienta de configuración; todavía no está llamada desde las páginas del sitio. Para que los formularios y las noticias guarden y lean datos desde MySQL habrá que realizar una integración posterior en esas páginas.
