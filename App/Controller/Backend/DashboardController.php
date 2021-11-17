<?php

namespace App\Controller\Backend;

use App\Model\HomeModel;
use App\System\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->middleware($this->sessionGet('user'), ['/dashboard']);
    }

    public function dashboard()
    {
        $users = $this->homeModel->findAll();
        return view('backend/dashboard', [
            'users' => $users,
        ]);
    }

    public function prueba()
    {
        echo 'hola de una seccion restringida';
    }
}
