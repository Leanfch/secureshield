# Consigna:

Realizar un sitio dinámico de tema libre (excepto política y religión) que
ofrezca un blog/novedades/noticias y un producto/servicio a la venta o un
servicio para contratación.

## Sitio:

La web debe componerse de dos partes: una parte para los usuarios
comunes ("el sitio") y otra parte para la administración ("el admin").

### El sitio, al menos, debe:

- Ofrecer a los usuarios algún servicio o producto, como por ejemplo:
un servicio de hosting, servicio de auditoría, servicio de desarrollo,
producto con suscripción (ej: un antivirus, una app online como
Figma), un videojuego, etc.
- Incluir una sección de blog/novedades/noticias donde se hable del
servicio/producto o de temas relacionados.
- Incluir una home que presente el producto.
- Tener un registro y autenticación de usuarios.
- Tener un perfil para los usuarios autenticados, donde puedan
ver/editar su información.
- Si el sitio es un servicio/producto para su contratación, debe poder
administrar su plan de suscripción, incluyendo cancelarlo,
cambiarlo, etc, y ver desde cuándo está suscripto. Esta información
debe ya estar cargada desde los Seeders para, al menos, algunos
usuarios.
- Debe incluir la correspondiente pasarela de pago con el modo sandbox de MercadoPago.

### El admin, al menos, debe:
- Requerir de una autenticación de un usuario administrador para
acceder.
- Proveer de un ABM para administrar las entradas del
blog/novedades/noticias.
- Poder ver los usuarios, y de tener uno, el servicio que tienen
contratado, en el caso del servicio para contratar, o el historial de
compras realizada, en el caso del e-commerce.
- Tener un "Dashboard" inicial que muestre algunas estadísticas
relevantes (ej: plan con más suscriptores, productos más
comprados, mes con mayor facturación, etc).

Ambos deben incluir una semántica y correcta estructura de HTML.
Deben ofrecer además estilización en CSS pudiendo usar un framework de CSS como Tailwind.

### Base de Datos:
Debe constar de las tablas necesarias para cumplir la consigna.
La tabla para usuarios debe estar constituida de al menos 3 campos: uno
para el id, uno para el nombre de usuario, otro para el password.
Al menos una de las otras tablas debe estar constituida de al menos 5
campos (sin contar PK y los campos de fechas de Laravel).
Toda la creación de tablas, y la carga inicial de datos, deberá estar
realizada con migrations y seeders.
Debe haber relaciones entre tablas.

### PHP:
Debe usarse el framework Laravel 12+ aplicando los principios de la
programación orientada a objetos, y aprovechando los mecanismos de
trabajo ofrecidos por el mismo, siguiendo sus prácticas recomendadas.
Las vistas deberán utilizar el motor de template Blade para su
renderizado.
Todos los ingresos de datos deben estar validados, e informar los errores
ocurridos, en caso de haberlos.
La tabla de los blog/noticias/etc debe poder hacer alta/modificación de
imágenes.
Debe haber al menos 2 roles para los usuarios: usuario común y
administrador. Para la verificación del usuario administrador, debe
realizarse un Middleware personalizado que haga tal verificación.
Debe haber modelos relacionados, según las relaciones que existan en la
base de datos.

## Se evaluará:
- Complejidad de la tarea realizada.
- Accesibilidad, navegabilidad y usabilidad del sitio.
- Tablas de relaciones extras en la base de datos.
- Implementación de los principios de la Orientación a Objetos (ej:
Principio de Responsabilidad Única).
- Coherencia en los nombres de variables, clases, métodos, etc.
- Uso correcto de las etiquetas semánticas de HTML.
- Documentación apropiada usando PHPDoc.
- Estilización del sitio.
- Buena aplicación de los distintos tipos de componentes vistos en
clase (Models, Controllers, Middlewares, etc).
- Prolijidad en el código y carpeta del proyecto.