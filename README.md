# MINI FRAMEWORK PHP

## Requirimientos

- PHP >= 8.0
- COMPOSER

## Intalacion

clonar el repositorio.

```
git clone https://github.com/tucno21/mini_framework_php.git
```

linea de comando necesario

```
composer install
```

## CONFIGURACIONES BASICAS DE URL Y CONECCIÓN

Rutas para la web (App/Config/App.php)

```php
$baseURL = 'www.myweb.com';

$localhost = 'localhost';
$user = 'root';
$password = 'root';
$dbName = 'mvc_framework';

$imageFolder = 'img'; //nombre de la carpeta de almacenamiento de imagenes
```

## RUTAS WEB

Rutas para la web (App/Config/Routes.php)

```php
$router->get('/', [Controller::class, 'index']);
$router->post('/login', [Controller::class, 'index']);

$router->get('/login', function () {
    echo 'desde el login';
});

$router->get('/string', 'funcion');
```

## FUNCIONES GENERALES

depurar $variables

```php
dd($variable);
d($variable);
```

Ruta Web principal

```php
<?= base_url ?>/login
<?= base_url('/login') ?>
```

Ruta sistema

```php
DIRPUBLIC  //carpeta /public
APPDIR     //carpeta App
DIRIMG     //carpeta /public/$imageFolder/ para almacenar imagenes
```

## FUNCIONES PARA EL VISTA

Layout o modelo base /View
captura la parte del HTML

```php
<?= extend('/layout/head.php') ?>
```

## CREAR CONTROLADOR Y MODELO DESDE CONSOLA

Para controlador y modelo sin carpeta

```
php optimus make:controller Name
php optimus make:model Name
```

Para controlador y modelo con carpeta

```
php optimus make:controller Name folderName
php optimus make:model Name folderName
```

## FUNCIONES CONTROLADOR

enviar vistas usando $this

```php
return $this->view('login', []);
return $this->redirect('login', []);
```

enviar vistas sin $this

```php
return view('login', []);
return redirect('login', []);
```

Capturar datos del get y post sanitizados PHP

```php
$data = $this->request()->isGet();
$data = $this->request()->isPost();
```

## FUNCIONES MODEL

Instancia el modelo al controlador

Guardar, Actualizar y Eliminar

```php
$homeModel->create($data);
$homeModel->update($id, $data);
$homeModel->delete($id);
```

LEER TABLA
leer todo

```php
$homeModel->findAll();
$homeModel->findAll($limit);
$homeModel->columns($columns)->findAll();
$homeModel->where($colum, $operator, $valueColum)->findAll();
$homeModel->where($colum, $operator, $valueColum)->orderBy($colum, $order)->findAll();

$homeModel->where($colum, $valueColum)->findAll();
$homeModel->where($colum, $valueColum)->orderBy($colum, $order)->findAll();
```

leer el primero

```php
$homeModel->first();
$homeModel->columns($columns)->first();
$homeModel->where($colum, $operator, $valueColum)->first();
$homeModel->where($colum, $operator, $valueColum)->orderBy($colum, $order)->first();

$homeModel->where($colum, $valueColum)->first();
$homeModel->where($colum, $valueColum)->orderBy($colum, $order)->first();
```

### Orden de modelo de consulta

se puede eliminar uno o varios, respetar el orden para no tener errores

```php
$homeModel->columns($columns)
          ->where($colum, $operator, $valueColum)
          ->orderBy($colum, $order)
          ->findAll($limit) // ->first();
```

Buscar un registro con valor unico

```php
$homeModel->find($id);
```

Alternativa de find(); / primero el valor y luego la columna

```php
$homeModel->find($id, $colum);
```

CONSULTA personalizada

```php
$homeModel->queryFirst($query);
$homeModel->queryAll($query);
```

## EJEMPLOS

```php
columns('email')
columns('email, username')

where('active', 1)
where('votes', '>=', 100)
where('votes', '<>', 100)
where('name', 'like', 'T%')

orderBy('name', 'desc')
orderBy('email', 'asc')

find(3);
find('a@a.com', 'email');

queryFirst('SELECT * FROM users');
```

## SESSIONES

Crear sesiones desde el CONTROLADOR en el session
-enviar una clave 'ejemplo' y un arrar o datos(array / objeto) para crear $\_SESSION

```php
$this->sessionSet('user', $user);
```

invocar la sesion (con la clave creada)

```php
$session = $this->sessionGet('user');
```

Eliminar la sesion (enviar la clave creada)

```php
$this->sessionDestroy('user');
```

## ACCESO A RUTAS (Middleware)

Agregar en el Controlador que se será restingido
(_enviar la sesion con clave creada_),
(_enviar arrary de rutas no permitidas sin iniciar login_)

```php
    public function __construct()
    {
        $this->middleware($this->sessionGet('user'), ['/dashboard']);
    }
```

## Validaciones de Inputs

desde el controlador y enviar datos

```php
        $data = $this->request()->isPost();

        $validator = $this->validate($data, [
            'name' => 'required|alpha',
            'username' => 'required|alpha_numeric',
            'email' => 'required|email|unique:HomeModel,email',
            'password' => 'required|min:3|max:12|matches:password_confirm',
            'password_confirm' => 'required',
            'photo' => 'requiredImg|maxSize:2|type:jpeg,png,zip,svg+xml',
        ]);

        if ($validator !== true) {

            return $this->redirect('register', [
                'err' =>  $validator,
                'data' => $data,
            ]);
        } else {
            $homeModel = new HomeModel();
            $homeModel->create($data);
            return $this->redirect('login');
        }

        return view('register');
```

| Regla                    | Descripción                                                        | Ejemplo               |
| ------------------------ | ------------------------------------------------------------------ | --------------------- |
| `alpha`                  | Entrada solo caracteres alfabéticos.                               |                       |
| `alpha_space`            | Entrada solo de caracteres alfabéticos y espacios.                 |                       |
| `alpha_dash`             | Entrada solo de caracteres alfanuméricos, guiones bajos y guiones. |                       |
| `alpha_numeric`          | Entrada solo de caracteres alfanuméricos.                          |                       |
| `alpha_numeric_space`    | Entrada solo de caracteres alfanuméricos y de espacio.             |                       |
| `decimal`                | Entrada solo número decimal.                                       |                       |
| `integer`                | Entrada solo de número entero.                                     |                       |
| `is_natural`             | Entrada solo de numeros naturales.                                 |                       |
| `is_natural_no_zero`     | Entrada solo de numeros naturales y debe ser mayor que cero        |                       |
| `numeric`                | Entrada solo de números                                            |                       |
| `required`               | Entrada no vacio, es obligatorio                                   |                       |
| `email`                  | Entrada en formato email                                           |                       |
| `url`                    | Entrada formato URL                                                |                       |
| `min:number`             | Mínimo de "number" caracteres                                      | `min:3`               |
| `max:number`             | Máximo de "number" caracteres                                      | `max:9`               |
| `string`                 | Entrda solo cadena de texto                                        |                       |
| `confirm`                | Dos entradas iguales, la segunda agregar "\_confirm"               |                       |
| `slug`                   | Entrada tipo slug **aa-bb-cc**                                     |                       |
| `text`                   | Entrada solo texto                                                 |                       |
| `choice:param`           | La Entrada debe ser igual al establecido en **param**              | `choice:hello`        |
| `between:min,max`        | entra minima y maxima de caracteres                                | `between:3,8`         |
| `datetime`               | Entrada solo de fecha y hora **Y-m-d H:i:s**                       |                       |
| `time`                   | Entrada solo de hora **H:i:s**                                     |                       |
| `date`                   | Entrada solo de fecha **Y-m-d**                                    |                       |
| `matches:2input`         | Compara la igualdad de dos entradas                                | `matches:co_password` |
| `unique:model,colum`     | Entrada unica que no coincida con la BD                            | `unique:users,email`  |
| `not_unique:model,colum` | Entrada existente en la BD                                         | `not_unique:city,id`  |

##

| Regla Archivos-file | Descripción                                              | Ejemplo         |
| ------------------- | -------------------------------------------------------- | --------------- |
| `requiredFile`      | Entrada no vacio, es obligatorio.                        |                 |
| `maxSize:number`    | Tamaño maximo del archivo en MB.                         | `maxSize:2`     |
| `type:param`        | Tipos de archivos permitidos (jpeg,png,zip,gif,svg+xml). | `type:jpeg,png` |

## Creditos 📌

_Modelo de framework php_

- [Juan de la Torre](https://www.udemy.com/course/desarrollo-web-completo-con-html5-css3-js-php-y-mysql/) - Curso PHP.
- [The Codeholic](https://www.youtube.com/playlist?list=PLLQuc_7jk__Uk_QnJMPndbdKECcTEwTA1) - Framework php.

_Modificacion para la validacion del formulario de_

- [mkakpabla](https://github.com/mkakpabla/form-validation-php#readme) - Validacion Adaptado.
- [booomerang](https://github.com/booomerang/Validatr/tree/master/src) - Validacion php.

_inspirado en:_

- [codeigniter](https://codeigniter.com/user_guide/libraries/validation.html) - formato y uso de validaciones.
- [laravel](https://laravel.com/docs/8.x/validation) - estilo de las validaciones.

_Y A TODO LOS DEV DE YOUTUBE_
