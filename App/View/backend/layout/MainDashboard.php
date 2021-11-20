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
    // ['header' => 'Navigation',],
    [
        'mode' => 'menu',
        'text' => 'Dashboard',
        'url'  => '/',
        'icon' => 'far fa-comment',
    ],
    [
        'mode' => 'submenu',
        'text'    => 'Usuarios',
        'url'    => '#',
        'icon' => 'fas fa-user',
        'submenu' => [
            [
                'text' => 'Usuarios',
                'url'  => base_url('/pusuarios'),
                'icon' => 'fas fa-circle',
            ],
            [
                'text' => 'Roles',
                'url'  => base_url('/proles'),
                'icon' => 'fas fa-circle',
            ],
            [
                'text' => 'Modulos',
                'url'  => base_url('/pmodulos'),
                'icon' => 'fas fa-circle',
            ],
        ],
    ],
    [
        'mode' => 'menu',
        'text' => 'Productos',
        'url'  => '/users',
        'icon' => 'fas fa-piggy-bank',
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
    // 'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css',
    'https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css',
    'https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css',
];

$linksScript = [
    $linkURL . '/built/js/vendor.js',
    $linkURL . '/built/js/app.js',
    'https://kit.fontawesome.com/1d88763075.js',
    // 'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js',
    'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js',
    'https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js',
    'https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js',
    'https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js',
    'https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js',
    $linkURL . '/built/js/roles.js',
];
