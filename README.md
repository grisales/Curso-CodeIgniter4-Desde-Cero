# Notas Aulas 

### Aula 136 - Crear controlador base


<details><summary>[P] Sección 7: Creando una tienda de películas</summary>

## Sección 7 - Creando una tienda de peliculas
### 136 - Crear controlador base
Todo ok

_Pendiente,  el profesor cambió el orden de las video aulas en Ago10_
</details>

<details><summary>[Ok] Secciones "Extra": [9]Librerias, [10]Componentes y [11]helpers</summary>
<details><summary>[Ok] Sección 11 - Extra: Trabajando con helpers</summary>

## Sección 11 - Extra: Trabajando con Helpers
### Aula 242 - Url
Todo ok
### Aula 241 - Text
Todo ok
### Aula 240 - Number
Todo ok
### Aula 239 - File system
Todo ok
### Aula 238 - Array helper
Todo ok
</details>
<details><summary>[Ok] Sección 10 - Extra: Avanzado - Mas componentes de CodeIgniter 4</summary>

## Sección 10 - Extra: Avanzado - Mas componentes de CodeIgniter 4
### Aula 151 - Métodos put, patch y delete
Aunque logré poner en práctica la teoria del PUT, esta aula me dejo medio perdido.
Sucede que el profesor hace referencias a un material y metodos que "supuestamente" fueron creados en aulas anteriores en donde se incluyó un controlador llamado `RestMovie.php`.
No logro ubicar por ningun lado ese material ni la video aula en la que se creó, da la impresión de que ese video fué "suprimido" de la playlist del curso. ¯\\_(ツ)_/¯
### Aula 150 - Metadata de la base de datos
Casi Todo Ok.

El método que muestran en el video para usar la función `getCompiledSelect();` genera error y no exibe ningun query.

La manera correcta de usar la función es cargando el metodo del Query Builder:
```php
<?php
//...
$db = \Config\Database::connect()
//...
$builder = $db->table('movies');
//...
$sql = $builder->getCompiledSelect();
echo $sql;
// Muestra en pantalla: SELECT * FROM movies
```
Referencia: https://codeigniter.com/user_guide/database/query_builder.html

### Aula 149 - Transacciones
Todo ok
### Aula 148 - Objeto request
Todo Ok
### Aula 147 - Traducir un formulario
Todo Ok
### Aula 146 - Detectar el idioma del cliente y traducir la app con los lenguajes soportados
Todo Ok
### Aula 145 - Generar Archivos de lenguaje
Todo Ok
### Aula 144 - Generar logs de sistema
Todo Ok
### Aula 143 - Introducción a las configuraciones personalizadas
Todo ok.

Aspectos interesantes de las configuraciones personalizadas.

Ejemplo: Archivo `\app\Config\Web.php` 

```php
// Archivo de configuración: \app\Config\Web.php
<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Web extends BaseConfig
{
    public $siteName = 'CRUDIgniter';
    public $siteDescription = 'Site de Cruds y mucho mas';
    public $siteEmail = 'contacto@ci4dc.test';
}
```

Para consumir las configuraciones personalizadas se pueden incluir para consumo dentro de la funcion de la forma `$config = new \Config\Web();`

```php
private function _loadDefaultView($title, $data, $view)
{
    $config = new \Config\Web();
    $dataHeader = [
        'title' => $title,
        'site' => $config->siteName
    ];
    
    echo view ("dashboard/templates/header", $dataHeader);
    echo view ("dashboard/category/$view", $data);
    echo view ("dashboard/templates/footer");

}
```

O de la forma global en el controlador para ser consumido en varias funciones de la forma `use \Config\Web;`
```php
<?php

//...

use \Config\Web;

//...

private function _loadDefaultView($title, $data, $view)
{
    $config = new Web();
    $dataHeader = [
        'title' => $title,
        'site' => $config->siteName
    ];
    
    echo view ("dashboard/templates/header", $dataHeader);
    echo view ("dashboard/movie/$view", $data);
    echo view ("dashboard/templates/footer");

}
```

También las cofiguraciones pueden ser "sobre escritas" segun el entorno (environment) que se defina en el archivo `.env` anteponiendo el nombre del archivo de configuración a la variable

Ejemplo, la variable `siteName` dentro del archivo de configuracion `\app\Config\Web.php`.
```php
web.siteName = "ByManchicolo (⌐■_■)"
```

### Aula 142 - Caché de los datos
Todo Ok
### Aula 141 - Caché de las páginas
Todo ok
### Aula 140 - Procesamiento de imágenes: Multiples operaciones
Todo ok
### Aula 139 - Procesamiento de imágenes: resizing
Todo ok
### Aula 138 - Procesamiento de imágenes: rotate
Todo ok
### Aula 137 - Procesamiento de imágenes: quality
Todo ok
### Aula 136 - Procesamiento de imágenes: crop
Todo ok
### Aula 135 - Procesamiento de imágenes: fit
Todo ok
</details>
<details><summary>[Ok] Sección 9 - Extra: Trabajando con librerías</summary>


## Sección 9 - Extra: Trabajando con librerías
_El profesor cambió el orden de las video aulas en Ago10_
### Aula 220 - Trabajando con archivos
Todo Ok
### Aula 219 - Trabajando con las URIs
Todo Ok
### Aula 218 - Trabajando con fechas
Todo ok
### Aula 217 - Encriptando textos
Todo ok
### Aula 216 - Enviando E-Mails
Todo ok
### Aula 215 - Detectando el agente (tipo de dispositivo y navegador)
Todo ok
### Aula 214 - Haciendo peticiones HTTP (CURL): post y put
Todo ok
### Aula 213 - Haciendo peticiones HTTP (CURL): get y delete
Funcionó parcialmente.

La implementación de `'headers' => ['Accept' => 'application/json']` en el controlador `MyLibraries.php` nunca reconoció en la salida la declaración del tipo de salida 'xml/json'. Siempre la prioridad la tuvo el formato definido en el controlador RestMovie.php con `protected $format = 'json';` o en su ausencia usando el formato por defecto del FrameWork.

También un detalle en el IDE VSCode,  la función `getBody()` se resaltaba como error aunque no lo es, al parecer por algo inherente a la extensión de inteliphense instalada en el IDE.

Continué un thread en el foro oficial de CI : https://forum.codeigniter.com/showthread.php?tid=80209

</details>
</details>

<details><summary>Sección 8: Avanzado - Rest Api en CodeIgniter 4 (Películas)</summary>

## Sección 8: Avanzado - Rest Api en CodeIgniter 4 (Películas)
_El profesor cambió el orden de las video aulas en Ago10, tuve que dar un salto a la videoaula 198 de la sección 8 para no perder el hilo._

### Aula 211 - Respuesta personalizada para los métodos paginados
Todo ok
### Aula 210 - Recurso rest con filtros y paginado
Todo ok
### Aula 209 - Recurso rest paginado
Todo ok
### Aula 208 - Listado de categorías
Todo ok.

Atención a la prioridad (orden en la declaración) de las rutas para que no haya conflicto con las rutas genericas de `resources`.
### Aula 207 - Editar un producto
Todo ok

Atento a la manera como se hace el request de las variables para PATCH via PUT usando una variable como array de datos mediante la funcion `getRawInput()`.
```php
//...
$data = $request->getRawInput();
//...
```
### Aula 206 - Eliminar un producto
Todo ok
### Aula 205 - Mostrar un producto
Todo ok
### Aula 204 - Normalizar respuesta de la RestApi
Todo ok
### Aula 203 - Crear un producto: Validar categoría válida
Todo ok
### Aula 202 - Crear un producto: Mostrar los errores de formulario
Todo ok
### Aula 201 - Crear un producto: Definir esquema básico
Todo ok
### Aula 200 - Instalar PostMan para realizar peticiones a la Rest Api
Todo ok
### Aula 199 - Empezando con un controlador de tipo Rest
Todo ok
### Aula 198 - Introducción
Todo ok
</details>

<details><summary>Sección 6 - Intermedia - Creando nuestro módulo de login y usuario</summary>

## Sección 6 - Intermedia - Creando nuestro módulo de login y usuario
### Aula 134 - Código fuente
Todo ok
### Aula 133 - Que hemos aprendido
Todo ok
### Aula 132 - Parámetros obligatorios en los filtros
Todo ok
### Aula 131 - Introducción a los filtros: Proteger el módulo de dashboard
Todo ok
### Aula 130 - Opción de cerrar sesión desde el header/nav
Todo ok
### Aula 129 - Terminar de procesar la petición para el login
Todo ok
### Aula 128 - Guardar datos de login en sesión
Todo ok
### Aula 127 - Cerrar sesión
Todo ok
### Aula 126 - Presentación de la sesión
Todo Ok
### Aula 125 - Procesar el formulario de login
Todo Ok
### Aula 124 - Verificar si el password es correcto
Todo ok
### Aula 123 - CRUD de usuarios: crear un hash de la contraseña con un helper
Todo ok
### Aula 122 - CRUD de usuarios: proceso inicial
Aparentemente todo ok.
Sucede que en el desarrollo del curso manejé las primeras rutas presenter dentro del grupo `$routes->group('dashboard', static function ($routes)` , al colocar la ruta "user" por fuera del grupo generó un error, manejándola por dentro del grupo funcionó ok.

>Queda como práctica personal hacer un Branch en Github para:
>1. Sacar las rutas del grupo, y,
>2. Pasar los controladores a una carpeta "Dashboard".
>
>_Ver la respuesta del foro: https://forum.codeigniter.com/showthread.php?tid=82658_

### Aula 121 - Mover controlador de usuarios
Todo ok
Atención a este detalle: las rutas de tipo `resource||presenter` requieren que los controladores estén en la raiz, no funcionan si estan definidos dentro de subcarpetas.
### Aula 120 - Crear migración y modelo para el usuario
Todo ok
Ojo!: Cuando se crea el archivo de migración, los campos binarios `true/false` deben llevar el valor fuera de comillas o si no la construcción del campo omite la validación

Correcto:
```SQL
username' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'unique'     => true,
            ]
```
Errado:
```SQL
username' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'unique'     => 'true',
            ]
```

### Aula 119 - Crear vista para el login
Todo ok.
Particularmente en esta práctica, en el controlador user no se definió un metodo `INDEX` y consecuentemente, en el `loadDefaultView()` se llama a la vista *login* y no *index*.
Adicionalmente, como en la practica estamos usando Bootstrap 4, tomamos el codigo de ejemplo del `InternetArchive.org`
### Aula 118 - Crear ruta y controlador para el login
Todo ok
### Aula 117 - Introducción
Todo ok
</details>

<details><summary>Sección 5 - Intermedio - Instalar y configurar Bootstrap en la aplicación</summary>

## Sección 5 - Intermedio - Instalar y configurar Bootstrap en la aplicación
### Aula 116 - Código fuente
Todo ok
### Aula 115 - ¿Que hemos aprendido?
Todo ok
### Aula 114 - Detalles: Centrar paginación, título, ancho extra descripción
Todo Ok
### Aula 113 - Tarea: CRUD de categorías
Todo ok. No olvidar el uso de las "limitaciones" cuando se implementen rutas generales de tipo presenter o resources, de la forma `['except',['method_1','method_2']]` para exclusión, o, `['only',['method_1','method_2']]` para selección.
### Aula 112 - Incorporar tooltip en el listado
Todo ok
### Aula 111 - Instalar FontAwesome para nuestros icones
Todo ok
### Aula 110 - Vista de detalle: Carrusel de imágenes
Todo Ok
### Aula 109 - Vista de detalle: Cartas en Bootstrap
Todo ok
### Aula 108 - CRUD imágenes movies: Eliminar imágenes, dar funcionalidad al botón
Todo ok
Surgio un BUG en el desarrollo de la aplicacion en el cual unicamente se borraba la imagen con `id =1`.
Depurando, me di cuenta de que el link para eliminar la imagen estaba siendo creado con el id de la pelicula `movie_id` y no con el id de la imagen `image_id`.
### Aula 107 - CRUD imágenes movies: Eliminar imágenes, botón personalizado
Todo ok
### Aula 106 - CRUD imágenes movies: Columnas en bootstrap
Todo ok
### Aula 105 - CRUD imágenes movies: Definir la nueva ruta
Todo Ok
### Aula 104 - CRUD imágenes movies: get y validar errores al momento de proceso
Todo ok. Atención a las sigueintes observaciones:

1. Ojo con el uso del `getGet()`, por que son esos los nombres de los parametros reconocidos por la URL, en caso contrario generara una Excepción/Error.

2. Antes de cargar el archivo que esta en area privada usamos 5 validaciones
   1. Validámos que estén definidos el id y el archivo de la manera `URL/$1/$2`.
   2. Si el id y el archivo no están definidos de la manera `URL/$1/$2` verificamos con `getGet();`si estan parametrizados de la manera `URL?var_1=XX&&var_2=YY`.
   3. Verificamos que el archivo exista en la ruta construida con el `file_exists();`.
   4. En caso de que falte o que este errado alguno de los parametros, se arroja la excepción 404.
   5. En caso de que no exista el archivo, se arroja la excepción 404.

### Aula 103 - CRUD imágenes movies: Procesar y devolver desde el servidor
Todo ok
### Aula 102 - CRUD imágenes movies: Listar
Todo Ok. Especial atención al query usado en MovieImageModel para obtener los nombres de las imagenes por que nos generó problema al usar `first();` en vez de `findAll();` por no estar atento... ;-)
### Aula 101 - Personalizar los errores de formulario en CodeIgniter 4
Todo Ok
### Aula 100 - Bootstrap:Header o cabecera del App
Todo Ok
### Aula 99 - Bootstrap:Activar la clase de paginación
Todo Ok. Atención a la forma como se concatenó el contenido de la case en HTML para el correcto funcionamiento del link activo en la paginación.
### Aula 98 - Bootstrap:Links de paginación y creación de vista personalizada en CodeIgniter
Todo Ok
### Aula 97 - Bootstrap:Alert para los mensajes
Todo Ok
### Aula 96 - Bootstrap:Configurar el layout de la app
Todo Ok
### Aula 95 - Bootstrap:Configurar formulario
Todo Ok
### Aula 94 - Bootstrap:Configurar las tablas
Todo Ok
### Aula 93 - Opcional: Emplear Bootstrap 5
Todo Ok
### Aula 92 -Instalar la CDN de Bootstrap 4 y dependencias en CodeIgniter 4
Todo Ok
</details>

<details><summary>Sección 4 - Actualización - Introducción a las rutas</summary>

## Sección 4 - Introducción a las rutas
Todo ok

La sección 4 *Introducción a las rutas* fué trabajada en un ambiente separado que se encuentra en la aplicacion `ci4dcs4`
</details>
<details><summary>Sección 3 - Intermedio - Creando nuestro CRUD</summary>

## Sección 3 - Creando nuestro CRUD
### Aulas 76 y 77
Todo Ok
### Aula 75 - Validar datos de formulario mediante una clase aparte
Todo ok
### Aula 74 - Listado de categorías en actualizar película
Todo ok en la práctica.

Sin embargo, recuerdo que en aulas anteriores el profesor comentó que no entendía por que el uso del nombre de la tabla junto al id _ex:_ `category_id` en la tabla `categories` _(concepto básico de modelado de bases de datos)_, y en esta clase _(aunque existe el workaround)_ ocurre justamente lo que se quiere evitar con eso, que son los conflictos de nombres al realizar queries de SQL.

Para el caso, en la video aula el profesor tiene en dos tablas distintas `movies` y `categories` un campo con el mismo nombre `title`.

Así, al hacer una consulta join, habrá un conflicto de perdida de datos pués solo se almacenará uno de los dos campos title (esto por que de forma abstracta se crea una unica variable title y un dato sobre escribirá el otro), esto acontece pues el campo title que retornara será el de la última unión, ya que este query funciona de forma LIFO (Last In First Out).

Previendo este resultado, y siguiendo las buenas prácticas de programación y SQL, en mis tablas, estos campos desde el inicio de las aulas fueron llamados `movie_title` dentro de la tabla *movies* y `category_name` dentro de la tabla *categories*.

### Aula 73 - Listado de categorías en actualizar película
Todo Ok

En esta aula enseñan algo bien particular de PHP _(no de codeigniter)_, que es la forma como se usan los condicionales abreviados `(PHP Ternary Operator AKA PHP Shorthand If / Else)`
```php
$result = condition ? value1 : value2;
```
En esa forma de uso del condicional, PHP evalua la condición. Si es verdadero, retorna `value1`; en caso contrario, retorna `value2`, y ese valor es asignado/retornado a la variable `$result`.

De esa forma, en el ejercicio de la clase, la instrucción
```php
<?= $movie->category_id !== $c->category_id ?: " selected" ?>
```
es equivalente a esta otra pero de forma abreviada
```php
<?= $movie->category_id == $c->category_id ? " selected" : "" ?>
```
o en su forma extendida
```php
if($movie->category_id == $c->category_id)
{
 echo "selected";
}
else
{
 echo "";
}
```
### Aula 72 - Crear listado de categorías
Todo Ok
### Aula 71 - Crear seeder para las categorías
Todo Ok
### Aula 70 - Modificar migración de movie para las categorías: rollback y refresh
Todo Ok
### Aula 69 - Verificar id Nulo
Todo ok
### Aula 68 - Crear carpeta para guardar imágenes
Todo ok
### Aula 67 - Personalizar formulario de creación/edición
Todo ok.
Desde las vistas de `edit.php` y `new.php` enviamos un parametro a la vista del `archivo _form.php` que determina si se esta creando o actualizando el registro y de esta forma imprime o no algunos campos.
### Aula 66 - Redirección a actualizar en vista de creación
Todo ok.
**Observaciones importantes**

1. El metodo `save` no sirve cuando se requiere obtener el ID del objeto creado, es necesario cambiarlo por `insert`.

2. Al concatenar valores en las URL hubo que usar comillas `"`
```php
return redirect()->to("dashboard/movie/edit/$id")
```
eso por que usando apostrofes `'` y concatenando con `.` generó conflictos `¯\_(ツ)_/¯`
```php
return redirect()->to('dashboard/movie/edit/'.$id)
```
### Aula 65 - Cargar imágenes y registrar en la base de datos
Todo OK
### Aula 64 - Crear tabla (migración) para guardar imágenes
Todo Ok
### Aula 63 - Validaciones adicionales al momento de cargar la imagen
El metodo sugerido funciona para validar el tipo de archivo, sin embargo no es posible ver los mensajes "ECHO" que sugiere el profesor sin anular los retornos de la funcion de update/create, y para hacerlo por session tendriamos que modificar mucho el codigo de ejemplo entregado en el aula.
Para no afectar el contenido a seguir, la validacion se hizo cargando los archivos en ambos casos pero agregando el sufijo `Errado-` al inicio del nombre del archivo.

```php
if ($imagefile->isValid() && ! $imagefile->hasMoved())
{
    $validated = $this->validate([
        'image' => [
            'uploaded[image]',
            'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
            'max_size[image,4096]',
        ],
    ]);

    if ($validated) {
        $newName = $imagefile->getRandomName();
        $imagefile->move(WRITEPATH . 'uploads', $newName);
    }else{
        $newName = 'Errado-'.$imagefile->getRandomName();
        $imagefile->move(WRITEPATH . 'uploads', $newName);
    }
    
}
```
### Aula 62 - Cargar imágenes o archivos
Todo ok. Para los formularios que cargan archivos, no olvidar incluir el atributo `enctype="multipart/form-data"` en la tag del form.
### Aula 61 - Botón para crear
En aulas anteriores yo habia creado un link en el header para la página de creacion, en esta aula se usa un metodo diferente para hacer lo mismo.

El código que yo habia creado para imprimir el link en el header, llamaba a una ruta de esta forma:
```php
<a href="<?= route_to('nuevaPelicula','') ?>">Nueva Peli</a>
```

Pero, en esta video aula se llamó a la funcion de crear de forma directa, es decir sin usar las rutas de CodeIgniter. Eso se hizo usando el código:
```php
<a href="movie/new">Crear</a>
```

### Aula 60 - Crear partials para los mensajes de sesión y errores de formulario
En general todo ok, pero con el detalle que los mensajes de session al **Editar** están generando doble salida en el header
### Aula 59 - Definir un formulario base para la creación y actualización
_**De la video aula**_

Todo ok

_**Por mi lado**_

Tuve la necesidad de remover el **index.php** de las URLS.

Para suprimir la cadena `index.php` de la URL en los redirects, en el archivo `app/Config/App.php` cambié la configuracion de la pagina de index asi:

De:
```PHP
public $indexPage = 'index.php';
```
Para:
```PHP
public $indexPage = '';
```
Y agregué un archivo .htaccess en la carpeta Raiz con los Rewrites
```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```
Tal cual indica la documentación oficial en: 
http://www.codeigniter.com/user_guide/general/urls.html#apache-web-server


### Aula 58 - Actualizar: valores por defecto y anterior en el formulario
Todo ok
### Aula 57 - Actualizar: Crear funciones y vistas asociadas
De **CI v4.0-RC3** para  **CI v4.2.1**, cambió la estructura de la ruta del método GET para actualizar datos.

En **CI v4.0-RC3** la estructura tenia el **keyvalue en el medio de la URL**
```SHELL
 GET    | dashboard/movie/(.*)/edit   | \App\Controllers\Movie::edit/$1                      |

```
En **CI v4.2.1** la estructura la estructura tiene el **keyvalue en el final de la URL**
```SHELL
 GET    | dashboard/movie/edit/(.*)   | \App\Controllers\Movie::edit/$1                      |
```

### Aula 56 - Eliminar registros
En la video aula usan **CI v4.0-RC3** , en la practica estoy usando **CI v4.2.1**.
Al darle clic al botón del formulario genera un error que dice
> 404 - File Not Found
>Can't find a route for 'get: dashboard/movie/delete'.

Después de mucho indagar e intentar entender a que se referia el profesor con el uso de rutas presenter encontré esta referencia:

https://codeigniter.com/user_guide/incoming/restful.html#presenter-routes

Y, el profesor comentó lo siguiente:
>define tus rutas como presenter y no como recurso, si, en el video uso es la ruta de tipo recurso, grabe el curso al poco tiempo que salió C4 en cuyo momento era un desastre el manejo de las rutas, ya estoy trabajando en el curso para ir haciendo correcciones

Conclusión, para corregir los errores de las aulas 49 y 56 lo que hay que hacer es, dentro del grupo de rutas dashboard  cambiar
 ```PHP
 $routes->resource('movie');
 ```
 por
 ```PHP
 $routes->presenter('movie');
 ```

### Aula 55 - Formularios: Redirección y mensajes por sesión
Todo ok. Prestar especial atencion en el uso de variables de sesion!
### Aula 54 - Formularios: Campos permitidos para guardar o actualizar
En el modelo los campos deben ser identicos a como estan nombrados en la base de datos, en el controlador las variables que guarden los valores obtenidos por el GET tambien deben coincidir con el nombre de lços campos definidos en la base de datos.
### Aula 52. mostrar errores en la vista
Todo Ok, bueno tener en cuenta que la regla required se vuelve "implicita" cuando se le define un tamaño "minimo" al campo.
### Aula 51. Validar los datos
Todo Ok
### Aula 50. Recibir los datos
Todo Ok
### Aula 49. Definir el formulario para crear peliculas
En la video aula usan **CI v4.0-RC3** , en la practica estoy usando **CI v4.2.1**.
Al darle clic al boton del formulario genera un error que dice
> 404 - File Not Found
>Can't find a route for 'get: dashboard/movie/create'.

En el chat de la video aula en Discord dieron dos alternativas que no funcionaron.

1ra alternativa
```PHP
<?php namespace App\Controllers;

use App\Models\MovieModel;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;

class Movie extends ResourceController {
```

2da alternativa 
```PHP
$routes->group('dashboard', static function ($routes) {
   $routes->get('movie', 'Movie::index');
   $routes->get('movie/new', 'Movie::new');
   $routes->post('movie/create', 'Movie::create'); 
});
```
#### Solución
Una tercera alternativa fué crear la ruta perdida dentro del grupo dashboard despues del resource.
```PHP
$routes->group('dashboard', static function ($routes) {
    $routes->resource('movie');
    $routes->post('movie/create', 'Movie::create');
});
```
Lo que deja la duda siguiente.
¿Por que no funciona *create* si está definido de manera implícita al definir la ruta como resource.?

Al consultar por consola dice que esta declarada.
```SHELL
+--------+---------------------------+------------------------------------------------------+----------------+---------------+
| Method | Route                     | Handler                                              | Before Filters | After Filters |
+--------+---------------------------+------------------------------------------------------+----------------+---------------+
| GET    | /                         | \App\Controllers\Home::index                         |                | toolbar       |
| GET    | contacto/(.*)             | \App\Controllers\Home::contacto/$1                   |                | toolbar       |
| GET    | category                  | \App\Controllers\dashboard\CategoryController::index |                | toolbar       |
| GET    | dashboard/movie           | \App\Controllers\Movie::index                        |                | toolbar       |
| GET    | dashboard/movie/new       | \App\Controllers\Movie::new                          |                | toolbar       |
| GET    | dashboard/movie/(.*)/edit | \App\Controllers\Movie::edit/$1                      |                | toolbar       |
| GET    | dashboard/movie/(.*)      | \App\Controllers\Movie::show/$1                      |                | toolbar       |
| POST   | dashboard/movie           | \App\Controllers\Movie::create                       |                | toolbar       |
| PATCH  | dashboard/movie/(.*)      | \App\Controllers\Movie::update/$1                    |                | toolbar       |
| PUT    | dashboard/movie/(.*)      | \App\Controllers\Movie::update/$1                    |                | toolbar       |
| DELETE | dashboard/movie/(.*)      | \App\Controllers\Movie::delete/$1                    |                | toolbar       |
| CLI    | ci(.*)                    | \CodeIgniter\CLI\CommandRunner::index/$1             |                |               |
+--------+---------------------------+------------------------------------------------------+----------------+---------------+
```

### Aula 48. Crear nuestra función y estructura genérica para el controlador de películas
Todo ok
### Aula 47 - Rutas: Rutas de tipo recurso para el controlador Movie
Todo Ok
### Aula 46 - Rutas: Agrupar rutas
Todo Ok
### Aula 45 - paginar registros
Todo Ok
### Aula 44 - Más características del findAll()
Todo Ok
### Aula 43 - Crear la vista del listado de peliculas
Todo Ok
### Aula 42 - Intro a la sección 3
Todo Ok
</details>

<details><summary>Sección 2 - primeros pasos con Codeigniter 4</summary>

## Sección 2 - primeros pasos con Codeigniter 4
### Aula 38 - El archivo .env en codeigniter 4
Todo Ok
### Aula 37 - Modelo: Crear modelo para las categorias
Todo Ok
### Aula 36 - Modelo: Crear modelo para conectar a la base de datos
Todo Ok, Especial atención al uso de la extensión PHP NameResolver en VS Code para importar las clases.
### Aula 35 - Seeder: Generar muchos registros de prueba
Todo Ok 
### Aula 34 - Seeder: Truncar la tabla desde los seeder
Todo Ok
### Aula 33 - Seeder: Generar datos de prueba
En la video aula el archivo de clase MovieSeeder es creado manualmente, sin embargo en mi practica lo generé usando el comando spark 'make:seeder MovieSeeder', no hubo problema.
### Aula 32 - Migraciones: Revertir cambios / Rollback
Todo Ok
### Aula 31 - Migraciones: Crear la tabla categories
Todo Ok
### Aula 30 - Migraciones: Crear la tabla movies
Todo Ok
### Aula 29 - Presentación de la línea de comandos de CodeIgniter
En las aulas anteriores la ruta de navegación de "category" habia sido definida en el controlador como
```PHP
[$routes->get( **'/dashboard/category'** , 'dashboard\CategoryController::index');]
```
para dejarla dentro del dashboard.

Sin embargo, en el transcurso de la video aula 29 aparece como:
```PHP
[$routes->get(**'/category'**, 'dashboard\CategoryController::index');]
```
### Aula 28 - Crear la conexión a la base de datos
Todo Ok
### Aula 27 - Presentación de las migraciones para planificación de la Base de datos
Todo Ok
### Aula 26 - Bug en las rutas
[No hay bugs de este tipo en la version 4.2.1 de codeigniter], en la clase dice que habia un Bug al usar NamedRoutes para ubicar controladores con argumento (parametros) 4.0(RC) con la que se hiso el video. Sin embargo, al replicar el ejercicio todo esta ok en la versión 4.2.1.
### Aula 25 - Rutas: Rutas con nombre
Todo Ok
### Aula 24 - Rutas: Navegación entre páginas
Todo Ok
### Aula 23 - Rutas: Pasar datos a func. de controlad.
Todo Ok
### Aula 22 - Paso de datos controladores/vista
Todo Ok
### Aula 21 - Trabajar con multiples vistas
Todo Ok
### Aula 20 - Segundo controlador en carpeta aparte
Todo Ok
### Aula 19 - Segunda ruta, método en el controlador
Todo Ok
### Aula 18 - Primer controlador y ruta asociada
Todo Ok
### Aulas 9 a 17 - Teoria y presentacion del framework  parte II.
Conceptos básicos Ok
</details>

<details><summary>Sección 1 - Introduccion al curso</summary>

## Sección 1 - Introduccion al curso
### Aulas 1 a 8 - Teoria y presentacion del framework parte I.
Conceptos básicos Ok 
</details>

<details><summary>Contenido original del ReadMe inicial</summary>

# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
</details>