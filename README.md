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

## Uso de public/index.php

Rutas para la web (App/Config/Routes.php)

```
$router->get('/', [Controller::class, 'index']);
$router->post('/login', [Controller::class, 'index']);

$router->get('/login', function () {
    echo 'desde el login';
});

$router->get('/string', 'funcion');
```

## FUNCIONES CONTROLADOR

enviar vistas usando $this

```
return $this->view('login', []);
return $this->redirect('login', []);
```

enviar vistas usando sin $this

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
$homeModel->where($colum, $operator, $valueColum)->findAll();
$homeModel->where($colum, $operator, $valueColum)->orderBy($colum, $order)->findAll();

$homeModel->where($colum, $valueColum)->findAll();
$homeModel->where($colum, $valueColum)->orderBy($colum, $order)->findAll();
```

leer el primero

```
$homeModel->first();
$homeModel->where($colum, $operator, $valueColum)->first();
$homeModel->where($colum, $operator, $valueColum)->orderBy($colum, $order)->first();

$homeModel->where($colum, $valueColum)->first();
$homeModel->where($colum, $valueColum)->orderBy($colum, $order)->first();
```

Buscar un registro con valor unico

```
$homeModel->find($id);
```

Alternativa de find(); / primero el valor y luego la columna

```
$homeModel->find($id, $colum);
```

## EJEMPLOS

```
where('active', 1)
where('votes', '>=', 100)
where('votes', '<>', 100)
where('name', 'like', 'T%')

orderBy('name', 'desc')
orderBy('email', 'asc')

find(3);
find('a@a.com', 'email');
```
