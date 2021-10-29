<?php

namespace App\Controller;

use App\Model\HomeModel;
use App\System\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return view('home', [
            'var' => 'es una variable',
        ]);
    }

    public function login()
    {
        // return redirect('home');
        return $this->redirect('home');
        // return view('login');
    }

    public function register()
    {
        $data = $this->request()->isPost();

        $validator = $this->validate($data, [
            'name' => 'required|choice:loco',
            'email' => 'required|email|not_unique:HomeModel,email',
            'password' => 'required|min:3|max:12|matches:password_confirm',
        ]);



        // $homeModel = new HomeModel();

        // $db = $homeModel->where('email', 'carlitostucno@gmail.com')->findAll();

        d($validator);

        return view('register');
    }
}
