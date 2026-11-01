# BUGZONE — Documentación de modificaciones

## 1. Descripción del proyecto

BUGZONE es un sitio web orientado a videojuegos, informática y tecnología. El proyecto comenzó con páginas HTML estáticas y se está adaptando a PHP para organizar mejor el código, reutilizar elementos comunes y preparar el sitio para trabajar con un servidor local.

El diseño conserva una estética gamer: fondos oscuros, tipografía Orbitron en títulos y elementos destacados, colores de acento que cambian según la sección, bordes iluminados y tarjetas para presentar la información.

## 2. Migración de HTML a PHP

Las páginas del proyecto se adaptaron a archivos `.php`. Cada página establece su título y el identificador de la sección antes de incluir el encabezado compartido. De esta forma, el encabezado puede mostrar el título correcto y aplicar una clase CSS específica para los estilos de esa página.

El proyecto utiliza `includes/header.php` para abrir la estructura HTML, cargar los estilos y la tipografía, establecer la clase del `body` e incluir la navegación compartida. Las páginas también incorporan `includes/footer.php` al final para cerrar la estructura e incluir los elementos comunes del pie.

## 3. Encabezado y navegación compartidos

Se busca que la barra superior conserve el mismo tamaño y estructura en todas las páginas, tomando como referencia la página de inicio. El encabezado incluye:

- El logotipo textual **BUGZONE**.
- Accesos rápidos a Inicio, Juegos, Ayuda y Contacto.
- El acceso **Danos tu opinión**.
- Un botón de menú tipo hamburguesa para abrir la navegación lateral.

Se agregaron reglas CSS para que la barra use el ancho disponible, mantenga una altura mínima uniforme, no tenga márgenes externos y conserve la alineación del logotipo, los enlaces y el botón. También se añadieron ajustes para pantallas pequeñas.

Durante las pruebas se detectó que en algunas páginas —especialmente `curso.php`, `servidores.php` y `guias.php`— la barra parecía más angosta o de otro tamaño que en Inicio. Por eso se añadieron reglas específicas y globales para normalizar el ancho, los márgenes, la altura y el comportamiento del encabezado. Si el problema continúa, debe comprobarse que todas las páginas incluyan exactamente el mismo `includes/header.php`, que `nav.php` use las mismas clases y que no haya reglas anteriores que sobrescriban los estilos compartidos.

## 4. Menú lateral

Se preparó un menú lateral que aparece desde el lado derecho al pulsar el botón de hamburguesa. El menú agrupa los accesos a distintas secciones, colocados uno debajo del otro, entre ellas:

- PC - Hardware y software.
- Juegos.
- Guías.
- Celulares.
- Servidores.
- Noticias.
- Curso.
- Ayuda.
- Contacto.

El CSS define la posición fija, la transición de entrada y salida, los colores de cada acceso y el comportamiento adaptable. También contempla una capa oscura sobre la página y la clase `menu-activo` en el `body` para evitar que el contenido de fondo se desplace mientras el menú está abierto. Las clases y funciones utilizadas por `nav.php` y `script.js` deben coincidir para que la apertura y el cierre funcionen correctamente.

## 5. Estilos globales y apariencia

Se amplió `estilos.css` para centralizar los estilos generales y los de cada sección. Entre las modificaciones se encuentran:

- Reinicio de márgenes y rellenos con `*` y uso de `box-sizing: border-box`.
- Fondos oscuros con degradados y brillos.
- Tipografía Orbitron para títulos y elementos de identidad visual.
- Variables CSS para cambiar los colores de acento según la página.
- Estilos para tarjetas, formularios, buscadores, botones, imágenes y pie de página.
- Reglas responsive para adaptar las páginas a pantallas más pequeñas.
- Estilo fijo para el reloj de fecha y hora.
- Efectos de hover en tarjetas, enlaces y botones.

Se conservaron clases específicas para páginas como hardware, juegos, guías, celulares, contacto, ayuda, noticias, servidores y curso. Las reglas globales intentan mantener una apariencia coherente sin eliminar los colores particulares de cada sección.

## 6. Páginas y funciones modificadas

### `curso.php`

La página presenta información institucional de BUGZONE: quiénes somos, objetivo, contenido disponible, curso de armado y optimización de PC, blog y novedades, formulario de comentarios, espacio para currículum y preguntas frecuentes.

El formulario de comentarios envía los campos nombre, correo y comentario a `registrar.php`. Para que los datos se guarden, ese archivo debe existir y contar con una implementación de almacenamiento. El formulario por sí solo no guarda los comentarios.

### `servidores.php`

La página muestra servidores gamer y contiene controles para buscar por texto, filtrar por juego y filtrar por país. Incluye un formulario que permite agregar un servidor con nombre, juego, país, dirección o IP y descripción.

La lógica JavaScript crea tarjetas y actualiza los filtros sin recargar la página. En su estado actual, los servidores agregados se mantienen solamente en la página abierta: no se guardan en una base de datos ni permanecen después de recargarla.

### `guias.php`

La página muestra guías de videojuegos, con tarjetas para Resident Evil 4, Elden Ring, Warzone y Minecraft. Cada tarjeta incluye una imagen, un título y una descripción. Se incorporó un buscador que filtra las tarjetas mientras se escribe.

Las imágenes se cargan desde la carpeta `images`. Si una imagen no se encuentra, el atributo `onerror` oculta ese elemento para evitar que quede un espacio con una imagen rota.

### `contacto.php`

Se preparó una página de contacto con tarjetas para redes y plataformas, entre ellas Facebook, Instagram, WhatsApp, YouTube, Discord y Telegram. También incluye una sección desplegable de información sobre el proyecto. Los enlaces de redes deben revisarse y reemplazarse por las direcciones reales que correspondan al proyecto.

### `celulares.php`

Se preparó una página dedicada a celulares con secciones de recomendaciones de modelos, optimización, emuladores y ROM, comunidades y una sección para consultar si un teléfono puede ejecutar determinados juegos. La página utiliza tarjetas y estilos adaptados a la estética de BUGZONE.

### `ayuda.php`

Se incorporó una página de ayuda con apartados desplegables para resolver dudas, enviar sugerencias, solicitar soporte y consultar términos. También ofrece un enlace hacia la página de contacto.

### Otras páginas

El proyecto también contempla páginas como Inicio, Juegos, Hardware, Noticias y otras secciones. Deben conservar los enlaces con extensión `.php` y utilizar el encabezado y pie compartidos para mantener la navegación y el diseño consistentes.

## 7. JavaScript y elementos comunes

El archivo `script.js` centraliza funciones comunes, como la apertura y el cierre del menú lateral y la actualización del reloj. El reloj utiliza la configuración regional `es-AR` para mostrar fecha y hora.

Algunas páginas tienen scripts propios para funciones particulares, como filtrar guías o servidores. Para evitar errores, conviene no duplicar funciones globales y verificar que los identificadores de los elementos HTML coincidan con los que usan los scripts.

El botón **Danos tu opinión** necesita que exista la función `abrirOpinion()` y el formulario o ventana correspondiente. Si esa función no está implementada en el JavaScript cargado, el botón no podrá abrir el formulario correctamente.

## 8. Configuración PHP y variables de entorno

El encabezado compartido requiere `config/env.php`, desde donde se esperan variables como `$nombre_sitio`. También acepta los nombres `$titulo_pagina` y `$tituloPagina` para definir el título de la página. El identificador `$pagina_actual` se utiliza para generar una clase CSS en el `body`.

Debe verificarse que `config/env.php` exista en la ubicación esperada y defina las variables utilizadas. Las variables de entorno pueden emplearse para separar configuración del código, pero no se debe asumir que los formularios guardan datos ni que existe una conexión con base de datos si todavía no fue programada.

## 9. Pruebas locales

Para probar el sitio, se debe iniciar un servidor local compatible con PHP —por ejemplo, Apache mediante XAMPP—, ubicar el proyecto dentro del directorio servido por ese servidor y acceder a las páginas mediante `localhost`. Abrir los archivos PHP directamente como archivos locales en el navegador no ejecuta PHP.

Después de modificar `estilos.css`, conviene recargar la página forzando la actualización de los estilos con `Ctrl + F5`. Para revisar la uniformidad del encabezado, comparar Inicio, Curso, Servidores y Guías con el mismo tamaño de ventana y comprobar que todas usen el mismo archivo de encabezado y navegación.

## 10. Estado y limitaciones conocidas

- El objetivo visual es que todas las páginas compartan el mismo encabezado y mantengan una apariencia consistente con Inicio.
- Las reglas CSS se fueron agregando en distintas etapas; si dos reglas apuntan al mismo selector, normalmente prevalece la que tenga mayor especificidad o aparezca después. Para una solución estable, es recomendable consolidar las reglas duplicadas de `.navbar`, `.barra-superior`, `.nav-links` y `.menu-btn`.
- La publicación de servidores funciona en el navegador, pero no tiene persistencia.
- El formulario de comentarios requiere implementar `registrar.php` y un mecanismo de almacenamiento.
- Los enlaces sociales de ejemplo deben reemplazarse por enlaces reales.
- El botón de opinión depende de que `abrirOpinion()` y su interfaz estén implementados.
- Las rutas de imágenes deben coincidir con los nombres y ubicaciones reales de los archivos.

## 11. Objetivo final

Dejar BUGZONE migrado a PHP, con navegación reutilizable, estilos gamer consistentes, páginas adaptables, funciones de búsqueda y filtrado en las secciones correspondientes y una estructura preparada para añadir persistencia de datos y otras funciones de servidor cuando sean necesarias.

## 12. Cambios adicionales realizados

Además de adaptar las páginas a PHP, se mejoró la organización general del proyecto y se agregaron diferentes detalles para que BUGZONE sea más completo y fácil de utilizar.

Se ajustaron los diseños, colores, botones, tarjetas y buscadores, manteniendo la estética gamer en las distintas secciones. También se mejoró el menú lateral para facilitar el acceso a las páginas y se organizaron los archivos compartidos para evitar repetir código.

Además, se trabajó en funciones JavaScript como el reloj y la navegación, y se incorporaron o ajustaron formularios y filtros para que los visitantes puedan interactuar con el contenido.

## 13. Ubicación de archivos importantes

Para encontrar rápidamente los archivos del proyecto desde Windows, estas son algunas de las rutas principales:

- **Carpeta principal del proyecto:**
  `C:\xampp\htdocs\BUGZONE\`

- **Carpeta de datos (archivos JSON):**
  `C:\xampp\htdocs\BUGZONE\data\`

- **Archivos compartidos (encabezado, navegación y pie):**
  `C:\xampp\htdocs\BUGZONE\includes\`

- **Configuración PHP:**
  `C:\xampp\htdocs\BUGZONE\config\`

- **Archivo de estilos CSS:**
  `C:\xampp\htdocs\BUGZONE\estilos.css`

- **Archivo JavaScript:**
  `C:\xampp\htdocs\BUGZONE\script.js`

- **Carpeta de imágenes:**
  `C:\xampp\htdocs\BUGZONE\images\`

> **Nota:** La carpeta `data` puede contener archivos JSON utilizados para almacenar información. Estos archivos no son lo mismo que una base de datos MySQL.

## 14. Cómo ingresar a la página

Para ingresar a BUGZONE desde el navegador, primero hay que abrir XAMPP e iniciar el servicio **Apache**.

Una vez iniciado, se puede acceder mediante el siguiente enlace:

[**Abrir BUGZONE**](http://localhost:8080/BUGZONE/index.php)

Si Apache está configurado para utilizar el puerto 80, se debe ingresar mediante esta dirección:

[**Abrir BUGZONE (puerto 80)**](http://localhost/BUGZONE/index.php)

El proyecto debe estar ubicado dentro de la carpeta `htdocs` de XAMPP. No se debe abrir el archivo PHP directamente desde Windows, ya que necesita ejecutarse mediante Apache.

## 15. Consideraciones finales

Con estas modificaciones se buscó que BUGZONE tenga una mejor organización, una navegación más cómoda y un diseño uniforme. La estructura en PHP también permite continuar agregando nuevas funciones, mejorar los formularios y ampliar el contenido del sitio a medida que avance el proyecto.