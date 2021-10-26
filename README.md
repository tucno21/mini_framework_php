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

```
$baseURL = 'www.myweb.com';

$localhost = 'localhost';
$user = 'root';
$password = 'root';
$dbName = 'mvc_framework';
```

## RUTAS WEB

Rutas para la web (App/Config/Routes.php)

```
$router->get('/', [Controller::class, 'index']);
$router->post('/login', [Controller::class, 'index']);

$router->get('/login', function () {
    echo 'desde el login';
});

$router->get('/string', 'funcion');
```

## FUNCIONES GENERALES

depurar $variables

```
dd($variable);
d($variable);
```

Ruta Web principal

```
<?= base_url ?>/login
<?= base_url('/login') ?>
```

Ruta sistema

```
DIRPUBLIC  //carpeta pública
APPDIR     //carpeta App
```

## FUNCIONES PARA EL VISTA

Layout o modelo base /View
captura la parte del HTML

```
<?= extend('/layout/head.php') ?>
```

## FUNCIONES CONTROLADOR

enviar vistas usando $this

```
return $this->view('login', []);
return $this->redirect('login', []);
```

enviar vistas sin $this

```
return view('login', []);
return redirect('login', []);
```

Capturar datos del get y post sanitizados PHP

```
$data = $this->request()->isGet();
$data = $this->request()->isPost();
```

## FUNCIONES MODEL

Instancia el modelo al controlador

Guardar, Actualizar y Eliminar

```
$homeModel->create($data);
$homeModel->update($id, $data);
$homeModel->delete($id);
```

LEER TABLA
leer todo

```
$homeModel->findAll();
$homeModel->findAll($limit);
$homeModel->columns($columns)->findAll();
$homeModel->where($colum, $operator, $valueColum)->findAll();
$homeModel->where($colum, $operator, $valueColum)->orderBy($colum, $order)->findAll();

$homeModel->where($colum, $valueColum)->findAll();
$homeModel->where($colum, $valueColum)->orderBy($colum, $order)->findAll();
```

leer el primero

```
$homeModel->first();
$homeModel->columns($columns)->first();
$homeModel->where($colum, $operator, $valueColum)->first();
$homeModel->where($colum, $operator, $valueColum)->orderBy($colum, $order)->first();

$homeModel->where($colum, $valueColum)->first();
$homeModel->where($colum, $valueColum)->orderBy($colum, $order)->first();
```

### Orden de modelo de consulta

se puede eliminar uno o varios, respetar el orden para no tener errores

```
$homeModel->columns($columns)
          ->where($colum, $operator, $valueColum)
          ->orderBy($colum, $order)
          ->findAll($limit) // ->first();
```

Buscar un registro con valor unico

```
$homeModel->find($id);
```

Alternativa de find(); / primero el valor y luego la columna

```
$homeModel->find($id, $colum);
```

CONSULTA personalizada

```
$homeModel->queryFirst($query);
$homeModel->queryAll($query);
```

## EJEMPLOS

```
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
