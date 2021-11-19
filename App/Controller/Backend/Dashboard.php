<?php

namespace App\Controller\Backend;

use App\Model\HomeModel;
use App\System\Controller;

class Dashboard extends Controller
{

    public function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->middleware($this->sessionGet('user'), ['/panelcontrol']);
    }

    public function index()
    {
        $users = $this->homeModel->findAll();
        return view('backend/index', [
            'users' => $users,
        ]);
    }

    // public function prueba()
    // {
    //     echo 'hola de una seccion restringida';
    // }
}
