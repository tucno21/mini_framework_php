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
        $data = $this->request()->isPost();

        $valid = $this->validate($data, [
            'email' => 'required|email|not_unique:HomeModel,email',
            'password' => 'required',
        ]);

        if ($valid !== true) {

            return $this->redirect('login', [
                'err' =>  $valid,
                'data' => (object)$data,
            ]);
        } else {

            // $homeModel = new HomeModel();
            // $homeModel->create($data);
            // return $this->redirect('login');
            echo 'iniciaste sesion';
            d($valid);
        }

        // return redirect('home');
        // return $this->redirect('home');
        return view('login');
    }

    public function register()
    {

        $data = $this->request()->isPost();

        $validator = $this->validate($data, [
            'name' => 'required|alpha',
            'username' => 'required|alpha_numeric',
            'email' => 'required|email|unique:HomeModel,email',
            'password' => 'required|min:3|max:12|matches:password_confirm',
            'password_confirm' => 'required',
        ]);

        if ($validator !== true) {

            return $this->redirect('register', [
                'err' =>  $validator,
                'data' => (object)$data,
            ]);
        } else {
            $homeModel = new HomeModel();
            $homeModel->create($data);
            return $this->redirect('login');
        }

        return view('register');
    }
}
