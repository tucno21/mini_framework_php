<?php

// DATOS GENERALES ADMIN
$title = 'Minton';
$titleShort = 'M';
$mainLink = base_url('/panelcontrol');
$logoAdmin = '../public/logo/logo.png';

//DATOS DEL USUARIO ADMIN
$userName = 'Carlos Tucno Vasquez';
// $photoUser = '../public/image/avatar.jpg';
$photoUser = base_url('/image/avatar.jpg');


//MENU CERRAR O PERFIL DE ADMINISTRADOR
$menuSession = [
    [
        'text' => 'Administrador',
        'url'  => '#',
        'icon' => 'far fa-user-circle',
    ],
    [
        'text' => 'Settings',
        'url'  => 'dashboard/logs',
        'icon' => 'fas fa-user-cog',
    ],
    [
        'text' => 'Logout',
        'url'  => base_url('/logout'),
        'icon' => 'fas fa-sign-out-alt',
    ],
];


//CREACION DE ENLACES PARA EL MENU SIDEBAR
$linksSidebar = [
    [
        'header' => 'Navigation',
    ],
    [
        'mode' => 'menu',
        'text' => 'Dashboard',
        'url'  => '/',
        'icon' => 'far fa-comment',
    ],
    [
        'header' => 'Addons',
    ],
    [
        'mode' => 'menu',
        'text' => 'Usuarios',
        'url'  => '/users',
        'icon' => 'far fa-comment',
    ],
    [
        'mode' => 'menu',
        'text' => 'Charts',
        'url'  => '/charts',
        'icon' => 'far fa-comment',
    ],
    [
        'header' => 'SUBMENU',
    ],
    [
        'mode' => 'submenu',
        'text'    => 'Categorias',
        'url'    => '#',
        'icon' => 'fas fa-th-list',
        'submenu' => [
            [
                'text' => 'Crear',
                'url'  => 'www.google.com',
                'icon' => 'fas fa-circle',
            ],
            [
                'text' => 'Editar',
                'url'  => 'www.google.com',
                'icon' => 'fas fa-circle',
            ],
        ],
    ],
    [
        'mode' => 'submenu',
        'text'    => 'Productos',
        'url'    => '#',
        'icon' => 'fas fa-th-list',
        'submenu' => [
            [
                'text' => 'Crear',
                'url'  => 'www.google.com',
                'icon' => 'fas fa-circle',
            ],
            [
                'text' => 'Editar',
                'url'  => 'www.google.com',
                'icon' => 'fas fa-circle',
            ],
        ],
    ],

    [
        'header' => 'CLIENTES',
        'span'  => 'UI Components'
    ],
];



//ENLACES PARA CSS Y JS html
$linkURL = base_url;

$linksCss = [
    // 'https://fonts.googleapis.com/css?family=Lato:300,400,700,900',
    $linkURL . '/built/css/bootstrap.min.css',
    $linkURL . '/built/css/app.min.css',
];

$linksScript = [
    $linkURL . '/built/js/vendor.js',
    $linkURL . '/built/js/app.js',
    'https://kit.fontawesome.com/1d88763075.js',
];
