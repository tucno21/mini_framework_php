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

Rutas para la web

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

Guardar, Actualizar y Eliminar

```
$homeModel->create($data);
$homeModel->update($id, $data);
$homeModel->delete($id, $data);
```
